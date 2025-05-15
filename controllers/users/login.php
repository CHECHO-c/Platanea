<?php
if($_SERVER['REQUEST_METHOD']==='POST'){
    require_once '../../models/ValidarUsuario.php';
    require_once '../../models/MySql.php';
    session_start();

    $validaciones = new ValidarUsuario($_POST);
    
    $errores = $validaciones->validarLogin();

    if(!empty($errores)){
         $_SESSION['old']=$_POST;
            $_SESSION['error']=$errores;
            header("Location: ../../index.php");
            exit();
    }
    

    $mysql = new MySQL();

    $correo = $_POST['correoUsuarioLogin'];
    $contraseñaIngresada = htmlspecialchars($_POST['contrasenaUsuarioLogin']);

    $consulta = "SELECT * from cliente where correo ='$correo'";;
    
    $mysql->conectar();

    $resultado = $mysql->ejecutarConsulta($consulta);

    $datosUsuario = mysqli_fetch_assoc($resultado);

    $mysql->desconectar();

    $contraseñaUsuario = $datosUsuario['contraseña_cliente'];

    if($contraseñaIngresada===$contraseñaUsuario){
        $_SESSION['nombreUsuario']=$datosUsuario['nombre_cliente'];
         $_SESSION['telefonoUsuario']=$datosUsuario['telefono'];
            $_SESSION['correoUsuario']=$datosUsuario['correo'];
                header("Location: ../../index.php");
                    exit();

    }
    else{
         $_SESSION['old']=$_POST;
            $errores['contraseñaIncorrecta']="Esta contraseña es incorrecta";
            $_SESSION['error']=$errores;
            header("Location: ../../index.php");
            exit();
    }
    
    




}
 ?>



  <!-- $mysql = new MySQL();

    $correo = $_POST['correoUsuarioLogin'];
    $contraseñaIngresada = htmlspecialchars($_POST['contrasenaUsuarioLogin']);

    $consulta = "SELECT * from cliente where correo ='$correo'";;
    
    $mysql->conectar();

    $resultado = $mysql->ejecutarConsulta($consulta);

    $datosUsuario = mysqli_fetch_assoc($resultado);

    $mysql->desconectar();

    $contraseñaUsuario = $datosUsuario['contraseña_cliente'];

    if($contraseñaIngresada===$contraseñaUsuario){
        echo "Exito";
    }
    else{
         $_SESSION['old']=$_POST;
            $errores['contraseñaIncorrecta']="Esta contraseña es incorrecta";
            $_SESSION['error']=$errores;
            header("Location: ../../index.php");
            exit();
    } -->
    