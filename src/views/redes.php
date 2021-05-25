<?php
require "../../db/functions/redes.php";
require "../../db/functions/artistas.php";

include "../../lib/constants.php";

session_start();
if(!isset($_SESSION['user'])){
    header("Location: /login");
}

$redes = getAllRedes();
$artistas = getAllArtistas();
$nombreRedes = getAllNombreRedes();


if(isset($_POST["submit"])){
    añadirRedes($_POST["red"], $_POST["artistas"], $_POST["red_url"]);
}
if (isset($_POST["guardar"])) {
    var_dump($_POST["id"]);
    modificarRed($_POST["id"], $_POST["edited-url-save"]);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Redes</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="js/functions.js"></script>
    <!-- header -->
    <link rel="stylesheet" href="/lib/css/header.css">
    <script src="/lib/js/header.js"></script>
    <!-- footer css -->
    <link rel="stylesheet" href="/lib/css/footer.css">


    <script>
        function eliminarRed(id){
            var red = document.getElementById("id_"+id);
            red.style.display = "none";
            //red.parentChild().removeChild(red);
        }
        //funcion para modificar red
        //que me cambie el tag a un input con la red actual y muestre un boton de guardar.

    </script>
</head>
<body>
    <header>
        <?php echo $header ?>
    </header>
    <!-- TODO: intentar quitar añadir  -->
    <?php if(isset($_GET["añadir"])): ?>
        <form method="POST">
            <a href="../../../admin" class="btn-back">atras</a>
            <h1>Añadir red</h1>
            <select name="red" id="red">
                <?php foreach($nombreRedes as $red): ?>
                    <option value="<?php echo $red['id'] ?>"><?php echo $red['nombre'] ?></option>
                <?php endforeach ?>
            </select>
            <select name="artistas" id="artistas">
                <?php foreach($artistas as $artista): ?>
                    <option value="<?php echo $artista['id'] ?>"><?php echo $artista['nombre'] ?></option>
                <?php endforeach ?>
            </select>
            <input type="text" name="red_url" placeholder="url">
            <input type="submit" name="submit" value="AÑADIR">
        </form>
    <?php elseif(isset($_GET["modificarred"])): ?>
        <form method="post">
            <div class="admin-nav">
                <a href="../../../admin"><button class="btn-back" type="button">atras</button></a>
                <h1>Modificar red</h1>
            </div>
            <select name="artistas" id="artistas" onclick="filtrarSeleccionados(value+'categoria')">
                <?php foreach($artistas as $artista): ?>
                    <option value="<?php echo $artista['id'] ?>"><?php echo $artista['nombre'] ?></option>
                <?php endforeach ?>
            </select>
            <?php foreach($redes as $red): ?>
            <div id="<?php echo "id_".$red['id'] ?>" class="filterDiv <?php echo $red['id_artista']?>categoria show">
                <div class="block" onclick="desplegable(<?php echo $red['id'] ?>)">
                    <h2><?php echo $red['id_red'] ?></h2>
                    <button type="button" class="eliminarbtn" onclick="eliminarRed(<?php echo $red['id'] ?>)">eliminar</button>
                </div>
                <div class="desplegable" id="desp_<?php echo $red['id'] ?>">
                    <!-- TODO: event change -->
                    <input type="hidden" name="id" value="<?php echo $red["id"] ?>">
                    <h3>Url: <input type="text" name="edited-url-save" class="contenidoEditable" value="<?php echo $red['url_red'] ?>" ></h3>
                    <input type="submit" name="guardar" class="btn-edit-save" value="guardar">
                </div>
            </div>
            <?php endforeach ?>
            <button type="button" id="btn-add" onclick="addFrame()">añadir red</button>
            <div class="frame-add" id="add-frame">
                <h3>Red Social</h3>
                <select name="red" id="red">
                    <?php foreach($nombreRedes as $red): ?>
                        <option value="<?php echo $red['id'] ?>"><?php echo $red['nombre'] ?></option>
                    <?php endforeach ?>
                </select>
                <h3>Artista</h3>
                <select name="artistas" id="artistas">
                    <?php foreach($artistas as $artista): ?>
                        <option value="<?php echo $artista['id'] ?>"><?php echo $artista['nombre'] ?></option>
                    <?php endforeach ?>
                </select>
                <h3>Enlace url</h3>
                <input type="text" name="red_url" placeholder="url">
                <input type="submit" name="submit" value="AÑADIR">
            </div>
        </form>
    <?php endif ?>
    <?php echo $footer ?>
</body>
<script>
</script>
</html>