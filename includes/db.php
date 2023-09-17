<?php
// Archivo: db.php

$servername = "localhost";
$username = "root";
$password_db = "";
$dbname = "login_db"; // Reemplaza con el nombre correcto de tu base de datos

$mysqli = new mysqli($servername, $username, $password_db, $dbname);

if ($mysqli->connect_error) {
    die("Conexión a la base de datos fallida: " . $mysqli->connect_error);
}

?>
