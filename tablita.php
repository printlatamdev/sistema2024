
 <?php 
 
session_start();
if(!isset($_SESSION['vsClave']))
{
  header("location:login.php");
}

$id=$_SESSION['vsIdempresa'];
  
$nombre=$_SESSION['vsNombre'];
include("connect.php");
   $conexion = conexion();
    
  $consulta1 = mysqli_query($conexion,"  select t1.id_logistica, t1.id_orden, t1.origen, t1.f_empaque, t1.p_vehiculo, t1.n_motorista, t1.destino, t1.status, t1.f_salida, t1.f_llegada,
   t1.m_carga, t1.carta_p, t1.factura, t1.duca_f, t1.duca_t, t1.nota_envio_cd, t1.orden_compra,t1.nota_envio, t1.fo_entrega, t1.estado,t1.descripcion,t2.id_orden, t2.id_empresa, t2.empresa, t2.id_contacto, t2.contacto, t3.nombre, t3.celular, t3.email, t4.id_marca, t4.marca from logitica t1 inner join pop t2 on t1.id_orden=t2.id_orden inner join contacto t3 on t2.id_contacto=t3.id_contacto inner JOIN pop_marca t4 on t1.id_marca=t4.id_marca where t1.estado=0 and t2.id_empresa='".$id."'    order by t1.f_llegada desc
 ");



   include("connect2.php");
   $conexion2 = conexion2();

  $consulta3 = mysqli_query($conexion2,"  select a1.id_orden, a1.estado,a2.id_orden, a2.estado, a1.status, a1.marca, a1.origen, a1.destino, a1.f_salida, a1.f_llegada, a1.descripcion, a1.status ,a1.m_carga,
a1.carta_p, a1.factura, a1.duca_t, a1.duca_f, a1.nota_envio_cd, a1.orden_compra, a1.nota_envio FROM logitica a1 inner join pop a2 on a1.id_orden=a2.id_orden inner join empresa a3 on a2.id_empresa=a3.id_empresa WHERE a2.empresa='".$nombre."' and a1.estado=0 and a1.status='ENTREGADO'  order by a1.f_llegada asc

 "); ?>
 <table class="dropdown notifications-menu">
                            <thead class="bg-primary" >
                              <tr>

                                   <th width="70" align="center">#Orden</th>
                                   <th width="70" align="center">Estado</th>
                                 <th width="70" align="center">Marca</th>
                                  <th width="70" align="center">Origen</th>
                                 <th width="70" align="center">Destino</th>
                                 <!--<th>Producto</th>
                                <!-- <th>Motorista</th>
                                 <th>Placa</th> -->                               
                                 <th width="70" align="center">F_salida</th>
                                 <th width="70" align="center">F_E_LL</th>  
                                 <th width="70" align="center">D_Paquete</th>
                                                              
                                 <th width="70" align="center"> &nbsp;&nbsp;&nbsp;Status</th>
                                 <th width="70" align="center">Documentacion</th>
                                   <th width="70" align="center"> &nbsp;&nbsp;&nbsp;&nbsp; Fotos</th>
                              


                                

                               </tr>
                            </thead>
                            <tbody>
                              
                               <?php 
                                while ($row = mysqli_fetch_array($consulta3))
                                   {

                                    $status=$row['status'];


                                    $ext=".png";

                                   ?>
                                 
                              
                               <tr>
                                 <td align='center'><a href='pruebadoc_nc.php?id=<? echo $row['id_orden'];?> role='button' ><i class='far fa-file'></i></a></td>
                                 <td>  <img height='30px' src="focus/<?php echo $status.$ext; ?>" /> </td>
                                <td align="center" >  <?php echo $row[   'marca'  ];   ?>  </td>
                                 <td  > 
                  &nbsp;&nbsp;&nbsp;&nbsp; <?php echo $row[   'origen'   ];  ?>  </td>
                                <td  > 
                  &nbsp;&nbsp;&nbsp;&nbsp; <?php echo $row[   'destino'   ];  ?>  </td>
                                 <!--<td><a href="pop.orden.activa.iframe.php?idorden=<?php //echo $row['id_orden']; ?>"> Ver Productos</a>  </td>
                                <!--<td>  <?php //  echo $row[   'n_motorista'     ];  ?>  </td>                                 
                                <td>  <?php //echo $row[   'p_vehiculo'      ];  ?>  </td>-->
                                <td >  <?php echo $row[   'f_salida'      ];  ?>  </td>
                                <td >  <?php echo $row[   'f_llegada'];  ?>  </td>
                                
                                <td >  <?php echo $row[   'descripcion'];  ?>  </td>
                                <!--<td>  <?php //cho $row[   'p_vehiculo'      ];  ?>  </td>-->
                                <?
                                  echo" <td align='center'><a onclick=\"myFunction6(".$row['id_orden'].")\" href='#' role='button'  data-toggle='modal'><i class='fas fa-shipping-fast'></i></a></td>"

                                
                               ?>
                                <!--<td> <img height='30px' src="foto_log/<?php //echo $row['f_empaque']; ?>" /> </td>-->
                               <!-- <td><a href="imprimir_doc.php?id=<?php //  echo $row['id_logistica']; ?>"> Ver documentos</a></td>-->
                                <?
                                  echo" <td align='center'><a onclick=\"myFunction4(".$row['id_orden'].")\" href='#' role='button'  data-toggle='modal'><i class='fas fa-folder-open'></i></a></td>"


                                
                               ?>

                               <?
                                  echo" <td > &nbsp;&nbsp;&nbsp;&nbsp; <a onclick=\"myFunction5(".$row['id_orden'].")\" href='#' role='button'  data-toggle='modal'><i class='fas fa-file-image'></i></a></td>"

                                 
                                
                               ?>
                                   
                               


                                  
                            </tr>
                               

                             <?php
                                 }
                               ?>

                               <?php 
                                while ($row = mysqli_fetch_array($consulta1))
                                   {

                                    $status=$row['status'];


                                    $ext=".png";

                                   ?>
                                 
                              <tr>
                               
                                 <td align='center'><a href='pruebadoc.php?id=<?echo $row['id_orden'];?>' role='button' ><i class='far fa-file'></i></a></td>
                                 <td>  <img height='30px' src="focus/<?php echo $status.$ext; ?>" /> </td>
                                <td align="center" >  <?php echo $row[   'marca'  ];   ?>  </td>
                                 <td  > 
                  &nbsp;&nbsp;&nbsp;&nbsp; <?php echo $row[   'origen'   ];  ?>  </td>
                                <td  > 
                  &nbsp;&nbsp;&nbsp;&nbsp; <?php echo $row[   'destino'   ];  ?>  </td>
                                 <!--<td><a href="pop.orden.activa.iframe.php?idorden=<?php //echo $row['id_orden']; ?>"> Ver Productos</a>  </td>
                                <!--<td>  <?php //  echo $row[   'n_motorista'     ];  ?>  </td>                                 
                                <td>  <?php //echo $row[   'p_vehiculo'      ];  ?>  </td>-->
                                <td >  <?php echo $row[   'f_salida'      ];  ?>  </td>
                                <td >  <?php echo $row[   'f_llegada'];  ?>  </td>
                                
                                <td >  <?php echo $row[   'descripcion'];  ?>  </td>
                                <!--<td>  <?php //cho $row[   'p_vehiculo'      ];  ?>  </td>-->
                                <?
                                  echo" <td align='center'><a onclick=\"myFunction3(".$row['id_orden'].")\" href='#' role='button'  data-toggle='modal'><i class='fas fa-shipping-fast'></i></a></td>"

                                
                               ?>
                                <!--<td> <img height='30px' src="foto_log/<?php //echo $row['f_empaque']; ?>" /> </td>-->
                               <!-- <td><a href="imprimir_doc.php?id=<?php //  echo $row['id_logistica']; ?>"> Ver documentos</a></td>-->
                                <?
                                  echo" <td align='center'><a onclick=\"myFunction(".$row['id_orden'].")\" href='#' role='button'  data-toggle='modal'><i class='fas fa-folder-open'></i></a></td>"


                                
                               ?>

                               <?
                                  echo" <td > &nbsp;&nbsp;&nbsp;&nbsp; <a onclick=\"myFunction2(".$row['id_orden'].")\" href='#' role='button'  data-toggle='modal'><i class='fas fa-file-image'></i></a></td>"

                                 
                                
                               ?>
                                   
                               


                                  
                            </tr>
                               

                             <?php
                                 }
                               ?>


                          </tbody>
                          </table>