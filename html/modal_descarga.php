




<!-- link para buscador -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/css/bootstrap-select.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/js/bootstrap-select.min.js"></script>



<div id="desCuchilla" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form name="descarga" id="descarga">
					<div class="modal-header">						
						<h4 class="modal-title">Descarga de Accesorios</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">

						
						<div class="form-group">
							<label>Accesorio a descargar</label>
							<select class="form-select form-control" aria-label="Default select example" name="categoria">
							   <option selected>Seleccione el accesorio</option>
							  <?php

                                    include("suministros/connect.php");
                                    
                                    $rs=$mysqli->query("SELECT * FROM articulo_cuchilla");

                                       while ($fila = $rs->fetch_row()) { echo '<option value="'.$fila[0].'">'.$fila[2].'</option>'; }

                                    $mysqli->close();

                                ?>
							</select>	
						</div>
						
						<div class="form-group">
							<label>Cantidad</label>
							<input type="text" class="form-control" name="cantidad">
						</div>
						<div class="form-group">
							<label>Descripcion</label>
							<textarea class="form-control" name="descripcion"></textarea>
						</div>
					</div>
					<div class="modal-footer">
						<button class="btn btn-default" data-dismiss="modal">Cancelar</button> 
						<button type="submit" class="btn btn-success">Guardar Datos</button>
					</div>
					
				</form>
			</div>
		</div>
	</div>
	<script type="text/javascript">
		$('.modal').on('hidden.bs.modal', function(){ 
		$(this).find('form')[0].reset(); //para borrar todos los datos que tenga los input, textareas, select.
		$("label.error").remove();  //lo utilice para borrar la etiqueta de error del jquery validate
	    });
	</script>