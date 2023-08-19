<?php
    /** 
    * Este modulo realiza la consulta de todos las Ponencias Orales de todos los congresos
    * Cualquier duda o sugerencia:
    * @author Carlos Tejeda tejeda.araujo.carlos.alfredo@gmail.com
    **/ 
    require "conexion.php";

    $tituloPonencia="";
    $idPonencia="";
    $idTipoPonencia="";
    $categoriaPonencia="";
    $idUsuarioEvalua="";

    //Hace la consulta de los trabajos disponibles en el congreso actual para autor
    $consPonenciasOralesHistorico = "SELECT * FROM ponencia
    INNER JOIN oral ON ponencia.id_ponencia=oral.id_ponencia
    INNER JOIN categoria ON ponencia.id_categoria=categoria.id_categoria
    INNER JOIN tipo_ponencia ON ponencia.id_tipo_ponencia=tipo_ponencia.id_tipo_ponencia
    WHERE ponencia.id_tipo_ponencia='2'
    ORDER BY ponencia.id_ponencia;";
    $resPonenciasOralesHistorico = mysqli_query($conexion, $consPonenciasOralesHistorico);

?>