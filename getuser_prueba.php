<script src="//cdnjs.cloudflare.com/ajax/libs/fancybox/3.2.1/jquery.fancybox.min.js"></script>

<!------ Include the above in your HEAD tag ---------->

 <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fancybox/3.2.1/jquery.fancybox.min.css" media="screen">

<?php
$q = $_REQUEST['q'];

session_start();

$base=$_SESSION['base'];
$anio=$_SESSION['year'];
$nivel=$_SESSION['nivel'];

if ($nivel==5) {
  $areatrabajo="impresion";
}elseif ($nivel==3) {
  $areatrabajo="acabado";
}elseif ($nivel==15) {
  $areatrabajo="corte";
}
$bd=$base.$anio;

//crear carpetas segun los paises que se genera la orden op
    if ($_SESSION['base']=="esa") {
      $carpeta_pais="EL SALVADOR";
      $origen="SV";
    }else{
      $carpeta_pais="NICARAGUA";
      $origen="NI";
    }
    
//

$con = mysqli_connect('localhost','root','',''.$bd.'');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,''.$bd.'');
$sql="SELECT * FROM pop_detalle WHERE id_detalle_orden = '".$q."' ";
$sql2="SELECT * FROM pop_pliego WHERE id_detalle = '".$q."' ";
$sql3="SELECT * FROM pop_pliego WHERE id_detalle = '".$q."' ";





//$sql5="SELECT * FROM detalle_desperfecto WHERE id_detalle = '".$q."' ";
//$sql4="SELECT * FROM usuarios where nivel='' or nivel='' or nivel=''";
$result = mysqli_query($con,$sql);
$result2 = mysqli_query($con,$sql2);
$result3 = mysqli_query($con,$sql3);



while($row = mysqli_fetch_array($result)) {
    $mensaje=$row['mensaje'];
    $empresa=$row['empresa'];
  $cantidad=$row['cantidad'];
  $base=$row['base'];
   $altura=$row['altura'];
      $fondo=$row['fondo'];
   $trabajo=$row['trabajo'];
   $detalle=$row['detalle'];
     $arte=$row['arte'];
     $id_orden=$row['id_orden'];
       $id_item=$row['id_detalle_orden'];
  $cantdesper=$row['totaldesperfecto'];
       //$modal="#a".$id_item;
       //$modal2="a".$id_item;
    
}?>


<!--CONTANDO LA CANTIDAD DE DESPERFECTOS POR AREA-->
<?if ($nivel==3 || $nivel==5 || $nivel==15){
 $sql4="SELECT COUNT(id_detalle_orden) as total FROM detalle_desperfecto where area='".$areatrabajo."' and id_detalle_orden='".$q."' and id_orden='".$id_orden."'";
}else if($nivel==1 || $nivel==2){
$sql4="SELECT COUNT(id_detalle_orden) as total FROM detalle_desperfecto where id_orden='".$id_orden."'";
}
 $result4 = mysqli_query($con,$sql4);

//$result4 = mysqli_query($con,$sql4);
//$sql = ' UPDATE tutorials_inf SET name="althamas" WHERE name="ram"';
while($ss = mysqli_fetch_array($result4)) {
   $countt=$ss['total'];
}
  
?>


  <script>
      <?$fin_funcion='fin'.$id_item;?>
function final(str) {
  if (str=="") {
    document.getElementById("final").innerHTML="";
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
      document.getElementById("final").innerHTML=this.responseText;
    }
  }
  xmlhttp.open("GET","fin_pliego.php?q="+str,true);
  xmlhttp.send();
}
</script>

<?$n_click=$fin_funcion.'(this.value)';?>





<?


if ($arte==null) {
 $link_arte='imagenes/no_disponible.png';

}
else{
  $link_arte='../sistema2020/ORDENES_POP/'.$carpeta_pais.'/'.$id_orden.'/ARTES_'.$id_orden.'/'.$arte.'';

}

