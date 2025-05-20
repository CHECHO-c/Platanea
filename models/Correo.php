<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../../vendor/autoload.php';

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
}