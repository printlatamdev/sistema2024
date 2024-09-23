<?php



if(!empty($_POST)){
	if(isset($_POST["empleado"]) &&isset($_POST["tipo_descuento"]) &&isset($_POST["detalle"]) &&isset($_POST["monto"]) &&isset($_POST["cuotas"])&& isset($_POST["forma_pago"]) &&isset($_POST["f_inicio"]) &&isset($_POST["f_fin"])){
		if($_POST["empleado"]!=""&& $_POST["tipo_descuento"]!=""&&$_POST["monto"]!=""){
			include "conexion.php";
          
          $monto=$_POST["monto"];
          $cuotas=$_POST["cuotas"];
          
          $monto_cuota=$monto/$cuotas;

			
			$sql = "insert into descuentos(id_empleado, id_tipo_descuento, detalle, monto,monto_restante,monto_cuota, cuotas, cuotas_restantes, tipo_cuota, fecha_inicio, fecha_fin) value (\"$_POST[empleado]\",\"$_POST[tipo_descuento]\",\"$_POST[detalle]\",\"$_POST[monto]\",\"$_POST[monto]\",\"$monto_cuota\",\"$_POST[cuotas]\",\"$_POST[cuotas]\",\"$_POST[forma_pago]\",\"$_POST[f_inicio]\",\"$_POST[f_fin]\")";
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