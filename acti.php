
<?
session_start();
if(!isset($_SESSION['vsClave']))
{
  header("location:login.php");
}

$id=$_SESSION['vsIdempresa'];
$base=$_SESSION['base'];
$anio=$_SESSION['year'];
$bd=$base.$anio;
$nombre=$_SESSION['vsNombre'];
$nivel=$_SESSION['nivel'];

   error_reporting(-1);
require_once("config.inc.php");



   
?>




<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>COLOR DIGITAL</title>
  <!-- Tell the browser to be responsive to screen width -->
 


<!-- ESTEEEEEEEEEEEEE ESSSSSSSSSSSSSSSSSSSSSSS -->
<!-- ESTEEE -->
  <!-- Tell the browser to be responsive to screen width -->
>

  
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




<!------ *********************************** CALENDARIO ******************************************-->

    <script src="http://code.jquery.com/jquery-1.9.0.min.js"></script>
    <link type="text/css" rel="stylesheet" media="all" href="estilos.css" />
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <script type="text/javascript">
    function generar_calendario(mes,anio)
    {
      var agenda=$("#agenda");
      agenda.html("<img src='actividades/images/loading.gif'>");
      $.ajax({
        type: "GET",
        url: "ajax_calendario.php",
        cache: false,
        data: { mes:mes,anio:anio,accion:"generar_calendario" }
      }).done(function( respuesta ) 
      {
        agenda.html(respuesta);
        $('a.modal').bind("click",function(e) 
        {
          e.preventDefault();
          var id = $(this).data('evento');
          var fecha = $(this).attr('rel');
          if (fecha!="") 
          {
            $("#evento_fecha").val(fecha);
            $("#que_dia").html(fecha);
          }
          var maskHeight = $(document).height();
          var maskWidth = $(window).width();
        
          $('#mask').css({'width':maskWidth,'height':maskHeight});
          
          $('#mask').fadeIn(1000);
          $('#mask').fadeTo("slow",0.8);  
        
          var winH = $(window).height();
          var winW = $(window).width();
              
          $(id).css('top',  winH/2-$(id).height()/2);
          $(id).css('left', winW/2-$(id).width()/2);
        
          $(id).fadeIn(200); 
        
        });
    
        $('.close').bind("click",function (e) 
        {
          var fecha=$(this).attr("rel");
          var nueva_fecha=fecha.split("-");
          e.preventDefault();
          $('#mask').hide();
          $('.window').hide();
          generar_calendario(nueva_fecha[1],nueva_fecha[0]);
        });
    
        //guardar evento
        $('.enviar').bind("click",function (e) 
        {
          e.preventDefault();
          $("#respuesta_form").html("<img src='actividades/images/loading.gif'>");
          var evento=$("#evento_titulo").val();
          var fecha=$("#evento_fecha").val();
          var orden=$("#evento_orden").val();

          $.ajax({
            type: "GET",
            url: "ajax_calendario.php",
            cache: false,
            data: { evento:evento,fecha:fecha,orden:orden,accion:"guardar_evento" }
          }).done(function( respuesta2 ) 
          {
            $("#respuesta_form").html(respuesta2);
            var evento=$("#evento_titulo").val("");
          });
        });
        
        //eliminar evento
        $('.eliminar_evento').bind("click",function (e) 
        {
          e.preventDefault();
          var current_p=$(this);
          $(".respuesta").html("<img src='actividades/images/loading.gif'>");
          var id=$(this).attr("rel");
          $.ajax({
            type: "GET",
            url: "ajax_calendario.php",
            cache: false,
            data: { id:id,accion:"borrar_evento" }
          }).done(function( respuesta2 ) 
          {
            $(".respuesta").html(respuesta2);
            current_p.parent("p").fadeOut();
          });
        });
        
        $(".anterior,.siguiente").bind("click",function(e)
        {
          e.preventDefault();
          var datos=$(this).attr("rel");
          var nueva_fecha=datos.split("-");
          generar_calendario(nueva_fecha[1],nueva_fecha[0]);
        })

        $(window).resize(function () 
        {
          var box = $('#boxes .window');
          var maskHeight = $(document).height();
          var maskWidth = $(window).width();
          $('#mask').css({'width':maskWidth,'height':maskHeight});
          var winH = $(window).height();
          var winW = $(window).width();
          box.css('top',  winH/2 - box.height()/5);
          box.css('left', winW/2 - box.width()/2);
        });
      });
    }
    $(document).ready(function()
    {
      /* GENERAMOS CALENDARIO CON FECHA DE HOY */
      generar_calendario("<?php if (isset($_GET["mes"])) echo $_GET["mes"]; ?>","<?php if (isset($_GET["anio"])) echo $_GET["anio"]; ?>");
      
      setTimeout(function() {$('#mensaje').fadeOut('fast');}, 3000);
    });
    </script>


<!------- ********************************* FIN CALENDARIO ************************************* -->



<!------ Include the above in your HEAD tag ---------->


  
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->






<style>






/*---------------------------------*/







/*------------------------------------------*/



  /*------------------------------------------*/


</style> 



</head>
>

  <!-- Content Wrapper. Contains page content -->
 
<div id="agenda" style="margin-top: 120px;"></div>
  <div id="mask"></div>
  
  <!-- ESTO NO TE HACE FALTA! -->
  <script type="text/javascript">
  var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
  document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
  </script>
  <script type="text/javascript">
  try {
  var pageTracker = _gat._getTracker("UA-266167-20");
  pageTracker._setDomainName(".martiniglesias.eu");
  pageTracker._trackPageview();
  } catch(err) {}</script>
</body>
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
       
            <!-- Custom tabs (Charts with tabs)-->
            
              
             
            <!-- /.card -->

            <!-- DIRECT CHAT -->
            
              <!-- /.card-header -->
              <div class="card-body">
                <!-- Conversations are loaded here -->
                <div class="direct-chat-messages">
                  <!-- Message. Default to the left -->
                 
                  <!-- /.direct-chat-msg -->

                  <!-- Message to the right -->
              
              <!-- /.card-body -->
             
              <!-- /.card-body-->
           
                
            <!-- /.card -->

            <!-- solid sales graph -->
           
            <!-- /.card -->

            <!-- Calendar -->
            <div class="card bg-gradient-success">
           
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?include("pie.php");?>

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


</body>
</html>
