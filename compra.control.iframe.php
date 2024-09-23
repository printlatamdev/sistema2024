 <!DOCTYPE html>
 <!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
 <!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
 <!--[if !IE]><!-->
 <html lang="en" class="no-js">
 <!--<![endif]-->
 <!-- BEGIN HEAD -->

 <head>



     <link href="css/font.css" rel="stylesheet" type="text/css" />
     <link href="suministros/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
     <link href="suministros/assets/global/css/components.css" id="style_components" rel="stylesheet" type="text/css" />


 </head>

 <body>

     <?php

        $base = $_REQUEST['base'];

        include($base."_db.php");

        $serve =  $_SERVER['REQUEST_URI'];
        $serve1 = $_SERVER['SERVER_NAME'];
        $arr = explode("/", $serve);
        $subd = $arr[1];
        $uri = $serve1 . "/" . $subd;


        $compra = $_REQUEST['idorden'];


        $sql = "SELECT  * FROM compra WHERE  id_compra='" . $compra . "'";
        $rs = $mysqli->query($sql);


        while ($fila = $rs->fetch_row()) {
            $compra = $fila[0];
            $empresa = $fila[2];
            $id_empresa = $fila[1];
            $oc_imagen = $fila[10];
            $fac_imagen = $fila[12];
            $empre = base64_encode($fila[2]);
            $factura = $fila[12];
            $entrega = date('d-m-Y', strtotime($fila[5]));


            echo '    <div id="tab_' . $compra . '" class="tab-pane">
                                                  <div id="accordion' . $compra . '" class="panel-group">';

            $flg = 0;
            $type = 0;
            $rs2 = $mysqli->query("SELECT *  FROM `compra_detalle` WHERE id_compra='$compra'  ORDER BY id_detalle_compra ASC");


            $rowcount = mysqli_num_rows($rs2);

            if ($rowcount <= 0) {
                echo "<br><br><b>La orden de compra aun no contiene detalles.</b>";
            } else {

        ?>
             <!-- BEGIN UNORDERED LISTS PORTLET-->
             <div class="portlet box blue">
                 <div class="portlet-title">
                     <div class="caption">
                         <font color="white"><i class="fa  fa-caret-right"></i>Orden Compra:</font>&nbsp;<?= $compra ?>&nbsp;&nbsp;&nbsp;&nbsp;
                         <font color="white"><i class="fa  fa-caret-right"></i> Proveedor:</font>&nbsp;<?= $empresa ?>&nbsp;&nbsp;&nbsp;&nbsp;
                         <font color="white"><i class="fa  fa-caret-right"></i> Fecha:</font>&nbsp;<?= $entrega ?>&nbsp;&nbsp;&nbsp;&nbsp;



                     </div>

                 </div>
                 <div class="portlet-body">




                     <table width="100%" border="1" cellpadding="15">
                         <tr align="center">

                             <td><b>
                                     <font size="2px">AD</font>
                                 </b></td>
                             <td><b>
                                     <font size="2px">Especificación de Material</font>
                                 </b></td>
                             <td><b>
                                     <font size="2px">Cantidad</font>
                                 </b></td>
                             <td><b>
                                     <font size="2px">Precio</font>
                                 </b></td>
                             <td><b>
                                     <font size="2px">Total</font>
                                 </b></td>
                         </tr>
                         <tr align="center" height="12">
                             <td colspan="4"></td>
                         </tr>

                         <?

                            $t_o = "";
                            while ($fila_en = $rs2->fetch_assoc()) {

                                $idc = $fila_en["id_detalle_compra"];
                                $id_mat = $fila_en["id_material"];
                                $str = $fila_en["material"];
                                $mat = str_replace("Varios -", "", $str);
                                $pre = $fila_en["precio"];
                                $cat = $fila_en["cantidad"];
                                $estado = $fila_en["estado"];
                                $mater = base64_encode($fila_en["material"]);
                                $tot = $pre * $cat;
                                $costo_total = number_format($tot, 2, '.', '');
                                $t_o = $t_o + $costo_total;
                                if ($factura == '' || $factura == NULL) {
                                    $edit = '';
                                } else {


                                    if ($estado == 0) {
                                        $edit = '<img src="images/ds.png" width="30px">';
                                    } else {
                                        $edit = '<a target="_self" href="suministros.ingreso.automatico.php?compra=' . $compra . '&idc=' . $idc . '&id_empresa=' . $id_empresa . '&empresa=' . $empre . '&cantidad=' . $cat . '&id_mat=' . $id_mat . '&material=' . $mater . '&oc_imagen=' . $oc_imagen . '&fac_imagen=' . $fac_imagen . '"><img src="images/as.png" width="30px"></a>';
                                    }
                                }

                                echo ' <tr>
                                                                          <td align="center">' . $edit . '</td>
                                                                          <td align="left">&nbsp;&nbsp;' . $mat . ' &nbsp;&nbsp;&nbsp;</td>
                                                                          <td align="center">' . $cat . '</td>
                                                                          <td align="center">$' . $pre . '</td>
                                                                          <td align="right"> $' . $costo_total . '&nbsp;</td></tr>';
                            }

                            $sub_total = number_format($t_o, 2, '.', '');
                            $iv = 0.13 * $t_o;
                            $iva = number_format($iv, 2, '.', '');
                            $tf = $t_o + $iva;
                            $total_orden = number_format($tf, 2, '.', '');

                            ?>


                         <?
                            if ($_SESSION['base'] == 'esa') {

                            ?>
                             <tr align="center" height="12">
                                 <td colspan="5"></td>
                             </tr>
                             <tr align="right">
                                 <td colspan="4"><b>Subtotal</b>&nbsp;</td>
                                 <td><b>$<?= $sub_total ?></b>&nbsp;</td>
                             </tr>
                             <tr align="right">
                                 <td colspan="4"><b>IVA(13%)</b>&nbsp;</td>
                                 <td><b>$<?= $iva ?></b>&nbsp;</td>
                             </tr>
                             <tr align="right">
                                 <td colspan="4"><b>Costo Total</b>&nbsp;</td>
                                 <td><b>$<?= $total_orden ?></b>&nbsp;</td>
                             </tr>


                         <?   }  ?>

                     </table>



                     <div class="row">


                     </div>



                 </div>

             </div>
             </div>
             </div><br><br></div>

     <?

            }

            $mysqli->close();
        }

        $mysqli->close();


        ?>

     <? if ($factura == '' || $factura == NULL) {  ?>

         <p><b>Nota: Subir factura para habilitar ingreso de materiales a bodega.</b></p>
         <form action="compra.sql.php" method="post" enctype="multipart/form-data">
             <input type="hidden" name="bandera" value="5">
             <input type="hidden" name="compra" value="<?= $compra ?>">
             <input type="file" id="file" name="file" required /><br>
             <input type="submit" value="Enviar" class="btn blue">
         </form>

     <?   }  ?>

 </body>

 <style>
     #cld {
         border-style: ridge;
         border-width: 3px;
     }


     /* unvisited link */
     a:link {
         color: black;
     }

     /* visited link */
     a:visited {
         color: black;
     }

     /* mouse over link */
     a:hover {
         color: black;
     }

     /* selected link */
     a:active {
         color: black;
     }


     /* DivTable.com */
     .divTable {
         display: table;
         width: 100%;
     }

     .divTableRow {
         display: table-row;
     }

     .divTableHeading {
         background-color: #EEE;
         display: table-header-group;
     }

     .divTableCell,
     .divTableHead {
         /*border: 1px solid #999999;*/
         display: table-cell;
         padding: 3px 10px;
         border-bottom: 1px solid #000000;
         border-right: 1px solid #000000;
     }

     .divTableCell2 {
         /*border: 1px solid #999999;*/
         display: table-cell;
         padding: 3px 10px;
         border-bottom: 1px solid #000000;
         border-right: 1px solid #000000;
         width: 10%;
     }

     .divTableCell3 {
         /*border: 1px solid #999999;*/
         display: table-cell;
         padding: 3px 10px;
         border-bottom: 1px solid #000000;
         width: 10%;
     }




     .divTableHeading {
         background-color: #EEE;
         display: table-header-group;
         font-weight: bold;
     }

     .divTableFoot {
         background-color: #EEE;
         display: table-footer-group;
         font-weight: bold;
     }

     .divTableBody {
         display: table-row-group;
     }




     /*---------------------------------*/

     #sample_5 {
         border-style: solid;
         border-width: 1px;
         border-color: black;
     }


     #maintd {

         border-bottom: 1px solid #000000;
         border-right: 1px solid #000000;
     }

     #maintd2 {
         border-top: 1px solid #000000;
     }


     #maintd3 {
         border-bottom: 1px solid #000000;
     }

     #maintd4 {
         border-left: 1px solid #000000;
     }

     #maintd5 {
         border-left: 1px solid #000000;
         border-bottom: 1px solid #000000;
     }

     #maintd6 {
         border-top: 1px solid #000000;
         border-left: 1px solid #000000;
     }

     .dfs {
         background-color: #d3d3d3 !important;
     }

     /* Let's get this party started */
     ::-webkit-scrollbar {
         width: 12px;
     }

     /* Track */
     ::-webkit-scrollbar-track {
         -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
         -webkit-border-radius: 10px;
         border-radius: 10px;
     }

     /* Handle */
     ::-webkit-scrollbar-thumb {
         -webkit-border-radius: 10px;
         border-radius: 10px;
         background: rgba(​192, 192, 192, 0.3);
         -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.5);
     }

     ::-webkit-scrollbar-thumb:window-inactive {
         background: rgba(​192, 192, 192, 0.3);
     }



     /*------------------------------------------*/





     #fms {


         border-style: solid;
         border-width: 1px;
         padding: 20px;

         padding: 0px;
         margin-right: -1px;
         margin-bottom: -1px;
         margin-top: -1px;

     }

     #fmsd1 {

         /* height: 110px;*/
         border-bottom: thin solid #000000;
     }

     #fmsd2 {

         /*height: 170px;*/
         border-bottom: thin solid #000000;
     }

     #fmsd3 {

         /*height: 60px;*/
         /* border-bottom: thin solid #000000;  */
     }



     #fms3 {


         border-style: solid;
         border-width: 1px;
         padding: 20px;

         padding: 0px;
         margin-right: -1px;
         margin-bottom: -1px;
         margin-top: -1px;

     }

     #fms0 {

         display: flex;

     }


     .dataTables_filter input {
         width: 100px !important
     }



     body {


         background-color: "#ffffff" !important;

     }
 </style>


 <style type="text/css" media="screen">
     a:link {
         color: #000000;
         text-decoration: none;
     }

     a:visited {
         color: #000000;
         text-decoration: none;
     }

     a:hover {
         color: #000000;
         text-decoration: none;
     }

     a:active {
         color: #000000;
         text-decoration: underline;
     }
 </style>

 </html>