<?php

require('fpdf/fpdf.php');
//require('script/conexion.php');
// header("Content-Type: text/html; charset=iso-8859-1 ");
 
// $id = $idPonencia;
// $titulo = $titulo_trabajo;
// $modalidad = $id_modalidad;
// $categoria = $id_categoria;
// $rfc = $RFC;
// $aceptado = $comentarioGeneral;
// $nombre = $nombre_usuario;
// $apellidos= $apellidos_usuario;


class PDF extends FPDF
{
 
    function Footer() 
    {
        $this->SetY(-15);
        $this->SetFont('Arial','I',8);
        $this->Cell(0,10,utf8_decode('Congreso Internacional sobre la Enseñanza y Aplicación de las Matemáticas'),'T',0,'C');
    }
    function Header() 
    {
        
        $this->SetFont('Arial','B',9);
 
        /* Líneas paralelas
         * Line(x1,y1,x2,y2)
         * El origen es la esquina superior izquierda
         * Cambien los parámetros y chequen las posiciones
         * */
        //$this->Line(10,10,206,10);
       
 
        /* Explicaré el primer Cell() (Los siguientes son similares)
         * 30 : de ancho
         * 25 : de alto
         * ' ' : sin texto
         * 0 : sin borde
         * 0 : Lo siguiente en el código va a la derecha (en este caso la segunda celda)
         * 'C' : Texto Centrado
         * $this->Image('images/logo.png', 152,12, 19) Método para insertar imagen
         *     'images/logo.png' : ruta de la imagen
         *     152 : posición X (recordar que el origen es la esquina superior izquierda)
         *     12 : posición Y
         *     19 : Ancho de la imagen (w)
         *     Nota: Al no especificar el alto de la imagen (h), éste se calcula automáticamente
         * */
 
        $this->Line(10,60,200,60);
        //logo del congreso dentro de lineas
        //$this->Cell(50,25,'',0,0,'C',$this->Image('imagenes/banner2.png', 10,8, 190));
        
        require_once 'traerImagenes.php';

        $this->Cell(50,25,'',0,0,'C',$this->Image($logo, 10,8, 190));
        
        // clave,categoría y modalidad
        $this->Text(150,68,utf8_decode('Clave del trabajo:'));
        
        //$this->Text(150,72,utf8_decode('Modalidad:'));

        //Cuerpo de la carta
        $this->Text(10,75,utf8_decode('Estimado(s):'));
        //$this->Text(10,137,utf8_decode(''),0,0,'C');
        $this->Text(10,105,utf8_decode('Tenemos el agrado de comunicarle(s) que el RESUMEN de                  :'));
        //$this->Cell(100,170,utf8_decode(' '),0,0,'C');
        // $this->Text(10,115,utf8_decode('Categoría:'));
        $this->Text(10,120,utf8_decode('Registrada para este congreso, ha sido ACEPTADO.'));
        $this->Text(10,125,utf8_decode('El comité evaluador le(s) solicita atender las siguientes indicaciones:'));
        
        $this->Text(10,135,utf8_decode('1 - Consultar los lineamientos de presentación del cartel.'));
        $this->Text(10,140,utf8_decode('https://congresomatematicas.cuautitlan2.unam.mx/components/GuiasYPlantillas/guias.php'));        
        $this->Text(10,145,utf8_decode('2 - Enviar su cartel en formato pdf al correo: martha_lurrutia@yahoo.com.mx.'));       
        $this->Text(10,150,utf8_decode('3 - Crear un vídeo de exposición del cartel máximo de 5 minutos en formato mp4'));
        $this->Text(10,155,utf8_decode('4 - Enviar su vídeo al correo: martha_lurrutia@yahoo.com.mx.'));
        $this->Text(10,160,utf8_decode('5 - La recepción de carteles y videos de exposición será hasta el día 21 de Marzo'));
        $this->Text(10,165,utf8_decode('6 - Realizar el pago correspondiente.'));

        $this->Text(10,195,utf8_decode('Sin más por el momento, quedamos de usted.'));
        $this->Text(10,200,utf8_decode('Atentamente:'));
        $this->Text(20,205,utf8_decode('El Comité Organizador del Evento'));
        $this->Text(20,215,utf8_decode('"Por mi Raza Hablará el Espíritu"'));
      


       
       $this->Ln(25);
    }
   
 
}

   

  
$h = date("j-m-Y");  // Fecha actual
$h2 = date("G:i:s");  // Hora actual en 24 hr
 
$pdf = new PDF();             
$pdf->AddPage('P', 'Letter'); 

$pdf ->Text(100,105, utf8_decode($tipoPonencia));
$pdf ->Text(180,68, utf8_decode($idPonencia));    
// $pdf ->Text(30,115, utf8_decode($nombre_categoria));  
$pdf -> SetXY(10,78);
    
$pdf -> MultiCell(80,5, utf8_decode($nombre_usuario.' '.$apellidos_usuario),0,'L');
if(count($coautores)!=0){
    for ($i=0; $i <=count($coautores)-1; $i++) { 
    $nombresCoautor=$coautores[$i]["nombres"];
    $apellidosCoautor=$coautores[$i]["apellidos"];
    $emailCoautor=$coautores[$i]["email"];

    $pdf -> MultiCell(80,5, utf8_decode($nombresCoautor.' '.$apellidosCoautor),0,'L');
    //$pdf -> Ln(1);
}
}

$pdf ->SetXY(10,107);
$pdf ->MultiCell(0,2,utf8_decode($titulo_trabajo), 0, 'L');
$pdf ->SetXY(10,177);
$pdf ->MultiCell(0,3, utf8_decode('Comentario de la aprobación: '.$comentarioGeneral),0, 'L');


$pdf ->SetXY(65,240);
$pdf ->MultiCell(0,3, utf8_decode('Cuautitlán Izcalli, Edo. de México. '.$h.'  '.$h2),0, 'L');
   
$pdf->Output('../../cartas/resumen/'.$idPonencia.'.pdf','F'); //esta linea guarda el pdf en el navegador

  
  
?>

