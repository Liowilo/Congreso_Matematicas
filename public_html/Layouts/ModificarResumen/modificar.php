<?php

require "../../modelo/modificaResumen.php";
$idPonencia = $_GET['id'];

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require "../../librerias/PHPMailer/src/Exception.php";
require "../../librerias/PHPMailer/src/PHPMailer.php";
require "../../librerias/PHPMailer/src/SMTP.php";
require "../../librerias/PHPMailer/src/traerCorreoCongreso.php";

if ($idPonencia == '') {
    print "<script>window.location='/cbb/index.php';</script>";
}
$errores = $_SESSION['error'];
$_SESSION['idPonenciaEditar'] = $idPonencia;
$numEdiciones = $_SESSION['numEdiciones'];
//Trae los datos especificos de la ponencia
$consPonencia = "SELECT * FROM ponencia p 
    INNER JOIN tipo_ponencia t ON t.id_tipo_ponencia=p.id_tipo_ponencia WHERE p.id_ponencia='$idPonencia';";
$resPonencia = mysqli_query($conexion, $consPonencia);
$fetchPonencia = mysqli_fetch_assoc($resPonencia);

$tituloPonencia = $fetchPonencia['titulo_ponencia'];
$resumenPonencia = $fetchPonencia['resumen_ponencia'];
$tipoPonencia = $fetchPonencia['categoria_ponencia'];
$referenciasPonencia = $fetchPonencia['referencia_ponencia'];
$idEvaluador = $fetchPonencia['id_usuario_evalua'];
$idCategoriaPonencia = $fetchPonencia['id_categoria'];

//Consulta si tiene coautores la ponencia
$consCoautorPonencia = "SELECT * FROM  usuario_colabora_ponencia WHERE id_ponencia='$idPonencia'";
$resCoautorPonencia = mysqli_query($conexion, $consCoautorPonencia);

//Trae los datos de coautores de la ponencia
$consCoautores = "SELECT * FROM  usuario_colabora_ponencia 
    INNER JOIN usuario ON usuario_colabora_ponencia.id_usuario=usuario.id_usuario WHERE usuario_colabora_ponencia.id_ponencia='$idPonencia'";
$resCoautores = mysqli_query($conexion, $consCoautores);
//$fetch=mysqli_fetch_assoc($resCoautores);


if ($numEdiciones < 1) {
    $_SESSION['titulo_ponencia'] = $tituloPonencia;
    $_SESSION['id_categoria_ponencia'] = $idCategoriaPonencia;
    $_SESSION['resumen_ponencia'] = $resumenPonencia;
    $_SESSION['tipo_ponencia'] = $tipoPonencia;
    $_SESSION['referencia_ponencia'] = $referenciasPonencia;
    if (mysqli_num_rows($resCoautores) > 0) {
        $i = 0;
        while ($fetchCoautores = mysqli_fetch_assoc($resCoautores)) {
            $coautores[$i]['nombres'] = $fetchCoautores['nombres_usuario'];
            $coautores[$i]['apellidos'] = $fetchCoautores['apellidos_usuario'];
            $coautores[$i]['rfc'] = $fetchCoautores['rfc_usuario'];
            $coautores[$i]['id'] = $fetchCoautores['id_usuario'];
            $i = $i + 1;
        }
    }
    $numEdiciones = $numEdiciones + 1;
    $_SESSION['numEdiciones'] = $numEdiciones;
} else {
    $numEdiciones = $numEdiciones + 1;
    $_SESSION['numEdiciones'] = $numEdiciones;
}


?>


