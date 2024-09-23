
 
<?php
$q = $_REQUEST['q'];


/* Separo el id orden del tipo de documento que trae contatenado para saber que tipo de doc es*/
preg_match_all('/(\d)|(\w)/', $q, $matches); 

$numbers = implode($matches[1]); 
$letters = implode($matches[2]); 



$tipo_doc=($letters); 
$id_orden=($numbers); 
/*echo 'La cadena original es :'.$q.'<br><br>';
echo 'El id que separo es :'.$id_orden.'<br><br>';
echo 'La cadena que separo es :'.$tipo_doc.'<br><br>';*/





session_start();
    $base=$_SESSION['base'];
 //$anio=$_SESSION['year'];
    $anio=22;
$bd=$base.$anio;

$con = mysqli_connect('localhost','admin','AG784512',''.$bd.'');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,''.$bd.'');
$sql="SELECT * FROM logitica WHERE id_orden = '".$q."'";
$sql2="SELECT * FROM pop WHERE id_orden = '".$q."'";
$sql3="SELECT * FROM pop_documentos WHERE orden = '".$q."' and link=1";

$result = mysqli_query($con,$sql);
$result2 = mysqli_query($con,$sql2);
$result3 = mysqli_query($con,$sql3);
while($row21 = mysqli_fetch_array($result2)) {
   
   $cliente=$row21['empresa'];


}
?>





<?echo '
<div style="margin-lef:200px;"> '.$tipo_doc.' DE ORDEN <b> '.$id_orden.'</b> </div>
<br><br>
<table style="margin-top:-100px;" >

  <thead >
  <tr><td></td><td></td><td></td><td >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nueva Factura&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a  data-toggle="collapse" href="#multiCollapseExample1" ><img src="../sistema2020/imagenes/anadir.png" width="40" ></a></td></tr>
  <tr><td colspan=4 style="margin-lef=40px;"><div class="row" aling="center">
  <div class="col">
    <div class="collapse multi-collapse" id="multiCollapseExample1">
      <div class="card card-body">

  
        <input type="file" name="factura" required="required">
        <input type="hidden" value='.$q.' name="id">
   <input type="submit" value="enviar">

      </div>
    </div>
  </div></td></tr>
  
    <tr>
    <br><br>
      <th >N°</th>
      <th >Documento</th>
      
      <th >Borrar</th></tr>';
//

while($row = mysqli_fetch_array($result3)) {
  $id_factura=$row['id_documento'];

 $collapse1="#multiCollapseExample".$id_factura;
  $collapse2="multiCollapseExample".$id_factura;
$facturas=$row['documento'];
  // ../ORDENES_POP/".$id."/DOCUMENTOS_ORDEN_".$id."/".$facturas;

        $link='ORDENES_POP/'.$q.'/DOCUMENTOS_ORDEN_'.$q.'/'.$facturas.'';



      echo '
  
  </thead>

  <tbody>

    <tr>
      <th >'.$n_item.'</th>
      <td><a href="'.$link.'" data-fancybox="preview"  ><img src="../sistema2020/imagenes/pdf.png" width="50"></a></td>


    




      <td><a href="form/add_doc/delete_doc.php?id='.$id_factura.'" title="Eliminar" onclick="return confirm(\'Esta seguro de borrar los datos '.$row['nombres'].'?\')" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a></td>
    </tr> <br>




    ';

     $n_item++;


 }

echo '

  </tbody>
</table> 




  




';?>



