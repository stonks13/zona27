<?php 
//require "login.php";
include "../lib/constants.php";

session_start();
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
        <h1>Añadir</h1>
        <ul>

            <li><a href="/src/views/añadirartista">Añadir Artista</a></li>
            <li><a href="/src/views/añadirred">Añadir Redes</a></li>
            <li><a href="/src/views/añadirtattoo">Añadir Tattoos</a></li>
            <li><a href="/src/views/añadirpiercing">Añadir Piercings</a></li>
        </ul>
        <h1>Modificar</h1>
        <ul>
            
            <li><a href="/src/views/modificarartista">Modificar Artista</a></li>
            <li><a href="/src/views/modificarred">Modificar Redes</a></li>
            <li><a href="/src/views/modificartattoo">Modificar Tattoos</a></li>
            <li><a href="/src/views/modificarpiercing">Modificar Piercings</a></li>
        </ul>
    </div>
    <!-- constant footer -->
    <?php echo $footer ?>
</body>
</html>