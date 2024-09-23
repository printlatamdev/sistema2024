
<?
include("session.php");
?>

<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en" class="no-js">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
<meta charset="utf-8"/>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1" name="viewport"/>
<meta content="" name="description"/>
<meta content="" name="author"/>
<!-- BEGIN GLOBAL MANDATORY STYLES -->
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>
<link href="suministros/assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
<link href="suministros/assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css"/>
<link href="suministros/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link href="suministros/assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
<link href="suministros/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css"/>
<!-- END GLOBAL MANDATORY STYLES -->
<!-- BEGIN PAGE LEVEL STYLES -->
<link rel="stylesheet" type="text/css" href="suministros/assets/global/plugins/datatables/extensions/Scroller/css/dataTables.scroller.min.css"/>
<link rel="stylesheet" type="text/css" href="suministros/assets/global/plugins/datatables/extensions/ColReorder/css/dataTables.colReorder.min.css"/>
<link rel="stylesheet" type="text/css" href="suministros/assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css"/>

<!-- END PAGE LEVEL STYLES -->
<!-- BEGIN PAGE LEVEL PLUGIN STYLES -->
<link href="suministros/assets/global/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css"/>
<link href="suministros/assets/global/plugins/fullcalendar/fullcalendar.min.css" rel="stylesheet" type="text/css"/>
<link href="suministros/assets/global/plugins/jqvmap/jqvmap/jqvmap.css" rel="stylesheet" type="text/css"/>
<!-- END PAGE LEVEL PLUGIN STYLES -->
<!-- BEGIN PAGE STYLES -->
<link href="suministros/assets/admin/pages/css/tasks.css" rel="stylesheet" type="text/css"/>
<!-- END PAGE STYLES -->
<!-- BEGIN THEME STYLES -->
<link href="suministros/assets/global/css/components.css" id="style_components" rel="stylesheet" type="text/css"/>
<link href="suministros/assets/global/css/plugins.css" rel="stylesheet" type="text/css"/>
<link href="suministros/assets/admin/layout/css/layout.css" rel="stylesheet" type="text/css"/>
<link href="suministros/assets/admin/layout/css/themes/darkblue.css" rel="stylesheet" type="text/css" id="style_color"/>
<link href="suministros/assets/admin/layout/css/custom.css" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" type="text/css" href="suministros/assets/global/plugins/select2/select2.css"/>



<link rel="stylesheet" type="text/css" href="suministros/assets/global/plugins/clockface/css/clockface.css"/>
<link rel="stylesheet" type="text/css" href="suministros/assets/global/plugins/bootstrap-datepicker/css/datepicker3.css"/>
<link rel="stylesheet" type="text/css" href="suministros/assets/global/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css"/>
<link rel="stylesheet" type="text/css" href="suministros/assets/global/plugins/bootstrap-colorpicker/css/colorpicker.css"/>
<link rel="stylesheet" type="text/css" href="suministros/assets/global/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css"/>
<link rel="stylesheet" type="text/css" href="suministros/assets/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css"/>
<!-- END THEME STYLES -->


</head>

<body >


<?

$compra=$_REQUEST['compra'];
$empresa=base64_decode($_REQUEST['empresa']);
$id_empresa=$_REQUEST['id_empresa'];
$cantidad=$_REQUEST['cantidad'];
$material=base64_decode($_REQUEST['material']);
$id_mat=$_REQUEST['id_mat'];
$oc_imagen=$_REQUEST['oc_imagen'];
$fac_imagen=$_REQUEST['fac_imagen'];
$idc=$_REQUEST['idc'];


?>




