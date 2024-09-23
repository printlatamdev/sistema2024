<?php

 include ('../connect3.php');
//$con = conexion();
 include("../session.php");

$status = $_POST["status"];
$id_status = $_POST["id_st"];
$fecha=  $_POST["fechahora"];
$orden=  $_POST["id_orden"];
$origen=  $_POST["origen"];



//echo $status, $nombre_cliente, $destino;

//$telrefe=$_FILES['txtFoto']['name'];
//$ruta=$_FILES['txtFoto']['tmp_name'];
//$extension=$_FILES['txtFoto']['type'];
//$destino="../fotos/".$foto;
//copy($ruta, $destino);

//echo "$nombre, $usuario, $contraseña";

if($origen=="sv"){


	 include ('../connect3.php');




$res = $mysqli->query("update bitacora_s SET status='".$status."',f_hora='".$fecha."' where id_status='".$id_status."'");
if($res==true){
echo'<script type="text/javascript">
    alert("Actualizado Correctamente");
    window.location.href="../registro_status.php?id='.$orden.'";
    </script>';
}else{
	echo 'error';
}


}


else{

 include ('../connect2.php');


$res = $mysqli->query("update bitacora_s SET status='".$status."',f_hora='".$fecha."' where id_status='".$id_status."'");

if($res==true){
echo'<script type="text/javascript">
    alert("Actualizado Correctamente");
    window.location.href="../terminadas_nica_status.php?id='.$orden.'";
    </script>';
}else{
	echo 'error';
}
}







?>