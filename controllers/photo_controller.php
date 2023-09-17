<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start(); // Iniciar la sesión

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    require_once $_SERVER["DOCUMENT_ROOT"] . "../includes/db.php";

    // Verificar si el usuario está autenticado y obtener su ID de usuario
    if (isset($_SESSION['user_id'])) {
        $user_id = $_SESSION['user_id'];

        $type = $_FILES["image"]["type"];

        if (strpos($type, "image") !== false) {
            $tmp_location = $_FILES["image"]["tmp_name"];
            $fn_location_db = "/img/Users/" . $_FILES["image"]["name"]; // La ubicación en la base de datos
            $fn_location = $_SERVER["DOCUMENT_ROOT"] . $fn_location_db; // La ubicación final en el servidor


            try {
                if (move_uploaded_file($tmp_location, $fn_location)) {
                    $stmt = $mysqli->prepare("UPDATE users SET Photo = ? WHERE ID = ?");
                    $stmt->bind_param("si", $fn_location_db, $user_id);
                
                    if ($stmt->execute()) {
                        $_SESSION['success_message'] = "Imagen subida con éxito.";
                        header("Location: ../views/info.php"); // Redirigir al usuario a info.php
                        exit(); // Asegurarse de que el script se detenga después de la redirección
                    } else {
                        $_SESSION['error_message'] = "Error al insertar la ubicación de la imagen en la base de datos: " . $mysqli->error;
                    }
                
                    $stmt->close();
                } else {
                    $_SESSION['error_message'] = "Error al cargar la imagen. Solo puedes subir imágenes.";
                }
            } catch (Exception $e) {
                $_SESSION['error_message'] = "Error: " . $e->getMessage();
            }
        } else {
            $_SESSION['error_message'] = "Error al cargar la imagen. Solo puedes subir imágenes.";
        }
    } else {
        $_SESSION['error_message'] = "No estás autenticado. Inicia sesión para editar tu perfil.";
    }
}

// Resto del código HTML y manejo de sesiones
