<?php
session_start();
//error_reporting(E_ALL); 
//ini_set("display_errors", 1); 
//print_r($_REQUEST);die();




$base = $_SESSION['base'];
// $anio = '21';
$anio=$_SESSION['year'];

$bd = $base . $anio;


$id = $_REQUEST['id'];
$tipo = $_REQUEST['tipo'];
$size = $_REQUEST['size'];
$fecha = date("Y_m_d");

include('suministros/connect.php');

$id = trim($_REQUEST['id']);


$rs = $mysqli->query("SELECT * FROM cotizacion WHERE id_cotizacion='$id'");

while ($fila = $rs->fetch_row()) {

   $nom_empresa = $fila[14];
}

$n = strtolower($nom_empresa);
$cliente = str_replace(" ", "_", $n);
$name = $cliente . "_" . $id . "_" . $fecha;

$rs2 = $mysqli->query("UPDATE cotizacion SET archivo='$name.pdf' WHERE  id_cotizacion='$id' ");




$rs3 = $mysqli->query("SELECT * FROM cotizacion_detalle WHERE id_cotizacion='$id'");
$cantidad = mysqli_num_rows($rs3);
while ($fila3 = $rs3->fetch_row()) {

   $det = $fila3[2];
   break;
}



//print_r($cantidad);die();
/* Incluimos el archivo de configuracion */

/* creamos un nuevo objeto */

require_once("dompdf6/dompdf_config.inc.php");
$dompdf = new DOMPDF();
/* Llamamos a nuestro archivo html */
/* a través del método "load_html_file" */

//-----------------------------------------


$serve =  $_SERVER['REQUEST_URI'];
$serve1 = $_SERVER['SERVER_NAME'];

$arr = explode("/", $serve);
$subd = $arr[1];

$uri = $serve1 . "/" . $subd;

if (strlen($det) >= 300) {
   $val = 5;
} else {
   $val = 7;
}


if ($tipo == "c13") {



   if ($size == 'l') {


      $file = file_get_contents("http://$uri/cotizacion.pdf.larga13.php?id=$id&bss=" . $_SESSION['base'] . "&bs=" . $_SESSION['base'] . $anio . "&ano=" . $anio . "", true);

      $dompdf->load_html($file);
   } elseif ($size == 'n') {
      $file = file_get_contents("http://$uri/cotizacion.pdf.normal13.php?id=$id&bss=" . $_SESSION['base'] . "&bs=" . $_SESSION['base'] . $anio . "&ano=" . $anio . "", true);
      $dompdf->load_html($file);
   }
} elseif ($tipo == "c7") {



   if ($size == 'l') {


      $file = file_get_contents("http://$uri/cotizacion.pdf.larga7.php?id=$id&bss=" . $_SESSION['base'] . "&bs=" . $_SESSION['base'] . $anio . "&ano=" . $anio . "", true);

      $dompdf->load_html($file);
   } elseif ($size == 'n') {
      $file = file_get_contents("http://$uri/cotizacion.pdf.normal7.php?id=$id&bss=" . $_SESSION['base'] . "&bs=" . $_SESSION['base'] . $anio . "&ano=" . $anio . "", true);
      $dompdf->load_html($file);
   }
} else if ($tipo == "c12") {



   if ($size == 'l') {


      $file = file_get_contents("http://$uri/cotizacion.pdf.larga12.php?id=$id&bss=" . $_SESSION['base'] . "&bs=" . $_SESSION['base'] . $anio . "&ano=" . $anio . "", true);

      $dompdf->load_html($file);
   } elseif ($size == 'n') {
      $file = file_get_contents("http://$uri/cotizacion.pdf.normal12.php?id=$id&bss=" . $_SESSION['base'] . "&bs=" . $_SESSION['base'] . $anio . "&ano=" . $anio . "", true);
      $dompdf->load_html($file);
   }
} else if ($tipo == "c12q") {



   if ($size == 'l') {


      $file = file_get_contents("http://$uri/cotizacion.pdf.larga12q.php?id=$id&bss=" . $_SESSION['base'] . "&bs=" . $_SESSION['base'] . $anio . "&ano=" . $anio . "", true);

      $dompdf->load_html($file);
   } elseif ($size == 'n') {
      $file = file_get_contents("http://$uri/cotizacion.pdf.normal12q.php?id=$id&bss=" . $_SESSION['base'] . "&bs=" . $_SESSION['base'] . $anio . "&ano=" . $anio . "", true);
      $dompdf->load_html($file);
   }
} else if ($tipo == "c15") {



   if ($size == 'l') {


      $file = file_get_contents("http://$uri/cotizacion.pdf.larga15.php?id=$id&bss=" . $_SESSION['base'] . "&bs=" . $_SESSION['base'] . $anio . "&ano=" . $anio . "", true);

      $dompdf->load_html($file);
   } elseif ($size == 'n') {
      $file = file_get_contents("http://$uri/cotizacion.pdf.normal15.php?id=$id&bss=" . $_SESSION['base'] . "&bs=" . $_SESSION['base'] . $anio . "&ano=" . $anio . "", true);
      $dompdf->load_html($file);
   }
} else if ($tipo == "c0") {



   if ($size == 'l') {


      $file = file_get_contents("http://$uri/cotizacion.pdf.larga0.php?id=$id&bss=" . $_SESSION['base'] . "&bs=" . $_SESSION['base'] . $anio . "&ano=" . $anio . "", true);

      $dompdf->load_html($file);
   } elseif ($size == 'n') {
      $file = file_get_contents("http://$uri/cotizacion.pdf.normal0.php?id=$id&bss=" . $_SESSION['base'] . "&bs=" . $_SESSION['base'] . $anio . "&ano=" . $anio . "", true);
      $dompdf->load_html($file);
   }
} else if ($tipo == "cs15") {



   if ($size == 'l') {


      $file = file_get_contents("http://$uri/cotizacion.pdf.largacs15.php?id=$id&bss=" . $_SESSION['base'] . "&bs=" . $_SESSION['base'] . $anio . "&ano=" . $anio . "", true);

      $dompdf->load_html($file);
   } elseif ($size == 'n') {
      $file = file_get_contents("http://$uri/cotizacion.pdf.normalcs15.php?id=$id&bss=" . $_SESSION['base'] . "&bs=" . $_SESSION['base'] . $anio . "&ano=" . $anio . "", true);
      $dompdf->load_html($file);
   }
} else if ($tipo == "export") {



   if ($size == 'l') {


      //$file = file_get_contents("http://$uri/cotizacion.pdf.largacs15.php?id=$id&bss=".$_SESSION['base']."&bs=".$_SESSION['base'].$_SESSION['year']."", true);		

      $dompdf->load_html($file);
   } elseif ($size == 'n') {
      //$file = file_get_contents("http://$uri/cotizacion.pdf.normalcs15.php?id=$id&bss=".$_SESSION['base']."&bs=".$_SESSION['base'].$_SESSION['year']."", true);
      $dompdf->load_html($file);
   }
}




$dompdf->render();
$pdf = $dompdf->output();

/* definimos la path de  destino */
$carpeta_envio = "cotizaciones_" . $bd;
if (!file_exists($carpeta_envio)) {
   mkdir($carpeta_envio, 0777, true);
}

file_put_contents("cotizaciones_$bd/$name.pdf", $pdf);

$dompdf->stream("$name.pdf", array("Attachment" => false));

$mysqli->close();
