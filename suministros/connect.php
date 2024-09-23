<?php
	// session_start();
    $base=$_SESSION['base'];
    $anio=$_SESSION['year'];

	$bd=$base.$anio;
	$host="localhost";

	$database=$bd;

	$username="root";

	$password="";

	$mysqli = new mysqli($host, $username, $password, $database);
	if ($mysqli->connect_errno) {
	    echo "No se puede conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
	}
?>