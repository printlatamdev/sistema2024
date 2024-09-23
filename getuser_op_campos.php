<?php
$q = $_REQUEST['q'];



session_start();

$base = $_SESSION['base'];
// $anio = 22;
$anio=$_SESSION['year'];
$nivel = $_SESSION['nivel'];
$bd = $base . $anio;

$con = mysqli_connect('localhost', 'root', '', '' . $bd . '');
if (!$con) {
  die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con, '' . $bd . '');
$sql = "SELECT * FROM campos_detalle WHERE id_detalle_orden = '" . $q . "'";
$sql2 = "SELECT * FROM campos_detalle WHERE id_detalle_orden = '" . $q . "'";
$result = mysqli_query($con, $sql);
$result2 = mysqli_query($con, $sql2);

while ($row2 = mysqli_fetch_array($result2)) {

  $flg3 = $flg3 + 1;
  //$id=$fila2[0];
  $id_orden = $row2['id_orden'];
  $pliego = $row2['trabajo'];
  $cantidad = $row2['cantidad'];
  $altura = $row2['altura'];
  $base = $row2['base'];
  $coti = $row2['cot'];
  $trabajo = $row2['trabajo'];
  $nom_material = $row2['material'];
  $nom_rigido = $row2['rigido'];
  $nom_laminado = $row2['laminado'];
  $nom_equipo = $row2['equipo'];
  $impresion = $row2['tiro'];
  $nota = $row2['detalle'];
  $arte2 = $row2['arte'];
  $cot = $row2['cot'];
  $acabado = $row2['acabado'];
  $tiro = $row2['tiro'];
  $computo = $row2['computo'];
  $impresion = $row2['impresion'];
  $c_corte = $row2['completo_corte'];
  $c_imp = $row2['completo_imp'];
  $modal = "#a" . $q;
  $modal2 = "a" . $q;




  $findet = '';

  if ($arte2 == "no_disponible.png") {
    $link_arte2 = 'imagenes/no_disponible.png';

  } else {
    $link_arte2 = "ORDENES_OP/CAMPOS/" . $id_orden . "/ARTES/" . $arte2;
    $prueba = $arte2;

  }


  if ($pliego == "COMBINADO") {
    $color_pliego = "red";
  } else {
    $color_pliego = "green";
  }


  echo '  
<div class="row">                                                        
<div class="col-md-9">

    <div class="row">
      <div class="col-md-11">

                                                                                                   
        <div id="fms0" class="col-md-12">
          <div id="fms" class="col-md-12">
            <div id="fmsd0" class="col-md-12">
                  <label class="control-label"><strong>Item:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</strong></label>&nbsp;&nbsp;' . $pliego . '

                  <div class="clearfix"></div>
                  <label class="control-label"><strong>Cantidad&nbsp;&nbsp;&nbsp;:</strong></label>
                  ' . $cantidad . ' &nbsp;&nbsp;
                  <strong><font color="green">Impresiones:</font></strong> ' . $c_imp . ' &nbsp;&nbsp;
                  <strong><font color="green">Corte:</font></strong> ' . $c_corte . ' 
                  <div class="clearfix"></div>
                  <label class="control-label "><strong>Tamaño&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</strong></label>
                    ' . $base . ' (base) X ' . $altura . ' (altura) CM.
                  <div class="clearfix"></div>
                  <label class="control-label"><strong>Material&nbsp;&nbsp;&nbsp;&nbsp;:</strong></label>
                 ' . $nom_material . ' <div class="clearfix"></div>
                  <label class="control-label"><strong>Equipo&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</strong></label>
                  ' . $nom_equipo . ' <div class="clearfix"></div>
                  <label class="control-label"><strong>Impresion&nbsp;:</strong></label> ' . $tiro . '
                 <div class="clearfix"></div>
            </div>
                          <div id="fmsd3" class="col-md-12">
                            <label class="control-label "><strong>Nota:</strong></label> ' . $nota . ' 
                          </div>
        </div>  
                               <div id="fms3" class="col-md-6">   
                                    <center>
                                       <a href="' . $link_arte2 . '" target="_blank" data-fancybox="preview" data-width="300%" data-height="300%"><img width="150px"   src="' . $link_arte2 . '"></a>
                                    </center><br><br>';
  //COLOCAR CONDICION DE NIVEL PARA QUE APAREZCA EL BOTTOM
  if ($nivel == 1 || $nivel == 2 || $nivel == 5 || $nivel == 4) {
    # code...

    echo '<div class="col-md-12" style="margin-left:55px;"><a data-toggle="modal" data-target=' . $modal . '><button type="submit" class="btn btn-warning" ><strong>FINALIZAR ITEM</strong></button></a></div><br><br>';
  }
  echo '</div> 
      </div>
    </div>
  </div>
</div>
</div>';
  $arte2 = "";




}


?>

<div id="<?php echo $modal2; ?>" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <form action="form/finalizar_item_op_campos.php" method="POST">
        <div class="modal-header">
          <h4 class="modal-title">TERMINAR ITEM</h4>
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        </div>
        <div class="modal-body">
          <H6>
            <p>Desea terminar este item? </p>
          </H6>
          <input type="hidden" name="si" value="<?php echo $q; ?>">
          <input type="hidden" name="si_orden" value="<?php echo $id_orden; ?>">
          <input type="hidden" name="nivel" value="<?php echo $nivel; ?>">

        </div>
        <div class="modal-footer">
          <input type="button" class="btn btn-default" data-dismiss="modal" value="Salir">
          <button type="submit" class="btn btn-primary">FINALIZAR</button>

        </div>
      </form>
    </div>
  </div>
</div>



<script type="text/javascript">

  $(document).ready(function () {
    $(".fancybox").fancybox({
      openEffect: "none",
      closeEffect: "none"
    });





    $(".zoom").hover(function () {

      $(this).addClass('transition');
    }, function () {

      $(this).removeClass('transition');
    });
  });

  $(".rotate").fancybox({
    width: 600,
    height: 300,
    type: 'iframe'
  });





</script>


<!-- FIN MUESTRA PLIEGO -->