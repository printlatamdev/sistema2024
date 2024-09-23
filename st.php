
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
<title>Sistema Color Digital</title>
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


<link href="suministros/assets/admin/pages/css/tasks.css" rel="stylesheet" type="text/css"/>
<!-- END PAGE STYLES -->
<!-- BEGIN THEME STYLES -->
<link href="suministros/assets/global/css/components.css" id="style_components" rel="stylesheet" type="text/css"/>
<link href="suministros/assets/global/css/plugins.css" rel="stylesheet" type="text/css"/>
<link href="suministros/assets/admin/layout/css/layout.css" rel="stylesheet" type="text/css"/>
<link href="suministros/assets/admin/layout/css/themes/darkblue.css" rel="stylesheet" type="text/css" id="style_color"/>
<link href="suministros/assets/admin/layout/css/custom.css" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" type="text/css" href="suministros/assets/global/plugins/select2/select2.css"/>



<!-- END THEME STYLES -->



<link rel="shortcut icon" href="images/color.ico"/>
</head>
<body class="page-header-fixed page-quick-sidebar-over-content page-sidebar-fixed page-container-bg-solid">



<!-- BEGIN CONTAINER -->

	
	




	<!-- BEGIN CONTENT -->
	
		<div  class="page-content">
		     <div id="page-content" >
			<center>

			<!-- BEGIN PAGE HEADER

			<div class="page-bar">
				<ul class="page-breadcrumb">
					<li>
						<i class="fa fa-home"></i>
						<a href="index.html">Home</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="#">Dashboard</a>
					</li>
				</ul>
				
			</div>

		
			<h3 class="page-title">
			Dashboard <small>reports & statistics</small>
			</h3>
		 END PAGE HEADER-->


<!-- ------------CONTENIDO-----------------------------------------------------------------------------------------------  -->









