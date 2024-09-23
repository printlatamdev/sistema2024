<?php
session_start();
include './suministros/connect.php';
$base = $_SESSION['base'];
$anio = $_SESSION['anio'];
$bd = $base . $anio;
$fecha = date("Y_m_d");

$cantidad = $_POST["cantidad"];
$pais = $_POST["pais"];
$material = $_POST["material"];
$impresora = $_POST["impresora"];
$maquina = $_POST["maquina"];
$accesorios = $_POST["accesorios"];
$cierre = $_POST["cierre"];
$frente = $_POST["frente"];
$profundidad = $_POST["profundidad"];
$altura = $_POST["altura"];
// $corte = urlencode($_POST["corte"]);
// $impresion = urlencode($_POST["impresion"]);
$corte = $_POST["corte"];
$impresion = $_POST["impresion"];
$cliente = $_POST["empresa"];
// $array_num = count($data);
$files=[];

foreach($_FILES['files']['tmp_name'] as $key){
   $ruta = $key;
   $aleatorio=mt_rand(0,99000);
   $item="img"."_".$aleatorio.".jpg";
   $guia_images_folder = './guia_images/';

   if (!file_exists($guia_images_folder)) {
   mkdir($guia_images_folder, 0777, true);
   }
   $destino= $guia_images_folder.$item;
   copy($ruta, $destino);
   array_push($files,$item);
}
$files = json_encode($files);
/* $files = json_encode($files);
$insertar_datos = $mysqli->query("INSERT INTO `guia_de_impresion`(cantidad, pais, material, impresora, accesorios, cierre, frente, profundidad, altura, imagenes, ruta_corte, ruta_impresion) VALUES ($cantidad,'$pais','$material','$impresora','$accesorios','$cierre',$frente,$profundidad,$altura,'$files','$corte','$impresion')");
if($insertar_datos == true){
   echo "<script>alert('La informacion se ha guardado exitosamente!');</script>";
   $mysqli->close();
} */
// if($insertar_datos == true){
   // echo "<script>alert('Ingreso de datos Exitoso');</script>";
   /* Incluimos el archivo de configuracion */
   /* creamos un nuevo objeto */
   require_once("./dompdf6/dompdf_config.inc.php");
   $dompdf = new DOMPDF();
   /* Llamamos a nuestro archivo html */
   /* a través del método "load_html_file" */
   //-----------------------------------------
   $serve =  $_SERVER['REQUEST_URI'];
   $serve1 = $_SERVER['SERVER_NAME'];

   $arr = explode("/", $serve);
   $subd = $arr[1];

   $uri = $serve1 . "/" . $subd;

   $file = file_get_contents("http://$uri/utilidades/pdf_guia_tecnica.php?cantidad=" . $cantidad . "&pais=" . urlencode($pais). "&material=" . urlencode($material) . "&maquina=" . $maquina. "&impresora=" . $impresora . "&accesorios=" . urlencode($accesorios) . "&cierre=" . $cierre . "&frente=" . $frente . "&profundidad=" . $profundidad . "&altura=" . $altura .'&imagenes='.$files. "&impresion=" .$impresion . "&corte=" . $corte ."&cliente=".urlencode($cliente)."", true);
   // $dompdf->set_paper('letter', 'portrait');
   $dompdf->load_html($file);
   $dompdf->render();
   $pdf = $dompdf->output();

   /* definimos la path de  destino */
   $carpeta_envio = "guia_de_impresion_" . $bd;
   if (!file_exists($carpeta_envio)) {
      mkdir($carpeta_envio, 0777, true);
   }
    $name = 'guia_de_impresion';
   // file_put_contents("guia_de_impresion_$bd/$name.pdf", $pdf);
   $dompdf->stream("$name.pdf", array("Attachment" => false));
/* }else{
 echo "<script>alert('Oops! Algo salio mal! =(');</script>";
} */

/* while ($fila = $rs->fetch_row()) {
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
} */

// $mysqli->close();
