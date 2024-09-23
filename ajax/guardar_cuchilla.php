<?php
	if (empty($_POST['categoria'])){
		$errors[] = "Ingresa el nombre del proyecto.";
	} elseif (!empty($_POST['categoria'])){
    	require_once ("../conexion_ajax.php");//Contiene funcion que conecta a la base de datos
    	// escaping, additionally removing everything that could be (html/javascript-) code
        $categoria = mysqli_real_escape_string($con,(strip_tags($_POST["categoria"],ENT_QUOTES)));
        $estado=1;

        $sql = "INSERT INTO categoria_cuchilla(categoria, estado) VALUES ('$categoria','$estado')";
        $query = mysqli_query($con,$sql);

            if ($query) {
            	 $old = umask(0); 
                 umask($old);
                                   
                $messages[] = "Categoria Guardada.";
            } else {
                $errors[] = "Ha sucedido un error, contactar al administrador";
            }

	} else {
		$errors[] = "desconocido.";
	}


    if (isset($errors)){ ?>
	  <div class="alert alert-danger" role="alert">
		 <button type="button" class="close" data-dismiss="alert">&times;</button>
			<strong>Error!</strong> 
			  <?php
				foreach ($errors as $error) {
				  echo $error;
				}
			  ?>
	  </div>
	<?php }
		if (isset($messages)){ ?>
			<div class="alert alert-success" role="alert">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				<strong>¡Bien hecho!</strong>
				  <?php
					 foreach ($messages as $message) {
						echo $message;
					 } ?>
			</div>
		<?php } ?>			