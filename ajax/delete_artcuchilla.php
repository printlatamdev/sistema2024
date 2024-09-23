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

		$si = $_REQUEST["id"];

		$estado=0;

		$res   = mysqli_query($con,"update articulo_cuchilla SET estado='".$estado."'  where id_articulo='".$si."'");

			if($res==true){
				echo'<script type="text/javascript">
				    alert("Finalizado Correctamente");
				    window.location.href="../cuchillas.php";
				    </script>';
			}else{
				echo 'error';
			}
?>