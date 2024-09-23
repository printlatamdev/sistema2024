<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

// Iniciar sesión
session_start();

// Conectar a la base de datos
require_once("conexion_ajax.php");

$action = isset($_REQUEST['action']) ? $_REQUEST['action'] : '';
if ($action == 'ajax') {
  $query2 = isset($_REQUEST['query']) ? mysqli_real_escape_string($con, strip_tags($_REQUEST['query'], ENT_QUOTES)) : '';

  // Ajustar la consulta de conteo para mostrar todos los registros
  $count_query = mysqli_query($con, "SELECT COUNT(DISTINCT a.id_orden) AS numrows 
                                      FROM logitica b 
                                      INNER JOIN pop a ON b.id_orden = a.id_orden 
                                      INNER JOIN pop_proyecto c ON a.id_proyecto = c.id_proyecto 
                                      WHERE a.estado = 1");

  if ($row = mysqli_fetch_array($count_query)) {
    $numrows = $row['numrows'];
  } else {
    die("Error al realizar la consulta: " . mysqli_error($con));
  }

  $ttottal = $numrows;
  $total_pages = ceil($numrows / $per_page);

  // Ajustar la consulta principal para mostrar todos los registros sin condiciones adicionales
  $query_base = "SELECT DISTINCT a.id_orden, a.id_empresa, a.empresa, a.contacto, a.fecha_orden, a.vendedor, a.destino, 
                   a.id_proyecto, a.nombre_proyecto, a.estado, a.computo, a.impresion, a.corte, 
                   b.id_orden, b.origen, b.status, c.id_proyecto, c.marca, c.nombre 
                   FROM logitica b 
                   INNER JOIN pop a ON b.id_orden = a.id_orden 
                   INNER JOIN pop_proyecto c ON a.id_proyecto = c.id_proyecto 
                   WHERE a.estado = 1 
                   ORDER BY a.id_orden DESC 
                   LIMIT $offset, $per_page";

  $query = mysqli_query($con, $query_base);

  if (!$query) {
    die("Error al realizar la consulta: " . mysqli_error($con));
  }
?>
		   <div class="table-responsive" style="margin-left: -20px; margin-top: 30px;">
       <table class="table table-striped table-hover" style="width: 100%;">
        <thead class="bg-primary" >
        <tr>

                    <th># OP</th>
          <th>Cot</th>
          <th>OC</th>
                    <th>Cliente</th>
                    <th>Campaña</th>
                     <th>Doc</th>
          <th>Origen</th>
          <th>Destino</th>
          <th>ETD</th>
                    <th>ETA</th>
                    <th>Doc</th>
                      <th>Estado</th>
                    <th>Info</th>
                    <th>Data</th>
                    <th width="100">Acciones</th>

                   

        </tr></thead>
        <?php
      
        if(mysqli_num_rows($query) == 0){
          echo '<tr><td colspan="8">No hay datos.</td></tr>';
        }else{
          $no = 1;
          	$finales=0;
          while($row = mysqli_fetch_assoc($query)){

$finales++;

                      if ($facturas!=null) {
                             $facturas=$row['factura'];
                          //$segunda_tabla=0;
                          }else{

                         
                              $sql5 = mysqli_query($conexion, "select*from pop_documentos where orden='".$row['id_orden']."' and tipo='FACTURA'");
                          while($row5 = mysqli_fetch_assoc($sql5)){

                            $facturas=$row5['documento'];
                           // $segunda_tabla=1;

                          }

                        
                      }
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
              <td>'.$row['id_orden'].'</td>
              <td>'.$row['cot'].'</td>
              <td>'.$row['numorden_compra'].'</td>
                            <td>'.$row['empresa'].'</td>
                            <td>'.$row['nombre_proyecto'].'</td>
                            <td><a class="fa fa-info-circle" data-toggle="collapse" data-target='.$data.' aria-expanded="false" aria-controls='.$data2.' ></a></td>
              <td>'.$row['origen'].'</td>
                            <td>'.$row['destino'].'</td>
                              <td>'.$row['f_salida'].'</td>
                            <td>'.$row['f_llegada'].'</td>  
                            <td> <a class="fa fa-info-circle" data-toggle="collapse" data-target='.$datalog.' aria-expanded="false" aria-controls='.$data2log.'></a> </td>

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

              //PRIMER DESPLEGABLE 
              //PRIMER DESPLEGABLE

            echo '

              </td>
              <td><a class="fa fa-info-circle" data-toggle="collapse" data-target='.$data.' aria-expanded="false" aria-controls='.$data2.' ></a></td>';?>
              <td ><a data-fancybox data-options='{"data-backdrop":"static", "type" : "iframe", "iframe" : {"preload" : false } }' href="<? echo $archive; ?>" class="btn bg-success"><i class="far fa-folder"></i></a></td>
              <td >
                  <a data-fancybox data-options='{"data-backdrop":"static", "type" : "iframe", "iframe" : {"preload" : false } }' href="form3.php?id_orden=<?echo $row['id_orden']; ?>" class="edit"><i class="material-icons" data-toggle="tooltip" title="Editar" >&#xE254;</i></a>
                 
                <? echo '<a href="form/nueva_pop/fin_pop.php?id='.$row['id_orden'].'" title="Finalizar" onclick="return confirm(\'Desea terminar esta orden?\')"class="delete"><i class="material-icons" data-toggle="tooltip" title="Eliminar">&#xE872;</i></a>
              </td>
            </tr>
            <tr ><td colspan="15" class="zeroPadding" >
        <div class="col" >
    <div class="collapse multi-collapse" id='.$data2.' style="width:100%" >
      <div class="card card-body"><br>';

      include("../consulta_item.php");?>
      
          


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

              <div id="<?echo $n_funcion;?>"><b></b></div>


              </div>
            </div>
          </td></tr>
       
    <!--TERCER DEPLEGABLE-->
        
    
         <tr ><td colspan="15" class="zeroPadding" >
        <div class="col" >
                   <div class="collapse multi-collapse" id="<? echo $data2log;?>" style="width:100%" >
                      <div class="card card-body"><br>
                      <? $facturac = mysqli_query($conexion,"select * from pop_documentos where orden='288'"); ?>
                        
                        <?include('../logistica/documentos2.php');?>
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
      </table></div>
      
        </div>
    </div>

  </div>
						<tr>
							<td colspan='6'> 
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
?>          
		  
