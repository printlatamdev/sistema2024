<div id="deleteProductModals" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form name="delete_product" id="delete_product">
					<div class="modal-header">						
						<h4 class="modal-title">Eliminar Producto</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">					
						<p>¿Seguro que quieres eliminar este registro?</p>
						<p class="text-warning"><small>Esta acción no se puede deshacer.</small></p>
						<input type="text" name="delete_id" value="<? echo $row['id_proyecto'];?>">
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
						<input type="submit" class="btn btn-danger" value="Eliminar">
					</div>
				</form>
			</div>
		</div>
	</div>

	<div id="deleteProductModal2" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form name="delete_product" id="delete_product">
					<div class="modal-header">						
						<h4 class="modal-title">Eliminar Cotizacion</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">					
						<p>Lo sentimos, esta opcion no esta habilitada por motivos de seguridad.</p>
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