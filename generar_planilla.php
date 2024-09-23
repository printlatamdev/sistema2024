
<? //include('conexion_ajax.php');



include "html/conexion.php";

$user_id=null;

$n=1;
$sql13= "select * from tipo_planilla";
$query5 = $con->query($sql13);



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
      


<? $periodo_activo= "select*from periodo order by id_periodo desc LIMIT 1 ";
$perido = $con->query($periodo_activo);

while ($mostrar=$perido->fetch_array()):
 $id_periodo_ultimo=$mostrar["estado"];
  $n_mes=$mostrar["nombre_mes"];
  $n_quincena=$mostrar["n_quincena"];
endwhile;?>


<?if($id_periodo_ultimo==1){?>
<br><br><br>
 <p class="alert alert-danger">ACTUALMENTE TIENE UN NUEVO PERIODO ESPERANDO QUE SUBAS EL ARCHIVO DE MARCACION</p>
<?}else{?>

  <form class="form-inline" method="get">
        <div class="form-group">
          <select name="filter" class="form-control" onchange="form.submit()">
            <option value="0">Filtros por planilla</option>

            <?php $filter = (isset($_GET['filter']) ? strtolower($_GET['filter']) : NULL);  ?>
            <?php while ($r=$query5->fetch_array()):?>


            <option value="<?php echo $r["id_tipo_planilla"]; ?>" ><?php echo $r["tipo"]; ?></option>
       <?php endwhile;?>
          </select>
        </div>
      </form>





<?

   
if (!isset($_GET['filter'])) {

$n=0;
 
  
}


else{

$n=$_REQUEST['filter'];
  
}



if (!isset($_GET['pagar'])) {

$p=0;
 
  
}


else{

$p=$_REQUEST['pagar'];
  
}



if($filter){
                   $sql1= "select*from empleados where id_tipo_planilla='".$filter."' ";
$query = $con->query($sql1);

 $periodo2= "select*from periodo order by id_periodo desc LIMIT 1 ";
$periodo_estado2 = $con->query($periodo2);

while ($r7=$periodo_estado2->fetch_array()):
 $id_periodo2=$r7["id_periodo"];
endwhile;


$pago_pla= "select*from pago_planilla where id_tipo_planilla='".$filter."' and id_periodo='".$id_periodo2."' ";
$querypla = $con->query($pago_pla);



while ($rw=$querypla->fetch_array()):
 $estado_pago=$rw["estado"];
endwhile;









            $tipo= "select*from tipo_planilla where id_tipo_planilla='".$filter."' ";

$tipo2 = $con->query($tipo);
           while ($r2=$tipo2->fetch_array()):

          $n_tipo=$r2["tipo"]; 

            endwhile;



                }else{
                    $sql1= "select a.id_empleado, a.id_area, a.id_tipo_planilla, a.codigo_marcacion, a.nombre, a.apellido, a.dui, a.direccion, a.email, a.telefono, a.f_nacimiento, a.sueldo, a.sexo, a.n_isss, a.n_afp, a.renta, a.cuenta, a.estado , b.id_area, b.area, b.estado, c.id_cargo, c.cargo, c.estado from empleados a INNER JOIN area b on a.id_area=b.id_area INNER JOIN cargos c on a.id_cargo=c.id_cargo order by a.codigo_marcacion asc ";
$query = $con->query($sql1);
                }
?>







            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox">
                       
<?php if($n>0 && $estado_pago>0):?>
<br><br>
 <div class="col-sm-6">
            <a href="generar_planilla.php?pagar=1&&filter=<?echo $filter;?>" class="btn btn-success" onclick="pregunta()"><i class="material-icons">&#xE147;</i> <span>Pagar Planilla</span></a>


          </div>
<p class="alert alert-success" style="width: 600px;">Empleados de  <?echo $n_tipo; ?></p>

            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox">
                        <div class="table responsive">

                           <table class="table table-striped table-bordered table-hover dataTables-example" data-page-size="16">

                                <thead>
                                <tr>

                                    <th  align="center">ID</th>
                                    <th  align="center" >Nombre</th>
                                    <th  align="center">Apellido</th>
                                    <th  align="center">Salario/M</th>
                                    <th  align="center">Salario/D</th>
                                    <th  align="center">Dias Trabajados</th>
                                    <th  align="center">Pago Neto</th>
                                    <th  align="center">ISSS</th>
                                    <th  align="center">AFP</th>
                                    <th  align="center">RENTA</th>
                                    <th  align="center">OTROS DESCUENTOS</th>
                                    <th  align="center">TOTAL DESCUENTOS</th>
                                    <th  align="center">BONIFICACION</th>
                                    <th  align="center">TOTAL A PAGAR</th>




                                   
                                    
                               
                                
                                </tr>
                                </thead>
                                <tbody>
<?php while ($r=$query->fetch_array()):
    $id_empleado=$r["id_empleado"];
    $codigo=$r["codigo_marcacion"];
$salario_dia=$r["sueldo"]/30;

     $sql21 = "select*from min_tarde where id_empleado='".$codigo."'";
            $query21 = $con->query($sql21);

while ($r96=$query21->fetch_array()):

          $dias_trabajados=$r96["num_dias_trabajados"];
           

endwhile;







//$dias_trabajados=15;
$pago_neto=$dias_trabajados*$salario_dia;
$isss=$pago_neto*0.03;
$afp=$pago_neto*0.0725;

 $otros= "select SUM(monto_cuota) as monto from descuentos where id_empleado='".$id_empleado."'";
$otros_descuentos = $con->query($otros);

while ($r2=$otros_descuentos->fetch_array()):
 $monto_otros_descuentos=$r2["monto"];
endwhile;

if ($monto_otros_descuentos==null) {
    $monto_otros_descuentos=0;
}

 $otros_b= "select SUM(total_pagar) as bono from bonificacion where id_empleado='".$id_empleado."'";
$otros_bonificacion = $con->query($otros_b);

while ($r3=$otros_bonificacion->fetch_array()):
 $monto_bonificacion=$r3["bono"];
endwhile;

if ($monto_bonificacion==null) {
    $monto_bonificacion=0;
}



$total_descuentos=$isss+$afp+$monto_otros_descuentos;



$pago_sin_afp_iss=$pago_neto-$isss-$afp;
$pago_con_descuentos=$pago_sin_afp_iss-$monto_otros_descuentos;
$pago_total=$pago_con_descuentos+$monto_bonificacion;

//**********************************CALCULO DE RENTA******************************************




$salario_renta=$pago_total;


if ($salario_renta<=236.00) {
    $renta=0;
}
elseif($salario_renta>=236.00 || $salario_renta<=447.62){
   $renta=(($salario_renta-236.00)*0.10)+8.83;
}
elseif($salario_renta>=447.63 || $salario_renta<=1019.05){
    $renta=(($salario_renta-447.62)*0.20)+30.00;

}
elseif($salario_renta>=1019.06){
    $renta=(($salario_renta-1019.06)*0.30)+144.28;

}
$pago_total_total=$pago_total-$renta;

$total_descuentos=$isss+$afp+$monto_otros_descuentos+$renta;







// *********************************FIN DEL CALCULO DE RENTA ************************************


    ?>





<?php if ($p==1): 
 $periodo= "select*from periodo order by id_periodo desc LIMIT 1 ";
$periodo_estado = $con->query($periodo);

while ($r7=$periodo_estado->fetch_array()):
 $id_periodo=$r7["id_periodo"];
 $mes=$r7["nombre_mes"];
 $quincena=$r7["n_quincena"];
endwhile;


//MODIFICACION DE DESCUENTOS PARA BAJAR LAS CUOTAS EN LA TABLA





//FIN MODIFICACION DE DESCUENTOS




    //$id_periodo=1;
    $estado=1;
    $fecha=date('d/m/y');
                $insertar_planilla = "insert into planilla(id_tipo_planilla,id_empleado,id_periodo,otros_descuentos,bonificacion,dias_trabajados,isss,afp,renta,total_descuento, total_bonificacion,total_pagar, fecha, estado) value (\"$filter\",\"$id_empleado\",\"$id_periodo\",\"$monto_otros_descuentos\",\"$monto_bonificacion\",\"$dias_trabajados\",\"$isss\",\"$afp\",\"$renta\",\"$total_descuentos\",\"$monto_bonificacion\",\"$pago_total_total\",\"$fecha\",\"$estado\")";
            $insertar_planilla2 = $con->query($insertar_planilla);


            if ($insertar_planilla2==true) {
                $planilla_insertada=1;
              $estado_p=0;
             $update = "update pago_planilla set estado=\"$estado_p\" where id_tipo_planilla=".$filter." and id_periodo=".$id_periodo;
            $update2 = $con->query($update);




 $restar= "select*from descuentos where id_empleado='".$id_empleado."' and estado=1 order by id_descuento asc ";
$restar_descuentos = $con->query($restar);

while ($res=$restar_descuentos->fetch_array()):
 $monto=$res["monto"];
  $id_descuento=$res["id_descuento"];
 $monto_cuota=$res["monto_cuota"];
 $cuotas=$res["cuotas"];
  $cuotas_restantes=$res["cuotas_restantes"];

 $new_monto=$monto-$monto_cuota;
 $new_cuotas=$cuotas-1;

  



   $descontar = "update descuentos set monto_restante=\"$new_monto\",cuotas_restantes=\"$new_cuotas\" where id_descuento=".$id_descuento;
            $update21 = $con->query($descontar);

if ($cuotas_restantes==1) {
   $estado=0;
   $terminar = "update descuentos set estado=\"$estado\" where id_descuento=".$id_descuento;
            $terminado_pago = $con->query($terminar);
}



endwhile;













            if ($update2==true) {
            print "<script>alert(\"Planilla Finalizada Correctamente.\");window.location='generar_planilla.php';</script>";
            }else{}



            }
            else{
                $planilla_insertada=0;
            }

    
 endif ?>




<script>
  <?$tex2=141;?>



function s141(str) {
  if (str=="") {
    document.getElementById("<? echo $tex2;?>").innerHTML="";
    return;
  }
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("<? echo $tex2;?>").innerHTML=this.responseText;
    }
  }
  xmlhttp.open("GET","getuser.php?q="+str,true);
  xmlhttp.send();
}
</script>



