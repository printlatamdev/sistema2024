<?
include("session.php");
/*

if (date('Y')!='20'.$_SESSION['year']) {

        header("Location: home.php"); 
   }

*/

                
					 include ('suministros/connect.php');

                     $sq="SELECT  * FROM vendedores WHERE nombre='".$_SESSION['vsNombre']."' ";			 		 
					 $rq=$mysqli->query($sq);
					  while($ro=$rq->fetch_assoc()){ $idd=$ro['id'];  }
					 $mysqli->close();             
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




<link rel="shortcut icon" href="images/color.ico"/>
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<!-- DOC: Apply "page-header-fixed-mobile" and "page-footer-fixed-mobile" class to body element to force fixed header or footer in mobile devices -->
<!-- DOC: Apply "page-sidebar-closed" class to the body and "page-sidebar-menu-closed" class to the sidebar menu element to hide the sidebar by default -->
<!-- DOC: Apply "page-sidebar-hide" class to the body to make the sidebar completely hidden on toggle -->
<!-- DOC: Apply "page-sidebar-closed-hide-logo" class to the body element to make the logo hidden on sidebar toggle -->
<!-- DOC: Apply "page-sidebar-hide" class to body element to completely hide the sidebar on sidebar toggle -->
<!-- DOC: Apply "page-sidebar-fixed" class to have fixed sidebar -->
<!-- DOC: Apply "page-footer-fixed" class to the body element to have fixed footer -->
<!-- DOC: Apply "page-sidebar-reversed" class to put the sidebar on the right side -->
<!-- DOC: Apply "page-full-width" class to the body element to have full width page without the sidebar menu -->
<body class="page-header-fixed page-quick-sidebar-over-content page-sidebar-fixed page-container-bg-solid">




<div class="clearfix">
</div>
<!-- BEGIN CONTAINER -->
<div class="page-container">
	
	




	<!-- BEGIN CONTENT -->
	
		<div  class="page-content">
		     <div id="page-content" >
			

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


<?

       if (isset($_REQUEST['id2'])) {

          	           include ('suministros/connect.php');
            
                       $id2=$_REQUEST['id2'];  
                      
                       $rs=$mysqli->query("SELECT * FROM log_ventas WHERE id_sales='".$id2."'");

		              while ($fila = $rs->fetch_row()) { 

		                $fecha = $fila[3];
		                $cliente = $fila[4];
		                $nota = $fila[8];
		                $resultado = $fila[9];
		                 
		              }

		               $mysqli->close();

          }

