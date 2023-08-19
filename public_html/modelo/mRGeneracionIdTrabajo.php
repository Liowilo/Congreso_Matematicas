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
    $consNumeroCartelesCongreso = "SELECT * FROM ponencia
    INNER JOIN cartel ON ponencia.id_ponencia=cartel.id_ponencia
    WHERE ponencia.id_congreso='$idCongreso' AND cartel.id_ponencia=(SELECT MAX(id_ponencia) FROM cartel)";
    $resNumeroCartelesCongreso=mysqli_query($conexion,$consNumeroCartelesCongreso);
    if(mysqli_num_rows($resNumeroCartelesCongreso)>0){
        $fetchNumeroCartelesCongreso = mysqli_fetch_assoc($resNumeroCartelesCongreso);
        $idPonenciaCartel=$fetchNumeroCartelesCongreso['id_ponencia'];
    }else{
        $idPonenciaCartel='CASM00000';
    }

    $numeroCartelesCongreso=substr("$idPonenciaCartel", 4,-2);
    $numeroCartelesCongreso=$numeroCartelesCongreso+1;
    
    
    //Consulta el número de ponencias orales del congreso
    $consNumeroPonenciasCongreso = "SELECT * FROM ponencia
    INNER JOIN oral ON ponencia.id_ponencia=oral.id_ponencia
    WHERE ponencia.id_congreso='$idCongreso' AND oral.id_ponencia=(SELECT MAX(id_ponencia) FROM oral)";
    $resNumeroPonenciasCongreso=mysqli_query($conexion,$consNumeroPonenciasCongreso);
    if(mysqli_num_rows($resNumeroPonenciasCongreso)>0){
        $fetchNumeroPonenciasCongreso = mysqli_fetch_assoc($resNumeroPonenciasCongreso);
        $idPonenciaOral=$fetchNumeroPonenciasCongreso['id_ponencia'];
    }else{
        $idPonenciaOral='POSM00000';
    }

    $numeroPonenciasCongreso=substr("$idPonenciaOral", 4,-2);
    $numeroPonenciasCongreso=$numeroPonenciasCongreso+1;


    
    //Consulta el número de talleres del congreso
    $consNumeroTalleresCongreso = "SELECT * FROM ponencia
    INNER JOIN taller ON ponencia.id_ponencia=taller.id_ponencia
    WHERE ponencia.id_congreso='$idCongreso' AND taller.id_ponencia=(SELECT MAX(id_ponencia) FROM taller)";
    $resNumeroTalleresCongreso=mysqli_query($conexion,$consNumeroTalleresCongreso);
    if(mysqli_num_rows($resNumeroTalleresCongreso)>0){
        $fetchNumeroTalleresCongreso = mysqli_fetch_assoc($resNumeroTalleresCongreso);
        $idPonenciaTaller=$fetchNumeroTalleresCongreso['id_ponencia'];
    }else{
        $idPonenciaTaller='TASM00000';
    }

    $numeroTalleresCongreso=substr("$idPonenciaTaller", 4,-2);
    $numeroTalleresCongreso=$numeroTalleresCongreso+1;

    
   
    //Consulta el número de prototipos del congreso
    $consNumeroPrototiposCongreso = "SELECT * FROM ponencia
    INNER JOIN prototipo ON ponencia.id_ponencia=prototipo.id_ponencia
    WHERE ponencia.id_congreso='$idCongreso' AND prototipo.id_ponencia=(SELECT MAX(id_ponencia) FROM prototipo)";
    $resNumeroPrototiposCongreso=mysqli_query($conexion,$consNumeroPrototiposCongreso);

    if(mysqli_num_rows($resNumeroPrototiposCongreso)>0){
        $fetchNumeroPrototiposCongreso = mysqli_fetch_assoc($resNumeroPrototiposCongreso);
        $idPonenciaPrototipo=$fetchNumeroPrototiposCongreso['id_ponencia'];
    }else{
        $idPonenciaPrototipo='PRSM00000';
    }

    $numeroPrototiposCongreso=substr("$idPonenciaPrototipo", 4,-2);
    $numeroPrototiposCongreso=$numeroPrototiposCongreso+1;


    /** 
    *******************************************************************************************************
    *******************************************************************************************************
    **/    

?>