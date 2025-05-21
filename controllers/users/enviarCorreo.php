<?php
if($_SERVER['REQUEST_METHOD']==="POST"){

require_once '../../models/ValidarUsuario.php';
require_once '../../models/Correo.php';
require_once '../../models/MySql.php';


session_start();
$validaciones = new ValidarUsuario($_POST);


$errores = $validaciones->validarCorreo();

    if(!empty($errores)){
    $_SESSION['old'] = $_POST;
        $_SESSION['error'] = $errores;
        header("Location: ../../index.php");
            exit();
    }

   $correo = new Correo();

  $resultado= $correo->recuperarContraseña($_POST['correoOlvide']);

  if($resultado){
    $_SESSION['correoEnviado']="ok";
    header("Location: ../../index.php");
            exit();
  }
  else{
     $_SESSION['correoEnviado']="no";
    header("Location: ../../index.php");
            exit();
  }

  

    
}
















?>
