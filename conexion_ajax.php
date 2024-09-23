<?php

// Verificar si las variables de sesión están definidas
if (!isset($_SESSION['base']) || !isset($_SESSION['year'])) {
    die("Error: Las variables de sesión no están definidas.");
}

// Obtener información de sesión
$base = $_SESSION['base'];
$anio = $_SESSION['year'];
$bd = $base . $anio;

// Configuración de la base de datos
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', $bd);

try {
    // Conectar a la base de datos
    $con = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

    // Verificar la conexión
    if (mysqli_connect_errno()) {
        throw new Exception("Conexión falló: " . mysqli_connect_error());
    }

    // Set character set to utf8 (opcional, pero recomendado)
    mysqli_set_charset($con, "utf8");

} catch (Exception $e) {
    // Manejar la excepción y detener la ejecución del script
    die($e->getMessage());
}