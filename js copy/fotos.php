<?
include("session.php");
include("connect.php");

session_start();
if(!isset($_SESSION['vsClave']))
{
  header("location:login.php");
}

$id=$_SESSION['vsIdempresa'];
  $conexion = conexion();

$id       = $_GET["id"];

    $consulta = mysqli_query($conexion,"  select count(id_foto), id_orden, foto, estado, evento from foto_log where id_orden='".$id."' and evento='cargando' group by id_foto
 ");

      $consulta2= mysqli_query($conexion,"  select count(id_foto), id_orden, foto, estado, evento from foto_log where id_orden='".$id."' and evento='evento' group by id_foto
 ");


          $consulta3 = mysqli_query($conexion,"  select count(id_foto), id_orden, foto, estado, evento from foto_log where id_orden='".$id."' and evento='entrega' group by id_foto
 ");



$vento1="cargando";
$vento2="evento";
$vento3="descargando";




                                while ($row = mysqli_fetch_array($consulta))
                                   {



                                    $id_foto=$row[0];
                                    $id_orden=$row[1];
                                    $foto=$row[2];
                                    $estado=$row[3];
                                    $evento=$row[4];
                                                               


                                   }




                                   if ($id_foto==null) {

                                    $mensaje1="Sin subir";

                                   }
                                   else{

                                    $mensaje1="Ver Fotos";
                                   }

                                 




                                 while ($row2 = mysqli_fetch_array($consulta2))
                                   {



                                    $id_foto=$row2[0];
                                    $id_orden=$row2[1];
                                    $foto=$row2[2];
                                    $estado=$row2[3];
                                    $evento=$row2[4];
                                                               


                                   }




                                   if ($id_foto==null) {

                                    $mensaje2="Sin subir";

                                   }
                                   else{

                                    $mensaje2="Ver Fotos";
                                   }

                                 


                                   while ($row3 = mysqli_fetch_array($consulta3))
                                   {



                                    $id_foto=$row3[0];
                                    $id_orden=$row3[1];
                                    $foto=$row3[2];
                                    $estado=$row3[3];
                                    $evento=$row3[4];
                                                               


                                   }




                                   if ($id_foto==null) {

                                    $mensaje3="Sin subir";

                                   }
                                   else{

                                    $mensaje3="Ver Fotos";
                                   }

                                 




?>

<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en" class="no-js">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
<meta charset="utf-8"/>
<title>Sistema Color Digital</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1" name="viewport"/>
<meta content="" name="description"/>
<meta content="" name="author"/>
<!-- BEGIN GLOBAL MANDATORY STYLES -->
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>
<link href="assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
<link href="assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css"/>
<link href="assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link href="assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
<link href="assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css"/>
<!-- END GLOBAL MANDATORY STYLES -->
<!-- BEGIN PAGE LEVEL STYLES -->
<link rel="stylesheet" type="text/css" href="assets/global/plugins/datatables/extensions/Scroller/css/dataTables.scroller.min.css"/>
<link rel="stylesheet" type="text/css" href="assets/global/plugins/datatables/extensions/ColReorder/css/dataTables.colReorder.min.css"/>
<link rel="stylesheet" type="text/css" href="assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css"/>

<!-- END PAGE LEVEL STYLES -->
<!-- BEGIN PAGE LEVEL PLUGIN STYLES -->
<link href="assets/global/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css"/>
<link href="assets/global/plugins/fullcalendar/fullcalendar.min.css" rel="stylesheet" type="text/css"/>
<link href="assets/global/plugins/jqvmap/jqvmap/jqvmap.css" rel="stylesheet" type="text/css"/>
<!-- END PAGE LEVEL PLUGIN STYLES -->
<!-- BEGIN PAGE STYLES -->
<link href="assets/admin/pages/css/tasks.css" rel="stylesheet" type="text/css"/>
<!-- END PAGE STYLES -->
<!-- BEGIN THEME STYLES -->
<link href="assets/global/css/components.css" id="style_components" rel="stylesheet" type="text/css"/>
<link href="assets/global/css/plugins.css" rel="stylesheet" type="text/css"/>
<link href="assets/admin/layout/css/layout.css" rel="stylesheet" type="text/css"/>
<link href="assets/admin/layout/css/themes/darkblue.css" rel="stylesheet" type="text/css" id="style_color"/>
<link href="assets/admin/layout/css/custom.css" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" type="text/css" href="assets/global/plugins/select2/select2.css"/>



<link rel="stylesheet" type="text/css" href="assets/global/plugins/clockface/css/clockface.css"/>
<link rel="stylesheet" type="text/css" href="assets/global/plugins/bootstrap-datepicker/css/datepicker3.css"/>
<link rel="stylesheet" type="text/css" href="assets/global/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css"/>
<link rel="stylesheet" type="text/css" href="assets/global/plugins/bootstrap-colorpicker/css/colorpicker.css"/>
<link rel="stylesheet" type="text/css" href="assets/global/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css"/>
<link rel="stylesheet" type="text/css" href="assets/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css"/>
<!-- END THEME STYLES -->



<link rel="shortcut icon" href="images/color.ico"/>
 <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- FullCalendar -->
    <link href="vendors/fullcalendar/dist/fullcalendar.min.css" rel="stylesheet">
    <link href="vendors/fullcalendar/dist/fullcalendar.print.css" rel="stylesheet" media="print">
</head>

<body >
  <table class="table">
    <thead>
      <tr>
        <th>Tipo de Foto</th>
        <th>Ver Fotos</th>
        <th>Editar Fotos</th>
      </tr>
    </thead>
    <tbody>
      <tr  class="info">
        <td>Fotos cargando</td>
        <!--<td><? //echo $mensaje1; ?></td>-->
        <?
              if ($mensaje1=="Sin subir") {
                # code...
              

        ?>
           <td><? echo $mensaje1; ?></td>

           <?}
           
             else{

           ?>

         <td><a href="fotos_log.php?id=<?php echo $id; ?>&v=cargando"> <? echo $mensaje1; ?></a></td>
         <?}?>
        <td><button class="btn btn-primary" data-toggle="modal" data-target="#factura">Editar </button>
</td>
      </tr>      
      <tr class="success">
        <td>Fotos evento</td>
          <?
              if ($mensaje2=="Sin subir") {
                # code...
              

        ?>
           <td><? echo $mensaje2; ?></td>

           <?}
           
             else{

           ?>

         <td><a href="fotos_log.php?id=<?php echo $id; ?>&v=evento"> <? echo $mensaje2; ?></a></td>
         <?}?>
       <td><button class="btn btn-primary" data-toggle="modal" data-target="#nota">Editar </button>
</td>
      </tr>
      <tr class="danger">
        <td>Fotos descargando</td>
           <?
              if ($mensaje3=="Sin subir") {
                # code...
              

        ?>
           <td><? echo $mensaje3; ?></td>

           <?}
           
             else{

           ?>

         <td><a href="fotos_log.php?id=<?php echo $id; ?>&v=entrega"> <? echo $mensaje3; ?></a></td>
         <?}?>
      <td><button class="btn btn-primary" data-toggle="modal" data-target="#duca">Editar </button>
      </tr>
      
      
    </tbody>
  </table>
   <form method="post" action="script/subirFactura.php" enctype="multipart/form-data">
    <div class="modal fade" id="orden" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Subir Orden compra</h4>
             </div>
            <div class="modal-body">
            <div class="form-group">
                   # Orden<input id="id_orden" type="text" class="form-control" name="id_orden" aria-label="..." readonly="readonly" value="<? echo $id; ?>" required>
                 </div>
                <div class="form-group">
                  <input name="option" type="hidden"  value="orden" class="form-control" aria-label="...">
                </div>

                 <div class="form-group">
  
  <label class="col-md-4 control-label" >Duca_F</label>
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
      <input  class="form-control" name="orden" type="file" aria-label="..."  /> 
    </div>
  </div>
               
                  
          <div class="modal-footer">
            <button type="submit" class="btn btn-default" data-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-primary">Subir</button>
          </div>
        </div>
      </div>
    </div>
    </div>
    </div>
    
</form>
    <form method="post" action="script/subirentrega.php" enctype="multipart/form-data">
    <div class="modal fade" id="duca" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Subir fotos de entrega</h4>
             </div>
            <div class="modal-body">
            <div class="form-group">
                   # Orden<input id="id_orden" type="text" class="form-control" name="id_orden" aria-label="..." readonly="readonly" value="<? echo $id; ?>" required>
                 </div>
                <div class="form-group">
                  <input name="option" type="hidden"  value="entrega" class="form-control" aria-label="...">
                </div>

                 <div class="form-group">
  <label class="col-md-4 control-label" >Foto</label>
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
      <input  class="form-control" name="file_array[]" type="file" aria-label="..." multiple  />
        
    </div>
  </div>
   
</div>
               
                  
          <div class="modal-footer">
            <button type="submit" class="btn btn-default" data-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-primary">Subir</button>
          </div>
        </div>
      </div>
    </div>
    </div>
    </div>
    
</form>
   <form method="post" action="script/subirevento.php" enctype="multipart/form-data">
    <div class="modal fade" id="nota" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Subir fotos de evento</h4>
             </div>
            <div class="modal-body">
            <div class="form-group">
                   # Orden<input id="id_orden" type="text" class="form-control" name="id_orden" aria-label="..." readonly="readonly" value="<? echo $id; ?>" required>
                 </div>
                <div class="form-group">
                  <input name="option" type="hidden"  value="evento" class="form-control" aria-label="...">
                </div>

                <div class="form-group">
  <label class="col-md-4 control-label" >Foto</label>
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
      <input  class="form-control" name="file_array[]" type="file" aria-label="..." multiple  />
        
    </div>
  </div>
   
</div>
               
                  
          <div class="modal-footer">
            <button type="submit" class="btn btn-default" data-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-primary">Subir</button>
          </div>
        </div>
      </div>
    </div>
    </div>
    </div>
    
</form>
    	
  <form method="post" action="script/subirFotos.php" enctype="multipart/form-data">
    <div class="modal fade" id="factura" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Subir fotos de carga</h4>
             </div>
            <div class="modal-body">
            <div class="form-group">
                   # Orden<input id="id_orden" type="text" class="form-control" name="id_orden" aria-label="..." readonly="readonly" value="<? echo $id; ?>" required>
                 </div>
                <div class="form-group">
                  <input name="option" type="hidden"  value="carga" class="form-control" aria-label="...">
                </div>

                 <div class="form-group">
  <label class="col-md-4 control-label" >Foto</label>
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
      <input  class="form-control" name="file_array[]" type="file" aria-label="..." multiple  />
        
    </div>
  </div>
   
</div>
               
                  
          <div class="modal-footer">
            <button type="submit" class="btn btn-default" data-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-primary">Subir</button>
          </div>
        </div>
      </div>
    </div>
    </div>
    </div>
    
</form>



 <form method="post" action="script/subirFactura.php" enctype="multipart/form-data">
    <div class="modal fade" id="carta" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Subir carta de porte</h4>
             </div>
            <div class="modal-body">
            <div class="form-group">
                   # Orden<input id="id_orden" type="text" class="form-control" name="id_orden" aria-label="..." readonly="readonly" value="<? echo $id; ?>" required>
                 </div>
                <div class="form-group">
                  <input name="option" type="hidden"  value="carta" class="form-control" aria-label="...">
                </div>

                 <div class="form-group">
  
  <label class="col-md-4 control-label" >carta de porte</label>
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
      <input  class="form-control" name="carta" type="file" aria-label="..."  /> 
    </div>
  </div>
               
                  
          <div class="modal-footer">
            <button type="submit" class="btn btn-default" data-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-primary">Subir</button>
          </div>
        </div>
      </div>
    </div>
    </div>
    </div>
    
</form>

<form method="post" action="script/subirFactura.php" enctype="multipart/form-data">
    <div class="modal fade" id="manifiesto" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Subir manifiesto de carga</h4>
             </div>
            <div class="modal-body">
            <div class="form-group">
                   # Orden<input id="id_orden" type="text" class="form-control" name="id_orden" aria-label="..." readonly="readonly" value="<? echo $id; ?>" required>
                 </div>
                <div class="form-group">
                  <input name="option" type="hidden"  value="manifiesto" class="form-control" aria-label="...">
                </div>

                 <div class="form-group">
  
  <label class="col-md-4 control-label" >Manifiesto de carga</label>
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
      <input  class="form-control" name="manifiesto" type="file" aria-label="..."  /> 
    </div>
  </div>
               
                  
          <div class="modal-footer">
            <button type="submit" class="btn btn-default" data-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-primary">Subir</button>
          </div>
        </div>
      </div>
    </div>
    </div>
    </div>
    
</form>

<form method="post" action="script/subirFactura.php" enctype="multipart/form-data">
    <div class="modal fade" id="duca_t" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Subir Duca t</h4>
             </div>
            <div class="modal-body">
            <div class="form-group">
                   # Orden<input id="id_orden" type="text" class="form-control" name="id_orden" aria-label="..." readonly="readonly" value="<? echo $id; ?>" required>
                 </div>
                <div class="form-group">
                  <input name="option" type="hidden"  value="duca_t" class="form-control" aria-label="...">
                </div>

                 <div class="form-group">
  
  <label class="col-md-4 control-label" >Duca_t</label>
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
      <input  class="form-control" name="duca_t" type="file" aria-label="..."  /> 
    </div>
  </div>
               
                  
          <div class="modal-footer">
            <button type="submit" class="btn btn-default" data-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-primary">Subir</button>
          </div>
        </div>
      </div>
    </div>
    </div>
    </div>
    
</form>


<!-- ------------FIN DE CONTENIDO-----------------------------------------------------------------------------------------------  -->



 <script src="vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="vendors/nprogress/nprogress.js"></script>
    <!-- FullCalendar -->
    <script src="vendors/moment/min/moment.min.js"></script>
    <script src="vendors/fullcalendar/dist/fullcalendar.min.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="build/js/custom.min.js"></script>


</body>
<!-- END BODY -->
</html> 




   <?
/*
    include("connect.php");
     $sql="SELECT  * FROM orden WHERE estado='1' ";  
                      
     $rs=$mysqli->query($sql);

         while($row=$rs->fetch_assoc()){ 


               $id_orden=$row["id_orden"];

                   echo ' 

                                 <div id="rem'.$id_orden.'" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                            <h4  class="alert alert-info"><i class="fa fa-check-square"></i>   <strong>Impresion Nota de Remision</strong></h4>
                                        </div>
                                        <div class="modal-body">';



                                                    echo'<form action="produccion.orden.remision.php" method="get" target="_blank">';
                                                    $sql2="SELECT o.id_orden, do.cantidad, do.base, do.altura, do.trabajo, do.detalle, do.id_detalle_orden as iddetalle from orden as o, orden_detalle as do WHERE do.estado!='ANULADA' AND o.id_orden=do.id_orden AND o.id_orden=$id_orden and do.id_orden=$id_orden order by o.id_orden";


                                                                $rs2=$mysqli->query($sql2);
                                                                
                                                                $num=0;
                                                                while($row2=$rs2->fetch_assoc()){
                                                                $num++;

                                                                 

                                                                 echo ' 
                                                                <input type="checkbox" name="item'.$num.'" value="'.$row2['iddetalle'].'"> &nbsp;
                                                                <strong>Cantidad:</strong>
                                                                <input name="cant'.$num.'" type="text" id="cant" value="'.$row2['cantidad'].'" size="8" />
                                                                <br>
                                                                <strong>Detalle:</strong><br>
                                                                <textarea name="det'.$num.'" cols="70" id="det">'.$row2['detalle'].'</textarea><br><hr> '; 
                                                                
                                                               }

                                                                  echo'
                                                                  <input type="hidden" name="idorden" value="'.$id_orden.'">
                                                                  <input type="hidden" name="numero" value="'.$num.'">
                                                                      
                                                                  <strong>Envia:</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                  <input name="envia" id="envia" type="text"  size="20" />

                                                                  <br><br>
                                                                  <strong>Nota:</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                  <input type="text" name="note" maxlength="20">

                                                                       <br><br>
                                                                       <strong>Motorista:</strong>
                                                                       <input name="motorista" id="motorista" type="text"  size="20" />
                                                                
                                                                       <br><br>
                                                                       <input type="submit" name="button"  value=" Imprimir" /></form>';


                                                 




                                                       
                   echo '                     
                                                  </div>
                                                  <div class="modal-footer">
                                                      <button data-dismiss="modal" class="btn green">Cerrar</button>
                                                  </div>
                                              </div>
                                          </div>
                                      </div>';
                                                                     
 


 }
 $mysqli->close();

 */
 

?>