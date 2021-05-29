<?php 
include "lib/constants.php";
include "db/functions/tattoos.php";
include "db/functions/piercings.php";
include "db/functions/artistas.php";

$artistas = getAllArtistas();
$tattoos = get12Tattoos();
$piercings = get12Piercings();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- materialize -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">


    <link rel="stylesheet" href="lib/css/header.css">
    <script src="lib/js/header.js"></script>
    <link rel="stylesheet" href="lib/css/index.css">
    <link rel="stylesheet" href="lib/css/galeriaGrid.css">
    <!-- footer css -->
    <link rel="stylesheet" href="lib/css/footer.css">
    

</head>
<body>
    <header class="landingPage">
        <?php echo $header ?>
        <img src="imagenes/constantes/logo_recortado.png" alt="">
        <a href="#main"><button>&#8609;</button></a>
    </header>
    <main id="main">
        <h1>Artistas</h1>
        <article class="artistas">
            <div class="carousel center-align">
                <?php foreach($artistas as $artista): ?>
                    <section class="carousel-item">
                        <h2><?php echo $artista['nombre'] ?></h2>
                        <div class= "linea-division"></div>
                        <a href="#"><u>Ver más</u></a>
                        <img src="/imagenes/artistas/<?php echo $artista['img'] ?>" alt="<?php echo $artista['nombre'] ?>">
                    </section>
                <?php endforeach ?>

            </div>
        </article>
        <h1 style="background-color: white; color: black">Ultimos Trabajos</h1>
        <article class="grid-Img">
            <?php foreach($tattoos as $tattoo): ?>
                <div class="material-placeholder">
                    <img class="materialboxed" src="/imagenes/tattoos/<?php echo $tattoo['img'] ?>" alt="<?php echo $tattoo['etiqueta'] ?>">
                </div>
            <?php endforeach ?>
        </article>
        <h1 style="background-color: white; color: black">Piercings</h1>
        <article class="grid-Img">
            <?php foreach($piercings as $piercing): ?>
                <div class="material-placeholder">
                    <img class="materialboxed" src="/imagenes/piercings/<?php echo $piercing['img'] ?>" alt="<?php echo $piercing['etiqueta'] ?>">
                </div>
            <?php endforeach ?>
        </article>
    </main>

    <button id="myBtn" class="btn-scroll" onclick="topFunction()">&#8607;</button>

    <!-- constant footer -->
    <?php echo $footer ?>

    <!-- Materialize.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

    <script src="lib/js/carousel.js"></script>
    <script>

        var mybutton = document.getElementById("myBtn");
        window.onscroll = function() {scrollFunction()};
        function scrollFunction() {
            if (document.body.scrollTop > 500 || document.documentElement.scrollTop > 500) {
                mybutton.style.display = "block";
            } else {
                mybutton.style.display = "none";
            }
        }
        function topFunction() {
            document.body.scrollTop = 0;
            document.documentElement.scrollTop = 0;
        }
        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('.materialboxed');
            var instances = M.Materialbox.init(elems, options);
        });
     </script>
</body>
</html>