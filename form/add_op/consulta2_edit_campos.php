<?

 session_start(); 
 

    $base=$_SESSION['base'];
 //$anio=$_SESSION['year'];
    $anio=22;
$bd=$base.$anio;

$conexion = mysqli_connect('localhost','root','',''.$bd.'');
if (!$conexion) {
    die('Could not connect: ' . mysqli_error($conexion));
}

mysqli_select_db($conexion,''.$bd.'');

$host="localhost";

	$database=$bd;

	$username="admin";  

	$password="";

	$mysqli = new mysqli($host, $username, $password, $database);
	if ($mysqli->connect_errno) {
	    echo "No se puede conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
	}
	$mysqli = new mysqli($host, $username, $password, $database);
	//2-comsulta de mostrar si hay item existentes

	

 	$sql=$mysqli->query("select*from campos_detalle where id_orden='".$filamo['id_orden']."'");

?>
<!DOCTYPE html>
<html lang="es">
<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Datos de empleados</title>

	<!-- Bootstrap -->
	

	<style>
		.content {
			margin-top: 80px;
		}
	</style>
	<style type="text/css">
  
      .letragrande{font-size:12px;}
</style>

</head>
<body>


<div class="table-responsive">


<table  class="letragrande" style="border:2px;">
	 <thead class="bg-primary">
				<tr><th width="50px">Item</th>
                    <th width="50px">Orden</th>
                    <th width="200px" ><b style="margin-left: 80px;">Mueble</b></th>
					<th width="50px">Editar</th>
					<th width="50px">Borrar</th>
				</tr></thead>
				<?php
				
					$no = 1;
					while($row =  mysqli_fetch_array($sql)){
						echo '

						<tr>
							<td>'.$no.'</td>
							<td>'.$row['id_orden'].'</td>
							
                            <td >'.$row['trabajo'].'</td>';
							
							
						echo '
							</td>
							<td>

								<a href="../../sistema2024/formop3_campos.php?id_detalle_orden='.$row['id_detalle_orden'].'" title="Editar datos" class="btn btn-primary btn-sm"><span  class="glyphicon glyphicon-edit" aria-hidden="true" ></span></a></td><td>
								<a href="../../sistema2024/form/nueva_pop/delete_item_pop.php?id='.$row['id_detalle_orden'].'" title="Eliminar" onclick="return confirm(\'Esta seguro de borrar los datos '.$row['nombres'].'?\')" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
							</td>
						</tr>
						';
						$no++;
					
				}
				?>
			</table></div></div></div></body></html>

				