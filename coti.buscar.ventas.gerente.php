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
<script>


function valor2(val2){
var v2 =  val2;
document.form1.target="_self";
document.form1.action="coti.buscar.ventas.gerente.php?id_ventas="+ v2 ;
document.form1.submit(); 
 }



</script>


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





                           <div class="input-group">
                            <b>Vendedor</b> <br>
                            <form id="fomr1" name='form1' method="post">
                                          <select id="vendedor" name="vendedor" onchange='valor2(this.value);'   tabindex="1">
                                             <option value="0">Elejir Vendedor</option><option value="3">Wendy Landaverde</option><option value="8">Sarai Martinez</option><option value="18">Ibbys Nerio</option><option value="13">Leticia Sorto</option><option value="16">Tatiana Alfaro</option><option value="10">Karina Castillo Lopez</option><option value="17">Manuel Orellana</option>   

                                            </select>
                                              </form>
                                        </div><br>




    <!-- BEGIN EXAMPLE TABLE PORTLET-->
         <div class="portlet box green">
                        <div class="portlet-title">
                            <div class="caption"><i class="fa fa-edit"></i>Busqueda de Cotizaciones 
                            </div>
              <div class="tools"></div>

              



            </div>
            <div class="portlet-body">
              <table class="table table-striped table-bordered table-hover" id="sample_1">




                         
              <thead>
              <tr>
                                <th><center>Estado</center></th>
                                <th><center>Comentarios</center></th>
                                <th><center>Vendedor</center></th>
                                <th><center>Cotizacion N°</center></th>
                                <th>Cliente</th>
                                <th>Fecha</th>
                                <th>Archivo</th>
              </tr>
              </thead>
              <tbody>


                                      <br>
                                      
                       


                <?                 
           include ('suministros/connect.php');

          if (isset($_REQUEST['id_ventas'])) {
            
                       $username=$_REQUEST['id_ventas'];
                        $sql = "SELECT id_cotizacion, id_empresa, contacto, fecha, vendedor, archivo, estado, comentario FROM cotizacion WHERE id_vendedor='".$username."'";


         
              
           $rs=$mysqli->query($sql);
           $p=0;
           $i=0;
             while($row=$rs->fetch_assoc()){ 
                        
                    
                                    $p= $p + 1;  
                      
                  if($i==0){$class="odd"; $i=1;}
                  else if($i==1){$class="even"; $i=0;}


                  if ($row["estado"]=='Pendiente') {
      
                       $nestedData= "<center><b><font color='blue'>".$row["estado"]."</font></b></center>";

                   } elseif ($row["estado"]=='Aprobada') {

                    $nestedData= "<center><b><font color='green'>".$row["estado"]."</font></b></center>";

                   }else{
                      
                      $nestedData= "<center><b><font color='red'>".$row["estado"]."</font></b></center>";

                   }

                   //----------SCAMOS EL NOMBRE DE LA EMPRESA-----------
                  $sql4="SELECT  * FROM empresa WHERE id_empresa='".$row['id_empresa']."'";
                       
                  $rs4=$mysqli->query($sql4);

                
                  while($row4=$rs4->fetch_assoc()){ 


                    $nmb = "<b>".$row4["nombre"]."</b>"; 
        
                 }  
                 //--------------------------------------------------

                  if($row['archivo']=="")
                  {
                  
                  $archv = "<b><a target='_blank' href='http://$uri/coti.pdf.php?id=".$row['id_cotizacion']."' ></a></b>";

                  }else
                  {

                  $archv = "<b><a target='_blank' href='http://$uri/cotizaciones_".$_SESSION['base'].$_SESSION['year']."/".$row["archivo"]."' >ABRIR COTIZACION</a></b>";

                  }

                  //detectar server y carpeta raiz donde esta guardado las cotizaciones

                  $serve =  $_SERVER['REQUEST_URI'];
                  $serve1 = $_SERVER['SERVER_NAME'];

                  $arr = explode("/", $serve);
                  $subd= $arr[1];

                  $uri = $serve1."/".$subd;
//------------------------------------------------------------------
                  
        
              
                     echo "      
                        <tr class='".$class."' >

                        <td ><b>".$nestedData."<b></td>
                        <td ><b>".$row['comentario']."<b></td>
                        <td ><b>".$row['vendedor']."<b></td>
                        <td ><b>".$row['id_cotizacion']."<b></td>
                        <td ><b>".$nmb."<b></td>
                        <td ><b>".$row['fecha']."<b></td>
                        <td ><b>".$archv."<b></td>
                       
                        
                        </tr> 
                      "; 
                                                                            
              }


          } else {}
                $mysqli->close();
                ?>

            
              </tbody>
              </table>
            </div>
          </div>
          <!-- END EXAMPLE TABLE PORTLET-->








