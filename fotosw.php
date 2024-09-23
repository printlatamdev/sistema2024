<?

  include("connect.php");


$id=$_REQUEST['id']; 



     $conexion = conexion();


  $consulta = mysqli_query($conexion,"select*from foto_log where id_orden='".$id."' ");
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


   <?php 
                                while ($row = mysqli_fetch_array($consulta))
                                   {

                                   ?>

                  <tr>
                <a href="../sistema/artes_esa17/<?php echo $row['foto']; ?>"  data-fancybox="preview" >

                     <img src="../sistema/artes_esa17/<?php echo $row['foto']; ?>"  class="zoom img-fluid "  alt="" style="max-width: 300px; max-height: 300px"> 
                 
                   
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