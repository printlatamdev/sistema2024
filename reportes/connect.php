<?php
session_start();
// $base =  $_SESSION['base'];
$base =  'esa';
$anio = 22;
//$anio=$_SESSION['year'];
$bd = $base . $anio;
$host = "localhost";

$database = $bd;

$username = "admin";

$password = "AG784512";

$mysqli = new mysqli($host, $username, $password, $database);
if ($mysqli->connect_errno) {
	echo "No se puede conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

?>