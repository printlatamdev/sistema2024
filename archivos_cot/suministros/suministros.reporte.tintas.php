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
<link href="../reportes/assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
<link href="../reportes/assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css"/>
<link href="../reportes/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link href="../reportes/assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
<link href="../reportes/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css"/>
<!-- END GLOBAL MANDATORY STYLES -->
<!-- BEGIN PAGE LEVEL STYLES -->
<link rel="stylesheet" type="text/css" href="assets/global/plugins/datatables/extensions/Scroller/css/dataTables.scroller.min.css"/>
<link rel="stylesheet" type="text/css" href="assets/global/plugins/datatables/extensions/ColReorder/css/dataTables.colReorder.min.css"/>
<link rel="stylesheet" type="text/css" href="assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css"/>


<!-- END PAGE LEVEL PLUGIN STYLES -->
<!-- BEGIN PAGE STYLES -->
<link href="../reportes/assets/admin/pages/css/tasks.css" rel="stylesheet" type="text/css"/>
<!-- END PAGE STYLES -->
<!-- BEGIN THEME STYLES -->
<link href="../reportes/assets/global/css/components.css" id="style_components" rel="stylesheet" type="text/css"/>
<link href="../reportes/assets/global/css/plugins.css" rel="stylesheet" type="text/css"/>
<link href="../reportes/assets/admin/layout/css/layout.css" rel="stylesheet" type="text/css"/>
<link href="../reportes/assets/admin/layout/css/themes/darkblue.css" rel="stylesheet" type="text/css" id="style_color"/>
<link href="../reportes/assets/admin/layout/css/custom.css" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" type="text/css" href="assets/global/plugins/select2/select2.css"/>



<!-- END THEME STYLES -->



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


<?
include("header.php");
?>

<div class="clearfix"></div>
<!-- BEGIN CONTAINER -->
<div class="page-container">
    
    
<?
include("menu.php");
//<!-- menu.php contains SIDEBAR -->
?>



    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
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

                


