<?php
// Iniciar la sesión si aún no está iniciada
session_start();

// Destruir todas las variables de sesión
$_SESSION = array();

// Destruir la sesión
session_destroy();

// Redirigir al usuario a la página de inicio de sesión (login.php en este caso)
header("Location: ../views/login.php");
exit();
?>
