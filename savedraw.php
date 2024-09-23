<?php
//print_r($_POST);

  require_once ("conexion_ajax.php");
$img = $_POST['base64'];
$img = str_replace('data:image/png;base64,', '', $img);
$fileData = base64_decode($img);
 $aleatorio=rand(1, 1000);
$fileName = 'firma_'.$aleatorio.'.png';

file_put_contents($fileName, $fileData);

 $actualizar = mysqli_query($con,"UPDATE log_bodega set firma='".$fileName."'");

 if ($actualizar==true) {
         
         
header("Location: ./index.php");


 }else{
 	  echo 'error al insertar';
 }


?>