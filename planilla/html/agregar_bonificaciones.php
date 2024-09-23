<?php

if(!empty($_POST)){

if (trim($_POST["diurnas"]||$_POST["nocturnas"]) == false) {

$diurnas=0;
$nocturnas=0;

  
 }else{
 	$diurnas=$_POST["diurnas"];
$nocturnas=$_POST["nocturnas"];

 }

   


	if(isset($_POST["empleado"]) &&isset($diurnas) &&isset($_POST["detalle"]) &&isset($_POST["tipo_bonificacion"])  &&isset($nocturnas) ){

		if($_POST["empleado"]!=""){
			include "conexion.php";
	




$tipo_bonificacion=$_POST["tipo_bonificacion"];
$id_empleado=$_POST["empleado"];

$monto_dependiendo=$_POST["m"];










 $sql2 = "select*from empleados where id_empleado='".$id_empleado."'";
			$query2 = $con->query($sql2);

			 while($r = mysqli_fetch_assoc($query2)){

				$sueldo=$r["sueldo"];


                   
			}

				if ($tipo_bonificacion==1) {
					$id_tipo_bonificacion=$tipo_bonificacion;




				




                  
			
					 $precio_dia_d=$sueldo/30;
					 $monto_hora_d=$precio_dia_d/4;
					 $monto_total_sindescuento_d=$monto_hora_d*$diurnas;
					 $isss_d=$monto_total_sindescuento_d*0.03;
					 $afp_d=$monto_total_sindescuento_d*0.0725;

					 $monto_total_d=$monto_total_sindescuento_d-$isss_d-$afp_d;

					
			
				


							 $precio_dia_n=$sueldo/30;
					 $monto_hora_n=$precio_dia_n/4;

					 $monto_total_sin_n=$monto_hora_n*$nocturnas;
					 $monto_total_sindescuento_n=$monto_total_sin_n*1.25;
					  $isss_n=$monto_total_sindescuento_n*0.03;
					 $afp_n=$monto_total_sindescuento_n*0.0725;

					 $monto_total_n=$monto_total_sindescuento_n-$isss_n-$afp_n;

                     $monto_total_sindescuento=$monto_total_sindescuento_n+$monto_total_sindescuento_d;
					 $monto_total=$monto_total_n+$monto_total_d;
					 $isss=$isss_n+$isss_d;
					 $afp=$afp_n+$afp_d;

			

		


       
			
           


           


			$sql = "insert into bonificacion(id_empleado,id_tipo_bonificacion,horas_extras_diurnas,horas_extras_nocturnas,monto,isss,afp,total_pagar, detalle) value (\"$_POST[empleado]\",\"$_POST[tipo_bonificacion]\",\"$_POST[diurnas]\",\"$_POST[nocturnas]\",\"$monto_total_sindescuento\",\"$isss\",\"$afp\",\"$monto_total\",\"$_POST[detalle]\")";
			$query = $con->query($sql);











			if($query!=null){
				print "<script>alert(\"Agregado exitosamente.\");window.location='../periodo.php';</script>";
			}else{
				print "<script>alert(\"No se pudo agregar.\");window.location='../periodo.php';</script>";

			}






				}else{

					//$id_tipo_bonificacion=$tipo_bonificacion;


					$isss=$monto_dependiendo*0.03;
					$afp=$monto_dependiendo*0.0725;
					$monto_total_sindescuento=$monto_dependiendo;
					$monto_total=$monto_dependiendo-$isss-$afp;


                    if (trim($_POST['diurnas']||$_POST['nocturnas']) == false) {

                     $diurnas=0;
                     $nocturnas=0;

  
                         }
 
               









			$sql = "insert into bonificacion(id_empleado,id_tipo_bonificacion,horas_extras_diurnas,horas_extras_nocturnas,monto,isss,afp,total_pagar, detalle) value (\"$_POST[empleado]\",\"$_POST[tipo_bonificacion]\",\"$diurnas\",\"$nocturnas\",\"$monto_total_sindescuento\",\"$isss\",\"$afp\",\"$monto_total\",\"$_POST[detalle]\")";
			$query = $con->query($sql);






				}






















		}
	}
}


?>