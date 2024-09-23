<?php
session_start();

// Finaliza la sesión actual
session_unset(); // Libera todas las variables de sesión
session_destroy(); // Destruye la sesión

// Redirige al usuario a la página de inicio
$homepage = '/sistema2024/';
$redirectUrl = 'http://' . $_SERVER['HTTP_HOST'] . $homepage;

header('Location: ' . $redirectUrl);
exit; // Asegura que el script se detenga después de la redirección
?>
