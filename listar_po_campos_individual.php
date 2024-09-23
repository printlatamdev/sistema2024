



<?php
	
	/* Connect To Database*/
	require_once ("conexion_ajax.php");

	
$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
if($action == 'ajax'){
	$query2 = mysqli_real_escape_string($con,(strip_tags($_REQUEST['query'], ENT_QUOTES)));

	$tables="pop_proyecto";
	$campos="*";
	$sWhere=" pop_proyecto.nombre LIKE '%".$query."%' and estado=0";
	$sWhere.=" order by pop_proyecto.id_proyecto desc ";
	
	
	include 'pagination.php'; //include pagination file
	//pagination variables
	$page = (isset($_REQUEST['page']) && !empty($_REQUEST['page']))?$_REQUEST['page']:1;
	//$per_page = intval($_REQUEST['per_page']); //how much records you want to show
  $per_page = 6;
	$adjacents  = 4; //gap between pages after number of adjacents
	$offset = ($page - 1) * $per_page;
	//Count the total number of row in your table*/
	$count_query   = mysqli_query($con,"select distinct a.scan, a.id_orden, a.id_empresa, a.empresa, a.id_contacto, a.contacto, a.fecha_orden, a.fecha_entrega, a.vendedor, a.usuario, a.estado, a.computo, a.impresion, a.id_cliente, a.cliente, a.scan, b.id_orden from campos a inner join campos_detalle b on a.id_orden=b.id_orden where a.id_orden='".$query2."' order by a.id_orden desc");
	if ($row= mysqli_fetch_array($count_query)){$numrows = mysqli_num_rows($count_query);}
	else {echo mysqli_error($con);}


	$total_pages = ceil($numrows / $per_page);
	//main query to fetch the data

  $querycon = mysqli_query($con,"select * from campos_detalle");
  while($rowac = mysqli_fetch_assoc($querycon)){
    $idordenac = $rowac['id_orden'];
    $computoac = $rowac['computo'];
    $impreac = $rowac['impresion'];

  }

$nivel=$_SESSION['nivel'];


  $query = mysqli_query($con,"select distinct a.scan, a.id_orden, a.id_empresa, a.empresa, a.id_contacto, a.contacto, a.fecha_orden, a.fecha_entrega, a.vendedor, a.usuario, a.estado, a.computo, a.impresion, a.id_cliente, a.cliente, a.scan, b.id_orden from campos a inner join campos_detalle b on a.id_orden=b.id_orden where a.id_orden = '".$query2."'  order by a.id_orden desc  LIMIT $offset,$per_page");



  

		
	
	if ($numrows>0){
		
	?>
		  

       <div class="table-responsive" style="margin-left: -20px; margin-top: 30px;">
      <table class="table table-striped table-hover">
        <thead class="bg-primary" >
        <tr>

                    <th># OP</th>
                    <th>Cliente</th>
                    <th>Generar</th>
                    <th>Estado</th>
                    <th>Scan</th>
                    <th>Info</th>
                    <th>Data</th>
                    <th>Acciones</th>

        </tr></thead>
        <?php
       
        if(mysqli_num_rows($query) == 0){
          echo '<tr><td colspan="8">No hay datos.</td></tr>';
        }else{
          $no = 1;
          while($row = mysqli_fetch_assoc($query)){
                     $data='#'.$row['id_orden'];
                     $data2=$row['id_orden'];
                     $dataa='#ab'.$row['id_orden'];
                     $dataa2='ab'.$row['id_orden'];
                     $datab='#cd'.$row['id_orden'];
                     $datab2='cd'.$row['id_orden'];
                                         session_start();

$nivel=$_SESSION['nivel'];



                     $archive='browser/elfinder8.php?campo='.$row['id_orden'].'&&tipo=campos2&&nivel='.$nivel.'';

            echo '
            <tr style="font-size:85%;" >
              <td>'.$row['id_orden'].'</td>

          

            






              <td> '.$row['cliente'].' </td>
             ';

          $nivel=$_SESSION['nivel'];
          $base=$_SESSION['base'];


          //$username=$_SESSON['vsNombre'];

          

         if ($base=="esa" ||  $base=="nica") {
         
        
        if ($nivel==1 || $nivel==2 || $nivel==3 || $nivel==9 ) {?>


              <td><? echo '<a id="r'.$row['id_orden'].'" href="#rem'.$row['id_orden'].'" role="button"  data-toggle="modal" class="btn bg-success"><i class="fas fa-print"></i></a>';?>
              <a data-fancybox data-options='{"data-backdrop":"static", "type" : "iframe", "iframe" : {"preload" : false } }' href="reportes/produccion.imprimir.campos.php?idorden=<?echo $row['id_orden']; ?>" class="btn bg-success"><i class="fas fa-file-pdf"></i></a></td>
                 <?}else{?>

                     <td><? echo '<a  data-toggle="modal" data-target="#no" class="btn bg-success"><i class="fas fa-print"></i></a>';?>
              <a  data-toggle="modal" data-target="#no" class="btn bg-success"><i class="fas fa-file-pdf"></i></a></td>

                <? }}?>





              <?echo'
                         
              <td>';
              if($row['impresion'] == 0){
                echo '<span class="label label-success">IMPRESION</span>';
              }
                             if ($row['computo'] == 0 ){
                echo '<span class="label label-info">COMPUTO</span>';
              }
                             if ($row['estado'] == 0 ){
                echo '<span class="label label-warning">PRODUCCION</span>';
              }
              //PRIMER DESPLEGABLE 

            echo '

              </td>
              <td> <a class="btn bg-success" href="ORDENES_OP/CAMPOS/'.$row['id_orden'].'/DOCUMENTOS/'.$row['scan'].'" data-fancybox="preview"><i class="fas fa-file-alt"></i></a></td>
              <td><a class="btn bg-success fas fa-arrow-alt-circle-down" data-toggle="collapse" data-target='.$data.' aria-expanded="false" aria-controls='.$data2.' ></a></td>';?>
              <td><a data-fancybox data-options='{"data-backdrop":"static", "type" : "iframe", "iframe" : {"preload" : false } }' href="<? echo $archive; ?>" class="btn bg-success"><i class="far fa-folder"></i></a></td>

             <?
             if ($base=="esa" ||  $base=="nica") {
         
        
        if ($nivel==1 || $nivel==2 || $nivel==3|| $nivel==17) {?>

              <td>

<a data-fancybox data-options='{"data-backdrop":"static", "type" : "iframe", "iframe" : {"preload" : false } }' href="formop3_campos.php?id_orden=<?echo $row['id_orden']; ?>" class="edit"><i class="material-icons" data-toggle="tooltip" title="Editar" >&#xE254;</i></a>
                 
                <? echo '<a href="form/nueva_op/fin_po_campos.php?id='.$row['id_orden'].'" title="Finalizar" onclick="return confirm(\'Desea terminar esta orden?\')"class="delete"><i class="material-icons" data-toggle="tooltip" title="Eliminar">&#xE872;</i></a>             
              </td>';

            }else{?>

                <td>

<a data-toggle="modal" data-target="#no" class="edit"><i class="material-icons" data-toggle="tooltip" title="Editar" >&#xE254;</i></a>
                 
                <? echo '<a data-toggle="modal" data-target="#no" class="delete"><i class="material-icons" data-toggle="tooltip" title="Eliminar">&#xE872;</i></a>             
              </td>';



            }} echo '





            </tr>
            <tr ><td colspan="14"  class="zeroPadding" >
        <div class="col" >
    <div class="collapse multi-collapse" id='.$data2.' style="width:100%" >
    
      <div class="card card-body"><br>';

          include("consulta_item_op_campos.php");?>
      
          


      </div>
    </div>
  </div>

    </td>
    </tr>
    <!-- SEGUNDO DESPLEGABLE -->

    <script>
      <?$n_funcion='s'.$row['id_orden'];?>
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
  xmlhttp.open("GET","getuser_op_campos.php?q="+str,true);
  xmlhttp.send();
}
</script>
    <tr >
          <td colspan="14"  class="zeroPadding" >
            <div class="col" >
            <div class="collapse multi-collapse" id="<? echo $dataa2; ?>" style="width:100%" >
              <div class="card card-body">
                <!--<? //include('consulta_mueble.php');?>-->
                <div id="<?echo $n_funcion;?>"><b>sin registro<? echo $n_funcion;?></b></div>


              </div>
            </div>
          </td>
        </tr>
    <!--TERCER DEPLEGABLE-->
        <tr >
          <td colspan="14"  class="zeroPadding" >
            <div class="col" >
            <div class="collapse multi-collapse" id="<? echo $datab2; ?>" style="width:100%" >
              <div class="card card-body">
                <? include('consulta_pliego_op.php');?>
                <button><a class="fa fa-info-circle" data-toggle="collapse" data-target="<? echo $datab; ?>" aria-expanded="false" aria-controls="marcax">CERRAR</a> </button>
                
              </div>
            </div>
          </td>
        </tr>
    <!--FIN DE DESPLEGABLES--> 
          <?  
            $no++;
          }
        }
        ?>
      </table>

      <td colspan='6'> 
                <?php 
                  $inicios=$offset+1;
                  $finales = $offset + $per_page;
                  if ($finales > $numrows) {
                    $finales = $numrows;
                  }
                  echo "Mostrando $inicios al $finales de $numrows registros";
                  echo paginate( $page, $total_pages, $adjacents);
                ?>
      </td>
		</div>	
	<?php	
	}	
}
?>          	  
 <?
      include("reportes/connect_reportes.php");
     $sql="SELECT  * FROM campos WHERE estado='1' ";  
                      
     $rs=$mysqli->query($sql);

         while($row=$rs->fetch_assoc()){ 

               
               $id_orden=$row["id_orden"];
                   echo ' 
                                 <div id="rem'.$id_orden.'" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                            <h4  class="alert alert-success"><i class="fa fa-check-square"></i>   <strong>Impresion Nota de Remision '.$id_orden.'</strong></h4>
                                        </div>
                                        <div class="modal-body">';



                                                    echo'<form action="reportes/produccion.orden.remision.campos.php" method="get" target="_blank">';
                                                    $sql2="SELECT o.id_orden, do.cantidad, do.base, do.altura, do.trabajo, do.detalle, do.id_detalle_orden as iddetalle from campos as o, campos_detalle as do WHERE do.estado!='ANULADA' AND o.id_orden=do.id_orden AND o.id_orden=$id_orden and do.id_orden=$id_orden order by o.id_orden";


                                                                $rs2=$mysqli->query($sql2);
                                                                
                                                                $num=0;
                                                                while($row2=$rs2->fetch_assoc()){
                                                                $num++;
                                                                  
                                                            echo '<input type="checkbox" name="item'.$num.'" value="'.$row2['iddetalle'].'"> &nbsp;
                                                                <strong>Cantidad:</strong>
                                                                <input name="cant'.$num.'" type="text" id="cant" value="'.$row2['cantidad'].'" size="8" />
                                                                <br>
                                                                <strong>Detalle:</strong><br>
                                                                <textarea name="det'.$num.'" cols="70" id="det">'.$row2['detalle'].'</textarea><br><hr> '; 
                                                               }

                                                             echo'<input type="hidden" name="idorden" value="'.$id_orden.'">
                                                                  <input type="hidden" name="numero" value="'.$num.'">
                                                                      
                                                                  <strong>Envia:</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                  <input name="envia" id="envia" type="text"  size="20"/>

                                                                  <br><br>
                                                                  <strong>Nota:</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                  <input type="text" name="note" maxlength="20">

                                                                  <br><br>
                                                                  <strong>Motorista:</strong>
                                                                  <input name="motorista" id="motorista" type="text"  size="20" />
                                                                
                                                                  <br><br>
                                                                  <input type="submit" name="button"  value=" Imprimir" /></form>';

                   echo '                     
                                                  </div>
                                                  <div class="modal-footer">
                                                      <a href="ordenesop_activas_campos.php"><button href="" class="btn btn-success">Cerrar</button></a>
                                                  </div>
                                              </div>
                                          </div>
                                      </div>';
 }
 $mysqli->close();
?>
      </div>
    </div>
    <div id="no" class="modal fade">
    <div class="modal-dialog">
      <div class="modal-content">
        <form name="delete_product" id="delete_product">
          <div class="modal-header">            
            <h2 class="modal-title">ACCIÓN NO PERMITIDA!</h2>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          </div>
          <div class="modal-body">          
            <H4><p>Lo sentimos, esta opcion no esta habilitada por motivos de seguridad.</p></H4>
            <p class="text-warning"><small>gracias.</small></p>
            <input type="hidden" name="delete_id" id="delete_id">
          </div>
          <div class="modal-footer">
            <input type="button" class="btn btn-default" data-dismiss="modal" value="Salir">
            
          </div>
        </form>
      </div>
    </div>
  </div>