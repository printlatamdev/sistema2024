<?php require("db/session.php"); ?>
<?php  require('assets/header.php'); ?>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
    <?php include ('navbar.php');?>
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
          <a href="#" class="d-block"><?php echo $nombre;?></a><a  class="d-block"> online <i class="fas fa-signal" style="color: #2EFE2E"></i></a>
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

     <div class="container col-xs-12 col-md-12 col-lg-12 col-xl-12" style="margin-left: 10px; margin-top: -40px;">
       
   
<br><br><br>

<!-- //////////////////////////////////////////////////////////////////////////////////////////////-->
   <section class="content">
      <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
          
          <?php if ($base=="nica" && $nivel==3) {
            # code...
          }else{?>
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-fill-drip"></i></span>
              <a href="suministros.ingreso.nuevo.tinta2.php">
              <div class="info-box-content">
               <h5> <span class="info-box-text">CREAR TINTA</span></h5>
                <span class="info-box-number">
                  
                  <small></small>
                </span>
              </div></a>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-pencil-ruler"></i></span>
            <a href="suministros.ingreso.nuevo2.php">
              <div class="info-box-content">
                <span class="info-box-text">CREAR MATERIAL</span>
                <span class="info-box-number"></span>
              </div>
              <!-- /.info-box-content -->
            </div></a>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-calendar-check"></i></span>
                <a href="suministros.ingreso.bodega2.php">
                  <div class="info-box-content">
                    <span class="info-box-text">INGRESAR MATERIAL</span>
                    <span class="info-box-number"></span>
                  </div>
              <!-- /.info-box-content -->
            </div></a>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
             <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-bookmark"></i></span>
                        <a href="suministros.precio2.php"> 

              <div class="info-box-content">
                <span class="info-box-text">PRECIOS MATERIAL</span>
                <span class="info-box-number"></span>
              </div>
              <!-- /.info-box-content -->
            </div></a>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>
</a>
    

</div><?php }?>

<!-- ******************************************************************************************************-->

<?php if($base=="esa"){?>

<?php }else{?>

<?php }?>
      <div class="container-fluid">
        <!-- Info boxes -->

        <?php if($base=="esa"){?>
           <div class="row">
            <div class="col-12 col-sm-6 col-md-3">
              <div class="info-box">
                <span class="info-box-icon bg-info elevation-1"><i class="fas fa-archive"></i></span>
                <a href="suministros.salidas33.php">
                  <div class="info-box-content">
                    <h5> <span class="info-box-text">DESCARGA <br>MATERIAL</span></h5>
                      <span class="info-box-number">
                        <small></small>
                      </span>
                  </div>
                </a>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            <!-- /.col -->
        <?php }else{?>
           <div class="row">
            <div class="col-12 col-sm-6 col-md-3">
              <div class="info-box">
                <span class="info-box-icon bg-info elevation-1"><i class="fas fa-archive"></i></span>
                <a href="suministros.salidas2.php">
                  <div class="info-box-content">
                    <h5> <span class="info-box-text">DESCARGA <br>MATERIAL</span></h5>
                      <span class="info-box-number">
                        <small></small>
                      </span>
                  </div>
                </a>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            <!-- /.col -->
        <?php }?>
        


          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-calendar-check"></i></span>
       <a href="suministros.ingreso.bodega2.php">
              <div class="info-box-content">
                <span class="info-box-text">INGRESAR MATERIAL</span>
                <span class="info-box-number"></span>
              </div>
              <!-- /.info-box-content -->
            </div></a>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <?php if($base=="esa"){?>
              <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                  <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-cut"></i></span>
                <a href="suministros.descargas.bitacora_new4.php">
                  <div class="info-box-content">
                    <span class="info-box-text">BIT. DESCARGA NUEVO</span>
                    <span class="info-box-number"></span>
                  </div>
                  <!-- /.info-box-content -->
                </div></a>
                <!-- /.info-box -->
              </div>
              <!-- /.col -->
              <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                  <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-cut"></i></span>
                <a href="suministros.descargas.bitacora4.php">
                  <div class="info-box-content">
                    <span class="info-box-text">BIT. DESCARGA ANTIGUO</span>
                    <span class="info-box-number"></span>
                  </div>
                  <!-- /.info-box-content -->
                </div></a>
                <!-- /.info-box -->
              </div>
              <!-- /.col -->
          <?php }else{?> 
             <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                  <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-cut"></i></span>
                <a href="suministros.descargas.bitacora2.php">
                  <div class="info-box-content">
                    <span class="info-box-text">BITACORA DESCARGA</span>
                    <span class="info-box-number"></span>
                  </div>
                  <!-- /.info-box-content -->
                </div></a>
                <!-- /.info-box -->
              </div>
              <!-- /.col -->
          <?php }?>
          

          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-spray-can"></i></span>
       <a href="suministros.descarga.tintas2.php">
              <div class="info-box-content">
                <span class="info-box-text">FINALIZAR TINTA</span>
                <span class="info-box-number"></span>
              </div>
              <!-- /.info-box-content -->
            </div></a>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->



</div>
<!-- END CONTENT -->


</div>







</div></div></div></div>

     
      </div>    
  </div>

  <!-- /.content-wrapper -->
<?php include("pie.php")?>

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




</body>
</html>
