<?php
function conexion() {
    $host = "localhost";
    $database = "esa22";  // Assuming 'esa' + '22' is the database name
    $username = "root";
    $password = "";
    $conn = new mysqli($host, $username, $password, $database);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    return $conn;
}

function conexion2() {
    $host = "localhost";
    $database = "nica22";  // Assuming 'nica' + '22' is the database name
    $username = "root";
    $password = "";
    $conn = new mysqli($host, $username, $password, $database);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    return $conn;
}