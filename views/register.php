<?php include('../controllers/register_controller.php'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Devchallenges</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/styles.css"> <!-- Enlace a styles.css -->
</head>

<body>
    <div class="container">
        <div class="">
            <div class="col-md-7 login-container"> <!-- Aplicamos los estilos al contenedor -->
                <img src="../img/devchallenges.svg" alt="Logo">
                <h2 class="">Join thousands of learners from around the world</h2>
                <p>
                    Master web development by making real-life projects. There are multiple paths for you to choose
                </p>
                
                <!-- Agrega la sección para mostrar mensajes de error aquí -->
                <?php if (!empty($error)) { ?>
                    <div class="alert alert-danger">
                        <?php echo $error; ?>
                    </div>
                <?php } ?>
                
                <form method="post">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Name" name="Name" required>
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control" placeholder="Email" name="Email" required>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" placeholder="Password" name="Password" required>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Start coding now</button>
                </form>
                
                <span>or continue with these social profiles</span>
                <div class="mt-3 redes">
                    <img style="cursor: pointer;" src="../img/Google.svg" alt="Google">
                    <img style="cursor: pointer;" src="../img/Facebook.svg" alt="Facebook">
                    <img style="cursor: pointer;" src="../img/Twitter.svg" alt="Twitter">
                    <img style="cursor: pointer;" src="../img/Github.svg" alt="Github">
                </div>
                <strong>Already a member? <a href="./Login.php">Login</a></strong>
            </div>
        </div>
    </div>
</body>

</html>
