<?php require("db/session.php"); ?>
<?php  require('assets/header.php'); ?>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <!-- Navbar -->
    <?php include('navbar.php'); ?>
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
            <a href="#" class="d-block"><?php echo $nombre; ?></a><a class="d-block"> online <i class="fas fa-signal"
                style="color: #2EFE2E"></i></a>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <?php include("menu4.php"); ?>
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

    <div class="content-wrapper">

      <div class="container col-xs-12 col-md-12 col-lg-12 col-xl-12" style="margin-left: 10px;">

        <div class="row">
          <div class="col-md-9">
            <div class="form-group">
              <label class="control-label col-md-3"></label>
              <div class="col-md-6">

                <strong>Material:</strong>

                <select id="material" name="material" class="select2_category form-control">
                  <option value="0">Elija un Material</option>';


                  <?php

                  include("suministros/connect.php");

                  $rs = $mysqli->query("SELECT * FROM material WHERE estado=1");



                  while ($fila = $rs->fetch_row()) {

                    $material_codificado = $fila[1] . " - " . $fila[2];

                    echo '<option value="' . base64_encode($material_codificado) . '">' . $fila[1] . ' - ' . $fila[2] . '</option>';

                  }

                  $mysqli->close();

                  ?>

                </select>


              </div>
            </div>
          </div>
          <!--/row-->





          <br><br><br>
          <!-- ------------CONTENIDO-----------------------------------------------------------------------------------------------  -->







          <!-- BEGIN PAGE CONTENT-->
          <div class="row">
            <div class="col-md-12">

              <!-- BEGIN EXAMPLE TABLE PORTLET-->
              <div class="portlet box blue">
                <div class="portlet-title">
                  <div class="caption"><i class="fa fa-edit"></i>
                    <?php if (isset($_REQUEST['material'])) {
                      echo "Bitacora de " . base64_decode($_REQUEST['material']);
                    } else {
                      echo "Reporte Ordenes Compra / Materiales";
                    } ?>
                  </div>
                  <div class="tools"></div>
                </div>
                <div class="portlet-body">
                  <table class="table table-striped table-bordered table-hover" id="sample_1">
                    <thead>
                      <tr>
                        <th>#ORDEN</th>
                        <th>Fecha</th>
                        <th>OC</th>
                        <th>Material</th>
                        <th>Cantidad</th>
                        <th>Precio (Sin IVA)</th>
                        <th>PDF</th>
                        <th>Autorizacion</th>
                        <th>Factura</th>


                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      include('suministros/connect.php');

                      $serve = $_SERVER['REQUEST_URI'];
                      $serve1 = $_SERVER['SERVER_NAME'];
                      $arr = explode("/", $serve);
                      $subd = $arr[1];
                      $uri = $serve1 . "/" . $subd;


                      if (isset($_REQUEST['material'])) {

                        $sql = "SELECT  * FROM compra_detalle WHERE material='" . base64_decode($_REQUEST['material']) . "' ORDER BY id_detalle_compra desc";

                      } else {

                        $sql = "SELECT  * FROM compra_detalle order by  id_detalle_compra DESC LIMIT 500 ";
                      }


                      $rs = $mysqli->query($sql);
                      $p = 0;
                      $i = 0;
                      while ($row = $rs->fetch_assoc()) {


                        $sql2 = "SELECT * FROM compra WHERE id_compra='" . $row['id_compra'] . "' order by id_compra desc   ";
                        $rs2 = $mysqli->query($sql2);
                        $row2 = mysqli_fetch_assoc($rs2);


                        $p = $p + 1;

                        if ($i == 0) {
                          $class = "odd";
                          $i = 1;
                        } else if ($i == 1) {
                          $class = "even";
                          $i = 0;
                        }
                        /* ***************************************************************************** */
                        if ($row2['archivo'] == "" or $row2['archivo'] == NULL) {
                          $archivo = "";
                        } else {
                          $archivo = "<a target='_blank' href='http://" . $uri . "/ordenes_compra_" . $_SESSION['base'] . $_SESSION['year'] . "/" . $row2['archivo'] . "' >Ver</a>";
                        }

                        if ($row2['auto'] == "" or $row2['auto'] == NULL) {
                          $auto = "";
                        } else {
                          $auto = "<a target='_blank' href='http://" . $uri . "/ordenes_compra_docu_" . $_SESSION['base'] . $_SESSION['year'] . "/" . $row2['auto'] . "' >Ver</a>";
                        }

                        if ($row2['factura'] == "" or $row2['factura'] == NULL) {
                          $factura = "";
                        } else {
                          $factura = "<a target='_blank' href='http://" . $uri . "/ordenes_compra_fac_" . $_SESSION['base'] . $_SESSION['year'] . "/" . $row2['factura'] . "' >Ver</a>";
                        }
                        /* ***************************************************************************** */

                        $str = $row["material"];
                        $mat = str_replace("Varios -", "", $str);

                        echo "      
                                                <tr class='" . $class . "' id='" . $row['id_detalle_compra'] . "'>
                                                 <td ><b>" . $row['id_compra'] . "</b></td>
                                                <td width='80px;'><b>" . $row2['fecha'] . "</b></td>
                        <td ><b>" . $row['id_compra'] . " - " . strtoupper($row['empresa']) . "</b></td>
                        <td ><b>" . $mat . "</b></td>
                        <td ><center><b>" . $row['cantidad'] . "</b></center></td>
                                                <td ><center><b>$ " . $row['precio'] . "<b></center></td>
                                                <td ><center><b>" . $archivo . "<b></center></td>
                                                <td ><center><b>" . $auto . "<b></center></td>
                                                <td ><center><b>" . $factura . "<b></center></td>
                        
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




            </div>
          </div>
          <!-- END PAGE CONTENT-->



        </div>
        <!-- END CONTENT -->


      </div>
      <!-- END CONTAINER -->








      <?php
      include("suministros/footer.php");
      ?>
      <!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
      <!-- BEGIN CORE PLUGINS -->
      <!--[if lt IE 9]>
<script src="assets/global/plugins/respond.min.js"></script>
<script src="assets/global/plugins/excanvas.min.js"></script> 

SCRIPTS -->
      <script>
        jQuery(document).ready(function () {


          var TableManaged = function () {




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
                  "info": "Mostrando _START_ a _END_ de _TOTAL_ registros",
                  "infoEmpty": "No se encontraron registros.",
                  "infoFiltered": "(filtered1 from _MAX_ total registros)",
                  "lengthMenu": "Mostrando _MENU_ registros",
                  "search": "Busqueda:",
                  "zeroRecords": "No se encontraron registros."
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
                "pageLength": 15,
                "columnDefs": [{  // set default column settings
                  'orderable': false,
                  'targets': [0],
                  'visible': true
                }, {
                  "searchable": true,
                  "targets": [1, 2, 3]
                }],
                "order": [
                  [0, "desc"]
                ] // set first column as a default sort by asc
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



                initTable1();


              }

            };

          }();


          //*************************************************************************************************************************************




          Metronic.init(); // init metronic core componets
          Layout.init(); // init layout
          QuickSidebar.init(); // init quick sidebar
          TableManaged.init();
          FormSamples.init();




          jQuery("#material").change(function () {

            var nm = jQuery("#material option:selected").val();
            //jQuery("#page-content").hide(); 
            //jQuery("#page-content").load("suministros.descargas.bitacora.php?material="+ nm );
            //jQuery('#page-content').fadeIn(1000);
            window.location.href = "compra.search2.php?material=" + nm;


            return false;
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




  <?php include("12/html/modal_add.php"); ?>
  <!-- Edit Modal HTML -->
  <?php include("12/html/modal_edit.php"); ?>
  <!-- Delete Modal HTML -->
  <?php include("12/html/modal_delete.php"); ?>
  <script src="script.js"></script>



  <script src="suministros/assets/global/plugins/jquery.min.js" type="text/javascript"></script>
  <script src="suministros/assets/global/plugins/jquery-migrate.min.js" type="text/javascript"></script>
  <!-- IMPORTANT! Load jquery-ui.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
  <script src="suministros/assets/global/plugins/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
  <script src="suministros/assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
  <script src="suministros/assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js"
    type="text/javascript"></script>
  <script src="suministros/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js"
    type="text/javascript"></script>
  <script src="suministros/assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
  <script src="suministros/assets/global/plugins/jquery.cokie.min.js" type="text/javascript"></script>
  <script src="suministros/assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
  <script src="suministros/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js"
    type="text/javascript"></script>
  <!-- END CORE PLUGINS -->
  <!-- BEGIN PAGE LEVEL PLUGINS -->
  <script src="suministros/assets/global/plugins/jqvmap/jqvmap/jquery.vmap.js" type="text/javascript"></script>
  <script src="suministros/assets/global/plugins/flot/jquery.flot.min.js" type="text/javascript"></script>
  <script src="suministros/assets/global/plugins/flot/jquery.flot.resize.min.js" type="text/javascript"></script>
  <script src="suministros/assets/global/plugins/flot/jquery.flot.categories.min.js" type="text/javascript"></script>
  <script src="suministros/assets/global/plugins/jquery.pulsate.min.js" type="text/javascript"></script>
  <script src="suministros/assets/global/plugins/bootstrap-daterangepicker/moment.min.js"
    type="text/javascript"></script>
  <script src="suministros/assets/global/plugins/bootstrap-daterangepicker/daterangepicker.js"
    type="text/javascript"></script>
  <!-- IMPORTANT! fullcalendar depends on jquery-ui.min.js for drag & drop support -->
  <script src="suministros/assets/global/plugins/fullcalendar/fullcalendar.min.js" type="text/javascript"></script>
  <script src="suministros/assets/global/plugins/jquery-easypiechart/jquery.easypiechart.min.js"
    type="text/javascript"></script>
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



  <link rel="stylesheet" type="text/css"
    href="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.18/b-1.5.4/b-colvis-1.5.4/b-flash-1.5.4/b-html5-1.5.4/b-print-1.5.4/datatables.min.css" />
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
  <script type="text/javascript"
    src="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.18/b-1.5.4/b-colvis-1.5.4/b-flash-1.5.4/b-html5-1.5.4/b-print-1.5.4/datatables.min.js">
  </script>
</body>

</html>