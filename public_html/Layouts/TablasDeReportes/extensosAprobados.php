<div id="extensosAprobados" class="scroll table-responsive border border-success border-opacity-10 rounded pt-2 px-2 pb-5 mt-4" style="max-height: 800px;">
    <table class="table">
        <tr class="head-table">
            <th scope="col">Id Ponencia</th>
            <th scope="col">Titulo</th>
            <th scope="col">Fecha Registro</th>
            <th scope="col">Categoria</th>
            <th scope="col">Autor</th>
            <th scope="col">Correo Autor</th>
            <th scope="col">Evaluador</th>
            <th scope="col">Correo Evaluador</th>
            <th scope="col">Ver Detalles</th>
            <th scope="col">Extenso</th>
            <th scope="col">Link Video</th>
        </tr>
        </thead>
        <tbody>
            <tr>
                <?php
                //Trabajo aprobado del Autor
                require "../../modelo/trabajosReportes.php";


                while ($fetchPonenciasRegistradas = mysqli_fetch_assoc($resPonenciasRegistradas)) {
                    $tituloPonencia = $fetchPonenciasRegistradas['titulo_ponencia'];
                    $idPonencia = $fetchPonenciasRegistradas['id_ponencia'];
                    //Se da formato al id del trabajo, se debe modificar si el congreso excede los tres digitos
                    $idPonenciaFormato = $idPonencia;
                    $idTipoPonencia = $fetchPonenciasRegistradas['id_tipo_ponencia'];
                    $idUsuarioRegistra = $fetchPonenciasRegistradas['id_usuario_registra'];
                    $idUsuarioEvalua = $fetchPonenciasRegistradas['id_usuario_evalua'];
                    $videoPonencia = $fetchPonenciasRegistradas['video_ponencia'];
                    $fechaRegistroPonencia = $fetchPonenciasRegistradas['fecha_registro_ponencia'];
                    //Da formato de fecha
                    $date = date_create($fechaRegistroPonencia);
                    $fechaRegistroPonenciaFormato = date_format($date, "Y/m/d H:i");

                    //Verificacion de la revision más actual.
                    /*
        Esta consulta verifica la revision más reciente y la muestra
        
        SELECT * FROM revision WHERE revision.fecha_revision=(SELECT MAX(fecha_revision) FROM revision 
                                                     INNER JOIN usuario_revision_ponencia ON revision.id_revision=usuario_revision_ponencia.id_revision_ponencia
                                                     WHERE usuario_revision_ponencia.id_ponencia=3);
        */
                    if ($idUsuarioEvalua != "") {
                        //Consulta la categoria de la ponencia
                        $consTipoPonencia = "SELECT * FROM tipo_ponencia WHERE id_tipo_ponencia='$idTipoPonencia'";
                        $resTipoPonencia = mysqli_query($conexion, $consTipoPonencia);
                        $fetchTipoPonencia = mysqli_fetch_assoc($resTipoPonencia);
                        $categoriaPonencia = $fetchTipoPonencia['categoria_ponencia'];
                        if ($idTipoPonencia = '2') {
                            //Verifica que tenga revisiones
                            $consUsuarioRevisiones = "SELECT * FROM usuario_revision_ponencia WHERE id_ponencia='$idPonencia'";

                            $resUsuarioRevisiones = mysqli_query($conexion, $consUsuarioRevisiones);
                            $fetchUsuarioRevisiones = mysqli_fetch_assoc($resUsuarioRevisiones);
                            if ($fetchUsuarioRevisiones) {
                                $consUsuarioRevisionPonencia = "SELECT * FROM revision WHERE revision.fecha_revision=(SELECT MAX(fecha_revision) FROM revision 
                INNER JOIN usuario_revision_ponencia ON revision.id_revision=usuario_revision_ponencia.id_revision_ponencia
                WHERE usuario_revision_ponencia.id_ponencia='$idPonencia')";

                                $resUsuarioRevisionPonencia = mysqli_query($conexion, $consUsuarioRevisionPonencia);
                                $fetchUsuarioRevisionPonencia = mysqli_fetch_assoc($resUsuarioRevisionPonencia);
                                //Campos de la revision
                                $estadoRevisionPonencia = $fetchUsuarioRevisionPonencia['estatus_revision'];
                                $descripcionRevisionPonenciaSF = $fetchUsuarioRevisionPonencia['descripcion_revision'];
                                if ($estadoRevisionPonencia == NULL) {
                                    $descripcionRevisionPonencia = $descripcionRevisionPonenciaSF . ". PENDIENTE POR REVISAR.";
                                } else {
                                    $descripcionRevisionPonencia = $descripcionRevisionPonenciaSF . ". TRABAJO EN REVISIÓN.";
                                }
                                $fechaRevisionPonencia = $fetchUsuarioRevisionPonencia['fecha_revision'];
                                //Da formato de fecha
                                $date = date_create($fechaRevisionPonencia);
                                $fechaRevisionPonenciaFormato = date_format($date, "Y/m/d H:i");

                                if ($estadoRevisionPonencia == 'A') {
                                    //Trae el extenso
                                    $consPonencia = "SELECT * FROM oral WHERE id_ponencia='$idPonencia'";
                                    $resPonencia = mysqli_query($conexion, $consPonencia);
                                    $fetchPonencia = mysqli_fetch_assoc($resPonencia);
                                    $extensoPonencia = $fetchPonencia['extenso_oral'];
                                    //Consulta evaluadores
                                    $consEvaluadores = "SELECT * FROM usuario WHERE id_usuario='$idUsuarioEvalua'";
                                    $resEvaluadores = mysqli_query($conexion, $consEvaluadores);
                                    $fetchUsuarioEvalua = mysqli_fetch_assoc($resEvaluadores);
                                    $nombreUsuarioEvalua = $fetchUsuarioEvalua['nombres_usuario'];
                                    $apellidoUsuarioEvalua = $fetchUsuarioEvalua['apellidos_usuario'];
                                    $emailUsuarioEvalua = $fetchUsuarioEvalua['email_usuario'];
                                    $nombreCompletoEvaluador = $nombreUsuarioEvalua . " " . $apellidoUsuarioEvalua;
                                    //Consulta autor
                                    $consUsuarioRegistra = "SELECT * FROM usuario WHERE id_usuario='$idUsuarioRegistra'";
                                    $resUsuarioRegistra = mysqli_query($conexion, $consUsuarioRegistra);
                                    $fetchUsuarioRegistra = mysqli_fetch_assoc($resUsuarioRegistra);
                                    $nombreUsuarioRegistra = $fetchUsuarioRegistra['nombres_usuario'];
                                    $apellidosUsuarioRegistra = $fetchUsuarioRegistra['apellidos_usuario'];
                                    $emailUsuarioRegistra = $fetchUsuarioRegistra['email_usuario'];


                ?>
                                    <td class="text-wrap text-uppercase"><?php echo $idPonenciaFormato; ?></td>
                                    <td class="text-wrap text-uppercase"><?php echo $tituloPonencia; ?></td>
                                    <td scope="col"><?php echo $fechaRegistroPonenciaFormato; ?></td>
                                    <td class="text-wrap text-uppercase"><?php echo $categoriaPonencia; ?></td>
                                    <td class="text-wrap text-uppercase"><?php echo $nombreUsuarioRegistra . " " . $apellidosUsuarioRegistra; ?></td>
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
                }
?>
        </tbody>
    </table>
</div>