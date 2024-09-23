<?
   include("connect.php");


$id=141; 

$evento='CARGANDO';


   $conexion = conexion();

     $consulta = mysqli_query($conexion,"select*from foto_log where id_orden='".$id."' and evento='".$evento."'");
  $cantidadf=mysqli_num_rows($consulta);
?>

<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Vyasal</title>
  <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/@fancyapps/fancybox@3.5.6/dist/jquery.fancybox.min.css'>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
      <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">




</head>
<body>
<!-- partial:index.partial.html -->

<br>
<br>

 


<nav class="navbar navbar-light bg-light justify-content-between">
<form method="post" action="fotos_n.php" enctype="multipart/form-data">
  <input  name="id" type="hidden" value="<?echo $recibiendo;?>" class="form-control" value="sv" aria-label="...">
    <input  name="mes" type="hidden" value="<?echo $mes;?>" class="form-control" value="sv" aria-label="...">
       <input  name="id_al" type="hidden" value="<?echo $id_alquiler;?>" class="form-control" value="sv" aria-label="...">
 
        <button  class="btn btn-outline-success my-2 my-sm-0" type="submit">VER FOTOS DE NOCHE</button>
  </form>
</nav>
<?php //  echo $recibiendo;
      //echo $mes; 
      //echo $id_alquiler;?>

<h2> Fotos de dia. </h2>



   <?php 
                                while ($row = mysqli_fetch_array($consulta))
                                   {
                                    $foto=$row['foto'];

                                   ?>

                  <tr>
                <a href="../sistema/artes_esa17/<?php echo $foto; ?>" data-fancybox="preview" data-width="1100" data-height="1000">

                     <img  src="../sistema/artes_esa17/<?php echo $foto; ?>"  class="zoom img-fluid "  alt="" style="max-width: 200px; max-height: 200px"> 
                 
                   
                </a>
          </tr>
                 <?php
                                 }
                               ?>



<!-- partial -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
<script src='https://cdn.jsdelivr.net/npm/@fancyapps/fancybox@3.5.6/dist/jquery.fancybox.min.js'></script>

</body>
</html>