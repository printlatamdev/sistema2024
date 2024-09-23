
  <?
  $f = mysqli_query($con,"select*from facturacion_ccf where id_orden='".$row['id_orden']."'");
    $factura=mysqli_num_rows($f);


 $e = mysqli_query($con,"select*from facturacion_centrega where id_orden='".$row['id_orden']."'");
    $entrega=mysqli_num_rows($e);


     $p = mysqli_query($con,"select*from facturacion_cpago where id_orden='".$row['id_orden']."'");
    $pago=mysqli_num_rows($p);

        $modal='modal'.$row['id_orden'];
$modal2='#modal'.$row['id_orden'];



       $modale='modale'.$row['id_orden'];
$modal2e='#modale'.$row['id_orden'];


       $modalp='modalp'.$row['id_orden'];
$modal2p='#modalp'.$row['id_orden'];

$id=$row['id_orden'];

$cont=1;

?>


<? //while($rowe = mysqli_fetch_assoc($e)){echo $rowe['centrega'];}?>




  <div class="col-md-12">
    <? if ($factura==0) {?>
    <div class="col-xs-1 col-md-1 col-lg-1">
       <input type="image" src="imagenes/no_pdf.png"  class="img-thumbnail" 
                  data-toggle="modal" data-target="<? echo $modal2;?>">
              
    </div><?}else{?>
  <div class="col-xs-1 col-md-1 col-lg-1">
      <input type="image" src="imagenes/pdf.png"  class="img-thumbnail"   data-toggle="modal" data-target="<? echo $modal2;?>">
          </div>

          <?}?>
            
    <div  class="col-md-2" >
      <span>CCF </span>
    </div>

 <? if ($pago==0) {?>

    <div class="col-xs-1 col-md-1 col-lg-1">
         <input type="image" src="imagenes/no_pdf.png"  class="img-thumbnail" 
                  data-toggle="modal" data-target="<? echo $modal2p;?>">
              
    </div><?}else{?>
  <div class="col-xs-1 col-md-1 col-lg-1">
      <input type="image" src="imagenes/pdf.png"  class="img-thumbnail"   data-toggle="modal" data-target="<? echo $modal2p;?>">
          </div>

          <?}?>
            
    <div  class="col-md-2" >
      <span>Comprobante Pago</span>
    </div>




 <? if ($entrega==0) {?>
    <div class="col-xs-1 col-md-1 col-lg-1">
         <input type="image" src="imagenes/no_pdf.png"  class="img-thumbnail" 
                  data-toggle="modal" data-target="<? echo $modal2e;?>">
              
    </div><?}else{?>
  <div class="col-xs-1 col-md-1 col-lg-1">
      <input type="image" src="imagenes/pdf.png"  class="img-thumbnail"   data-toggle="modal" data-target="<? echo $modal2e;?>">
          </div>

          <?}?>
            
    <div  class="col-md-2" >
      <span>Envio</span>
    </div>
   
         <!--   
    <div  class="col-md-2" >
      <span>Nota Remision</span>-->
    </div>
  </div>




    <script type="text/javascript">
        $('a.fancybox').fancybox({
           width  : 300,
          height : 800,
    type   :'iframe'
        });
    </script>

    <script type="text/javascript">
      $('[data-fancybox]').fancybox({
  toolbar  : false,
  smallBtn : true,
  iframe : {
    preload : false

    
  }
})
    </script>
 
          <form method="post" action="form/subir_factura.php" enctype="multipart/form-data" >
    <div class="modal fade" id="<? echo $modal;?>" tabindex="0" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
       
           <div class="modal-body">
              

            <div class="form-group">
                  <table class="table" width="100">
  <thead class="thead-dark">
    <tr>
      <th scope="col" >FACTURA N° </th>
      <th scope="col">DOCUMENTO</th>

    </tr>
  </thead>
    <tbody>

      <? if ($factura==0) {?>
          Esta orden aun no contiene factura.
    <?  }else{?>



                   <? while($row = mysqli_fetch_assoc($f)){?>



    <tr>
      <th scope="row"><? echo $cont; $cont++;?></th>
      <td> <a href="ORDENES_OP/COLOR/EL SALVADOR/<? echo $id;?>/DOC/<?php echo $row['ccfiscal']; ?>" data-fancybox="preview">
                      <input type="image" src="imagenes/pdf.png"  class="img-thumbnail" width="60"  >
                      </a></td></tr>
      
 
                      <?}}?>
                </tbody>
