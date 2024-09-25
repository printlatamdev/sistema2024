<?php require("db/session.php"); ?>
<?php  require('assets/header.php'); ?>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <!-- Navbar -->
        <?php require('navbar.php'); ?>

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
                        <a href="#" class="d-block"><?php echo $nombre; ?></a><a class="d-block"> online <i
                                class="fas fa-signal" style="color: #2EFE2E"></i></a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        <?php include("menu4.php"); ?>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
        </aside>

        <div class="content-wrapper">
            <div class="container col-xs-12 col-md-12 col-lg-12 col-xl-12">
                <div class="page-content">
                    <div id="page-content">
                        <!-- BEGIN PAGE CONTENT-->
                        <div class="row">
                            <div class="col-md-3">
                                <ul class="ver-inline-menu tabbable margin-bottom-10">
                                    <?php
                                    include("reportes/connect_reportes.php");
                                    $rs = $mysqli->query("SELECT tipo, medida  FROM `tinta_tipo` WHERE estado='1'");
                                    $flag = 0;
                                    while ($fila = $rs->fetch_row()) {
                                        $tinta = $fila[0];
                                        $medida = $fila[1];
                                        $flag = $flag + 1;

                                        echo '<li style="height:45px;">
                           <a data-toggle="tab" href="#tab_' . $flag . '">
                           <img src="suministros/iconossuministros/tinta.png" width="30px" height="30px">&nbsp;&nbsp;
                  &nbsp;&nbsp;&nbsp;&nbsp;<strong>' . $tinta . ' - ' . $medida . '</strong></a>
                             </li>';
                                    }
                                    $mysqli->close();
                                    ?>
                                </ul>
                            </div>
                            <div class="col-md-9">
                                <div class="tab-content">
                                    <?php
                                    include("reportes/connect_reportes.php");
                                    $rs = $mysqli->query("SELECT tipo, medida  FROM `tinta_tipo` WHERE estado='1'");
                                    $flag = 0;
                                    while ($fila = $rs->fetch_row()) {
                                        $tinta = $fila[0];
                                        $flag = $flag + 1;
                                        echo
                                            '<div id="tab_' . $flag . '" class="tab-pane">
                            <div id="accordion' . $flag . '" class="panel-group">
                                <div class="panel panel-success">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion' . $flag . '" href="#accordion' . $flag . '_1"><strong>' . $tinta . '</strong> </a>
                                        </h4>
                                    </div>
                                    <div id="accordion' . $flag . '_1" class="panel-collapse collapse in">
                                        <div class="panel-body">

                                        <div class="portlet light bordered">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="icon-bar-chart font-green-haze"></i>
                                        <span class="caption-subject bold uppercase font-green-haze"> EXISTENCIAS</span>
                                        <span class="caption-helper"></span>
                                        <div class="mt-2">' ?>
                                        <!--Data here-->
                                        <?php
                                        //$colors = ['barniz','black','cab_hp_lc_lm','cyan','magenta','yellow','flush','light_cyan','light_magenta','light_black','light_yellow','solvente','cab_hp_my','cab_hp_op','optimizador'];
                                        $colors = [];
                                        $i = 0;
                                        $cy = $mysqli->query("SELECT color, COUNT(*) as cantidad FROM `tinta` WHERE tipo= '" . $tinta . "' AND estado='Bodega' GROUP BY color ORDER BY color ASC");
                                        while ($item = $cy->fetch_assoc()) {
                                            if($item['color'] == 'black'){ $class = 'black';}
                                            if($item['color'] == 'cyan'){ $class = 'cyan';}
                                            if($item['color'] == 'flush'){ $class = 'flush';}
                                            if($item['color'] == 'magenta'){ $class = 'magenta';}
                                            if($item['color'] == 'yellow'){ $class = 'yellow';}
                                            if($item['color'] == 'Cabezal Light Cyan/Light Magenta'){ $class = 'cab_hp_lc_lm';}
                                            if($item['color'] == 'Cabezales HP Cyan/Negro'){ $class = 'cab_hp_cn';}
                                            if($item['color'] == 'Cabezales HP Magenta/Yellow'){ $class = 'cab_hp_my';}
                                            if($item['color'] == 'light cyan'){ $class = 'light_cyan';}
                                            if($item['color'] == 'light magenta'){ $class = 'light_magenta';}
                                            if($item['color'] == 'Optimizador'){ $class = 'optimizador';}
                                            if($item['color'] == 'Solvente'){ $class = 'solvente';}
                                            if($item['color'] == 'barniz'){ $class = 'barniz';}
                                            if($item['color'] == 'Solvente'){ $class = 'solvente';}
                                            if($item['color'] == 'white'){ $class = 'white';}
                                            echo '<span class="' . $class . ' . badge m-1">' . $item['color'] . ' ' . $item['cantidad'] . ' unidades' . '</span>';
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php echo '<div class="col-md-12 col-sm-12">
                    <!-- BEGIN EXAMPLE TABLE PORTLET-->
                   <div class="portlet box blue">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-ink"></i>Codigos ' . $tinta . '
                            </div>
                            <div class="actions"></div>
                        </div>
                        <div class="portlet-body">
                            <table class="table table-striped table-bordered table-hover" id="sample_' . $flag . '">
                            <thead>
                            <tr>
                                <th>Color</th>
                                <th>Codigo</th>
                                <th>Estado</th>
                                <th>F. Ingreso Bodega</th>
                                <th>F. Salida Bodega</th>
                                 <th>F. Finalizada</th>
                                <th>Equipo</th>
                            </tr>
                            </thead>
                            <tbody> ';
                        $rs2 = $mysqli->query("SELECT color, codigo, estado, ingreso, salida, fecha_uso, equipo  FROM `tinta` WHERE tipo='" . $tinta . "'");
                        while ($fila2 = $rs2->fetch_row()) {
                            $fila2[0];
                            echo '
                            <tr class="odd gradeX">
                                <td>
                                     ' . $fila2[0] . ' 
                                </td>
                                <td>
                                    ' . $fila2[1] . '
                                </td>
                                <td>';

                            if ($fila2[2] == "Bodega") {
                                echo '<span class="label label-sm label-success">
                                    <strong>' . $fila2[2] . '<strong></span>';
                            } elseif ($fila2[2] == "Produccion") {

                                echo '<span class="label label-sm label-warning">
                                    ' . $fila2[2] . '</span>';
                            } elseif ($fila2[2] == "Finalizada") {

                                echo '<span class="label label-sm label-danger">
                                    ' . $fila2[2] . '</span>';
                            } elseif ($fila2[2] == "Nicaragua") {

                                echo '<span class="label label-sm label-danger">
                                    ' . $fila2[2] . '</span>';
                            } elseif ($fila2[2] == "Descartado") {

                                echo '<span class="label label-sm label-primary">
                                    ' . $fila2[2] . '</span>';
                            }
                            echo '<td>';
                            if ($fila2[3] == '0000-00-00 00:00:00' || $fila2[3] == NULL) {
                                echo '';
                            } else {
                                echo date("d/m/Y", strtotime($fila2[3]));
                            }
                            echo '</td><td>';

                            if ($fila2[4] == '0000-00-00 00:00:00' || $fila2[4] == NULL) {
                                echo '';
                            } else {
                                echo date("d/m/Y", strtotime($fila2[4]));
                            }
                            echo '</td><td>';

                            if ($fila2[5] == '0000-00-00 00:00:00' || $fila2[5] == NULL) {
                                echo '';
                            } else {
                                echo date("d/m/Y", strtotime($fila2[5]));
                            }
                            echo '</td><td>';

                            if ($fila2[6] == '' || $fila2[6] == NULL) {
                                echo '';
                            } else {
                                echo $fila2[6];
                            }
                            echo '           
                                </td>


                                </td>
                            </tr>';
                        } //fin del while 
                        echo ' 
                            </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- END EXAMPLE TABLE PORTLET-->
                </div>



                                        </div>
                                    </div>
                                </div>
    
                            </div>
                        </div>

                                ';
                                    }

                                    $mysqli->close();

                                    ?>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
        <strong><a href="#">Sistema Produccion</a>.</strong>
        Color Digital 2020
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

    <!-- jQuery -->
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
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script src="assets/global/plugins/jquery.min.js" type="text/javascript"></script>
    <script src="assets/global/plugins/jquery-migrate.min.js" type="text/javascript"></script>
    <script src="assets/global/plugins/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
    <script src="assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
    <script src="assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <script src="assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
    <script src="assets/global/plugins/jquery.cokie.min.js" type="text/javascript"></script>
    <script src="assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
    <script src="assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
    <script src="assets/global/scripts/metronic.js" type="text/javascript"></script>
    <script src="assets/admin/layout/scripts/layout.js" type="text/javascript"></script>
    <script src="assets/admin/layout/scripts/quick-sidebar.js" type="text/javascript"></script>
    <script src="assets/admin/layout/scripts/demo.js" type="text/javascript"></script>
    <script src="assets/admin/pages/scripts/index.js" type="text/javascript"></script>
    <script src="assets/admin/pages/scripts/tasks.js" type="text/javascript"></script>
    <script src="assets/global/plugins/select2/select2.min.js"></script>
    <script src="assets/admin/pages/scripts/form-samples.js"></script>
    <script type="text/javascript" src="assets/global/plugins/datatables/media/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js"></script>
    <script src="assets/global/plugins/amcharts/amcharts/amcharts.js" type="text/javascript"></script>
    <script src="assets/global/plugins/amcharts/amcharts/serial.js" type="text/javascript"></script>
    <script src="assets/global/plugins/amcharts/amcharts/themes/light.js" type="text/javascript"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $(".fancybox").fancybox({
                openEffect: "none",
                closeEffect: "none"
            });
            $(".zoom").hover(function () {
                $(this).addClass('transition');
            }, function () {

                $(this).removeClass('transition');
            });
        });

        $(".rotate").fancybox({
            width: 600,
            height: 300,
            type: 'iframe'
        });
    </script>













    <!--SCRIPT SISTEMA 2020-->

    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>

    <!-- AdminLTE for demo purposes -->

    <script src="//cdnjs.cloudflare.com/ajax/libs/fancybox/3.2.1/jquery.fancybox.min.js"></script>
    <!--FIN SCRIPT SISTEMA 2020-->


</body>

</html>