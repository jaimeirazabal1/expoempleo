<?php

/**
 * Controller por defecto si no se usa el routes
 * 
 */
Load::models("usuarios");
class IndexController extends AppController
{

    public function index()
    {
        $usuario = new Usuarios();
    	
        if (Input::hasPost("username","password")){
            $pwd = $usuario->encriptar(Input::post("password"));
            $usuario=Input::post("username");
 
            $auth = new Auth("model", "class: usuarios", "username: $usuario", "password: $pwd");
            if ($auth->authenticate()) {
                if (Auth::get("terminos")) {
                    Router::redirect("usuarios/dashboard");
                }else{
                    Router::redirect("pages/terminos");
                }
            } else {
                Flash::error("Nombre de usuario o contraseña inválidos");
            }
        }
    }

}
