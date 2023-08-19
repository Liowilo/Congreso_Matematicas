<?php

require "../../modelo/modificaResumen.php";
$idPonencia = $_GET['id'];

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
        <?php print "<script>alert(\" Registro de trabajo exitoso. Se ha enviado un correo electrónico al autor y coautores.\");window.location='../TrabajosRegistrados/trabajosRegistrados.php';</script>";
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
            <input id="autor" name="autor" type="text" class="form-control" id="validationCustom02" required value="<?php echo $fetch['nombres_usuario']; ?>" disabled>
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
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $_SESSION['coautores'] = $coautores;
                            if (count($coautores) != 0) {
                                for ($i = 0; $i <= count($coautores) - 1; $i++) {
                                    //$idAutor=$coautores["id"];
                                    $nombresAutor = $coautores[$i]["nombres"];
                                    $apellidosAutor = $coautores[$i]["apellidos"];
                                    //$rfcAutor=$coautores["rfc"];
                            ?>
                                    <tr>
                                        <td><?php echo $nombresAutor . " " . $apellidosAutor; ?></td>
                                    </tr>
                            <?php }
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <div class="d-flex col-xl-2 col-lg-2 col-md-2 d-sm-block col-sm-12 mb-3 ">
                    <div class=" d-flex align-self-end">
                        <input class="btn btn-rojo " type="submit" name="botonQuitarCoautor" id="botonQuitarCoautor" value="Quitar">
                    </div>
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
                        <input disabled id="botonGuardar" name="botonGuardar" class=" btn btn-azul ps-5 pe-5 ms-3" type="submit" value="Actualizar">
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