<?php
if (strlen($_SESSION['info']) > 1 && count($errores) < 1) {
?>
    <div id="informacionExito" class="alert alert-success alert-dismissible fade show mt-3">
        <?php
        if ($idEvaluador != '') {
            $evaluador = "SELECT email_usuario FROM usuario WHERE id_usuario='$idEvaluador';";
            $resEvaluador = mysqli_query($conexion, $evaluador);
            $fetchEvaluador = mysqli_fetch_assoc($resEvaluador);
            $evaluadorEmail = $fetchEvaluador['email_usuario'];
            require_once "../../librerias/PHPMailer/src/correoTrabajoModificadoEvaluador.php";
        }
        ?>
        <?php print "<script>alert(\" Modificacion de trabajo exitosa. Se ha enviado un correo electrónico al autor y coautores.\");window.location='../TrabajosRegistrados/trabajosRegistrados.php';</script>";
        // Configuración de la clase PHPMailer para el envío de correo utilizando SMTP
        $mail = new PHPMailer();
        $mail->IsSMTP();
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = "ssl";
        $mail->Host = "smtp.gmail.com";
        $mail->Port = 465;
        $email= $correoCongreso;
        $mail->Username = $email;
        $mail->Password = $hashContra;
        

// Obtener ID de la ponencia a eliminar
$idPonencia = $_GET['id'];

// Consulta para obtener id_usuario del autor
$consultaAutor = "SELECT id_usuario_registra FROM ponencia WHERE id_ponencia='$idPonencia'";
$resultadoAutor = mysqli_query($conexion, $consultaAutor);

if ($filaAutor = mysqli_fetch_assoc($resultadoAutor)) {
    $idUsuarioAutor = $filaAutor['id_usuario_registra'];
    
    // Consulta para obtener email_usuario del autor
    $consultaEmailAutor = "SELECT email_usuario FROM usuario WHERE id_usuario='$idUsuarioAutor'";
    $resultadoEmailAutor = mysqli_query($conexion, $consultaEmailAutor);
    
    if ($filaEmailAutor = mysqli_fetch_assoc($resultadoEmailAutor)) {
        $autorEmail = $filaEmailAutor['email_usuario'];
    }
}

// Consulta para obtener id_usuario de coautores
$consultaCoautores = "SELECT id_usuario FROM usuario_colabora_ponencia WHERE id_ponencia='$idPonencia'";
$resultadoCoautores = mysqli_query($conexion, $consultaCoautores);

$coautoresEmails = array();
while ($filaCoautor = mysqli_fetch_assoc($resultadoCoautores)) {
    $idUsuarioCoautor = $filaCoautor['id_usuario'];
    
    // Consulta para obtener email_usuario de coautor
    $consultaEmailCoautor = "SELECT email_usuario FROM usuario WHERE id_usuario='$idUsuarioCoautor'";
    $resultadoEmailCoautor = mysqli_query($conexion, $consultaEmailCoautor);
    
    if ($filaEmailCoautor = mysqli_fetch_assoc($resultadoEmailCoautor)) {
        $coautoresEmails[] = $filaEmailCoautor['email_usuario'];
    }
}

/* --------------------------------------------  Consultas para describir los datos de la ponencia -------------------------------------- */
$consultaPonencia = "SELECT * FROM ponencia WHERE id_ponencia='$idPonencia'";
$fetchPonencia = mysqli_query($conexion, $consultaPonencia);
$datosPonencia = mysqli_fetch_assoc($fetchPonencia);

// Traer el nombre de la ponencia
$nombrePonencia = $datosPonencia['titulo_ponencia'];

// Taer el tipo de ponencia
$tPonencia = $datosPonencia['id_tipo_ponencia'];
$tipoP = "SELECT categoria_ponencia FROM tipo_ponencia WHERE id_tipo_Ponencia = '$tPonencia'";
$tipoPon =  mysqli_query($conexion, $tipoP);
$PonRow = mysqli_fetch_assoc($tipoPon);
$tipoPonencia = $PonRow['categoria_ponencia'];

// Traer categoria de ponencia
$cPonencia = $datosPonencia['id_categoria'];
$categoriaP = "SELECT * FROM categoria WHERE id_categoria = '$cPonencia'";
$categoriaPon =  mysqli_query($conexion, $categoriaP);
$PonRow2 = mysqli_fetch_assoc($categoriaPon);
$categoriaPonencia = $PonRow2['categoria'];

// Traer nombre autor
$consultaAutor = "SELECT id_usuario_registra FROM ponencia WHERE id_ponencia='$idPonencia'";
$resultadoAutor1 = mysqli_query($conexion, $consultaAutor);
$fetchAutor = mysqli_fetch_assoc($resultadoAutor1);
$idAutorClave = $fetchAutor['id_usuario_registra'];


$claveAutor = mysqli_fetch_assoc($resultadoAutor);
$nAutor = "SELECT * FROM usuario WHERE id_usuario = '$idAutorClave'";
$autorDatos = mysqli_query($conexion, $nAutor);
$rowAutor = mysqli_fetch_assoc($autorDatos);
$nombresAutor = $rowAutor['nombres_usuario'];
$apellidosAutor = $rowAutor['apellidos_usuario'];
$nombreFAutor = $nombresAutor . " " . $apellidosAutor;

// Traer nombre coautores con su correo
$nombreCoautores = array();
foreach($coautoresEmails as $emailDestinatario) {
    $traerNombre = "SELECT nombres_usuario, apellidos_usuario FROM usuario WHERE email_usuario = '$emailDestinatario'";
    $resultadoTraerNombre = mysqli_query($conexion, $traerNombre);
    $fetchCoautores = mysqli_fetch_assoc($resultadoTraerNombre);
    $nombreCoautor = $fetchCoautores['nombres_usuario'];
    $apellidoCoautor = $fetchCoautores['apellidos_usuario'];
    $nombreFCoautor = $nombreCoautor . " " . $apellidoCoautor;
    $nombreCoautores[] = $nombreFCoautor;
}

// Consulta para obtener el título de la ponencia
$consultaTitulo = "SELECT titulo_ponencia FROM ponencia WHERE id_ponencia='$idPonencia'";
$resultadoTitulo = mysqli_query($conexion, $consultaTitulo);
$titulo = "";

if ($filaTitulo = mysqli_fetch_assoc($resultadoTitulo)) {
    $titulo = $filaTitulo['titulo_ponencia'];
}

// Envío de correos electrónicos al autor y coautores
$mail->addAddress($autorEmail); // Agregar al autor

// Envío de correos electrónicos a los coautores
if (!empty($coautoresEmails)) {
    foreach ($coautoresEmails as $destinatario) {
        $mail->addAddress($destinatario);
    }
}

$mensaje .= "Se ha modificado un trabajo. <b>La actualización</b> de un trabajo presentado para el Congreso Internacional sobre la Enseñanza y Aplicación de las Matemáticas con sede en la Facultad de Estudios Superiores Cuautitlán fue <b>exitósa.</b><br><br>";

$mensaje .= "Los detalles del trabajo modificado se describen a continuación: <ul>";
$mensaje .= "<li><b>Tipo: </b>" . $tipoPonencia . "</li>";
$mensaje .= "<li><b>Categoría: </b>" . $categoriaPonencia . "</li>";
$mensaje .= "<li><b>Clave del trabajo: </b>" . $idPonencia . "</li>";
$mensaje .= "<li><b>Titulo: </b>" . $nombrePonencia . "</li>";
$mensaje .= "<li><b>Autor: </b>" . $nombreFAutor . "</li>";
$mensaje .= "</ul>";

if(!empty($nombreCoautores)){
    if(count($nombreCoautores) > 1){
        $txt = "Con los Coautores:<ul>";
    }
    else{
        $txt = "Con el Coautor:<ul>";
    }
    $mensaje .= "<br>" . $txt;
    // Imprimir coautores
    foreach($nombreCoautores as $nombreC){
        $mensaje .= "<li>" . $nombreC . "</li>";
    }
    $mensaje .= "</ul><br>";
}
        
$mensaje .= "Fecha: " . date('Y-m-d') . "<br><br>";
$mensaje .= "Atentamente,<br><br>";
$mensaje .= "El Comité Organizador del Evento<br>";
$mensaje .= "Por mi Raza Hablará el Espíritu";

$mail->Body = $mensaje;
$mail->Subject = "Se ha modificado el trabajo " . $nombrePonencia;
$mail->isHTML(true);
$mail->CharSet = 'UTF-8';
$mail->From = $email;
$mail->FromName = "CISEyAM";
$mail->Send();
$mail->ClearAddresses();


        exit;
        
        ?>

    </div>
<?php
}
?>
<?php
if (strlen($advertencia) > 1) {
?>
    <div id="informacionExito" class="alert alert-warning alert-dismissible fade show mt-3">
        <?php echo $advertencia; ?><a href="../TrabajosRegistrados/trabajosRegistrados.php"> Ver trabajos</a>
    </div>
<?php
}
?>
<?php

