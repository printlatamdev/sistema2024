<?php
	
	/* Connect To Database*/
	require_once ("../conexion_ajax.php");

	
$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
if($action == 'ajax'){
	$query = mysqli_real_escape_string($con,(strip_tags($_REQUEST['query'], ENT_QUOTES)));

	$tables="expedientes";
	$campos="*";
	$sWhere=" expedientes.nombres LIKE '%".$query."%' and estado=1";
	$sWhere.=" order by expedientes.id_expediente desc ";
	
	
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
		<div class="table-responsive" style="margin-left: -30PX;">
			<table class="table table-striped table-hover">
				<thead class="bg-primary">
					<tr>

						<th class='text-center' width="100">NOMBRE</th>
						
						<th class='text-center'>CONTRATACION </th>
						<th class='text-center'>DEPARTAMENTO</th>
						
						<th class='text-center'>EMPRESA</th>
						<th class='text-center'>DUI</th>
						<th class='text-center'>NIT</th>
						<th class='text-center'>AFP</th>
						<th class='text-center'>ACCIONES</th>
						<th class='text-center'>GENERAR</th>
						
						
					</tr>
				</thead>
				<tbody>	
						<?php 
						$finales=0;
						while($row = mysqli_fetch_array($query)){	
							$id_expediente=$row['id_expediente'];
							$nombres=$row['nombres'];
							$apellidos=$row['apellidos'];
							$contratacion=$row['contratacion'];
							$departamento=$row['departamento'];
							$area=$row['area'];
							$salario=$row['salario'];
							$cuenta=$row['cuenta'];
							$empresa=$row['empresa'];
							$dui=$row['dui'];
							$nit=$row['nit'];
							$afp=$row['afp'];
							$seguro=$row['seguro'];
							$email=$row['email'];
							$telefono=$row['telefono'];
							$carpeta=$row['carpeta'];

							$finales++;
							
							
						?>	
						<tr class="<?php echo $text_class;?>">
							<td class='text-left' width="300px"><?php echo (mb_strtoupper($nombres." ".$apellidos));?></td>
								
							<td class='text-center'><?php echo $contratacion;?></td>
							<td class='text-center' ><?php echo (mb_strtoupper($departamento));?></td>
							
							<td class='text-center'><?php echo (mb_strtoupper($empresa));?></td>
							<td class='text-center'><?php echo $dui;?></td>
							<td class='text-center'><?php echo $nit;?></td>
							<td class='text-center'><?php echo $afp;?></td>
							<td>
								<div class="col-md-12">
								   <div class="col-md-6">
									<a href="expediente_perfil2.php?id_expediente=<? echo $id_expediente?>" class="btn btn-success"><i class="fas fa-user-edit" style="color: #ffff;"></i></a>
	                               </div>
	                               <div class="col-md-6">
									<a href="expediente.sql.php?id_expediente=<? echo $id_expediente?>&bandera=15" class="btn btn-danger"><i class="fas fa-user-times" style="color: #ffff;"></i></a>
								   </div>
								</div>
                            <td>
                            	<div class="col-md-12">
									<a href="expediente.sql.php?id_expediente=<? echo $id_expediente?>&bandera=13&carpeta=<? echo $carpeta?>" class="btn btn-info"><i class="fas fa-file-pdf" style="color: #ffff;"></i></a>
								</div>
                            </td> 
								
							</td>
                    		</td>
							
							 <!--<td class='text-center'><a data-fancybox data-options='{"data-backdrop":"static", "type" : "iframe", "iframe" : {"preload" : false } }' href="<? echo $archive; ?>" class="btn bg-success"><i class="far fa-folder"></i></a></td>
							<td>
								<a href="#"  data-target="#editProductModal" class="edit" data-toggle="modal" data-code='<?php echo $prod_code;?>' data-name="<?php echo $prod_name?>" data-category="<?php echo $prod_ctry?>" data-stock="<?php echo $prod_qty?>" data-price="<?php echo $price;?>" data-id="<?php echo $product_id; ?>"><i class="material-icons" data-toggle="tooltip" title="Editar" >&#xE254;</i></a>
								<a href="#deleteProductModal" class="delete" data-toggle="modal" data-id="<?php echo $product_id;?>"><i class="material-icons" data-toggle="tooltip" title="Eliminar">&#xE872;</i></a>
                    		</td>-->
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
	}	
}
?>          
		  
