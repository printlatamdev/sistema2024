<?php



$color=array("#ffffff","#F0F0F0");

require("fpdf181/fpdf.php");
define('FPDF_FONTPATH','font/');
$pdf= NEW FPDF('L','mm','LETTER'); 
//$pdf ->set_Paper(array(0,0,612,396));
$pdf -> AddPage("P");
$pdf -> SetFont("Arial", "B", 20);



$pdf->Cell(10,50,$pdf->Image('images/hh.png',175,2,30),0,0,'C');//el 150 es la posicion que quiero la imagen 

//$pdf -> Cell(-90,0,"TINTA PRINT EL SALVADOR",20,100,"C");

//$pdf -> Cell(1000);


$pdf -> ln(2);

$pdf -> ln(0);
//$pdf -> Cell(200,0,"Telefono : 2502-0981 * 2902-9995",0,0,"C");
//$pdf -> ln(5);
//$pdf -> Cell(200,0,"Direccion: Calle san Antonio Abad, Col. Serramonte 2 #6, San salvador",0,0,"C");
$pdf -> ln(0);
//$pdf -> Cell(200,0,"Email: wwww.centrodecapacitaciones.com",0,0,"C");
$y_axis_initial = 50;
 
//Seteamos el tiupo de letra y creamos el titulo de la pagina. No es un encabezado no se repetira
$pdf->SetFont('Arial','B',12);
$des1 = "aa";
$des2 = "bb";
$des3 = "cc";
$texto3 = $des1."\n".$des2."\n".$des3."\n";

 

$pdf->SetFont('Arial','B',14);
$pdf->Cell(35,15,utf8_decode('REMISIÓN'),0,1,'C');
$pdf->Cell(100,20,'',1,0,'C');

//-----VARIABLES------
$fecha = date('d-m-Y');
$contacto = "YESICA MURILLO";
$reportSubtitle="En este momento cuando se utiliza una celda con texto, todas las estancias en una sola línea. ";


 
$pdf->Ln(4);//ESPACIO PARA TEXTO DEBAJO DEL LOGO
//nombre de empresa
$pdf -> SetFont("Arial", "B", 10);
$pdf->Cell(45,4,'Fecha:',0,0,'L');
$pdf->Cell(65,4,$fecha,0,0,'L');
$pdf->Cell(20,4,'',0,0,'L');
$pdf -> SetFont("Arial", "B", 6);
$pdf->Cell(65,4,'HH Global Guatemala S.A',0,1,'R');
//------------------------------------
$pdf -> SetFont("Arial", "B", 10);
$pdf->Cell(45,4,'Referencia HH - E#:',0,0,'L');
$pdf->Cell(65,4,'',0,0,'L');
$pdf->Cell(20,4,'',0,0,'L');
$pdf -> SetFont("Arial", "B", 6);
$pdf->Cell(65,4,'13 CALLE 3-40 ZONA 10 EDIFICIO ATLANTIS OFICINA 606',0,1,'R');
//-----------------------------------
$pdf -> SetFont("Arial", "B", 10);
$pdf->Cell(45,4,'Nombre de ejecutivo HH:',0,0,'L');
$pdf->Cell(65,4,$contacto,0,0,'L');
$pdf->Cell(20,4,'',0,0,'L');
$pdf -> SetFont("Arial", "B", 6);
$pdf->Cell(65,4,'HH Global Guatemala S.A',0,1,'R');
//------------------------------------
$pdf->Ln(15);//----ESPACIO DESPUES DE ENCABEZADO
$pdf -> SetFont("Arial", "B", 10);
$pdf->Cell(40,6,'Imprenta que entrega:',0,0,'L');
$pdf -> SetFont("Arial", "", 10);
$pdf->Cell(70,6,'COLOR DIGITAL S.A',0,1,'L');
$pdf -> SetFont("Arial", "B", 10);
$pdf->Cell(40,6,'Bodega de entrega:',0,0,'L');
$pdf -> SetFont("Arial", "", 10);
$pdf->Cell(70,6,'Unilever de Centroamerica S.A',0,1,'L');
$pdf->Ln(3);//----ESPACIO DESPUES DE ENCABEZADO
$pdf -> SetFont("Arial", "B", 10);
$pdf->Cell(40,6,'Direccion Bodega:',1,0,'L');
$pdf -> SetFont("Arial", "", 10);
$pdf->Cell(150,6,'23av 41/01 zona 12 bodega 2',1,1,'L');