<!-- ------------FIN DE CONTENIDO-----------------------------------------------------------------------------------------------  -->


</div>
</div>
</div>
<!-- END CONTENT -->


</div>
<!-- END CONTAINER -->









<?php include("suminstros/footer.php"); ?>
<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->
<!--[if lt IE 9]>
<script src="suministros/assets/global/plugins/respond.min.js"></script>
<script src="suministros/assets/global/plugins/excanvas.min.js"></script> 

-->





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

jQuery(document).ready(function() { 

var TableManaged = function () {



    var initTable5 = function () {



        var table = $('#sample_5');



        /* Fixed header extension: http://datatables.net/extensions/scroller/ */

        var oTable = table.dataTable({
            //"dom": "<'row'<'col-md-6 col-sm-12'l><'col-md-6 col-sm-12'f>r>t<'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>", // datatable layout without  horizobtal scroll
            "language": {
                "aria": {
                    "sortAscending": ": activate to sort column ascending",
                    "sortDescending": ": activate to sort column descending"
                },
                "emptyTable": "No hay informacion disponible.",
                "info": "",
                "infoEmpty": "No se encontraron registros.",
                "infoFiltered": "",
                "lengthMenu": "Mostrando _MENU_ ",
                "search": "<i class='fa fa-search'></i>",
                "zeroRecords": ""
            },

            "scrollY": "600",
            "deferRender": true,
            "order": [
                [0, 'desc']
            ],
            "paging": false           
        });


        var tableWrapper = $('#sample_5_wrapper'); // datatable creates the table wrapper by adding with id {your_table_jd}_wrapper
        tableWrapper.find('.dataTables_length select').select2(); // initialize select2 dropdown
    }





    var initTable1 = function () {

        var table = $('#sample_1');

        // begin: third table
        table.dataTable({

            // Internationalisation. For more info refer to http://datatables.net/manual/i18n
            "language": {
                "aria": {
                    "sortAscending": ": activate to sort column ascending",
                    "sortDescending": ": activate to sort column descending"
                },
                "emptyTable": "No hay informacion disponible.",
                "info": "",
                "infoEmpty": "No se encontraron registros.",
                "infoFiltered": "",
                "lengthMenu": "Mostrando _MENU_ ",
                "search": "",
                "zeroRecords": ""
            },

             "order": [
                [3, 'desc']
            ],
            
            // Uncomment below line("dom" parameter) to fix the dropdown overflow issue in the datatable cells. The default datatable layout
            // setup uses scrollable div(table-scrollable) with overflow:auto to enable vertical scroll(see: suministros/assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js). 
            // So when dropdowns used the scrollable div should be removed. 
            //"dom": "<'row'<'col-md-6 col-sm-12'l><'col-md-6 col-sm-12'f>r>t<'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>",

            "bStateSave": false, // save datatable state(pagination, sort, etc) in cookie.
            
            "lengthMenu": [
                [5, 10, 15, 20, -1],
                [5, 10, 15, 20, "Todos"] // change per page values here
            ],
            // set the initial value
            "pageLength": 50,
            "columnDefs": [{  // set default column settings
                'orderable': false,
                'targets': [0]
            }, {
                "searchable": true,
                "targets": [0, 1]
            }]
             // set first column as a default sort by asc
        });

        var tableWrapper = jQuery('#sample_1_wrapper');

        table.find('.group-checkable').change(function () {
            var set = jQuery(this).attr("data-set");
            var checked = jQuery(this).is(":checked");
            jQuery(set).each(function () {
                if (checked) {
                    $(this).attr("checked", true);
                } else {
                    $(this).attr("checked", false);
                }
            });
            jQuery.uniform.update(set);
        });

        tableWrapper.find('.dataTables_length select').select2(); // initialize select2 dropdown
    }



    return {

        //main function to initiate the module
        init: function () {
            if (!jQuery().dataTable) {
                return;
            }

            

             //initTable5();
             initTable1();

                                
        }

    };

}();





   TableManaged.init();
   FormSamples.init();
   Metronic.init(); // init metronic core componets
   Layout.init(); // init layout
   QuickSidebar.init(); // init quick sidebar
   
      
});
</script>

<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html> 

