<?php 
session_start();
$base =  $_SESSION['base'];
// $anio = 22;
$anio=$_SESSION['year'];
$bd = $base . $anio;
$host = "localhost";

echo $bd;

?>