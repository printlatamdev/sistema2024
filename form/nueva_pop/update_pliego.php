<?php

// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

// Conexión a la base de datos
session_start();
$base = $_SESSION['base'];
$anio = '22';
$bd = $base . $anio;
$carpeta_pais = ($base == "esa") ? "EL_SALVADOR" : "NICARAGUA";

$conexion = mysqli_connect('localhost', 'admin', 'AG784512', $bd);
if (!$conexion) {
    die('Could not connect: ' . mysqli_connect_error());
}

mysqli_select_db($conexion, $bd);

$host = "localhost";
$database = $bd;
$username = "admin";
$password = "AG784512";

$id_detalle_pliego = $_REQUEST['id_detalle_pliego'];
$id_detalle = $_POST['id_detalle'];
$id_orden = $_POST['id_orden'];
$tipo_pliego = $_POST['tipo_pliego'];
$id_material = $_POST['material'];
$id_equipo = $_POST['equipo'];
$impresion = $_POST['impresion'];
$base = $_POST['base'];
$altura = $_POST['altura'];
$cantidad = $_POST['cantidad'];
$nota = $_POST['nota'];

$aleatorio = rand(1, 1000);
$pliego = "pliegos_update_" . $id_orden . "_" . $aleatorio . ".jpg";
$ruta = $_FILES['pliego']['tmp_name'];
$destino = "../../ORDENES_POP/" . $carpeta_pais . "/ID_POP_" . $id_orden . "/ARTES/" . $pliego;

if (!move_uploaded_file($ruta, $destino)) {
    die('Error al subir el archivo: ' . $_FILES['pliego']['error']);
}

$mysqli = new mysqli($host, $username, $password, $database);
if ($mysqli->connect_error) {
    die('Connection failed: ' . $mysqli->connect_error);
}

// Obtener datos para actualización
$pop = $mysqli->query("SELECT id_empresa, empresa FROM pop WHERE id_orden='$id_orden'");
if (!$pop) {
    die('Error en la consulta pop: ' . $mysqli->error);
}
$pop_row = $pop->fetch_assoc();
$id_empresa = $pop_row['id_empresa'];
$empresa = $pop_row['empresa'];

$equipos = $mysqli->query("SELECT nombre FROM equipo WHERE id_equipo='$id_equipo'");
if (!$equipos) {
    die('Error en la consulta equipos: ' . $mysqli->error);
}
$equipo_row = $equipos->fetch_assoc();
$n_equipo = $equipo_row['nombre'];

$material = $mysqli->query("SELECT tipo FROM material WHERE id='$id_material'");
if (!$material) {
    die('Error en la consulta material: ' . $mysqli->error);
}
$material_row = $material->fetch_assoc();
$n_material = $material_row['tipo'];

// Preparar la consulta SQL para actualización
$update_query = $mysqli->prepare("
    UPDATE pop_pliego SET
        id_orden = ?, id_detalle = ?, id_empresa = ?, empresa = ?, cantidad = ?, base = ?, altura = ?,
        id_equipo = ?, equipo = ?, id_material = ?, material = ?, detalle = ?, arte = ?, tiro = ?, estado = ?, pliego = ?
    WHERE id_detalle_pliego = ?
");

if (!$update_query) {
    die('Error en la preparación de la consulta: ' . $mysqli->error);
}

$estado = 1; // Asegúrate de que el estado se use correctamente en tu base de datos

// Se deben pasar 17 parámetros en total
$update_query->bind_param(
    "sssssssssssssssss", // 17 parámetros, todos como strings
    $id_orden, $id_detalle, $id_empresa, $empresa, $cantidad, $base, $altura, $id_equipo, 
    $n_equipo, $id_material, $n_material, $nota, $pliego, $impresion, $estado, $tipo_pliego, $id_detalle_pliego
);

if ($update_query->execute()) {
    // echo '1';
    echo '<script type="text/javascript">
            window.location.href="../../form4.php?id=' . $id_orden . '&&modificado=01";
          </script>';
} else {
    // echo '2';

    echo '<script type="text/javascript">
            window.location.href="../../form4.php?id=' . $id_orden . '&&modificado=0";
          </script>';
    die('Error en la ejecución de la consulta: ' . $update_query->error);
}

$update_query->close();
$mysqli->close();
?>
