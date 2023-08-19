<?php
session_start();
if (!isset($_SESSION["id"]) || $_SESSION["id"] == null) {
    print "<script>alert(\"Acceso invalido!\");window.location='../../components/inicioSesion/sesion.php';</script>";
}
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
    if ($valor == 43 && $estado == 'ON') {
?>
        <!DOCTYPE html>
        <html lang="es">

        <head>
            <link rel="shortcut icon" href="../../favicon.png">
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Reportes</title>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
            <link rel="stylesheet" href="../../styles.css">
            <link rel="stylesheet" href="../../Layouts/NavbarYPestaña/pestaña.css">
            <link rel="stylesheet" href="./admin.css">
            <link rel="stylesheet" href="../../Layouts/TablasDeReportes/tablasReportes.css">
            <script src="https://cdn.jsdelivr.net/npm/xlsx/dist/xlsx.full.min.js"></script>
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
                            <h2 class="mt-5 mb-5">Reportes</h2>

                            <!-------------------------------------------------------------------------------------------->
                            <?php
                            require "../../Layouts/NavbarYPestaña/navbarYPestañaReportes.php";
                            require "../../Layouts/TablasDeReportes/catalogoTrabajos.php";
                            require "../../Layouts/TablasDeReportes/extensosAprobados.php";
                            require "../../Layouts/TablasDeReportes/extensosPendientesEvaluar.php";
                            require "../../Layouts/TablasDeReportes/extensosPendientesCorregir.php";
                            require "../../Layouts/TablasDeReportes/tablaDeEvaluadores.php";
                            ?>

                        </div>
                        <!----------------------------------script para exportar a excel------------------------------->
                        <script>
                            function exportTableToExcel(tableID, filename = '') {
                                var downloadLink;
                                var dataType = 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet';
                                var tableSelect = document.getElementById(tableID);

                                tableSelect.setAttribute('lang', 'es');

                                var workbook = XLSX.utils.book_new();

                                var worksheet = XLSX.utils.table_to_sheet(tableSelect);

                                XLSX.utils.book_append_sheet(workbook, worksheet, 'Hoja 1');

                                var xlsxFile = XLSX.write(workbook, {
                                    bookType: 'xlsx',
                                    type: 'binary'
                                });

                                var byteArray = new Uint8Array(xlsxFile.length);
                                for (var i = 0; i < xlsxFile.length; i++) {
                                    byteArray[i] = xlsxFile.charCodeAt(i) & 0xFF;
                                }

                                var blob = new Blob([byteArray], {
                                    type: dataType
                                });

                                filename = filename ? filename + '.xlsx' : 'excel_data.xlsx';

                                downloadLink = document.createElement("a");

                                document.body.appendChild(downloadLink);

                                if (navigator.msSaveOrOpenBlob) {
                                    navigator.msSaveOrOpenBlob(blob, filename);
                                } else {
                                    downloadLink.href = URL.createObjectURL(blob);

                                    downloadLink.download = filename;

                                    downloadLink.click();
                                }
                            }
                        </script>
                        <!-------------------------------------------------------------------------------------------->
                        <hr>




                        <!----------------------------------------------------------------------------------------------->
                    </div><!--container-->
                </div><!--col-10-->
            </div><!--row-->
            </div><!--fluid-->
            <footer>
                <?php
                require_once('../../Layouts/footer.php');
                ?>
            </footer>

            <script src="admin.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
            <script src="https://kit.fontawesome.com/c7b1d2a865.js" crossorigin="anonymous"></script>
        </body>

        </html>
<?php
    } // Cierre del if
} // Cierre del foreach
?>