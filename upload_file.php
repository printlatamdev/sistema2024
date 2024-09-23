<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Manually include PhpSpreadsheet files (adjust paths as needed)
require './PhpSpreadsheet/src/PhpSpreadsheet/IOFactory.php';
require './PhpSpreadsheet/src/PhpSpreadsheet/Spreadsheet.php';

use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;

// Set response content type as JSON
header('Content-Type: application/json');

// Check if a file has been uploaded without errors
if (isset($_FILES['file']) && $_FILES['file']['error'] == UPLOAD_ERR_OK) {
    $fileTmpPath = $_FILES['file']['tmp_name'];

    // Check if the file exists on the server
    if (!file_exists($fileTmpPath)) {
        echo json_encode(['message' => 'El archivo no existe en el servidor.']);
        exit;
    }

    try {
        // Load the Excel file
        $spreadsheet = IOFactory::load($fileTmpPath);
        $worksheet = $spreadsheet->getActiveSheet();
        $data = $worksheet->toArray(); // Convert to array

        // Return the file content as JSON
        echo json_encode(['message' => 'Archivo cargado exitosamente.', 'data' => $data]);
    } catch (\PhpOffice\PhpSpreadsheet\Reader\Exception $e) {
        echo json_encode(['message' => 'Error al cargar el archivo Excel: ' . $e->getMessage()]);
    } catch (Exception $e) {
        echo json_encode(['message' => 'Error al procesar el archivo: ' . $e->getMessage()]);
    }
} else {
    echo json_encode(['message' => 'No se cargó ningún archivo o hubo un error.']);
}