?>


       <h3 class="page-title">
			Registro de Facturación Diaria
			</h3>

                                 <!--
                                    <div class="col-md-8">
										<a href="#myModal_autocomplete" role="button" class="btn red" data-toggle="modal">
										<i class="fa fa-database"></i>  Ingresar Nueva Empresa</a>
                                        
                                       
                                        <a href="agenda.editar.empresa.php" role="button" class="btn green" >
										<i class="fa fa-database"></i>  Editar Registros de Empresa</a> 

										<a href="agenda.editar.contacto.php" role="button" class="btn yellow">
										<i class="fa fa-user"></i>  Editar Registros de Contacto</a> 


										</br></br>
									</div> -->
	








            <!-- BEGIN PAGE CONTENT-->
			<div class="row">
				<div class="col-md-12">

					<!-- BEGIN PORTLET-->
					<div class="portlet box blue">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-user"></i>Ingresar Nuevo Registro
							</div>
							
						</div>
						<div class="portlet-body form">
							<form action="save.ventas.php" id="form-vsNombre" class="form-horizontal form-bordered" method="post">
							<input type="hidden" name="flag" value="2">
							<input type="hidden" name="id" value="<?=$idd?>">
							<input type="hidden" name="nombre" value="<?=$_SESSION['vsNombre']?>">   



                        	
								
								<div class="form-group">
									<label class="col-sm-3 control-label"><b>Fecha:</b></label>
									<div class="col-sm-4">
										<div class="input-group">
											<span class="input-group-addon">
											<i class="fa fa-user"></i>
											</span>
											
											
											<input size="15" autocomplete="off" type="text" class="form-control" name="fecha" value="<?=date("d-m-Y")?>" readonly >



											<div class="input-group  date-picker input-daterange" data-date="10/11/2012" data-date-format="dd-mm-yyyy">


											<?  /*if (isset($_REQUEST['id2'])) { echo '<input size="15" autocomplete="off" type="text" class="form-control" name="fecha" value="'.$fecha.'" required>';  }
											    else{ echo '<input autocomplete="off" type="text" class="form-control" name="fecha" size="15" required>'; } */
											?>
												
			
											</div>
										</div>
										
									</div>
								</div>






								<div class="form-group">
									<label class="col-sm-3 control-label"><b>Monto: $</b></label>
									<div class="col-sm-4">
										<div class="input-group">
											<span class="input-group-addon">
											<i class="fa fa-user"></i>
											</span>
										
											<input class="form-control" required size="2" type="number" name="monto" id="monto" step="any" min="0" required >

											<?  
											    /*if (isset($_REQUEST['id2'])) { echo '<input type="text"  name="cliente" class="form-control" required value="'.$cliente.'" />';  }
											    else{ echo '<input type="text" size="10" name="cliente" class="form-control" required />'; } */
											?>
											
										</div>
										<p class="help-block">
											</code>
										</p>
									</div>
								</div>




							
								

                           

							
								<div class="form-actions">
									<div class="row">
										<div class="col-md-offset-3 col-md-9">
										    <!--<button type="button" class="btn default">Cancelar</button>-->
										    <?  if (isset($_REQUEST['id2'])) { echo '<button type="submit" class="btn blue"><i class="fa fa-check"></i> Actualizar</button>';  }
											    else{ echo '<button type="submit" class="btn blue"><i class="fa fa-check"></i> Guardar</button>'; } 
											?>

											
											
										</div>
									</div>
								</div>
							</form>





                         <!-- ---------------------------------------------------------------------------------------------------------------------------- -->							
							<div id="myModal_autocomplete" class="modal fade" role="dialog" aria-hidden="true">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
											<h4 class="modal-title"><b>Ingresar Nueva Empresa</b></h4>
										</div>
										<div class="modal-body form">
											<form action="save.empresa.php" class="form-horizontal form-row-seperated" method="post">
												<div class="form-group">
													<label class="col-sm-4 control-label"><b>Nombre</b></label>
													<div class="col-sm-8">
														<div class="input-group">
															<span class="input-group-addon">
															<i class="fa fa-user"></i>
															</span>
															<input type="text" id="typeahead_example_modal_1" name="nombre" class="form-control" required />
														</div>
														<p class="help-block">
															
														</p>
													</div>
												</div>



                                         
									</div>

                                    <div class="modal-footer">
										<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
										<button type="submit" class="btn blue"><i class="fa fa-check"></i> Guardar</button>

									</div> 

											</form>
										</div>
										
								</div> 
							</div>
						</div>
					</div>
					<!-- END PORTLET-->
				</div>
			</div>

















			



<!-- ------------CONTENIDO-----------------------------------------------------------------------------------------------  -->

    		

                   <!-- BEGIN EXAMPLE TABLE PORTLET-->
					<div class="portlet box red-intense">
						<div class="portlet-title">
							<div class="caption"><i class="fa fa-edit"></i>Historial de Facturación - <?=$_SESSION['vsNombre']?>
							</div>
							<div class="tools"></div>
						</div>
						<div class="portlet-body">
							<table class="table table-striped table-bordered table-hover" id="sample_1">


							           
							<thead>
							<tr>
								
								<th>Fecha</th>
								<th>Monto</th>
								
							</tr>
							</thead>
							<tbody>
                <?                 
					 include ('suministros/connect.php');

					
					 $sql="SELECT  * FROM log_ventas_facturacion WHERE id_vendedor='".$idd."'";			 		 
					 $rs=$mysqli->query($sql);
					 $p=0;
                     $i=0;
						 while($row=$rs->fetch_assoc()){ 
											  
											  /*
								 	$rs_medio=$mysqli->query("SELECT  nombre FROM empresa WHERE id_empresa='".$row['id_empresa']."'");
									while ($fila_medio = $rs_medio->fetch_row()) { $nombre_empresa=$fila_medio[0]; }*/

                                    $p= $p + 1;  
									    
									if($i==0){$class="odd"; $i=1;}
									else if($i==1){$class="even"; $i=0;}
									
				
							
										 echo "		   
												<tr class='".$class."' >
												
												<td ><center><font color='red'><b>".date("d-m-Y", strtotime($row['fecha']))."<b></font></center></td>
												<td ><b>$".number_format($row['monto'], 2, '.', ',')."<b></td>	
												</tr> 
										  "; 
			     				  																   											
						  }
								$mysqli->close();
                ?>

						
							</tbody>
							</table>
						</div>
					</div>
					<!-- END EXAMPLE TABLE PORTLET-->


                   



			







