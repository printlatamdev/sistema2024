<?php

 include ('connect.php');
$con = conexion();



$id= $_POST["id"];
//$factura= $_POST["factura"];


//echo $id, $opcion;




$factura=$_FILES['factura']['name'];
$facturas=$id."_facturas_".$factura;
$ruta=$_FILES['factura']['tmp_name'];
$extension=$_FILES['factura']['type'];
$tipo="FACTURA";
//<img src="../../ORDENES_POP/313/ARTES_313/pliego_488_90.jpg">
$destino="../../ORDENES_POP/EL SALVADOR/".$id."/DOCUMENTOS_ORDEN_".$id."/".$facturas;
copy($ruta, $destino);

  $res= mysqli_query($con,"INSERT INTO pop_documentos (orden,tipo,documento) values ('".$id."','".$tipo."','".$facturas."')");




if($res==true){


echo'<script type="text/javascript">
    alert("Documentos subidos correctamente");
    window.location.href="../../produccion_doc.php";
    </script>';

		
		
	


}

else{
	echo "ha ocurrido un error";

	echo $id.$tipo.$facturas;
}








?>