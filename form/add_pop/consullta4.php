<?php
session_start();

$id_orden = $_REQUEST['id_detalle'] ?? null;

$base = $_SESSION['base'] ?? '';
$anio = $_SESSION['year'] ?? '';
$bd = $base . $anio;

$conexion = mysqli_connect('localhost', 'admin', 'AG784512', $bd);
if (!$conexion) {
	die('Could not connect: ' . mysqli_error($conexion));
}

$mysqli = new mysqli('localhost', 'admin', 'AG784512', $bd);
if ($mysqli->connect_errno) {
	echo "No se puede conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
	exit();
}

$id_pliego = $_REQUEST['id_pliego'] ?? ''; // Assuming you're passing 'id_pliego' in the request.
$show_pliegos = $mysqli->query("SELECT * FROM pop_pliego WHERE id_detalle='$id_orden'");

?>
<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Datos de Pliegos</title>
	<!-- Bootstrap (Ensure you include Bootstrap CSS) -->
	<style>
		.content {
			margin-top: 80px;
		}
		.letragrande {
			font-size: 12px;
		}
	</style>
</head>

<body>
	<div class="table-responsive">
		<table class="letragrande" style="border:2px;">
			<thead class="bg-primary">
				<tr>
					<th width="50px">Orden</th>
					<th width="200px"><b style="margin-left: 80px;">Pliego</b></th>
					<th width="50px">Editar</th>
					<th width="50px">Borrar</th>
				</tr>
			</thead>
			<tbody>
				<?php if ($id_orden && $show_pliegos->num_rows > 0) { ?>
					<?php while ($row = $show_pliegos->fetch_assoc()) { ?>
						<tr>
							<td><?= htmlspecialchars($row['id_orden_detalle']) ?></td>
							<td><?= htmlspecialchars($row['pliego']) ?></td>
							<td>
								<a href="../../sistema2024/form4.php?id=<?= htmlspecialchars($row['id_orden']) ?>&id_detalle=<?= htmlspecialchars($id_orden) ?>&id_detalle_pliego=<?= htmlspecialchars($row['id_detalle_pliego']) ?>" title="Editar datos" class="btn btn-primary btn-sm">
									<span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
								</a>
							</td>
							<td>
								<a href="../../sistema2024/form/nueva_pop/delete_pliego.php?id=<?= htmlspecialchars($row['id_orden']) ?>&id_detalle=<?= htmlspecialchars($id_orden) ?>&id_detalle_pliego=<?= htmlspecialchars($row['id_detalle_pliego']) ?>" title="Eliminar" onclick="return confirm('¿Está seguro de borrar los datos de <?= htmlspecialchars($row['nombres']) ?>?')" class="btn btn-danger btn-sm">
									<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
								</a>
							</td>
						</tr>
					<?php } ?>
				<?php } else { ?>
					<tr>
						<td colspan="4">Selecciona un mueble para ver pliegos</td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
</body>

</html>
