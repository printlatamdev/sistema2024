

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
  <title>Color Di</title>
  
  
 

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
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <!-- Morris chart -->




  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>

<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>
<link href="suministros/assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
<link href="suministros/assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css"/>
<link href="suministros/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link href="suministros/assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
<link href="suministros/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css"/>
<!-- END GLOBAL MANDATORY STYLES -->
<!-- BEGIN PAGE LEVEL STYLES -->
<link rel="stylesheet" type="text/css" href="suministros/assets/global/plugins/datatables/extensions/Scroller/css/dataTables.scroller.min.css"/>
<link rel="stylesheet" type="text/css" href="suministros/assets/global/plugins/datatables/extensions/ColReorder/css/dataTables.colReorder.min.css"/>
<link rel="stylesheet" type="text/css" href="suministros/assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css"/>


<link href="suministros/assets/admin/pages/css/tasks.css" rel="stylesheet" type="text/css"/>
<!-- END PAGE STYLES -->
<!-- BEGIN THEME STYLES -->
<link href="suministros/assets/global/css/components.css" id="style_components" rel="stylesheet" type="text/css"/>
<link href="suministros/assets/global/css/plugins.css" rel="stylesheet" type="text/css"/>
<link href="suministros/assets/admin/layout/css/layout.css" rel="stylesheet" type="text/css"/>
<link href="suministros/assets/admin/layout/css/themes/darkblue.css" rel="stylesheet" type="text/css" id="style_color"/>
<link href="suministros/assets/admin/layout/css/custom.css" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" type="text/css" href="suministros/assets/global/plugins/select2/select2.css"/>

<link rel="stylesheet" href="uikit/css/uikit.min.css" />
<link rel="stylesheet" href="uikit/css/components/datepicker.min.css" />
<link rel="stylesheet" href="uikit/css/components/autocomplete.min.css" />





<!------ Include the above in your HEAD tag ---------->

 <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fancybox/3.2.1/jquery.fancybox.min.css" media="screen">

        <link rel="stylesheet" href="css/custom.css">


<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">


</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="#" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>C</b>D</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>COLOR</b>DIGITAL</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">BIENVENIDO </span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          
                  <!-- end message -->
                  
          <!-- Notifications: style can be found in dropdown.less -->
        
          <!-- Tasks: style can be found in dropdown.less -->
         
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="imagenes/persona.png" class="user-image" alt="User Image">
              <span class="hidden-xs"> <? echo $nombre;?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="imagenes/persona.png" class="img-circle" alt="User Image">

                <p>
                
                  <small>Uso exclusivo Color Digital 20<?echo $anio;?> <br> <? echo $nombre.$id;?></small>
                </p>
              </li>
              <!-- Menu Body -->
              
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Perfil</a>
                </div>
                <div class="pull-right">
                  <a href="salir.php" class="btn btn-default btn-flat">Cerrar Sesion</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <? include ('aside.php');?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="" >

     <div class="container" >
        <div class="table-wrapper" >
         
        

            
     


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
            











<style>

    
.fin{

     color:green;
     


}

table {
    
  
  border-spacing: 15px;
    border-collapse: separate;
  
}

td {
    
    color:blue;
  font-weight: bold;
    
  
}


input[type="file"] {
    display: none;
}


.custom-file-upload {
    border: 1px solid #ccc;
    display: inline-block;
    padding: 3px 6px;
    cursor: pointer;
}





#cliente_color, #contacto_color, #orden_color {
    
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


#detalle_color{


  width: 400px;
}








/* ********************************************** */

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

#qwd3 {

    /*height: 60px;*/
   /* border-bottom: thin solid #000000;  */ 
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


/* ************************************* */



</style>















      
        </div>
    </div>

  </div>
<script>
jQuery(document).ready(function() {  

 


   Metronic.init(); // init metronic core componets
   Layout.init(); // init layout
   QuickSidebar.init(); // init quick sidebar
   FormSamples.init();
   ComponentsPickers.init();


    jQuery( "#ok" ).hide();
    jQuery('#arte').bind('change', function() {

    if (this.files[0].size>1048576) { 

      alert("La imagen que intenta subir excede el tamaño permitido.");
      jQuery( "#ok" ).hide();

    }else{ jQuery( "#ok" ).show(); }

    });


   jQuery( "#ok2" ).hide();
    jQuery('#arte2').bind('change', function() {

    if (this.files[0].size>1048576) { 

      alert("La imagen que intenta subir excede el tamaño permitido.");
      jQuery( "#ok2" ).hide();

    }else{ jQuery( "#ok2" ).show(); }

    });



        



   


});
</script>


<script src="suministros/assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="suministros/assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="suministros/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="suministros/assets/global/scripts/metronic.js" type="text/javascript"></script>
<script src="suministros/assets/admin/layout/scripts/layout.js" type="text/javascript"></script>
<script src="suministros/assets/admin/layout/scripts/quick-sidebar.js" type="text/javascript"></script>
<script src="suministros/assets/global/plugins/select2/select2.min.js"></script>
<script src="suministros/assets/admin/pages/scripts/form-samples.js"></script>
<script type="text/javascript" src="suministros/assets/global/plugins/datatables/media/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="suministros/assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js"></script>
<script type="text/javascript" src="suministros/assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="suministros/assets/global/plugins/bootstrap-daterangepicker/moment.min.js"></script>
<script type="text/javascript" src="suministros/assets/global/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>
<script type="text/javascript" src="suministros/assets/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
<script src="suministros/assets/admin/pages/scripts/components-pickers.js"></script>



<script src="uikit/js/uikit.min.js"></script>
<script src="uikit/js/components/datepicker.min.js"></script>
<script src="uikit/js/components/autocomplete.min.js"></script>
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




</body>
</html>
