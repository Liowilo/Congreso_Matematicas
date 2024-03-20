<?php
// Modulo que trae trabajos de memorias
// Todos los trabajos en EXTENSO REVISION FINAL y estan APROBADOS
// Hecho por Ricardo Leaños Medina dudas: ricardoleanosmedina@gmail.com


require "conexion.php";
require "traerCongresoActual.php";

$queryTrabajosMemorias = "SELECT oral.id_ponencia, 
oral.extenso_oral, 
ponencia.titulo_ponencia,
concat(usuario.nombres_usuario,' ',usuario.apellidos_usuario) as Autor,
usuario.email_usuario,
revision.descripcion_revision,
revision.estatus_revision
FROM oral 
JOIN ponencia ON oral.id_ponencia = ponencia.id_ponencia 
JOIN revision on  revision.id_revision LIKE CONCAT ('%', oral.id_ponencia, '%')
JOIN usuario ON ponencia.id_usuario_registra = usuario.id_usuario
WHERE oral.id_usuario_evalua_final = 751 
AND revision.descripcion_revision = 'EXTENSO REVISION FINAL'
AND revision.estatus_revision = 'A'
AND ponencia.id_congreso = '$idCongreso'
ORDER BY SUBSTRING(oral.id_ponencia, 8, 3) ASC";
// Cuando se corrija el error del hash debe ser cambiado el JOIN revision on  revision.id_revision LIKE CONCAT ('%', oral.id_ponencia, '%') por el id

$trabajosFinales = mysqli_query($conexion, $queryTrabajosMemorias);
?>