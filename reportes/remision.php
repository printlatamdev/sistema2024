
<?
include("session.php");
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
</head>

<body >



<div class="clearfix">
</div>
<!-- BEGIN CONTAINER -->

			

	

<!-- ------------CONTENIDO-----------------------------------------------------------------------------------------------------  -->

 <?

       if(isset($_POST["planta"]))
    $ruta=$_POST["planta"];
else if(isset($_POST["admin"]))
    $ruta=$_POST["admin"];

//$planta=$_POST['planta'];



$id_orden=$_POST['id'];
    include("connect_reportes.php");
     $sql="SELECT  * FROM orden WHERE id_orden='".$id_orden."' ";  
                      
     $rs=$mysqli->query($sql);

         while($row=$rs->fetch_assoc()){ 
               

              // $id_orden=$id;
               //$id_orden=$row["id_orden"];
               $empresa=$row["empresa"];
               $contacto=$row["contacto"];
                //echo $id_orden;
          

               
                   echo ' 

                                 <div id="rem'.$id_orden.'"   tabindex="-1" role="dialog" aria-labelledby="myModalLabel2" >
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                            <h4  class="alert alert-info"><i class="fa fa-check-square"></i>   <strong>Impresion Nota de Remision - Orden '.$id_orden.'  '.$ruta.'</strong></h4>
                                        </div>
                                        <div class="modal-body">';
                                                    


                                                    echo'<form action="produccion.orden.remision2.php" method="post" target="_self">
                                                    <input type="hidden" name="empresa" value="'.$empresa.'" >
                                                    <input type="hidden" name="contacto" value="'.$contacto.'" >';
                                                    $sql2="SELECT o.id_orden, do.cantidad, do.base, do.altura, do.trabajo, do.detalle, do.id_detalle_orden as iddetalle from orden as o, orden_detalle as do WHERE do.estado!='ANULADA' AND o.id_orden=do.id_orden AND o.id_orden=$id_orden and do.id_orden=$id_orden order by o.id_orden";


                                                                $rs2=$mysqli->query($sql2);
                                                                
                                                                $num=0;
                                                                while($row2=$rs2->fetch_assoc()){
                                                                $num++;

                                                                 

                                                                 echo ' 
                                                                <input type="checkbox" name="item'.$num.'" value="'.$row2['iddetalle'].'"> &nbsp;
                                                                <strong>Cantidad:</strong>
                                                                <input name="cant'.$num.'" type="text" id="cant" value="'.$row2['cantidad'].'" size="8" />'.$row2['trabajo'].'
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
                                                                       <input type="submit" name="button"  value=" Imprimir" /> imprimiendo en :&nbsp;&nbsp;&nbsp;<input name="ruta" type="text" id="ruta" value="'.$ruta.'" size="15" readonly="readonly" /></form>';


                                                 




                                                       
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


 
?>

    	
  


<!-- ------------FIN DE CONTENIDO-----------------------------------------------------------------------------------------------  -->





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