<?php
session_start();
require "../../modelo/conexion.php";
require "../../components/avisoPrivacidad/correoCongreso.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="shortcut icon" href="../../favicon.png">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acerca De</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="../../styles.css">
    <link rel="stylesheet" href="./acerca.css">
    <style>
        .justified-text {
            text-align: justify;
        }

        .reduced-line-height {
            line-height: 1.3; /* Puedes ajustar el valor según tus preferencias. */
        }
    </style>
</head>

<body>
    <header class="fixed-top"> <!--------------MANDA A LLAMAR LA NAVBAR--------------->
        <?php
        require_once('../../Layouts/nav.php');
        ?>
    </header>

    <section style="margin-top: 200px;">
        <div class="container mt-5 mb-5">
            <h2 class="mb-3 text-center" style="margin-top: 10px;">Aviso de privacidad</h2>
            <div class="row mt-5">
            <div class="col-lg-8 offset-lg-2">
  <div id="aviso-privacidad">
  <p class="justified-text reduced-line-height">
      La Facultad de Estudios Superiores (FES) Cuautitlán, ubicada en Carretera Cuautitlán-Teoloyucan Km. 2.5, San Sebastián Xhala, 54714 Cuautitlán Izcalli, Estado de México, recaba datos personales y es responsable del tratamiento que se les dé.
    </p>
    
    <strong>Datos personales recabados:</strong>
    <ul class="reduced-line-height">
      <li>Nombre y apellidos: Para identificación en el proceso de registro.</li>
      <li>RFC (Registro Federal de Contribuyentes): Para temas administrativos, en caso de ser requerido.</li>
      <li>Correo electrónico: Utilizado para enviar información y constancias relacionadas con el congreso.</li>
      <li>Número de teléfono: Opcional, para contacto adicional en caso de necesidad.</li>
      <li>Foto de perfil autografiada: Para identificación en el perfil del asistente.</li>
      <li>Datos académicos: Información académica relevante para el Congreso.</li>
      <li>Datos laborales: Información laboral relevante para el Congreso.</li>
    </ul>
    
    <strong>Finalidades del tratamiento de datos:</strong>
    <ul class="reduced-line-height">
      <li>Facilitar el registro y la participación en el Congreso Internacional sobre la Enseñanza y Aplicación de las Matemáticas.</li>
      <li>Enviar información y constancias relacionadas con el congreso.</li>
    </ul>
    
    <strong>Cookies y Web Beacons:</strong>
    <p class="justified-text reduced-line-height">
      El sitio web del congreso puede utilizar cookies y web beacons con el fin de mejorar la experiencia del usuario y obtener información estadística.
    </p>
    
    <strong>Ejercicio de derechos ARCO:</strong>
    <p class="justified-text reduced-line-height">
      Los participantes tienen derecho a acceder, rectificar, cancelar u oponerse al uso de sus datos personales. Para ejercer estos derechos, podrán contactar a la organización del congreso a través de la dirección de correo electrónico designada para este propósito. 
    </p>
    <p class="justified-text reduced-line-height"><em><?php echo strtolower($correoCongreso); ?></em></p>
    
    <p class="justified-text reduced-line-height">
      En caso de solicitar acceso, deberá registrarse en la página.
    </p>

    <strong>Modificaciones al Aviso de Privacidad:</strong>
    <p class="justified-text reduced-line-height">
      Cualquier modificación o actualización a este aviso de privacidad estará disponible en el sitio web oficial del Congreso Internacional sobre la Enseñanza y Aplicación de las Matemáticas (CISEyAM).
    </p>
    
    <p class="justified-text reduced-line-height">
      <strong>Fecha última actualización:</strong> 10/11/2023
    </p>
  </div>
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
