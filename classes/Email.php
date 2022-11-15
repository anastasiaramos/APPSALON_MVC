<?php

namespace Classes;

use PHPMailer\PHPMailer\PHPMailer;

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

        //Crear el objeto Email
        $phpmailer = new PHPMailer();
        $phpmailer->isSMTP();
        $phpmailer->Host = 'smtp.mailtrap.io';
        $phpmailer->SMTPAuth = true;
        $phpmailer->Port = 2525;
        $phpmailer->Username = 'ae83e56f0df818';
        $phpmailer->Password = '2bf47f6e3829a5';

        $phpmailer->setFrom('cuentas@appsalon.com');
        $phpmailer->addAddress('cuentas@appsalon.com', 'AppSalon.com');
        $phpmailer->Subject = 'Confirma tu Cuenta';

        $phpmailer->isHTML(true);
        $phpmailer->CharSet = 'UTF-8';

        $contenido = "<html>";
        $contenido .= "<p><strong>Hola " . $this->nombre . "</strong>, ";
        $contenido .= "has creado tu cuenta en AppSalon, solo debes confirmarla presionando el siguiente enlace.</p>";
        $contenido .= "<p><a href='http://localhost:3000/confirmar-cuenta?token=" . $this->token . "'>Crear cuenta</a></p>";
        $contenido .= "<p>Si no fuiste tú quien solicitó la cuenta, ignora este mensaje.</p>";
        $contenido .= "</html>";

        $phpmailer->Body = $contenido;
        //Enviar el email
        $phpmailer->send();
    }
    
    public function enviarInstrucciones()
    {

        //Crear el objeto Email
        $phpmailer = new PHPMailer();
        $phpmailer->isSMTP();
        $phpmailer->Host = 'smtp.mailtrap.io';
        $phpmailer->SMTPAuth = true;
        $phpmailer->Port = 2525;
        $phpmailer->Username = 'ae83e56f0df818';
        $phpmailer->Password = '2bf47f6e3829a5';

        $phpmailer->setFrom('cuentas@appsalon.com');
        $phpmailer->addAddress('cuentas@appsalon.com', 'AppSalon.com');
        $phpmailer->Subject = 'Reestablece tu Password';

        $phpmailer->isHTML(true);
        $phpmailer->CharSet = 'UTF-8';

        $contenido = "<html>";
        $contenido .= "<p><strong>Hola " . $this->nombre . "</strong>, ";
        $contenido .= "has solicitado reestablecer tu password. Reestablécelo presionando el siguiente enlace.</p>";
        $contenido .= "<p><a href='http://localhost:3000/recuperar-password?token=" . $this->token . "'>Recuperar cuenta</a></p>";
        $contenido .= "<p>Si no fuiste tú quien solicitó el reestablecimiento, ignora este mensaje.</p>";
        $contenido .= "</html>";

        $phpmailer->Body = $contenido;
        //Enviar el email
        $phpmailer->send();
    }
}
