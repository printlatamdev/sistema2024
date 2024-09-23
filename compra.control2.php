<?php require("db/session.php"); ?>
<?php  require('assets/header.php'); ?>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <!-- Navbar -->
    <?php  require('navbar.php'); ?>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="index.php" class="brand-link">
        <img src="images/logo_color.png" alt="AdminLTE Logo" style="opacity: .8;margin-left:10%" width="150">
        <span class="brand-text font-weight-light"></span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <?php if ($base == "esa") { ?>
            <div class="image">
              <img src="images/esa1.png" class="img-circle elevation-2" alt="User Image">
            </div>
          <?php }
          if ($base == "nica") { ?>
            <div class="image">
              <img src="images/nica1.png" class="img-circle elevation-2" alt="User Image">
            </div>
          <?php } ?>
          <div class="info">
            <a href="#" class="d-block"><?php echo $nombre; ?></a><a class="d-block"> online <i class="fas fa-signal" style="color: #2EFE2E"></i></a>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <?php require("menu4.php"); ?>
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

    <div class="content-wrapper">
      <div class="container col-xs-12 col-md-12 col-lg-12 col-xl-12" style="margin-left: 10px;">


        <div class="row">
          <div class="col-md-4">

            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet box blue">
              <div class="portlet-title">
                <div class="caption"><i class="fa fa-edit"></i> Ordenes Compra
                </div>
                <div class="tools"></div>
              </div>
              <div class="portlet-body">
                <table class="table table-striped table-bordered table-hover" id="sample_5">
                  <thead>
                    <tr>
                      <th>Orden Compra</th>
                      <th>Proveedor</th>

                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    if($base == "esa"){
                      include("suministros/connect.php");
                    }else{
                      include("suministros/connect2.php");
                    }


                    $sql = "SELECT  * FROM compra  ORDER BY id_compra DESC ";

                    $server = $_SERVER['SERVER_ADDR'];



                    $rs = $mysqli->query($sql);
                    $p = 0;
                    $i = 0;
                    while ($row = $rs->fetch_assoc()) {


                      $p = $p + 1;


                      if ($i == 0) {
                        $class = "default";
                        $i = 1;
                      } else if ($i == 1) {
                        $class = "dfs";
                        $i = 0;
                      }

                      /*
      
                        if ($_SESSION['nivel']==1 || $_SESSION['nivel']==2 ) {
                          
                              $fin="<a id='close".$row["id_orden"]."' class='' data-toggle='modal' href='#'><strong>F</strong></a>";
      
                        } else {
      
                              $fin="";
      
                        }
                        
                      */




                      if ($row['estado'] == '0') { /*$class="danger"; */
                        $comp = "<span class='label label-sm label-warning'>PENDIENTE</span>";
                      } else if ($row['estado'] == '1') {
                        $comp = "<span class='label label-sm label-success'>AUTORIZADO</span>";
                      } else if ($row['estado'] == '2') {
                        $comp = "<span class='label label-sm label-danger'>ENTREGADO</span>";
                      } else if ($row['estado'] == '3') {
                        $comp = "<span class='label label-sm label-default'>ANULADO</span>";
                      }



                      if ($row['archivo'] != '') {
                        $arch = '<a target="_blank" href="ordenes_compra_' . $_SESSION['base'] . $_SESSION['year'] . '/' . $row['archivo'] . '"><b><font size="-2"> PDF</font></b></a>';
                      }


                      if ($row['auto'] != '') {
                        $scan = '<a target="_blank" href="ordenes_compra_docu_' . $_SESSION['base'] . $_SESSION['year'] . '/' . $row['auto'] . '"><b><font size="-2"> Scan</font></b></a>';
                      }

                      if ($row['factura'] != '') {
                        $fac = '<a target="_blank" href="ordenes_compra_fac_' . $_SESSION['base'] . $_SESSION['year'] . '/' . $row['factura'] . '"><b><font size="-2"> Factura</font></b></a>';
                      }






                      /* echo "      
                        <tr class= '".$class."' id='".$row['id_orden']."'>
                        <td width='60px' align='center' ><b>".$row['id_orden']."</b><br></td>
                                                <td> <b><a data-toggle='tab' href='#tab_".$row['id_orden']."'><strong>".$row['empresa']." </strong> <br> <font size='-2'>".$row['contacto']." </font></a></b>
                                                 <br>".$fin."</td></tr> 
                      "; */


                      echo "           
                                                <tr class= '" . $class . "' id='" . $row['id_compra'] . "'>

                                                 <td  id='maintd'  width='60px' align='center' valign='center' ><b>" . $row['id_compra'] . "</b></td>
                                                 <td   style='padding:0px'>

                                                        <div class='divTable'  >
                                                        <div class='divTableBody'> 
                                                        <div class='divTableRow'>
                                                        <div class='divTableCell'><a class='item' style='color: #000;' data-src='compra.control.iframe.php?base=".$base."&idorden=" . $row['id_compra'] . "' ><strong>" . strtoupper($row['empresa']) . " </strong> <br> <font size='-2'>" . $row['solicita'] . " </font></a>
                                                        </div>
                                                          <div align='center' valign='center' class='divTableCell2'><br></div>
                                                          <div align='center' valign='center' class='divTableCell2'><br></div>
                                                          <div align='center' valign='center' class='divTableCell3'><br></div>
                                                        </div>
                                                        
                                                        <div class='divTableRow'>
                                                        <div class='divTableCell'>" . $comp . "&nbsp;&nbsp;&nbsp;" . $arch . "&nbsp;&nbsp;&nbsp;&nbsp;" . $scan . "&nbsp;&nbsp;&nbsp;&nbsp;" . $fac . "</div>
                                                        <div align='center' valign='center' class='divTableCell2'></div>

                                                        <div align='center' valign='center' class='divTableCell2'></div>
                                                        <div align='center' valign='center' class='divTableCell3'></div>
                                                        </div>
                                                        </div>
                                                        </div>


                                               </td>
                                               </tr>
                                                    
                                          ";

                      $comp = "";
                      $arch = "";
                      $scan = "";
                      $fac = "";

                      /*
                                          <div align='center' valign='center' class='divTableCell2'><a id='r".$row['id_orden']."' href='#rem".$row['id_orden']."' role='button'  data-toggle='modal'><i class='fa fa-file-text-o'></i></a></div>
                                        */
                    }
                    $mysqli->close();
                    ?>


                  </tbody>
                </table>
              </div>
            </div>
            <!-- END EXAMPLE TABLE PORTLET-->




          </div>




          <div class="col-md-7">
            <div class="tab-content">





              <div id='itemcontent'>
                <iframe class="itemcontent" frameBorder="0"></iframe>
              </div>








            </div>
          </div>








        </div>
        <!-- END PAGE CONTENT-->


        <!-- ******************************************************************************************************************* -->

        <a id="exito_fin" href="#modal2" role="button" data-toggle="modal"></a>


        <div id="modal2" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="alert alert-success"><i class="fa fa-check-square"></i> <strong>Notificacion</strong></h4>
              </div>
              <div class="modal-body">
                <p>
                  <center>
                    <h4><strong>Se ha finalizado la orden exitosamente.<strong></h4>
                  </center>
                </p>
              </div>
              <div class="modal-footer">

                <button data-dismiss="modal" class="btn green">OK</button>

              </div>
            </div>
          </div>
        </div>










        <!-- ------------FIN DE CONTENIDO-----------------------------------------------------------------------------------------------  -->


        <style>
          #cld {
            border-style: ridge;
            border-width: 3px;
          }


          /* unvisited link */
          a:link {
            color: black;
          }

          /* visited link */
          a:visited {
            color: black;
          }

          /* mouse over link */
          a:hover {
            color: black;
          }

          /* selected link */
          a:active {
            color: black;
          }


          /* DivTable.com */
          .divTable {
            display: table;
            width: 100%;
          }

          .divTableRow {
            display: table-row;
          }

          .divTableHeading {
            background-color: #EEE;
            display: table-header-group;
          }

          .divTableCell,
          .divTableHead {
            /*border: 1px solid #999999;*/
            display: table-cell;
            padding: 3px 10px;
            border-bottom: 1px solid #000000;
            border-right: 1px solid #000000;
          }

          .divTableCell2 {
            /*border: 1px solid #999999;*/
            display: table-cell;
            padding: 3px 10px;
            border-bottom: 1px solid #000000;
            border-right: 1px solid #000000;
            width: 10%;
          }

          .divTableCell3 {
            /*border: 1px solid #999999;*/
            display: table-cell;
            padding: 3px 10px;
            border-bottom: 1px solid #000000;
            width: 10%;
          }




          .divTableHeading {
            background-color: #EEE;
            display: table-header-group;
            font-weight: bold;
          }

          .divTableFoot {
            background-color: #EEE;
            display: table-footer-group;
            font-weight: bold;
          }

          .divTableBody {
            display: table-row-group;
          }




          /*---------------------------------*/

          #sample_5 {
            border-style: solid;
            border-width: 1px;
            border-color: black;
          }


          #maintd {

            border-bottom: 1px solid #000000;
            border-right: 1px solid #000000;
          }

          #maintd2 {
            border-top: 1px solid #000000;
          }


          #maintd3 {
            border-bottom: 1px solid #000000;
          }

          #maintd4 {
            border-left: 1px solid #000000;
          }

          #maintd5 {
            border-left: 1px solid #000000;
            border-bottom: 1px solid #000000;
          }

          #maintd6 {
            border-top: 1px solid #000000;
            border-left: 1px solid #000000;
          }

          .dfs {
            background-color: #d3d3d3 !important;
          }

          /* Let's get this party started */
          ::-webkit-scrollbar {
            width: 12px;
          }

          /* Track */
          ::-webkit-scrollbar-track {
            -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
            -webkit-border-radius: 10px;
            border-radius: 10px;
          }

          /* Handle */
          ::-webkit-scrollbar-thumb {
            -webkit-border-radius: 10px;
            border-radius: 10px;
            background: rgba(​192, 192, 192, 0.3);
            -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.5);
          }

          ::-webkit-scrollbar-thumb:window-inactive {
            background: rgba(​192, 192, 192, 0.3);
          }



          /*------------------------------------------*/





          #fms {


            border-style: solid;
            border-width: 1px;
            padding: 20px;

            padding: 0px;
            margin-right: -1px;
            margin-bottom: -1px;
            margin-top: -1px;

          }

          #fmsd1 {

            /* height: 110px;*/
            border-bottom: thin solid #000000;
          }

          #fmsd2 {

            /*height: 170px;*/
            border-bottom: thin solid #000000;
          }

          #fmsd3 {

            /*height: 60px;*/
            /* border-bottom: thin solid #000000;  */
          }



          #fms3 {


            border-style: solid;
            border-width: 1px;
            padding: 20px;

            padding: 0px;
            margin-right: -1px;
            margin-bottom: -1px;
            margin-top: -1px;

          }

          #fms0 {

            display: flex;

          }


          .dataTables_filter input {
            width: 100px !important
          }


          #itemcontent {
            overflow: hidden !important;
            height: 790px;
          }

          .itemcontent {
            width: 100% !important;
            height: 100% !important;
          }
        </style>


        <style type="text/css" media="screen">
          a:link {
            color: #000000;
            text-decoration: none;
          }

          a:visited {
            color: #000000;
            text-decoration: none;
          }

          a:hover {
            color: #000000;
            text-decoration: none;
          }

          a:active {
            color: #000000;
            text-decoration: underline;
          }
        </style>




      </div>
      <!-- END CONTENT -->


    </div>
    <!-- END CONTAINER -->








    <?php include("suminstros/footer.php"); ?>
    <!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
    <!-- BEGIN CORE PLUGINS -->
    <!--[if lt IE 9]>
