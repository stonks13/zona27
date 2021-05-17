<?php 
include "lib/constants.php";

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
        <button onclick="document.documentElement.scrollTop = 100;">&#8609;</button>
    </header>
    <main>
        <h1>Artistas</h1>
        <article class="artistas">
            <div class="carousel center-align">
                <section class="carousel-item">
                    <h2>David alcantara</h2>
                    <div class= "linea-division"></div>
                    <a href="#"><u>Ver más</u></a>
                    <img src="imagenes/1.jpg" alt="">
                </section>
                <section class="carousel-item">
                    <h2>Xavi xavi</h2>
                    <div class= "linea-division"></div>
                    <a href="#"><u>Ver más</u></a>
                    <img src="imagenes/1.jpg" alt="">
                </section>
                <section class="carousel-item">
                    <h2>Xavi xavi</h2>
                    <div class= "linea-division"></div>
                    <a href="#"><u>Ver más</u></a>
                    <img src="imagenes/1.jpg" alt="">
                </section>
                <section class="carousel-item">
                    <h2>Xavi xavi</h2>
                    <div class= "linea-division"></div>
                    <a href="#"><u>Ver más</u></a>
                    <img src="imagenes/1.jpg" alt="">
                </section>
                <section class="carousel-item">
                    <h2>Xavi xavi</h2>
                    <div class= "linea-division"></div>
                    <a href="#"><u>Ver más</u></a>
                    <img src="imagenes/1.jpg" alt="">
                </section>

            </div>
        </article>
        <h1 style="background-color: white; color: black">Ultimos Trabajos</h1>
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
        </article>
        <h1 style="background-color: white; color: black">Piercings</h1>
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
        </article>
    </main>

    <!-- constant footer -->
    <?php echo $footer ?>

    <!-- Materialize.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

    <script src="lib/js/carousel.js"></script>
    <script>
        function scroll(){
            document.documentElement.scrollTop = 0;

        }
    </script>
</body>
</html>