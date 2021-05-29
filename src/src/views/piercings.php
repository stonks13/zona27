<?php
require "../../db/functions/piercings.php";
//include("../../lib/subirFicheros.php");
require "../../db/functions/artistas.php";

include "../../lib/constants.php";

session_start();
if(!isset($_SESSION['user'])){
    header("Location: /login");
}

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
        header("Refresh:0");
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
    <title>Piercings</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="js/functions.js"></script>
    <!-- header -->
    <link rel="stylesheet" href="/lib/css/header.css">
    <script src="/lib/js/header.js"></script>
    <!-- footer css -->
    <link rel="stylesheet" href="/lib/css/footer.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

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
    <?php if(isset($_GET["modificarpiercing"])): ?>
        <form method="post" enctype="multipart/form-data">
            <div class="admin-nav">
                <a href="../../../admin"><button class="btn-back" type="button">atras</button></a>
                <h1>Piercings</h1>
            </div>
            <select name="artistas" id="artistas" onclick="filtrarSeleccionados(value+'categoria')">
                <?php foreach($artistas as $artista): ?>
                    <option value="<?php echo $artista['id'] ?>"><?php echo $artista['nombre'] ?></option>
                <?php endforeach ?>
            </select>
            <?php foreach($piercings as $piercing): ?>
            <div id="<?php echo "id_".$piercing['id'] ?>" class="filterDiv <?php echo $piercing['id_artista']?>categoria show">
                <div class="block" onclick="desplegable(<?php echo $piercing['id'] ?>)">
                    <h2><?php echo $piercing['titulo'] ?></h2>
                    <button type="button" class="eliminarbtn" onclick="deleteFunc(<?php echo $piercing['id'] ?>)">eliminar</button>
                </div>
                <div class="desplegable" id="desp_<?php echo $piercing['id'] ?>">
                    <!-- TODO: event change -->
                    <input type="hidden" name="id" value="<?php echo $piercing["id"] ?>">
                    <input type="hidden" id="imgname" value="<?php echo $piercing["img"] ?>">
                    <h3>Titulo: <input type="text" id="edited-title-save<?php echo $piercing['id'] ?>" class="contenidoEditable" value="<?php echo $piercing['titulo'] ?>" ></h3>
                    <h3>Etiqueta: <input type="text" id="edited-alttxt-save<?php echo $piercing['id'] ?>" class="contenidoEditable" value="<?php echo $piercing['etiqueta'] ?>" ></h3>
                    <button type="button" class="btn-edit-save" onclick="modifyFunc(<?php echo $piercing['id'] ?>)">guardar</button>
                </div>
            </div>
            <?php endforeach ?>
            <button type="button" id="btn-add" onclick="addFrame()">añadir red</button>
            <div class="frame-add" id="add-frame">
                <h3>Titulo Piercing</h3>
                <input type="text" name="nombre" placeholder="Titulo Piercing">
                <h3>Etiqueta</h3>
                <input type="text" name="etiqueta" placeholder="tags">
                <h3>Categoria Piercing</h3>
                <select name="categoria" id="categoria">
                    <?php foreach($categoriasPiercings as $catPiercing): ?>
                        <option value="<?php echo $catPiercing['id'] ?>"><?php echo $catPiercing['nombre'] ?></option>
                    <?php endforeach ?>
                </select>
                <h3>Artista</h3>
                <select name="artistas" id="artistas">
                    <?php foreach($artistas as $artista): ?>
                        <option value="<?php echo $artista['id'] ?>"><?php echo $artista['nombre'] ?></option>
                    <?php endforeach ?>
                </select>
                <h3>Imagen</h3>
                <input type="file" id="file" onchange="fileSelector(this)" name="image">
                <label for="file"><span class="uploadIcon">&#8679;</span><span id="spanFileName"> Selecciona una imagen...</span></label>
                <input type="submit" name="submit" value="AÑADIR">
            </div>
        </form>
    <?php endif ?>
    <?php echo $footer ?>
</body>
<script>
function deleteFunc(id){
    var imgname = document.getElementById("imgname").value;
    console.log(imgname);
    $.ajax({
        url: '/db/functions/piercings.php',
        type: 'post',
        data: { "deletefunction": id, "delete-img": imgname},
        success: function(response) { console.log(response); }
    });
    var red = document.getElementById("id_"+id);
    red.style.display = "none";

}
function modifyFunc(id){
    var title = document.getElementById("edited-title-save"+id).value;
    var etiqueta = document.getElementById("edited-alttxt-save"+id).value;
    $.ajax({
        url: '/db/functions/piercings.php',
        type: 'post',
        data: { "updatefunction": id, "modify-title": title, "modify-tag": etiqueta },
        success: function(response) { console.log(response); }
    });

}

</script>
</html>