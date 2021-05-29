<?php 
include "../lib/constants.php";

if(isset($_GET["galeria"])){
    include "../db/functions/tattoos.php";
    $galeria = getAllTattoos();
    $categorias = getAllTattoosCategoria();
    $directorio = "tattoos";
} else if (isset($_GET["piercings"])){
    include "../db/functions/piercings.php";
    $galeria = getAllPiercings();
    $categorias = getAllPiercingsCategoria();
    $directorio = "piercings";
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/lib/css/header.css">
    <script src="/lib/js/header.js"></script>
    <link rel="stylesheet" href="/lib/css/galeria.css">
    <link rel="stylesheet" href="/lib/css/galeriaGrid.css">
    <script src="/src/views/js/functions.js"></script>
    <!-- footer css -->
    <link rel="stylesheet" href="lib/css/footer.css">
    <script>
        function filterSelecteds(){
            var arrayClases = document.getElementsByClassName("btn-categories");
            for (let index = 0; index < arrayClases.length; index++) {
                removerSelect(arrayClases[index], "selected");
            }
        }
        function removeSelectClass(clase, nombreClase){
            var arr1, arr2;
            arr1 = clase.className.split(" ");
            arr2 = nombreClase.split(" ");
            for (let index = 0; index < arr2.length; index++) {
            while (arr1.indexOf(arr2[index]) > -1) {
                arr1.splice(arr1.indexOf(arr2[index]), 1);     
            }
            }
            clase.className = arr1.join(" ");
        }
        function addSelectClass(id){
            filterSelecteds();
            document.getElementById(id).classList.add("selected");
        }
    </script>
</head>
<body>
    <header>
        <?php echo $header ?>
    </header>
    <main>
        <div class="btn-list-categories">
            <button id="all-categories" onclick="filtrarSeleccionados('all'); addSelectClass('all-categories');" class="btn-categories selected">Todas</button>
            <?php foreach($categorias as $categoria): ?>
            <button id="<?php echo $categoria['id'] ?>" class="btn-categories " onclick="filtrarSeleccionados(id+'categoria'); addSelectClass(id+'');"><?php echo $categoria['nombre'] ?></button>
            <?php endforeach; ?>
        </div>
        <article class="grid-Img">
            <?php foreach($galeria as $tattoo): ?>
            <div class="filterDiv <?php echo $tattoo['id_categoria']?>categoria show">
                <img src="imagenes/<?php echo $directorio ?>/<?php echo $tattoo['img'] ?>" alt="<?php echo $tattoo['etiqueta'] ?>">
            </div>
            <?php endforeach; ?>
        </article>
    </main>

    <!-- constant footer -->
    <?php echo $footer ?>
</body>
</html>