<?php
session_start();
//error_reporting(E_ALL); 
//ini_set("display_errors", 1); 
//print_r($_REQUEST);die();
$id = $_REQUEST['id'];
$fecha = date("Y_m_d");

$base = $_SESSION['base'];


include('../'.$base."_db.php");

$id = trim($_REQUEST['id']);



$rs = $mysqli->query("SELECT * FROM compra WHERE id_compra='$id'");

while ($fila = $rs->fetch_row()) {

  $nom_empresa = $fila[2];
}

$n = strtolower($nom_empresa);
$cliente = str_replace(" ", "_", $n);
$name = $cliente . "_" . $id . "_" . $fecha;

$rs2 = $mysqli->query("UPDATE compra SET archivo='$name.pdf' WHERE  id_compra='$id' ");



/*
                 $rs3=$mysqli->query("SELECT * FROM cotizacion_detalle WHERE id_cotizacion='$id'");
                 $cantidad=mysqli_num_rows($rs3);
                 while ($fila3 = $rs3->fetch_row()) { 

                    $det = $fila3[2];
                    break;
              
                 }
*/

//print_r($cantidad);die();
/* Incluimos el archivo de configuracion */

/* creamos un nuevo objeto */

require_once("dompdf6/dompdf_config.inc.php");
$dompdf = new DOMPDF();
//$dompdf->set_paper('A4', 'landscape');
//$dompdf->set_Paper('letter', 'portrait');
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

//$_SESSION['base'] = 'esa';
if ($_SESSION['base'] == 'esa') {
  $iva = $_REQUEST['iva'];
  // $file  =  '<h1>'. ((int)$_POST["id"]) . '<br>'. $_SESSION['base'] .'<br>' . $iva . '</h1>' ;
  $file = file_get_contents("http://$uri/reportes/compra.pdf.normal13.php?id=$id&bss=" . $_SESSION['base'] . "&bs=esa22&iva=" . $iva . "", true);

} else {

  if (isset($_REQUEST['ir'])) {
    $ir = '1';
  } else {
    $ir = '0';
  }
  $iva = $_REQUEST['iva'];
  $moneda = $_REQUEST['moneda'];
  $file = file_get_contents("http://$uri/reportes/compra.pdf.normal15.php?id=$id&bss=" . $_SESSION['base'] . "&bs=esa22&iva=" . $iva . "&ir=" . $ir . "", true);
}
$dompdf->load_html($file);
//$dompdf->setPaper('A4', 'landscape');

//print_r($dompdf);


$dompdf->render();

$pdf = $dompdf->output();


//$carpeta_envio = "../ORDENES_COMPRA_2020/ORDENES_PDF/ ";
//    if (!file_exists($carpeta_envio)) {
//   mkdir($carpeta_envio, 0777, true);} 


/* definimos la path de  destino */
file_put_contents("../ordenes_compra_" . $_SESSION['base'] . '22' . "/$name.pdf", $pdf);
$dompdf->stream("$name.pdf");

$mysqli->close();
