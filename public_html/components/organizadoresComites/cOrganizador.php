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
                                <tr>
                                    <th class="nombre py-2" scope="col">Nombre completo</th>
                                    <th class="institucion py-2" scope="col">Institución</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th class="nombre py-2" scope="row">Dr. José Juan Contreras Espinosa</th>
                                    <td class="institucion py-2">Facultad de Estudios Superiores Cuautitlán</td>
                                </tr>
                                <tr>
                                    <th class="nombre py-2" scope="row ">Dra. Celina Elena Urrutia Vargas</th>
                                    <td class="institucion py-2">Facultad de Estudios Superiores Cuautitlán</td>
                                </tr>
                                <tr>
                                    <th class="nombre py-2" scope="row">Dr. Armando Aguilar Márquez</th>
                                    <td class="institucion py-2">Facultad de Estudios Superiores Cuautitlán</td>
                                </tr>
                                <tr>
                                    <th class="nombre py-2" scope="row ">Dra. Frida María León Rodríguez</th>
                                    <td class="institucion py-2">Facultad de Estudios Superiores Cuautitlán</td>
                                </tr>
                                <tr>
                                    <th class="nombre py-2" scope="row">Dr. José Luz Hernández Castillo</th>
                                    <td class="institucion py-2">Facultad de Estudios Superiores Cuautitlán</td>
                                </tr>
                                <tr>
                                    <th class="nombre py-2" scope="row ">Dr. Jorge Altamira Ibarra</th>
                                    <td class="institucion py-2">Facultad de Estudios Superiores Cuautitlán</td>
                                </tr>
                                <tr>
                                    <th class="nombre py-2" scope="row">M. en I. Miguel de Nazareth Pineda Becerril</th>
                                    <td class="institucion py-2">Facultad de Estudios Superiores Cuautitlán</td>
                                </tr>
                                <tr>
                                    <th class="nombre py-2" scope="row ">Dr. Leonel Gualberto López Salazar</th>
                                    <td class="institucion py-2">Facultad de Estudios Superiores Cuautitlán</td>
                                </tr>
                                <tr>
                                    <th class="nombre py-2" scope="row">Dr. Carlos Oropeza Legorreta</th>
                                    <td class="institucion py-2">Facultad de Estudios Superiores Cuautitlán</td>
                                </tr>
                                <tr>
                                    <th class="nombre py-2" scope="row ">Dr. Omar García León</th>
                                    <td class="institucion py-2">Facultad de Estudios Superiores Cuautitlán</td>
                                </tr>
                                <tr>
                                    <th class="nombre py-2" scope="row">Ing. José Juan Rico Castro</th>
                                    <td class="institucion py-2">Facultad de Estudios Superiores Cuautitlán</td>
                                </tr>
                                <tr>
                                    <th class="nombre py-2" scope="row ">Dr. Rogelio Ramos Carranza</th>
                                    <td class="institucion py-2">Facultad de Estudios Superiores Cuautitlán</td>
                                </tr>
                                <tr>
                                    <th class="nombre py-2" scope="row">Dr. Víctor Hugo Hernández Gómez</th>
                                    <td class="institucion py-2">Facultad de Estudios Superiores Cuautitlán</td>
                                </tr>
                                <tr>
                                    <th class="nombre py-2" scope="row ">Dr. Julio Moisés Sánchez Barrera</th>
                                    <td class="institucion py-2">Facultad de Estudios Superiores Cuautitlán</td>
                                </tr>
                                <tr>
                                    <th class="nombre py-2" scope="row">M. en C. José Isaac Sánchez Guerra</th>
                                    <td class="institucion py-2">Facultad de Estudios Superiores Cuautitlán</td>
                                </tr>
                                <tr>
                                    <th class="nombre py-2" scope="row ">Dr. Hugo Sánchez Nava</th>
                                    <td class="institucion py-2">Facultad de Estudios Superiores Cuautitlán</td>
                                </tr>
                                <tr>
                                    <th class="nombre py-2" scope="row">M.A.O. Martha Lilia Urrutia Vargas</th>
                                    <td class="institucion py-2">Facultad de Estudios Superiores Cuautitlán</td>
                                </tr>
                                <tr>
                                    <th class="nombre py-2" scope="row ">L.D.C.V Karina Simón Farfán</th>
                                    <td class="institucion py-2">Facultad de Estudios Superiores Cuautitlán</td>
                                </tr>
                                <tr>
                                    <th class="nombre py-2" scope="row">Dr. Valentín Roldán Vázquez</th>
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