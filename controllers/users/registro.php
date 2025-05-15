<?php
if ($_SERVER['REQUEST_METHOD']==="POST"){
        session_start();
        require_once '../../models/ValidarUsuario.php';
        require_once '../../models/MySql.php';
        
        $validaciones = new ValidarUsuario($_POST);
        $errores = $validaciones->validar();


        if(!empty($errores)){
            $_SESSION['old']=$_POST;
            $_SESSION['error']=$errores;
            header("Location: ../../index.php");
            exit();
        }
        
        $mysql= new MySQL();

        $nombre = $_POST['nombreUsuario'];
        $correo = $_POST['correoUsuario'];
        $telefono = $_POST['telefonoUsuario'];
        $contraseña = $_POST['contraseñaUsuario'];
        
        try{
            $mysql->conectar();

            $consulta = "insert into cliente (nombre_cliente,telefono,correo,contraseña_cliente) values ('$nombre','$telefono','$correo','$contraseña')";
    
            $resultado = $mysql->ejecutarConsulta($consulta);
            
            $mysql->desconectar();
    
            if($resultado){
                header('refresh:5; url=../../index.php');
                exit();
            }
        }
        catch(Exception $e){
            //mensaje de prueba por lo pronto
            echo "Error en la consulta <br>" . $e;
        }
        
        
        
       

        


}
 else{
    header("Location: ../../index.php");
 }

