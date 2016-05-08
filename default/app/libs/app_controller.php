<?php
/**
 * @see Controller nuevo controller
 */
require_once CORE_PATH . 'kumbia/controller.php';

/**
 * Controlador principal que heredan los controladores
 *
 * Todas las controladores heredan de esta clase en un nivel superior
 * por lo tanto los metodos aqui definidos estan disponibles para
 * cualquier controlador.
 *
 * @category Kumbia
 * @package Controller
 */
class AppController extends Controller
{

    final protected function initialize()
    {
        $this->ruta_archivos = getcwd().'/files/uploads/archivos/';
        $this->ruta_descarga = '/files/uploads/archivos/';
    	$ruta = Router::get("controller").'/'.Router::get('action');
    	$rutas_publicas = array('index/index','index/logout');
    	if (!Auth::is_valid()) {
    
    		if (!in_array($ruta, $rutas_publicas)) {
    			Flash::error("Permiso Denegado");
    			Router::redirect($rutas_publicas[0]);
    		}
    	}
    }

    final protected function finalize()
    {
        
    }

}
