<?php 






                                while ($row = mysqli_fetch_array($consulta2))
                                   {

                                  

                                    $status=$row['status'];
                                    $id=$row['id_orden'];
                                    $data3='nica';
                                      $data='#'.$id.$data3;
                                      $data2=$id.$data3;

                                    $ext=".png";

                                   ?>
                                     
                              <? echo '  <tr  type="button" data-toggle="collapse" data-target="'.$data.'" aria-expanded="false" >';  ?>
                               
                                  <td align="left" >  <?php echo $row[   'numorden_compra'  ];    ?>  </td>
                                <td align="left" >  <?php echo $row[   'marca'  ];   ?>  </td>
                                 <td align="left" > 
                  &nbsp;&nbsp;&nbsp;&nbsp; <?php echo $row[   'origen'   ];  ?>  </td>
                                <td align="left" > 
                  &nbsp;&nbsp;&nbsp;&nbsp; <?php echo $row[   'destino'   ];  ?>  </td>
                                 <!--<td><a href="pop.orden.activa.iframe.php?idorden=<?php //echo $row['id_orden']; ?>"> Ver Productos</a>  </td>
                                <!--<td>  <?php //  echo $row[   'n_motorista'     ];  ?>  </td>                                 
                                <td>  <?php //echo $row[   'p_vehiculo'      ];  ?>  </td>-->
                                <td align="left" >  <?php echo $row[   'f_salida'      ];  ?>  </td>
                                <td align="left">  <?php echo $row[   'f_llegada'];  ?>  </td>
                                
                                <td align="left" >  <?php echo $row[   'descripcion'];  ?>  </td>
                                <!--<td>  <?php //cho $row[   'p_vehiculo'      ];  ?>  </td>-->
                                <td><a  class="fa fa-file-archive-o" aria-hidden="true" href="../sistema/zip/index_nica.php?idorden=<?php echo $row['id_orden']; ?>"> </a>  </td>
                                <?
                                  $idorden=$row['id_orden'];


                                
                               ?>
                               <!--<td><?php //echo $row['id_orden']; ?></td>-->
                                <!--<td> <img height='30px' src="foto_log/<?php //echo $row['f_empaque']; ?>" /> </td>-->
                               <!-- <td><a href="imprimir_doc.php?id=<?php //  echo $row['id_logistica']; ?>"> Ver documentos</a></td>-->
                           
                                   
                                   <td align="center">
                                    <a href="#">  <i class='fas fa-angle-double-down'></i></a>

                                   </td>
                               


                               
                            </tr>
<? echo' <tr div id="'.$data2.'"class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample" align="center">';?>
          <td width="10%"></td> <td >                
      <div class="card-body">

       <b><span>STATUS </span> </b><br>



  <table class="table" border="1" >
  <thead class="bg-black" border="1">
   <tr>
<th class="text-left">Proceso</th>
<th class="text-left">Fecha/Hora</th>
</tr>
<br>
  </thead>
  <tbody>
    <?  $consultaa = mysqli_query($conexion2," select status, f_hora from bitacora_s where id_orden='".$row['id_orden']."'");


?>
     <?php  while ($row2019 = mysqli_fetch_array($consultaa)){

                                   ?>
    <tr >
      
      <td class="text-left">  
        <?php if (($row2019['status'])=="PROCESO"):?>
          <i class="fa fa-cog fa-spin"></i> &nbsp; &nbsp; <?php echo $row2019[   'status'     ];  ?><?php endif ?>
        <?php if (($row2019['status'])=="TRANSITO"):?>
          <i class="fa fa-truck" aria-hidden="true"></i> &nbsp; &nbsp; <?php echo $row2019[   'status'     ];  ?><?php endif ?>
        <?php if (($row2019['status'])=="CARGANDO"):?>
          <i class="fa fa-users"></i> &nbsp; &nbsp; <?php echo $row2019[   'status'     ];  ?><?php endif ?>
        <?php if (($row2019['status'])=="DESPACHO"):?>
          <i class="fa fa-book" aria-hidden="true"></i> &nbsp; &nbsp; <?php echo $row2019[   'status'     ];  ?><?php endif ?>
        <?php if (($row2019['status'])=="ADUANA DE SALIDA"):?>
          <i class="fa fa-flag-checkered"></i> &nbsp; &nbsp; <?php echo $row2019[   'status'     ];  ?><?php endif ?>
        <?php if (($row2019['status'])=="ADUANA DE DESTINO"):?>
          <i class="fa fa-building" aria-hidden="true"></i> &nbsp; &nbsp; <?php echo $row2019[   'status'     ];  ?><?php endif ?>
        <?php if (($row2019['status'])=="ENTREGADO"):?>
          <i class="fa fa-check-circle" aria-hidden="true"></i>&nbsp; &nbsp; <?php echo $row2019[   'status'     ];  ?><?php endif ?>
        <?php if (($row2019['status'])=="PROBLEMA"):?>
          <i class="fa fa-exclamation-triangle" aria-hidden="true"></i> &nbsp; &nbsp; <?php echo $row2019[   'status'     ];  ?><?php endif ?>  </td>
          <td width="" class="text-left">  <?php echo $row2019[   'f_hora'     ];  ?>  </td>
    </tr>
        <?php
                                 }
                               ?>

  </tbody>
</table>

      </div>
    </div>
  </div>

</td>

<td width="10%"></td>



 <!--Bloque para dar separacion --> <!-- FIN BLOQUE SEPARACION -->
<td> <!--AQUI COMIENZA LAS TABLAS DE DOCUMENTOS-->


<b><span>DOCUMENTOS </span></b>
<b>


<?

$consult = mysqli_query($conexion2," select a1.id_orden, a1.estado,a2.id_orden, a2.estado, a1.status, a1.marca, a1.origen, a1.destino, a1.f_salida, a1.f_llegada, a1.descripcion, a1.status ,a1.m_carga, a1.carta_p, a1.factura, a1.duca_t, a1.duca_f, a1.nota_envio_cd, a1.orden_compra, a1.p_vehiculo, a2.id_orden, a2.cot, a3.id_cotizacion, a3.archivo,a1.nota_envio from logitica a1 INNER JOIN pop_detalle a2 ON a1.id_orden=a2.id_orden inner join cotizacion a3 on a2.cot=a3.id_cotizacion WHERE a1.id_orden='".$idorden."' order by a1.f_llegada asc
 ");
echo $idorde;

                                while ($row = mysqli_fetch_array($consult))
                                   {
                                    $destino=$row[7];
                                    $manifiesto=$row[12];
                                    $carta_porte=$row[13];
                                    $factura=$row[14];
                                    $duca_f=$row[16];
                                    $duca_t=$row[15];  
                                    $nota_envio_cd=$row[17];
                                    $orden_compra=$row[18];
                                    $p_vehiculo=$row[19];
                                    $archivo=$row[23];
                                    $nota_enviox=$row[24];
                                    
                                                              


                                   }?>
                                   <?php if ($nota_envio_cd==null) {
                                     $nota_envio=$nota_enviox;
                                   } else {
                                     $nota_envio=$nota_envio_cd;
                                   }
                                    ?>




  <table class="table" border="1">
<thead class="bg-black">
<br><br>
<tr  border="1">

<th class="text-left">Documento </th>
<th class="text-left">Ver pdf</th>
</thead>
</tr>
<tbody class="table-hover"  border="1">
  
 




  <?php if ($p_vehiculo=="Aereo"||$p_vehiculo=="aereo"){ ?>

  <tr>
         <td class="text-left">Cotizacion</td>
        
        <td class="text-left">
               <div class="col-lg-2 col-md-4 col-xs-6 thumb">
                <a href="../sistema/cotizaciones_nica19/<?php echo $archivo; ?>" class="fancybox"  >

                     <img  src="../sistema/artes_esa17/IMGPDF/PDF.png" class="zoom img-fluid " height="50 PX"   alt=""> 
                 
                   
                </a>
            </div>
           
         </td>
        </tr>
      
      
        <tr>
        <td class="text-left">Factura</td>
        
        <td class="text-left"><?php if ($factura!=null){ ?>
               <div class="col-lg-2 col-md-4 col-xs-6 thumb">
                <a href="../sistema/artes_esa17/<?php echo $factura; ?>" class="fancybox"  >

                     <img  src="../sistema/artes_esa17/IMGPDF/PDF.png" class="zoom img-fluid " height="50 PX"   alt=""> 
                 
                   
                </a>
            </div>
            <?php }else{ ?>
                
               <div class="col-lg-2 col-md-4 col-xs-6 thumb">
  
                     <img  src="../sistema/artes_esa17/IMGPDF/NOFILE.png" class="zoom img-fluid " height="50 PX"   alt=""> 
          
            </div> 
             <?php } ?>
         </td>
        </tr>
      <tr>
      <td class="text-left">Guia Aerea</td>
      <td class="text-left"><?php if ($guia_aerea!=null){ ?>
                 <div class="col-lg-2 col-md-4 col-xs-6 thumb">
                  <a href="../sistema/artes_esa17/<?php echo $guia_aerea; ?>" class="fancybox" >
                    <img  src="../sistema/artes_esa17/IMGPDF/PDF.png" class="zoom img-fluid " height="50 PX"  alt=""> 
                  </a>
                </div>
        
      <?php }else{ ?>
        <!-- GUIA AEREA -->
             
                <div class="col-lg-2 col-md-4 col-xs-6 thumb">
                     <img  src="../sistema/artes_esa17/IMGPDF/NOFILE.png" class="zoom img-fluid " height="50 PX"   alt=""> 
                </div>
        
      <?php } ?></td>
      </tr>
      <tr>
      <td class="text-left">Orden de Compra</td>
      <td class="text-left"><!-- ORDEN DE COMPRA  -->
             <?php if ($orden_compra!=null){ ?>
                 <div class="col-lg-2 col-md-4 col-xs-6 thumb">
                  <a href="../sistema/artes_esa17/<?php echo $orden_compra; ?>" class="fancybox" >
                    <img  src="../sistema/artes_esa17/IMGPDF/PDF.png" class="zoom img-fluid " height="50 PX"   alt=""> 
                  </a>
                </div>
        
      <?php }else{ ?>
        <!-- ORDEN DE COMPRA -->
             
                <div class="col-lg-2 col-md-4 col-xs-6 thumb">
                     <img  src="../sistema/artes_esa17/IMGPDF/NOFILE.png" class="zoom img-fluid " height="50 PX"   alt=""> 
                </div>
                
        
      <?php } ?></td>
      </tr>
      <tr>
      <td class="text-left">Comprobante de Entrega</td>
      <td class="text-left"><!--comprobante de entrega-->
              <?php if ($comprobante_entrega!=null){ ?>
                 <div class="col-lg-2 col-md-4 col-xs-6 thumb">
                  <a href="../sistema/artes_esa17/<?php echo $comprobante_entrega; ?>" class="fancybox" >
                    <img  src="../sistema/artes_esa17/IMGPDF/PDF.png" class="zoom img-fluid " height="50 PX"   alt=""> 
                  </a>
                </div>        
      <?php }else{ ?>
        <!-- comprobante de entrega -->
            
                <div class="col-lg-2 col-md-4 col-xs-6 thumb">
                     <img  src="../sistema/artes_esa17/IMGPDF/NOFILE.png" class="zoom img-fluid " height="50 PX"   alt=""> 
                </div>          
               
             

        
      <?php } ?></td>
      </tr>

       <?php } ?>


<!--TERMINA EL MENU PARA AEREO-->













  



<!--FIN PARA MENU DE GUATEMALA Y HONDURAS-->


    
    <?php if ($destino=="GT"||$destino=="HN"||$destino=="CR"||$destino=="PN"){ ?>
      <tr>
        <td class="text-left">Cotizacion</td>
        
        <td class="text-left">
               <div class="col-lg-2 col-md-4 col-xs-6 thumb">
                <a href="../sistema/cotizaciones_nica19/<?php echo $archivo; ?>" class="fancybox" >

                     <img  src="../sistema/artes_esa17/IMGPDF/PDF.png" class="zoom img-fluid " height="50 PX"  alt=""> 
                 
                   
                </a>
            </div>
           
         </td>
      </tr>
      
      <tr>
        <td class="text-left">Manifiesto de Carga </td>
        <td class="text-left"><?php if ($manifiesto!=null){ ?>
               <div class="col-lg-2 col-md-4 col-xs-6 thumb">
                <a href="../sistema/artes_esa17/<?php echo $manifiesto; ?>" class="fancybox" >

                     <img  src="../sistema/artes_esa17/IMGPDF/PDF.png" class="zoom img-fluid " height="50 PX"   alt=""> 
                 
                   
                </a>
            </div>
          
        <?php } else{ ?>
          <div class="col-lg-2 col-md-4 col-xs-6 thumb">
                     <img  src="../sistema/artes_esa17/IMGPDF/NOFILE.png " class="zoom img-fluid " height="50 PX"   alt=""> 
              </div>
          
        <?php } ?></td>
      </tr>
      <tr>
        <td class="text-left">Carta Porte</td>
        <td class="text-left"><?php if ($carta_porte!=null){ ?>
               <div class="col-lg-2 col-md-4 col-xs-6 thumb">
                <a href="../sistema/artes_esa17/<?php echo $carta_porte; ?>" class="fancybox" >

                     <img  src="../sistema/artes_esa17/IMGPDF/PDF.png" class="zoom img-fluid "  height="50 PX"  alt=""> 
                 
                   
                </a>
            </div>
          
        <?php }else{ ?>
          <div class="col-lg-2 col-md-4 col-xs-6 thumb">
  
                     <img  src="../sistema/artes_esa17/IMGPDF/NOFILE.png" class="zoom img-fluid " height="50 PX"  alt=""> 
          
            </div>
          
        <?php } ?></td>
      </tr>
               
      
      <tr>
        <td class="text-left">Factura</td>
        <td class="text-left"><?php if ($factura!=null){ ?>
               <div class="col-lg-2 col-md-4 col-xs-6 thumb">
                <a href="../sistema/artes_esa17/<?php echo $factura; ?>" class="fancybox"  >

                     <img  src="../sistema/artes_esa17/IMGPDF/PDF.png" class="zoom img-fluid " height="50 PX"  alt=""> 
                 
                   
                </a>
            </div>
            <?php }else{?>
                
               <div class="col-lg-2 col-md-4 col-xs-6 thumb">
  
                     <img  src="../sistema/artes_esa17/IMGPDF/NOFILE.png" class="zoom img-fluid " height="50 PX"  alt=""> 
          
            </div> 
             <?php } ?>
         </td>
      </tr>
     
      </tr>
    
<?php } ?>


















   <?php if ($destino=="NI"){ ?>
             <td class="text-left">Cotizacion</td>
        
        <td class="text-left">
               <div class="col-lg-2 col-md-4 col-xs-6 thumb">
                <a href="../sistema/cotizaciones_nica19/<?php echo $archivo; ?>" class="fancybox" >

                     <img  src="../sistema/artes_esa17/IMGPDF/PDF.png" class="zoom img-fluid " height="50 PX"  alt=""> 
                 
                   
                </a>
            </div>
           
         </td>
        </tr>
      
     
      <tr>
        <td class="text-left">Nota de Envio</td>
        <td class="text-left"><?php if ($nota_envio!=null){ ?>
                <div class="col-lg-2 col-md-4 col-xs-6 thumb">
                    <a href="../sistema/artes_esa17/<?php echo $nota_envio; ?>" class="fancybox" >
                         <img  src="../sistema/artes_esa17/IMGPDF/PDF.png" class="zoom img-fluid " height="50 PX"   alt="">  
                    </a>
                </div>
          
        <?php }else{ ?>
          <div class="col-lg-2 col-md-4 col-xs-6 thumb">
                     <img  src="../sistema/artes_esa17/IMGPDF/NOFILE.png" class="zoom img-fluid " height="50 PX"  alt=""> 
                </div>
        <?php } ?></td>
      </tr>
      <tr>
        <td class="text-left">Orden de Compra</td>
        <td class="text-left"><!-- ORDEN DE COMPRA  -->
             <?php if ($orden_compra!=null){ ?>
                 <div class="col-lg-2 col-md-4 col-xs-6 thumb">
                  <a href="../sistema/artes_esa17/<?php echo $orden_compra; ?>" class="fancybox" >
                    <img  src="../sistema/artes_esa17/IMGPDF/PDF.png" class="zoom img-fluid " height="50 PX"   alt=""> 
                  </a>
                </div>
          
        <?php }else{ ?>
          <div class="col-lg-2 col-md-4 col-xs-6 thumb">
                     <img  src="../sistema/artes_esa17/IMGPDF/NOFILE.png" class="zoom img-fluid " height="50 PX"   alt=""> 
                </div>
        <?php } ?></td>
      </tr>
</td>
      </tr>            



  <? } ?>





</tbody>
</table></b>

</td><!-- TERMINA BLOQUE DE DOCUMENTOS   -->


<td width="10%"></td>




<?
$consulte = mysqli_query($conexion2," select a1.id_orden, a1.estado,a2.id_orden, a2.estado, a1.status, a1.marca, a1.origen, a1.destino, a1.f_salida, a1.f_llegada, a1.descripcion, a1.status ,a1.m_carga, a1.carta_p, a1.factura, a1.duca_t, a1.duca_f, a1.nota_envio, a1.orden_compra, a1.p_vehiculo, a2.id_orden, a2.cot, a3.id_cotizacion, a3.archivo from logitica a1 INNER JOIN pop_detalle a2 ON a1.id_orden=a2.id_orden inner join cotizacion a3 on a2.cot=a3.id_cotizacion WHERE a1.id_orden='".$idorden."' order by a1.f_llegada asc
 ");


                                while ($row1 = mysqli_fetch_array($consulte))
                                   {
                                    $destino=$row1[7];
                                    $manifiesto=$row1[12];
                                    $carta_porte=$row1[13];
                                    $factura=$row1[14];
                                    $duca_f=$row1[16];
                                    $duca_t=$row1[15];  
                                    $nota_envio=$row1[17];
                                    $orden_compra=$row1[18];
                                    $p_vehiculo=$row1[19];
                                    $archivo=$row1[23];
                                    
                                                              


                                   }?>
                                   <!--<?php if ($nota_envio_cd==null) {
                                     $nota_envio=$nota_enviox;
                                   } else {
                                     $nota_envio=$nota_envio_cd;
                                   }
                                    ?>-->


<?php if ($destino=="HN"||$destino=="GT"||$destino=="CR"||$destino=="PN"){ ?>
<td> <!--AQUI COMIENZA LAS TABLAS DE DOCUMENTOS-->


<b><span>DOCUMENTOS </span></b>
<b>


  <table class="table" border="1">
<thead class="bg-black">
<br><br>
<tr  border="1">

<th class="text-left">Documento </th>
<th class="text-left">Ver pdf</th>
</thead>
</tr>
<tbody class="table-hover"  border="1">
  
  


<!--TERMINA EL MENU PARA AEREO-->













  



<!--FIN PARA MENU DE GUATEMALA Y HONDURAS-->


      <tr>
        <td class="text-left">Duca_F</td>
        <td class="text-left"><?php if ($duca_f!=null){ ?>
                <div class="col-lg-2 col-md-4 col-xs-6 thumb">
                <a href="../sistema/artes_esa17/<?php echo $duca_f; ?>" class="fancybox" >

                     <img  src="../sistema/artes_esa17/IMGPDF/PDF.png" class="zoom img-fluid "  height="50 PX"  alt=""> 
                 
                   
                </a>
            </div>
          
        <?php }else{ ?>
          <div class="col-lg-2 col-md-4 col-xs-6 thumb">
  
                     <img  src="../sistema/artes_esa17/IMGPDF/NOFILE.png" class="zoom img-fluid " height="50 PX"   alt=""> 
          
            </div> 
        <?php } ?></td>
      </tr>
      <tr>
        <td class="text-left">Nota de Envio</td>
        <td class="text-left"><?php if ($nota_envio!=null){ ?>
                <div class="col-lg-2 col-md-4 col-xs-6 thumb">
                    <a href="../sistema/artes_esa17/<?php echo $nota_envio; ?>" class="fancybox" >
                         <img  src="../sistema/artes_esa17/IMGPDF/PDF.png" class="zoom img-fluid " height="50 PX"   alt="">  
                    </a>
                </div>
          
        <?php }else{ ?>
          <div class="col-lg-2 col-md-4 col-xs-6 thumb">
                     <img  src="../sistema/artes_esa17/IMGPDF/NOFILE.png" class="zoom img-fluid " height="50 PX"  alt=""> 
                </div>
        <?php } ?></td>
      </tr>
      <tr>
        <td class="text-left">Orden de Compra</td>
        <td class="text-left"><!-- ORDEN DE COMPRA  -->
             <?php if ($orden_compra!=null){ ?>
                 <div class="col-lg-2 col-md-4 col-xs-6 thumb">
                  <a href="../sistema/artes_esa17/<?php echo $orden_compra; ?>" class="fancybox" >
                    <img  src="../sistema/artes_esa17/IMGPDF/PDF.png" class="zoom img-fluid " height="50 PX"   alt=""> 
                  </a>
                </div>
          
        <?php }else{ ?>
          <div class="col-lg-2 col-md-4 col-xs-6 thumb">
                     <img  src="../sistema/artes_esa17/IMGPDF/NOFILE.png" class="zoom img-fluid " height="50 PX"   alt=""> 
                </div>
        <?php } ?></td>
      </tr>
    </td></tr>



















   <?php if ($destino=="NI"){ ?>

             <td class="text-left">Cotizacion_nc</td>
        
        <td class="text-left">
               <div class="col-lg-2 col-md-4 col-xs-6 thumb">
                <a href="../sistema/cotizaciones_nica19/<?php echo $archivo; ?>" class="fancybox" >

                     <img  src="../sistema/artes_esa17/IMGPDF/PDF.png" class="zoom img-fluid " height="50 PX"  alt=""> 
                 
                   
                </a>
            </div>
           
         </td>
        </tr>
      
     
      <tr>
        <td class="text-left">Nota de Envio</td>
        <td class="text-left"><?php if ($nota_envio!=null){ ?>
                <div class="col-lg-2 col-md-4 col-xs-6 thumb">
                    <a href="../sistema/artes_esa17/<?php echo $nota_envio; ?>" class="fancybox" >
                         <img  src="../sistema/artes_esa17/IMGPDF/PDF.png" class="zoom img-fluid " height="50 PX"   alt="">  
                    </a>
                </div>
          
        <?php }else{ ?>
          <div class="col-lg-2 col-md-4 col-xs-6 thumb">
                     <img  src="../sistema/artes_esa17/IMGPDF/NOFILE.png" class="zoom img-fluid " height="50 PX"  alt=""> 
                </div>
        <?php } ?></td>
      </tr>
      <tr>
        <td class="text-left">Orden de Compra</td>
        <td class="text-left"><!-- ORDEN DE COMPRA  -->
             <?php if ($orden_compra!=null){ ?>
                 <div class="col-lg-2 col-md-4 col-xs-6 thumb">
                  <a href="../sistema/artes_esa17/<?php echo $orden_compra; ?>" class="fancybox" >
                    <img  src="../sistema/artes_esa17/IMGPDF/PDF.png" class="zoom img-fluid " height="50 PX"   alt=""> 
                  </a>
                </div>
          
        <?php }else{ ?>
          <div class="col-lg-2 col-md-4 col-xs-6 thumb">
                     <img  src="../sistema/artes_esa17/IMGPDF/NOFILE.png" class="zoom img-fluid " height="50 PX"   alt=""> 
                </div>
        <?php } ?></td>
      </tr>
</td>
      </tr>            



  <? } ?>





</tbody>
</table>  <? } ?></b>

</td><!-- TERMINA BLOQUE DE DOCUMENTOS   -->



<!-- BUSCANDO LAS FOTOS QUE PERTENECEN A LA ORDEN DENTRO DEL WHILE-->









  






 <!--Bloque para dar separacion --> <td width="1%">
   



 </td><!-- FIN BLOQUE SEPARACION -->
<td><!--INICIO DE BLOQUE PARA FOTOS-->

  <br><br>








 
            <div class="col-lg-3 col-md-4 col-xs-6 thumb">
 
    <a data-fancybox data-type="iframe" href="fotos_nuevo.php?id_orden=<? echo $idorden;?>&&x=cargando&&p=NI" ><?php echo $row['id_orden']; ?><img src="cargando.png"  width="100"></a>
    <a data-fancybox data-type="iframe" href="fotos_nuevo.php?id_orden=<? echo $idorden;?>&&x=evento&&p=NI" ><img src="evento.png"  width="100"></a>
    <a data-fancybox data-type="iframe" href="fotos_nuevo.php?id_orden=<? echo $idorden;?>&&x=entrega&&p=NI" ><img src="entrega.png"  width="100"></a>
    <a href="#"><img src="instructivo.png" width="100"></a>

 

</div>


</td>
           















</tr> <?php
                                 }
                               ?>