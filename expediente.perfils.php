
<?
include("session.php");

/*
 error_reporting(E_ALL);
 ini_set('display_errors', 1);
 */
?>

<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
<meta charset="utf-8"/>
<title>Sistema Color Digital</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1" name="viewport"/>
<meta content="" name="description"/>
<meta content="" name="author"/>




<link href="css/font.css" rel="stylesheet" type="text/css"/>
<link href="assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
<link href="assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css"/>
<link href="assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" type="text/css" href="assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css"/>
<link href="assets/global/css/components.css" id="style_components" rel="stylesheet" type="text/css"/>
<link href="assets/admin/layout/css/layout.css" rel="stylesheet" type="text/css"/>
<link href="assets/admin/layout/css/themes/darkblue.css" rel="stylesheet" type="text/css" id="style_color"/>


<link rel="stylesheet" href="uikit/css/uikit.min.css" />
<link rel="stylesheet" href="uikit/css/components/datepicker.min.css" />
<link rel="stylesheet" href="uikit/css/components/autocomplete.min.css" />

<link href="assets/admin/pages/css/profile.css" rel="stylesheet" type="text/css"/>


<link href="assets/admin/pages/css/profile-old.css" rel="stylesheet" type="text/css"/>


<link rel="shortcut icon" href="images/color.ico"/>

<style>
.clearfix{

margin-bottom: 25px;
}

</style>

<?

if (isset($_REQUEST['alert'])) {
?>
<script>
alert("Para generar el expediente necesita por lo menos haber subido un documento.");
</script>	
<?
} 
?>



</head>
<body class="page-header-fixed page-quick-sidebar-over-content page-sidebar-fixed page-container-bg-solid">


<?
include("header.php");
?>

<div class="clearfix">
</div>
<!-- BEGIN CONTAINER -->
<div class="page-container">
	
	
<?
include("menu.php");
//<!-- menu.php contains SIDEBAR -->
?>



	<!-- BEGIN CONTENT -->
	<div class="page-content-wrapper">
		<div  class="page-content">
		     <div id="page-content" >
			
			 <?                 
					 include ('connect.php');
					 $id_expediente=$_REQUEST['id_expediente'];
					
					 $cd=$mysqli->query("SELECT * FROM expedientes WHERE id_expediente='$id_expediente'");
			  
							
					 while ($fila = $cd->fetch_assoc()) {  
						 
						 $carpeta=$fila['carpeta'];
						 $nombres=$fila['nombres'];
						 $apellidos=$fila['apellidos'];
						 $departamento=$fila['departamento'];
						 $area=$fila['area'];
						 $contratacion=$fila['contratacion'];
						 $dui=$fila['dui'];
						 $nit=$fila['nit'];
						 $afp=$fila['afp'];
						 $seguro=$fila['seguro'];
						 $licencia=$fila['licencia'];
						 $empresa=$fila['empresa'];
						 $email=$fila['email'];
						 $telefono=$fila['telefono'];
						 $codigo=$fila['codigo'];
						 $salario=$fila['salario'];
						 $cuenta=$fila['cuenta'];
						 $inicio=$fila['inicio'];
						 $prueba=$fila['prueba'];
						 $emergencia=$fila['emergencia'];

						 $contrato=$fila['contrato'];
						 $solicitud=$fila['solicitud'];
						 $solvencia=$fila['solvencia'];
						 $antecedentes=$fila['antecedentes'];
						 $dui_scan=$fila['dui_scan'];
						 $nit_scan=$fila['nit_scan'];
						 $afp_scan=$fila['afp_scan'];
						 $seguro_scan=$fila['seguro_scan'];
						 $licencia_scan=$fila['licencia_scan'];


						 $foto=$fila['foto'];
						 if($foto==NULL || $foto==''){$foto="images/user.png";}else{$foto="expedientes_".$_SESSION['base']."/".$carpeta."/".$foto; }

						
					}
											  
								 	
							
			     				  																   											
						  
								$mysqli->close();


							
?>

