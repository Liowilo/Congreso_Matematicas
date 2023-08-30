<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="shortcut icon" href="../../favicon.png">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fechas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="../../styles.css">
    <link rel="stylesheet" href="./fechas.css">

</head>

<body>
    <header class="fixed-top"> <!--------------MANDA A LLAMAR LA NAVBAR--------------->
        <?php
        require_once('../../Layouts/nav.php');
        ?>
    </header>
    <section style="margin-top: 250px;">
        <div class="container-fluid mt-5 mb-5"><!----------CONTENEDOR PRINCIPAL----------->
            <div class="row">
                <div class="col-xl-2 col-lg-2 col-md-1 d-none d-sm-block"></div>
                <div class="col-xl-10 col-lg-10 col-md-10 d-sm-block col-sm-12">
                    <div class="container mb-5">
                        <h2 class="mb-4">Fechas</h2><!--------TITULO INTERNO------------>
                        <div class="row">
                            <div class="col-xl-8 col-lg-8 col-md-8 d-sm-block col-sm-12">
                                <p class="mt-3 ms-3 titulo-congreso" id="edicion">XIV Edición</p>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-4 mb-4">
                                <img src="../../src/logos_congresos/XV.jpeg" alt="XIV Congreso" class="logo" height="70px" width="80px">
                            </div>
                            <span class="ms-3 span-congreso d-flex mb-4">Congreso Internacional Sobre la Enseñanza y Aplicación de las Matemáticas</span>
                        </div>
                        <div class="card-alert rounded p-2">
                            Fechas sujetas a cambio
                        </div>
                        <table class="table">
                            <thead class="categorias">
                                <tr>
                                    <th class="fecha py-2" scope="col">Fecha</th>
                                    <th class="asunto py-2" scope="col">Asunto</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th class="fecha py-3" scope="row">Del 27 de noviembre de 2023 al 19 de enero de 2024</th>
                                    <td class="asunto py-3">Recepción de resúmenes de trabajos</td>
                                </tr>
                                <tr class="table-warning">
                                    <th class="fecha py-3" scope="row ">Del 22 al 26 de enero de 2024</th>
                                    <td class="asunto py-3">Evaluación de resúmenes por parte del comité</td>
                                </tr>
                                <tr>
                                    <th class="fecha py-3" scope="row">Del 29 al 2 de febrero de 2024</th>
                                    <td class="asunto py-3">Resultado de evaluación de resúmenes</td>
                                </tr>
                                <tr class="table-warning">
                                    <th class="fecha py-3" scope="row ">Del 5 al 9 de febrero de 2024</th>
                                    <td class="asunto py-3">Recepción de corrección de resúmenes</td>
                                </tr>
                                <tr class="table bg-danger">
                                    <td class="importante" colspan="2"><i class="fa fa-exclamation-triangle me-3" aria-hidden="true"></i>Si su resumen no fue aprobado al 10 de febrero quedará fuera del evento.</td>
                                </tr>
                                <tr>
                                    <th class="fecha py-3" scope="row">Del 5 de febrero al 16 de febrero de 2024</th>
                                    <td class="asunto py-3">Recepción de trabajos en extenso</td>
                                </tr>
                                <tr class="table-warning">
                                    <th class="fecha py-3" scope="row ">Del 19 al 23 de febrero de 2024</th>
                                    <td class="asunto py-3">Notificación de observaciones de los trabajos en extenso</td>
                                </tr>
                                <tr>
                                    <th class="fecha py-3" scope="row">11 de marzo de 2023</th>
                                    <td class="asunto py-3">Inicia el periodo de recepción de pagos</td>
                                </tr>
                                <tr class="table-warning">
                                    <th class="fecha py-3" scope="row ">Del 26 de febrero al 15 de marzo de 2024</th>
                                    <td class="asunto py-3">Recepción de extensos finales</td>
                                </tr>
                                <tr class="table bg-danger">
                                    <td class="importante" colspan="2"><i class="fa fa-exclamation-triangle me-3" aria-hidden="true"></i>Si su extenso no fue aprobado para el 16 de marzo quedará fuera del evento.</td>
                                </tr>
                                <tr>
                                    <th class="fecha py-3" scope="row">Del 18 de marzo al 19 de abril de 2024</th>
                                    <td class="asunto py-3">Recepción de videos de las ponencias aceptadas</td>
                                </tr>
                                <tr class="table bg-danger">
                                    <td class="importante" colspan="2"><i class="fa fa-exclamation-triangle me-3" aria-hidden="true"></i>Si su video no fue recibido para el 20 de abril quedará fuera del evento.</td>
                                </tr>
                                <tr>
                                    <th class="fecha py-3" scope="row">22 de abril de 2024</th>
                                    <td class="asunto py-3">Publicación del programa general del evento</td>
                                </tr>
                                <tr class="table-warning">
                                    <th class="fecha py-3" scope="row ">6 y 7 de mayo de 2024</th>
                                    <td class="asunto py-3">Periodo de impartición de talleres en línea</td>
                                </tr>
                                <tr>
                                    <th class="fecha py-3" scope="row">8 y 9 de mayo de 2024</th>
                                    <td class="asunto py-3">Fecha del Congreso</td>
                                </tr>
                                <tr class="table-warning">
                                    <th class="fecha py-3" scope="row ">Del 10 al 14 de junio 2024</th>
                                    <td class="asunto py-3">Inicia el envío de constancias virtuales</td>
                                </tr>
                                <tr>
                                    <th class="fecha py-3" scope="row">A partir del 10 de junio de 2024</th>
                                    <td class="asunto py-3">Publicación de las memorias del Congreso</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <section>
                        <?php
                        require_once('../../Layouts/maps.php');
                        ?>
                    </section>
            </div>
        </div>

    </section>

    <footer><!-----------CONTENEDOR PIE DE PAGINA------------>
        <?php
        require_once('../../Layouts/footer.php');
        ?>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/c7b1d2a865.js" crossorigin="anonymous"></script>
</body>

</html>