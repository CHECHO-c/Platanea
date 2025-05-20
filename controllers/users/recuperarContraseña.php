<?php
if($_SERVER['REQUEST_METHOD']==="POST"){

require_once '../../models/ValidarUsuario.php';
require_once '../../models/Correo.php';
require_once '../../models/MySql.php';


session_start();
$validaciones = new ValidarUsuario($_POST);
$correo = new Correo();
$mysql = new MySQL();

$errores = $validaciones->validarCorreo();

    if(!empty($errores)){
    $_SESSION['old'] = $_POST;
        $_SESSION['error'] = $errores;
        header("Location: ../../index.php");
            exit();
    }

$link = "http://localhost:3000/views/users/recuperarContraseña.php";
$destinatario = $_POST['correoOlvide'];
$asunto = "Recuperacion de contrasena";
$mensaje = "Apreciado usuario en el siguiente link podra recuperar su plataseña <br> $link" ;

$nombre = "Usuario";

if($correo->enviar($destinatario,$nombre,$asunto,$mensaje)){
    echo "Enviado con exito";
}
}
















?>
