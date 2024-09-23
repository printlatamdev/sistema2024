

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
  <title>Color Digital | 2020</title>
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


<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>

<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>
<link href="reportes/assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
<link href="reportes/assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css"/>
<link href="reportes/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link href="reportes/assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
<link href="reportes/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css"/>
<!-- END GLOBAL MANDATORY STYLES -->
<!-- BEGIN PAGE LEVEL STYLES -->
<link rel="stylesheet" type="text/css" href="reportes/assets/global/plugins/datatables/extensions/Scroller/css/dataTables.scroller.min.css"/>
<link rel="stylesheet" type="text/css" href="reportes/assets/global/plugins/datatables/extensions/ColReorder/css/dataTables.colReorder.min.css"/>
<link rel="stylesheet" type="text/css" href="reportes/assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css"/>

<!-- END PAGE LEVEL STYLES -->
<!-- BEGIN PAGE LEVEL PLUGIN STYLES -->
<link href="reportes/assets/global/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css"/>
<link href="reportes/assets/global/plugins/fullcalendar/fullcalendar.min.css" rel="stylesheet" type="text/css"/>
<link href="reportes/assets/global/plugins/jqvmap/jqvmap/jqvmap.css" rel="stylesheet" type="text/css"/>
<!-- END PAGE LEVEL PLUGIN STYLES -->
<!-- BEGIN PAGE STYLES -->
<link href="reportes/assets/admin/pages/css/tasks.css" rel="stylesheet" type="text/css"/>
<!-- END PAGE STYLES -->
<!-- BEGIN THEME STYLES -->

<link href="reportes/assets/admin/layout/css/custom.css" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" type="text/css" href="reportes/assets/global/plugins/select2/select2.css"/>



<link rel="stylesheet" type="text/css" href="reportes/assets/global/plugins/clockface/css/clockface.css"/>
<link rel="stylesheet" type="text/css" href="reportes/assets/global/plugins/bootstrap-datepicker/css/datepicker3.css"/>
<link rel="stylesheet" type="text/css" href="reportes/assets/global/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css"/>
<link rel="stylesheet" type="text/css" href="reportes/assets/global/plugins/bootstrap-colorpicker/css/colorpicker.css"/>
<link rel="stylesheet" type="text/css" href="reportes/assets/global/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css"/>
<link rel="stylesheet" type="text/css" href="reportes/assets/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css"/>




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
 <div class="container">
  <div class="table-wrapper">
<?
            
        include("connectin.php");


        $cd=$mysqli->query("SELECT * FROM caja_saldos WHERE estado='1' OR estado='2' ");

       
        
        $rowcount=mysqli_num_rows($cd);
        
        if($rowcount<=0){
                ?>

           <div  class="row" >
            



            <div class="col-md-9">

              <div  id="contenedor1" class="portlet box blue">
                
                <div class="portlet-title">
                  <div class="caption">
                    <i class="icon-wallet"></i> Ingresar Saldo
                  </div>
                  <ul class="nav nav-tabs">
                    <li class="active">
                      <a href="#portlet_tab_1_1" data-toggle="tab">
                      <strong>Caja Chica</strong></a>
                    </li>

                                      
                  </ul>
                </div>




                <div class="portlet-body form">
                  <div class="tab-content">



                      <!-- ***************************************************************************************************************************************************************************** -->

                      
            <form id="fomr1" method="post" action="caja.sql.php"  class="form-horizontal" enctype="multipart/form-data">
            <input type="hidden" name="bandera" value="1" >

                    <div class="tab-pane active" id="portlet_tab_1_1">
                      <div class="skin skin-minimal">
                        
                          
                            
                <div class="portlet light bordered">
                  
                  <div class="portlet-body form">
                    <!-- BEGIN FORM-->
                    
                  
                      <div class="form-body">
                        

                                             
                        <!--/row-->
                        <div class="row">
                          <div class="col-md-10">
                            

                            <div class="form-group">

                              <div class="col-md-5">
                                    <label class="control-label"><strong>Saldo:</strong><font size="-1" color="red">* Los ingresos de efectivo deben ser en córdobas C$.</font></label>



                                  <div class="input-group">
                                  <span class="input-group-addon input-circle-left">
                                  <i class="fa   fa-money"></i>
                                  </span>
                                  
                                  <input required   type="number" name="cant" id="cant" step="any" min="0"  class="form-control" placeholder="Cantidad" size="35px">
                                   
                                    </div>
                              </div>


                              
                              
                              

                            </div>

                          </div>
                        </div>
                        <!--/row-->



                        <!--/row-->
                        <div class="row">
                          <div class="col-md-10">
                            

                            <div class="form-group">

                            

                              
                              <div class="col-md-5">
                              <label class="control-label"><strong>Transferecia Bancaria:</strong></label>
                                              <div class="input">
                                            <label class="custom-file-upload">

                                                                                       <input type="file" id="arte" name="arte" required  />
                                               Subir Comprobante
                                            </label>
                                            <label id="ok"><strong>OK</strong></label>
                                            </div>
                              </div>


                              <div class="col-md-5">
                              <label class="control-label"><strong>Retiro de Dinero:</strong></label>
                                              <div class="input">
                                            <label class="custom-file-upload">

                                                                                       <input type="file" id="arte2" name="arte2" required  />
                                                                                         Subir Comprobante
                                            </label>
                                            <label id="ok2"><strong>OK</strong></label>
                                            </div>
                              </div>
                                  


                            </div>

                          </div>
                        </div>
                        <!--/row-->
                                                                      
                    
                    <!-- END FORM-->
                  
                </div>
                </div>
      
                            
                          </div>
                          <div class="form-actions">
                            <input type="submit" name="" value="Ingresar" class="btn blue">
                            
                          </div>
                        
                      </div>
                    </div>



                      <!-- ***************************************************************************************************************************************************************************** -->

                             </form>

 











                    
                  </div>
    </div>


</div>
            

        <?

         }
         else{ echo "<h3>Nota: Si desea ingresar nuevo saldo necesita finalizar caja chica activa.</h3><br><br><br>"; }

         $mysqli->close();
