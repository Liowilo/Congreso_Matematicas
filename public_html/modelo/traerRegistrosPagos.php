<?php
require "../../modelo/conexion.php";
require "../../modelo/traerCongresoActual.php"; 

//Hace la consulta de los trabajos disponibles en el congreso actual para autor
$consDatosPago = "SELECT * FROM pago WHERE id_congreso='$idCongreso'";
$resDatosPago = mysqli_query($conexion, $consDatosPago);

?>