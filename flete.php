

<?php
session_start();
$id=$_SESSION['vsIdempresa'];
$base=$_SESSION['base'];
$anio='21';
$bd=$base.$anio;
$nombre=$_SESSION['vsNombre'];

    $base=$_SESSION['base'];
$anio=$_SESSION['year'];
$nivel=$_SESSION['nivel'];
$bd=$base.$anio;

$con = mysqli_connect('localhost','admin','AG784512',''.$bd.'');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,''.$bd.'');
   $cliente = mysqli_query($con,"select id_empresa, nombre from empresa ");
   $marca = mysqli_query($con,"select id_marca, marca from pop_marca ");
?>
   
   

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Color Digital | 20<?php echo $anio;?></title>
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


  
      <?php
if (trim($pruebaget) == false) {?>


 
   <?php  
}
else{?>
 <script type="text/javascript">
 $(function(){
  $("#anuncio").modal();
 });
</script>



<?php }

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
   <?php include ('navbar.php');?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index.php" class="brand-link">
      <?php if($nivel!=50){?><img src="images/logo_color.png" alt="COLOR DIGITAL" 
           style="opacity: .8;margin-left:10%" width="150"><?php }?>
      <span class="brand-text font-weight-light"></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <?php if ($base=="esa") { ?>
          <div class="image">
             <img src="images/esa1.png" class="img-circle elevation-2" alt="User Image">
          </div>
        <?php }if($base=="nica"){ ?>
          <div class="image">
             <img src="images/nica1.png" class="img-circle elevation-2" alt="User Image">
          </div>
        <?php }?>
        <div class="info">
          <a href="#" class="d-block"><?phpecho $nombre;?></a><a  class="d-block"> online <i class="fas fa-signal" style="color: #2EFE2E"></i></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
         <?php include("menu4.php");?>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <div class="content-wrapper">

     <div class="container col-xs-12 col-md-12 col-lg-12 col-xl-12" style="margin-left: 10px; margin-top: -50px;">
       
     
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
            <h2><b>Calculo de Flete</b></h2>
          </div>
          
          
                </div>
            </div>
      <div class='col-sm-4 pull-right'>
  
                </div>
      </div>
      <div class='clearfix'></div>
      <?php include('form_flete.php');?>
      <hr>

      <div id="loader"></div><!-- Carga de datos ajax aqui -->
      <div id="resultados"></div><!-- Carga de datos ajax aqui -->
      <div class='outer_div'></div><!-- Carga de datos ajax aqui -->
            </div>
      
        </div>
    </div>

  </div>




  <?php include("html/modal_add2.php");?>
  <!-- Edit Modal HTML -->
  <?php include("html/modal_edit.php");?>
  <!-- Delete Modal HTML -->
  <?php include("html/modal_delete.php");?>
  <script src="js/script_flete.js"></script>









     
      </div>    
  </div>

  <!-- /.content-wrapper -->
  <br><br><br>
<?php include("pie.php")?>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->












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

<script src="ajax2/ajax.js" type="text/javascript"></script>

</body>
</html>
