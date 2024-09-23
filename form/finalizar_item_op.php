<?php

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
//$con = conexion();


$si = $_POST["si"];

$si_orden = $_POST["si_orden"];
$nivel = $_POST["nivel"];

$estado=0;

if ($nivel==5) {

	$res   = mysqli_query($con,"update orden_detalle SET impresion='".$estado."'  where id_detalle_orden='".$si."'");

	$res2   = mysqli_query($con,"select*from orden_detalle  where id_orden='".$si_orden."' and impresion='1'");


	$cuenta = mysqli_num_rows($res2);

	if ($cuenta==0) {
		$cuenta=0;
	 
$res   = mysqli_query($con,"update orden SET impresion='".$cuenta."'  where id_orden='".$si_orden."'");

	}else{}
	
}


elseif($nivel==4){


$res   = mysqli_query($con,"update orden_detalle SET computo='".$estado."'  where id_detalle_orden='".$si."'");

	$res2   = mysqli_query($con,"select*from orden_detalle  where id_orden='".$si_orden."' and computo='1'");


	$cuenta = mysqli_num_rows($res2);

	if ($cuenta==0) {
	 
$res   = mysqli_query($con,"update orden SET computo='".$estado."'  where id_orden='".$si_orden."'");

	}else{}
	



}




	





	








if($res==true){
echo'<script type="text/javascript">
    alert("Finalizado Correctamente");
    window.location.href="../lista_po_nueva.php";
    </script>';
}else{
	echo 'error';

}







?>