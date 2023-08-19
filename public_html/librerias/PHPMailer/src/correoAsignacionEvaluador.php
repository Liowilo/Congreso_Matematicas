<?php
use \PHPMailer\PHPMailer\PHPMailer;
use \PHPMailer\PHPMailer\SMTP;
use \PHPMailer\PHPMailer\PHPException;

require 'Exception.php';
require 'PHPMailer.php';
require 'SMTP.php';

//configuracion de la clase phpmailer para envio de correo utilizando
//SMT 
$mail = new PHPMailer();
$mail->IsSMTP();
$mail->SMTPAuth = true;
$mail->SMTPSecure = "ssl";
$mail->Host = "smtp.gmail.com";
$mail->Port = 465;
$email= 'congresomatematicas15@gmail.com';
$mail->Username = $email;
$mail->Password = "rsdxrhmuwdcovefj";

///contenifdo del correro electronico y configuracion de la cuenta 
/// para envio de correo
$mail->From = 'congresomatematicas15@gmail.com';
$mail->FromName = "Congreso Internacional de Matemáticas";
$mail->Subject = "Solicitud de revisión de trabajo - Congreso matemáticas";

//mensaje en html 
$mail->MsgHTML("<h4>Estimado evaluador :<br> <br>
                Le informamos que existe un trabajo en el sitio del congreso de matemáticas que requiere
                ser evaluado por usted, esto es debido a que usted es miembro del comite de evaluación 
                del 'Congreso internacional sobre la enseñanza y aplicación de las matemáticas', a celebrarse en 
                la FES Cuautitlán.<br><br>
                Puede verificar sus asignaciones iniciando sesión en la pagina del congreso.
                <br><br>
                Me despido de usted esperando contar con su apoyo para realizar la evaluación de manera oportura.
				        <br><br>Atentamente: <br><br>
                El comite organizador</h4>");
//direccion de envio

$mail->AddAddress ($emailEvaluador);


$mail->IsHTML(true);

$mail->CharSet = 'UTF-8';

if(!$mail->Send()) {
  //si hay un error en el envio de correo se informa
  echo "Error: " . $mail->ErrorInfo;
  
}
?>
