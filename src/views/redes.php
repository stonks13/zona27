<?php
require "../../db/functions/redes.php";
require "../../db/functions/artistas.php";

$redes = getAllRedes();
$artistas = getAllArtistas();
$nombreRedes = getAllNombreRedes();


if(isset($_POST["submit"])){
    añadirRedes($_POST["red"], $_POST["artistas"], $_POST["red_url"]);
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
    <?php if(isset($_GET["añadir"])): ?>
        <form method="POST">
            <a href="../../../admin">atras</a>
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
            <h1>Modificar red</h1>
            <a href="../../../admin">atras</a>
            <select name="artistas" id="artistas" onchange="filtrarSeleccionados('categoria'+value+'')">
                <?php foreach($artistas as $artista): ?>
                    <option value="<?php echo $artista['id'] ?>"><?php echo $artista['nombre'] ?></option>
                <?php endforeach ?>
            </select>
            <?php foreach($redes as $red): ?>
            <div id="<?php echo "id_".$red['id'] ?>" class="filterDiv categoria<?php echo $red['id_artista']?>" onclick="desplegable(<?php echo $red['id'] ?>)">
                <h2><?php echo $red['id_red'] ?></h2>
                <div class="desplegable a s" id="desp_<?php echo $red['id'] ?>">
                    <p><?php echo $red['url_red'] ?></p>
                    <button onclick="eliminarRed(<?php echo $red['id'] ?>)">eliminar</button>
                </div>
            </div>
            <?php endforeach ?>

        </form>
    <?php endif ?>
</body>
<script>
    filtrarSeleccionados("all");
</script>
</html>