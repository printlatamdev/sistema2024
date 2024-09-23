


$

<!-- link para buscador -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/css/bootstrap-select.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/js/bootstrap-select.min.js"></script>

<script type="text/javascript">
	$("#addCatCuchilla").find("input,textarea,select").val("");
    $("#addCatCuchilla input[type='checkbox']").prop('checked', false).change();
</script>

<div id="addCatCuchilla" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form name="accesorio" id="accesorio">
					<div class="modal-header">						
						<h4 class="modal-title">Agregar Nuevo Accesorio </h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">

						
						<div class="form-group">
							<label>Categoria</label>
							<select class="form-select form-control" aria-label="Default select example" name="categoria">
							  <option selected>Seleccione la Categoria</option>
							  <?php

                                    include("suministros/connect.php");
                                    
                                    $rs=$mysqli->query("SELECT * FROM articulo_cuchilla where id_articulo='".$id_articulo."'");

                                       while ($fila = $rs->fetch_row()) { 
                                       	$cantidad
                                       	echo '<option value="'.$fila[0].'">'.$fila[1].'</option>';  
                                       }

                                    $mysqli->close();

                                ?>
							</select>	
						</div>
						<div class="form-group">
							<label>Articulo</label>
							<input type="text" class="form-control" name="articulo">
						</div>
						<div class="form-group">
							<label>Cantidad</label>
							<input type="text" class="form-control" name="cantidad">
						</div>
						<div class="form-group">
							<label>Descripcion</label>
							<textarea class="form-control" name="descripcion"></textarea>
						</div>
						<!--<div class="form-group">
							<label>Categoria</label>
							<input type="text" class="form-control" name="categoria">
						</div>-->
					</div>
					<div class="modal-footer">
						<button class="btn btn-default" data-dismiss="modal">Cancelar</button> 
						<button type="submit" class="btn btn-success">Guardar datos</button>
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