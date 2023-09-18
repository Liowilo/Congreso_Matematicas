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
        <html lang="es">

        <head>
            <link rel="shortcut icon" href="../../favicon.png">
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Congreso</title>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
                integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi"
                crossorigin="anonymous">
            <link rel="stylesheet" href="../../styles.css">
            <link rel="stylesheet" href="../../Layouts/NavbarYPestaña/pestaña.css">
            <link rel="stylesheet" href="./admin.css">
            <link rel="stylesheet" href="../../Layouts/CrearCongreso/crearCongreso.css">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
                integrity="sha384-fbnYnJt1BfFj/tKuWELG5S7tv+20a2OvEgduPJi1d0zDAtMDodhQKgX8hKfQIP3z"
                crossorigin="anonymous">
            <style>
                /* Estilos para la tarjeta */
                .card {
                    border: 1px solid #ccc;
                    padding: 10px;
                    width: 1200px;
                    margin-left: 35px;
                    position: relative;
                    z-index: 1;
                }

                h2.modulo {
                    margin-top: 16px;
                }

                .option {
                    cursor: pointer;
                    border: 1px solid #ccc;
                    border-radius: 8px;
                    padding: 8px 12px;
                    margin-bottom: 5px;
                    margin-top: 8px;
                    transition: background-color 0.3s;
                    display: flex;
                    align-items: center;
                }

                .option i {
                    margin-left: 20px;
                }

                .content {
                    max-height: 0;
                    overflow: hidden;
                    transition: max-height 1.5s ease-in-out;
                    /* max-height: 400px;*/ /* Establece una altura máxima */
                    overflow-y: auto; /* Agrega una barra de desplazamiento vertical si es necesario */

                }

                .content.slow-close {
                    transition: max-height 0.5s ease-in-out;
                }

                .content.show {
                    max-height: 600px; /* Ajusta la altura máxima según tus necesidades */
                }
                .fa {
  color: #C5B268 !important;
}
            </style>
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
                            <h2 class="mt-5 mb-5">Administrar Diseño</h2>
                            <?php
                            /* require "../../modelo/cambiarDiseño.php";*/
                            ?>
                        </div>
                        <div class="mt-5 mb-3 card">
                            
                            <hr style="border: 1px solid #000;">
                            <h4> <div  class="option" style="color: rgb(234, 190, 63);" onclick="toggleContent('content1')">Crear
                                Cuenta<i class="fas fa-plus"></i></div></h4>
                            <div class="content" id="content1">
                                <div class="table-responsive"
                                    style="margin-left: 30px;padding-left: 0px;border-top-left-radius: 14px;border-top-right-radius: 14px;border-bottom-right-radius: 14px;border-bottom-left-radius: 14px;border: 0.5px solid var(--bs-gray);margin-right: 38px;">
                                    <table class="table">
                                        <thead style="text-align: center;background: var(--bs-blue);">
                                            <tr class="first-row">
                                                <th
                                                    style="padding: 16px 0px 8px 8px;padding-right: 0px;margin: 0px;margin-right: 3px;background: #4581da;">
                                                    Inicio de Sesión&nbsp;</th>
                                                <th style="background: rgb(69,129,218);">Crear Cuenta</th>
                                                <th style="background: rgb(69,129,218);">Contraseña</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td style="text-align: center;border-style: none;">
                                                    <img src="../../src/unamIS.jpg"
                                                        width="215" height="319"
                                                        style="width: 215px; height: 320px; object-fit: cover; border-top-left-radius: 14px; border-top-right-radius: 14px; border-bottom-right-radius: 14px; border-bottom-left-radius: 14px;">
                                                    <button class="btn btn-primary" type="button"
                                                        style="width: 215px;margin-left: 1px;margin-top: 10px;background: rgb(235,200,97);">Cambiar</button>
                                                    <button class="btn btn-primary" type="button"
                                                        style="width: 215px;margin-left: 1px;margin-top: 10px;background: rgb(69,129,218);">Eliminar</button>
                                                </td>
                                                <td style="text-align: center;border-style: none;">
                                                    <img src="../../src/imgCuenta.jpg"
                                                        width="167" height="259"
                                                        style="width: 215px; height: 320px; object-fit: cover; border-top-left-radius: 14px; border-top-right-radius: 14px; border-bottom-right-radius: 14px; border-bottom-left-radius: 14px;">
                                                    <button class="btn btn-primary" type="button"
                                                        style="width: 215px;margin-left: 1px;margin-top: 10px;background: rgb(235,200,97);">Cambiar</button>
                                                    <button class="btn btn-primary" type="button"
                                                        style="width: 215px;margin-left: 1px;margin-top: 10px;background: rgb(69,129,218);">Eliminar</button>
                                                </td>
                                                <td style="text-align: center;border-style: none;">
                                                    <img src="../../src/unamRC.jpg"
                                                        width="167" height="259"
                                                        style="width: 215px; height: 320px; object-fit: cover; border-top-left-radius: 14px; border-top-right-radius: 14px; border-bottom-right-radius: 14px; border-bottom-left-radius: 14px;">
                                                    <button class="btn btn-primary" type="button"
                                                        style="width: 215px;margin-left: 1px;margin-top: 10px;background: rgb(235,200,97);">Cambiar</button>
                                                    <button class="btn btn-primary" type="button"
                                                        style="width: 215px;margin-left: 1px;margin-top: 10px;background: rgb(69,129,218);">Eliminar</button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <h4><div class="option" style="color: rgb(234, 190, 63);" onclick="toggleContent('content2')">Costos Individuales<i class="fas fa-plus"></i></div></h4>
                            <div class="content" id="content2">                                
                                <!-----------DATOS DE CUOTAS AL CONGRESO------------>
                                 <div class="table-responsive"
                                    style="margin-left: 30px;padding-left: 0px;border-top-left-radius: 14px;border-top-right-radius: 14px;border-bottom-right-radius: 14px;border-bottom-left-radius: 14px;margin-right: 38px;">
                                    <table class="table">
                                        <thead style="text-align: center;background: var(--bs-blue);">
                                            <tr class="first-row">
                                                <th
                                                    style="color: white;padding: 16px 0px 8px 8px;padding-right: 0px;margin: 0px;margin-right: 3px;background: #4581da;">
                                                    Cuotas Actuales&nbsp;</th>
                                                <th style="color: white;background: rgb(69,129,218);">Cuotas Actualizadas</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td style="text-align: center; border:0.5px  solid var(--bs-gray);">
                                                <?php 
                                                require '../../modelo/traerCostos.php';
                        while($row=mysqli_fetch_assoc($res)){

                        
                        ?>
                        
                        <div class="row my-1 mx-5">
                            <div class="card-body-cuotas rounded text-center py-2"><b><?php echo $row['Tipo'];//Asigna el nombre
                                        ?></b></div>
                            <div class="col-sm-4 col-md-6 col-lg-6 px-3 pt-2 mt-3">
                                    <p class="pt py-2 text-center">Cuota</p>
                                </div>
                                <div class="col mt-4">
                                    <span class="cuotas text-center border border-success p-2 border-opacity-10 rounded">$<?php echo $row['Costo'];//Asigna el nombre
                                        ?>.00</span>
                                </div>
                            </div>
                            <div class="row m-1">
                                <i class="fa fa-question-circle" style="font-size: 30px;" aria-hidden="true"><p class="subtitulo py-2"><?php echo $row['Descripcion'];//Asigna el nombre
                                        ?></p></i>
                                
                            </div>
                        </div>
                        </div>
                        <?php } mysqli_free_result($res);?>
                                                </td>
                                                <form action="atualizaCosto.php" class="row g-4" method="POST">
                                                <td style="text-align: center; border:0.5px  solid var(--bs-gray);">
                                                    
                        <!-----------DATOS DE CUOTAS AL CONGRESO------------>
                        <!--<form action="<?=$_SERVER['PHP_SELF']?>" class="row g-4" method="POST">-->
                        <div class="row my-1 mx-5">
                            <div class="card-body-cuotas rounded text-center py-2" ><b>PONENTES</b></div>
                            
                                <div class="col-sm-4 col-md-6 col-lg-6 px-3 pt-2 mt-3">
                                    <p class="pt py-2 text-center">Nueva Cuota</p>
                                </div>
                                <div class="col m-4">
                                    <!--<span class="cuotas text-center border border-success p-2 border-opacity-10 rounded">$1,400.00</span>-->
                                    <input type="text" name="costoPonente" id="ponente" class="form-control" placeholder="$$$"autocomplete="off">
                                </div>
                            </div>
                            <div class="row m-1">
                                <p class="subtitulo py-2">
                                    
                                </p>
                            </div>
                        </div>
                        <div class="row my-2 mx-5">
                            <div class="card-body-cuotas rounded text-center py-2"><b>ASISTENTES</b></div>
                            <div class="col-sm-4 col-md-6 col-lg-6 px-3 pt-2 mt-3">
                                
                                    <p class="pt py-2 text-center">Nueva Cuota</p>
                               </div>
                                <div class="col m-4">
                                    <!--<span class="cuotas text-center border border-success p-2 border-opacity-10 rounded">$1,000.00</span>-->
                                    <input type="text" name="costoAsistente" id="asistente" class="form-control" placeholder="$$$"autocomplete="off">
                                </div>
                            </div>
                            <div class="row m-1">
                                <p class="subtitulo py-2"></p>
                            </div>
                        </div>
                        <div class="row my-2 mx-5">
                            
                            <div class="card-body-cuotas rounded text-center py-2"><b>ESTUDIANTES</b></div>
                               <div class="col-sm-4 col-md-6 col-lg-6  px-3 pt-2">
                                    
                                        <p class="pt py-2 text-center">Nueva Cuota</p>
                                </div>
                                <div class="col m-4">
                                    <!--<span class="cuotas text-center border border-success p-2 border-opacity-10 rounded">$200.00</span>-->
                                    <input type="text" name="costoEstudiante" id="estudiante" class="form-control" placeholder="$$$"autocomplete="off">
                                </div>
                        </div>
                    </div>
                    
                                                </td>
                                    
                                            </tr>
                                            <tr>      
                                        <td style="text-align: right;border-style: none; width: 215px;" colspan="2">
                                        <input id="modificarCosto" name="botonModificarCosto"
                                            class="btn btn-azul pe-5 ps-5" type="submit" value="Modificar">
                                    </td></form>
            </tr>

                                        </tbody>
                                    </table>
                                </div>
            
                            </div>
                            
                            <h4><div class="option" style="color: rgb(234, 190, 63);" onclick="toggleContent('content3')">Menú 3<i class="fas fa-plus"></i></div></h4>
                            <div class="content" id="content3">
                                <p>Contenido Menú 3...</p>
                            </div>
                        </div>

                        <script>
                            function toggleContent(id) {
                                var content = document.getElementById(id);
                                content.classList.toggle('show');
                                var icon = content.previousElementSibling.querySelector('i');
                                if (content.classList.contains('show')) {
                                    icon.classList.remove('fa-plus');
                                    icon.classList.add('fa-minus');
                                } else {
                                    icon.classList.remove('fa-minus');
                                    icon.classList.add('fa-plus');
                                    content.classList.add('slow-close');
                                }
                            }
                        </script>
                        <form method="POST" id="form" enctype="multipart/form-data">
                            <div class="row d-flex align-items-center justify-content-center contenedor mt-4">
                                <div class="col p-10 flex-fill col-xl-2 col-lg-2 col-md-2 col-sm-12 mb-3">
                                    <!--Boton para subir o seleccionar nueva foto-->
                                    <label for="inputFoto" class="form-label">Logo del Congreso</label>
                                    <input type="file" accept="image/png,image/jpeg,image/jpg" class="form-control"
                                        name="inputLogo" id="inputFotoPerfil">
                                </div>
                                <div class="col p-10 flex-fill col-xl-2 col-lg-2 col-md-2 col-sm-12 mb-3">
                                    <!--Boton para subir o seleccionar nueva foto-->
                                    <label for="inputFoto" class="form-label">Banner del congreso</label>
                                    <input type="file" accept="image/png,image/jpeg,image/jpg" class="form-control"
                                        name="inputBanner" id="inputFotoBanner">
                                </div>
                                <div class="col p-10 flex-fill col-xl-2 col-lg-2 col-md-2 col-sm-12 mb-3">
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
                        </form>
                    </div>
                </div>
            </div>
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
