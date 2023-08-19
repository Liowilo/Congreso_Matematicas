<?php

require('../../librerias/fpdf/fpdf.php');
//require('script/conexion.php');
header("Content-Type: text/html; charset=iso-8859-1 ");
 
$id = $idPonencia;
$titulo = $titulo_trabajo;
$modalidad = $id_modalidad;
$categoria = $id_categoria;
$rfc = $RFC;
$aceptado = $comentarioGeneral;
$nombre = $nombre_usuario;
$apellidos= $apellidos_usuario;


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
 
        $this->Line(10,60,200,60);
        //logo del congreso dentro de lineas
        $this->Cell(50,25,'',0,0,'C',$this->Image('../../src/Banner-Oficial.jpg', 10,8, 190));
            
        $this->Text(150,64,utf8_decode('Clave del trabajo:'));
      
        $this->Text(10,70,utf8_decode('Estimado(s):'));
       
        $this->Text(10,100,utf8_decode('Tenemos el agrado de comunicarle (s) que su Resumen del Cartel:'));
        
        $this->Text(10,115,utf8_decode('Presentado para este congreso, ha sido ACEPTADO.'));
        $this->Text(10,120,utf8_decode('El comité evaluador le (s) solicita:'));

        $this->Text(10,130,utf8_decode('1 - Consultar los lineamientos de presentación del cartel.'));
        $this->Text(10,135,utf8_decode('http://congresomatematicas.cuautitlan2.unam.mx/instrucciones_cartel.php'));
        $this->Text(10,140,utf8_decode('2 - Enviar su cartel en formato pdf al correo: martha_lurrutia@yahoo.com.mx.'));
        $this->Text(10,145,utf8_decode('3 - Crear un vídeo de exposición del cartel máximo de 5 minutos en formato mp4.'));
        $this->Text(10,150,utf8_decode('4 - Enviar su vídeo al correo: martha_lurrutia@yahoo.com.mx.'));
        $this->Text(10,155,utf8_decode('5 - La recepción de carteles y videos de exposición será hasta el día 21 de Marzo'));
        $this->Text(10,160,utf8_decode('6 - Realizar el pago correspondiente.'));


        $this->Text(10,180,utf8_decode('Sin más por el momento, quedamos de usted.'));
        $this->Text(10,185,utf8_decode('Atentamente:'));
        $this->Text(20,195,utf8_decode('El Comite Organizador del Evento'));
        $this->Text(20,200,utf8_decode('"Por mi Raza Hablará el Espíritu"'));
       
       $this->Ln(25);
    }
 
}

  

   $h = date("j-m-Y");  // Fecha actual
   $h2 = date("G:i:s");  // Hora actual en 24 hr
 
    $pdf = new PDF();             
    $pdf->AddPage('P', 'Letter'); 
    $pdf ->Text(180,64, utf8_decode($id)); 

    $pdf -> SetXY(10,72);
$pdf->Text(10,75, utf8_decode($nombre_usuario. ' '.$apellidos_usuario));

$pdf ->SetXY(10,106);
        $pdf ->MultiCell(10,108,utf8_decode($titulo), 0, 'L');

$pdf ->SetXY(10,175);
$pdf ->MultiCell(0,3, utf8_decode($aceptado),0, 'L');

$pdf ->SetXY(65,240);
$pdf ->MultiCell(0,3, utf8_decode('Cuautitlán Izcalli, Edo. de México. '.$h.'  '.$h2),0, 'L');


$pdf->Output('extensos/'.$id.'.pdf', 'F'); //esta linea guarda el pdf en el navegador


             
?>