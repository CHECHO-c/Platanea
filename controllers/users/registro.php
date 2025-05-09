<?php
if ($_SERVER['REQUEST_METHOD']==="POST"){
        session_start();
        require_once '../../models/ValidarUsuario.php';
        
        $validaciones = new ValidarUsuario($_POST);
        $errores = $validaciones->validar();


        if(!empty($errores)){
            $_SESSION['old']=$_POST;
            $_SESSION['error']=$errores;
            header("Location: ../../index.php");
        }
        else{
            echo "exito";
        }










}
// else{
//     header("Location: ../../index.php");
// }

