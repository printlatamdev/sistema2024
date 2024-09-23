<?
    $bd=$base.$anio;
	$host="localhost";

	$database="nica20";

	$username="admin";  

	$password="";

	$mysqli = new mysqli($host, $username, $password, $database);
	if ($mysqli->connect_errno) {
	    echo "No se puede conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
	}

                $rsx=$mysqli->query("SELECT * FROM tablapromotor ");
                $cantidad = 3;
								//$rowcount=mysqli_num_rows($rs);
				
				               //while 
				               while ($filax = $rsx->fetch_row()) { $codigo=$filax[2];}

				               if (empty($codigo)) {
				               	echo "no hay ningun codigo<br>";
				               }
				                $nums = preg_replace('/[^0-9]/', '', $codigo);
								//$letters = preg_replace('/[^a-zA-Z]/', '', $codigo);
								$letras = "PROM"; 
								$log_code="";
								$fechaa=date("Y-m-d h:i:s");
					 
								for ($x = 1; $x <= $cantidad; $x++) {
	 
								$nums=$nums + 1;
								$nums2=str_pad($nums, 5, "0", STR_PAD_LEFT);  
								$cod=$letras.$nums2;
								echo $cod."<br>";
								$mat="PROMOTOR DE ADHESIVO";
								$est="ACTIVO";
								//$rs2=$mysqli->query("INSERT INTO tinta( tipo, color, codigo, ingreso, estado) VALUES ('$tipo_tinta', '$color_tinta', '$cod', '".date("Y-m-d h:i:s")."', 'Bodega')");
								//$log_code.=$tipo_tinta." - ".$color_tinta." - ".$cod."<br>";
                                

                                //INSERTANDO CODIGOS 
								$rsi=$mysqli->query("INSERT INTO tablapromotor(material, codigo, estado,fechaingreso) VALUES ('".$mat."', '".$cod."','".$est."', '".$fechaa."')");

							}
?>