<?php
require "../../db/functions/piercings.php";
include("../../lib/subirFicheros.php");
require "../../db/functions/artistas.php";

$piercings = getAllPiercings();
$artistas = getAllArtistas();
$categoriasPiercings = getAllPiercingsCategoria();


if(isset($_POST["submit"])){
    
    $rutaFinal = guardarImagen("piercings");
    if($rutaFinal == "1"){
        $mensajeError = "Fallo al subir la imagen";
    } else if($rutaFinal == "2"){
        $mensajeError = "Seleccioné un archivo";
    } else {
        //$img, $titulo, $etiqueta, $id_categoria, $id_artista
        añadirPiercings($rutaFinal, $_POST["nombre"], $_POST["etiqueta"], $_POST["categoria"], $_POST["artistas"]);
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
    <title>piercings</title>
</head>
<body>
    <?php if(isset($_GET["añadir"])): ?>
        <h1>Añadir piercing</h1>
        <form method="POST" enctype="multipart/form-data">
            <input type="file" name="image" placeholder="Foto del Piercing">
            <input type="text" name="nombre" placeholder="Titulo Piercing">
            <input type="text" name="descripcion" placeholder="Descripcion Piercing">
            <input type="text" name="etiqueta" placeholder="tags">
            <select name="categoria" id="categoria">
                <?php foreach($categoriasPiercings as $catPiercing): ?>
                    <option value="<?php echo $catPiercing['id'] ?>"><?php echo $catPiercing['nombre'] ?></option>
                <?php endforeach ?>
            </select>
            <select name="artistas" id="artistas">
                <?php foreach($artistas as $artista): ?>
                    <option value="<?php echo $artista['id'] ?>"><?php echo $artista['nombre'] ?></option>
                <?php endforeach ?>
            </select>
            <input type="submit" name="submit" value="Añadir">
        </form>
    <?php elseif(isset($_GET["modificarpiercing"])): ?>
        <h1>Modificar piercings</h1>
        <?php foreach($piercings as $piercing): ?>
            <h3><?php echo $piercing['titulo'] ?></h3>
            <img src="/imagenes/piercings/<?php echo $piercing['img'] ?>" alt="" style="width: 100px; height: 100px">
            <p><?php echo $piercing['descripcion'] ?>.</p>
        <?php endforeach ?>
    <?php endif ?>
</body>
</html>