<!-- ------------CONTENIDO-----------------------------------------------------------------------------------------------  -->





			

		






			<!-- BEGIN PAGE CONTENT-->
			<div class="row profile">
				<div class="col-md-12">
					<!--BEGIN TABS-->
					<div class="tabbable-line tabbable-full-width">
						<ul class="nav nav-tabs">
							<li class="active">
								<a href="#tab_1_1" data-toggle="tab">
								  Información </a>
							</li>
							<li>
								<a href="#tab_1_3" data-toggle="tab">
								  Editar </a>
							</li>

							<li>
								<a href="#tab_1_4" data-toggle="tab">
								  Generar Expediente </a>
							</li>
						
						</ul>
						<div class="tab-content">
							<div class="tab-pane active" id="tab_1_1">
								<div class="row">
									<div class="col-md-3">
										<ul class="list-unstyled profile-nav">
											<li>
												<img src="<?=$foto?>" class="img-responsive" alt=""/>
												
											</li>
										
										</ul>
									</div>
									<div class="col-md-9">
										<div class="row">
											<div class="col-md-8 profile-info">
												<h1> <? echo $nombres." ".$apellidos;   ?></h1>
											   
												
												
											
											</div>
											<!--end col-md-8-->
											
											<!--end col-md-4-->
										</div>
										<!--end row-->
										<div class="tabbable-line tabbable-custom-profile">
											
											<div class="tab-content">
												<div class="tab-pane active" id="tab_1_11">
													<div class="portlet-body">
														<table border="1" width="45%">
													
														<tr>
															<th height="35px">&nbsp;
																<i class="fa  fa-toggle-down"></i> Detalle
															</th>
															<th class="hidden-xs">&nbsp;
																<i class="fa  fa-toggle-down"></i> Descripción
															</th>
															
														</tr>
														
														
														<tr>
															<td height="25px" >&nbsp;<b>Codigo:</b></td>
															<td class="hidden-xs">&nbsp;<?=$codigo;?></td>
														</tr>
														<tr>
															<td height="25px" >&nbsp;<b>Empresa:</b></td>
															<td class="hidden-xs">&nbsp;<?=$empresa;?></td>
														</tr>
														<tr>
															<td height="25px">&nbsp;<b>Departamento:</b></td>
															<td class="hidden-xs">&nbsp;<?=$departamento;?></td>
														</tr>
														<tr>
															<td height="25px">&nbsp;<b>Area:</b></td>
															<td class="hidden-xs">&nbsp;<?=$area;?></td>
														</tr>

														<tr>
															<td height="25px">&nbsp;<b>Fecha Inicio:</b></td>
															<td class="hidden-xs">&nbsp;<?=$inicio;?></td>
														</tr>

														<tr>
															<td height="25px">&nbsp;<b>Contratación:</b></td>
															<td class="hidden-xs">&nbsp;<?=$contratacion;?></td>
														</tr>

														<tr>
															<td height="25px">&nbsp;<b>Salario:</b></td>
															<td class="hidden-xs">&nbsp;$<?=$salario;?></td>
														</tr>

														<tr>
															<td height="25px">&nbsp;<b>Cuenta:</b></td>
															<td class="hidden-xs">&nbsp;<?=$cuenta;?></td>
														</tr>

														<tr>
															<td height="25px">&nbsp;<b>DUI:</b></td>
															<td class="hidden-xs">&nbsp;<?=$dui;?></td>
														</tr>
														<tr>
															<td height="25px">&nbsp;<b>NIT:</b></td>
															<td class="hidden-xs">&nbsp;<?=$nit;?></td>
														</tr>
														<tr>
															<td height="25px">&nbsp;<b>AFP:</b></td>
															<td class="hidden-xs">&nbsp;<?=$afp;?></td>
														</tr>
														<tr>
															<td height="25px">&nbsp;<b>ISSS:</b></td>
															<td class="hidden-xs">&nbsp;<?=$seguro;?></td>
														</tr>
														<tr>
															<td height="25px">&nbsp;<b>Licencia:</b></td>
															<td class="hidden-xs">&nbsp;<?=$licencia;?></td>
														</tr>
														<tr>
															<td height="25px">&nbsp;<b>Email:</b></td>
															<td class="hidden-xs">&nbsp;<?=$email;?></td>
														</tr>

														<tr>
															<td height="25px">&nbsp;<b>Telefono:</b></td>
															<td class="hidden-xs">&nbsp;<?=$telefono;?></td>
														</tr>

														<tr>
															<th height="35px">&nbsp;
																<i class="fa  fa-toggle-down"></i> Documentos
															</th>
															<th class="hidden-xs">&nbsp;
																<i class="fa  fa-toggle-down"></i> Scan
															</th>
															
														</tr>


														   <tr>
															<td height="25px">&nbsp;<b>DUI:</b></td>
															<td class="hidden-xs">&nbsp;
																<? 
																if ($dui_scan!="") {
																echo '<a href="expedientes_'.$_SESSION['base'].'/'.$carpeta.'/'.$dui_scan.'" target="_blank">Ver </a>';
																}
																?>
														    </td>
														    </tr>

															<tr>
															<td height="25px">&nbsp;<b>NIT:</b></td>
															<td class="hidden-xs">&nbsp;
																<? 
																if ($nit_scan!="") {
																echo '<a href="expedientes_'.$_SESSION['base'].'/'.$carpeta.'/'.$nit_scan.'" target="_blank">Ver </a>';
																}
																?>
														    </td>
														    </tr>


															<tr>
															<td height="25px">&nbsp;<b>AFP:</b></td>
															<td class="hidden-xs">&nbsp;
																<? 
																if ($afp_scan!="") {
																echo '<a href="expedientes_'.$_SESSION['base'].'/'.$carpeta.'/'.$afp_scan.'" target="_blank">Ver </a>';
																}
																?>
														    </td>
														    </tr>

															<tr>
															<td height="25px">&nbsp;<b>ISSS:</b></td>
															<td class="hidden-xs">&nbsp;
																<? 
																if ($seguro_scan!="") {
																echo '<a href="expedientes_'.$_SESSION['base'].'/'.$carpeta.'/'.$seguro_scan.'" target="_blank">Ver </a>';
																}
																?>
														    </td>
														    </tr>

															<tr>
															<td height="25px">&nbsp;<b>Licencia:</b></td>
															<td class="hidden-xs">&nbsp;
																<? 
																if ($licencia_scan!="") {
																echo '<a href="expedientes_'.$_SESSION['base'].'/'.$carpeta.'/'.$licencia_scan.'" target="_blank">Ver </a>';
																}
																?>
														    </td>
														    </tr>

															<tr>
															<td height="25px">&nbsp;<b>Solvencia:</b></td>
															<td class="hidden-xs">&nbsp;
																<? 
																if ($solvencia!="") {
																echo '<a href="expedientes_'.$_SESSION['base'].'/'.$carpeta.'/'.$solvencia.'" target="_blank">Ver </a>';
																}
																?>
														    </td>
														    </tr>

															<tr>
															<td height="25px">&nbsp;<b>Antecedentes:</b></td>
															<td class="hidden-xs">&nbsp;
																<? 
																if ($antecedentes!="") {
																echo '<a href="expedientes_'.$_SESSION['base'].'/'.$carpeta.'/'.$antecedentes.'" target="_blank">Ver </a>';
																}
																?>
														    </td>
														    </tr>

															<tr>
															<td height="25px">&nbsp;<b>Solicitud:</b></td>
															<td class="hidden-xs">&nbsp;
																<? 
																if ($solicitud!="") {
																echo '<a href="expedientes_'.$_SESSION['base'].'/'.$carpeta.'/'.$solicitud.'" target="_blank">Ver </a>';
																}
																?>
														    </td>
														    </tr>

															<tr>
															<td height="25px">&nbsp;<b>Contrato:</b></td>
															<td class="hidden-xs">&nbsp;
																<? 
																if ($contrato!="") {
																echo '<a href="expedientes_'.$_SESSION['base'].'/'.$carpeta.'/'.$contrato.'" target="_blank">Ver </a>';
																}
																?>
														    </td>
														    </tr>

															<tr>
															<td colspan="2" height="25px">&nbsp;<b>Documentación Extra:</b><br>
															    <?
																	include ('connect.php');
																	
																	
																	$ex2=$mysqli->query("SELECT * FROM expedientes_extra WHERE id_expediente='$id_expediente'");
																	$rowcountex=mysqli_num_rows($ex2);

																	if ($rowcountex>0) {

																		while ($fila = $ex2->fetch_assoc()) {  
																		
																			$documento=$fila['documento'];
																			echo '<a href="expedientes_'.$_SESSION['base'].'/'.$carpeta.'/'.$documento.'" target="_blank">Ver '.$documento.'</a><br>';	   
																	}
																		
																	}else{ echo "No existen documentos extras.";}						  
																					
																	$mysqli->close();
																?>
															
															
															
															</td>
															
														    </tr>


													
														</table>
													</div>
												</div>
												<!--tab-pane-->










											</div>
										</div>
									</div>
								</div>
							</div>
							<!--tab_1_2-->
							<div class="tab-pane" id="tab_1_3">
								<div class="row profile-account">
									<div class="col-md-3">
										<ul class="ver-inline-menu tabbable margin-bottom-10">
											<li class="active">
												<a data-toggle="tab" href="#tab_1-1">
												<i class="fa fa-cog"></i> Información Personal </a>
												<span class="after">
												</span>
											</li>
											<li>
												<a data-toggle="tab" href="#tab_2-2">
												<i class="fa fa-picture-o"></i> Subir Foto </a>
											</li>
											<li>
												<a data-toggle="tab" href="#tab_3-3">
												<i class="fa fa-lock"></i> Documentación </a>
											</li>
											<li>
												<a data-toggle="tab" href="#tab_4-4">
												<i class="fa fa-lock"></i> Extra </a>
											</li>
											
										</ul>
									</div>
									<div class="col-md-9">
										<div class="tab-content">
											<div id="tab_1-1" class="tab-pane active">
												<form id="fomr1"  method="post" action="expediente.sql.php">
												<input type="hidden" name="bandera" value="2">
												<input type="hidden" name="carpeta" value="<?=$carpeta?>">
												<input type="hidden" name="foto" value="<?=$foto?>">
												<input type="hidden" name="id_expediente" value="<?=$id_expediente?>">
												    

												    <div class="form-group">
														<div class="col-md-5">
															  <label class="control-label"><b>Nombres:</b></label>
															  <input name="nombres" type="text" class="form-control" value="<?=$nombres?>" />
														</div>
														<div class="col-md-5">
														    <label class="control-label"><b>Codigo:</b></label>
														    <input name="codigo" type="text" class="form-control" value="<?=$codigo?>" />
														</div>
													 </div>

                                                    <div class="clearfix"></div>

													 <div class="form-group">
														<div class="col-md-5">
																<label class="control-label"><b>Apellidos:</b></label>
																<input name="apellidos" type="text" value="<?=$apellidos?>" class="form-control"/>
														</div>
														<div class="col-md-5">
																<label class="control-label"><b>Departamento:</b></label>
																<input name="departamento" type="text" value="<?=$departamento?>" class="form-control"/>
														</div>
													 </div>

													
                                                    <div class="clearfix"></div>


													 <div class="form-group">
														<div class="col-md-5">
																<label class="control-label"><b>DUI:</b></label>
																<input name="dui" type="text" value="<?=$dui?>" class="form-control"/>
														</div>
														<div class="col-md-5">
																<label class="control-label"><b>Area:</b></label>
																<input name="area" type="text" value="<?=$area?>" class="form-control"/>
														</div>
													 </div>

													 <div class="clearfix"></div>
													 


													 <div class="form-group">
														<div class="col-md-5">
																<label class="control-label"><b>NIT:</b></label>
																<input name="nit" type="text" value="<?=$nit?>" class="form-control"/>
														</div>
														<div class="col-md-5">
																<label class="control-label"><b>Contratacion:</b></label>
																<input name="contratacion" type="text" value="<?=$contratacion?>" class="form-control"/>
														</div>
													 </div>

													 <div class="clearfix"></div>

													<div class="form-group">
													<div class="col-md-5">
														    <label class="control-label"><b>AFP:</b></label>
															<input name="afp" type="text" value="<?=$afp?>" class="form-control"/>
													</div>
													<div class="col-md-5">
													        <label class="control-label"><b>Salario:</b></label>
															<input name="salario" type="text" value="<?=$salario?>" class="form-control"/>
															
													</div>
													</div>

													<div class="clearfix"></div>

													<div class="form-group">
													<div class="col-md-5">
													    <label class="control-label"><b>ISSS:</b></label>
														<input name="seguro" type="text" value="<?=$seguro?>" class="form-control"/>
													</div>
													<div class="col-md-5">
													        <label class="control-label"><b>Cuenta #:</b></label>
															<input name="cuenta" type="text" value="<?=$cuenta?>" class="form-control"/>
															
													</div>
													</div>

													<div class="clearfix"></div>

													<div class="form-group">
													<div class="col-md-5">
														    <label class="control-label"><b>Email:</b></label>
															<input name="email" type="text" value="<?=$email?>" class="form-control"/>
													    
													</div>
													<div class="col-md-5">

													        <label class="control-label"><b>Fecha Inicio:</b></label>
															<input autocomplete="off"  id="inicio" name="inicio" type="text" value="<?=$inicio?>" class="form-control" data-uk-datepicker="{format:'DD-MM-YYYY', i18n:{ months:['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre',  ] } }">
															
													        
															
													</div>
													</div>

													<div class="clearfix"></div>

													<div class="form-group">
													<div class="col-md-5">
													    <label class="control-label"><b>Telefono:</b></label>
														<input name="telefono" type="text" value="<?=$telefono?>" class="form-control"/>
													</div>
													<div class="col-md-5">
															<label class="control-label"><b>Fin Periodo Prueba:</b></label>	
															<input autocomplete="off"  id="prueba" name="prueba" type="text" value="<?=$prueba?>" class="form-control" data-uk-datepicker="{format:'DD-MM-YYYY', i18n:{ months:['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre',  ] } }">
															
															
													</div>
													</div>

													<div class="clearfix"></div>


													<div class="form-group">
													<div class="col-md-5">
													        <label class="control-label"><b>Empresa :</b></label>
															<input name="empresa" type="text" value="<?=$empresa?>" class="form-control"/>
													        
													</div>
													<div class="col-md-5">
													        <label class="control-label"><b>Licencia :</b></label>
															<input name="licencia" type="text" value="<?=$licencia?>" class="form-control"/>
															
													</div>
													</div>

													<div class="clearfix"></div>


													<div class="form-group">
													<div class="col-md-5">
													        <label class="control-label"><b>Contactos Emergencia :</b></label>
															<textarea name="emergencia" rows="4" cols="50"> <?=$emergencia?> </textarea>
													        
													</div>
													<div class="col-md-5">
													       
															
													</div>
													</div>

													<div class="clearfix"></div>




													<div class="margiv-top-10">
													<input type="submit" name="" value="Actualizar Expediente" class="btn blue">
														
														
													</div>
												</form>
											</div>



											<div id="tab_2-2" class="tab-pane">

                                              <style>
	
												input[type="file"] {
													/*display: none;*/
												}
												
												
												.custom-file-upload {
													border: 1px solid #ccc;
													display: inline-block;
													padding: 3px 6px;
													cursor: pointer;
												}
											</style>	

                                              <form  id="fomr2"  method="post" action="expediente.sql.php" enctype="multipart/form-data">
												<input type="hidden" name="bandera" value="3">
												<input type="hidden" name="id_expediente" value="<?=$id_expediente?>">
												<input type="hidden" name="carpeta" value="<?=$carpeta?>">

											  <label class="control-label"><strong>Foto:</strong></label>
												<div class="input">
														<label class="custom-file-upload">

														<input type="file" id="arte" name="arte" required />

															
														</label>
														<label id="ok"><strong>OK</strong></label>
												</div>

												<div class="margiv-top-10">
													<input type="submit" name="" value="Subir Foto" class="btn blue">
														
														
													</div>
												</form>

												<br><br>
												<div class="row">

												<div class="col-md-3">
													<ul class="list-unstyled profile-nav">
														<li>
															<img src="<?=$foto?>" class="img-responsive" alt=""/>
															
														</li>
													
													</ul>
												</div>
												</div>
				                                



											</div>




											<div id="tab_3-3" class="tab-pane">

                                             <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js" type="text/javascript"></script>
										     <script src="js/uploadifive/jquery.uploadifive.js" type="text/javascript"></script>
										     <link rel="stylesheet" type="text/css" href="js/uploadifive/uploadifive.css"> 




                                              <!-- ************************************************************************************************************************************** -->
                                              <div id="queue_cc1"></div>
												<div style="overflow:hidden">
												<div style="float:left">
													<p align="left"><input id="file_cc1" name="file_cc1" type="file"  ></p>
												</div>
												<div style="float:left; padding-left:20px"> 
													<label id="message_cc1" name="message_cc1">   
													<?
													
														if ($contrato!="") {
															
															echo '<a href="expedientes_'.$_SESSION['base'].'/'.$carpeta.'/'.$contrato.'" target="_blank">Ver Contrato</a>';
														}
													?>

														
													</label>
												</div>
												</div>  

												<script type="text/javascript">
												var $cc1 = jQuery.noConflict();
												$cc1(function() {
												$cc1('#file_cc1').uploadifive({
													'uploadScript' : 'expediente.sql.php',
													'fileType'     : '.pdf',
													'buttonText' : 'Subir Contrato',
													'multi'    : false,
													'removeCompleted' : true,
													'method'   : 'post', 
													'formData' : { 'bandera' : '4', 'id_expediente' : '<?=$id_expediente?>', 'carpeta' : '<?=$carpeta?>'  },
													'onUploadComplete' : function(file, data, response) {  $cc1('#message_cc1').html(data);},
													'height'   : 25,
													'width'   : 100
													
														
												});
												});
												</script>
                                                
												<br>
												<!-- ************************************************************************************************************************************** -->








                                                <!-- ************************************************************************************************************************************** -->

												<div id="queue_cc2"></div>
												<div style="overflow:hidden">
												<div style="float:left">
													<p align="left"><input id="file_cc2" name="file_cc2" type="file"  ></p>
												</div>
												<div style="float:left; padding-left:20px"> 
													<label id="message_cc2" name="message_cc2">   
													<?
													
														if ($solicitud!="") {
															
															echo '<a href="expedientes_'.$_SESSION['base'].'/'.$carpeta.'/'.$solicitud.'" target="_blank">Ver Solicitud</a>';
														}
													?>

														
													</label>
												</div>
												</div>

												<script type="text/javascript">
												var $cc2 = jQuery.noConflict();
												$cc2(function() {
												$cc2('#file_cc2').uploadifive({
													'uploadScript' : 'expediente.sql.php',
													'fileType'     : '.pdf',
													'buttonText' : 'Subir Solicitud',
													'multi'    : false,
													'removeCompleted' : true,
													'method'   : 'post', 
													'formData' : { 'bandera' : '5', 'id_expediente' : '<?=$id_expediente?>', 'carpeta' : '<?=$carpeta?>'  },
													'onUploadComplete' : function(file, data, response) {  $cc2('#message_cc2').html(data);},
													'height'   : 25,
													'width'   : 100
													
														
												});
												});
												</script>
                                                <br>
												<!-- ************************************************************************************************************************************** --> 



												<!-- ************************************************************************************************************************************** -->




												<div id="queue_cc3"></div>
												<div style="overflow:hidden">
												<div style="float:left">
													<p align="left"><input id="file_cc3" name="file_cc3" type="file"  ></p>
												</div>
												<div style="float:left; padding-left:20px"> 
													<label id="message_cc3" name="message_cc3">   
													<?
													
														if ($solvencia!="") {
															
															echo '<a href="expedientes_'.$_SESSION['base'].'/'.$carpeta.'/'.$solvencia.'" target="_blank">Ver Solvencia</a>';
														}
													?>

														
													</label>
												</div>
												</div>

												<script type="text/javascript">
												var $cc3 = jQuery.noConflict();
												$cc3(function() {
												$cc3('#file_cc3').uploadifive({
													'uploadScript' : 'expediente.sql.php',
													'fileType'     : '.pdf',
													'buttonText' : 'Subir Solvencia',
													'multi'    : false,
													'removeCompleted' : true,
													'method'   : 'post', 
													'formData' : { 'bandera' : '6', 'id_expediente' : '<?=$id_expediente?>', 'carpeta' : '<?=$carpeta?>'  },
													'onUploadComplete' : function(file, data, response) {  $cc3('#message_cc3').html(data);},
													'height'   : 25,
													'width'   : 100
													
														
												});
												});
												</script>
                                                <br>
												<!-- ************************************************************************************************************************************** --> 




												<!-- ************************************************************************************************************************************** -->




												<div id="queue_cc5"></div>
												<div style="overflow:hidden">
												<div style="float:left">
													<p align="left"><input id="file_cc5" name="file_cc5" type="file"  ></p>
												</div>
												<div style="float:left; padding-left:20px"> 
													<label id="message_cc5" name="message_cc5">   
													<?
													
														if ($dui_scan!="") {
															
															echo '<a href="expedientes_'.$_SESSION['base'].'/'.$carpeta.'/'.$dui_scan.'" target="_blank">Ver DUI</a>';
														}
													?>

														
													</label>
												</div>
												</div>

												<script type="text/javascript">
												var $cc5 = jQuery.noConflict();
												$cc5(function() {
												$cc5('#file_cc5').uploadifive({
													'uploadScript' : 'expediente.sql.php',
													'fileType'     : '.pdf',
													'buttonText' : 'Subir DUI',
													'multi'    : false,
													'removeCompleted' : true,
													'method'   : 'post', 
													'formData' : { 'bandera' : '8', 'id_expediente' : '<?=$id_expediente?>', 'carpeta' : '<?=$carpeta?>'  },
													'onUploadComplete' : function(file, data, response) {  $cc5('#message_cc5').html(data);},
													'height'   : 25,
													'width'   : 100
													
														
												});
												});
												</script>
                                                <br>
												<!-- ************************************************************************************************************************************** --> 



												<!-- ************************************************************************************************************************************** -->




												<div id="queue_cc6"></div>
												<div style="overflow:hidden">
												<div style="float:left">
													<p align="left"><input id="file_cc6" name="file_cc6" type="file"  ></p>
												</div>
												<div style="float:left; padding-left:20px"> 
													<label id="message_cc6" name="message_cc6">   
													<?
													
														if ($afp_scan!="") {
															
															echo '<a href="expedientes_'.$_SESSION['base'].'/'.$carpeta.'/'.$afp_scan.'" target="_blank">Ver AFP</a>';
														}
													?>

														
													</label>
												</div>
												</div>

												<script type="text/javascript">
												var $cc6 = jQuery.noConflict();
												$cc6(function() {
												$cc6('#file_cc6').uploadifive({
													'uploadScript' : 'expediente.sql.php',
													'fileType'     : '.pdf',
													'buttonText' : 'Subir AFP',
													'multi'    : false,
													'removeCompleted' : true,
													'method'   : 'post', 
													'formData' : { 'bandera' : '9', 'id_expediente' : '<?=$id_expediente?>', 'carpeta' : '<?=$carpeta?>'  },
													'onUploadComplete' : function(file, data, response) {  $cc6('#message_cc6').html(data);},
													'height'   : 25,
													'width'   : 100
													
														
												});
												});
												</script>
                                                <br>
												<!-- ************************************************************************************************************************************** --> 


												<!-- ************************************************************************************************************************************** -->




												<div id="queue_cc7"></div>
												<div style="overflow:hidden">
												<div style="float:left">
													<p align="left"><input id="file_cc7" name="file_cc7" type="file"  ></p>
												</div>
												<div style="float:left; padding-left:20px"> 
													<label id="message_cc7" name="message_cc7">   
													<?
													
														if ($nit_scan!="") {
															
															echo '<a href="expedientes_'.$_SESSION['base'].'/'.$carpeta.'/'.$nit_scan.'" target="_blank">Ver NIT</a>';
														}
													?>

														
													</label>
												</div>
												</div>

												<script type="text/javascript">
												var $cc7 = jQuery.noConflict();
												$cc7(function() {
												$cc7('#file_cc7').uploadifive({
													'uploadScript' : 'expediente.sql.php',
													'fileType'     : '.pdf',
													'buttonText' : 'Subir NIT',
													'multi'    : false,
													'removeCompleted' : true,
													'method'   : 'post', 
													'formData' : { 'bandera' : '10', 'id_expediente' : '<?=$id_expediente?>', 'carpeta' : '<?=$carpeta?>'  },
													'onUploadComplete' : function(file, data, response) {  $cc7('#message_cc7').html(data);},
													'height'   : 25,
													'width'   : 100
													
														
												});
												});
												</script>
                                                <br>
												<!-- ************************************************************************************************************************************** --> 



												<!-- ************************************************************************************************************************************** -->




												<div id="queue_cc8"></div>
												<div style="overflow:hidden">
												<div style="float:left">
													<p align="left"><input id="file_cc8" name="file_cc8" type="file"  ></p>
												</div>
												<div style="float:left; padding-left:20px"> 
													<label id="message_cc8" name="message_cc8">   
													<?
													
														if ($seguro_scan!="") {
															
															echo '<a href="expedientes_'.$_SESSION['base'].'/'.$carpeta.'/'.$seguro_scan.'" target="_blank">Ver ISSS</a>';
														}
													?>

														
													</label>
												</div>
												</div>

												<script type="text/javascript">
												var $cc8 = jQuery.noConflict();
												$cc8(function() {
												$cc8('#file_cc8').uploadifive({
													'uploadScript' : 'expediente.sql.php',
													'fileType'     : '.pdf',
													'buttonText' : 'Subir ISSS',
													'multi'    : false,
													'removeCompleted' : true,
													'method'   : 'post', 
													'formData' : { 'bandera' : '11', 'id_expediente' : '<?=$id_expediente?>', 'carpeta' : '<?=$carpeta?>'  },
													'onUploadComplete' : function(file, data, response) {  $cc8('#message_cc8').html(data);},
													'height'   : 25,
													'width'   : 100
													
														
												});
												});
												</script>
                                                <br>
												<!-- ************************************************************************************************************************************** --> 


												<!-- ************************************************************************************************************************************** -->




												<div id="queue_cc9"></div>
												<div style="overflow:hidden">
												<div style="float:left">
													<p align="left"><input id="file_cc9" name="file_cc9" type="file"  ></p>
												</div>
												<div style="float:left; padding-left:20px"> 
													<label id="message_cc9" name="message_cc9">   
													<?
													
														if ($licencia_scan!="") {
															
															echo '<a href="expedientes_'.$_SESSION['base'].'/'.$carpeta.'/'.$licencia_scan.'" target="_blank">Ver Licencia</a>';
														}
													?>

														
													</label>
												</div>
												</div>

												<script type="text/javascript">
												var $cc9 = jQuery.noConflict();
												$cc9(function() {
												$cc9('#file_cc9').uploadifive({
													'uploadScript' : 'expediente.sql.php',
													'fileType'     : '.pdf',
													'buttonText' : 'Subir Licencia',
													'multi'    : false,
													'removeCompleted' : true,
													'method'   : 'post', 
													'formData' : { 'bandera' : '12', 'id_expediente' : '<?=$id_expediente?>', 'carpeta' : '<?=$carpeta?>'  },
													'onUploadComplete' : function(file, data, response) {  $cc9('#message_cc9').html(data);},
													'height'   : 25,
													'width'   : 100
													
														
												});
												});
												</script>
                                                <br>
												<!-- ************************************************************************************************************************************** --> 



												<!-- ************************************************************************************************************************************** -->




												<div id="queue_cc4"></div>
												<div style="overflow:hidden">
												<div style="float:left">
													<p align="left"><input id="file_cc4" name="file_cc4" type="file"  ></p>
												</div>
												<div style="float:left; padding-left:20px"> 
													<label id="message_cc4" name="message_cc4">   
													<?
													
														if ($antecedentes!="") {
															
															echo '<a href="expedientes_'.$_SESSION['base'].'/'.$carpeta.'/'.$antecedentes.'" target="_blank">Ver Antecedentes</a>';
														}
													?>

														
													</label>
												</div>
												</div>

												<script type="text/javascript">
												var $cc4 = jQuery.noConflict();
												$cc4(function() {
												$cc4('#file_cc4').uploadifive({
													'uploadScript' : 'expediente.sql.php',
													'fileType'     : '.pdf',
													'buttonText' : 'Subir Antecedentes',
													'multi'    : false,
													'removeCompleted' : true,
													'method'   : 'post', 
													'formData' : { 'bandera' : '7', 'id_expediente' : '<?=$id_expediente?>', 'carpeta' : '<?=$carpeta?>'  },
													'onUploadComplete' : function(file, data, response) {  $cc4('#message_cc4').html(data);},
													'height'   : 25,
													'width'   : 120
													
														
												});
												});
												</script>
                                                <br>
												<!-- ************************************************************************************************************************************** --> 






												
											</div>




											<div id="tab_4-4" class="tab-pane">

											<br><br>

												<!-- ************************************************************************************************************************************** -->




												<div id="queue_cc10"></div>
												<div style="overflow:hidden">
												<div style="float:left">
													<p align="left"><input id="file_cc10" name="file_cc10" type="file"  ></p>
												</div>
												
												</div>

												<br><br>
												<div style="float:left; padding-left:20px"> 
													<label id="message_cc10" name="message_cc10">   
													<?
													     include ('connect.php');
														
														
														 $ex2=$mysqli->query("SELECT * FROM expedientes_extra WHERE id_expediente='$id_expediente'");
														 $rowcountex=mysqli_num_rows($ex2);

														 if ($rowcountex>0) {

															while ($fila = $ex2->fetch_assoc()) {  
															 
																$documento=$fila['documento'];
																echo '<a href="expedientes_'.$_SESSION['base'].'/'.$carpeta.'/'.$documento.'" target="_blank">Ver '.$documento.'</a><br>';	   
														   }
															
														}else{ echo "No existen documentos extras.";}						  
																		 
														$mysqli->close();
													?>

														
													</label>
												</div>

												<script type="text/javascript">
												var $cc10 = jQuery.noConflict();
												$cc10(function() {
												$cc10('#file_cc10').uploadifive({
													'uploadScript' : 'expediente.sql.php',
													'fileType'     : '.pdf',
													'buttonText' : 'Subir Documentacion Extra',
													'multi'    : false,
													'removeCompleted' : true,
													'method'   : 'post', 
													'formData' : { 'bandera' : '14', 'id_expediente' : '<?=$id_expediente?>', 'carpeta' : '<?=$carpeta?>', 'nombres' : '<?=$nombres?>', 'apellidos' : '<?=$apellidos?>'  },
													'onUploadComplete' : function(file, data, response) {  $cc10('#message_cc10').html(data);},
													'height'   : 25,
													'width'   : 200
													
														
												});
												});
												</script>
                                                <br>
												<!-- ************************************************************************************************************************************** --> 
											



											</div>


                                            

								
										</div>
									</div>
									<!--end col-md-9-->
								</div>
							</div>
							<!--end tab-pane-->










                            <div class="tab-pane" id="tab_1_4">
								<div class="row">
									<div class="col-md-9">

                                                <br>
									            <form id="fomr3"  method="post" action="expediente.sql.php">
												<input type="hidden" name="bandera" value="13">
												<input type="hidden" name="id_expediente" value="<?=$id_expediente?>">
												<input type="hidden" name="carpeta" value="<?=$carpeta?>">

											    <input type="submit" name="" value="Generar Expediente" class="btn blue">	
												</form>
									 
									   
									
									</div>
								</div>
							</div>
							<!--tab-pane-->




















						</div>
					</div>
					<!--END TABS-->
				</div>
			</div>
			<!-- END PAGE CONTENT-->
		</div>
	</div>
	<!-- END CONTENT -->





  

			
		

