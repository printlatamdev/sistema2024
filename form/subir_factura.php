<?


//echo $id.$doc;


session_start();
    $base=$_SESSION['base'];
 //$anio=$_SESSION['year'];
    $anio=22;
$bd=$base.$anio;

$con = mysqli_connect('localhost','root','',''.$bd.'');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,''.$bd.'');


$tipo=$_REQUEST['tipo'];
$id=$_REQUEST['id'];
$origen=$_REQUEST['origen'];
//$doc=$_REQUEST['factura'];
   
      $d=rand(1,500);
     // echo $d ;
  

$factura=$_FILES['factura']['name'];
$facturas='PO_'.$tipo.'_'.$id.'_'.$d.'_'.$factura;

$ruta=$_FILES['factura']['tmp_name'];
$extension=$_FILES['factura']['type'];

//<img src="../../ORDENES_POP/313/ARTES_313/pliego_488_90.jpg">

if ($base=="esa") {
 $pais="EL_SALVADOR";
}elseif($base=="nica"){
  $pais="NICARAGUA";
}
$destino="../ORDENES_OP/COLOR/".$pais."/".$id."/DOC/".$facturas;



copy($ruta, $destino);


if ($tipo=="factura") {
$res= mysqli_query($con,"INSERT INTO facturacion_ccf (id_orden,ccfiscal) values ('".$id."','".$facturas."')");
}
elseif ($tipo=="pago") {
	$res= mysqli_query($con,"INSERT INTO facturacion_cpago (id_orden,cpago) values ('".$id."','".$facturas."')");
}
else{

	$res= mysqli_query($con,"INSERT INTO facturacion_centrega (id_orden,centrega) values ('".$id."','".$facturas."')");
}
  



if ($origen=="fin") {
	if($res==true){


echo'<script type="text/javascript">
    alert("Documentos subidos correctamente");
    window.location.href="../po_fin_iframe.php";
    </script>';

}
else{
	echo "ha ocurrido un error";

	echo $id.$tipo.$facturas;



}
}else{
   if($res==true){


echo'<script type="text/javascript">
    alert("Documentos subidos correctamente");
    window.location.href="../lista_po_nueva.php";
    </script>';

}
else{
	echo "ha ocurrido un error";

	echo $id.$tipo.$facturas;



}
}







?>