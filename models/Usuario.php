<?php

namespace Model;

class Usuario extends ActiveRecord {

    protected static $tabla = "usuarios";
    protected static $columnasDB = ["id","nombre","apellido","email","password","telefono","usuario","admin","cajero","mesero","confirmado","token","activo"];

    public $id;
    public $nombre;
    public $apellido;
    public $email;
    public $password;
    public $telefono;
    public $usuario;
    public $admin;
    public $cajero;
    public $mesero;
    public $confirmado;
    public $token;
    public $activo;

    public function __construct($args = [])
    {
        $this->id = $args["id"] ?? null;
        $this->nombre = trim($args["nombre"] ?? "");
        $this->apellido = trim($args["apellido"] ?? "");
        $this->email = trim($args["email"] ?? "");
        $this->password = trim($args["password"] ?? "");
        $this->telefono = trim($args["telefono"] ?? "");
        $this->usuario = trim($args["usuario"] ?? "");
        $this->admin = trim($args["admin"] ?? "0");
        $this->cajero = trim($args["cajero"] ?? "0");
        $this->mesero = trim($args["mesero"] ?? "0");
        $this->confirmado = trim($args["confirmado"] ?? "0");
        $this->token = trim($args["token"] ?? "");
        $this->activo = trim($args["activo"] ?? "0");

    }

    public function validarCuentaNueva() {

        if(!$this->nombre) {
            self::$alertas["error"][] = "El Nombre es obligatorio";
        }

        if(!$this->apellido) {
            self::$alertas["error"][] = "El Apellido es obligatorio "; 
        }

        if(!$this->email) {
            self::$alertas["error"][] = "El email es obligatorio";
        }

        if(!$this->password) {
            self::$alertas["error"][] = "El password es obligatorio";
        }
        if(strlen($this->password) < 6) {
            self::$alertas["error"][] = "El password debe contener al menos 6 caracteres";
        }

        if(!$this->telefono) {
            self::$alertas["error"][] = "El Telefono es obligatorio ";
        }

        // if(!preg_match('/[0-9]{10}/',$this->telefono)) {
        //     self::$alertas["error"][] = "Formato no Valido";
        // }


        return self::$alertas;


    }

    public function validarLogin() {
        if(!$this->usuario) {
            self::$alertas["error"][] = "El usuario es obligatorio";
        }
        if(!$this->password) {
            self::$alertas["error"][] = "El password es obligatorio";
        }

        return self::$alertas;
    }

    public function validarEmail(){ 
        if(!$this->email) {
            self::$alertas["error"][] = "El email es obligatorio";
        }
        return self::$alertas;
    }

    public function validarPassword() {
        if(!$this->password) {
            self::$alertas["error"][] = "El password es obligatorio";
        }
        if(strlen($this->password) < 6) {
            self::$alertas["error"][] = "El password debe contener al menos 6 caracteres";
        }

        return self::$alertas;
    }
    
    public function existeUsuario() {
        $query = "SELECT * FROM " . self::$tabla . " WHERE email = '";
        $query .= trim(self::$db->escape_string($this->email));
        $query .= "' LIMIT 1";
        
        $resultado = self::$db->query($query);
        
        if($resultado->num_rows) {
            self::$alertas["error"][] = "El usuario ya esta registrado"; 
        }
    
        return $resultado;
    }

    public function usuarioActivo() {
        $query = "SELECT * FROM " . self::$tabla . " WHERE email = '";
        $query .= trim(self::$db->escape_string($this->email));
        $query .= "' AND activo = 1 LIMIT 1";

        $resultado = self::$db->query($query);

        
        if($resultado->num_rows) {
            self::$alertas["error"][] = "El usuario esta en uso";
        }
        return $resultado;
    }

    public function verificarPasswordAndComprobado($password) {
       $resultado = password_verify($password,$this->password);
       if(!$resultado || !$this->confirmado) {
        self::$alertas["error"][] = "Password incorrecto o tu cuenta no ha sido confirmada";
       }else {
        return true;
       }
       
    }

    public function hashPassword() {
        $this->password = password_hash($this->password,PASSWORD_BCRYPT);
    }

    public function crearToken() {
        $this->token = uniqid();
    }

}