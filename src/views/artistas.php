<?php
require "../../db/functions/artistas.php";
include("../../lib/subirFicheros.php");

$artistas = getAllArtistas();


if(isset($_POST["submit"])){
    
    $rutaFinal = guardarImagen("artistas");
    if($rutaFinal == "1"){
        $mensajeError = "Fallo al subir la imagen";
    } else if($rutaFinal == "2"){
        $mensajeError = "Seleccioné un archivo";
    } else {
        añadirArtista($_POST["nombre"], $_POST["descripcion"], $rutaFinal);
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
    <title>Artistas</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="js/functions.js"></script>
</head>
<body>
    <?php if(isset($_GET["añadir"])): ?>
        <h1>Añadir Artista</h1>
        <form method="POST" enctype="multipart/form-data">
            <input type="text" name="nombre" placeholder="Nombre Artista">
            <input type="text" name="descripcion" placeholder="Descripcion">
            <input type="file" id="file" onchange="fileSelector(this)" name="image">
            <label for="file"><span class="uploadIcon">&#8679;</span><span id="spanFileName"> Selecciona una imagen...</span></label>
            <input type="submit" name="submit" value="Añadir">
        </form>
    <?php elseif(isset($_GET["modificarartista"])): ?>
        <h1>Modificar red</h1>
        <?php foreach($artistas as $artista): ?>
            <h3><?php echo $artista['nombre'] ?></h3>
            <img src="/imagenes/artistas/<?php echo $artista['img'] ?>" alt="" style="width: 100px; height: 100px">
            <p><?php echo $artista['descripcion'] ?></p>
        <?php endforeach ?>
    <?php endif ?>
</body>
</html>