<?php 
function getConn() {
    // Parámetros de conexión
    $host = 'localhost';
    $user = 'admin';
    $password = 'AG784512';
    $database = 'esa22';

    // Crear una nueva conexión
    $mysqli = new mysqli($host, $user, $password, $database);

    // Verificar si hubo un error en la conexión
    if ($mysqli->connect_errno) {
        // Manejo de errores
        throw new Exception("Fallo al conectar a MySQL: " . $mysqli->connect_error);
    }

    // Configurar el conjunto de caracteres a UTF-8
    $mysqli->set_charset('utf8');

    return $mysqli;
}