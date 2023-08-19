<?php
require "../../modelo/privilegiosUsuario.php";
require "../../modelo/completarPerfil.php";
$estadoPrivilegio = array(); //Es un arreglo que guarda los estados del privilegio
$cont2 = 0; //Es para recorrer las posiciones del segundo arreglo
$consPrivilegiosEstado = "SELECT * FROM funcion_usuario WHERE id_usuario='$_SESSION[id]'";
$resPrivilegiosEstado = mysqli_query($conexion, $consPrivilegiosEstado);
while ($row2 = mysqli_fetch_array($resPrivilegiosEstado)) {
    $estadoPrivilegio[$cont2] = $row2['estado_funcion'];
    $cont2++;
}
$_SESSION['estadoPrivilegio'] = $estadoPrivilegio;
?>


<button class="btn background-lateral-boton col-12 mt-4 p-3 d-lg-none" type="button" data-bs-toggle="offcanvas" 
data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling">
    <i class="fa-solid fa-align-justify"> Panel principal</i>
</button>
<div class="offcanvas offcanvasoffcanvas-start py-4" data-bs-scroll="true" data-bs-backdrop="false" 
tabindex="-1" id="offcanvasScrolling" aria-labelledby="offcanvasScrollingLabel">
    <div class="offcanvas-header">
        <h4 class="offcanvas-title ms-3 p-3" id="offcanvasScrollingLabel">Panel principal</h4>
        <button type="button" class="btn-close text-reset d-lg-none" 
        data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <div class="">
            <ul class="list-group list-group-flush ">
                <li class="list-group-item background">
                    <i class="fa-sharp fa-solid fa-graduation-cap"></i>
                    <label class="form-check-label label-text" for="firstRadio">Datos Academicos</label>
                </li>

                <li class="list-group-item lis background">
                    <label class="form-check-label" for="firstRadio"><a class="text-a ms-4" href="../../components/DatosAcademicos/academicos.php">Escolar</a></label>
                </li>
                <?php
                if ($estadoUsuario != '') {
                ?>
                    <li class="list-group-item lis background">
                        <label class="form-check-label" for="firstRadio"><a class="text-a ms-4" href="../../components/DatosLaborales/laborales.php">Laboral</a></label>
                    </li>
                <?php
                }
                if ($estadoUsuario == 'A') {
                ?>
                    <li class="list-group-item background">
                        <i class="fa-solid fa-person"></i>
                        <label class="form-check-label label-text" for="firstRadio">Datos Personales</label>
                    </li>

                    <li class="list-group-item lis background">
                        <label class="form-check-label" for="firstRadio"><a class="text-a ms-4" href="../../components/perfil/perfil.php">Mi Perfil</a></label>
                    </li>
                    <li class="list-group-item lis background">
                        <label class="form-check-label" for="firstRadio"><a class="text-a ms-4" href="../../components/datosSeguridad/datosSeguridad.php">Seguridad</a></label>
                    </li>
                <?php
                }
                ?>
                <?php
                foreach (array_combine($privilegios, $estadoPrivilegio) as $valor => $estado) {
                    if ($valor == 20 && $estado == 'ON') { ?>
                        <li class="list-group-item background">
                            <i class="fa-solid fa-square-check"></i>
                            <label class="form-check-label label-text" for="firstRadio">Evaluaciones</label>
                        </li>
                        <!---la funcion de asgnados solo se muestra si eres evaluador-->
                        <li class="list-group-item lis background">
                            <label class="form-check-label " for="firstRadio"><a class="text-a ms-4" href="../../components/TrabajosAsignados/trabajosAsignados.php">Mis Evaluaciones</a></label>
                        </li>
                        <!------------------------------------------------------------------>
                    <?php }
                }
                foreach (array_combine($privilegios, $estadoPrivilegio) as $valor => $estado) {
                    if ($valor == 23 && $estado == 'ON') {
                    ?>
                        <!--Extensos para el evaluador final-->
                        <li class="list-group-item lis background">
                            <label class="form-check-label " for="firstRadio"><a class="text-a ms-4 " href="../../components/ExtensosFinales/extensosAsignados.php">Extensos Finales</a></label>
                        </li>
                <?php }
                } ?>
                <?php
                foreach (array_combine($privilegios, $estadoPrivilegio) as $valor => $estado) {
                    if ($valor == 15 && $estado == 'ON') { ?>
                        <li class="list-group-item background">
                            <i class="fa fa-money background"></i>
                            <label class="form-check-label label-text" for="firstRadio">Asistencia</label>
                        </li>

                        <li class="list-group-item lis background">
                            <label class="form-check-label " for="firstRadio"><a class="text-a ms-4" href="../../components/asistenciaPago/pagos.php">Pago</a></label>
                        </li>
                <?php }
                } ?>


                <?php
                foreach (array_combine($privilegios, $estadoPrivilegio) as $valor => $estado) {
                    if ($valor >= 12 && $valor <= 14 && $estado == 'ON') { ?>

                        <li class="list-group-item background">
                            <i class="fa-solid fa-pencil background"></i>
                            <label class="form-check-label label-text" for="firstRadio">Trabajos</label>
                        </li>
                <?php break 1;
                    }
                }

                ?>

                <?php

                foreach (array_combine($privilegios, $estadoPrivilegio) as $valor => $estado) {
                    if ($valor == 14 && $estado == 'ON') { ?>

                        <li class="list-group-item lis background">
                            <label class="form-check-label " for="firstRadio"><a class="text-a ms-4" href="../../components/subirResumen/subirResumen.php">Subir Resumen</a></label>
                        </li>
                <?php }
                } ?>

                <?php
                foreach (array_combine($privilegios, $estadoPrivilegio) as $valor => $estado) {
                    if ($valor == 12 && $estado == 'ON') { ?>
                        <li class="list-group-item lis background">
                            <label class="form-check-label" for="firstRadio"><a class="text-a ms-4" href="../../components/TrabajosRegistrados/trabajosRegistrados.php">Mis Trabajos</a></label>
                        </li>
                <?php }
                } ?>
                <!--estas 2 funciones son las que se muestran si eres evaluador
                <li class="list-group-item lis background">
                    <label class="form-check-label " for="firstRadio"><a class="text-a ms-4" href="">Trabajos Finales</a></label>
                </li>
                -->
                <?php
                foreach (array_combine($privilegios, $estadoPrivilegio) as $valor => $estado) {
                    if ($valor == 13 && $estado == 'ON') { ?>

                        <li class="list-group-item lis background">
                            <label class="form-check-label " for="firstRadio"><a class="text-a ms-4" href="../../components/historial/historial.php">Historial</a></label>
                        </li>
                <?php }
                } ?>

                <!---------------------------------------------------------------->
                <li class="list-group-item background">
                    <i class="fa-solid fa-circle-question"></i>
                    <label class="form-check-label label-text" for="firstRadio">Ayuda</label>
                </li>
                <!------------------------------- 
                <li class="list-group-item lis background">
                    <label class="form-check-label" for="firstRadio"><a class="text-a ms-3" href="../../components/GuiasYPlantillas/guias.php">Guias</a></label>
                </li>
                --------------------------------->
                <li class="list-group-item lis background">
                    <label class="form-check-label " for="firstRadio"><a class="text-a ms-3" href="../../components/GuiasYPlantillas/plantilla.php">Plantillas</a></label>
                </li>

                <!-----FUNCIONES DEL ADMINISTRADOR-->

                <?php
                foreach (array_combine($privilegios, $estadoPrivilegio) as $valor => $estado) {
                    if ($valor >= 31 && $estado == 'ON') { ?>

                        <li class="list-group-item background">
                            <i class="fa-solid fa-gear"></i>
                            <label class="form-check-label label-text" for="firstRadio">Administrador</label>
                        </li>
                <?php
                        break 1;
                    }
                } ?>
                <?php
                foreach (array_combine($privilegios, $estadoPrivilegio) as $valor => $estado) {
                    if ($valor == 41 && $estado == 'ON') { ?>
                        <li class="list-group-item lis background"><!-----FUNCION ASIGNACION DE EVALUADORES-->
                            <label class="form-check-label" for="firstRadio"><a class="text-a ms-4" href="../../components/Administrador/Asignaciones.php">Asignaciones</a></label>
                        </li>
                <?php }
                } ?>
                <!--
                <li class="list-group-item lis background">
                    <label class="form-check-label " for="firstRadio"><a class="text-a" href="">Ponencias Magistrales</a></label>
                </li> 
                -->
                <?php
                foreach (array_combine($privilegios, $estadoPrivilegio) as $valor => $estado) {
                    if ($valor == 43 && $estado == 'ON') { ?>
                        <li class="list-group-item lis background"><!-----FUNCION VER REGISTROS-->
                            <label class="form-check-label " for="firstRadio"><a class="text-a ms-4" href="../../components/Administrador/Registros.php">Registros</a></label>
                        </li>
                        <li class="list-group-item lis background">
                            <label class="form-check-label " for="firstRadio"><a class="text-a ms-4 " href="../../components/Administrador/Reportes.php">Reportes</a></label>
                        </li>
                        <li class="list-group-item lis background">
                            <label class="form-check-label " for="firstRadio"><a class="text-a ms-4 " href="../../components/Administrador/tablaDeTrabajosHistorico.php">Historial de Trabajos</a></label>
                        </li>

                <?php }
                } ?>

                <?php
                foreach (array_combine($privilegios, $estadoPrivilegio) as $valor => $estado) {
                    if ($valor == 31 && $estado == 'ON') { ?>
                        <li class="list-group-item lis background"><!-----FUNCION VER REGISTROS DE PAGO-->
                            <label class="form-check-label " for="firstRadio"><a class="text-a ms-4" href="../../components/Administrador/RegistrosPagos.php">Registros de pago</a></label>
                        </li>
                <?php }
                } ?>
                <?php
                foreach (array_combine($privilegios, $estadoPrivilegio) as $valor => $estado) {
                    if ($valor == 42 && $estado == 'ON') { ?>
                        <li class="list-group-item lis background"><!-----FUNCION DE ASIGNAR PRIVILEGIOS-->
                            <label class="form-check-label " for="firstRadio"><a class="text-a ms-4" href="../../components/Administrador/Privilegios.php">Privilegios</a></label>
                        </li>
                <?php }
                }
                ?>
                <?php
                foreach (array_combine($privilegios, $estadoPrivilegio) as $valor => $estado) {
                    if ($valor == 44 && $estado == 'ON') { ?>
                        <li class="list-group-item lis background">
                            <label class="form-check-label " for="firstRadio"><a class="text-a ms-4" href="../../components/nuevoCongreso/registrarCongreso.php">Congreso</a></label>
                        </li>
                <?php }
                }
                ?>
            </ul>
        </div>


        <div class="d-grid gap-2 col-6 mx-auto my-5">
            <a href="../../modelo/cerrarSesion.php"><button class="btn btn-style" type="button">Cerrar sesion</button></a>
        </div>
    </div>
</div>

<script>
    // Función para activar el offcanvas en pantallas md y sm
    function activateOffcanvas() {
        if (window.innerWidth < 992) {
            var offcanvasElement = document.getElementById('offcanvasScrolling');
            var offcanvas = new bootstrap.Offcanvas(offcanvasElement);
            offcanvas.show();
        } else {
            var offcanvasElement = document.getElementById('offcanvasScrolling');
            offcanvasElement.classList.remove('offcanvas', 'offcanvas-start');
            offcanvasElement.classList.add('flex', 'flex-col');
        }
    }

    // Llama a la función cuando se hace clic en el botón
    document.querySelector('.background-lateral-boton').addEventListener('click', activateOffcanvas);

    activateOffcanvas();
</script>

<!--</div>-->