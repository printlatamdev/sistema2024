<? include('connect.php');
   $conexion = conexion();
   $id_orden="146";
   $item= "FACTURA"; 
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset = "utf-8">
	<title> Mi página </title>
    <!-- -->
    <!--CSS DE BOOTSTRAP VERSION 4.3.1 -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<!--FIN DE CSS DE BOOTSTRAP -->
	
	<!-- CSS DE FANCYBOX 3.2.1-->
	<link rel = "stylesheet" type = "text / css" href = "jquery.fancybox.min.css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/fancybox/3.2.1/jquery.fancybox.min.js"></script>
	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fancybox/3.2.1/jquery.fancybox.min.css" media="screen">
	<!-- FIN DE CSS DE FANCYBOX -->
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<STRONG>ADMINISTRACION<? echo $id_orden; echo $item;?></STRONG>
			</div>
		</div>
		<div class="row">
			
				<? $imagenes = mysqli_query($conexion, "select  * from pop_documentos where orden='146' and tipo ='FACTURA'");

        
                 while($row = mysqli_fetch_assoc($imagenes)){ ?>
                 	    				<div class="col-xs-1" > 
                                            <a href="<? echo $row['documento']; ?>" data-fancybox="images" data-caption="My caption">
                                              <img src="<? echo $row['documento']; ?>" alt="" style="max-width: 120px;" />
                                            </a> 
                                        </div>
                                                                     
                                                              <?  }  ?>
				
		</div>
		<div class="row">
			<div class="add col-md-12">
				<div class="d-flex justify-content-center">
			      <div class="btn btn-mdb-color btn-rounded float-left bg">
			        <span>ADD</span>
			        <input type="file" name="filedata">
			      </div>
			    </div>
			</div>
		</div>
		
	</div>
    <!--JS DE BOOTSTRAP VERSION 4.3.1 -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<!--FIN DE JS DE BOOTSTRAP -->
	<!-- JS DE FANCYBOX 3.4.1-->
	<script src = "https://code.jquery.com/jquery-3.4.1.min.js"> </script>
	<script src = "jquery.fancybox.min.js"> </script>
	<!-- FIN DE JS DE FANCYBOX-->

</body>
</html