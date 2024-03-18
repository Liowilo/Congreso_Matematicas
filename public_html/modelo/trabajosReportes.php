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
    $consPonenciasRegistradas = "SELECT * FROM ponencia WHERE id_congreso='$idCongreso' AND id_tipo_ponencia='2' ORDER BY SUBSTRING(id_ponencia, 4, 2) ASC, SUBSTRING(id_ponencia, -3) ASC";
    $resPonenciasRegistradas = mysqli_query($conexion, $consPonenciasRegistradas);

    $etapaTrabajo = $_SESSION['reporte'];
    $pendienteEF = NULL;
    $rechazoTipo = 'R';
    
    // Pendiente por evaluar extenso final
    if($etapaTrabajo == 'EXTENSO REVISION FINAL'){
      $pendienteEF = 'F';
    }

    // Rechazo de extenso
    if($etapaTrabajo == 'EXTENSO REVISION FINAL'){
      $rechazoTipo = 'FR';
    }

    // Consulta tabla temporal NO EVALUADO
    $queryTemporalPendienteEvaluar = "SELECT b.num,
       b.id_ponencia,
       b.titulo_ponencia,
       b.ponente,
       b.email_usuario,
       r.descripcion_revision,
       b.fecha,
       r.estatus_revision,
       b.id_usuario_evalua,
     concat(u.nombres_usuario,' ',u.apellidos_usuario) as Evaluador,
       u.email_usuario as correo_evaluador 
    FROM tmp b, 
     revision r, 
     usuario_revision_ponencia ur, 
     usuario u
    WHERE b.id_ponencia=ur.id_ponencia 
      AND ur.id_revision_ponencia=r.id_revision 
      AND b.fecha=r.fecha_revision
      AND b.id_usuario_evalua=u.id_usuario
      AND r.descripcion_revision = '$etapaTrabajo'
      AND r.estatus_revision = '$pendienteEF'
    ORDER BY b.num";

    // Consulta tabla temporal TRABAJO RECHAZADO
    $queryTemporalPendienteCorregir = "SELECT b.num,
    b.id_ponencia,
    b.titulo_ponencia,
    b.ponente,
    b.email_usuario,
    r.descripcion_revision,
    b.fecha,
    r.estatus_revision,
    b.id_usuario_evalua,
    concat(u.nombres_usuario,' ',u.apellidos_usuario) as Evaluador,
    u.email_usuario as correo_evaluador 
    FROM tmp b, 
    revision r, 
    usuario_revision_ponencia ur, 
    usuario u
    WHERE b.id_ponencia=ur.id_ponencia 
    AND ur.id_revision_ponencia=r.id_revision 
    AND b.fecha=r.fecha_revision
    AND b.id_usuario_evalua=u.id_usuario
    AND r.descripcion_revision = '$etapaTrabajo'
    AND r.estatus_revision = '$rechazoTipo'    
    ORDER BY b.num";

  // Consulta tabla temporal TRABAJO ACEPTADO
    $queryTemporalAprobado = "SELECT b.num,
    b.id_ponencia,
    b.titulo_ponencia,
    b.ponente,
    b.email_usuario,
    r.descripcion_revision,
    b.fecha,
    r.estatus_revision,
    b.id_usuario_evalua,
    concat(u.nombres_usuario,' ',u.apellidos_usuario) as Evaluador,
    u.email_usuario as correo_evaluador 
    FROM tmp b, 
    revision r, 
    usuario_revision_ponencia ur, 
    usuario u
    WHERE b.id_ponencia=ur.id_ponencia 
    AND ur.id_revision_ponencia=r.id_revision 
    AND b.fecha=r.fecha_revision
    AND b.id_usuario_evalua=u.id_usuario
    AND r.descripcion_revision = '$etapaTrabajo'
    AND r.estatus_revision = 'A'
    ORDER BY b.num";

    $ejecucionTMPPendienteEvaluar = mysqli_query($conexion, $queryTemporalPendienteEvaluar);
    $ejecucionTMPPendienteCorregir = mysqli_query($conexion, $queryTemporalPendienteCorregir);
    $ejecucionTMPAprobado = mysqli_query($conexion, $queryTemporalAprobado);
?>