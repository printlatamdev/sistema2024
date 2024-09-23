<?php
session_start();
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

$id = $_SESSION['vsIdempresa'];
$base = $_SESSION['base'];
$anio = $_SESSION['year'];
$bd = $base . $anio;
$nombre = $_SESSION['vsNombre'];
$nivel = $_SESSION['nivel'] ?? '';
?>


<!DOCTYPE html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Color Digital | <?php echo date('Y'); ?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="indes/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="indes/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="indes/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="indes/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="indes/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="indes/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="indes/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="indes/plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
    crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
    crossorigin="anonymous"></script>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <link rel="stylesheet" href="css/estilos.css">
  <link rel="stylesheet" href="https://necolas.github.io/normalize.css/3.0.2/normalize.css">
  <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>


  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->

  <!-- Theme style -->

  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->

  <!-- Morris chart -->




  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>

  <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet"
    type="text/css" />
  <link href="suministros/assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet"
    type="text/css" />
  <link href="suministros/assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet"
    type="text/css" />
  <link href="suministros/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
  <link href="suministros/assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css" />
  <link href="suministros/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet"
    type="text/css" />
  <!-- END GLOBAL MANDATORY STYLES -->
  <!-- BEGIN PAGE LEVEL STYLES -->
  <link rel="stylesheet" type="text/css" href="suministros/assets/global/plugins/select2/select2.css" />


  <!-- END PAGE LEVEL STYLES -->
  <!-- BEGIN PAGE LEVEL PLUGIN STYLES -->
  <link href="suministros/assets/global/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css" rel="stylesheet"
    type="text/css" />
  <link href="suministros/assets/global/plugins/fullcalendar/fullcalendar.min.css" rel="stylesheet" type="text/css" />
  <link href="suministros/assets/global/plugins/jqvmap/jqvmap/jqvmap.css" rel="stylesheet" type="text/css" />
  <!-- END PAGE LEVEL PLUGIN STYLES -->
  <!-- BEGIN PAGE STYLES -->
  <link href="suministros/assets/admin/pages/css/tasks.css" rel="stylesheet" type="text/css" />
  <!-- END PAGE STYLES -->
  <!-- BEGIN THEME STYLES -->
  <link href="suministros/assets/global/css/components.css" id="style_components" rel="stylesheet" type="text/css" />
  <link href="suministros/assets/global/css/plugins.css" rel="stylesheet" type="text/css" />
  <link href="suministros/assets/admin/layout/css/layout.css" rel="stylesheet" type="text/css" />
  <link href="suministros/assets/admin/layout/css/themes/darkblue.css" rel="stylesheet" type="text/css"
    id="style_color" />
  <link href="suministros/assets/admin/layout/css/custom.css" rel="stylesheet" type="text/css" />


  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fancybox/3.2.1/jquery.fancybox.min.css" media="screen">






  <!------ Include the above in your HEAD tag ---------->
  <link rel="stylesheet" href="css/custom.css">

  <!------ Include the above in your HEAD tag ---------->
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fancybox/3.2.1/jquery.fancybox.min.css" media="screen">

  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">


  <script>

    $(function () {

      $(".fancyOther").fancybox({
        width: '100%',
        height: '100%',
        maxWidth: 800,
        maxHeight: 600,
        fitToView: false,
        autoSize: false,
        closeClick: false,
        openEffect: 'none',
        closeEffect: 'none'
      });
    });

  </script>





  <style>
    .content {
      margin-top: 80px;
    }
  </style>



  <style type="text/css">
    .zeroPadding {
      padding: 0 !important;
    }
  </style>


  <style>
    input[type="number"] {
      width: 100px;
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



    body {


      background-color: "#ffffff" !important;

    }

    #fmsp {
      border-style: solid;
      border-width: 1px;
      padding: 20px;
      margin-right: -1px;
      margin-bottom: -1px;
      margin-top: -1px;
    }

    #fmsd1p {
      border-bottom: thin solid #000000;
    }

    #fmsd2p {
      border-bottom: thin solid #000000;
    }

    #fms3p {
      border-style: solid;
      border-width: 1px;
      padding: 20px;
      margin-right: -1px;
      margin-bottom: -1px;
      margin-top: -1px;

    }

    #fms0p {

      display: flex;

    }

    /*------------------------------------------*/
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
    #sample_1{

    }
  </style>


 <!-- DataTables CSS -->
 <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

    <!-- jQuery UI for DatePicker -->
    <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.min.js"></script>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">
    
    <script>
        $(document).ready(function() {
            // Initialize Date Pickers for Date Range Selection
            $("#start_date, #end_date").datepicker({
                dateFormat: "yy-mm-dd" // Set format for SQL compatibility
            });

            // Initialize DataTables with Export Buttons
            var table = $('#sample_1').DataTable({
                "searching": true,   // Enable search filter
                "paging": true,      // Enable pagination
                "ordering": true,    // Enable sorting
                "info": true,        // Enable info display
                "dom": 'Bfrtip',     // Define where the buttons are placed
                "order": [
                    [2, "desc"]
                  ],
                "buttons": [
                    {
                        extend: 'excelHtml5',
                        title: 'Log Bodega Data',
                        text: 'Export to Excel'
                    },
                    {
                        extend: 'csvHtml5',
                        title: 'Log Bodega Data',
                        text: 'Export to CSV'
                    },
                    {
                        extend: 'print',
                        text: 'Print Table'
                    }
                ]
            });

            // Function to filter data based on date range
            function filterData() {
                var startDate = $('#start_date').val();
                var endDate = $('#end_date').val();

                // Custom filter function
                $.fn.dataTable.ext.search.push(
                    function(settings, data, dataIndex) {
                        var date = new Date(data[2]); // Assuming "Hora" column index is 2
                        var min = new Date(startDate);
                        var max = new Date(endDate);

                        if (
                            (isNaN(min.getTime()) && isNaN(max.getTime())) ||
                            (isNaN(min.getTime()) && date <= max) ||
                            (min <= date && isNaN(max.getTime())) ||
                            (min <= date && date <= max)
                        ) {
                            return true;
                        }
                        return false;
                    }
                );

                table.draw(); // Redraw table with new filter
            }

            // Apply filter on button click
            $('#filter').click(function() {
                filterData();
            });

            // Initial load without date filter
            table.draw();
        });
    </script>