<!-- ------------CONTENIDO-----------------------------------------------------------------------------------------------  -->


                      <div class="portlet box blue">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa  fa-cubes"></i>Ingreso de Suministros - Orden de Compra <?=$compra?>
							</div>
							
						</div>
						<div class="portlet-body">
						
								
	                        
			    <!-- ******************************************************************************************** -->					
                     <div class="tab-pane active"  id="tab_6_1">
                          
				
									<div class="portlet-body form">
										<!-- BEGIN FORM-->
										<form id="fomr2" method="post" action="suministros.descargas.php" class="form-horizontal" enctype="multipart/form-data">
											<input type="hidden" value="11" name="bandera" id="bandera">
											<input type="hidden" value="<?=$material?>" name="matt" id="matt">
											<input type="hidden" name="compra" id="compra" value="<?=$compra?>">
											<input type="hidden" name="oc_imagen" id="oc_imagen" value="<?=$oc_imagen?>">
											<input type="hidden" name="fac_imagen" id="fac_imagen" value="<?=$fac_imagen?>">
											<input type="hidden" name="idc" id="idc" value="<?=$idc?>">
											<div class="form-body">


												



												 <!--/row-->
												<div class="row">
													<div class="col-md-9">
														<div class="form-group">
															<label class="control-label col-md-3"><font><strong>Proveedor:</strong></label>
															<strong><?=$empresa?></strong>
															<input type="hidden" name="empresa" id="empresa" value="<?=$empresa?>">
															<input type="hidden" name="id_empresa" id="id_empresa" value="<?=$id_empresa?>">
															
															
														</div>
													</div>
												</div>
												<!--/row-->
												

                                               <!--
												<div class="row">
													<div class="col-md-9">
														<div class="form-group">
															<label class="control-label col-md-3"><strong>Material:</label>
																<strong><? //$material ?></strong>
																<input type="hidden" name="material" id="material" value="<? //$id_mat ?>">
																<input type="hidden" name="nom_material" id="nom_material" value="<? //$material?>">
															
															
														</div>
													</div>
												</div>
												-->


												<?
												
												//*************************************************************************************************************************** */
												$findme   = 'Tinta';
												$pos = strpos($material, $findme);
												if ($pos === false) { 


													  ?>

													            	<!--/row-->
													<div class="row">
														<div class="col-md-9">
															<div class="form-group">
																<label class="control-label col-md-3"><strong>Material:</strong></label>
																<div class="col-md-6">
																<select id="mat" name="mat" class="select2_category form-control"  >
                                                                <option value="0">Elija un Material</option>';  


                                                                <?php

                                                                        include("suministros/connect.php");
                                                                        
                                                                        $rs=$mysqli->query("SELECT * FROM material WHERE estado=1");

                                                                        

                                                                         while ($fila = $rs->fetch_row()) { 

                                                                            

                                                                            echo '<option value="'.$fila[0].'_'.$fila[1].' - '.$fila[2].'">'.$fila[1].' - '.$fila[2].'</option>';  

                                                                        }

                                                                        $mysqli->close();

                                                                ?>
                                                                    
																</select>
																<br>
																<font color='red'><b>Material en orden de compra : <br><?=$material?></b></font>													 
													 
																</div>
															</div>
														</div>
													</div>
													<!--/row-->
													  
                                                                

                                                                
													 
													 
													 <?

												}else{


													
                                                    ?>
													<!--/row-->
													<div class="row">
														<div class="col-md-10">
															<div class="form-group">
																<label class="control-label col-md-2"><strong>Tipo:</strong></label>
																<div class="col-md-6">
																	<select id="tipo_tinta" name="tipo_tinta" class="select2_category form-control"  tabindex="1">
																	<?php
	
																			include("suministros/connect.php");
																			
																			$rs=$mysqli->query("SELECT DISTINCT tipo FROM tinta"); 
	
																			 while ($fila = $rs->fetch_row()) { echo '<option value="'.$fila[0].'">'.$fila[0].'</option>';  }
	
																			$mysqli->close();
	
																	?>
																		
																	</select>
																	<br>
																<font color='red'><b>Material en orden de compra : <br><?=$material?></b></font>
																</div>
															</div>
														</div>
													</div>
													<!--/row-->

													 <!--/row-->
												<div class="row">
													<div class="col-md-10">
														<div class="form-group">
															<label class="control-label col-md-2"><strong>Color:</strong></label>
															<div class="col-md-6">
																<select id="color_tinta" name="color_tinta" class="select2_category form-control"  tabindex="1">
																<?php

																		include("suministros/connect.php");
																		
																		$rs=$mysqli->query("SELECT DISTINCT color FROM tinta");

																	     while ($fila = $rs->fetch_row()) { echo '<option value="'.$fila[0].'">'.$fila[0].'</option>';  }

																		$mysqli->close();

                                                                ?>
																	
																</select>
															</div>
														</div>
													</div>
												</div>
												<!--/row-->

                                                   <?


												}
												//*************************************************************************************************************************** */

												
												
		
												
												?>


												<!--/row-->
												<div class="row">
													<div class="col-md-9">
														<div class="form-group">
															<label class="control-label col-md-3"><strong>Cantidad:</strong></label>
															<div class="col-md-9">
																
																	<div class="input-group">
																	
																	<input name="cantidad" id="cantidad" type="text"   required><br>
																	<font color='red'><b>Cantidad en orden de compra : <?=$cantidad?></b></font>
																    </div>

															</div>
														</div>
													</div>
												</div>
												<!--/row-->



													<!--/row-->
												<div class="row">
													<div class="col-md-9">
														<div class="form-group">
															<label class="control-label col-md-3"><strong>Foto:</strong></label>
															<div class="col-md-9">
																
																	<div class="input-group">
																	<span class="input-group-addon input-circle-left">
																	<i class="fa  fa-sort-down"></i>
																	</span>

																	            <div class="input">
																						<label class="custom-file-upload">
																						    <input type="file" id="compra_imagen" name="compra_imagen" />
																						    Seleccionar Foto
																						</label>
																						<label id="ok_compra"><strong>OK</strong></label>
																		        </div>

																	
																    </div>

															</div>
														</div>
													</div>
												</div>
												<!--/row-->




							


													<!--/row-->
												<div class="row">
													<div class="col-md-9">
														<div class="form-group">
															<label class="control-label col-md-3"><strong>Nota:</strong></label>
															<div class="col-md-9">
																
																	<div class="input-group">
																	
																	<textarea cols="45" rows="4" name="nota" id="nota"></textarea>
																    </div>

															</div>
														</div>
													</div>
												</div>
												<!--/row-->



                                              												
												
											<div class="form-actions">
												<div class="row">
													<div class="col-md-9">
														<div class="row">
															<div class="col-md-offset-3 col-md-9">
																<button  type="submit" class="btn blue">Ingresar</button>

																</div>
														</div>
													</div>
													<div class="col-md-6">
													</div>
												</div>
											</div>
										</form>
										<!-- END FORM-->
									</div>
								</div>
								
								<? if ($pos === false) { echo "<br><br><br><br><br><br><br><br><br><br><br><br><br>";  } else { echo "<br><br><br><br><br>";    } ?>
								




									


								
			







								</div>
							</div>
					
				

			









