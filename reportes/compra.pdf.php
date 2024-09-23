<?php
error_reporting(E_ALL); 
ini_set("display_errors", 1);

session_start();

// Check if 'id' is provided in the request
if (!isset($_REQUEST['id'])) {
    die("Missing 'id' parameter.");
}

$id = trim($_REQUEST['id']);
$fecha = date("Y_m_d");

// Database connection
include('../connectin.php');

// Fetch company name
$query = "SELECT empresa FROM compra WHERE id_compra=?";
$stmt = $mysqli->prepare($query);
$stmt->bind_param("s", $id);
$stmt->execute();
$stmt->bind_result($nom_empresa);
$stmt->fetch();
$stmt->close();

if (!$nom_empresa) {
    die("No company name found for the given ID.");
}

// Generate file name
$n = strtolower($nom_empresa);
$cliente = str_replace(" ", "_", $n);
$name = "{$cliente}_{$id}_{$fecha}.pdf";

// Update database with the generated PDF name
$update_query = "UPDATE compra SET archivo=? WHERE id_compra=?";
$stmt = $mysqli->prepare($update_query);
$stmt->bind_param("ss", $name, $id);
if (!$stmt->execute()) {
    die("Database update failed: " . $mysqli->error);
}
$stmt->close();

// Initialize Dompdf
require_once '../dompdf/autoload.inc.php';// use Dompdf\Adapter\CPDF;

use Dompdf\Dompdf;

$dompdf = new Dompdf();
$dompdf->setPaper([0, 0, 612, 396]); // Custom paper size

// Construct URL for fetching the PDF content
$uri = $_SERVER['SERVER_NAME'] . '/' . explode("/", $_SERVER['REQUEST_URI'])[1];
$iva = $_REQUEST['iva'] ?? null;
$ir = isset($_REQUEST['ir']) ? '1' : '0';
$moneda = $_REQUEST['moneda'] ?? null;

if ($_SESSION['base'] == 'esa') {
    $file_url = "http://$uri/reportes/compra.pdf.normal13.php?id=$id&bss=" . $_SESSION['base'] . "&bs=" . $_SESSION['base'] . $_SESSION['year'] . "&iva=" . $iva;
    // echo $uri;
} else {
    $file_url = "http://192.168.0.3/sistema2023/reportes/compra.pdf.normal15.php?id=$id&bss=" . $_SESSION['base'] . "&bs=" . $_SESSION['base'] . $_SESSION['year'] . "&moneda=" . $moneda . "&iva=" . $iva . "&ir=" . $ir;
}

// Fetch content using cURL
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $file_url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1); // Follow redirects if necessary
$file = curl_exec($ch);

if ($file === false) {
    die("Failed to fetch file content from URL: $file_url. cURL error: " . curl_error($ch));
}

curl_close($ch);

// Load HTML into Dompdf
$dompdf->loadHtml($file);
$dompdf->render();
$pdf = $dompdf->output();

// Define the path to save the PDF
$save_path = "ordenes_compra_" . $_SESSION['base'] . $_SESSION['year'];
if (!file_exists($save_path)) {
    if (!mkdir($save_path, 0777, true) && !is_dir($save_path)) {
        die("Failed to create directories: $save_path");
    }
}

$file_path = "{$save_path}/$name";
if (file_put_contents($file_path, $pdf) === false) {
    die("Failed to save PDF to file: $file_path");
}

// Stream the PDF to the browser
$dompdf->stream($name, ['Attachment' => 1]);

// Close the database connection
$mysqli->close();
