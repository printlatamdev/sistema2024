<?php
	session_start();
$id=$_SESSION['vsIdempresa'];
$base=$_SESSION['base'];
 //$anio=$_SESSION['year'];
    $anio=22;
$bd=$base.$anio;
$nombre=$_SESSION['vsNombre'];

	/* Connect To Database*/
	require_once ("../conexion_ajax_sv.php");

	session_start();
$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
if($action == 'ajax'){
	$query = mysqli_real_escape_string($con,(strip_tags($_REQUEST['query'], ENT_QUOTES)));
	echo $query;

	/*$tables="pop_proyecto";
	$campos="*";
	$sWhere=" pop_proyecto.nombre LIKE '%".$query."%' and estado=1";//query para el filtro de busqueda
	$sWhere.=" order by pop_proyecto.id_proyecto desc ";//lo ordena por id descendente*/
	
	/* logitica consulta*/
        $tables="logitica";
		$campos="*";
		$sWhere=" logitica.origen LIKE '%".$query."%' and estado=1";
		$sWhere.=" order by logitica.id_orden desc ";
       
	 
	
	include 'pagination.php'; //include pagination file
	//pagination variables
	$page = (isset($_REQUEST['page']) && !empty($_REQUEST['page']))?$_REQUEST['page']:1;
	$per_page = intval($_REQUEST['per_page']); //how much records you want to show
	$adjacents  = 4; //gap between pages after number of adjacents
	$offset = ($page - 1) * $per_page;
	//Count the total number of row in your table*/
	$count_query   = mysqli_query($conexion,"SELECT count(*) AS numrows FROM $tables where $sWhere");
	if ($row= mysqli_fetch_array($count_query)){$numrows = $row['numrows'];}
	else {echo mysqli_error($con);}


	$total_pages = ceil($numrows/$per_page);
	echo $total_pages."<br>";
	//main query to fetch the data
	//$query = mysqli_query($con,"SELECT $campos  FROM  $tables where $sWhere LIMIT $offset,$per_page");
	 $sql = mysqli_query($conexion, "select distinct a.id_orden, a.id_empresa, a.empresa, a.contacto, a.fecha_orden, a.vendedor, a.destino, a.id_proyecto, a.nombre_proyecto, a.estado, a.computo, a.impresion, a.corte, b.id_orden, b.origen, b.f_salida, b.f_llegada,b.estado,b.estado,b.numorden_compra,b.status, c.id_proyecto, c.marca, c.nombre, b.direccion_entrega from logitica b inner join pop a on b.id_orden = a.id_orden inner join pop_proyecto c on a.id_proyecto=c.id_proyecto where b.estado=1 order by a.id_orden desc LIMIT $offset,$per_page ");
	//loop through fetched data
	if ($numrows>0){
		
	?>
		<div class="table-responsive" style="margin-left: -30PX;">
			<table class="table table-striped table-hover">
				<thead class="bg-primary">
					<tr>
						  <th class='text-center'># OP</th>
		                  <th class='text-center'>Cot</th>
		                  <th class='text-center'>OC</th>
		                  <th class='text-center'>Cliente</th>
		                  <th class='text-center'>Campaña</th>
		                  <th class='text-center'>Origen</th>
		                  <th class='text-center'>Destino</th>
		                  <th class='text-center'>ETD</th>
		                  <th class='text-center'>ETA</th>
		                  <th class='text-center'>Doc</th>
		                  <th class='text-center'>Estado</th>
		                  <th class='text-center'>Info</th>
		                  <th class='text-center'>Fotos</th>
		                  <th class='text-center'>Acciones</th>	
					</tr>
				</thead>
				<tbody>	
		<?php
        $server=$_SERVER['SERVER_ADDR'];
        $year="19";
        $nivel="1";
        $tipo="original";

  
         
          /* select distinct t1.id_orden, t1.id_empresa, t1.empresa, t1.nombre_proyecto,t1.estado, t1.vendedor ,t2.id_orden, t2.cot, t2.estado as 'produccion', t3.id_orden, t3.origen, t3.destino, t3.f_salida, t3.f_llegada,t3.numorden_compra from pop t1 INNER join pop_detalle t2 on t1.id_orden=t2.id_orden inner join logitica t3 on t1.id_orden=t3.id_orden where  t1.estado=1 */
        
        if(mysqli_num_rows($sql) == 0){
          echo '<tr><td colspan="8">No hay datos.</td></tr>';
        }else{
          $no = 1;
          while($row = mysqli_fetch_assoc($sql)){

           $sql58 = mysqli_query($conexion, "select DISTINCT id_orden, cot from pop_detalle where id_orden='".$row['id_orden']."'");
                  while($row52 = mysqli_fetch_assoc($sql58)){
                      $cot=$row52['cot'];
                  }

                  $cadena_de_texto = $cot;
                  $cadena_buscada   = '-19';
                  $posicion_coincidencia = strpos($cadena_de_texto, $cadena_buscada);
                  $cadena_de_texto2 = $cot;
                  $cadena_buscada2   = '-NI';
                  $posicion_coincidencia2 = strpos($cadena_de_texto2, $cadena_buscada2);
 
//se puede hacer la comparacion con 'false' o 'true' y los comparadores '===' o '!=='
if ($posicion_coincidencia === false ) {
  
    $encontrado=0;

            $datos = $cot;
list($id_c, $anio) = explode("-", $datos);

    } else {
          
            $encontrado=1;

            $datos = $cot;
list($id_c, $anio) = explode("-", $datos);
//echo $id; // foo
//echo $anio; // 

            }

/*************************************************************/
if ($posicion_coincidencia2 === false ) {
  
    $encontrado2=0;

            $datos2 = $cot;
list($id_c2, $anio2) = explode("-", $datos2);

    } else {
          
            $encontrado2=1;

            $dato2s = $cot;
list($id_c2, $anio2) = explode("-", $datos2);
//echo $id; // foo
//echo $anio; // 

            }
                           

                  $query233 = mysqli_query($conexion,"select*from cotizacion where id_cotizacion='".$cot."'");

                     $data='#'.$row['id_orden'];
                     $data2=$row['id_orden'];
                     $dataa='#1'.$row['id_orden'];
                     $dataa2='1'.$row['id_orden'];
                     $datab='#2'.$row['id_orden'];
                     $datab2='2'.$row['id_orden'];


                       $datalog='#2i'.$row['id_orden'];
                     $data2log="2i".$row['id_orden'];
                     $archive="http://".$server."/browser/elfinder6.php?year=20".$year."&empresa=".$row['empresa']."&marca=".$row['marca']."&proyecto=".$row['nombre']."&nivel=".$nivel."&tipo=".$tipo;

            echo '
            <tr style="font-size:85%;" >
              <td>'.$row['id_orden'].'</td>';
                     
if ($encontrado==0 && $encontrado2==0) {    
       $query233 = mysqli_query($conexion,"select*from cotizacion where id_cotizacion='".$cot."'");
          while($row9 = mysqli_fetch_assoc($query233)){
            $cot_d=$row9['archivo'];
              echo'<td><div class="col-md-12"><a href="cotizaciones_esa20/'.$cot_d.'" data-fancybox="preview" style="font-size:15px;"><span class="label label-info">'.$cot.'</span></a></div></td>';
          }
                  
                 
}elseif($econtrado==1 && $encontrado2==0){

$con221 = mysqli_connect('localhost','admin','AG784512','esa19');
if (!$con221) {
    die('Could not connect: ' . mysqli_error($con221));
}

mysqli_select_db($con221,'esa19');
$sql="select*from cotizacion where id_cotizacion='".$cot."' ";
   
 
$result = mysqli_query($con221,$sql);

$ordenes_activas=mysqli_num_rows($result);
while($row92 = mysqli_fetch_assoc($result)){
                              $cot_d2=$row92['archivo'];

             echo'<td><div class="col-md-12"><b><h5><a href="cotizaciones_esa19/'.$cot_d2.'" data-fancybox="preview"><span class="label label-info">'.$cot.'</span></a></div></td>';
                            }


}elseif ($encontrado==0 && $encontrado2==1) {
 $con2233 = mysqli_connect('localhost','admin','AG784512','nica20');
if (!$con2233) {
    die('Could not connect: ' . mysqli_error($con2233));
}

mysqli_select_db($con2233,'nica20');
$sql1="select*from cotizacion where id_cotizacion='".$cot."' ";
   
 
$resultww = mysqli_query($con2233,$sql1);

$ordenes_activas=mysqli_num_rows($resultww);
while($row92 = mysqli_fetch_assoc($resultww)){
                              $cot_d2=$row92['archivo'];

             echo'<td><div class="col-md-12"><b><h5><a href="cotizaciones_nica20/'.$cot_d2.'" data-fancybox="preview"><span class="label label-info">'.$cot.'</span></a></div></td>';
                            }
}

elseif ($encontrado==1 && $encontrado2==1) {

  $con225 = mysqli_connect('localhost','admin','AG784512','nica19');
if (!$con225) {
    die('Could not connect: ' . mysqli_error($con225));
}

mysqli_select_db($con225,'nica19');
$sql25="select*from cotizacion where id_cotizacion='".$cot."' ";
   
 
$result2 = mysqli_query($con225,$sql25);

$ordenes_activas=mysqli_num_rows($result2);
while($row92 = mysqli_fetch_assoc($result)){
                              $cot_d2=$row92['archivo'];

             echo'<td><div class="col-md-12"><b><h5><a href="../sistema/cotizaciones_nica19/'.$cot_d2.'" data-fancybox="preview"><span class="label label-info">'.$cot.'</span></a></div></td>';
                            }
  
}

               echo'<td>'.$row['numorden_compra'].'</td>
                        <td>'.$row['empresa'].'</td>
                        <td>'.$row['nombre_proyecto'].'</td> 
                        <td>'.$row['origen'].'</td>
                        <td>'.$row['destino'].'</td>
                        <td>'.$row['f_salida'].'</td>
                        <td>'.$row['f_llegada'].'</td>  <td> <a class="fa fa-info-circle" data-toggle="collapse" data-target='.$datalog.' aria-expanded="false" aria-controls='.$data2log.'></a> 
                        </td>

              <td> ';
              if($row['status'] == 'PROCESO'){
                echo '<span class="label label-success">Proceso. </span>';
              }
                            else if ($row['status'] == 'IMPRESION' ){
                echo '<span class="label label-info">Impresion</span>';
              }
                            else if ($row['status'] == 'CORTE' ){
                echo '<span class="label label-warning">Corte </span>';
              }

                      else if ($row['status'] == 'ACABADO' ){
                echo '<span class="label label-warning"> Acabado</span>';
              }

                      else if ($row['status'] == 'DESPACHO' ){
                echo '<span class="label label-warning">Despacho </span>';
              }

                      else if ($row['status'] == 'TRANSITO' ){
                echo '<span class="label label-warning">Transito </span>';
              }
                      else if ($row['status'] == 'ADUANA DE SALIDA' ){
                echo '<span class="label label-warning">Aduana de Salida </span>';
              }
                      else if ($row['status'] == 'TRAMITE' ){
                echo '<span class="label label-warning">Tramite</span>';
              }
              
              //PRIMER DESPLEGABLE 
            echo '

              </td>
              <td><a class="fa fa-info-circle" data-toggle="collapse" data-target='.$data.' aria-expanded="false" aria-controls='.$data2.' ></a></td>';?>
              <td><a data-fancybox data-options='{"data-backdrop":"static", "type" : "iframe", "iframe" : {"preload" : false } }' href="logistica/edit_fotos.php?id=<?echo $row['id_orden']; ?>" class="btn bg-success"><i class="fas fa-camera-retro"></i></a></td>
              <td>
                  <a data-fancybox data-options='{"data-backdrop":"static", "type" : "iframe", "iframe" : {"preload" : false } }' href="logistica/edit.php?id=<?echo $row['id_orden']; ?>" class="edit"><i class="far fa-edit"></i></a>
                 
                <? echo '<a href="logistica/terminar_log.php?id='.$row['id_orden'].'" title="FINALIZAR LOGISTICA" onclick="return confirm(\'Terminar Logistica?\')" class="delete"><span class="fas fa-sign-out-alt" aria-hidden="true"></span></a>
              </td>
            </tr>
            <tr ><td colspan="14" class="zeroPadding" >
        <div class="col" >
    <div class="collapse multi-collapse" id='.$data2.' style="width:100%" >
      <div class="card card-body"><br>';

      include("../consulta_item_log.php");?>

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
  xmlhttp.open("GET","../getuser.php?q="+str,true);
  xmlhttp.send();
}
</script>
    <tr>
          <td colspan="15" class="zeroPadding" >
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
         <tr ><td colspan="14" class="zeroPadding" >
        <div class="col" >
                   <div class="collapse multi-collapse" id="<? echo $data2log;?>" style="width:100%" >
                      <div class="card card-body"><br>
                      <? $facturac = mysqli_query($conexion,"select * from pop_documentos where orden='".$row['id_orden']."'"); ?>
                        <?include('../logistica/documentos.php');?>
                      </div>
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
						<tr>
							<td colspan='14'> 
								<?php 
									$inicios=$offset+1;
									$finales+=$inicios -1;
									echo "Mostrando $inicios al $finales de $numrows registros";
									echo paginate( $page, $total_pages, $adjacents);
								?>
							</td>
						</tr>
				</tbody>			
			</table>
		</div>	

	
	
	<?php	
	}	
}
?>          
		  
