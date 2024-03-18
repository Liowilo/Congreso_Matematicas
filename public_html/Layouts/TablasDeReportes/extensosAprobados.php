<div id="extensosAprobados" class="scroll table-responsive border border-success border-opacity-10 rounded pt-2 px-2 pb-5 mt-4" style="max-height: 800px;">
    <?php
    //En caso de que el autor tenga ponencias
    require "../../modelo/trabajosReportes.php";

    if ($etapaTrabajo == 'RESUMEN') {
        echo '<h5>Los resumenes ACEPTADOS son los que tienen pendiente enviar su EXTENSO</h5>';
    }

    if ($etapaTrabajo == 'EXTENSO') {
        echo '<h5>Los extensos ACEPTADOS pasan automaticamente a la etapa EXTENSOS FINALES pendientes por evaluar</h5>';
    }
    ?>
    <table class="table">
        <tr class="head-table">
            <th scope="col">Id Ponencia</th>
            <th scope="col">Titulo</th>
            <th scope="col">Autor</th>
            <th scope="col">Correo Autor</th>
            <th scope="col">Descripción revisión</th>
            <th scope="col">Estatus revisión</th>
            <th scope="col">Fecha</th>
            <th scope="col">Evaluador</th>
            <th scope="col">Correo del Evaluador</th>
        </tr>
        </thead>
        <tbody>
            <?php
            if (mysqli_num_rows($ejecucionTMPAprobado) > 0) {
                while ($fetchPonenciasRegistradas = mysqli_fetch_assoc($ejecucionTMPAprobado)) {
                    $idPonencia = $fetchPonenciasRegistradas['id_ponencia'];
                    $tituloPonencia = $fetchPonenciasRegistradas['titulo_ponencia'];
                    $nombrePonente = $fetchPonenciasRegistradas['ponente'];
                    $emailPonente = $fetchPonenciasRegistradas['email_usuario'];
                    $descRevision = $fetchPonenciasRegistradas['descripcion_revision'];
                    $estatusRev = $fetchPonenciasRegistradas['estatus_revision'];
                    $fechaRegistroPonencia = $fetchPonenciasRegistradas['fecha'];
                    //Da formato de fecha
                    $date = date_create($fechaRegistroPonencia);
                    $fechaRegistroPonenciaFormato = date_format($date, "Y/m/d H:i");
                    $nombreEvaluador = $fetchPonenciasRegistradas['Evaluador'];
                    $emailEvaluador = $fetchPonenciasRegistradas['correo_evaluador'];

            ?>
                    <tr>
                        <td class="text-wrap text-uppercase"><?php echo $idPonencia; ?></td>
                        <td class="text-wrap text-uppercase"><?php echo $tituloPonencia; ?></td>
                        <td class="text-wrap text-uppercase"><?php echo $nombrePonente; ?></td>
                        <td class="text-wrap text-uppercase"><?php echo $emailPonente; ?></td>
                        <td class="text-wrap text-uppercase"><?php echo $descRevision; ?></td>
                        <td class="text-wrap text-uppercase"><?php echo $estatusRev; ?></td>
                        <td class="text-wrap text-uppercase"><?php echo $fechaRegistroPonenciaFormato; ?></td>
                        <td class="text-wrap text-uppercase"><?php echo $nombreEvaluador; ?></td>
                        <td class="text-wrap text-uppercase"><?php echo $emailEvaluador; ?></td>
                    </tr>
            <?php
                }
            } else {
                echo '<td colspan="9"><h5 class="text-center">No se encontraron trabajos aceptados en la etapa <b>' . $etapaTrabajo . '</b></h5></td>';
            }
            ?>

        </tbody>
    </table>
</div>