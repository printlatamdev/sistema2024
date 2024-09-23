

 <link rel="stylesheet" href="css/estilos.css">
  <link rel="stylesheet" href="https://necolas.github.io/normalize.css/3.0.2/normalize.css">
  <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>

  
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



  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="bower_components/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">


<?php


                                                        
                        include("conect2.php");


                         $orden=$_REQUEST['idorden'];


                         $sql="SELECT  * FROM pop WHERE estado='1' AND id_orden='".$orden."'";
                         $rs=$mysqli->query($sql);


                        while ($fila = $rs->fetch_row()) 
                            { 
                                $orden=$fila[0];
                                $empresa=$fila[2];
                                $entrega=date('d-m-Y', strtotime($fila[6]));
                                
                                          
                                        echo '    <div id="tab_'.$orden.'" class="tab-pane">
                                                  <div id="accordion'.$orden.'" class="panel-group">';
                            
                                                            $flg=0;
                                                            $type=0;
                                                            $rs2=$mysqli->query("SELECT *  FROM `pop_detalle` WHERE id_orden='$orden' AND estado!='ANULADA' ORDER BY id_detalle_orden ASC");

                                                          
                                           
                                                            while ($fila2 = $rs2->fetch_assoc()) 
                                                                { 

                                                               
                                                                    
                                                                    $flg=$flg + 1;
                                                                    $id_det=$fila2['id_detalle_orden'];
                                                                    $cantidad=$fila2['cantidad'];
                                                                    $fondo=$fila2['fondo'];
                                                                    $altura=$fila2['altura'];
                                                                    $base=$fila2['base'];
                                                                    $coti=$fila2['cot'];
                                                                    $trabajo=$fila2['trabajo'];
                                                                    $nom_material=$fila2['material'];
                                                                    $nom_rigido=$fila2['rigido'];
                                                                    $nom_laminado=$fila2['laminado'];
                                                                    $nom_equipo=$fila2['equipo'];
                                                                    $impresion=$fila2['tiro'];
                                                                    $nota=$fila2['detalle'];
                                                                    $arte=$fila2['arte'];
                                                                    $cot=$fila2['cot'];
                                                                    $acabado=$fila2['acabado'];
                                                                    $completo=$fila2['completo'];

                                                                     //$findet="<font color='white'><a class='' data-toggle='modal' href='#findet".$fila2['id_detalle_orden']."'><i class='fa fa-wrench'></i></i></a></font>";
                                                                      $findet='';

                                                                        if ($arte=="") {
                                                                            $arte="images/noiamge.png";
                                                                        }else{
                                                                            $arte="../sistema/artes_".$_SESSION['base'].$_SESSION['year']."/".$fila2['arte'];
                                                                        } 


                                                                

                                                                          $complete="<a class='' data-toggle='modal' href='#static".$id_det."'><span class='label label-sm label-success'><b>Completo</b></span></a>";


                                                                               /*
                                                                                 <font color="white"><i class="fa  fa-caret-right"></i> Cliente:</font> '.$empresa.' &nbsp;&nbsp;&nbsp;&nbsp; 
                                                                                            <font color="white"><i class="fa  fa-caret-right"></i> F. Entrega:</font> '.$entrega.' &nbsp;&nbsp;&nbsp;&nbsp;
                                                                                            <font color="white"><i class="fa  fa-caret-right"></i> Cot:</font> '.$cot.' &nbsp;&nbsp;&nbsp;&nbsp;
                                                                                            <a href="javascript:$(\'#myCollapse\').click();"></a>
                                                                                            */

                                                                            echo'
                                                                                 <!-- BEGIN UNORDERED LISTS PORTLET-->
                                                                                <div  >

                                                                                

                                                                            

                                                                                 






                                                                                      <div class="row">

                                                                                                  <div id="fms0" class="col-md-12">

                                                                                                          <div id="fms" class="col-md-6">

                                                                                                                        <div id="fmsd1" class="col-md-12">

                                                                                                                                  <label class="control-label"><strong>Mueble&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</strong></label>
                                                                                                                                    '.$trabajo.'

                                                                                                                                    <div class="clearfix"></div>


                                                                                                                                    <label class="control-label"><strong>Cantidad&nbsp;&nbsp;&nbsp;:</strong></label>
                                                                                                                                    '.$cantidad.'  &nbsp;&nbsp; 

                                                                                                                                        '.$complete.': <label id="cpt'.$id_det.'" class="cpt'.$id_det.'" >'.$completo.'</label>


                                                                                                                                    <div class="clearfix"></div>
                                                                                                                                

                                                                                                                                    <label class="control-label "><strong>Tamaño&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</strong></label>
                                                                                                                                    '.$base.' (base) X '.$altura.' (altura) X '.$fondo.' (fondo) Metros.
   
                                                                                                                                    

                                                                                                                                    <div class="clearfix"></div>
                                                                                                                                

                                                                                                                        </div>

                                                                                                                       
                                                                                                                        <div id="fmsd3" class="col-md-12">

                                                                                                                         <label class="control-label "><strong>Nota:</strong></label>
                                                                                                                         '.$nota.' 
                                                                                                                                        

                                                                                                                        </div>

                                                                                                                       
                                                                                                                          
                                                                                                                      
                                                                                                          </div>  


                                                                                                          <div id="fms3" class="col-md-6">   

                                                                                                          <center>
                                                                                                          <a href="'.$arte.'" target="_blank"><img width="210px"   src="'.$arte.'"></a>
                                                                                                          </center> 

                                                                                                          </div>




                                                                                                  </div>
                                                                                                </div> <br>';
                                                                                                $arte="";



//******************************************************************************************************************************************************


                                                      $rs3=$mysqli->query("SELECT *  FROM `pop_pliego` WHERE id_orden='$orden' AND id_detalle='$id_det' AND estado!='ANULADA' ORDER BY id_detalle_pliego ASC");

                                                          
                                           
                                                            while ($fila3 = $rs3->fetch_assoc()) 
                                                                { 

                                                               
                                                                    
                                                                    $flg3=$flg3 + 1;
                                                                    //$id=$fila2[0];
                                                                    $pliego=$fila3['pliego'];
                                                                    $cantidad=$fila3['cantidad'];
                                                                    $altura=$fila3['altura'];
                                                                    $base=$fila3['base'];
                                                                    $coti=$fila3['cot'];
                                                                    $trabajo=$fila3['trabajo'];
                                                                    $nom_material=$fila3['material'];
                                                                    $nom_rigido=$fila3['rigido'];
                                                                    $nom_laminado=$fila3['laminado'];
                                                                    $nom_equipo=$fila3['equipo'];
                                                                    $impresion=$fila3['tiro'];
                                                                    $nota=$fila3['detalle'];
                                                                    $arte2=$fila3['arte'];
                                                                    $cot=$fila3['cot']; 
                                                                    $acabado=$fila3['acabado'];
                                                                    $tiro=$fila3['tiro'];

                                                                    $c_corte=$fila3['completo_corte'];
                                                                    $c_imp=$fila3['completo_imp'];

                                                                     //$findet="<font color='white'><a class='' data-toggle='modal' href='#findet".$fila2['id_detalle_orden']."'><i class='fa fa-wrench'></i></i></a></font>";
                                                                      $findet='';

                                                                        if ($arte2=="") {
                                                                             $arte2="images/noiamge.png";
                                                                        }else{
                                                                            $arte2="../sistema/artes_".$_SESSION['base'].$_SESSION['year']."/".$fila3['arte'];
                                                                        } 


                                                                     if ($pliego=="COMBINADO") {
                                                                        $color_pliego="red";
                                                                    } else {
                                                                        $color_pliego="green";
                                                                    }



                                                                        echo'
                                                                                <div style="margin-bottom: 0px"  class="portlet box '.$color_pliego.'"><br></div>
                                                                                <div class="row">
                                                                                               
                                                                                                  <div id="fms0" class="col-md-12">

                                                                                                          <div id="fms" class="col-md-6">

                                                                                                                        <div id="fmsd1" class="col-md-12">

                                                                                                                                  <label class="control-label"><strong>Pliego&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</strong></label>
                                                                                                                                     '.$pliego.'

                                                                                                                                    <div class="clearfix"></div>


                                                                                                                                    <label class="control-label"><strong>Cantidad&nbsp;&nbsp;&nbsp;:</strong></label>
                                                                                                                                    '.$cantidad.'  
                                                                                                                                    &nbsp;&nbsp;
                                                                                                                                     <strong><font color="green">Impresiones:</font></strong> '.$c_imp.' 
                                                                                                                                     &nbsp;&nbsp;
                                                                                                                                     <strong><font color="green">Corte:</font></strong> '.$c_corte.' 


                                                                                                                                    <div class="clearfix"></div>
                                                                                                                                

                                                                                                                                    <label class="control-label "><strong>Tamaño&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</strong></label>
                                                                                                                                    '.$base.' (base) X '.$altura.' (altura) Metros.
   
                                                                                                                                    



                                                                                                                                    <div class="clearfix"></div>


                                                                                                                                    <label class="control-label"><strong>Material&nbsp;&nbsp;&nbsp;&nbsp;:</strong></label>
                                                                                                                                    '.$nom_material.'


                                                                                                                                    <div class="clearfix"></div>


                                                                                                                                    <label class="control-label"><strong>Equipo&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</strong></label>
                                                                                                                                    '.$nom_equipo.'


                                                                                                                                    <div class="clearfix"></div>

                                                                                                                                    <label class="control-label"><strong>Impresion&nbsp;:</strong></label>
                                                                                                                                    '.$tiro.'

                                                                                                                                    <div class="clearfix"></div>
                                                                                                                                

                                                                                                                        </div>

                                                                                                                       
                                                                                                                        <div id="fmsd3" class="col-md-12">

                                                                                                                         <label class="control-label "><strong>Nota:</strong></label>
                                                                                                                         '.$nota.' 
                                                                                                                                        

                                                                                                                        </div>

                                                                                                                       
                                                                                                                          
                                                                                                                      
                                                                                                          </div>  


                                                                                                          <div id="fms3" class="col-md-6">   

                                                                                                          <center>
                                                                                                          <a href="'.$arte2.'" target="_blank"><img width="210px"   src="'.$arte2.'"></a>
                                                                                                          </center> 

                                                                                                          </div>




                                                                                                  </div>
                                                                                                </div><br>';
                                                                                                $arte2="";




                                                                    } 






                                                                                                
                                                                                        
                                                                                       
//************************************************************************************************************************************************************************************************



                                                                                  echo  '</div>
                                                                                </div>
                                                                                <!-- END UNORDERED LISTS PORTLET-->';


                                                                                

                                                                                      
                                                                                         


                                                                                                   echo '
                                                                                                              <div id="findet'.$fila2['id_detalle_orden'].'" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                                                                                                                    <div class="modal-dialog">
                                                                                                                        <div class="modal-content">
                                                                                                                            <div class="modal-header">
                                                                                                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                                                                                                <h3 class="modal-title">Confirmación</h3>
                                                                                                                            </div>
                                                                                                                            <div class="modal-body">
                                                                                                                                <p>
                                                                                                                                    <h4><b> Desea finalizar la orden #'.$fila2['id_detalle_orden'].'?</b> </h3>
                                                                                                                                </p>
                                                                                                                            </div>
                                                                                                                            <div class="modal-footer">
                                                                                                                                <button type="button" data-dismiss="modal" class="btn default">Cancelar</button>
                                                                                                                                <button id="dit'.$fila2['id_detalle_orden'].'" type="button" data-dismiss="modal" class="btn green">Si</button>
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>

                                                                                                          ';

                                                                                            
 


                                                                                                                     
                                                                    
                                                                }


                                            echo'  </div><br><br><br><br></div>';



                                
                                
                            }

                        $mysqli->close();

                        
                    ?>
















                    <?


                          








    include("connect.php");
     $sql="SELECT  * FROM pop_detalle WHERE estado='PRODUCCION' AND id_orden='".$orden."' ";  
                      
     $rs=$mysqli->query($sql);

         while($row=$rs->fetch_assoc()){ 


               echo '
                          <div id="static'.$row["id_detalle_orden"].'" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                            <h3 class="modal-title">Actualización</h3>
                                        </div>
                                        <div class="modal-body">
                                            <p>
                                                <h4> Ingrese cantidad de muebles completados:</h4>
                                                 <input  type="number" name="quantity'.$row["id_detalle_orden"].'" id="quantity'.$row["id_detalle_orden"].'" min="0" max="'.$row["cantidad"].'" onkeydown="return false">
                                                
                                            </p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" data-dismiss="modal" class="btn default">Cancelar</button>
                                            <button id="close'.$row["id_detalle_orden"].'" type="button" data-dismiss="modal" class="btn green">Actualizar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                      ';




 }
 $mysqli->close();
