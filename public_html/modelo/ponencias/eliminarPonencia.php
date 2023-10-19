<?php
session_start();


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require "../conexion.php";
require "../../librerias/PHPMailer/src/Exception.php";
require "../../librerias/PHPMailer/src/PHPMailer.php";
require "../../librerias/PHPMailer/src/SMTP.php";
require "../../librerias/PHPMailer/src/traerCorreoCongreso.php";

// Configuración de la clase PHPMailer para el envío de correo utilizando SMTP
$mail = new PHPMailer();
$mail->IsSMTP();
$mail->SMTPAuth = true;
$mail->SMTPSecure = "ssl";
$mail->Host = "smtp.gmail.com";
$mail->Port = 465;
$email= $correoCongreso;
$mail->Username = $email;
$mail->Password = $hashContra;

// Obtener ID de la ponencia a eliminar
$idPonencia = $_GET['id'];

// Consulta para obtener id_usuario del autor
$consultaAutor = "SELECT id_usuario_registra FROM ponencia WHERE id_ponencia='$idPonencia'";
$resultadoAutor = mysqli_query($conexion, $consultaAutor);

if ($filaAutor = mysqli_fetch_assoc($resultadoAutor)) {
    $idUsuarioAutor = $filaAutor['id_usuario_registra'];
    
    // Consulta para obtener email_usuario del autor
    $consultaEmailAutor = "SELECT email_usuario FROM usuario WHERE id_usuario='$idUsuarioAutor'";
    $resultadoEmailAutor = mysqli_query($conexion, $consultaEmailAutor);
    
    if ($filaEmailAutor = mysqli_fetch_assoc($resultadoEmailAutor)) {
        $autorEmail = $filaEmailAutor['email_usuario'];
    }
}

// Consulta para obtener id_usuario de coautores
$consultaCoautores = "SELECT id_usuario FROM usuario_colabora_ponencia WHERE id_ponencia='$idPonencia'";
$resultadoCoautores = mysqli_query($conexion, $consultaCoautores);

$coautoresEmails = array();
while ($filaCoautor = mysqli_fetch_assoc($resultadoCoautores)) {
    $idUsuarioCoautor = $filaCoautor['id_usuario'];
    
    // Consulta para obtener email_usuario de coautor
    $consultaEmailCoautor = "SELECT email_usuario FROM usuario WHERE id_usuario='$idUsuarioCoautor'";
    $resultadoEmailCoautor = mysqli_query($conexion, $consultaEmailCoautor);
    
    if ($filaEmailCoautor = mysqli_fetch_assoc($resultadoEmailCoautor)) {
        $coautoresEmails[] = $filaEmailCoautor['email_usuario'];
    }
}

// Consulta para obtener el título de la ponencia
$consultaTitulo = "SELECT titulo_ponencia FROM ponencia WHERE id_ponencia='$idPonencia'";
$resultadoTitulo = mysqli_query($conexion, $consultaTitulo);
$titulo = "";

if ($filaTitulo = mysqli_fetch_assoc($resultadoTitulo)) {
    $titulo = $filaTitulo['titulo_ponencia'];
}

// Envío de correos electrónicos al autor y coautores
$mail->addAddress($autorEmail); // Agregar al autor
$mail->Body = "Se ha eliminado el trabajo  <b>$titulo</b> con la clave <b>$idPonencia</b>.<br>Fecha: " . date('Y-m-d') . "<br><br>Atentamente,<br>El Comité Organizador del Evento<br>Por mi Raza Hablará el Espíritu";
$mail->Subject = "Se ha eliminado un trabajo";
$mail->isHTML(true);
$mail->CharSet = 'UTF-8';
$mail->From = $email;
$mail->FromName = "Congreso Internacional de Matemáticas";
$mail->Send();
$mail->ClearAddresses();

// Envío de correos electrónicos a los coautores
if (!empty($coautoresEmails)) {
    foreach ($coautoresEmails as $destinatario) {
        $mail->addAddress($destinatario);
        $mail->Body = "Se ha eliminado el trabajo '$titulo'.<br><br>Fecha: " . date('Y-m-d') . "<br><br>Atentamente,<br>El Comité Organizador del Evento<br>Por mi Raza Hablará el Espíritu";
        $mail->Subject = "Se ha eliminado un trabajo";
        $mail->isHTML(true);
        $mail->CharSet = 'UTF-8';
        $mail->From = $email;
        $mail->FromName = "Congreso Internacional de Matemáticas";
        $mail->Send();
        $mail->ClearAddresses(); // Limpiar las direcciones para el siguiente destinatario
    }
}

if (isset($_GET['id'])) {
    $idPonencia = $_GET['id'];
    $consBorrarPonencia = "DELETE FROM ponencia WHERE id_ponencia='$idPonencia'";
    $resBorrarPonencia = mysqli_query($conexion, $consBorrarPonencia);

    if ($resBorrarPonencia) {
        // La ponencia se eliminó correctamente
        echo "La ponencia se eliminó correctamente.";
    } else {
        // Error al eliminar la ponencia
        echo "Error al eliminar la ponencia: " . mysqli_error($conexion);
    }
} else {
    // No se proporcionó un ID válido
    echo "ID de ponencia no válido.";
}

$info = "ELIMINACIÓN de trabajo exitoso. Se ha enviado un correo electrónico al autor y a los coautores (si existen) con la información del registro.";
echo $info;

header("Location: ../../components/TrabajosRegistrados/trabajosRegistrados.php");
?>
