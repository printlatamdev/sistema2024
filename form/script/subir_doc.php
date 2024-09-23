<?


//echo $id.$doc;


 include ('connect.php');
$con = conexion();


$id=$_REQUEST['id'];
$doc=$_REQUEST['doc'];


$factura=$_FILES['documentos']['name'];
$facturas='POP_'.$id.'_'.$doc.'_'.$factura;

$ruta=$_FILES['documentos']['tmp_name'];
$extension=$_FILES['documentos']['type'];

//<img src="../../ORDENES_POP/313/ARTES_313/pliego_488_90.jpg">
$destino="../../ORDENES_POP/".$id."/DOCUMENTOS_ORDEN_".$id."/".$facturas;



copy($ruta, $destino);



  $res= mysqli_query($con,"INSERT INTO pop_documentos (orden,tipo,documento) values ('".$id."','".$doc."','".$facturas."')");




if($res==true){


echo'<script type="text/javascript">
    alert("Documentos subidos correctamente");
    window.location.href="../../produccion_doc.php";
    </script>';

		
		
	


}

else{
	echo "ha ocurrido un error";

	echo $id.$doc;



}




?>