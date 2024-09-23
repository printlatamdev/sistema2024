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
                        <?php include("menu4.php"); ?>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <div class="content-wrapper">

            <div class="container col-xs-12 col-md-12 col-lg-12 col-xl-12">
                <div class="page-content">
                    <div id="page-content">


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

                                        echo '
                                  
                                                        <div id="tab_' . $flag . '" class="tab-pane">
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
                                    </div>
                                    <div class="tools">
                                        
                                    </div>
                                </div>

                            
                                <div class="portlet-body">
                                    <div id="chart_' . $flag . '" class="chart" style="height: 400px;">
                                    </div>
                                    <div class="well margin-top-20">
                                        <div class="row">
                                            
                                        </div>
                                    </div>
                                </div>


                            </div>




 



                                <div class="col-md-12 col-sm-12">
                    <!-- BEGIN EXAMPLE TABLE PORTLET-->
                    <div class="portlet box blue">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-ink"></i>Codigos ' . $tinta . '
                            </div>
                            <div class="actions">
                             
                            </div>
                        </div>
                        <div class="portlet-body">
                            <table class="table table-striped table-bordered table-hover" id="sample_' . $flag . '">
                            <thead>
                            <tr>
                               
                                <th>
                                     Color
                                </th>
                                <th>
                                     Codigo
                                </th>
                                <th>
                                     Estado
                                </th>
                                <th>
                                     F. Ingreso Bodega
                                </th>
                                <th>
                                     F. Salida Bodega
                                </th>
                                 <th>
                                     F. Finalizada
                                </th>
                                <th>
                                     Equipo
                                </th>
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
                                                echo   date("d/m/Y", strtotime($fila2[4]));
                                            }

                                            echo '</td><td>';

                                            if ($fila2[5] == '0000-00-00 00:00:00' || $fila2[5] == NULL) {
                                                echo '';
                                            } else {
                                                echo   date("d/m/Y", strtotime($fila2[5]));
                                            }


                                            echo '</td><td>';

                                            if ($fila2[6] == '' || $fila2[6] == NULL) {
                                                echo '';
                                            } else {
                                                echo   $fila2[6];
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
                        <!-- END PAGE CONTENT-->














                        <!-- ------------FIN DE CONTENIDO-----------------------------------------------------------------------------------------------  -->



                    </div>
                </div>
            </div>
            <!-- END CONTENT -->



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


    <script>
        jQuery(document).ready(function() {
            var ChartsAmcharts = function() {
                <?php

                include("reportes/connect_reportes.php");


                //$rs=$mysqli->query("SELECT DISTINCT tipo  FROM `tinta` WHERE 1");
                $rs = $mysqli->query("SELECT tipo FROM `tinta_tipo` WHERE estado='1'");
                $flag = 0;
                while ($fila = $rs->fetch_row()) {
                    $tinta = $fila[0];
                    $flag = $flag + 1;

                    $cy = $mysqli->query("SELECT *  FROM `tinta` WHERE tipo='" . $tinta . "' AND color='cyan' AND estado='Bodega'");
                    $ncy = $cy->num_rows;

                    $mg = $mysqli->query("SELECT *  FROM `tinta` WHERE tipo='" . $tinta . "' AND color='magenta' AND estado='Bodega'");
                    $nmg = $mg->num_rows;

                    $yl = $mysqli->query("SELECT *  FROM `tinta` WHERE tipo='" . $tinta . "' AND color='yellow' AND estado='Bodega'");
                    $nyl = $yl->num_rows;

                    $bl = $mysqli->query("SELECT *  FROM `tinta` WHERE tipo='" . $tinta . "' AND color='black' AND estado='Bodega'");
                    $nbl = $bl->num_rows;

                    $fl = $mysqli->query("SELECT *  FROM `tinta` WHERE tipo='" . $tinta . "' AND color='flush' AND estado='Bodega'");
                    $nfl = $fl->num_rows;

                    $wh = $mysqli->query("SELECT *  FROM `tinta` WHERE tipo='" . $tinta . "' AND color='white' AND estado='Bodega'");
                    $nwh = $wh->num_rows;

                    $lc = $mysqli->query("SELECT *  FROM `tinta` WHERE tipo='" . $tinta . "' AND color='light cyan' AND estado='Bodega'");
                    $nlc = $lc->num_rows;

                    $lm = $mysqli->query("SELECT *  FROM `tinta` WHERE tipo='" . $tinta . "' AND color='light magenta' AND estado='Bodega'");
                    $nlm = $lm->num_rows;

                    $lb = $mysqli->query("SELECT *  FROM `tinta` WHERE tipo='" . $tinta . "' AND color='light black' AND estado='Bodega'");
                    $nlb = $lb->num_rows;

                    $ly = $mysqli->query("SELECT *  FROM `tinta` WHERE tipo='" . $tinta . "' AND color='light yellow' AND estado='Bodega'");
                    $nly = $ly->num_rows;

                    $cs = $mysqli->query("SELECT *  FROM `tinta` WHERE tipo='" . $tinta . "' AND color='Solvente' AND estado='Bodega'");
                    $ncs = $cs->num_rows;



                    if ($tinta == "HP") {

                        $plastic = $mysqli->query("SELECT *  FROM `tinta` WHERE tipo='" . $tinta . "' AND color='plastic' AND estado='Bodega'");
                        $nplastic = $plastic->num_rows;

                        $white = $mysqli->query("SELECT *  FROM `tinta` WHERE tipo='" . $tinta . "' AND color='white' AND estado='Bodega'");
                        $nwhite = $white->num_rows;

                        $glass = $mysqli->query("SELECT *  FROM `tinta` WHERE tipo='" . $tinta . "' AND color='glass' AND estado='Bodega'");
                        $nglass = $glass->num_rows;

                        $lmagenta = $mysqli->query("SELECT *  FROM `tinta` WHERE tipo='" . $tinta . "' AND color='light magenta' AND estado='Bodega'");
                        $nlmagenta = $lmagenta->num_rows;

                        $lcyan = $mysqli->query("SELECT *  FROM `tinta` WHERE tipo='" . $tinta . "' AND color='light cyan' AND estado='Bodega'");
                        $nlcyan = $lcyan->num_rows;
                        $opt = $mysqli->query("SELECT *  FROM `tinta` WHERE tipo='" . $tinta . "' AND color='optimizador' AND estado='Bodega'");
                        $nopt = $opt->num_rows;

                        $cabcn = $mysqli->query("SELECT *  FROM `tinta` WHERE tipo='" . $tinta . "' AND color='Cabezales HP Cyan/negro' AND estado='Bodega'");
                        $ncabcn = $cabcn->num_rows;
                        $cabmy = $mysqli->query("SELECT *  FROM `tinta` WHERE tipo='" . $tinta . "' AND color='Cabezales HP Magenta/Yellow' AND estado='Bodega'");
                        $ncabmy = $cabmy->num_rows;
                        $cabop = $mysqli->query("SELECT *  FROM `tinta` WHERE tipo='" . $tinta . "' AND color='Cabezales HP Optimizador' AND estado='Bodega'");
                        $ncabop = $cabop->num_rows;

                        $cablclm = $mysqli->query("SELECT * FROM tinta WHERE tipo = '$tinta' AND color='Cabezal Light Cyan/Light Magenta' AND estado = 'Bodega'");
                        $ncablclm = $cablclm->num_rows;

                        $bl = $mysqli->query("SELECT *  FROM `tinta` WHERE tipo='" . $tinta . "' AND color='black' AND estado='Bodega'");
                        $nbl = $bl->num_rows;

                ?>



                        var initChartSample<?= $flag ?> = function() {

                            var chart = AmCharts.makeChart("chart_<?= $flag ?>", {
                                "theme": "light",
                                "type": "serial",
                                "startDuration": 2,

                                "fontFamily": 'Open Sans',

                                "color": '#888',

                                "dataProvider": [{
                                        "country": "Cyan <?= $ncy ?>",
                                        "visits": <?= $ncy ?>,
                                        "color": "#0D8ECF"
                                    }, {
                                        "country": "Light Cyan <?= $nlcyan ?>",
                                        "visits": <?= $nlcyan ?>,
                                        "color": "#58ACFA"
                                    }, {
                                        "country": "Magenta <?= $nmg ?>",
                                        "visits": <?= $nmg ?>,
                                        "color": "#CD0D74"
                                    }, {
                                        "country": "Light Magenta <?= $nlmagenta ?>",
                                        "visits": <?= $nlmagenta ?>,
                                        "color": "#F7819F"
                                    }, {
                                        "country": "Yellow <?= $nyl ?>",
                                        "visits": <?= $nyl ?>,
                                        "color": "#F8FF01"
                                    }, {
                                        "country": "Cab. HP C/N <?= $ncabcn ?>",
                                        "visits": <?= $ncabcn ?>,
                                        "color": "#F81A24"
                                    }, {
                                        "country": "Cab. HP M/Y <?= $ncabmy ?>",
                                        "visits": <?= $ncabmy ?>,
                                        "color": "#251314"
                                    }, {
                                        "country": "Cab. HP OP <?= $ncabop ?>",
                                        "visits": <?= $ncabop ?>,
                                        "color": "#A5A2A2"
                                    },
                                    {
                                        "country": "Cab.HP LC/LM <?= $ncablclm ?>",
                                        "visits": <?= $ncablclm ?>,
                                        "color": "#AC58FA"
                                    },
                                    {
                                        "country": "Flush <?= $nfl ?>",
                                        "visits": <?= $nfl ?>,
                                        "color": "#6E6E6E"
                                    }, {
                                        "country": "Black <?= $nbl ?>",
                                        "visits": <?= $nbl ?>,
                                        "color": "#000000"
                                    }, {
                                        "country": "Optimizador <?= $nopt ?>",
                                        "visits": <?= $nopt ?>,
                                        "color": "#6E6E6E"
                                    }
                                ],
                                "valueAxes": [{
                                    "position": "left",
                                    "axisAlpha": 0,
                                    "gridAlpha": 0
                                }],
                                "graphs": [{
                                    "balloonText": "[[category]]: <b>[[value]]</b>",
                                    "colorField": "color",
                                    "fillAlphas": 0.85,
                                    "lineAlpha": 0.1,
                                    "type": "column",
                                    "topRadius": 1,
                                    "valueField": "visits"
                                }],
                                "depth3D": 40,
                                "angle": 30,
                                "chartCursor": {
                                    "categoryBalloonEnabled": false,
                                    "cursorAlpha": 0,
                                    "zoomable": false
                                },
                                "categoryField": "country",
                                "categoryAxis": {
                                    "gridPosition": "start",
                                    "axisAlpha": 0,
                                    "gridAlpha": 0

                                },
                                "exportConfig": {
                                    "menuTop": "20px",
                                    "menuRight": "20px",
                                    "menuItems": [{
                                        "icon": '/lib/3/images/export.png',
                                        "format": 'png'
                                    }]
                                }
                            }, 0);

                            jQuery('.chart_<?= $flag ?>_chart_input').off().on('input change', function() {
                                var property = jQuery(this).data('property');
                                var target = chart;
                                chart.startDuration = 0;

                                if (property == 'topRadius') {
                                    target = chart.graphs[0];
                                }

                                target[property] = this.value;
                                chart.validateNow();
                            });

                            $('#chart_<?= $flag ?>').closest('.portlet').find('.fullscreen').click(function() {
                                chart.invalidateSize();
                            });
                        }

                    <?php

                    } elseif ($tinta == 'HP LATEX871') {
                        $plastic = $mysqli->query("SELECT *  FROM `tinta` WHERE tipo='" . $tinta . "' AND color='plastic' AND estado='Bodega'");
                        $nplastic = $plastic->num_rows;

                        $white = $mysqli->query("SELECT *  FROM `tinta` WHERE tipo='" . $tinta . "' AND color='white' AND estado='Bodega'");
                        $nwhite = $white->num_rows;

                        $glass = $mysqli->query("SELECT *  FROM `tinta` WHERE tipo='" . $tinta . "' AND color='glass' AND estado='Bodega'");
                        $nglass = $glass->num_rows;

                        $lmagenta = $mysqli->query("SELECT *  FROM `tinta` WHERE tipo='" . $tinta . "' AND color='light magenta' AND estado='Bodega'");
                        $nlmagenta = $lmagenta->num_rows;

                        $lcyan = $mysqli->query("SELECT *  FROM `tinta` WHERE tipo='" . $tinta . "' AND color='light cyan' AND estado='Bodega'");
                        $nlcyan = $lcyan->num_rows;
                        $opt = $mysqli->query("SELECT *  FROM `tinta` WHERE tipo='" . $tinta . "' AND color='optimizador' AND estado='Bodega'");
                        $nopt = $opt->num_rows;

                        $cabcn = $mysqli->query("SELECT *  FROM `tinta` WHERE tipo='" . $tinta . "' AND color='Cabezal Yellow/Black' AND estado='Bodega'");
                        $ncabcn = $cabcn->num_rows;
                        $cabmy = $mysqli->query("SELECT *  FROM `tinta` WHERE tipo='" . $tinta . "' AND color='Cabezal Cyan/Black' AND estado='Bodega'");
                        $ncabmy = $cabmy->num_rows;

                        $bl = $mysqli->query("SELECT *  FROM `tinta` WHERE tipo='" . $tinta . "' AND color='black' AND estado='Bodega'");
                        $nbl = $bl->num_rows;

                    ?>



                        var initChartSample<?= $flag ?> = function() {
                            

                            var chart = AmCharts.makeChart("chart_<?= $flag ?>", {
                                "theme": "light",
                                "type": "serial",
                                "startDuration": 2,

                                "fontFamily": 'Open Sans',

                                "color": '#888',

                                "dataProvider": [{
                                        "country": "Cyan <?= $ncy ?>",
                                        "visits": <?= $ncy ?>,
                                        "color": "#0D8ECF"
                                    }, {
                                        "country": "Light Cyan <?= $nlcyan ?>",
                                        "visits": <?= $nlcyan ?>,
                                        "color": "#58ACFA"
                                    }, {
                                        "country": "Magenta <?= $nmg ?>",
                                        "visits": <?= $nmg ?>,
                                        "color": "#CD0D74"
                                    }, {
                                        "country": "Light Magenta <?= $nlmagenta ?>",
                                        "visits": <?= $nlmagenta ?>,
                                        "color": "#F7819F"
                                    }, {
                                        "country": "Yellow <?= $nyl ?>",
                                        "visits": <?= $nyl ?>,
                                        "color": "#F8FF01"
                                    }, {
                                        "country": "Cab. HP C/N <?= $ncabcn ?>",
                                        "visits": <?= $ncabcn ?>,
                                        "color": "#F81A24"
                                    }, {
                                        "country": "Cab. HP M/Y <?= $ncabmy ?>",
                                        "visits": <?= $ncabmy ?>,
                                        "color": "#251314"
                                    },
                                    {
                                        "country": "Flush <?= $nfl ?>",
                                        "visits": <?= $nfl ?>,
                                        "color": "#6E6E6E"
                                    }, {
                                        "country": "Black <?= $nbl ?>",
                                        "visits": <?= $nbl ?>,
                                        "color": "#000000"
                                    }, {
                                        "country": "Optimizador <?= $nopt ?>",
                                        "visits": <?= $nopt ?>,
                                        "color": "#6E6E6E"
                                    }
                                ],
                                "valueAxes": [{
                                    "position": "left",
                                    "axisAlpha": 0,
                                    "gridAlpha": 0
                                }],
                                "graphs": [{
                                    "balloonText": "[[category]]: <b>[[value]]</b>",
                                    "colorField": "color",
                                    "fillAlphas": 0.85,
                                    "lineAlpha": 0.1,
                                    "type": "column",
                                    "topRadius": 1,
                                    "valueField": "visits"
                                }],
                                "depth3D": 40,
                                "angle": 30,
                                "chartCursor": {
                                    "categoryBalloonEnabled": false,
                                    "cursorAlpha": 0,
                                    "zoomable": false
                                },
                                "categoryField": "country",
                                "categoryAxis": {
                                    "gridPosition": "start",
                                    "axisAlpha": 0,
                                    "gridAlpha": 0

                                },
                                "exportConfig": {
                                    "menuTop": "20px",
                                    "menuRight": "20px",
                                    "menuItems": [{
                                        "icon": '/lib/3/images/export.png',
                                        "format": 'png'
                                    }]
                                }
                            }, 0);

                            jQuery('.chart_<?= $flag ?>_chart_input').off().on('input change', function() {
                                var property = jQuery(this).data('property');
                                var target = chart;
                                chart.startDuration = 0;

                                if (property == 'topRadius') {
                                    target = chart.graphs[0];
                                }

                                target[property] = this.value;
                                chart.validateNow();
                            });

                            $('#chart_<?= $flag ?>').closest('.portlet').find('.fullscreen').click(function() {
                                chart.invalidateSize();
                            });
                        }

                    <?php
                    } elseif ($tinta == "FLORA KONICA") {

                        $white = $mysqli->query("SELECT *  FROM `tinta` WHERE tipo='" . $tinta . "' AND color='white' AND estado='Bodega'");
                        $nwhite = $white->num_rows;

                        $barniz = $mysqli->query("SELECT *  FROM `tinta` WHERE tipo='" . $tinta . "' AND color='barniz' AND estado='Bodega'");
                        $nbarniz = $barniz->num_rows;

                    ?>

                        var initChartSample<?= $flag ?> = function() {

                                var chart = AmCharts.makeChart("chart_<?= $flag ?>", {
                                    "theme": "light",
                                    "type": "serial",
                                    "startDuration": 2,

                                    "fontFamily": 'Open Sans',

                                    "color": '#888',

                                    "dataProvider": [{
                                        "country": "Cyan <?= $ncy ?>",
                                        "visits": <?= $ncy ?>,
                                        "color": "#0D8ECF"
                                    }, {
                                        "country": "Magenta <?= $nmg ?>",
                                        "visits": <?= $nmg ?>,
                                        "color": "#CD0D74"
                                    }, {
                                        "country": "Yellow <?= $nyl ?>",
                                        "visits": <?= $nyl ?>,
                                        "color": "#F8FF01"
                                    }, {
                                        "country": "Black <?= $nbl ?>",
                                        "visits": <?= $nbl ?>,
                                        "color": "#000000"
                                    }, {
                                        "country": "Barniz <?= $nbarniz ?>",
                                        "visits": <?= $nbarniz ?>,
                                        "color": "#FFF456"
                                    }, {
                                        "country": "White <?= $nwhite ?>",
                                        "visits": <?= $nwhite ?>,
                                        "color": "#FFFFFF"
                                    }],
                                    "valueAxes": [{
                                        "position": "left",
                                        "axisAlpha": 0,
                                        "gridAlpha": 0
                                    }],
                                    "graphs": [{
                                        "balloonText": "[[category]]: <b>[[value]]</b>",
                                        "colorField": "color",
                                        "fillAlphas": 0.85,
                                        "lineAlpha": 0.1,
                                        "type": "column",
                                        "topRadius": 1,
                                        "valueField": "visits"
                                    }],
                                    "depth3D": 40,
                                    "angle": 30,
                                    "chartCursor": {
                                        "categoryBalloonEnabled": false,
                                        "cursorAlpha": 0,
                                        "zoomable": false
                                    },
                                    "categoryField": "country",
                                    "categoryAxis": {
                                        "gridPosition": "start",
                                        "axisAlpha": 0,
                                        "gridAlpha": 0

                                    },
                                    "exportConfig": {
                                        "menuTop": "20px",
                                        "menuRight": "20px",
                                        "menuItems": [{
                                            "icon": '/lib/3/images/export.png',
                                            "format": 'png'
                                        }]
                                    }
                                }, 0);

                                jQuery('.chart_<?= $flag ?>_chart_input').off().on('input change', function() {
                                    var property = jQuery(this).data('property');
                                    var target = chart;
                                    chart.startDuration = 0;

                                    if (property == 'topRadius') {
                                        target = chart.graphs[0];
                                    }

                                    target[property] = this.value;
                                    chart.validateNow();
                                });

                                $('#chart_<?= $flag ?>').closest('.portlet').find('.fullscreen').click(function() {
                                    chart.invalidateSize();
                                });
                            } 
                        <?php

                    } elseif ($tinta == "FLORA LED") {

                        $white = $mysqli->query("SELECT *  FROM `tinta` WHERE tipo='" . $tinta . "' AND color='white' AND estado='Bodega'");
                        $nwhite = $white->num_rows;

                        ?> 


                            var initChartSample<?= $flag ?> = function() {

                                    var chart = AmCharts.makeChart("chart_<?= $flag ?>", {
                                        "theme": "light",
                                        "type": "serial",
                                        "startDuration": 2,

                                        "fontFamily": 'Open Sans',

                                        "color": '#888',

                                        "dataProvider": [{
                                            "country": "Cyan <?= $ncy ?>",
                                            "visits": <?= $ncy ?>,
                                            "color": "#0D8ECF"
                                        }, {
                                            "country": "Magenta <?= $nmg ?>",
                                            "visits": <?= $nmg ?>,
                                            "color": "#CD0D74"
                                        }, {
                                            "country": "Yellow <?= $nyl ?>",
                                            "visits": <?= $nyl ?>,
                                            "color": "#F8FF01"
                                        }, {
                                            "country": "Black <?= $nbl ?>",
                                            "visits": <?= $nbl ?>,
                                            "color": "#000000"
                                        }, {
                                            "country": "Flush <?= $nfl ?>",
                                            "visits": <?= $nfl ?>,
                                            "color": "#6E6E6E"
                                        }, {
                                            "country": "White <?= $nwhite ?>",
                                            "visits": <?= $nwhite ?>,
                                            "color": "#FFFFFF"
                                        }],
                                        "valueAxes": [{
                                            "position": "left",
                                            "axisAlpha": 0,
                                            "gridAlpha": 0
                                        }],
                                        "graphs": [{
                                            "balloonText": "[[category]]: <b>[[value]]</b>",
                                            "colorField": "color",
                                            "fillAlphas": 0.85,
                                            "lineAlpha": 0.1,
                                            "type": "column",
                                            "topRadius": 1,
                                            "valueField": "visits"
                                        }],
                                        "depth3D": 40,
                                        "angle": 30,
                                        "chartCursor": {
                                            "categoryBalloonEnabled": false,
                                            "cursorAlpha": 0,
                                            "zoomable": false
                                        },
                                        "categoryField": "country",
                                        "categoryAxis": {
                                            "gridPosition": "start",
                                            "axisAlpha": 0,
                                            "gridAlpha": 0

                                        },
                                        "exportConfig": {
                                            "menuTop": "20px",
                                            "menuRight": "20px",
                                            "menuItems": [{
                                                "icon": '/lib/3/images/export.png',
                                                "format": 'png'
                                            }]
                                        }
                                    }, 0);

                                    jQuery('.chart_<?= $flag ?>_chart_input').off().on('input change', function() {
                                        var property = jQuery(this).data('property');
                                        var target = chart;
                                        chart.startDuration = 0;

                                        if (property == 'topRadius') {
                                            target = chart.graphs[0];
                                        }

                                        target[property] = this.value;
                                        chart.validateNow();
                                    });

                                    $('#chart_<?= $flag ?>').closest('.portlet').find('.fullscreen').click(function() {
                                        chart.invalidateSize();
                                    });
                                }
                            <?php

                        } elseif ($tinta == "UV") {

                            $white = $mysqli->query("SELECT *  FROM `tinta` WHERE tipo='" . $tinta . "' AND color='white' AND estado='Bodega'");
                            $nwhite = $white->num_rows;

                            $barniz = $mysqli->query("SELECT *  FROM `tinta` WHERE tipo='" . $tinta . "' AND color='barniz' AND estado='Bodega'");
                            $nbarniz = $barniz->num_rows;


                            ?> 


                                var initChartSample<?= $flag ?> = function() {

                                        var chart = AmCharts.makeChart("chart_<?= $flag ?>", {
                                            "theme": "light",
                                            "type": "serial",
                                            "startDuration": 2,

                                            "fontFamily": 'Open Sans',

                                            "color": '#888',

                                            "dataProvider": [{
                                                "country": "Cyan <?= $ncy ?>",
                                                "visits": <?= $ncy ?>,
                                                "color": "#0D8ECF"
                                            }, {
                                                "country": "Magenta <?= $nmg ?>",
                                                "visits": <?= $nmg ?>,
                                                "color": "#CD0D74"
                                            }, {
                                                "country": "Yellow <?= $nyl ?>",
                                                "visits": <?= $nyl ?>,
                                                "color": "#F8FF01"
                                            }, {
                                                "country": "Black <?= $nbl ?>",
                                                "visits": <?= $nbl ?>,
                                                "color": "#000000"
                                            }, {
                                                "country": "Flush <?= $nfl ?>",
                                                "visits": <?= $nfl ?>,
                                                "color": "#6E6E6E"
                                            }, {
                                                "country": "Barniz <?= $nbarniz ?>",
                                                "visits": <?= $nbarniz ?>,
                                                "color": "#FFF456"
                                            }, {
                                                "country": "White <?= $nwhite ?>",
                                                "visits": <?= $nwhite ?>,
                                                "color": "#FFFFFF"
                                            }],
                                            "valueAxes": [{
                                                "position": "left",
                                                "axisAlpha": 0,
                                                "gridAlpha": 0
                                            }],
                                            "graphs": [{
                                                "balloonText": "[[category]]: <b>[[value]]</b>",
                                                "colorField": "color",
                                                "fillAlphas": 0.85,
                                                "lineAlpha": 0.1,
                                                "type": "column",
                                                "topRadius": 1,
                                                "valueField": "visits"
                                            }],
                                            "depth3D": 40,
                                            "angle": 30,
                                            "chartCursor": {
                                                "categoryBalloonEnabled": false,
                                                "cursorAlpha": 0,
                                                "zoomable": false
                                            },
                                            "categoryField": "country",
                                            "categoryAxis": {
                                                "gridPosition": "start",
                                                "axisAlpha": 0,
                                                "gridAlpha": 0

                                            },
                                            "exportConfig": {
                                                "menuTop": "20px",
                                                "menuRight": "20px",
                                                "menuItems": [{
                                                    "icon": '/lib/3/images/export.png',
                                                    "format": 'png'
                                                }]
                                            }
                                        }, 0);

                                        jQuery('.chart_<?= $flag ?>_chart_input').off().on('input change', function() {
                                            var property = jQuery(this).data('property');
                                            var target = chart;
                                            chart.startDuration = 0;

                                            if (property == 'topRadius') {
                                                target = chart.graphs[0];
                                            }

                                            target[property] = this.value;
                                            chart.validateNow();
                                        });

                                        $('#chart_<?= $flag ?>').closest('.portlet').find('.fullscreen').click(function() {
                                            chart.invalidateSize();
                                        });
                                    } 
                                <?php

                            } elseif ($tinta == "HP LATEX871 OPTIMIZADOR") {

                                $white = $mysqli->query("SELECT *  FROM `tinta` WHERE tipo='" . $tinta . "' AND color='white' AND estado='Bodega'");
                                $nwhite = $white->num_rows;

                                $barniz = $mysqli->query("SELECT *  FROM `tinta` WHERE tipo='" . $tinta . "' AND color='barniz' AND estado='Bodega'");
                                $nbarniz = $barniz->num_rows;

                                $cabop = $mysqli->query("SELECT *  FROM `tinta` WHERE tipo='" . $tinta . "' AND color='Optimizador' AND estado='Bodega'");
                                $ncabop = $cabop->num_rows;


                                ?> 


                                    var initChartSample<?= $flag ?> = function() {

                                            var chart = AmCharts.makeChart("chart_<?= $flag ?>", {
                                                "theme": "light",
                                                "type": "serial",
                                                "startDuration": 2,

                                                "fontFamily": 'Open Sans',

                                                "color": '#888',

                                                "dataProvider": [{
                                                    "country": "Cyan <?= $ncy ?>",
                                                    "visits": <?= $ncy ?>,
                                                    "color": "#0D8ECF"
                                                }, {
                                                    "country": "Magenta <?= $nmg ?>",
                                                    "visits": <?= $nmg ?>,
                                                    "color": "#CD0D74"
                                                }, {
                                                    "country": "Yellow <?= $nyl ?>",
                                                    "visits": <?= $nyl ?>,
                                                    "color": "#F8FF01"
                                                }, {
                                                    "country": "Black <?= $nbl ?>",
                                                    "visits": <?= $nbl ?>,
                                                    "color": "#000000"
                                                }, {
                                                    "country": "Flush <?= $nfl ?>",
                                                    "visits": <?= $nfl ?>,
                                                    "color": "#6E6E6E"
                                                }, {
                                                    "country": "Cab. HP OP <?= $ncabop ?>",
                                                    "visits": <?= $ncabop ?>,
                                                    "color": "#A5A2A2"

                                                }],
                                                "valueAxes": [{
                                                    "position": "left",
                                                    "axisAlpha": 0,
                                                    "gridAlpha": 0
                                                }],
                                                "graphs": [{
                                                    "balloonText": "[[category]]: <b>[[value]]</b>",
                                                    "colorField": "color",
                                                    "fillAlphas": 0.85,
                                                    "lineAlpha": 0.1,
                                                    "type": "column",
                                                    "topRadius": 1,
                                                    "valueField": "visits"
                                                }],
                                                "depth3D": 40,
                                                "angle": 30,
                                                "chartCursor": {
                                                    "categoryBalloonEnabled": false,
                                                    "cursorAlpha": 0,
                                                    "zoomable": false
                                                },
                                                "categoryField": "country",
                                                "categoryAxis": {
                                                    "gridPosition": "start",
                                                    "axisAlpha": 0,
                                                    "gridAlpha": 0

                                                },
                                                "exportConfig": {
                                                    "menuTop": "20px",
                                                    "menuRight": "20px",
                                                    "menuItems": [{
                                                        "icon": '/lib/3/images/export.png',
                                                        "format": 'png'
                                                    }]
                                                }
                                            }, 0);

                                            jQuery('.chart_<?= $flag ?>_chart_input').off().on('input change', function() {
                                                var property = jQuery(this).data('property');
                                                var target = chart;
                                                chart.startDuration = 0;

                                                if (property == 'topRadius') {
                                                    target = chart.graphs[0];
                                                }

                                                target[property] = this.value;
                                                chart.validateNow();
                                            });

                                            $('#chart_<?= $flag ?>').closest('.portlet').find('.fullscreen').click(function() {
                                                chart.invalidateSize();
                                            });
                                        } 
                                    <?php

                                } else {


                                    ?> 


                                        var initChartSample<?= $flag ?> = function() {

                                                var chart = AmCharts.makeChart("chart_<?= $flag ?>", {
                                                    "theme": "light",
                                                    "type": "serial",
                                                    "startDuration": 2,

                                                    "fontFamily": 'Open Sans',

                                                    "color": '#888',

                                                    "dataProvider": [{
                                                        "country": "Cyan <?= $ncy ?>",
                                                        "visits": <?= $ncy ?>,
                                                        "color": "#0D8ECF"
                                                    }, {
                                                        "country": "Magenta <?= $nmg ?>",
                                                        "visits": <?= $nmg ?>,
                                                        "color": "#CD0D74"
                                                    }, {
                                                        "country": "Yellow <?= $nyl ?>",
                                                        "visits": <?= $nyl ?>,
                                                        "color": "#F8FF01"
                                                    }, {
                                                        "country": "Black <?= $nbl ?>",
                                                        "visits": <?= $nbl ?>,
                                                        "color": "#000000"
                                                    }, {
                                                        "country": "Flush <?= $nfl ?>",
                                                        "visits": <?= $nfl ?>,
                                                        "color": "#999999"
                                                    }, {
                                                        "country": "Blanco <?= $nwh ?>",
                                                        "visits": <?= $nwh ?>,
                                                        "color": "#ffffff"
                                                    }, {
                                                        "country": "L. Cyan <?= $nlc ?>",
                                                        "visits": <?= $nlc ?>,
                                                        "color": "#58ACFA"
                                                    }, {
                                                        "country": "L. Magenta <?= $nlm ?>",
                                                        "visits": <?= $nlm ?>,
                                                        "color": "#F7819F"
                                                    }, {
                                                        "country": "L. Black <?= $nlb ?>",
                                                        "visits": <?= $nlb ?>,
                                                        "color": "#292828"
                                                    }, {
                                                        "country": "L. Yellow <?= $nly ?>",
                                                        "visits": <?= $nly ?>,
                                                        "color": "#FFFFE0"
                                                    }, {
                                                        "country": "Solvente <?= $ncs ?>",
                                                        "visits": <?= $ncs ?>,
                                                        "color": "#ffffff"
                                                    }],
                                                    "valueAxes": [{
                                                        "position": "left",
                                                        "axisAlpha": 0,
                                                        "gridAlpha": 0
                                                    }],
                                                    "graphs": [{
                                                        "balloonText": "[[category]]: <b>[[value]]</b>",
                                                        "colorField": "color",
                                                        "fillAlphas": 0.85,
                                                        "lineAlpha": 0.1,
                                                        "type": "column",
                                                        "topRadius": 1,
                                                        "valueField": "visits"
                                                    }],
                                                    "depth3D": 40,
                                                    "angle": 30,
                                                    "chartCursor": {
                                                        "categoryBalloonEnabled": false,
                                                        "cursorAlpha": 0,
                                                        "zoomable": false
                                                    },
                                                    "categoryField": "country",
                                                    "categoryAxis": {
                                                        "gridPosition": "start",
                                                        "axisAlpha": 0,
                                                        "gridAlpha": 0

                                                    },
                                                    "exportConfig": {
                                                        "menuTop": "20px",
                                                        "menuRight": "20px",
                                                        "menuItems": [{
                                                            "icon": '/lib/3/images/export.png',
                                                            "format": 'png'
                                                        }]
                                                    }
                                                }, 0);

                                                jQuery('.chart_<?= $flag ?>_chart_input').off().on('input change', function() {
                                                    var property = jQuery(this).data('property');
                                                    var target = chart;
                                                    chart.startDuration = 0;

                                                    if (property == 'topRadius') {
                                                        target = chart.graphs[0];
                                                    }

                                                    target[property] = this.value;
                                                    chart.validateNow();
                                                });

                                                $('#chart_<?= $flag ?>').closest('.portlet').find('.fullscreen').click(function() {
                                                    chart.invalidateSize();
                                                });
                                            } 
                                        <?php

                                    }
                                }
                                $mysqli->close();
                                        ?>





                        return {
                            //main function to initiate the module

                            init: function() {

                                <?php
                                include("reportes/connect_reportes.php");
                                //$rs=$mysqli->query("SELECT DISTINCT tipo  FROM `tinta` WHERE 1");
                                $rs = $mysqli->query("SELECT tipo, medida  FROM `tinta_tipo` WHERE estado='1'");
                                $flag = 0;
                                while ($fila = $rs->fetch_row()) {
                                    $tinta = $fila[0];
                                    $flag = $flag + 1;
                                ?>

                                    initChartSample<?= $flag ?>();

                                <?php
                                }
                                $mysqli->close();
                                ?>

                            }

                        };

            }();

            //*************************************************************************************************************************************


            var TableManaged = function() {


                <?php



                include("reportes/connect_reportes.php");


                //$rs=$mysqli->query("SELECT DISTINCT tipo  FROM `tinta` WHERE 1");
                $rs = $mysqli->query("SELECT tipo, medida  FROM `tinta_tipo` WHERE estado='1'");
                $flag = 0;
                while ($fila = $rs->fetch_row()) {
                    $tinta = $fila[0];
                    $flag = $flag + 1;


                ?>



                    var initTable<?= $flag ?> = function() {

                        var table = $('#sample_<?= $flag ?>');

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
                                [5, 15, 20, -1],
                                [5, 15, 20, "Todos"] // change per page values here
                            ],
                            // set the initial value
                            "pageLength": 5,
                            "columnDefs": [{ // set default column settings
                                'orderable': false,
                                'targets': [0]
                            }, {
                                "searchable": true,
                                "targets": [0]
                            }],
                            "order": [
                                [1, "asc"]
                            ] // set first column as a default sort by asc
                        });

                        var tableWrapper = jQuery('#sample_<?= $flag ?>_wrapper');

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

                <?php
                }
                $mysqli->close();
                ?>

                return {

                    //main function to initiate the module
                    init: function() {
                        if (!jQuery().dataTable) {
                            return;
                        }

                        <?php
                        include("reportes/connect_reportes.php");
                        //$rs=$mysqli->query("SELECT DISTINCT tipo  FROM `tinta` WHERE 1");
                        $rs = $mysqli->query("SELECT tipo, medida  FROM `tinta_tipo` WHERE estado='1'");
                        $flag = 0;
                        while ($fila = $rs->fetch_row()) {
                            $tinta = $fila[0];
                            $flag = $flag + 1;
                        ?>

                            initTable<?= $flag ?>();

                        <?php
                        }
                        $mysqli->close();
                        ?>

                    }

                };

            }();


            //*************************************************************************************************************************************

            Metronic.init(); // init metronic core componets
            Layout.init(); // init layout
            QuickSidebar.init(); // init quick sidebar
            ChartsAmcharts.init(); // init demo charts
            TableManaged.init();


            jQuery(".buttons").on("click", function() {
                jQuery("#page-content").hide();
                jQuery("#page-content").load(jQuery(this).attr("page"));
                jQuery('#page-content').fadeIn(1000);
                return false;
            });

        });
    </script>



    <script type="text/javascript">
        $(document).ready(function() {
            $(".fancybox").fancybox({
                openEffect: "none",
                closeEffect: "none"
            });





            $(".zoom").hover(function() {

                $(this).addClass('transition');
            }, function() {

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