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
$mail->Subject = "Registro de trabajo exitoso";
$mail->isHTML(true);
$mail->CharSet = 'UTF-8';
$email2 = '';
// Construcción del mensaje del correo
if ($_SESSION['correoElectronico'] === $email2) {
    // Si el correo es de la sesión, se dice que es el coautor de la ponencia
    $mensaje = "Registro de trabajo exitoso. Has sido registrado como autor del trabajo.<br><br>";
} else {
    // Si el correo es del array coautores, se dice que fue registrado como coautor del trabajo
    $mensaje = "Registro de trabajo exitoso. Has sido registrado como coautor del trabajo.<br><br>";
}

$mensaje .= "El trabajo <b>" . $titulo . "</b> fue registrado con éxito en la categoría <b>" . $tipoPonencia . "</b>.<br>";
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
    $mail->addAddress($destinatario); // Utiliza el método addAddress() en lugar de AddAddress()
    $mail->Body = $mensaje;
    if ($destinatario == $_SESSION['correoElectronico']) {
        $email2 = $_SESSION['correoElectronico'];
    } else {
        $email2 = '';
    }
    if (!$mail->Send()) {
        // Si hay un error en el envío de correo, se muestra un mensaje de error
        echo "Error: " . $mail->ErrorInfo;
    } else {
    }
    $mail->ClearAddresses(); // Limpiar las direcciones para el siguiente destinatario
}
$info = "Registro de trabajo exitoso. Se ha enviado un correo electrónico a su dirección (" . $_SESSION['correoElectronico'] . ") y a la de los coautores (si existen) con la información del registro.";
echo $info;

