<?php
session_start();
require "../../modelo/conexion.php";
// Traer color automatizado
$valorColor = "SELECT color_congreso FROM recursos_pagprin WHERE idRecurso = '1'";
$color = mysqli_query($conexion, $valorColor);
$rowColor = $color->fetch_assoc();
$colorHex = $rowColor['color_congreso'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php
		require_once('../../Layouts/iconoCongresoLink.php');
	?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comité organizador</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="../../styles.css">
    <link rel="stylesheet" href="./comites.css">

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
                <div class="col-xl-2 col-lg-2 col-md-1 d-none d-sm-block">
                </div>
                <div class="col-xl-10 col-lg-10 col-md-10 col-sm-12">
                    <div class="container">
                        <h2 class="mb-4">Comité organizador</h2><!--------TITULO INTERNO------------>
                        <table class="table table-striped">
                            <thead class="categorias">
                                <tr style="background-color: <?php echo $colorHex; ?>;">
                                    <th class="nombre py-2" scope="col">Nombre completo</th>
                                    <th class="institucion py-2" scope="col">Institución</th>
                                </tr>
                            </thead>
                            <tbody>
                               <tr>
                                    <th class="nombre py-2" scope="row">Dr. Aguilar Márquez Armando</th>
                                    <td class="institucion py-2">Facultad de Estudios Superiores Cuautitlán</td>
                                </tr>
                                <tr>
                                    <th class="nombre py-2" scope="row ">Dr. Altamira Ibarra Jorge</th>
                                    <td class="institucion py-2">Facultad de Estudios Superiores Cuautitlán</td>
                                </tr>
                                <tr>
                                    <th class="nombre py-2" scope="row">Dr. Contreras Espinosa José Juan</th>
                                    <td class="institucion py-2">Facultad de Estudios Superiores Cuautitlán</td>
                                </tr>
                                <tr>
                                    <th class="nombre py-2" scope="row ">Dra. Cruz Sánchez Claudia</th>
                                    <td class="institucion py-2">Facultad de Estudios Superiores Cuautitlán</td>
                                </tr>
                                <tr>
                                    <th class="nombre py-2" scope="row">Dr. García León Omar</th>
                                    <td class="institucion py-2">Facultad de Estudios Superiores Cuautitlán</td>
                                </tr>
                                <tr>
                                    <th class="nombre py-2" scope="row ">Dr. Hernández Castillo José Luz</th>
                                    <td class="institucion py-2">Facultad de Estudios Superiores Cuautitlán</td>
                                </tr>
                                <tr>
                                    <th class="nombre py-2" scope="row">Dr. Hernández Gómez Víctor Hugo</th>
                                    <td class="institucion py-2">Facultad de Estudios Superiores Cuautitlán</td>
                                </tr>
                                <tr>
                                    <th class="nombre py-2" scope="row ">Dra. León Rodríguez Frida María</th>
                                    <td class="institucion py-2">Facultad de Estudios Superiores Cuautitlán</td>
                                </tr>
                                <tr>
                                    <th class="nombre py-2" scope="row">Dr. López Salazar Leonel Gualberto</th>
                                    <td class="institucion py-2">Facultad de Estudios Superiores Cuautitlán</td>
                                </tr>
                                <tr>
                                    <th class="nombre py-2" scope="row ">Dr. Oropeza Legorreta Carlos</th>
                                    <td class="institucion py-2">Facultad de Estudios Superiores Cuautitlán</td>
                                </tr>
                                <tr>
                                    <th class="nombre py-2" scope="row">M. en I. Pineda Becerril Miguel de Nazareth</th>
                                    <td class="institucion py-2">Facultad de Estudios Superiores Cuautitlán</td>
                                </tr>
                                <tr>
                                    <th class="nombre py-2" scope="row ">Ing. Rico Castro José Juan</th>
                                    <td class="institucion py-2">Facultad de Estudios Superiores Cuautitlán</td>
                                </tr>
                                <tr>
                                    <th class="nombre py-2" scope="row">Dra. Rigaud Telllez Nelly</th>
                                    <td class="institucion py-2">Facultad de Estudios Superiores Cuautitlán</td>
                                </tr>
                                <tr>
                                    <th class="nombre py-2" scope="row ">Dr. Roldán Vázquez Valentín</th>
                                    <td class="institucion py-2">Facultad de Estudios Superiores Cuautitlán</td>
                                </tr>
                                <tr>
                                    <th class="nombre py-2" scope="row">Dr. Sánchez Barrera Julio Moisés</th>
                                    <td class="institucion py-2">Facultad de Estudios Superiores Cuautitlán</td>
                                </tr>
                                <tr>
                                    <th class="nombre py-2" scope="row ">Dr. Sánchez Nava Hugo</th>
                                    <td class="institucion py-2">Facultad de Estudios Superiores Cuautitlán</td>
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
