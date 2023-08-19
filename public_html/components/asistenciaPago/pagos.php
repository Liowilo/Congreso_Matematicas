<?php
session_start();
if (!isset($_SESSION["id"]) || $_SESSION["id"] == null) {
    print "<script>alert(\"Acceso invalido!\");window.location='../../components/inicioSesion/sesion.php';</script>";
}
ob_start();
require "../../modelo/conexion.php";
require "../../modelo/traerCongresoActual.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="shortcut icon" href="../../favicon.png">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="../../styles.css">
    <link rel="stylesheet" href="./pago.css">
</head>

<body>
    <header class="fixed-top d-block">
        <?php
        require_once('../../Layouts/nav.php');
        ?>
    </header>
    <?php
    //Identifica si ya cuenta con una referencia de pago o no
    $id_usuario = $_SESSION['id'];
    $consulta_pago = "SELECT * FROM pago WHERE id_usuario='$id_usuario' AND id_congreso='$idCongreso'";
    $resPago = mysqli_query($conexion, $consulta_pago);
    if (mysqli_num_rows($resPago) != 0) {
    ?>
        <div class="container-fluid " style="margin-top: 180px;" id="subirVaucher">
            <div class="row">
                <div class="col-xl-3 col-lg-3 col-md-1 d-sm-block background-lateral">
                    <?php
                    require_once('../../Layouts/sidebar.php');
                    ?>
                </div>
                <div class="col-xl-9 col-lg-9 col-md-11 col-sm-12">
                    <div class="container">
                        <?php
                        //Trae los datos para mostrar las referencias y los estatus de pagos
                        $fetchPago = mysqli_fetch_assoc($resPago);
                        $pagoEstatus = $fetchPago['estatus_pago'];
                        $pagoVaucher = $fetchPago['imagen_pago']
                        ?>

                        <h2 class="my-5 ">Comprobante de pago</h2>
                    </div>
                    <div class="container">
                        <div class="row  justify-content-right">
                            <?php
                            if ($pagoVaucher == '') {
                            ?>
                                <div class="col-sm-4">
                                    <div class="card p-5 mb-5">
                                        <?php
                                        require "../../modelo/traerVoucherPago.php";
                                        ?>
                                        <div class="card-body sm mb-2">Escanea el pago y envía el imagen con el sello de pago legible</div>
                                        <form method="POST" class="" enctype="multipart/form-data">
                                            <input type="file" class="form-control my-2" name="capturaVoucher" accept="image/jpeg,image/jpg">
                                            <input type="submit" class="btn-style-chico sm py-3 px-5 " name="subirComprobante" value="Subir Archivo">
                                        </form>
                                        <div class=" d-flex align-self-end d-inline mt-2">
                                            <img src="../../src/question.png" class="imgQuestion me-2" alt="">
                                            <span class="span-textos ">El formato del archivo debe ser .png .jpeg o .jpg</span>
                                        </div>
                                    </div>
                                </div>
                            <?php
                            } else {
                            ?>
                                <div class="col-sm-4">
                                    <div class="card p-5 mb-5">
                                        <div class="card-body sm mb-2">¡Ya has subido tu comprobante con éxito!</div>
                                    </div>
                                </div>
                            <?php
                            }
                            ?>
                            <div class="col-sm-6">
                                <p class="ti">Estatus del pago:</p>
                                <p class="tiS mt-3"><?php echo $pagoEstatus ?></p>
                                <?php
                                if ($pagoEstatus == 'APROBADO') {
                                ?>
                                    <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                                        Tu asistencia ha sido confirmada. Descargar referencia de pago: <a href="ordenPago.pdf" target="blank">orden.pdf</a>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                <?php
                                } else if ($pagoEstatus == 'RECHAZADO') {
                                ?>
                                    <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                                        Descargar referencia de pago: <a href="ordenPago.pdf" target="blank">orden.pdf</a>
                                        Tu pago no se ha podido comprobar, por favor contáctate al 14congresomatematicas@gmail.com
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                <?php
                                } else {
                                ?>
                                    <div class="alert alert-info alert-dismissible fade show mt-3" role="alert">
                                        Después de subir tu vaucher, espera para saber si tu pago ha sido aprobado. Descargar referencia de pago: <a href="ordenPago.pdf" target="blank">orden.pdf</a>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row mt-5 justify-content-right">
                        <div class="col-sm-4">
                            <div class="card-body sm mx-4 mb-2 text-right">En caso de requerir factura, enviar al correo altamira@unam.mx el comprobante de pago escaneado y sus datos fiscales completos.</div>
                        </div>
                        <div class="col-sm-4 justify-content-right">
                            <div class="card-body sm mx-4 mb-2 text-right">Si no requiere factura, favor de enviar solamente el comprobante de pago escaneado con su nombre completo para registrar el pago.</div>
                            <div class=" d-flex align-self-end d-inline mt-2">
                                <img src="../../src/question.png" class="imgQuestion me-2" alt="">
                                <span class="span-textos ">Solo se facturará en el mes en que se realizó el pago.</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>


    <?php



    } else {
    ?>

        <div class="container-fluid" style="margin-top: 180px;" id="elgirAsistencia">
            <div class="row">
                <div class="col-xl-3 col-lg-3 col-md-1 d-sm-block background-lateral">
                    <?php
                    require_once('../../Layouts/sidebar.php');
                    ?>
                </div>
                <div class="col-xl-9 col-lg-9 col-md-11 col-sm-12">
                    <div class="container">
                        <h2 class="my-5">Referencia de pago</h2>
                        <p class="sub my-4">A partir del 14 de noviembre de 2022, se podrá realizar el pago de la inscripción de la siguiente forma:</p>
                        <p class="sub my-4 fw-semibold">Para cajas de Campo 4:</p>
                    </div>
                    <div class="container">
                        <div class="row my-5 justify-content-right">
                            <div class="col-xl-5 col-lg-6 col-md-6 col-sm-12">
                                <form action="" method="post">
                                    <label for="tipoAsistencia" class="form-label ti sm my-2">Tipo de asistencia</label>
                                    <select class="form-select mt-3" name="tipoDeAsistencia" required>
                                        <option disabled>Selecciona una opción</option>
                                        <?php
                                        //Trae los datos de las categorias
                                        $tipoAsistenciaPago = "SELECT * FROM tipo_asistencia_pago";
                                        $res2 = mysqli_query($conexion, $tipoAsistenciaPago);
                                        while ($fetch2 = mysqli_fetch_assoc($res2)) {
                                            $idTipoAsistenciaPago = $fetch2["id_tipo_asistencia_pago"];
                                            $tipoAsistenciaPago = $fetch2["tipo_asistencia_pago"];
                                            $costoAsistenciaPago = $fetch2["costo_asistencia_pago"];
                                        ?>
                                            <option value="<?php echo $idTipoAsistenciaPago; ?>" name="<?php echo $idTipoAsistenciaPago; ?>"><?php echo $tipoAsistenciaPago . ' $' . $costoAsistenciaPago . '.00'; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                    <input type="submit" class="col-xl-10 col-lg-12 col-md-12 d-sm-block col-sm-10 btn-style my-3 py-2 px-5 text-wrap" name="submit" value="Generar referencia de pago">
                                </form>

                            </div>
                            <div class="col-sm-6">
                                <?php
                                if (isset($_POST['submit'])) {
                                    if (!empty($_POST['tipoDeAsistencia'])) {
                                        $idTipoAsistenciaPago = $_POST['tipoDeAsistencia'];
                                        $asistencia = $idTipoAsistenciaPago;
                                        //Fecha actual
                                        date_default_timezone_set('America/Mexico_City');
                                        $fechaActual = date('y-m-d G:i:s');
                                        $query = "INSERT INTO pago (fecha_pago, estatus_pago, id_usuario, id_tipo_asistencia, id_congreso) VALUES ('$fechaActual','PENDIENTE','$id_usuario', '$asistencia','$idCongreso')";
                                        $resultados = mysqli_query($conexion, $query);

                                        if ($resultados) {
                                ?>
                                            <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                                                Se ha registrado su solicitud con éxito. Descargar referencia de pago: <a href="pdf.php" target="blank">orden.pdf</a>
                                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                            </div>
                                        <?php
                                        } else {
                                        ?>
                                            <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                                                Ha ocurrido un error, intente más tarde.
                                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                            </div>

                                            <?php
                                        }

                                        switch ($idTipoAsistenciaPago) {
                                            case 1:
                                            ?>
                                                <div class="ti sm my-2">ASISTENTE</div>
                                                <div class="card-head sm">Podrás asistir a la totalidad del Congreso y podrás solicitar tu constancia al asistir a más del 70% de las ponencias</div>
                                            <?php
                                                break;
                                            case 2:
                                            ?>
                                                <div class="ti sm my-2">PONENTE</div>
                                                <div class="card-head sm">Podrás asistir a la totalidad del Congreso y dar tu ponencia. Para solicitar la constancia, tu pago debe estar acreditado.</div>
                                            <?php
                                                break;
                                            case 3:
                                            ?>
                                                <div class="ti sm my-2">ESTUDIANTE</div>
                                                <div class="card-head sm">Podrás asistir a las ponencias orales que desees y podrás participar como máximo en un curso o taller</div>

                                <?php
                                                break;
                                        }
                                    } else {
                                        echo 'Debes seleccionar un tipo de asistencia';
                                    }
                                }
                                ?>
                            </div>
                        </div>
                        <div class="content sm mt-5 justify-content-right">
                            <div class="card mb-5">
                                <div class="card-head m-3 mt-5">Para depósitos bancarios:</div>
                                <div class="sm my-1 mx-5">
                                    <hr style="max-width: 250px;">
                                </div>
                                <span class="subti sm m-3">Solicitar al correo altamira@unam.mx una ficha bancaria referenciada</span>
                                <span class="subti sm m-3">Pagar en el banco</span>
                                <span class="subti sm m-3">Escanear el pago y enviar la imagen con el sello de pago legible al mismo correo</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <?php
    }
    ?>


    <footer>
        <?php
        require_once('../../Layouts/footer.php');
        ?>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/c7b1d2a865.js" crossorigin="anonymous"></script>
</body>

</html>