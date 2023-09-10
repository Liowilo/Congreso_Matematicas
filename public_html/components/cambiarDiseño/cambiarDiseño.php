<?php
session_start();
if (!isset($_SESSION["id"]) || empty($_SESSION["id"])) {
    echo "<script>alert('Acceso inválido.'); window.location.href='../../components/inicioSesion/sesion.php';</script>";
    exit;
}

require_once "../../modelo/conexion.php";
require_once "../../modelo/privilegiosUsuario.php";

$estadoPrivilegio = []; // Un arreglo que guarda los estados del privilegio
$cont2 = 0; // Para recorrer las posiciones del segundo arreglo

$consPrivilegiosEstado = "SELECT * FROM funcion_usuario WHERE id_usuario = ?";
$stmt = mysqli_prepare($conexion, $consPrivilegiosEstado);
mysqli_stmt_bind_param($stmt, "i", $_SESSION["id"]);
mysqli_stmt_execute($stmt);
$resPrivilegiosEstado = mysqli_stmt_get_result($stmt);

while ($row2 = mysqli_fetch_array($resPrivilegiosEstado)) {
    $estadoPrivilegio[$cont2] = $row2['estado_funcion'];
    $cont2++;
}

$_SESSION['estadoPrivilegio'] = $estadoPrivilegio;

foreach (array_combine($privilegios, $estadoPrivilegio) as $valor => $estado) {
    if ($valor == 44 && $estado == 'ON') {
        ?>


        <!DOCTYPE html>
        <html lang="en">

        <head>
            <link rel="shortcut icon" href="../../favicon.png">
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Congreso</title>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
                integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
            <link rel="stylesheet" href="../../styles.css">
            <link rel="stylesheet" href="../../Layouts/CrearCongreso/crearCongreso.css">

        </head>

        <body>
            <header>
                <?php
                require_once('../../Layouts/nav.php');
                ?>
            </header>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-3 col-lg-3 col-md-1 d-sm-block background-lateral">
                        <?php
                        require_once('../../Layouts/sidebar.php');
                        ?>

                    </div>
                    <div class="col-xl-9 col-lg-9 col-md-11 col-sm-12">
                        <div class="container">
                            <h2 class="mt-5 mb-3">Modificar página</h2>
                            <?php
                            /* require "../../modelo/cambiarDiseño.php";*/
                            ?>
                        </div>
                        <form method="POST" id="form" enctype="multipart/form-data">
                            <div class="row d-flex align-items-center justify-content-center contenedor mt-4">

                                <div class="col p-2 flex-fill col-xl-2 col-lg-2 col-md-2 col-sm-12 mb-3">
                                    <!--Boton para subir o seleccionar nueva foto-->
                                    <label for="inputFoto" class="form-label">Logo del Congreso</label>
                                    <input type="file" accept="image/png,image/jpeg,image/jpg" class="form-control"
                                        name="inputLogo" id="inputFotoPerfil">

                                </div>
                                <div class="col p-2 flex-fill col-xl-2 col-lg-2 col-md-2 col-sm-12 mb-3">
                                    <!--Boton para subir o seleccionar nueva foto-->
                                    <label for="inputFoto" class="form-label">Banner del congreso</label>
                                    <input type="file" accept="image/png,image/jpeg,image/jpg" class="form-control"
                                        name="inputBanner" id="inputFotoBanner">
                                </div>
                                <div class="col p-2 flex-fill col-xl-2 col-lg-2 col-md-2 col-sm-12 mb-3">
                                    <!--Boton para subir o seleccionar nueva foto-->
                                    <label for="inputFoto" class="form-label">Póster del congreso</label>
                                    <input type="file" accept="image/png,image/jpeg,image/jpg" class="form-control"
                                        name="inputPoster" id="inputFotoPoster">
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="position-relative row mb-4">
                                    <div
                                        class="position-relative top-50 start-50 translate-middle col-xl-3 col-lg-3 d-md-block col-md-5 d-sm-block col-sm-10 mb-3">
                                        <input id="botonGuardarImagenes" name="botonGuardarImagenes"
                                            class="btn btn-azul pe-5 ps-5" type="button" value="Guardar">

                                    </div>
                                </div>
                            </div>
                    </div>
                </div>

            </div>
            </form>
            </div><!--col-10-->
            </div>
            </div>







            <footer>
                <?php
                require_once('../../Layouts/footer.php');
                ?>
            </footer>


            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ"
                crossorigin="anonymous"></script>
            <script src="https://kit.fontawesome.com/c7b1d2a865.js" crossorigin="anonymous"></script>
        </body>

        </html>
    <?php }
}
?>