?>

<!-- ------------CONTENIDO-----------------------------------------------------------------------------------------------  -->


<div  class="row">
            



            <div class="col-md-8">

              <div  id="contenedor1" class="portlet box blue">
                
                <div class="portlet-title">
                  <div class="caption">
                    <i class="icon-wallet"></i> Caja Chica Activa 
                  </div>
                  
                </div>




                <div class="portlet-body form">
                  <div class="tab-content">
      <?
              

        include("connectin.php");


        $cd=$mysqli->query("SELECT * FROM caja_saldos WHERE estado='1'");
        
        $rowcount=mysqli_num_rows($cd);
        
        if($rowcount<=0){ 
          
        
                          $cd2=$mysqli->query("SELECT * FROM caja_saldos WHERE estado='2'");
                          $rowcount2=mysqli_num_rows($cd2);
                          if($rowcount2<=0){ echo "<br><b>No existe caja activa.Por favor ingresar saldo.</b>";   }else{ 
                            
                            

                            if ($_SESSION['nivel']==1 || $_SESSION['nivel']==2 ) {

                              while ($fila = $cd2->fetch_assoc()) {  
          
                                $id_saldo=$fila['id_saldo'];
                                $fecha_ini=$fila['fecha_ini'];  
                                $saldo_t=$fila['saldo_transferido'];
                                $saldo_i=$fila['saldo_inicial'];
                                $saldo_a=$fila['saldo_actual'];
                                $trans=$fila['trans'];
                                $retiro=$fila['retiro'];
                              
                              }
                      
                              $serve =  $_SERVER['REQUEST_URI'];
                              $serve1 = $_SERVER['SERVER_NAME'];
                              $arr = explode("/", $serve);
                              $subd= $arr[1];
                              $uri = $serve1."/".$subd;
                      
                                  ?>
                                   
                                    <table align="center"  >
                                     <tr>
                                     <th>Fecha Inicio</th>
                                     <th>Saldo Transferido</th>
                                     <th>Saldo Inicial</th>
                                     <th>Saldo Actual</th>
                                     <th>Tranferecia Bancaria</th>
                                     <th>Retiro Dinero</th>
                                     <th>Detalles</th>
                                     <th>Acciones</th>
                                     </tr>
                      
                                     <tr align="center">
                                     <td><?=$fecha_ini?></td>
                                     <td>C$&nbsp;<?=number_format($saldo_t, 2, '.', '')?></td>
                                     <td>C$&nbsp;<?=number_format($saldo_i, 2, '.', '')?></td>
                                     <td>C$&nbsp;<?=number_format($saldo_a, 2, '.', '')?></td>
                                     <td><? echo "<a target='_blank' href='http://$uri/caja_".$_SESSION['base'].$_SESSION['year']."/transfer/".$trans."' >Ver</a>"?></td>
                                     <td><? echo "<a target='_blank' href='http://$uri/caja_".$_SESSION['base'].$_SESSION['year']."/comprobante/".$retiro."' >Ver</a>"?></td>
                      
                                     <td><a  href="caja.descarga.php" target="_self">Mostrar</a></td>
                                     <td>
                                     
                                      <?   echo '<a class="fin" href="caja.sql.php?bandera=6&id='.$id_saldo.'" target="_self">Autorizar</a>';  ?>
                                     
                                     
                                     </td>
                                     </tr>
                      
                                    </table>
                      
                        
                                 <?



                            }
                            else{   echo "<br><b>Caja chica en espera de autorización.</b>";  }//FIN DE VALIDACION DE NIVEL       
                            
                          
                           }//*FIN ROWCOUNT2 
                          
                          
                          
                          
                          }//FIN ROWCOUNT


                    
         
        
        
        
        else{ 

        while ($fila = $cd->fetch_assoc()) {  
          
          $id_saldo=$fila['id_saldo'];
          $fecha_ini=$fila['fecha_ini'];  
          $saldo_t=$fila['saldo_transferido'];
          $saldo_i=$fila['saldo_inicial'];
          $saldo_a=$fila['saldo_actual'];
          $trans=$fila['trans'];
          $retiro=$fila['retiro'];
        
        }

        $serve =  $_SERVER['REQUEST_URI'];
                $serve1 = $_SERVER['SERVER_NAME'];
                $arr = explode("/", $serve);
                $subd= $arr[1];
                $uri = $serve1."/".$subd;

                      ?>
                         
              <table align="center"  >
                           <tr>
               <th>Fecha Inicio</th>
               <th>Saldo Transferido</th>
               <th>Saldo Inicial</th>
               <th>Saldo Actual</th>
               <th>Tranferecia Bancaria</th>
               <th>Retiro Dinero</th>
               <th>Detalles</th>
               <th>Acciones</th>
               </tr>

               <tr align="center">
               <td><?=$fecha_ini?></td>
               <td>C$&nbsp;<?=number_format($saldo_t, 2, '.', '')?></td>
               <td>C$&nbsp;<?=number_format($saldo_i, 2, '.', '')?></td>
               <td>C$&nbsp;<?=number_format($saldo_a, 2, '.', '')?></td>
               <td><? echo "<a target='_blank' href='http://$uri/caja_".$_SESSION['base'].$_SESSION['year']."/transfer/".$trans."' >Ver</a>"?></td>
               <td><? echo "<a target='_blank' href='http://$uri/caja_".$_SESSION['base'].$_SESSION['year']."/comprobante/".$retiro."' >Ver</a>"?></td>

               <td><a  href="caja.descarga.php" target="_self">Mostrar</a></td>
               <td>
               
                <?

                if ($_SESSION['nivel']==1 || $_SESSION['nivel']==2 || $_SESSION['nivel']==6 ) {

                  $validate=0;
                  $rs2=$mysqli->query("SELECT comprobante, recibo FROM caja_gastos WHERE id_saldo='$id_saldo'");
                  $count_rs2=mysqli_num_rows($rs2);
                  
                  if ($count_rs2>=1) {
    
                          while ($fila2 = $rs2->fetch_assoc()) {  
                          
                            $compro=$fila2['comprobante'];
                            $rec=$fila2['recibo'];  
    
                            if ($compro=="") {
                              
                              $validate=1;
                              break;
    
                            } elseif ($rec=="") {
                              $validate=1;
                              break;
                            }else{ $validate=0;   }
                            
                          }
                    
                    } else {
    
                      $validate=1;
                      
                    }
    
                        
                   
                   
                   if ($validate==1) {
                     # code...
                   } else {
                     echo '<a class="fin" href="caja.sql.php?bandera=2&id='.$id_saldo.'" target="_self">Finalizar</a>';
                   }
                   
                   



                }else{   echo 'Sin Autorización.';      }//FIN DE IF DE NIVEL  
                
              
               
               ?>
  
               </td>
               </tr>

              </table>

  
                     <?
           }

         $mysqli->close();
      ?>
                  </div>
                      </div>


