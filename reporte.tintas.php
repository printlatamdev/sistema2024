

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
  <title>Mi envio| Color Digital</title>
  
  
 

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
  <div class="content-wrapper">

     <div class="container">
        <div class="table-wrapper">



           <div class="portlet box blue-hoki">
            <div class="portlet-title">
              <div class="caption">
                <i class="fa fa-gift"></i>Reporte de Rendimiento de Tintas
              </div>
              <div class="tools">
                
              </div>
            </div>
            <div class="portlet-body form">
              <!-- BEGIN FORM-->
              
                <div class="form-body">
                  
              

                                  <form id="form4" action="reporte.tintas.php" class="form-horizontal form-bordered" method="POST">
                  <div class="form-group">
                    <label class="control-label col-md-1"><strong></strong></label>
                    <div class="col-md-4">
                      <div class="input-group input-large " >
                          <span class="input-group-addon">De:</span>
                        <input type="text" class="form-control" name="from" data-uk-datepicker="{format:'DD-MM-YYYY', i18n:{ months:['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre',  ] } }">
                        <span class="input-group-addon">Hasta:</span>
                        <input type="text" class="form-control" name="to" data-uk-datepicker="{format:'DD-MM-YYYY', i18n:{ months:['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre',  ] } }">
                        <input type="hidden" name="t" value="4">
                      </div>
                      <!-- /input-group -->
                      <span class="help-block">
                      Rango de Fechas </span>



                                                          <label class="control-label"><strong>Tinta:</strong></label>
                                          <div class="input">
                                            
                                                <select id="tinta" name="tinta" class="select2_category form-control"  tabindex="1">
                                                <option value="0">Seleccione Tinta</option>
                                                    <?php

                                                        include("connectin.php");
                                                        
                                                        $rs=$mysqli->query("SELECT DISTINCT tipo from tinta");

                                                           while ($fila = $rs->fetch_row()) { echo '<option value="'.$fila[0].'">'.$fila[0].'</option>';  }

                                                        $mysqli->close();

                                                                                    ?>    
                                                  </select>
                                        </div>



                                         <label class="control-label"><strong>Equipo:</strong></label>
                                          <div class="input">
                                            
                                                <select id="equipo" name="equipo" class="select2_category form-control"  tabindex="1">
                                                    <?php

                                                    if (isset($_REQUEST["actu"])) { echo '<option selected value="'.$id_equipo.'">'.$equipo.'</option>'; }

                                                        include("connectin.php");
                                                        
                                                        echo'<option value="0">Ninguno</option>';

                                                        $rs=$mysqli->query("SELECT * FROM equipo WHERE  estado='1'");

                                                           while ($fila = $rs->fetch_row()) { echo '<option value="'.$fila[0].'">'.$fila[1].'</option>';  }

                                                        $mysqli->close();

                                                                                    ?>    
                                                  </select>
                                        </div>





                    </div>
                                        <div class="col-md-2">
                    <button  type="submit" class="btn blue"><b>Buscar</b></button>
                    </div>


                  </div>

                  </form>


                  




                  
                </div>
              


              

              <!-- END FORM-->
            </div>
          </div>
          <!-- END PORTLET-->
        </div>
      </div>





