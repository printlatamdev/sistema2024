<table class="table">
  <thead>
    <tr>
      <th scope="col"></th>
      <th scope="col"></th>
      <th scope="col"></th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td width="60"></td>
      <td width="20"><!--- PRIMER TABLA -->
 

  <table  border="1" >
  <thead class="bg-black" border="1">
   <tr>
<th class="text-left">Proceso</th>
<th class="text-left">Fecha/Hora</th>
</tr>
<br>
  </thead>
  <tbody>
    <? include("connect.php");
     $conexion = conexion();
      $consulta2019 = mysqli_query($conexion," select status, f_hora from bitacora_s where id_orden=137");
?>
     <?php  while ($row2019 = mysqli_fetch_array($consulta2019)){

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
</table> <td width="20"></td></td><!--- FIN PRIMER TABLA -->
      <td><!-- SEGUNDA TABLA -->

        <?

 $consulta = mysqli_query($conexion,"select t1.id_logistica, t1.id_orden, t1.f_empaque, t1.p_vehiculo, t1.n_motorista, t1.destino, t1.status, t1.f_salida, t1.f_llegada,
   t1.m_carga, t1.carta_p, t1.factura, t1.duca_f, t1.duca_t, t1.nota_envio_cd, t1.orden_compra,t1.nota_envio, t1.p_vehiculo, t1.comprobante_entrega, t1.guia_aerea, t1.fo_entrega, t1.estado,      t2.id_orden, t2.id_empresa, t2.empresa, t2.id_contacto, t2.contacto, t3.nombre, t3.celular, t3.email, t4.id_marca, t4.marca from logitica t1 inner join orden t2 on t1.id_orden=t2.id_orden inner join contacto t3 on t2.id_contacto=t3.id_contacto inner JOIN pop_marca t4 on t1.id_marca=t4.id_marca where t1.id_orden=137
 ");


                                while ($row = mysqli_fetch_array($consulta))
                                   {
                                    $destino=$row[5];
                                    $manifiesto=$row[9];
                                    $carta_porte=$row[10];
                                    $factura=$row[11];
                                    $duca_f=$row[12];
                                    $duca_t=$row[13];  
                                    $nota_envio=$row[16];
                                    $orden_compra=$row[15];
                                    $p_vehiculo=$row[17];
                                    $comprobante_entrega=$row[18];
                                    $guia_aerea=$row[19];
                                    
                                    
                                                              


                                   }

        ?>
<table>
<thead class="bg-black" border="1">

<tr>
<th class="text-left">Documento</th>
<th class="text-left">Ver pdf</th>
</thead>
</tr>
<tbody class="table-hover">
  <?php if ($p_vehiculo=="Aereo"||$p_vehiculo=="aereo"): ?>
      
        <tr>
        <td class="text-left">Factura</td>
        
        <td class="text-left"><?php if ($factura!=null): ?>
               <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                <a href="../sistema/artes_esa17/<?php echo $factura; ?>"   class="fancybox" rel="ligthbox">

                     <img  src="../sistema/artes_esa17/IMGPDF/PDF.png" width="20" class="zoom img-fluid "  alt=""> 
                 
                   
                </a>
            </div>
            <?php else: ?>
                
               <div class="col-lg-3 col-md-4 col-xs-6 thumb">
  
                     <img  src="../sistema/artes_esa17/IMGPDF/NOFILE.png" width="20" class="zoom img-fluid "  alt=""> 
          
            </div> 
             <?php endif ?>
         </td>
        </tr>
      <tr>
      <td class="text-left">Guia Aerea</td>
      <td class="text-left"><?php if ($guia_aerea!=null): ?>
                 <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                  <a href="../sistema/artes_esa17/<?php echo $guia_aerea; ?>" class="rotate" >
                    <img  src="../sistema/artes_esa17/IMGPDF/PDF.png" width="20" class="zoom img-fluid "  alt=""> 
                  </a>
                </div>
        
      <?php else: ?>
        <!-- GUIA AEREA -->
             
                <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                     <img  src="../sistema/artes_esa17/IMGPDF/NOFILE.png" width="20" class="zoom img-fluid "  alt=""> 
                </div>
        
      <?php endif ?></td>
      </tr>
      <tr>
      <td class="text-left">Orden de Compra</td>
      <td class="text-left"><!-- ORDEN DE COMPRA  -->
             <?php if ($orden_compra!=null): ?>
                 <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                  <a href="../sistema/artes_esa17/<?php echo $orden_compra; ?>" class="rotate" >
                    <img  src="../sistema/artes_esa17/IMGPDF/PDF.png" width="20" class="zoom img-fluid "  alt=""> 
                  </a>
                </div>
        
      <?php else: ?>
        <!-- ORDEN DE COMPRA -->
             
                <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                     <img  src="../sistema/artes_esa17/IMGPDF/NOFILE.png" width="20" class="zoom img-fluid "  alt=""> 
                </div>
                
        
      <?php endif ?></td>
      </tr>
      <tr>
      <td class="text-left">Comprobante de Entrega</td>
      <td class="text-left"><!--comprobante de entrega-->
              <?php if ($comprobante_entrega!=null): ?>
                 <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                  <a href="../sistema/artes_esa17/<?php echo $comprobante_entrega; ?>" class="rotate" >
                    <img  src="../sistema/artes_esa17/IMGPDF/PDF.png" width="20" class="zoom img-fluid "  alt=""> 
                  </a>
                </div>
                
        
      <?php else: ?>
        <!-- comprobante de entrega -->
            
                <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                     <img  src="../sistema/artes_esa17/IMGPDF/NOFILE.png" width="20" class="zoom img-fluid "  alt=""> 
                </div>
                
               
             

        
      <?php endif ?></td>
      </tr></tbody></thead></table><br><br><br><br><br><br>
</table>
  <?php else: ?>
    <?php if ($destino=="GT"||$destino=="HN"): ?>
      <tr>
        <td class="text-left">Manifiesto de Carga </td>
        <td class="text-left"><?php if ($manifiesto!=null): ?>
               <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                <a href="../sistema/artes_esa17/<?php echo $manifiesto; ?>" class="rotate" >

                     <img  src="../sistema/artes_esa17/IMGPDF/PDF.png" width="20" class="zoom img-fluid "  alt=""> 
                 
                   
                </a>
            </div>
          
        <?php else: ?>
          <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                     <img  src="../sistema/artes_esa17/IMGPDF/NOFILE.png " width="20" class="zoom img-fluid "  alt=""> 
              </div>
          
        <?php endif ?></td>
      </tr>
      <tr>
        <td class="text-left">Carta Porte</td>
        <td class="text-left"><?php if ($carta_porte!=null): ?>
               <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                <a href="../sistema/artes_esa17/<?php echo $carta_porte; ?>" class="rotate" >

                     <img  src="../sistema/artes_esa17/IMGPDF/PDF.png" width="20" class="zoom img-fluid "  alt=""> 
                 
                   
                </a>
            </div>
          
        <?php else: ?>
          <div class="col-lg-3 col-md-4 col-xs-6 thumb">
  
                     <img  src="../sistema/artes_esa17/IMGPDF/NOFILE.png" width="20" class="zoom img-fluid "  alt=""> 
          
            </div>
          
        <?php endif ?></td>
      </tr>
      <tr>
        <td class="text-left">Factura</td>
        <td class="text-left"><?php if ($factura!=null): ?>
               <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                <a href="../sistema/artes_esa17/<?php echo $factura; ?>" class="fancybox" rel="ligthbox">

                     <img  src="../sistema/artes_esa17/IMGPDF/PDF.png" width="20" class="zoom img-fluid "  alt=""> 
                 
                   
                </a>
            </div>
            <?php else: ?>
                
               <div class="col-lg-3 col-md-4 col-xs-6 thumb">
  
                     <img  src="../sistema/artes_esa17/IMGPDF/NOFILE.png" width="20" class="zoom img-fluid "  alt=""> 
          
            </div> 
             <?php endif ?>
         </td>
      </tr>
      <tr>
        <td class="text-left">Duca_F</td>
        <td class="text-left"><?php if ($duca_f!=null): ?>
                <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                <a href="../sistema/artes_esa17/<?php echo $duca_f; ?>" class="rotate" >

                     <img  src="../sistema/artes_esa17/IMGPDF/PDF.png" width="20" class="zoom img-fluid "  alt=""> 
                 
                   
                </a>
            </div>
          
        <?php else: ?>
          <div class="col-lg-3 col-md-4 col-xs-6 thumb">
  
                     <img  src="../sistema/artes_esa17/IMGPDF/NOFILE.png" width="20" class="zoom img-fluid "  alt=""> 
          
            </div> 
        <?php endif ?></td>
      </tr>
      <tr>
        <td class="text-left">Nota de Envio</td>
        <td class="text-left"><?php if ($nota_envio!=null): ?>
                <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                    <a href="../sistema/artes_esa17/<?php echo $nota_envio; ?>" class="rotate" >
                         <img  src="../sistema/artes_esa17/IMGPDF/PDF.png" width="20" class="zoom img-fluid "  alt="">  
                    </a>
                </div>
          
        <?php else: ?>
          <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                     <img  src="../sistema/artes_esa17/IMGPDF/NOFILE.png" width="20" class="zoom img-fluid "  alt=""> 
                </div>
        <?php endif ?></td>
      </tr>
      <tr>
        <td class="text-left">Orden de Compra</td>
        <td class="text-left"><!-- ORDEN DE COMPRA  -->
             <?php if ($orden_compra!=null): ?>
                 <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                  <a href="../sistema/artes_esa17/<?php echo $orden_compra; ?>" class="rotate" >
                    <img  src="../sistema/artes_esa17/IMGPDF/PDF.png" width="20" class="zoom img-fluid "  alt=""> 
                  </a>
                </div>
          
        <?php else: ?>
          <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                     <img  src="../sistema/artes_esa17/IMGPDF/NOFILE.png" width="20" class="zoom img-fluid "  alt=""> 
                </div>
        <?php endif ?></td>
      </tr>
      <?php else: ?>
       <tr>
        <td class="text-left">Manifuesto de Carga </td>
        <td class="text-left"><?php if ($manifiesto!=null): ?>
               <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                <a href="../sistema/artes_esa17/<?php echo $manifiesto; ?>" class="rotate" >

                     <img  src="../sistema/artes_esa17/IMGPDF/PDF.png" width="20" class="zoom img-fluid "  alt=""> 
                 
                   
                </a>
            </div>
          
        <?php else: ?>
          <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                     <img  src="../sistema/artes_esa17/IMGPDF/NOFILE.png " width="20" class="zoom img-fluid "  alt=""> 
              </div>
          
        <?php endif ?></td>
      </tr>
      <tr>
        <td class="text-left">Carta Porte</td>
        <td class="text-left"><?php if ($carta_porte!=null): ?>
               <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                <a href="../sistema/artes_esa17/<?php echo $carta_porte; ?>" class="rotate" >

                     <img  src="../sistema/artes_esa17/IMGPDF/PDF.png" width="20" class="zoom img-fluid "  alt=""> 
                 
                   
                </a>
            </div>
          
        <?php else: ?>
          <div class="col-lg-3 col-md-4 col-xs-6 thumb">
  
                     <img  src="../sistema/artes_esa17/IMGPDF/NOFILE.png" width="20" class="zoom img-fluid "  alt=""> 
          
            </div>
          
        <?php endif ?></td>
      </tr>
      <tr>
        <td class="text-left">Factura</td>
        <td class="text-left"><?php if ($factura!=null): ?>
               <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                <a href="../sistema/artes_esa17/<?php echo $factura; ?>" class="fancybox" rel="ligthbox">

                     <img  src="../sistema/artes_esa17/IMGPDF/PDF.png" width="20" class="zoom img-fluid "  alt=""> 
                 
                   
                </a>
            </div>
            <?php else: ?>
                
               <div class="col-lg-3 col-md-4 col-xs-6 thumb">
  
                     <img  src="../sistema/artes_esa17/IMGPDF/NOFILE.png" width="20" class="zoom img-fluid "  alt=""> 
          
            </div> 
             <?php endif ?>
         </td>
      </tr>
      <tr>
        <td class="text-left">Duca_F</td>
        <td class="text-left"><?php if ($duca_f!=null): ?>
                <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                <a href="../sistema/artes_esa17/<?php echo $duca_f; ?>" class="rotate" >

                     <img  src="../sistema/artes_esa17/IMGPDF/PDF.png" width="20" class="zoom img-fluid "  alt=""> 
                 
                   
                </a>
            </div>
          
        <?php else: ?>
          <div class="col-lg-3 col-md-4 col-xs-6 thumb">
  
                     <img  src="../sistema/artes_esa17/IMGPDF/NOFILE.png" width="20" class="zoom img-fluid "  alt=""> 
          
            </div> 
        <?php endif ?></td>
      </tr>
      <tr>
        <td class="text-left">Duca_T</td>
        <td class="text-left"><?php if ($duca_t!=null): ?>
                <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                <a href="../sistema/artes_esa17/<?php echo $duca_t; ?>" class="rotate" >

                     <img  src="../sistema/artes_esa17/IMGPDF/PDF.png" width="20" class="zoom img-fluid "  alt=""> 
                 
                   
                </a>
            </div>
          
        <?php else: ?>
          <div class="col-lg-3 col-md-4 col-xs-6 thumb">
  
                     <img  src="../sistema/artes_esa17/IMGPDF/NOFILE.png" width="20" class="zoom img-fluid "  alt=""> 
          
            </div> 
        <?php endif ?></td>
      </tr>
      <tr>
        <td class="text-left">Nota de Envio</td>
        <td class="text-left"><?php if ($nota_envio!=null): ?>
                <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                    <a href="../sistema/artes_esa17/<?php echo $nota_envio; ?>" class="rotate" >
                         <img  src="../sistema/artes_esa17/IMGPDF/PDF.png" width="20" class="zoom img-fluid "  alt="">  
                    </a>
                </div>
          
        <?php else: ?>
          <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                     <img  src="../sistema/artes_esa17/IMGPDF/NOFILE.png" width="20" class="zoom img-fluid "  alt=""> 
                </div>
        <?php endif ?></td>
      </tr>
      <tr>
        <td class="text-left">Orden de Compra</td>
        <td class="text-left"><!-- ORDEN DE COMPRA  -->
             <?php if ($orden_compra!=null): ?>
                 <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                  <a href="../sistema/artes_esa17/<?php echo $orden_compra; ?>" class="rotate" >
                    <img  src="../sistema/artes_esa17/IMGPDF/PDF.png" width="20" class="zoom img-fluid "  alt=""> 
                  </a>
                </div>
          
        <?php else: ?>
          <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                     <img  src="../sistema/artes_esa17/IMGPDF/NOFILE.png" width="20" class="zoom img-fluid "  alt=""> 
                </div>
        <?php endif ?></td>
      </tr>

    <?php endif ?>
    
  <?php endif ?>









</tbody>
</table>
</td><!-- FIN SEGUNDA TABLA -->
     
    </tr>
   
  </tbody></table>