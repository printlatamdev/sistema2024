



<?php

session_start();
	
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
	$per_page = intval($_REQUEST['per_page']); //how much records you want to show
	$adjacents  = 4; //gap between pages after number of adjacents
	$offset = ($page - 1) * $per_page;
	//Count the total number of row in your table*/
	$count_query   = mysqli_query($con,"select distinct a.id_orden, a.id_empresa, a.empresa, a.id_contacto, a.contacto, a.fecha_orden, a.fecha_entrega, a.vendedor, a.estado, a.computo, a.impresion, b.id_orden, b.cot from orden a inner join orden_detalle b on a.id_orden=b.id_orden where a.vendedor='".$_SESSION['vsNombre']."' order by a.id_orden desc");
	if ($row= mysqli_fetch_array($count_query)){$numrows = mysqli_num_rows($count_query);}
	else {echo mysqli_error($con);}


	$total_pages = ceil($numrows/$per_page);
	//main query to fetch the data


$nivel=$_SESSION['nivel'];


if ($nivel==5) {



	$query = mysqli_query($con,"select distinct a.id_orden, a.id_empresa, a.empresa, a.id_contacto, a.contacto, a.fecha_orden, a.fecha_entrega, a.vendedor, a.estado, a.computo, a.impresion, b.id_orden, b.cot from orden a inner join orden_detalle b on a.id_orden=b.id_orden where a.impresion='1' and a.id_orden LIKE '%".$query2."%'  order by a.id_orden desc  LIMIT $offset,$per_page");
	//loop through fetched data
}elseif($nivel==4){
$query = mysqli_query($con,"select distinct a.id_orden, a.id_empresa, a.empresa, a.id_contacto, a.contacto, a.fecha_orden, a.fecha_entrega, a.vendedor, a.estado, a.computo, a.impresion, a.acabado, b.id_orden, b.cot from orden a inner join orden_detalle b on a.id_orden=b.id_orden where a.computo='1' and a.id_orden LIKE '%".$query2."%'  order by a.id_orden desc  LIMIT $offset,$per_page");

}