//echo "</table>";
mysqli_close($con);
?>
<!-- MOSTRANDO MUEBLES -->

<? echo '
 
  <div class="row">
    <div id="fms0" class="col-md-12">
      <div id="fms" class="col-md-6">
        <div id="fmsd1" class="col-md-12">
          <label class="control-label"><strong>Mueble&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</strong></label>
             '.$trabajo.$q.'<div class="clearfix"></div>
          <label class="control-label"><strong>Cantidad&nbsp;&nbsp;&nbsp;:</strong></label>
                 '.$cantidad.'  &nbsp;&nbsp; '.$complete.': <label id="cpt'.$id_det.'" class="cpt'.$id_det.'" >'.$completo.'</label><div class="clearfix"></div>
          <label class="control-label "><strong>Tamaño&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</strong></label>
                '.$base.' (base) X '.$altura.' (altura) X '.$fondo.' (fondo) CM.<div class="clearfix"></div>
                                                                                                                                

        </div>

                                                                                                                       
              <div id="fmsd3" class="col-md-12">

                 <label class="control-label "><strong>Nota:</strong></label>'.$detalle.'
              </div>

              <div id="fmsd3" class="col-md-12">

                 <label class="control-label "><strong>Detalle Desperfecto: </strong></label>'.$areatrabajo.'-----'.$q.'---------'.$id_orden.'-------'.$countt.'
              </div>

      </div>  


                  <div id="fms3" class="col-md-3">
                  <center>
                      <a href="'.$link_arte.'" target="_blank" data-fancybox="preview" data-width="100%" data-height="100%"><img width="100px"     src="'.$link_arte.'" >
                      </a>
                  </center> 
    </div>


                 <div id="fms3" class="col-md-3">   
                   <br>
                     &nbsp;&nbsp; <label class="control-label"><strong>Avances Impresion:&nbsp;&nbsp;&nbsp;:</strong></label>
                        &nbsp;&nbsp; 
                   <br>
                   <br>

                     &nbsp;&nbsp; <label class="control-label"><strong>Notas de Impresion:&nbsp;&nbsp;&nbsp;:</strong></label>
                    <a href="" data-toggle="modal" data-target="#ModalModificar"> Ver Nota</a>  &nbsp;&nbsp; <br><BR>
                    <div class="col-md-12">
                            <button type="" class="btn btn-success" data-toggle="modal" data-target="#desperfect">CANTIDAD DESPERFECTOS</button>
                            <button type="" class="btn btn-danger" data-toggle="modal" data-target="#desperfecto">DETALLE DESPERFECTOS</button>
                          


                    ';

                     ECHO'

             </div>
            </div>
  </div>
           ';?>




<!-- PRUEBA DE REGISTRO DE DATOS -->
            <form method="post" action="save.desperfecto.php" enctype="multipart/form-data">
              <div id="desperfect" class="modal fade" role="dialog" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header bg-success">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                      <h4 class="modal-title"><b>CANTIDAD TOTAL DE DESPERFECTOS</b></h4>
                    </div>
                    <div class="modal-body form">
                      
                        <div class="form-group">
                          <label class="col-sm-4 control-label"><b>CANTIDAD TOTAL: </b></label>
                          <div class="col-sm-8">
                            <div class="input-group">
                              <span class="input-group-addon">
                              <i class="fa fa-tasks"></i>
                              </span>
                              <input type="text" id="typeahead_example_modal_1" name="total" value="<? echo $cantdesper;?>" class="form-control" required />
                              <input type="hidden" name="item" value="<? echo $id_item;?>">
                              <input type="hidden" name="orden" value="<? echo $id_orden;?>">
                              <input type="hidden" name="trabajo" value="<? echo $trabajo;?>">
                              <input type="hidden" name="opcion" value="ctotal">
                            </div>
                            <p class="help-block">
                              
                            </p>
                          </div>


                        </div>
                       
                  </div>

                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Guardar</button>

                  </div> 

                      
                    </div>
                    
                </div> 
              </div>
            </div>
          </div>
        </form>

