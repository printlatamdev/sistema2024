<?php require("db/session.php"); ?>
<?php require('assets/header.php'); ?>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <!-- Navbar -->
    <?php include('navbar.php'); ?>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="index.php" class="brand-link">
        <img src="images/logo_color.png" alt="AdminLTE Logo"
          style="opacity: .8;margin-left:10%" width="150">
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
            <a href="#" class="d-block"><? echo $nombre; ?></a><a class="d-block"> online <i class="fas fa-signal" style="color: #2EFE2E"></i></a>
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
      </div>
    </aside>

    <div class="content-wrapper">
      <div class="container col-xs-12 col-md-12 col-lg-12 col-xl-12" style="margin-left: 10px;">
        <div class="row">
          <div class="col-md-8">
            <div id="contenedor1" class="portlet box blue">
              <div class="portlet-title">
                <div class="caption">
                  <i class=" icon-book-open font-green-sunglo"></i> Nueva Orden Compra
                </div>
              </div>

              <div class="portlet-body form">
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;
                <a href="#myModal_proveedor" role="button" class="btn green" data-toggle="modal">
                  <i class="fa fa-database"></i> Ingresar Nuevo Proveedor</a>

                <!-- BEGIN FORM-->
                <form id="crea" action="compra.sql.php" class="horizontal-form" method="post">
                  <input type="hidden" name="bandera" value="1">
                  <div class="form-body">
                    <h3 class="form-section">Informacion</h3>




                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">

                          <label class="control-label"><strong>Proveedor:</strong></label>
                          <div class="input-group">
                            <span class="input-group-addon input-circle-left">
                              <i class="fa   fa-briefcase"></i>
                            </span>
                            <select id="empresa" name="empresa" class="select2_category form-control" tabindex="1" required>
                              <option value="0">Seleccione Empresa</option>
                              <?php
                              include($base . "_db.php");
                              $rs = $mysqli->query("SELECT * FROM proveedor");
                              while ($fila = $rs->fetch_row()) {
                                echo '<option value="' . $fila[0] . '">' . $fila[1] . '</option>';
                              }
                              $mysqli->close();
                              ?>
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="control-label "><strong>OP:</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                          <label class="control-label "><strong>POP:</strong></label><input type="checkbox" name="pop" id="pop" value="1" />
                          <input id="op" name="op" type="text" onkeypress="return isNumberKey(event)" class="form-control">
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="control-label"><strong>Solicitado Por:</strong></label>
                          <div class="input-group">
                            <span class="input-group-addon input-circle-left">
                              <i class="fa  fa-user-md"></i>
                            </span>
                            <select id="solicita" name="solicita" class="select2_category form-control" tabindex="1">
                              <?php
                              include($base . "_db.php");

                              $rs = $mysqli->query("SELECT * FROM compra_usuarios WHERE estado='1' AND categoria='Jefatura'");
                              while ($fila = $rs->fetch_row()) {
                                echo '<option value="' . $fila[0] . '">' . $fila[1] . '</option>';
                              }
                              $mysqli->close();
                              ?>
                            </select>
                          </div>
                        </div>
                      </div>
                      <!--authored by-->
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="control-label"><strong>Autorizado Por:</strong></label>
                          <div class="input-group">
                            <span class="input-group-addon input-circle-left">
                              <i class="fa  fa-user-md"></i>
                            </span>
                            <select id="autoriza" name="autoriza" class="select2_category form-control" tabindex="1">
                              <?php
                              include($base . "_db.php");
                              $rs = $mysqli->query("SELECT * FROM compra_usuarios WHERE estado='1' AND categoria='Gerencia'");
                              while ($fila = $rs->fetch_row()) {
                                echo '<option value="' . $fila[0] . '">' . $fila[1] . '</option>';
                              }
                              $mysqli->close();
                              ?>
                            </select>
                          </div>
                        </div>
                      </div>
                      <!--/span-->
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="control-label "><strong>Fecha:</strong></label>
                          <input id="fecha" name="fecha" type="text" class="form-control" readonly value="<?= date("d-m-Y"); ?>">
                        </div>
                      </div>
                      <!--/span-->
                      <!--/description-->
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="control-label"><strong>Detalle de solicitud:</strong></label>
                          <textarea class="form-control" id="detalle" name="detalle"></textarea>
                        </div>
                      </div>
                    </div>
                    <div class="form-actions left">
                      <button id="nueva_compra" type="button" class="btn blue">Crear Orden Compra</button>
                    </div>
                </form>
                <!-- END FORM-->
              </div>
            </div>
          </div>
        </div>
      </div>

      <div id="myModal_proveedor" class="modal fade" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
              <h4 class="modal-title"><b>Ingresar Nueva Proveedor</b></h4>
            </div>
            <div class="modal-body form">
              <form action="save.proveedor.compra.php" class="form-horizontal form-row-seperated" method="post">
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
                <div class="form-group">
                  <label class="col-sm-4 control-label"><b>Credito:</b></label>
                  <div class="col-sm-8">
                    <div class="input-group">
                      <span class="input-group-addon">
                        <i class="fa fa-tasks"></i>
                      </span>
                      <input type="text" id="typeahead_example_modal_1" name="credito" class="form-control" required />
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
  <a id="vacio" href="#modal1" role="button" data-toggle="modal"></a>
  <div id="modal1" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
          <h4 class="alert alert-danger"> <i class="fa fa-warning"></i> <strong>Alerta!</strong></h4>
        </div>
        <div class="modal-body">
          <p>
            <center>
              <h4><strong>Por favor llene todos los campos del formulario.</strong></h4>
            </center>
          </p>
        </div>
        <div class="modal-footer">
          <button data-dismiss="modal" class="btn red">OK</button>
        </div>
      </div>
    </div>
  </div>
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
    #orden_color {
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
    #detalle_color {
      width: 400px;
    }
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
    .label1 {
      font-size: 16px !important;
      color: black !important;
    }
    #ex2 {
      width: 25px;
      height: 25px;
    }
  </style>
  </div>