<!-- ------------CONTENIDO-----------------------------------------------------------------------------------------------  -->

        

                         <?                 
                                   include ('connectin.php');


                                   if (isset($_REQUEST['tinta'])) {

                                        $tinta=$_REQUEST['tinta'];
                                        $equipo=$_REQUEST['equipo'];
                                                                            $from=date('Y-m-d', strtotime($_REQUEST['from'])).' 00:00:00';
                                        $to=date('Y-m-d', strtotime($_REQUEST['to'])).' 23:59:59';

                                        $rs_e=$mysqli->query("SELECT nombre FROM equipo WHERE id_equipo='".$equipo."'");
                                                                             while ($fila_e = $rs_e->fetch_row()) {  $eq = $fila_e[0]; }

                                        //******* Para Sacar Metros Impresos *****//
                                       $sqlt="SELECT (od.cantidad*(od.base*od.altura)) as total, od.id_orden, od.empresa, od.material, od.equipo, od.trabajo, od.cantidad, od.base, od.altura  from orden_detalle as od, orden as o  WHERE   od.id_orden=o.id_orden AND od.estado<>'ANULADA' AND od.trabajo<>'CORTE DE POLIESTIRENO' AND od.trabajo<>'TOLDO' AND od.trabajo<>'CORTE' AND od.id_equipo='".$_REQUEST['equipo']."' AND o.fecha_orden>='".date('Y-m-d', strtotime($_REQUEST['from']))."' AND  o.fecha_orden<= '".date('Y-m-d', strtotime($_REQUEST['to']))."'";
                                        $totals=0;
                                        $rst=$mysqli->query($sqlt);
                                        while($rowt=$rst->fetch_assoc()){ $totals=$rowt['total'] + $totals;}

                                        //**************************************************************************************************************************

                                         echo '<label class="control-label"><strong>Reporte de Rendimineto Desde: <font color="red">'.$_REQUEST['from'].'</font> Hasta: <font color="red">'.$_REQUEST['to'].'</font> <br>Equipo: <font color="red">'.$eq.'</font><br>Tinta: <font color="red">'.$_REQUEST['tinta'].'</font></strong></label><br>';

                                         echo "<b>Total de Metros Impresos: &nbsp; <font size='3px' color='red'>".number_format($totals, 2, '.', ',')."</font> Metros²</b><br>";

                                         $strg="<br><table border='1' style='width:50%'>";


                                        $rs1=$mysqli->query("SELECT DISTINCT `color` FROM `tinta` WHERE `tipo`='$tinta'"); 

                                        $tls=0;


                                        while($row1=$rs1->fetch_assoc()){  


                                           // $rs2=$mysqli->query("SELECT * from tinta where color='".$row1['color']."' and estado='Finalizada' and equipo='$eq' and fecha_uso>='$from' and fecha_uso<='$to'"); 
                                                                              /*
                                          echo "SELECT * from tinta where tipo='".$tinta."' and color='".$row1['color']."' and estado='Finalizada' and equipo='$eq' and (fecha_uso BETWEEN '$from' AND '$to')";

                                          echo"<br>";

                                          */

                                           $rs2=$mysqli->query("SELECT * from tinta where tipo='".$tinta."' and color='".$row1['color']."' and estado='Finalizada' and equipo='$eq' and (fecha_uso BETWEEN '$from' AND '$to')"); 


                                            $rowcount=mysqli_num_rows($rs2); 

                                          $tls=$tls + $rowcount;
                                          if ($tinta=='VUTEK QSR Galon 5') {
                                          $rowcount=$rowcount*5;
                                         }

                                             while($row2=$rs2->fetch_assoc()){ $str_codigo.=$row2['codigo']."<br>";  }


                                            $strg.="<th valign='top'><center>".strtoupper($row1['color'])."=<font color='blue'>".$rowcount."</font> Lts.</center><br>".$str_codigo."</th>";

                                            $str_codigo="";


                                         }

                                       $strg.="</table>";
                                       
                                       if ($tinta=='VUTEK QSR Galon 5') {
                                        $tls=$tls*5;
                                       }
                                       

                                          echo "<b>Total de Litros: &nbsp; <font size='3px' color='red'>".$tls." </font>Lts.</b><br>";

                                          $ren=$totals/$tls;

                                          echo "<b>Rendimiento: ".$totals." Metros² / ".$tls." Lts. = <font size='3px' color='red'>".number_format($ren, 2, '.', ',')."</font></b><br>";

                                          echo $strg;



                                        $mysqli->close();

        
                                       
                                           
                                  
                                   } else {

                                   

                                    
                                   }
                                   
                                  
                                    
                        ?>
                                    
                         <br><br><br><br>           
  


<!-- ------------FIN DE CONTENIDO-----------------------------------------------------------------------------------------------  -->


</div>
</div>
</div>
<!-- END CONTENT -->



</div>
<!-- END CONTAINER -->












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
<script src="suministros/assets/admin/pages/scripts/components-pickers.js"></script>


<script src="uikit/js/uikit.min.js"></script>
<script src="uikit/js/components/datepicker.min.js"></script>
<script src="uikit/js/components/autocomplete.min.js"></script>






<script>



var TableManaged = function () {




//*****************************************************************************************************************************
    var initTable1 = function () {



        var table = $('#sample_1');



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

            "scrollY": "400",
            "deferRender": true,
            "order": [
                [0, 'desc']
            ],
            "paging": false           
        });


        var tableWrapper = $('#sample_5_wrapper'); // datatable creates the table wrapper by adding with id {your_table_jd}_wrapper
        tableWrapper.find('.dataTables_length select').select2(); // initialize select2 dropdown
    }


//*****************************************************************************************************************************


   

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


//*************************************************************************************************************************************






 jQuery(document).ready(function() {    
   TableManaged.init();
   FormSamples.init();
   Metronic.init(); // init metronic core componets
   Layout.init(); // init layout
   QuickSidebar.init(); // init quick sidebar
   ComponentsPickers.init()
   
        jQuery(".buttons").on("click", function(){ 
            jQuery("#page-content").hide(); 
            jQuery("#page-content").load(jQuery(this).attr("page"));
            jQuery('#page-content').fadeIn(1000);
            return false;
        });

});
</script>











           </div></div></div></div>



  <?php include("html/modal_add.php");?>
  <!-- Edit Modal HTML -->
  <?php include("html/modal_edit.php");?>
  <!-- Delete Modal HTML -->
  <?php include("html/modal_delete.php");?>
  <script src="script.js"></script>


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
