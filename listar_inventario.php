<?php  
session_start();


require_once ("conexion_ajax.php");

  
$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
if($action == 'ajax'){
  $query2 = mysqli_real_escape_string($con,(strip_tags($_REQUEST['query'], ENT_QUOTES)));

  $tables="articulos_inventario";
  $campos="*";
  $sWhere=" articulos_inventario.articulo LIKE '%".$query."%' and estado=1";
  $sWhere.=" order by articulos_inventario.id_articulo desc ";
  
  
  include 'pagination.php'; //include pagination file
  //pagination variables
  $page = (isset($_REQUEST['page']) && !empty($_REQUEST['page']))?$_REQUEST['page']:1;
  $per_page = intval($_REQUEST['per_page']); //how much records you want to show
  $adjacents  = 4; //gap between pages after number of adjacents
  $offset = ($page - 1) * $per_page;
  
  //Count the total number of row in your table*/
  $count_query   = mysqli_query($con,"select * from articulos_inventario where estado = 1 order by id_articulo desc ");
  if ($row= mysqli_fetch_array($count_query)){$numrows = mysqli_num_rows($count_query);}
  else {echo mysqli_error($con);}


  $total_pages = ceil($numrows/$per_page);
  

  $nivel=$_SESSION['nivel'];
  $base=$_SESSION['base'];
  $year=$_SESSION['year'];
  $cotrut=$base.$year;
  
  //inicializando articulo
  if (isset($query2)) {
    $query = mysqli_query($con,"select * from articulos_inventario where estado = '1' and articulo LIKE '%".$query2."%' OR area LIKE '%".$query2."%' OR cantidad LIKE '%".$query2."%' order by id_articulo desc  LIMIT $offset,$per_page");
  }else{
    $query = mysqli_query($con,"select * from articulos_inventario where estado = '1'  order by id_articulo desc  LIMIT $offset,$per_page");
  }
  
  //loop through fetched data

?>


  <div class="table-responsive">
      <table class="table">
        <thead class="bg-primary">
          <tr>
          
            <th>Area de Uso</th>
            <th>Nombre del Articulo</th>
            <th>Cantidad</th>
            <th>Estado</th>
            <th>Detalle</th>
            <th>Descargar</th>
            <th>Ingresar</th>
          </tr>
        </thead>
        <?php
        if ($numrows>0){

        if(mysqli_num_rows($query) == 0){
          echo '<tr><td>No hay datos.</td></tr>';
        }else{
          $no = 1;
            $finales=0; $nivel=$_SESSION['nivel'];
            $tipo="original";
          while($row = mysqli_fetch_assoc($query)){

                     $finales++;
  
                    

                     $dataa='#ab'.$row['id_articulo'];
                     $dataa2='ab'.$row['id_articulo'];

                     $datbb='#cd'.$row['id_orden'];
                     $datbb2='cd'.$row['id_orden'];

                     $datcc='#de'.$row['id_orden'];
                     $datcc2='de'.$row['id_orden'];

      echo '<tr>
               <td>'.$row['area'].'</td>
               <td>'.$row['articulo'].'</td>
               <td>'.$row['cantidad'].'</td>
            ';
            if ($row['disponibilidad_articulo']=="FU") {
              echo '
                 <td>
                    <button type="button" class="btn btn-success">Disponible</button>
                 </td>

              ';
            }else{
              echo '
                 <td>
                   <button type="button" class="btn btn-danger">En uso</button>
                 </td>
              ';
            }
            echo '
               <td>
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="'.$dataa.'">Detalle</button>
               </td>

               <td>
                 <button type="button" class="btn btn-success" data-toggle="modal" data-target="'.$datbb.'" title="DESCARGAR"><i class="material-icons" title="Editar" >&#xE254;</i></button>
               </td>
               <td>
                 <button type="button" class="btn btn-primary" data-toggle="modal" data-target="'.$datcc.'" title="INGRESAR"><i class="material-icons" title="Editar" >&#xE254;</i></button>
               </td>
            <tr>';?>

          
           <td>
            <!------------------------------------------MODAL DE ESPECIFICACIONES MODAL A----------------------------------------->
            <div class="modal fade"  id="<?php echo $dataa2;?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Especificaciones</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <?php
                      $id = preg_replace('([^0-9])', '', $dataa2);
                      //echo $id;
                      $desc = mysqli_query($con,"select descripcion from articulos_inventario where id_articulo = '".$id."'  order by id_articulo desc");
                      while($rdesc = mysqli_fetch_assoc($desc)){
                         $ndesc = $rdesc['descripcion'];
                      }
                    ?>

                    <form>
                      
                      <div class="form-group">
                        <label for="message-text" class="col-form-label">Especificaciones:</label>
                        <textarea class="form-control" id="message-text" readonly><?php echo $ndesc;?></textarea>
                      </div>
                      
                    </form>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button> 
                  </div>
                </div>
              </div>
            </div>
          <!-----------------------------------FIN MODAL ESPECIFICACIONES--------------------------------->
          
          <!------------------------------------------MODAL MODIFICAR MODAL B----------------------------------------->
            <div class="modal fade" id="<?php echo $datbb2;?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Descargar Material</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <?php
                      $id = preg_replace('([^0-9])', '', $dataa2);
                      //echo $id;

                      $desc = mysqli_query($con,"select descripcion from articulos_inventario where id_articulo = '".$id."'  order by id_articulo desc");
                      while($rdesc = mysqli_fetch_assoc($desc)){
                         $ndesc = $rdesc['descripcion'];

                      }
                    ?>
                    
                    <form method="post" action="script/in-out-articulos.php" enctype="multipart/form-data">
                      <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Cantidad:</label>
                        <input type="text" class="form-control" id="recipient-name" name="cantidad">
                        <input type="hidden" class="form-control"  name="id" value="<?php echo $id;?>">
                        <input type="hidden" class="form-control" value="salida" name="opcion">
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">CERRAR</button>
                        <button type="submit" class="btn btn-primary">GUARDAR</button>
                      </div>
                    </form>

                    
                  </div>
                  
                </div>
              </div>
            </div>
          <!-----------------------------------FIN MODAL MODIFICAR--------------------------------->

          <!------------------------------------------MODAL MODIFICAR MODAL C----------------------------------------->
            <div class="modal fade" id="<?php echo $datcc2;?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ingresar Articulo</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <?php
                      $id = preg_replace('([^0-9])', '', $dataa2);
                      //echo $id;
                      $desc = mysqli_query($con,"select descripcion from articulos_inventario where id_articulo = '".$id."'  order by id_articulo desc");
                      while($rdesc = mysqli_fetch_assoc($desc)){
                         $ndesc = $rdesc['descripcion'];
                      }
                    ?>
                    
                    <form method="post" action="script/in-out-articulos.php" enctype="multipart/form-data">
                      <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Cantidad:</label>
                        <input type="text" class="form-control" id="recipient-name" name="cantidad">
                        <input type="hidden" class="form-control"  name="id" value="<?php echo $id;?>">
                        <input type="hidden" class="form-control" value="ingreso" name="opcion">
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">CERRAR</button>
                        <button type="submit" class="btn btn-primary">GUARDAR</button>
                      </div>
                    </form>

                    
                  </div>
                  
                </div>
              </div>
            </div>
          <!-----------------------------------FIN MODAL MODIFICAR--------------------------------->
           </td>
          

          <?php  
            $no++;
          }//while
        }//fin else
        ?>
      </table></div>
      
        </div>
    </div>

  </div><br><br>
            <tr>
              <td colspan='6'> 
                <?php  
                  $inicios = $offset + 1;
                  $finales += $inicios - 1;
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
      