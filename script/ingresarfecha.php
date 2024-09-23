<?php

 include ('../connect3.php');
//$con = conexion();
 include("../session.php");


$f_salida= $_POST["f_salida"];

$f_llegada= $_POST["f_llegada"];
$id= $_POST["id"];
$origen= $_POST["origen"];



//echo $carta, $manifiesto, $duca_t, $id;


//echo $status, $nombre_cliente, $destino;

//$telrefe=$_FILES['txtFoto']['name'];
//$ruta=$_FILES['txtFoto']['tmp_name'];
//$extension=$_FILES['txtFoto']['type'];
//$destino="../fotos/".$foto;
//copy($ruta, $destino);

//echo "$nombre, $usuario, $contraseña";

if($origen=="sv")
{

 include ('../connect3.php');

$res = $mysqli->query("update logitica SET f_salida='".$f_salida."', f_llegada='".$f_llegada."' where id_logistica='".$id."'");

if($res==true){


echo'<script type="text/javascript">
    alert("Se actualizo la fecha");
    window.location.href="../editar_logistica.php";
    </script>';

		
		
	


}

else{
	echo "ha ocurrido un error";
}}





else{


 include ('../connect2.php');


	$res = $mysqli->query("update logitica SET f_salida='".$f_salida."', f_llegada='".$f_llegada."' where id_logistica='".$id."'");

if($res==true){


echo'<script type="text/javascript">
    alert("Se actualizo la fecha");
    window.location.href="../editar_logistica_ni.php";
    </script>';

		
		
	


}

else{
	echo "ha ocurrido un error";
}}





?>