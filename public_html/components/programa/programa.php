<?php 
    session_start();    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="shortcut icon" href="../../favicon.png">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Programa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="../../styles.css">
    <link rel="stylesheet" href="./programa.css">
    

</head>
<body>
<header class="fixed-top"> <!--------------MANDA A LLAMAR LA NAVBAR--------------->  
    <?php 
		require_once('../../Layouts/nav.php');
	?>
</header>
<section style="margin-top: 250px;">
    <div class="container mt-5 mb-5"><!----------CONTENEDOR PRINCIPAL----------->   
        <h2 class="mb-3">Programa</h2><!--------TITULO INTERNO------------>  
        <!-----------CARDS CONGRESO------------> 
        <div class= "container  border rounded justify-content-center">
            <div class="d-flex flex-row">
<div class="container d-inline-block col-xl-9 col-lg-8 col-md-8 d-sm-block col-sm-12 mt-4">
<div class="mb-3 card-body-congresoXV rounded p-3">XV EDICIÓN</div>
</div>
<div class="container d-inline-block col-xl-3 col-lg-4 col-md-4 d-sm-block col-sm-12 mt-4">
<div class=""><img src="../../src/logos_congresos/XV.jpeg" alt="XV Congreso" height= "95px"  width= "95px"></div>
</div>

</div>

            <div class="row justify-content-center">
                <div class="col ms-2">
                    <h5>Congreso Internacional Sobre la Enseñanza y Aplicación de las Matemáticas</h5>
                    <p>4 y 5 de Mayo 2023</p>
                </div>
            </div>
            <div>
                <div class="actividades rounded col-xl-3 col-lg-4 col-md-6 d-sm-block col-sm-12 p-1 my-3 ms-3"><i class="fab fa-laravel "></i>Ponencias aprobadas</div>
            </div>
            <div class="row justify-content-center my-3 mx-2">
                <div class="card-alert rounded col p-1"><span style="text-aling: center;">Programación sujeta a cambios<span></div>
            </div>
<div class="table-responsive">
            <table class="table table-striped rounded" >
                <thead class="ponencias">
                    <tr">
                        <th scope="col">Titulo</th>
                        <th scope="col">Autores</th>
                        <th scope="col">Tipo Ponencia</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>  
                        <?php
                        require "../../modelo/traerDatosPrograma.php";
                             while($fetchTrabajosRegistrados=mysqli_fetch_assoc($resTrabajosRegistrados)){
                                $tituloPonencia=$fetchTrabajosRegistrados['titulo_ponencia'];
                                $idUsuarioEvalua=$fetchTrabajosRegistrados['id_usuario_evalua'];
                                $idPonencia=$fetchTrabajosRegistrados['id_ponencia'];
                                $idTipoPonencia=$fetchTrabajosRegistrados['id_tipo_ponencia'];
                                
                                $idAutor=$fetchTrabajosRegistrados['id_usuario_registra'];
                                

                                if($idUsuarioEvalua!=""){  
        
                                    //Verifica que tenga revisiones
                                    $consUsuarioRevisiones = "SELECT * FROM usuario_revision_ponencia WHERE id_ponencia='$idPonencia'";
                                
                                    $resUsuarioRevisiones = mysqli_query($conexion, $consUsuarioRevisiones);
                                    $fetchUsuarioRevisiones = mysqli_fetch_assoc($resUsuarioRevisiones);
                                    if($fetchUsuarioRevisiones){
                                        $consUsuarioRevisionPonencia = "SELECT * FROM revision WHERE revision.fecha_revision=(SELECT MAX(fecha_revision) FROM revision 
                                        INNER JOIN usuario_revision_ponencia ON revision.id_revision=usuario_revision_ponencia.id_revision_ponencia
                                        WHERE usuario_revision_ponencia.id_ponencia='$idPonencia')";
                                        
                                        $resUsuarioRevisionPonencia = mysqli_query($conexion, $consUsuarioRevisionPonencia);
                                        $fetchUsuarioRevisionPonencia = mysqli_fetch_assoc($resUsuarioRevisionPonencia);
                                        //Campos de la revision
                                        $estadoRevisionPonencia=$fetchUsuarioRevisionPonencia['estatus_revision'];
                                        $descripcionRevisionPonencia=$fetchUsuarioRevisionPonencia['descripcion_revision'];
                        

                                        if((($idTipoPonencia=='3' || $idTipoPonencia=='4' ) && $estadoRevisionPonencia=='A' && $descripcionRevisionPonencia=='RESUMEN') || ($estadoRevisionPonencia=='A' && ($descripcionRevisionPonencia=='EXTENSO REVISION FINAL'|| $descripcionRevisionPonencia=='CARTEL'))){

                                        

                                        //Consulta la categoria de la ponencia
                                        $consTipoPonencia = "SELECT * FROM tipo_ponencia WHERE id_tipo_ponencia='$idTipoPonencia'";
                                        $resTipoPonencia = mysqli_query($conexion, $consTipoPonencia);
                                        $fetchTipoPonencia = mysqli_fetch_assoc($resTipoPonencia);
                                        $categoriaPonencia=$fetchTipoPonencia['categoria_ponencia'];  
                                        //Consulta al autor 
                                        //Hace la consulta de los autores de la ponencia
                                        $consAutor = "SELECT * FROM usuario WHERE id_usuario='$idAutor'";
                                        $resAutor = mysqli_query($conexion, $consAutor);
                                        $fetchAutor = mysqli_fetch_assoc($resAutor);
                                        $nombreAutor=$fetchAutor['nombres_usuario'];
                                        $apellidosAutor=$fetchAutor['apellidos_usuario'];
                                        $nombreCompletoAutor= $nombreAutor. " " .$apellidosAutor;
                                        
                                        //colabora ponencia
                                        $consCoautor = "SELECT * FROM usuario_colabora_ponencia WHERE id_ponencia='$idPonencia'";
                                        $resCoautor = mysqli_query($conexion, $consCoautor);
                                        
                                      
                                       


                                    if(mysqli_num_rows($resCoautor)>0){
                                        //juntar los nombres de autores y coautores
                                        while($fetchCoautor = mysqli_fetch_assoc($resCoautor)){

                                        $idCoautor=$fetchCoautor['id_usuario'];
                                        $consNombreCoautor = "SELECT * FROM usuario WHERE id_usuario='$idCoautor'";
                                        $resNombreCoautor = mysqli_query($conexion, $consNombreCoautor);
                                        $fetchNombreCoautor = mysqli_fetch_assoc($resNombreCoautor);
                                        $nombreCoautor=$fetchNombreCoautor['nombres_usuario'];
                                        $apellidosCoautor=$fetchNombreCoautor['apellidos_usuario'];
                                        $nombreCompletoCoautor= $nombreCoautor. " " .$apellidosCoautor;
                                        $nombreAutores= $nombreCompletoAutor. ", " .$nombreCompletoCoautor ;
                                        }
                                    }
                                     

                        ?>
                        <th scope="row"><?php echo $tituloPonencia ?></th>
                        <td><?php  if(mysqli_num_rows($resCoautor)>0){
                                       echo $nombreAutores;    
                                      } else{
                                        echo $nombreCompletoAutor;
                                      }  ?></td>
                        <td><?php echo $categoriaPonencia ?></td>
                        </tr>
                        <?php
                                        
                                       
                                       }
                                        }
                                    } 
                                }
                        
                        ?>

                    </tr>
                </tbody>
            </table>
</div>
        </div>
    </div>
    <section>
<?php 
		require_once('../../Layouts/maps.php');
	?>
</section>
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