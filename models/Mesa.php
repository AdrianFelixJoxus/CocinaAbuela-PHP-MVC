<?php

namespace Model;

class Mesa extends ActiveRecord {

    protected static $tabla = "mesas";
    protected static $columnasDB = ["id","numero"];

    public $id;
    public $numero;

    public function __construct($args = [])
    {
        $this->id = $args["id"] ?? null;
        $this->numero = trim(strtolower($args["numero"] ?? ""));
    }

    public function validarNuevaMesa() {
        if(!$this->numero) {
            self::$alertas["error"][] = "El campo numero no puede ir vacio";
        }

        return self::$alertas;
    }
}