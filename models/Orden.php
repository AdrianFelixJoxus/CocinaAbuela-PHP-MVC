<?php

namespace Model;

class Orden extends ActiveRecord {
    protected static $tabla = "orden";
    protected static $columnasDB = ["id","fecha","hora","usuarioId","mesaId"];

    public $id;
    public $fecha;
    public $hora;
    public $usuarioId;
    public $mesaId;

    public function __construct($args = [])
    {
        $this->id = $args["id"] ?? null;
        $this->fecha = $args["fecha"] ?? "";
        $this->hora = $args["hora"] ?? "";
        $this->usuarioId = $args["usuarioId"] ?? null;
        $this->mesaId = $args["mesaId"] ?? null;
    }
}