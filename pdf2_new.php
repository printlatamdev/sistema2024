<?php
session_start();
// error_reporting(E_ALL);
// ini_set('display_errors', value: 'On');


// include autoloader
// include autoloader
require_once 'dompdf/autoload.inc.php';// use Dompdf\Adapter\CPDF;
// use Dompdf\Dompdf;
// use Dompdf\Exception;

$base = $_SESSION['base'] ?? 'default_base';
$anio = $_SESSION['year'] ?? 'default_anio';
$bd = $base . $anio;

$id = trim($_REQUEST['id'] ?? '');
$tipo = $_REQUEST['tipo'] ?? '';
$currency = $_REQUEST['currency'] ?? '';
$fecha = date("Y_m_d");

if (empty($id)) {
    die('Error: ID is required.');
}

if (empty($tipo)) {
    die('Error: Type is required.');
}

if (empty($currency)) {
    die('Error: Currency is required.');
}

include('suministros/connect.php');

$rs = $mysqli->query("SELECT * FROM cotizacion WHERE id_cotizacion='$id'");
if (!$rs) {
    die('Error: Query failed: ' . $mysqli->error);
}

if ($fila = $rs->fetch_row()) {
    $nom_empresa = $fila[14];
} else {
    die('No record found for the provided ID.');
}

$n = strtolower($nom_empresa);
$cliente = str_replace(" ", "_", $n);
$name = $cliente . "_" . $id . "_" . $fecha;

$rs2 = $mysqli->query("UPDATE cotizacion SET archivo='$name.pdf' WHERE id_cotizacion='$id'");
if (!$rs2) {
    die('Error: Update query failed: ' . $mysqli->error);
}

$rs3 = $mysqli->query("SELECT * FROM cotizacion_detalle WHERE id_cotizacion='$id'");
if (!$rs3) {
    die('Error: Query failed: ' . $mysqli->error);
}

$cantidad = $rs3->num_rows;
if ($fila3 = $rs3->fetch_row()) {
    $det = $fila3[2];
} else {
    die('No details found.');
}

// Include the Composer autoload file
// require_once 'vendor/autoload.php';

use Dompdf\Dompdf;

$dompdf = new Dompdf();


$serve = $_SERVER['REQUEST_URI'];
$serve1 = $_SERVER['SERVER_NAME'];
$arr = explode("/", $serve);
$subd = $arr[1];
$uri = $serve1 . "/" . $subd;

$val = (strlen($det) >= 300) ? 5 : 7;

$iva_value = '';
switch ($tipo) {
    case 'c13':
        $iva_value = 0.13;
        break;
    case 'c7':
        $iva_value = 0.07;
        break;
    case 'c15':
        $iva_value = 0.15;
        break;
    case 'c12':
        $iva_value = 0.12;
        break;
    case 'c0':
    case 'export':
        $iva_value = '';
        break;
    case 'c12q':
        $iva_value = 0.12;
        break;
    default:
        $iva_value = '';
        break;
}

try {
    $fileUrl = "http://$uri/cotizacion.pdf.larga13_new.php?id=$id&bss=$base&bs=$bd&ano=$anio&iva=$iva_value&currency=$currency";
    $file = file_get_contents($fileUrl);

    if ($file === false) {
        throw new Exception("Failed to retrieve content from $fileUrl");
    }

    $dompdf->loadHtml($file);
    $dompdf->setPaper('A4', 'portrait');
    $dompdf->render();
    $pdf = $dompdf->output();

    $carpeta_envio = "cotizaciones_" . $bd;
    if (!file_exists($carpeta_envio)) {
        mkdir($carpeta_envio, 0777, true);
    }

    file_put_contents("$carpeta_envio/$name.pdf", $pdf);
    $dompdf->stream("$name.pdf", array("Attachment" => false));
} catch (Exception $e) {
    error_log('DOMPDF Error: ' . $e->getMessage());
    echo '<p>An error occurred while generating the PDF. Please try again later.</p>';
    error_log('DOMPDF Error Details: ' . $e->getTraceAsString());
}

$mysqli->close();
