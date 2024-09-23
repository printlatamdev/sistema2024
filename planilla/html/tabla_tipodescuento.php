<?php

include "conexion.php";

$user_id=null;
$sql1= "
select a.id_descuento,a.id_empleado, a.id_tipo_descuento, a.detalle, a.monto, a.monto_restante, a.monto_cuota, a.cuotas, a.cuotas_restantes, a.tipo_cuota, a.fecha_inicio, a.fecha_fin,a.estado,b.id_area, b.id_cargo, b.id_tipo_planilla, b.codigo_marcacion,b.nombre, b.apellido, c.id_area, c.area, d.id_cargo, d.cargo, e.id_tipo_descuento,e.tipo from descuentos a INNER JOIN empleados b on a.id_empleado=b.id_empleado INNER JOIN tipo_descuento e on a.id_tipo_descuento=e.id_tipo_descuento INNER JOIN area c on b.id_area = c.id_area INNER JOIN cargos d on b.id_cargo=d.id_cargo order by a.id_descuento asc";
$query = $con->query($sql1);
$n=1;
?>

<?php if($query->num_rows>0):?>

            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox">
                        <div class="table responsive">

                            <table class="table table-striped table-bordered table-hover dataTables-example" data-page-size="15">
                                <thead>
                                <tr>

                                    <th>N°</th>
                                    <th data-hide="phone">Nombre</th>
                                     <th data-hide="phone">Apellido</th>
                                     <th data-hide="phone">Tipo descuento</th>
                                     <th data-hide="phone">Monto total</th>
                                      <th data-hide="phone">Monto Restante</th>
                                     <th data-hide="phone">Monto Cuota</th>

                                     <th data-hide="phone">Cuotas total</th>
                                     <th data-hide="phone">Cuotas restantes</th>
                                     <th data-hide="phone">Tipo Cuota</th>
                                     <th data-hide="phone">Fecha Inicio</th>
                                        <th data-hide="phone">Fecha Fin</th>
                                         <th data-hide="phone">ESTADO</th>
                                

                                </tr>
                                </thead>
                                <tbody>
<?php while ($r=$query->fetch_array()):?>
<tr><td><?php echo $r["codigo_marcacion"]; ?></td>
	<td><?php echo $r["nombre"]; ?></td>
    <td><?php echo $r["apellido"]; ?></td>
      <td><?php echo $r["tipo"]; ?></td>
        <td><?php echo "$".number_format($r["monto"],2); ?></td>
                <td><?php echo "$".number_format($r["monto_restante"],2); ?></td>
          <td><?php echo "$".number_format($r["monto_cuota"],2); ?></td>
          <td><?php echo $r["cuotas"]; ?></td>
            <td><?php echo $r["cuotas_restantes"]; ?></td>

           <?if ($r["tipo_cuota"]==01) {
             $tipo_cuotas="QUINCENAL";
           }else{ $tipo_cuotas="MENSUAL";}?>


              
                <td><?php echo $tipo_cuotas; ?></td>
                  <td><?php echo $r["fecha_inicio"]; ?></td>
                  <td><?php echo $r["fecha_fin"]; ?></td>


	<td style="width:150px;">
 
<?php if ($r["estado"]==1){ ?>
  <span style="color: red;">PENDIENTE</span>
<?php }elseif ($r["estado"]==0){?>

  <span style="color: green;">CANCELADO</span>
<?}?>

	</td>
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

   
    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <script src="js/plugins/dataTables/datatables.min.js"></script>
    <script src="js/plugins/dataTables/dataTables.bootstrap4.min.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="js/inspinia.js"></script>
    <script src="js/plugins/pace/pace.min.js"></script>
