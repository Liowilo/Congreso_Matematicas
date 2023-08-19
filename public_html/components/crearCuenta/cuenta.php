<?php require_once "../../modelo/crearCuenta.php"; ?>
    <!DOCTYPE html>
    <html lang="es">
    <head>
        <link rel="shortcut icon" href="../../favicon.png">
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>Crear Cuenta</title>
        
        <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi"
        crossorigin="anonymous"
        />
        
         <script type="text/javascript">
            var onloadCallback = function() {
            grecaptcha.render('rcaptcha', {
            'sitekey' : '6Le-LBcjAAAAAAJ1FfWNwbOONpcYMYZ_XMIfmE9m'
        });
      };
    </script>
        <link rel="stylesheet" href="styles.css">
    </head> 
    <body>
        <!--Centra el formulario a la mitad de la pantalla-->
        <div class="container full-screen d-flex align-items-center justify-content-center vh-100">
            <div class="row registro p-sm-10">
                <div class="col ">
                </div>
                <div class="col-md-12 col-lg-5 col-xl-6 formulario_container">
                    <div class="my-5 d-flex justify-content align-items-center">
                        <span class="h1 text-secondary"><u>Registro 1/4</u></span>
                        <img id="rfcInformacion" style="cursor: pointer" class="mx-3 rfcInformacion viewPassword imagenQuestion" src="../../src/question.png" alt="" data-toggle="tooltip" data-placement="right" title="El registro consta de 4 pasos, te encuntras en el 1/4, registrar tus datos personales.">
                    </div>
                    <h1 class="titulo">Crear Cuenta</h1>
                    <form id="formulario" class="formulario"  action="cuenta.php" method="POST">
                        <?php 
                        if(isset($_SESSION['info'])){
                            ?>
                            <div id="informacionExito" class="alert alert-success text-center">
                                <?php echo $_SESSION['info']; ?>
                            </div>
                            <?php
                        }
                        ?>
                        <?php
                        if(count($errores) > 0){
                            ?>
                            <div id="informacionError" class="alert alert-danger text-center">
                                <?php
                                foreach($errores as $showerror){
                                    echo $showerror;
                                }
                                ?>
                            </div>
                            <?php
                        }
                        ?>
                        <!--Grupo Nombres-->
                        <div class="mb-3" id="formulario_grupo_nombres">
                            <label for="nombres" class="form-label"><span class="text-danger">*</span> Nombres</label>
                            <input type="text" class="form-control" id="nombres" name="nombres" maxlength="90" placeholder="Escribe tus nombres" onkeypress="return validarNombres(event)">
                            <p class="formulario_input-error" id="formulario_informacion_nombres">El nombre no debe contener más de dos espacios y máximo 90 caractéres.</p>
                        </div>
                        <!--Grupo Apellidos-->
                        <div class="mb-3 formulario_grupo">
                            <label for="apellidos" class="form-label"><span class="text-danger">*</span> Apellidos</label>
                            <input type="text" class="form-control input" id="apellidos" name="apellidos" maxlength="90" placeholder="Escribe tus apellidos" onkeypress="return validarApellidos(event)">
                            <p class="formulario_input-error" id="formulario_informacion_apellidos">Los apellidos no deben contener más de dos espacios y máximo 90 caractéres.</p>
                        </div>
                        <!--Grupo Correo Electrónico-->
                        <div class="mb-3 formulario_grupo">
                            <label for="correoElectronico" class="form-label" maxlength="90"><span class="text-danger">*</span> Correo Electrónico</label>
                            <input type="text" class="form-control input" id="correoElectronico" name="correoElectronico" placeholder="Escribe tu correo" onkeypress="return validarCorreo(event)">
                            <p class="formulario_input-error" id="formulario_informacion_correoElectronico">Esta dirección no tiene formato de correo válido. (ejemplo@ejemplo.com)</p>
                        </div>
                        <!--Grupo RFC-->
                        <div class="mb-3 formulario_grupo">
                            <label for="rfc" class="form-label"><span class="text-danger">*</span> RFC</label>
                            <a href="https://www.mi-rfc.com.mx/consulta-rfc-homoclave" target="blank"><img id="rfcInformacion" class="rfcInformacion viewPassword imagenQuestion" src="../../src/question.png" alt="" data-toggle="tooltip" data-placement="right" title="¿No sabes cuál es tu RFC? Consúltalo dando click aquí."></a>
                            <input type="text" class="form-control input" id="rfc" name="rfc" maxlength="30" placeholder="" onkeypress="return validarRfc(event)">
                            <p class="formulario_input-error" id="formulario_informacion_rfc">El RFC no debe exceder de 30 caractéres.</p>
                            <div id="rcaptcha" data-callback="validarCaptcha" class="g-recaptcha my-3"></div>
                        </div>
                        <!--Grupo Tienes cuenta-->
                        <div class="mb-1 contenedor_link">
                            <label class="form-label link">¿Ya tienes una cuenta?<a class="link_sesion" href="../inicioSesion/sesion.php" disable> Inicia Sesión.</a></label>
                        </div>
                        <!--Grupo Registrate-->
                        <div class="mb-1 div_boton align-items-center justify-content-center">
                            <input type="submit" class="btn btn boton registrate" id="registrate" name="registrate" value="Registrate" disabled>
                        </div>
                        <span class="text-danger">* Campos obligatorios</span> 
                        <!--Grupo Volver-->
                        <div class="mt-5" role="group">
                            <a href="#!"><i class="fa fa-chevron-left link" style="font-size: 20px;" aria-hidden="true" onclick="history.back()"><span style="font-family: 'Inter Tight', sans-serif; font-weight: 600;"> Volver</span></i></a>
                        </div>
                    </form>
                </div>
                <div class="imagen_container p-0 d-none d-lg-block col-md-5 col-lg-5 col-xl-4 rounded">
                    <img class="imagen rounded-end" src="../../src/imgCuenta.jpg">
                </div>
                <div class="col">
                </div>
            </div>
        </div>
        <!--Referencia al archivo de JavaScript al final para que se carguen los componentes-->
        
        <script src="cuenta.js"></script>
        <script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script>
        <script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit"
        async defer>
        </script>
    
    </body>
    </html>
