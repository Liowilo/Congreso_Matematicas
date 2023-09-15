<div class="container mt-5 mb-5 ">
    <div class="row row-centrar">
        <div class="centrico col-md-4 text-center texto-sm border border-success 
        p-2 border-opacity-10 rounded d-sm-block col-sm-6">
            <h2 class="mt-4 mb-3">Fechas Importantes</h2>
            <div class="p-2 mt-4">Publicación del programa del evento:<br>
                <?php
                $id_evento = 11;
                $sql = "SELECT fecha_congreso_inicio FROM fecha_congreso WHERE id_evento = $id_evento AND id_congreso = (SELECT MAX(id_congreso) FROM fecha_congreso WHERE id_evento = $id_evento)";
                $result = $conexion->query($sql);
                $row = $result->fetch_assoc();
                $fecha = new DateTime($row["fecha_congreso_inicio"]);
                $locale = 'es_ES'; // Establece la configuración regional en español

                $dateFormatter = new IntlDateFormatter(
                    $locale,
                    IntlDateFormatter::FULL, // Estilo completo de fecha y hora
                    IntlDateFormatter::FULL, // Estilo completo de fecha y hora
                    'UTC', // Zona horaria
                    IntlDateFormatter::GREGORIAN
                );

                $dateFormatter->setPattern("d 'de' MMMM 'de' y"); // Define el patrón de formato

                $fecha_formateada = $dateFormatter->format($fecha);

                // Capitalizar la primera letra del día
                $fecha_formateada = ucfirst($fecha_formateada);

                echo $fecha_formateada;
                ?>
            </div>
            <hr>
            <div class="p-3">Periodo de impartición de talleres presenciales en línea <br>
                <?php
                $id_evento = 12;
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

                echo $fecha_formateada ." y ". $fecha_formateada2;
                ?>
            </div>
            <hr>
            <div class="div p-4">
                <h4>Fecha del Congreso: <br>
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

                echo $fecha_formateada ." y ". $fecha_formateada2;
                ?>
                </h4>
            </div>
            <hr>
            <div class="d-grid gap-2">
                <a href="/desarrollo/components/actividadesFechas/fechas.php">
                    <button class="btn btn-style shadow mt-4 mb-4 px-5" type="button">Ver Fechas</button></a>

                <a href="/desarrollo/src/convocatoria/XV.pdf" target="_blank">
                    <button class="btn btn-style shadow p-2 mb-4 px-5" type="button">Ver Convocatoria</button></a>

                <a href="/desarrollo/components/subirResumen/subirResumen.php">
                    <button class="btn btn-style shadow px-5 p-2 mb-4" type="button">Registrar Ponencia</button></a>
            </div>
        </div>
        <div class="centrico col-md-8  d-sm-block col-sm-6 d-lg-block 
        col-lg-6 d-xs-block col-sm-auto d-xs-block col-xs-6 ">
            <img src="./src/cartel.png" class=" p-0 img-ajustar rounded cartel mx-auto" alt="" max-width="600" max-height="800"></img>
        </div>
    </div>
</div>
