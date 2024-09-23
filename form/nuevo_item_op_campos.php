<div class="row">
    <div class="col-md-4">
        <p align="left"><strong>TIPO</strong></p>
        <select name="trabajo" id="trabajo" class="form-control selectpicker" data-live-search="true" required="required">
            <option value="">Seleccione Trabajo</option>
            <?php while ($filam = mysqli_fetch_array($mueble)) { ?>
                <option value="<?php echo $filam[1]; ?>" style="width: 250px;"><?php echo $filam[1]; ?></option>
            <?php } ?>
        </select>
    </div>
    <div class="col-md-4">
        <p align="left"><strong>EQUIPO</strong></p>
        <select name="equipo" id="equipo" class="form-control selectpicker" data-live-search="true" required="required">
            <option value="">Seleccione Equipo</option>
            <option value="0">CORTE</option>
            <?php while ($filae = mysqli_fetch_array($equipoo)) { ?>
                <option value="<?php echo $filae[0]; ?>" style="width: 250px;"><?php echo $filae[1]; ?></option>
            <?php } ?>
        </select>
    </div>
    <div class="col-md-4">
        <p align="left"><strong>IMPRESION</strong></p>
        <select name="impresion" id="impresion" class="form-control selectpicker" data-live-search="true" required="required">
            <option value="">Seleccione</option>
            <option value="Tiro">Tiro</option>
            <option value="Tiro y Retiro">Tiro y Retiro</option>
        </select>
    </div>
</div>

<div class="row">
    <div class="col-md-4">
        <p align="left"><strong>MATERIAL</strong></p>
        <select name="material" id="material" class="form-control selectpicker" data-live-search="true" required="required">
            <option value="0">Seleccione Material</option>
            <?php while ($filama = mysqli_fetch_array($materiall)) { ?>
                <option value="<?php echo $filama[0]; ?>" style="width: 250px;"><?php echo $filama[1] . "-" . $filama[2]; ?></option>
            <?php } ?>
        </select>
    </div>
    <div class="col-md-4">
        <p align="left"><strong>LAMINADO</strong></p>
        <select name="laminado" id="laminado" class="form-control selectpicker" data-live-search="true" required="required">
            <option value="0" style="width: 250px;">Ninguno</option>
            <?php while ($filal = mysqli_fetch_array($laminadoo)) { ?>
                <option value="<?php echo $filal[0]; ?>" style="width: 250px;"><?php echo $filal[2]; ?></option>
            <?php } ?>
        </select>
    </div>
    <div class="col-md-4">
        <p align="left"><strong>RIGIDO</strong></p>
        <select name="rigido" id="rigido" class="form-control selectpicker" data-live-search="true" required="required">
            <option value="0">Ninguno</option>
            <?php while ($filar = mysqli_fetch_array($rigidoo)) { ?>
                <option value="<?php echo $filar[0]; ?>" style="width: 250px;"><?php echo $filar[1] . "-" . $filar[2]; ?></option>
            <?php } ?>
        </select>
    </div>
</div>

<div class="row">
    <div class="col-md-3">
        <input type="text" name="cantidad" placeholder="CANTIDAD" style="height: 20px;" required="required">
    </div>
    <div class="col-md-3">
        <input type="text" name="base" placeholder="BASE" style="height: 20px;" required="required">
    </div>
    <div class="col-md-3">
        <input type="text" name="altura" placeholder="ALTURA" style="height: 20px;" required="required">
    </div>
    <div class="col-md-3">
        <input type="text" name="cotizacion" placeholder="COTIZACION" style="height: 20px;" required="required">
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <textarea name="nota" rows="5" cols="40" placeholder="NOTA"></textarea>
    </div>
    <div class="col-md-3">
        <textarea name="acabados" rows="5" cols="40" placeholder="ACABADOS"></textarea>
    </div>
    <div class="col-md-3">
        <div class="col-md-6">
            <div class="image-upload">
                <label for="file-input">
                    <img src="imagenes/subir2.png" style="width: 70px;">
                </label>
                <input id="file-input" name="artes" type="file">
            </div>
        </div>
        <div class="col-md-6">
            <input type="image" src="imagenes/mas.png" border="0" alt="Submit" style="width: 70px;">
        </div>
    </div>
</div>

<div class="row">
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
                        <?php include('form/add_op/consulta2_campos.php'); ?>
                    </div>
                </td>
                <td colspan="2">
                    <img id="imgSalida" width="100px" height="100px"/>
                </td>
            </tr>
        </tbody>
    </table>
    <a href="javascript: void(0);" onclick="parent.window.location='lista_campos_nueva.php'">
        <input type="submit" name="next" class="next action-button" value="Terminar Orden" style="width: 200px;">
    </a>
    
    <?php if ($update == 1) { ?>
        <label style="background-color: #D1F9C5;"><b>Item Modificado con éxito.</b></label>
        <img src="imagenes/exito.png" style="width: 20px;">
    <?php } elseif ($add == 1) { ?>
        <label style="background-color: #D1F9C5;"><b>Item agregado con éxito.</b></label>
        <img src="imagenes/exito.png" style="width: 20px;">
    <?php } elseif ($delete == 1) { ?>
        <label style="background-color: #D1F9C5;"><b>Item eliminado con éxito.</b></label>
        <img src="imagenes/exito.png" style="width: 20px;">
    <?php } ?>
</div>
