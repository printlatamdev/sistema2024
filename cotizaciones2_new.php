<?php require("db/session.php"); ?>
<?php  require('assets/header.php'); ?>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">
    <!-- Navbar -->
    <?php  require('navbar.php'); ?>
    
    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="index.php" class="brand-link">
        <?php  if ($nivel != 50) { ?><img src="images/logo_color.png" alt="COLOR DIGITAL" style="opacity: .8;margin-left:10%" width="150"><?php  } ?>
        <span class="brand-text font-weight-light"></span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <?php  if ($base == "esa") { ?>
            <div class="image">
              <img src="images/esa1.png" class="img-circle elevation-2" alt="User Image">
            </div>
          <?php  }
          if ($base == "nica") { ?>
            <div class="image">
              <img src="images/nica1.png" class="img-circle elevation-2" alt="User Image">
            </div>
          <?php  } ?>
          <div class="info">
            <a href="#" class="d-block"><?php  echo $nombre; ?></a><a class="d-block"> online <i class="fas fa-signal" style="color: #2EFE2E"></i></a>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
            <?php require("menu4.php"); ?>
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

    <div class="content-wrapper">
      <div class="container col-xs-12 col-md-12 col-lg-12 col-xl-12">
        <div class="table-title">
          <div class="row">
            <div class="col-sm-6">
              <h2>Sistema <b>Cotizaciones</b></h2>
            </div>

            <script type="text/javascript">
              $('#iframe').modal({
                backdrop: 'static',
                keyboard: false
              })
            </script>

            <div class="col-sm-6">

              <a class="btn btn-success" data-fancybox data-options='{"type" : "iframe", "iframe" : {"preload" : false }}' href="cot_iframe_new.php"><i class="material-icons">&#xE147;</i> <span>Agregar Nueva Cotizacion</span></a>
            </div>
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
        <div class='clearfix'></div>

        <hr>
        <div id="loader"></div><!-- Carga de datos ajax aqui -->
        <div id="resultados"></div><!-- Carga de datos ajax aqui -->
        <div class='outer_div'></div><!-- Carga de datos ajax aqui -->
      </div>

    </div>
  </div>

  </div>




  <?php include("12/html/modal_add.php"); ?>
  <!-- Edit Modal HTML -->
  <?php include("12/html/modal_edit.php"); ?>
  <!-- Delete Modal HTML -->
  <?php include("12/html/modal_delete.php"); ?>

  <?php  if ($nivel == 10) { ?>
    <script src="js/script_cot3.js"></script>
  <?php  } else { ?>
<!--Here You can list q-->
    <script src="js/script_cot_new.js"></script>
  <?php  } ?>

  </div>
  </div>

  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong><a href="#">Sistema Produccion</a>.</strong>
    Color Digital 2023
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