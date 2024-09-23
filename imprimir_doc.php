<?php
 //include("connect.php");

 $id       = $_GET["id"];
 $option  = $_GET["option"];

  include("connect.php");
   $conexion = conexion();

     $consulta = mysqli_query($conexion,"  select t1.id_logistica, t1.id_orden, t1.f_empaque, t1.p_vehiculo, t1.n_motorista, t1.destino, t1.status, t1.f_salida, t1.f_llegada,
   t1.m_carga, t1.carta_p, t1.factura, t1.duca_f, t1.duca_t, t1.nota_envio_cd, t1.orden_compra,t1.nota_envio, t1.fo_entrega, t1.estado,      t2.id_orden, t2.id_empresa, t2.empresa, t2.id_contacto, t2.contacto, t3.nombre, t3.celular, t3.email, t4.id_marca, t4.marca from logitica t1 inner join orden t2 on t1.id_orden=t2.id_orden inner join contacto t3 on t2.id_contacto=t3.id_contacto inner JOIN pop_marca t4 on t1.id_marca=t4.id_marca where t1.id_orden='".$id."'
 ");
require("fpdf181/fpdf.php");

$pdf= NEW FPDF('L','mm','LETTER'); 
$pdf -> AddPage("P");
$pdf -> SetFont("Arial", "B", 10);

while ($row = mysqli_fetch_array($consulta)){



	$foto1=$row[9];
	$foto2=$row[10];
	$foto3=$row[11];
	$foto4=$row[12];
	$foto5=$row[13];
	$foto6=$row[14];
	$foto7=$row[15];
	$foto8=$row[16];
	



//$pdf->Cell(1000,50,$pdf->Image('../images/encabezado.png',0,0,220),0,0,'C');
$pdf -> ln(02);
$pdf -> Cell(200,0,"DOCUMENTACION DE ENVIO",0,0,"C");
$pdf -> ln(10);
$pdf -> ln(5);
if ($option=="Ver Duca_f") {
	$pdf -> Cell(200,0,"Duca_f",0,0,"C");

	
$pdf->Cell(5000,500,$pdf->Image('../sistema/artes_esa17/'.$foto4,40,40,150),0,0,'C');
	# code...
}
elseif ($option=="Ver Factura") {
	$pdf -> Cell(200,0,"Factura",0,0,"C");
	$pdf->Cell(5000,500,$pdf->Image('../sistema/artes_esa17/'.$foto3,40,40,150),0,0,'C');
	# code...
}
elseif ($option=="Ver nota_envio_cd") {
	$pdf -> Cell(200,0,"Nota_envio_cd",0,0,"C");
	$pdf->Cell(5000,500,$pdf->Image('../sistema/artes_esa17/'.$foto6,40,40,150),0,0,'C');
	# code...
}
elseif ($option=="Ver orden_compra") {
	$pdf -> Cell(200,0,"Orden compra",0,0,"C");
	$pdf->Cell(5000,500,$pdf->Image('../sistema/artes_esa17/'.$foto7,40,40,150),0,0,'C');
	# code...
}


elseif ($option=="Ver Carta_porte") {
	$pdf -> Cell(200,0,"Orden compra",0,0,"C");
	$pdf->Cell(5000,500,$pdf->Image('../sistema/artes_esa17/'.$foto2,40,40,150),0,0,'C');
	# code...
}


elseif ($option=="Ver Manifiesto") {
	$pdf -> Cell(200,0,"Orden compra",0,0,"C");
	$pdf->Cell(5000,500,$pdf->Image('../sistema/artes_esa17/'.$foto1,40,40,150),0,0,'C');
	# code...
}


elseif ($option=="Ver Duca_t") {
	$pdf -> Cell(200,0,"Orden compra",0,0,"C");
	$pdf->Cell(5000,500,$pdf->Image('../sistema/artes_esa17/'.$foto5,40,40,150),0,0,'C');
	# code...
}





//$pdf -> Cell(190,15,"Cantidad de productos: ".$total,0,0,"R");
$pdf -> output();


}









?>