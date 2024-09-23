<?
include("session.php");
include("connect2.php");

$id       = $_GET["id"];
 $conexion = conexion2();

     $consulta = mysqli_query($conexion," select status, f_hora from bitacora_s where id_orden='".$id."'
 ");


                               

                               




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

<link href="/your-path-to-fontawesome/css/fontawesome.css" rel="stylesheet">
  <link href="/your-path-to-fontawesome/css/brands.css" rel="stylesheet">
  <link href="/your-path-to-fontawesome/css/solid.css" rel="stylesheet">
<!-- BEGIN PAGE LEVEL STYLES -->
<link rel="stylesheet" type="text/css" href="assets/global/plugins/datatables/extensions/Scroller/css/dataTables.scroller.min.css"/>
<link rel="stylesheet" type="text/css" href="assets/global/plugins/datatables/extensions/ColReorder/css/dataTables.colReorder.min.css"/>
<link rel="stylesheet" type="text/css" href="assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css"/>

<script src="https://kit.fontawesome.com/a076d05399.js"></script>

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

<link href="assets/global/css/all.css" rel="stylesheet" type="text/css"/>
<link href="assets/global/css/all.min.css" rel="stylesheet" type="text/css"/>
<link href="assets/global/css/fontawesome.css" rel="stylesheet" type="text/css"/>
<link href="assets/global/css/fontawesome.min.css" rel="stylesheet" type="text/css"/>

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
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>



<link rel="shortcut icon" href="images/color.ico"/>
 <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- FullCalendar -->
    <link href="vendors/fullcalendar/dist/fullcalendar.min.css" rel="stylesheet">
    <link href="vendors/fullcalendar/dist/fullcalendar.print.css" rel="stylesheet" media="print">
    <style>
@import url(https://fonts.googleapis.com/css?family=Roboto:400,500,700,300,100);

body {
  background-color: #4D4E69;
  font-family: "Roboto", helvetica, verdana, sans-serif;
  font-size: 16px;
  font-weight: 1;
  text-rendering: optimizeLegibility;
}

div.table-title {
   display: block;
  margin: auto;
  max-width: 10px;
  padding:5px;
  width: 70%;
}

.table-title h3 {
   color: #ffffff;
   font-size: 30px;
   font-weight: 100;
   font-style:normal;
   font-family: "Roboto", helvetica, verdana, sans-serif;
   text-shadow: -1px -1px 1px rgba(0, 0, 0, 0.1);
   text-transform:uppercase;
}


/*** Table Styles **/

.table-fill {
  background: white;
  border-radius:3px;
  border-collapse: collapse;
  height: 200px;
  margin: auto;
  max-width: 500px;
  padding:5px;
  width: 100%;
  box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
  animation: float 5s infinite;
}
 
th {
  color:#D5DDE5;;
  background:#1b1e24;
  border-bottom:4px solid #9ea7af;
  border-right: 1px solid #343a45;
  font-size:23px;
  font-weight: 100;
  padding:24px;
  text-align:left;
  text-shadow: 0 1px 1px rgba(0, 0, 0, 0.1);
  vertical-align:middle;
}

th:first-child {
  border-top-left-radius:3px;
}
 
th:last-child {
  border-top-right-radius:3px;
  border-right:none;
}
  
tr {
  border-top: 1px solid #C1C3D1;
  border-bottom-: 1px solid #C1C3D1;
  color:#666B85;
  font-size:16px;
  font-weight:normal;
  text-shadow: 0 1px 1px rgba(256, 256, 256, 0.1);
}
 
tr:hover td {
  background:#4E5066;
  color:#FFFFFF;
  border-top: 1px solid #22262e;
}
 
tr:first-child {
  border-top:none;
}

tr:last-child {
  border-bottom:none;
}
 
tr:nth-child(odd) td {
  background:#EBEBEB;
}
 
tr:nth-child(odd):hover td {
  background:#4E5066;
}

tr:last-child td:first-child {
  border-bottom-left-radius:3px;
}
 
tr:last-child td:last-child {
  border-bottom-right-radius:3px;
}
 
td {
  background:#FFFFFF;
  padding:20px;
  text-align:left;
  vertical-align:middle;
  font-weight:100;
  font-size:18px;
  text-shadow: -1px -1px 1px rgba(0, 0, 0, 0.1);
  border-right: 1px solid #C1C3D1;
}

td:last-child {
  border-right: 0px;
}

th.text-left {
  text-align: left;
}

th.text-center {
  text-align: center;
}

th.text-right {
  text-align: right;
}

td.text-left {
  text-align: left;
}

td.text-center {
  text-align: center;
}

td.text-right {
  text-align: right;
}
</style>
</head>

<body>
<div class="table-title">

</div>
<table class="table-fill">
<thead>
<tr>
<th class="text-left">Proceso</th>
<th class="text-left">Fecha/Hora</th>
</tr>
</thead>
<tbody class="table-hover">
  <?php  while ($row = mysqli_fetch_array($consulta)){

                                   ?>
    <tr>
      
      <td class="text-left">  
        <?php if (($row['status'])=="PROCESO"):?>
          <i class="fa fa-cog fa-spin"></i> &nbsp; &nbsp; <?php echo $row[   'status'     ];  ?><?php endif ?>
        <?php if (($row['status'])=="TRANSITO"):?>
          <i class="fa fa-truck" aria-hidden="true"></i> &nbsp; &nbsp; <?php echo $row[   'status'     ];  ?><?php endif ?>
        <?php if (($row['status'])=="CARGANDO"):?>
          <i class="fa fa-users"></i> &nbsp; &nbsp; <?php echo $row[   'status'     ];  ?><?php endif ?>
        <?php if (($row['status'])=="DESPACHO"):?>
          <i class="fa fa-book" aria-hidden="true"></i> &nbsp; &nbsp; <?php echo $row[   'status'     ];  ?><?php endif ?>
        <?php if (($row['status'])=="ADUANA DE SALIDA"):?>
          <i class="fa fa-flag-checkered"></i> &nbsp; &nbsp; <?php echo $row[   'status'     ];  ?><?php endif ?>
        <?php if (($row['status'])=="ADUANA DE DESTINO"):?>
          <i class="fa fa-building" aria-hidden="true"></i> &nbsp; &nbsp; <?php echo $row[   'status'     ];  ?><?php endif ?>
        <?php if (($row['status'])=="ENTREGADO"):?>
          <i class="fa fa-check-circle" aria-hidden="true"></i>&nbsp; &nbsp; <?php echo $row[   'status'     ];  ?><?php endif ?>
        <?php if (($row['status'])=="PROBLEMA"):?>
          <i class="fa fa-exclamation-triangle" aria-hidden="true"></i> &nbsp; &nbsp; <?php echo $row[   'status'     ];  ?><?php endif ?>  </td>
          <td width="" class="text-left">  <?php echo $row[   'f_hora'     ];  ?>  </td>
    </tr>
        <?php
                                 }
                               ?>

</tbody>
</table>


  

  </body>
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