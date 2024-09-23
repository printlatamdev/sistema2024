<?php

 include ('connect_nica.php');
$con = conexion();



$id= $_REQUEST["id"];







$estado=0;


  $res= mysqli_query($con,"UPDATE pop_documentos SET link='0' where id_documento='".$id."'");




if($res==true){


echo'<script type="text/javascript">
    alert("Documento eliminado correctamente");
     window.location.href="../../logistica_nc2.php";
    </script>';

		
		
	


}

else{
	echo "ha ocurrido un error";

	echo $id;
}








?>