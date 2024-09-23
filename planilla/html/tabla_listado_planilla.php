<?

include "conexion.php";
$sql13= "select*from periodo";
$query5 = $con->query($sql13);

$sql131= "select*from periodo";
$query51 = $con->query($sql131);
$tipo= "select*from tipo_planilla";
$tipo_planilla = $con->query($tipo);



?>


<form action="" method="POST">
<div class="col-lg-3">

  <select name="area" id="area"   class="selectpicker form-control" data-live-search="true">
              <option value="" >SELECCIONE MES</option>
            <? while ($filam = mysqli_fetch_array($query5))
                                   {
                                           ?>
                          <option value="<? echo $filam[0];?>" > <? echo $filam[2];?></option>
                                  
                                         

                                          <?}?>
                                         

                                         

          </select>



</div>

<div class="col-lg-3">

  <select name="area" id="area"   class="selectpicker form-control" data-live-search="true">
              <option value="" >SELECCIONE PERIODO</option>
            <? while ($filamP = mysqli_fetch_array($query51))
                                   {
                                           ?>
                          <option value="<? echo $filamP[3];?>" > <? echo $filamP[4];?></option>
                                  
                                         

                                          <?}?>
                                         

                                         

          </select>



</div>


<div class="col-lg-3">

  <select name="area" id="area"   class="selectpicker form-control" data-live-search="true" onchange="form.submit()">
              <option value="" >SELECCIONE PERIODO</option>
            <? while ($filamt = mysqli_fetch_array($tipo_planilla))
                                   {
                                           ?>
                          <option value="<? echo $filamt[0];?>" > <? echo $filamt[1];?></option>
                                  
                                         

                                          <?}?>
                                         

                                         

          </select>



</div>

</form>



<?php


$user_id=null;
$sql1= "select a.id_planilla, a.id_tipo_planilla,a.id_empleado,a.id_periodo,a.otros_descuentos,a.bonificacion,a.dias_trabajados, a.isss,a.afp,a.renta, a.total_descuento, a.total_bonificacion,a.total_pagar, a.fecha, a.estado, b.id_empleado, b.id_tipo_planilla, b.codigo_marcacion, b.nombre, b.apellido, b.sueldo from planilla a INNER JOIN empleados b on a.id_empleado=b.id_empleado ";
$query = $con->query($sql1);
$n=1;
?>

<?php if($query->num_rows>0):?>

            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox">
                        <div class="ibox-content">

                           <table class="footable table table-stripped toggle-arrow-tiny" data-page-size="16">
                                <thead>
                                <tr>

                                    <th  align="center">ID</th>
                                    <th  align="center" >Nombre</th>
                                    <th  align="center">Apellido</th>
                                    <th  align="center">Salario/M </th>
                                    
                                    
                                    <th  align="center">Salario/D</th>
                                    <th  align="center">Dias trabajados</th>
                                    <th  align="center" >Pago neto</th>
                                  
                                     <th align="center" >ISSS</th>
                                     <th align="center" >AFP</th>
                                     <th align="center" >RENTA</th>

                                     <th align="center" >OTROS DESCUENTOS</th>
                                     <th align="center" >TOTAL DESCUENTOS</th>
                                     <th align="center" >BONIFICACION</th>
                                       <th align="center" >TOTAL A PAGAR</th>


                                </tr>
                                </thead>
                                <tbody>
<?php while ($r=$query->fetch_array()):
$salario_dia=$r["sueldo"]/30;
$pago_neto=$salario_dia*$r["dias_trabajados"];
  ?>

<tr><td><?php echo $r["codigo_marcacion"]; ?></td>
<td><?php echo $r["nombre"]; ?></td>
	<td><?php echo $r["apellido"]; ?></td>
    <td><?php echo $r["sueldo"]; ?></td>
     <td><?php echo $salario_dia; ?></td>
     <td><?php echo $r["dias_trabajados"]; ?></td>
      <td><?php echo $pago_neto; ?></td>
         <td><?php echo "$".number_format($r["isss"],2); ?></td>
            <td><?php echo "$".number_format($r["afp"],2); ?></td>
              <td><?php echo "$".number_format($r["renta"],2); ?></td>
    
          <td><?php echo "$".number_format($r["otros_descuentos"],2); ?></td>
            <td><?php echo "$".number_format($r["total_descuento"],2); ?></td>
              <td><?php echo "$".number_format($r["total_bonificacion"],2); ?></td>
               
                        <td><?php echo "$".number_format($r["total_pagar"],2); ?></td>
                       

	
</tr>
<?php endwhile;?>
</table>
<?php else:?>
	<p class="alert alert-warning">No hay resultados</p>
<?php endif;?>
  <!-- Modal -->
  <script>
  	$(".btn-edit").click(function(){
  		id = $(this).data("id");
  		$.get("./php/formulario.php","id="+id,function(data){
  			$("#form-edit").html(data);
  		});
  		$('#editModal').modal('show');
  	});
  </script>
  <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Actualizar</h4>
        </div>
        <div class="modal-body">
        <div id="form-edit"></div>
        </div>

      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->