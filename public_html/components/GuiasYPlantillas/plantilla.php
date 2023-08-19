<?php
session_start();
if (!isset($_SESSION["id"]) || $_SESSION["id"] == null) {
    print "<script>alert(\"Acceso invalido!\");window.location='../../components/inicioSesion/sesion.php';</script>";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="shortcut icon" href="../../favicon.png">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Plantillas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="../../styles.css">
    <link rel="stylesheet" href="./guias.css">
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
                    <h2 class="mt-5 mb-3">Plantillas</h2>
                    <div class="container"></div>
                    <h4 class="mt-4">Guía para autores</h4>
                    <span class="texto-sm">Este documento detalla el proceso para presentar un
                        trabajo de ponencia con las especificaciones requeridas para su aprobación</span>
                    <div class="d-flex flex-row-reverse col-10 mt-4">
                        <a href="../../src/GuiasYPlantillas/Guia_para_autores_2023.pdf" target="_blank" class="botones_descarga shadow py-1 px-5 mb-5 text-wrap"><button class="btn text-btn" type="button">Descargar Guia</button></a>
                    </div>
                    <h4 class="mt-4">Plantilla de trabajos extensos</h4>
                    <span class="texto-sm">Los trabajos extensos deberán redactarse basándose en la plantilla de trabajos extensos.
                        La única modalidad que requiere de un trabajo extenso es ponencia oral en formatos .doc o .docx
                        Los archivos no deben exceder los (3 MB).
                    </span>
                    <div class="d-flex flex-row-reverse col-10 mt-4">
                        <a href="../../src/GuiasYPlantillas/Plantilla_extenso_2023.docx" download="Plantilla_extenso_2023" class="botones_descarga shadow py-1 px-5 mb-5 text-wrap"><button class="btn text-btn" type="button">Descargar Plantilla</button></a>
                    </div>
                </div>
            </div><!--container-->
        </div><!--col-10-->
    </div><!--row-->
    </div><!--fluid-->
    <footer>
        <?php
        require_once('../../Layouts/footer.php');
        ?>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/c7b1d2a865.js" crossorigin="anonymous"></script>
</body>

</html>