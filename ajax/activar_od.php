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


$si = $_REQUEST["id"];



$estado=1;



	$res   = mysqli_query($con,"update pop_proyecto SET estado='".$estado."'  where id_proyecto='".$si."'");







	





	








if($res==true){
echo'<script type="text/javascript">
    alert("Activado Correctamente");
    window.location.href="../ordenes_diseno_activa.php";
    </script>';
}else{
	echo 'error';

}







?>