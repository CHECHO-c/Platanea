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
        $contraseñaCrypt = crypt($contraseña ,'$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
        
        try{
            $mysql->conectar();

            $consulta = "INSERT INTO usuario (nombre,telefono,correo,contraseña ,foto,id_rol) VALUES ('$nombre','$telefono','$correo','$contraseñaCrypt',null,2)";
    
            $resultado = $mysql->ejecutarConsulta($consulta);
            
            $mysql->desconectar();
    
            if($resultado){
                header("Location: ../../index.php");
                exit();
            }
            else{
            echo "error";
            }
        }
        catch(Exception $e){
            //mensaje de prueba por lo pronto
            echo "Error en la consulta <br>";
        }
        
        
        
       

        


}
 else{
    header("Location: ../../index.php");
 }

