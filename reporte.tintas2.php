

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

  <link href="suministros/assets/global/css/components.css" id="style_components" rel="stylesheet" type="text/css"/>
<link href="suministros/assets/global/css/plugins.css" rel="stylesheet" type="text/css"/>
<link href="suministros/assets/admin/layout/css/layout.css" rel="stylesheet" type="text/css"/>

<link rel="stylesheet" type="text/css" href="suministros/assets/global/plugins/select2/select2.css"/>




  <!-- Theme style -->

  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <!-- Morris chart -->




  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>







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
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <? include('navbar.php');?>

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
                  
              

                                  <form id="form4" action="reporte.tintas2.php" class="form-horizontal form-bordered" method="POST">
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
