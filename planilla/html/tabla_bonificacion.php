<?php

include "conexion.php";

$user_id=null;
$sql1= "select a.id_bonificacion, a.id_empleado, a.id_tipo_bonificacion, a.horas_extras_diurnas,a.horas_extras_nocturnas, a.monto, a.isss, a.afp, a.total_pagar, a.detalle, a.estado, b.id_empleado, b.codigo_marcacion, b.nombre, b.apellido, c.id_tipo_bonificacion, c.tipo,c.estado from bonificacion a INNER join empleados b on a.id_empleado=b.id_empleado INNER JOIN tipo_bonificacion c on a.id_tipo_bonificacion=c.id_tipo_bonificacion order by a.id_bonificacion desc ";
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

                                    <th  align="center">N°</th>
                                    <th  align="center" >NOMBRE</th>
                                    <th  align="center">APELLIDO</th>
                                    <th  align="center">TIPO </th>
                                    
                                    
                                    <th  align="center">HORAS EXTRAS D</th>
                                    <th  align="center">HORAS EXTRAS N</th>
                                    <th  align="center" >MONTO TOTAL</th>
                                  
                                     <th align="center" >ISSS</th>
                                     <th align="center" >AFP</th>
                                     <th align="center" >LIQUIDO</th>

                                </tr>
                                </thead>
                                <tbody>
<?php while ($r=$query->fetch_array()):?>
<tr><td><?php echo $r["codigo_marcacion"]; ?></td>
	<td><?php echo $r["nombre"]; ?></td>
    <td><?php echo $r["apellido"]; ?></td>
     <td><?php echo $r["tipo"]; ?></td>
      <td><?php echo $r["horas_extras_diurnas"]; ?></td>
          <td><?php echo $r["horas_extras_nocturnas"]; ?></td>
    
          <td><?php echo "$".number_format($r["monto"],2); ?></td>
            <td><?php echo "$".number_format($r["isss"],2); ?></td>
              <td><?php echo "$".number_format($r["afp"],2); ?></td>
               
                        <td><?php echo "$".number_format($r["total_pagar"],2); ?></td>
                       

	<td style="width:150px;">
		<a data-id="<?php echo $r["id"];?>" class="btn btn-edit btn-sm btn-warning">Editar</a>
		<a href="#" id="del-<?php echo $r["id"];?>" class="btn btn-sm btn-danger">Eliminar</a>
		<script>
		$("#del-"+<?php echo $r["id"];?>).click(function(e){
			e.preventDefault();
			p = confirm("Estas seguro?");
			if(p){
				$.get("./php/eliminar.php","id="+<?php echo $r["id"];?>,function(data){
					loadTabla();
				});
			}

		});
		</script>
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