
<?php

require "../../modelo/evaluarResumen.php";
$idPonencia=$_GET['id'];

if($idPonencia==''){
    print "<script>window.location='/cbb/index.php';</script>";

}

?>
<?php 
    if(!empty($_SESSION['info'])){
        ?>
        <div id="informacionExito" class="alert alert-success alert-dismissible fade show mt-3">
            <?php echo $_SESSION['info']; ?><br><a href="../TrabajosAsignados/trabajosAsignados.php"> Ver trabajos asignados</a>
        </div>
        <?php
    }
    ?>
    <?php
    if(count($errores) > 0){
        ?>
        <div id="informacionError" class="alert alert-danger alert-dismissible fade show mt-3">
            <?php
            foreach($errores as $showerror){
                echo $showerror;
            }
            ?>
            <?php echo $_SESSION['info']; ?><a href="../TrabajosAsignados/trabajosAsignados.php"> Ver trabajos asignados</a>
        </div>
        <?php
    }
?>     
<form id="formulario" method="POST">

<div class="row mt-5">
    <div class="col-12">
        <a target="_blank" href="../VisualizacionResumen/visualizacionResumen.php?id=<?php echo $idPonencia ?>&visualizacion=2" >Ver Resumen</a>
    </div>
</div>

<div class="row">
    <div class="col-xl-10 col-lg-10 col-md-12 d-sm-block col-md-12">
    <table class="container table border-top border-end border-start mt-4">
        <thead>
            <tr class=" d-flex text-center table-head">
                <th scope="col" class="col-xl-12 col-lg-12 col-md-12">Observaciones Generales</th>
            </tr>
        </thead>
        <tbody>
            <tr>
            <th scope="row">
                <textarea name="comentarioGeneral" id="resultado" rows="10" class="col-12"></textarea>
            </th>
            </tr>
        </tbody>
    </table>
    </div>
    <div class="col-2"></div>
</div>

<div class="row">
    <div class="col-xl-10 col-lg-10 col-md-12 col-sm-12 col-xs-12">
        <div class="row d-flex justify-content-center ">
            <div class="col-xl-4 col-lg-4 col-md-6 d-sm-block col-sm-12 d-xs-block col-xs-12 mb-3">
                <div class="d-grid">
                    <!---------BOTON FINALIZAR---->
                    <input class="btn btn-style" type="submit" name="rechazar"  value="Rechazar">
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-6 d-sm-block col-sm-12 d-xs-block col-xs-12 mb-3">
                <div class="d-grid ">
                    <!---------BOTON CANCELAR---->
                    <input class="btn btn-style" type="submit"  name="aprobar" value="Aprobar">
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-2 col-lg-2 d-md-none d-lg-block d-sm-none d-md-block"></div>
</div>
</form>

<script>
const formulario=document.getElementById("formulario");
const inputs=document.querySelectorAll("#formulario");


/*
//Función para pasar minúsculas a mayúsculas.
function minusculaAMayuscula(e){
	//Guarda el valor de los input en un texto para hacerlo mayúscula.
	const texto=e.target.value;
	e.target.value=texto.toUpperCase();
}

//Listeners
//Listener para cambiar de minúscula a mayúscula.
inputs.forEach((input)=>{
	input.addEventListener("keyup",minusculaAMayuscula);
	//input.addEventListener("keyup",validarFormulario);
});
*/




</script>
