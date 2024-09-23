<?php while ($filamo = mysqli_fetch_array($modificares)): ?>
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
                <td>
                    <select name="mueble" id="mueble" data-live-search="true" class="selectpicker">
                        <option value="<?php echo htmlspecialchars($filamo['trabajo']); ?>">
                            <?php echo htmlspecialchars($filamo['trabajo']); ?>
                        </option>
                        <?php while ($filam = mysqli_fetch_array($mueble)): ?>
                            <option value="<?php echo htmlspecialchars($filam[1]); ?>" style="width: 250px;">
                                <?php echo htmlspecialchars($filam[1]); ?>
                            </option>
                        <?php endwhile; ?>
                    </select>
                </td>
                <td>
                    <input type="text" name="cantidad" required placeholder="CANTIDAD" 
                           value="<?php echo htmlspecialchars($filamo['cantidad']); ?>" style="height: 20px;">
                </td>
                <td>
                    <input type="text" name="base" placeholder="BASE" required 
                           value="<?php echo htmlspecialchars($filamo['base']); ?>" style="height: 20px;">
                </td>
                <td>
                    <input type="text" name="altura" placeholder="ALTURA" required 
                           value="<?php echo htmlspecialchars($filamo['altura']); ?>" style="height: 20px;">
                </td>
                <td>
                    <input type="text" name="fondo" placeholder="FONDO" required 
                           value="<?php echo htmlspecialchars($filamo['fondo']); ?>" style="height: 20px;">
                </td>
            </tr>
            <tr>
                <td>
                    <input type="text" name="cotizacion" placeholder="COTIZACION" required 
                           value="<?php echo htmlspecialchars($filamo['cot']); ?>" style="height: 20px;">
                </td>
                <td colspan="3">
                    <input type="text" name="nota" placeholder="Ingrese Nota para la orden." required 
                           value="<?php echo htmlspecialchars($filamo['detalle']); ?>" style="height: 20px;">
                </td>
                <td>
                    <div class="image-upload">
                        <label for="file-input">
                            <img src="imagenes/subir2.png" style="width: 60px;" alt="Upload Image">
                        </label>
                        <input id="file-input" name="artes" type="file" required>
                    </div>
                </td>
                <td colspan="4">
                    <input type="image" src="imagenes/update.png" border="0" alt="Submit" 
                           style="width: 60px; margin-left: -20px; border: 0;">
                </td>
            </tr>
            <tr>
                <td colspan="4">
                    <div id="resultadosz" style="margin-top: 10px;">
                        <?php include('form/add_pop/consulta2_edit.php'); ?>
                    </div>
                </td>
                <td colspan="2">
                    <img id="imgSalida" width="100px" height="100px" alt="Image Preview">
                </td>
            </tr>
        </tbody>
    </table>
<?php endwhile; ?>
