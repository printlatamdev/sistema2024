
<?php
$carpeta_artes_orden = "logistica/SOLICITUDES DE DESPACHO DE DESPACHO/";
 if (!file_exists($carpeta_artes_orden)) {
 mkdir($carpeta_artes_orden, 0777, true);}

  $origen=$_POST["origen"];
  $ordenes=$_POST["pop"];
  $destino=$_POST["destino"];
  $trans=$_POST["transporte"];
  $proveedor=$_POST["proveedor"];
  $cancelacion=$_POST["cancelacion"];
  $aduanal=$_POST["aduanal"];
  $entrega=$_POST["entrega"];
  $flete=$_POST["flete"];
  $fecha=$_POST["fecha"];
  $capacidad=$_POST["capacidad"];
  $detalleflete=$_POST["detalleflete"];
  //$n_despacho=$_POST["ordendespacho"];
if ($ordenes==0) {

$empresa='ENVIO DE SUMINISTROS';
$n_orden=0;
     
}else{

}
//generando variable nueva para ordenes multiples
for ($i=0;$i<count($ordenes);$i++)    
{     

 
$n1=$ordenes[0];
$n2=$ordenes[1];  
$n3=$ordenes[2];
$n4=$ordenes[3];   
} 

if ($n2==null) {
  $x1="";
  $y1="";
} else{
    $x1="-";
$y1="_";
}
if ($n3==null){
  $x2="";
$y2="";
}
else{
  $x2="-";
$y2="_";
}
if ($n4==null){
  $x3="";
$y3="";
}else{
  $x3="-";
$y3="_";
}
//nueva variable
$nuevo=$n1.$x1.$n2.$x2.$n3.$x3.$n4;
$guardar=$n1.$y1.$n2.$y2.$n3.$y3.$n4;