</div>


<!-- **************************

<!-- ******************************************************************************************************************* -->


</div>
<!-- END CONTENT -->


</div>

  <!-- /.content-wrapper -->
<?include("pie.php")?>

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









  <style type="text/css">
      
.zeroPadding {
  padding: 0 !important;
}
  </style>


<script type="text/javascript">
      
      $(document).ready(function(){
  $(".fancybox").fancybox({
        openEffect: "none",
        closeEffect: "none"
    });




    
    $(".zoom").hover(function(){
    
    $(this).addClass('transition');
  }, function(){
        
    $(this).removeClass('transition');
  });
});

    $(".rotate").fancybox({   
    width  : 600,
    height : 300,
    type   :'iframe'
});



    

</script>
<!-- SCRIPR DE AJAX PARA PASAR VARIABLES A LA MISMA PAGINA-->
<script type="text/javascript">
  function Hola(nombre,mensaje) {
     var parametros = {"Nombre":nombre,"Mensaje":mensaje};
        $.ajax({
            data:parametros,
            url:'ajax/procesoAjax.php',
            type: 'post',
            dataType: 'json',
            
            success: function (response) { 
                  
                $("#resultado").html(response);
                $("#resultado2").html(response);
            }

        });
        }
</script>
                         


 

<script src="js/seccion.js"></script>

     <script type="text/javascript">

    function pasarDatos2(id) {

    
      document.getElementById('id_orden').value= id;

       
        

        
        


       // document.getElementById('idPrecio').value=id;

          

    }

  </script>