$pdf->Ln(10);

/*$this->SetX( $mizq+$anchoc1);    
$this->Cell($anchoc2,$alto,"MI COLUMNA 2",$border,0,$aligndata);
$this->SetX( $mizq);
$this->MultiCell($anchoc1,$alto,"MI COLUMNA 1",$border);*/ 
//Creamos las celdas para los titulo de cada columna y le asignamos un fondo gris y el tipo de letra
/*$pdf->SetFillColor(255,255,255);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(30,6,'Fecha:',1,0,'L',1);
 $precio='18 agosto 2019';
$pdf->Cell(50,6,$fecha,1,0,'C',1);*/

//Comienzo a crear las filas de productos según la consulta mysql

$pdf->SetFillColor(151,152,152);
 
$pdf->SetFont('Arial','',8);
$pdf->Cell(85,6,'NOMBRE DE PRODUCTO',1,0,'C',1);//primer uno lineas, segundo 0 evitar salto de linea,ultimo 1 color
$pdf->Cell(22,6,'CANTIDAD ',1,0,'C',1);
$pdf->Cell(22,6,'CANTIDAD',1,0,'C',1);
$pdf->Cell(22,6,'NUMERO DE',1,0,'C',1);
$pdf->Cell(23,6,'CAJAS/BULTOS',1,0,'C',1);
$pdf->Cell(22,6,'UNIDADES',1,1,'C',1);

//---
$pdf->Cell(85,5,'',0,0,'C',0);//primer uno lineas, segundo 0 evitar salto de linea,ultimo 1 color
$pdf->Cell(22,5,'',1,0,'C',0);
$pdf->Cell(22,5,'',1,0,'C',0);
$pdf->Cell(22,5,'',1,0,'C',0);
$pdf->Cell(23,5,'',1,0,'C',0);
$pdf->Cell(22,5,'',1,1,'C',0);
//-----
$pdf->Cell(85,5,'',0,0,'C',0);//primer uno lineas, segundo 0 evitar salto de linea,ultimo 1 color
$pdf->Cell(22,5,'',1,0,'C',0);
$pdf->Cell(22,5,'',1,0,'C',0);
$pdf->Cell(22,5,'',1,0,'C',0);
$pdf->Cell(23,5,'',1,0,'C',0);
$pdf->Cell(22,5,'',1,1,'C',0);

$pdf->Cell(85,5,'',0,0,'C',0);//primer uno lineas, segundo 0 evitar salto de linea,ultimo 1 color
$pdf->Cell(22,5,'',1,0,'C',0);
$pdf->Cell(22,5,'',1,0,'C',0);
$pdf->Cell(22,5,'',1,0,'C',0);
$pdf->Cell(23,5,'',1,0,'C',0);
$pdf->Cell(22,5,'',1,1,'C',0);
//---ORDEN DE REMISION 
$pdf->Cell(85,5,'',0,0,'C',0);//primer uno lineas, segundo 0 evitar salto de linea,ultimo 1 color
$pdf->Cell(22,5,'',1,0,'C',0);
$pdf->Cell(22,5,'',1,0,'C',0);
$pdf->Cell(22,5,'',1,0,'C',0);
$pdf->Cell(23,5,'',1,0,'C',0);
$pdf->Cell(22,5,'',1,1,'C',0);

