

<?
session_start();
$id=$_SESSION['vsIdempresa'];
$base=$_SESSION['base'];
$anio=$_SESSION['year'];
$bd=$base.$anio;
$nombre=$_SESSION['vsNombre'];



  ?>
   







<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <meta http-equiv="Expires" content="0">
  <meta http-equiv="Last-Modified" content="0">
  <meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
  <meta http-equiv="Pragma" content="no-cache">
  <title>Dashio - Bootstrap Admin Template</title>

  <!-- Favicons -->
  <link href="update/update/img/favicon.png" rel="icon">
  <link href="update/update/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Bootstrap core CSS -->
  <link href="update/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!--external css-->
  <link href="update/lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="update/css/zabuto_calendar.css">
  <link rel="stylesheet" type="text/css" href="update/lib/gritter/css/jquery.gritter.css" />
  <!-- Custom styles for this template -->
  <link href="update/css/style.css" rel="stylesheet">
  <link href="update/css/style-responsive.css" rel="stylesheet">
  <script src="update/lib/chart-master/Chart.js"></script>

    <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="update/assets/css/material-dashboard.css?v=2.1.2" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="update/assets/demo/demo.css" rel="stylesheet" />
   <link rel="stylesheet" href="indes/dist/css/adminlte.min.css">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">

      <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="indes/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">

  <link href="assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
<link href="assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css"/>
<link href="assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link href="assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
<link href="assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css"/>
<!-- END GLOBAL MANDATORY STYLES -->
<!-- BEGIN PAGE LEVEL STYLES -->
<link rel="stylesheet" type="text/css" href="assets/global/plugins/datatables/extensions/Scroller/css/dataTables.scroller.min.css"/>
<link rel="stylesheet" type="text/css" href="assets/global/plugins/datatables/extensions/ColReorder/css/dataTables.colReorder.min.css"/>
<link rel="stylesheet" type="text/css" href="assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css"/>


<!-- END PAGE LEVEL PLUGIN STYLES -->
<!-- BEGIN PAGE STYLES -->
<link href="assets/admin/pages/css/tasks.css" rel="stylesheet" type="text/css"/>
<!-- END PAGE STYLES -->
<!-- BEGIN THEME STYLES -->
<link href="assets/global/css/components.css" id="style_components" rel="stylesheet" type="text/css"/>
<link href="assets/global/css/plugins.css" rel="stylesheet" type="text/css"/>
<link href="assets/admin/layout/css/layout.css" rel="stylesheet" type="text/css"/>
<link href="assets/admin/layout/css/themes/darkblue.css" rel="stylesheet" type="text/css" id="style_color"/>
<link href="assets/admin/layout/css/custom.css" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" type="text/css" href="assets/global/plugins/select2/select2.css"/>

<!--LINK DE NUEVA PAGINA-->

<!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->


  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="bower_components/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <link rel="stylesheet" href="assets/navigation-dark.css">
  <link rel="stylesheet" href="assets/slicknav/slicknav.min.css">
  <!------ Include the above in your HEAD tag ---------->
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fancybox/3.2.1/jquery.fancybox.min.css" media="screen">
  <link href="produccion/css/bootstrap.min.css" rel="stylesheet">
  <link href="produccion/css/style_nav.css" rel="stylesheet">

  <!-- END THEME STYLES -->
  <link rel="shortcut icon" href="images/color.ico"/>

  <!-- =======================================================
    Template Name: Dashio
    Template URL: https://templatemag.com/dashio-bootstrap-admin-template/
    Author: TemplateMag.com
    License: https://templatemag.com/license/
  ======================================================= -->

  <style type="text/css">
 

body {
  font-size: 140%;

  
}

p {
  font: oblique bold 120% cursive;
}
h1 {
  font: oblique bold 120% cursive;
}
h2{
  font: oblique bold 120% cursive;
}
h3 {
  font: oblique bold 120% cursive;
}
td {

font-family: sans-serif;
  font-weight: bolder;
}

