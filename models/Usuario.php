<?php 
//Clase para las funciones de verificacion de usuario
class Usuario
{

    public $nombre;
    public $correo;
    public $contraseña;


    function __construct($nombre,$correo,$contraseña){

        $this->nombre=$nombre;
        $this->correo=$correo;
        $this->contraseña=$contraseña;

    }


    public function verificarNombre(){
        $patronValido = '/^[\p{L}\s]+$/u';

        if(preg_match($patronValido,$this->nombre)){
            return true;
        }
        else{
            return false;
        }
    }



    public function verificarCorreo(){
        if(filter_var($this->correo,FILTER_VALIDATE_EMAIL)){
            return true;
        }
        else{
            return false;
        }
    }

  
    public function verificarContraseña(){
        $patronValido ='/^.{8,}$/';

        if(preg_match($patronValido,$this->contraseña)){
            return true;
        }
        else{
            return false;
        }
    }
    
}




?>