$pdf->Cell(85,5,'',0,0,'C',0);//primer uno lineas, segundo 0 evitar salto de linea,ultimo 1 color
$pdf->Cell(22,5,'',1,0,'C',0);
$pdf->Cell(22,5,'',1,0,'C',0);
$pdf->Cell(22,5,'',1,0,'C',0);
$pdf->Cell(23,5,'',1,0,'C',0);
$pdf->Cell(22,5,'',1,1,'C',0);



//---
$pdf->Cell(85,5,'',0,0,'C',0);//primer uno lineas, segundo 0 evitar salto de linea,ultimo 1 color
$pdf->Cell(22,5,'',1,0,'C',0);
$pdf->Cell(22,5,'',1,0,'C',0);
$pdf->Cell(22,5,'',1,0,'C',0);
$pdf->Cell(23,5,'',1,0,'C',0);
$pdf->Cell(22,5,'',1,1,'C',0);
//-----
$pdf->Cell(85,5,'',0,0,'C',0);//primer uno lineas, segundo 0 evitar salto de linea,ultimo 1 color
$pdf->Cell(22,5,'',1,0,'C',0);
$pdf->Cell(22,5,'',1,0,'C',0);
$pdf->Cell(22,5,'',1,0,'C',0);
$pdf->Cell(23,5,'',1,0,'C',0);
$pdf->Cell(22,5,'',1,1,'C',0);

$pdf->Cell(85,5,'',0,0,'C',0);//primer uno lineas, segundo 0 evitar salto de linea,ultimo 1 color
$pdf->Cell(22,5,'',1,0,'C',0);
$pdf->Cell(22,5,'',1,0,'C',0);
$pdf->Cell(22,5,'',1,0,'C',0);
$pdf->Cell(23,5,'',1,0,'C',0);
$pdf->Cell(22,5,'',1,1,'C',0);

$pdf->Cell(85,5,'',0,0,'C',0);//primer uno lineas, segundo 0 evitar salto de linea,ultimo 1 color
$pdf->Cell(22,5,'',1,0,'C',0);
$pdf->Cell(22,5,'',1,0,'C',0);
$pdf->Cell(22,5,'',1,0,'C',0);
$pdf->Cell(23,5,'',1,0,'C',0);
$pdf->Cell(22,5,'',1,1,'C',0);

$pdf->Cell(85,5,'',0,0,'C',0);//primer uno lineas, segundo 0 evitar salto de linea,ultimo 1 color
$pdf->Cell(22,5,'',1,0,'C',0);
$pdf->Cell(22,5,'',1,0,'C',0);
$pdf->Cell(22,5,'',1,0,'C',0);
$pdf->Cell(23,5,'',1,0,'C',0);
$pdf->Cell(22,5,'',1,1,'C',0);


//---
$pdf->Cell(85,5,'',0,0,'C',0);//primer uno lineas, segundo 0 evitar salto de linea,ultimo 1 color
$pdf->Cell(22,5,'',1,0,'C',0);
$pdf->Cell(22,5,'',1,0,'C',0);
$pdf->Cell(22,5,'',1,0,'C',0);
$pdf->Cell(23,5,'',1,0,'C',0);
$pdf->Cell(22,5,'',1,1,'C',0);
//-----
$pdf->Cell(85,5,'',0,0,'C',0);//primer uno lineas, segundo 0 evitar salto de linea,ultimo 1 color
$pdf->Cell(22,5,'',1,0,'C',0);
$pdf->Cell(22,5,'',1,0,'C',0);
$pdf->Cell(22,5,'',1,0,'C',0);
$pdf->Cell(23,5,'',1,0,'C',0);
$pdf->Cell(22,5,'',1,1,'C',0);

