<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();

include("suministros/connect.php");

// echo "1. Conexión establecida correctamente.<br>";

// Limpiar y normalizar el nombre
$nombre = $_POST['nombre'] ?? '';
$nombre = str_replace([".", ",", "-"], "", $nombre);

// echo "2. Nombre procesado: $nombre<br>";

// Verificar si el nombre ya existe en la base de datos
$stmt = $mysqli->prepare("SELECT COUNT(*) FROM material_tipo WHERE tipo = ?");
if ($stmt === false) {
    die("Error en la preparación de la consulta SELECT: " . $mysqli->error);
}
$stmt->bind_param("s", $nombre);
$stmt->execute();
$stmt->bind_result($rowcount);
$stmt->fetch();
$stmt->close();

// echo "3. Número de registros con el nombre '$nombre': $rowcount<br>";

if ($rowcount == 0) {
    // echo "4. No existe el tipo de material. Procediendo a la inserción.<br>";

    // Insertar nuevo tipo de material
    $stmt = $mysqli->prepare("INSERT INTO `material_tipo` (`tipo`, `estado`) VALUES (?, '1')");
    if ($stmt === false) {
        die("Error en la preparación de la consulta INSERT: " . $mysqli->error);
    }
    $stmt->bind_param("s", $nombre);
    $stmt->execute();
    $num = $stmt->affected_rows;
    $stmt->close();

    // echo "5. Resultado de la inserción: $num filas afectadas.<br>";

    if ($num == 1) {
        // echo "6. Inserción exitosa. Redirigiendo...<br>";
        $mysqli->close();
        echo "<script>window.parent.location = 'suministros.ingreso.nuevo2.php';</script>";
        exit;
    } else {
        // echo "7. Fallo en la inserción. No se afectó ninguna fila.<br>";
        $mysqli->close();
        echo "<script>window.parent.location = 'suministros.ingreso.nuevo.php?error=" . base64_encode("Ha fallado el ingreso del tipo de material. Inténtelo de nuevo.") . "';</script>";
        exit;
    }
} else {
    // echo "8. El tipo de material ya existe en la base de datos.<br>";
    $mysqli->close();
    echo "<script>window.parent.location = 'suministros.ingreso.nuevo.php?error=" . base64_encode("El tipo de material ya existe.") . "';</script>";
    exit;
}
?>
