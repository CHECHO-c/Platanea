<?php



class ValidarUsuario{
    private array $datos;


    public function __construct($datos){
        $this->datos=$datos;
    }
    public function validar(){
        
        require_once 'MySql.php';
        $mysql = new MySQL();
        $errores=[];

        
        if(empty(trim($this->datos['nombreUsuario']?? '')) ||
            empty(trim($this->datos['correoUsuario']?? ''))||
            empty(trim($this->datos['telefonoUsuario']??''))||
            empty(trim($this->datos['contraseñaUsuario']?? ''))){
            $errores['datosVacio']="Enviaste datos vacios";
        }

        if(!filter_var($this->datos['correoUsuario'],FILTER_VALIDATE_EMAIL)|| !preg_match('/^[a-zA-Z][a-zA-Z0-9._%+-]*@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/',$this->datos['correoUsuario'])){
            $errores['errorCorreo']='Este correo es invalido';
            return $errores;
        }
       

        $consulta="SELECT count(*) as cuenta from usuario where correo="."'".$this->datos['correoUsuario']."'";
        $mysql->conectar();

        $resultado=$mysql->ejecutarConsulta($consulta);

        if($resultado){
            $cantidadColumnas= mysqli_fetch_assoc ($resultado);

            $mysql->desconectar();
        }
        
         if(!preg_match('/^[\p{L}\s]+$/u',$this->datos['nombreUsuario'])){
            $errores['errorNombre']="El nombre no puede contener (Numeros o Caracteres especiales) ";
        }
        

         

        if($cantidadColumnas['cuenta']>0){
            $errores['correoOcupado']="Este correo esta en uso";
        }

       

        if(!filter_var($this->datos['telefonoUsuario'], FILTER_VALIDATE_INT) || strlen($this->datos['telefonoUsuario'])!=10){
            $errores['errorTelefono']='Este telefono es invalido';
        }

        return $errores;
       

    }

    public function validarLogin(){
        require_once 'MySql.php';
        $mysql = new MySQL();
        $errorLogin=[];
        $usuarioDatos =[];

        
        if(empty(trim($this->datos['correoUsuarioLogin']??''))||
            empty(trim($this->datos['contrasenaUsuarioLogin']??''))){
                $errorLogin['datosVacioLogin']="Enviaste datos vacios";
            }

         if(!filter_var($this->datos['correoUsuarioLogin'],FILTER_VALIDATE_EMAIL)|| !preg_match('/^[a-zA-Z][a-zA-Z0-9._%+-]*@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/',$this->datos['correoUsuarioLogin'])){
            $errorLogin['errorCorreoLogin']="Este correo es invalido";
            return [null,$errorLogin];
        }

        $consulta="SELECT count(*) as cuenta from usuario where correo="."'".$this->datos['correoUsuarioLogin']."'";
        $mysql->conectar();

        $resultado=$mysql->ejecutarConsulta($consulta);

        if($resultado){
            $cantidadColumnas= mysqli_fetch_assoc ($resultado);
        }

        $mysql->desconectar();
        if($cantidadColumnas['cuenta']==0){
            $errorLogin['correoInexistente']="Este correo no existe";
        }

        //Validar Contraseña
        $consulta = "SELECT * from usuario where correo="."'".$this->datos['correoUsuarioLogin']."'";
        $mysql->conectar();
        $resultado = $mysql->ejecutarConsulta($consulta);
        $datosUsuario = mysqli_fetch_assoc($resultado);
        $mysql->desconectar();

        $contraseñaCrypt = crypt($this->datos['contrasenaUsuarioLogin'], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$' );

        if($datosUsuario['contraseña']===$contraseñaCrypt){
            $usuarioDatos = $datosUsuario;
            
        }
        else{
            $errorLogin['contraseñaIncorrecta']="Contraseña incorrecta";
        }

        



        

        return [$usuarioDatos,$errorLogin];

           
    }

    public function validarCorreo(){
        require_once 'Mysql.php';
        $errorForgot = [];
        
        if(empty(trim($this->datos["correoOlvide"]??''))){
            $errorForgot['datosVacioForgot'] = "Enviaste un correo vacio";
            return $errorForgot;
        }

        if(!filter_var($this->datos['correoOlvide'],FILTER_VALIDATE_EMAIL)|| !preg_match('/^[a-zA-Z][a-zA-Z0-9._%+-]*@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/',$this->datos['correoOlvide'])){
            $errorForgot['errorCorreoOlvide']="Este correo es invalido";
            return $errorForgot;

        }



        $mysql = new MySQL();

        $mysql->conectar();
        $consulta = "SELECT count(*) as cuenta from usuario where correo="."'".$this->datos['correoOlvide']."'";
        $resultado = $mysql->ejecutarConsulta($consulta);

        if ($resultado) 
        {
            $datos = mysqli_fetch_assoc($resultado);
        }

        if($datos['cuenta']==0){
            $errorForgot["correoInexistenteForgot"] = "Este correo no esta registrado";
            
        }





        return $errorForgot;
    }

    
}
?>