$pdf->Cell(85,5,'',0,0,'C',0);//primer uno lineas, segundo 0 evitar salto de linea,ultimo 1 color
$pdf->Cell(22,5,'',1,0,'C',0);
$pdf->Cell(22,5,'',1,0,'C',0);
$pdf->Cell(22,5,'',1,0,'C',0);
$pdf->Cell(23,5,'',1,0,'C',0);
$pdf->Cell(22,5,'',1,1,'C',0);

$pdf->Cell(85,5,'',0,0,'C',0);//primer uno lineas, segundo 0 evitar salto de linea,ultimo 1 color
$pdf->Cell(22,5,'',1,0,'C',0);
$pdf->Cell(22,5,'',1,0,'C',0);
$pdf->Cell(22,5,'',1,0,'C',0);
$pdf->Cell(23,5,'',1,0,'C',0);
$pdf->Cell(22,5,'',1,1,'C',0);

$pdf->Cell(85,5,'',0,0,'C',0);//primer uno lineas, segundo 0 evitar salto de linea,ultimo 1 color
$pdf->Cell(22,5,'',1,0,'C',0);
$pdf->Cell(22,5,'',1,0,'C',0);
$pdf->Cell(22,5,'',1,0,'C',0);
$pdf->Cell(23,5,'',1,0,'C',0);
$pdf->Cell(22,5,'',1,1,'C',0);


//---
$pdf->Cell(85,5,'',0,0,'C',0);//primer uno lineas, segundo 0 evitar salto de linea,ultimo 1 color
$pdf->Cell(22,5,'',1,0,'C',0);
$pdf->Cell(22,5,'',1,0,'C',0);
$pdf->Cell(22,5,'',1,0,'C',0);
$pdf->Cell(23,5,'',1,0,'C',0);
$pdf->Cell(22,5,'',1,1,'C',0);
//-----
$pdf->Cell(85,5,'',0,0,'C',0);//primer uno lineas, segundo 0 evitar salto de linea,ultimo 1 color
$pdf->Cell(22,5,'',1,0,'C',0);
$pdf->Cell(22,5,'',1,0,'C',0);
$pdf->Cell(22,5,'',1,0,'C',0);
$pdf->Cell(23,5,'',1,0,'C',0);
$pdf->Cell(22,5,'',1,1,'C',0);

$pdf->Cell(85,5,'',0,0,'C',0);//primer uno lineas, segundo 0 evitar salto de linea,ultimo 1 color
$pdf->Cell(22,5,'',1,0,'C',0);
$pdf->Cell(22,5,'',1,0,'C',0);
$pdf->Cell(22,5,'',1,0,'C',0);
$pdf->Cell(23,5,'',1,0,'C',0);
$pdf->Cell(22,5,'',1,1,'C',0);

$pdf->Cell(85,5,'',0,0,'C',0);//primer uno lineas, segundo 0 evitar salto de linea,ultimo 1 color
$pdf->Cell(22,5,'',1,0,'C',0);
$pdf->Cell(22,5,'',1,0,'C',0);
$pdf->Cell(22,5,'',1,0,'C',0);
$pdf->Cell(23,5,'',1,0,'C',0);
$pdf->Cell(22,5,'',1,1,'C',0);

