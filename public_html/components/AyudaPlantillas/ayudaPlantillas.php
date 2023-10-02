<?php
session_start();
if (!isset($_SESSION["id"]) || empty($_SESSION["id"])) {
    echo "<script>alert('Acceso inválido.'); window.location.href='../../components/inicioSesion/sesion.php';</script>";
    exit;
}

require_once "../../modelo/conexion.php";
require_once "../../modelo/privilegiosUsuario.php";

// Traer color automatizado
$valorColor = "SELECT color_congreso FROM recursos_pagprin WHERE idRecurso = '1'";
$color = mysqli_query($conexion, $valorColor);
$rowColor = $color->fetch_assoc();
$colorHex = $rowColor['color_congreso'];

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
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
            <link rel="stylesheet" href="../../styles.css">
            <link rel="stylesheet" href="../../Layouts/guiasPlantillas/ayudaPlantillas.css">
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
                            <h2 class="mt-5 mb-3">Administrar Diseño</h2>
                            <div class="texto-dorado">Ayuda</div><br>
                            <?php
                            // Mostrar mensaje si existe
                            if (isset($_SESSION['mensaje'])) {
                                echo '<div class="alert alert-info" role="alert">' . $_SESSION['mensaje'] . '</div>';
                                unset($_SESSION['mensaje']); // Limpiar el mensaje
                            }
                            ?>
                            <div class="container">
                                <div class="table Cuerpo-texto">
                                    <table>
                                        <thead style="background-color: <?php echo $colorHex; ?> !important;">
                                            <tr>
                                                <th class="titulo-tabla" scope="col" width="50%"><span class="span-blanco">Plantillas Actuales</span></th>
                                                <th class="titulo-tabla" scope="col" width="50%"><span class="span-blanco">Modificar Plantillas</span></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td width="50%">
                                                    <span class="span-sub">Guía para autores</span>
                                                    <br><br>
                                                    Este documento detalla el proceso para presentar un trabajo de ponencia con las especificaciones requeridas para su aprobación
                                                    <br><br><br><br>
                                                    <div class="d-flex justify-content-center mt-4">
                                                        <a href="../../src/GuiasYPlantillas/Guia_para_autores_2023.pdf" target="_blank" class="botones_descarga shadow py-1 px-4 mb-5 text-wrap btn text-btn">Descargar Guía</a>
                                                    </div>
                                                </td>
                                                <td width="50%">
                                                    <span class="span-sub">Guía para autores</span><br><br>
                                                    <div class="d-flex justify-content-center mt-4">
                                                        <form action="procesar_archivo_autores.php" method="POST" enctype="multipart/form-data">
                                                            <input class="botones_descarga shadow py-1 px-4 mb-5 text-wrap btn text-btn" type="submit" name="submit1" value="Actualizar Archivo">
                                                            <input type="file" name="nuevo_archivo1">
                                                            <input type="hidden" name="archivo_a_reemplazar1" value="Guia_para_autores_2023.pdf"> <!-- Nombre del archivo a reemplazar -->
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="50%">
                                                    <span class="span-sub">Plantilla para trabajos extensos</span><br><br>
                                                    Los trabajos extensos deberán redactarse basándose en la plantilla de trabajos extensos. La única modalidad que requiere de un trabajo extenso es ponencia oral en formatos .doc o .docx Los archivos no deben exceder los (3 MB).
                                                    <br><br><br><br>
                                                    <div class="d-flex justify-content-center mt-4">
                                                        <a href="../../src/GuiasYPlantillas/Plantilla_extenso_2023.docx" download="Plantilla_extenso_2023.docx" class="botones_descarga shadow py-1 px-4 mb-5 text-wrap btn text-btn">Descargar Plantilla</a>
                                                    </div>
                                                </td>
                                                <td width="50%">
                                                    <span class="span-sub">Plantilla para trabajos extensos</span><br><br>
                                                    <div class="d-flex justify-content-center mt-4">
                                                    <form action="procesar_archivo_extensos.php" method="POST" enctype="multipart/form-data">
                                                            <input class="botones_descarga shadow py-1 px-4 mb-5 text-wrap btn text-btn" type="submit" name="submit2" value="Actualizar Archivo">
                                                            <input type="file" name="nuevo_archivo2">
                                                            <input type="hidden" name="archivo_a_reemplazar2" value="Plantilla_extenso_2023.docx"> <!-- Nombre del archivo a reemplazar -->
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer>
                <?php
                require_once('../../Layouts/footer.php');
                ?>
            </footer>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
            <script src="https://kit.fontawesome.com/c7b1d2a865.js" crossorigin="anonymous"></script>
        </body>

        </html>
<?php
    }
}
?>
