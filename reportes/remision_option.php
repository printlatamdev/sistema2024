<?php
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
    <meta charset="utf-8" />
    <title>Sistema Color Digital</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
    <link href="assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css" />
    <link href="assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->
    <!-- BEGIN PAGE LEVEL STYLES -->
    <link rel="stylesheet" type="text/css" href="assets/global/plugins/datatables/extensions/Scroller/css/dataTables.scroller.min.css" />
    <link rel="stylesheet" type="text/css" href="assets/global/plugins/datatables/extensions/ColReorder/css/dataTables.colReorder.min.css" />
    <link rel="stylesheet" type="text/css" href="assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css" />

    <!-- END PAGE LEVEL STYLES -->
    <!-- BEGIN PAGE LEVEL PLUGIN STYLES -->
    <link href="assets/global/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
    <link href="assets/global/plugins/fullcalendar/fullcalendar.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/global/plugins/jqvmap/jqvmap/jqvmap.css" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL PLUGIN STYLES -->
    <!-- BEGIN PAGE STYLES -->
    <link href="assets/admin/pages/css/tasks.css" rel="stylesheet" type="text/css" />
    <!-- END PAGE STYLES -->
    <!-- BEGIN THEME STYLES -->
    <link href="assets/global/css/components.css" id="style_components" rel="stylesheet" type="text/css" />
    <link href="assets/global/css/plugins.css" rel="stylesheet" type="text/css" />
    <link href="assets/admin/layout/css/layout.css" rel="stylesheet" type="text/css" />
    <link href="assets/admin/layout/css/themes/darkblue.css" rel="stylesheet" type="text/css" id="style_color" />
    <link href="assets/admin/layout/css/custom.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="assets/global/plugins/select2/select2.css" />



    <link rel="stylesheet" type="text/css" href="assets/global/plugins/clockface/css/clockface.css" />
    <link rel="stylesheet" type="text/css" href="assets/global/plugins/bootstrap-datepicker/css/datepicker3.css" />
    <link rel="stylesheet" type="text/css" href="assets/global/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css" />
    <link rel="stylesheet" type="text/css" href="assets/global/plugins/bootstrap-colorpicker/css/colorpicker.css" />
    <link rel="stylesheet" type="text/css" href="assets/global/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css" />
    <link rel="stylesheet" type="text/css" href="assets/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css" />
    <!-- END THEME STYLES -->



    <link rel="shortcut icon" href="images/color.ico" />
    <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- FullCalendar -->
    <link href="vendors/fullcalendar/dist/fullcalendar.min.css" rel="stylesheet">
    <link href="vendors/fullcalendar/dist/fullcalendar.print.css" rel="stylesheet" media="print">
</head>

