<?php

use \PHPMailer\PHPMailer\PHPMailer;
use \PHPMailer\PHPMailer\SMTP;
use \PHPMailer\PHPMailer\PHPException;

require 'Exception.php';
require 'PHPMailer.php';
require 'SMTP.php';
require 'traerCorreoCongreso.php';

//configuracion de la clase phpmailer para envio de correo utilizando
//SMT 
$mail = new PHPMailer();
$mail->IsSMTP();
$mail->SMTPAuth = true;
$mail->SMTPSecure = "ssl";
$mail->Host = "smtp.gmail.com";
$mail->Port = 465;
$email= $correoCongreso;
$mail->Username = $email;
$mail->Password = $hashContra;

///contenido del correro electronico y configuracion de la cuenta 
/// para envio de correo
$mail->From = $email;
$mail->FromName = "CISEMAT";
$mail->Subject = "Evaluacion de taller";

$mail->MsgHTML("Le informamos con agrado que el Comité Evaluador ha evaluado su Taller 
	            y éste ha sido <b> ACEPTADO</b> 
	            para ser impartido en el Congreso Internacional sobre la Enseñanza y 
	            Aplicación de las Matemáticas.<br>
	            <br><br>
	            Se adjunta en éste correo la carta de aceptacion de su trabajo.<br><br>
				No olvide realizar su pago para obtener su constancia<br><br>
				Esperamos contar con su participación");
//direccon de envio
$mail->AddAddress ($emailAutor);

///agregar pdf solo utilizar menos de 3megas 
//ya que de lo contrario el archivo se puede corromper

$mail->AddAttachment('cartas/extensos/'.$idPonencia, $idPonencia.'.pdf');
$mail->IsHTML(true);

$mail->CharSet = 'UTF-8';

if(!$mail->Send()) {
//si hay un error en el envio de correo se informa

echo "Error: " . $mail->ErrorInfo;
} else {
echo "<br>Se ha enviado un correo al autor informándole del resultado de la evaluación de su trabajo.<br>";
}

?>
