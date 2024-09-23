<?php 
require_once 'conexion.php';

function getListasRep() {
    // Establish a connection to the database
    $mysqli = getConn();

    // Query to select all companies
    $query = 'SELECT * FROM empresa';
    $result = $mysqli->query($query);

    if (!$result) {
        die('Query Error: ' . $mysqli->error);
    }

    // Initialize the dropdown options with a default option
    $listas = '<option value="0">Elige una opción</option>';

    // Fetch the rows and build the dropdown options
    while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
        $id_empresa = htmlspecialchars($row['id_empresa'], ENT_QUOTES, 'UTF-8');
        $nombre = htmlspecialchars($row['nombre'], ENT_QUOTES, 'UTF-8');
        $listas .= "<option value='$id_empresa'>$nombre</option>";
    }

    // Close the result set
    $result->free();

    // Close the database connection
    $mysqli->close();

    return $listas;
}

echo getListasRep();
