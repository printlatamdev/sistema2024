<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
$id = $_SESSION['vsIdempresa'];
$base = $_SESSION['base'];
$anio = $_SESSION['year'];
$bd = $base . $anio;
$nombre = $_SESSION['vsNombre'];
$nivel = $_SESSION['nivel'];

require("connectin.php");

?>