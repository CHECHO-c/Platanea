<?php
if ($_SERVER['REQUEST_METHOD']==="POST"){
        session_start();
        $error=[];
        require_once '../../models/Usuario.php';

        if(isset($_POST['nombreUsuario'],$_POST['correoUsuario'],$_POST['contraseñaUsuario'])){
            $nombre =  $_POST['nombreUsuario'];
            $correo = trim($_POST['correoUsuario']);
            $contraseña = trim( $_POST['contraseñaUsuario']);
            

        

            $Usuario = new Usuario($nombre,$correo,$contraseña);
            
            if(!$Usuario->verificarNombre()){
                echo "Nombre invalido <br>";
            }
            if(!$Usuario->verificarContraseña()){
                echo "Contraseña minimo 8 caracteres <br>";
            }
            if(!$Usuario->verificarCorreo()){
                echo "Correo Invalido <br>";
            }

        }



}

