<?php
//session_start();
//Verifica si ha iniciado sesión e instancia el modulo para consultar la foto del usuario.
if (!empty($_SESSION['correoElectronico'])) {
  require_once $_SERVER["DOCUMENT_ROOT"] . "/cbbcongress/modelo/traerFoto.php";
}
?>


<div class="container-fluid text-center py-4 backgronund col-xl-12 col-lg-12 col-md-12">
  <span style="color: #FBC16B">XV</span><span class="texto"> CONGRESO INTERNACIONAL SOBRE LA ENSEÑANZA Y APLICACIÓN DE LAS MATEMÁTICAS </span>
  <hr class="container linea mt-3">
</div>


<nav class="navbar navbar-expand-lg backgronund pb-2 z-index-2  position-absolute">
  <div class="container-fluid">
    <button class="navbar-toggler mx-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <div class="d-flex flex-row py-1 mb-1">
        <div class="px-1 a-toggle"><i class="fa-solid fa-house"></i></div>
        <div class="a-toggle"> Menú</div>
      </div>
    </button>
    <div class="collapse navbar-collapse " id="navbarNavDropdown">
      <ul class="navbar-nav centrar sinEspacio">
        <li class="nav-item">
          <a id="inicio" class="nav-link active a-nav mt-2" aria-current="page" href="/cbbcongress/index.php">Inicio</a>
        </li>

        <li class="nav-item dropdown ">
          <a class="nav-link dropdown-toggle a-nav mt-2" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Información
          </a>
          <ul class="dropdown-menu super">
            <li><a class="dropdown-item " href="/cbbcongress/src/convocatoria/XV.pdf" target="_blank">Convocatoria</a></li>
            <li><a class="dropdown-item " href="/cbbcongress/components/registroInscripcion/inscripcion.php">Inscripción</a></li>
            <li><a class="dropdown-item " href="/cbbcongress/components/Lugar/lugar.php">Lugar</a></li>
            <li><a class="dropdown-item " href="/cbbcongress/components/registroCuotas/cuotas.php">Cuotas</a></li>
            <li><a class="dropdown-item " href="/cbbcongress/components/GuiasYPlantillas/guias.php">Guias</a></li>
            <li><a class="dropdown-item " href="/cbbcongress/components/acercaDe/acercaDe.php">Acerca de...</a></li>
          </ul>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle a-nav mt-2" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Programa
          </a>
          <ul class="dropdown-menu super">
            <li><a class="dropdown-item" href="/cbbcongress/components/programaMemorias/programaMemorias.php">Memorias</a></li>
            <li><a class="dropdown-item " href="/cbbcongress/components/programa/programa.php">Programa</a></li>
            <li><a class="dropdown-item" href="/cbbcongress/components/programaMagistrales/programaMagistral.php">Ponencias Magistrales</a></li>
          </ul>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle a-nav mt-2" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Actividades
          </a>
          <ul class="dropdown-menu super">
            <li><a class="dropdown-item " href="/cbbcongress/components/actividadesCategorias/categorias.php">Categorias</a></li>
            <li><a class="dropdown-item " href="/cbbcongress/components/actividadesConcursoC/concursoC.php">Concurso de carteles</a></li>
            <li><a class="dropdown-item " href="/cbbcongress/components/actividadesFechas/fechas.php">Fechas</a></li>

          </ul>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle a-nav mt-2" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Organizadores
          </a>
          <ul class="dropdown-menu super">
            <li><a class="dropdown-item " href="/cbbcongress/components/organizadoresComites/cOrganizador.php">Comite Organizador</a></li>
            <li><a class="dropdown-item " href="/cbbcongress/components/organizadoresComites/cTecnico.php">Comite Tecnico</a></li>
            <li><a class="dropdown-item " href="/cbbcongress/components/organizadoresComites/cEvaluador.php">Comite Evaluador</a></li>
          </ul>
        </li>
        <?php
        //Hace un if para comprobar que la sesión está abierta y y muestra los elementos.
        if (!empty($_SESSION['correoElectronico'])) {
        ?>
          <li class="nav-item">
            <a class="nav-link a-nav mt-2" href="/cbbcongress/components/subirResumen/subirResumen.php">Registrar trabajos</a>
          </li>
        <?php }

        ?>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle a-nav mt-2" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <?php
            //Hace un if para comprobar que la sesión está abierta y y muestra los elementos.
            if (!empty($_SESSION['correoElectronico'])) {
            ?>
              Panel Principal
            <?php }
            if (empty($_SESSION['correoElectronico'])) {
            ?>
              Iniciar Sesion

            <?php
            }
            ?></a>
          <ul class="dropdown-menu super">
            <?php
            //Hace un if para comprobar que la sesión está abierta y y muestra los elementos.
            if (!empty($_SESSION['correoElectronico'])) {
            ?>
              <li><a class="dropdown-item" href="/cbbcongress/components/perfil/perfil.php">Mi Perfil</a></li>
              <li><a class="dropdown-item" href="/cbbcongress/components/TrabajosRegistrados/trabajosRegistrados.php">Mis trabajos</a></li>
              <li><a class="dropdown-item" href="/cbbcongress/modelo/cerrarSesion.php">Cerrar Sesión</a></li>
            <?php
            }
            ?>
            <?php
            //Hace un if para comprobar que la sesión está cerrada y muestra los elementos.
            if (empty($_SESSION['correoElectronico'])) {
            ?>
              <li><a class="dropdown-item" href="/cbbcongress/components/inicioSesion/sesion.php">Iniciar Sesión</a></li>
              <li><a class="dropdown-item" href="/cbbcongress/components/crearCuenta/cuenta.php">Registrarse</a></li>
            <?php
            }
            ?>
          </ul>
        </li>


        <li class="nav-item">
          <a class="nav-link " href="/cbbcongress/components/perfil/perfil.php" role="button" aria-expanded="false">
            <?php
            //Verifica si existe una sesion activa y muestra la foto del usuario
            if (!empty($_SESSION["correoElectronico"])) {

              if (!empty($index)) {
            ?>
                <img src="<?php echo $_SESSION["foto"] //Consulta el arreglo de la ruta
                          ?>" class="rounded-circle" alt="Foto de Perfil" width="40" height="40" vertical-align="middle">

              <?php
              } else { ?>
                <img src="<?php echo $_SESSION["foto"] //Consulta el arreglo de la ruta
                          ?>" class="rounded-circle" alt="Foto de Perfil" width="40" height="40" vertical-align="middle">
              <?php
              }
            } else {
              //Verifica si existe una sesion cerrada y muestra la foto por defecto
              ?>
              <img src="/cbbcongress/src/fotos_usuarios/picProfileNull.png" class="rounded-circle" alt="Foto de Perfil" width="40" height="40" vertical-align="middle">
            <?php
            }
            ?>
          </a>
        </li>

      </ul>
    </div>
  </div>
</nav>