<?php
    /** 
    * Este modulo realiza la consulta de todos los trabajos registrados como Autor y Coautor, 
    * y el historial como Autor y Coautor en el congreso actual.
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

    //Hace la consulta de los trabajos disponibles en el congreso actual para autor
    $consTrabajosRegistrados = "SELECT * FROM ponencia WHERE id_usuario_registra='$_SESSION[id]' AND id_congreso='$idCongreso'";
    $resTrabajosRegistrados = mysqli_query($conexion, $consTrabajosRegistrados);

    //Hace la consulta de los trabajos disponibles de todos los congresos
    $consTrabajosRegistradosHistorial = "SELECT * FROM ponencia WHERE id_usuario_registra='$_SESSION[id]'";
    $resTrabajosRegistradosHistorial = mysqli_query($conexion, $consTrabajosRegistradosHistorial);

    //Hace la consulta de los trabajos disponibles en el congreso para coautor
    $consTrabajosRegistradosCoautor = "SELECT * FROM ponencia 
    INNER JOIN usuario_colabora_ponencia ON ponencia.id_ponencia=usuario_colabora_ponencia.id_ponencia
        WHERE ponencia.id_congreso='$idCongreso' AND usuario_colabora_ponencia.id_usuario='$_SESSION[id]'";
    $resTrabajosRegistradosCoautor = mysqli_query($conexion, $consTrabajosRegistradosCoautor);


?>