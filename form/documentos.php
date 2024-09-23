
  <script>
      <?$n_funcion='a'.$row['id_orden'];?>
function <?echo $n_funcion;?>(str) {
  if (str=="") {
    document.getElementById("<?echo $n_funcion;?>").innerHTML="";
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
      document.getElementById("<?echo $n_funcion;?>").innerHTML=this.responseText;
    }
  }
  xmlhttp.open("GET","form/get_doc.php?q="+str,true);
  xmlhttp.send();
}
</script>



<script>
     
function s100(str) {
  if (str=="") {
    document.getElementById("s100").innerHTML="";
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
      document.getElementById("s100").innerHTML=this.responseText;
    }
  }
  xmlhttp.open("GET","form/get_doc.php?q="+str,true);
  xmlhttp.send();
}
</script>

<center>

<div class="col-md-4">
  
          <div class="row">
            <div class="col-xs-2 col-md-3 col-lg-3">
             <?$n_click=$n_funcion.'(this.value)';?>
             <? $modal='modal'.$row['id_orden'];
$modal2='#modal'.$row['id_orden'];?>
                <?php if ($facturas!=null): ?>
                  
  
<!--<a data-fancybox data-type="iframe" data-src="form_doc.php" href="javascript:;">
  Webpage
</a>-->
     


          

                  <input type="image" src="imagenes/pdf.png"  class="img-thumbnail"  value="<? echo $row['id_orden'];?>" <? echo 'onclick='.$n_click.''?>
                  data-toggle="modal" data-target="<? echo $modal2;?>">

                   
                  


                <?php else: ?>
                   <input type="image" src="imagenes/no_pdf.png"  class="img-thumbnail"  value="<? echo $row['id_orden'];?>" <? echo 'onclick='.$n_click.''?> data-toggle="modal" data-target="<? echo $modal2;?>">

                   
                <?php endif ?>  
            </div>
            
            <div  class="col-md-2" >
              <span>Factura</span>
            </div>
            <div  class="col-md-1" >
              
            </div>

        
            <div class="col-xs-2 col-md-3 col-lg-3">
            
            <?php if ($row['nota_envio']!=null): ?>
               <a  href="../../../sistema/artes_esa17/<?php echo $row['nota_envio']; ?>" class="fancybox">
              <img src="imagenes/pdf.png" class="img-thumbnail"></a>
                <?php else: ?>
                  <img src="imagenes/no_pdf.png" class="img-thumbnail" data-toggle="modal" data-target="#nenviosv" onclick="pasarDatos('<?php echo $row['id_orden']; ?>')">
                    <?php endif ?>
              
              
            </div>
            <div class="col-md-2">
              <span>Envio</span>
            </div>
          </div>
          <!------------------------------------------------------------------->

          
          <div class="row">
            <div class="col-xs-2 col-md-3 col-lg-3">
           
            <?php if ($row['nota_remision_HH']!=null): ?>
               <a href="../../../sistema/artes_esa17/<?php echo $row['nota_remision_HH']; ?>" class="fancybox">
              <img src="imagenes/pdf.png" class="img-thumbnail">remision</a>
                <?php else: ?>
                  <input type="image" src="imagenes/no_pdf.png" width="50" id="enviar25" data-toggle="modal" data-target="#nremisionsv" onclick="pasarDatos('<?php echo $row['id_orden']; ?>')"  />
                <?php endif ?>
              
              
            </div>
            <div class="col-md-2">
              <span>Nota de Remision </span>
            </div>
            <div  class="col-md-1" >
              <span></span>
            </div>
            
        
            <div class="col-xs-2 col-md-3 col-lg-3">
             
            <?php if ($row['pack_lista']!=null): ?>
              <a  href="../../../sistema/artes_esa17/<?php echo $row['pack_lista']; ?>" class="fancybox">pack
              <img src="imagenes/pdf.png" class="img-thumbnail"></a>
                <?php else: ?>
                  <img src="imagenes/no_pdf.png" class="img-thumbnail" data-toggle="modal" data-target="#packsv" 
                   onclick="pasarDatos('<?php echo $row['id_orden']; ?>')"></a>
                    <?php endif ?>
              
              
            </div>
            <div class="col-md-2">
              <span>Packing List</span>
            </div>
          </div>

          <div class="row">
            <div class="col-xs-2 col-md-3 col-lg-3">
           
            <?php if ($row['nota_remision_HH']!=null): ?>
               <a href="../../../sistema/artes_esa17/<?php echo $row['nota_remision_HH']; ?>" class="fancybox">
              <img src="imagenes/pdf.png" class="img-thumbnail">remision</a>
                <?php else: ?>
                  <input type="image" src="imagenes/no_pdf.png" width="50" id="enviar25" data-toggle="modal" data-target="#ocomprasv" onclick="pasarDatos('<?php echo $row['id_orden']; ?>')"  />
                <?php endif ?>
              
              
            </div>
            <div class="col-md-2">
              <span>Orden de Compra</span>
            </div>
            <div  class="col-md-1" >
              <span></span>
            </div>
            
        
            
          </div>
          
            
            
          
          

