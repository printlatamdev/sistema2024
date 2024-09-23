<?php
// Mostrar todos los errores
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Asegúrate de que la sesión esté iniciada
session_start();

// Verifica si las variables de sesión 'base' y 'year' están definidas
if (!isset($_SESSION['base']) || !isset($_SESSION['year'])) {
    die('Las variables de sesión "base" o "year" no están definidas.');
}

// Obtén la base de datos y el año de la sesión
$base = $_SESSION['base'];
$anio = $_SESSION['year'];
$bd = $base . $anio;

// Define la función getConn con un parámetro para la base de datos
function getConn($base, $anio) {
    // Define la conexión a la base de datos dependiendo del valor de $base
    $dbName = ($base === 'esa') ? 'esa' . $anio : 'nica' . $anio;

    // Conecta a la base de datos
    $mysqli = mysqli_connect('localhost', 'admin', 'AG784512', $dbName);

    // Verifica si la conexión fue exitosa
    if (!$mysqli) {
        return false; // Fallo de conexión
    }

    // Configura el conjunto de caracteres
    $mysqli->set_charset('utf8');

    return $mysqli;
}

// Utiliza la función getConn con los parámetros de la sesión
$mysqli = getConn($base, $anio);

// if ($mysqli) {
//     echo "Conexión exitosa a la base de datos: " . $bd;
// } else {
//     echo "Error de conexión a la base de datos: " . $bd;
// }
