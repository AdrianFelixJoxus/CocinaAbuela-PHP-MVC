<?php

namespace Controllers;


use MVC\Router;
use Model\Mesa;


class MesaController {

    public static function index(Router $router) {
        session_start();
        isAuth();

        $mesas = Mesa::all();
        
        if($_SERVER["REQUEST_METHOD"] === "POST") {
            
            isAdmin();
            $id = validarORedireccionarPost("/");
            $tipo = $_POST["tipo"];

            if(ValidarTipoContenido($tipo)) {
                if($tipo === "mesa") {
                    $mesa = Mesa::find($id);
                                
                    header("location: /orden?mesa=$id");
                   
                }
            }
        }
        
        
        $router->render("/mesas/index",[
            "mesas" => $mesas
        ]);
    }
}