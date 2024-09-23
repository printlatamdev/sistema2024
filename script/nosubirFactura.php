<?php

 include ('../connect3.php');
//$con = conexion();
 include("../session.php");


$id= $_POST["id_orden"];
$opcion= $_POST["option"];

$origen=$_POST["origen"];


//echo $id, $opcion;
  $consulta80 =$mysqli->query("select numorden_compra from logiticass where id_orden='".$id."'
 ");


                                while ($row80 = mysqli_fetch_array($consulta80))
                                   {
                                    $num=$row80[0];                       
                                   }






if($origen=="sv"){

 include ('../connect3.php');


	if ($opcion=="factura") {

	$foto=$_FILES['factura']['name'];
$ruta=$_FILES['factura']['tmp_name'];
$extension=$_FILES['factura']['type'];
$destino="../artes_esa17/".$foto;
$res = $mysqli->query("update logiticass SET factura='".$foto."' where id_orden='".$id."'");
copy($ruta, $destino);
	# code...
}
elseif ($opcion=="nota_envio_cd") {
	# code...

	$foto=$_FILES['nota']['name'];
$ruta=$_FILES['nota']['tmp_name'];
$extension=$_FILES['nota']['type'];
$destino="../artes_esa17/".$foto;
$res = $mysqli->query("update logiticass SET nota_envio_cd='".$foto."' where id_orden='".$id."'");

copy($ruta, $destino);

}

elseif ($opcion=="nota_envio") {
	# code...

	$foto=$_FILES['notaEn']['name'];
$ruta=$_FILES['notaEn']['tmp_name'];
$extension=$_FILES['notaEn']['type'];
$destino="../artes_esa17/".$foto;
$res = $mysqli->query("update logiticass SET nota_envio='".$foto."' where id_orden='".$id."'");

copy($ruta, $destino);

}


elseif ($opcion=="duca_f") {
		$foto=$_FILES['duca']['name'];
$ruta=$_FILES['duca']['tmp_name'];
$extension=$_FILES['duca']['type'];
$destino="../artes_esa17/".$foto;
$res = $mysqli->query("update logiticass SET duca_f='".$foto."' where id_orden='".$id."'");
copy($ruta, $destino);
	# code...
}

elseif ($opcion=="orden") {

		$foto=$_FILES['orden']['name'];
$ruta=$_FILES['orden']['tmp_name'];
$extension=$_FILES['orden']['type'];
$destino="../artes_esa17/".$foto;
$res = $mysqli->query("update logiticass SET orden_compra='".$foto."' where numorden_compra='".$num."'");
copy($ruta, $destino);
	# code...
}
elseif ($opcion=="carta") {

		$foto=$_FILES['carta']['name'];
$ruta=$_FILES['carta']['tmp_name'];
$extension=$_FILES['carta']['type'];
$destino="../artes_esa17/".$foto;
$res = $mysqli->query("update logiticass SET carta_p='".$foto."' where id_orden='".$id."'");
copy($ruta, $destino);
	# code...
}
elseif ($opcion=="manifiesto") {

		$foto=$_FILES['manifiesto']['name'];
$ruta=$_FILES['manifiesto']['tmp_name'];
$extension=$_FILES['manifiesto']['type'];
$destino="../artes_esa17/".$foto;
$res = $mysqli->query("update logiticass SET m_carga='".$foto."' where id_orden='".$id."'");
copy($ruta, $destino);
	# code...
}
elseif ($opcion=="duca_t") {

		$foto=$_FILES['duca_t']['name'];
$ruta=$_FILES['duca_t']['tmp_name'];
$extension=$_FILES['duca_t']['type'];
$destino="../artes_esa17/".$foto;
$res = $mysqli->query("update logiticass SET duca_t='".$foto."' where id_orden='".$id."'");
copy($ruta, $destino);
	# code...
}


elseif ($opcion=="guia") {

		$foto=$_FILES['guia']['name'];
$ruta=$_FILES['guia']['tmp_name'];
$extension=$_FILES['guia']['type'];
$destino="../artes_esa17/".$foto;
$res2 = $mysqli->query("update logiticass SET guia_aerea='".$foto."' where id_orden='".$id."'");
copy($ruta, $destino);
	# code...
}




elseif ($opcion=="comprobante") {

		$foto=$_FILES['comprobante']['name'];
$ruta=$_FILES['comprobante']['tmp_name'];
$extension=$_FILES['comprobante']['type'];
$destino="../artes_esa17/".$foto;
$res2 = $mysqli->query("update logiticass SET comprobante_entrega='".$foto."' where id_orden='".$id."'");
copy($ruta, $destino);
	# code...
}


elseif ($opcion=="factura_aereo") {

		$foto=$_FILES['factura_aereo']['name'];
$ruta=$_FILES['factura_aereo']['tmp_name'];
$extension=$_FILES['factura_aereo']['type'];
$destino="../artes_esa17/".$foto;
$res2 = $mysqli->query("update logiticass SET factura='".$foto."' where id_orden='".$id."'");
copy($ruta, $destino);
	# code...
}


elseif ($opcion=="orden_aereo") {

		$foto=$_FILES['orden_aereo']['name'];
$ruta=$_FILES['orden_aereo']['tmp_name'];
$extension=$_FILES['orden_aereo']['type'];
$destino="../artes_esa17/".$foto;
$res2 = $mysqli->query("update logiticass SET orden_compra='".$foto."' where id_orden='".$id."'");
copy($ruta, $destino);
	# code...
}
elseif ($opcion=="fauca") {

		$foto=$_FILES['duca_t']['name'];
$ruta=$_FILES['duca_t']['tmp_name'];
$extension=$_FILES['duca_t']['type'];
$destino="../artes_esa17/".$foto;
$res = $mysqli->query("update logiticass SET duca_f='".$foto."' where id_orden='".$id."'");
copy($ruta, $destino);
	# code...
}
elseif ($opcion=="nota_remision_HH") {

		$foto=$_FILES['nota_remision_HH']['name'];
$ruta=$_FILES['nota_remision_HH']['tmp_name'];
$extension=$_FILES['nota_remision_HH']['type'];
$destino="../artes_esa17/".$foto;
$res2 = $mysqli->query("update logiticass SET nota_remision_HH='".$foto."' where id_orden='".$id."'");
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
    window.location.href="../noeditar_logistica.php?id='.$id.'";
    </script>';

		
		
	


}

elseif ($res2==true) {

	echo'<script type="text/javascript">
    alert("Documentos subidos correctamente");
    window.location.href="../noeditar_logistica.php?id='.$id.'";
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
$res = $mysqli->query("update logiticass SET factura='".$foto."' where id_orden='".$id."'");
copy($ruta, $destino);
	# code...
}
elseif ($opcion=="nota_envio_cd") {
	# code...

	$foto=$_FILES['nota']['name'];
$ruta=$_FILES['nota']['tmp_name'];
$extension=$_FILES['nota']['type'];
$destino="../artes_esa17/".$foto;
$res = $mysqli->query("update logiticass SET nota_envio_cd='".$foto."' where id_orden='".$id."'");

copy($ruta, $destino);

}
elseif ($opcion=="nota_envio") {
	# code...

	$foto=$_FILES['notaEn']['name'];
$ruta=$_FILES['notaEn']['tmp_name'];
$extension=$_FILES['notaEn']['type'];
$destino="../artes_esa17/".$foto;
$res = $mysqli->query("update logiticass SET nota_envio='".$foto."' where id_orden='".$id."'");

copy($ruta, $destino);

}

elseif ($opcion=="duca_f") {
		$foto=$_FILES['duca']['name'];
$ruta=$_FILES['duca']['tmp_name'];
$extension=$_FILES['duca']['type'];
$destino="../artes_esa17/".$foto;
$res = $mysqli->query("update logiticass SET duca_f='".$foto."' where id_orden='".$id."'");
copy($ruta, $destino);
	# code...
}

elseif ($opcion=="orden") {

		$foto=$_FILES['orden']['name'];
$ruta=$_FILES['orden']['tmp_name'];
$extension=$_FILES['orden']['type'];
$destino="../artes_esa17/".$foto;
$res = $mysqli->query("update logiticass SET orden_compra='".$foto."' where id_orden='".$id."'");
copy($ruta, $destino);
	# code...
}
elseif ($opcion=="carta") {

		$foto=$_FILES['carta']['name'];
$ruta=$_FILES['carta']['tmp_name'];
$extension=$_FILES['carta']['type'];
$destino="../artes_esa17/".$foto;
$res = $mysqli->query("update logiticass SET carta_p='".$foto."' where id_orden='".$id."'");
copy($ruta, $destino);
	# code...
}
elseif ($opcion=="manifiesto") {

		$foto=$_FILES['manifiesto']['name'];
$ruta=$_FILES['manifiesto']['tmp_name'];
$extension=$_FILES['manifiesto']['type'];
$destino="../artes_esa17/".$foto;
$res = $mysqli->query("update logiticass SET m_carga='".$foto."' where id_orden='".$id."'");
copy($ruta, $destino);
	# code...
}
elseif ($opcion=="duca_t") {

		$foto=$_FILES['duca_t']['name'];
$ruta=$_FILES['duca_t']['tmp_name'];
$extension=$_FILES['duca_t']['type'];
$destino="../artes_esa17/".$foto;
$res = $mysqli->query("update logiticass SET duca_t='".$foto."' where id_orden='".$id."'");
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
    window.location.href="../editar_logistica_ni.php?id='.$id.'";
    </script>';

		
		
	


}

else{
	echo "ha ocurrido un error";

	echo $opcion;
}

}







?>