<script type="text/javascript">
  function changeColor(newColor) {
   var elem = document.getElementById('para');
  
}
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


<script src="suministros.descargas.js"></script>

<!-- END PAGE LEVEL SCRIPTS -->
<script>
jQuery(document).ready(function() {    
   Metronic.init(); // init metronic core componets
   Layout.init(); // init layout
   QuickSidebar.init(); // init quick sidebar
   FormSamples.init();
   
        jQuery(".buttons").on("click", function(){ 
            jQuery("#page-content").hide(); 
            jQuery("#page-content").load(jQuery(this).attr("page"));
            jQuery('#page-content').fadeIn(1000);
            return false;
        });

});
</script>

<script src="reportes/assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="reportes/assets/global/plugins/jquery-migrate.min.js" type="text/javascript"></script>
<!-- IMPORTANT! Load jquery-ui.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
<script src="reportes/assets/global/plugins/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
<script src="reportes/assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="reportes/assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
<script src="reportes/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="reportes/assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="reportes/assets/global/plugins/jquery.cokie.min.js" type="text/javascript"></script>
<script src="reportes/assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<script src="reportes/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="reportes/assets/global/plugins/jqvmap/jqvmap/jquery.vmap.js" type="text/javascript"></script>
<script src="reportes/assets/global/plugins/flot/jquery.flot.min.js" type="text/javascript"></script>
<script src="reportes/assets/global/plugins/flot/jquery.flot.resize.min.js" type="text/javascript"></script>
<script src="reportes/assets/global/plugins/flot/jquery.flot.categories.min.js" type="text/javascript"></script>
<script src="reportes/assets/global/plugins/jquery.pulsate.min.js" type="text/javascript"></script>
<script src="reportes/assets/global/plugins/bootstrap-daterangepicker/moment.min.js" type="text/javascript"></script>
<script src="reportes/assets/global/plugins/bootstrap-daterangepicker/daterangepicker.js" type="text/javascript"></script>
<!-- IMPORTANT! fullcalendar depends on jquery-ui.min.js for drag & drop support -->

<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="reportes/assets/global/scripts/metronic.js" type="text/javascript"></script>
<script src="reportes/assets/admin/layout/scripts/layout.js" type="text/javascript"></script>
<script src="reportes/assets/admin/layout/scripts/quick-sidebar.js" type="text/javascript"></script>
<script src="reportes/assets/admin/layout/scripts/demo.js" type="text/javascript"></script>
<script src="reportes/assets/admin/pages/scripts/index.js" type="text/javascript"></script>
<script src="reportes/assets/admin/pages/scripts/tasks.js" type="text/javascript"></script>
<script src="reportes/assets/global/plugins/select2/select2.min.js"></script>
<script src="reportes/assets/admin/pages/scripts/form-samples.js"></script>

<!-- END PAGE LEVEL SCRIPTS -->
<script>
jQuery(document).ready(function() {    
   Metronic.init(); // init metronic core componets
   Layout.init(); // init layout
   QuickSidebar.init(); // init quick sidebar
   FormSamples.init();
   
        jQuery(".buttons").on("click", function(){ 
            jQuery("#page-content").hide(); 
            jQuery("#page-content").load(jQuery(this).attr("page"));
            jQuery('#page-content').fadeIn(1000);
            return false;
        });

});
</script>

</body>
</html>
