<?php
session_start();
require_once 'dompdf/autoload.inc.php';// use Dompdf\Adapter\CPDF;

$id = $_REQUEST['id'];
$fecha = date("Y_m_d");
$base = $_SESSION['base'];
$anio = $_SESSION['year'];
$bd = $base . $anio;

include('connectin.php');

$id = trim($_REQUEST['id']);


$rs = $mysqli->query("SELECT * FROM compra WHERE id_compra='$id'");

while ($fila = $rs->fetch_row()) {

  $nom_empresa = $fila[2];
}

$n = strtolower($nom_empresa);
$cliente = str_replace(" ", "_", $n);
$name = $cliente . "_" . $id . "_" . $fecha;

$rs2 = $mysqli->query("UPDATE compra SET archivo='$name.pdf' WHERE  id_compra='$id' ");

/* creamos un nuevo objeto */

$dompdf = new DOMPDF();
$dompdf->set_Paper(array(0, 0, 612, 396));



/*
Las medidas correctas de una hoja tamaño carta son las siguientes:
Pulgadas: 8.5 x 11.
Pixeles: 2550 x 3300. 
Puntos: 612 x 792

*/
/* Llamamos a nuestro archivo html */
/* a través del método "load_html_file" */

//-----------------------------------------


$serve =  $_SERVER['REQUEST_URI'];
$serve1 = $_SERVER['SERVER_NAME'];

$arr = explode("/", $serve);
$subd = $arr[1];

$uri = $serve1 . "/" . $subd;

if ($_SESSION['base'] == 'esa') {
  $iva = $_REQUEST['iva'];
  $file = file_get_contents("http://$uri/compra.pdf.normal13.php?id=$id&bss=" . $_SESSION['base'] . "&bs=" . $_SESSION['base'] . $_SESSION['year'] . "&iva=" . $iva . "", true);
  $dompdf->load_html($file);

  //$dompdf->setPaper('A4', 'landscape');


  $dompdf->render();
  // $pdf = $dompdf->output();
} else if($_SESSION['base']=='nica'){

  if (isset($_REQUEST['ir'])) {
    $ir = '1';
  } else {
    $ir = '0';
  }
  $iva = $_REQUEST['iva'];
  $moneda = $_REQUEST['moneda'];

  $file = file_get_contents("http://192.168.0.224/sistema2024/compra.pdf.normal15.php?id=$id&bss=" . $_SESSION['base'] . "&bs=" . $_SESSION['base'] . $_SESSION['year'] . "&moneda=" . $moneda . "&iva=" . $iva . "&ir=" . $ir . "", true);
  $dompdf->load_html($file);

  //$dompdf->setPaper('A4', 'landscape');
  $dompdf->render();
}
$pdf = $dompdf->output();


/* definimos la path de  destino */
file_put_contents("ordenes_compra_" . $_SESSION['base'] . $_SESSION['year'] . "/$name.pdf", $pdf);
$dompdf->stream("$name.pdf");

$mysqli->close();
?>