<?php

if(!empty($_POST)){
	if(isset($_POST["name"])){
		if($_POST["name"]!=""){
			include "conexion.php";
			
			$sql = "insert into area(area) value (\"$_POST[name]\")";
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