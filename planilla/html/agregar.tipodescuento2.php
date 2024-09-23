<?php

if(!empty($_POST)){
	if(isset($_POST["tipo_descuento"])){
		if($_POST["tipo_descuento"]!=""){
			include "conexion.php";
			
			$sql = "insert into tipo_descuento(tipo) value (\"$_POST[tipo_descuento]\")";
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