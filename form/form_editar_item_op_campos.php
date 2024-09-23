<?php while ($filamo = mysqli_fetch_array($modificares)): ?>
  <div class="row">
    <!-- Tipo -->
    <div class="col-md-4">
      <p align="left"><strong>TIPO</strong></p>
      <select name="trabajo" id="trabajo" class="form-control selectpicker" data-live-search="true" required>
        <option value="<?php echo htmlspecialchars($filamo['trabajo']); ?>">
          <?php echo htmlspecialchars($filamo['trabajo']); ?>
        </option>
        <?php while ($filam = mysqli_fetch_array($mueble)): ?>
          <option value="<?php echo htmlspecialchars($filam[1]); ?>">
            <?php echo htmlspecialchars($filam[1]); ?>
          </option>
        <?php endwhile; ?>
      </select>
    </div>

    <!-- Equipo -->
    <div class="col-md-4">
      <p align="left"><strong>EQUIPO</strong></p>
      <select name="equipo" id="equipo" class="form-control selectpicker" data-live-search="true" required>
        <option value="<?php echo htmlspecialchars($filamo['id_equipo']); ?>">
          <?php echo htmlspecialchars($filamo['equipo']); ?>
        </option>
        <?php while ($filae = mysqli_fetch_array($equipoo)): ?>
          <option value="<?php echo htmlspecialchars($filae[0]); ?>">
            <?php echo htmlspecialchars($filae[1]); ?>
          </option>
        <?php endwhile; ?>
      </select>
    </div>

    <!-- Impresion -->
    <div class="col-md-4">
      <p align="left"><strong>IMPRESION</strong></p>
      <select name="impresion" id="impresion" class="form-control selectpicker" data-live-search="true" required>
        <option value="<?php echo htmlspecialchars($filamo['tiro']); ?>">
          <?php echo htmlspecialchars($filamo['tiro']); ?>
        </option>
        <option value="Tiro">Tiro</option>
        <option value="Tiro y Retiro">Tiro y Retiro</option>
      </select>
    </div>
  </div>

  <div class="row">
    <!-- Material -->
    <div class="col-md-4">
      <p align="left"><strong>MATERIAL</strong></p>
      <select name="material" id="material" class="form-control selectpicker" data-live-search="true" required>
        <option value="<?php echo htmlspecialchars($filamo['id_material']); ?>">
          <?php echo htmlspecialchars($filamo['material']); ?>
        </option>
        <?php while ($filama = mysqli_fetch_array($materiall)): ?>
          <option value="<?php echo htmlspecialchars($filama[0]); ?>" style="width: 250px;">
            <?php echo htmlspecialchars($filama[1] . "-" . $filama[2]); ?>
          </option>
        <?php endwhile; ?>
      </select>
    </div>

    <!-- Laminado -->
    <div class="col-md-4">
      <p align="left"><strong>LAMINADO</strong></p>
      <select name="laminado" id="laminado" class="form-control selectpicker" data-live-search="true" required>
        <option value="<?php echo htmlspecialchars($filamo['id_laminado']); ?>">
          <?php echo htmlspecialchars($filamo['laminado']); ?>
        </option>
        <?php while ($filal = mysqli_fetch_array($laminadoo)): ?>
          <option value="<?php echo htmlspecialchars($filal[0]); ?>" style="width: 250px;">
            <?php echo htmlspecialchars($filal[2]); ?>
          </option>
        <?php endwhile; ?>
      </select>
    </div>

    <!-- Rigido -->
    <div class="col-md-4">
      <p align="left"><strong>RIGIDO</strong></p>
      <select name="rigido" id="rigido" class="form-control selectpicker" data-live-search="true" required>
        <option value="<?php echo htmlspecialchars($filamo['id_rigido']); ?>">
          <?php echo htmlspecialchars($filamo['rigido']); ?>
        </option>
        <?php while ($filar = mysqli_fetch_array($rigidoo)): ?>
          <option value="<?php echo htmlspecialchars($filar[0]); ?>" style="width: 250px;">
            <?php echo htmlspecialchars($filar[1] . "-" . $filar[2]); ?>
          </option>
        <?php endwhile; ?>
      </select>
    </div>
  </div>

  <div class="row">
    <!-- Cantidad -->
    <div class="col-md-3">
      <input type="text" name="cantidad" placeholder="CANTIDAD" value="<?php echo htmlspecialchars($filamo['cantidad']); ?>" style="height: 20px;" required>
    </div>

    <!-- Base -->
    <div class="col-md-3">
      <input type="text" name="base" placeholder="BASE" value="<?php echo htmlspecialchars($filamo['base']); ?>" style="height: 20px;" required>
    </div>

    <!-- Altura -->
    <div class="col-md-3">
      <input type="text" name="altura" placeholder="ALTURA" value="<?php echo htmlspecialchars($filamo['altura']); ?>" style="height: 20px;" required>
    </div>

    <!-- Cotizacion -->
    <div class="col-md-3">
      <input type="text" name="cotizacion" placeholder="COTIZACION" value="<?php echo htmlspecialchars($filamo['cot']); ?>" style="height: 20px;" required>
    </div>
  </div>

  <div class="row">
    <!-- Nota -->
    <div class="col-md-6">
      <textarea name="nota" rows="5" cols="40"><?php echo htmlspecialchars($filamo['detalle']); ?></textarea>
    </div>

    <!-- Acabados -->
    <div class="col-md-3">
      <textarea name="acabados" rows="5" cols="40"><?php echo htmlspecialchars($filamo['acabado']); ?></textarea>
    </div>

    <!-- Image Upload -->
    <div class="col-md-3">
      <div class="col-md-6">
        <div class="image-upload">
          <label for="file-input" required>
            <img src="imagenes/subir2.png" style="width: 70px;" border="1" required>
          </label>
          <input id="file-input" name="artes" type="file" required>
        </div>
      </div>

      <div class="col-md-6">
        <input type="image" src="imagenes/update.png" border="1" alt="Submit" style="width: 70px;">
      </div>
    </div>
  </div>

  <!-- Table for additional content -->
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
      <tr style="height: -10px;"></tr>
      <tr>
        <td colspan="4">
          <div id="resultadosz" style="margin-top: 10px;">
            <?php include('form/add_op/consulta2_edit_campos.php'); ?>
          </div>
        </td>
        <td colspan="2">
          <img id="imgSalida" width="100px" height="100px">
        </td>
      </tr>
    </tbody>
  </table>
<?php endwhile; ?>