?>











<!--
<a href="#"  onclick="window.open(\'home.php\', \'newwindow\', \'top=100,left=600,width=400,height=400\'); return false;"><strong><font color="green">Completados:</font></strong></a>
-->
                    </body>
                    






<script>


<?

    include("connect.php");
     $sql="SELECT  * FROM pop_detalle WHERE estado='PRODUCCION' AND id_orden='".$orden."' ";  
                      
     $rs=$mysqli->query($sql);

         while($row=$rs->fetch_assoc()){ 


               echo '


                    jQuery("#close'.$row["id_detalle_orden"].'").click(function(){
                    jQuery("#static'.$row["id_detalle_orden"].'").modal("hide");

                    var completo = jQuery("#quantity'.$row["id_detalle_orden"].'").val();
                    var ord_det = "'.$row["id_detalle_orden"].'";
                    var ord = "'.$row["id_orden"].'";
                    var bandera = "5";

                     var dataString = "completo="+ completo + "&ord="+ ord + "&ord_det="+ ord_det + "&bandera="+ bandera;


            jQuery.ajax({
            type: "POST",
            url: "pop.sql.php",
            data: dataString,
            cache: false,
            success: function(result){

                if(result == 1)
                {                    

                    jQuery("#exito_actu").click();
                    jQuery("#cpt'.$row["id_detalle_orden"].'").empty();
                    jQuery("#cpt'.$row["id_detalle_orden"].'").append(completo);
                    
              

                }
                else if (result == 0)
                {

                
                }

             }

            });

                return false;
                });




                    ';

           //jQuery( "#'.$row["id_detalle_orden"].'" ).hide();


 }
 $mysqli->close();
?>


});
</script>

