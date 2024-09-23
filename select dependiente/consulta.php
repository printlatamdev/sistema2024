<?php
require("conexion.php");
$prove = mysqli_real_escape_string($con, $_POST["id"]);
$query = 'SELECT * FROM pais WHERE id = "'.$prove.'"';
$result = mysqli_query($con, $query);
while($row = mysqli_fetch_array($result, MYSQL_ASSOC))
{
    echo '<option value="' .$row["id"]. '">' .$row["nombre"]. '</option>';
}
mysqli_close($con);
?>

