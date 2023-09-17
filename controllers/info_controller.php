<?php
session_start(); // Iniciar la sesión

if (!isset($_SESSION['isLoggedIn']) || $_SESSION['isLoggedIn'] !== true) {
    header("Location: Login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

include('../includes/db.php');

$sql = "SELECT name, email, bio, phone, password, Photo FROM users WHERE id = ?";
$stmt = $mysqli->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$stmt->bind_result($user_name, $user_email, $user_bio, $user_phone, $user_password, $user_photo);

$stmt->fetch();

$stmt->close();
?>

<!-- Resto de tu código HTML -->

<!-- Agrega el src a la imagen con la ubicación de la imagen de perfil -->
<!-- <td class="align-center"><img src="<?php echo $user_photo; ?>" alt="" class="img-fluid"></td> -->