<body>
    <?php 
    if (isset($_REQUEST['id'])) {



        $sql = "SELECT  * FROM orden WHERE id_orden='" . $_REQUEST['id'] . "' ";

        include("../esa_db.php");
        $rs = $mysqli->query($sql);

        while ($row = $rs->fetch_assoc()) {


            $id_orden = $row["id_orden"];
            $empresa = $row["empresa"];
            $contacto = $row["contacto"];
        }
    }
    //echo $id_orden;

    echo ' 

                                 <div  tabindex="-1" role="dialog" aria-labelledby="myModalLabel2" >
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                            <h4  class="alert alert-info"><i class="fa fa-check-square"></i>   <strong>SELECCIONE LUGAR DE IMPRESION</strong></h4>
                                        </div>
                                        <div class="modal-body">';



    echo '<form action="remision.php" method="POST" target="_self" >
                                                    ';







    echo '
                                                                  
                                                                      
                                                                 
                                                                   
                                                                  
                                                                       
                                                                <input id="btnLogC" class="btn btn-primary" name="planta" type="submit" value="planta"/> <img id="planta" type=image src="images/planta.png" width="200" height="150" name="planta" >

                                                                       
                                                                    <input id="btnLogC" class="btn btn-primary" name="admin" type="submit" value="Administracion"/><img id="admin" type=image src="images/admin.png" width="150" height="150" name="admin" ><br><br>
                                                                   #Orden&nbsp;&nbsp;&nbsp;<input name="id" type="text" id="cant" value="' . $id_orden . '" size="8" readonly="readonly" />

                                                                   <input type="hidden" name="base" value="' . $base . '">
                                                                <br>
                                                                        





                                                                       </form>';








    echo '                     
                                                  </div>

                                                                                                <div class="form-inline">



                                                  <div class="modal-footer">
                                                      
                                                  </div>
                                              </div>
                                          </div>
                                      </div>';
    ?>

    <div class="form-inline">


        <div class="clearfix">
        </div>
        <!-- BEGIN CONTAINER -->







        <!-- ------------CONTENIDO-----------------------------------------------------------------------------------------------------  -->

        <?php 


        if (isset($_REQUEST['id'])) {



            include("../esa_db.php");
            $sql = "SELECT  * FROM orden WHERE id_orden='" . $_REQUEST['id'] . "' ";

            $rs = $mysqli->query($sql);

            while ($row = $rs->fetch_assoc()) {


                $id_orden = $row["id_orden"];
                $empresa = $row["empresa"];
                $contacto = $row["contacto"];
                $remision = 0;
                if ($remision == 1) {

                    echo ' 

                                 <div id="rem' . $id_orden . '"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel2" >
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                            <h4  class="alert alert-info"><i class="fa fa-check-square"></i>   <strong>Impresion Nota de Remision - Orden ' . $id_orden . '</strong></h4>
                                        </div>
                                        <div class="modal-body">';



                    echo '<form action="produccion.orden.remision2.php" method="get" target="_self">
                                                    <input type="hidden" name="empresa" value="' . $empresa . '" >
                                                    <input type="hidden" name="contacto" value="' . $contacto . '" >';
                    $sql2 = "SELECT o.id_orden, do.cantidad, do.base, do.altura, do.trabajo, do.detalle, do.id_detalle_orden as iddetalle from orden as o, orden_detalle as do WHERE do.estado!='ANULADA' AND o.id_orden=do.id_orden AND o.id_orden=$id_orden and do.id_orden=$id_orden order by o.id_orden";


                    $rs2 = $mysqli->query($sql2);

                    $num = 0;
                    while ($row2 = $rs2->fetch_assoc()) {
                        $num++;



                        echo ' 
                                                                <input type="checkbox" name="item' . $num . '" value="' . $row2['iddetalle'] . '"> &nbsp;
                                                                <strong>Cantidad:</strong>
                                                                <input name="cant' . $num . '" type="text" id="cant" value="' . $row2['cantidad'] . '" size="8" />
                                                                <br>
                                                                <strong>Detalle:</strong><br>
                                                                <textarea name="det' . $num . '" cols="70" id="det">' . $row2['detalle'] . '</textarea><br><hr> ';
                    }

                    echo '
                                                                  <input type="hidden" name="idorden" value="' . $id_orden . '">
                                                                  <input type="hidden" name="numero" value="' . $num . '">
                                                                      
                                                                  <strong>Envia:</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                  <input name="envia" id="envia" type="text"  size="20" />

                                                                  <br><br>
                                                                  <strong>Nota:</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                  <input type="text" name="note" maxlength="20">

                                                                       <br><br>
                                                                       <strong>Motorista:</strong>
                                                                       <input name="motorista" id="motorista" type="text"  size="20" />
                                                                
                                                                       <br><br>
                                                                       <input type="submit" name="button"  value=" Imprimir" />





                                                                       </form>';








                    echo '                     
                                                  </div>

                                                                                                <div class="form-inline">
<button class="btn btn-primary" data-toggle="modal" data-target="#ModalProceso">Imprimir</button>
</div>


                                                  <div class="modal-footer">
                                                      <button data-dismiss="modal" class="btn green">Cerrar</button>
                                                  </div>
                                              </div>
                                          </div>
                                      </div>';
                } else {
                }
            }
            $mysqli->close();
        }
        ?>





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




<?php 
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