<?php

namespace Model;

class AdminVenta extends ActiveRecord {

    protected static $tabla = "ventaproductos";
    protected static $columnasDB = ["id","folio","orden","fecha","hora","mesa","mesero","cantidad","nombre","precio"];

    public $id;
    public $folio;
    public $orden;
    public $fecha;
    public $hora;
    public $mesa;
    public $mesero;
    public $cantidad;
    public $nombre;
    public $precio;

    public function __construct($args = [])
    {
        $this->id = $args["id"] ?? null;
        $this->folio = $args["folio"];
        $this->orden = $args["orden"] ?? "";
        $this->fecha = $args["fecha"] ?? "";
        $this->hora = $args["hora"] ?? "";
        $this->mesa = $args["mesa"] ?? "";
        $this->mesero = $args["mesero"] ?? "";
        $this->cantidad = $args["cantidad"] ?? "";
        $this->nombre = $args["nombre"] ?? "";
        $this->precio = $args["precio"] ?? "";
        
    }

    public function validarVenta($ventaId) {
        $query = "SELECT ventaproductos.ventaId as folio FROM " . self::$tabla . "WHERE ventaproductos.ventaId =  '";
        $query .= self::$db->escape_string($ventaId);
        $query .= "' LIMIT 1";

        $resultado = self::$db->query($query);

        debuguear($resultado);

        if(!$resultado->num_rows) {
            self::$alertas["error"][] = "La venta no existe";
            header("Location: /");
        }

        return $resultado;
    }
}