if (count($errores) > 1) {
?>
    <div id="informacionError" class="alert alert-danger alert-dismissible fade show mt-3">
        <ul>
            <?php
            foreach ($errores as $showerror) {
            ?><li><?php echo $showerror; ?></li><?php
                                            }
                                                ?>
        </ul>
        <a href="../TrabajosRegistrados/trabajosRegistrados.php"> Ver trabajos</a>
    </div>
<?php
}
?>
<?php


if (count($errores) == 1) {
?>
    <div id="informacionError" class="alert alert-danger alert-dismissible fade show mt-3">
        <?php
        foreach ($errores as $showerror) {
            echo $showerror;
        }
        ?>
        <a href="../TrabajosRegistrados/trabajosRegistrados.php"> Ver trabajos</a>
    </div>
<?php
}
?>
<form class="g-3 needs-validation mt-5" method="POST" id="formulario">
    <!-------AUTOR--------------->
    <div class="row mt-4">
        <div class="col-xl-4 col-lg-4 col-md-6 d-ms-block col-sm-12">
            <label for="validationCustom02" class="form-label subtitulos">Autor</label>
            <input id="autor" name="autor" type="text" class="form-control" id="validationCustom02" required value="<?php echo $fetch['nombres_usuario'] . ' ' . $fetch['apellidos_usuario']; ?>" disabled>
        </div>
        <div class="d-flex col-xl-4 col-lg-4 col-md-6 d-ms-block col-sm-12">
            <div class="mt-4 d-flex align-self-end">
                <img style="cursor: pointer" src="../../src/question.png" class="imgQuestion me-2" alt="" data-toggle="tooltip" data-placement="right" title="Como autor solo tu tendras derecho de hacer correcciones al trabajo">
                <!--<span class="span-textos ">Como autor solo tu tendras derecho de hacer correcciones al trabajo</span>-->
            </div>
        </div>
        <div class="col-xl-4 col-lg-4 col-md-1 d-sm-none d-md-block"></div>
    </div>


    <!-----------COAUTORES--------------->
    <div class="row mt-4">
        <div class="col-xl-8 col-lg-8 d-md-block col-md-12 col-sm-block col-sm-12">
            <div class="row">
                <div class="col-xl-8 col-lg-8 col-md-8 d-sm-block col-sm-12 mb-3">
                    <label for="validationCustom02" class="form-label subtitulos">Coautores</label>
                    <!--------COAUTOR INPUT------------->
                    <input type="text" class="form-control" id="coautor" name="coautor">
                </div>

                <div class="col-xl-4 col-lg-4 col-md-4 d-sm-block col-sm-12 ">
                    <div class=" mt-4">
                        <input name="botonAgregarCoautor" id="botonAgregarCoautor" class="btn pt-1 pb-1 ps-5 pe-5 btn-azul" type="submit" value="Agregar">
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 d-md-block col-md-12 d-sm-block col-sm-12">
                    <div class="mt-4 d-flex align-self-end">
                        <img style="cursor: pointer" src="../../src/question.png" class="imgQuestion me-2" alt="" data-toggle="tooltip" data-placement="right" title="Registra tus coautores ingresando el RFC de cada uno de ellos.">
                        <!--<span class="span-textos ">Registra tus coautores ingresando el RFC de cada uno de ellos.</span>-->
                    </div>
                </div>
            </div>


            <!------------LISTA DE COAUTORES------------->
            <div class="row mt-4">
                <div class="col-xl-6 col-lg-6 col-md-6 d-sm-block col-sm-12 mb-3">
                    <table class="table table-sm">
                        <thead>
                            <tr>
                                <th scope="col">Nombre</th>
                                <th scope="col"><input class="btn btn-sm" style="color:red" type="submit"
                                        name="botonQuitarCoautores" id="botonQuitarCoautores" value="Quitar Todos X">
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            $_SESSION['coautores'] = $coautores;
                            if (isset($_SESSION['coautores']) && !empty($_SESSION['coautores'])) {
                                foreach ($_SESSION['coautores'] as $indice => $coautores_) {
                                    $posicion_array = $indice;
                                    if ($coautores_ != null) {

                            ?>
                            <tr>
                                <td>
                                    <?= $coautores_['nombres'] ?>
                                    <?= $coautores_['apellidos'] ?>
                                </td>
                                <td style="text-align: right;">
                                    <button value="<?= $posicion_array ?>" class="btn btn-small btn-danger"
                                        type="submit" name="botonQuitarCoautor" id="botonQuitarCoautor">
                                        <i class="fa-solid fa-user-xmark"></i></button>
                                </td>
                            </tr>
                            <?php
                                    }
                                }

                            }
                            ?>
                        </tbody>
                    </table>
                </div>

            </div>

        </div>
    </div>

    <!-------------------------------------------------->


    <div class="col-xl-6 col-lg-6 d-md-block col-md-12 d-sm-block col-sm-12">
        <div class="mt-4 d-flex align-self-end">
            <img style="cursor: pointer" src="../../src/question.png" class="imgQuestion me-2" alt="" data-toggle="tooltip" data-placement="right" title="Es necesario que los coautores se encuentren registrados en la plataforma, podrás realizar correcciones, ellos van a poder ver el estatus de la ponencia.">
            <!--<span class="span-textos ">Es necesario que los coautores 
            se encuentren registrados en la plataforma, podrás realizar correcciones, ellos van a poder ver el estatus de la ponencia.
            Se permiten maximo:
            <ul>
                <li>Cuatro coautores por ponencia oral.</li>
                <li>Tres coautores por cartel </li>
                <li>Dos coautores por taller.</li>
                <li>Cinco coautores por prototipo.</li>
            </ul>
            </span>-->
        </div>

        <div class="col-xl-2 col-lg-2 d-md-none d-lg-block  d-sm-none d-md-block mb-4"></div>
    </div>
    </div>
    <div class="container">
        <div class="row mt-3 ">
            <div class="col-xl-2 col-lg-2 d-md-inline col-md-6 d-sm-block col-sm-12 d-xs-block col-xs-12 mt-2">
                <div class="d-grid">
                    <button type="button" name="btn-cartel" id="btn-cartel" class="btn btn-tipo-ponencia p-2">Cartel</button>
                </div>
            </div>
            <div class="col-xl-2 col-lg-2 d-md-inline col-md-6 d-sm-block col-sm-12 d-xs-block col-xs-12 mt-2">
                <div class="d-grid">
                    <button type="button" name="btn-ponencia" id="btn-ponencia" class="btn btn-tipo-ponencia p-2">Ponencia</button>
                </div>
            </div>
            <div class="col-xl-2 col-lg-2 d-md-inline col-md-6 d-sm-block col-sm-12 d-xs-block col-xs-12 mt-2">
                <div class="d-grid">
                    <button type="button" name="btn-taller" id="btn-taller" class="btn btn-tipo-ponencia p-2">Taller</button>
                </div>
            </div>

            <div class="col-xl-2 col-lg-2 d-md-inline col-md-6 d-sm-block col-sm-12 d-xs-block col-xs-12 mt-2">
                <div class="d-grid">
                    <button type="button" name="btn-prototipo" id="btn-prototipo" class="btn btn-tipo-ponencia p-2">Prototipo</button>
                </div>
            </div>
        </div>

        <?php

        require "../../modelo/mRRestriccionTrabajoUsuario.php";

        ?>

        <!--
