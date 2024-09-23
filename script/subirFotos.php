<?

//include ('../connect.php');
//$con = conexion();
 //include("../session.php");


 //include 'conexion.php';



$id_orden = $_POST["id_orden"];
$opcion = $_POST["option"];
$origen = $_POST["origen"];

if ($origen=='ni') {
 include 'conexion2.php';
}
else{
   include 'conexion.php';

}

$con = conexion();


//echo $id_orden, $opcion;

if(isset($_FILES['file_array'])){

    //almacenamos las propiedades de las imagenes
    $name_array = $_FILES['file_array']['name'];
    $tmp_name_array = $_FILES['file_array']['tmp_name'];
    $type_array = $_FILES['file_array']['type'];
    $size_array = $_FILES['file_array']['size'];
    $error_array = $_FILES['file_array']['error'];

    //recorremos el array de imagenes para subirlas al simultaneo


    for($i = 0; $i < count($tmp_name_array); $i++){
              
              $string="esto es una prueba";

            $textcolor = imagecolorallocate($name_array[$i], 255, 0, 0); 
           // escribimos el texto en la parte superior-izquierda
            imagestring($name_array[$i], 5, 0, 0, 'esto es una prueba', $textcolor);

        if(move_uploaded_file($tmp_name_array[$i], "../artes_esa17/".$name_array[$i])){


           //$foto=$name_array[0];
           // $id=74;
            $estado=1;
            $evento="cargando";

            //guardamos en la base de datos el nombre
               $res= mysqli_query($con,"INSERT INTO foto_log (id_orden,foto,estado,evento) values ('".$id_orden."','".$name_array[$i]."','".$estado."','".$evento."')");



            //echo $o;
           

                
                
        }
      if($res==true){


    echo'<script type="text/javascript">
    alert("Documentos subidos correctamente");
    window.location.href="../fotos.php?id='.$id_orden.'";
    </script>';
      }
        else
        {
            //si ocurrio algun problema entonces
            //echo "move_uploaded_file function failed for ".$name_array[$i]."<br>";

            echo $id_orden, $estado, $evento;
        }

        
    }

    
}













?>