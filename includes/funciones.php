<?php

function debuguear($variable) : string {
    echo "<pre>";
    var_dump($variable);
    echo "</pre>";
    exit;
}

// Escapa / Sanitizar el HTML
function s($html) : string {
    $s = htmlspecialchars($html);
    return $s;
}


// Validar tipo de contenido
function ValidarTipoContenido($tipo) {
    $tipos = ["producto","usuario","search","cajero","administrador","admin","mesa"];
    return in_array($tipo,$tipos);
}

//validar tipo de categoria
function validarCategoria($categoria) {
    $disponibles = [];
    for($i=1;$i<=14;$i++) {
        $disponibles[] = $i;
        echo $disponibles . " ";
    }
    
    return in_array($categoria,$disponibles);
}

function mostrarMensaje($codigo) {
    $mensaje = "";
    switch($codigo) {
        case 1:
            $mensaje = "Creado Correctamente";
            break;
        case 2:
            $mensaje = "Actualizado Correctamente";
            break;
        case 3:
            $mensaje = "Borrado Correctamente";
            break;
        case 4:
            $mensaje = "Producto no Encontrado";
            break;
        default:
            $mensaje = null;
        break;
    }

    return $mensaje;
}

function validarORedireccionarGet(string $url) {

        $id = $_GET["id"];
        $id = filter_var($id,FILTER_VALIDATE_INT);

        if(!$id) {
            header("Location: $url");
        }
        return $id;
}

function ValidarORedireccionarPost($url) {

        $id = $_POST["id"];
        $id = filter_var($id,FILTER_VALIDATE_INT);

        if(!$id) {
            header("Location: $url");
        }
        return $id;
}

function isAdmin() : void {
    if(!isset($_SESSION["admin"])) {
        header("Location: /");
    }
}

function isCajero() : void {
    if(!isset($_SESSION["cajero"])) {
        header("Location: /");
    }
}

function isMesero() : void {
    if(!isset($_SESSION["mesero"])) {
       header("Location: /");
    }
}

function isAuth() : void {
    if(!isset($_SESSION["login"])) {
       header("Location: /");
    }
}

function esUltimo(string $actual , string $proximo) : bool {

    if($actual !== $proximo) {
        return true;
    }

    return false;
}