$namepdf=$origen.$guardar.".pdf";
//



 //comienzo a recorrer el arreglo ordenes
 for ($i=0;$i<count($ordenes);$i++)    
{     
  $n_orden=$ordenes[$i];
  $fecha=date('d/m/Y');




  if ($origen=='NI') {
    
    include("sol/connect2.php");
  

    $rs=$mysqli->query("select t1.id_orden, t1.id_empresa, t1.empresa, t1.id_proyecto, t2.id_proyecto, t1.estado, t2.nombre, t2.id_marca, t2.marca from pop t1 inner join pop_proyecto t2 on t1.id_proyecto=t2.id_proyecto 
where  t1.id_orden='".$n_orden."' order by t1.id_orden desc");

while ($fila = $rs->fetch_row()) { $empresa=$fila[2]; }

if ($empresa=="COLGATE PALMOLIVE CA") {
  $empresa="COLGATE PALMOLIVE INC";
}
if ($empresa=="HH GLOBAL EL SALVADOR") {
  $empresa="HH GLOBAL";
}

$rs2=$mysqli->query("select*from solicitud_despacho");
   while ($fila2 = $rs2->fetch_row()) 
                            {    $num1=$fila2[2];


                           


                                 }



if ($i>0) {
  $num2=0000;
$longitudActual=strlen($num1);//uno de los dos
//$n1=substr($n1,3);
//$n2=substr($n1,3);
$sumar=$num1+$num2;
$longitudFinal=strlen($sumar);
$cantidadCeros=$longitudActual-$longitudFinal;
$suma=str_repeat("0",$cantidadCeros).$sumar;

$n_despacho=$origen.$suma;
} else {
  $num2=0001;
$longitudActual=strlen($num1);//uno de los dos
//$n1=substr($n1,3);
//$n2=substr($n1,3);
$sumar=$num1+$num2;
$longitudFinal=strlen($sumar);
$cantidadCeros=$longitudActual-$longitudFinal;
$suma=str_repeat("0",$cantidadCeros).$sumar;

$n_despacho=$origen.$suma;
}
if ($suma==1) {
  $suma="00001";
}

$res21 = $mysqli->query("INSERT INTO solicitud_despacho(
  id_orden,n_orden,proveedor,flete,entrega_ad,tramite_adu,cancelacion,transporte,detalleflete,solicitud_pdf,origen,destino,fecha) VALUES ('".$n_orden."','".$suma."','".$proveedor."','".$flete."','".$entrega."','".$aduanal."','".$cancelacion."','".$trans."', '".$detalleflete."','".$namepdf."','".$origen."','".$destino."','".$fecha."')");



  }else{

 include("sol/connect.php");
                                          
     $rs=$mysqli->query("select t1.id_orden, t1.id_empresa, t1.empresa, t1.id_proyecto, t2.id_proyecto, t1.estado, t2.nombre, t2.id_marca, t2.marca from pop t1 inner join pop_proyecto t2 on t1.id_proyecto=t2.id_proyecto 
where  t1.id_orden='".$n_orden."' order by t1.id_orden desc");

                                             while ($fila = $rs->fetch_row()) { $empresa=$fila[2]; }

$rs2=$mysqli->query("select*from solicitud_despacho");
   while ($fila2 = $rs2->fetch_row()) 
                            {    $num1=$fila2[2];


                           


                                 }



if ($i>0) {
  $num2=0000;
$longitudActual=strlen($num1);//uno de los dos
//$n1=substr($n1,3);
//$n2=substr($n1,3);
$sumar=$num1+$num2;
$longitudFinal=strlen($sumar);
$cantidadCeros=$longitudActual-$longitudFinal;
$suma=str_repeat("0",$cantidadCeros).$sumar;

$n_despacho=$origen.$suma;
} else {
  $num2=0001;
$longitudActual=strlen($num1);//uno de los dos
//$n1=substr($n1,3);
//$n2=substr($n1,3);
$sumar=$num1+$num2;
$longitudFinal=strlen($sumar);
$cantidadCeros=$longitudActual-$longitudFinal;
$suma=str_repeat("0",$cantidadCeros).$sumar;

$n_despacho=$origen.$suma;
}

if ($suma==1) {
  $suma="00001";
}
$res21 = $mysqli->query("INSERT INTO solicitud_despacho(
  id_orden,n_orden,proveedor,flete,entrega_ad,tramite_adu,cancelacion,transporte,detalleflete,solicitud_pdf,origen,destino,fecha) VALUES ('".$n_orden."','".$suma."','".$proveedor."','".$flete."','".$entrega."','".$aduanal."','".$cancelacion."','".$trans."', '".$detalleflete."', '".$namepdf."','".$origen."','".$destino."','".$fecha."')");


}



}


if ($n_orden==0) {
 $empresa='ENVIO DE SUMINISTROS';
}




//COMIENZAN LAS SOLICITUDES
if ($origen=="NI") {
  $cancelacion = 0;
  $aduanal = 0;
  //COMIENZAN LOS PDF
if ($trans=='AEREO') {

  $color=array("#ffffff","#F0F0F0");
/*
$contador=0;
$suma=0;
foreach($carri as $k => $v){
$subto=$v['cantidad']*$v['precio'];
$suma=$suma+$subto;
$contador++;
//Creo una variable de sesion y le asigno el total a pagar
$_SESSION['ValorPagar']=$suma;
*/

//$sql = "select * from autorizar";
require("fpdf181/fpdf.php");
define('FPDF_FONTPATH','font/');
$pdf= NEW FPDF('L','mm','LETTER');
//$pdf->set_Paper(array(0,0,612,396)); 
$pdf -> AddPage("P");
$pdf -> SetFont("Arial", "B", 20);



$pdf->Cell(500,50,$pdf->Image('logo_color_p.png',5,2,50),0,0,'C');

//$pdf -> Cell(-90,0,"TINTA PRINT EL SALVADOR",20,100,"C");

$pdf -> Cell(1000);


$pdf -> ln(02);

$pdf -> ln(10);
//$pdf -> Cell(200,0,"Telefono : 2502-0981 * 2902-9995",0,0,"C");
//$pdf -> ln(5);
//$pdf -> Cell(200,0,"Direccion: Calle san Antonio Abad, Col. Serramonte 2 #6, San salvador",0,0,"C");
$pdf -> ln(0);
//$pdf -> Cell(200,0,"Email: wwww.centrodecapacitaciones.com",0,0,"C");
$y_axis_initial = 25;
 
//Seteamos el tiupo de letra y creamos el titulo de la pagina. No es un encabezado no se repetira
$pdf->SetFont('Arial','B',12);
 
$pdf->Cell(60,6,'',0,0,'C');
$pdf->Cell(100,6,'SOLICITUD DE DESPACHO',1,0,'C');
$pdf->Cell(30,6,'# '.$n_despacho,1,0,'C');
 
$pdf->Ln(10);
 
//Creamos las celdas para los titulo de cada columna y le asignamos un fondo gris y el tipo de letra
$pdf->SetFillColor(255,255,255);
 
$pdf->SetFont('Arial','B',10);
$pdf->Cell(30,6,'Fecha:',1,0,'L',1);
 $precio='18 agosto 2019';
$pdf->Cell(50,6,$fecha,1,0,'C',1);

 
$pdf->Ln(7);
 
//Comienzo a crear las filas de productos según la consulta mysql
 $pdf->SetFillColor(151,152,152);
 
$pdf->SetFont('Arial','B',10);
$pdf->Cell(25,6,'#OP',1,0,'C',1);
 
$pdf->Cell(50,6,'CLIENTE',1,0,'C',1);
$pdf->Cell(50,6,'PROVEEDOR',1,0,'C',1);
$pdf->Cell(25,6,'TRANSPORTE',1,0,'C',1);
$pdf->Cell(25,6,'P.ORIGEN',1,0,'C',1);
$pdf->Cell(25,6,'P.DESTINO',1,0,'C',1);
 
$pdf->Ln(7);
 

 

       $pdf->SetFillColor(255,255,255);
       $pdf->Cell(25,10,$nuevo,1,0,'C',0);
       $pdf->Cell(50,10,$empresa,1,0,'C',0);
       $pdf->Cell(50,10,$proveedor,1,0,'C',0);
       $pdf->Cell(25,10,$trans,1,0,'C',0);
       $pdf->Cell(25,10,$origen,1,0,'C',0);
       $pdf->Cell(25,10,$destino,1,0,'C',0);
//Muestro la iamgen dentro de la celda GetX y GetY dan las coordenadas actuales de la fila
 

 
$pdf->Ln(11);



$pdf->SetFillColor(255,255,255);
 
$pdf->SetFont('Arial','B',10);
$pdf->Cell(25,6,'Costos:',1,0,'L',1);

$pdf->Ln(7);
 $pdf->SetFillColor(151,152,152);
 
$pdf->SetFont('Arial','B',10);
$pdf->Cell(62,6,'FLETE',1,0,'C',1);
 
$pdf->Cell(63,6,'ENTREGA ADICIONAL',1,0,'C',1);
//$pdf->Cell(50,6,'T. ADUANAL',1,0,'C',1);
//$pdf->Cell(25,6,'SINI',1,0,'C',1);
$pdf->Cell(50,6,'SUB-TOTAL',1,0,'C',1);
// el sini e el unico que no genera iva
$pdf->Ln(7);
 

 
     $total4=$flete+$entrega+$aduanal+$cancelacion;
     $total2=$flete+$entrega+$aduanal;
     $iva2= $total2 * 0.15;
     $iva = bcdiv($iva2, '1', 2);
     $total = bcdiv($total4, '1', 2);
     $pdf->SetFillColor(255,255,255);
     $pdf->Cell(62,10,'$'.$flete,1,0,'C',0);
     $pdf->Cell(63,10,'$'.$entrega,1,0,'C',1);
        //$pdf->Cell(50,10,'$'.$aduanal,1,0,'C',1);
          // $pdf->Cell(25,10,'$'.$cancelacion,1,0,'C',1);
     $pdf->SetFont('Arial','',10);
     $pdf->Cell(50,10,' $'.$total.'',1,0,'C',1);
     $pdf->Ln(10);
     $pdf->SetFillColor(255,255,255);
     $pdf->SetFont('Arial','B',10);
     $pdf->Cell(125,6,'',0,0,'L',1);
     $pdf->SetFont('Arial','',10);
     $pdf->Cell(25,6,'IVA (15%):',1,0,'C',1);
     $pdf->SetFont('Arial','',10);
     $pdf->Cell(25,6,'  $'.$iva.'',1,0,'C',1);

              $pdf->Ln(7);

$TOTALIVA2=$total+$iva;
  $TOTALIVA = bcdiv($TOTALIVA2, '1', 2);


$pdf->SetFont('Arial','B',10);
$pdf->Cell(125,6,'',0,0,'L',1);
 $pdf->SetFont('Arial','',10);
$pdf->Cell(25,6,'TOTAL:',1,0,'C',1);
 $pdf->SetFont('Arial','',10);
$pdf->Cell(25,6,'  $'.$TOTALIVA.'',1,0,'C',1);

//DETALLE DEL FLETE
$pdf->Ln(7);

$TOTALIVA2=$total+$iva;
  $TOTALIVA = bcdiv($TOTALIVA2, '1', 2);


$pdf->SetFont('Arial','B',10);
$pdf->Cell(1,6,'',0,0,'L',1);
 $pdf->SetFont('Arial','',10);
$pdf->Cell(40,6,'FLETE INCLUYE:',1,0,'C',1);


$pdf->Ln(7);

$TOTALIVA2=$total+$iva;
  $TOTALIVA = bcdiv($TOTALIVA2, '1', 2);


$pdf->SetFont('Arial','B',10);
$pdf->Cell(1,6,'',0,0,'L',1);
 $pdf->SetFont('Arial','',10);
$pdf->Cell(180,12,''.$detalleflete.'',1,0,'C',1);
// $pdf->SetFont('Arial','',10);
//$pdf->Cell(40,6,'  $'.$TOTALIVA.'',1,0,'C',1);
//TERMINA DETALLE DEL FLETE 
             


 $pdf->Ln(25);

 

  $pdf->SetFont('Arial','',12
);
$pdf -> Cell(40,0,"f.__________________",0,200,"C");
$pdf -> Cell(200,0,"f.__________________",0,200,"C");
//$pdf -> Cell(350,0,"f.__________________",0,200,"C");
//$pdf -> Cell(360,0,"f.__________________",0,200,"C");
$pdf -> ln(6);


$pdf->SetFont('Arial','',8
);
$pdf -> Cell(40,0,"Solicita",0,200,"C");
$pdf -> Cell(200,0,"Eduardo Campos",0,200,"C");
//$pdf -> Cell(350,0,"Lic. Eduardo Campos",0,200,"C");
//$pdf -> Cell(360,0,"Lic. Eduardo Campos ",0,200,"C");
$pdf -> ln(3);
$pdf -> Cell(40,0,"Daysi Medina",0,200,"C");



 
//Mostramos el documento pdf
$pdf->Output('F', 'logistica/SOLICITUDES DE DESPACHO/'.$origen.$guardar.'.pdf');
$pdf->Output();


//$clientes = mysqli_query($cn, $sql);
//$total = mysqli_num_rows($clientes);
$pdf -> SetFont("Arial", "", 10);
  
  
  $pdf -> ln(10);

$pdf -> Sety(-40);

$pdf -> output();
 
}else{


$color=array("#ffffff","#F0F0F0");
/*
$contador=0;
$suma=0;
foreach($carri as $k => $v){
$subto=$v['cantidad']*$v['precio'];
$suma=$suma+$subto;
$contador++;
//Creo una variable de sesion y le asigno el total a pagar
$_SESSION['ValorPagar']=$suma;
*/

//$sql = "select * from autorizar";
require("fpdf181/fpdf.php");
define('FPDF_FONTPATH','font/');
$pdf= NEW FPDF('L','mm','LETTER');
//$pdf->set_Paper(array(0,0,612,396)); 
$pdf -> AddPage("P");
$pdf -> SetFont("Arial", "B", 20);



$pdf->Cell(500,50,$pdf->Image('logo_color_p.png',5,2,50),0,0,'C');

//$pdf -> Cell(-90,0,"TINTA PRINT EL SALVADOR",20,100,"C");

$pdf -> Cell(1000);


$pdf -> ln(02);

$pdf -> ln(10);
//$pdf -> Cell(200,0,"Telefono : 2502-0981 * 2902-9995",0,0,"C");
//$pdf -> ln(5);
//$pdf -> Cell(200,0,"Direccion: Calle san Antonio Abad, Col. Serramonte 2 #6, San salvador",0,0,"C");
$pdf -> ln(0);
//$pdf -> Cell(200,0,"Email: wwww.centrodecapacitaciones.com",0,0,"C");
$y_axis_initial = 25;
 
//Seteamos el tiupo de letra y creamos el titulo de la pagina. No es un encabezado no se repetira
$pdf->SetFont('Arial','B',12);
 
$pdf->Cell(60,6,'',0,0,'C');
$pdf->Cell(100,6,'SOLICITUD DE DESPACHO',1,0,'C');
$pdf->Cell(30,6,'# '.$n_despacho,1,0,'C');
 
$pdf->Ln(10);
 
//Creamos las celdas para los titulo de cada columna y le asignamos un fondo gris y el tipo de letra
$pdf->SetFillColor(255,255,255);
 
$pdf->SetFont('Arial','B',10);
$pdf->Cell(30,6,'Fecha:',1,0,'L',1);
 $precio='18 agosto 2019';
$pdf->Cell(50,6,$fecha,1,0,'C',1);

 
$pdf->Ln(7);
 
//Comienzo a crear las fiulas de productos según la consulta mysql
 $pdf->SetFillColor(151,152,152);
 
$pdf->SetFont('Arial','B',10);
$pdf->Cell(25,6,'#OP',1,0,'C',1);
 
$pdf->Cell(50,6,'CLIENTE',1,0,'C',1);
$pdf->Cell(50,6,'PROVEEDOR',1,0,'C',1);
$pdf->Cell(25,6,'TRANSPORTE',1,0,'C',1);
$pdf->Cell(25,6,'P.ORIGEN',1,0,'C',1);
$pdf->Cell(25,6,'P.DESTINO',1,0,'C',1);
 
$pdf->Ln(7);
 

 

    $pdf->SetFillColor(255,255,255);
    $pdf->Cell(25,10,$nuevo,1,0,'C',0);
 
       $pdf->Cell(50,10,$empresa,1,0,'C',0);
        $pdf->Cell(50,10,$proveedor,1,0,'C',0);
        $pdf->Cell(25,10,$capacidad." TON.",1,0,'C',0);
           $pdf->Cell(25,10,$origen,1,0,'C',0);
              $pdf->Cell(25,10,$destino,1,0,'C',0);
//Muestro la iamgen dentro de la celda GetX y GetY dan las coordenadas actuales de la fila
 

 
$pdf->Ln(11);



$pdf->SetFillColor(255,255,255);
 
$pdf->SetFont('Arial','B',10);
$pdf->Cell(25,6,'Costos:',1,0,'L',1);

$pdf->Ln(7);
 $pdf->SetFillColor(151,152,152);
 
$pdf->SetFont('Arial','B',10);
$pdf->Cell(62,6,'FLETE',1,0,'C',1);
 
$pdf->Cell(63,6,'ENTREGA ADICIONAL',1,0,'C',1);
//$pdf->Cell(50,6,'T. ADUANAL',1,0,'C',1);
//$pdf->Cell(25,6,'SINI',1,0,'C',1);
$pdf->Cell(50,6,'SUB-TOTAL',1,0,'C',1);

 
$pdf->Ln(7);
 

 
    $total4=$flete+$entrega+$aduanal+$cancelacion;
     $total2=$flete+$entrega+$aduanal;

    $iva2= $total2*0.15;
 

   $iva = bcdiv($iva2, '1', 2);
     $total = bcdiv($total4, '1', 2);
    $pdf->SetFillColor(255,255,255);
    $pdf->Cell(62,10,'$'.$flete,1,0,'C',0);
 
       $pdf->Cell(63,10,'$'.$entrega,1,0,'C',1);
        //$pdf->Cell(50,10,'$'.$aduanal,1,0,'C',1);
           //$pdf->Cell(25,10,'$'.$cancelacion,1,0,'C',1);
            $pdf->SetFont('Arial','',10);
              $pdf->Cell(50,10,' $'.$total.'',1,0,'C',1);
                 $pdf->Ln(10);

              $pdf->SetFillColor(255,255,255);
 
$pdf->SetFont('Arial','B',10);
$pdf->Cell(125,6,'',0,0,'L',1);
 $pdf->SetFont('Arial','',10);
$pdf->Cell(25,6,'IVA (15%):',1,0,'C',1);
 $pdf->SetFont('Arial','',10);
$pdf->Cell(25,6,'  $'.$iva.'',1,0,'C',1);

              $pdf->Ln(7);


$TOTALIVA2=$total+$iva;
  $TOTALIVA = bcdiv($TOTALIVA2, '1', 2);


$pdf->SetFont('Arial','B',10);
$pdf->Cell(125,6,'',0,0,'L',1);
 $pdf->SetFont('Arial','',10);
$pdf->Cell(25,6,'TOTAL:',1,0,'C',1);
 $pdf->SetFont('Arial','',10);
$pdf->Cell(25,6,'  $'.$TOTALIVA.'',1,0,'C',1);

//DETALLE DEL FLETE
$pdf->Ln(7);




$pdf->SetFont('Arial','B',10);
$pdf->Cell(1,6,'',0,0,'L',1);
 $pdf->SetFont('Arial','',10);
$pdf->Cell(40,6,'FLETE INCLUYE:',1,0,'C',1);


$pdf->Ln(7);

$TOTALIVA2=$total+$iva;
  $TOTALIVA = bcdiv($TOTALIVA2, '1', 2);


$pdf->SetFont('Arial','B',10);
$pdf->Cell(1,6,'',0,0,'L',1);
 $pdf->SetFont('Arial','',10);
$pdf->Cell(180,12,''.$detalleflete.'',1,0,'C',1);
// $pdf->SetFont('Arial','',10);
//$pdf->Cell(40,6,'  $'.$TOTALIVA.'',1,0,'C',1);
//TERMINA DETALLE DEL FLETE 

              $pdf->Ln(25);

 

 $pdf->SetFont('Arial','',12
);
$pdf -> Cell(40,0,"f.__________________",0,200,"C");
$pdf -> Cell(200,0,"f.__________________",0,200,"C");
//$pdf -> Cell(350,0,"f.__________________",0,200,"C");
//$pdf -> Cell(360,0,"f.__________________",0,200,"C");
$pdf -> ln(6);


$pdf->SetFont('Arial','',8
);
$pdf -> Cell(40,0,"Solicita",0,200,"C");
$pdf -> Cell(200,0,"Eduardo Campos",0,200,"C");
//$pdf -> Cell(350,0,"Lic. Eduardo Campos",0,200,"C");
//$pdf -> Cell(360,0,"Lic. Eduardo Campos ",0,200,"C");
$pdf -> ln(3);
$pdf -> Cell(35,0,"Daysi Medina",0,200,"C");



 
//Mostramos el documento pdf
$pdf->Output('F', 'logistica/SOLICITUDES DE DESPACHO/'.$origen.$guardar.'.pdf');
$pdf->Output();


//$clientes = mysqli_query($cn, $sql);
//$total = mysqli_num_rows($clientes);
$pdf -> SetFont("Arial", "", 10);
  
  
$pdf -> ln(10);

$pdf -> Sety(-40);

$pdf -> output();



}
  //TERMINAN PDF
}elseif ($origen=="SV") {
  //COMIENZAN PDF 
if ($trans=='AEREO') {

  $color=array("#ffffff","#F0F0F0");
/*
$contador=0;
$suma=0;
foreach($carri as $k => $v){
$subto=$v['cantidad']*$v['precio'];
$suma=$suma+$subto;
$contador++;
//Creo una variable de sesion y le asigno el total a pagar
$_SESSION['ValorPagar']=$suma;
*/

//$sql = "select * from autorizar";
require("fpdf181/fpdf.php");
define('FPDF_FONTPATH','font/');
$pdf= NEW FPDF('L','mm','LETTER'); 
//$pdf->set_Paper(array(0,0,612,396));
$pdf -> AddPage("P");
$pdf -> SetFont("Arial", "B", 20);



$pdf->Cell(500,50,$pdf->Image('logo_color_p.png',5,2,50),0,0,'C');

//$pdf -> Cell(-90,0,"TINTA PRINT EL SALVADOR",20,100,"C");

$pdf -> Cell(1000);


$pdf -> ln(02);

$pdf -> ln(10);
//$pdf -> Cell(200,0,"Telefono : 2502-0981 * 2902-9995",0,0,"C");
//$pdf -> ln(5);
//$pdf -> Cell(200,0,"Direccion: Calle san Antonio Abad, Col. Serramonte 2 #6, San salvador",0,0,"C");
$pdf -> ln(0);
//$pdf -> Cell(200,0,"Email: wwww.centrodecapacitaciones.com",0,0,"C");
$y_axis_initial = 25;
 
//Seteamos el tiupo de letra y creamos el titulo de la pagina. No es un encabezado no se repetira
$pdf->SetFont('Arial','B',12);
 
$pdf->Cell(60,6,'',0,0,'C');
$pdf->Cell(100,6,'SOLICITUD DE DESPACHO',1,0,'C');
$pdf->Cell(30,6,'# '.$n_despacho,1,0,'C');
 
$pdf->Ln(10);
 
//Creamos las celdas para los titulo de cada columna y le asignamos un fondo gris y el tipo de letra
$pdf->SetFillColor(255,255,255);
 
$pdf->SetFont('Arial','B',10);
$pdf->Cell(30,6,'Fecha:',1,0,'L',1);
 $precio='18 agosto 2019';
$pdf->Cell(50,6,$fecha,1,0,'C',1);

 
$pdf->Ln(7);
 
//Comienzo a crear las filas de productos según la consulta mysql
 $pdf->SetFillColor(151,152,152);
 
$pdf->SetFont('Arial','B',10);
$pdf->Cell(25,6,'#OP',1,0,'C',1);
 
$pdf->Cell(50,6,'CLIENTE',1,0,'C',1);
$pdf->Cell(50,6,'PROVEEDOR',1,0,'C',1);
$pdf->Cell(25,6,'TRANSPORTE',1,0,'C',1);
$pdf->Cell(25,6,'P.ORIGEN',1,0,'C',1);
$pdf->Cell(25,6,'P.DESTINO',1,0,'C',1);
 
$pdf->Ln(7);
 

 

    $pdf->SetFillColor(255,255,255);
    $pdf->Cell(25,10,$nuevo,1,0,'C',0);
 
       $pdf->Cell(50,10,$empresa,1,0,'C',0);
        $pdf->Cell(50,10,$proveedor,1,0,'C',0);
        $pdf->Cell(25,10,$trans,1,0,'C',0);
           $pdf->Cell(25,10,$origen,1,0,'C',0);
              $pdf->Cell(25,10,$destino,1,0,'C',0);
//Muestro la iamgen dentro de la celda GetX y GetY dan las coordenadas actuales de la fila
 

 
$pdf->Ln(11);



$pdf->SetFillColor(255,255,255);
 
$pdf->SetFont('Arial','B',10);
$pdf->Cell(25,6,'Costos:',1,0,'L',1);

$pdf->Ln(7);
 $pdf->SetFillColor(151,152,152);
 
$pdf->SetFont('Arial','B',10);
$pdf->Cell(25,6,'FLETE',1,0,'C',1);
 
$pdf->Cell(50,6,'ENTREGA ADICIONAL',1,0,'C',1);
$pdf->Cell(50,6,'T. ADUANAL',1,0,'C',1);
$pdf->Cell(25,6,'SINI',1,0,'C',1);
$pdf->Cell(25,6,'SUB-TOTAL',1,0,'C',1);
 
$pdf->Ln(7);
 

 
     $total4=$flete+$entrega+$aduanal+$cancelacion;
     $total2=$flete+$entrega+$aduanal;

    $iva2= $total2*0.13;
 

     $iva = bcdiv($iva2, '1', 2);
     $total = bcdiv($total4, '1', 2);
 
    $pdf->SetFillColor(255,255,255);
    $pdf->Cell(25,10,'$'.$flete,1,0,'C',0);
 
       $pdf->Cell(50,10,'$'.$entrega,1,0,'C',1);
        $pdf->Cell(50,10,'$'.$aduanal,1,0,'C',1);
           $pdf->Cell(25,10,'$'.$cancelacion,1,0,'C',1);
            $pdf->SetFont('Arial','',10);
              $pdf->Cell(25,10,' $'.$total.'',1,0,'C',1);
                 $pdf->Ln(10);

              $pdf->SetFillColor(255,255,255);
 
$pdf->SetFont('Arial','B',10);
$pdf->Cell(125,6,'',0,0,'L',1);
 $pdf->SetFont('Arial','',10);
$pdf->Cell(25,6,'IVA (13%):',1,0,'C',1);
 $pdf->SetFont('Arial','',10);
$pdf->Cell(25,6,'  $'.$iva.'',1,0,'C',1);

              $pdf->Ln(7);

$TOTALIVA2=$total+$iva;
  $TOTALIVA = bcdiv($TOTALIVA2, '1', 2);


$pdf->SetFont('Arial','B',10);
$pdf->Cell(125,6,'',0,0,'L',1);
 $pdf->SetFont('Arial','',10);
$pdf->Cell(25,6,'TOTAL:',1,0,'C',1);
 $pdf->SetFont('Arial','',10);
$pdf->Cell(25,6,'  $'.$TOTALIVA.'',1,0,'C',1);

//DETALLE DEL FLETE
$pdf->Ln(7);

$TOTALIVA2=$total+$iva;
  $TOTALIVA = bcdiv($TOTALIVA2, '1', 2);


$pdf->SetFont('Arial','B',10);
$pdf->Cell(1,6,'',0,0,'L',1);
 $pdf->SetFont('Arial','',10);
$pdf->Cell(40,6,'FLETE INCLUYE:',1,0,'C',1);


$pdf->Ln(7);

$TOTALIVA2=$total+$iva;
  $TOTALIVA = bcdiv($TOTALIVA2, '1', 2);


$pdf->SetFont('Arial','B',10);
$pdf->Cell(1,6,'',0,0,'L',1);
 $pdf->SetFont('Arial','',10);
$pdf->Cell(180,12,''.$detalleflete.'',1,0,'C',1);
// $pdf->SetFont('Arial','',10);
//$pdf->Cell(40,6,'  $'.$TOTALIVA.'',1,0,'C',1);
//TERMINA DETALLE DEL FLETE 
             


 $pdf->Ln(25);

 

  $pdf->SetFont('Arial','',12
);
$pdf -> Cell(50,0,"f.__________________",0,200,"C");
$pdf -> Cell(190,0,"f.__________________",0,200,"C");
$pdf -> Cell(320,0,"f.__________________",0,200,"C");
//$pdf -> Cell(360,0,"f.__________________",0,200,"C");
$pdf -> ln(6);


$pdf->SetFont('Arial','',8
);
$pdf -> Cell(50,0,"Solicita",0,200,"C");
$pdf -> Cell(190,0,"Nelson Aguiluz",0,200,"C");
$pdf -> Cell(320,0,"Eduardo Campos",0,200,"C");
//$pdf -> Cell(360,0,"Lic. Eduardo Campos ",0,200,"C");
$pdf -> ln(3);
$pdf -> Cell(50,0,"Carlos Ruano",0,200,"C");



 
//Mostramos el documento pdf
$pdf->Output('F', 'logistica/SOLICITUDES DE DESPACHO/'.$origen.$guardar.'.pdf');
$pdf->Output();


//$clientes = mysqli_query($cn, $sql);
//$total = mysqli_num_rows($clientes);
$pdf -> SetFont("Arial", "", 10);
  
  
  $pdf -> ln(10);

$pdf -> Sety(-40);

$pdf -> output();
 
}else{


$color=array("#ffffff","#F0F0F0");
/*
$contador=0;
$suma=0;
foreach($carri as $k => $v){
$subto=$v['cantidad']*$v['precio'];
$suma=$suma+$subto;
$contador++;
//Creo una variable de sesion y le asigno el total a pagar
$_SESSION['ValorPagar']=$suma;
*/

//$sql = "select * from autorizar";
require("fpdf181/fpdf.php");
define('FPDF_FONTPATH','font/');
$pdf= NEW FPDF('L','mm','LETTER'); 
//$pdf ->set_Paper(array(0,0,612,396));
$pdf -> AddPage("P");
$pdf -> SetFont("Arial", "B", 20);



$pdf->Cell(500,50,$pdf->Image('logo_color_p.png',5,2,50),0,0,'C');

//$pdf -> Cell(-90,0,"TINTA PRINT EL SALVADOR",20,100,"C");

$pdf -> Cell(1000);


$pdf -> ln(02);

$pdf -> ln(10);
//$pdf -> Cell(200,0,"Telefono : 2502-0981 * 2902-9995",0,0,"C");
//$pdf -> ln(5);
//$pdf -> Cell(200,0,"Direccion: Calle san Antonio Abad, Col. Serramonte 2 #6, San salvador",0,0,"C");
$pdf -> ln(0);
//$pdf -> Cell(200,0,"Email: wwww.centrodecapacitaciones.com",0,0,"C");
$y_axis_initial = 25;
 
//Seteamos el tiupo de letra y creamos el titulo de la pagina. No es un encabezado no se repetira
$pdf->SetFont('Arial','B',12);
 
$pdf->Cell(60,6,'',0,0,'C');
$pdf->Cell(100,6,'SOLICITUD DE DESPACHO',1,0,'C');
$pdf->Cell(30,6,'# '.$n_despacho,1,0,'C');
 
$pdf->Ln(10);
 
//Creamos las celdas para los titulo de cada columna y le asignamos un fondo gris y el tipo de letra
$pdf->SetFillColor(255,255,255);
 
$pdf->SetFont('Arial','B',10);
$pdf->Cell(30,6,'Fecha:',1,0,'L',1);
 $precio='18 agosto 2019';
$pdf->Cell(50,6,$fecha,1,0,'C',1);

 
$pdf->Ln(7);
 
//Comienzo a crear las fiulas de productos según la consulta mysql
 $pdf->SetFillColor(151,152,152);
 
$pdf->SetFont('Arial','B',10);
$pdf->Cell(25,6,'#OP',1,0,'C',1);
 
$pdf->Cell(50,6,'CLIENTE',1,0,'C',1);
$pdf->Cell(50,6,'PROVEEDOR',1,0,'C',1);
$pdf->Cell(25,6,'TRANSPORTE',1,0,'C',1);
$pdf->Cell(25,6,'P.ORIGEN',1,0,'C',1);
$pdf->Cell(25,6,'P.DESTINO',1,0,'C',1);
 
$pdf->Ln(7);
 

 

    $pdf->SetFillColor(255,255,255);
    $pdf->Cell(25,10,$nuevo,1,0,'C',0);
    $pdf->Cell(50,10,$empresa,1,0,'C',0);
    $pdf->Cell(50,10,$proveedor,1,0,'C',0);
    $pdf->Cell(25,10,$capacidad." TON.",1,0,'C',0);
    $pdf->Cell(25,10,$origen,1,0,'C',0);
    $pdf->Cell(25,10,$destino,1,0,'C',0);
//Muestro la iamgen dentro de la celda GetX y GetY dan las coordenadas actuales de la fila
 

 
$pdf->Ln(11);



$pdf->SetFillColor(255,255,255);
 
$pdf->SetFont('Arial','B',10);
$pdf->Cell(25,6,'Costos:',1,0,'L',1);

$pdf->Ln(7);
 $pdf->SetFillColor(151,152,152);
 
$pdf->SetFont('Arial','B',10);
$pdf->Cell(25,6,'FLETE',1,0,'C',1);
 
$pdf->Cell(50,6,'ENTREGA ADICIONAL',1,0,'C',1);
$pdf->Cell(50,6,'T. ADUANAL',1,0,'C',1);
$pdf->Cell(25,6,'SINI',1,0,'C',1);
$pdf->Cell(25,6,'SUB-TOTAL',1,0,'L',1);


 
$pdf->Ln(7);
 

 
    $total4=$flete+$entrega+$aduanal+$cancelacion;
     $total2=$flete+$entrega+$aduanal;

    $iva2= $total2*0.13;
 

   $iva = bcdiv($iva2, '1', 2);
     $total = bcdiv($total4, '1', 2);
    $pdf->SetFillColor(255,255,255);
    $pdf->Cell(25,10,'$'.$flete,1,0,'C',0);
 
       $pdf->Cell(50,10,'$'.$entrega,1,0,'C',1);
        $pdf->Cell(50,10,'$'.$aduanal,1,0,'C',1);
           $pdf->Cell(25,10,'$'.$cancelacion,1,0,'C',1);
            $pdf->SetFont('Arial','',10);
              $pdf->Cell(25,10,' $'.$total.'',1,0,'C',1);
                 $pdf->Ln(10);

              $pdf->SetFillColor(255,255,255);
 
$pdf->SetFont('Arial','B',10);
$pdf->Cell(125,6,'',0,0,'L',1);
 $pdf->SetFont('Arial','',10);
$pdf->Cell(25,6,'IVA (13%):',1,0,'C',1);
 $pdf->SetFont('Arial','',10);
$pdf->Cell(25,6,'  $'.$iva.'',1,0,'C',1);
$pdf->Ln(7);


$TOTALIVA2=$total+$iva;
  $TOTALIVA = bcdiv($TOTALIVA2, '1', 2);


$pdf->SetFont('Arial','B',10);
$pdf->Cell(125,6,'',0,0,'L',1);
 $pdf->SetFont('Arial','',10);
$pdf->Cell(25,6,'TOTAL:',1,0,'C',1);
 $pdf->SetFont('Arial','',10);
$pdf->Cell(25,6,'  $'.$TOTALIVA.'',1,0,'C',1);

//DETALLE DEL FLETE
$pdf->Ln(7);




$pdf->SetFont('Arial','B',10);
$pdf->Cell(1,6,'',0,0,'L',1);
 $pdf->SetFont('Arial','',10);
$pdf->Cell(40,6,'FLETE INCLUYE:',1,0,'C',1);


$pdf->Ln(7);

$TOTALIVA2=$total+$iva;
  $TOTALIVA = bcdiv($TOTALIVA2, '1', 2);


$pdf->SetFont('Arial','B',10);
$pdf->Cell(1,6,'',0,0,'L',1);
 $pdf->SetFont('Arial','',10);
$pdf->Cell(180,12,''.$detalleflete.'',1,0,'C',1);
// $pdf->SetFont('Arial','',10);
//$pdf->Cell(40,6,'  $'.$TOTALIVA.'',1,0,'C',1);
//TERMINA DETALLE DEL FLETE 

              $pdf->Ln(25);

 

 $pdf->SetFont('Arial','',12
);
$pdf -> Cell(50,0,"f.__________________",0,200,"C");
$pdf -> Cell(190,0,"f.__________________",0,200,"C");
$pdf -> Cell(320,0,"f.__________________",0,200,"C");
//$pdf -> Cell(360,0,"f.__________________",0,200,"C");
$pdf -> ln(6);


$pdf->SetFont('Arial','',8
);
$pdf -> Cell(50,0,"Solicita",0,200,"C");
$pdf -> Cell(190,0,"Nelson Aguiluz",0,200,"C");
$pdf -> Cell(320,0,"Eduardo Campos",0,200,"C");
//$pdf -> Cell(360,0,"Lic. Eduardo Campos ",0,200,"C");
$pdf -> ln(3);
$pdf -> Cell(50,0,"Carlos Ruano",0,200,"C");



 
//Mostramos el documento pdf
$pdf->Output('F', 'logistica/SOLICITUDES DE DESPACHO/'.$origen.$guardar.'.pdf');
$pdf->Output();


//$clientes = mysqli_query($cn, $sql);
//$total = mysqli_num_rows($clientes);
$pdf -> SetFont("Arial", "", 10);
  
  
$pdf -> ln(10);

$pdf -> Sety(-40);

$pdf -> output();



}
  //TERMINAN PARA PDF
}





?>