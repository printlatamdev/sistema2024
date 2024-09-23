<?php
session_start();

// Validate and sanitize session variables
if (!isset($_SESSION['base'])) {
    die('Base de datos no especificada.');
}

$base = $_SESSION['base'];
$anio = '22';
$bd = $base . $anio;

// Establish database connection using mysqli
$conexion = new mysqli('localhost', 'root', '', $bd);

// Check connection
if ($conexion->connect_error) {
    die('Error de conexión: ' . $conexion->connect_error);
}

// Sanitize and validate input parameters
$id_orden = isset($_REQUEST['id']) ? intval($_REQUEST['id']) : 0;
$id_detalle = isset($_REQUEST['id_detalle']) ? intval($_REQUEST['id_detalle']) : 0;
$id_detalle_pliego = isset($_REQUEST['id_detalle_pliego']) ? intval($_REQUEST['id_detalle_pliego']) : 0;

if ($id_detalle_pliego <= 0) {
    die('ID de detalle de pliego inválido.');
}

// Delete the record from the `pop_pliego` table
$stmt = $conexion->prepare("DELETE FROM pop_pliego WHERE id_detalle_pliego = ?");
if ($stmt) {
    $stmt->bind_param('i', $id_detalle_pliego);
    $result = $stmt->execute();
    $stmt->close();

    if ($result) {
        echo '<script type="text/javascript">
            window.location.href="../../../sistema2024/form4.php?id=' . htmlspecialchars($id_orden) . '&&delete=01";
        </script>';
    } else {
        echo '<script type="text/javascript">
            window.location.href="../../../sistema2024/form4.php?id=' . htmlspecialchars($id_orden) . '";
        </script>';
    }
} else {
    die('Error en la preparación de la consulta: ' . $conexion->error);
}

// Close the database connection
$conexion->close();
?>
