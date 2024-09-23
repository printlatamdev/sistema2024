<?php

 include ('../connect.php');
//$con = conexion();
 include("../session.php");

 $id_prueba= $_GET["id"];


 


	//include ('../connect.php');
     $estado=1;
               $fecha =date('Y-m-d ');
$res2 = $mysqli->query("UPDATE pop_prueba_proyecto SET estado='".$estado."' where id_prueba='".$id_prueba."'");

if($res2==true){

  
    

echo'<script type="text/javascript">
    alert("LA POD HA SIDO MODIFICADA");
    window.location.href="../pruebas_activas.php";
    </script>';

		
		
	


}

else{
	echo "ha ocurrido un error";
}






?>