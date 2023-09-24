<?php
session_start();
if (!isset($_SESSION["id"]) || empty($_SESSION["id"])) {
    echo "<script>alert('Acceso inválido.'); window.location.href='../../components/inicioSesion/sesion.php';</script>";
    exit;
}

require_once "../../modelo/conexion.php";
require_once "../../modelo/privilegiosUsuario.php";
require "../../modelo/actualizarEstiloCogreso.php";

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
            <link rel="stylesheet" href="../../Layouts/CrearCongreso/crearCongreso.css">
            <link rel="stylesheet" href="../../components/cambiarDiseño/cambiarDiseño.css">
            <link rel="stylesheet" href="../paginaPrincipal/paginaPrincipal.css">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha384-fbnYnJt1BfFj/tKuWELG5S7tv+20a2OvEgduPJi1d0zDAtMDodhQKgX8hKfQIP3z" crossorigin="anonymous">
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
        </head>

        <body>
            <header">
                <?php
                require_once('../../Layouts/nav.php');
                ?>
            </header>
            <div class="container-fluid contenido">
                <div class="row">
                    <div class="col-xl-3 col-lg-3 col-md-1 d-sm-block background-lateral">
                        <?php
                        require_once('../../Layouts/sidebar.php');
                        ?>
                    </div>
                    <div class="col-xl-9 col-lg-9 col-md-11 col-sm-12">
                        <div class="container">
                            <h2 class="mt-5 mb-3">Administrar Diseño</h2>

                            <div class="texto-modulo">
                                <h3 class="texto-dorado">Cambiar Diseño de la Página Principal del Congreso</h3>
                            </div>
                            <!-- Comienzo modulo Diseño del Congreso -->
                            <div class="cuadricula">
                                <!-- Color del Banner -->
                                <div class="elemento-cuadricula">
                                    <h4>Color del Banner</h4>
                                </div>
                                <div class="elemento-cuadricula">
                                    <h4>Actualizar Color del Banner</h4>
                                </div>
                                <div class="elemento-cuadicula colores-antes bd">
                                    <div class="contenido-colores">
                                        <form>
                                            <label for="color" class="textoCuadricula">Color anterior:</label><br>
                                            <input type="color" id="color" name="color" class="colorInput" disabled>
                                        </form>
                                        <!-- Script Debajo del Footer -->
                                        <div id="muestraColor"></div>
                                        <div id="valorHexadecimal" class="textoCuadricula"></div>
                                    </div>
                                </div>

                                <div class="elemento-cuadicula">
                                    <div class="contenido-colores">
                                        <form>
                                            <label for="color2" class="textoCuadricula">Color Nuevo:</label><br>
                                            <input type="color" id="color2" name="color2" class="colorInput">
                                        </form>
                                        <!-- Script Debajo del Footer -->
                                        <div id="muestraColor2"></div>
                                        <div id="valorHexadecimal2" class="textoCuadricula"></div>
                                    </div>
                                </div>

                                <!-- Nombre del Longreso -->

                                <div class="elemento-cuadricula">
                                    <h4>Nombre del Congreso</h4>
                                </div>
                                <div class="elemento-cuadricula">
                                    <h4>Actualizar Nombre del congreso</h4>
                                </div>
                                <div class="elemento-cuadricula bd contenido-flex nombre-antes">
                                    <h5>XIV CONGRESO INTERNACIONAL SOBRE LA ENSEÑANZA Y APLICACIÓN DE LAS MATEMÁTICAS</h5>
                                </div>
                                <div class="elemento-cuadricula">
                                    <form action="#">
                                        <label for="nombreC" class="nombreTitulo">Nuevo Nombre</label><br>
                                        <textarea name="" id="nombreC" class="nombreCongreso"></textarea> <!-- Script Uppercase debajo -->
                                    </form>
                                </div>

                                <!-- Logos del Congreso -->

                                <div class="elemento-cuadricula">
                                    <h4>Logos</h4>
                                </div>
                                <div class="elemento-cuadricula">
                                    <h4>Actualizar Logos</h4>
                                </div>
                                <div class="elemento-cuadricula bd logos-cuadricula grid-logos">
                                    <div class="bloque">
                                        <img class="imagen-logo" src="/desarrollo/src/logos_congresos/XIV.png" style="width: 80%;">
                                        <label style="font-size: 20px; font-weight: bold;">Logo 1</label>
                                    </div>
                                    <div class="bloque">
                                        <img class="imagen-logo" src="/desarrollo/src/logoMatematicas.png" style="width: 80%;">
                                        <label style="font-size: 20px; font-weight: bold;">Logo 2</label>
                                    </div>
                                </div>
                                <div class="elemento-cuadricula bd logos-cuadricula grid-logos-botones">
                                    <div class="bloque bd">
                                        <label style="font-size: 20px; font-weight: bold;">Logo 1</label>
                                        <button class="btn btn-primary" type="button" style="width: 80%; margin: 30px 0; background-color: #ebc961; font-size: 20px; font-weight: 600; border: none;">Cambiar</button>
                                        <button class="btn btn-primary" type="button" style="width: 80%; background-color: #4581da; font-size: 20px; font-weight: 600; border: none;">Eliminar</button>
                                    </div>
                                    <div class="bloque">
                                        <label style="font-size: 20px; font-weight: bold;">Logo 2</label>
                                        <button class="btn btn-primary" type="button" style="width: 80%; margin: 30px 0; background-color: #ebc961; font-size: 20px; font-weight: 600; border: none;">Cambiar</button>
                                        <button class="btn btn-primary" type="button" style="width: 80%; background-color: #4581da; font-size: 20px; font-weight: 600; border: none;">Eliminar</button>
                                    </div>
                                </div>

                                <!-- Cartel o Poster del congreso -->

                                <div class="elemento-cuadricula">
                                    <h4>Cartel</h4>
                                </div>
                                <div class="elemento-cuadricula">
                                    <h4>Actualizar Cartel</h4>
                                </div>
                                <div class="elemento-cuadricula bd contenedor-cartel imagen-logo grid-cartel">
                                    <img src="/desarrollo/src/cartel.png" width="254" height="360" alt="cartel" style="border-radius: 10px">
                                </div>

                                <div class="elemento-cuadricula">
                                    <button class="btn btn-primary" type="button" style="width: 80%; margin: 5px; margin: 30px 0; background-color: #ebc961; font-size: 20px; font-weight: 600; border: none;">Cambiar</button>
                                    <button class="btn btn-primary" type="button" style="width: 80%; margin: 5px; background-color: #4581da; font-size: 20px; font-weight: 600; border: none;">Eliminar</button>
                                </div>

                                <!-- Banner -->

                                <div class="elemento-cuadricula banner-titulo">
                                    <h4>Actualizar Banner</h4>
                                </div>
                                <div class="elemento-cuadricula banner-imagen">
                                    <p><b></b>Antiguo banner:</p>
                                    <img src="/desarrollo/src/Banner-Oficial.jpg" width="80%" alt="cartel" style="border-radius: 10px">
                                    <div class="botones-banner">
                                        <button class="boton-dsg boton-dsg--amarillo">Cambiar Banner</button>
                                        <button class="boton-dsg boton-dsg--azul">Eliminar Banner</button>
                                    </div>
                                </div>

                                <!-- Patrocinadores del Congreso -->

                                <div class="elemento-cuadricula">
                                    <h4>Patrocinadores</h4>
                                </div>
                                <div class="elemento-cuadricula">
                                    <h4>Actualizar Patrocinadores</h4>
                                </div>
                                <div class="elemento-cuadricula bd pat-anterior carrusel"> <!-- Carrusel -->
                                    <!-- Slider main container -->
                                    <div class="swiper">
                                        <!-- Additional required wrapper -->
                                        <div class="swiper-wrapper">
                                            <!-- Slides -->
                                            <div class="swiper-slide"><img src="../../src/logo.jpeg" alt=""></div>
                                            <div class="swiper-slide"><img src="../../src/memoria1.png" alt=""></div>
                                            <div class="swiper-slide"><img src="../../src/logoMatematicas.png" alt=""></div>
                                            <div class="swiper-slide"><img src="../../src/logoFESC.png" alt="s"></div>
                                            <div class="swiper-slide"><img src="../../src/logoFESC.png" alt=""></div>
                                        </div>
                                        <!-- If we need pagination -->
                                        <div class="swiper-pagination"></div>

                                        <!-- If we need navigation buttons -->
                                        <div class="swiper-button-prev"></div>
                                        <div class="swiper-button-next"></div>

                                    </div>
                                </div>
                                <div class="elemento-cuadricula patrocinadores">
                                    <p>Se pueden seleccionar un máximo de 6 imágenes.</p>
                                    <a href="" class="boton-dsg boton-dsg--amarillo">Subir Imágenes</a>
                                    <a href="" class="boton-dsg boton-dsg--azul">Eliminar Imágenes</a>
                                    <p>Lorem ipsum dolor sit amet.</p>
                                    <p>Provident natus suscipit aperiam odio.</p>
                                    <p>Distinctio quis provident repellendus labore.</p>
                                    <p>Sint nemo a tempora fugit!</p>
                                    <p>Aut id doloribus delectus soluta!</p>
                                </div>
                            </div> <!-- Cuadricula diseño -->
                        </div>
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
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
            <script src="https://kit.fontawesome.com/c7b1d2a865.js" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
            <!-- Scripts para la paleta de colores -->

            <script>
                //Paleta Color Anterior
                const colorInput = document.getElementById('color');
                const muestraColor = document.getElementById('muestraColor');
                const valorColor = document.getElementById('valorHexadecimal');

                colorInput.addEventListener('input', function() {
                    const colorSeleccionado = this.value;
                    muestraColor.style.backgroundColor = this.value;

                    const colorHex = colorSeleccionado.slice(1).toUpperCase();
                    valorHexadecimal.innerHTML = `Valor Hexadecimal: #${colorHex}`;
                });
            </script>
            <script>
                //Paleta Nuevo Color
                const colorInput2 = document.getElementById('color2');
                const muestraColor2 = document.getElementById('muestraColor2');
                const valorColor2 = document.getElementById('valorHexadecimal2');

                colorInput2.addEventListener('input', function() {
                    const colorSeleccionado2 = this.value;
                    muestraColor2.style.backgroundColor = this.value;

                    const colorHex2 = colorSeleccionado2.slice(1).toUpperCase();
                    valorHexadecimal2.innerHTML = `Valor Hexadecimal: #${colorHex2}`;
                });
            </script>

            <!-- Script para textarea del nombre del congreso en mayusculas -->

            <script>
                const textarea = document.getElementById('nombreC');

                textarea.addEventListener('input', function() {
                    this.value = this.value.toUpperCase();
                });
            </script>

            <!-- Script para el carrusel de patrocinadores-->
            <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
            <script>
                const swiper = new Swiper('.swiper', {
                    // Optional parameters
                    direction: 'horizontal',

                    loop: true,

                    // If we need pagination
                    pagination: {
                        el: '.swiper-pagination',
                        clickable: true,
                    },

                    // Navigation arrows
                    navigation: {
                        nextEl: '.swiper-button-next',
                        prevEl: '.swiper-button-prev',
                    },

                    // And if we need scrollbar
                    scrollbar: {
                        el: '.swiper-scrollbar',
                    },
                });
            </script>
        </body>

        </html>
<?php }
}
?>
