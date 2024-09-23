

<?php
$q = $_REQUEST['q'];

session_start();

$base=$_SESSION['base'];
$anio=$_SESSION['year'];
$nivel=$_SESSION['nivel'];
$bd=$base.$anio;

//crear carpetas segun los paises que se genera la orden op
    if ($_SESSION['base']=="esa") {
      $carpeta_pais="EL_SALVADOR";
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
$sql="SELECT * FROM pop_detalle WHERE id_detalle_orden = '".$q."'  ";
$sql2="SELECT * FROM pop_pliego WHERE id_detalle = '".$q."' and estado=1 order by id_detalle_pliego asc ";

$result = mysqli_query($con,$sql);
$result2 = mysqli_query($con,$sql2);





while($row = mysqli_fetch_array($result)) {
    $nota_corte=$row['nota_corte'];
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
       $modal="#abc".$id_item;
       $modal2="abc".$id_item;
    
}?>
<? 
   $area1 = "impresion";
   $area2 = "corte";

   $sql3="SELECT * FROM bit_notas_corte_impresion WHERE id_orden = '".$id_item."' and area='".$area1."'  ";
   $sql4="SELECT * FROM bit_notas_corte_impresion WHERE id_orden = '".$id_item."' and area='".$area2."'";
   
   $result3 = mysqli_query($con,$sql3);
   $result4 = mysqli_query($con,$sql4);
   


?>

 


<div id="<? echo $modal2;?>" class="modal fade">
    <div class="modal-dialog">
      <div class="modal-content">
        <form action="form/finalizar_item.php" method="POST">
          <div class="modal-header">            
            <h4 class="modal-title">FINALIZAR ITEM</h4>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          </div>
          <div class="modal-body">          
            <H5><p>Desea terminar este item? <? //echo $id_pliego;?></p></H5>
            
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
             '.$trabajo.'<div class="clearfix"></div>
          <label class="control-label"><strong>Cantidad&nbsp;&nbsp;&nbsp;:</strong></label>
                 '.$cantidad.'  &nbsp;&nbsp; '.$complete.': <label id="cpt'.$id_det.'" class="cpt'.$id_det.'" >'.$completo.'</label><div class="clearfix"></div>
          <label class="control-label "><strong>Tamaño&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</strong></label>
                '.$base.' (base) X '.$altura.' (altura) X '.$fondo.' (fondo) CM.<div class="clearfix"></div>
                                                                                                                                

        </div>

                                                                                                                       
              <div id="fmsd3" class="col-md-12">

                 <label class="control-label "><strong>Nota:</strong></label>'.$detalle.'
              </div>

      </div>  


                  <div id="fms3" class="col-md-3">
                  <center>
                    <a href="'.$link_arte.'" target="_blank" data-fancybox="preview" data-width="100%" data-height="100%"><img width="100px" src="'.$link_arte.'" >
                    </a>
                  </center> 
    </div>


                 <div id="fms3" class="col-md-3">   
                   <br>
                     &nbsp;&nbsp; <label class="control-label"><strong>Notas de Corte:&nbsp;&nbsp;&nbsp;</strong></label>
                       <a href="" data-toggle="modal" data-target="#notacorte"> Ver Nota</a> &nbsp;&nbsp; 
                   <br>
                   <br>

                     &nbsp;&nbsp; <label class="control-label"><strong>Notas de Impresion:&nbsp;&nbsp;&nbsp;</strong></label>
                    <a href="" data-toggle="modal" data-target="#ModalModificar"> Ver Nota</a>  &nbsp;&nbsp; <br><BR>
                    '; 
  
        if ($nivel==1|| $nivel==2 || $nivel==5 || $nivel==15 || $nivel==4) {
          ECHO '<a  data-toggle="modal" data-target='.$modal.'> <span class="btn btn-warning"><strong>FINALIZAR  PLIEGO</strong></span></a>';
        }
        

   echo '

                    ';

                     ECHO'

             </div>
            </div>
  </div>
           ';?>

  



<!-- ------------------------------------------------------------------------->

  <form method="post" action="form/ingresarNota.php" enctype="multipart/form-data">
    <div class="modal fade" id="ModalModificar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">NOTAS DE IMPRESION</h4>
             </div>
            <div class="modal-body">
            <div class="form-group">
                  <input type="hidden" name="opcion" value="impresion">
                  <input id="id_item" type="hidden" class="form-control" name="id_item" value="<? echo $id_item;?>" aria-label="..." readonly="readonly" required>
                 </div>
                 <div class="collapse" id="ejemploimpresion">
				  <div class="card card-body">
				    <table class="table">
					  <thead class="thead-dark">
					    <tr>
					      <th scope="col">Fecha</th>
					      <th scope="col">Nota</th>
					      
					    </tr>
					  </thead>
					  <tbody>
					    <?

					      while($rowx = mysqli_fetch_array($result3)) { //impresion?>
					        
					        <tr>
					        	<td><?echo $rowx['fecha'];?></td>
					        	<td><?echo $rowx['nota'];?></td>
					        </tr>
					    <? }
					  	 ?>
					  </tbody>
					</table>
				  </div>
				</div>

                 <div class="form-group">
                  <input  name="origen" type="hidden" class="form-control" value="sv" aria-label="...">
                </div>Nota en este item
                <div class="form-group" >
                 <textarea  name="nota"  class="form-control"><? echo $mensaje;?></textarea>
                </div>
        
                 
          <div class="modal-footer">
          	<button class="btn btn-success" type="button" data-toggle="collapse" data-target="#ejemploimpresion" aria-expanded="false" aria-controls="collapseExample">
			    Ver Historial
			  </button>
            <button type="submit" class="btn btn-default" data-dismiss="modal">Cancelar</button>
            <button class="btn btn-primary">Modificar Nota</button>
          </div>
        </div>
      </div>
    </div>
    </div>
    </div>
    
</form>
<form method="post" action="form/ingresarNota.php" enctype="multipart/form-data">
    <div class="modal fade" id="notacorte" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">NOTAS DE CORTE</h4>
             </div>
            <div class="modal-body">
            <div class="form-group">
                  <input type="hidden" name="opcion" value="corte">
                  <input id="id_item" type="hidden" class="form-control" name="id_item" value="<? echo $id_item;?>" aria-label="..." readonly="readonly" required>
                 </div>
                 <div class="collapse" id="collapseExample">
				  <div class="card card-body">
				    <table class="table">
					  <thead class="thead-dark">
					    <tr>
					      <th scope="col">Fecha</th>
					      <th scope="col">Nota</th>
					      
					    </tr>
					  </thead>
					  <tbody>
					    <?

					      while($rowz = mysqli_fetch_array($result4)) { //corte?>
					        
					        <tr>
					        	<td><?echo $rowz['fecha'];?></td>
					        	<td><?echo $rowz['nota'];?></td>
					        </tr>
					    <? }
					  	 ?>
					  </tbody>
					</table>
				  </div>
				</div>


                 <div class="form-group">
                  <input  name="origen" type="hidden" class="form-control" value="sv" aria-label="...">
                </div>Nota en este item
                <div class="form-group" >
                 <textarea  name="nota"  class="form-control"><? echo $nota_corte;?></textarea>
                </div>
        
                 
          <div class="modal-footer">
          	<button class="btn btn-success" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
			    Ver Historial
			  </button>
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
<?$pliego='ax'.$q;
$pliego2='#ax'.$q;
$button='az'.$q;
$button2='#az'.$q;

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
<div id="<?echo $pliego?>" class="col-md-12 collapse multi-collapse" style="margin-top:100px;">
<?
$ci=1;
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
                                       
                                                                    
        $pliego_corte=$row['detalle_corte'];
        $pliego_impresion=$row['detalle_impresion'];
        $c_corte=$row2['completo_corte'];
        $c_imp=$row2['completo_imp'];
        $id_detalle_pliego=$row2['id_detalle_pliego'];
        $modal="#a".$id_pliego;
        $modal2="a".$id_pliego;

      if ($nivel==5 || $nivel==1 || $nivel==2  || $nivel==3) {
      	$val=$row2['impresion'];
      }elseif($nivel==15 || $nivel==1 || $nivel==2  || $nivel==3){
      	$val=$row2['corte'];
      }elseif($nivel==4 || $nivel==1 || $nivel==2  || $nivel==3){
      	$val=$row2['computo'];
      }

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
        } ?>

      

