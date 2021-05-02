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
        <h1>Añadir red</h1>
        <form method="POST">
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
            <input type="submit" name="submit" value="Añadir">
        </form>
    <?php elseif(isset($_GET["modificarred"])): ?>
        <h1>Modificar red</h1>
        <?php foreach($redes as $red): ?>
        <div id="<?php echo "id_".$red['id'] ?>">
            <h2><?php echo $red['id_red'] ?></h2>
            <p><?php echo $red['url_red'] ?></p>
            <button onclick="eliminarRed(<?php echo $red['id'] ?>)">eliminar</button>
        </div>
        <?php endforeach ?>
    <?php endif ?>
</body>
</html>