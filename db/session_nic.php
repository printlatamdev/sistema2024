<?php
session_start();
$id = $_SESSION['vsIdempresa'];
$base = $_SESSION['base'];
$anio = $_SESSION['year'];
$bd = $base . $anio;
$nombre = $_SESSION['vsNombre'];
$nivel = $_SESSION['nivel'];

function conexion()
{

  $server = 'localhost';
  $usuario = 'root';
  $clave = '';
  $bd = 'nica22';

  $con = mysqli_connect($server, $usuario, $clave, $bd);
  return ($con);
}

$conexion = conexion();

?>