<? echo'                                                          
<div class="col-md-6" >
  
    <div class="row" >
      <div class="col-md-8">                                                                           
        <div id="fms0" class="col-md-12">
          <div id="fms" class="col-md-12">
            <div id="fmsd0" class="col-md-12">
                  <label class="control-label"><strong>Pliego #'.$ci.'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</strong></label>'.$pliego.'

                  <div class="clearfix"></div>
                  <label class="control-label"><strong>Cantidad&nbsp;&nbsp;&nbsp;:</strong></label>
                  '.$cantidad.' &nbsp;&nbsp;
                   



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
                          <div id="fmsd3" class="col-md-12" style=" height:60px;">
                            <label class="control-label "><strong>Nota:</strong></label> '.$nota.' 
                          </div>'; ?>
                          <div id="fmsd3" class="col-md-12">


    <!--<div id="<? echo $modal2;?>" class="modal fade">
    <div class="modal-dialog">
      <div class="modal-content">
        <form action="form/finalizar_item.php" method="POST">
          <div class="modal-header">            
            <h4 class="modal-title">FINALIZAR PLIEGO</h4>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          </div>
          <div class="modal-body">          
            <H5><p>Desea terminar este pliego? <? //echo $id_pliego;?></p></H5>
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
  </div>-->





                            
                          </div>
           <? echo '</div>  
                               <div id="fms3" class="col-md-6">   
                                    <center>
                                       <a href="'.$link_arte2.'" target="_blank" data-fancybox="preview" data-width="100%" data-height="100%"><img width="100px"   src="'.$link_arte2.'"></a>
                                    </center>
                                     
                                   
                               </div>';?>

            
      <? echo '</div>
    </div>
  </div>
</div>';
//RECTIFICAR EL MODAL QUE SE ESTA PASANDO LA INFORMACION A OTRA LINEA O SE DESPLIEGA LA INFORMACION JUNTO CON LOS ITEM

//MOSTRAR EL MODAL PARA LA INFORMACION 
//&nbsp;&nbsp; <label class="control-label"><strong>Notas de Impresion:&nbsp;&nbsp;&nbsp;:</strong></label>
//<a href="" data-toggle="modal" data-target="#pliegoimpresion"> Ver Nota</a>  &nbsp;&nbsp; <br><BR>

//total de impresiones y corte
//<strong><font color="green">Impresiones:</font></strong> '.$c_imp.' &nbsp;&nbsp;
//                  <strong><font color="green">Corte:</font></strong> '.$c_corte.'

$arte2="";?>
  
    
<?
$ci++;
  }
?>

 
</div>
	



<div id="<?echo $pliego?>" class="col-md-12 collapse multi-collapse">


	


  



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






<!-- FIN MUESTRA PLIEGO -->