</table>
            </div>
            <input type="hidden" value="factura" name="tipo">
            <input type="hidden" value="<? echo $id;?>" name="id"><input type="hidden" value="fin" name="origen">
<br>
                 subir factura.
                 <input type="file" name="factura"  required="required">
                   
           <br><br>
        
               <input type="submit" name="" value="Subir" class="btn btn-primary">
             </div>  
                 <br><br><br>
          <div class="modal-footer">
       
                 <button  class="btn btn-default" data-dismiss="modal">Cancelar</button>
          </div>
        </div>
      </div>
    </div>

   

</form>
<!-------------------------------------------------------------------------------------------------->

 <form method="post" action="form/subir_factura.php" enctype="multipart/form-data" >
    <div class="modal fade" id="<? echo $modalp;?>" tabindex="0" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
       
           <div class="modal-body">
              

            <div class="form-group">
                  <table class="table" width="100">
  <thead class="thead-dark">
    <tr>
      <th scope="col" >CP N° </th>
      <th scope="col">DOCUMENTO</th>

    </tr>
  </thead>
    <tbody>

      <? if ($pago==0) {?>
          Esta orden aun no contiene Comprobante de Pago.
    <?  }else{?>



                   <? while($row = mysqli_fetch_assoc($p)){?>



    <tr>
      <th scope="row"><? echo $cont; $cont++;?></th>
      <td> <a href="ORDENES_OP/COLOR/EL SALVADOR/<? echo $id;?>/DOC/<?php echo $row['cpago']; ?>" data-fancybox="preview">
                      <input type="image" src="imagenes/pdf.png"  class="img-thumbnail" width="60"  >
                      </a></td></tr>
      
 
                      <?}}?>
                </tbody>
</table>
            </div>
            <input type="hidden" value="pago" name="tipo">
            <input type="hidden" value="<? echo $id;?>" name="id"><input type="hidden" value="fin" name="origen">
<br>
                 subir Comprobante.
                 <input type="file" name="factura"  required="required">
                   
           <br><br>
        
               <input type="submit" name="" value="Subir" class="btn btn-primary">
             </div>  
                 <br><br><br>
          <div class="modal-footer">
       
                 <button  class="btn btn-default" data-dismiss="modal">Cancelar</button>
          </div>
        </div>
      </div>
    </div>

   

</form>

<!-- ********************************************************************************************************************** -->
 <form method="post" action="form/subir_factura.php" enctype="multipart/form-data" >
    <div class="modal fade" id="<? echo $modale;?>" tabindex="0" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
       
           <div class="modal-body">
              

            <div class="form-group">
                  <table class="table" width="100">
  <thead class="thead-dark">
    <tr>
      <th scope="col" >NOTA ENVIO N° </th>
      <th scope="col">DOCUMENTO</th>

    </tr>
  </thead>
    <tbody>

      <? if ($entrega==0) {?>
          Esta orden aun no contiene nota de envio.
    <?  }else{?>


    
                   <? while($rowe = mysqli_fetch_assoc($e)){ ?>



    <tr>
      <th scope="row"><? echo $cont; $cont++;?></th>
      <td> <a href="ORDENES_OP/COLOR/EL SALVADOR/<? echo $id;?>/DOC/<?php echo $rowe['centrega']; ?>" data-fancybox="preview">
                      <input type="image" src="imagenes/pdf.png"  class="img-thumbnail" width="60"  >
                      </a></td></tr>
      
 
                      <?}}?>
                </tbody>
</table>
            </div>
            <input type="hidden" value="nota" name="tipo">
            <input type="hidden" value="<? echo $id;?>" name="id"><input type="hidden" value="fin" name="origen">
<br>
                 subir nota de envio. <? echo $rowe['centrega']; ?>
                 <input type="file" name="factura"  required="required">
                   
           <br><br>
        
               <input type="submit" name="" value="Subir" class="btn btn-primary">
             </div>  
                 <br><br><br>
          <div class="modal-footer">
       
                 <button  class="btn btn-default" data-dismiss="modal">Cancelar</button>
          </div>
        </div>
      </div>
    </div>

   

</form>




    <link rel="stylesheet" href="bootstrap.min.css">

