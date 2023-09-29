<div class="container p-0 col-xl-12 col-lg-12 col-md-12 d-none d-md-block justify-content-sm-center zi">
        <?php // Traer imagen de la BD
        $imagenSQL = "SELECT banner_congreso FROM recursos_pagprin WHERE idRecurso = '1'";
        $traerIMG = mysqli_query($conexion, $imagenSQL);
        $rowImagen = $traerIMG->fetch_assoc();
        $rutaIMG = $rowImagen['banner_congreso'];
        ?>
        <img src="<?php echo $rutaIMG; ?>" alt="" class="imagen d-flex p-0 col-xl-12 col-lg-12 col-md-12 d-sm-none d-md-block ">
</div>
<hr class="container linea">
<div class="container p-0  d-sm-block d-md-none justify-content-sm-center zi">
        <img src="./src/logos_congresos/XV.jpeg" alt="XIV Congreso" class="img-thumbnail border border-0">
</div>