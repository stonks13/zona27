<?php
require "../../db/functions/tattoos.php";
include("../../lib/subirFicheros.php");
require "../../db/functions/artistas.php";

session_start();
if(!isset($_SESSION['user'])){
    header("Location: /login");
}

$tattoos = getAllTattoos();
$artistas = getAllArtistas();
$categoriasTattoos = getAllTattoosCategoria();


if(isset($_POST["submit"])){
    
    $rutaFinal = guardarImagen("tattoos");
    if($rutaFinal == "1"){
        $mensajeError = "Fallo al subir la imagen";
    } else if($rutaFinal == "2"){
        $mensajeError = "Seleccioné un archivo";
    } else {
        //$img, $titulo, $etiqueta, $id_categoria, $id_artista
        añadirTattoo($rutaFinal, $_POST["nombre"], $_POST["etiqueta"], $_POST["categoria"], $_POST["artistas"]);
    }
    //aa($image);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>tattoos</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="js/functions.js"></script>
</head>
<body>
    <?php if(isset($_GET["añadir"])): ?>
        <h1>Añadir tattoo</h1>
        <form method="POST" enctype="multipart/form-data">
            <input type="text" name="nombre" placeholder="Titulo Tattoo">
            <input type="text" name="etiqueta" placeholder="tags">
            <select name="categoria" id="categoria">
                <?php foreach($categoriasTattoos as $catTattoo): ?>
                    <option value="<?php echo $catTattoo['id'] ?>"><?php echo $catTattoo['nombre'] ?></option>
                <?php endforeach ?>
            </select>
            <select name="artistas" id="artistas">
                <?php foreach($artistas as $artista): ?>
                    <option value="<?php echo $artista['id'] ?>"><?php echo $artista['nombre'] ?></option>
                <?php endforeach ?>
            </select>
            <input type="file" id="file" onchange="fileSelector(this)" name="image">
            <label for="file"><span class="uploadIcon">&#8679;</span><span id="spanFileName"> Selecciona una imagen...</span></label>
            <input type="submit" name="submit" value="Añadir">
        </form>
    <?php elseif(isset($_GET["modificartattoo"])): ?>
        <h1>Modificar Tattoos</h1>
        <?php foreach($tattoos as $tattoo): ?>
            <h3><?php echo $tattoo['titulo'] ?></h3>
            <img src="/imagenes/tattoos/<?php echo $tattoo['img'] ?>" alt="" style="width: 100px; height: 100px">
            <p><?php echo $tattoo['descripcion'] ?>.</p>
        <?php endforeach ?>
    <?php endif ?>
</body>
</html>