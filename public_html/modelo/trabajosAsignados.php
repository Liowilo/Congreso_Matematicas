<?php
    /** 
    * Este modulo realiza la consulta de todos los trabajos asignados y el hsitorial del evaluador en el congreso actual.
    * Cualquier duda o sugerencia:
    * @author Carlos Tejeda tejeda.araujo.carlos.alfredo@gmail.com
    **/ 
    require "conexion.php";
    require "traerCongresoActual.php";
    //Trae todas las ponencias que tiene asignado el evaluador en el congreso actual
    $idEvaluador=$_SESSION['id'];
    $consPonenciasPendientesEvaluador="SELECT * FROM ponencia WHERE id_usuario_evalua='$idEvaluador' AND id_congreso='$idCongreso'";
    $resPonenciasPendientesEvaluador=mysqli_query($conexion,$consPonenciasPendientesEvaluador);

    $consPonenciasEvaluadorHistorial="SELECT * FROM ponencia WHERE id_usuario_evalua='$idEvaluador' AND id_congreso='$idCongreso'";
    $resPonenciasEvaluadorHistorial=mysqli_query($conexion,$consPonenciasEvaluadorHistorial);

?>