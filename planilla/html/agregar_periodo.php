<?php

if(!empty($_POST)){
	if(isset($_POST["mes"])){
		if($_POST["mes"]!=""){
			include "conexion.php";
          $mes=$_POST["mes"];
			$quincena=$_POST["quincena"];



			  $n_mes=$_POST["n_mes"];
			$n_quincena=$_POST["n_quincena"];
			
          


          $sql2 = "select*from periodo where mes='".$mes."' and quincena='".$quincena."'";
			$query2 = $con->query($sql2);

			if ($query2->num_rows>0) {
				print "<script>alert(\"Este periodo ya ha sido creado anteriormente.\");window.location='../periodo.php';</script>";
			
			}
			else{
			


$periodo23= "select*from periodo order by id_periodo desc LIMIT 1 ";
$periodo_estado23 = $con->query($periodo23);

while ($r723=$periodo_estado23->fetch_array()):
 $id_periodo73=$r723["id_periodo"];
endwhile;
$new_estado=0;
 $update = "update periodo set estado=\"$new_estado\" where id_periodo=".$id_periodo73;
            $update2 = $con->query($update);



			$sql = "insert into periodo(mes,nombre_mes,quincena,n_quincena) value (\"$mes\",\"$n_mes\",\"$quincena\",\"$n_quincena\")";
			$query = $con->query($sql);

$borrar_m = "delete from marcacion";
			$borrado_m = $con->query($borrar_m);

$borrar_min = "delete from min_tarde";
			$borrado_min = $con->query($borrar_min);









			if($query!=null){


      $periodo_u= "select*from periodo order by id_periodo desc LIMIT 1 ";
$periodo_estadou = $con->query($periodo_u);

while ($r723u=$periodo_estadou->fetch_array()):
 $id_periodou=$r723u["id_periodo"];
endwhile;


  $tipo_planilla= "select*from tipo_planilla order by id_tipo_planilla asc ";
$tipo_planilla2 = $con->query($tipo_planilla);

while ($planilla=$tipo_planilla2->fetch_array()):

 $id_tipo_p=$planilla["id_tipo_planilla"];
$estado=1;
$sql = "insert into pago_planilla(id_tipo_planilla,id_periodo,estado) value (\"$id_tipo_p\",\"$id_periodou\",\"$estado\")";
			$query = $con->query($sql);





endwhile;












				print "<script>alert(\"Agregado exitosamente.\");window.location='../periodo.php';</script>";
			}else{
				print "<script>alert(\"No se pudo agregar.\");window.location='../periodo.php';</script>";

			}
		}
	}
}

}

?>