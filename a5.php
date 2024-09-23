<?
session_start();
if(!isset($_SESSION['vsClave']))
{
  header("location:login.php");
}

$id=$_SESSION['vsIdempresa'];

$nombre=$_SESSION['vsNombre'];
   if ($nombre=="COLGATE PALMOLIVE CA") {

       $nombre="COLGATE PALMOLIVE CA INC";
     }

   include("connect.php");
   $conexion = conexion();

  $consulta = mysqli_query($conexion,"   select t1.id_logistica, t1.id_orden, t1.origen, t1.f_empaque, t1.p_vehiculo, t1.n_motorista, t1.destino, t1.status, t1.f_salida, t1.f_llegada,
   t1.m_carga, t1.carta_p, t1.factura, t1.duca_f, t1.duca_t, t1.nota_envio_cd, t1.orden_compra,t1.nota_envio, t1.fo_entrega, t1.estado,t1.descripcion,t2.id_orden, t2.id_empresa, t2.empresa, t2.id_contacto, t2.contacto, t3.nombre, t3.celular, t3.email, t4.id_marca, t4.marca from logitica t1 inner join pop t2 on t1.id_orden=t2.id_orden inner join contacto t3 on t2.id_contacto=t3.id_contacto inner JOIN pop_marca t4 on t1.id_marca=t4.id_marca where t1.estado=0 and t2.id_empresa='".$id."'    order by t1.f_llegada desc
 ");

    $ordenessv=mysqli_num_rows($consulta);

 include("connect2.php");
   $conexion2 = conexion2();

  $consulta2 = mysqli_query($conexion2," select a1.id_orden, a1.estado,a2.id_orden, a2.estado, a1.status, a1.marca, a1.origen, a1.destino, a1.f_salida, a1.f_llegada, a1.descripcion, a1.status ,a1.m_carga,
a1.carta_p, a1.factura, a1.duca_t, a1.duca_f, a1.nota_envio_cd, a1.orden_compra, a1.nota_envio FROM logitica a1 inner join pop a2 on a1.id_orden=a2.id_orden inner join empresa a3 on a2.id_empresa=a3.id_empresa WHERE a2.empresa='".$nombre."' and a1.estado=1 and a1.status='TRANSITO' OR a1.status='ADUANA DE SALIDA' OR a1.status='ADUANA DE DESTINO' OR a1.status='PROBLEMA' order by a1.f_llegada asc

 ");

    $ordenesni=mysqli_num_rows($consulta2);

   $ordenes_transito=$ordenesni+$ordenessv;
   

   
?>




<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Mi envio| Color Digital</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="bower_components/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
<link rel="stylesheet" type="text/css" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
            <script type="text/javascript" language="javascript" src="http://code.jquery.com/jquery-1.9.1.js"></script>
            <script type="text/javascript" language="javascript" src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>


  <script>
function myFunction(val) {
    var v =  val;
    window.open("pruebadoc.php?id="+ v, "toolbar=yes,scrollbars=yes,resizable=yes,left=2000,width=2000,height=2000");
}

function myFunction2(val) {
    var v =  val;
    window.open("fotoprueba.php?id="+ v, "toolbar=yes,scrollbars=yes,resizable=yes,top=1,left=2000,width=2000,height=2000");
}
function myFunction4(val) {
    var v =  val;
    window.open("pruebadoc_nc.php?id="+ v, "toolbar=yes,scrollbars=yes,resizable=yes,left=2000,width=2000,height=2000");
}

function myFunction5(val) {
    var v =  val;
    window.open("fotoprueba_nc.php?id="+ v, "toolbar=yes,scrollbars=yes,resizable=yes,left=2000,width=2000,height=2000");
}
</script>

 <SCRIPT language=Javascript>
    
      function isNumberKey(evt)
      {
         var charCode = (evt.which) ? evt.which : event.keyCode
         if (charCode==32){ return true;} 
         else{  
                if (charCode > 31 && (charCode < 48 || charCode > 57))
                  return false;
             }
        

         return true;
      }


      function myFunction3(val) {
    var v =  val;
    window.open("registro_status.php?id="+ v,  "toolbar=yes,scrollbars=yes,resizable=yes,top=125,left=800,width=400,height=250");
}
function myFunction6(val) {
    var v =  val;
    window.open("registro_status_nc.php?id="+ v,  "toolbar=yes,scrollbars=yes,resizable=yes,top=125,left=800,width=400,height=250");
}


    
   </SCRIPT>

   <style type="text/css">
      #contenedor22 {
  width: 10%;
  max-width: 1200px;
}
    </style>


          
    
</head>




    <!-- Main content -->
  

      <div class="table-responsive" align="center">

   
        <table  class="table table-striped table-hover">
                            <thead class="bg-primary" >
                              <tr>

                                   <th width="70" align="center">#ORDEN</th>
                                   <th width="70" align="center">ESTADO</th>
                                 <th width="70" align="center">MARCA</th>
                                  <th width="70" align="center">ORIGEN</th>
                                 <th width="70" align="center">DESTINO</th>
                                 <!--<th>Producto</th>
                                <!-- <th>Motorista</th>
                                 <th>Placa</th> -->                               
                                 <th width="70" align="center">E.T.D</th>
                                 <th width="70" align="center">E.T.A</th>  
                                 <th width="70" align="center">D_PAQUETE</th>
                                                              
                                 <th width="70" align="center"> &nbsp;&nbsp;&nbsp;STATUS</th>
                                 <th width="70" align="center">DOCUMENTACION</th>
                                   <th width="70" align="center"> &nbsp;&nbsp;&nbsp;&nbsp; FOTOS</th>
                                   <th width="70" align="center"> &nbsp;&nbsp;&nbsp;&nbsp; VER</th>
                              
                              


                                

                               </tr>
                            </thead>
                            <tbody>
                             
                              <?php 
                                while ($row = mysqli_fetch_array($consulta))
                                   {
                                      $id=$row['id_orden'];
                                     $status=$row['status'];
                                       $id=$row['id_logistica'];
                                      $data='#'.$row['id_orden'];
                                      $data2=$row['id_orden'];

                                    $ext=".png";

                                   ?>

                        
                                 
                              <tr>
                                                       
                                 <td>  <img height='30px' src="focus/<?php echo $status.$ext; ?>" /> </td>
                                <td>  <img height='30px' src="focus/<?php echo $status.$ext; ?>" /> </td>
                                <td align="center" >  <?php echo $row[   'marca'  ];   ?>  </td>
                                             <td  > 
                  &nbsp;&nbsp;&nbsp;&nbsp; <?php echo $row[   'origen'   ];  ?>  </td>
                                <td  > 
                  &nbsp;&nbsp;&nbsp;&nbsp; <?php echo $row[   'destino'   ];  ?>  </td>
                                 <!--<td><a href="pop.orden.activa.iframe.php?idorden=<?php //echo $row['id_orden']; ?>"> Ver Productos</a>  </td>
                                <!--<td>  <?// echo $row[   'n_motorista'     ];  ?>  </td>                                 
                                <td>  <?php //echo $row[   'p_vehiculo'      ];  ?>  </td>-->
                                <td >  <?php echo $row[   'f_salida'      ];  ?>  </td>
                                <td >  <?php echo $row[   'f_llegada'];  ?>  </td>
                                
                                <td >  <?php echo $row[   'descripcion'].$row['id_orden'];  ?>  </td>
                                <!--<td>  <?php //cho $row[   'p_vehiculo'      ];  ?>  </td>-->
                                <?
                                  echo" <td align='center'><a onclick=\"myFunction3(".$row['id_orden'].")\" href='' role='button'  data-toggle='modal'><i class='fas fa-shipping-fast'></i></a></td>"

                                
                               ?>
                                <!--<td> <img height='30px' src="foto_log/<?php //echo $row['f_empaque']; ?>" /> </td>-->
                               <!-- <td><a href="imprimir_doc.php?id=<?// echo $row['id_logistica']; ?>"> Ver documentos</a></td>-->
                                <?
                                  echo" <td align='center'><a onclick=\"myFunction(".$row['id_orden'].")\" href='' role='button'  data-toggle='modal'><i class='fas fa-folder-open'></i></a></td>"


                                
                               ?>

                               <?
                                  echo" <td > &nbsp;&nbsp;&nbsp;&nbsp; <a onclick=\"myFunction2(".$row['id_orden'].")\" href='' role='button'  data-toggle='modal'><i class='fas fa-file-image'></i></a></td>"

                                 
                                
                               ?>
                                  <td>
 <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="<? echo $data;?>" aria-expanded="false" aria-controls="<? echo $data2;?>"><? echo $row['id_orden'];?></button></td> 
                               
                                 </tr>



                             <tr><td colspan="9">
        <div class="col">
    <div class="collapse multi-collapse" id="<? echo $data2;?>">
      <div class="card card-body">
      <?include('t.php');?>
      </div>
    </div>
  </div>

    </td>
    </tr>
                            
                             <?php
                                 }
                               ?>



                          </tbody>
                          </table>





      

        <!-- ./col -->
       
      <!-- /.row -->
      <!-- Main row -->
    
<!-- ./wrapper -->

<!-- jQuery 3 -->
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


</body>
</html>
