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
    <title>Costos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="../../styles.css">
    <link rel="stylesheet" href="./cuotas.css">

</head>

<body>
    <header class="fixed-top"> <!--------------MANDA A LLAMAR LA NAVBAR--------------->
        <?php
        require_once('../../Layouts/nav.php');
        ?>
    </header>
    <section style="margin-top: 250px;">
        <div class="container-fluid mt-5 mb-5"><!----------CONTENEDOR PRINCIPAL----------->
            <div class="row p-2">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                    <div class="container col-xl-12 col-lg-12 col-md-12 col-sm-12">
                        <h2 class="mb-3">Costos individuales</h2><!--------TITULO INTERNO------------>
                        <!-----------DATOS DE CUOTAS AL CONGRESO------------>
                        <div class="col-sm-4 col-md-6 col-lg-6 px-3 pt-2 mt-3">
                            <div class="card-body-cuotas rounded text-center py-2">Ponentes</div>
                            <div class="row m-1">
                                <div class="col mt-2">
                                    <p class="pt py-2 text-center">Cuota</p>
                                </div>
                                <div class="col mt-3">
                                    <span class="cuotas text-center border border-success p-2 border-opacity-10 rounded">$1,400.00</span>
                                </div>
                            </div>
                            <div class="row m-1">
                                <p class="subtitulo py-2">Internos y externos que presentan trabajos</p>
                            </div>
                        </div>
                        <div class="col-sm-4 col-md-6 col-lg-6  px-3 pt-2">
                            <div class="card-body-cuotas rounded text-center py-2">Asistentes</div>
                            <div class="row m-1">
                                <div class="col m-2">
                                    <p class="pt py-2 text-center">Cuota</p>
                                </div>
                                <div class="col m-2">
                                    <span class="cuotas text-center border border-success p-2 border-opacity-10 rounded">$1,000.00</span>
                                </div>
                            </div>
                            <div class="row m-1">
                                <p class="subtitulo py-2">Internos y externos que no presentan trabajos</p>
                            </div>
                        </div>
                        <div class="row m-1">
                            <div class="col-sm-4 col-md-6 col-lg-6  px-3 pt-2">
                                <div class="card-body-cuotas rounded text-center py-2">Estudiantes</div>
                                <div class="row m-1">
                                    <div class="col m-2">
                                        <p class="pt py-2 text-center">Cuota</p>
                                    </div>
                                    <div class="col m-2">
                                        <span class="cuotas text-center border border-success p-2 border-opacity-10 rounded">$200.00</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4 col-md-6 col-lg-6  p-3">
                                <i class="fa fa-question-circle" style="font-size: 30px;" aria-hidden="true"></i>
                                <p class="info m-3">Estudiantes de licenciatura o media superior, únicamente pueden participar como asistentes y con derecho a un taller o curso.</p>
                            </div>
                        </div>

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