$pdf->Cell(85,5,'',0,0,'C',0);//primer uno lineas, segundo 0 evitar salto de linea,ultimo 1 color
$pdf->Cell(22,5,'',1,0,'C',0);
$pdf->Cell(22,5,'',1,0,'C',0);
$pdf->Cell(22,5,'',1,0,'C',0);
$pdf->Cell(23,5,'',1,0,'C',0);
$pdf->Cell(22,5,'',1,1,'C',0);






 
$pdf->Ln(7);
$pdf->SetFont('Arial','',6);
$reportSubtitle="Exhibidor de piso, imoresion digital full color en coroplast de 8mm, trquelado al detalle. incluye acentos en PET de 0.50 mm con impresion digital. Medidas: 40 x 30 x 130 cms. Arte Dove Masterbrand ";
$reportSubtitle2="\n\n\n\n\n";

  $pdf->SetFont('Arial','',10);
  $pdf->SetXY(10,95);
  $pdf->MultiCell(85,5,$reportSubtitle,1,'L');
  $pdf->SetXY(10,120);
  $pdf->MultiCell(85,5,$reportSubtitle2,1,'L');
  $pdf->SetXY(10,145);
  $pdf->MultiCell(85,5,$reportSubtitle2,1,'L');
  $pdf->SetXY(10,170);
  $pdf->MultiCell(85,5,$reportSubtitle2,1,'L');

  $pdf->SetXY(10,195);
  $pdf->MultiCell(85,5,'TOTAL',1,'C');
  $pdf->SetXY(95,195);
  $pdf->MultiCell(22,5,'',1,'C');
  $pdf->SetXY(117,195);
  $pdf->MultiCell(22,5,'',1,'C');
  $pdf->SetXY(139,195);
  $pdf->MultiCell(22,5,'',1,'C');
  $pdf->SetXY(161,195);
  $pdf->MultiCell(23,5,'',1,'C');
  $pdf->SetXY(184,195);
  $pdf->MultiCell(22,5,'',1,'C');

  //--------------
  //$pdf->SetFont('Arial','B',8);
  $pdf->SetFont('Arial','U',8);
  $pdf->SetXY(80,215);
  $pdf->MultiCell(50,5,'A COMPLETAR POR EL RECEPTOR',0,'C');

  
  $textofooter ="¿ALGÚN DESPERFECTO REMARCABLE?  ...........................................................................\n FECHA ENTREGA:\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t ...........................................................................\nRECIBIDO CONFORME BODEGA\t\t\t\t\t\t\t\t\t\t\t\t\t  ...........................................................................\n\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\tNOMBRE";
  $pdf->SetFont('Arial','B',10);
  $pdf->SetFillColor(242, 243, 244);
  $pdf->SetXY(10,223);
  $pdf->MultiCell(195,6,utf8_decode($textofooter),0,'L',1);

  //----------LETRA PEQUEÑA
  $txtpequeño="NOTA: Una vez la mercancia ha abandonado la custodia de HH y/o sus colaboradores, HH no se hace responsable de daños o discrepancias que puedan ocurrir con posterioridad a la entrega. Es por eso, que encarecidamente recomendamos que todas las verificaciones/controles relevantes en cuanto a cantidad y estado del material, se lleven a cabo en el mismo momento de la recepcion del mismo "; 
  $pdf->SetXY(10,250);
  $pdf->SetFont('Arial','',7);
  $pdf->MultiCell(195,3,utf8_decode($txtpequeño),0,'L',0);

  //-------linea verde
  $pdf->SetFillColor(129, 255, 92);
  $pdf->SetXY(10,15);
  $pdf->MultiCell(2,8,'',0,'C',1);

//$pdf->SetXY(100,50);
//$pdf->MultiCell(20,3,$reportSubtitle,1);
//$pdf->Multicell();
//$pdf->Cell(85, 10, utf8_decode($reportSubtitle2), 1);
//$pdf->MultiCell( 85, 5, utf8_decode($reportSubtitle2), 1);
//$pdf->MultiCell( 85, 5, utf8_decode($reportSubtitle2), 1);
//$pdf->MultiCell( 85, 5, "Reporte de Sistema, orden de remision, ordenes de remision", 1); 
//$pdf->Multicell( 85, 5, "Reporte de Orden de Remision");

$pdf->Ln(15);
    


 
//Mostramos el documento pdf
$pdf->Output('F', 'logistica/SOLICITUDES DE DESPACHO/prueba1.pdf');
$pdf->Output();


//$clientes = mysqli_query($cn, $sql);
//$total = mysqli_num_rows($clientes);
$pdf -> SetFont("Arial", "", 10);
  
  
$pdf -> ln(10);

$pdf -> Sety(-40);

$pdf -> output();


?>