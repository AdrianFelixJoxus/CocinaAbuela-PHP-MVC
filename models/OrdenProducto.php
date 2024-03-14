<?php

namespace Model;

class OrdenProducto extends ActiveRecord {

    protected static $tabla = "ordenesproductos";
    protected static $columnasDB = ["id","ordenId","productoId","Cantidad","comentario"];

    public $id;
    public $ordenId;
    public $productoId;
    public $Cantidad;
    public $comentario;

    public function __construct($args = [])
    {
        $this->id = $args["id"] ?? null;
        $this->ordenId = $args["ordenId"] ?? "";
        $this->productoId = $args["productoId"] ?? "";
        $this->Cantidad = $args["Cantidad"] ?? "";
        $this->comentario = $args["comentario"] ?? "";
        
    }
}