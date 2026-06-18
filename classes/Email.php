<?php

namespace Classes;

use PHPMailer\PHPMailer\PHPMailer;
use Dotenv\Dotenv;

class Email
{
    public $email;
    public $nombre;
    public $token;

    public function __construct($email, $nombre, $token)
    {
        $this->email = $email;
        $this->nombre = $nombre;
        $this->token = $token;
    }
    public function enviarConfirmacion()
    {
        $dotenv = Dotenv::createImmutable(__DIR__ . '/..');
        $dotenv->load();
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->Host = 'sandbox.smtp.mailtrap.io';
        $mail->SMTPAuth = true;
        $mail->Port = 2525;
        $mail->Username = $_ENV['USERNAME'];
        $mail->Password = $_ENV['PASSWORD'];


        $mail->setFrom('cuentas@appsalon.com');
        $mail->addAddress('cuentas@appsalon.com', 'Appsalon');
        $mail->Subject = 'confirma tu cuenta';

        $mail->isHTML(TRUE);
        $mail->CharSet = 'UTF-8';

        $contenido = "<html>";
        $contenido .= "<p><strog>Hola " . $this->nombre . "</strog> Has creado tu cuenta en Appsalon solo debes confirmarla presionando el siguiente enlace</p>";
        $contenido .= "<p>Presiona aqui: <a href='http://localhost:3000/confirmar-cuenta?token=" . $this->token . "'>Confirmar Cuenta</a></p>";
        $contenido .= "<p>si tu no solicitaste esta cuenta puedes ignorar el mensaje</p>";
        $contenido .= "</html>";



        $mail->Body = $contenido;

        //ENVIAR EL EMAIL
        $mail->send();
    }
    public function enviarInstrucciones()
    {
        $dotenv = Dotenv::createImmutable(__DIR__ . '/..');
        $dotenv->load();
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->Host = 'sandbox.smtp.mailtrap.io';
        $mail->SMTPAuth = true;
        $mail->Port = 2525;
        $mail->Username = $_ENV['USERNAME'];
        $mail->Password = $_ENV['PASSWORD'];


        $mail->setFrom('cuentas@appsalon.com');
        $mail->addAddress('cuentas@appsalon.com', 'Appsalon');
        $mail->Subject = 'Restablece tu password';

        $mail->isHTML(TRUE);
        $mail->CharSet = 'UTF-8';

       

        $contenido = "<html>";
        $contenido .= "<p><strog>Hola " . $this->nombre . "</strog> Has solicitado restablecer tu password sigue el siguiente enlace para hacerlo</p>";
        $contenido .= "<p>Presiona aqui: <a href='http://localhost:3000/recuperar?token=" . $this->token . "'>Restablecer password</a></p>";
        $contenido .= "<p>si tu no solicitaste esta cuenta puedes ignorar el mensaje</p>";
        $contenido .= "</html>";


        $mail->Body = $contenido;

        //ENVIAR EL EMAIL
        $mail->send();
    }
}