</div>

<?php include("suministros/footer.php"); ?>
<!--SCRIPTS -->
  <script>
    jQuery(document).ready(function() {
      Metronic.init(); // init metronic core componets
      Layout.init(); // init layout
      QuickSidebar.init(); // init quick sidebar
      FormSamples.init();
      ComponentsPickers.init();      
      jQuery('#empresa').change(function() {

        jQuery('#contacto').fadeOut();
        jQuery.post("produccion.contactos.php", {
            emp: jQuery('#empresa').val()
          },

          function(response) {
            jQuery('#contacto').html(response);
            jQuery('#contacto').fadeIn();
          });
        return false;
      });
      jQuery("#nueva_compra").click(function() {
        jQuery("#nueva_compra").prop("disabled", true);

        var empresa = jQuery("#empresa").val();
        var nom_empresa = jQuery("#empresa option:selected").text();
        var solicita = jQuery("#solicita").val();
        var nom_solicita = jQuery("#solicita option:selected").text();
        var id_autoriza = jQuery("#autoriza").val();
        var nombre_autoriza = jQuery("#autoriza option:selected").text();
        var fecha = jQuery("#fecha").val();


        if (empresa == 0 || solicita == 0 || id_autoriza == 0) {
          jQuery('#vacio').click();
          jQuery("#nueva_compra").prop("disabled", false);
        } else {


          jQuery('#crea').submit(function() {
            jQuery('#crea').append('<input type="hidden" name="nom_empresa" value="' + nom_empresa + '" /> ');
            jQuery('#crea').append('<input type="hidden" name="nom_solicita" value="' + nom_solicita + '" /> ');
            jQuery('#crea').append('<input type="hidden" name="nombre_autoriza" value="' + nombre_autoriza + '" /> ');
          });

          jQuery("#crea").submit();


        }
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


  <script src="bower_components/jquery/dist/jquery.min.js"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="bower_components/jquery-ui/jquery-ui.min.js"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button);
  </script>
  <!-- Bootstrap 3.3.7 -->
  <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <!-- Morris.js charts -->
  <script src="bower_components/raphael/raphael.min.js"></script>
  <script src="bower_components/morris.js/morris.min.js"></script>
  <!-- Sparkline -->
  <script src="bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
  <!-- jvectormap -->
  <script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
  <script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
  <!-- jQuery Knob Chart -->
  <script src="bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
  <!-- daterangepicker -->
  <script src="bower_components/moment/min/moment.min.js"></script>
  <script src="bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
  <!-- datepicker -->
  <script src="bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
  <!-- Bootstrap WYSIHTML5 -->
  <script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
  <!-- Slimscroll -->
  <script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
  <!-- FastClick -->
  <script src="bower_components/fastclick/lib/fastclick.js"></script>
  <!-- AdminLTE App -->
  <script src="dist/js/adminlte.min.js"></script>
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <script src="dist/js/pages/dashboard.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="dist/js/demo.js"></script>

  <script src="//cdnjs.cloudflare.com/ajax/libs/fancybox/3.2.1/jquery.fancybox.min.js"></script>



  <script src="ajax2/jquery-3.3.1.min.js" type="text/javascript"></script>
  <script src="ajax2/ajax.js" type="text/javascript"></script>



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