<!-- BEGIN PAGE CONTENT-->
			<div class="row">
				<div class="col-md-12">
					<ul class="ver-inline-menu tabbable margin-bottom-10">

					<?php
														
						include("../reportes/connect_reportes.php");


						$rs=$mysqli->query("SELECT tipo, medida  FROM `tinta_tipo` WHERE estado='1'");
                        $flag=0;
					    while ($fila = $rs->fetch_row()) 
					    	{ 
                                $tinta=$fila[0];
                                $medida=$fila[1];
                                $flag=$flag + 1;

                            
                                	
                                	echo'<div class="col-md-3">
							             <a data-toggle="tab" href="#tab_'.$flag.'"><img src="../imagenes/tinta.png" class=img-rounded" alt="Cinque Terre" width="100" height="100">
							             <span><strong>'.$tinta.' - '.$medida.'</strong></span></a>
						                 </div>';
                                
                                
					    	}

					    $mysqli->close();

						
					?>
						
					</ul>
				</div>
				<div class="col-md-9">
					<div class="tab-content">
						


                        <?php 



                        include("../reportes/connect_reportes.php");


                        $rs=$mysqli->query("SELECT tipo, medida  FROM `tinta_tipo` WHERE estado='1'");
                        $flag=0;
                        while ($fila = $rs->fetch_row()) 
                            { 
                                $tinta=$fila[0];
                                $flag=$flag + 1;

                                echo'
                                  
                                                        <div id="tab_'.$flag.'" class="tab-pane">
                            <div id="accordion'.$flag.'" class="panel-group">
                                

                                <div class="panel panel-success">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion'.$flag.'" href="#accordion'.$flag.'_1"><strong>'.$tinta.'</strong> </a>
                                        </h4>
                                    </div>
                                    <div id="accordion'.$flag.'_1" class="panel-collapse collapse in">
                                        <div class="panel-body">
                                            
                                           

                                        <div class="portlet light bordered">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="icon-bar-chart font-green-haze"></i>
                                        <span class="caption-subject bold uppercase font-green-haze"> EXITENCIAS</span>
                                        <span class="caption-helper"></span>
                                    </div>
                                    <div class="tools">
                                        
                                    </div>
                                </div>

                            
                                <div class="portlet-body">
                                    <div id="chart_'.$flag.'" class="chart" style="height: 400px;">
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
                                <i class="fa fa-ink"></i>Codigos '.$tinta.'
                            </div>
                            <div class="actions">
                             
                            </div>
                        </div>
                        <div class="portlet-body">
                            <table class="table table-striped table-bordered table-hover" id="sample_'.$flag.'">
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

                             $rs2=$mysqli->query("SELECT color, codigo, estado, ingreso, salida, fecha_uso, equipo  FROM `tinta` WHERE tipo='".$tinta."'");
                              while ($fila2 = $rs2->fetch_row()) 
                            { 
                                $fila2[0];
                                

                            echo'
                            <tr class="odd gradeX">

                                <td>
                                     '.$fila2[0].' 
                                </td>
                                <td>
                                    '.$fila2[1].'
                                </td>
                                <td>';

                                 if ($fila2[2]=="Bodega") {
                                     

                                    echo '<span class="label label-sm label-success">
                                    <strong>'.$fila2[2].'<strong></span>';

                                 } elseif ($fila2[2]=="Produccion") {
                                     
                                      echo '<span class="label label-sm label-warning">
                                    '.$fila2[2].'</span>';

                                 }
                                 elseif ($fila2[2]=="Finalizada") {
                                     
                                      echo '<span class="label label-sm label-danger">
                                    '.$fila2[2].'</span>';

                                 }
                                 elseif ($fila2[2]=="Nicaragua") {
                                     
                                      echo '<span class="label label-sm label-danger">
                                    '.$fila2[2].'</span>';

                                 }


                                
                             echo'<td>';


                                   if($fila2[3]=='0000-00-00 00:00:00' || $fila2[3]==NULL ) {
                                       echo '';
                                    } else { echo date("d/m/Y", strtotime($fila2[3])); }
                       

                                echo'</td><td>';

                                    if($fila2[4]=='0000-00-00 00:00:00' || $fila2[4]==NULL ) {
                                       echo '';
                                    } else { echo   date("d/m/Y", strtotime($fila2[4])); }
        
                                 echo'</td><td>';

                                    if($fila2[5]=='0000-00-00 00:00:00' || $fila2[5]==NULL ) {
                                       echo '';
                                    } else { echo   date("d/m/Y", strtotime($fila2[5])); }


                                     echo'</td><td>';

                                    if($fila2[6]=='' || $fila2[6]==NULL ) {
                                       echo '';
                                    } else { echo   $fila2[6]; }
        
        
                                  echo'           
                                </td>


                                </td>
                            </tr>';

                             }


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
<!-- END CONTAINER -->








<?
include("footer.php");
?>
<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->
<!--[if lt IE 9]>
<script src="../reportes/assets/global/plugins/respond.min.js"></script>
<script src="../reportes/assets/global/plugins/excanvas.min.js"></script> 

-->





<script src="../reportes/assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="../reportes/assets/global/plugins/jquery-migrate.min.js" type="text/javascript"></script>

<script src="../reportes/assets/global/plugins/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
<script src="../reportes/assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="../reportes/assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
<script src="../reportes/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="../reportes/assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="../reportes/assets/global/plugins/jquery.cokie.min.js" type="text/javascript"></script>
<script src="../reportes/assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<script src="../reportes/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>



<script src="../reportes/assets/global/scripts/metronic.js" type="text/javascript"></script>
<script src="../reportes/assets/admin/layout/scripts/layout.js" type="text/javascript"></script>
<script src="../reportes/assets/admin/layout/scripts/quick-sidebar.js" type="text/javascript"></script>
<script src="../reportes/assets/admin/layout/scripts/demo.js" type="text/javascript"></script>
<script src="../reportes/assets/admin/pages/scripts/index.js" type="text/javascript"></script>
<script src="../reportes/assets/admin/pages/scripts/tasks.js" type="text/javascript"></script>
<script src="../reportes/assets/global/plugins/select2/select2.min.js"></script>
<script src="../reportes/assets/admin/pages/scripts/form-samples.js"></script>


<script type="text/javascript" src="../reportes/assets/global/plugins/datatables/media/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="../reportes/assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js"></script>
<script src="../reportes/assets/global/plugins/amcharts/amcharts/amcharts.js" type="text/javascript"></script>
<script src="../reportes/assets/global/plugins/amcharts/amcharts/serial.js" type="text/javascript"></script>
<script src="../reportes/assets/global/plugins/amcharts/amcharts/themes/light.js" type="text/javascript"></script>



<!-- END PAGE LEVEL SCRIPTS -->
<script>
jQuery(document).ready(function() {   


 var ChartsAmcharts = function() {

   


<?php 



                        include("../reportes/connect_reportes.php");


                        //$rs=$mysqli->query("SELECT DISTINCT tipo  FROM `tinta` WHERE 1");
                        $rs=$mysqli->query("SELECT tipo FROM `tinta_tipo` WHERE estado='1'");
                        $flag=0;
                        while ($fila = $rs->fetch_row()) 
                            { 
                                $tinta=$fila[0];
                                $flag=$flag + 1;

                                $cy=$mysqli->query("SELECT *  FROM `tinta` WHERE tipo='".$tinta."' AND color='cyan' AND estado='Bodega'");
                                $ncy=$cy->num_rows;

                                $mg=$mysqli->query("SELECT *  FROM `tinta` WHERE tipo='".$tinta."' AND color='magenta' AND estado='Bodega'");
                                $nmg=$mg->num_rows;

                                $yl=$mysqli->query("SELECT *  FROM `tinta` WHERE tipo='".$tinta."' AND color='yellow' AND estado='Bodega'");
                                $nyl=$yl->num_rows;

                                $bl=$mysqli->query("SELECT *  FROM `tinta` WHERE tipo='".$tinta."' AND color='black' AND estado='Bodega'");
                                $nbl=$bl->num_rows;

                                $fl=$mysqli->query("SELECT *  FROM `tinta` WHERE tipo='".$tinta."' AND color='flush' AND estado='Bodega'");
                                $nfl=$fl->num_rows;



                                if ($tinta=="HP") {

                                        $plastic=$mysqli->query("SELECT *  FROM `tinta` WHERE tipo='".$tinta."' AND color='plastic' AND estado='Bodega'");
                                        $nplastic=$plastic->num_rows;

                                        $white=$mysqli->query("SELECT *  FROM `tinta` WHERE tipo='".$tinta."' AND color='white' AND estado='Bodega'");
                                        $nwhite=$white->num_rows;

                                        $glass=$mysqli->query("SELECT *  FROM `tinta` WHERE tipo='".$tinta."' AND color='glass' AND estado='Bodega'");
                                        $nglass=$glass->num_rows;

                                        $lmagenta=$mysqli->query("SELECT *  FROM `tinta` WHERE tipo='".$tinta."' AND color='light magenta' AND estado='Bodega'");
                                        $nlmagenta=$lmagenta->num_rows;

                                        $lcyan=$mysqli->query("SELECT *  FROM `tinta` WHERE tipo='".$tinta."' AND color='light cyan' AND estado='Bodega'");
                                        $nlcyan=$lcyan->num_rows;
                                        $opt=$mysqli->query("SELECT *  FROM `tinta` WHERE tipo='".$tinta."' AND color='optimizador' AND estado='Bodega'");
                                        $nopt=$opt->num_rows;

                                        $cabcn=$mysqli->query("SELECT *  FROM `tinta` WHERE tipo='".$tinta."' AND color='Cabezales HP Cyan/negro' AND estado='Bodega'");
                                        $ncabcn=$cabcn->num_rows;
                                        $cabmy=$mysqli->query("SELECT *  FROM `tinta` WHERE tipo='".$tinta."' AND color='Cabezales HP Magenta/Yellow' AND estado='Bodega'");
                                        $ncabmy=$cabmy->num_rows;
                                        $cabop=$mysqli->query("SELECT *  FROM `tinta` WHERE tipo='".$tinta."' AND color='Cabezales HP Optimizador' AND estado='Bodega'");
                                        $ncabop=$cabop->num_rows;

                                        ?>
                                    <!-- ************************************************************************************************** -->


                                            var initChartSample<?=$flag?> = function() {
     
                                            var chart = AmCharts.makeChart("chart_<?=$flag?>", {
                                                "theme": "light",
                                                "type": "serial",
                                                "startDuration": 2,

                                                "fontFamily": 'Open Sans',
                                                
                                                "color":    '#888',

                                                "dataProvider": [
                                                  {
                                                    "country": "Cyan <?=$ncy?>",
                                                    "visits": <?=$ncy?>,
                                                    "color": "#0D8ECF"
                                                }, {
                                                    "country": "Light Cyan <?=$nlcyan?>",
                                                    "visits": <?=$nlcyan?>,
                                                    "color": "#58ACFA"
                                                }, {
                                                    "country": "Magenta <?=$nmg?>",
                                                    "visits": <?=$nmg?>,
                                                    "color": "#CD0D74"
                                                }, {
                                                    "country": "Light Magenta <?=$nlmagenta?>",
                                                    "visits": <?=$nlmagenta?>,
                                                    "color": "#F7819F"
                                                }, {
                                                    "country": "Yellow <?=$nyl?>",
                                                    "visits": <?=$nyl?>,
                                                    "color": "#F8FF01"
                                                },{
                                                    "country": "Cab. HP C/N <?=$ncabcn?>",
                                                    "visits": <?=$ncabcn?>,
                                                    "color": "#F81A24"
                                                },{
                                                    "country": "Cab. HP M/Y <?=$ncabmy?>",
                                                    "visits": <?=$ncabmy?>,
                                                    "color": "#251314"
                                                },{
                                                    "country": "Cab. HP OP <?=$ncabop?>",
                                                    "visits": <?=$ncabop?>,
                                                    "color": "#A5A2A2"
                                                },

                                                 /**{
                                                    "country": "Black <?=$nbl?>",
                                                    "visits": <?=$nbl?>,
                                                    "color": "#000000"
                                                }, {
                                                    "country": "White <?=$nwhite?>",
                                                    "visits": <?=$nwhite?>,
                                                    "color": "#FFFFFF"
                                                }, {
                                                    "country": "Glass <?=$nglass?>",
                                                    "visits": <?=$nglass?>,
                                                    "color": "#00FF40"
                                                }, /**{
                                                    "country": "Plastic <?=$nplastic?>",
                                                    "visits": <?=$nplastic?>,
                                                    "color": "#AC58FA"
                                                },**/ {
                                                    "country": "Flush <?=$nfl?>",
                                                    "visits": <?=$nfl?>,
                                                    "color": "#6E6E6E"
                                                },{
                                                    "country": "Optimizador <?=$nopt?>",
                                                    "visits": <?=$nopt?>,
                                                    "color": "#6E6E6E"
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

                                            jQuery('.chart_<?=$flag?>_chart_input').off().on('input change', function() {
                                                var property = jQuery(this).data('property');
                                                var target = chart;
                                                chart.startDuration = 0;

                                                if (property == 'topRadius') {
                                                    target = chart.graphs[0];
                                                }

                                                target[property] = this.value;
                                                chart.validateNow();
                                            });

                                            $('#chart_<?=$flag?>').closest('.portlet').find('.fullscreen').click(function() {
                                                chart.invalidateSize();
                                            });
                                        }
                                <!-- ************************************************************************************************** -->
                                        <?

                                }

                                 elseif ($tinta=="FLORA KONICA") {

                                        $white=$mysqli->query("SELECT *  FROM `tinta` WHERE tipo='".$tinta."' AND color='white' AND estado='Bodega'");
                                        $nwhite=$white->num_rows;

                                        $barniz=$mysqli->query("SELECT *  FROM `tinta` WHERE tipo='".$tinta."' AND color='barniz' AND estado='Bodega'");
                                        $nbarniz=$barniz->num_rows;

                                        ?>
                                    <!-- ************************************************************************************************** -->


                                            var initChartSample<?=$flag?> = function() {
     
                                            var chart = AmCharts.makeChart("chart_<?=$flag?>", {
                                                "theme": "light",
                                                "type": "serial",
                                                "startDuration": 2,

                                                "fontFamily": 'Open Sans',
                                                
                                                "color":    '#888',

                                                "dataProvider": [
                                                  {
                                                    "country": "Cyan <?=$ncy?>",
                                                    "visits": <?=$ncy?>,
                                                    "color": "#0D8ECF"
                                                }, {
                                                    "country": "Magenta <?=$nmg?>",
                                                    "visits": <?=$nmg?>,
                                                    "color": "#CD0D74"
                                                }, {
                                                    "country": "Yellow <?=$nyl?>",
                                                    "visits": <?=$nyl?>,
                                                    "color": "#F8FF01"
                                                }, {
                                                    "country": "Black <?=$nbl?>",
                                                    "visits": <?=$nbl?>,
                                                    "color": "#000000"
                                                }, {
                                                    "country": "Barniz <?=$nbarniz?>",
                                                    "visits": <?=$nbarniz?>,
                                                    "color": "#FFF456"
                                                }, {
                                                    "country": "White <?=$nwhite?>",
                                                    "visits": <?=$nwhite?>,
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

                                            jQuery('.chart_<?=$flag?>_chart_input').off().on('input change', function() {
                                                var property = jQuery(this).data('property');
                                                var target = chart;
                                                chart.startDuration = 0;

                                                if (property == 'topRadius') {
                                                    target = chart.graphs[0];
                                                }

                                                target[property] = this.value;
                                                chart.validateNow();
                                            });

                                            $('#chart_<?=$flag?>').closest('.portlet').find('.fullscreen').click(function() {
                                                chart.invalidateSize();
                                            });
                                        }
                                <!-- ************************************************************************************************** -->
                                        <?

                                } elseif ($tinta=="FLORA LED") {

                                        $white=$mysqli->query("SELECT *  FROM `tinta` WHERE tipo='".$tinta."' AND color='white' AND estado='Bodega'");
                                        $nwhite=$white->num_rows;

                                        ?>
                                    <!-- ************************************************************************************************** -->


                                            var initChartSample<?=$flag?> = function() {
     
                                            var chart = AmCharts.makeChart("chart_<?=$flag?>", {
                                                "theme": "light",
                                                "type": "serial",
                                                "startDuration": 2,

                                                "fontFamily": 'Open Sans',
                                                
                                                "color":    '#888',

                                                "dataProvider": [
                                                  {
                                                    "country": "Cyan <?=$ncy?>",
                                                    "visits": <?=$ncy?>,
                                                    "color": "#0D8ECF"
                                                }, {
                                                    "country": "Magenta <?=$nmg?>",
                                                    "visits": <?=$nmg?>,
                                                    "color": "#CD0D74"
                                                }, {
                                                    "country": "Yellow <?=$nyl?>",
                                                    "visits": <?=$nyl?>,
                                                    "color": "#F8FF01"
                                                }, {
                                                    "country": "Black <?=$nbl?>",
                                                    "visits": <?=$nbl?>,
                                                    "color": "#000000"
                                                }, {
                                                    "country": "Flush <?=$nfl?>",
                                                    "visits": <?=$nfl?>,
                                                    "color": "#6E6E6E"
                                                }, {
                                                    "country": "White <?=$nwhite?>",
                                                    "visits": <?=$nwhite?>,
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

                                            jQuery('.chart_<?=$flag?>_chart_input').off().on('input change', function() {
                                                var property = jQuery(this).data('property');
                                                var target = chart;
                                                chart.startDuration = 0;

                                                if (property == 'topRadius') {
                                                    target = chart.graphs[0];
                                                }

                                                target[property] = this.value;
                                                chart.validateNow();
                                            });

                                            $('#chart_<?=$flag?>').closest('.portlet').find('.fullscreen').click(function() {
                                                chart.invalidateSize();
                                            });
                                        }
                                <!-- ************************************************************************************************** -->
                                        <?

                                } elseif ($tinta=="UV") {

                                    $white=$mysqli->query("SELECT *  FROM `tinta` WHERE tipo='".$tinta."' AND color='white' AND estado='Bodega'");
                                    $nwhite=$white->num_rows;

                                    $barniz=$mysqli->query("SELECT *  FROM `tinta` WHERE tipo='".$tinta."' AND color='barniz' AND estado='Bodega'");
                                    $nbarniz=$barniz->num_rows;


                                    ?>
                                <!-- ************************************************************************************************** -->


                                        var initChartSample<?=$flag?> = function() {
 
                                        var chart = AmCharts.makeChart("chart_<?=$flag?>", {
                                            "theme": "light",
                                            "type": "serial",
                                            "startDuration": 2,

                                            "fontFamily": 'Open Sans',
                                            
                                            "color":    '#888',

                                            "dataProvider": [
                                              {
                                                "country": "Cyan <?=$ncy?>",
                                                "visits": <?=$ncy?>,
                                                "color": "#0D8ECF"
                                            }, {
                                                "country": "Magenta <?=$nmg?>",
                                                "visits": <?=$nmg?>,
                                                "color": "#CD0D74"
                                            }, {
                                                "country": "Yellow <?=$nyl?>",
                                                "visits": <?=$nyl?>,
                                                "color": "#F8FF01"
                                            }, {
                                                "country": "Black <?=$nbl?>",
                                                "visits": <?=$nbl?>,
                                                "color": "#000000"
                                            }, {
                                                    "country": "Flush <?=$nfl?>",
                                                    "visits": <?=$nfl?>,
                                                    "color": "#6E6E6E"
                                            }, {
                                                "country": "Barniz <?=$nbarniz?>",
                                                "visits": <?=$nbarniz?>,
                                                "color": "#FFF456"
                                            }, {
                                                "country": "White <?=$nwhite?>",
                                                "visits": <?=$nwhite?>,
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

                                        jQuery('.chart_<?=$flag?>_chart_input').off().on('input change', function() {
                                            var property = jQuery(this).data('property');
                                            var target = chart;
                                            chart.startDuration = 0;

                                            if (property == 'topRadius') {
                                                target = chart.graphs[0];
                                            }

                                            target[property] = this.value;
                                            chart.validateNow();
                                        });

                                        $('#chart_<?=$flag?>').closest('.portlet').find('.fullscreen').click(function() {
                                            chart.invalidateSize();
                                        });
                                    }
                            <!-- ************************************************************************************************** -->
                                    <?

                            } else  { 


                                    ?>
                                    <!-- ************************************************************************************************** -->


                                            var initChartSample<?=$flag?> = function() {
     
                                            var chart = AmCharts.makeChart("chart_<?=$flag?>", {
                                                "theme": "light",
                                                "type": "serial",
                                                "startDuration": 2,

                                                "fontFamily": 'Open Sans',
                                                
                                                "color":    '#888',

                                                "dataProvider": [
                                                  {
                                                    "country": "Cyan <?=$ncy?>",
                                                    "visits": <?=$ncy?>,
                                                    "color": "#0D8ECF"
                                                }, {
                                                    "country": "Magenta <?=$nmg?>",
                                                    "visits": <?=$nmg?>,
                                                    "color": "#CD0D74"
                                                }, {
                                                    "country": "Yellow <?=$nyl?>",
                                                    "visits": <?=$nyl?>,
                                                    "color": "#F8FF01"
                                                }, {
                                                    "country": "Black <?=$nbl?>",
                                                    "visits": <?=$nbl?>,
                                                    "color": "#000000"
                                                }, {
                                                    "country": "Flush <?=$nfl?>",
                                                    "visits": <?=$nfl?>,
                                                    "color": "#999999"
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

                                            jQuery('.chart_<?=$flag?>_chart_input').off().on('input change', function() {
                                                var property = jQuery(this).data('property');
                                                var target = chart;
                                                chart.startDuration = 0;

                                                if (property == 'topRadius') {
                                                    target = chart.graphs[0];
                                                }

                                                target[property] = this.value;
                                                chart.validateNow();
                                            });

                                            $('#chart_<?=$flag?>').closest('.portlet').find('.fullscreen').click(function() {
                                                chart.invalidateSize();
                                            });
                                        }
                                <!-- ************************************************************************************************** -->
                                        <?
                                
                                }

                              
 }
 $mysqli->close();                            
?>





    return {
        //main function to initiate the module

        init: function() {

                        <?php 
                        include("connect.php");
                        //$rs=$mysqli->query("SELECT DISTINCT tipo  FROM `tinta` WHERE 1");
                        $rs=$mysqli->query("SELECT tipo, medida  FROM `tinta_tipo` WHERE estado='1'");
                        $flag=0;
                        while ($fila = $rs->fetch_row()) 
                            { 
                                $tinta=$fila[0];
                                $flag=$flag + 1;
                                ?>

                                    initChartSample<?=$flag?>();

                                <?
                             }
                        $mysqli->close();                            
                        ?>
            
        }

    };

}(); 

//*************************************************************************************************************************************


var TableManaged = function () {


<?php 



                        include("../reportes/connect_reportes.php");


                        //$rs=$mysqli->query("SELECT DISTINCT tipo  FROM `tinta` WHERE 1");
                        $rs=$mysqli->query("SELECT tipo, medida  FROM `tinta_tipo` WHERE estado='1'");
                        $flag=0;
                        while ($fila = $rs->fetch_row()) 
                            { 
                                $tinta=$fila[0];
                                $flag=$flag + 1;

                                
                              ?>



    var initTable<?=$flag?> = function () {

        var table = $('#sample_<?=$flag?>');

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
            "columnDefs": [{  // set default column settings
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

        var tableWrapper = jQuery('#sample_<?=$flag?>_wrapper');

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

<?
 }
 $mysqli->close();                            
?>

    return {

        //main function to initiate the module
        init: function () {
            if (!jQuery().dataTable) {
                return;
            }

             <?php 
                        include("../reportes/connect.php");
                        //$rs=$mysqli->query("SELECT DISTINCT tipo  FROM `tinta` WHERE 1");
                        $rs=$mysqli->query("SELECT tipo, medida  FROM `tinta_tipo` WHERE estado='1'");
                        $flag=0;
                        while ($fila = $rs->fetch_row()) 
                            { 
                                $tinta=$fila[0];
                                $flag=$flag + 1;
                                ?>

                                    initTable<?=$flag?>();

                                <?
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

   
        jQuery(".buttons").on("click", function(){ 
            jQuery("#page-content").hide(); 
            jQuery("#page-content").load(jQuery(this).attr("page"));
            jQuery('#page-content').fadeIn(1000);
            return false;
        });

});
</script>
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html> 
