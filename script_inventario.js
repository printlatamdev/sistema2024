	
		$(function() {
			load(1);
		});
		function load(page){
			var query=$("#q").val();
			var per_page=20;
			var parametros = {"action":"ajax","page":page,'query':query,'per_page':per_page};
			$("#loader").fadeIn('slow');
			$.ajax({
				url:'listar_inventario.php',
				data: parametros,
				 beforeSend: function(objeto){
				$("#loader").html("");
			  },
				success:function(data){
					$(".outer_div").html(data).fadeIn('slow');
					$("#loader").html("");
				}
			})
		}


