<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

 function conexion2(){

	$server = 'localhost';
	$usuario = 'root';
	$clave = '';
	$bd = "nica22";

    $con =mysqli_connect($server, $usuario, $clave, $bd);

		 if (!$con){

		  die('no conecta amigo ' . mysqli_error());

		 }else{


		 return($con);

		}

}
?>
