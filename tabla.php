<tr>

                                   <th width="70" align="center">#Orden</th>
                                   <th width="70" align="center">Estado</th>
                                 <th width="70" align="center">Marca</th>
                                  <th width="70" align="center">Origen</th>
                                 <th width="70" align="center">Destino</th>
                                                        
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
                                while ($row = mysqli_fetch_array($consulta2019))
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
                                   
                               


                                  
                         
                               

                             <?php
                                 }
                               ?>
