<?php 
Load::models('archivo');
class ArchivoController extends AppController{

	public function descargar($archivo_id){
		View::select('usuarios/asignar');
		$archivo = new Archivo();
		$archivo = $archivo->find($archivo_id);
		//die(getcwd().$archivo->url);
		$nombre=explode(".",$archivo->url);
		header ("Content-Disposition: attachment; filename=".$archivo->nombre.'.'.$nombre[count($nombre)-1]."\n\n");
		header ("Content-Type: application/force-download");
		header ("Content-Length: ".filesize(getcwd().$archivo->url));
		//readfile(getcwd().$archivo->url);
		echo file_get_contents(getcwd().$archivo->url);
		die();
	}
}



 ?>