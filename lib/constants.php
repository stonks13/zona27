<?php 

$header = <<<EOD
        <nav>
        <a href="/"><img src="/imagenes/constantes/logo_recortado.png" alt=""></a>
        <div id="mainbox" onclick="desplegarNavMenu()">&#9776;</div>
        <ul id="menu">
            <li><a class="closebtn" onclick="cerrarNavMenu()">&times;</a></li>
            <li><a href="/artistas">ARTISTAS</a></li>
            <li><a href="/galeria">GALERIA</a></li>
            <li><a href="/piercings">PIERCINGS</a></li>
            <li><a href="/contacto">CONTACTO</a></li>
        </ul>
        </nav>
EOD;

$footer = <<<EOD
<footer>
    <div class="mitad-footer">
        <section class="top-side">
            <a href="/"><img src="/imagenes/constantes/logo_recortado.png" alt=""></a>
            <div class="redes">
                <a href="https://www.instagram.com/zona27tattoo/"><img src="/imagenes/constantes/instagram.png" alt=""></a>
                <a href="https://www.facebook.com/tattoozona27/"><img src="/imagenes/constantes/facebook.png" alt=""></a>
                <a href="#"><img src="/imagenes/constantes/twitter.png" alt=""></a>
            </div>
        </section>
        <div class= "linea-division"></div>
        <section class="top-side">
            <p>Creado por Zona27 ©2021</p>
        </section>            
    </div>
</footer>
EOD;

?>