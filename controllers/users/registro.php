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
              $error['errorNombre']=true;
            }
            if(!$Usuario->verificarContraseña()){
                $error['errorContraseña']=true;
            }
            if(!$Usuario->verificarCorreo()){
                $error['errorCorreo']=true;
            }




            if(!empty($error)){
                $_SESSION['old']=$_POST;
                $_SESSION['error']=$error;

                header("Location: ../../index.php");
            }

        }else{
            $error['datosVacio'];
            $_SESSION['error']=$error;
            header("Location: ../../index.php");

        }



}
else{
    header("Location: ../../index.php");
}

