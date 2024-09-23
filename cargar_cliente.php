<?php 
require_once 'connect.php';

function getCliente() {
    // Obtener la conexión
    $mysqli = getConn();
    
    // Consulta para obtener clientes
    $query = 'SELECT id_empresa, nombre FROM empresa';
    $result = $mysqli->query($query);

    // Generar opciones del select
    $options = '<option value="0">SELECCIONE EL CLIENTE</option>';
    while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
        $options .= "<option value='{$row['id_empresa']}'>{$row['nombre']}</option>";
    }
    
    // Cerrar la conexión
    $mysqli->close();

    return $options;
}

// Mostrar las opciones de clientes
echo getCliente();
?>