</style>
  </style>
</head>

<body>
  <section id="container">
    <!-- **********************************************************************************************************************************************************
        TOP BAR CONTENT & NOTIFICATIONS
        *********************************************************************************************************************************************************** -->
    <!--header start-->
    <header class="header black-bg">
      <div class="sidebar-toggle-box">
        <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
      </div>
      <!--logo start-->
      <a href="index.html" class="logo"><b>DASH<span>IO</span></b></a>
      <!--logo end-->
      <div class="nav notify-row" id="top_menu">
        <!--  notification start -->
        <ul class="nav top-menu">
          <!-- settings start -->
          <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="index.html#">
              <i class="fa fa-tasks"></i>
              <span class="badge bg-theme">4</span>
              </a>
            <ul class="dropdown-menu extended tasks-bar">
              <div class="notify-arrow notify-arrow-green"></div>
              <li>
                <p class="green">You have 4 pending tasks</p>
              </li>
              <li>
                <a href="index.html#">
                  <div class="task-info">
                    <div class="desc">Dashio Admin Panel</div>
                    <div class="percent">40%</div>
                  </div>
                  <div class="progress progress-striped">
                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                      <span class="sr-only">40% Complete (success)</span>
                    </div>
                  </div>
                </a>
              </li>
              <li>
                <a href="index.html#">
                  <div class="task-info">
                    <div class="desc">Database Update</div>
                    <div class="percent">60%</div>
                  </div>
                  <div class="progress progress-striped">
                    <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                      <span class="sr-only">60% Complete (warning)</span>
                    </div>
                  </div>
                </a>
              </li>
              <li>
                <a href="index.html#">
                  <div class="task-info">
                    <div class="desc">Product Development</div>
                    <div class="percent">80%</div>
                  </div>
                  <div class="progress progress-striped">
                    <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                      <span class="sr-only">80% Complete</span>
                    </div>
                  </div>
                </a>
              </li>
              <li>
                <a href="index.html#">
                  <div class="task-info">
                    <div class="desc">Payments Sent</div>
                    <div class="percent">70%</div>
                  </div>
                  <div class="progress progress-striped">
                    <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width: 70%">
                      <span class="sr-only">70% Complete (Important)</span>
                    </div>
                  </div>
                </a>
              </li>
              <li class="external">
                <a href="#">See All Tasks</a>
              </li>
            </ul>
          </li>
          <!-- settings end -->
          <!-- inbox dropdown start-->
          <li id="header_inbox_bar" class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="index.html#">
              <i class="fa fa-envelope-o"></i>
              <span class="badge bg-theme">5</span>
              </a>
            <ul class="dropdown-menu extended inbox">
              <div class="notify-arrow notify-arrow-green"></div>
              <li>
                <p class="green">You have 5 new messages</p>
              </li>
              <li>
                <a href="index.html#">
                  <span class="photo"><img alt="avatar" src="update/img/ui-zac.jpg"></span>
                  <span class="subject">
                  <span class="from">Zac Snider</span>
                  <span class="time">Just now</span>
                  </span>
                  <span class="message">
                  Hi mate, how is everything?
                  </span>
                  </a>
              </li>
              <li>
                <a href="index.html#">
                  <span class="photo"><img alt="avatar" src="update/img/ui-divya.jpg"></span>
                  <span class="subject">
                  <span class="from">Divya Manian</span>
                  <span class="time">40 mins.</span>
                  </span>
                  <span class="message">
                  Hi, I need your help with this.
                  </span>
                  </a>
              </li>
              <li>
                <a href="index.html#">
                  <span class="photo"><img alt="avatar" src="update/img/ui-danro.jpg"></span>
                  <span class="subject">
                  <span class="from">Dan Rogers</span>
                  <span class="time">2 hrs.</span>
                  </span>
                  <span class="message">
                  Love your new Dashboard.
                  </span>
                  </a>
              </li>
              <li>
                <a href="index.html#">
                  <span class="photo"><img alt="avatar" src="update/img/ui-sherman.jpg"></span>
                  <span class="subject">
                  <span class="from">Dj Sherman</span>
                  <span class="time">4 hrs.</span>
                  </span>
                  <span class="message">
                  Please, answer asap.
                  </span>
                  </a>
              </li>
              <li>
                <a href="index.html#">See all messages</a>
              </li>
            </ul>
          </li>
          <!-- inbox dropdown end -->
          <!-- notification dropdown start-->
          <li id="header_notification_bar" class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="index.html#">
              <i class="fa fa-bell-o"></i>
              <span class="badge bg-warning">7</span>
              </a>
            <ul class="dropdown-menu extended notification">
              <div class="notify-arrow notify-arrow-yellow"></div>
              <li>
                <p class="yellow">You have 7 new notifications</p>
              </li>
              <li>
                <a href="index.html#">
                  <span class="label label-danger"><i class="fa fa-bolt"></i></span>
                  Server Overloaded.
                  <span class="small italic">4 mins.</span>
                  </a>
              </li>
              <li>
                <a href="index.html#">
                  <span class="label label-warning"><i class="fa fa-bell"></i></span>
                  Memory #2 Not Responding.
                  <span class="small italic">30 mins.</span>
                  </a>
              </li>
              <li>
                <a href="index.html#">
                  <span class="label label-danger"><i class="fa fa-bolt"></i></span>
                  Disk Space Reached 85%.
                  <span class="small italic">2 hrs.</span>
                  </a>
              </li>
              <li>
                <a href="index.html#">
                  <span class="label label-success"><i class="fa fa-plus"></i></span>
                  New User Registered.
                  <span class="small italic">3 hrs.</span>
                  </a>
              </li>
              <li>
                <a href="index.html#">See all notifications</a>
              </li>
            </ul>
          </li>
          <!-- notification dropdown end -->
        </ul>
        <!--  notification end -->
      </div>
      <div class="top-menu">
        <ul class="nav pull-right top-menu">
          <li><a class="logout" href="login.html">Logout</a></li>
        </ul>
      </div>
    </header>
    <!--header end-->
    <!-- **********************************************************************************************************************************************************
        MAIN SIDEBAR MENU
        *********************************************************************************************************************************************************** -->
    <!--sidebar start-->
    <aside>
 
          <?include("menu_new.php")?>
        <!-- sidebar menu end-->
      </div>
    </aside>
    <!--sidebar end-->
    <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
    <!--main content start-->
    <section id="main-content" >
      <section class="wrapper" >

 
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
                <?                 
           include ('suministros/connect.php');

                   
            $sql="SELECT  * FROM compra  ORDER BY id_compra DESC ";  

            $server=$_SERVER['SERVER_ADDR'];
                     
                     
                   
           $rs=$mysqli->query($sql);
           $p=0;
                     $i=0;
             while($row=$rs->fetch_assoc()){ 
                        
                  
                                    $p= $p + 1;  
                  
                                       
                  if($i==0){$class="default"; $i=1;}
                  else if($i==1){$class="dfs"; $i=0;}

                  /*

                  if ($_SESSION['nivel']==1 || $_SESSION['nivel']==2 ) {
                    
                        $fin="<a id='close".$row["id_orden"]."' class='' data-toggle='modal' href='#'><strong>F</strong></a>";

                  } else {

                        $fin="";

                  }
                  
                */
                 
                                    
                  

                                         if($row['estado']=='0' )
                                    
                                         { /*$class="danger"; */ $comp="<span class='label label-sm label-warning'>PENDIENTE</span>"; }
                                         
                                         else if($row['estado']=='1'){   $comp="<span class='label label-sm label-success'>AUTORIZADO</span>";}
                                        
                                         else if($row['estado']=='2'){   $comp="<span class='label label-sm label-danger'>ENTREGADO</span>";}

                                         else if($row['estado']=='3'){   $comp="<span class='label label-sm label-default'>ANULADO</span>";}



                                         if($row['archivo']!='' )
                                    
                                         { $arch='<a target="_blank" href="ordenes_compra_'.$_SESSION['base'].$_SESSION['year'].'/'.$row['archivo'].'"><b><font size="-2"> PDF</font></b></a>'; }


                                         if($row['auto']!='' )
                                    
                                         { $scan='<a target="_blank" href="ordenes_compra_docu_'.$_SESSION['base'].$_SESSION['year'].'/'.$row['auto'].'"><b><font size="-2"> Scan</font></b></a>'; }

                                         if($row['factura']!='' )
                                    
                                         { $fac='<a target="_blank" href="ordenes_compra_fac_'.$_SESSION['base'].$_SESSION['year'].'/'.$row['factura'].'"><b><font size="-2"> Factura</font></b></a>'; }



                                      
                                  

                    /* echo "      
                        <tr class= '".$class."' id='".$row['id_orden']."'>
                        <td width='60px' align='center' ><b>".$row['id_orden']."</b><br></td>
                                                <td> <b><a data-toggle='tab' href='#tab_".$row['id_orden']."'><strong>".$row['empresa']." </strong> <br> <font size='-2'>".$row['contacto']." </font></a></b>
                                                 <br>".$fin."</td></tr> 
                      "; */


                                          echo "           
                                                <tr class= '".$class."' id='".$row['id_compra']."'>

                                                 <td  id='maintd'  width='60px' align='center' valign='center' ><b>".$row['id_compra']."</b></td>
                                                 <td   style='padding:0px'>

                                                         

                                                        <div class='divTable'  >
                                                        <div class='divTableBody'> 
                                                        <div class='divTableRow'>
                                                <div class='divTableCell'><a class='item' style='color: #000;' data-src='compra.control.iframe.php?idorden=".$row['id_compra']."' ><strong>".strtoupper($row['empresa'])." </strong> <br> <font size='-2'>".$row['solicita']." </font></a></div>
                                                        <div align='center' valign='center' class='divTableCell2'><br></div>
                                                        <div align='center' valign='center' class='divTableCell2'><br></div>
                                                        <div align='center' valign='center' class='divTableCell3'><br></div>
                                                        </div>
                                                        
                                                        <div class='divTableRow'>
                                                        <div class='divTableCell'>".$comp."&nbsp;&nbsp;&nbsp;".$arch."&nbsp;&nbsp;&nbsp;&nbsp;".$scan."&nbsp;&nbsp;&nbsp;&nbsp;".$fac."</div>
                                                        <div align='center' valign='center' class='divTableCell2'></div>

                                                        <div align='center' valign='center' class='divTableCell2'></div>


                                                        <div align='center' valign='center' class='divTableCell3'></div>
                                                        </div>
                                                        </div>
                                                        </div>


                                               </td>
                                               </tr>
                                                    
                                          "; 

                                          $comp=""; $arch=""; $scan=""; $fac="";

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




                    
                      <div id='itemcontent' >
                        <iframe class="itemcontent" frameBorder="0" ></iframe>
                    </div>








                    </div>
               </div>








      </div>
      <!-- END PAGE CONTENT-->


        <!-- ******************************************************************************************************************* -->

<a id="exito_fin" href="#modal2" role="button"  data-toggle="modal"></a>


    <div id="modal2" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4  class="alert alert-success"><i class="fa fa-check-square"></i>   <strong>Notificacion</strong></h4>
                </div>
                <div class="modal-body">
                    <p>
                         <center><h4><strong>Se ha finalizado la orden exitosamente.<strong></h4></center>
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
    border-style: ridge; border-width: 3px; 
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
.divTable{
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
.divTableCell, .divTableHead {
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

#maintd2 { border-top: 1px solid #000000;}


#maintd3 { border-bottom: 1px solid #000000;}

#maintd4 { border-left: 1px solid #000000;} 

#maintd5 { border-left: 1px solid #000000; border-bottom: 1px solid #000000;}   

#maintd6 { border-top: 1px solid #000000; border-left: 1px solid #000000;}      

.dfs { background-color: #d3d3d3 !important;  } 

/* Let's get this party started */
::-webkit-scrollbar {
    width: 12px;
}
 
/* Track */
::-webkit-scrollbar-track {
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3); 
    -webkit-border-radius: 10px;
    border-radius: 10px;
}
 
/* Handle */
::-webkit-scrollbar-thumb {
    -webkit-border-radius: 10px;
    border-radius: 10px;
    background: rgba(​192,192,192,0.3); 
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.5); 
}
::-webkit-scrollbar-thumb:window-inactive {
    background: rgba(​192,192,192,0.3); 
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


  .dataTables_filter input { width: 100px !important}


   #itemcontent{ overflow:hidden !important; height: 790px; }
  .itemcontent{ width: 100% !important; height: 100% !important; }


</style> 


<style type="text/css" media="screen">
a:link { color:#000000; text-decoration: none; }
a:visited { color:#000000; text-decoration: none; }
a:hover { color:#000000; text-decoration: none; }
a:active { color:#000000; text-decoration: underline; }
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
     if(e.keyCode==13){
         if(!jQuery(e.target).closest('.modal fade in').length) {
             jQuery('.modal').each(function(){
                jQuery('.modal').modal('hide');
            });
         }
     }
});




var TableManaged = function () {



    var initTable5 = function () {



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
            "columnDefs": [{  // set default column settings
                'orderable': false,
                'targets': [0]
            }, {
                "searchable": true,
                "targets": [0, 1]
            }]
             // set first column as a default sort by asc
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

            

             initTable5();
             //initTable1();

                                
        }

    };

}();


//*************************************************************************************************************************************



<?

    include("suministros/connect.php");
     $sql="SELECT  * FROM compra  ORDER BY id_compra DESC ";  
                      
     $rs=$mysqli->query($sql);

         while($row=$rs->fetch_assoc()){ 


               echo '


                    jQuery("#close'.$row["id_compra"].'").click(function(){
                   //jQuery("#static'.$row["id_compra"].'").modal("hide");

                    var nivel = "1";
                    var orden = "'.$row["id_compra"].'";
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
                   
                   
                    jQuery( "#'.$row["id_compra"].'" ).hide();
                    jQuery( "#tab_'.$row["id_compra"].'" ).hide();
                    

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
              jQuery("#itemcontent iframe").attr({'src':src});

            });



   


});
</script>


             
      </div></div></span></a></li></ul></div></nav></header></div>
        <!-- /row -->
      </section>
    </section></section>
    <!--main content end-->
    <!--footer start-->
   
    <!--footer end-->
  </section>
  <!-- js placed at the end of the document so the pages load faster -->
  <script src="update/lib/jquery/jquery.min.js"></script>

  <script src="update/lib/bootstrap/js/bootstrap.min.js"></script>
  <script class="include" type="text/javascript" src="update/lib/jquery.dcjqaccordion.2.7.js"></script>
  <script src="update/lib/jquery.scrollTo.min.js"></script>
  <script src="update/lib/jquery.nicescroll.js" type="text/javascript"></script>
  <script src="update/lib/jquery.sparkline.js"></script>
  <!--common script for all pages-->
  <script src="update/lib/common-scripts.js"></script>
  <script type="text/javascript" src="update/lib/gritter/js/jquery.gritter.js"></script>
  <script type="text/javascript" src="update/lib/gritter-conf.js"></script>
  <!--script for this page-->
  <script src="update/lib/sparkline-chart.js"></script>
  <script src="update/lib/zabuto_calendar.js"></script>





<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->


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



 <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.18/b-1.5.4/b-colvis-1.5.4/b-flash-1.5.4/b-html5-1.5.4/b-print-1.5.4/datatables.min.css"/>
 <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
 <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
 <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.18/b-1.5.4/b-colvis-1.5.4/b-flash-1.5.4/b-html5-1.5.4/b-print-1.5.4/datatables.min.js"></script>







</body>

</html>