else{

  $query = mysqli_query($con,"select distinct a.id_orden, a.id_empresa, a.empresa, a.id_contacto, a.contacto, a.fecha_orden, a.fecha_entrega, a.vendedor, a.estado, a.computo, a.impresion, b.id_orden, b.cot from orden a inner join orden_detalle b on a.id_orden=b.id_orden where a.vendedor='".$_SESSION['vsNombre']."' and a.empresa LIKE '%".$query2."%' order by a.id_orden desc  LIMIT $offset,$per_page");

}

	
	


		
	
	if ($numrows>0){
		
	?>
		  

       <div class="table-responsive" style="margin-left: -20px; margin-top: 30px;">
       <table class="table table-striped table-hover">
        <thead class="bg-primary" >
        <tr>

                    <th># OP</th>
                    <th>Cot</th>
                    <th>Cliente</th>
                    <th>Facturacion</th>
                    <th>Generar</th>
                    
                    
                    
                    <th>Estado</th>
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
                     $cot=$row['cot'];
                      $documentos='#2019'.$row['id_orden'];
                     $documentos2='2019'.$row['id_orden'];

                     session_start();

$nivel=$_SESSION['nivel'];



                     $archive='browser/elfinder7.php?campo='.$row['id_orden'].'&&tipo=campos&&nivel='.$nivel.'';

                     
                  


                      
   $query233 = mysqli_query($con,"select*from cotizacion where id_cotizacion='".$cot."'");
    while($row9 = mysqli_fetch_assoc($query233)){
      $cot_d=$row9['archivo'];
    }

            echo '
            <tr style="font-size:85%;" >
              <td>'.$row['id_orden'].'</td>';


               $nivel=$_SESSION['nivel'];
          $base=$_SESSION['base'];

         if ($base=="esa" ||$base=="nica") {
         
        
        if ($nivel==1 || $nivel==2 || $nivel==3) { echo '


              <td> <a href="cotizaciones_esa20/'.$cot_d.'" data-fancybox="preview">'.$row['cot'].'</a></td>
              ';}else{

                echo '

                   <td> <a data-toggle="modal" data-target="#no">'.$row['cot'].'</a></td>
                ';



              }} 

           
                 if ($base=="esa" ||$base=="nica") {
         
        
        if ($nivel==1 || $nivel==2 || $nivel==3) {



              echo '
                         



              <td> '.$row['empresa'].' </td>
              <td><a class="btn bg-success fas fa-arrow-alt-circle-down" data-toggle="collapse" data-target='.$documentos.' aria-expanded="false" aria-controls='.$documentos2.' ></a></td>';?>


              <td><a data-fancybox data-options='{"data-backdrop":"static", "type" : "iframe", "iframe" : {"preload" : false } }' href="reportes/remision_option.php?id=<?echo $row['id_orden']; ?>" class="btn bg-success"><i class="fas fa-print"></i></a>
              <a data-fancybox data-options='{"data-backdrop":"static", "type" : "iframe", "iframe" : {"preload" : false } }' href="reportes/produccion.imprimir_op_color.php?idorden=<?echo $row['id_orden']; ?>" class="btn bg-success"><i class="fas fa-file-pdf"></i></a></td>

               <?} else {

                      echo '
                         



              <td> '.$row['empresa'].' </td>
              <td><a class="btn bg-success fas fa-arrow-alt-circle-down"  data-toggle="modal" data-target="#no"></a></td>';?>


              <td><a  data-toggle="modal" data-target="#no" class="btn bg-success"><i class="fas fa-print"></i></a>
              <a  data-toggle="modal" data-target="#no" class="btn bg-success"><i class="fas fa-file-pdf"></i></a></td>

         <?}}?>


              <?echo'
                         
              <td>';
              if($row['impresion'] == '0'){
                echo '<span class="label label-success">IMPRESION</span>';
              }
                             if ($row['computo'] == '0' ){
                echo '<span class="label label-info">COMPUTO</span>';
              }
                             if ($row['acabado'] == '0' ){
                echo '<span class="label label-warning">PRODUCCION</span>';
              }
              //PRIMER DESPLEGABLE 

            echo '

              </td>
              <td><a class="btn bg-success fas fa-arrow-alt-circle-down" data-toggle="collapse" data-target='.$data.' aria-expanded="false" aria-controls='.$data2.' ></a></td>';?>
              <td><a data-fancybox data-options='{"data-backdrop":"static", "type" : "iframe", "iframe" : {"preload" : false } }' href="<? echo $archive; ?>" class="btn bg-success"><i class="far fa-folder"></i></a></td>

   
              <?
                 if ($base=="esa" ||$base=="nica") {
         
        
        if ($nivel==1 || $nivel==2 ) {
                                                      ?>

 <td>

          

 <a data-fancybox data-options='{"data-backdrop":"static", "type" : "iframe", "iframe" : {"preload" : false } }' href="formop3.php?id_orden=<?echo $row['id_orden']; ?>" class="edit"><i class="material-icons" data-toggle="tooltip" title="Editar" >&#xE254;</i></a>
                 
                <? echo '<a href="form/nueva_pop/fin_po.php?id='.$row['id_orden'].'" title="Finalizar" onclick="return confirm(\'Desea terminar esta orden?\')"class="delete"><i class="material-icons" data-toggle="tooltip" title="Eliminar">&#xE872;</i></a></td>';


              }else{?>
 <td>

<a  data-toggle="modal" data-target="#no" class="edit"><i class="material-icons" data-toggle="tooltip" title="Editar" >&#xE254;</i></a>
                 
                <? echo '<a  data-toggle="modal" data-target="#no" class="delete"><i class="material-icons" data-toggle="tooltip" title="Eliminar">&#xE872;</i></a></td>';






              }}?>

             <? echo '









            </tr>
            <tr ><td colspan="14"  class="zeroPadding" >
        <div class="col" >
    <div class="collapse multi-collapse" id='.$data2.' style="width:100%" >
      <div class="card card-body"><br>';

      include("consulta_item_op.php");?>
      
          


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
  xmlhttp.open("GET","getuser_op.php?q="+str,true);
  xmlhttp.send();
}
</script>

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
    <tr >
              <td colspan="12" class="zeroPadding">
                <div class="col-md-12" >
                   <div class="collapse multi-collapse" id="<? echo $documentos2;?>" style="width:100%" >
                      <div class="card card-body"><br>
                        <?include('form/admin_doc.php');?>
                      </div>
                    </div>
                </div>
              </td>
            </tr>
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
		</div>	

	
	
	<?php	
	}	
}
?>          
		  
