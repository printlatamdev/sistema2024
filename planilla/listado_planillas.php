<?

include "html/conexion.php";
$sql13= "select*from periodo";
$query5 = $con->query($sql13);

$sql131= "select*from periodo";
$query51 = $con->query($sql131);
$tipo= "select*from tipo_planilla";
$tipo_planilla = $con->query($tipo);




if (isset($_REQUEST['mes']) == false){

    $mes=0;
}else{
    $mes=$_REQUEST['mes'];
}
if (isset($_REQUEST['periodo']) == false) {
    $periodo=0;
   
}
else{
    $periodo=$_REQUEST['periodo'];
}
if (isset($_REQUEST['tipo']) == false) {
   $tipo=0;
}
else{
    $tipo=$_REQUEST['tipo'];
}


 
   



?>

<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Sistema Planilla CD</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">

    <!-- FooTable -->
    <link href="css/plugins/footable/footable.core.css" rel="stylesheet">

    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

    <link href="css/plugins/datapicker/datepicker3.css" rel="stylesheet">

        <script src="js/jquery.min.js"></script>
        

</head>

<body>

    <div id="wrapper">
     <?include("menu.php");?>

        <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom">
        <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
            <form role="search" class="navbar-form-custom" action="search_results.html">
                <div class="form-group">
                    <input type="text" placeholder="Search for something..." class="form-control" name="top-search" id="top-search">
                </div>
            </form>
        </div>
            <ul class="nav navbar-top-links navbar-right">
                <li>
                    <span class="m-r-sm text-muted welcome-message">Bienvenido al sistema de planilla</span>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                        <i class="fa fa-envelope"></i>  <span class="label label-warning">16</span>
                    </a>
                    <ul class="dropdown-menu dropdown-messages">
                        <li>
                            <div class="dropdown-messages-box">
                                <a class="dropdown-item float-left" href="profile.html">
                                    <img alt="image" class="rounded-circle" src="img/a7.jpg">
                                </a>
                                <div class="media-body">
                                    <small class="float-right">46h ago</small>
                                    <strong>Mike Loreipsum</strong> started following <strong>Monica Smith</strong>. <br>
                                    <small class="text-muted">3 days ago at 7:58 pm - 10.06.2014</small>
                                </div>
                            </div>
                        </li>
                        <li class="dropdown-divider"></li>
                        <li>
                            <div class="dropdown-messages-box">
                                <a class="dropdown-item float-left" href="profile.html">
                                    <img alt="image" class="rounded-circle" src="img/a4.jpg">
                                </a>
                                <div class="media-body ">
                                    <small class="float-right text-navy">5h ago</small>
                                    <strong>Chris Johnatan Overtunk</strong> started following <strong>Monica Smith</strong>. <br>
                                    <small class="text-muted">Yesterday 1:21 pm - 11.06.2014</small>
                                </div>
                            </div>
                        </li>
                        <li class="dropdown-divider"></li>
                        <li>
                            <div class="dropdown-messages-box">
                                <a class="dropdown-item float-left" href="profile.html">
                                    <img alt="image" class="rounded-circle" src="img/profile.jpg">
                                </a>
                                <div class="media-body ">
                                    <small class="float-right">23h ago</small>
                                    <strong>Monica Smith</strong> love <strong>Kim Smith</strong>. <br>
                                    <small class="text-muted">2 days ago at 2:30 am - 11.06.2014</small>
                                </div>
                            </div>
                        </li>
                        <li class="dropdown-divider"></li>
                        <li>
                            <div class="text-center link-block">
                                <a href="mailbox.html" class="dropdown-item">
                                    <i class="fa fa-envelope"></i> <strong>Read All Messages</strong>
                                </a>
                            </div>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                        <i class="fa fa-bell"></i>  <span class="label label-primary">8</span>
                    </a>
                    <ul class="dropdown-menu dropdown-alerts">
                        <li>
                            <a href="mailbox.html" class="dropdown-item">
                                <div>
                                    <i class="fa fa-envelope fa-fw"></i> You have 16 messages
                                    <span class="float-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="dropdown-divider"></li>
                        <li>
                            <a href="profile.html" class="dropdown-item">
                                <div>
                                    <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                                    <span class="float-right text-muted small">12 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="dropdown-divider"></li>
                        <li>
                            <a href="grid_options.html" class="dropdown-item">
                                <div>
                                    <i class="fa fa-upload fa-fw"></i> Server Rebooted
                                    <span class="float-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="dropdown-divider"></li>
                        <li>
                            <div class="text-center link-block">
                                <a href="notifications.html" class="dropdown-item">
                                    <strong>See All Alerts</strong>
                                    <i class="fa fa-angle-right"></i>
                                </a>
                            </div>
                        </li>
                    </ul>
                </li>


                <li>
                    <a href="login.html">
                        <i class="fa fa-sign-out"></i> Log out
                    </a>
                </li>
            </ul>

        </nav>
        </div>
      