<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Descuentos</h4>
      </div>
      <div class="modal-body">
        <p> <div id="141"></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>



<tr><td><?php echo $r["codigo_marcacion"]; ?></td>
    <td><?php echo $r["nombre"]; ?></td>
    <td><?php echo $r["apellido"]; ?></td>
    <td><?php echo "$".number_format($r["sueldo"],2); ?></td>
    <td><?php echo "$".number_format($salario_dia,2); ?></td>
    <td><?php echo $dias_trabajados; ?></td>
    <td><?php echo "$".number_format($pago_neto,2); ?></td>
     <td><?php echo "$".number_format($isss,2); ?></td>
    <td><?php echo "$".number_format($afp,2); ?></td>
    <td><?php echo "$".number_format($renta,2); ?></td>

    <td>
  
      <?if ($monto_otros_descuentos>0) {?>

       
            <button style="color: red;" type="button"  data-toggle="modal" data-target="#myModal" value="<?echo $id_empleado;?>" onclick="s141(this.value)"><?php echo "-$".number_format($monto_otros_descuentos,2); ?></button>
        
      <?}else{?>
         <?php echo "$".number_format($monto_otros_descuentos,2); ?>
         <?}?>
       
</td>


    <td><?php echo "$".number_format($total_descuentos,2); ?></td>
     <td>  <?if ($monto_bonificacion>0) {?>
         <a style="color: green;"><?php echo "+$".number_format($monto_bonificacion,2); ?></a>
         
      <?}else{?>
         <?php echo "$".number_format($monto_bonificacion,2); ?>
         <?}?></td>
      <td><b style="font-style: italic;"><?php echo "$".number_format($pago_total_total,2); ?></b></td>



        <script>
        $("#del-"+<?php echo $r["id"];?>).click(function(e){
            e.preventDefault();
            p = confirm("Estas seguro?");
            if(p){
                $.get("./php/eliminar.php","id="+<?php echo $r["id"];?>,function(data){
                    loadTabla();
                });
            }

        });
        </script>
    </td>
