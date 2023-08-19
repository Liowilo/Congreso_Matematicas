<?php
require "../conexion.php";

$idPonencia=$_GET['id'];

$consBorrarPonencia = "DELETE FROM ponencia WHERE id_ponencia='$idPonencia'";
$resBorrarPonencia = mysqli_query($conexion, $consBorrarPonencia);


header("Location: ../../components/TrabajosRegistrados/trabajosRegistrados.php");


//$fetchTrabajosRegistrados = mysqli_fetch_assoc($resTrabajosRegistrados);





?>