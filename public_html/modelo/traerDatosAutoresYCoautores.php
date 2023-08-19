<?php
$consDatosPonencia="SELECT * FROM ponencia WHERE id_ponencia = '$idPonencia'";
$resDatosPonencia=mysqli_query($conexion,$consDatosPonencia);
$fetchDatosPonencia=mysqli_fetch_assoc($resDatosPonencia);
$idAutor=$fetchDatosPonencia['id_usuario_registra'];
$idCategoria=$fetchDatosPonencia['id_categoria'];
$titulo_trabajo=$fetchDatosPonencia['titulo_ponencia'];
$idTipoPonencia=$fetchDatosPonencia['id_tipo_ponencia'];

$consCategoria="SELECT * FROM categoria WHERE id_categoria='$idCategoria'";
$resCategoria=mysqli_query($conexion,$consCategoria);
$fetchCategoria=mysqli_fetch_assoc($resCategoria);
$nombre_categoria=$fetchCategoria['categoria'];

$consTipoPonencia="SELECT * FROM tipo_ponencia WHERE id_tipo_ponencia='$idTipoPonencia'";
$resTipoPonencia=mysqli_query($conexion,$consTipoPonencia);
$fetchTipoPonencia=mysqli_fetch_assoc($resTipoPonencia);
$tipoPonencia=$fetchTipoPonencia['categoria_ponencia'];

$consDatosAutor="SELECT * FROM usuario WHERE id_usuario='$idAutor'";
$resDatosAutor=mysqli_query($conexion,$consDatosAutor);
$fetchDatosAutor=mysqli_fetch_assoc($resDatosAutor);
$nombre_usuario=$fetchDatosAutor['nombres_usuario'];
$apellidos_usuario=$fetchDatosAutor['apellidos_usuario'];
$emailAutor=$fetchDatosAutor['email_usuario'];

//Trae los datos de coautores de la ponencia
$consCoautores = "SELECT * FROM  usuario_colabora_ponencia 
INNER JOIN usuario ON usuario_colabora_ponencia.id_usuario=usuario.id_usuario WHERE usuario_colabora_ponencia.id_ponencia='$idPonencia'";
$resCoautores = mysqli_query($conexion, $consCoautores);
//$fetch=mysqli_fetch_assoc($resCoautores);
$coautores=array();
if(mysqli_num_rows($resCoautores)>0){
    $i=0;
    while($fetchCoautores = mysqli_fetch_assoc($resCoautores)){
        $coautores[$i]['nombres']=$fetchCoautores['nombres_usuario'];
        $coautores[$i]['apellidos']=$fetchCoautores['apellidos_usuario'];
        $coautores[$i]['email']=$fetchCoautores['email_usuario'];
        $i=$i+1;
    }
}

?>