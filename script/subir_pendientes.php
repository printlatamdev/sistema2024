<?php

include('../connect3.php');
include("../session.php");

// Ensure the POST request contains an 'id' and file uploads are present
if (!isset($_POST["id"]) || empty($_FILES['carta']) || empty($_FILES['manifiesto']) || empty($_FILES['duca_t'])) {
    echo "Missing parameters or files.";
    exit();
}

$id = $_POST["id"];

// Define destination directory
$destinoDir = "../foto_log/";

// Function to handle file upload
function handleFileUpload($fileKey, $destinoDir) {
    if (!isset($_FILES[$fileKey]) || $_FILES[$fileKey]['error'] !== UPLOAD_ERR_OK) {
        return null;
    }

    $fileName = $_FILES[$fileKey]['name'];
    $tempPath = $_FILES[$fileKey]['tmp_name'];
    $destPath = $destinoDir . basename($fileName);

    if (move_uploaded_file($tempPath, $destPath)) {
        return basename($fileName);
    } else {
        return null;
    }
}

// Handle file uploads
$f_carta = handleFileUpload('carta', $destinoDir);
$f_manifiesto = handleFileUpload('manifiesto', $destinoDir);
$f_duca_t = handleFileUpload('duca_t', $destinoDir);

// Prepare and execute SQL query
$query = "UPDATE logitica SET m_carga=?, carta_p=?, duca_t=? WHERE id_logistica=?";
$stmt = $mysqli->prepare($query);

if ($stmt) {
    $stmt->bind_param('ssss', $f_manifiesto, $f_carta, $f_duca_t, $id);
    $result = $stmt->execute();
    $stmt->close();

    if ($result) {
        echo '<script type="text/javascript">
            alert("Documentos subidos correctamente");
            window.location.href="../documentacion.php?id=' . urlencode($id) . '";
            </script>';
    } else {
        echo "Ha ocurrido un error al actualizar los datos.";
    }
} else {
    echo "Error en la preparación de la consulta SQL.";
}

$mysqli->close();

?>
