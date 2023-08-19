<?php
 
require('fpdf/fpdf.php');
//require('script/conexion.php');
header("Content-Type: text/html; charset=iso-8859-1 ");
 
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
        $this->Cell(50,25,'',0,0,'C',$this->Image('../../src/Banner-Oficial.jpg', 10,8, 190));
        
        // clave,categoría y modalidad
        $this->Text(150,64,utf8_decode('Clave del trabajo:'));
        //Cuerpo de la carta
        $this->Text(10,70,utf8_decode('Estimado(s):'));

        $this->Text(10,100,utf8_decode('Por este medio le (s) comunicamos que su  PROPUESTA:'));

        $this->Text(10,115,utf8_decode('Presentado para este congreso, ha sido RECHAZADA.'));
        $this->Text(10,120,utf8_decode('Los motivos que originan la decisión son los siguientes:'));

       
        $this->Text(10,165,utf8_decode('Sin más por el momento, quedamos de usted.'));
        $this->Text(10,180,utf8_decode('Atentamente:'));
        $this->Text(20,185,utf8_decode('El Comite Organizador del Evento'));
        $this->Text(20,190,utf8_decode('"Por mi Raza Hablará el Espíritu"'));



       
       $this->Ln(25);
    }
 
}

   
$id = $idPonencia;
$titulo = $titulo_trabajo;
$modalidad = $id_modalidad;
$categoria = $id_categoria;
$rfc = $RFC;
$rechazado = $comentarioGeneral;
$nombre = $nombre_usuario;
$apellidos= $apellidos_usuario;

   $h = date("j-m-Y");  // Fecha actual
   $h2 = date("G:i:s");  // Hora actual en 24 hr

 
        $pdf = new PDF();             
        //$pdf -> SetLeftMargin(30);
        $pdf->AddPage('P', 'Letter'); 

$pdf ->Text(180,64, utf8_decode($id));    
//
 $pdf -> SetXY(10,71);
for ($i=0; $i < 5 ; $i++) { 
    
    $pdf -> MultiCell(80,5, utf8_decode($primerap[$i].' '.$segundoap[$i].' '.$nombre[$i]),0,'L');
    //$pdf -> Ln(1);
}
//$pdf->Text(10,75, utf8_decode($rfc));
$pdf -> SetXY(10,102);
$pdf ->MultiCell(0,3, utf8_decode($titulo),0,'L');
$pdf -> SetXY(10,122);
$pdf ->MultiCell(0,3,utf8_decode($rechazado),0,'L'); //Text(10,105, utf8_decode($rechazado));

//$pdf ->SetXY(20,150);
$pdf ->SetXY(65,240);
$pdf ->MultiCell(0,3, utf8_decode('Cuautitlán Izcalli, Edo. de México. '.$h.'  '.$h2),0, 'L');

//$pdf->Cell(50, 10, $falla, 0);

//$pdf->Output('mipdf.pdf','d');    

       $pdf->Output('resumen/'.$id.'.pdf', 'F'); //esta linea guarda el pdf en el navegador


header("location: index.php");              
?>