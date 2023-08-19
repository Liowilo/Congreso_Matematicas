    <?php require_once "../../modelo/inicioSesion.php"; ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <link rel="shortcut icon" href="../../favicon.png">
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>Iniciar Sesión</title>
        <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi"
        crossorigin="anonymous"
        />        
        <link rel="stylesheet" href="styles.css">
    </head> 
    <body>
    <!--Centra el formulario a la mitad de la pantalla-->
        <div class="container full-screen d-flex align-items-center justify-content-center vh-100">
            <div class="row registro p-sm-10">
                <div class="col">
                </div>
                <div class="col-md-12 col-lg-5 col-xl-5 formulario_container rounded-start">
                    <h1 class="">Iniciar Sesión</h1>
                    <hr class="mb-4"/>
                    <div class="row ">
                        <form id="formulario" class="formulario" method="POST" action="sesion.php">
                            <?php
                                if(count($errores) == 1){
                                    ?>
                                    <div class="alert alert-danger text-center">
                                        <?php
                                        foreach($errores as $showerror){
                                            echo $showerror;
                                        }
                                        ?>
                                    </div>
                                    <?php
                                }elseif(count($errores) > 1){
                                    ?>
                                    <div class="alert alert-danger">
                                        <?php
                                        foreach($errores as $showerror){
                                            ?>
                                            <li><?php echo $showerror; ?></li>
                                            <?php
                                        }
                                        ?>
                                    </div>
                                    <?php
                                }
                            ?>
                            <!--Grupo Correo Electronico-->
                            <div class="mb-3" id="formulario_grupo_nombres">
                                <label for="correoElectronico" class="form-label">Correo Electrónico</label>
                                <input type="text" class="form-control input" id="correoElectronico" name="correoElectronico" placeholder="Escribe tu correo" onkeypress="return validarCorreo(event)">
                                <p class="formulario_input-error" id="formulario_informacion_correoElectronico">Esta dirección no tiene formato de correo válido. (ejemplo@ejemplo.com)</p>
                            </div>
                            <!--Grupo Contraseña-->
                            <label for="contrasena" class="form-label">Contraseña</label>
                            <div class="row g-0">
                                <div class="col-11">
                                    <input type="password" class="contrasena form-control input pt-2 pb-2" id="contrasena" name="contrasena" placeholder="" >
                                </div>
                                <div class="col-1">
                                <img id="mostrarContrasena" class="opacity-75 m-0 imagenEye" width="40px" src="../../src/eye_hide.png">
                                <p class="formulario_input-error" id="formulario_informacion_contrasena">Contraseña incorrecta.</p>
                            </div>
                        </div> 
                        <div class="my-3 mb-3 mt-3 text-center">
                            <span class="tt link"><a href="../recuperarContrasena/recuperarContrasen.php" class="link">¿Olvidaste tu contraseña?</a></span>
                        </div>
                        <div class="d-grid col-10 m-auto">
                            <input type="submit" class="btn btn-style mb-3 p-2" id="iniciaSesion" name="iniciaSesion"  value="Iniciar Sesion">
                            <div class="text-center">
                                <span class="tt link">o</span>
                            </div> 
                        </div>
                        <div class="d-grid col-10 m-auto">
                            <a href="../crearCuenta/cuenta.php" class="btn btn-style mt-2 mb-5 p-2" id="registrate" name="registrate" tabindex="0">Registrate</a>
                        </div>
                        <!--Grupo Volver-->
                        <div class="mt-5" role="group">
                            <a href="#!"><i class="fa fa-chevron-left link" style="font-size: 20px;" aria-hidden="true" onclick="history.back()"><span style="font-family: 'Inter Tight', sans-serif; font-weight: 600;"> Volver</span></i></a>
                        </div>
                        </form>
                    </div>
                </div>
                <div class="imagen_container p-0 d-none d-lg-block col-md-5 col-lg-5 col-xl-5">
                    <img class="imagen rounded-end" src="../../src/unamIS.jpg">
                </div>
                <div class="col">
                </div>
            </div>
        </div>
        <!--Referencia al archivo de JavaScript al final para que se carguen los componentes-->
        <script src="sesion.js"></script>

    </body>
    </html>
   