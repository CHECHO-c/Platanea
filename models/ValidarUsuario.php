<?php

class ValidarUsuario{
    private array $datos;


    public function __construct($datos){
        $this->datos=$datos;
    }
    public function validar(){
        $errores=[];

        if(empty(trim($this->datos['nombreUsuario']?? '')) ||
            empty(trim($this->datos['correoUsuario']?? ''))||
            empty(trim($this->datos['contraseñaUsuario']?? ''))){
            $errores['datosVacio']="Enviaste datos vacios";
        }


        if(!filter_var($this->datos['correoUsuario'],FILTER_VALIDATE_EMAIL)|| !preg_match('/^[a-zA-Z][a-zA-Z0-9._%+-]*@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/',$this->datos['correoUsuario'])){
            $errores['errorCorreo']='Este correo es invalido';
        }

        

        if(!preg_match('/^[\p{L}\s]+$/u',$this->datos['nombreUsuario'])){
            $errores['errorNombre']="El nombre no puede contener (Numeros o Caracteres especiales) ";
        }
        
        if(strlen($this->datos['contraseñaUsuario'])<8){
            $errores['errorContraseña']="La contraseña debe contener MINIMO 8 digitos ";
        }

        return $errores;
       

    }
}
?>