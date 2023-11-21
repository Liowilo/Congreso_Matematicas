<div class="container mt-5 mb-5 ">
    <div class="row row-centrar ">
        <div class="centrico col-md-4 text-center texto-sm border border-success 
        p-2 border-opacity-10 rounded d-sm-block col-sm-6">
            <div class="div p-4" style="font-size: 22px;">
                <h4 style="font-size: 36px;">Fecha del Congreso:</h4> <br>
                    <?php
                    $id_evento = 13;
                    $sql = "SELECT fecha_congreso_inicio FROM fecha_congreso WHERE id_evento = $id_evento AND id_congreso = (SELECT MAX(id_congreso) FROM fecha_congreso WHERE id_evento = $id_evento)";
                    $sql2 = "SELECT fecha_congreso_fin FROM fecha_congreso WHERE id_evento = $id_evento AND id_congreso = (SELECT MAX(id_congreso) FROM fecha_congreso WHERE id_evento = $id_evento)";
                    $result = $conexion->query($sql);
                    $result2 = $conexion->query($sql2);
                    $row = $result->fetch_assoc();
                    $row2 = $result2->fetch_assoc();
                    $fecha = new DateTime($row["fecha_congreso_inicio"]);
                    $fecha2 = new DateTime($row2["fecha_congreso_fin"]);
                    $locale = 'es_ES'; // Establece la configuración regional en español

                    $dateFormatter = new IntlDateFormatter(
                        $locale,
                        IntlDateFormatter::FULL, // Estilo completo de fecha y hora
                        IntlDateFormatter::FULL, // Estilo completo de fecha y hora
                        'UTC', // Zona horaria
                        IntlDateFormatter::GREGORIAN
                    );

                    $dateFormatter2 = new IntlDateFormatter(
                        $locale,
                        IntlDateFormatter::FULL, // Estilo completo de fecha y hora
                        IntlDateFormatter::FULL, // Estilo completo de fecha y hora
                        'UTC', // Zona horaria
                        IntlDateFormatter::GREGORIAN
                    );

                    $dateFormatter->setPattern("d 'de' MMMM");  // Define el patrón de formato
                    $dateFormatter2->setPattern("d 'de' MMMM 'de' y"); // Define el patrón de formato

                    $fecha_formateada = $dateFormatter->format($fecha);
                    $fecha_formateada2 = $dateFormatter2->format($fecha2);

                    echo $fecha_formateada . " y " . $fecha_formateada2;
                    ?>
                
            </div>
            <hr>
            <div class="d-grid gap-2" style="margin-top: 110px;">
                <?php // Traer color automatizado
                $valorColor = "SELECT color_congreso FROM recursos_pagprin WHERE idRecurso = '1'";
                $color = mysqli_query($conexion, $valorColor);
                $rowColor = $color->fetch_assoc();
                $colorHex = $rowColor['color_congreso'];
                ?>
                <a href="/desarrollo/components/actividadesFechas/fechas.php">
                    <button class="btn btn-style shadow mt-4 mb-4 px-5" type="button" style="background-color: <?php echo $colorHex; ?>!important;">Ver Fechas</button></a>

                <a href="/desarrollo/src/convocatoria/XVI.pdf" target="_blank">
                    <button class="btn btn-style shadow p-2 mb-4 px-5" type="button" style="background-color: <?php echo $colorHex; ?>!important;">Ver Convocatoria</button></a>

                <a href="/desarrollo/components/subirResumen/subirResumen.php">
                    <button class="btn btn-style shadow px-5 p-2 mb-4" type="button" style="background-color: <?php echo $colorHex; ?>!important;">Registrar Ponencia</button></a>
            </div>
        </div>
        <div class="centrico col-md-8  d-sm-block col-sm-6 d-lg-block 
        col-lg-6 d-xs-block col-sm-auto d-xs-block col-xs-6 ">
            <?php // Traer imagen de la BD
            $imagenSQL = "SELECT cartel_congreso FROM recursos_pagprin WHERE idRecurso = '1'";
            $traerIMG = mysqli_query($conexion, $imagenSQL);
            $rowImagen = $traerIMG->fetch_assoc();
            $rutaIMG = $rowImagen['cartel_congreso'];
            $rutaFinal = str_replace("../", "./", $rutaIMG);
            ?>
            <img src="<?php echo $rutaFinal; ?>" class=" p-0 img-ajustar rounded cartel mx-auto" alt="" max-width="600" max-height="800"></img>
        </div>
    </div>
</div>