</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <!-- Navbar -->
    <?php include('navbar.php'); ?>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="index.php" class="brand-link">
        <img src="images/logo_color.png" alt="AdminLTE Logo" style="opacity: .8;margin-left:10%;" width="150">
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
          <!--Espacio en Blanco antes de la tabla-->
        <!--/row-->
        <!-- <div class="row">
          <div class="col-md-9">
         

            </div>
          </div> -->
              <!-- Date Range Filter Inputs -->
      <!-- <div class="container mt-4"> -->
        <!-- Date Range Filter Inputs -->
        <h3 class="text-center mb-3">
            <strong>Filtrado por Fecha:</strong>
        </h3>
        <div class="row justify-content-center mb-3">
            <div class="col-md-4 col-lg-3">
                <div class="form-group">
                    <label for="start_date">Fecha de Inicio:</label>
                    <input type="text" class="form-control" id="start_date" name="start_date">
                </div>
            </div>
            <div class="col-md-4 col-lg-3">
                <div class="form-group">
                    <label for="end_date">Fecha Final:</label>
                    <input type="text" class="form-control" id="end_date" name="end_date">
                </div>
            </div>
            <br>
            <div class="col-md-4 col-lg-2 d-flex align-items-end" style="    margin-bottom: 15px;">
                <button id="filter" class="btn btn-primary">Filter</button>
            </div>
        <!-- </div> -->
          <br><br>
          <!-- BEGIN PAGE CONTENT-->
          <div class="row">
            <div class="col-md-12">

              <!-- BEGIN EXAMPLE TABLE PORTLET-->
              <div class="portlet box green">
                <div class="portlet-title">
                  <div class="caption"><i class="fa fa-edit"></i>
                    <?php if (isset($_REQUEST['material'])) {
                      echo "Bitacora de " . base64_decode($_REQUEST['material']);
                    } else {
                      echo "Bitacora de Descargas";
                    } ?>
                  </div>
                  <div class="tools"></div>
                </div>
                <div class="portlet-body">
     <!-- DataTable -->
     <table class="table table-striped table-bordered table-hover" id="sample_1">
            <thead class="thead-dark">
                <tr>
                    <th>Material</th>
                    <th>Detalle</th>
                    <th>Hora</th>
                    <th>Firma</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include('suministros/connect.php');

                // Prepare SQL based on request
                if (isset($_REQUEST['material'])) {
                    $material = base64_decode($_REQUEST['material']);
                    $sql = "SELECT * FROM log_bodega WHERE material='$material' ORDER BY id DESC";
                } else {
                    $sql = "SELECT * FROM log_bodega ORDER BY id DESC LIMIT 500";
                }

                $rs = $mysqli->query($sql);
                $i = 0;

                while ($row = $rs->fetch_assoc()) {
                    $link_arte = !empty($row['firma']) ? 'firma/' . $row['firma'] : 'imagenes/pendiente.jpg';
                    $class = ($i % 2 == 0) ? "odd" : "even";
                    $i++;

                    echo "<tr class='$class' id='{$row['id']}'>";
                    echo "<td>{$row['material']}</td>";
                    echo "<td>{$row['detalle']}</td>";
                    echo "<td>{$row['hora']}</td>";
                    echo "<td>
                            <a href='$link_arte' target='_blank' data-fancybox='preview' data-width='100%' data-height='100%'>
                                <img class='img-thumbnail' width='100px' src='$link_arte'>
                            </a>
                        </td>";
                    echo "</tr>";
                }

                $mysqli->close();
                ?>
            </tbody>
        </table>
                </div>
              </div>
            </div>
          </div>
        </div>



        <script src="//cdnjs.cloudflare.com/ajax/libs/fancybox/3.2.1/jquery.fancybox.min.js"></script>
        <script src="indes/plugins/jquery/jquery.min.js"></script>
        <!-- jQuery UI 1.11.4 -->
        <script src="indes/plugins/jquery-ui/jquery-ui.min.js"></script>
        <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
        <script>
          $.widget.bridge('uibutton', $.ui.button)
        </script>
        <!-- Bootstrap 4 -->
        <script src="indes/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
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
        <script src="suministros/assets/global/plugins/flot/jquery.flot.categories.min.js"
          type="text/javascript"></script>
        <script src="suministros/assets/global/plugins/jquery.pulsate.min.js" type="text/javascript"></script>
        <script src="suministros/assets/global/plugins/bootstrap-daterangepicker/moment.min.js"
          type="text/javascript"></script>
        <script src="suministros/assets/global/plugins/bootstrap-daterangepicker/daterangepicker.js"
          type="text/javascript"></script>
        <!-- IMPORTANT! fullcalendar depends on jquery-ui.min.js for drag & drop support -->
        <script src="suministros/assets/global/plugins/fullcalendar/fullcalendar.min.js"
          type="text/javascript"></script>
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
        <script type="text/javascript"
          src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
        <script type="text/javascript"
          src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
        <script type="text/javascript"
          src="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.18/b-1.5.4/b-colvis-1.5.4/b-flash-1.5.4/b-html5-1.5.4/b-print-1.5.4/datatables.min.js"></script>

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
                  "pageLength": 10,
                  "columnDefs": [{  // set default column settings
                    'orderable': false,
                    'targets': [0],
                    'visible': false
                  }, {
                    "searchable": true,
                    "targets": [1, 2, 3]
                  }],
                  // "order": [
                  //   [0, "desc"]
                  // ] // set first column as a default sort by asc
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
            
            FormSamples.init();


            jQuery("#material").change(function () {
              var nm = jQuery("#material option:selected").val();
              window.location.href = "suministros.descargas.bitacora_new4.php?material=" + nm;
              return false;
            });


            jQuery("#material2").change(function () {
              var nm = jQuery("#material2 option:selected").val();
              //jQuery("#page-content").hide(); 
              //jQuery("#page-content").load("suministros.descargas.bitacora.php?material="+ nm );
              //jQuery('#page-content').fadeIn(1000);
              window.location.href = "suministros.descargas.bitacora_new4.php?material=" + nm;
              return false;
            });


          });
        </script>

</body>

</html>