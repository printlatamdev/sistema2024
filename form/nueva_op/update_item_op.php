<?php
session_start();
// Verifica si las variables de sesión están definidas
if (!isset($_SESSION['base']) || !isset($_SESSION['year'])) {
    die('Base or year not set in session');
}

// Database configuration
$base = $_SESSION['base'];
$anio = $_SESSION['year'];
$bd = $base . $anio;
$carpeta_pais = ($base == "esa") ? "EL_SALVADOR" : "NICARAGUA";

echo "Database: $bd<br>";
echo "Carpeta Pais: $carpeta_pais<br>";

// Database connection
if (!class_exists('mysqli')) {
    die('mysqli extension not installed');
}

$mysqli = new mysqli('localhost', 'admin', 'AG784512', $bd);

if ($mysqli->connect_error) {
    die('Connection failed: ' . $mysqli->connect_error);
}
echo "Database connection established.<br>";

// Get parameters
$id_detalle_orden = $_REQUEST['id_detalle_orden'] ?? null;
$aleatorio = rand(1, 1000); // Consider a more unique identifier if this is for file naming
$trabajo = $_POST['trabajo'] ?? '';
$id_equipo = $_POST['equipo'] ?? '';
$tiro = $_POST['impresion'] ?? '';
$id_material = $_POST['material'] ?? 0;
$id_laminado = $_POST['laminado'] ?? 0;
$id_rigido = $_POST['rigido'] ?? 0;
$cantidad = $_POST['cantidad'] ?? '';
$base_val = $_POST['base'] ?? ''; // Renamed to avoid conflict with $base in the session
$altura = $_POST['altura'] ?? '';
$cotizacion = $_POST['cotizacion'] ?? '';
$nota = $_POST['nota'] ?? '';
$acabados = $_POST['acabados'] ?? '';

echo "Parameters:<br>";
echo "id_detalle_orden: $id_detalle_orden<br>";
echo "trabajo: $trabajo<br>";
echo "id_equipo: $id_equipo<br>";
echo "tiro: $tiro<br>";
echo "id_material: $id_material<br>";
echo "id_laminado: $id_laminado<br>";
echo "id_rigido: $id_rigido<br>";
echo "cantidad: $cantidad<br>";
echo "base_val: $base_val<br>";
echo "altura: $altura<br>";
echo "cotizacion: $cotizacion<br>";
echo "nota: $nota<br>";
echo "acabados: $acabados<br>";

// Fetching equipment name
$stmt = $mysqli->prepare("SELECT nombre FROM equipo WHERE id_equipo = ?");
if (!$stmt) {
    die('Prepare failed: ' . $mysqli->error);
}
$stmt->bind_param('i', $id_equipo);
if (!$stmt->execute()) {
    die('Execute failed: ' . $stmt->error);
}
$equipo = $stmt->get_result()->fetch_assoc()['nombre'] ?? '';
echo "Equipment: $equipo<br>";

// Function to fetch material type
function fetchMaterialType($mysqli, $id_material)
{
    if ($id_material == 0) return "Ninguno";
    $stmt = $mysqli->prepare("SELECT tipo FROM material WHERE id = ?");
    if (!$stmt) {
        die('Prepare failed: ' . $mysqli->error);
    }
    $stmt->bind_param('i', $id_material);
    if (!$stmt->execute()) {
        die('Execute failed: ' . $stmt->error);
    }
    return $stmt->get_result()->fetch_assoc()['tipo'] ?? '';
}

$material = fetchMaterialType($mysqli, $id_material);
$rigido = fetchMaterialType($mysqli, $id_rigido);
$laminado = fetchMaterialType($mysqli, $id_laminado);

echo "Material: $material<br>";
echo "Rígido: $rigido<br>";
echo "Laminado: $laminado<br>";

// Fetch order ID
$stmt = $mysqli->prepare("SELECT id_orden FROM orden_detalle WHERE id_detalle_orden = ?");
if (!$stmt) {
    die('Prepare failed: ' . $mysqli->error);
}
$stmt->bind_param('i', $id_detalle_orden);
if (!$stmt->execute()) {
    die('Execute failed: ' . $stmt->error);
}
$id_orden = $stmt->get_result()->fetch_assoc()['id_orden'] ?? '';
echo "Order ID: $id_orden<br>";

// Fetch order details
$stmt = $mysqli->prepare("SELECT id_empresa, empresa FROM orden WHERE id_orden = ?");
if (!$stmt) {
    die('Prepare failed: ' . $mysqli->error);
}
$stmt->bind_param('i', $id_orden);
if (!$stmt->execute()) {
    die('Execute failed: ' . $stmt->error);
}
$row = $stmt->get_result()->fetch_assoc();
$id_empresa = $row['id_empresa'] ?? '';
$empresa = $row['empresa'] ?? '';
echo "Empresa ID: $id_empresa<br>";
echo "Empresa: $empresa<br>";

// Handle file upload
$arte = "arteop_update_" . $id_orden . "_" . $aleatorio . ".jpg";
$dir_destino = "../../ORDENES_OP/COLOR/" . $carpeta_pais . "/" . $id_orden . "/ARTES/";
$destino = $dir_destino . $arte;

// Verifica si el directorio existe, si no, créalo
if (!is_dir($dir_destino)) {
    if (!mkdir($dir_destino, 0777, true)) {
        die('Failed to create directory: ' . $dir_destino);
    }
    echo "Directory created: $dir_destino<br>";
}

echo "File destination: $destino<br>";

if (move_uploaded_file($_FILES['artes']['tmp_name'], $destino)) {
    echo "File uploaded successfully.<br>";
    // Update the database
    $stmt = $mysqli->prepare("
        UPDATE orden_detalle
        SET cantidad = ?, base = ?, altura = ?, trabajo = ?, cot = ?, id_equipo = ?, equipo = ?, 
            id_material = ?, material = ?, id_rigido = ?, rigido = ?, id_laminado = ?, laminado = ?, 
            tiro = ?, detalle = ?, arte = ?, acabado = ?
        WHERE id_detalle_orden = ? 
    ");
    if (!$stmt) {
        die('Prepare failed: ' . $mysqli->error);
    }
    $stmt->bind_param(
        'ssssiiiiiisssssii',
        $cantidad,
        $base_val,
        $altura,
        $trabajo,
        $cotizacion,
        $id_equipo,
        $equipo,
        $id_material,
        $material,
        $id_rigido,
        $rigido,
        $id_laminado,
        $laminado,
        $tiro,
        $nota,
        $arte,
        $acabados,
        $id_detalle_orden
    );
    if (!$stmt->execute()) {
        die('Execute failed: ' . $stmt->error);
    }

    echo "Database updated.<br>";

    // Log the update
    $stmt = $mysqli->prepare("
        INSERT INTO log (usuario, accion, detalle, fecha)
        VALUES (?, 'Actualizó arte', ?, NOW())
    ");
    if (!$stmt) {
        die('Prepare failed: ' . $mysqli->error);
    }
    $usuario = $_SESSION['user'] ?? 'Unknown';
    $detalle = "Actualizó arte de orden $id_orden detalle $id_detalle_orden";
    $stmt->bind_param('ss', $usuario, $detalle);
    if (!$stmt->execute()) {
        die('Execute failed: ' . $stmt->error);
    }

    echo "Log entry added.<br>";
} else {
    echo "Failed to upload file.<br>";
}

$mysqli->close();
?>
