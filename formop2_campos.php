<?php

session_start();
include("connect.php");
$conexion = conexion();

$cliente = mysqli_query($conexion, "select*from empresa ");

$vendedores = mysqli_query($conexion, "select * from vendedores where estado=1 ");








?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>OP CAMPOS</title>


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


</head>

<body>

  <div id="msform">
    <form action="form/nueva_op/insertar_campos.php" method="POST" enctype="multipart/form-data">


      <!-- fieldsets -->
      <fieldset><!--primer form-->


        <div class="row">
          <div class="alert alert-info" role="alert" style="margin-top: -40px; height: 15px;">Datos Orden</div>



          <div class="row">

            <div class="col-md-7">
              <p align="left">CLIENTE<br><br>
                <select id="client" name="cliente" class="selectpicker form-control" data-live-search="true"
                  style="font-size:1px; height: 35px; width: 100px; font-size:1px;" class="form-control"
                  data-live-search="true" required="required" tabindex="1">
                  <option value="">Seleccione el Cliente</option>
                  <?php while ($empresa = mysqli_fetch_array($cliente)) {
                    ?>
                    <option value="<?php echo $empresa[0]; ?>"> <?php echo $empresa[1]; ?></option>



                  <?php } ?>

                </select>

              </p>
            </div>

            <div class="col-md-5">
              <p align="left">EMPRESA<br><br>
                <select id="empre" name="empre" class="form-control selectpicker" data-live-search="true"
                  required="required">
                  <option value="">Seleccione Empresa</option>

                  <option value="Color Digital">Color Digital</option>
                  <option value="Color Nicaragua">Color Nicaragua</option>
                  <option value="Color en Linea">Color en Linea</option>
                  <option value="Vyasal">Vyasal</option>
                  <option value="Campos Peñate">Campos Peñate</option>

                </select>
              </p>
            </div>
          </div>

          <div class="row">
            <div class="col-md-7">
              <p align="left">VENDEDOR<br><br>
                <select id="vendedor" name="vendedor" class="form-control selectpicker" data-live-search="true"
                  required="required">
                  <option value="">Seleccione Vendedor</option>
                  <?php while ($filasv = mysqli_fetch_array($vendedores)) {
                    ?>
                    <option value="<?php echo $filasv[1]; ?>"> <?php echo $filasv[1]; ?></option>



                  <?php } ?>
                </select>
              </p>
            </div>



            <div class="col-md-5">
              <?php $fecha = date('Y-m-d'); ?>
              <p align="left">FECHA ENTREGA<br><br><input id="fecha" name="fecha" type="date" name="trip-start"
                  value="<?php echo $fecha; ?>" min="2023-01-01" max="2023-12-31" style="height: 35px; width: 265px;"
                  required="required" class="form-control">
              </p>
            </div>



            <div class="col-md-7">

            </div>



            <div class="col-md-12">
              <br>
              <h3>Agregar Scan de Orden de Producción, debe ser en formato PDF:</h3>

              <div class="row">
                <div class="col-md-6">
                  <div class="image-upload">
                    <label for="file-input" required="required">
                      <img src="imagenes/subir2.png" style="width: 70px;" required="required">
                    </label>
                    <input id="file-input" name="artes" type="file" required="required" />
                  </div>
                </div>
                <div class="col-md-6">
                  <input type="image" src="imagenes/mas.png" border="0" alt="Submit" style="width: 70px;">
                </div>
              </div>
            </div>

          </div>


          <!-- <button id="btnguardar">Guardar datos</button>-->
          <!--<button type="submit" value="Siguiente">siguiente</button>-->

      </fieldset>
      <!-- ********************************************************************MUEBLE**************************************************************************-->

    </form>
  </div>
  <script src="assets/admin/pages/scripts/form-samples.js"></script>
  <!-- partial -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js'></script>
  <script src="form/nueva_pop/script.js"></script>

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

</html>