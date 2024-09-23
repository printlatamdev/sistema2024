<?php
include "conexion.php";



 $sql2 = "select DISTINCT a.id_min_tarde, a.id_empleado, a.min_manana, a.min_medio_dia, a.num_dias_trabajados, a.estado, b.id_empleado, b.nombre from min_tarde a INNER JOIN marcacion b on a.id_empleado=b.id_empleado";
			$query2 = $con->query($sql2);

			 while($r = mysqli_fetch_assoc($query2)){
                $cod_marcacion=$r["id_empleado"];
				$manana=$r["min_manana"];
				$medio_dia=$r["min_medio_dia"];
				$dias_trabajados=$r["num_dias_trabajados"];


				 $sql21 = "select*from empleados where codigo_marcacion='".$cod_marcacion."'";
			$query21 = $con->query($sql21);

while($r2 = mysqli_fetch_assoc($query21)){

          $id_empleado=$r2["id_empleado"];
           $nombre=$r2["nombre"];
            $sueldo=$r2["sueldo"];




//echo $id_empleado.$cod_marcacion.$nombre."<br><br>";



$descuento=$manana+$medio_dia;

if ($descuento>15) {


	$salario_dia=$sueldo/30;
	$salario_hora=$salario_dia/8;
	$salario_minutos=$salario_hora/60;
	$monto=$salario_minutos*$descuento;

	$id_tipo_descuento=1;
	$detalle="Descuento por minutos tarde";
	$monto_cuota=$monto;
	$cuotas=1;
	$tipo_cuota=01;
	$fecha_inicio=date('d/m/y');
	$fecha_fin=date('d/m/y');








				$insertar = "insert into descuentos(id_empleado,id_tipo_descuento,detalle,monto,monto_cuota,cuotas,cuotas_restantes,tipo_cuota,fecha_inicio, fecha_fin) value (\"$id_empleado\",\"$id_tipo_descuento\",\"$detalle\",\"$monto\",\"$monto_cuota\",\"$cuotas\",\"$cuotas\",\"$tipo_cuota\",\"$fecha_inicio\",\"$fecha_fin\")";
			$insertar_descuento = $con->query($insertar);




	if($insertar_descuento==true){

                    $periodo23= "select*from periodo order by id_periodo desc LIMIT 1 ";
$periodo_estado23 = $con->query($periodo23);

while ($r723=$periodo_estado23->fetch_array()):
 $id_periodo=$r723["id_periodo"];
endwhile;
$new_estado=2;
 $update = "update periodo set estado=\"$new_estado\" where id_periodo=".$id_periodo;
            $update2 = $con->query($update);

                


				print "<script>alert(\"Descuentos Agregados Exitosamente.\");window.location='../asignar_descuento.php';</script>";
			}else{
				print "<script>alert(\"Este periodo no contiene descuentos.\");window.location='../asignar_descuento.php';</script>";

			}


			

	
}








}




	}

?>