<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

session_start();
$nombre = $_SESSION['vsNombre'];
$base = $_SESSION['base'];
$anio = '22';
$bd = $base . $anio;
$app_ap = $_REQUEST['approve'];
$app_id = $_REQUEST['app_status'];


$conexion = mysqli_connect('localhost', 'root', '', '' . $bd . '');
if (!$conexion) {
  die('Could not connect: ' . mysqli_error($conexion));
}



mysqli_select_db($conexion, '' . $bd . '');

$proyecto = mysqli_query($conexion, "select*from pop_proyecto ");
$cliente = mysqli_query($conexion, "select*from empresa ");
$pais = mysqli_query($conexion, "select*from pais ");
$vendedores = mysqli_query($conexion, "select*from vendedores where estado=1 ");
$mueble = mysqli_query($conexion, "SELECT * FROM tipo_mueble WHERE estado='1'");

//1---recibir variable
$orderid = $_REQUEST['id_orden'];
$query_s = mysqli_query($conexion, "select*from pop where id_orden='$orderid'");
$info_stat = mysqli_fetch_array($query_s);

if (isset($app_ap)) {
  // Create connection
  $conn = new mysqli('localhost', 'root', '', '' . $bd . '');
  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  $sql = "UPDATE pop SET estado=1 WHERE id_orden=$app_id";

  if ($conn->query($sql) === TRUE) {
    echo "<script>alert('POP Aprobado!');</script>";
    die;
  } else {
    echo "<script>alert($conn->error);</script>";

    //echo "Error updating record: " . $conn->error;
  }

  $conn->close();

}


$modificado = $_REQUEST['modificado'];//recibo la variable del script de update para abrir modal de exito
$agregado = $_REQUEST['agregado'];//recibo la variable del script add pliego para abrir modal exito
$eliminado = $_REQUEST['delete'];//recibo la variable del script delete pliego para abrir modal exito

$id_detalle_orden = $_REQUEST['id_detalle_orden'];
if (trim($id_detalle_orden) == false) {
  $no = 'Ingrese datos de Orden';
  $var = 0;
  $action = 'form/nueva_pop/insertar_mueble.php';

} else {
  $hola = $id_detalle_orden;

  $modificares = mysqli_query($conexion, "select*from pop_detalle where id_detalle_orden='" . $id_detalle_orden . "'and estado=1 ");
  $action = 'form/nueva_pop/update_mueble.php?id_detalle_orden=' . $id_detalle_orden . '';

  $no = '';
  $var = 1;
}

if (trim($modificado) == false) {

  $update = 0;

} else {
  $update = 1;


}

if (trim($agregado) == false) {

  $add = 0;

} else {
  $add = 1;


}

if (trim($eliminado) == false) {

  $delete = 0;

} else {
  $delete = 1;


}




?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>sd</title>
  <!-- SELECT CON BUSCADOR-->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/css/bootstrap-select.min.css"
    rel="stylesheet" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/js/bootstrap-select.min.js"></script>

  <!-- buscador-->




  <script src="assets/admin/pages/scripts/form-samples.js"></script>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
  <link href="assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
    integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

  <link rel="stylesheet" type="text/css" href="form/css/index.css">

  <!-- Optional theme -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css"
    integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
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
  </style>
  <style>
    #contenedor {
      display: flex;
      flex-direction: row;
      justify-content: space-around;
      flex-wrap: nowrap;
    }

    #contenedor>div {
      width: 50%;
    }

    #msform fieldset {
      background: white;
      border: 0 none;
      border-radius: 3px;
      box-shadow: 0 0 15px 1px rgb(0 0 0 / 40%);
      padding: 20px 30px;
      box-sizing: border-box;
      width: 84%;
      margin: 0 10%;
      height: auto;
      position: relative;
    }
  </style>

</html>

</head>

