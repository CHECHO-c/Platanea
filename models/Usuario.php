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


   
    
}




?>