<div class="mt-3">
    <img src="../../src/question.png" class="imgQuestion" alt="">
    <span class="span-textos mb-4">Recuerda que solo podrás ser autor o coautor de:
    <ul>
        <li><?php echo $restriccionPonencia; ?> ponencia(s) oral(es).</li>
        <li><?php echo $restriccionTaller; ?> cartel(es) </li>
        <li><?php echo $restriccionTaller; ?> taller(es).</li>
        <li><?php echo $restriccionPrototipo; ?> prototipo(s).</li>
    </ul>
            Y de <?php echo $limiteDePonenciasTotales; ?> trabajos como maximo</span>
</div>
                        -->
        <!-------------FORMULARIO ------------>




        <!---------TIPO------------->
        <div class="row">
            <div class="col-xl-4 col-lg-4 col-md-6 d-ms-block col-sm-12 mt-2">
                <label for="categoria" class="form-label subtitulos">Tipo</label>
                <!--------TIPO INPUT------------->
                <input type="text" class="form-control" id="tipo" name="tipo" readonly value='<?php echo $_SESSION['tipo_ponencia']; // $tipoPonencia;
                                                                                                ?>'>
            </div>

            <!---------CATEGORIA------------->
            <div class="row">
                <div class="col-xl-4 col-lg-4 col-md-6 d-ms-block col-sm-12 mt-2">
                    <label for="categoria" class="form-label subtitulos">Categoria</label>
                    <select class="form-select" id="categoria" name="categoria" required>
                        <?php
                        while ($fetch2 = mysqli_fetch_assoc($res2)) {
                            $idCategoria = $fetch2["id_categoria"];
                            $categoria = $fetch2["categoria"];
                            if ($idCategoria == $_SESSION["id_categoria_ponencia"]) {
                                echo $idCategoriaPonencia;
                        ?>
                                <option selected value="<?php echo $idCategoria; ?>" name="<?php echo $idCategoria; ?>"><?php echo $categoria; ?></option>
                            <?php
                            } else {
                            ?>
                                <option value="<?php echo $idCategoria; ?>" name="<?php echo $idCategoria; ?>"><?php echo $categoria; ?></option>
                        <?php
                            }
                        }
                        ?>
                    </select>
                </div>

                <div class="d-flex col-xl-4 col-lg-4 col-md-5 d-ms-block col-sm-12 mt-3">
                    <div class=" d-flex align-self-end d-inline">
                        <img style="cursor: pointer" src="../../src/question.png" class="imgQuestion me-2" alt="" data-toggle="tooltip" data-placement="right" title="Selecciona la categoria que más se adecue a tu ponencia.">
                        <!--<span class="span-textos ">Selecciona la categoria que más se adecue a tu ponencia.</span>-->
                    </div>
                </div>

                <!---------TITULO------------->
                <div class="row mt-4">
                    <div class="col-xl-4 col-lg-4 col-md-6 d-ms-block col-sm-12">
                        <label for="titulo" class="form-label subtitulos">Titulo</label>
                        <!--------TITULO INPUT------------->
                        <input type="text" class="form-control" id="titulo" name="titulo" value="<?php echo $_SESSION['titulo_ponencia']; //$tituloPonencia; 
                                                                                                    ?>">
                        <!--------ADVERTENCIA TITULO------------->
                        <span id="formulario_informacion_titulo" class="span-textos mt-2 formulario_input-error">El titulo no debe exeder 15 palabras</span>
                        <!--------MUESTRA LAS PALABRAS RESTANTES------------->
                        <span id="contadorTitulo" class="span-textos">0 de 15</span>
                    </div>
                    <div class="d-flex col-xl-4 col-lg-4 col-md-5 d-ms-block col-sm-12 mt-3">
                        <div class="d-flex d-inline align-self-end">
                            <img style="cursor: pointer" src="../../src/question.png" class="imgQuestion me-2" alt="" data-toggle="tooltip" data-placement="right" title="Tu titulo debera reflejar el contenido de la ponencia">
                            <!--<span class="span-textos">Tu titulo debera reflejar el contenido de la ponencia</span>-->
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-1 d-sm-none d-md-block"></div>
                </div>

                <!--------RESUMEN------------->
                <div class="row mt-4">
                    <div class="col-xl-8 col-lg-8 col-md-8 d-sm-block col-sm-12 mb-3">
                        <div class="mb-3">
                            <label for="resumen" class="form-label subtitulos">Resumen</label>
                            <!--------RESUMEN INPUT------------->
                            <textarea spellcheck="true" lang="es" class="form-control" rows="15" id="resumen" name="resumen"><?php echo $_SESSION['resumen_ponencia']; // $resumenPonencia; 
                                                                                                                                ?></textarea>
                        </div>
                        <!--------ADVERTENCIA RESUMEN------------->
                        <span id="formulario_informacion_resumen" class="span-textos formulario_input-error">El resumen no debe exeder de 300 palabras</span>
                        <!--------MUETSRA LAS PALABRAS RESTANTES------------->
                        <span id="contadorResumen" class="span-textos">0 de 300</span>
                    </div>
                    <div class="col-xl-2 col-lg-2 col-md-2 d-sm-block col-sm-12">
                        <div class="mt-2 d-flex d-inline">
                            <img style="cursor: pointer" src="../../src/question.png" class="imgQuestion me-2" alt="" data-toggle="tooltip" data-placement="right" title="Refleja en una síntesis del trabajo los objetivos, el sustento teórico, la metodología o desarrollo y los resultados o conclusiones.">
                            <!--<span class="span-textos">Refleja en una síntesis del trabajo los objetivos, el sustento teórico, la metodología o desarrollo y los resultados o conclusiones.</span>-->
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-2 col-md-2 d-sm-none d-md-block">
                    </div>
                </div>
                <script>
                    // Cargue la biblioteca Typo.js
                </script>

                <!--------REFERENCIAS------------->
                <div class="row mt-4">
                    <div class="col-xl-7 col-lg-7 col-md-7 d-sm-block col-sm-12 mb-3">
                        <label for="referencia" class="form-label subtitulos">Referencias</label>
                        <!--------REFERENCIAS INPUT------------->
                        <input type="text" class="form-control" id="referencia" name="referencia" value="<?php echo $_SESSION['referencia_ponencia']; // $referenciasPonencia; 
                                                                                                            ?>">
                        <!--------ADVERTENCIA REFERENCIAS------------->
                        <span id="formulario_informacion_referencia" class="span-textos formulario_input-error">Las referencias no deberan exeder las 50 palabras </span>
                        <!--------MUETSRA LAS PALABRAS RESTANTES------------->
                        <span id="contadorReferencia" class="span-textos">0 de 50</span>
                    </div>
                    <div class="d-flex col-xl-3 col-lg-3 col-md-3 d-sm-block col-sm-12">
                        <div class="d-flex d-inline align-self-end">
                            <img style="cursor: pointer" src="../../src/question.png" class="imgQuestion me-2" alt="" data-toggle="tooltip" data-placement="right" title="Es necesario que las citas y referencias se encuentren en formato APA (American Psychological Association)">
                            <!--<span class="span-textos ">Es necesario que las citas y referencias se encuentren en formato APA (American Psychological Association)</span>-->
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-2 col-md-2 d-sm-none d-md-block "></div>
                </div>
                <?php
                if ($idEvaluador == '') {
                ?>
                    <div class="col-xl-3 col-lg-3 d-md-block col-md-4 d-sm-block col-sm-12 col-xs-block col-xs-12 my-4">
                        <!--------BOTON GUARDAR INPUT------------->
                        <input id="botonGuardar" name="botonGuardar" class=" btn btn-azul ps-5 pe-5 ms-3" type="submit" value="Actualizar">
                    </div>
                <?php
                } else {
                ?>
                    <div class="col-xl-3 col-lg-3 d-md-block col-md-4 d-sm-block col-sm-12 col-xs-block col-xs-12 my-4">
                        <!--------BOTON GUARDAR INPUT------------->
                        <input onclick="confirmar(event)" disabled id="botonGuardar" name="botonGuardar" class=" btn btn-azul ps-5 pe-5 ms-3" type="submit" value="Actualizar">
                    </div>
                <?php
                }
                ?>
                <div class="col-xl-3 col-lg-3 d-md-block col-md-4 d-sm-block col-sm-12 col-xs-block col-xs-12 my-4">
                    <input id="botonCancelar" name="botonCancelar" class="btn btn-dorado ps-5 pe-5 ms-3 " type="button" value="Cancelar" onClick="cancelar()">
                </div>





            </div>

</form>
