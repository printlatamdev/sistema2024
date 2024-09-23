




<div id="addProductModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form name="add_product" id="add_product">
					<div class="modal-header">						
						<h4 class="modal-title">Agregar Nueva Orden de Diseño</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">



					<!-- SELECT CON BUSCADOR EJEMPLO

                     <select class="selectpicker"  data-live-search="true" >
                            <option value="Laravel">Laravel</option>
                            <option value="Symfony">Symfony</option>
                            <option value="Codeigniter">Codeigniter</option>
                            <option value="CakePHP">CakePHP</option>
                            <option value="Zend">Zend</option>
                            <option value="Yii">Yii</option>
                            <option value="Slim">Slim</option>
                        </select>

                        ABARCA EL SCRIPT-->
                        

						<div class="form-group">
									
          <select name="cliente" id="cliente"   class="selectpicker form-control" data-live-search="true">
            
            <option value="" >Seleccione Cliente.</option>
                 
                          <option value="hh"> </option>
                                  
                                         

                                         

          </select>
							
						</div><br><br>
						<div class="form-group">
							  <select name="marca" id="marca"  class="selectpicker form-control" data-live-search="true" required="required" >

            <option value="">Seleccione Marca</option>
            <? while ($filax = mysqli_fetch_array($marca))
                                   {
                                           ?>
                          <option value="<? echo $filax[0];?>"> <? echo $filax[1];?></option>
                                  
                                         

                                          <?}?>

          </select>
						</div><br><br>
						<div class="form-group">
							<label>Nombre Proyecto</label>
							<textarea  name="proyecto" id="proyecto" class="form-control" required></textarea> 
						</div>
					
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
						<input type="submit" class="btn btn-success" value="Guardar datos">
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