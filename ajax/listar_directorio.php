<?php
session_start();

/* Connect To Database*/
require_once("../conexion_ajax.php");
$nivel = $_SESSION["nivel"];

$action = (isset($_REQUEST['action']) && $_REQUEST['action'] != NULL) ? $_REQUEST['action'] : '';
if ($action == 'ajax') {
	$query = mysqli_real_escape_string($con, (strip_tags($_REQUEST['query'], ENT_QUOTES)));

	$tables = "contacto";
	$campos = "*";
	$sWhere = " contacto.nombre LIKE '%" . $query . "%'";
	$sWhere .= " order by contacto.id_contacto desc ";


	include 'pagination.php'; //include pagination file
	//pagination variables
	$page = (isset($_REQUEST['page']) && !empty($_REQUEST['page'])) ? $_REQUEST['page'] : 1;
	$per_page = intval($_REQUEST['per_page']); //how much records you want to show
	$adjacents  = 4; //gap between pages after number of adjacents
	$offset = ($page - 1) * $per_page;
	//Count the total number of row in your table*/
	$count_query   = mysqli_query($con, "SELECT count(*) AS numrows FROM $tables where $sWhere");
	if ($row = mysqli_fetch_array($count_query)) {
		$numrows = $row['numrows'];
	} else {
		echo mysqli_error($con);
	}


	$total_pages = ceil($numrows / $per_page);
	//main query to fetch the data
	$query = mysqli_query($con, "SELECT $campos  FROM  $tables where $sWhere LIMIT $offset,$per_page");
	//loop through fetched data





	if ($numrows > 0) {

?>
		<div class="table-responsive" style="margin-left: -30PX;">
			<table class="table table-striped table-hover">
				<thead class="bg-primary">
					<tr>

						<th class='text-center'>NOMBRE</th>
						<th class='text-center'>TELEFONO</th>
						<th class='text-center'>CELULAR</th>
						<th class='text-center'>EMAIL</th>
						<th class='text-center'>EMPRESA</th>
						<th class='text-center'>ACCIONES</th>

					</tr>
				</thead>
				<tbody>
					<?php
					$finales = 0;
					while ($row = mysqli_fetch_array($query)) {
						$nombre = $row['nombre'];
						$telefono = $row['telefono'];
						$celular = $row['celular'];
						$email = $row['email'];
						$id_contacto = $row['id_contacto'];
						$id_empresa = $row['id_empresa'];

						$finales++;

						$query2 = mysqli_query($con, "SELECT *  FROM  empresa where id_empresa='" . $id_empresa . "' ");
						while ($row2 = mysqli_fetch_array($query2)) {
							$empresa = $row2['nombre'];
						}
					?>
						<tr class="<?php echo $text_class; ?>">


							<td class='text-left' style="width: 300px"><?php echo (mb_strtoupper($nombre)); ?></td>
							<td class='text-center'><?php echo $telefono; ?></td>
							<td class='text-center'><?php echo $celular; ?></td>
							<td class='text-center'><?php echo (mb_strtoupper($email)); ?></td>
							<td class='text-center'><?php echo (mb_strtoupper($empresa)); ?></td>
							<td class='text-center'>


								<? if ($nivel == 1 || $nivel == 2) {
									# code...
								?>

									<div class="col-md-12">
										<a href="save.contacto.php?id=<? echo $id_contacto ?>" class="btn btn-danger"><i class="fas fa-user-times" style="color: #ffff;"></i></a>
									</div>

								<? } else { ?>
									<div class="col-md-12">
										<a data-toggle="modal" data-target="#no" class="btn btn-danger"><i class="fas fa-user-times" style="color: #ffff;"></i></a>
									</div>
								<? } ?>
							</td>


							<!--<td class='text-center'><a data-fancybox data-options='{"data-backdrop":"static", "type" : "iframe", "iframe" : {"preload" : false } }' href="<? echo $archive; ?>" class="btn bg-success"><i class="far fa-folder"></i></a></td>
							<td>
								<a href="#"  data-target="#editProductModal" class="edit" data-toggle="modal" data-code='<?php echo $prod_code; ?>' data-name="<?php echo $prod_name ?>" data-category="<?php echo $prod_ctry ?>" data-stock="<?php echo $prod_qty ?>" data-price="<?php echo $price; ?>" data-id="<?php echo $product_id; ?>"><i class="material-icons" data-toggle="tooltip" title="Editar" >&#xE254;</i></a>
								<a href="#deleteProductModal" class="delete" data-toggle="modal" data-id="<?php echo $product_id; ?>"><i class="material-icons" data-toggle="tooltip" title="Eliminar">&#xE872;</i></a>
                    		</td>-->
						</tr>
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


<div id="no" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form name="delete_product" id="delete_product">
				<div class="modal-header">
					<h2 class="modal-title">ACCIÓN NO PERMITIDA!</h2>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">
					<H4>
						<p>Lo sentimos, esta opcion no esta habilitada por motivos de seguridad.</p>
					</H4>
					<p class="text-warning"><small>gracias.</small></p>
					<input type="hidden" name="delete_id" id="delete_id">
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Salir">

				</div>
			</form>
		</div>
	</div>
</div>