<?php

if(!empty($_POST)){
	if(isset($_POST["tipo_bonificacion"])){
		if($_POST["tipo_bonificacion"]!=""){
			include "conexion.php";
			
			$sql = "insert into tipo_bonificacion(tipo) value (\"$_POST[tipo_bonificacion]\")";
			$query = $con->query($sql);
			if($query!=null){
				print "<script>alert(\"Agregado exitosamente.\");window.location='../areas.php';</script>";
			}else{
				print "<script>alert(\"No se pudo agregar.\");window.location='../areas.php';</script>";

			}
		}
	}
}



?>