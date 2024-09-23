<?php
require_once 'conexion.php';

// Start the session if not already started
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Use the 
// variables to get the connection
$base = $_SESSION['base'];
$anio = $_SESSION['year'];
$mysqli = getConn($base, $anio);
$details = $_REQUEST['id_detalle_orden'];

// // Check the connection
// if ($mysqli->connect_error) {
//     echo "Error de conexión: " . $mysqli->connect_error;
// } else {
//     echo "Conexión exitosa";
// }

// Now you can use $mysqli to interact with your database
// Example: Fetching clients
function getCliente($mysqli) {
    $query = 'SELECT id_empresa, nombre FROM empresa';
    
    if ($stmt = $mysqli->prepare($query)) {
        $stmt->execute();
        $result = $stmt->get_result();
        
        $options = '<option value="">SELECCIONE EL CLIENTE</option>';
        while ($row = $result->fetch_assoc()) {
            $id_empresa = htmlspecialchars($row['id_empresa'], ENT_QUOTES, 'UTF-8');
            $nombre = htmlspecialchars($row['nombre'], ENT_QUOTES, 'UTF-8');
            $options .= "<option value='{$id_empresa}' style='width: 200px;'>{$nombre}</option>";
        }
        
        $stmt->close();
    } else {
        $options = '<option value="">Error al preparar la consulta</option>';
    }
    
    return $options;
}

// Output the options
echo getCliente($mysqli);
