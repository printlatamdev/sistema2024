

<?
session_start();
$id=$_SESSION['vsIdempresa'];
$base=$_SESSION['base'];
$anio=$_SESSION['year'];
$bd=$base.$anio;
$nombre=$_SESSION['vsNombre'];



  ?>
   

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Color Digital | 2023</title>
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

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
   <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
   
   <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>

<!-- ESTEEEEEEEEEEEEE ESSSSSSSSSSSSSSSSSSSSSSS -->
<!-- ESTEEE -->
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
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <!-- Morris chart -->




  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>




<link href="suministros/assets/global/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css"/>
<link href="suministros/assets/global/plugins/fullcalendar/fullcalendar.min.css" rel="stylesheet" type="text/css"/>
<link href="suministros/assets/global/plugins/jqvmap/jqvmap/jqvmap.css" rel="stylesheet" type="text/css"/>
<!-- END PAGE LEVEL PLUGIN STYLES -->
<!-- BEGIN PAGE STYLES -->
<link href="suministros/assets/admin/pages/css/tasks.css" rel="stylesheet" type="text/css"/>
<!-- END PAGE STYLES -->
<!-- BEGIN THEME STYLES -->
<link href="suministros/assets/global/css/components.css" id="style_components" rel="stylesheet" type="text/css"/>
<link href="suministros/assets/global/css/plugins.css" rel="stylesheet" type="text/css"/>
<link href="suministros/assets/admin/layout/css/layout.css" rel="stylesheet" type="text/css"/>

<link href="suministros/assets/admin/layout/css/custom.css" rel="stylesheet" type="text/css"/>

<link rel="stylesheet" type="text/css" href="suministros/assets/global/plugins/select2/select2.css"/>


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
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">


  
      <?
if (trim($pruebaget) == false) {?>


 
   <?  
}
else{?>
 <script type="text/javascript">
 $(function(){
  $("#anuncio").modal();
 });
</script>



<?}

  ?>

<script>
  
    $(function(){
    
      $(".fancyOther").fancybox({
        width   : '100%',
        height    : '100%',
        maxWidth  : 800,
        maxHeight : 600,
        fitToView : false,
        autoSize  : false,
        closeClick  : false,
        openEffect  : 'none',
        closeEffect : 'none'
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
   width:100px;
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



body{


    background-color: "#ffffff" !important;

}












/*------------------------------------------*/





#fmsp {
   

    border-style: solid;
    border-width: 1px;
    padding: 20px;
    
    padding: 0px;
    margin-right: -1px;
    margin-bottom: -1px;
    margin-top: -1px;
        
}

#fmsd1p {

   /* height: 110px;*/
    border-bottom: thin solid #000000;   
}

#fmsd2p {

    /*height: 170px;*/
    border-bottom: thin solid #000000;   
}

#fmsd3p {

    /*height: 60px;*/
   /* border-bottom: thin solid #000000;  */ 
}



