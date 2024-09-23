<?php
session_start();

include("conexion_edit.php");
$conexion = conexion();

//$proyecto = mysqli_query($conexion,"select*from pop_proyecto ");
$cliente = mysqli_query($conexion, "select*from empresa ");
$pais = mysqli_query($conexion, "select*from pais ");
$vendedores = mysqli_query($conexion, "select*from vendedores where estado=1 ");
$mueble = mysqli_query($conexion, "SELECT * FROM tipo_trabajo WHERE estado='1'");
$equipoo = mysqli_query($conexion, "SELECT * FROM equipo WHERE estado='1'");
$impresionn = mysqli_query($conexion, "SELECT * FROM tipo_trabajo WHERE estado='1'");
$materiall = mysqli_query($conexion, "SELECT * FROM material WHERE estado='1'");
$laminadoo = mysqli_query($conexion, "SELECT * from material WHERE material='Laminador'");
$rigidoo = mysqli_query($conexion, "SELECT * FROM material WHERE material='pvc' OR material='coroplast' OR material='carton' OR material='lenticular' OR material='poliestireno' AND estado='1'");

//Recibir variable 
$orderid = $_REQUEST['id_orden'] ?? '';

$modificado = $_REQUEST['modificado'] ?? ''; //recibo la variable del script de update para abrir modal de exito
$agregado = $_REQUEST['agregado'] ?? ''; //recibo la variable del script add pliego para abrir modal exito
$eliminado = $_REQUEST['delete'] ?? ''; //recibo la variable del script delete pliego para abrir modal exito

$id_detalle_orden = $_REQUEST['id_detalle_orden'] ?? '';
echo $_REQUEST;
if ($id_detalle_orden == false) {
  $no = 'Ingrese Detalles de Orden';
  $var = 0;
  $action = 'form/nueva_op/insertar_item_op.php?id_orden=' . $orderid . '';
} else {
  $hola = $id_detalle_orden;
  $modificares = mysqli_query($conexion, "select*from orden_detalle where id_detalle_orden='" . $id_detalle_orden . "'");
  $action = 'form/nueva_op/update_item_op.php?id_detalle_orden=' . $id_detalle_orden . '';
  $no = '';
  $var = 1;
}
//if (trim($modificado)
if ($modificado == false) {
  $update = 0;
} else {
  $update = 1;
}

if ($agregado == false) {

  $add = 0;
} else {
  $add = 1;
}

if ($eliminado == false) {

  $delete = 0;
} else {
  $delete = 1;
}




?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Nueva OP Color</title>
  <!-- SELECT CON BUSCADOR-->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/css/bootstrap-select.min.css" rel="stylesheet" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/js/bootstrap-select.min.js"></script>

  <!-- buscador-->




  <script src="assets/admin/pages/scripts/form-samples.js"></script>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
  <link href="assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

  <link rel="stylesheet" type="text/css" href="form/css/index.css">

  <!-- Optional theme -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
  <link href="assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />

  <link href="assets/admin/layout/css/themes/darkblue.css" rel="stylesheet" type="text/css" id="style_color" />
  <link href="assets/admin/layout/css/custom.css" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" type="text/css" href="assets/global/plugins/select2/select2.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
  <link rel="stylesheet" href="add_pop/style.css">

  <style type="text/css">
    .image-upload>input {
      display: none;
    }

    .table>thead>tr>th {
      padding: 8px;
      line-height: 1.42857143;
      vertical-align: top;
      border-top: 0px solid #ddd;
    }
  </style>




</head>

<body>

  <div id="msform">
    <form action="<?php echo $action; ?>" method="POST" enctype="multipart/form-data" style="margin-top: 5px;margin-left: -40px;width: 1000px; height: 1000px;">
      <!-- ********************************************************************MUEBLE**************************************************************************-->
      <fieldset>

        <div class="row">
          <div class="alert alert-info" role="alert" style="margin-top: -40px; height: 15px;">Items</div>
          <?php if ($var == 1) {
            include('form/form_editar_item_op.php');
          } else {
            include('form/nuevo_item_op.php');
          }
          ?>
        </div>

      </fieldset>
      <!-- ******************************************************************** FIN MUEBLE ********************************************************************-->

    </form>
  </div>
  <script src="assets/admin/pages/scripts/form-samples.js"></script>
  <!-- partial -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js'></script>
  <script src="form/nueva_pop/script.js"></script>

  <script type="text/javascript">
    $(window).load(function() {

      $(function() {
        $('#file-input').change(function(e) {
          addImage(e);
        });

        function addImage(e) {
          var file = e.target.files[0],
            imageType = /image.*/;

          if (!file.type.match(imageType))
            return;

          var reader = new FileReader();
          reader.onload = fileOnload;
          reader.readAsDataURL(file);
        }

        function fileOnload(e) {
          var result = e.target.result;
          $('#imgSalida').attr("src", result);
        }
      });
    });
  </script>

  <script type="text/javascript">
    $(document).ready(function() {
      $.ajax({
          type: 'POST',
          url: 'carga_select/cargar_cliente.php'

        })
        .done(function(form) {
          $('#cliente').html(form)
        })
        .fail(function() {
          alert('Hubo un errror al cargar las listas_rep')
        })

      $('#cliente').on('change', function() {
        var id = $('#cliente').val()
        $.ajax({
            type: 'POST',
            url: 'carga_select/cargar_contacto.php',
            data: {
              'id': id
            }
          })
          .done(function(form) {
            $('#contacto').html(form)
          })
          .fail(function() {
            alert('Hubo un error al cargar los vídeos')
          })
      })
      $('#contacto').on('change', function() {
        var id = $('#contacto').val()


      })

      $('#enviar').on('click', function() {
        var resultado = $('#pais option:selected').text()

        $('#resultado1').html(resultado)
      })
      $('#enviar').on('click', function() {
        var resultado1 = $('#pop option:selected').text()

        $('#resultado2').html(resultado1)
      })


    })
  </script>

  <script type="text/javascript">
    $(document).ready(function() {
      $('#btnguardar').click(function() {
        var datos = $('#frmajax').serialize();
        $.ajax({
          type: "POST",
          url: "form/nueva_pop/insertar.php",
          data: datos,
          success: function(r) {
            if (r == 1) {

            } else {

            }
          }
        });

        return false;
      });
    });
  </script>

  <script type="text/javascript">
    $(document).ready(function() {
      $('#btnguardar2').click(function() {
        var datos = $('#frmajax').serialize();
        // var datos = new FormData($("#frmajax"));

        $.ajax({
          type: "POST",


          url: "form/nueva_pop/insertar_mueble.php",
          data: datos,




          success: function(r) {
            if (r == 1) {

            } else {

            }
          }
        });

        return false;
      });
    });
  </script>
</body>

</html>