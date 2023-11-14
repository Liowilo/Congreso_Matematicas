<?php 

// Obtener la ruta del cartel del congreso 
$consCongreso = "SELECT cartel_congreso FROM `recursos_pagprin`";
$resCongreso = mysqli_query($conexion, $consCongreso);
$fetchCongreso = mysqli_fetch_assoc($resCongreso);

// Obtener la ruta relativa desde la base de datos
$rutaRelativa = $fetchCongreso['cartel_congreso'];
$rutaRelativaSinPuntos = str_replace('..', '', $rutaRelativa);

// Obtener el nombre de dominio del servidor
$nombreDominio = $_SERVER['HTTP_HOST'];

// Construir la ruta completa
$rutaCompleta = "http://$nombreDominio/desarrollo$rutaRelativaSinPuntos";


$rutaImgCookie = $rutaCompleta;

?>
