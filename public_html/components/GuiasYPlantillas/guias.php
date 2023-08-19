<?php
session_start();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <link rel="shortcut icon" href="../../favicon.png">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guías</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="../../styles.css">
    <link rel="stylesheet" href="./guias.css">
</head>

<body>
    <header class="fixed-top">
        <?php
        require_once('../../Layouts/nav.php');
        ?>
    </header>
    <section style="margin-top: 200px;">
        <div class="container-fluid mb-5 pb-5">
            <div class="row pb-2">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mx-1">
                    <div class="container">
                        <h2 class="mb-3">Guias</h2>
                        <div class="container"></div>
                        <!-----------------------ACORDEON-------------------------------------------------->
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mt-5 mb-5">
                            <div class="accordion" id="accordionPanelsStayOpenExample">
                                <!-------------PRIMER ITEM---------------------->
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="panelsStayOpen-headingUno">
                                        <button class="accordion-button Titulos" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseUno" aria-expanded="true" aria-controls="panelsStayOpen-collapseUno">
                                            ¿Cómo se registra una Ponencia Oral?
                                        </button>
                                    </h2>
                                    <div id="panelsStayOpen-collapseUno" class="accordion-collapse collapse " aria-labelledby="panelsStayOpen-headingUno">
                                        <div class="accordion-body Cuerpo-texto">
                                            <strong>El registro de ponencias consta de tres procesos:</strong><br>
                                            <ul class="list-unstyled">
                                                <ol>
                                                    <li>El resumen.</li>
                                                    <li>El extenso.</li>
                                                    <li>El vídeo de la exposición de la ponencia.</li>
                                                </ol>
                                                </li>
                                                <li>El resumen, extenso y el vídeo de cada ponencia requieren ser registrados en el sitio del Congreso para ser evaluados por el Comité correspondiente.</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-------------SEGUNDO ITEM---------------------->
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="panelsStayOpen-headingDos">
                                        <button class="accordion-button Titulos" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseDos" aria-expanded="true" aria-controls="panelsStayOpen-collapseDos">
                                            ¿Cuáles son los elementos que debe tener un resúmen para Ponencia Oral?
                                        </button>
                                    </h2>
                                    <div id="panelsStayOpen-collapseDos" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingDos">
                                        <div class="accordion-body Cuerpo-texto">
                                            <span class="">
                                                La ponencia debe ser original y producto de investigación teórica o aplicada.
                                                Serán aceptados todos los trabajos que puedan hacer alguna aportación al conocimiento
                                                teórico o práctico en la enseñanza y aplicación de las matemáticas. Así mismo, se debe
                                                cumplir con los lineamientos que se indican en la elaboración del resumen.
                                            </span><br><br>
                                            <strong>El resumen deberá contener:</strong><br>
                                            <ul class="list-unstyled mt-2 mb-2">
                                                <ol>
                                                    <li>Título (Máximo 15 palabras)</li>
                                                    <li>Categoría.</li>
                                                    <li>Contenido (máximo 300 palabras estructurado de acuerdo a la categoría seleccionada).</li>
                                                    <li>Referencias estilo APA (American Psychological Association).</li>
                                                    <li>Nombre del autor (y opcional coautores. Máximo 5 integrantes).</li>
                                                    <li>Indicar si requiere constancia de participación.</li>
                                                </ol>
                                            </ul>
                                            <strong>Especificaciones del resumen:</strong><br>
                                            <ol class="mt-2">
                                                <li>El título deberá reflejar el contenido de la ponencia.</li>
                                                <li class="fw-semibold mb-2"> Las categorías en donde los autores podrán registrar sus trabajos relacionados al Proceso de Enseñanza Aprendizaje (PEA) son:</li>
                                                <ul style="list-style-type: square;">
                                                    <li>Enseñanza de las matemáticas con las TIC en la nueva normalidad (EN)</li>
                                                    <li>Experiencia e innovación didáctica en la enseñanza de las matemáticas (ID)</li>
                                                    <li>Investigación del proceso de la enseñanza de las matemáticas (IP)</li>
                                                    <li>Evaluión del aprendizaje en la enseñanza de las matemáticas en la nueva normalidad (EA)</li>
                                                    <li>Aplicación y/o vinculación de las matemáticas con otras disciplinas (AP)</li>
                                                    <span>Al momento de registrar sus trabajos el ponente seleccionará la categoría que más se adapte a ellos.</span>
                                                </ul>
                                                <li class="fw-semibold mb-2">En el contenido se expondrá una síntesis del tema referido y se debe incluir según la categoría elegida:</li>
                                                <ul style="list-style-type: square;">
                                                    <li>Objetivo</li>
                                                    <li>Sustento teórico o antecedentes</li>
                                                    <li>Metodología o desarrollo</li>
                                                    <li>Resultados y/o conclusiones.</li>
                                                </ul>
                                                <li>Es necesario que las citas y referencias incluidas en el documento se encuentren en formato APA.</li>
                                                <li class="fw-semibold mb-2">Registro autores y coautores.
                                                    Los asistentes al Congreso podrán participar como ponentes con un máximo de 5 trabajos, ya sea como autor o coautor en las siguientes modalidades:</li>
                                                <ul style="list-style-type: circle;">
                                                    <li>Ponencias</li>
                                                    <li>Talleres</li>
                                                    <li>Carteles</li>
                                                </ul>
                                            </ol>
                                            <span>Los asistentes podrán participar como ponentes con un máximo de 3 trabajos en la categoría de Ponencias, con un máximo de 2 Carteles y con un Taller.</span>
                                        </div>
                                    </div>
                                </div>
                                <!-------------TERCER ITEM---------------------->
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="panelsStayOpen-headingTres">
                                        <button class="accordion-button Titulos" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTres" aria-expanded="true" aria-controls="panelsStayOpen-collapseTres">
                                            ¿Cómo se registra un Cartel?
                                        </button>
                                    </h2>
                                    <div id="panelsStayOpen-collapseTres" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingTres">
                                        <div class="accordion-body Cuerpo-texto">
                                            <strong>El registro de carteles consta de tres procesos:</strong><br>
                                            <ul class="list-unstyled">
                                                <ol>
                                                    <li>El resumen.</li>
                                                    <li>El extenso.</li>
                                                    <li>El vídeo de la exposición del cartel.</li>
                                                </ol>
                                                </li>
                                                <li> El resumen, cartel y el vídeo de exposición de cada cartel requieren ser registrados en el sitio del congreso para ser evaluados por el comité evaluador.</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-------------CUARTO ITEM---------------------->
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="panelsStayOpen-headingCuarto">
                                        <button class="accordion-button Titulos" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseCuarto" aria-expanded="true" aria-controls="panelsStayOpen-collapseCuarto">
                                            ¿Cómo elaborar un resúmen para un Cartel?
                                        </button>
                                    </h2>
                                    <div id="panelsStayOpen-collapseCuarto" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingCuarto">
                                        <div class="accordion-body Cuerpo-texto">
                                            <span class="">
                                                El cartel debe ser original y producto de investigación teórica o aplicada. Serán aceptadas todos los trabajos que puedan hacer alguna aportación al conocimiento teórico o práctico en la enseñanza y aplicación de las matemáticas. Así mismo se debe cumplir con los lineamientos que se indican en la elaboración del resumen.
                                            </span><br><br>
                                            <strong>El resumen deberá contener:</strong><br>
                                            <ul class="list-unstyled mt-2 mb-2">
                                                <ol>
                                                    <li>Título (Máximo 15 palabras)</li>
                                                    <li>Categoría.</li>
                                                    <li>Contenido (Máximo 300 palabras estructurado de acuerdo a la categoría seleccionada).</li>
                                                    <li>Referencias estilo APA (American Psychological Association)</li>
                                                    <li>Nombre del autor (y opcional coautores. Máximo 5 integrantes).</li>
                                                    <li>Indicar si requiere constancia de participación.</li>
                                                </ol>
                                            </ul>
                                            <strong>Especificaciones del resumen:</strong><br>
                                            <ol class="mt-2">
                                                <li>El título deberá reflejar el contenido del cartel.</li>
                                                <li class="fw-semibold mb-2"> Las categorias en donde los autores podrán registrar sus trabajos relacionados al Proceso de Enseñanza Aprendizaje (PEA) son:</li>
                                                <ul style="list-style-type: square;">
                                                    <li>Enseñanza de las matemáticas con las TIC en la nueva normalidad (EN)</li>
                                                    <li>Experiencia e innovación didáctica en la enseñanza de las matemáticas (ID)</li>
                                                    <li>Investigación del proceso de la enseñanza de las matemáticas (IP)</li>
                                                    <li>Evaluación del aprendizaje en la enseñanza de las matemáticas en la nueva normalidad (EA)</li>
                                                    <li>Aplicación y/o vinculación de las matemáticas con otras disciplinas (AP)</li>
                                                    <span>Al momento de registrar sus trabajos, el ponente seleccionará la categoría que más se adapte a ellos.</span>
                                                </ul>
                                                <li class="fw-semibold mb-2">En el contenido se expondrá una síntesis del tema referido y se debe incluir según la categoría elegida:</li>
                                                <ul style="list-style-type: square;">
                                                    <li>Objetivo</li>
                                                    <li>Sustento teórico o antecedentes</li>
                                                    <li>Metodología o desarrollo</li>
                                                    <li>Resultados y/o conclusiones.</li>
                                                </ul>
                                                <li>Es necesario que las citas y referencias incluidas en el documento se encuentren en formato APA.</li>
                                                <li class="fw-semibold mb-2">Registro autores y coautores.
                                                    Los asistentes al congreso podrán participar como ponentes con un máximo de 5 trabajos ya sea como autor o coautor en las siguientes modalidades:</li>
                                                <ul style="list-style-type: circle;">
                                                    <li>Ponencias</li>
                                                    <li>Talleres</li>
                                                    <li>Carteles</li>
                                                </ul>
                                            </ol>
                                            <span>Los asistentes podrán participar como ponentes con un máximo de 3 trabajos en la categoría de Ponencias, con un máximo de 2 Carteles y con un Taller.</span>
                                            <span>El cartel debe incluir las siguientes secciones:</span>
                                            <ol class="mt-2">
                                                <li>Encabezado</li>
                                                <li>Resumen</li>
                                                <li>Palabras clave</li>
                                                <li>Introducción</li>
                                                <li>Metodología</li>
                                                <li>Resultados</li>
                                                <li>Discusión y/o conclusiones</li>
                                                <li>Índice de referencias (en formato APA).</li>
                                            </ol>
                                            <span>Todas las imágenes, figuras, tablas y ecuaciones deberán estar numeradas.</span>
                                            <span>El cartel se deberá subir en el sitio del Congreso en formato pdf.</span>
                                            <span>Cualquier aspecto o situación no considerada en la presente convocatoria será resuelta por el comité evaluador y su decisión será inapelable.
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <!-------------QUINTO ITEM---------------------->
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="panelsStayOpen-headingQuinto">
                                        <button class="accordion-button Titulos" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseQuinto" aria-expanded="true" aria-controls="panelsStayOpen-collapseQuinto">
                                            ¿Cómo registrar un Taller?
                                        </button>
                                    </h2>
                                    <div id="panelsStayOpen-collapseQuinto" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingQuinto">
                                        <div class="accordion-body Cuerpo-texto">
                                            <span class="">
                                                Los talleres servirán para fortalecer la práctica profesional, a través del uso de tecnologías o sistemas aplicados a la enseñanza y aplicación de las matemáticas.
                                            </span><br><br>
                                            <strong>La propuesta de taller debe ajustarse a los requisitos siguientes:</strong><br>
                                            <ul class="list-unstyled mt-2 mb-2">
                                                <ol>
                                                    <li>Un autor o coautor sólo podrá participar en un taller.</li>
                                                    <li>Los talleres constan de 2 sesiones de 2 horas cada una.</li>
                                                    <li>El registro se llevará a cabo en la página del congreso enviando sus resúmenes.</li>
                                                    <li>La propuesta de registro de taller debe contener:</li>
                                                    <ul style="list-style-type: circle;">
                                                        <li>Título (máximo 15 palabras). El título deberá reflejar el contenido del taller.</li>
                                                        <li>Contenido (máximo 300 palabras) describir el objetivo, las actividades a realizar y los logros que se pretenden alcanzar.</li>
                                                        <li>Materiales (máximo 100 palabras), software necesario, el horario propuesto (opcional) y la tecnología en línea que utilizará (Zoom, Meet, Webex, Classroom, otro).</li>
                                                        <li>Autor (y coautores opcional) máximo dos coautores.</li>
                                                        <li>Las constancias son individuales para lo cual el autor y coautores requieren exponer el trabajo y realizar el pago correspondiente.</li>
                                                    </ul>
                                                </ol>
                                                <li><strong>Registro de talleres.</strong></li>
                                                <span>Después del registro se revisarán los talleres para enviar la respuesta por email a los ponentes y realizar las observaciones correspondientes si es que las hubiera. También recibirán indicaciones para impartir el taller.

                                                    Cualquier aspecto o situación no considerada en la presente convocatoria será resuelta por la comisión de talleres y su decisión será inapelable.</span>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-------------SEXTO ITEM---------------------->
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="panelsStayOpen-headingSexto">
                                        <button class="accordion-button Titulos" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseSexto" aria-expanded="true" aria-controls="panelsStayOpen-collapseSexto">
                                            ¿Cómo elaborar un Extenso?
                                        </button>
                                    </h2>
                                    <div id="panelsStayOpen-collapseSexto" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingSexto">
                                        <div class="accordion-body Cuerpo-texto">
                                            <span class="">
                                                Para poder entregar los trabajos extensos de las ponencias orales es necesario:
                                            </span><br><br>
                                            <ol>
                                                <li>Tener aprobado el resumen de la ponencia oral por parte del comité evaluador.</li>
                                                <li>Que el autor que registró el resumen de la ponencia, sea el mismo que envíe el trabajo extenso.</li>
                                                <li>Accesar al "Registro de trabajos" para poder adjuntar los archivos requeridos.</li>
                                                <li>Respetar la fecha límite de registro de trabajos extensos</li>
                                            </ol>

                                            <strong>Los coautores no pueden registrar o modificar los extensos.</strong><br>

                                        </div>
                                    </div>
                                </div>
                                <!-------------SEPTIMO ITEM---------------------->
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="panelsStayOpen-headingSeptimo">
                                        <button class="accordion-button Titulos" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseSeptimo" aria-expanded="true" aria-controls="panelsStayOpen-collapseSeptimo">
                                            ¿Cómo obtener mi constancia?
                                        </button>
                                    </h2>
                                    <div id="panelsStayOpen-collapseSeptimo" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingSeptimo">
                                        <div class="accordion-body Cuerpo-texto">
                                            <span class="">
                                                Las constancias son individuales, por lo que el autor y coautores que las requieran necesitan realizar la exposición del trabajo y el pago correspondiente.
                                            </span><br><br>
                                            <ul style="list-style-type: square;">
                                                <li>Se entregará constancia de <mark>"Asistencia al congreso"</mark>, cuando haya participado en las actividades del congreso.</li>
                                                <li>Se entregará constancia de <mark>"Presentación de ponencia"</mark>, cuando su trabajo en extenso y vídeo hayan sido aceptados por el comité organizador y estos hayan sido presentados en el evento.</li>
                                                <li>Se entregará constancia de <mark>"Publicación en memorias del congreso</mark>" con registro ISSN , cuando su trabajo en extenso haya sido incluido en las memorias del congreso.</li>
                                            </ul>
                                            <strong>Cualquier aspecto o situación no considerada en la presente convocatoria será resuelta por el comité organizador y su desición será inapelable.</strong><br>
                                        </div>
                                    </div>
                                </div>
                                <!-------------OCTAVO ITEM---------------------->
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="panelsStayOpen-headingOctavo">
                                        <button class="accordion-button Titulos" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOctavo" aria-expanded="true" aria-controls="panelsStayOpen-collapseOctavo">
                                            Especificaciones para Crear un Video
                                        </button>
                                    </h2>
                                    <div id="panelsStayOpen-collapseOctavo" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingOctavo">
                                        <div class="accordion-body Cuerpo-texto">
                                            <strong>La propuesta del video debe ajustarse a los requisitos siguientes:</strong><br><br>
                                            <ol>
                                                <li>La propuesta del video debe ajustarse a los requisitos siguientes:</li>
                                                <li>No debe de exceder los 300 MB (ya que tardaría demasiado en subir).</li>
                                                <li>El formato debe ser en .mp4 (encoder H.264).</li>
                                                <li>Resolución 1280*720 y 24 fps (fotogramas por segundo).</li>
                                                <li>Buen audio y vídeo.</li>
                                                <li>El nombre del archivo es la clave de su ponencia + - + el nombre del autor.</li>
                                                <ul>
                                                    <li>Ejemplo: POSM001-PedroGarciaMendoza</li>
                                                </ul>
                                                <li>El vídeo deberá ser subido por el ponente a OneDrive, Drive o cualquier otra plataforma para almacenar archivos multimedia y se deberá compartir el URL para visualizar el vídeo con los permisos necesarios de visualización al correo 15congresomatematicas@cuautitlan.unam.mx.</li>
                                            </ol>
                                            <strong>Los elementos que debe incluir la exposición de la ponencia son:</strong><br>
                                            <ul style="list-style-type: square;">
                                                <li>Temática</li>
                                                <li>Objetivos</li>
                                                <li>Sustento teórico, antececedentes o introducción.</li>
                                                <li>Metodología o desarrollo.</li>
                                                <li>Resultados y/o conclusiones.</li>
                                                <li>Bibliografía.</li>
                                            </ul>
                                            <strong>Cualquier aspecto o situación no considerada en la presente convocatoria será resuelta por el comité técnico y su decisión será inapelable.</strong>
                                        </div>
                                    </div>
                                </div>
                            </div><!--final del acordeon-->
                        </div><!--col-10-->
                        <!----------------------------------ACORDEON--------------------------------------------->
                    </div><!--container-->
                </div><!--col-10-->
            </div><!--row-->
        </div><!--fluid-->
    </section>
    <footer>
        <?php
        require_once('../../Layouts/footer.php');
        ?>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/c7b1d2a865.js" crossorigin="anonymous"></script>
</body>

</html>