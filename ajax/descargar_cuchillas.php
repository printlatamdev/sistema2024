<?php

	session_start();
	$base = $_SESSION['base'];
	 //$anio=$_SESSION['year'];
    $anio=22;
	$bd = $base.$anio;
	$nombre = $_SESSION['vsNombre'];
	$fecha = date('d-m-Y');
	$accion = $_REQUEST['accion'];

		$con = mysqli_connect('localhost','admin','AG784512',''.$bd.'');
		if (!$con) {
		    die('Could not connect: '.mysqli_error($con));
		}

		mysqli_select_db($con,''.$bd.'');
        //$con = conexion();

		$id = $_REQUEST["id"];
		$cantidad = $_REQUEST["cantidad"];
		$descripcion = $_REQUEST["descripcion"];
		$ip=$_SERVER["REMOTE_ADDR"];
		$codigo = $_REQUEST['codigo'];

		

		/*$queryz = mysqli_query($con,"SELECT * FROM  categoria_cuchilla where idcategoria='".$categoria."'");
                               while($rowz = mysqli_fetch_array($queryz)){
                                   $categoria=$rowz['categoria'];
                               }*/

		$sqlcantidad = mysqli_query($con,"SELECT * FROM articulo_cuchilla where id_articulo='".$id."'");

		while($rows= mysqli_fetch_array($sqlcantidad)) {
           $cant1 = $rows['cantidad'];
		}
//*********************************************************************************************************
		if ($accion=="descarga") {
			if($cantidad < $cant1){
				$ncantidad = $cant1 - $cantidad;

				    $res = mysqli_query($con,"UPDATE articulo_cuchilla SET cantidad='".$ncantidad."' where id_articulo='".$id."'");
	                
	                $detalle="El usuario ".$nombre." ha descargado ".$cantidad." de la cuchilla con codigo ".$codigo." en la fecha ".$fecha." quedando en existencia la cantidad de ".$ncantidad;

				    $rs= mysqli_query($con,"INSERT INTO log_cuchillas(usuario, ip, detalle, fecha) VALUES('".$nombre."', '".$ip."', '".$detalle."', '".$fecha."')");

					if($res==true){
					  echo'<script type="text/javascript">
						alert("Descargado Correctamente");
						window.location.href="../cuchillas.php";
					  </script>';
					}else{
					  echo 'error';
					}
			}else{
				echo'<script type="text/javascript">
				    alert("La cantidad a descargar es mayor a la existencia, verifique y vuelva a intentarlo");
				    window.location.href="../cuchillas.php";
				   </script>';
			}
		} else if ($accion=="ingreso"){
			$ncantidad = $cant1 + $cantidad;
            
			$res = mysqli_query($con,"UPDATE articulo_cuchilla SET cantidad='".$ncantidad."' where id_articulo='".$id."'");

			$detalle="El usuario ".$nombre." ha ingresado ".$cantidad." de la cuchilla con codigo ".$codigo." en la fecha ".$fecha." quedando en existencia la cantidad de ".$ncantidad;

			$rs= mysqli_query($con,"INSERT INTO log_cuchillas(usuario, ip, detalle, fecha) VALUES('".$nombre."', '".$ip."', '".$detalle."', '".$fecha."')");
			if($res==true){
			    echo'<script type="text/javascript">
		          alert("Ingresado Correctamente");
				  window.location.href="../cuchillas.php";
				</script>';
			}else{
			   echo 'error';
			}

		}
		
		

		
?>