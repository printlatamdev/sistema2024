<?php 

session_start();

// Validate and sanitize session variables
if (!isset($_SESSION['base'])) {
    die('Base de datos no especificada.');
}

$base = $_SESSION['base'];
$anio = '22';
$bd = $base . $anio;

// Establish database connection using mysqli
$conexion = new mysqli('localhost', 'root', '', $bd);

// Check connection
if ($conexion->connect_error) {
    die('Error de conexión: ' . $conexion->connect_error);
}

$id = $_REQUEST['id'];
$id_detalle_pliego = $_REQUEST['id_detalle_pliego'];
$id_detalle_orden = $_REQUEST['id_detalle'];

if (trim($id_detalle_pliego) == false) {
    $no = 'Aun no se ha ingresado pliego.';
    $var = 0;
    $action = 'form/nueva_pop/insertar_pliego.php';
    echo '<div class="alert alert-warning">Aun no se ha ingresado pliego.</div>';  // Mensaje de alerta
} else {
    $hola = $id_detalle_orden;
    // $show_pliegos2 = mysqli_query($conexion, "SELECT * FROM pop_pliego WHERE id_detalle_pliego='" . $id_detalle_pliego . "'");
    
    $show_pliegos2 = mysqli_query($conexion, " SELECT DISTINCT t1.id_detalle_orden, t1.id_orden, t1.trabajo, 
                          t2.id_detalle_pliego, t2.id_orden, t2.id_detalle, 
                          t2.id_empresa, t2.empresa, t2.cantidad, 
                          t2.base, t2.altura, t2.id_equipo, t2.equipo, 
                          t2.id_material, t2.material, t2.tiro, 
                          t2.detalle, t2.arte, t2.pliego, t2.estado 
          FROM pop_detalle t1 
          INNER JOIN pop_pliego t2 ON t1.id_detalle_orden = t2.id_detalle 
          WHERE t2.id_detalle_pliego ='" . $id_detalle_pliego . "'");

    $material = mysqli_query($conexion, "SELECT * FROM material WHERE estado = 1");


    if(mysqli_num_rows($show_pliegos2) > 0) {
        $action = 'form/nueva_pop/update_pliego.php?id_detalle_pliego=' . $id_detalle_pliego;
        $var_pliego = 1;
        echo '<div class="alert alert-success">Pliego encontrado y listado con éxito.</div>';  // Mensaje de éxito
    } else {
        echo '<div class="alert alert-danger">No se encontró ningún pliego con el ID especificado.</div>';  // Mensaje de error
    }
}
?>

<?php while ($filapli = mysqli_fetch_array($show_pliegos2)) { ?>
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
            <input style="display: none;" type="text" name="id_detalle_pliego" value="<?php echo $id_detalle_pliego; ?>">
                <div style="margin-top: -40px;">
                    <td colspan="5" align="center">
                        <select name="id_detalle" id="id_detalle" class="form-control" data-live-search="true" style="width: 400px;">
                            <?php $sql2 = mysqli_query($conexion, "SELECT * FROM pop_detalle WHERE id_orden='" . $id . "'"); ?>
                            <option value="<?php echo $filapli['id_detalle']; ?>"><?php echo $filapli['trabajo']; ?></option>
                            <?php
                            $no = 1;
                            while($row11 = mysqli_fetch_array($sql2)) { ?>
                                <option value="<?php echo $row11['id_detalle_orden']; ?>">Item <?php echo $no; ?> <?php echo $row11['trabajo']; ?></option>
                                <?php $no++; } ?>
                        </select>
                    </td>
                </div>
            </tr>
            <tr>
                <th align="left">
                    <p align="left">
                        <select name="tipo_pliego" id="tipo_pliego" class="form-control" data-live-search="true">
                            <option value="<?php echo $filapli['pliego']; ?>"><?php echo $filapli['pliego']; ?></option>
                            <?php while ($filam = mysqli_fetch_array($pliego)) { ?>
                                <option value="<?php echo $filam[1]; ?>"> <?php echo $filam[1]; ?></option>
                            <?php } ?>
                        </select>
                    </p>
                </th>
                <th align="left">
                    <p align="left">
                        <select name="material" id="material" class="form-control" data-live-search="true" style="width: 150px;">
                            <option value="<?php echo $filapli['id_material']; ?>"><?php echo $filapli['material']; ?></option>
                            <?php while ($filam = mysqli_fetch_array($material)) { ?>
                                <option value="<?php echo $filam[0]; ?>" style="width: 250px;"><?php echo $filam['tipo']; ?></option>
                            <?php } ?>
                        </select>
                    </p>
                </th>
                <th align="left">
                    <p align="left">
                        <select name="equipo" id="equipo" class="form-control" data-live-search="true" style="width: 150px;">
                            <option value="<?php echo $filapli['id_equipo']; ?>"><?php echo $filapli['equipo']; ?></option>
                            <?php while ($filam = mysqli_fetch_array($equipo)) { ?>
                                <option value="<?php echo $filam[0]; ?>"><?php echo $filam[1]; ?></option>
                            <?php } ?>
                        </select>
                    </p>
                </th>
                <th align="left">
                    <p align="left">
                        <select name="impresion" id="impresion" class="form-control" data-live-search="true" style="width: 140px;">
                            <option value="<?php echo $filapli['tiro']; ?>"><?php echo $filapli['tiro']; ?></option>
                            <option value="Tiro">Tiro</option>
                            <option value="Tiro y Retiro">Tiro y Retiro</option>
                        </select>
                    </p>
                </th>
                <td>
                    <div class="image-upload">
                        <label for="file-input">
                            <img src="imagenes/subir2.png" style="width: 60px;">
                        </label>
                        <input id="file-input" name="pliego" type="file" required="required" />
                    </div>
                </td>
                <td colspan="4"><input type="image" src="imagenes/update.png" border="0" alt="Submit" style="width: 80px; margin-left:-20px; border: 0px; margin-top: -15px;" /></td>
            </tr>
            <div>
                <tr style="margin-top: -200px;">
                    <th align="left">
                        <p align="left">
                            <input type="text" name="base" placeholder="BASE" value="<?php echo $filapli['base']; ?>" style="height: 20px;">
                        </p>
                    </th>
                    <td><input type="text" name="altura" placeholder="ALTURA" value="<?php echo $filapli['altura']; ?>" style="height: 20px;"></td>
                    <td align="left">
                        <p align="left">
                            <input type="text" name="cantidad" placeholder="CANTIDAD" value="<?php echo $filapli['cantidad']; ?>" style="height: 20px;">
                            <input type="hidden" name="id_orden" value="<?php echo $id_orden; ?>">
                        </p>
                    </td>
                    <td colspan="4"><input type="text" name="nota" value="<?php echo $filapli['detalle']; ?>" placeholder="INGRESE NOTA PARA ESTE PLIEGO" style="height: 20px;"></td>
                </tr>   
            </div>
            <tr style="height: -10px;"></tr>
            <tr></tr>
            <tr>
                <td colspan="3">
                    <div id="resultadosz" style="margin-top: -25px;"><?php include('form/add_pop/consulta3.php'); ?></div>
                </td>
                <td colspan="3">
                    <div id="resultadosz2" style="margin-top: -25px;"><?php include('form/add_pop/consullta4.php'); ?></div>
                </td>
            </tr>
        </tbody>
    </table>
<?php } ?>