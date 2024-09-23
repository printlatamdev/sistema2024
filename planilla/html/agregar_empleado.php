<?php

if(!empty($_POST)){
	if(isset($_POST["n_marcacion"]) &&isset($_POST["nombre"]) &&isset($_POST["apellido"]) &&isset($_POST["dui"]) &&isset($_POST["direccion"])&& isset($_POST["email"]) &&isset($_POST["telefono"]) &&isset($_POST["f_nacimiento"]) &&isset($_POST["sueldo"]) &&isset($_POST["n_isss"]) &&isset($_POST["n_afp"]) &&isset($_POST["n_cuenta"]) &&isset($_POST["area"]) &&isset($_POST["cargo"])&&isset($_POST["tipo_planilla"])){
		if($_POST["nombre"]!=""&& $_POST["apellido"]!=""&&$_POST["dui"]!=""){
			include "conexion.php";
          
          $renta=0;

			
			$sql = "insert into empleados(id_area,id_cargo, id_tipo_planilla, codigo_marcacion, nombre, apellido, dui, email, telefono, f_nacimiento, sueldo,n_isss, n_afp,renta, cuenta) value (\"$_POST[area]\",\"$_POST[cargo]\",\"$_POST[tipo_planilla]\",\"$_POST[n_marcacion]\",\"$_POST[nombre]\",\"$_POST[apellido]\",\"$_POST[dui]\",\"$_POST[email]\",\"$_POST[telefono]\",\"$_POST[f_nacimiento]\",\"$_POST[sueldo]\",\"$_POST[n_isss]\",\"$_POST[n_afp]\",\"$renta\",\"$_POST[n_cuenta]\")";
			$query = $con->query($sql);
			if($query==true){
				print "<script>alert(\"Agregado exitosamente.\");window.location='../ver.php';</script>";
			}else{
				print "<script>alert(\"No se pudo agregar.\");window.location='../ver.php';</script>";

			}
		}
	}
}


?>