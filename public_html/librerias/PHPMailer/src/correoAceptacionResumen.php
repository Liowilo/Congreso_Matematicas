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
$mail->Subject = "Evaluacion de propuesta";

//mensaje en html 
$mail->MsgHTML("Le informamos con agrado que el Comité Evaluador ha evaluado el RESUMEN de su trabajo y éste ha sido <b>ACEPTADO</b> 
	            para formar parte del Congreso Internacional sobre la Enseñanza y Aplicación de las Matemáticas.<br><br>
	            Para que sea programada su ponencia es necesario realizar el extenso, cartel o video de su taller y subirlo al sitio del congreso, 
	            por ningún motivo se reciben trabajos por otro medio que no sea el sitio del evento. <br>
                <br><br>
                En caso de no subir su trabajo no podrá ser programada su ponencia.<br>
                Alumnos de educación media, media superior y superior que participan en las ponencias orales, carteles o talleres no podran ser expositores o ponentes.<br>

				<br>Se adjunta en éste correo la carta de aceptacion de su trabajo.<br><br>
				Esperamos contar con su participación<br>
				Atentamente: El comite organizador ");
//direccon de envio
$mail->AddAddress ($emailAutor);
if(count($coautores)!=0){
    for ($i=0; $i <=count($coautores)-1; $i++) { 
    $nombresCoautor=$coautores[$i]["nombres"];
    $apellidosCoautor=$coautores[$i]["apellidos"];
    $emailCoautor=$coautores[$i]["email"];

    $mail->AddAddress ($emailCoautor,'coautor'.$i);
    //$pdf -> Ln(1);
}
}

///agregar pdf solo utilizar menos de 3megas 
//ya que de lo contrario el archivo se puede corromper
$mail->AddAttachment('../../cartas/resumen/'.$idPonencia.'.pdf' , $isPonencia.'.pdf');
$mail->IsHTML(true);

$mail->CharSet = 'UTF-8';

if(!$mail->Send()) {
//si hay un error en el envio de correo se informa

echo "Error: " . $mail->ErrorInfo;
}

?>
