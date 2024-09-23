<?php
session_start();	
	/* Connect To Database*/
require_once ("../conexion_ajax.php");

	session_start();
$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
if($action == 'ajax'){
	$query = mysqli_real_escape_string($con,(strip_tags($_REQUEST['query'], ENT_QUOTES)));

	$tables="articulo_cuchilla";
	$campos="*";
	$sWhere=" articulo_cuchilla.nombre_articulo LIKE '%".$query."%' and estado=1";
	$sWhere.=" order by articulo_cuchilla.id_articulo desc ";
	
	
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
	


		
	
	if ($numrows>0){
		
	?>

		<div class="table-responsive">
			<table class="table table-striped table-hover">
				<thead class="bg-primary">
					<tr>
						<!--<th class='text-left'>ID</th>-->
						<th class='text-left'>CATEGORIA</th>
						<th class='text-left'>CODIGO</th>
						<th class='text-left'>CANTIDAD</th>
						<th class='text-center'>ACCIONES</th>	
					</tr>
				</thead>
				<tbody>	
						<?php 
						$finales=0;
						session_start();
						$nivel=$_SESSION['nivel'];
                        $tipo="original";
                        $server=$_SERVER['SERVER_ADDR'];
        				$year="19";
        				//$nivel="1";
        				$tipo="original";
        				
						while($row = mysqli_fetch_array($query)){
							$id_articulo=$row['id_articulo'];
							$categoria=$row['categoria'];
							$nombre_articulo=$row['nombre_articulo'];
							$cantidad=$row['cantidad'];
							$descripcion=$row['descripcion'];
							$estado=$row['estado'];
							
							$modal=$id_articulo;
							$modal2="#".$id_articulo;

							$modalx="s".$id_articulo;
							$modalx2="#s".$id_articulo;

							$modalxx="a".$id_articulo;
							$modalxx2="#a".$id_articulo;

							$finales++;
							 //$archive="../browser/elfinder6x.php?year=20".$_SESSION['year']."&empresa=".$row['empresa']."&marca=".$row['marca']."&proyecto=".$row['nombre']."&nivel=".$nivel."&tipo=".$tipo."&base=".$base;
						?>	


						<tr>
						    <?
                               $queryz = mysqli_query($con,"SELECT * FROM  categoria_cuchilla where idcategoria='".$categoria."'");
                               while($rowz = mysqli_fetch_array($queryz)){
                                   $categoria=$rowz['categoria'];
                               }
						    ?>
							<!--<td><?php echo $id_articulo;?></td>-->
							<td width="150px"><?php echo $categoria;?></td>
							<td width="125px"><?php echo $nombre_articulo;?></td>
							<td width="25px"><?php echo $cantidad;?></td>
							
							 <!--<td class='text-center'><a data-fancybox data-options='{"data-backdrop":"static", "type" : "iframe", "iframe" : {"preload" : false } }' href="<? echo $archive; ?>" class="btn bg-success"><i class="far fa-folder"></i></a></td>-->
							<td align="left">								
								<button type="button" class="btn btn-success" data-toggle="modal" data-target="<?echo $modalxx2;?>">INGRESAR</button>
								<button type="button" class="btn btn-warning" data-toggle="modal" data-target="<?echo $modalx2;?>">DESCARGAR</button>
								<button type="button" class="btn btn-danger" data-toggle="modal" data-target="<?echo $modal2;?>">ELIMINAR</button>
								<!--<a href="<? echo $modal2;?>" class="delete" data-toggle="modal" data-id="<?php echo $id_articulo;?>"><i class="material-icons" data-toggle="tooltip" title="Eliminar">&#xE872;</i></a>-->

							    
								<!--<a href="#"  data-target="#editProductModal" class="edit" data-toggle="modal" data-code='100' data-name="200" data-category="300" data-stock="<?php echo $prod_qty?>" data-price="<?php echo $price;?>" data-id="<?php echo $product_id; ?>"><i class="material-icons" data-toggle="tooltip" title="Editar" >&#xE254;</i>
								</a>-->
								<!--MODAL DESCARGA-->
								<div class="modal fade" id="<?echo $modalx;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
								  <div class="modal-dialog" role="document">
								    <div class="modal-content">
								      <div class="modal-header">
								        <h5 class="modal-title" id="exampleModalLabel">MODAL DESCARGA</h5>
								        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
								          <span aria-hidden="true">&times;</span>
								        </button>
								      </div>
								      <div class="modal-body">
								        <form action="ajax/descargar_cuchillas.php" method="POST" enctype="multipart/form-data">
								          <div class="form-group">
								          	<input type="hidden" class="form-control" id="recipient-name" name="accion" value="descarga">
								          	
								            <label for="recipient-name" class="col-form-label">Cantidad:</label>
								            <input type="text" class="form-control" id="recipient-name" name="cantidad">
								          </div>
								          <div class="form-group">
								            <label for="message-text" class="col-form-label">Detalle de uso:</label>
								            <textarea class="form-control" id="message-text" name="descripcion"></textarea>
								          </div>
								          <div class="modal-footer">
									        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
									        <button type="submit" class="btn btn-primary">Descargar</button>
									      </div>
									      <input type="hidden" name="id" value="<? echo $row['id_articulo'];?>">
									      <input type="hidden" name="codigo" value="<? echo $row['$nombre_articulo'];?>">
								        </form>
								      </div>
								      
								    </div>
								  </div>
								</div>
			<!--FIN DE MODAL DESCARGA-->
			
			<!--MODAL DE INGRESO-->
			  <div class="modal fade" id="<?echo $modalxx;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					  <div class="modal-dialog" role="document">
							  <div class="modal-content">
									  <div class="modal-header">
								  	  <h5 class="modal-title" id="exampleModalLabel">MODAL INGRESO</h5>
								  	  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
								    	  <span aria-hidden="true">&times;</span>
								  	  </button>
									  </div>
									  <div class="modal-body">
								  	  <form action="ajax/descargar_cuchillas.php" method="POST" enctype="multipart/form-data">
								    	<div class="form-group">
								     	  <input type="hidden" class="form-control" id="recipient-name" name="accion" value="ingreso">
								     	  
								      	  <label for="recipient-name" class="col-form-label">Cantidad a Ingresar:</label>
								      	  <input type="text" class="form-control" id="recipient-name" name="cantidad">
								    	</div>
								    	
								    	<div class="modal-footer">
									  	  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
									  	  <button type="submit" class="btn btn-primary">Ingresar</button>
										</div>
										  <input type="hidden" name="id" value="<? echo $row['id_articulo'];?>">
										  <input type="hidden" name="codigo" value="<? echo $row['$nombre_articulo'];?>">
								  	  </form>
									  </div>
								      
							  </div>
					  </div>
			  </div>
			<!--FIN DE MODAL INGRESO-->
                    		</td>
						</tr>
            <tr>
                        <div id="<?echo $modal;?>" class="modal fade">
							<div class="modal-dialog">
								<div class="modal-content">
									<form action="delete_artcuchilla.php" method="POST" >
										<div class="modal-header">						
											<h4 class="modal-title">Borrar temporalmente articulo</h4>
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
										</div>
										<div class="modal-body">					
											<p>¿Seguro que quieres eliminar este articulo?</p>
											<p class="text-warning"><small>RECUERDA QUE PUEDES DESHACER ESTA ACCION</small></p>
											<input type="hidden" name="id" value="<? echo $row['id_articulo'];?>">
										</div>
										<div class="modal-footer">
											<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
											<a href="ajax/delete_artcuchilla.php?id=<? echo $row['id_articulo'];?>">
												<input type="submit" class="btn btn-danger" value="Eliminar">
											</a>
										</div>
									</form>
								</div>
							</div>
						</div>

				<!--MODAL DESCARGAR-->
		            <!--<div id="<?echo $modalxx;?>" class="modal fade">
						<div class="modal-dialog">
							<div class="modal-content">
								<form action="descargar_cuchillas.php" method="POST">
									<div class="modal-header">						
										<h4 class="modal-title">Borrar</h4>
										<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
									</div>
									<div class="modal-body">					
										<p>¿Seguro?</p>
										<p class="text-warning"><small>descargar cuchilla</small></p>
										<input type="hidden" name="id" value="<?echo $row['id_articulo'];?>">
										<button type="submit">enviar</button>
									</div>
									<div class="modal-footer">
										<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
										<a href="ajax/descargar_cuchillas.php?id=<? echo $row['id_articulo'];?>"><input type="submit" class="btn btn-danger" value="Eliminar"></a>
									</div>
								</form>
							</div>
						</div>
					</div>-->

				<!--FIN DE MODAL-->
		

			</tr>
	
						<?php }?>
						<tr>
							<td colspan='6'> 
								<?php 
									$inicios=$offset + 1;
									$finales+=$inicios - 1;
									echo "Mostrando $inicios al $finales de $numrows registros";
									echo paginate( $page, $total_pages, $adjacents);
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
		  
