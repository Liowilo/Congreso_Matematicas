<?php
/** 
*******************************************************************************************************
* Apartado se actualiza los nuevos recursos del congreso (color, nombre, logos, poster, banner, patrocinadores)
* Cualquier duda o sugerencia:
* @author Ricardo Leaños Medina ricardoleanosmedina@gmail.com y Jayme Ernesto Lin jaymelinbr@gmail.com
*******************************************************************************************************
**/ 
    $imagen='';
    if(isset($_FILES["logo1"])){
        require 'conexion.php';
        $file = $_FILES["logo1"];
        $nombre = $file["name"];
        $tipo = $file["type"];
        $size = $file["size"];
        $ruta_temp = $file["tmp_name"];
        $carpeta = "../src/logopagprinc/";

        if ($tipo != 'image/jpg' && $tipo != 'image/JPG' && $tipo != 'image/jpeg' && $tipo != 'image/png' && $tipo != 'image/webp')
        {
            echo "El archivo no es valido";
        }
        else if ($size > 3*1024*1024){
            echo "El tamaño del archivo no es valido";
        }
        else
        {
            $src = $carpeta.$nombre;
            move_uploaded_file($ruta_temp, $src);
            $imagen="../src/logopagprinc/".$nombre;
        }
    }
    $query=mysqli_query($conexion,"UPDATE recursos_pagprin SET logo1_congreso = '$imagen'");
    header('location: ../components/paginaPrincipal/paginaPrincipal.php');
?>