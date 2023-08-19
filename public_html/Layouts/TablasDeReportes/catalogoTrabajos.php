<div id="catalogoTrabajos" class=" table-responsive border border-success border-opacity-10 rounded pt-2 px-2 pb-5 mt-4 scroll">
<button class="btn btn-style block px-4 my-2 mx-2" onclick="exportTableToExcel('tableCatalogo', 'Catalogo')">Descargar Excel</button>
<table class="table data" id="tableCatalogo">
    <thead>    
    <tr class="head-table">
        <th scope="col">Id Ponencia</th>
        <th scope="col">Titulo</th>
        <th scope="col">Fecha Registro</th>
        <th scope="col">Tipo</th>
        <th scope="col">Categoria</th>
        <th scope="col">Autor</th>
        <th scope="col">Correo Autor</th>
        <th scope="col">Evaluador</th>
        <th scope="col">Correo Evaluador</th>
        <th scope="col">Estatus</th>
        <th scope="col">Ver Detalles</th>
        <th scope="col">Link Video</th>
    </tr>
    </thead>
    <tbody>
    <tr>
    <?php
        require "../../modelo/reportesCatalogoTrabajos.php";


        while ($fetchTrabajosRegistrados=mysqli_fetch_assoc($resTrabajosRegistrados)) {
            $idPonencia=$fetchTrabajosRegistrados['id_ponencia'];
            //Se da formato al id del trabajo, se debe modificar si el congreso excede los tres digitos
            $idPonenciaFormato=substr("$idPonencia", 0,-2);
            
            $tituloPonencia=$fetchTrabajosRegistrados['titulo_ponencia'];
            $tipoPonencia=$fetchTrabajosRegistrados['categoria_ponencia'];
            $categoriaPonencia=$fetchTrabajosRegistrados['categoria'];
            $fechaRegistroPonencia=$fetchTrabajosRegistrados['fecha_registro_ponencia'];
            $videoPonencia=$fetchTrabajosRegistrados['video_ponencia'];
            //Da formato de fecha
            $date = date_create($fechaRegistroPonencia);
            $fechaRegistroPonenciaFormato=date_format($date,"Y/m/d H:i");

            $idUsuarioRegistra=$fetchTrabajosRegistrados['id_usuario_registra'];
            $idUsuarioEvalua=$fetchTrabajosRegistrados['id_usuario_evalua'];

            $consUsuarioRegistra = "SELECT * FROM usuario WHERE id_usuario='$idUsuarioRegistra'";
            $resUsuarioRegistra = mysqli_query($conexion, $consUsuarioRegistra);
            $fetchUsuarioRegistra=mysqli_fetch_assoc($resUsuarioRegistra);
            $nombreUsuarioRegistra=$fetchUsuarioRegistra['nombres_usuario'];
            $apellidosUsuarioRegistra=$fetchUsuarioRegistra['apellidos_usuario'];
            $emailUsuarioRegistra=$fetchUsuarioRegistra['email_usuario'];

            if($idUsuarioEvalua!=''){
                $consUsuarioEvalua = "SELECT * FROM usuario WHERE id_usuario='$idUsuarioEvalua'";
                $resUsuarioEvalua = mysqli_query($conexion, $consUsuarioEvalua);
                $fetchUsuarioEvalua=mysqli_fetch_assoc($resUsuarioEvalua);
                $nombreUsuarioEvalua=$fetchUsuarioEvalua['nombres_usuario'];
                $apellidoUsuarioEvalua=$fetchUsuarioEvalua['apellidos_usuario'];
                $emailUsuarioEvalua=$fetchUsuarioEvalua['email_usuario'];

                $nombreCompletoEvaluador=$nombreUsuarioEvalua." ".$apellidoUsuarioEvalua;

                //Verifica que tenga revisiones
                $consUsuarioRevisiones = "SELECT * FROM usuario_revision_ponencia WHERE id_ponencia='$idPonencia'";
                
                $resUsuarioRevisiones = mysqli_query($conexion, $consUsuarioRevisiones);
                $fetchUsuarioRevisiones = mysqli_fetch_assoc($resUsuarioRevisiones);
                if($fetchUsuarioRevisiones){
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
                }
            }else{
                $nombreCompletoEvaluador='NO ASIGNADO';
                $emailUsuarioEvalua='NO ASIGNADO';
                $descripcionRevisionPonencia='SIN EVALUADOR ASIGNADO';
            }

            
        ?>    
            <td class="text-wrap text-uppercase"><?php echo $idPonenciaFormato ?></td>
            <td class="text-wrap text-uppercase"><?php echo $tituloPonencia; ?></td>
            <td scope="col"><?php echo $fechaRegistroPonenciaFormato; ?></td>
            <td class="text-wrap text-uppercase"><?php echo $tipoPonencia; ?></td>
            <td class="text-wrap text-uppercase"><?php echo $categoriaPonencia; ?></td>
            <td class="text-wrap text-uppercase"><?php echo $nombreUsuarioRegistra." ".$apellidosUsuarioRegistra; ?></td>
            <td class="text-wrap text-uppercase"><a href="mailto:<?php echo $emailUsuarioRegistra ?>"><?php echo $emailUsuarioRegistra ?></a></td>
            <td class="text-wrap text-uppercase"><?php echo $nombreCompletoEvaluador; ?></td>
            <?php
            
            if($emailUsuarioEvalua!='NO ASIGNADO'){
                ?>
                <td class="text-wrap text-uppercase"><a href="mailto:<?php echo $emailUsuarioEvalua ?>"><?php echo $emailUsuarioEvalua ?></a></td>
                <?php
            }else{
                ?>
                <td class="text-wrap text-uppercase"><?php echo $emailUsuarioEvalua ?></td>
                <?php
            }
            
            ?>
            <td class="text-wrap text-uppercase"><?php echo $descripcionRevisionPonencia; ?></td>
            <td class="text-wrap text-uppercase"><a target='_blank' href="../../components/VisualizacionResumen/visualizacionResumen.php?id=<?php echo $idPonencia; ?>&visualizacion=1">Ver</a></td>
            <?php
            if($videoPonencia!=''){
                ?>
                <td scope="col" ><a target="_blank" href='<?php echo $videoPonencia; ?>'>Link Video</a></td>
                <?php
            }else{
                ?>
                <td scope="col">-</td>
                <?php

            }
            ?>
        </tr>
        <?php
            }
            ?>
    </tbody>
</table>
</div>
