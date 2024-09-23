<script src="//cdnjs.cloudflare.com/ajax/libs/fancybox/3.2.1/jquery.fancybox.min.js"></script>
<link rel="stylesheet" href="css/estiloletra.css">
<!------ Include the above in your HEAD tag ---------->

 <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fancybox/3.2.1/jquery.fancybox.min.css" media="screen">

<?php
$q = $_REQUEST['q'];

session_start();
$base=$_SESSION['base'];
$anio=$_SESSION['year'];
$nivel=$_SESSION['nivel'];
$bd='nica20';
if ($_SESSION['base']=="esa") {
      $carpeta_pais="EL_SALVADOR";
    }else{
      $carpeta_pais="NICARAGUA";
    }

$con = mysqli_connect('localhost','admin','AG784512',''.$bd.'');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,''.$bd.'');
$sql="SELECT * FROM orden_detalle WHERE id_detalle_orden = '".$q."'";
$sql2="SELECT * FROM orden_detalle WHERE id_detalle_orden = '".$q."'";
$result = mysqli_query($con,$sql);
$result2 = mysqli_query($con,$sql2);





  


while($row2 = mysqli_fetch_array($result2)) {
   
          $flg3=$flg3 + 1;









                                                                    //$id=$fila2[0];
                                                                    $id_orden=$row2['id_orden'];
                                                                    $pliego=$row2['trabajo'];
                                                                    $cantidad=$row2['cantidad'];
                                                                    $altura=$row2['altura'];
                                                                    $base=$row2['base'];
                                                                    $coti=$row2['cot'];
                                                                    $trabajo=$row2['trabajo'];
                                                                    $nom_material=$row2['material'];
                                                                     $id_material=$row2['id_material'];
                                                                    $nom_rigido=$row2['rigido'];
                                                                    $nom_laminado=$row2['laminado'];
                                                                    $nom_equipo=$row2['equipo'];
                                                                    $impresion=$row2['tiro'];
                                                                    $nota=$row2['detalle'];
                                                                    $arte2=$row2['arte'];
                                                                    $cot=$row2['cot']; 
                                                                    $acabado=$row2['acabado'];
                                                                    $tiro=$row2['tiro'];
                                                                    $computo=$row2['computo'];
                                                                    $impresion=$row2['impresion'];
                                                                    $c_corte=$row2['completo_corte'];
                                                                    $c_imp=$row2['completo_imp'];
                                                                      $modal="#a".$q;
                                                                      $modal2="a".$q;





$material="SELECT * FROM material WHERE id = '".$id_material."'";

$result21 = mysqli_query($con,$material);
while($m = mysqli_fetch_array($result21)) {
   $tipo_material=$m['material'];
}







  if ($nivel==5) {
    $val=$impresion;

  }elseif($nivel==4){
    $val=$computo;
  }




 $findet='';

                                                             if ($arte2==null) {
                                                                  $link_arte2='imagenes/no_disponible.png';

                                                              }
                                                              else{
                                                                $link_arte2="ORDENES_OP/COLOR/NICARAGUA/".$id_orden."/ARTES/".$arte2;
                                                                

                                                              }


                                                                     if ($pliego=="COMBINADO") {
                                                                        $color_pliego="red";
                                                                    } else {
                                                                        $color_pliego="green";
                                                                    }



                                                                        echo'

<div class="row">                                                          
<div class="col-md-9">
  <div style="margin-bottom: 10px"  class="portlet box '.$color_pliego.'"></div>
    <div class="row">
      <div class="col-md-11">

                                                                                                   
        <div id="fms0" class="col-md-12">
          <div id="fms" class="col-md-12">
            <div id="fmsd0" class="col-md-12">
                  <label class="control-label"><strong>Item:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</strong></label>&nbsp;&nbsp;'.$pliego.'

                  <div class="clearfix"></div>
                  <label class="control-label"><strong>Cantidad&nbsp;&nbsp;&nbsp;:</strong></label>
                  '.$cantidad.' &nbsp;&nbsp;
                  <strong><font color="green">Impresiones:</font></strong> '.$c_imp.' &nbsp;&nbsp;
                  <strong><font color="green">Corte:</font></strong> '.$c_corte.' 
                  <div class="clearfix"></div>
                  <label class="control-label "><strong>Tamaño&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</strong></label>
                    '.$base.' (base) X '.$altura.' (altura) CM.
                  <div class="clearfix"></div>
                  <label class="control-label"><strong>Material&nbsp;&nbsp;&nbsp;&nbsp;:</strong></label>
                 '.$tipo_material.'-'.$nom_material.' <div class="clearfix"></div>
                  <label class="control-label"><strong>Equipo&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</strong></label>
                  '.$nom_equipo.' <div class="clearfix"></div>
                  <label class="control-label"><strong>Impresion&nbsp;:</strong></label> '.$tiro.'
                 <div class="clearfix"></div>
            </div>
                          <div id="fmsd3" class="col-md-12">
                            <label class="control-label "><strong>Nota:</strong></label> '.$nota.' 
                          </div>
        </div>  
                               <div id="fms3" class="col-md-6">   
                                    <center>
                                       <a href="'.$link_arte2.'" target="_blank" data-fancybox="preview" data-width="100%" data-height="100%"><img width="150px"   src="'.$link_arte2.'"></a>
                                    </center><br><br>';
                                    //COLOCAR CONDICION DE NIVEL PARA QUE APAREZCA EL BOTTOM

                         
                                          //DISENO
                                           if ($nivel==1 ||  $nivel==5 || $nivel==4  || $nivel==5) {
                                             if($val=="1"){
                                            echo '<div class="col-md-12" style="margin-left:55px;"><a data-toggle="modal" data-target='.$modal.'><button type="submit" class="btn btn-warning" ><strong>FINALIZAR ITEM</strong></button></a></div><br><br>';
                                          }elseif ($val==0) {
                                            echo '<div class="col-md-12" style="margin-left:55px;"><button type="submit" class="btn btn-danger" ><strong>FINALIZADO</strong></button></div><br><br>';
                                          }
                                          }




                                    echo '
                               </div></center>
      </div>
    </div>
  </div>
</div>
</div>';
    $arte2="";
   
  
  
    
}


?>
<div id="<? echo $modal2;?>" class="modal fade">
    <div class="modal-dialog">
      <div class="modal-content">
        <form action="form/finalizar_item_op.php" method="POST">
          <div class="modal-header">            
            <h2 class="modal-title">TERMINAR ITEM</h2>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          </div>
          <div class="modal-body">          
            <H4><p>Desea terminar este item? </p></H4>
            <input type="hidden" name="si" value="<? echo $q;?>">
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

