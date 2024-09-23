<?php
 session_start();
//error_reporting(E_ALL); 
//ini_set("display_errors", 1); 
//print_r($_REQUEST);die();
$empresa=base64_encode($_REQUEST['empresa']);
$op=base64_encode(trim($_REQUEST['op']));
$fecha=base64_encode(trim($_REQUEST['fecha']));
$hora=base64_encode(trim($_REQUEST['hora']));
$tel=base64_encode(trim($_REQUEST['tel']));
$email=base64_encode(trim($_REQUEST['email']));
$origen=base64_encode(trim($_REQUEST['origen']));
$destino=base64_encode(trim($_REQUEST['destino']));
$pro=base64_encode(trim($_REQUEST['pro']));
$camp=base64_encode(trim($_REQUEST['camp']));
$cat=base64_encode(trim($_REQUEST['cat']));
$ctbultos=base64_encode(trim($_REQUEST['bultos']));
$unp=base64_encode(trim($_REQUEST['unp']));
$peso=base64_encode(trim($_REQUEST['peso']));
$imagen=base64_encode(trim($_REQUEST['imagen']));

 include ('suministros/connect.php');
			
			    
//print_r($cantidad);die();
/* Incluimos el archivo de configuracion */

/* creamos un nuevo objeto */

require_once("./vendor/autoload.php");
use Dompdf\Dompdf;

$dompdf = new Dompdf();$dompdf->set_Paper(array(0,0,432,288));
/* Llamamos a nuestro archivo html */
/* a través del método "load_html_file" */

 //-----------------------------------------
	

		$serve =  $_SERVER['REQUEST_URI'];
		$serve1 = $_SERVER['SERVER_NAME'];

		$arr = explode("/", $serve);
		$subd= $arr[1];

		$uri = $serve1."/".$subd;

        $file = file_get_contents("http://$uri/sticker.formato.generico.php?empresa=".$empresa."&op=".$op."&fecha=".$fecha."&hora=".$hora."&tel=".$tel."&email=".$email."&origen=".$origen."&destino=".$destino."&pro=".$pro."&camp=".$camp."&cat=".$cat."&bultos=".$ctbultos."&unp=".$unp."&peso=".$peso."&imagen=".$imagen."&bs=".$_SESSION['base'].$_SESSION['year']."", true);		
		
        $dompdf->load_html($file);




$dompdf->render();
$pdf = $dompdf->output();  
$carpeta_empleado = 'stickers_'.$_SESSION['base'].$_SESSION['year'].'/';

    if (!file_exists($carpeta_empleado)) {
         mkdir($carpeta_empleado, 0777, true);
    } 

/* definimos la path de  destino */
file_put_contents("stickers_".$_SESSION['base'].$_SESSION['year']."/prueba.pdf", $pdf);
// $dompdf->stream("prueba.pdf");
// Stream the PDF to the browser
$dompdf->stream("prueba.pdf", ['Attachment' => 0]);


$mysqli->close();