<!-- ------------FIN DE CONTENIDO-----------------------------------------------------------------------------------------------  -->






<!-- ------------FIN DE CONTENIDO-----------------------------------------------------------------------------------------------  -->



<!-- END CONTENT -->


</div>
<!-- END CONTAINER -->




<style>
	
input[type="file"] {
    display: none;
}


.custom-file-upload {
    border: 1px solid #ccc;
    display: inline-block;
    padding: 3px 6px;
    cursor: pointer;
}

</style>


<script src="suministros/assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="suministros/assets/global/plugins/jquery-migrate.min.js" type="text/javascript"></script>
<!-- IMPORTANT! Load jquery-ui.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
<script src="suministros/assets/global/plugins/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
<script src="suministros/assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="suministros/assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
<script src="suministros/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="suministros/assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="suministros/assets/global/plugins/jquery.cokie.min.js" type="text/javascript"></script>
<script src="suministros/assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<script src="suministros/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="suministros/assets/global/plugins/jqvmap/jqvmap/jquery.vmap.js" type="text/javascript"></script>
<script src="suministros/assets/global/plugins/flot/jquery.flot.min.js" type="text/javascript"></script>
<script src="suministros/assets/global/plugins/flot/jquery.flot.resize.min.js" type="text/javascript"></script>
<script src="suministros/assets/global/plugins/flot/jquery.flot.categories.min.js" type="text/javascript"></script>
<script src="suministros/assets/global/plugins/jquery.pulsate.min.js" type="text/javascript"></script>
<script src="suministros/assets/global/plugins/bootstrap-daterangepicker/moment.min.js" type="text/javascript"></script>
<script src="suministros/assets/global/plugins/bootstrap-daterangepicker/daterangepicker.js" type="text/javascript"></script>
<!-- IMPORTANT! fullcalendar depends on jquery-ui.min.js for drag & drop support -->
<script src="suministros/assets/global/plugins/fullcalendar/fullcalendar.min.js" type="text/javascript"></script>
<script src="suministros/assets/global/plugins/jquery-easypiechart/jquery.easypiechart.min.js" type="text/javascript"></script>
<script src="suministros/assets/global/plugins/jquery.sparkline.min.js" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="suministros/assets/global/scripts/metronic.js" type="text/javascript"></script>
<script src="suministros/assets/admin/layout/scripts/layout.js" type="text/javascript"></script>
<script src="suministros/assets/admin/layout/scripts/quick-sidebar.js" type="text/javascript"></script>
<script src="suministros/assets/admin/layout/scripts/demo.js" type="text/javascript"></script>
<script src="suministros/assets/admin/pages/scripts/index.js" type="text/javascript"></script>
<script src="suministros/assets/admin/pages/scripts/tasks.js" type="text/javascript"></script>
<script src="suministros/assets/global/plugins/select2/select2.min.js"></script>
<script src="suministros/assets/admin/pages/scripts/form-samples.js"></script>


