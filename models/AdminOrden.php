<?php

namespace Model;

class AdminOrden extends ActiveRecord {

    protected static $tabla = "ordenesproductos";
    protected static $columnasDB = ["id","fecha","hora","mesaId","Cantidad","producto","comentario","usuario","usuarioId"];

    public $id;
    public $fecha;
    public $hora;
    public $mesaId;
    public $Cantidad;
    public $producto;
    public $comentario;
    public $usuario;
    public $usuarioId;

    public function __construct($args = [])
    {
        $this->id = $args["id"] ?? null;
        $this->fecha = $args["fecha"] ?? "";
        $this->hora = $args["hora"] ?? "";
        $this->mesaId = $args["mesaId"] ?? "";
        $this->Cantidad = $args["Cantidad"] ?? "";
        $this->producto = $args["producto"] ?? "";
        $this->comentario = $args["comentario"] ?? "";
        $this->usuario = $args["usuario"] ?? "";
        $this->usuarioId = $args["usuarioId"] ?? "";
    }

}