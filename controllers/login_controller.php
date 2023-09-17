<?php
// Archivo: login_controller.php

// Incluir el archivo de configuración de la base de datos
include('../includes/db.php');

// Comprobar si se envió el formulario de inicio de sesión
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recibir datos del formulario
    $email = $_POST['Email'];
    $password = $_POST['Password'];

    // Validar los datos (puedes agregar más validaciones)
    if (empty($email) || empty($password)) {
        $error = "Por favor, complete todos los campos.";
    } else {
        // Buscar el usuario por su dirección de correo electrónico en la base de datos
        $sql = "SELECT id, name, password FROM users WHERE email = ?";
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            // Usuario encontrado, verificar la contraseña
            $row = $result->fetch_assoc();
            $hashedPassword = $row['password'];

            if (password_verify($password, $hashedPassword)) {
                // Contraseña válida, iniciar sesión y redirigir al usuario
                session_start();
                $_SESSION['isLoggedIn'] = true; // Establecer la variable de sesión
                $_SESSION['user_id'] = $row['id'];
                $_SESSION['user_name'] = $row['name'];
                header("Location: ../views/info.php");
                exit(); // Agrega exit() aquí
            } else {
                // Contraseña incorrecta
                $error = "Contraseña incorrecta. Intente nuevamente.";
            }
        } else {
            // Usuario no encontrado
            $error = "No se encontró ningún usuario con ese correo electrónico.";
        }

        // Cerrar la conexión a la base de datos
        $stmt->close();
    }
}

// Resto de tu código HTML y formularios...