<!--FIN--->
<!-- PRUEBA DE REGISTRO DE DATOS DETALLE DE DESPERFECTOS -->
            <form method="post" action="save.desperfecto.php" enctype="multipart/form-data">
              <div id="desperfecto" class="modal fade" role="dialog" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header bg-success">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                      <h4 class="modal-title"><b>DETALLE DE DESPERFECTOS</b></h4>
                    </div>
                    <div class="modal-body form">

                        <div class="form-group">
                          <div class="row"></div>
                          <div class="row">
                            <div class="col-md-3"><strong>Pieza: </strong></div>
                            <div class="col-md-9">
                                <select class="form-control " name="pieza">
                                  <option value="0">Seleccione Pieza</option>
                                  <? while($rowdet = mysqli_fetch_array($result3)) {
                                    echo $rowdet['pliego'];
                                    
                                    echo '<option value="'.$rowdet['pliego'].'">'.$rowdet['pliego'].'--'.$rowdet['detalle'].'</option>';
                                 
                                     } ?>
                                </select>
                                
                              </div>
                          </div><br>

                          <div class="row">
                            
                            <div class="col-md-3">
                              <strong>Cantidad: </strong>
                            </div>

                            <div class="col-md-9">
                                <div class="form-group">
                                  <div class="col-md-12">
                                    <input type="text" id="typeahead_example_2" name="cantidad" class="form-control" placeholder="CANTIDAD" required/>
                                    
                                  </div>
                                </div>
                            </div>
                                
                              
                          </div><br>

                          <div class="row">
                            
                            <div class="col-md-3">
                              <strong>Desperfecto: </strong>
                            </div>

                            <div class="col-md-9">
                                <div class="form-group">
                                  <div class="col-md-12">
                                    <input type="text" id="typeahead_example_2" name="defecto" class="form-control" placeholder="DETALLE DESPERFECTO" required/>
                                    
                                  </div>
                                </div>
                            </div>
                                
                              
                          </div><br>                    
                           
                              <input type="hidden" name="item" value="<? echo $id_item;?>">
                              <input type="hidden" name="orden" value="<? echo $id_orden;?>">
                              <input type="hidden" name="trabajo" value="<? echo $trabajo;?>">
                              <input type="hidden" name="areatrabajo" value="<? echo $areatrabajo;?>">
                              <input type="hidden" name="opcion" value="cdetalle"> 

                          <div class="row">
                            <div class="col-md-3"><strong>Responsable: </strong></div>
                            <div class="col-md-9">
                                <select class="form-control " name="responsable">
                                  <option value="0">Seleccione Responsable</option>
                                  <option value="Carlos Marroquin">Carlos Marroquin</option>
                                  <option value="Marlon Flores">Marlon Flores</option>
                                  <option value="Victor Olivares">Victor Olivares</option>
                                  <option value="Jaime Mejia">Jaime Mejia</option>
                                  <option value="Roberto Alejo">Roberto Alejo</option>
                                  <option value="Moises Melendez">Moises Melendez</option>

                                 
                                     
                                </select>
                                
                              </div>
                          </div><br>

                          <div class="form-group">
                            <label>Observacion</label>
                            <textarea  name="observacion" id="proyecto" class="form-control" required></textarea> 
                          </div><br>
                        
                        </div>

                      
                  </div>

                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Guardar</button>

                  </div> 

                      
                    </div>
                    
                </div> 
              </div>
            </div>
          </div>
        </form>

