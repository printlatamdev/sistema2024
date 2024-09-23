<?php
session_start();

/* Connect To Database*/
require_once("../conexion_ajax.php");

$action = (isset($_REQUEST['action']) && $_REQUEST['action'] != NULL) ? $_REQUEST['action'] : '';
if ($action == 'ajax') {
	$query = mysqli_real_escape_string($con, (strip_tags($_REQUEST['query'], ENT_QUOTES)));
	$anio = '22';
	$tables = "pop_proyecto";
	$campos = "*";
	$sWhere = " pop_proyecto.nombre LIKE '%" . $query . "%' and estado=1";
	$sWhere .= " order by pop_proyecto.id_proyecto desc ";


	include 'pagination.php'; //include pagination file
	//pagination variables
	$page = (isset($_REQUEST['page']) && !empty($_REQUEST['page'])) ? $_REQUEST['page'] : 1;
	$per_page = intval($_REQUEST['per_page']); //how much records you want to show
	$adjacents  = 4; //gap between pages after number of adjacents
	$offset = ($page - 1) * $per_page;
	//Count the total number of row in your table*/
	$count_query   = mysqli_query($con, "SELECT count(*) AS numrows FROM $tables where $sWhere");
	// echo 'Done: '."SELECT count(*) AS numrows FROM $tables where $sWhere";
	if ($row = mysqli_fetch_array($count_query)) {
		$numrows = $row['numrows'];
	} else {
		echo mysqli_error($con);
	}


	$total_pages = ceil($numrows / $per_page); # Antes $per_page2
	//main query to fetch the data
	$query = mysqli_query($con, "SELECT $campos  FROM  $tables where $sWhere LIMIT $offset,$per_page");
	//loop through fetched data





	if ($numrows > 0) {

?>
		<div class="table-responsive" style="margin-left: -30PX;">
			<table class="table table-striped table-hover">
				<thead class="bg-primary">
					<tr>


						<th class='text-left' width="300">CAMPAÑA</th>
						<th class='text-center'>FECHA </th>
						<th class='text-center'>CLIENTE</th>
						<th class='text-right'>MARCA</th>
						<th class='text-center'>DATA</th>
						<th class='text-right'>ACCIONES</th>

					</tr>
				</thead>
				<tbody>
					<?php
					$finales = 0;
					session_start();
					$nivel = $_SESSION['nivel'];
					$tipo = "original";
					$server = $_SERVER['SERVER_ADDR'];
					//$year="19";
					//$nivel="1";
					$tipo = "original";

					while ($row = mysqli_fetch_array($query)) {

						$nombre = $row['nombre'];
						$fecha = $row['fecha'];
						$empresa = $row['empresa'];
						$marca = $row['marca'];
						$estado = $row['estado'];
						$modal = $id_proyecto;
						$modal2 = "#" . $id_proyecto;
						$finales++;
						$archive = "../sistema2024/browser/elfinder6x6.php?year=2023" . "&empresa=" . $row['empresa'] . "&marca=" . $row['marca'] . "&proyecto=" . $row['nombre'] . "&nivel=" . $nivel . "&tipo=" . $tipo . "&base=" . $base;
					?>

						<tr class="<?php echo $text_class; ?>">

							<td width="400"><?php echo $nombre; ?></td>
							<td><?php echo $fecha; ?></td>
							<td class='text-center'><?php echo $empresa; ?></td>
							<td class='text-right'><?php echo $marca; ?></td>
							<td class='text-center'><a data-fancybox data-options='{"data-backdrop":"static", "type" : "iframe", "iframe" : {"preload" : false } }' href="<? echo $archive; ?>" class="btn bg-success"><i class="far fa-folder"></i></a></td>
							<td align="center">

								<a href="<? echo $modal2; ?>" class="delete" data-toggle="modal" data-id="<?php echo $product_id; ?>"><i class="material-icons" data-toggle="tooltip" title="Eliminar">&#xE872;</i></a>
							</td>
						</tr>
						<div id="<? echo $modal; ?>" class="modal fade">
							<div class="modal-dialog">
								<div class="modal-content">
									<form action="finalizar_od.php" method="POST">
										<div class="modal-header">
											<h4 class="modal-title">Borrar temporalmente OD</h4>
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
										</div>
										<div class="modal-body">
											<p>¿Seguro que quieres eliminar este registro?</p>
											<p class="text-warning"><small>RECUERDA QUE PUEDES DESHACER ESTA ACCION</small></p>
											<input type="hidden" name="id" value="<? echo $row['id_proyecto']; ?>">
										</div>
										<div class="modal-footer">
											<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
											<a href="ajax/finalizar_od.php?id=<? echo $row['id_proyecto']; ?>"><input type="submit" class="btn btn-danger" value="Eliminar"></a>
										</div>
									</form>
								</div>
							</div>
						</div>

					<?php } ?>
					<tr>
						<td colspan='6'>
							<?php
							$inicios = $offset + 1;
							$finales += $inicios - 1;
							echo "Mostrando $inicios al $finales de $numrows registros";
							echo paginate($page, $total_pages, $adjacents);
							?>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
<?php
	}
}
?>