<?php

 include ('../connect3.php');
//$con = conexion();
 include("../session.php");


$id= $_POST["id_orden"];
$opcion= $_POST["option"];

$origen=$_POST["origen"];

//echo $id, $opcion;


if($origen=="sv"){

 include ('../connect3.php');


	if ($opcion=="factura") {

	$foto=$_FILES['factura']['name'];
$ruta=$_FILES['factura']['tmp_name'];
$extension=$_FILES['factura']['type'];
$destino="../../artes_esa17/".$foto;
$res = $mysqli->query("update logistica_po SET factura='".$foto."' where id_orden='".$id."'");
copy($ruta, $destino);
	# code...
}
elseif ($opcion=="nota_envio") {
	# code...

	$foto=$_FILES['nota_envio']['name'];
$ruta=$_FILES['nota_envio']['tmp_name'];
$extension=$_FILES['nota_envio']['type'];
$destino="../../artes_esa17/".$foto;
$res = $mysqli->query("update logistica_po SET nota_envio='".$foto."' where id_orden='".$id."'");

copy($ruta, $destino);

}




elseif ($opcion=="orden") {

		$foto=$_FILES['orden']['name'];
$ruta=$_FILES['orden']['tmp_name'];
$extension=$_FILES['orden']['type'];
$destino="../../artes_esa17/".$foto;
$res = $mysqli->query("update logistica_po SET orden_compra='".$foto."' where id_orden='".$id."'");
copy($ruta, $destino);
	# code...
}
elseif ($opcion=="hh") {

		$foto=$_FILES['hh']['name'];
$ruta=$_FILES['hh']['tmp_name'];
$extension=$_FILES['hh']['type'];
$destino="../../artes_esa17/".$foto;
$res = $mysqli->query("update logistica_po SET nota_envio_hh='".$foto."' where id_orden='".$id."'");
copy($ruta, $destino);
	# code...
}



else{

	echo "error";
}




//echo $carta, $manifiesto, $duca_t, $id;


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
    window.location.href="../../documentacion_po.php?id='.$id.'";
    </script>';

		
		
	


}

elseif ($res2==true) {

	echo'<script type="text/javascript">
    alert("Documentos subidos correctamente");
    window.location.href="../../documentacion_aereo.php?id='.$id.'";
    </script>';

	# code...
}
else{
	echo "ha ocurrido un error";

	echo $opcion;
}

}


else{
   
      include ('../connect2.php');

	if ($opcion=="factura") {

	$foto=$_FILES['factura']['name'];
$ruta=$_FILES['factura']['tmp_name'];
$extension=$_FILES['factura']['type'];
$destino="../artes_esa17/".$foto;
$res = $mysqli->query("update logistica_po SET factura='".$foto."' where id_orden='".$id."'");
copy($ruta, $destino);
	# code...
}
elseif ($opcion=="nota_envio") {
	# code...

	$foto=$_FILES['nota_envio']['name'];
$ruta=$_FILES['nota_envio']['tmp_name'];
$extension=$_FILES['nota_envio']['type'];
$destino="../artes_esa17/".$foto;
$res = $mysqli->query("update logistica_po SET nota_envio='".$foto."' where id_orden='".$id."'");

copy($ruta, $destino);

}

elseif ($opcion=="hh") {
		$foto=$_FILES['hh']['name'];
$ruta=$_FILES['hh']['tmp_name'];
$extension=$_FILES['hh']['type'];
$destino="../artes_esa17/".$foto;
$res = $mysqli->query("update logistica_po SET nota_envio_hh='".$foto."' where id_orden='".$id."'");
copy($ruta, $destino);
	# code...
}

elseif ($opcion=="orden") {

		$foto=$_FILES['orden']['name'];
$ruta=$_FILES['orden']['tmp_name'];
$extension=$_FILES['orden']['type'];
$destino="../artes_esa17/".$foto;
$res = $mysqli->query("update logistica_po SET orden_compra='".$foto."' where id_orden='".$id."'");
copy($ruta, $destino);
	# code...
}


else{

	echo "error";
}


//echo $carta, $manifiesto, $duca_t, $id;


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
    window.location.href="../documentacion_ni.php?id='.$id.'";
    </script>';

		
		
	


}

else{
	echo "ha ocurrido un error";

	echo $opcion;
}

}







?>