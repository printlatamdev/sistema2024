


<? include('../suministros/connect.php') ?>

<!-- link para buscador -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/css/bootstrap-select.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/js/bootstrap-select.min.js"></script>

<script type="text/javascript">
	$("#addCatCuchilla").find("input,textarea,select").val("");
    $("#addCatCuchilla input[type='checkbox']").prop('checked', false).change();
</script>

<div id="addCatCuchillas" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form name="add_cats" id="add_cats">
					<div class="modal-header">						
						<h4 class="modal-title">Agregar Nueva Categoria</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">

						
						<div class="form-group">
							<label>Categoria</label>
							<input type="text" class="form-control" name="categoria">
						</div>
					
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