<!--FIN--->




  <form method="post" action="form/ingresarNota.php" enctype="multipart/form-data">
   <div class="modal fade" id="ModalModificar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Notas</h4>
             </div>
            <div class="modal-body">
            <div class="form-group">
                  <input id="id_item" type="hidden" class="form-control" name="id_item" value="<? echo $id_item;?>" aria-label="..." readonly="readonly" required>
                 </div>

                 <div class="form-group">
                  <input  name="origen" type="hidden" class="form-control" value="sv" aria-label="...">
                </div>Nota en este item
                <div class="form-group" >
                 <textarea  name="nota"  class="form-control">
                
                  <? echo $rowdet['pliego'];?>      </textarea>
                </div>
        
                 
          <div class="modal-footer">
            <button type="submit" class="btn btn-default" data-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-primary">Modificar Nota</button>
          </div>
        </div>
      </div>
    </div>
    </div>
    </div>
    
</form>






   

<!-- FIN MUESTRA MUEBLE-->
<?$pliego='12'.$q;
$pliego2='#12'.$q;
$button='2'.$q;
$button2='#2'.$q;

$x='#0'.$q;?>
<script type="text/javascript">
  $("#boton").click(function () {

        
            var clase = $('#boton').attr('class');

            if (clase.includes("btn-success")) {                        
                $('#boton').removeClass('btn-success');
                $('#boton').addClass('btn-danger');
            } else {
                $('#boton').removeClass('btn-danger');
                $('#boton').addClass('btn-success');
            }           
        });
</script>







<!-- MOSTRANDO PLIEGOS -->
<div class="row" style="margin-left: 17px; margin-top: 10px;"><button  id="<?echo $button;?>" style="margin-top: 30px;" data-toggle="collapse" data-target="<?echo $pliego2?>" aria-expanded="false" aria-controls="<?echo $pliego2?>" class="btn btn-success" >VER PLIEGOS</button></div>
<br>

<div id="<?echo $pliego?>" class="col-md-12 collapse multi-collapse">
	

