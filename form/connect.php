<?php
session_start();
    $base=$_SESSION['base'];
	$anio='22';
	$bd=$base.$anio;

 function conexion(){

	$server = 'localhost';
	$usuario = 'admin';
	$clave = 'AG784512';
	$bd = "nica21";

    $con =mysqli_connect($server, $usuario, $clave, $bd);

		 if (!$con){

		  die('no conecta amigo ' . mysqli_error());

		 }else{


		 return($con);

		}

}
?>
