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
    <title>Comité técnico</title>
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
<div class="container-fluid mt-5 mb-5">
    <div class="row p-2"> 
        <div class="col-xl-2 col-lg-2 col-md-1 d-none d-sm-block">
        </div>
<!----------CONTENEDOR PRINCIPAL----------->  
        <div class="col-xl-10 col-lg-10 col-md-10 col-sm-12">
        <!-----------Tabla------------> 
            <div class= "container">
            <h2 class="mb-4">Comité técnico</h2><!--------TITULO INTERNO------------> 
                <table class="table table-striped mt-1" >
                    <thead class="categorias">
                        <tr>
                            <th class="nombre py-2" scope="col">Nombre completo</th>
                            <th class="institucion py-2" scope="col">Institución</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th class="nombre py-2" scope="row">M.D.A Clarisa Clemente Rodríguez</th>
                            <td class="institucion py-2">Facultad de Estudios Superiores Cuautitlán</td>
                        </tr>
                        <tr>
                            <th class="nombre py-2" scope="row ">M.C. Mayte Flores Pérez</th>
                            <td class="institucion py-2">Facultad de Estudios Superiores Cuautitlán</td>
                        </tr>
                        <tr>
                            <th class="nombre py-2" scope="row">M.C. Maricela Lara Martínez</th>
                            <td class="institucion py-2">Facultad de Estudios Superiores Cuautitlán</td>
                        </tr>
                        <tr>
                            <th class="nombre py-2" scope="row ">L.S.C. Liana López Pachecho</th>
                            <td class="institucion py-2">Facultad de Estudios Superiores Cuautitlán</td>
                        </tr>
                        <tr>
                            <th class="nombre py-2" scope="row">M. en CE. Domingo Márquez Ortega</th>
                            <td class="institucion py-2">Facultad de Estudios Superiores Cuautitlán</td>
                        </tr>
                        <tr>
                            <th class="nombre py-2" scope="row ">Ing. Guillermo Pérez Hernández</th>
                            <td class="institucion py-2">Facultad de Estudios Superiores Cuautitlán</td>
                        </tr>
                        <tr>
                            <th class="nombre py-2" scope="row">Ing. José Juan Rico Castro</th>
                            <td class="institucion py-2">Facultad de Estudios Superiores Cuautitlán</td>
                        </tr>
                        <tr>
                            <th class="nombre py-2" scope="row ">M.G.T.I. Rosalba Nancy Rosas Fonseca</th>
                            <td class="institucion py-2">Facultad de Estudios Superiores Cuautitlán</td>
                        </tr>
                        <tr>
                            <th class="nombre py-2" scope="row">M.V.Z. Alejandro Valdez Santamaría</th>
                            <td class="institucion py-2">Facultad de Estudios Superiores Cuautitlán</td>
                        </tr>
                        <tr>
                            <th class="nombre py-2" scope="row ">M. en C. María Guadalupe Vázquez Salazar</th>
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