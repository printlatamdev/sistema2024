<!DOCTYPE html>
<html lang="es">
<head>
<title>Cargar Select a Partir de la seleccion de otro Select</title>
<meta charset="UTF-8">
<link rel="stylesheet" href="style.css" type="text/css">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
</head>
<body>
<header>
    <nav>
        <h2>Cargar select dependiente a partir de la seleccion de otro select con AJAX y PHP</h2>
    </nav>
</header>
<div id="contenedor">
    <form>
        <select id="proveedor" onchange="CargarProductos(this.value);">
            <option>-Selecciona un proveedor-</option>
            <?php
            require('conexion.php');
            $query = 'SELECT * FROM pais';
            $result = mysqli_query($con, $query);
            while($row = mysqli_fetch_array($result, MYSQL_ASSOC))
            {
                echo '<option value="' .$row["id"]. '">' .$row["nombre"]. '</option>';
            }
            mysqli_close($con);
            ?>
        </select>
        <br style="clear:both;">
        <select id="productos"></select>
    </form>
    <div id="respuesta"></div>
</div>
<footer>
    <p><img alt="Licencia GPLV3" style="border-width:0" src="http://www.gnu.org/graphics/gplv3-88x31.png" />
Esta aplicación está bajo una licencia GPL V3. 
 Diseñado y Programado por: <a href="http://genesisvargasj.com">Genesis Vargas J.</a> 2014</p>
</footer>    
<script>
function CargarProductos(val)
{
    $('#respuesta').html("<img src="loader.gif" /> Por favor espera un momento");    
    $.ajax({
        type: "POST",
        url: 'consulta.php',
        data: 'id='+val,
        success: function(resp){
            $('#productos').html(resp);
            $('#respuesta').html("");
        }
    });
}
</script>
</body>
</html>