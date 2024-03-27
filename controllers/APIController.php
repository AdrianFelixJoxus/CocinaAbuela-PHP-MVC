<?php

namespace Controllers;

use Model\AdminOrden;
use Model\Orden;
use Model\OrdenProducto;
use Model\VentaProducto;
use Model\Producto;
use Model\Venta;
use MVC\Router;

class APIController {

    

    public static function guardar() {
        
        $orden = new Orden($_POST);
        $resultado = $orden->guardar();
        //Id de la orden
        $id = $resultado["id"];
       

        $argsVenta = [
            "fecha" => $_POST["fecha"],
            "hora" => $_POST["hora"],
            "ordenId" => $id
        ];
        

        $venta = new venta($argsVenta);
        
        $res = $venta->guardar();
        $idVenta = $res["id"];

        
        
        // Almacena la orden y el producto
         // Almacena los productos con el ID de la orden
         $idProductos = explode(",",$_POST["productos"]);
         $numCantidad = explode(",",$_POST["cantidades"]);
         $comProducto = explode(",",$_POST["comentarios"]);
         $cantidades = [];

         $idOrden = 0;
         //Key significa en el indice
         foreach($idProductos as $key => $idProducto) {
           // Obtener la cantidad correspondiente al producto actual
            $cantidad = $numCantidad[$key];
            $comentario = $comProducto[$key];
            $args = [
                "ordenId" => $id,
                "productoId" => $idProducto,
                "Cantidad" => $cantidad,
                "comentario" => $comentario
            ];
            
            $argsVenta = [
                "ventaId" => $idVenta,
                "productoId" => $idProducto,
                "cantidad" => $cantidad,
            ];

            $ventaProducto = new VentaProducto($argsVenta);
            $ventaProducto->guardar();
            $ordenProducto = new OrdenProducto($args);
            $ordenProducto->guardar();

            
         }

         // Retornamos una respuesta
         
        echo json_encode(["resultado" => $resultado]);
    }

    public static function eliminarVenta() {
        $id = $_POST["id"];
        $idUsuarioVendedor = $_POST["usuarioId"];
        // $consulta = "DELETE FROM ventaproductos WHERE ventaId = $id";
        // $resultado  = VentaProducto::SQL($consulta);

        $venta = VentaProducto::whereM("ventaId",$id);
        $ven = Venta::find($id);//Busca la venta a insertar el usuario vendedor
        foreach($venta as $v) {
            $v->eliminarM("ventaId",$id);
        }
        $resultado = $v;
        //Inserta en el campo usuarioId el usuario id
        $ven->usuarioId = $idUsuarioVendedor;
        $ven->guardar();
        //retorno de respuesta
        echo json_encode(["resultado" => $resultado]);
    
    }

    public static function eliminarOrden() {
        $id = $_POST["id"];
        $orden = OrdenProducto::whereM("ordenId",$id);
        
        //Elimina por cada orden existente de 1 por 1
        foreach($orden as $o) {
            $o->eliminarM("ordenId",$id);
        }
        $resultado = $o;

        //retorno de respuesta
        echo json_encode(["resultado" => $resultado]);
    }

   

    public static function ninos() {
       
        

        $contenido = "SELECT * FROM ";
        $contenido .= "productos ";
        $contenido .= "WHERE categoriasId = 8 ";
        

        $productos = Producto::consultarSQL($contenido);
        echo json_encode($productos);
        
    }


    public static function huevos() {
       
        

        $contenido = "SELECT * FROM ";
        $contenido .= "productos ";
        $contenido .= "WHERE categoriasId = 4 ";
        

        $productos = Producto::consultarSQL($contenido);
        echo json_encode($productos);
        
    }

    public static function otros() {
       
        

        $contenido = "SELECT * FROM ";
        $contenido .= "productos ";
        $contenido .= "WHERE categoriasId = 7 ";
        

        $productos = Producto::consultarSQL($contenido);
        echo json_encode($productos);
        
    }


    public static function Omelettes() {
       
        $contenido = "SELECT * FROM ";
        $contenido .= "productos ";
        $contenido .= "WHERE categoriasId = 5 ";
        

        $productos = Producto::consultarSQL($contenido);
        echo json_encode($productos);
        
    }

    public static function hotcakes() {
       
        $contenido = "SELECT * FROM ";
        $contenido .= "productos ";
        $contenido .= "WHERE categoriasId = 6 ";
        

        $productos = Producto::consultarSQL($contenido);
        echo json_encode($productos);
        
    }

    public static function bebidas() {
        $contenido = "SELECT * FROM ";
        $contenido .= "productos ";
        $contenido .= "WHERE categoriasId = 10 ";

        $productos = Producto::consultarSQL($contenido);
        echo json_encode($productos);
        
    }

    public static function comidas() {
        $contenido = "SELECT * FROM ";
        $contenido .= "productos ";
        $contenido .= "WHERE categoriasId = 11 ";

        $productos = Producto::consultarSQL($contenido);
        echo json_encode($productos);
        
    }

    public static function calientes() {
        $contenido = "SELECT * FROM ";
        $contenido .= "productos ";
        $contenido .= "WHERE categoriasId = 9 ";

        $productos = Producto::consultarSQL($contenido);
        echo json_encode($productos);
    }

    public static function frias() {
        $contenido = "SELECT * FROM ";
        $contenido .= "productos ";
        $contenido .= "WHERE categoriasId = 10 ";

        $productos = Producto::consultarSQL($contenido);
        echo json_encode($productos);
    }

    public static function carta() {
        $contenido = "SELECT * FROM ";
        $contenido .= "productos ";
        $contenido .= "WHERE categoriasId = 11 ";

        $productos = Producto::consultarSQL($contenido);
        echo json_encode($productos);
    }

    public static function tortas() {
        $contenido = "SELECT * FROM ";
        $contenido .= "productos ";
        $contenido .= "WHERE categoriasId = 12 ";

        $productos = Producto::consultarSQL($contenido);
        echo json_encode($productos);
    }

    public static function antojitos() {
        $contenido = "SELECT * FROM ";
        $contenido .= "productos ";
        $contenido .= "WHERE categoriasId = 13 ";

        $productos = Producto::consultarSQL($contenido);
        echo json_encode($productos);
    }

}