<script type="text/javascript" src="suministros/assets/global/plugins/select2/select2.min.js"></script>
<script type="text/javascript" src="suministros/assets/global/plugins/datatables/media/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="suministros/assets/global/plugins/datatables/extensions/TableTools/js/dataTables.tableTools.min.js"></script>
<script type="text/javascript" src="suministros/assets/global/plugins/datatables/extensions/ColReorder/js/dataTables.colReorder.min.js"></script>
<script type="text/javascript" src="suministros/assets/global/plugins/datatables/extensions/Scroller/js/dataTables.scroller.min.js"></script>
<script type="text/javascript" src="suministros/assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js"></script>



<script type="text/javascript" src="suministros/assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="suministros/assets/global/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>
<script type="text/javascript" src="suministros/assets/global/plugins/clockface/js/clockface.js"></script>
<script type="text/javascript" src="suministros/assets/global/plugins/bootstrap-daterangepicker/moment.min.js"></script>
<script type="text/javascript" src="suministros/assets/global/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>
<script type="text/javascript" src="suministros/assets/global/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>
<script type="text/javascript" src="suministros/assets/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js"></script>

<script src="suministros/assets/admin/pages/scripts/components-pickers.js"></script>



<script src="suministros.descargas.js"></script>
<script>
jQuery(document).ready(function() {    
   Metronic.init(); // init metronic core componets
   Layout.init(); // init layout
   QuickSidebar.init(); // init quick sidebar
      FormSamples.init();
      ComponentsPickers.init();



    jQuery( "#ok_compra" ).hide();
    jQuery( "#ok_factura" ).hide();


   jQuery('#compra_imagen').bind('change', function() {

    if (this.files[0].size>1048576) { 

    	alert("La imagen que intenta subir excede el tamaño permitido.");
        jQuery( "#ok_compra" ).hide();

    }else{ jQuery( "#ok_compra" ).show(); }
   });


   jQuery('#factura_imagen').bind('change', function() {

    if (this.files[0].size>1048576) { 

    	alert("La imagen que intenta subir excede el tamaño permitido.");
        jQuery( "#ok_factura" ).hide();

    }else{ jQuery( "#ok_factura" ).show(); }
   });    


   
      
});


</script>
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html> 