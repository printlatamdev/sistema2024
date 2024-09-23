<?
    session_start();

    $usuario=$_SESSION['vsNombre'];
  
        include("suministros/connect.php");
  
		$total=trim($_POST['total']);
		$item=trim($_POST['item']);
		$orden=trim($_POST['orden']);
		$opcion=trim($_POST['opcion']);


		$trabajo=trim($_POST['trabajo']);
		$pieza=trim($_POST['pieza']);
		$cantidad=trim($_POST['cantidad']);
		$defecto=trim($_POST['defecto']);
		$observacion=trim($_POST['observacion']);
		$responsable=trim($_POST['responsable']);
		$areatrabajo=trim($_POST['areatrabajo']);
		//$=trim($_POST['']);

		$fecha=date("d-m-Y");
        
        


		//$credito=trim($_POST['credito']);

        
		if ($opcion=="ctotal") {
			$rs=$mysqli->query("UPDATE pop_detalle SET totaldesperfecto=".$total." WHERE id_detalle_orden='$item' ");?>

			<script>
				  window.parent.location='lista_pop_nueva_prueba.php';
			  </script>
		<?}elseif ($opcion=="cdetalle") {

			$rs=$mysqli->query("INSERT INTO detalle_desperfecto (id_orden, id_detalle_orden, trabajo, pieza, cantidad, defecto, observacion, responsable, fecha, area, usuario) VALUES ('".$orden."', '".$item."', '".$trabajo."', '".$pieza."', '".$cantidad."', '".$defecto."', '".$observacion."', '".$responsable."', '".$fecha."', '".$areatrabajo."', '".$usuario."')");
			    
			$num=$mysqli->affected_rows;
			 if ($num==1) {
			 	
									           	
									            $mysqli->close();
										
											  echo'<script type="text/javascript">
												    alert("Insertado Correctamente");
												    window.location.href="lista_pop_nueva_prueba.php";
												    </script>'; 		 


									           } else {
									           	
									           	
									            $mysqli->close();
										
											  		    
											  
												  echo'<script type="text/javascript">
													    alert("Error al insertar");
													    window.location.href="lista_pop_nueva_prueba.php";
													    </script>';
											  


									           }
		}

		

		    //$rs2=$mysqli->query("SELECT *  FROM proveedor WHERE nombre='$upername' ");
          

         	   $mysqli->close();


         	  ?>		    
			  
			  