<?php

require "conexion.php";
require "traerCongresoActual.php";
$consTrabajosRegistrados = "SELECT * FROM ponencia WHERE id_congreso='$idCongreso'";
//Hace la consulta de los trabajos disponibles en el congreso actual para autor
//SELECT * FROM ponencia WHERE id_congreso='16' AND id_usuario_evalua is not null;
// En las siguinetes lineas se extraen los diterentes tipos de trabajos registrados 
// CA = CARTELES   PR = PROTOTIPOS |       SE = SIN EVALUADOR
// PO = PONENCIAS                  |       CE = CON EVALUADOR
// TA = TALLERES                   |
$consCARegistradosSE = "SELECT * FROM ponencia WHERE id_congreso='$idCongreso' AND id_usuario_evalua is null AND substring(id_ponencia, 4, 2) = 'CA'"; //
$consCARegistradosCE = "SELECT * FROM ponencia WHERE id_congreso='$idCongreso' AND id_usuario_evalua is not null AND substring(id_ponencia, 4, 2) = 'CA'";
$consPORegistradosSE = "SELECT * FROM ponencia WHERE id_congreso='$idCongreso' AND id_usuario_evalua is null AND substring(id_ponencia, 4, 2) = 'PO'";
$consPORegistradosCE = "SELECT * FROM ponencia WHERE id_congreso='$idCongreso' AND id_usuario_evalua is not null AND substring(id_ponencia, 4, 2) = 'PO'";
$consTARegistradosSE = "SELECT * FROM ponencia WHERE id_congreso='$idCongreso' AND id_usuario_evalua is null AND substring(id_ponencia, 4, 2) = 'TA'";
$consTARegistradosCE = "SELECT * FROM ponencia WHERE id_congreso='$idCongreso' AND id_usuario_evalua is not null AND substring(id_ponencia, 4, 2) = 'TA'";
$consPRRegistradosSE = "SELECT * FROM ponencia WHERE id_congreso='$idCongreso' AND id_usuario_evalua is null AND substring(id_ponencia, 4, 2) = 'PR'";
$consPRRegistradosCE = "SELECT * FROM ponencia WHERE id_congreso='$idCongreso' AND id_usuario_evalua is not null AND substring(id_ponencia, 4, 2) = 'PR'";
$consTrabajosTotCE = "SELECT * FROM ponencia WHERE id_congreso='$idCongreso' and id_usuario_evalua is not null";
$resTrabajosRegistrados = mysqli_query($conexion, $consTrabajosRegistrados);
$resTrabajosTotCE = mysqli_query($conexion, $consTrabajosTotCE);

$resCAregisSE = mysqli_query($conexion, $consCARegistradosSE);
$resCAregisCE = mysqli_query($conexion, $consCARegistradosCE);

$resPOregisSE = mysqli_query($conexion, $consPORegistradosSE);
$resPOregisCE = mysqli_query($conexion, $consPORegistradosCE);

$resTAregisSE = mysqli_query($conexion, $consTARegistradosSE);
$resTAregisCE = mysqli_query($conexion, $consTARegistradosCE);

$resPRregisSE = mysqli_query($conexion, $consPRRegistradosSE);
$resPRregisCE = mysqli_query($conexion, $consPRRegistradosCE);
?>
 