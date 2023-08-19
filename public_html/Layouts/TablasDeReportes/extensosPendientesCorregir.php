<div id="extensosPendientesCorregir"  class="scroll table-responsive border border-success border-opacity-10 rounded pt-2 px-2 pb-5 mt-4">
<table class="table">
    <tr class="head-table">
        <th scope="col">Id Ponencia</th>
        <th scope="col">Titulo</th>
        <th scope="col">Fecha Registro</th>
        <th scope="col">Fecha Correción</th>
        <th scope="col">Autor</th>
        <th scope="col">Correo Autor</th>
        <th scope="col">Evaluador</th>
        <th scope="col">Correo del Evaluador</th>
        <th scope="col">Ver Detalles</th>
        <th scope="col">Extenso</th>
    </tr>
    </thead>
    <tbody>
    <tr>
    <?php
        require "../../modelo/trabajosReportes.php";
        while($fetchPonenciasRegistradas = mysqli_fetch_assoc($resPonenciasRegistradas)){
            $tituloPonencia=$fetchPonenciasRegistradas['titulo_ponencia'];
            $idPonencia=$fetchPonenciasRegistradas['id_ponencia'];
            //Se da formato al id del trabajo, se debe modificar si el congreso excede los tres digitos
            $idPonenciaFormato=substr("$idPonencia", 0,-2);
            $idTipoPonencia=$fetchPonenciasRegistradas['id_tipo_ponencia'];
            $idUsuarioEvalua=$fetchPonenciasRegistradas['id_usuario_evalua'];
            $fechaRegistroPonencia=$fetchPonenciasRegistradas['fecha_registro_ponencia'];
            //Da formato de fecha
            $date = date_create($fechaRegistroPonencia);
            $fechaRegistroPonenciaFormato=date_format($date,"Y/m/d H:i");
    
            //Verificacion de la revision más actual.
            /*
            Esta consulta verifica la revision más reciente y la muestra
            
            SELECT * FROM revision WHERE revision.fecha_revision=(SELECT MAX(fecha_revision) FROM revision 
                                                         INNER JOIN usuario_revision_ponencia ON revision.id_revision=usuario_revision_ponencia.id_revision_ponencia
                                                         WHERE usuario_revision_ponencia.id_ponencia=3);
            */
            if($idUsuarioEvalua!=""){  
                //Trae el nombre del evaluador
                //Consulta evaluadores
                $consEvaluadores = "SELECT * FROM usuario WHERE id_usuario='$idUsuarioEvalua'";
                $resEvaluadores = mysqli_query($conexion, $consEvaluadores);
                $fetchEvaluadores = mysqli_fetch_assoc($resEvaluadores);
                $nombreEvaluador=$fetchEvaluadores['nombres_usuario'];
                //Verifica que tenga revisiones
                $consUsuarioRevisiones = "SELECT * FROM usuario_revision_ponencia WHERE id_ponencia='$idPonencia'";
                
                $resUsuarioRevisiones = mysqli_query($conexion, $consUsuarioRevisiones);
                $fetchUsuarioRevisiones = mysqli_fetch_assoc($resUsuarioRevisiones);
                if(mysqli_num_rows($resUsuarioRevisiones)>0){
                    $consUsuarioRevisionPonencia = "SELECT * FROM revision WHERE revision.fecha_revision=(SELECT MAX(fecha_revision) FROM revision 
                    INNER JOIN usuario_revision_ponencia ON revision.id_revision=usuario_revision_ponencia.id_revision_ponencia
                    WHERE usuario_revision_ponencia.id_ponencia='$idPonencia')";
                    
                    $resUsuarioRevisionPonencia = mysqli_query($conexion, $consUsuarioRevisionPonencia);
                    $fetchUsuarioRevisionPonencia = mysqli_fetch_assoc($resUsuarioRevisionPonencia);
                    //Campos de la revision
                    $estadoRevisionPonencia=$fetchUsuarioRevisionPonencia['estatus_revision'];
                    $descripcionRevisionPonencia=$fetchUsuarioRevisionPonencia['descripcion_revision'];
                    $fechaRevisionPonencia=$fetchUsuarioRevisionPonencia['fecha_revision'];
                    //Da formato de fecha
                    $date = date_create($fechaRevisionPonencia);
                    $fechaRevisionPonenciaFormato=date_format($date,"Y/m/d H:i");
    
                    if($estadoRevisionPonencia=='R'){
                    //Consulta la categoria de la ponencia
                    $consTipoPonencia = "SELECT * FROM tipo_ponencia WHERE id_tipo_ponencia='$idTipoPonencia'";
                    $resTipoPonencia = mysqli_query($conexion, $consTipoPonencia);
                    $fetchTipoPonencia = mysqli_fetch_assoc($resTipoPonencia);
                    $categoriaPonencia=$fetchTipoPonencia['categoria_ponencia'];  
                    //Trae el extenso
                    $consPonencia = "SELECT * FROM oral WHERE id_ponencia='$idPonencia'";
                    $resPonencia = mysqli_query($conexion, $consPonencia);
                    $fetchPonencia = mysqli_fetch_assoc($resPonencia);
                    $extensoPonencia=$fetchPonencia['extenso_oral'];
                    
        ?>
        <td class="text-wrap text-uppercase"><?php echo $idPonenciaFormato; ?></td>
        <td class="text-wrap text-uppercase"><?php echo $tituloPonencia; ?></td>
        <td scope="col"><?php echo $fechaRegistroPonenciaFormato; ?></td>
        <td scope="col"><?php echo $fechaRevisionPonenciaFormato; ?></td>
        <td class="text-wrap text-uppercase"><?php echo $nombreUsuarioRegistra." ".$apellidosUsuarioRegistra; ?></td>
        <td class="text-wrap text-uppercase"><a href="mailto:<?php echo $emailUsuarioRegistra ?>"><?php echo $emailUsuarioRegistra ?></a></td>
        <td class="text-wrap text-uppercase"><?php echo $nombreCompletoEvaluador; ?></td>
        <td class="text-wrap text-uppercase"><a href="mailto:<?php echo $emailUsuarioEvalua ?>"><?php echo $emailUsuarioEvalua ?></a></td>
        <td class="text-wrap text-uppercase"><a target='_blank' href="../../components/VisualizacionResumen/visualizacionResumen.php?id=<?php echo $idPonencia; ?>&visualizacion=1">Ver</a></td>
        <td class="text-wrap text-uppercase"><a href="<?php echo $extensoPonencia ?>">Descargar</a></td>
    </tr>
    <?php
                    }
                }
            }
        }
    ?>
    </tbody>
</table>
</div>