<?php
$nombre = $_POST["nom"];


    $host="localhost";

    $database="esa20";

    $username="admin";  

    $password="AG784512";
//$nombres=1;
    $mysqli = new mysqli($host, $username, $password, $database);
    if ($mysqli->connect_errno) {
        echo "No se puede conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }
    $mysqli = new mysqli($host, $username, $password, $database);

     $pop =$mysqli->query(" select*from pop where id_orden='".$nombre."'");
                        while ($row1 = mysqli_fetch_array($pop))
                                   {   
                                       $empresa=$row1[2];
                                 
                                    }


 echo $empresa;


?>