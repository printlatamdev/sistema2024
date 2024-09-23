<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<? 

	include ('connect.php');
    $conexion = conexion();

    //PRIMERA CONSULTA
	$sqla =mysqli_query($conexion,"select * from pop where id_orden='146'");
	while ($aa = mysqli_fetch_assoc($sqla)) {
		$idorden=$aa['id_orden'];
		//echo $idorden;?>
		<!--CODIGO HTML-->
		<table>
			<tr>
				<th>empresa</th>
				<th>orden</th>
				<th>trabajo</th>
				<th>od</th>
			</tr>
			<tr></tr>
			<tr>
				<td><?echo $aa['empresa'] ?></td>
				<td><?echo $aa['id_orden'] ?></td>
				<td><?echo $aa['nombre_proyecto'] ?></td>
				<td><?echo $aa['id_proyecto'] ?></td>
			</tr>
		</table>



		<?//SEGUNDA CONSULTA
		$sqlb =mysqli_query($conexion,"select * from pop_detalle where id_orden='145'");
			while ($ab = mysqli_fetch_assoc($sqlb)) {
				$iddetalle=$ab['id_detalle_orden'];
				//echo $iddetalle;?>
				<!--CODIGO HTML-->


                  <?//TERCER CONSULTA
				  $sqlc =mysqli_query($conexion,"select * from pop_pliego where id_detalle='".$iddetalle."'");
				         while ($ac = mysqli_fetch_assoc($sqlc)) {
				         	//echo $ac['empresa'];?>
				         	<!--CODIGO HTML-->

					
						<?}
				}
    }
 ?>

</body>
</html>