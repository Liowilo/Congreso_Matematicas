<?php
/*
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
$mail->MsgHTML("Le informamos que el Comité Evaluador ha evaluado su trabajo extenso, determinando que debe corregirse en uno o mas aspectos.<br>
				        <br>El documento PDF adjunto en éste correo contiene las observaciones y comentarios del Comité sobre éstos aspectos que deberá 
                corregir en su trabajo extenso, para ser sometido a una nueva evaluación y pueda subirlo nuevamente.<br><br>
                Atentamente:<br><br>
                El comite evaluador.
                ");
//direccion de envio

$mail->AddAddress ($emailAutor);
if(count($coautores)!=0){
    for ($i=0; $i <=count($coautores)-1; $i++) { 
    $nombresCoautor=$coautores[$i]["nombres"];
    $apellidosCoautor=$coautores[$i]["apellidos"];
    $emailCoautor=$coautores[$i]["email"];

    $mail->AddAddress ($emailCoautor,'coautor'.$i);
}
}

///agregar pdf solo utilizar menos de 3megas 
//ya que de lo contrario el archivo se puede corromper
$mail->AddAttachment('../../cartas/extensos/'.$idPonencia.'.pdf' , $idPonencia.'.pdf');
$mail->IsHTML(true);

$mail->CharSet = 'UTF-8';

if(!$mail->Send()) {
  //si hay un error en el envio de correo se informa
  echo "Error: " . $mail->ErrorInfo;

}
*/
?>
