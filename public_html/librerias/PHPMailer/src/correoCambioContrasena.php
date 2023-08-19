<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'Exception.php';
require 'PHPMailer.php';
require 'SMTP.php';

// Configuración de la clase PHPMailer para el envío de correo utilizando SMTP
$mail = new PHPMailer();
$mail->IsSMTP();
$mail->SMTPAuth = true;
$mail->SMTPSecure = "ssl";
$mail->Host = "smtp.gmail.com";
$mail->Port = 465;
$email = 'congresomatematicas15@gmail.com';
$mail->Username = $email;
$mail->Password = "rsdxrhmuwdcovefj";

// Contenido del correo electrónico y configuración de la cuenta para envío de correo
$mail->From = "congresomatematicas15@gmail.com";
$mail->FromName = "Congreso Internacional de Matemáticas";
$mail->Subject = "Actualización de contraseña";
$mail->isHTML(true);
$mail->CharSet = 'UTF-8';

// Dirección de envío y cuerpo del correo
$mail->AddAddress($correoElectronico);
$mail->Body = '
    <h1>Contraseña actualizada con éxito</h1>
    <br>
    <p>Tu contraseña ha sido actualizada correctamente.</p>
    <p>Si no fuiste tú quien realizó estos cambios, por favor ponte en contacto con el administrador del sitio.</p>
    <p>Atentamente,<br>El Comité Organizador del Evento</p>';

// Envío del correo electrónico
if (!$mail->Send()) {
    // Si hay un error en el envío de correo, se muestra un mensaje de error
    echo "Error: " . $mail->ErrorInfo;
} else {
    echo "Correo enviado exitosamente.";
}
