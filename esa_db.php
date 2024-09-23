<?php
// session_start();

// Configuración de base de datos
$base = 'esa';
$anio = '22';
$bd = $base . $anio;

$host = 'localhost';
$username = 'admin';
$password = 'AG784512';

// Crear una instancia de mysqli
$mysqli = new mysqli($host, $username, $password, $bd);

// Verificar la conexión
if ($mysqli->connect_error) {
    die('No se puede conectar a MySQL: (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
}

// Tu lógica aquí

?>