<form action="listado_planillas.php" method="POST">


<div class="row">
  
        <div class="col-lg-3">

          <select name="mes" id="mes"   class="selectpicker form-control" data-live-search="true">
                      <option value="" >SELECCIONE MES</option>
                    <? while ($filam = mysqli_fetch_array($query5))
                                           {
                                                   ?>
                                  <option value="<? echo $filam[0];?>" > <? echo $filam[2];?></option>
                                          
                                                 

                                                  <?}?>
                                                 

                                                 

                  </select>



        </div>

        <div class="col-lg-3">

          <select name="periodo" id="periodo"   class="selectpicker form-control" data-live-search="true">
                      <option value="" >SELECCIONE PERIODO</option>
                    <? while ($filamP = mysqli_fetch_array($query51))
                                           {
                                                   ?>
                                  <option value="<? echo $filamP[3];?>" > <? echo $filamP[4];?></option>
                                          
                                                 

                                                  <?}?>
                                                 

                                                 

                  </select>



        </div>
        <div class="col-lg-3">

          <select name="tipo" id="tipo"   class="selectpicker form-control" data-live-search="true" onchange="form.submit()">
                      <option value="" >SELECCIONE TIPO PLANILLA</option>
                    <? while ($filamt = mysqli_fetch_array($tipo_planilla))
                                           {
                                                   ?>
                                  <option value="<? echo $filamt[0];?>" > <? echo $filamt[1];?></option>
                                          
                                                 

                                                  <?}?>
                                                 

                                                 

                  </select>



        </div>
    
</div>





</form>

<?
 echo $mes.$periodo.$tipo;

?>

            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox">




          </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox">
                        <div class="table responsive">

                         
<?php


$user_id=null;
$sql1= "select a.id_planilla, a.id_tipo_planilla,a.id_empleado,a.id_periodo,a.otros_descuentos,a.bonificacion,a.dias_trabajados, a.isss,a.afp,a.renta, a.total_descuento, a.total_bonificacion,a.total_pagar, a.fecha, a.estado, b.id_empleado, b.id_tipo_planilla, b.codigo_marcacion, b.nombre, b.apellido, b.sueldo,c.id_periodo,c.nombre_mes,c.quincena,c.n_quincena from planilla a INNER JOIN empleados b on a.id_empleado=b.id_empleado INNER JOIN periodo c on a.id_periodo=c.id_periodo where a.id_periodo='".$mes."' and c.quincena='".$periodo."' and b.id_tipo_planilla='".$tipo."' ";
$query = $con->query($sql1);
     if($query->num_rows>0) {

    $tiempo= "select*from periodo where id_periodo='".$mes."'";
$tempo2 = $con->query($tiempo);
$n=1;

while ($ri=$query->fetch_array()):
 
  $nombre_mes=$ri["nombre_mes"];
  $n_quincena=$ri["n_quincena"];

    endwhile;
}


?>




