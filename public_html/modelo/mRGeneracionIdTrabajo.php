<?php
require "conexion.php";
require "traerCongresoActual.php";

    /** 
    *******************************************************************************************************
    *******************************************************************************************************
    **/
    /** 
    *******************************************************************************************************
    * Consultas para la generación de códigos de trabajos
    *******************************************************************************************************
    **/ 
    //Consulta el número de carteles del congreso

    
    $consNumeroCartelesCongreso = "SELECT MAX(id_ponencia) AS max_id FROM ponencia WHERE substring(id_ponencia, 1, 2) = 'CA' AND id_congreso='$idCongreso'";
    $resNumeroCartelesCongreso = mysqli_query($conexion, $consNumeroCartelesCongreso);
    if (mysqli_num_rows($resNumeroCartelesCongreso) > 0) {
        $fetchNumeroCartelesCongreso = mysqli_fetch_assoc($resNumeroCartelesCongreso);
        $idPonenciaCartel = $fetchNumeroCartelesCongreso['max_id'];
    } else {
        $idPonenciaCartel = 'CASM000';
    }
    $numeroCartelesCongreso = (int)substr("$idPonenciaCartel", 4) + 1;
    
    //Consulta el número de ponencias orales del congreso
    
    $consNumeroPonenciasCongreso = "SELECT MAX(id_ponencia) AS max_id FROM ponencia WHERE substring(id_ponencia, 1, 2) = 'PO' AND id_congreso='$idCongreso'";
    $resNumeroPonenciasCongreso = mysqli_query($conexion, $consNumeroPonenciasCongreso);
    if (mysqli_num_rows($resNumeroPonenciasCongreso) > 0) {
        $fetchNumeroPonenciasCongreso = mysqli_fetch_assoc($resNumeroPonenciasCongreso);
        $idPonenciaOral = $fetchNumeroPonenciasCongreso['max_id'];
    } else {
        $idPonenciaOral = 'POSM000';
    }
    $numeroPonenciasCongreso = (int)substr("$idPonenciaOral", 4) + 1;
    
    //Consulta el número de talleres del congreso

    $consNumeroTalleresCongreso = "SELECT MAX(id_ponencia) AS max_id FROM ponencia WHERE substring(id_ponencia, 1, 2) = 'TA' AND id_congreso='$idCongreso'";
    $resNumeroTalleresCongreso = mysqli_query($conexion, $consNumeroTalleresCongreso);
    if (mysqli_num_rows($resNumeroTalleresCongreso) > 0) {
        $fetchNumeroTalleresCongreso = mysqli_fetch_assoc($resNumeroTalleresCongreso);
        $idPonenciaTaller = $fetchNumeroTalleresCongreso['max_id'];
    } else {
        $idPonenciaTaller = 'TASM000';
    }
    $numeroTalleresCongreso = (int)substr("$idPonenciaTaller", 4) + 1;
   
    //Consulta el número de prototipos del congreso

    $consNumeroPrototiposCongreso = "SELECT MAX(id_ponencia) AS max_id FROM ponencia WHERE substring(id_ponencia, 1, 2) = 'PR' AND id_congreso='$idCongreso'";
    $resNumeroPrototiposCongreso = mysqli_query($conexion, $consNumeroPrototiposCongreso);
    if (mysqli_num_rows($resNumeroPrototiposCongreso) > 0) {
        $fetchNumeroPrototiposCongreso = mysqli_fetch_assoc($resNumeroPrototiposCongreso);
        $idPonenciaPrototipo = $fetchNumeroPrototiposCongreso['max_id'];
    } else {
        $idPonenciaPrototipo = 'PRSM000';
    }
    $numeroPrototiposCongreso = (int)substr("$idPonenciaPrototipo", 4) + 1;
    /** 
    *******************************************************************************************************
    *******************************************************************************************************
    **/    

?>