<div  class="row">
						

                        <div class="col-md-1"></div>

						<div class="col-md-9">

							<div  id="contenedor1" class="portlet box blue">
								<div class="portlet-title">
									<div class="caption">
										<i class="icon-settings"></i> Generar Stickers
									</div>
									<ul class="nav nav-tabs">
										<li class="active">
											<a href="#portlet_tab_1_1" data-toggle="tab">
											<strong>Color Digital</strong></a>
										</li>
																			
									</ul>
								</div>




								<div class="portlet-body form">
									<div class="tab-content">
										<div class="tab-pane active" id="portlet_tab_1_1">
											<div class="skin skin-minimal">
												
													
														
                                   <div class="portlet light bordered">
									
									<div class="portlet-body form">
										<!-- BEGIN FORM-->
										<form id="fomr1" method="post" action="sticker.pdf.php" class="form-horizontal">
											<div class="form-body">





											<!--/row-->
											<div class="row">
													<div class="col-md-10">
														<div class="form-group">

											

															<div class="col-md-5">
																    <label class="control-label"><strong>Imagen:</strong></label>
																			<div class="input-group">
																			<span class="input-group-addon input-circle-left">
																			<i class="fa  fa-bookmark-o"></i>
																			</span>
                                                                                    <select id="imagen" name="imagen" class="select2_category form-control"  tabindex="1">
																						
																						    <?
																							
																								$directorio = opendir("images/stickers"); //ruta actual
									
																									while ($archivo = readdir($directorio)) //obtenemos un archivo y luego otro sucesivamente
																									{
																										if (is_dir($archivo))//verificamos si es o no un directorio
																										{ }
																										else
																										{ echo "<option value='".$archivo."'>".$archivo."</option>"; }
																										
																									}

																							?>

																					 </select>
																		    </div>
															</div>



															<div class="col-md-5">

															     <!-- **************************************************************************************************** -->
																 <script src="js/uploadifive/jquery.min.js" type="text/javascript"></script>
																<script src="js/uploadifive/jquery.uploadifive.js" type="text/javascript"></script>
																<link rel="stylesheet" type="text/css" href="js/uploadifive/uploadifive.css"> 

																 <div id="queue_fac"></div>
																<div style="overflow:hidden">
																<div style="float:left">
																	<p align="left"><input id="file_fac" name="file_fac" type="file"  ></p>
																</div>
																<div style="float:left; padding-left:20px"> 
																	<label id="message_fac" name="message_fac">   
																	      
																	</label>
																</div>
																</div>  

																<script type="text/javascript">
																	var $fac = jQuery.noConflict();
																	$fac(function() {
																	$fac('#file_fac').uploadifive({
																		'uploadScript' : 'sticker.save.php',
																		'fileType'     : 'image/*',
																		'buttonText' : 'Subir Foto',
																		'multi'    : true,
																		'removeCompleted' : true,
																		'method'   : 'post',
																		'formData' : { 'bandera' : '1', 'carpeta' : '1'  },
																		'onUploadComplete' : function(file, data, response) {  $fac('#message_fac').html(data);},
																		'onQueueComplete' : function(uploads) {
																			/*alert(uploads.successful + ' files were uploaded successfully.');*/   location.reload(); 	},
																		'height'   : 25,
																		'width'   : 80  
																	});
																	});
																</script>
																<!-- **************************************************************************************************** --> 
																<!-- 
                                                                       
																	function DAR{
																		 
																		 createfromimage();
                                                                         noConflict();
																		 setupBase();
																		 onComplete();
																		 createTable();
																		 createFolder();
																		 createLink();
																		 createUserLink();
                                                                         importReg();
																		 setupLine();
																		 validateImport;
																		 secureSetup();
																		 selectImport();
																		 userInvitate();
																		 companySetup();
																		 mainProccess();


 




																	}
																	if(){   }

															    -->







															     
															</div>







														</div>
													</div>
												</div>
												<!--/row-->






												<br><br>

                                             
												<!--/row-->
												<div class="row">
													<div class="col-md-10">
														

														<div class="form-group">

															<div class="col-md-5">
																    <label class="control-label"><strong>Cliente:</strong></label>

																	       <div class="input-group">
																			<span class="input-group-addon input-circle-left">
																			<i class="fa   fa-bookmark-o"></i>
																			</span>
																					<input id="empresa" name="empresa" type="text" class="form-control" required >
																		    </div>



															</div>


															<div class="col-md-5">
																    <label class="control-label"><strong>Orden de Produccion:</strong></label>

																			<div class="input-group">
																			<span class="input-group-addon input-circle-left">
																			<i class="fa   fa-bookmark-o"></i>
																			</span>
																					<input name="op" id="op" type="text" class="form-control" required >
																		    </div>
															        </div>

															
															

														</div>

													</div>
												</div>
												<!--/row-->



												<!--/row-->
												<div class="row">
													<div class="col-md-10">
														<div class="form-group">
															<div class="col-md-5">
															<label class="control-label"><strong>Fecha:</strong></label>
																				<div class="input-group">
																				<span class="input-group-addon input-circle-left">
																				<i class="fa   fa-bookmark-o"></i>
																				</span>
																				<input name="fecha" id="fecha" type="text" class="form-control" required >
																				</div>
															</div>
															<div class="col-md-5">
															<label class="control-label"><strong>Hora:</strong></label>
																				<div class="input-group">
																				<span class="input-group-addon input-circle-left">
																				<i class="fa   fa-bookmark-o"></i>
																				</span>
																				<input name="hora" id="hora" type="text" class="form-control"  required >
																				</div>
															</div>
														</div>
													</div>
												</div>
												<!--/row-->

												<!--/row-->
												<div class="row">
													<div class="col-md-10">
														<div class="form-group">
															<div class="col-md-5">
															<label class="control-label"><strong>Tel:</strong></label>
																				<div class="input-group">
																				<span class="input-group-addon input-circle-left">
																				<i class="fa   fa-bookmark-o"></i>
																				</span>
																				<input name="tel" id="tel" type="text" class="form-control" value="(503) 2213-5501" required >
																				</div>
															</div>
															<div class="col-md-5">
															<label class="control-label"><strong>Email:</strong></label>
																				<div class="input-group">
																				<span class="input-group-addon input-circle-left">
																				<i class="fa   fa-bookmark-o"></i>
																				</span>
																				<input name="email" id="email" type="text" class="form-control" value="logistica@printlatam.com" required >
																				</div>
															</div>
														</div>
													</div>
												</div>
												<!--/row-->
												


												<hr>



												<!--/row-->
												<div class="row">
													<div class="col-md-10">
														

														<div class="form-group">

															<div class="col-md-5">
																    <label class="control-label"><strong>Pais de Origen:</strong></label>
																	<div class="input-group">
																	<span class="input-group-addon input-circle-left">
																	<i class="fa   fa-bookmark-o"></i>
																	</span>
                                                                       <input name="origen" id="origen" type="text" class="form-control" required value="EL SALVADOR">
																    </div>
															</div>  


															<div class="col-md-5">
																    <label class="control-label"><strong>Pais de Destino:</strong></label>
																			<div class="input-group">
																			<span class="input-group-addon input-circle-left">
																			<i class="fa  fa-bookmark-o"></i>
																			</span>
                                                                                    <select id="destino" name="destino" class="select2_category form-control"  tabindex="1">
																							<?php

																									include("suministros/connect.php");
																									
																									$rs=$mysqli->query("SELECT * FROM pais WHERE estado=1");

																								     while ($fila = $rs->fetch_row()) { echo '<option value="'.$fila[1].'">'.$fila[1].'</option>';  }

																									$mysqli->close();

							                                                                ?>		
																				    </select>
																		    </div>
															        </div>
														</div>
													</div>
												</div>
												<!--/row-->


												<!--/row-->
												<div class="row">
													<div class="col-md-10">
														<div class="form-group">
															<div class="col-md-5">
															<label class="control-label"><strong>Proveedor:</strong></label>
																				<div class="input-group">
																				<span class="input-group-addon input-circle-left">
																				<i class="fa   fa-bookmark-o"></i>
																				</span>
																				<input name="pro" id="pro" type="text" class="form-control" value="COLOR DIGITAL" required >
																				</div>
															</div>
															<div class="col-md-5">
															<label class="control-label"><strong>Campaña:</strong></label>
																				<div class="input-group">
																				<span class="input-group-addon input-circle-left">
																				<i class="fa   fa-bookmark-o"></i>
																				</span>
																				<input name="camp" id="camp" type="text" class="form-control" required >
																				</div>
															</div>
														</div>
													</div>
												</div>
												<!--/row-->


												<!--/row-->
												<div class="row">
													<div class="col-md-10">
														<div class="form-group">
															<div class="col-md-5">
															<label class="control-label"><strong>Categoria:</strong></label>
																				<div class="input-group">
																				<span class="input-group-addon input-circle-left">
																				<i class="fa   fa-bookmark-o"></i>
																				</span>
																				<input name="cat" id="cat" type="text" class="form-control" required >
																				</div>
															</div>
															<div class="col-md-5">
															<label class="control-label"><strong>Bultos:</strong></label>
																				<div class="input-group">
																				<span class="input-group-addon input-circle-left">
																				<i class="fa   fa-bookmark-o"></i>
																				</span>
																				<input name="bultos" id="bultos" type="text" class="form-control" required >
																				</div>
															</div>
														</div>
													</div>
												</div>
												<!--/row-->



												<!--/row-->
												<div class="row">
													<div class="col-md-10">
														<div class="form-group">
															<div class="col-md-5">
															<label class="control-label"><strong>Unidades por Bultos:</strong></label>
																				<div class="input-group">
																				<span class="input-group-addon input-circle-left">
																				<i class="fa   fa-bookmark-o"></i>
																				</span>
																				<input name="unp" id="unp" type="text" class="form-control" required >
																				</div>
															</div>
															<div class="col-md-5">
															<label class="control-label"><strong>Peso:</strong></label>
																				<div class="input-group">
																				<span class="input-group-addon input-circle-left">
																				<i class="fa   fa-bookmark-o"></i>
																				</span>
																				<input name="peso" id="peso" type="text" class="form-control" required >
																				</div>
															</div>
														</div>
													</div>
												</div>
												<!--/row-->



												<!--/row-
												<div class="row">
													<div class="col-md-10">
														

														<div class="form-group">

															<div class="col-md-5">
																    <label class="control-label"><strong>Contacto:</strong></label>
																	<div class="input-group">
																	<span class="input-group-addon input-circle-left">
																	<i class="fa  fa-users"></i>
																	</span>
																	<select id="contacto" name="contacto" class="select2_category form-control"  tabindex="1">
																	<option value="0">Seleccione Contacto</option>				
																	</select>
																    </div>
															</div>

															
															<div class="col-md-5">
																    <label class="control-label "><strong>Fecha de Entrega:</strong></label>
																    <div class="input-group input-medium date date-picker" data-date-format="dd-mm-yyyy" data-date-start-date="+0d">
																	<input id="entrega" name="entrega" type="text" class="form-control" readonly>
																	<span class="input-group-btn">
																	<button class="btn default" type="button"><i class="fa fa-calendar"></i></button>
																	</span>
														            </div>
															</div>
																	


														</div>

													</div>
												</div>
												/row-->
                                        															
										


										
                                       												
									
								</div>
								</div>
			
														
													</div>
													<div class="form-actions">

													    <input class="btn blue" type="submit" value="Crear Stickers">
														
													</div>
												

										</form>
										<!-- END FORM-->



											</div>
										</div>










										

   






