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

///contenido del correro electronico y configuracion de la cuenta 
/// para envio de correo
$mail->From = $email;
$mail->FromName = "Congreso Internacional de Matemáticas";
$mail->Subject = "Evaluacion de trabajo extenso";

//mensaje en html 
$mail->MsgHTML("Le informamos con agrado que el Comité Evaluador ha evaluado su trabajo extenso y éste ha sido <b>ACEPTADO</b> y formara parte de las Memorias del Congreso Internacional sobre la Enseñanza y Aplicación de las Matemáticas.<br>
				<br>Se adjunta en éste correo la carta de aceptacion de su trabajo.<br><br>Esperamos su participación");
//direccon de envio

$mail->AddAddress($emailAutor);


///agregar pdf solo utilizar menos de 3megas 
//ya que de lo contrario el archivo se puede corromper
$mail->AddAttachment('../../cartas/extensos/'.$idPonencia.'.pdf' , $idPonencia.'.pdf');
$mail->IsHTML(true);

$mail->CharSet = 'UTF-8';

if(!$mail->Send()) {
//si hay un error en el envio de correo se informa

echo "Error: " . $mail->ErrorInfo;
}

?>
