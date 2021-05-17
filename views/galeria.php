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
    <!-- footer css -->
    <link rel="stylesheet" href="lib/css/footer.css">
</head>
<body>
    <header>
        <?php echo $header ?>
    </header>
    <main>
        <div class="btn-list-categories">
            <button>Todas</button>
            <?php foreach($categorias as $categoria): ?>
            <button></button>
            <?php endforeach; ?>
            <button class="selected">Manga</button>
            <button>Realismo</button>
            <button>Black Work</button>
            <button>Manga</button>
            <button>Realismo</button>
            <button>Black Work</button>
        </div>
        <article class="grid-Img">
            <div>
                <img src="imagenes/1.jpg" alt="">
            </div>
            <div>
                <img src="imagenes/1.jpg" alt="">
            </div>
            <div>
                <img src="imagenes/1.jpg" alt="">
            </div>
            <div>
                <img src="imagenes/1.jpg" alt="">
            </div>
            <div>
                <img src="imagenes/1.jpg" alt="">
            </div>
            <div>
                <img src="imagenes/1.jpg" alt="">
            </div>
            <div>
                <img src="imagenes/1.jpg" alt="">
            </div>
            <div>
                <img src="imagenes/1.jpg" alt="">
            </div>
            <?php foreach($galeria as $tattoo): ?>
            <div>
                <img src="imagenes/<?php echo $directorio ?>/<?php echo $tattoo['img'] ?>" alt="<?php echo $tattoo['etiqueta'] ?>">
            </div>
            <?php endforeach; ?>
        </article>
    </main>

    <!-- constant footer -->
    <?php echo $footer ?>
</body>
</html>