<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../../vendor/autoload.php';
    function generarCodigo() {
    return bin2hex(random_bytes(10));  // Genera un código de 20 caracteres hexadecimales
    }
class Correo {
    private $mail;

    public function __construct() {
        $this->mail = new PHPMailer(true);

        // Configuración general del servidor SMTP
        $this->mail->isSMTP();
        $this->mail->Host = 'smtp.gmail.com';
        $this->mail->SMTPAuth = true;
        $this->mail->Username = 'recuperarplatanea@gmail.com';
        $this->mail->Password = 'nmqb tyzi xzfv ptmn';
        $this->mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $this->mail->Port = 587;

        // Remitente predeterminado
        $this->mail->setFrom('recuperarplatanea@gmail.com', 'Platanea');
        $this->mail->isHTML(true);
    }

    public function enviar($destinatario, $nombre, $asunto, $mensaje) {
        try {
            $this->mail->clearAllRecipients(); // Por si se reutiliza el objeto
            $this->mail->addAddress($destinatario, $nombre);
            $this->mail->Subject = $asunto;
            $this->mail->Body = $mensaje;

            $this->mail->send();
            return true;
        } catch (Exception $e) {
            error_log("Error al enviar el correo: " . $this->mail->ErrorInfo);
            return false;
        }
    }

   

    public function recuperarContraseña($correoDestino){
        require_once 'MySql.php';

        $mysql = new MySQL;
        $mysql->conectar();

        $codigo = generarCodigo();

        try{
        $consulta="INSERT INTO recuperacion (correo,codigo) values ('$correoDestino','$codigo')";

        $mysql->ejecutarConsulta($consulta);

        $mysql->desconectar();      
        }
        catch(Exception $e){
            return false;
        }
        
        
        


        //Datos necesarios para enviar el correo
        $link = "http://localhost:3000/views/users/recuperarContraseña.php?codigo=" .$codigo ."&correo=". urlencode($correoDestino);
        $destinatario = $correoDestino;
        $asunto = "Recuperacion de contrasena";
        $mensaje = "Apreciado usuario en el siguiente link podra recuperar su plataseña <br> <a href= '". $link. "'>Recuperar Contraseña</a>" ;
        $nombre = "Usuario";

       if ( $this->enviar($destinatario,$nombre,$asunto,$mensaje)){
        return true;
       }
       else{
        return false;
       }
        
    }
}