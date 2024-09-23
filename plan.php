<?php
require("fpdf181/fpdf.php");
define('FPDF_FONTPATH','font/');
$pdf= NEW FPDF('L','mm','LETTER'); 
$pdf -> AddPage("P");
$pdf -> SetFont("Arial", "B", 20);
//Margen decorativo iniciando en 0, 0

//Texto de Título
$pdf->SetXY(60, 25); 
//Texto Explicativo
$pdf->SetFont('Courier','', 7);
$pdf->SetXY(48, 45);

$pdf->MultiCell(100, 4, utf8_decode('AQUI PONDREMOS UN EXPLICACIÓN PARA DESCRIBIR ALGUN PROCESO O EL TIPO DE FORMATO QUE SE ESTA DEFINIENDO O CUALQUIER OTRA COSA :P'),1, 'J');
 
//De aqui en adelante se colocan distintos métodos
//para diseñar el formato.
 
 
$pdf->Output(); //Salida al navegador
 
?>