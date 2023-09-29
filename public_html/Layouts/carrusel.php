<div class="carousel container mt-5 mb-5">
  <div class="carousel_contenedor">
    <button aria-label="Anterior" class="carousel_anterior">
      <i class="fas fa-chevron-left"></i>
    </button>
    <div class="carousel_lista">
      <div class="carousel_elemento">
        <?php // Traer imagen de la BD
        $imagenSQL = "SELECT pat1 FROM recursos_pagprin WHERE idRecurso = '1'";
        $traerIMG = mysqli_query($conexion, $imagenSQL);
        $rowImagen = $traerIMG->fetch_assoc();
        $rutaIMG = $rowImagen['pat1'];
        ?>
        <img src="<?php echo $rutaIMG; ?>" alt="Pat-1" class="rounded-circle">
      </div>
      <div class="carousel_elemento">
      <?php // Traer imagen de la BD
        $imagenSQL2 = "SELECT pat2 FROM recursos_pagprin WHERE idRecurso = '1'";
        $traerIMG2 = mysqli_query($conexion, $imagenSQL2);
        $rowImagen2 = $traerIMG2->fetch_assoc();
        $rutaIMG2 = $rowImagen2['pat2'];
        ?>
        <img src="<?php echo $rutaIMG2; ?>" alt="Pat-2" class="rounded-circle">
      </div>
      <div class="carousel_elemento">
      <?php // Traer imagen de la BD
        $imagenSQL3 = "SELECT pat3 FROM recursos_pagprin WHERE idRecurso = '1'";
        $traerIMG3 = mysqli_query($conexion, $imagenSQL3);
        $rowImagen3 = $traerIMG3->fetch_assoc();
        $rutaIMG3 = $rowImagen3['pat3'];
        ?>
        <img src="<?php echo $rutaIMG3; ?>"alt="Pat-3" class="rounded-circle">
      </div>
      <div class="carousel_elemento">
      <?php // Traer imagen de la BD
        $imagenSQL4 = "SELECT pat4 FROM recursos_pagprin WHERE idRecurso = '1'";
        $traerIMG4 = mysqli_query($conexion, $imagenSQL4);
        $rowImagen4 = $traerIMG4->fetch_assoc();
        $rutaIMG4 = $rowImagen4['pat4'];
        ?>
        <img src="<?php echo $rutaIMG4; ?>" alt="Pat-4" class="rounded-circle">
      </div>
      <div class="carousel_elemento">
      <?php // Traer imagen de la BD
        $imagenSQL5 = "SELECT pat5 FROM recursos_pagprin WHERE idRecurso = '1'";
        $traerIMG5 = mysqli_query($conexion, $imagenSQL5);
        $rowImagen5 = $traerIMG5->fetch_assoc();
        $rutaIMG5 = $rowImagen5['pat5'];
        ?>
        <img src="<?php echo $rutaIMG5; ?>" alt="Pat-5" class="rounded-circle">
      </div>
    </div>
    <button aria-label="Siguiente" class="carousel_siguiente">
      <i class="fas fa-chevron-right"></i>
    </button>
  </div>
  <div role="tablist" class="carousel_indicadores"></div>
</div>
</div>
