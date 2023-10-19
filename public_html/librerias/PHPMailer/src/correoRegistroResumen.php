<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'Exception.php';
require 'PHPMailer.php';
require 'SMTP.php';
require 'traerCorreoCongreso.php';

// Configuración de la clase PHPMailer para el envío de correo utilizando SMTP
$mail = new PHPMailer();
$mail->IsSMTP();
$mail->SMTPAuth = true;
$mail->SMTPSecure = "ssl";
$mail->Host = "smtp.gmail.com";
$mail->Port = 465;
$email = $correoCongreso;
$mail->Username = $email;
$mail->Password = $hashContra;

// Contenido del correo electrónico y configuración de la cuenta para envío de correo
$mail->From = $email;
$mail->FromName = "Congreso Internacional de Matemáticas";
$mail->Subject = "Registro de trabajo exitoso";
$mail->isHTML(true);
$mail->CharSet = 'UTF-8';
$email2 = '';

// Verificar si el usuario ha iniciado sesión y configurar $_SESSION['correoElectronico']
// ...

// Construcción del mensaje del correo
if ($_SESSION['correoElectronico'] !== $email2) {
    // Enviar correo al autor principal
    $mail->addAddress($_SESSION['correoElectronico']);
    $mensaje .= "Registro de trabajo exitoso. Has sido registrado como AUTOR del trabajo.<br><br>";
    $mensaje .= "El trabajo <b>" . $titulo . "</b> fue registrado con éxito en la categoría <b>" . $tipoPonencia . "</b> con la clave <b>" . $idPonencia . "</b>.<br>";
    $mensaje .= "Fecha: " . date('Y-m-d') . "<br><br>";
    $mensaje .= "Atentamente,<br><br>";
    $mensaje .= "El Comité Organizador del Evento<br>";
    $mensaje .= "Por mi Raza Hablará el Espíritu";
    $mail->Body = $mensaje;
    $mail->Send();
    $mail->ClearAddresses(); // Limpiar las direcciones para el siguiente destinatario
}

$mensaje = "Registro de trabajo exitoso. Has sido registrado como COAUTOR del trabajo.<br><br>";

$mensaje .= "El trabajo <b>" . $titulo . "</b> fue registrado con éxito en la categoría <b>" . $tipoPonencia . "</b> con la clave <b>" . $idPonencia . "</b>.<br>";
$mensaje .= "Fecha: " . date('Y-m-d') . "<br><br>";
$mensaje .= "Atentamente,<br><br>";
$mensaje .= "El Comité Organizador del Evento<br>";
$mensaje .= "Por mi Raza Hablará el Espíritu";

// Direcciones de envío
$destinatarios = array($_SESSION['correoElectronico']); // Agrega al autor

if (!empty($coautores)) {
    foreach ($coautores as $coautor) {
        $destinatarios[] = $coautor['correoElectronico']; // Agrega a los coautores si existen
    }
}

// Envío del correo electrónico a todos los destinatarios
foreach ($destinatarios as $destinatario) {
    if ($destinatario !== $_SESSION['correoElectronico']) {
        $mail->addAddress($destinatario);
        $mail->Body = $mensaje;
        $mail->Send();
        $mail->ClearAddresses(); // Limpiar las direcciones para el siguiente destinatario
    }
}

$info = "Registro de trabajo exitoso. Se ha enviado un correo electrónico a su dirección (" . $_SESSION['correoElectronico'] . ") y a la de los coautores (si existen) con la información del registro.";
echo $info;
?>