<!-- ------------FIN DE CONTENIDO-----------------------------------------------------------------------------------------------  -->



<style>
	


.custom-file-upload {
    border: 1px solid #ccc;
    display: inline-block;
    padding: 3px 6px;
    cursor: pointer;
}



#cliente_color, #contacto_color, #orden_color {
    
font-size: 18px !important;
font-weight: bold;

}

 


#fms {
   

    border-style: solid;
    border-width: 1px;
    padding: 20px;
    height: 275px;
     
    margin-right: -1px;
    margin-bottom: -1px;


    
}

#fms2 {

	   
    border-style: solid;
    border-width: 1px;
    padding: 20px;
    height: 225px;
    margin-right: -1px;
    margin-bottom: -1px;


     
}


#fms3 {

  
    border-style: solid;
    border-width: 1px;
    padding: 20px;
    height: 135px;
    margin-right: -1px;
    margin-bottom: -1px;
}


#detalle_color{


	width: 400px;
}








/* ********************************************** */

#qw {
   

    border-style: solid;
    border-width: 1px;
    padding: 20px;
    
    padding: 0px;
    margin-right: -1px;
    margin-bottom: -1px;
    margin-top: -1px;
        
}

#qwd1 {

   /* height: 110px;*/
    border-bottom: thin solid #000000;   
}

