<?php require("db/session.php"); ?>
<?php  require('assets/header.php'); ?>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">
    <!-- Navbar -->
    <?php require('navbar.php'); ?>
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
            <a href="#" class="d-block"><? echo $nombre; ?></a><a class="d-block"> online <i class="fas fa-signal"
                style="color: #2EFE2E"></i></a>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
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
          <div class="col-md-8">
            <div id="contenedor1" class="portlet light bordered">
              <div class="portlet-title">
                <div class="caption">
                  <i class=" icon-book-open font-green-sunglo"></i> Editar Orden Compra
                </div>
                <ul class="nav nav-tabs">
                  <li class="active">
                    <a href="#portlet_tab_1_1" data-toggle="tab">
                      <strong></strong></a>
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
                          <form id="fomr22" method="post" action="#" class="form-horizontal">
                            <div class="form-body">



                              <!--/row-->
                              <div class="row">
                                <div class="col-md-10">


                                  <div class="form-group">

                                    <div class="col-md-5">
                                      <label class="control-label"><strong>Numero de Orden de
                                          Compra:</strong></label><br><br>



                                      <div class="input-group">
                                        <!--<input id="ord" name="ord" type="text" class="form-control" ><br><br>-->
                                        <select id="ord" name="ord" class="select2_category form-control"
                                          style="width:400px">

                                          <?php

                                          include("suministros/connect.php");


                                          $rs = $mysqli->query("SELECT * FROM compra  ORDER BY id_compra DESC");
                                          while ($fila = $rs->fetch_assoc()) {
                                            echo '<option value="' . $fila['id_compra'] . '">' . $fila['id_compra'] . ' - ' . $fila['empresa'] . ' - ' . $fila['fecha'] . '</option>';
                                          }
                                          $mysqli->close();
                                          ?>

                                        </select><br><br><br>

                                        <a class="edit" href="#">

                                          <button type="button" class="btn blue">Editar Orden Compra</button>

                                        </a>

                                      </div>
                                    </div>


                                    <div class="col-md-5">


                                    </div>




                                  </div>

                                </div>
                              </div>
                              <!--/row-->





                          </form>
                          <!-- END FORM-->

                        </div>
                      </div>


                    </div>

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <?php
    include("suministros/footer.php");
    ?>

    <script>
      jQuery(document).ready(function () {
        Metronic.init(); // init metronic core componets
        Layout.init(); // init layout
        QuickSidebar.init(); // init quick sidebar
        FormSamples.init();
        ComponentsPickers.init();


        jQuery(document).on('click', '.edit', function () {

          //jQuery("#page-content").hide(); 
          var orden = jQuery("#ord").val();

          jQuery(window).attr('location', 'compra.detalle2.php?compra=' + orden + '');


          return false;

        });
      });
    </script>

    <script>
      jQuery(document).ready(function () {
        Metronic.init(); // init metronic core componets
        Layout.init(); // init layout
        QuickSidebar.init(); // init quick sidebar
        FormSamples.init();
        ComponentsPickers.init();





        //*****************************************************         
        jQuery('#empresa').change(function () {

          jQuery('#contacto').fadeOut();
          jQuery.post("produccion.contactos.php", {
            emp: jQuery('#empresa').val()
          },

            function (response) {
              jQuery('#contacto').html(response);
              jQuery('#contacto').fadeIn();
            });
          return false;
        });
        //*******************************************************


        //*************************************************************************************************
        jQuery("#nueva_compra").click(function () {
          jQuery("#nueva_compra").prop("disabled", true);

          var empresa = jQuery("#empresa").val();
          var nom_empresa = jQuery("#empresa option:selected").text();
          var solicita = jQuery("#solicita").val();
          var nom_solicita = jQuery("#solicita option:selected").text();
          var fecha = jQuery("#fecha").val();


          if (empresa == 0 || solicita == 0) {
            jQuery('#vacio').click();
            jQuery("#nueva_compra").prop("disabled", false);
          } else {


            jQuery('#crea').submit(function () {
              jQuery('#crea').append('<input type="hidden" name="nom_empresa" value="' + nom_empresa + '" /> ');
              jQuery('#crea').append('<input type="hidden" name="nom_solicita" value="' + nom_solicita + '" /> ');
            });

            jQuery("#crea").submit();


          }
          return false;
        });
        //**************************************************************************************************//
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
    src="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.18/b-1.5.4/b-colvis-1.5.4/b-flash-1.5.4/b-html5-1.5.4/b-print-1.5.4/datatables.min.js"></script>
</body>

</html>