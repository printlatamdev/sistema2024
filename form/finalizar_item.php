<?php

session_start();
$base=$_SESSION['base'];
 //$anio=$_SESSION['year'];
    $anio=22;
$bd=$base.$anio;

$con = mysqli_connect('localhost','admin','AG784512',''.$bd.'');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,''.$bd.'');
//$con = conexion();


$si = $_POST["pliego"];
$item=$_POST['item'];
$si_orden = $_POST["si_orden"];
$nivel = $_POST["nivel"];
//echo $si."----".$item ."----".$si_orden ."----".$nivel;

$estado=0;
if ($nivel==1) {
	echo "bienvenido";
}

if ($nivel==5) {

	$res   = mysqli_query($con,"update pop_detalle SET impresion='".$estado."'  where id_detalle_orden='".$item."'");

	
	$res3   = mysqli_query($con,"select*from pop_detalle  where id_orden='".$si_orden."' and impresion=1");
    

	$cuenta = mysqli_num_rows($res3);

	if ($cuenta==0) {
	 
$res   = mysqli_query($con,"update pop SET impresion='".$estado."'  where id_orden='".$si_orden."'");

	}else{}
	
}


elseif($nivel==15){


$res   = mysqli_query($con,"update pop_detalle SET corte='".$estado."'  where id_detalle_orden='".$item."'");

	
	$res3   = mysqli_query($con,"select*from pop_detalle  where id_orden='".$si_orden."' and corte=1");
    

    

	$cuenta = mysqli_num_rows($res3);

	if ($cuenta==0) {
	 
$res   = mysqli_query($con,"update pop SET corte='".$estado."'  where id_orden='".$si_orden."'");

	}else{}
	



}



elseif($nivel==4){


$res   = mysqli_query($con,"update pop_detalle SET computo='".$estado."'  where id_detalle_orden='".$item."'");

	
	$res3   = mysqli_query($con,"select*from pop_detalle  where id_orden='".$si_orden."' and computo=1");
    

    

	$cuenta = mysqli_num_rows($res3);

	if ($cuenta==0) {
	 
$res   = mysqli_query($con,"update pop SET computo='".$estado."'  where id_orden='".$si_orden."'");

	}else{}
	



}





	





	








if($res==true){
echo'<script type="text/javascript">
    alert("Finalizado Correctamente");
    window.location.href="../lista_pop_nueva.php";
    </script>';
}else{
	echo 'error';

}