#qwd2 {

    /*height: 170px;*/
    border-bottom: thin solid #000000;   
}

#qwd3 {

    /*height: 60px;*/
   /* border-bottom: thin solid #000000;  */ 
}



#qw3 {
   

 border-style: solid;
    border-width: 1px;
    padding: 20px;
   
    padding: 0px;
    margin-right: -1px;
    margin-bottom: -1px;
    margin-top: -1px;
        
}
  
#qw0 { 

 display: flex;
      
  }


/* ************************************* */



</style>



<!-- ------------FIN DE CONTENIDO-----------------------------------------------------------------------------------------------  -->


</center>
</div>
<!-- END CONTENT -->


</div>
<!-- END CONTAINER -->




<script src="suministros/assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="suministros/assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="suministros/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="suministros/assets/global/scripts/metronic.js" type="text/javascript"></script>
<script src="suministros/assets/admin/layout/scripts/layout.js" type="text/javascript"></script>
<script src="suministros/assets/admin/layout/scripts/quick-sidebar.js" type="text/javascript"></script>
<script src="suministros/assets/global/plugins/select2/select2.min.js"></script>
<script src="suministros/assets/admin/pages/scripts/form-samples.js"></script>
<script type="text/javascript" src="suministros/assets/global/plugins/datatables/media/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="suministros/assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js"></script>
<script type="text/javascript" src="suministros/assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="suministros/assets/global/plugins/bootstrap-daterangepicker/moment.min.js"></script>
<script type="text/javascript" src="suministros/assets/global/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>
<script type="text/javascript" src="suministros/assets/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
<script src="suministros/assets/admin/pages/scripts/components-pickers.js"></script>



<script>
jQuery(document).ready(function() {  

  // jQuery( "#contenedor2" ).hide();
   //jQuery( "#details" ).hide();  


   Metronic.init(); // init metronic core componets
   Layout.init(); // init layout
   QuickSidebar.init(); // init quick sidebar
   FormSamples.init();
   ComponentsPickers.init();


});
</script>
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html> 