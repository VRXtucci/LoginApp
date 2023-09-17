<?php
session_start(); // Iniciar la sesión

// Verificar si existe un mensaje de éxito en la sesión
if (isset($_SESSION['success_message'])) {
    echo '<div class="alert alert-success">' . $_SESSION['success_message'] . '</div>';

    // Eliminar la variable de sesión para que no se muestre nuevamente
    unset($_SESSION['success_message']);
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Devchallenges</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/styles.css"> <!-- Agregamos el enlace a nuestro archivo styles.css -->
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light navbar-custom">
        <!-- Logo o imagen a la izquierda -->
        <a class="navbar-brand" href="#">
            <img src="../img/devchallenges.svg" alt="Logo" width="135" height="18" class="d-inline-block align-top">
        </a>

        <!-- Menú desplegable -->
        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
                <!-- Elemento con el nombre de la persona y la flecha hacia abajo -->
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img src="../img/person-circle.svg" alt="Person Circle Icon"> Nombre de la Persona
                </a>
                <!-- Contenido del menú desplegable -->
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <!-- Elementos dentro del menú desplegable -->
                    <a class="dropdown-item menu" href="./info.php">
                        <img src="../img/person-circle.svg" alt="Person Circle Icon"><span> My Profile</span>
                    </a>
                    <a class="dropdown-item menu" href="#">
                        <img src="../img/people-fill.svg" alt="People Fill Icon"><span> Group Chat</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="../controllers/logout_controller.php">
                        <img src="../img/box-arrow-right.svg" alt="Box Arrow Right Icon"> Logout
                    </a>
                </div>
            </li>
        </ul>
    </nav>
    <form action="../controllers/edit_controller.php" method="POST" enctype="multipart/form-data">
        <div class="container mt-5">
            <div class="row">
                <div class="Btn-Custom" action="/info.php">
                    <a href="./info.php">◄ Back</a>
                </div>
            </div>
            <table class="table custom-table">
                <thead>
                    <tr>
                        <th colspan="2" class="">
                            <h3 class="profile-title">Change Info</h3>
                            <p class="profile-info infos">Changes will be reflected to every services</p>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row" class="align-middle titles">PHOTO</th>
                        <td>
                            <a href="./imagenes.php">Upload image</a>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row" class="align-middle titles">NAME</th>
                        <td>
                            <input required type="text" name="Name" class="form-control" placeholder="Enter your name...">
                        </td>
                    </tr>
                    <tr>
                        <th scope="row" class="align-middle titles">BIO</th>
                        <td>
                            <textarea class="form-control" name="Bio" placeholder="Enter your bio..." rows="4"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row" class="align-middle titles">PHONE</th>
                        <td>
                            <input type="number" min="0" name="Phone" class="form-control" placeholder="Enter your phone...">
                        </td>
                    </tr>

                    <tr>
                        <th scope="row" class="align-middle titles">EMAIL</th>
                        <td>
                            <input type="text" name="NewEmail" class="form-control" placeholder="Enter your new email...">
                        </td>
                    </tr>
                    <tr>
                        <th scope="row" class="align-middle titles">PASSWORD</th>
                        <td>
                            <input type="password" name="NewPassword" class="form-control" placeholder="Enter your new password">
                        </td>
                    </tr>

                    <tr>
                        <td colspan="2" class="btn-custon">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>
    </form>
    <!-- Agrega los scripts de Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>