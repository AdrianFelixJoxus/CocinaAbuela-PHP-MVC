<?php

namespace Controllers;

use MVC\Router;
use Model\AdminOrden;
use Model\AdminVenta;



class AdminController {


    public static function index(Router $router) {
        session_start();
        //isAdmin();
        isMesero();

        $fecha = $_GET["fecha"] ?? date("Y-m-d");
        $fechas = explode("-",$fecha);

        if(!checkdate($fechas[1],$fechas[2],$fechas[0])) {
            header("Location: /404");
        }

        //consultar la base de datos
        $consulta = "SELECT orden.id,orden.fecha,orden.hora,orden.mesaId,ordenesproductos.Cantidad,productos.nombre as producto,productos.categoriasId,ordenesproductos.comentario,concat( usuarios.nombre,' ',usuarios.apellido) as usuario ,orden.usuarioId "; 
        $consulta .= "FROM ordenesproductos left JOIN "; 
        $consulta .= "orden ";
        $consulta .= "ON ordenesproductos.ordenId = orden.id ";
        $consulta .= "LEFT JOIN productos "; 
        $consulta .= "on ordenesproductos.productoId = productos.id ";
        $consulta .= "LEFT JOIN usuarios ";  
        $consulta .= "ON orden.usuarioId = usuarios.id ";
        $consulta .= "WHERE fecha = '$fecha' ";

        
        $ordenes = AdminOrden::SQL($consulta);
        //debuguear($ordenes);
        isAuth();

        //debuguear($ordenes);
        $router->render("adminOrdenes/index",[
            "nombre" => $_SESSION["nombre"],
            "ordenes" => $ordenes,
            "fecha" => $fecha
        ]);
    }

    public static function orden(Router $router) {
        session_start();
        isAuth();
        isMesero();
        
        $router->render("orden/index",[
            "nombre" => $_SESSION["nombre"],
            "id" => $_SESSION["id"]
        ]);
    }

    public static function ordenActualizar(Router $router) {
        session_start();
        isAuth();
        isMesero();
        
        $router->render("orden/index",[
            "nombre" => $_SESSION["nombre"],
            "id" => $_SESSION["id"]
        ]);
    }


    public static function ventas(Router $router) {
        session_start();
        //isAdmin();
        isCajero();

        // $fecha = $_GET["fecha"] ?? date("Y-m-d",strtotime("-1 day"));
        $fecha = $_GET["fecha"] ?? date("Y-m-d");
        $fechas = explode("-",$fecha);

        if(!checkdate($fechas[1],$fechas[2],$fechas[0])) {
            header("Location: /404");
        }

        //consultar la base de datos
        $consulta = "SELECT ventaproductos.ventaId as folio , venta.ordenId as orden , venta.fecha,venta.hora,orden.mesaId as mesa,concat(usuarios.nombre,' ',usuarios.apellido) as mesero,ventaproductos.cantidad,productos.nombre,productos.precio "; 
        $consulta .= "FROM ventaproductos LEFT JOIN "; 
        $consulta .= "venta ";
        $consulta .= "ON ventaproductos.ventaId = venta.id ";
        $consulta .= "LEFT JOIN productos ON ventaproductos.productoId = productos.id "; 
        $consulta .= "LEFT JOIN orden ON venta.ordenId = orden.id ";
        $consulta .= "LEFT JOIN usuarios ON orden.usuarioId = usuarios.id ";  
        $consulta .= "WHERE venta.fecha = '$fecha' ";

        
        
        
        $ventas = AdminVenta::SQL($consulta);
        //debuguear($ordenes);
        isAuth();
       
        

        $router->render("adminVentas/index",[
            "nombre" => $_SESSION["nombre"],
            "ventas" => $ventas,
            "fecha" => $fecha
        ]);
    }

    public static function venta(Router $router) {

        session_start();
        //isAdmin();
        isCajero();


        if($_SERVER["REQUEST_METHOD"] === "POST") {

            
            $ventaId = $_POST["ventaId"];

            //Validar que exista la venta
            $Queryventaexiste = "SELECT ventaproductos.ventaId as folio FROM ventaproductos WHERE ventaproductos.ventaId = $ventaId LIMIT 1 ";
            
            $res = AdminVenta::SQL($Queryventaexiste);
            foreach($res as $r) {
                
            }
            
            if(!$r->folio) {
                header("Location: /");
            }            

            //debuguear($ventaId);
            
            //consultar la base de datos
            $consulta = "SELECT ventaproductos.ventaId as folio , venta.ordenId as orden , venta.fecha,venta.hora,orden.mesaId as mesa,concat(usuarios.nombre,' ',usuarios.apellido) as mesero,ventaproductos.cantidad,productos.nombre,productos.precio "; 
            $consulta .= "FROM ventaproductos LEFT JOIN "; 
            $consulta .= "venta ";
            $consulta .= "ON ventaproductos.ventaId = venta.id ";
            $consulta .= "LEFT JOIN productos ON ventaproductos.productoId = productos.id "; 
            $consulta .= "LEFT JOIN orden ON venta.ordenId = orden.id ";
            $consulta .= "LEFT JOIN usuarios ON orden.usuarioId = usuarios.id ";  
            $consulta .= "WHERE ventaproductos.ventaId = '$ventaId' ";

            $venta = AdminVenta::SQL($consulta);
            //debuguear($venta);
            isAuth();
            
        }



        $router->render("venta/index",[
            "nombre" => $_SESSION["nombre"],
            "venta" => $venta,
            "idVendedor" => $_SESSION["id"]
        ]);

       
    }

    

}