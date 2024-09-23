<?
//include("session.php");
//include("connect.php");

session_start();
if(!isset($_SESSION['vsClave']))
{
  header("location:login.php");
}

$id=$_SESSION['vsIdempresa'];

$id       = $_GET["id"];

   include("connect.php");
   $conexion = conexion();

  $consulta = mysqli_query($conexion,"select t1.id_logistica, t1.id_orden, t1.f_empaque, t1.p_vehiculo, t1.n_motorista, t1.destino, t1.status, t1.f_salida, t1.f_llegada,
   t1.m_carga, t1.carta_p, t1.factura, t1.duca_f, t1.duca_t, t1.nota_envio_cd, t1.orden_compra,t1.nota_envio, t1.fo_entrega, t1.estado,      t2.id_orden, t2.id_empresa, t2.empresa, t2.id_contacto, t2.contacto, t3.nombre, t3.celular, t3.email, t4.id_marca, t4.marca from logitica t1 inner join orden t2 on t1.id_orden=t2.id_orden inner join contacto t3 on t2.id_contacto=t3.id_contacto inner JOIN pop_marca t4 on t1.id_marca=t4.id_marca where t1.id_orden='".$id."'
 ");


                                while ($row = mysqli_fetch_array($consulta))
                                   {

                                    $manifiesto=$row[9];
                                    $carta_porte=$row[10];
                                    $factura=$row[11];
                                    $duca_f=$row[12];
                                    $duca_t=$row[13];  
                                    $nota_envio_cd=$row[14];
                                    $orden_compra=$row[15];
                                    
                                    
                                                              


                                   }




                                   if ($factura==null) {

                                    $mensaje1="Sin subir";
                                     # code...
                                   }
                                   else{

                                    $mensaje1="Ver Factura";
                                   }

                                 


                                 if ($duca_f==null) {

                                  $mensaje2="Sin subir";
                                   # code...
                                 }
                                  else{

                                            $mensaje2="Ver Duca_f";

                                  }

                                   if ($nota_envio_cd==null) {

                                  $mensaje3="Sin subir";
                                   # code...
                                 }
                                  else{

                                            $mensaje3="Ver nota_envio_cd";

                                  }


                                   if ($orden_compra==null) {

                                  $mensaje4="Sin subir";
                                   # code...
                                 }
                                  else{

                                            $mensaje4="Ver orden_compra";

                                  }
                               



                               if ($carta_porte==null) {

                                  $mensaje5="Sin subir";
                                   # code...
                                 }
                                  else{

                                            $mensaje5="Ver Carta_porte";

                                  }

                                   if ($manifiesto==null) {

                                  $mensaje6="Sin subir";
                                   # code...
                                 }
                                  else{

                                            $mensaje6="Ver Manifiesto";

                                  }


                                   if ($duca_t==null) {

                                  $mensaje7="Sin subir";
                                   # code...
                                 }
                                  else{

                                            $mensaje7="Ver Duca_t";

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
        <th>Documento</th>
        <th>Documento pdf</th>
       
      </tr>
    </thead>
    <tbody>
      <tr  class="info">
        <td>Factura</td>
        <!--<td><? //echo $mensaje1; ?></td>-->
        <?
              if ($mensaje1=="Sin subir") {
                # code...
              

        ?>
           <td><? echo $mensaje1; ?></td>

           <?}
           
             else{

           ?>

         <td><a href="../sistema/artes_esa17/<?php echo $factura; ?>"> <? echo $mensaje1; ?></a></td>
         <?}?>
       
</td>
      </tr>      
      <tr class="success">
        <td>Nota Envio</td>
          <?
              if ($mensaje3=="Sin subir") {
                # code...
              

        ?>
           <td><? echo $mensaje3; ?></td>

           <?}
           
             else{

           ?>

         <td><a href="../sistema/artes_esa17/<?php echo $nota_envio_cd; ?>"> <? echo $mensaje3; ?></a></td>
         <?}?>
       
      </tr>
      <tr class="danger">
        <td>Duca F</td>
           <?
              if ($mensaje2=="Sin subir") {
                # code...
              

        ?>
           <td><? echo $mensaje2; ?></td>

           <?}
           
             else{

           ?>

         <td><a href="../sistema/artes_esa17/<?php echo $duca_f; ?>"> <? echo $mensaje2; ?></a></td>
         <?}?>
     
      </tr>
      <tr class="info">
        <td>Orden Compra</td>  <?
              if ($mensaje4=="Sin subir") {
                # code...
              

        ?>
           <td><? echo $mensaje4; ?></td>

           <?}
           
             else{

           ?>

         <td><a href="../sistema/artes_esa17/<?php echo $orden_compra; ?>"> <? echo $mensaje4; ?></a></td>
         <?}?>
       
      </tr>


      <tr class="info">
        <td>Carta porte</td>  <?
              if ($mensaje5=="Sin subir") {
                # code...
              

        ?>
           <td><? echo $mensaje5; ?></td>

           <?}
           
             else{

           ?>

         <td><a href="../sistema/artes_esa17/<?php echo $carta_porte; ?>"> <? echo $mensaje5; ?></a></td>
         <?}?>
        
      </tr>



      <tr class="info">
        <td>Manifiesto de carga</td>  <?
              if ($mensaje6=="Sin subir") {
                # code...
              

        ?>
           <td><? echo $mensaje6; ?></td>

           <?}
           
             else{

           ?>

         <td><a href="../sistema/artes_esa17/<?php echo $manifiesto; ?>"> <? echo $mensaje6; ?></a></td>
         <?}?>
        
      </tr>



      <tr class="info">
        <td>Duca t</td>  <?
              if ($mensaje7=="Sin subir") {
                # code...
              

        ?>
           <td><? echo $mensaje7; ?></td>

           <?}
           
             else{

           ?>

         <td><a href="../sistema/artes_esa17/<?php echo $duca_t; ?>"> <? echo $mensaje7; ?></a></td>
         <?}?>
      
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
    <form method="post" action="script/subirFactura.php" enctype="multipart/form-data">
    <div class="modal fade" id="duca" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Subir Duca_F</h4>
             </div>
            <div class="modal-body">
            <div class="form-group">
                   # Orden<input id="id_orden" type="text" class="form-control" name="id_orden" aria-label="..." readonly="readonly" value="<? echo $id; ?>" required>
                 </div>
                <div class="form-group">
                  <input name="option" type="hidden"  value="duca_f" class="form-control" aria-label="...">
                </div>

                 <div class="form-group">
  
  <label class="col-md-4 control-label" >Duca_F</label>
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
      <input  class="form-control" name="duca" type="file" aria-label="..."  /> 
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
    <div class="modal fade" id="nota" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Subir Nota Envio</h4>
             </div>
            <div class="modal-body">
            <div class="form-group">
                   # Orden<input id="id_orden" type="text" class="form-control" name="id_orden" aria-label="..." readonly="readonly" value="<? echo $id; ?>" required>
                 </div>
                <div class="form-group">
                  <input name="option" type="hidden"  value="nota_envio_cd" class="form-control" aria-label="...">
                </div>

                 <div class="form-group">
  
  <label class="col-md-4 control-label" >Nota envio cd</label>
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
      <input  class="form-control" name="nota" type="file" aria-label="..."  /> 
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
    <div class="modal fade" id="factura" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Subir factura</h4>
             </div>
            <div class="modal-body">
            <div class="form-group">
                   # Orden<input id="id_orden" type="text" class="form-control" name="id_orden" aria-label="..." readonly="readonly" value="<? echo $id; ?>" required>
                 </div>
                <div class="form-group">
                  <input name="option" type="hidden"  value="factura" class="form-control" aria-label="...">
                </div>

                 <div class="form-group">
  
  <label class="col-md-4 control-label" >Factura</label>
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
      <input  class="form-control" name="factura" type="file" aria-label="..."  /> 
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


<!----------------FIN DE CONTENIDO-------------------------------------------------------------------------->



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