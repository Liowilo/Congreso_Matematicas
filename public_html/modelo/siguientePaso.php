<?php
    /** 
    * Este modulo realiza la actualizacion del cartel en formato jpg, extenso en .docx, y del link del video.
    * Cualquier duda o sugerencia:
    * @author Carlos Tejeda tejeda.araujo.carlos.alfredo@gmail.com
    **/ 
    $errores = array(); //Es un arreglo que guarda todos los errores y los muestra
    $_SESSION['info']=""; //Muestra la informacion exitosa y los muestra

    $consPonencia = "SELECT * FROM ponencia WHERE id_ponencia='$idPonencia'";
    $resPonencia = mysqli_query($conexion, $consPonencia);
    $fetchPonencia=mysqli_fetch_assoc($resPonencia);
    $nombrePonencia=$fetchPonencia['titulo_ponencia'];
    $idUsuarioEvalua=$fetchPonencia['id_usuario_evalua'];
    //Fecha actual
    date_default_timezone_set('America/Mexico_City');
    $fechaActual = date('y-m-d G:i:s');
    //Se consultan los datos del evaluador para su notificacion
    $consDatosEvaluador="SELECT * FROM usuario WHERE id_usuario='$idUsuarioEvalua'";
    $resDatosEvaluador=mysqli_query($conexion,$consDatosEvaluador);
    $fetchDatosEvaluador=mysqli_fetch_assoc($resDatosEvaluador);
    $emailEvaluador=$fetchDatosEvaluador['email_usuario'];

    if(isset($_POST["cancelar"])){
        print "<script>window.location='/cbbcongress/components/TrabajosRegistrados/trabajosRegistrados.php';</script>";
    }

    if(isset($_POST['subirCartel'])){
            $tamanio = 10000;
            if(isset($_FILES['inputCartel']) && ($_FILES['inputCartel']['type'] == 'image/jpg' || $_FILES['inputCartel']['type'] == 'image/jpeg')){
            //Rutas
            $ruta="../../src/carteles_usuario/";
            $fichero=$ruta.basename($_FILES["inputCartel"]["name"]);
            //Mueve el fichero al servidor
            $rutaCartel=$ruta.$idPonencia."_CARTEL_".$nombrePonencia."_".$_FILES['inputCartel']['name'];
                if( $_FILES['inputCartel']['size'] < ($tamanio * 1024) ){
                    move_uploaded_file( $_FILES['inputCartel']['tmp_name'], $rutaCartel);
                    $info = "Se ha subido el cartel. Se ha enviado un correo electrónico al evaluador del trabajo.";
                    $_SESSION['info'] = $info;
                    if(count($errores) === 0){
                        //Update en la tabla de ponencia
                        $subirCartel = "UPDATE cartel SET cartel='$rutaCartel' WHERE id_ponencia='$idPonencia'";
                        $data_check = mysqli_query($conexion, $subirCartel);
                        //Inserta una nueva revisión con el estatus de EXTENSO
                        //Genera id aleatorio de revision
                        $numeroAleatorio=uniqid();
                        //Se genera el id a partir del Id de usuario, id ponencia y numero aleatorio
                        $idGenerado=$_SESSION['id'].$idPonencia.$numeroAleatorio;
                        $insertarRevisionCartel = "INSERT INTO revision(id_revision,descripcion_revision,fecha_revision,estatus_revision) VALUES ('$idGenerado','CARTEL','$fechaActual','A')";
                        $resRevisionCartel = mysqli_query($conexion, $insertarRevisionCartel);
                        //Se relaciona la revision con la ponencia
                        $insertaRelacionRevision = "INSERT INTO usuario_revision_ponencia(id_usuario_evalua,id_ponencia,id_revision_ponencia) VALUES ('$idUsuarioEvalua','$idPonencia','$idGenerado')";
                        $resRelacionRevision= mysqli_query($conexion, $insertaRelacionRevision);    
                        //Se le notifica al evaluador
                        require_once '../../librerias/PHPMailer/src/correoAsignacionEvaluador.php';
                        
                    }                   
                }
                else{
                
                    $errores['db-error'] = "¡Error al subir el documento peso superior al permitido!";
                }

            }else if(isset($_FILES['inputCartel']) && ($_FILES['inputCartel']['type'] != 'image/jpeg')){
                $errores['db-error'] ="Solo se admiten imágenes con formato .jpg";
                
            }
        }

        if(isset($_POST['subirPonencia'])){
            $tamanio = 15000;
            if(!empty($_FILES['inputExtenso']['name'])){
                if(!empty($_FILES['inputExtenso']['name']) && mime_content_type($_FILES['inputExtenso']['tmp_name']) == 'application/vnd.openxmlformats-officedocument.wordprocessingml.document'){
                //Rutas
                $ruta="../../src/extensos_usuario/";
                $fichero=$ruta.basename($_FILES["inputExtenso"]["name"]);
                //Mueve el fichero al servidor
                $rutaExtenso=$ruta.$idPonencia."_EXTENSO_".$nombrePonencia."_".$_FILES['inputExtenso']['name'];
                    if( $_FILES['inputExtenso']['size'] < ($tamanio * 1024) ){
                        move_uploaded_file( $_FILES['inputExtenso']['tmp_name'],$rutaExtenso );
                        $info = "Se ha subido el extenso. Se ha enviado un correo electrónico al evaluador del trabajo.";
                        $_SESSION['info'] = $info;
                        if(count($errores) === 0){
                            //Update en la tabla de ponencia
                            $subirExtenso = "UPDATE oral SET extenso_oral='$rutaExtenso' WHERE id_ponencia='$idPonencia'";
                            $data_check = mysqli_query($conexion, $subirExtenso);
                            //Inserta una nueva revisión con el estatus de EXTENSO
                            //Genera id aleatorio de revision
                            $numeroAleatorio=uniqid();
                            //Se genera el id a partir del Id de usuario, id ponencia y numero aleatorio
                            //Consulta la ultima revision para saber en que estado está
                            $consUsuarioRevisionPonencia = "SELECT * FROM revision WHERE revision.fecha_revision=(SELECT MAX(fecha_revision) FROM revision 
                            INNER JOIN usuario_revision_ponencia ON revision.id_revision=usuario_revision_ponencia.id_revision_ponencia
                            WHERE usuario_revision_ponencia.id_ponencia='$idPonencia')";
                            
                            $resUsuarioRevisionPonencia = mysqli_query($conexion, $consUsuarioRevisionPonencia);
                            $fetchUsuarioRevisionPonencia = mysqli_fetch_assoc($resUsuarioRevisionPonencia);
                            //Campos de la revision
                            $estadoRevisionPonencia=$fetchUsuarioRevisionPonencia['estatus_revision'];
                            $descripcionRevisionPonencia=$fetchUsuarioRevisionPonencia['descripcion_revision'];
                            $fechaRevisionPonencia=$fetchUsuarioRevisionPonencia['fecha_revision'];
                            //Si está en la fase de EVALUACION FINAL
                            if($descripcionRevisionPonencia=='EXTENSO REVISION FINAL' && $estadoRevisionPonencia=='FR'){
                                $idGenerado=$_SESSION['id'].$idPonencia.$numeroAleatorio;
                                $insertarRevisionExtenso = "INSERT INTO revision(id_revision,descripcion_revision,fecha_revision) VALUES ('$idGenerado','EXTENSO REVISION FINAL','$fechaActual')";
                                $resRevisionExtenso = mysqli_query($conexion, $insertarRevisionExtenso);
                                //Se relaciona la revision con la ponencia
                                $insertaRelacionRevision = "INSERT INTO usuario_revision_ponencia(id_usuario_evalua,id_ponencia,id_revision_ponencia) VALUES ('$idUsuarioEvalua','$idPonencia','$idGenerado')";
                                $resRelacionRevision= mysqli_query($conexion, $insertaRelacionRevision);  
                                //Se le notifica al evaluador
                                require_once '../../librerias/PHPMailer/src/correoAsignacionEvaluador.php';  
                                /*$segundo = "2";
                                sleep($segundo);
                                print "<script>window.location='../../components/TrabajosRegistrados/trabajosRegistrados.php';</script>";*/
                            }else{
                                $idGenerado=$_SESSION['id'].$idPonencia.$numeroAleatorio;
                                $insertarRevisionExtenso = "INSERT INTO revision(id_revision,descripcion_revision,fecha_revision,estatus_revision) VALUES ('$idGenerado','EXTENSO','$fechaActual','')";
                                $resRevisionExtenso = mysqli_query($conexion, $insertarRevisionExtenso);
                                //Se relaciona la revision con la ponencia
                                $insertaRelacionRevision = "INSERT INTO usuario_revision_ponencia(id_usuario_evalua,id_ponencia,id_revision_ponencia) VALUES ('$idUsuarioEvalua','$idPonencia','$idGenerado')";
                                $resRelacionRevision= mysqli_query($conexion, $insertaRelacionRevision);  
                                //Se le notifica al evaluador
                                require_once '../../librerias/PHPMailer/src/correoAsignacionEvaluador.php';  
                                /*$segundo = "2";
                                sleep($segundo);
                                print "<script>window.location='../../components/TrabajosRegistrados/trabajosRegistrados.php';</script>";*/
                            }
                            
                        }                         
                    }
                    else{
                    
                        $errores['db-error'] = "¡Error al subir el documento peso superior al permitido!";
                    }

                }else if(isset($_FILES['inputExtenso']) && mime_content_type($_FILES['inputExtenso']['tmp_name']) != 'application/vnd.openxmlformats-officedocument.wordprocessingml.document'){
                    $errores['db-error'] ="Solo se admiten documentos con formato .docx";            
                }
            }else{
                $errores['db-error'] = "¡Debes seleccionar un archivo!";
            }
            
        }

        if(isset($_POST['subirVideo'])){
            $linkVideo=$_POST['inputLinkVideo'];
            if(!empty($linkVideo)){
                //Update de video
                //Update en la etapa de la ponencia
                $subirVideo = "UPDATE ponencia SET video_ponencia='$linkVideo' WHERE id_ponencia='$idPonencia'";
                $data_check3 = mysqli_query($conexion, $subirVideo);
                if($data_check3){
                    //Se le notifica al evaluador
                    require_once '../../librerias/PHPMailer/src/correoAsignacionEvaluador.php';
                    //Muestra si el registro fue exitoso y lo muestra en información.
                    $info = "Se ha subido el video. Se ha enviado un correo electrónico al evaluador del trabajo.";
                    $_SESSION['info'] = $info;
                }else{
                    $errores['db-error'] = "Fallo mientras intentaba hacer el registro en la Base.";
                }
            }else{
                $errores['db-error'] = "Debes ingresar un link válido.";
            }



        }

?>