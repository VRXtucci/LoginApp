<?php
// Incluir el archivo de configuración de la base de datos
include('../includes/db.php');

// Comprobar si se envió el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recibir datos del formulario
    $name = $_POST['Name'];
    $email = $_POST['Email'];
    $password = $_POST['Password'];

    // Validar los datos (puedes agregar más validaciones)
    if (empty($name) || empty($email) || empty($password)) {
        $error = "Por favor, complete todos los campos.";
    } else {
        // Verificar si el correo ya existe en la base de datos
        $checkSql = "SELECT email FROM users WHERE email = ?";
        $checkStmt = $mysqli->prepare($checkSql);
        $checkStmt->bind_param("s", $email);
        $checkStmt->execute();
        $checkStmt->store_result();

        if ($checkStmt->num_rows > 0) {
            // El correo ya existe en la base de datos, muestra un mensaje de error
            $error = "El correo electrónico ya está en uso. Por favor, use otro correo.";
        } else {
            // Encriptar la contraseña
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            // Insertar datos en la base de datos, almacenando $hashedPassword en lugar de la contraseña en texto plano
            $sql = "INSERT INTO users (name, email, password) VALUES (?, ?, ?)";
            $stmt = $mysqli->prepare($sql);
            $stmt->bind_param("sss", $name, $email, $hashedPassword);

            if ($stmt->execute() === TRUE) {
                header("Location: ../views/info.php");
                exit();
            } else {
                // Manejar errores de inserción (por ejemplo, correo duplicado)
                $error = "Error al registrar el correo electrónico. Intente nuevamente.";
            }

            // Cerrar la conexión a la base de datos
            $stmt->close();
        }

        // Cerrar la consulta de verificación
        $checkStmt->close();
    }
}

// Resto de tu código HTML y formularios...
?>
