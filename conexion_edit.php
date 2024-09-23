<?php
// session_start();

function conexion()
{
	$base = $_SESSION['base'];
	$anio = $_SESSION['year'];
	$bd = $base . $anio;

	$server = "localhost";
	$server = 'localhost';
	$usuario = 'root';
	$clave = '';
	$base = $bd;

	$con = mysqli_connect($server, $usuario, $clave, $base);

	if (!$con) {

		die('no conecta amigo ' . mysqli_error());

	} else {


		return ($con);

	}

}
?>