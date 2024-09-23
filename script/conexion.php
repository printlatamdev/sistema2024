<?php

 function conexion(){

	$server = 'localhost';
	$usuario = 'admin';
	$clave = 'AG784512';
	$bd = 'esa19';

    $con =mysqli_connect($server, $usuario, $clave, $bd);

		 if (!$con){

		  die('Could not connect: ' . mysqli_error());

		 }else{


		 return($con);

		}

}
?>
