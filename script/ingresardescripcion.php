<?php
session_start();
 include ('../connect3.php');
//$con = conexion();
 include("../session.php");


$descripcion= $_POST["descripcion"];

$capacidad= $_POST["capacidad"];
$id= $_POST["id"];
$origen=  $_POST["origen"];

$fauca=$_POST["opcionfauca"];
	






//echo $carta, $manifiesto, $duca_t, $id;


//echo $status, $nombre_cliente, $destino;

//$telrefe=$_FILES['txtFoto']['name'];
//$ruta=$_FILES['txtFoto']['tmp_name'];
//$extension=$_FILES['txtFoto']['type'];
//$destino="../fotos/".$foto;
//copy($ruta, $destino);

//echo "$nombre, $usuario, $contraseña";


if($origen=="sv"){

	include ('../connect3.php');

	$res = $mysqli->query("update logitica SET p_vehiculo='".$capacidad."', descripcion='".$descripcion."', focus='".$fauca."' where id_logistica='".$id."'");

if($res==true){


echo'<script type="text/javascript">
    alert("Se ingreso la descripcion");
    window.location.href="../editar_logistica.php";
    </script>';

		
		
	


}

else{
	echo "ha ocurrido un error";
}

}


else{

	include ('../connect2.php');


	$res = $mysqli->query("update logitica SET p_vehiculo='".$capacidad."', descripcion='".$descripcion."' where id_logistica='".$id."'");

if($res==true){


echo'<script type="text/javascript">
    alert("Se ingreso la descripcion");
    window.location.href="../editar_logistica_ni.php";
    </script>';

		
		
	


}

else{
	echo "ha ocurrido un error";
}





}






?>