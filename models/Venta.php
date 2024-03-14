<?php

namespace Model;

class Venta extends ActiveRecord {
    protected static $tabla = "venta";
    protected static $columnasDB = ["id","fecha","hora","ordenId"];

    public $id;
    public $fecha;
    public $hora;
    public $ordenId;

    public function __construct($args = [])
    {
        $this->id = $args["id"] ?? null;
        $this->fecha = $args["fecha"] ?? "";
        $this->hora = $args["hora"] ?? "";
        $this->ordenId = $args["ordenId"] ?? null;
    }
}