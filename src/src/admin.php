<?php 
//require "login.php";
include "../lib/constants.php";

session_start();

if (isset($_POST['logout'])) {
    session_destroy();
    header("Location: /login");
}
if(!isset($_SESSION['user'])){
    header("Location: /login");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrador</title>
    <link rel="stylesheet" href="/lib/css/header.css">
    <script src="/lib/js/header.js"></script>
    <link rel="stylesheet" href="src/admin.css">
    <!-- footer css -->
    <link rel="stylesheet" href="/lib/css/footer.css">
</head>
<body>
    <!-- header -->
    <header>
        <?php echo $header ?>
    </header>
    <div class="administracionLista">
        <form method="POST">
            <div>
                <input type="submit" name="logout" class="btn-back" value="Log out">
                <h1>Administracion</h1>
            </div>
            <a href="/src/views/modificarartista">Ir a Artista</a>
            <a href="/src/views/modificarred">Ir a Redes</a>
            <a href="/src/views/modificartattoo">Ir a Tattoos</a>
            <a href="/src/views/modificarpiercing">Ir a Piercings</a>
        </form>
        
    </div>
    <!-- constant footer -->
    <?php echo $footer ?>
</body>
</html>