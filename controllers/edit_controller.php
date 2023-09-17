<?php
session_start(); // Iniciar la sesión

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recupera los datos del formulario
    $bio = $_POST['Bio'];
    $phone = $_POST['Phone'];
    $name = $_POST['Name'];
    $email = isset($_POST['NewEmail']) ? $_POST['NewEmail'] : '';
    $password = $_POST['NewPassword'];

    // Verificar si los campos obligatorios no están en blanco
    if (empty($name)) {
        $_SESSION['error_message'] = "El campo 'Name' no puede estar en blanco.";
    } else {
        // Actualiza la base de datos con los nuevos datos (debes configurar tu conexión a la base de datos aquí)
        $conn = new mysqli("localhost", "root", "", "login_db");
        if ($conn->connect_error) {
            die("Conexión fallida: " . $conn->connect_error);
        }

        // Preparar consulta SQL para actualizar los campos
        $updateSQL = "UPDATE users SET Name = ?, Bio = ?, Phone = ?, Email = ?";

        // Si se proporciona una nueva contraseña, también actualiza la contraseña
        if (!empty($password)) {
            // Hash de la nueva contraseña
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            $updateSQL .= ", Password = ?";
        }

        $updateSQL .= " WHERE id = ?";
        
        $stmt = $conn->prepare($updateSQL);

        if (!empty($password)) {
            $stmt->bind_param("sssssi", $name, $bio, $phone, $email, $hashedPassword, $_SESSION['user_id']);
        } else {
            $stmt->bind_param("ssssi", $name, $bio, $phone, $email, $_SESSION['user_id']);
        }

        if ($stmt->execute()) {
            $_SESSION['success_message'] = "Información actualizada con éxito.";
        } else {
            $_SESSION['error_message'] = "Error al actualizar la información: " . $stmt->error;
        }

        $stmt->close();

        // Manejo de la carga de la imagen
        if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
            $targetDir = '../img/Users';
            $targetFile = $targetDir . basename($_FILES['image']['name']);

            if (move_uploaded_file($_FILES['image']['tmp_name'], $targetFile)) {
                // Actualización exitosa de la imagen
                $_SESSION['success_message'] = "Imagen actualizada con éxito.";
            } else {
                $_SESSION['error_message'] = "Error al actualizar la imagen.";
            }
        }

        $conn->close();
    }

    // Redirigir de vuelta a la página anterior
    header("Location: ../views/edit.php");
    exit();
}

// Resto del código para mostrar el formulario de edición y manejar otras operaciones
?>
