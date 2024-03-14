<?php

namespace Model;

class VentaProducto extends ActiveRecord {

    protected static $tabla = "ventaproductos";
    protected static $columnasDB = ["id","ventaId","productoId","cantidad"];

    public $id;
    public $ventaId;
    public $productoId;
    public $cantidad;

    public function __construct($args = [])
    {
        $this->id = $args["id"] ?? null;
        $this->ventaId = $args["ventaId"] ?? "";
        $this->productoId = $args["productoId"] ?? "";
        $this->cantidad = $args["cantidad"] ?? "";
        
    }
}