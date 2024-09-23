<?php



$user = $_REQUEST['user'];
$lat = $_REQUEST['latitud'];
$long = $_REQUEST['longitud'];
$placa = $_REQUEST['placa'];

include ("connect.php");
$con = conexion();
$id=1;




$rs= mysqli_query($con,"INSERT INTO coordenadas(id_motorista, lat, longi,placa) VALUES('".$id."', '".$lat."', '".$long."', '".$placa."')");




?>