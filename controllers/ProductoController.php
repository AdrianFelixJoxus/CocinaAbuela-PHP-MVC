<?php

namespace Controllers;

use Model\Categoria;
use Model\Producto;
use MVC\Router;

use function PHPSTORM_META\type;

class ProductoController {
    
    public static function index(Router $router) {
        session_start();
        isAdmin();
        
        
        $productos = Producto::all();
        $categorias = Categoria::all();
       

        
        
        $resultado = $_GET["resultado"] ?? null;
        
        if($_SERVER["REQUEST_METHOD"] === "POST") {
            $tipo = $_POST["tipo"];
            $name = $_POST["name"];

            if(ValidarTipoContenido($tipo)) {
                if($tipo === "search") {
                    $consulta = "SELECT * FROM productos "; 
                    $consulta .= "WHERE nombre LIKE '%$name%' ";
                    $productos = Producto::SQL($consulta);
                }
            }
            
        }
        $router->render("/productos/admin",[
            "productos" => $productos,
            "categorias" => $categorias
        ]);
    }

    public static function crear(Router $router) {
        session_start();
        isAdmin();
        $producto = new Producto;
        $categorias = Categoria::all();
        
        $alertas = Producto::getAlertas();

        if($_SERVER["REQUEST_METHOD"] === "POST") {
            
            $arregloDeNumeros = [];
            $num = 0;
            for ($i=1; $i <= 1000000; $i++) { 
                $num = strval($i);
                $arregloDeNumeros[] = $num;
            }
            
            
            $categoria = $_POST["producto"]["categoriasId"];
            $res = validarCategoria($categoria);
            
            $producto = new Producto($_POST["producto"]);
            
            
            if(!$res) {
                Producto::setAlerta("error","Agrega al menos 1 categoria");
            }
            $producto->categoriasId = $categoria;
            
            $alertas = $producto->validarNuevoProducto();

            $resultado = $producto->existeProducto();
                
            if($resultado->num_rows) {
                $alertas = Producto::getAlertas(); 
            }
            $resultado = $producto->existeCodigoProducto();
            
            if($resultado->num_rows) {
                $alertas = Producto::getAlertas();
            }

            $res = in_array($producto->nombre,$arregloDeNumeros);

            if($res) {
                Producto::setAlerta("error","El nombre del producto no puede llevar numeros");
            }
            
            $alertas = Producto::getAlertas();
            
            if(empty($alertas)) {
                
                $resultado = $producto->guardar();
                
                if($resultado) {
                    header("Location: /admin-productos?resultado=1");
                }

            }

            

        }
        $router->render("/productos/crear",[
            "producto" => $producto,
            "alertas" => $alertas,
            "categorias" => $categorias
        ]);
    }

    public static function actualizar(Router $router) {
        session_start();
        isAdmin();
        $id = validarORedireccionarGet("/admin-productos");
        $producto = Producto::find($id);
        $categorias = Categoria::all();
        $alertas = Producto::getAlertas();
        
        $array = [];
        foreach($producto as $key => $value) {
            if($key === "id") continue;
            $array[$key] = "$value";
        }// iteracion para poder traerme los datos del producto sin el id
        

        if($_SERVER["REQUEST_METHOD"] === "POST") {

            $arregloDeNumeros = [];
            $num = 0;
            for ($i=1; $i <= 1000000; $i++) { 
                $num = strval($i);
                $arregloDeNumeros[] = $num;
            }
            

            $args = $_POST["producto"];
            
            $categoria = $_POST["producto"]["categoriasId"];
            
            $res = validarCategoria($categoria);
            

            $producto->sincronizar($args);
            
            
            $alertas = $producto->validarNuevoProducto();

            if(!$res) {
                Producto::setAlerta("error","Agrega al menos 1 categoria");
            }
            $producto->categoriasId = $categoria;
            

            
            
            if($array["nombre"] <> $_POST["producto"]["nombre"]) {
                $alertas = $producto->existeProducto();
            }else if($array["codigo"] <> $_POST["producto"]["codigo"]) {
                $alertas = $producto->existeCodigoProducto();
            }

            $res = in_array($producto->nombre,$arregloDeNumeros);
            
            if($res) {
                Producto::setAlerta("error","El nombre del producto no puede llevar numeros");
            }

            $alertas = Producto::getAlertas();
            
            if(empty($alertas)) {
               $resultado = $producto->guardar();

               if($resultado) {
                header("Location: /admin-productos?resultado=2 ");
               }
            }
        }

        $router->render("/productos/actualizar",[
            "alertas" => $alertas,
            "producto" => $producto,
            "categorias" => $categorias
        ]);
    }

    public static function eliminar() {
        if($_SERVER["REQUEST_METHOD"] === "POST") {
            session_start();
            isAdmin();
            $id = validarORedireccionarPost("/admin-productos");
            $tipo = $_POST["tipo"];

            if(ValidarTipoContenido($tipo)) {
                if($tipo === "producto") {
                    $producto = Producto::find($id);
                    $resultado = $producto->eliminar();
                   if($resultado) {
                    
                    header("location: /admin-productos?resultado=3");
                   }
                }
            }
        }
       


    }
}