<body>

  <div id="msform">
    <form action=" <?php echo $action; ?>" method="POST" enctype="multipart/form-data" style="margin-top: -40px;">


      <!-- ********************************************************************MUEBLE**************************************************************************-->
      <fieldset>

        <div class="row">
          <div class="alert alert-info" role="alert" style="margin-top: -40px; height: 15px;">Muebles2</div>
          <?php if ($var == 1) {
            include ('form/form_editar_mueble.php');
          } else {
            include ('form/nuevo_mueble.php');
          }
          ?>
        </div>
        <div style="margin-top: -50px; margin-left: 500px;">
          <?php if (trim($orderid == false)): ?>
            <a href="form4.php?id=<?= $id_orden; ?>">
              <input type="button" name="next" class="next action-button" value="Siguiente" />
            </a>
          <?php else: ?>
            <a href="form4.php?id=<?= $orderid; ?>">
              <input type="button" name="next" class="next action-button" value="Siguiente" />
            </a>
          </div>
        <?php endif ?>
  </div>

  </fieldset>
  <!-- ******************************************************************** FIN MUEBLE ********************************************************************-->

  </form>
  <?php if ($nombre == 'Eduardo Campos' && $info_stat[9] == 2 || $nombre == 'Color Digital IT' && $info_stat[9] == 2): ?>
    <form action="form3.php" method="post" style="text-align:center;">
      <input style="display:none;" name='app_status' class='next action-button' value='<?php echo $orderid ?>' />
      <input
        style="width: 100px;background: #27AE60;font-weight: bold;color: white;border: 0 none;border-radius: 1px;cursor: pointer;padding: 10px 5px;"
        id="approved_step" type='submit' name='approve' class='next action-button' value='Aprobar' />
    </form>
  <?php endif ?>

  </div>
  <script src="assets/admin/pages/scripts/form-samples.js"></script>
  <!-- partial -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js'></script>

  <!--IMAGE COMPRESS-->
  <script>
    const compressImage = async (file, { quality = 1, type = file.type }) => {
      const imageBitmap = await createImageBitmap(file);

      const canvas = document.createElement('canvas');
      canvas.width = imageBitmap.width;
      canvas.height = imageBitmap.height;
      const ctx = canvas.getContext('2d');
      ctx.fillStyle = '#ffff';
      ctx.fillRect(0, 0, canvas.width, canvas.height);
      ctx.drawImage(imageBitmap, 0, 0);

      const blob = await new Promise((resolve) =>
        canvas.toBlob(resolve, type, quality)
      );

      return new File([blob], file.name, {
        type: blob.type,
      });
    };

    const input = document.querySelector('#file-input');
    input.addEventListener('change', async (e) => {
      const { files } = e.target;

      if (!files.length) return;

      const dataTransfer = new DataTransfer();

      for (const file of files) {
        if (!file.type.startsWith('image')) {
          dataTransfer.items.add(file);
          continue;
        }

        const compressedFile = await compressImage(file, {
          quality: 0.6,
          type: 'image/jpeg',
        });

        dataTransfer.items.add(compressedFile);
      }

      e.target.files = dataTransfer.files;
    });
  </script>

  <script type="text/javascript">
    $(window).load(function () {

      $(function () {
        $('#file-input').change(function (e) {
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
    $(document).ready(function () {
      $.ajax({
        type: 'POST',
        url: 'carga_select/cargar_cliente.php'

      })
        .done(function (form) {
          $('#cliente').html(form)
        })
        .fail(function () {
          alert('Hubo un errror al cargar las listas_rep')
        })

      $('#cliente').on('change', function () {
        var id = $('#cliente').val()
        $.ajax({
          type: 'POST',
          url: 'carga_select/cargar_contacto.php',
          data: { 'id': id }
        })
          .done(function (form) {
            $('#contacto').html(form)
          })
          .fail(function () {
            alert('Hubo un error al cargar los vídeos')
          })
      })
      $('#contacto').on('change', function () {
        var id = $('#contacto').val()


      })

      $('#enviar').on('click', function () {
        var resultado = $('#pais option:selected').text()

        $('#resultado1').html(resultado)
      })
      $('#enviar').on('click', function () {
        var resultado1 = $('#pop option:selected').text()

        $('#resultado2').html(resultado1)
      })


    })

  </script>

  <script type="text/javascript">
    $(document).ready(function () {
      $('#btnguardar').click(function () {
        var datos = $('#frmajax').serialize();
        $.ajax({
          type: "POST",
          url: "form/nueva_pop/insertar.php",
          data: datos,
          success: function (r) {
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
    $(document).ready(function () {
      $('#btnguardar2').click(function () {
        var datos = $('#frmajax').serialize();
        // var datos = new FormData($("#frmajax"));

        $.ajax({
          type: "POST",


          url: "form/nueva_pop/insertar_mueble.php",
          data: datos,




          success: function (r) {
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