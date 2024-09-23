<?php

 
//$con = conexion();
 include("../session.php");


$id= $_POST["id_orden"];
$opcion= $_POST["option"];

$origen=$_POST["origen"];


//echo $id, $opcion;


if($origen=="sv"){

 include ('connect3.php');


if ($opcion=="factura") {

$foto=$_FILES['factura']['name'];
$ruta=$_FILES['factura']['tmp_name'];
$extension=$_FILES['factura']['type'];
$destino="../ORDENES_POP/".$id."/DOCUMENTOS_ORDEN_".$id."/".$foto;
$res = $mysqli->query("update logitica SET factura='".$foto."' where id_orden='".$id."'");
copy($ruta, $destino);
	# code...
}
elseif ($opcion=="nremision") {

$foto=$_FILES['nremision']['name'];
$ruta=$_FILES['nremision']['tmp_name'];
$extension=$_FILES['nremision']['type'];
$destino="../ORDENES_POP/".$id."/DOCUMENTOS_ORDEN_".$id."/".$foto;
$res = $mysqli->query("update logitica SET nota_remision_HH='".$foto."' where id_orden='".$id."'");
copy($ruta, $destino);
	# code...
}
elseif ($opcion=="nenvio") {
	# code...

$foto=$_FILES['nenvio']['name'];
$ruta=$_FILES['nenvio']['tmp_name'];
$extension=$_FILES['nenvio']['type'];
$destino="../ORDENES_POP/".$id."/DOCUMENTOS_ORDEN_".$id."/".$foto;
$res = $mysqli->query("update logitica SET nota_envio='".$foto."' where id_orden='".$id."'");

copy($ruta, $destino);

}
/**elseif ($opcion=="nota_envio_cd") {
	# code...

	$foto=$_FILES['nota']['name'];
$ruta=$_FILES['nota']['tmp_name'];
$extension=$_FILES['nota']['type'];
$destino="../ORDENES_POP/".$id."/DOCUMENTOS_ORDEN_".$id."/".$foto;
$res = $mysqli->query("update logitica SET nota_envio_cd='".$foto."' where id_orden='".$id."'");

copy($ruta, $destino);

}**/
elseif ($opcion=="pack") {
	# code...

$foto=$_FILES['pack']['name'];
$ruta=$_FILES['pack']['tmp_name'];
$extension=$_FILES['pack']['type'];
$destino="../ORDENES_POP/".$id."/DOCUMENTOS_ORDEN_".$id."/".$foto;
$res = $mysqli->query("update logitica SET pack_lista='".$foto."' where id_orden='".$id."'");

copy($ruta, $destino);

}
elseif ($opcion=="ocompra") {

$foto=$_FILES['ocompra']['name'];
$ruta=$_FILES['ocompra']['tmp_name'];
$extension=$_FILES['ocompra']['type'];
$destino="../ORDENES_POP/".$id."/DOCUMENTOS_ORDEN_".$id."/".$foto;
$res = $mysqli->query("update logitica SET orden_compra='".$foto."' where id_orden='".$id."'");
copy($ruta, $destino);
	# code...
}
//-----------------------------FIN PRIMER BLOQUE----------------------------------------------------------------------------
elseif ($opcion=="pexportacion") {
	# poliza exportacion

	$foto=$_FILES['poliza']['name'];
$ruta=$_FILES['poliza']['tmp_name'];
$extension=$_FILES['poliza']['type'];
$destino="../ORDENES_POP/".$id."/DOCUMENTOS_ORDEN_".$id."/".$foto;
$res = $mysqli->query("update logitica SET scan_poliza='".$foto."' where id_orden='".$id."'");

copy($ruta, $destino);

}
elseif ($opcion=="ducaf") {
$foto=$_FILES['ducaf']['name'];
$ruta=$_FILES['ducaf']['tmp_name'];
$extension=$_FILES['ducaf']['type'];
$destino="../ORDENES_POP/".$id."/DOCUMENTOS_ORDEN_".$id."/".$foto;
$res = $mysqli->query("update logitica SET duca_f='".$foto."' where id_orden='".$id."'");
copy($ruta, $destino);
	# code...
}
elseif ($opcion=="mcarga") {

$foto=$_FILES['mcarga']['name'];
$ruta=$_FILES['mcarga']['tmp_name'];
$extension=$_FILES['mcarga']['type'];
$destino="../ORDENES_POP/".$id."/DOCUMENTOS_ORDEN_".$id."/".$foto;
$res = $mysqli->query("update logitica SET m_carga='".$foto."' where id_orden='".$id."'");
copy($ruta, $destino);
	# code...
}
elseif ($opcion=="ducat") {

		$foto=$_FILES['ducat']['name'];
$ruta=$_FILES['ducat']['tmp_name'];
$extension=$_FILES['ducat']['type'];
$destino="../ORDENES_POP/".$id."/DOCUMENTOS_ORDEN_".$id."/".$foto;
$res = $mysqli->query("update logitica SET ducat='".$foto."' where id_orden='".$id."'");
copy($ruta, $destino);
	# code...
}
elseif ($opcion=="cporte") {

		$foto=$_FILES['cporte']['name'];
$ruta=$_FILES['cporte']['tmp_name'];
$extension=$_FILES['cporte']['type'];
$destino="../ORDENES_POP/".$id."/DOCUMENTOS_ORDEN_".$id."/".$foto;
$res = $mysqli->query("update logitica SET carta_p='".$foto."' where id_orden='".$id."'");
copy($ruta, $destino);
	# code...
}
elseif ($opcion=="pexportacion") {

$foto=$_FILES['cporte']['name'];
$ruta=$_FILES['cporte']['tmp_name'];
$extension=$_FILES['cporte']['type'];
$destino="../ORDENES_POP/".$id."/DOCUMENTOS_ORDEN_".$id."/".$foto;
$res = $mysqli->query("update logitica SET carta_p='".$foto."' where id_orden='".$id."'");
copy($ruta, $destino);
	# code...
}
elseif ($opcion=="garea") {

$foto=$_FILES['garea']['name'];
$ruta=$_FILES['garea']['tmp_name'];
$extension=$_FILES['garea']['type'];
$destino="../ORDENES_POP/".$id."/DOCUMENTOS_ORDEN_".$id."/".$foto;
$res = $mysqli->query("update logitica SET guia_aerea='".$foto."' where id_orden='".$id."'");
copy($ruta, $destino);
	# code...
}
//--------------------FIN SEGUNDO BLOQUE------------------------------------------------------------------------------------
elseif ($opcion=="sdespacho") {

$foto=$_FILES['sdespacho']['name'];
$ruta=$_FILES['sdespacho']['tmp_name'];
$extension=$_FILES['sdespacho']['type'];
$destino="../ORDENES_POP/".$id."/DOCUMENTOS_ORDEN_".$id."/".$foto;
$res = $mysqli->query("update logitica SET solicitud_despacho='".$foto."' where id_orden='".$id."'");
copy($ruta, $destino);
	# code...
}elseif ($opcion=="stransporte") {

$foto=$_FILES['stransporte']['name'];
$ruta=$_FILES['stransporte']['tmp_name'];
$extension=$_FILES['stransporte']['type'];
$destino="../ORDENES_POP/".$id."/DOCUMENTOS_ORDEN_".$id."/".$foto;
$res = $mysqli->query("update logitica SET servicio_transporte='".$foto."' where id_orden='".$id."'");
copy($ruta, $destino);
	# code...
}elseif ($opcion=="sexportacion") {

$foto=$_FILES['sexportacion']['name'];
$ruta=$_FILES['sexportacion']['tmp_name'];
$extension=$_FILES['sexportacion']['type'];
$destino="../ORDENES_POP/".$id."/DOCUMENTOS_ORDEN_".$id."/".$foto;
$res = $mysqli->query("update logitica SET servicio_exportacion='".$foto."' where id_orden='".$id."'");
copy($ruta, $destino);
	# code...
}elseif ($opcion=="simportacion") {

$foto=$_FILES['simportacion']['name'];
$ruta=$_FILES['simportacion']['tmp_name'];
$extension=$_FILES['simportacion']['type'];
$destino="../ORDENES_POP/".$id."/DOCUMENTOS_ORDEN_".$id."/".$foto;
$res = $mysqli->query("update logitica SET servicio_importacion='".$foto."' where id_orden='".$id."'");
copy($ruta, $destino);
	# code...
}elseif ($opcion=="pseguro") {

$foto=$_FILES['pseguro']['name'];
$ruta=$_FILES['pseguro']['tmp_name'];
$extension=$_FILES['pseguro']['type'];
$destino="../ORDENES_POP/".$id."/DOCUMENTOS_ORDEN_".$id."/".$foto;
$res = $mysqli->query("update logitica SET poliza_seguro='".$foto."' where id_orden='".$id."'");
copy($ruta, $destino);
	# code...
}

/**elseif ($opcion=="duca_f") {
		$foto=$_FILES['duca']['name'];
$ruta=$_FILES['duca']['tmp_name'];
$extension=$_FILES['duca']['type'];
$destino="../ORDENES_POP/".$id."/DOCUMENTOS_ORDEN_".$id."/".$foto;
$res = $mysqli->query("update logitica SET duca_f='".$foto."' where id_orden='".$id."'");
copy($ruta, $destino);
	# code...
}**/













/**elseif ($opcion=="factura_aereo") {

		$foto=$_FILES['factura_aereo']['name'];
$ruta=$_FILES['factura_aereo']['tmp_name'];
$extension=$_FILES['factura_aereo']['type'];
$destino="../ORDENES_POP/".$id."/DOCUMENTOS_ORDEN_".$id."/".$foto;
$res2 = $mysqli->query("update logitica SET factura='".$foto."' where id_orden='".$id."'");
copy($ruta, $destino);
	# code...
}


elseif ($opcion=="orden_aereo") {

		$foto=$_FILES['orden_aereo']['name'];
$ruta=$_FILES['orden_aereo']['tmp_name'];
$extension=$_FILES['orden_aereo']['type'];
$destino="../ORDENES_POP/".$id."/DOCUMENTOS_ORDEN_".$id."/".$foto;
$res2 = $mysqli->query("update logitica SET orden_compra='".$foto."' where id_orden='".$id."'");
copy($ruta, $destino);
	# code...
}
elseif ($opcion=="fauca") {

		$foto=$_FILES['ducat']['name'];
$ruta=$_FILES['ducat']['tmp_name'];
$extension=$_FILES['ducat']['type'];
$destino="../ORDENES_POP/".$id."/DOCUMENTOS_ORDEN_".$id."/".$foto;
$res = $mysqli->query("update logitica SET duca_f='".$foto."' where id_orden='".$id."'");
copy($ruta, $destino);
	# code...
}**/



else{

	echo "error";
}




//echo $carta, $mcarga, $ducat, $id;


//echo $status, $nombre_cliente, $destino;

//$telrefe=$_FILES['txtFoto']['name'];
//$ruta=$_FILES['txtFoto']['tmp_name'];
//$extension=$_FILES['txtFoto']['type'];
//$destino="../fotos/".$foto;
//copy($ruta, $destino);

//echo "$nombre, $usuario, $contraseña";




if($res==true ){


echo'<script type="text/javascript">
    alert("Documentos subidos correctamente");
    window.location.href="../produccion_doc.php";
    </script>';

		
		
	


}

elseif ($res2==true) {

	echo'<script type="text/javascript">
    alert("Documentos subidos correctamente");
    window.location.href="../produccion_doc.php";
    </script>';

	# code...
}
else{
	echo "ha ocurrido un error";

	echo $opcion;
}

}

