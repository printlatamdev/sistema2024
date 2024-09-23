



<?php
  
  session_start();


  require_once ("conexion_ajax.php");

  
$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
if($action == 'ajax'){
  $query2 = mysqli_real_escape_string($con,(strip_tags($_REQUEST['query'], ENT_QUOTES)));

  $tables="logitica";
  $campos="*";
  $sWhere=" logitica.id_orden LIKE '%".$query."%' and estado=1";
  $sWhere.=" order by logitica.id_orden desc ";
  
  
  include 'pagination.php'; //include pagination file
  //pagination variables
  $page = (isset($_REQUEST['page']) && !empty($_REQUEST['page']))?$_REQUEST['page']:1;
  $per_page = intval($_REQUEST['per_page']); //how much records you want to show
  $adjacents  = 4; //gap between pages after number of adjacents
  $offset = ($page - 1) * $per_page;
  
  //Count the total number of row in your table*/
  $count_query   = mysqli_query($con,"select distinct a.id_orden, a.id_empresa, a.empresa, a.contacto, a.fecha_orden, a.vendedor, a.destino, a.id_proyecto, a.nombre_proyecto, a.estado, a.computo, a.impresion, a.corte, b.id_orden, b.origen, b.f_salida, b.f_llegada,b.estado,b.estado,b.numorden_compra,b.status, c.id_proyecto, c.marca, c.nombre, b.direccion_entrega from logitica b inner join pop a on b.id_orden = a.id_orden inner join pop_proyecto c on a.id_proyecto=c.id_proyecto where b.estado=1 order by a.id_orden desc ");
  if ($row= mysqli_fetch_array($count_query)){$numrows = mysqli_num_rows($count_query);}
  else {echo mysqli_error($con);}


  $total_pages = ceil($numrows/$per_page);
  //main query to fetch the data

/*//PRODUCCION POP
$querycon = mysqli_query($con,"select * from pop_detalle");
while($rowac = mysqli_fetch_assoc($querycon)){
  $idordenac = $rowac['id_orden'];
  $computoac = $rowac['computo'];
  $impreac = $rowac['impresion'];
  $corteac = $rowac['corte'];


  if ($computoac == 1) {
     $computoactualizar = mysqli_query($con,"UPDATE pop set computo='1', estado='1' where id_orden='".$idordenac."'");
  }
  if ($impreac == 1) {
    $impreactualizar = mysqli_query($con,"UPDATE pop set impresion='1', estado='1' where id_orden='".$idordenac."'");
  }
  if ($corteac == 1) {
    $corteactualizar = mysqli_query($con,"UPDATE pop set corte='1', estado='1' where id_orden='".$idordenac."'");
  }
}
*/



  $query = mysqli_query($con,"select distinct a.id_orden, a.id_empresa, a.empresa, a.contacto, a.fecha_orden, a.vendedor, a.destino, a.id_proyecto, a.nombre_proyecto, a.estado, a.computo, a.impresion, a.corte, b.id_orden, b.origen, b.f_salida, b.f_llegada,b.estado,b.estado,b.numorden_compra,b.status, c.id_proyecto, c.marca, c.nombre, b.direccion_entrega from logitica b inner join pop a on b.id_orden = a.id_orden inner join pop_proyecto c on a.id_proyecto=c.id_proyecto where b.estado=1 order by a.id_orden desc LIMIT $offset,$per_page");

  //loop through fetched data
  
?>

<style type="text/css">  
.grid-container {
  display: grid; /* This is a (hacky) way to make the .grid element size to fit its content */
  overflow: auto;
  height: 300px;
  width: 600px;
}
.grid {
  display: flex;
  flex-wrap: nowrap;
}
.grid-col {
  width: 150px;
  min-width: 150px;
}

.grid-item--header {
  height: 100px;
  min-height: 100px;
  position: sticky;
  position: -webkit-sticky;
  background: white;
  top: 0;
}

.grid-col--fixed-left {
  position: sticky;
  left: 0;
  z-index: 9998;
  background: white;
}
.grid-col--fixed-right {
  position: sticky;
  right: 0;
  z-index: 9998;
  background: white;
}

.grid-item {
  height: 50px;
  border: 1px solid gray;
}

</style>





       <div class="table-responsive" style="margin-left: -20px; margin-top: 30px;" class="grid-item grid-item--header">
       <table class="table table-striped table-hover" style="width: 100%;">
        <thead class="bg-primary" >
        <tr>

            <th># OP</th>
                  <th>Cot</th>
                  <th>OC</th>
                  <th>Cliente</th>
                  <th>Campaña</th>
                  <th>Origen</th>
                  <th>Destino</th>
                  <th>ETD</th>
                  <th>ETA</th>
                  <th>Doc</th>
                  <th>Estado</th>
                  <th>Info</th>
                  <th>Fotos</th>
                  <th>Acciones</th>

            
        </tr></thead>
        <?php
          if ($numrows>0){
    
  
      
        if(mysqli_num_rows($query) == 0){
          echo '<tr><td colspan="8">No hay datos.</td></tr>';
        }else{
          $no = 1;
            $finales=0; $nivel=$_SESSION['nivel'];

                                               $tipo="original";
          while($row = mysqli_fetch_assoc($query)){


   



                      $finales++;

                      if ($facturas!=null) {
                             $facturas=$row['factura'];
                          //$segunda_tabla=0;
                          }else{

                         
                           
                        
                      }


                           
                     $data='#'.$row['id_orden'];
                     $data2=$row['id_orden'];
                     $dataa='#ab'.$row['id_orden'];
                     $dataa2='ab'.$row['id_orden'];
                     $datab='#cd'.$row['id_orden'];
                     $datab2='cd'.$row['id_orden'];


                       $datalog='#2i'.$row['id_orden'];
                     $data2log="2i".$row['id_orden'];

                     
                      $server=$_SERVER['SERVER_ADDR'];

                    // $archive="http://".$server."/browser/elfinder6x.php?year=20".$_SESSION['year']."&empresa=".$row['empresa']."&marca=".$row['marca']."&proyecto=".$row['nombre']."&nivel=".$nivel."&tipo=".$tipo;

                       $archive="../browser/elfinder6x.php?year=20".$_SESSION['year']."&empresa=".$row['empresa']."&marca=".$row['marca']."&proyecto=".$row['nombre']."&nivel=".$nivel."&tipo=".$tipo."&base=".$base;
                    
                     

                     //$archive="browser/elfinder6.php?year=20".$_SESSION['year']."&empresa=".$row['empresa']."&marca=".$row['marca']."&proyecto=".$row['nombre']."&nivel=".$nivel."&tipo=".$tipo;







                     
            echo '
            <tr style="font-size:85%;" >
              <td>'.$row['id_orden'].'</td>
               <td>'.$row['fecha_orden'].'</td>

  ';$nivel=$_SESSION['nivel'];
          $base=$_SESSION['base'];

         if ($base=="esa" ||  $base=="nica") {
         
        
        if ($nivel==1 || $nivel==2 || $nivel==3 || $nivel==9  || $nivel==20  || $nivel==7) { 
          
          //nuevo para cotizaciones
          echo '<td>';
            $sql58 = mysqli_query($con, "select DISTINCT id_orden, cot from pop_detalle where id_orden='".$row['id_orden']."'");
                  while($row52 = mysqli_fetch_assoc($sql58)){
                    $cot=$row52['cot'];
                    $cadena_de_texto = $cot;
$cadena_buscada   = '-19';
$posicion_coincidencia = strpos($cadena_de_texto, $cadena_buscada);
$cadena_de_texto2 = $cot;
$cadena_buscada2   = '-NI';
$posicion_coincidencia2 = strpos($cadena_de_texto2, $cadena_buscada2);
 
$cadena_buscada3   = '-SV';
$posicion_coincidencia3 = strpos($cadena_de_texto2, $cadena_buscada3); 

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
                           
                     
/**************************************************************************/
if ($posicion_coincidencia3 === false ) {
  
    $encontrado3=0;

   //echo $cadena_buscada3."1";

            $datos3 = $cot;
list($id_c3, $anio3) = explode("-", $datos3);

    } else {
          
            $encontrado3=1;

            $datos3 = $cot;
list($id_c3, $anio3) = explode("-", $datos3);
//echo $id; // foo
//echo $anio; // 
//echo $datos3;
            }
              
/*************************************************************************/


if ($encontrado==0 && $encontrado2==0) {    
                           
                      $query233 = mysqli_query($con,"select*from cotizacion where id_cotizacion='".$cot."'");
                           while($row9 = mysqli_fetch_assoc($query233)){
                              $cot_d=$row9['archivo'];

                                echo'<div class="col-md-12"><a href="cotizaciones_'.$cotrut.'/'.$cot_d.'" data-fancybox="preview" style="font-size:15px;"><span class="label label-info">'.$cot.'</span></a></div>';


                            }
                  
                 
}elseif($econtrado==1 && $encontrado2==0){

$con22 = mysqli_connect('localhost','admin','AG784512','esa19');
if (!$con22) {
    die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con22,'esa19');
$sql="select*from cotizacion where id_cotizacion='".$cot."' ";
   
 
$result = mysqli_query($con22,$sql);

$ordenes_activas=mysqli_num_rows($result);
while($row92 = mysqli_fetch_assoc($result)){
                              $cot_d2=$row92['archivo'];

             echo'<div class="col-md-12"><b><h5><a href="cotizaciones_'.$base.'19/'.$cot_d2.'" data-fancybox="preview"><span class="label label-info">'.$cot.'</span></a></div>';
                            }


}elseif ($encontrado==0 && $encontrado2==1) {
 $con22 = mysqli_connect('localhost','admin','AG784512','nica20');
if (!$con22) {
    die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con22,'nica20');
$sql="select*from cotizacion where id_cotizacion='".$cot."' ";
   
 
$result = mysqli_query($con22,$sql);

$ordenes_activas=mysqli_num_rows($result);
while($row92 = mysqli_fetch_assoc($result)){
                              $cot_d2=$row92['archivo'];

             echo'<div class="col-md-12"><b><h5><a href="cotizaciones_nica20/'.$cot_d2.'" data-fancybox="preview"><span class="label label-info">'.$cot.'</span></a></div>';
                            }

}

elseif ($encontrado==1 && $encontrado2==1) {

  $con22 = mysqli_connect('localhost','admin','AG784512','nica19');
if (!$con22) {
    die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con22,'nica19');
$sql="select*from cotizacion where id_cotizacion='".$cot."' ";
   
 
$result = mysqli_query($con22,$sql);

$ordenes_activas=mysqli_num_rows($result);
while($row92 = mysqli_fetch_assoc($result)){
                              $cot_d2=$row92['archivo'];

             echo'<div class="col-md-12"><b><h5><a href="../sistema/cotizaciones_nica19/'.$cot_d2.'" data-fancybox="preview"><span class="label label-info">'.$cot.'</span></a></div>';
                            }
  
}


elseif ($encontrado3==1) {

  $con22 = mysqli_connect('localhost','admin','AG784512','esa20');
if (!$con22) {
    die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con22,'esa20');
$sql="select*from cotizacion where id_cotizacion='".$datos3."' ";
   
 
$result = mysqli_query($con22,$sql);

$ordenes_activas=mysqli_num_rows($result);
while($row92 = mysqli_fetch_assoc($result)){
                              $cot_d2=$row92['archivo'];

             echo'<div class="col-md-12"><b><h5><a href="../sistema/cotizaciones_nica19/'.$cot_d2.'" data-fancybox="preview"><span class="label label-info">'.$datos3.'</span></a></div>';
                            }
  
}




                  
                  }
          echo '</td>';
          //termina nuevo para cotizaciones

         }else{ echo '

                    <td> <a data-toggle="modal" data-target="#no">'.$cot.'</a></td>

';
                    } }  echo '

              <td>'.$row['numorden_compra'].'</td>
                            <td>'.$row['empresa'].'</td>
                            <td>'.$row['nombre_proyecto'].'</td>
                           
              <td>'.$row['origen'].'</td>
                            <td>'.$row['destino'].'</td>
                              <td>'.$row['f_salida'].'</td>
                            <td>'.$row['f_llegada'].'</td>';
                            $nivel=$_SESSION['nivel'];
          $base=$_SESSION['base'];

         if ($base=="esa" || $base=="nica") {
         
        
        if ($nivel==1 || $nivel==2 || $nivel==9|| $nivel==17 ) {

            echo '



                            <td> 


                            <a data-toggle="collapse" data-target='.$datalog.' aria-expanded="false" aria-controls='.$data2log.'> <img src="imagenes/info.png" width="15"  /></a>


                            </td>

                             '; }else{
                               
                               echo '
                              <td> <a class="fa fa-info-circle" data-toggle="modal" data-target="#no" class="edit"></a> </td>';


                             }}

                             echo '






              <td> ';
              if($nivel==9){

                $facccf=mysqli_query($con,"select * from pop_documentos where orden='".$row['id_orden']."' and tipo='FACTURA'");
                while($rowccf = mysqli_fetch_assoc($facccf)){
                  $varfac=$rowccf['documento'];
//echo $varccf;
                }

                
                if (empty($varfac)) {
                   echo '<span class="label label-danger">CCF/FAC</span>&nbsp';
                   }
                else {
                  echo '<span class="label label-success">CCF/FAC</span>&nbsp';
                  $varfac=0;
                  } 
                

                $facce=mysqli_query($con,"select * from pop_documentos where orden='".$row['id_orden']."' and tipo='NOTA ENVIO'");
                while($rowce = mysqli_fetch_assoc($facce)){
                  $varce=$rowce['documento'];
//echo $varce;
                }
                
                if (empty($varce)) {
                   echo '<span class="label label-danger">CE</span>&nbsp';
                   }
                else {
                  echo '<span class="label label-success">CE</span>&nbsp';
                  $varce=0;
                  }

                $faccp=mysqli_query($con,"select * from pop_documentos where orden='".$row['id_orden']."' and tipo='COMPROBANTE PAGO'");
                while($rowcp = mysqli_fetch_assoc($faccp)){
                  $varcp=$rowcp['documento'];
                  //echo $varcp;
                }
                
                if (empty($varcp)) {
                   echo '<span class="label label-danger">CP</span>&nbsp';
                   }
                else {
                  echo '<span class="label label-success">CP</span>&nbsp';
                  $varcp=0;
                  }

                

              }else{
                if($row['status'] == 'PROCESO'){
                echo '<span class="label label-success">COLA </span>';
              }
                            else if ($row['status'] == 'IMPRESION' ){
                echo '<span class="label label-info">IMPRESION</span>';
              }
                            else if ($row['status'] == 'CORTE' ){
                echo '<span class="label label-warning">CORTE </span>';
              }

                      else if ($row['status'] == 'ACABADO' ){
                echo '<span class="label label-warning"> ACABADO</span>';
              }
                    
                        else if ($row['status'] == 'TRAMITE' ){
                echo '<span class="label label-warning"> DESPACHADO</span>';
              }

              }
              

              //PRIMER DESPLEGABLE 
              //PRIMER DESPLEGABLE 



            echo '


       
              </td>


          
        
              <td>
              
   <a data-toggle="collapse" data-target='.$data.' aria-expanded="false" aria-controls='.$data2.'> <img src="imagenes/info.png" width="15"  /></a>


             </td>';?>
              <td ><a data-fancybox data-options='{"data-backdrop":"static", "type" : "iframe", "iframe" : {"preload" : false } }' href="<? echo $archive; ?>" class="btn bg-success"><i class="far fa-folder"></i></a></td>
              
              <?php if ( $nivel==17 || $nivel==1 || $nivel==2 || $nivel==3 || $nivel==11|| $nivel==9 ): ?>
                <td>
                  <div class="col-xs-6">
                    <a data-fancybox data-options='{"data-backdrop":"static", "type" : "iframe", "iframe" : {"preload" : false } }' 
                  
                    href="reportes/remision_pop_option.php?id=<?echo $row['id_orden']; ?>" 

                    class="btn bg-warning" title="Imprimir Nota de Envio"><i class="fas fa-print"></i></a>
                  </div>
                  <div class="col-xs-6">
                    <a data-fancybox data-options='{"data-backdrop":"static", "type" : "iframe", "iframe" : {"preload" : false } }' href="reportes/produccion.imprimir.pop.php?idorden=<?echo $row['id_orden']; ?>" class="btn bg-success" title="Imprimir Reporte"><i class="fas fa-file-pdf"></i></a>
                  </div>
                   
              
                </td>
              <?php endif ?>


       <?$nivel=$_SESSION['nivel'];
          $base=$_SESSION['base'];

         if ($base=="esa" || $base=="nica") {
         
        
        if ($nivel==1 || $nivel==2 || $nivel==3|| $nivel==17) {?>

              <td >
                  <a data-fancybox data-options='{"data-backdrop":"static", "type" : "iframe", "iframe" : {"preload" : false } }' href="form3.php?id_orden=<?echo $row['id_orden']; ?>" class="edit"><i class="material-icons" data-toggle="tooltip" title="Editar" >&#xE254;</i></a>
                 
                <? echo '<a href="form/nueva_pop/fin_pop.php?id='.$row['id_orden'].'" title="Finalizar" onclick="return confirm(\'Desea terminar esta orden?\')"class="delete"><i class="material-icons" data-toggle="tooltip" title="Eliminar">&#xE872;</i></a>
              </td>';}
                 else{?>
                    
                     <td >
                  <a data-toggle="modal" data-target="#no" class="edit"><i class="material-icons" data-toggle="tooltip" title="Editar" >&#xE254;</i></a>
                 
                <? echo '<a  data-toggle="modal" data-target="#no" class="delete"><i class="material-icons" data-toggle="tooltip" title="Eliminar">&#xE872;</i></a>
              </td>';

                 

                 


           } }?>
           <? echo '
            </tr>
            <tr><td colspan="16" class="zeroPadding" >
             <div class="col" >
             <div class="collapse multi-collapse" id='.$data2.' style="width:100%" >
             <div class="card card-body"><br>';

     include("consulta_item.php");?>
      
          

      </div>
    </div>
  </div>

    </td>
    </tr>
    <!-- SEGUNDO DESPLEGABLE -->
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
            <p class="text-warning"><small>Gracias.</small></p>
            <input type="hidden" name="delete_id" id="delete_id">
          </div>
          <div class="modal-footer">
            <input type="button" class="btn btn-default" data-dismiss="modal" value="Salir">
            
          </div>
        </form>
      </div>
    </div>
  </div>
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
  xmlhttp.open("GET","getuser.php?q="+str,true);
  xmlhttp.send();
}
</script>
    <tr>
          <td colspan="16" class="zeroPadding" >
            <div class="col" >
            <div class="collapse multi-collapse" id="<? echo $dataa2; ?>" style="width:100%" >
              <div class="card card-body">
                <!--<? //include('consulta_mueble.php');?>-->

              <div id="<?echo $n_funcion;?>"><b></b></div>
              </div>
            </div>
          </td></tr>
       
    <!--TERCER DEPLEGABLE-->
    
         <tr ><td colspan="16" class="zeroPadding" >
        <div class="col" >
                   <div class="collapse multi-collapse" id="<? echo $data2log;?>" style="width:100%" >
                      <div class="card card-body"><br>
                      <? $facturac = mysqli_query($conexion,"select * from pop_documentos where orden='".$row['id_orden']."'"); ?>
                        <?include('logistica/documentos2.php');?>
                        
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

  </div><br><br>
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
}
?>          
      
<script type="text/javascript">
  var Aatrox = document.getElementById("Aatrox");
var Aatroxclicks = 0;

function AatroxIcon() {
    Aatroxclicks = Aatroxclicks + 1;
    if (Aatroxclicks % 2 != 0) {
        Aatrox.setAttribute("src", "http://images.evisos.hn/2014/09/02/cachorros-husky-siberianos-urgente_d75de2f77_3.jpg");
    }else{
      Aatrox.setAttribute("src", "http://cotodelobos.com/blog/wp-content/uploads/2010/08/005-300x211.jpg");
    }
}
</script>