<!-- ------------FIN DE CONTENIDO-----------------------------------------------------------------------------------------------  -->




<!-- ------------FIN DE CONTENIDO-----------------------------------------------------------------------------------------------  -->

</div>
</div>
<!-- END CONTENT -->


</div>
<!-- END CONTAINER -->








<? include("footer.php"); ?>




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









<script>



var TableManaged = function () {



  var initTable1 = function () {
        var table = $('#sample_1');

        /* Table tools samples: https://www.datatables.net/release-datatables/extras/TableTools/ */

        /* Set tabletools buttons and button container */

        $.extend(true, $.fn.DataTable.TableTools.classes, {
            "container": "btn-group tabletools-dropdown-on-portlet",
            "buttons": {
                "normal": "btn btn-sm default",
                "disabled": "btn btn-sm default disabled"
            },
            "collection": {
                "container": "DTTT_dropdown dropdown-menu tabletools-dropdown-menu"
            }
        });

        var oTable = table.dataTable({

            // Internationalisation. For more info refer to http://datatables.net/manual/i18n
            "language": {
                "aria": {
                    "sortAscending": ": activate to sort column ascending",
                    "sortDescending": ": activate to sort column descending"
                },
                "emptyTable": "No se encontraron registros.",
                "info": "",
                "infoEmpty": "",
                "infoFiltered": "",
                "lengthMenu": "",
                "search": "Busqueda:",
                "zeroRecords": "No se encontraron registros."
            },

            // Or you can use remote translation file
            //"language": {
            //   url: '//cdn.datatables.net/plug-ins/3cfcc339e89/i18n/Portuguese.json'
            //},

            "order": [
               // [0, 'desc']
            ],

            "scrollY": "400",
            "paging": false,

             "columnDefs": [
					       { type: 'de_date', targets: 1 }
					     ], 


            
            
            "dom": "<'row' <'col-md-12'T>><'row'<'col-md-6 col-sm-12'l><'col-md-6 col-sm-12'f>r><'table-scrollable't><'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>", // horizobtal scrollable datatable

            // Uncomment below line("dom" parameter) to fix the dropdown overflow issue in the datatable cells. The default datatable layout
            // setup uses scrollable div(table-scrollable) with overflow:auto to enable vertical scroll(see: suministros/assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js). 
            // So when dropdowns used the scrollable div should be removed. 
            //"dom": "<'row' <'col-md-12'T>><'row'<'col-md-6 col-sm-12'l><'col-md-6 col-sm-12'f>r>t<'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>",

            "tableTools": {
                "sSwfPath": "suministros/assets/global/plugins/datatables/extensions/TableTools/swf/copy_csv_xls_pdf.swf",
                "aButtons": [{
                    "sExtends": "pdf",
                    "sButtonText": "PDF"
                }, {
                    "sExtends": "csv",
                    "sButtonText": "CSV"
                }, {
                    "sExtends": "xls",
                    "sButtonText": "Excel"
                }, {
                    "sExtends": "print",
                    "sButtonText": "Print",
                    "sInfo": 'Please press "CTR+P" to print or "ESC" to quit',
                    "sMessage": "Generated by DataTables"
                }]
            }
        });

        var tableWrapper = $('#sample_1_wrapper'); // datatable creates the table wrapper by adding with id {your_table_jd}_wrapper

        tableWrapper.find('.dataTables_length select').select2(); // initialize select2 dropdown
    }


   

    return {

        //main function to initiate the module
        init: function () {
            if (!jQuery().dataTable) {
                return;
            }

            initTable1();

                                
        }

    };

}();


//*************************************************************************************************************************************






 jQuery(document).ready(function() {    
   TableManaged.init();
   FormSamples.init();
   Metronic.init(); // init metronic core componets
   Layout.init(); // init layout
   QuickSidebar.init(); // init quick sidebar
   ComponentsPickers.init();
   
     

});
</script>

</body>
<!-- END BODY -->
</html>