<? if($mes==0 || $periodo==0 || $tipo==0){?>

<p class="alert alert-danger">SELECCIONE PERIODO Y TIPO DE PLANILLA QUE DESEA VER</p>

<?}else{






    ?>






<p class="alert alert-success">PLANILLA DEL MES DE <b> <?echo $nombre_mes ?></b> CORRESPONDIENTE A LA <b><?echo $n_quincena ?></b></p>




            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox">
                        <div class="ibox-content">

                           <table class="footable table table-stripped toggle-arrow-tiny" data-page-size="16">
                                <thead>
                                <tr>

                                    <th  align="center">ID</th>
                                    <th  align="center" >Nombre</th>
                                    <th  align="center">Apellido</th>
                                    <th  align="center">Salario/M </th>
                                    
                                    
                                    <th  align="center">Salario/D</th>
                                    <th  align="center">Dias trabajados</th>
                                    <th  align="center" >Pago neto</th>
                                  
                                     <th align="center" >ISSS</th>
                                     <th align="center" >AFP</th>
                                     <th align="center" >RENTA</th>

                                     <th align="center" >OTROS DESCUENTOS</th>
                                     <th align="center" >TOTAL DESCUENTOS</th>
                                     <th align="center" >BONIFICACION</th>
                                       <th align="center" >TOTAL A PAGAR</th>


                                </tr>
                                </thead>
                                <tbody>
<?php while ($r=$query->fetch_array()):
$salario_dia=$r["sueldo"]/30;
$pago_neto=$salario_dia*$r["dias_trabajados"];
  ?>

<tr><td><?php echo $r["codigo_marcacion"]; ?></td>
<td><?php echo $r["nombre"]; ?></td>
    <td><?php echo $r["apellido"]; ?></td>
    <td><?php echo $r["sueldo"]; ?></td>
     <td><?php echo $salario_dia; ?></td>
     <td><?php echo $r["dias_trabajados"]; ?></td>
      <td><?php echo $pago_neto; ?></td>
         <td><?php echo "$".number_format($r["isss"],2); ?></td>
            <td><?php echo "$".number_format($r["afp"],2); ?></td>
              <td><?php echo "$".number_format($r["renta"],2); ?></td>
    
          <td><?php echo "$".number_format($r["otros_descuentos"],2); ?></td>
            <td><?php echo "$".number_format($r["total_descuento"],2); ?></td>
              <td><?php echo "$".number_format($r["total_bonificacion"],2); ?></td>
               
                        <td><?php echo "$".number_format($r["total_pagar"],2); ?></td>
                       

    
</tr>
<?php endwhile;?>
</table>
<?}?>
  


<script src="bootstrap/js/bootstrap.min.js"></script>
<script>

function loadTabla(){
  $('#editModal').modal('hide');

  $.get("html/tabla_planilla.php","",function(data){
    $("#tabla").html(data);
  })

}

$("#buscar").submit(function(e){
  e.preventDefault();
  $.get("html/busqueda.php",$("#buscar").serialize(),function(data){
    $("#tabla").html(data);
  $("#buscar")[0].reset();
  });
});

loadTabla();


  $("#agregar").submit(function(e){
    e.preventDefault();
    $.post("html/agregar_empleado.php",$("#agregar").serialize(),function(data){
    });
    //alert("Agregado exitosamente!");
    $("#agregar")[0].reset();
    $('#newModal').modal('hide');
    loadTabla();
  });</script>
    <!-- Mainly scripts -->
 
    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <script src="js/plugins/dataTables/datatables.min.js"></script>
    <script src="js/plugins/dataTables/dataTables.bootstrap4.min.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="js/inspinia.js"></script>
    <script src="js/plugins/pace/pace.min.js"></script>

    <!-- Page-Level Scripts -->

    <script>
        $(document).ready(function() {

            $('.footable').footable();

            $('#date_added').datepicker({
                todayBtn: "linked",
                keyboardNavigation: false,
                forceParse: false,
                calendarWeeks: true,
                autoclose: true
            });

            $('#date_modified').datepicker({
                todayBtn: "linked",
                keyboardNavigation: false,
                forceParse: false,
                calendarWeeks: true,
                autoclose: true
            });

        });

    </script>
      <script>
        $(document).ready(function(){
            $('.dataTables-example').DataTable({
                pageLength: 25,
                responsive: true,
                dom: '<"html5buttons"B>lTfgitp',
                buttons: [
                   

                    {extend: 'print',
                     customize: function (win){
                            $(win.document.body).addClass('white-bg');
                            $(win.document.body).css('font-size', '15px');

                            $(win.document.body).find('table')
                                    .addClass('compact')
                                    .css('font-size', 'inherit');
                    }
                    }
                ]

            });

        });

    </script>

    <script type="text/javascript">
        <script language="JavaScript">
function pregunta(){
    if (confirm('¿Estas seguro de enviar este formulario?')){
       document.tuformulario.submit()
    }
}
</script>
    </script>


</body>

</html>