</div>

<!-- SEPARACION   PRIMER BLOQUE-------------------------------------------------------------------------------------------->
<!--<div class="col-md-1"></div>-->

<div class="col-md-4">
        
        <div class="row">
            <div class="col-xs-2 col-md-3 col-lg-3">
         
            <?php if ($row['duca_f']!=null): ?>
                <a href="../../../sistema/artes_esa17/<?php echo $row['duca_f']; ?>" class="fancybox">
              <img src="imagenes/pdf.png" class="img-thumbnail"></a>
                <?php else: ?>
                  <img src="imagenes/no_pdf.png" class="img-thumbnail" data-toggle="modal" data-target="#ducafsv" 
            onclick="pasarDatos('<?php echo $row['id_orden']; ?>')"></a>
                    <?php endif ?>
              
              
            </div>
            <div class="col-md-2">
              <span>Fauca</span>
            </div>
            <div class="col-md-1"></div>
            
        
            <div class="col-xs-2 col-md-3 col-lg-3">
             
            <?php if ($row['carta_p']!=null): ?>
               <a href="../../../sistema/artes_esa17/<?php echo $row['carta_p']; ?>" class="fancybox">
              <img src="imagenes/pdf.png" class="img-thumbnail"></a>
                <?php else: ?>
                  <img src="imagenes/no_pdf.png" class="img-thumbnail" data-toggle="modal" data-target="#cportesv" 
            onclick="pasarDatos('<?php echo $row['id_orden']; ?>')"></a>
                    <?php endif ?>
              
              
            </div>
            <div class="col-md-2">
              <span>Carta Porte</span>
            </div>


        </div>
        
        
        <!------------------------------------------------------------------->
        <div class="row">
          

            <div class="col-xs-2 col-md-3 col-lg-3">
          
            <?php if ($row['m_carga']!=null): ?>
                <a href="../../../sistema/artes_esa17/<?php echo $row['m_carga']; ?>" class="fancybox">
              <img src="imagenes/pdf.png" class="img-thumbnail"></a>
                <?php else: ?>
                  <img src="imagenes/no_pdf.png" class="img-thumbnail" data-toggle="modal" data-target="#mcargasv" 
            onclick="pasarDatos('<?php echo $row['id_orden']; ?>')"></a>
                    <?php endif ?>
              
            </div>
            <div class="col-md-2">
              <span>Manifiesto de Carga</span>
            </div>
            <div class="col-md-1"></div>

            <div class="col-xs-2 col-md-3 col-lg-3">
          
            <?php if ($row['duca_t']!=null): ?>
                <a href="../../../sistema/artes_esa17/<?php echo $row['duca_t']; ?>" class="fancybox">
              <img src="imagenes/pdf.png" class="img-thumbnail"></a>
                <?php else: ?>
                  <img src="imagenes/no_pdf.png" class="img-thumbnail" data-toggle="modal" data-target="#ducatsv" 
            onclick="pasarDatos('<?php echo $row['id_orden']; ?>')"></a>
                    <?php endif ?>
              
            </div>
            <div class="col-md-2">
              <span>Duca T</span>
            </div>
        </div>
        
          <!------------------------------------------------------------------->
       
          <div class="row">
            <div class="col-xs-2 col-md-3 col-lg-3">
           
            <?php if ($row['pago_impuesto']!=null): ?>
               <a href="../../../sistema/artes_esa17/<?php echo $row['p_impuesto']; ?>" class="fancybox">
              <img src="imagenes/pdf.png" class="img-thumbnail"></a>
                <?php else: ?>
                  <img src="imagenes/no_pdf.png" class="img-thumbnail" data-toggle="modal" data-target="#pimpuestosv" 
            onclick="pasarDatos('<?php echo $row['id_orden']; ?>')"></a>
                    <?php endif ?>
              
            </div>
            <div class="col-md-2">
              <span>Pago Impuesto</span>
            </div>
            <div class="col-md-1"></div>
        
            <div class="col-xs-2 col-md-3 col-lg-3">
         
            <?php if ($row['scan_poliza']!=null): ?>
                <a href="../../../sistema/artes_esa17/<?php echo $row['scan_poliza']; ?>" class="fancybox">
              <img src="imagenes/pdf.png" class="img-thumbnail"></a>
                <?php else: ?>
                  <img src="imagenes/no_pdf.png" class="img-thumbnail" data-toggle="modal" data-target="#pexportacionsv" 
            onclick="pasarDatos('<?php echo $row['id_orden']; ?>')"></a>
                    <?php endif ?>
              
            </div>
            <div class="col-md-2">
              <span>Poliza Exportacion</span>
            </div>
          </div>
          <!------------------------------------------------------------------->

          
        
