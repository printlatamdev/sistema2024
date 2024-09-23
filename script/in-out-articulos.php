<?

 include ("../suministros/connect.php");
 //$con = conexion();
 include("../session.php");


  $id = $_REQUEST['id'];
  $cantidad = $_REQUEST['cantidad'];
  $estado = 0;
  $ncantidad = 0;
  //$ = $_REQUEST[''];

  $opcion = $_POST['opcion'];

    $desc = $mysqli->query("select * from articulos_inventario where id_articulo = '".$id."'  order by id_articulo desc");
      while($rdesc = mysqli_fetch_assoc($desc)){
        $canti = $rdesc['cantidad'];
      }


  if ($opcion=="ingreso") {
    
      $ncantidad = $canti + $cantidad;

       $res = $mysqli->query("UPDATE articulos_inventario SET cantidad = '".$ncantidad."' WHERE id_articulo = '".$id."' ");

        if($res==true){

            echo '<script type="text/javascript">
                  alert("Articulo Ingresado Correctamente");
                  window.location.href="../datatable_inventario.php";
                  </script>
                 ';

        }else{

          echo 'error contactar al administrador';

        }
  }else if ($opcion=="salida") {
       $ncantidad = $canti - $cantidad;

         if ($ncantidad >= 0) {

            $res = $mysqli->query("UPDATE articulos_inventario SET cantidad = '".$ncantidad."' WHERE id_articulo = '".$id."' ");

            if($res==true){
                echo '<script type="text/javascript">
                      alert("Articulo Descargado Correctamente");
                      window.location.href="../datatable_inventario.php";
                      </script>
                     ';
            }else{
              echo 'error contactar al administrador';
            }
         }else{
           echo '<script type="text/javascript">
                 alert("La cantidad a descargar es mayor a la existencia, intente nuevamente");
                 window.location.href="../datatable_inventario.php";
                 </script>';
         }

       
  }



?>