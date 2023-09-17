<?php
include('../controllers/info_controller.php');
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
                    <a class="dropdown-item" href="#">
                        <img src="../img/person-circle.svg" alt="Person Circle Icon"> My Profile
                    </a>
                    <a class="dropdown-item" href="#">
                        <img src="../img/people-fill.svg" alt="People Fill Icon"> Group Chat
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="../controllers/logout_controller.php">
                        <img src="../img/box-arrow-right.svg" alt="Box Arrow Right Icon"> Logout
                    </a>

                </div>
            </li>
        </ul>
    </nav>


    <div class="container mt-5">
        <div class="contain">
            <h2>Personal Info</h2>
            <p>Basic info, like your name and photo</p>
        </div>
        <table class="table custom-table">
            <thead>
                <tr class="flex-tr">
                    <td class="flex-td">
                        <h3 class="profile-title">Profile</h3>
                        <p class="profile-info">Some info may be visible to other people</p>
                    </td>
                    <td class="flex">
                        <a href="./edit.php" class="btn-custon">
                            <button type="button">Edit</button>
                        </a>
                    </td>
                </tr>
            </thead>
            <tbody>
                <tr class="table">
                    <th scope="row" class="align-center title">PHOTO</th>
                    <td class="align-center"><img style="width: 70px;" src="<?php echo $user_photo; ?>" alt="" class="img-fluid"></td>
                </tr>

                <tr class="table">
                    <th scope="row" class="align-center title">NAME</th>
                    <td class="align-center"><?php echo $user_name; ?></td>
                </tr>
                <tr class="table">
                    <th scope="row" class="align-center title">BIO</th>
                    <td class="align-center"><?php echo $user_bio; ?></td>
                </tr>
                <tr class="table">
                    <th scope="row" class="align-center title">PHONE</th>
                    <td class="align-center"><?php echo $user_phone; ?></td>
                </tr>
                <tr class="table">
                    <th scope="row" class="align-center title">EMAIL</th>
                    <td class="align-center"><?php echo $user_email; ?></td>
                </tr>
                <tr class="table">
                    <th scope="row" class="align-center title">PASSWORD</th>
                    <td class="align-center">******</td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- Agrega los scripts de Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>