<?
while($row2 = mysqli_fetch_array($result2)) {
   
          $flg3=$flg3 + 1;
                                                                    //$id=$fila2[0];
                                                                    $id_item=$row2['id_detalle'];
                                                                    $id_pliego=$row2['id_detalle_pliego'];
                                                                    $id_orden=$row2['id_orden'];
                                                                    //end


                                                                    $pliego=$row2['pliego'];
                                                                    $cantidad=$row2['cantidad'];
                                                                    $altura=$row2['altura'];
                                                                    $base=$row2['base'];
                                                                    $coti=$row2['cot'];
                                                                    $trabajo=$row2['trabajo'];
                                                                    $nom_material=$row2['material'];
                                                                    $nom_rigido=$row2['rigido'];
                                                                    $nom_laminado=$row2['laminado'];
                                                                    $nom_equipo=$row2['equipo'];
                                                                    $impresion=$row2['tiro'];
                                                                    $nota=$row2['detalle'];
                                                                    $arte2=$row2['arte'];
                                                                    $cot=$row2['cot']; 
                                                                    $acabado=$row2['acabado'];
                                                                    $tiro=$row2['tiro'];

                                                                    $c_corte=$row2['completo_corte'];
                                                                    $c_imp=$row2['completo_imp'];
                                                                    $id_detalle_pliego=$row2['id_detalle_pliego'];

                                                                    $modal="#a".$id_pliego;
                                                                    $modal2="a".$id_pliego;

    echo '';




 $findet='';

                                                                       if ($arte==null) {
                                                                  $link_arte2='imagenes/no_disponible.png';

                                                              }
                                                              else{
                                                                $link_arte2='../sistema2020/ORDENES_POP/'.$carpeta_pais.'/'.$id_orden.'/ARTES_'.$id_orden.'/'.$arte2.'';

                                                              }


                                                                     if ($pliego=="COMBINADO") {
                                                                        $color_pliego="red";
                                                                    } else {
                                                                        $color_pliego="green";
                                                                    }



                                                                        echo'

                                                          
<div class="col-md-6">
  <div style="margin-bottom: 10px"  class="portlet box '.$color_pliego.'"></div>
    <div class="row">
      <div class="col-md-8">

                                                                                                   
        <div id="fms0" class="col-md-12">
          <div id="fms" class="col-md-12">
            <div id="fmsd0" class="col-md-12">
                  <label class="control-label"><strong>Pliego&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</strong></label>'.$pliego.'

                  <div class="clearfix"></div>
                  <label class="control-label"><strong>Cantidad&nbsp;&nbsp;&nbsp;:</strong></label>
                  '.$cantidad.' &nbsp;&nbsp;
                  <strong><font color="green">Impresioness:</font></strong> '.$c_imp.' &nbsp;&nbsp;
                  <strong><font color="green">Corte:</font></strong> '.$c_corte.' 
                  <div class="clearfix"></div>
                  <label class="control-label "><strong>Tamaño&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</strong></label>
                    '.$base.' (base) X '.$altura.' (altura) CM.
                  <div class="clearfix"></div>
                  <label class="control-label"><strong>Material&nbsp;&nbsp;&nbsp;&nbsp;:</strong></label>
                 '.$nom_material.' <div class="clearfix"></div>
                  <label class="control-label"><strong>Equipo&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</strong></label>
                  '.$nom_equipo.' <div class="clearfix"></div>
                  <label class="control-label"><strong>Impresion&nbsp;:</strong></label> '.$tiro.'
                 <div class="clearfix"></div>
            </div>
                          <div id="fmsd3" class="col-md-12">
                            <label class="control-label "><strong>Nota:</strong></label> '.$nota.' 
                          </div>'; ?>
                          <div id="fmsd3" class="col-md-12">
                          <? echo $id_pliego;?>

    <div id="<? echo $modal2;?>" class="modal fade">
    <div class="modal-dialog">
      <div class="modal-content">
        <form action="form/finalizar_item_prueba.php" method="POST">
          <div class="modal-header">            
            <h4 class="modal-title">TERMINAR ITEM</h4>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          </div>
          <div class="modal-body">          
            <H5><p>Desea terminar este pliego? <? echo $id_pliego;?></p></H5>
            <input type="hidden" name="pliego" value="<? echo $id_pliego;?>">
            <input type="hidden" name="item" value="<? echo $id_item;?>">
            <input type="hidden" name="si_orden" value="<? echo $id_orden;?>">
            <input type="hidden" name="nivel" value="<? echo $nivel;?>">
            
          </div>
          <div class="modal-footer">
            <input type="button" class="btn btn-default" data-dismiss="modal" value="Salir">
              <button type="submit" class="btn btn-primary">FINALIZAR</button>
            
          </div>
        </form>
      </div>
    </div>
  </div>





                            <? if ($nivel==1|| $nivel==2 || $nivel==5 || $nivel==15 || $nivel==4) {ECHO '
                      
                  

                  <a  data-toggle="modal" data-target='.$modal.'> <span class="btn btn-warning"><strong>FINALIZAR  PLIEGO</strong></span></a>
                 ';
                  
                    } ?>
                          </div>
        <? echo '</div>  
                               <div id="fms3" class="col-md-6">   
                                    <center>
                                       <a href="'.$link_arte2.'" target="_blank" data-fancybox="preview" data-width="100%" data-height="100%"><img width="50px"   src="'.$link_arte2.'"></a>
                                    </center>
                                     
                                   
                                 

                               </div> 
      </div>
    </div>
  </div>
</div>';
$arte2="";


    
}

?>

 
</div>










    <script type="text/javascript">
      
      $(document).ready(function(){
  $(".fancybox").fancybox({
        openEffect: "none",
        closeEffect: "none"
    });




    
    $(".zoom").hover(function(){
    
    $(this).addClass('transition');
  }, function(){
        
    $(this).removeClass('transition');
  });
});

    $(".rotate").fancybox({   
    width  : 600,
    height : 300,
    type   :'iframe'
});



    

</script>




<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<!-- FIN MUESTRA PLIEGO -->

