<?php

include "conexion.php";

$user_id=null;
$sql1= "select a.id_empleado, a.id_area, a.id_tipo_planilla, a.codigo_marcacion, a.nombre, a.apellido, a.dui, a.direccion, a.email, a.telefono, a.f_nacimiento, a.sueldo, a.sexo, a.n_isss, a.n_afp, a.renta, a.cuenta, a.estado , b.id_area, b.area, b.estado, c.id_cargo, c.cargo, c.estado from empleados a INNER JOIN area b on a.id_area=b.id_area INNER JOIN cargos c on a.id_cargo=c.id_cargo ";
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
                                    <th  align="center">Dui</th>
                                    
                                    <th  align="center">Email</th>
                                    <th  align="center">Telefono</th>
                                    <th  align="center" >F_nacimiento</th>
                                  
                                     <th align="center" >Area</th>
                                     <th align="center" >Cargo</th>
                                     <th align="center" >Cargo</th>

                                </tr>
                                </thead>
                                <tbody>
<?php while ($r=$query->fetch_array()):?>
<tr><td><?php echo $r["codigo_marcacion"]; ?></td>
	<td><?php echo $r["nombre"]; ?></td>
    <td><?php echo $r["apellido"]; ?></td>
      <td><?php echo $r["dui"]; ?></td>
    
          <td><?php echo $r["email"]; ?></td>
            <td><?php echo $r["telefono"]; ?></td>
              <td><?php echo $r["f_nacimiento"]; ?></td>
               
                        <td><?php echo $r["area"]; ?></td>
                        <td><?php echo $r["cargo"]; ?></td>

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