</tr>
<?php endwhile;?>

</table>
<?php else:?>

       <?php if ($n==0){?>
  <br><br>
    <p class="alert alert-warning">Favor Seleccione el tipo de planilla</p>
      <? }elseif($n>0 && $estado_pago==0) {?>
           
           <br><br>
<?
   $periodo23= "select*from periodo order by id_periodo desc LIMIT 1 ";
$periodo_estado23 = $con->query($periodo23);

while ($r723=$periodo_estado23->fetch_array()):
 $id_periodo=$r723["id_periodo"];
  $mes23=$r723["nombre_mes"];
   $quincena23=$r723["n_quincena"];
endwhile;
?>

    <p class="alert alert-danger">La planilla de <?echo $n_tipo;?> correspondiente a <?echo $mes23;?>(<?echo $quincena23;?>) ya ha sido finalizada, estamos a la espera de un nuevo periodo de planilla. </p><br><br><b>DEBES CREAR UN NUEVO PERIODO</b><a href="periodo.php"> CREAR PERIODO</a>
      <?} ?>
           
  
  



<?php endif;?><?}?>
                </div>
            </div>


        </div>
        <div class="footer">
            <div class="float-right">
               
            </div>
            <div>
                <strong>Copyright</strong> Sistema Planilla Color Digital
            </div>
        </div>

        </div>
        </div>

 <div class="modal fade" id="newModal" tabindex="-1" role="dialog" aria-labelledby="newModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Agregar</h4>
        </div>
        <div class="modal-body">
