<?php 
require "login.php";
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
    <link rel="stylesheet" href="admin.css">
</head>
<body>
    <!-- header -->
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
    <!-- footer -->
</body>
</html>