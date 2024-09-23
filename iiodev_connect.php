<?php
// Display errors for debugging purposes (disable in production)
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

// Start the session if it's not already started
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Retrieve the session variables
$base = $_SESSION['base'];
$year = $_SESSION['year'];

// Function to establish a database connection
function conexion($base, $year) {
    // Database credentials
    $host = 'localhost';
    $username = 'admin';
    $password = 'AG784512';
    $dbname = $base . $year; // Concatenate base and year for the database name

    // Create the connection
    $con = mysqli_connect($host, $username, $password, $dbname);

    // Check the connection
    if (!$con) {
        die('Could not connect: ' . mysqli_connect_error());
    }

    return $con;
}

// Optional: Close the connection after use
function close_connection($con) {
    mysqli_close($con);
}

// Usage example
$conexion = conexion($base, $year);
?>
