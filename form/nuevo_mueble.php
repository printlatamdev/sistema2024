<style>
  .muebles {
    height: 32px !important;
    padding: 0 !important;
    text-align: center !important;
    width: 78px !important;
  }

  .muebles-medida {
    height: 32px !important;
    padding: 0 !important;
    text-align: center !important;
    width: 64px !important;
  }
</style>
<?php $id_o = $_REQUEST["id_orden"];



if (trim($id_o) == false) {
  $id_r = 0;
} else {
  $id_r = $id_o;
}





?>

<script>
  $(document).ready(function () {
    $('.selectpicker').selectpicker();
  });
</script>

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
    <tr>
      <th align="left">
        <p align="left">



        <select name="mueble" id="mueble" data-live-search="true" class="selectpicker" required>
    <option value="">Seleccione Mueble.</option>
    <?php while ($filam = mysqli_fetch_assoc($mueble)) { ?>
        <option value="<?php echo htmlspecialchars($filam['nombre']); ?>" style="width: 250px;">
            <?php echo htmlspecialchars($filam['nombre']); ?>
        </option>
    <?php } ?>
</select>

        </p>

      </th>
      <div style="margin-left: 150px;">
      <p align="left" style="display: none;">
            <input type="text" name="id_orden" value="<?=$id_o?>">
      </p>
        <th align="left">
          <p align="left">
            <input type="text" name="cantidad" placeholder="CANTIDAD" class="muebles" required="required">
            <input type="hidden" name="id_recibido" placeholder="CANTIDAD" value="<?= $id_r; ?>"
              class="muebles-medida" required="required">
          </p>

        </th>
        <td> <input type="text" name="base" placeholder="BASE" class="muebles-medida" required="required"></td>
        <td align="left">
          <p align="left">
            <input type="text" name="altura" placeholder="ALTURA" class="muebles-medida" required="required">

          </p>



        </td>
      </div>
      <td><input type="text" name="fondo" placeholder="FONDO" class="muebles-medida" required="required"></td>

    </tr>

    <tr style="height: -10px;"></tr>
    <tr>

      <th align="left">
        <input type="text" name="cotizacion" placeholder="COTIZACION" style="height: 20px;" required="required">
      </th>

      <td align="left" colspan="3">
        <input type="text" name="nota" placeholder="Ingrese Nota para la orden." style="height: 20px;"
          required="required">
      </td>
      <td>
        <div class="image-upload">
          <label for="file-input" required="required">
            <img src="imagenes/subir2.png" style="width: 60px;" required="required">
          </label>
          <input id="file-input" name="artes" type="file" required="required" />
      </td>
      <td colspan="4"><input type="image" src="imagenes/mas.png" border="0" alt="Submit"
          style="width: 60px; margin-left:-20px;  " /></td>


    </tr>
    <tr></tr>
    <tr>
      <td colspan="4">
        <div id="resultadosz" style="margin-top: -25px;"><?php include ('form/add_pop/consulta2.php'); ?></div>
      </td>
      <td> <img id="imgSalida" width="100px" height="100px" /></td>
    </tr>

  </tbody>
</table><?php if ($update == 1) { ?>
  <label style="background-color: #D1F9C5;"><b>Mueble Modificado con exito.</b></label><img src="imagenes/exito.png"
    style="width: 20px;"><?php } elseif ($add == 1) { ?>
  <label style="background-color: #D1F9C5;"><b>Mueble agregado con exito.</b></label><img src="imagenes/exito.png"
    style="width: 20px;">
<?php } elseif ($delete == 1) { ?>
  <label style="background-color: #D1F9C5;"><b>Mueble eliminado con exito.</b></label><img src="imagenes/exito.png"
    style="width: 20px;" <?php } ?>