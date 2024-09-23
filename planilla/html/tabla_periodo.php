<?php

include "conexion.php";

$user_id=null;
$sql1= "select * from periodo";
$query = $con->query($sql1);
$n=1;
?>

<?php if($query->num_rows>0):?>

            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox">
                        <div class="ibox-content">

                            <table class="footable table table-stripped toggle-arrow-tiny" data-page-size="15">
                                <thead>
                                <tr>

                                    <th>ID</th>
                                    <th data-hide="phone">MES</th>
                                     <th data-hide="phone">QUINCENA</th>
                                     <th data-hide="phone">ESTADO</th>
                                     <th data-hide="phone">ACCIONES</th>
                                

                                </tr>
                                </thead>
                                <tbody>
<?php while ($r=$query->fetch_array()):?>
<tr><td><?php echo $r["id_periodo"]; ?></td>
	<td><?php echo $r["nombre_mes"]; ?></td>
    <td><?php echo $r["n_quincena"]; ?></td>

    <?if ($r["estado"]==1) {?>
     <td><span class="label label-warning">PENDIENTE</span></td>
  <?  }elseif($r["estado"]==2){?>
<td><span class="label label-success">ACTIVO</span></td>
    <?}else{?>
<td><span class="label label-danger">CERRADO</span></td>

      <?}?>
     

	<td style="width:150px;">
		<?if ($r["estado"]==1) {?>

      <a href="subir_marcacion.php"  class="btn btn-sm btn-danger">Subir Marcaciones</a>
     
    <?}elseif($r["estado"]==2){?>
      <a href="#"  class="btn btn-sm btn-success">Marcaciones Activas</a>

   <? }elseif($r["estado"]==0){?>
<a href="#"  class="btn btn-sm btn-secondary">Marcaciones Cerradas</a>

    <?}?>
		
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

        <script>
        $(document).ready(function(){
            $('.dataTables-example').DataTable({
                pageLength: 25,
                responsive: true,
                dom: '<"html5buttons"B>lTfgitp',
                buttons: [
                   

                    {extend: 'print',
                     customize: function (win){
                            $(win.document.body).addClass('white-bg');
                            $(win.document.body).css('font-size', '15px');

                            $(win.document.body).find('table')
                                    .addClass('compact')
                                    .css('font-size', 'inherit');
                    }
                    }
                ]

            });

        });

    </script>