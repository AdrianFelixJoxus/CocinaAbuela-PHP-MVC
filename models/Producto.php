<?php

namespace Model;

class Producto extends ActiveRecord {

    protected static $tabla = "productos";
    protected static $columnasDB = ["id","nombre","precio","codigo","categoriasId"];

    public $id;
    public $nombre;
    public $precio;
    public $codigo;
    public $categoriasId;

    public function __construct($args = [])
    {
        $this->id = $args["id"] ?? null;
        $this->nombre = trim(strtolower($args["nombre"] ?? ""));
        $this->precio = trim(strtolower($args["precio"] ?? ""));
        $this->codigo = trim(strtolower($args["codigo"] ?? ""));
        $this->categoriasId = trim(strtolower($args["categoriasId"] ?? 0));
    }

    public function validarNuevoProducto() {
        if(!$this->nombre) {
            self::$alertas["error"][] = "Debes añadir un titulo";
        }
    
        
        if(!$this->precio) {
            self::$alertas["error"][] = "El precio es obligatorio";
            
        }
        
        if(!$this->codigo) {
            self::$alertas["error"][] = "El codigo es obligatorio y debe tener almenos 2 caracteres";
        }

        if(!$this->categoriasId) {
            self::$alertas["error"][] = "Elige al menos una categoria";
        }

       

        return self::$alertas;
        
    }

    public function existeProducto() {
        $query = "SELECT nombre FROM " . self::$tabla . " WHERE nombre LIKE '%";
        $query .= self::$db->escape_string($this->nombre);
        $query .= "%' LIMIT 1";
        
        $resultado = self::$db->query($query);
        
        if($resultado->num_rows) {
        foreach($resultado as $res) {
            $nombre = $res["nombre"];
            $nombreFormateado = trim($res["nombre"]);
            
            if($nombreFormateado === $this->nombre) {
                self::$alertas["error"][] = "El Producto ya esta registrado";                   
                
                }
            }
        }
        
        return $resultado;
    }

    public function existeCodigoProducto() {
        $query = "SELECT * FROM " . self::$tabla . " WHERE codigo = '";
        $query .= self::$db->escape_string($this->codigo);
        $query .= "' LIMIT 1";

        $resultado = self::$db->query($query);
        
        if($resultado->num_rows) {
            self::$alertas["error"][] = "El Codigo del Producto ya esta registrado";
            
        }
        
        return $resultado;
    }

}