<form role="form" method="post" id="agregar">
  <div class="form-group">
    <label for="name">N° MARCACION</label>
    <input type="text" class="form-control" name="n_marcacion" required>
  </div>
    <div class="form-group">
    <label for="name">NOMBRE</label>
    <input type="text" class="form-control" name="nombre" required>
  </div>
    <div class="form-group">
    <label for="name">APELLIDO</label>
    <input type="text" class="form-control" name="apellido" required>
  </div>

    <div class="form-group">
    <label for="name">DUI</label>
    <input type="text" class="form-control" name="dui" required>
  </div>
    <div class="form-group">
    <label for="name">DIRECCION</label>
    <input type="text" class="form-control" name="direccion" required>
  </div>
    <div class="form-group">
    <label for="name">EMAIL</label>
    <input type="text" class="form-control" name="email" required>
  </div>
    <div class="form-group">
    <label for="name">TELEFONO</label>
    <input type="text" class="form-control" name="telefono" required>
  </div>

      <div class="form-group">
    <label for="name">F_NACIMIENTO</label>
    <input type="date" class="form-control" name="f_nacimiento" required>
  </div>
      <div class="form-group">
    <label for="name">SUELDO</label>
    <input type="text" class="form-control" name="sueldo" required>
  </div>


 <div class="form-group">
    <label for="name">N_ISSS</label>
    <input type="text" class="form-control" name="n_isss" required>
  </div>
  <div class="form-group">
    <label for="name">N_AFP</label>
    <input type="text" class="form-control" name="n_afp" required>
  </div>

  <div class="form-group">
    <label for="name">N_CUENTA</label>
    <input type="text" class="form-control" name="n_cuenta" required>
  </div>
<div class="form-group">
   <select name="area" id="area"   class="selectpicker form-control" data-live-search="true">
            
            <option value="" >Seleccione Area.</option>
            <? while ($filam = mysqli_fetch_array($area))
                                   {
                                           ?>
                          <option value="<? echo $filam[0];?>" > <? echo $filam[1];?></option>
                                  
                                         

                                          <?}?>

          </select>
                            
                        </div>

                        <div class="form-group">
   <select name="cargo" id="cargo"   class="selectpicker form-control" data-live-search="true">
            
            <option value="" >Seleccione Cargo.</option>
            <? while ($filam2 = mysqli_fetch_array($cargos))
                                   {
                                           ?>
                          <option value="<? echo $filam2[0];?>" > <? echo $filam2[1];?></option>
                                  
                                         

                                          <?}?>

          </select>
                            
                        </div>


                        <div class="form-group">
   <select name="tipo_planilla" id="tipo_planilla"   class="selectpicker form-control" data-live-search="true">
            
            <option value="" >Seleccione Tipo Planilla.</option>
            <? while ($filam3 = mysqli_fetch_array($tipo_planilla))
                                   {
                                           ?>
                          <option value="<? echo $filam3[0];?>" > <? echo $filam3[1];?></option>
                                  
                                         

                                          <?}?>

          </select>
                            
                        </div>




  

        </div>

      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->

  


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


    </script>


</body>

</html>
