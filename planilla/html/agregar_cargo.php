<?php

if(!empty($_POST)){
	if(isset($_POST["cargo"])){
		if($_POST["cargo"]!=""){
			include "conexion.php";
			
			$sql = "insert into cargos(cargo) value (\"$_POST[cargo]\")";
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