<script src="assets/global/plugins/respond.min.js"></script>
<script src="assets/global/plugins/excanvas.min.js"></script> 

SCRIPTS -->

    <script>
      jQuery(document).ready(function() {


        jQuery(document).keyup(function(e) {
          if (e.keyCode == 13) {
            if (!jQuery(e.target).closest('.modal fade in').length) {
              jQuery('.modal').each(function() {
                jQuery('.modal').modal('hide');
              });
            }
          }
        });




        var TableManaged = function() {



          var initTable5 = function() {



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





          var initTable1 = function() {

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

              // Uncomment below line("dom" parameter) to fix the dropdown overflow issue in the datatable cells. The default datatable layout
              // setup uses scrollable div(table-scrollable) with overflow:auto to enable vertical scroll(see: assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js). 
              // So when dropdowns used the scrollable div should be removed. 
              //"dom": "<'row'<'col-md-6 col-sm-12'l><'col-md-6 col-sm-12'f>r>t<'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>",

              "bStateSave": false, // save datatable state(pagination, sort, etc) in cookie.

              "lengthMenu": [
                [5, 10, 15, 20, -1],
                [5, 10, 15, 20, "Todos"] // change per page values here
              ],
              // set the initial value
              "pageLength": 10,
              "columnDefs": [{ // set default column settings
                'orderable': false,
                'targets': [0]
              }, {
                "searchable": true,
                "targets": [0, 1]
              }]
              // set first column as a default sort by asc
            });

            var tableWrapper = jQuery('#sample_1_wrapper');

            table.find('.group-checkable').change(function() {
              var set = jQuery(this).attr("data-set");
              var checked = jQuery(this).is(":checked");
              jQuery(set).each(function() {
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
            init: function() {
              if (!jQuery().dataTable) {
                return;
              }



              initTable5();
              //initTable1();


            }

          };

        }();


        //*************************************************************************************************************************************



        <?php

          if($base == "esa"){
            include("suministros/connect.php");
          }else{
            include("suministros/connect2.php");
          }
        $sql = "SELECT  * FROM compra  ORDER BY id_compra DESC ";

        $rs = $mysqli->query($sql);

        while ($row = $rs->fetch_assoc()) {


          echo '


                    jQuery("#close' . $row["id_compra"] . '").click(function(){
                   //jQuery("#static' . $row["id_compra"] . '").modal("hide");

                    var nivel = "1";
                    var orden = "' . $row["id_compra"] . '";
                    var bandera = "4";

                     var dataString = "nivel="+ nivel + "&orden="+ orden + "&bandera="+ bandera;


            jQuery.ajax({
            type: "POST",
            url: "produccion.sql.php",
            data: dataString,
            cache: false,
            success: function(result){

                if(result == 1)
                {                    

                    jQuery("#exito_fin").click();
                   
                   
                    jQuery( "#' . $row["id_compra"] . '" ).hide();
                    jQuery( "#tab_' . $row["id_compra"] . '" ).hide();
                    

                }
                else if (result == 0)
                {

                
                }

             }

            });

                return false;
                });




                    ';
        }
        $mysqli->close();
        ?>


        TableManaged.init();
        FormSamples.init();
        Metronic.init(); // init metronic core componets
        Layout.init(); // init layout
        QuickSidebar.init(); // init quick sidebar



        jQuery('a.item').on('click', function(e) {
          var src = jQuery(this).attr('data-src');
          //var height = jQuery(this).attr('data-height') || 300;
          //var width = jQuery(this).attr('data-width') || 400;
          //jQuery("#itemcontent iframe").attr({'src':src,'height': height,'width': width});
          jQuery("#itemcontent iframe").attr({
            'src': src
          });

        });






      });
    </script>



  </div>
  </div></span></a></li>
  </ul>
  </div>
  </nav>
  </header>
  </div>




  <?php include("html/modal_add.php"); ?>
  <!-- Edit Modal HTML -->
  <?php include("html/modal_edit.php"); ?>
  <!-- Delete Modal HTML -->
  <?php include("html/modal_delete.php"); ?>
  <script src="script.js"></script>



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




  <script src="suministros/assets/admin/pages/scripts/components-pickers.js"></script>



  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.18/b-1.5.4/b-colvis-1.5.4/b-flash-1.5.4/b-html5-1.5.4/b-print-1.5.4/datatables.min.css" />
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.18/b-1.5.4/b-colvis-1.5.4/b-flash-1.5.4/b-html5-1.5.4/b-print-1.5.4/datatables.min.js"></script>















</body>

</html>