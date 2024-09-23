<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" >
<head>
    <title>Expand table rows with jQuery - jExpand plugin - JankoAtWarpSpeed demos</title>
    <style type="text/css">
        body { font-family:Arial, Helvetica, Sans-Serif; font-size:0.8em;}
        #report { border-collapse:collapse;}
        #report h4 { margin:0px; padding:0px;}
        #report img { float:right;}
        #report ul { margin:10px 0 10px 40px; padding:0px;}
        #report th { background:#7CB8E2 url(header_bkg.png) repeat-x scroll center left; color:#fff; padding:7px 15px; text-align:left;}
        #report td { background:#C7DDEE none repeat-x scroll center left; color:#000; padding:7px 15px; }
        #report tr.odd td { background:#fff url(row_bkg.png) repeat-x scroll center left; cursor:pointer; }
        #report div.arrow { background:transparent url(arrows.png) no-repeat scroll 0px -16px; width:16px; height:16px; display:block;}
        #report div.up { background-position:0px 0px;}
    </style>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js" type="text/javascript"></script>
    <script type="text/javascript">  
        $(document).ready(function(){
            $("#report tr:odd").addClass("odd");
            $("#report tr:not(.odd)").hide();
            $("#report tr:first-child").show();
            
            $("#report tr.odd").click(function(){
                $(this).next("tr").toggle();
                $(this).find(".arrow").toggleClass("up");
            });
            //$("#report").jExpand();
        });
    </script>        
</head>
<body>
    
    <table id="report">
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



         <tr>
                              
                               <?php 
                                while ($row = mysqli_fetch_array($consulta2))
                                   {

                                    $status=$row['status'];


                                    $ext=".png";

                                   ?>
                                 
                              
                               
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
        <tr>
            <td colspan="10">
                <img src="125px-Flag_of_the_United_States.svg.png" alt="Flag of USA" />
                <h4>Additional information</h4>
                <ul>
                    <li><a href="http://en.wikipedia.org/wiki/Usa">USA on Wikipedia</a></li>
                    <li><a href="http://nationalatlas.gov/">National Atlas of the United States</a></li>
                    <li><a href="http://www.nationalcenter.org/HistoricalDocuments.html">Historical Documents</a></li>
                 </ul>   
            </td>
        </tr>
        <tr>
            <td>United Kingdom </td>
            <td>61,612,300</td>
            <td>244,820 km2</td>
            <td>English</td>
            <td><div class="arrow"></div></td>
        </tr>
        <tr>
            <td colspan="5">
                <img src="125px-Flag_of_the_United_Kingdom.svg.png" alt="Flag of UK" />
                <h4>Additional information</h4>
                <ul>

                    <li><a href="http://en.wikipedia.org/wiki/United_kingdom">UK on Wikipedia</a></li>
                    <li><a href="http://www.visitbritain.com/">Official tourist guide to Britain</a></li>
                    <li><a href="http://www.statistics.gov.uk/StatBase/Product.asp?vlnk=5703">Official 
                        Yearbook of the United Kingdom</a></li>
                </ul>
                
            </td>
        </tr>
        <tr>
            <td>India</td>
            <td>1,147,995,904</td>
            <td>3,287,240‡ km2</td>
            <td>Hindi, English</td>
            <td><div class="arrow"></div></td>
        </tr>
        <tr>
            <td colspan="5">
                <img src="125px-Flag_of_India.svg.png" alt="Flag of India" />
                <h4>Additional information</h4>
                <ul>
                    <li><a href="http://en.wikipedia.org/wiki/India">India on Wikipedia</a></li>
                    <li><a href="http://india.gov.in/">Government of India</a></li>
                    <li><a href="http://wikitravel.org/en/India">India travel guide</a></li>
                 </ul>   
            
            </td>
        </tr>
        <tr>
            <td>Canada</td>
            <td>33,718,000</td>
            <td>9,984,670 km2</td>
            <td>English, French</td>
            <td><div class="arrow"></div></td>
        </tr>
        <tr>
            <td colspan="5">
                <img src="125px-Flag_of_Canada.svg.png" alt="Flag of Canada" />
                <h4>Additional information</h4>
                <ul>
                    <li><a href="http://en.wikipedia.org/wiki/Canada">Canada on Wikipedia</a></li>
                    <li><a href="http://atlas.gc.ca/site/index.html" >Official 
                        Government of Canada online Atlas of Canada</a></li>
                    <li><a href="http://wikitravel.org/en/Canada">Canada travel guide</a></li>
                 </ul>   
            </td>
        </tr>
        <tr>
            <td>Germany</td>
            <td>82,060,000</td>
            <td>357,021 km2</td>
            <td>German</td>
            <td><div class="arrow"></div></td>
        </tr>
        <tr>
            <td colspan="5">
                <img src="125px-Flag_of_Germany.svg.png" alt="Flag of Germany" />
                <h4>Additional information</h4>
                <ul>
                    <li><a href="http://en.wikipedia.org/wiki/Germany">Germany on Wikipedia</a></li>
                    <li><a href="http://www.deutschland.de/home.php?lang=2">Deutschland.de Official Germany portal</a></li>
                    <li><a href="http://www.cometogermany.com/">Germany Travel Info</a></li>
                 </ul>   
            </td>
        </tr>
    </table>
    <em>* Information taken from Wikipedia</em>
</body>
</html>