<!-- ------------FIN DE CONTENIDO-----------------------------------------------------------------------------------------------  -->


</div>
</div>
</div>
<!-- END CONTENT -->


</div>
<!-- END CONTAINER -->

<?
include("footer.php");
?>

<script src="assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="assets/global/scripts/metronic.js" type="text/javascript"></script>
<script src="assets/admin/layout/scripts/layout.js" type="text/javascript"></script>
<script src="assets/admin/layout/scripts/quick-sidebar.js" type="text/javascript"></script>
<script src="assets/global/plugins/select2/select2.min.js"></script>
<script src="assets/admin/pages/scripts/form-samples.js"></script>
<script type="text/javascript" src="assets/global/plugins/datatables/media/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js"></script>


<script src="uikit/js/uikit.min.js"></script>
<script src="uikit/js/components/datepicker.min.js"></script>
<script src="uikit/js/components/autocomplete.min.js"></script>


<!-- END PAGE LEVEL SCRIPTS -->
<script>
jQuery(document).ready(function() {    
   Metronic.init(); // init metronic core componets
   Layout.init(); // init layout
   QuickSidebar.init(); // init quick sidebar

    jQuery( "#ok" ).hide();


jQuery('#arte').bind('change', function() {

 if (this.files[0].size>48000000) { 

	 alert("La imagen que intenta subir excede el tamaño permitido.");
	
 }else{ jQuery( "#ok" ).show(); }

 

});
   
});
</script>
</body>
</html> 
