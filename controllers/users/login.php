<?php
if($_SERVER['REQUEST_METHOD']==='POST'){
    require_once '../../models/ValidarUsuario.php';
    
    session_start();

    $validaciones = new ValidarUsuario($_POST);
    
     list($datosUsuario,$erroresLogin) = $validaciones->validarLogin();

    if(!empty($erroresLogin)){
            $_SESSION['old']=$_POST;
            $_SESSION['error']=$erroresLogin;
            header("Location: ../../index.php");
            exit();
    }
    
    if($datosUsuario){
                $_SESSION['id'] = $datosUsuario['id_usuario'];
                $_SESSION['nombreUsuario']=$datosUsuario['nombre'];
                $_SESSION['telefonoUsuario']=$datosUsuario['telefono'];
                $_SESSION['correoUsuario']=$datosUsuario['correo'];
            header("Location: ../../index.php");
            exit();
    }
    




}
 ?>



  
    