<?php
    /** 
    * Este modulo realiza la consulta de todos los trabajos registrados en el congreso actual
    * y los trabajos de tipo ponencia oral para los reportes de administrador.
    * Cualquier duda o sugerencia:
    * @author Carlos Tejeda tejeda.araujo.carlos.alfredo@gmail.com
    **/ 
    require "conexion.php";
    require "traerCongresoActual.php";

    $tituloPonencia="";
    $idPonencia="";
    $idTipoPonencia="";
    $categoriaPonencia="";
    $idUsuarioEvalua="";
    //Congreso
    //$idCongreso="15";

    //Hace la consulta de los trabajos disponibles en el congreso actual para todas los trabajos
    $consTrabajosRegistrados = "SELECT * FROM ponencia WHERE id_congreso='$idCongreso' ORDER BY id_tipo_ponencia";
    $resTrabajosRegistrados = mysqli_query($conexion, $consTrabajosRegistrados);

    //Hace la consulta de los trabajos disponibles en el congreso actual para ponencias
    $consPonenciasRegistradas = "SELECT * FROM ponencia WHERE id_congreso='$idCongreso' AND id_tipo_ponencia='2'";
    $resPonenciasRegistradas = mysqli_query($conexion, $consPonenciasRegistradas);

?>