#fms3p {
   

 border-style: solid;
    border-width: 1px;
    padding: 20px;
   
    padding: 0px;
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
a:link { color:#000000; text-decoration: none; }
a:visited { color:#000000; text-decoration: none; }
a:hover { color:#000000; text-decoration: none; }
a:active { color:#000000; text-decoration: underline; }
</style>




   
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
    <? include ('navbar.php');?>
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
        <? if ($base=="esa") { ?>
          <div class="image">
             <img src="images/esa1.png" class="img-circle elevation-2" alt="User Image">
          </div>
        <? }if($base=="nica"){ ?>
          <div class="image">
             <img src="images/nica1.png" class="img-circle elevation-2" alt="User Image">
          </div>
        <? }?>
        <div class="info">
          <a href="#" class="d-block"><?echo $nombre;?></a><a  class="d-block"> online <i class="fas fa-signal" style="color: #2EFE2E"></i></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
         <?include("menu4.php");?>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <div class="content-wrapper">

   



<div class="portlet box blue">
            <div class="portlet-title">
              <div class="caption">
                <i class="fa  fa-cubes"></i>Ingreso de Suministros
              </div>
              <div class="tools">
                <a href="javascript:;" class="collapse">
                </a>
                
              </div>
            </div>
            <div class="portlet-body">
              <div class="row">
                <div class="col-md-3 col-sm-3 col-xs-3">
                  <ul class="nav nav-tabs tabs-left">
                    
                    
                    <li class="active" >
                      <a href="#tab_6_1" data-toggle="tab">
                      <strong>Materiales</strong> </a>
                    </li>


                    <li >
                      <a href="#tab_6_3" data-toggle="tab">
                      <strong>Tintas</strong> </a>
                    </li>

                    
                  </ul>
                </div>
                       




                          <div class="col-md-8 col-sm-8 col-xs-8">
                  <div class="tab-content">
                    
                      
         <!-- *********************************************************************** -->
                     <div class="tab-pane fade"  id="tab_6_3">
                    <!-- BEGIN SAMPLE FORM PORTLET-->
                    <div class="portlet light bordered">
                      <div class="portlet-title">
                        <div class="caption font-black-sunglo">
                           <i class="icon-arrow-down font-black"></i>
                          <span class="caption-subject bold ">Ingreso de Tintas</span>
                        </div>
                        <div class="actions">
                          
                        </div>
                      </div>


                      <div class="portlet-body form">
                      <form id="fomr_tinta" method="post" action="suministros.descargas.php" class="form-horizontal" enctype="multipart/form-data">
                      <input type="hidden" value="5" name="bandera" id="bandera">
                          <div class="form-body">
                            


                             <!--/row-->
                        <div class="row">
                          <div class="col-md-9">
                            <div class="form-group">
                              <label class="control-label col-md-3"><strong>Tipo:</strong></label>
                              <div class="col-md-9">
                                <select id="tipo_tinta" name="tipo_tinta" class="select2_category form-control"  tabindex="1">

                                <?php

                                    include("suministros/connect.php");
                                    
                                    $rs=$mysqli->query("SELECT tipo  FROM `tinta_tipo` WHERE estado='1'"); 

                                       while ($fila = $rs->fetch_row()) { echo '<option value="'.$fila[0].'">'.$fila[0].'</option>';  }

                                    $mysqli->close(); ?>

                                  
                                </select>
                              </div>
                            </div>
                          </div>
                        </div>
                        <!--/row-->


                        <br>



                         <!--/row-->
                        <div class="row">
                          <div class="col-md-9">
                            <div class="form-group">
                              <label class="control-label col-md-3"><strong>Color:</strong></label>
                              <div class="col-md-9">
                                <select id="color_tinta" name="color_tinta" class="select2_category form-control"  tabindex="1">
                                <?php

                                    include("suministros/connect.php");
                                    
                                    $rs=$mysqli->query("SELECT DISTINCT color FROM tinta");

                                       while ($fila = $rs->fetch_row()) { echo '<option value="'.$fila[0].'">'.$fila[0].'</option>';  }

                                    $mysqli->close();?>
                                    <option value="white">white</option>
                                  
                                </select>
                              </div>
                            </div>
                          </div>
                        </div>
                        <!--/row-->

                        <br>



                          <!--/row-->
                        <div class="row">
                          <div class="col-md-9">
                            <div class="form-group">
                              <label class="control-label col-md-3"><strong>Cantidad:</strong></label>
                              <div class="col-md-9">
                                
                                  <div class="input-group">
                                  <span class="input-group-addon input-circle-left">
                                  <i class="fa  fa-sort-down"></i>
                                  </span>
                                  <input name="cantidad_tinta" id="cantidad_tinta" type="text" class="form-control input-circle-right " required>
                                    </div>

                              </div>
                            </div>
                          </div>
                        </div>
                        <!--/row-->
                        <br>

                            <!--/row-->
                            <div class="row">
                          <div class="col-md-9">
                            <div class="form-group">
                              <label class="control-label col-md-3"><strong>Comprobante 1:</strong></label>
                              <div class="col-md-9">
                                
                                  <div class="input-group">
                                  <span class="input-group-addon input-circle-left">
                                  <i class="fa  fa-sort-down"></i>
                                  </span>

                                              <div class="input">
                                            <label class="custom-file-upload">
                                                <input type="file" id="compro_1" name="compro_1" />
                                                Seleccionar Foto
                                            </label>
                                            <label id="ok_compro_1"><strong>OK</strong></label>
                                            </div>

                                  
                                    </div>

                              </div>
                            </div>
                          </div>
                        </div>
                        <!--/row-->

                                                    <br>


                          <!--/row-->
                        <div class="row">
                          <div class="col-md-9">
                            <div class="form-group">
                              <label class="control-label col-md-3"><strong>Comprobante 2:</strong></label>
                              <div class="col-md-9">
                                
                                  <div class="input-group">
                                  <span class="input-group-addon input-circle-left">
                                  <i class="fa  fa-sort-down"></i>
                                  </span>

                                              <div class="input">
                                            <label class="custom-file-upload">
                                                <input type="file" id="compro_2" name="compro_2" />
                                                Seleccionar Foto
                                            </label>
                                            <label id="ok_compro_2"><strong>OK</strong></label>
                                            </div>

                                  
                                    </div>

                              </div>
                            </div>
                          </div>
                        </div>
                        <!--/row-->

                          

                            
                            
                          </div>
                          <div class="form-actions noborder">
                              <button  type="submit" class="btn blue">Ingresar</button>
                            <!--<button id="ingreso_tinta" type="button" class="btn blue">Ingresar</button>-->
                            
                          </div>
                        </form>
                      </div>
                    </div>
                    <!-- END SAMPLE FORM PORTLET-->


                                          <!-- *********************************************************************** -->
                                            <form id="excel_form"  role="form" method="post" action="excel.tinta.php">
                          <div class="input-group input-large date-picker input-daterange" data-date="10/11/2012" data-date-format="dd-mm-yyyy">
                          <span class="input-group-addon">Fecha:</span>
                        <input type="text" class="form-control" name="fecha" required>
                      </div>

                      <br>
                                            <button id="excel" type="submit" class="btn red">Generar Excel</button> 
                                            </form>
                                          <!-- *********************************************************************** -->

                    </div>



                     <!-- *********************************************************************** -->
                     <div class="tab-pane fade" id="tab_6_2">
                    <!-- BEGIN SAMPLE FORM PORTLET-->
                    <div class="portlet light bordered">
                      <div class="portlet-title">
                        <div class="caption font-black-sunglo">
                           <i class="icon-arrow-down font-black"></i>
                          <span class="caption-subject bold ">Ingreso de Papel</span>
                        </div>
                        <div class="actions">
                          
                        </div>
                      </div>
                      <div class="portlet-body form">
                        <form  role="form" method="post" action="#">
                          <div class="form-body">
                            <div class="form-group form-md-line-input has-success">
                              <div class="input-icon">
                                <input name="codigo" id="codigo" type="text" class="form-control" required>
                                <label for="form_control_1">codigo</label>
                                <span class="help-block">Ingrese el codigo que se encuentra en la viñeta</span>
                                <i class="fa fa-barcode"></i>
                              </div>
                            </div>


                            <!--/row--> 
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="control-label col-md-3"><strong>Empresa:</strong></label>
                              <div class="col-md-9">
                                <div class="radio-list">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                  <label class="radio-inline">
                                  <input class="rad" type="radio" name="empresa_papel" id="empresa_papel_papel" value="color" checked />
                                  Color</label>
                                  <label class="radio-inline">
                                  <input class="rad" type="radio" name="empresa_papel" id="empresa_papel" value="campos" />
                                  Campos </label>
                                  <label class="radio-inline">
                                  <input class="rad" type="radio" name="empresa_papel" id="empresa_papel" value="Cnl" />
                                  Color en Linea </label>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>  
                        <!--/row--> 


                            
                            
                          </div>
                          <div class="form-actions noborder">
                            <button id="papel" type="button" class="btn blue">Ingresar</button>
                            
                          </div>
                        </form>
                      </div>
                    </div>
                    <!-- END SAMPLE FORM PORTLET-->


                    </div>

                    
          <!-- ******************************************************************************************** -->       

                    
          <!-- ******************************************************************************************** -->         
                     <div class="tab-pane active"  id="tab_6_1">
                          
          <div class="portlet light bordered">
                  <div class="portlet-title">
                    <div class="caption">
                      <i class="icon-arrow-down font-black"></i>
                        <span class="caption-subject bold ">Ingreso de Materiales</span>
                    </div>
                    <div class="tools">
                      
                    </div>
                  </div>
                  <div class="portlet-body form">
                    <!-- BEGIN FORM-->
                    <form id="fomr2" method="post" action="suministros.descargas.php" class="form-horizontal" enctype="multipart/form-data">
                      <input type="hidden" value="9" name="bandera" id="bandera">
                      <div class="form-body">


                         <!--/row-->
                        <div class="row">
                          <div class="col-md-9">
                            <div class="form-group">
                              <label class="control-label col-md-3"><strong>Orden de Compra:</strong></label>
                              <div class="col-md-9">
                                <div class="input-group">
                                  <span class="input-group-addon input-circle-left">
                                  <i class="fa  fa-sort-down"></i>
                                  </span>
                                  <input name="compra" id="compra" type="text" class="form-control input-circle-right " required>
                                    </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <!--/row-->



                         <!--/row-->
                        <div class="row">
                          <div class="col-md-9">
                            <div class="form-group">
                              <label class="control-label col-md-3"><strong>Proveedor:</strong></label>
                              <div class="col-md-9">
                                <select id="proveedor" name="proveedor" class="select2_category form-control"  tabindex="1" required>
                                <option value="0">Seleccione Proveedor</option> 
                                <?php

                                    include("suministros/connect.php");
                                    
                                    $rs=$mysqli->query("SELECT * FROM proveedor");

                                       while ($fila = $rs->fetch_row()) { echo '<option value="'. $fila[0].'_'. $fila[1].'">'.strtoupper($fila[1]).'</option>';  }

                                    $mysqli->close();

                                                                ?>
                                  
                                </select>
                              </div>
                            </div>
                          </div>
                        </div>
                        <!--/row-->
                        

                                               <!--/row-->
                        <div class="row">
                          <div class="col-md-9">
                            <div class="form-group">
                              <label class="control-label col-md-3"><strong>Material:</strong></label>
                              <div class="col-md-9">
                                <select id="material" name="material" class="select2_category form-control"  tabindex="1" required>
                                <?php

                                    include("suministros/connect.php");
                                    
                                    $rs=$mysqli->query("SELECT * FROM material WHERE estado=1");

                                       while ($fila = $rs->fetch_row()) { echo '<option value="'.$fila[0].'">'.$fila[1].' - '.$fila[2].'</option>';  }

                                    $mysqli->close();

                                                                ?>
                                  
                                </select>
                              </div>
                            </div>
                          </div>
                        </div>
                        <!--/row-->


                        <!--/row-->
                        <div class="row">
                          <div class="col-md-9">
                            <div class="form-group">
                              <label class="control-label col-md-3"><strong>Cantidad:</strong></label>
                              <div class="col-md-9">
                                
                                  <div class="input-group">
                                  <span class="input-group-addon input-circle-left">
                                  <i class="fa  fa-sort-down"></i>
                                  </span>
                                  <input name="cantidad" id="cantidad" type="text" class="form-control input-circle-right " required>
                                    </div>

                              </div>
                            </div>
                          </div>
                        </div>
                        <!--/row-->



                          <!--/row-->
                        <div class="row">
                          <div class="col-md-9">
                            <div class="form-group">
                              <label class="control-label col-md-3"><strong>Orden Compra:</strong></label>
                              <div class="col-md-9">
                                
                                  <div class="input-group">
                                  <span class="input-group-addon input-circle-left">
                                  <i class="fa  fa-sort-down"></i>
                                  </span>

                                              <div class="input">
                                            <label class="custom-file-upload">
                                                <input type="file" id="compra_imagen" name="compra_imagen" />
                                                Seleccionar Foto
                                            </label>
                                            <label id="ok_compra"><strong>OK</strong></label>
                                            </div>

                                  
                                    </div>

                              </div>
                            </div>
                          </div>
                        </div>
                        <!--/row-->




                          <!--/row-->
                        <div class="row">
                          <div class="col-md-9">
                            <div class="form-group">
                              <label class="control-label col-md-3"><strong>Factura:</strong></label>
                              <div class="col-md-9">
                                
                                  <div class="input-group">
                                  <span class="input-group-addon input-circle-left">
                                  <i class="fa  fa-sort-down"></i>
                                  </span>

                                              <div class="input">
                                            <label class="custom-file-upload">
                                                <input type="file" id="factura_imagen" name="factura_imagen" />
                                                Seleccionar Foto
                                            </label>
                                            <label id="ok_factura"><strong>OK</strong></label>
                                            </div>

                                  
                                    </div>

                              </div>
                            </div>
                          </div>
                        </div>
                        <!--/row-->



                          <!--/row-->
                        <div class="row">
                          <div class="col-md-9">
                            <div class="form-group">
                              <label class="control-label col-md-3"><strong>Nota:</strong></label>
                              <div class="col-md-9">
                                
                                  <div class="input-group">
                                  
                                  <textarea cols="45" rows="4" name="nota" id="nota"></textarea>
                                    </div>

                              </div>
                            </div>
                          </div>
                        </div>
                        <!--/row-->



                                                                      
                        
                      <div class="form-actions">
                        <div class="row">
                          <div class="col-md-9">
                            <div class="row">
                              <div class="col-md-offset-3 col-md-9">
                                <button  type="submit" class="btn blue">Ingresar</button>

                                </div>
                            </div>
                          </div>
                          <div class="col-md-6">
                          </div>
                        </div>
                      </div>
                    </form>
                    <!-- END FORM-->
                  </div>
                </div>

                           </div>

                <!-- ******************************************************************************************** -->

          
          




                
                      
      







                    
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

      









<!-- ------------FIN DE CONTENIDO-----------------------------------------------------------------------------------------------  -->




<!-- SECCION DE ALERTAS -->

<!-- ******************************************************************************************************************* -->

  <a id="vacio" href="#modal1" role="button"  data-toggle="modal"></a>


  <div id="modal1" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
          <h4 class="alert alert-danger"> <i class="fa fa-warning"></i>  <strong>Alerta!</strong></h4>
        </div>
        <div class="modal-body">
          <p>
             <center><h4><strong>Ingrese un Codigo!</strong></h4></center>
          </p>
        </div>
        <div class="modal-footer">
          <button data-dismiss="modal" class="btn red">OK</button>
        </div>
      </div>
    </div>
  </div>


<!-- ******************************************************************************************************************* -->



<!-- ******************************************************************************************************************* -->

<a id="exito" href="#modal2" role="button"  data-toggle="modal"></a>


  <div id="modal2" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
          <h4  class="alert alert-success"><i class="fa fa-check-square"></i>   <strong>Notificacion</strong></h4>
        </div>
        <div class="modal-body">
          <p>
             <center><h4><strong>El Codigo <label id="code"></label> se ha descargado.<strong></h4></center>
          </p>
        </div>
        <div class="modal-footer">
          <button data-dismiss="modal" class="btn green">OK</button>
        </div>
      </div>
    </div>
  </div>


<!-- ******************************************************************************************************************* -->


<!-- ******************************************************************************************************************* -->

  <a id="error" href="#modal3" role="button"  data-toggle="modal"></a>


  <div id="modal3" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
          <h4 class="alert alert-danger"> <i class="fa fa-warning"></i>  <strong>Alerta!</strong></h4>
        </div>
        <div class="modal-body">
          <p>
             <center><h4><strong>El Codigo <label id="code2"></label> ya se encuentra descargado.</strong></h4></center>
          </p>
        </div>
        <div class="modal-footer">
          <button data-dismiss="modal" class="btn red">OK</button>
        </div>
      </div>
    </div>
  </div>


<!-- ******************************************************************************************************************* -->



<!-- ******************************************************************************************************************* -->

  <a id="vacio_material" href="#modal4" role="button"  data-toggle="modal"></a>


  <div id="modal4" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
          <h4 class="alert alert-danger"> <i class="fa fa-warning"></i>  <strong>Alerta!</strong></h4>
        </div>
        <div class="modal-body">
          <p>
             <center><h4><strong>Por favor llene todos los campos del formulario.</strong></h4></center>
          </p>
        </div>
        <div class="modal-footer">
          <button data-dismiss="modal" class="btn red">OK</button>
        </div>
      </div>
    </div>
  </div>


<!-- ******************************************************************************************************************* -->


<!-- ******************************************************************************************************************* -->

<a id="exito2" href="#modal5" role="button"  data-toggle="modal"></a>


  <div id="modal5" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
          <h4  class="alert alert-success"><i class="fa fa-check-square"></i>   <strong>Notificacion</strong></h4>
        </div>
        <div class="modal-body">
          <p>
             <center><h4><strong>El material se ha ingresado con exito.<strong></h4></center>
          </p>
        </div>
        <div class="modal-footer">
          <button data-dismiss="modal" class="btn green">OK</button>
        </div>
      </div>
    </div>
  </div>


<!-- ******************************************************************************************************************* -->



<!-- ******************************************************************************************************************* -->

  <a id="fallo" href="#modal6" role="button"  data-toggle="modal"></a>


  <div id="modal6" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
          <h4 class="alert alert-danger"> <i class="fa fa-warning"></i>  <strong>Alerta!</strong></h4>
        </div>
        <div class="modal-body">
          <p>
             <center><h4><strong>Cantidad a descargar excede cantidad en existencia!</strong></h4></center>
          </p>
        </div>
        <div class="modal-footer">
          <button data-dismiss="modal" class="btn red">OK</button>
        </div>
      </div>
    </div>
  </div>


<!-- ******************************************************************************************************************* -->

<!-- ******************************************************************************************************************* -->

<a id="exito3" href="#modal7" role="button"  data-toggle="modal"></a>


  <div id="modal7" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
          <h4  class="alert alert-success"><i class="fa fa-check-square"></i>   <strong>Notificacion</strong></h4>
        </div>
        <div class="modal-body">
          <p>
             <center><h4><strong>La tinta se ha ingresado con exito.<strong></h4></center>
          </p>
        </div>
        <div class="modal-footer">
          <button data-dismiss="modal" class="btn green">OK</button>
        </div>
      </div>
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
<script src="assets/global/plugins/respond.min.js"></script>
<script src="assets/global/plugins/excanvas.min.js"></script> 

SCRIPTS -->
<script>
jQuery(document).ready(function() {    
   Metronic.init(); // init metronic core componets
   Layout.init(); // init layout
   QuickSidebar.init(); // init quick sidebar
      FormSamples.init();
      ComponentsPickers.init();



    jQuery( "#ok_compra" ).hide();
    jQuery( "#ok_factura" ).hide();
  jQuery( "#ok_compro_1" ).hide();
    jQuery( "#ok_compro_2" ).hide();


   jQuery('#compra_imagen').bind('change', function() {

    if (this.files[0].size>1048576) { 

      alert("La imagen que intenta subir excede el tamaño permitido.");
        jQuery( "#ok_compra" ).hide();

    }else{ jQuery( "#ok_compra" ).show(); }
   });


   jQuery('#factura_imagen').bind('change', function() {

    if (this.files[0].size>1048576) { 

      alert("La imagen que intenta subir excede el tamaño permitido.");
        jQuery( "#ok_factura" ).hide();

    }else{ jQuery( "#ok_factura" ).show(); }
   });  


   
   jQuery('#compro_1').bind('change', function() {

    if (this.files[0].size>1048576) { 

      alert("La imagen que intenta subir excede el tamaño permitido.");
        jQuery( "#ok_compro_1" ).hide();

    }else{ jQuery( "#ok_compro_1" ).show(); }
   });   


   
   jQuery('#compro_2').bind('change', function() {

    if (this.files[0].size>1048576) { 

      alert("La imagen que intenta subir excede el tamaño permitido.");
        jQuery( "#ok_compro_2" ).hide();

    }else{ jQuery( "#ok_compro_2" ).show(); }
   });   


   
      
});


</script>

      

        <!-- ./col -->
       
      <!-- /.row -->
      <!-- Main row -->
    
<!-- ./wrapper -->

<!-- jQuery 3 -->




<script type="text/javascript">
  


  $(document).ready(function(){
      $("tr.Galleta_Grande").on('click', function()  { 
    $(this).next("tr.Galleta_Chica").toggle(); 
});
      $('tr.Galleta_Grande').click();
});


</script>


<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
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
<!-- IMPORTANsuministros/T! fullcalendar depends on jquery-ui.min.js for drag & drop support -->
<script src="suministros/assets/global/plugins/fullcalendar/fullcalendar.min.js" type="text/javascript"></script>
<script src="suministros/assets/global/plugins/jquery-easypiechart/jquery.easypiechart.min.js" type="text/javascript"></script>
<script src="suministros/assets/global/plugins/jquery.sparkline.min.js" type="text/javascript"></script>
<!-- END PAGEsuministros/ LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="assets/global/scripts/metronic.js" type="text/javascript"></script>
<script src="suministros/assets/admin/layout/scripts/layout.js" type="text/javascript"></script>
<script src="suministros/assets/admin/layout/scripts/quick-sidebar.js" type="text/javascript"></script>
<script src="suministros/assets/admin/layout/scripts/demo.js" type="text/javascript"></script>
<script src="suministros/assets/admin/pages/scripts/index.js" type="text/javascript"></script>
<script src="suministros/assets/admin/pages/scripts/tasks.js" type="text/javascript"></script>
<script src="suministros/assets/global/plugins/select2/select2.min.js"></script>
<script src="suministros/assets/admin/pages/scripts/form-samples.js"></script>


<script type="text/javascript" src="suministros/assets/global/plugins/select2/select2.min.js"></script>
<script type="text/javascript" src="suministros/assets/global/plugins/datatables/media/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="suministros/assets/global/plugins/datatables/extensions/TableTools/js/dataTables.tableTools.min.js"></script>
<script type="text/javascript" src="suministros/assets/global/plugins/datatables/extensions/ColReorder/js/dataTables.colReorder.min.js"></script>
<script type="text/javascript" src="suministros/assets/global/plugins/datatables/extensions/Scroller/js/dataTables.scroller.min.js"></script>
<script type="text/javascript" src="suministros/assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js"></script>




 <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.18/b-1.5.4/b-colvis-1.5.4/b-flash-1.5.4/b-html5-1.5.4/b-print-1.5.4/datatables.min.css"/>
 <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
 <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
 <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.18/b-1.5.4/b-colvis-1.5.4/b-flash-1.5.4/b-html5-1.5.4/b-print-1.5.4/datatables.min.js"></script>









<!--<script src="indes/plugins/jquery/jquery.min.js"></script>-->
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




</body>
</html>
