<?php
	if (empty($_POST['proyecto'])){
		$errors[] = "Ingresa el nombre del proyecto.";
	} elseif (!empty($_POST['proyecto'])){
	require_once ("../conexion_ajax.php");//Contiene funcion que conecta a la base de datos
	// escaping, additionally removing everything that could be (html/javascript-) code
    $cliente = mysqli_real_escape_string($con,(strip_tags($_POST["cliente"],ENT_QUOTES)));
	$marca = mysqli_real_escape_string($con,(strip_tags($_POST["marca"],ENT_QUOTES)));
	$proyecto = mysqli_real_escape_string($con,(strip_tags($_POST["proyecto"],ENT_QUOTES)));
	//$stock = intval($_POST["stock"]);
	//$price = floatval($_POST["price"]);


	preg_match_all('/(\d)|(\w)/', $cliente, $matches); 

$id_c = implode($matches[1]); 
$cliente = implode($matches[2]); 

	preg_match_all('/(\d)|(\w)/', $marca, $matches2); 

$id_m = implode($matches2[1]); 
$marca = implode($matches2[2]); 




$id_cliente=($id_c); 
$n_cliente=($cliente);

$id_marca=($id_m); 
$n_marca=($marca); 
	
	$estado=0;
	$fecha=date('Y-m-d');
	$year=date('Y');

	// REGISTER data into database
    $sql = "INSERT INTO pop_proyecto(nombre, fecha, id_empresa, empresa, id_marca, marca, estado) VALUES ('$proyecto','$fecha','$id_cliente','$n_cliente','$id_marca','$n_marca','$estado')";
    $query = mysqli_query($con,$sql);
    // if product has been added successfully
    if ($query) {
    	 $old = umask(0); 
                            $proyect = "../Artes/".$year."/DISPLAYS/".$n_cliente."/".$n_marca."/".$proyecto ; 

                             if (!file_exists($proyect)) {
                              mkdir($proyect, 0777, true);
                            



                            //****************************************************************************************************************************** */

                            /*$administracion = "../Artes/".$year."/DISPLAYS/".$n_cliente."/".$marca."/".$proyecto."/ADMINISTRACION" ; 
                            mkdir($administracion, 0777, true);

                            //****************************************************************************************************************************** */

                            /*$logistica = "../Artes/".$year."/DISPLAYS/".$n_cliente."/".$marca."/".$proyecto."/LOGISTICA" ;
                            mkdir($logistica, 0777, true);
                           

                            //****************************************************************************************************************************** */

                           /* $reporte1 = "../Artes/".$year."/DISPLAYS/".$n_cliente."/".$marca."/".$proyecto."/REPORTE/Armado_Empacado" ;
                            mkdir($reporte1, 0777, true);

                            $reporte2 = "../Artes/".$year."/DISPLAYS/".$n_cliente."/".$marca."/".$proyecto."/REPORTE/Despacho" ;
                            mkdir($reporte2, 0777, true);

                            $reporte3 = "../Artes/".$year."/DISPLAYS/".$n_cliente."/".$marca."/".$proyecto."/REPORTE/Impresion" ;
                            mkdir($reporte3, 0777, true);

                            $reporte4 = "../Artes/".$year."/DISPLAYS/".$n_cliente."/".$marca."/".$proyecto."/REPORTE/Instalacion" ;
                            mkdir($reporte4, 0777, true);

                            $reporte5 = "../Artes/".$year."/DISPLAYS/".$n_cliente."/".$marca."/".$proyecto."/REPORTE/Render_Final" ;
                            mkdir($reporte5, 0777, true);

                            $reporte6 = "../Artes/".$year."/DISPLAYS/".$n_cliente."/".$marca."/".$proyecto."/REPORTE/Troquelado" ;
                            mkdir($reporte6, 0777, true);
                            

                            //****************************************************************************************************************************** */

                            $diseno1 = "../Artes/".$year."/DISPLAYS/".$n_cliente."/".$marca."/".$proyecto."/DISENO/RENDER" ;
                            mkdir($diseno1, 0777, true);

                            $diseno2 = "../Artes/".$year."/DISPLAYS/".$n_cliente."/".$marca."/".$proyecto."/DISENO/3D" ;
                            mkdir($diseno2, 0777, true);

                            $diseno3 = "../Artes/".$year."/DISPLAYS/".$n_cliente."/".$marca."/".$proyecto."/DISENO/JPG" ;
                            mkdir($diseno3, 0777, true);

                            $diseno4 = "../Artes/".$year."/DISPLAYS/".$n_cliente."/".$marca."/".$proyecto."/DISENO/EDITABLES" ;
                            mkdir($diseno4, 0777, true);

                            $diseno5 = "../Artes/".$year."/DISPLAYS/".$n_cliente."/".$marca."/".$proyecto."/DISENO/INSTRUCTIVOS" ;
                            mkdir($diseno5, 0777, true);

                            $diseno6 = "../Artes/".$year."/DISPLAYS/".$n_cliente."/".$marca."/".$proyecto."/DISENO/CORTE/GT" ;
                            mkdir($diseno6, 0777, true);

                            $diseno7 = "../Artes/".$year."/DISPLAYS/".$n_cliente."/".$marca."/".$proyecto."/DISENO/IMPRESION/GT" ;
                            mkdir($diseno7, 0777, true);
                              $diseno8 = "../Artes/".$year."/DISPLAYS/".$n_cliente."/".$marca."/".$proyecto."/DISENO/ARMADO/GT" ;
                            mkdir($diseno8, 0777, true);

                             $diseno9 = "../Artes/".$year."/DISPLAYS/".$n_cliente."/".$marca."/".$proyecto."/DISENO/CORTE/CR" ;
                            mkdir($diseno9, 0777, true);

                            $diseno10 = "../Artes/".$year."/DISPLAYS/".$n_cliente."/".$marca."/".$proyecto."/DISENO/IMPRESION/CR" ;
                            mkdir($diseno10, 0777, true);
                              $diseno11 = "../Artes/".$year."/DISPLAYS/".$n_cliente."/".$marca."/".$proyecto."/DISENO/ARMADO/CR" ;
                            mkdir($diseno11, 0777, true);

                                  $diseno12 = "../Artes/".$year."/DISPLAYS/".$n_cliente."/".$marca."/".$proyecto."/DISENO/CORTE/HN" ;
                            mkdir($diseno12, 0777, true);

                            $diseno13 = "../Artes/".$year."/DISPLAYS/".$n_cliente."/".$marca."/".$proyecto."/DISENO/IMPRESION/HN" ;
                            mkdir($diseno13, 0777, true);
                              $diseno14 = "../Artes/".$year."/DISPLAYS/".$n_cliente."/".$marca."/".$proyecto."/DISENO/ARMADO/HN" ;
                            mkdir($diseno14, 0777, true);

                                    $diseno15 = "../Artes/".$year."/DISPLAYS/".$n_cliente."/".$marca."/".$proyecto."/DISENO/CORTE/SV" ;
                            mkdir($diseno15, 0777, true);

                            $diseno16 = "../Artes/".$year."/DISPLAYS/".$n_cliente."/".$marca."/".$proyecto."/DISENO/IMPRESION/SV" ;
                            mkdir($diseno16, 0777, true);
                              $diseno17 = "../Artes/".$year."/DISPLAYS/".$n_cliente."/".$marca."/".$proyecto."/DISENO/ARMADO/SV" ;
                            mkdir($diseno17, 0777, true);





                            //****************************************************************************************************************************** */
}
                         

                            umask($old);
                          
                      
        $messages[] = "El producto ha sido guardado con éxito.";
    } else {
        $errors[] = "proyecto=".$proyecto."<br>fecha=".$fecha."<br>id_cliente=".$id_cliente."<br>nombre_cliente=".$n_cliente."<br>id_marca=".$id_marca."<br>nombre_marca=".$n_marca."<br>estado=".$estado;
    }
		
	} else 
	{
		$errors[] = "desconocido.";
	}
if (isset($errors)){
			
			?>
			<div class="alert alert-danger" role="alert">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong>Error!</strong> 
					<?php
						foreach ($errors as $error) {
								echo $error;
							}
						?>
			</div>
			<?php
			}
			if (isset($messages)){
				
				?>
				<div class="alert alert-success" role="alert">
						<button type="button" class="close" data-dismiss="alert">&times;</button>
						<strong>¡Bien hecho!</strong>
						<?php
							foreach ($messages as $message) {
									echo $message;
								}
							?>
				</div>
				<?php
			}
?>			