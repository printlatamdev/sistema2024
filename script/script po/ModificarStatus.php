<?php

 include ('../connect3.php');
//$con = conexion();
 include("../session.php");

$status       = $_POST["status"];

$id_orden = $_POST["id_orden"];
$origen = $_POST["origen"];




//echo $status, $nombre_cliente, $destino;

//$telrefe=$_FILES['txtFoto']['name'];
//$ruta=$_FILES['txtFoto']['tmp_name'];
//$extension=$_FILES['txtFoto']['type'];
//$destino="../fotos/".$foto;
//copy($ruta, $destino);

//echo "$nombre, $usuario, $contraseña";

if($origen=="sv"){


	 include ('../connect3.php');


	$fecha =date('d/m/Y h:i:s a');
$res = $mysqli->query("INSERT INTO bitacora_status_po (id_orden,status,f_hora) VALUES ('".$id_orden."','".$status."','".$fecha."')");


if($res==true  ){

 


		echo'<script type="text/javascript">
    alert("Status Actualizado");
    window.location.href="../../editar_logistica_po.php";
    </script>';
}


	 //Modificar
	
		
		else {
		echo 'Error';
	}

}


else{

 include ('../connect2.php');
$fecha =date('d/m/Y h:i:s a');
$res = $mysqli->query("INSERT INTO bitacora_s (id_orden,status,f_hora) VALUES ('".$id_orden."','".$status."','".$fecha."')");



if($res==true ){

		echo'<script type="text/javascript">
    alert("Status Actualizado");
    window.location.href="sistema/editar_logistica_po.php";
    </script>';
}


	 //Modificar
	
		
		else {
		echo 'Error';
	}




















}







?>