// NICARAGUA ---------------------------------------------------------------------------------------------------------
else{
   
      include ('connect2.php');

	if ($opcion=="factura") {

	$foto=$_FILES['factura']['name'];
$ruta=$_FILES['factura']['tmp_name'];
$extension=$_FILES['factura']['type'];
$destino="../ORDENES_POP/".$id."/DOCUMENTOS_ORDEN_".$id."/".$foto;
$res = $mysqli->query("update logitica SET factura='".$foto."' where id_orden='".$id."'");
copy($ruta, $destino);
	# code...
}
elseif ($opcion=="pack") {
	# code...

	$foto=$_FILES['pack']['name'];
$ruta=$_FILES['pack']['tmp_name'];
$extension=$_FILES['pack']['type'];
$destino="../ORDENES_POP/".$id."/DOCUMENTOS_ORDEN_".$id."/".$foto;
$res = $mysqli->query("update logitica SET pack_lista='".$foto."' where id_orden='".$id."'");

copy($ruta, $destino);

}
elseif ($opcion=="poliza") {
	# code...

	$foto=$_FILES['poliza']['name'];
$ruta=$_FILES['poliza']['tmp_name'];
$extension=$_FILES['poliza']['type'];
$destino="../ORDENES_POP/".$id."/DOCUMENTOS_ORDEN_".$id."/".$foto;
$res = $mysqli->query("update logitica SET scan_poliza='".$foto."' where id_orden='".$id."'");

copy($ruta, $destino);

}
elseif ($opcion=="orden_remision") {

		$foto=$_FILES['nota_remision_HH']['name'];
$ruta=$_FILES['nota_remision_HH']['tmp_name'];
$extension=$_FILES['nota_remision_HH']['type'];
$destino="../ORDENES_POP/".$id."/DOCUMENTOS_ORDEN_".$id."/".$foto;
$res = $mysqli->query("update logitica SET nota_remision_HH='".$foto."' where id_orden='".$id."'");
copy($ruta, $destino);
	# code...
}
elseif ($opcion=="nota_envio_cd") {
	# code...

	$foto=$_FILES['nota']['name'];
$ruta=$_FILES['nota']['tmp_name'];
$extension=$_FILES['nota']['type'];
$destino="../ORDENES_POP/".$id."/DOCUMENTOS_ORDEN_".$id."/".$foto;
$res = $mysqli->query("update logitica SET nota_envio_cd='".$foto."' where id_orden='".$id."'");

copy($ruta, $destino);

}
elseif ($opcion=="nota_envio") {
	# code...

	$foto=$_FILES['notaEn']['name'];
$ruta=$_FILES['notaEn']['tmp_name'];
$extension=$_FILES['notaEn']['type'];
$destino="../ORDENES_POP/".$id."/DOCUMENTOS_ORDEN_".$id."/".$foto;
$res = $mysqli->query("update logitica SET nota_envio='".$foto."' where id_orden='".$id."'");

copy($ruta, $destino);

}

elseif ($opcion=="duca_f") {
		$foto=$_FILES['duca']['name'];
$ruta=$_FILES['duca']['tmp_name'];
$extension=$_FILES['duca']['type'];
$destino="../ORDENES_POP/".$id."/DOCUMENTOS_ORDEN_".$id."/".$foto;
$res = $mysqli->query("update logitica SET duca_f='".$foto."' where id_orden='".$id."'");
copy($ruta, $destino);
	# code...
}

elseif ($opcion=="orden") {

		$foto=$_FILES['orden']['name'];
$ruta=$_FILES['orden']['tmp_name'];
$extension=$_FILES['orden']['type'];
$destino="../ORDENES_POP/".$id."/DOCUMENTOS_ORDEN_".$id."/".$foto;
$res = $mysqli->query("update logitica SET orden_compra='".$foto."' where id_orden='".$id."'");
copy($ruta, $destino);
	# code...
}
elseif ($opcion=="carta") {

		$foto=$_FILES['carta']['name'];
$ruta=$_FILES['carta']['tmp_name'];
$extension=$_FILES['carta']['type'];
$destino="../ORDENES_POP/".$id."/DOCUMENTOS_ORDEN_".$id."/".$foto;
$res = $mysqli->query("update logitica SET carta_p='".$foto."' where id_orden='".$id."'");
copy($ruta, $destino);
	# code...
}
elseif ($opcion=="mcarga") {

		$foto=$_FILES['mcarga']['name'];
$ruta=$_FILES['mcarga']['tmp_name'];
$extension=$_FILES['mcarga']['type'];
$destino="../ORDENES_POP/".$id."/DOCUMENTOS_ORDEN_".$id."/".$foto;
$res = $mysqli->query("update logitica SET m_carga='".$foto."' where id_orden='".$id."'");
copy($ruta, $destino);
	# code...
}
elseif ($opcion=="ducat") {

		$foto=$_FILES['ducat']['name'];
$ruta=$_FILES['ducat']['tmp_name'];
$extension=$_FILES['ducat']['type'];
$destino="../ORDENES_POP/".$id."/DOCUMENTOS_ORDEN_".$id."/".$foto;
$res = $mysqli->query("update logitica SET ducat='".$foto."' where id_orden='".$id."'");
copy($ruta, $destino);
	# code...
}

else{

	echo "error";
}


//echo $carta, $mcarga, $ducat, $id;


//echo $status, $nombre_cliente, $destino;

//$telrefe=$_FILES['txtFoto']['name'];
//$ruta=$_FILES['txtFoto']['tmp_name'];
//$extension=$_FILES['txtFoto']['type'];
//$destino="../fotos/".$foto;
//copy($ruta, $destino);

//echo "$nombre, $usuario, $contraseña";




if($res==true){


echo'<script type="text/javascript">
    alert("Documentos subidos correctamente");
    window.location.href="../editar_logistica_ni.php?id='.$id.'";
    </script>';

		
		
	


}

else{
	echo "ha ocurrido un error";

	echo $opcion;
}

}







?>