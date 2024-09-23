<?php

session_start();
    $base=$_SESSION['base'];
 //$anio=$_SESSION['year'];
    $anio='22';
$bd=$base.$anio;

$con = mysqli_connect('localhost','admin','AG784512','esa22');
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

	$res   = mysqli_query($con,"update campos_detalle SET impresion='".$estado."'  where id_detalle_orden='".$si."'");

	$res2   = mysqli_query($con,"select*from campos_detalle  where id_orden='".$si_orden."' and impresion='1'");


	$cuenta = mysqli_num_rows($res2);

	if ($cuenta==0) {
	 
$res   = mysqli_query($con,"update campos SET impresion='".$estado."'  where id_orden='".$si_orden."'");

	}else{}
	
}


elseif($nivel==4){


$res   = mysqli_query($con,"update campos_detalle SET computo='".$estado."'  where id_detalle_orden='".$si."'");

	$res2   = mysqli_query($con,"select*from campos_detalle  where id_orden='".$si_orden."' and computo='1'");


	$cuenta = mysqli_num_rows($res2);

	if ($cuenta==0) {
	 
$res   = mysqli_query($con,"update campos SET computo='".$estado."'  where id_orden='".$si_orden."'");

	}else{}
	



}




	





	








if($res==true){
echo'<script type="text/javascript">
    alert("Finalizado Correctamente");
    window.location.href="../lista_campos_nueva.php";
    </script>';
}else{
	echo 'error';

}







?>