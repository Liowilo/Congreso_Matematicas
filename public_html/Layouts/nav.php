<?php
//session_start();
//Verifica si ha iniciado sesión e instancia el modulo para consultar la foto del usuario.
if (!empty($_SESSION['correoElectronico'])) {
  require_once $_SERVER["DOCUMENT_ROOT"] . "/desarrollo/modelo/traerFoto.php";
}
?>

<?php
//traer color al nav de la BD
$valorColor = "SELECT color_congreso FROM recursos_pagprin WHERE idRecurso = '1'";
$color = mysqli_query($conexion, $valorColor);
$rowColor = $color->fetch_assoc();
$colorHex = $rowColor['color_congreso'];

// traer nombre congreso de la BD

$nombreC = "SELECT nombre_congreso FROM recursos_pagprin WHERE idRecurso = '1'";
$queryNom = mysqli_query($conexion, $nombreC);
$rowNombre = $queryNom->fetch_assoc();
$congresoNombre = $rowNombre['nombre_congreso'];
?>

<div class="container-fluid text-center py-4 backgronund col-xl-12 col-lg-12 col-md-12" style="background-color: <?php echo $colorHex; ?>;">
  <!-- 
<span style="color: #FBC16B">XV</span><span class="texto"> CONGRESO INTERNACIONAL SOBRE LA ENSEÑANZA Y APLICACIÓN DE LAS MATEMÁTICAS </span>
 -->
  <span class="texto"><?php echo $congresoNombre; ?></span>
  <hr class="container linea mt-3">
</div>


<nav class="navbar navbar-expand-lg backgronund pb-2 z-index-2  position-absolute" style="background-color: <?php echo $colorHex; ?>;"">
  <div class=" container-fluid">
  <button class="navbar-toggler mx-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <div class="d-flex flex-row py-1 mb-1">
      <div class="px-1 a-toggle"><i class="fa-solid fa-house"></i></div>
      <div class="a-toggle"> Menú</div>
    </div>
  </button>
  <div class="collapse navbar-collapse " id="navbarNavDropdown">
    <ul class="navbar-nav centrar sinEspacio">
      <li class="nav-item">
        <a id="inicio" class="nav-link active a-nav mt-2" aria-current="page" href="/desarrollo/index.php">Inicio</a>
      </li>

      <li class="nav-item dropdown ">
        <a class="nav-link dropdown-toggle a-nav mt-2" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          Información
        </a>
        <ul class="dropdown-menu super">
        <li><a class="dropdown-item " href="/desarrollo/src/convocatoria/XVI.pdf" target="_blank">Convocatoria</a></li>
          <li><a class="dropdown-item " href="/desarrollo/components/registroInscripcion/inscripcion.php">Inscripción</a></li>
          <li><a class="dropdown-item " href="/desarrollo/components/Lugar/lugar.php">Lugar</a></li>
          <li><a class="dropdown-item " href="/desarrollo/components/registroCuotas/cuotas.php">Cuotas</a></li>
          <li><a class="dropdown-item " href="/desarrollo/components/GuiasYPlantillas/guias.php">Guias</a></li>
          <li><a class="dropdown-item " href="/desarrollo/components/acercaDe/acercaDe.php">Acerca de...</a></li>
          <li><a class="dropdown-item " href="/desarrollo/components/avisoPrivacidad/avisoPrivacidad.php">Aviso de privacidad</a></li>
        </ul>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle a-nav mt-2" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          Programa
        </a>
        <ul class="dropdown-menu super">
        <li><a class="dropdown-item " href="/desarrollo/components/actividadesFechas/fechas.php">Fechas importantes</a></li>
        <li><a class="dropdown-item disabled" href="">Programa general</a></li>
        <li><a class="dropdown-item disabled" href="">Programa específico (por definir)</a></li>
          <!--  <li><a class="dropdown-item" href="/desarrollo/components/programaMemorias/programaMemorias.php">Memorias</a></li>
          <li><a class="dropdown-item " href="/desarrollo/components/programa/programa.php">Programa</a></li>  -->
          
        </ul>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle a-nav mt-2" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          Actividades
        </a>
        <ul class="dropdown-menu super">

        <li><a class="dropdown-item disabled" href="">Ponencias orales</a></li>
          <li><a class="dropdown-item disabled" href="">Talleres</a></li>
          <li><a class="dropdown-item disabled" href="/desarrollo/components/actividadesConcursoC/concursoC.php">Concurso de carteles</a></li>
          <li><a class="dropdown-item disabled" href="">Exposición de prototipos y proyectos de IA</a></li>
          <li><a class="dropdown-item disabled" href="">Mesa redonda</a></li>
          <li><a class="dropdown-item disabled" href="/desarrollo/components/programaMagistrales/programaMagistral.php">Ponencias magistrales</a></li>

         <!--  <li><a class="dropdown-item " href="../../components/actividadesCategorias/categorias.php">Categorias</a></li>  -->

        </ul>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle a-nav mt-2" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          Organizadores
        </a>
        <ul class="dropdown-menu super">
          <li><a class="dropdown-item " href="/desarrollo/components/organizadoresComites/cOrganizador.php">Comite organizador</a></li>
          <li><a class="dropdown-item " href="/desarrollo/components/organizadoresComites/cTecnico.php">Comite tecnico</a></li>
          <li><a class="dropdown-item " href="/desarrollo/components/organizadoresComites/cEvaluador.php">Comite evaluador</a></li>
        </ul>
      </li>
      <?php
      //Hace un if para comprobar que la sesión está abierta y y muestra los elementos.
      if (!empty($_SESSION['correoElectronico'])) {
      ?>
        <li class="nav-item">
          <a class="nav-link a-nav mt-2" href="/desarrollo/components/subirResumen/subirResumen.php">Registrar trabajos</a>
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
            <li><a class="dropdown-item" href="/desarrollo/components/perfil/perfil.php">Mi perfil</a></li>
            <li><a class="dropdown-item" href="/desarrollo/components/TrabajosRegistrados/trabajosRegistrados.php">Mis trabajos</a></li>
            <li><a class="dropdown-item" href="/desarrollo/modelo/cerrarSesion.php">Cerrar sesión</a></li>
          <?php
          }
          ?>
          <?php
          //Hace un if para comprobar que la sesión está cerrada y muestra los elementos.
          if (empty($_SESSION['correoElectronico'])) {
          ?>
            <li><a class="dropdown-item" href="/desarrollo/components/inicioSesion/sesion.php">Iniciar sesión</a></li>
            <li><a class="dropdown-item" href="/desarrollo/components/crearCuenta/cuenta.php">Registrarse</a></li>
          <?php
          }
          ?>
        </ul>
      </li>


      <li class="nav-item">
        <a class="nav-link " href="/desarrollo/components/perfil/perfil.php" role="button" aria-expanded="false">
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
            <img src="/desarrollo/src/fotos_usuarios/picProfileNull.png" class="rounded-circle" alt="Foto de Perfil" width="40" height="40" vertical-align="middle">
          <?php
          }
          ?>
        </a>
      </li>

    </ul>
  </div>
  </div>
</nav>
