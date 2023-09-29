<?php
/** 
*******************************************************************************************************
* Apartado se actualiza los nuevos recursos del congreso (color, nombre, logos, poster, banner, patrocinadores)
* Cualquier duda o sugerencia:
* @author Ricardo Leaños Medina ricardoleanosmedina@gmail.com y Jayme Ernesto Lin jaymelinbr@gmail.com
*******************************************************************************************************
**/ 
require 'conexion.php';
$imagenSQL5 = "SELECT logo1_congreso FROM recursos_pagprin WHERE idRecurso = '1'";
$traerIMG5 = mysqli_query($conexion, $imagenSQL5);
$rowImagen5 = $traerIMG5->fetch_assoc();
$rutaIMG5 = $rowImagen5['logo1_congreso'];
?>