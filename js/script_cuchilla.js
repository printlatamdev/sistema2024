	//AQUI ESTA CARGANDO LOS DATOS A LA TABLA 
		$(function() {
			load(1);
		});
		function load(page){
			var query=$("#q").val();
			var per_page=10;
			var parametros = {"action":"ajax","page":page,'query':query,'per_page':per_page};
			$("#loader").fadeIn('slow');
			$.ajax({
				url:'ajax/listar_cuchilla.php',
				data: parametros,
				 beforeSend: function(objeto){
				$("#loader").html("Cargando...");
			  },
				success:function(data){
					$(".outer_div").html(data).fadeIn('slow');
					$("#loader").html("");
				}
			})
		}



		$('#editProductModal').on('show.bs.modal', function (event) {
		  var button = $(event.relatedTarget) // Button that triggered the modal
		  var code = button.data('data-code') 
		  $('#edit_code').val(code)
		  var name = button.data('data-name') 
		  $('#edit_name').val(name)
		  var category = button.data('category') 
		  $('#edit_category').val(category)
		  var stock = button.data('stock') 
		  $('#edit_stock').val(stock)
		  var price = button.data('price') 
		  $('#edit_price').val(price)
		  var id = button.data('id') 
		  $('#edit_id').val(id)
		})
		
		$('#deleteProductModal').on('show.bs.modal', function (event) {
		  var button = $(event.relatedTarget) // Button that triggered the modal
		  var id = button.data('id') 
		  $('#delete_id').val(id)
		})
		
		
		$( "#edit_product" ).submit(function( event ) {
		  var parametros = $(this).serialize();
			$.ajax({
					type: "POST",
					url: "ajax/editar_producto.php",
					data: parametros,
					 beforeSend: function(objeto){
						$("#resultados").html("Enviando...");
					  },
					success: function(datos){
					$("#resultados").html(datos);
					load(1);
					$('#editProductModal').modal('hide');
				  }
			});
		  event.preventDefault();
		});
		
		$( "#add_cats" ).submit(function( event ) {
		  var parametros = $(this).serialize();
			$.ajax({
					type: "POST",
					url: "ajax/guardar_cuchilla.php",
					data: parametros,
					 beforeSend: function(objeto){
						$("#resultados").html("Enviando...");
					  },
					success: function(datos){
					$("#resultados").html(datos);
					load(1);
					
					$("#addCatCuchillas").find("input,textarea,select").val("");
                    $("#addCatCuchillas input[type='checkbox']").prop('checked', false).change();

					$('#addCatCuchillas').modal('hide');
				  }
			});
		  event.preventDefault();
		});
		
		$( "#accesorio" ).submit(function( event ) {
		  var parametros = $(this).serialize();
			$.ajax({
					type: "POST",
					url: "ajax/guardar_accesorio.php",
					data: parametros,
					 beforeSend: function(objeto){
						$("#resultados").html("Enviando...");
					  },
					success: function(datos){
					$("#resultados").html(datos);
					load(1);
					
					$("#addCatCuchilla").find("input,textarea,select").val("");
                    $("#addCatCuchilla input[type='checkbox']").prop('checked', false).change();
					$('#addCatCuchilla').modal('hide');
				  }
			});
		  event.preventDefault();
		});

		$( "#descarga" ).submit(function( event ) {
		  var parametros = $(this).serialize();
			$.ajax({
					type: "POST",
					url: "ajax/descargar_accesorio.php",
					data: parametros,
					 beforeSend: function(objeto){
						$("#resultados").html("Enviando...");
					  },
					success: function(datos){
					$("#resultados").html(datos);
					load(1);
					
					$("#desCuchilla").find("input,textarea,select").val("");
                    $("#desCuchilla input[type='checkbox']").prop('checked', false).change();
					$('#desCuchilla').modal('hide');
				  }
			});
		  event.preventDefault();
		});

		
		
		/*$( "#delete_product" ).submit(function( event ) {
		  var parametros = $(this).serialize();
			$.ajax({
					type: "POST",
					url: "ajax/eliminar_producto.php",
					data: parametros,
					 beforeSend: function(objeto){
						$("#resultados").html("Enviando...");
					  },
					success: function(datos){
					$("#resultados").html(datos);
					load(1);
					$('#deleteProductModal').modal('hide');
				  }
			});
		  event.preventDefault();
		});*/