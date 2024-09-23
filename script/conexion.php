<?php

 function conexion(){

	$server = 'localhost';
	$usuario = 'root';
	$clave = '';
	$bd = 'esa19';

    $con =mysqli_connect($server, $usuario, $clave, $bd);

		 if (!$con){

		  die('Could not connect: ' . mysqli_error());

		 }else{


		 return($con);

		}

}
?>
