<?php require("db/session.php"); ?>
<?php  require('assets/header.php'); ?>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <!-- Navbar -->
    <?php require_once('navbar.php'); ?>
    
    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="index.php" class="brand-link">
        <?php if ($nivel != 50) { ?>
          <img src="images/logo_color.png" alt="COLOR DIGITAL" style="opacity: .8" width="150">
        <?php } ?>
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
            <?php require("menu4.php"); ?>
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

    <div class="content-wrapper">

      <div class="container col-xs-12 col-md-12 col-lg-12 col-xl-12" style="margin-left: 10px;">
        <!-- pegar aqui el contenido-->

        <div class="table-wrapper">
          <div class="table-title">
            <div class="row">
              <div class="col-sm-6">
                <h2><b>Ordenes PO Activas</b></h2>
              </div>


              <?php
              $nivel = $_SESSION['nivel'];
              $base = $_SESSION['base'];

              if ($nivel == 1 || $nivel == 2 || $nivel == 3 || $nivel == 17 || $nivel == 23) { ?>
                <div class="col-sm-6">
                  <a data-fancybox data-options='{"type" : "iframe", "iframe" : {"preload" : false }}' href="formop2.php"
                    class="btn btn-success"><i class="material-icons">&#xE147;</i> <span>Agregar Nueva Orden</span></a>
                </div>
              <?php } else { ?>
                <div class="col-sm-6">
                  <a data-toggle="modal" data-target="#no" class="btn btn-success"><i class="material-icons">&#xE147;</i>
                    <span>Agregar Nueva Orden</span></a>
                </div>
              <?php } ?>

            </div>
          </div>

          <div class='col-sm-4 pull-right'>
            <div id="custom-search-input">
              <div class="input-group col-md-12">
                <input type="text" class="form-control" placeholder="Buscar" id="q" onkeyup="load(1);" />
                <span class="input-group-btn">
                  <button class="btn btn-info" type="button" onclick="load(1);">
                    <span class="glyphicon glyphicon-search"></span>
                  </button>
                </span>
              </div>
            </div>
          </div>

        </div>

        <?php $exito = $_REQUEST['exito'] ?? '';
        if (trim($exito) == false) {
        } else {
          echo '
              <div class="alert alert-success" role="alert" style="width: 800px; height: 50px;">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
              <strong>La orden fue creada con exito!</strong>
              </div>
                ';
        }
        ?>
        <div id="loader"></div><!-- Carga de datos ajax aqui -->
        <div id="resultados"></div><!-- Carga de datos ajax aqui -->
        <div class='outer_div'></div><!-- Carga de datos ajax aqui -->

        <div id="no" class="modal fade">
          <div class="modal-dialog">
            <div class="modal-content">
              <form name="delete_product" id="delete_product">
                <div class="modal-header">
                  <h2 class="modal-title">ACCIÓN NO PERMITIDA!</h2>
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                  <H4>
                    <p>Lo sentimos, esta opcion no esta habilitada por motivos de seguridad.</p>
                  </H4>
                  <p class="text-warning"><small>gracias.</small></p>
                  <input type="hidden" name="delete_id" id="delete_id">
                </div>
                <div class="modal-footer">
                  <input type="button" class="btn btn-default" data-dismiss="modal" value="Salir">
                </div>
              </form>
            </div>
          </div>
        </div>
        <!-- FINALIZA PEGADO DE CONTENIDO -->
      </div>
    </div>

    <?php include("12/html/modal_add.php"); ?>
    <!-- Edit Modal HTML -->
    <?php include("12/html/modal_edit.php"); ?>
    <!-- Delete Modal HTML -->
    <?php include("12/html/modal_delete.php"); ?>
    <script src="script_po.js"></script>
    <script src="bower_components/jquery/dist/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="bower_components/jquery-ui/jquery-ui.min.js"></script>

  </div>
  </div>

  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong><a href="#">Sistema Produccion</a>.</strong>
    Color Digital 2024
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 2.0.1
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->

  <!-- ChartJS -->
  <script src="indes/plugins/chart.js/Chart.min.js"></script>
  <!-- Sparkline -->
  <script src="indes/plugins/sparklines/sparkline.js"></script>
  <!-- JQVMap -->
  <script src="indes/plugins/jqvmap/jquery.vmap.min.js"></script>
  <script src="indes/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
  <!-- jQuery Knob Chart -->
  <script src="indes/plugins/jquery-knob/jquery.knob.min.js"></script>
  <!-- daterangepicker -->
  <script src="indes/plugins/moment/moment.min.js"></script>
  <script src="indes/plugins/daterangepicker/daterangepicker.js"></script>
  <!-- Tempusdominus Bootstrap 4 -->
  <script src="indes/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
  <!-- Summernote -->
  <script src="indes/plugins/summernote/summernote-bs4.min.js"></script>
  <!-- overlayScrollbars -->
  <script src="indes/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <!-- AdminLTE App -->
  <script src="indes/dist/js/adminlte.js"></script>
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <script src="indes/dist/js/pages/dashboard.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="indes/dist/js/demo.js"></script>
  <script src="bower_components/jquery/dist/jquery.min.js"></script>
  <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/fancybox/3.2.1/jquery.fancybox.min.js"></script>
  <script src="ajax2/jquery-3.3.1.min.js" type="text/javascript"></script>
  <script src="ajax2/ajax.js" type="text/javascript"></script>
</body>

</html>