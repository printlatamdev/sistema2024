<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pliego Form</title>
    <!-- Include jQuery and Select2 -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
</head>
<body>

<!-- Main Table -->
<table class="table">
  <thead>
    <tr>
      <th></th>
      <th></th>
      <th></th>
      <th></th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    <!-- First Row: Select Mueble -->
    <tr>
      <td colspan="5" align="center">
        <select name="id_detalle" id="id_detalle" class="form-control select2" style="width: 670px;" required onchange="fetchPliegos()">
          <option value="">Mueble</option>
          <?php
          $sql2 = mysqli_query($conexion, "SELECT * FROM pop_detalle WHERE id_orden='" . mysqli_real_escape_string($conexion, $id_orden) . "' AND estado=1");
          $no = 1;
          while ($row11 = mysqli_fetch_assoc($sql2)) { ?>
              <option value="<?php echo htmlspecialchars(string: $row11['id_detalle_orden'] ?? ''); ?>">
                  Item <?php echo $no; ?> - <?php echo htmlspecialchars($row11['trabajo'] ?? ''); ?>
              </option>
          <?php $no++; } ?>
        </select>
      </td>
    </tr>

    <!-- Second Row: Form Inputs -->
    <tr>
      <!-- Tipo Pliego -->
      <th>
        <select name="tipo_pliego" id="tipo_pliego" class="form-control select2" required>
          <option>Pliego</option>
          <?php while ($filam = mysqli_fetch_assoc($pliego)) { ?>
              <option value="<?php echo htmlspecialchars($filam['nombre'] ?? ''); ?>">
                  <?php echo htmlspecialchars($filam['nombre'] ?? ''); ?>
              </option>
          <?php } ?>
        </select>
      </th>

      <!-- Material -->
      <th>
        <select name="material" id="material" class="form-control select2" required>
          <option>Material</option>
          <?php while ($filam = mysqli_fetch_assoc($material)) { ?>
              <option value="<?= htmlspecialchars($filam['id']); ?>">
                  <?= htmlspecialchars($filam['material'] ?? '') . '--' . htmlspecialchars($filam['tipo'] ?? ''); ?>
              </option>
          <?php } ?>
        </select>
      </th>

      <!-- Equipo -->
      <th>
        <select name="equipo" id="equipo" class="form-control select2" required>
          <option>Equipo</option>
          <?php while ($filam = mysqli_fetch_assoc($equipo)) { ?>
              <option value="<?= htmlspecialchars($filam['id_equipo']); ?>">
                  <?php echo htmlspecialchars($filam['nombre'] ?? ''); ?>
              </option>
          <?php } ?>
        </select>
      </th>

      <!-- Impresión -->
      <th>
        <select name="impresion" id="impresion" class="form-control select2" required>
          <option value="">Impresión</option>
          <option value="Tiro">Tiro</option>
          <option value="Tiro y Retiro">Tiro y Retiro</option>
        </select>
      </th>

      <!-- Image Upload -->
      <td>
        <div class="image-upload">
          <label for="file-input">
            <img src="imagenes/subir2.png" style="width: 60px;" alt="Subir imagen">
          </label>
          <input id="file-input" name="pliego" type="file" required />
        </div>
      </td>

      <!-- Submit Button -->
      <td colspan="4">
        <input type="image" src="imagenes/mas.png" border="0" alt="Submit" style="width: 60px; margin-left: -20px;" />
      </td>
    </tr>

    <!-- Third Row: Additional Inputs -->
    <tr>
      <th><input type="text" name="base" placeholder="BASE" style="height: 20px;" required></th>
      <td><input type="text" name="altura" placeholder="ALTURA" style="height: 20px;" required></td>
      <td><input type="text" name="cantidad" placeholder="CANTIDAD" style="height: 20px;" required></td>
      <td style="display: none;"><input type="hidden" name="orden" value="<?php echo $id_orden?>" required></td>
      <td colspan="4"><input type="text" name="nota" placeholder="INGRESE NOTA PARA ESTE PLIEGO" style="height: 20px;" required></td>
    </tr>

    <!-- Results Rows: Dynamic AJAX-loaded Content -->
    <tr>
      <td colspan="3"><div id="resultadosz"><?php include('form/add_pop/consulta3.php'); ?></div></td>
      <td colspan="3"><div id="resultadosz2"><?php include('form/add_pop/consullta4.php'); ?></div></td>
    </tr>
  </tbody>
</table>

<!-- Status Messages -->
<?php if ($update == 1) { ?>
  <label style="background-color: #D1F9C5;"><b>Pliego Modificado con éxito.</b></label>
  <img src="imagenes/exito.png" style="width: 20px;" alt="Éxito">
<?php } elseif ($add == 1) { ?>
  <label style="background-color: #D1F9C5;"><b>Pliego agregado con éxito.</b></label>
  <img src="imagenes/exito.png" style="width: 20px;" alt="Éxito">
<?php } elseif ($delete == 1) { ?>
  <label style="background-color: #FC9F9F;"><b>Pliego eliminado con éxito.</b></label>
  <img src="imagenes/exito.png" style="width: 20px;" alt="Éxito">
<?php } ?>

<!-- AJAX and Select2 Initialization -->
<script>
function fetchPliegos() {
    var id_detalle = document.getElementById('id_detalle').value;

    if (id_detalle) {
        var xhr = new XMLHttpRequest();
        xhr.open('GET', 'form/add_pop/consullta4.php?id_detalle=' + id_detalle, true);
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                document.getElementById('resultadosz2').innerHTML = xhr.responseText;
            }
        };
        xhr.send();
    } else {
        document.getElementById('resultadosz2').innerHTML = '<tr><td colspan="4">Selecciona un mueble para ver pliegos Det.</td></tr>';
    }
}

// Initialize Select2 for all select elements
$(document).ready(function() {
  $('.select2').select2();
});
</script>

</body>
</html>
