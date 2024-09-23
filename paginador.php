<?php
require('pag/conexion.php');
$RegistrosAMostrar=4;

//estos valores los recibo por GET
$hola=$_REQUEST['hola'];
if(isset($_GET['pag'])){
	$RegistrosAEmpezar=($_GET['pag']-1)*$RegistrosAMostrar;
	$PagAct=$_GET['pag'];
//caso contrario los iniciamos
}else{
	$RegistrosAEmpezar=0;
	$PagAct=1;
	
}
$Resultado   = mysqli_query($con,"select distinct a.id_orden, a.id_empresa, a.empresa, a.contacto, a.fecha_orden, a.vendedor, a.destino, a.id_proyecto, a.nombre_proyecto, a.estado, a.computo, a.impresion, a.corte, b.id_orden, b.origen, b.f_salida, b.f_llegada,b.status,b.numorden_compra, c.id_proyecto, c.marca, c.nombre from logitica b inner join pop a on b.id_orden = a.id_orden inner join pop_proyecto c on a.id_proyecto=c.id_proyecto where a.estado = '1' order by a.id_orden desc limit $RegistrosAEmpezar, $RegistrosAMostrar");
echo "<table border='1px'>";


?>
 <div class="table-responsive" style="margin-left: -20px; margin-top: 30px;">
       <table class="table table-striped table-hover" style="width: 100%;">
        <thead class="bg-primary" >
        <tr>

                    <th># OP <? echo $hola;?></th>
          <th>Cot</th>
          <th>OC</th>
                    <th>Cliente</th>
                    <th>Campa�a</th>
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
       
        if(mysqli_num_rows($Resultado) == 0){
          echo '<tr><td colspan="8">No hay datos.</td></tr>';
        }else{
          $no = 1;
          while($row = mysqli_fetch_assoc($Resultado)){



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

      include("consulta_item.php");?>
      
          


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
  xmlhttp.open("GET","getuser.php?q="+str,true);
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
      </table></div><?
//******--------determinar las p�ginas---------******//
$NroRegistros=mysqli_num_rows(mysqli_query($con,"select distinct a.id_orden, a.id_empresa, a.empresa, a.contacto, a.fecha_orden, a.vendedor, a.destino, a.id_proyecto, a.nombre_proyecto, a.estado, a.computo, a.impresion, a.corte, b.id_orden, b.origen, b.f_salida, b.f_llegada,b.status,b.numorden_compra, c.id_proyecto, c.marca, c.nombre from logitica b inner join pop a on b.id_orden = a.id_orden inner join pop_proyecto c on a.id_proyecto=c.id_proyecto where a.estado = '1' order by a.id_orden desc "));


$PagAnt=$PagAct-1;
$PagSig=$PagAct+1;
$PagUlt=$NroRegistros/$RegistrosAMostrar;

//verificamos residuo para ver si llevar� decimales
$Res=$NroRegistros%$RegistrosAMostrar;
// si hay residuo usamos funcion floor para que me
// devuelva la parte entera, SIN REDONDEAR, y le sumamos
// una unidad para obtener la ultima pagina
if($Res>0) $PagUlt=floor($PagUlt)+1;

//desplazamiento
echo "<a onclick=\"Pagina('1')\">Primero</a> ";
if($PagAct>1) echo "<a onclick=\"Pagina('$PagAnt')\">Anterior</a> ";
echo "<strong>Pagina ".$PagAct."/".$PagUlt."</strong>";
if($PagAct<$PagUlt)  echo " <a onclick=\"Pagina('$PagSig')\">Siguiente</a> ";
echo "<a onclick=\"Pagina('$PagUlt')\">Ultimo</a>";
?>
