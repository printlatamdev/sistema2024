<?
  
        include("suministros/connect.php");
   session_start(); 
   $id=$_SESSION['id'];
        if ($_REQUEST['flag']==0) {


                                //$id=trim($_POST['id']);
        	                    $fecha=trim($_POST['fecha']);
								$cliente=trim(strtoupper($_POST['cliente']));
								$nota=trim($_POST['nota']);
								$resultado=trim($_POST['resultado']);
								$hora=date("d/m/Y - h:i:s a");
								
								  
								$rs=$mysqli->query("INSERT INTO log_ventas (id_vendedor, fecha, cliente, nota, resultado, hora) VALUES ('".$id."', '".$fecha."', '".$cliente."', '".$nota."', '".$resultado."', '".$hora."')");    

								 $mysqli->close();
							
								  ?>		    
								  <script>
									  window.parent.location='reporte.ventas.php';
								  </script>
								  <?  	

        	
        }elseif ($_REQUEST['flag']==1) {


                                $id=trim($_POST['id']);
                                $det=trim($_POST['det']);
        	                    $fecha=trim($_POST['fecha']);
								$cliente=trim(strtoupper($_POST['cliente']));
								$nota=trim($_POST['nota']);
								$resultado=trim($_POST['resultado']);
								
								  
								 $rs=$mysqli->query("UPDATE `log_ventas` SET `fecha`='".$fecha."', `cliente`='".$cliente."', `nota`='".$nota."', `resultado`='".$resultado."' WHERE id_sales='$det'");
  

								 $mysqli->close();
							
								  ?>		    
								  <script>
									  window.parent.location='reporte.ventas.php';
								  </script>
								  <?  	

        	
        } elseif ($_REQUEST['flag']==2) {


			$id=trim($_POST['id']);
			$originalDate = $_POST['fecha'];
            $fecha = date("Y-m-d", strtotime($originalDate));
	
			$nombre=$_POST['nombre'];
			$monto=trim($_POST['monto']);
			
			
			  
			$rs=$mysqli->query("INSERT INTO log_ventas_facturacion (fecha, id_vendedor,  nombre, monto) VALUES ( '".$fecha."', '".$id."', '".$nombre."', '".$monto."')");    

			 $mysqli->close();
		
			  ?>		    
			  <script>
				  window.parent.location='reporte.ventas.facturacion.php';
			  </script>
			  <?  	


        }
            
?>