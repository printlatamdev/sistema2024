<?
include("session.php");
                
					 include ('suministros/connect.php');

                     $sq="SELECT  * FROM usuarios WHERE nombre='".$_SESSION['vsNombre']."' ";			 		 
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
<script>


function valor2(val2){
var v2 =  val2;
document.form1.target="_self";
document.form1.action="reporte.ventas.admin.php?id_ventas="+ v2 ;
document.form1.submit(); 
 }



</script>
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


       <h3 class="page-title">
			Registro de Actividades de Ventas
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




			



<!-- ------------CONTENIDO-----------------------------------------------------------------------------------------------  -->

    		

                   <!-- BEGIN EXAMPLE TABLE PORTLET-->
					<div class="portlet box red-intense">
						<div class="portlet-title">
							<div class="caption"><i class="fa fa-edit"></i>Historial de Actividades
							</div>
							<div class="tools"></div>

							



						</div>
						<div class="portlet-body">
							<table class="table table-striped table-bordered table-hover" id="sample_1">




							           
							<thead>
							<tr>
								<th>ID</th>
								<th>Vendedor</th>
								<th>Fecha</th>
								<th>Cliente</th>
								<th>Actividad</th>
								<th>Resultado</th>
								<th>Hora</th>
							</tr>
							</thead>
							<tbody>


                                      <br>
                                      
							           <div class="input-group">
							              <b>Vendedor</b> <br>
							              <form id="fomr1" name='form1' method="post">
                                          <select id="vendedor" name="vendedor" onchange='valor2(this.value);'   tabindex="1">
                                              <?php
                                                  include("suministros/connect.php");
                                              
                                                  $rs=$mysqli->query("SELECT * FROM vendedores WHERE estado='1'");
                                                     while ($fila = $rs->fetch_row()) { echo '<option value="'.$fila[0].'">'.$fila[1].'</option>';  }
                                                  $mysqli->close();
                                               ?>    
                                            </select>
                                              </form>
                                        </div>
                                      




                <?                 
					 include ('suministros/connect.php');

					if (isset($_REQUEST['id_ventas'])) {
						
                       $sql="SELECT  * FROM log_ventas WHERE id_vendedor='".$_REQUEST['id_ventas']."' ";	

					} else {
						
						$sql="SELECT  * FROM log_ventas ORDER BY id_sales DESC LIMIT 50";	
					}
					
					 		 		 
					 $rs=$mysqli->query($sql);
					 $p=0;
                     $i=0;
						 while($row=$rs->fetch_assoc()){ 
											  
											 
								 	$rs_medio=$mysqli->query("SELECT  nombre FROM usuarios WHERE id_usuario='".$row['id_vendedor']."'");
									while ($fila_medio = $rs_medio->fetch_row()) { $nombre_empresa=$fila_medio[0]; }

                                    $p= $p + 1;  
									    
									if($i==0){$class="odd"; $i=1;}
									else if($i==1){$class="even"; $i=0;}
									
				
							
										 echo "		   
												<tr class='".$class."' >
												<td width='50px' ><center><font color='green'><b>".$row['id_sales']."<b></font></center></td>
												<td width='100px' ><center><font color='green'><b>".$nombre_empresa."<b></font></center></td>
												<td width='100px' ><center><font color='red'><b>".$row['fecha']."<b></font></center></td>
												<td ><font color='blue'><b>".strtoupper($row['cliente'])."<b></font></td>
												<td ><b>".$row['nota']."<b></td>
												<td ><b>".$row['resultado']."<b></td>
												<td ><b>".$row['hora']."<b></td>
												
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



<script src="suministros/assets/global/scripts/metronic.js" type="text/javascript"></script>
<script src="suministros/assets/admin/layout/scripts/layout.js" type="text/javascript"></script>
<script src="suministros/assets/admin/layout/scripts/quick-sidebar.js" type="text/javascript"></script>
<script src="suministros/assets/admin/layout/scripts/demo.js" type="text/javascript"></script>
<script src="suministros/assets/admin/pages/scripts/index.js" type="text/javascript"></script>
<script src="suministros/assets/admin/pages/scripts/tasks.js" type="text/javascript"></script>
<script src="suministros/assets/global/plugins/select2/select2.min.js"></script>
<script src="suministros/assets/admin/pages/scripts/form-samples.js"></script>


<script type="text/javascript" src="suministros/assets/global/plugins/datatables/media/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="suministros/assets/global/plugins/datatables/extensions/TableTools/js/dataTables.tableTools.min.js"></script>
<script type="text/javascript" src="suministros/assets/global/plugins/datatables/extensions/ColReorder/js/dataTables.colReorder.min.js"></script>
<script type="text/javascript" src="suministros/assets/global/plugins/datatables/extensions/Scroller/js/dataTables.scroller.min.js"></script>
<script type="text/javascript" src="suministros/assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js"></script>









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
                [0, 'desc']
            ],

            "scrollY": "400",
            "paging": false,


            
            
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