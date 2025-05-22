<?php
session_start();
require_once '../../models/MySql.php';
if($_SERVER['REQUEST_METHOD'] == 'POST'){

    //Recibo la url y unset la session
    $cadena = $_SESSION['cadenaQuery']??"";
    $correo = $_SESSION['correo']??"";
    unset($_SESSION['cadenaQuery'],$_SESSION['correo']);
    //--------------------------------
    $errores = [];


    $contraseña = $_POST["nuevaContraseña"]??"";
    $confirmarContraseña = $_POST["confirmarContraseña"]??"";

    if(empty($contraseña)|| empty($confirmarContraseña)){
            $errores["datosVacio"] = "Enviaste datos vacios";
            $_SESSION["old"] = $_POST;
            $_SESSION["error"] = $errores;
            header("Location: ../../views/users/recuperarContraseña.php?".$cadena);
            exit();
    }

    if (strlen($contraseña) < 8) {
    $errores["contrasena"] = "La contraseña debe tener al menos 8 caracteres";
    }
    if (strlen($confirmarContraseña) < 8) {
    $errores["confirmarContrasena"] = "La contraseña debe tener al menos 8 caracteres";
    }
    if($contraseña != $confirmarContraseña){
        $errores["noCoinciden"] = "Las contraseñas no coinciden";
    }

    if(!empty($errores)){
        $_SESSION["old"] = $_POST;
        $_SESSION["error"] = $errores;
        header("Location: ../../views/users/recuperarContraseña.php?$cadena");
        exit();

    
    }


    $mysql = new MySQL;

    $mysql->conectar();

    $consulta = "SELECT * FROM recuperacion where correo='$correo'";

    $resultado =$mysql->ejecutarConsulta($consulta);

    if($resultado){
        $datos = mysqli_fetch_assoc($resultado);

        $codigo = $datos["codigo"];
        $id = $datos["id"];
        $consultaEliminar ="DELETE FROM recuperacion where id=$id AND codigo='$codigo'";
        
        $resultadoEliminar = $mysql->ejecutarConsulta($consultaEliminar);

        if($resultadoEliminar){
            $contraseñaCrypt = crypt($contraseña ,'$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
            $correoUsuario = $datos["correo"];
            $consultaActualizar = "UPDATE usuario set contraseña='$contraseñaCrypt' where correo='$correoUsuario'";
            $resultadoActualizar = $mysql->ejecutarConsulta($consultaActualizar);

            if($resultadoActualizar){
                $_SESSION["contraseñaActualizada"] = "ok";
                header("Location: ../../index.php");
                exit();
            }
            else{
                $_SESSION["contraseñaActualizada"] = "no";
                header("Location: ../../index.php");
                exit();
            }

        }

    
    $mysql->desconectar();


}else{
        $_SESSION["contraseñaActualizada"] = "no";
            header("Location: ../../index.php");
                exit();
}
}   




?>