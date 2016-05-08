<?php 
Load::models('usuarios','archivo');
class UsuariosController Extends AppController{
	public function index(){
		$this->titulo = 'Lista de Usuarios';
		$usuarios = new Usuarios();
		$this->usuarios = $usuarios->find();
	}
	public function create(){
		View::template("dash");
		$this->titulo = 'Crear Usuario';
		if (Input::hasPost("usuarios")) {
			$post = Input::post("usuarios");
			$usuario = new Usuarios(Input::post("usuarios"));
			if (!$usuario->confirmar_pass($post['password'],$post['confirm'])) {
				Flash::error("Las contraseñas no coinciden!");
				return;
			}
			$usuario->password = $usuario->encriptar($usuario->password);
			if ($usuario->save()) {
				Flash::valid("Usuario Creado exitosamente!");
				Input::delete();
			}else{
				Flash::error("No se creó el usuario exitosamente!");
			}
		}
	}
	public function dashboard(){
		$this->titulo = 'Escritorio de Usuario';
	}
	public function asignar($usuario_id){
		$usuario = new Usuarios();
		$archivo = new Archivo();
		$usuario = $usuario->find($usuario_id);
		$this->titulo = 'Asignar Archivo a '.ucfirst($usuario->username);
		$this->usuario = $usuario;
        if (Input::hasPost('oculto')) {  //para saber si se envió el form
            $archivo = Upload::factory('archivo');//llamamos a la libreria y le pasamos el nombre del campo file del formulario
            $archivo->setPath($this->ruta_archivos);
            $_FILES['archivo']['name'] = date('Y_m_d_H_i_s').'_'.$_FILES['archivo']['name'];
            $archivo->setExtensions(array('zip','rar','xls','xlsx')); //le asignamos las extensiones a permitir
            if ($archivo->isUploaded()) { 
                if ($archivo->save()) {
                	$datos = ['nombre'=>Input::post('nombre'),
                				'url'=>$this->ruta_descarga.$_FILES['archivo']['name'],
                				'usuarios_id'=>Input::post('usuarios_id')
                			];
                	$new_archivo = new Archivo($datos);
                	if ($new_archivo->save()) {
                       	Flash::valid('Archivo subido correctamente!');
                	}else{
                		Flash::warning('No se ha Podido Subir el Archivo!');
                	}
                }
            }else{
                Flash::warning('No se ha Podido Subir el Archivo!');
            }
        }
        $archivo = new Archivo();
		$this->archivos = $archivo->find("conditions: usuarios_id = '".$usuario_id."'");
	}


	public function mis_archivos(){
		$usuario = new Usuarios();
		$archivo = new Archivo();
		$usuario = $usuario->find(Auth::get('id'));
		$this->titulo = 'Mis Archivos';
		$this->usuario = $usuario;
        
        $archivo = new Archivo();
		$this->archivos = $archivo->find("conditions: usuarios_id = '".Auth::get('id')."'");		
	}


	public function logout(){
		Auth::destroy_identity();
		Flash::valid("Sesión Finalizada, hasta Luego!");
		Router::redirect("index/");
	}





	public function before_filter(){
		View::template("dash");
	}
}



 ?>