</div>

<!------------------SEPARACION FIN SEGUNDO BLOQUE---------------------------------------------------------------------------->
<!--<div class="col-md-1"></div>-->

<div class="col-md-4">
        <div class="row">
            <div class="col-xs-2 col-md-3 col-lg-3">
              
            <?php if ($row['solicitud_despacho']!=null): ?>
              <a href="../../../sistema/artes_esa17/<?php echo $row['solicitud_despacho']; ?>" class="fancybox">
              <img src="imagenes/pdf.png" class="img-thumbnail"></a>
                <?php else: ?>
            <img src="imagenes/no_pdf.png" class="img-thumbnail" data-toggle="modal" data-target="#sdespachosv" 
                        onclick="pasarDatos('<?php echo $row['id_orden']; ?>')">
            <?php endif ?>
              
            </div>
            <div class="col-md-2">
             <span>Solicitud de despacho</span>
            </div>
            <div class="col-md-1"></div>
        
            <div class="col-xs-2 col-md-3 col-lg-3">
              
            <?php if ($row['servicio_exportacion']!=null): ?>
              <a href="../../../sistema/artes_esa17/<?php echo $row['servicio_exportacion']; ?>" class="fancybox">
              <img src="imagenes/pdf.png" class="img-thumbnail"></a>
                <?php else: ?>
                 <img src="imagenes/no_pdf.png" class="img-thumbnail" data-toggle="modal" data-target="#sexportacionsv" 
            onclick="pasarDatos('<?php echo $row['id_orden']; ?>')">
                    <?php endif ?>
              
            </div>
            <div class="col-md-2">
              <span>Servicio Exportacion</span>
            </div>
        </div>

        <!------------------------------------------------------------------->
          
          
        
        <div class="row">
            <div class="col-xs-2 col-md-3 col-lg-3">
          
            <?php if ($row['servicio_transporte']!=null): ?>
                 <a href="../../../sistema/artes_esa17/<?php echo $row['servicio_transporte']; ?>" class="fancybox">
              <img src="imagenes/pdf.png" class="img-thumbnail"></a>
                <?php else: ?>
                 <img src="imagenes/no_pdf.png" class="img-thumbnail" data-toggle="modal" data-target="#stransportesv" 
            onclick="pasarDatos('<?php echo $row['id_orden']; ?>')">
                    <?php endif ?>
              
            </div>
            <div class="col-md-2">
              <span>Servicio Transporte</span>
            </div>
            <div class="col-md-1"></div>
        
            <div class="col-xs-2 col-md-3 col-lg-3">
          
            <?php if ($row['poliza_seguro']!=null): ?>
               <a href="../../../sistema/artes_esa17/<?php echo $row['poliza_seguro']; ?>" class="fancybox">
              <img src="imagenes/pdf.png" class="img-thumbnail"></a>
                <?php else: ?>
                  <img src="imagenes/no_pdf.png" class="img-thumbnail" data-toggle="modal" data-target="#polizasv" 
            onclick="pasarDatos('<?php echo $row['id_orden']; ?>')">
                    <?php endif ?>
              
            </div>
            <div class="col-md-2">
              <span>Poliza Seguro</span>
            </div>
        </div>
        <!------------------------------------------------------------------->


        <!------------------------------------------------------------------->
            
</div>
          <form method="post" action="form/add_doc/subir_factura.php" enctype="multipart/form-data" >
    <div class="modal fade" id="<? echo $modal;?>" tabindex="0" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
       
           <div class="modal-body">
              

            <div class="form-group">

                 
                  <div id="<?echo $n_funcion;?>"><b></b>ss</div>
            </div>

           
        
               
             </div>  
                 <br><br><br>
          <div class="modal-footer">
       
            <button type="submit" class="btn btn-primary">CERRAR</button>
          </div>
        </div>
      </div>
    </div>

   

</form>



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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<?$var='<div id="respuestasa"></div>';?>



  



 