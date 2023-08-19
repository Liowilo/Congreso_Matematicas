<?php
    /** 
    * Este modulo cierra la sesión del usuario.
    * Cualquier duda o sugerencia:
    * @author Carlos Tejeda tejeda.araujo.carlos.alfredo@gmail.com
    **/  
    //Cierra la sesion del usuario iniciado y redirecciona a inicio de sesion
    session_start();
    session_unset();
    session_destroy();
    header('location: /cbbcongress/components/inicioSesion/sesion.php');
?>