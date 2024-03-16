<?php 

require_once __DIR__ . '/../includes/app.php';

use Controllers\AdminController;
use Controllers\APIController;
use Controllers\LoginController;
use Controllers\MesaController;
use Controllers\VentaController;
use Controllers\ProductoController;
use Controllers\OrdenController;
use Model\Venta;
use MVC\Router;

$router = new Router();

// Iniciar sesion
$router->get("/",[LoginController::class,"login"]);//Lista
$router->post("/",[LoginController::class,"login"]);
$router->get("/logout",[LoginController::class,"logout"]);

// Crear cuenta
$router->get("/crear-cuenta",[LoginController::class,"crear"]);//Lista
$router->post("/crear-cuenta",[LoginController::class,"crear"]);

// Recuperar cuenta
$router->get("/olvide",[LoginController::class,"olvide"]);
$router->post("/olvide",[LoginController::class,"olvide"]);
$router->get("/recuperar",[LoginController::class,"recuperar"]);
$router->post("/recuperar",[LoginController::class,"recuperar"]);

// confirmar cuenta
$router->get("/confirmar-cuenta", [LoginController::class,"confirmar"]);//Lista
$router->get("/mensaje", [LoginController::class,"mensaje"]);



//Zona productos CRUD
$router->get("/admin-productos",[ProductoController::class,"index"]);
$router->post("/admin-productos",[ProductoController::class,"index"]);
$router->get("/productos-crear",[ProductoController::class,"crear"]);
$router->post("/productos-crear",[ProductoController::class,"crear"]);
$router->get("/productos-actualizar",[ProductoController::class,"actualizar"]);
$router->post("/productos-actualizar",[ProductoController::class,"actualizar"]);
$router->post("/productos-eliminar",[ProductoController::class,"eliminar"]);


$router->get("/mesas",[MesaController::class,"index"]);
$router->post("/mesas",[MesaController::class,"index"]);


// Ventas y Orden CRUD
$router->get("/ordenes",[AdminController::class,"index"]);
$router->get("/orden",[AdminController::class,"orden"]);
$router->get("/ventas",[AdminController::class,"ventas"]);
$router->get("/venta",[AdminController::class,"venta"]);
$router->post("/venta",[AdminController::class,"venta"]);
$router->get("/ticket",[AdminController::class,"ticket"]);
$router->post("/ticket",[AdminController::class,"ticket"]);


// Api de ordenes y venta
$router->post("/api/ordenes",[APIController::class,"guardar"]);
$router->post("/api/eliminarVenta",[APIController::class,"eliminarVenta"]);
$router->post("/api/eliminarOrden",[APIController::class,"eliminarOrden"]);




// Api productos de los desayunos // Url o endpoint
$router->get("/api/filtrar-huevos",[APIController::class,"huevos"]);
$router->get("/api/filtrar-omelettes",[APIController::class,"Omelettes"]);
$router->get("/api/filtrar-hotcakes",[APIController::class,"hotcakes"]);
$router->get("/api/filtrar-otros",[APIController::class,"otros"]);
$router->get("/api/filtrar-ninos",[APIController::class,"ninos"]);

// Api productos de las bebidas // Url o endpoint
$router->get("/api/filtrar-calientes",[APIController::class,"calientes"]);
$router->get("/api/filtrar-frias",[APIController::class,"frias"]);

// Api productos de las comidas
$router->get("/api/filtrar-carta",[APIController::class,"carta"]);
$router->get("/api/filtrar-tortas",[APIController::class,"tortas"]);
$router->get("/api/filtrar-antojitos",[APIController::class,"antojitos"]);

$router->get("/api/generar-venta",[APIController::class,"generarVenta"]);
$router->post("/api/generar-venta",[APIController::class,"generarVenta"]);












// Comprueba y valida las rutas, que existan y les asigna las funciones del Controlador
$router->comprobarRutas();