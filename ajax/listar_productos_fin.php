<?php
	
	/* Connect To Database*/
	require_once ("../conexion_ajax.php");

	session_start();
$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
if($action == 'ajax'){
	$query = mysqli_real_escape_string($con,(strip_tags($_REQUEST['query'], ENT_QUOTES)));

	$tables="pop_proyecto";
	$campos="*";
	$sWhere=" pop_proyecto.nombre LIKE '%".$query."%' and estado=0";
	$sWhere.=" order by pop_proyecto.id_proyecto desc ";
	
	
	include 'pagination.php'; //include pagination file
	//pagination variables
	$page = (isset($_REQUEST['page']) && !empty($_REQUEST['page']))?$_REQUEST['page']:1;
	$per_page = intval($_REQUEST['per_page']); //how much records you want to show
	$adjacents  = 4; //gap between pages after number of adjacents
	$offset = ($page - 1) * $per_page;
	//Count the total number of row in your table*/
	$count_query   = mysqli_query($con,"SELECT count(*) AS numrows FROM $tables where $sWhere");
	if ($row= mysqli_fetch_array($count_query)){$numrows = $row['numrows'];}
	else {echo mysqli_error($con);}


	$total_pages = ceil($numrows/$per_page);
	//main query to fetch the data
	$query = mysqli_query($con,"SELECT $campos  FROM  $tables where $sWhere LIMIT $offset,$per_page");
	//loop through fetched data
	


		
?>
		<div class="table-responsive" style="margin-left: -30PX;">
			<table class="table table-striped table-hover">
				<thead class="bg-red">
					<tr>

						<th class='text-left' width="100">OD</th>
						<th class='text-left' width="300">CAMPAÑA </th>
						<th class='text-center'>FECHA </th>
						<th class='text-center'>CLIENTE</th>
						<th class='text-right'>MARCA</th>
						<th class='text-center'>DATA</th>
						<th class='text-right'>ACCIONES</th>
						
					</tr>
				</thead>
				<tbody>	<?	
	if ($numrows>0){
		
	?>
						<?php 
						$finales=0;
						      $nivel=$_SESSION['nivel'];

                                               $tipo="original";
						while($row = mysqli_fetch_array($query)){	
							$id_proyecto=$row['id_proyecto'];
							$nombre=$row['nombre'];
							$fecha=$row['fecha'];
							$empresa=$row['empresa'];
							$marca=$row['marca'];
							$estado=$row['estado'];						
							$finales++;
							 $archive="browser/elfinder6.php?year=20".$_SESSION['year']."&empresa=".$row['empresa']."&marca=".$row['marca']."&proyecto=".$row['nombre']."&nivel=".$nivel."&tipo=".$tipo;
						?>	

<div id="delete" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form action="finalizar_od.php" method="POST">
					<div class="modal-header">						
						<h4 class="modal-title">ACTIVAR OD</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">					
						<p>¿Seguro que quieres activar OD?</p>
						<p class="text-warning"><small>RECUERDA QUE PUEDES DESHACER ESTA ACCION</small></p>
						<input type="hidden" name="id" value="<? echo $row['id_proyecto'];?>">
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
						<a href="ajax/activar_od.php?id=<? echo $row['id_proyecto'];?>"><input type="submit" class="btn btn-danger" value="Activar"></a>
					</div>
				</form>
			</div>
		</div>
	</div>












						<tr class="<?php echo $text_class;?>">
							<td class='text-center' width=""><?php echo $id_proyecto;?></td>
							<td ><?php echo $nombre;?></td>
							<td ><?php echo $fecha;?></td>
							<td class='text-center' ><?php echo $empresa;?></td>
							<td class='text-right'><?php echo $marca;?></td>
							 <td class='text-center'><a data-fancybox data-options='{"data-backdrop":"static", "type" : "iframe", "iframe" : {"preload" : false } }' href="<? echo $archive; ?>" class="btn bg-success"><i class="far fa-folder"></i></a></td>
							<td>
								
								<a  data-target="#delete" class="delete" data-toggle="modal" data-id="<?php echo $product_id;?>"><i class="material-icons" data-toggle="tooltip" title="Eliminar">unarchive</i></a>
                    		</td>
						</tr>
						<?php }?>
						<tr>
							<td colspan='6'> 
								<?php 
									$inicios=$offset+1;
									$finales+=$inicios -1;
									echo "Mostrando $inicios al $finales de $numrows registros";
									echo paginate( $page, $total_pages, $adjacents);
								?>
							</td>
						</tr>
				</tbody>			
			</table>
		</div>	

	
	
	<?php	
	}	else{ echo '<tr><td colspan="8">No hay datos.</td></tr>';}
}
?>          
		  
