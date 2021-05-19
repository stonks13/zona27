<?php 
include "../lib/constants.php";

if (isset($_POST["submit"])){
    header("Location: /");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="lib/css/header.css">
    <script src="lib/js/header.js"></script>

    <link rel="stylesheet" href="lib/css/contact.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- footer css -->
    <link rel="stylesheet" href="lib/css/footer.css">
</head>
<body>
    <header>
        <?php echo $header ?>
    </header>
    <main>
        <section class="informacion">
            <article>
                <h2>Direccion</h2>
                <p>Rambla Nova, 29, 08100, Mollet del Vallès, Barcelona, España</p>
            </article>
            <article>
                <h2>Contacto</h2>
                <p>&#128222; 935 93 77 17</p>
                <p>&#128231; asdgfasd@asfasd.com</p>
            </article>
            <article>
                <h2>Horario</h2>
                <table>
                    <tr>
                        <td>Lunes</td>
                        <td>cerrado</td>
                    </tr>
                    <tr>
                        <td>Martes</td>
                        <td>10:30–13:30<br>16:00-20:00</td>
                    </tr>
                    <tr>
                        <td>Miercoles</td>
                        <td>10:30–13:30<br>16:00-20:00</td>
                    </tr>
                    <tr>
                        <td>Jueves</td>
                        <td>10:30–13:30<br>16:00-20:00</td>
                    </tr>
                    <tr>
                        <td>Viernes</td>
                        <td>10:30–13:30<br>16:00-20:00</td>
                    </tr>
                    <tr>
                        <td>Sabado</td>
                        <td>11:00–13:30<br>16:00-20:00</td>
                    </tr>
                    <tr>
                        <td>Domingo</td>
                        <td>cerrado</td>
                    </tr>
                </table>
            </article>
            
        </section>
        <div class= "linea-division"></div>
        <section class="formulario">
            <h2>¡Cuentanos tu idea!</h2>
            <p>Contacta con nosotros contandonos tu idea y te podremos hacer un presupuesto.</p>
            <form action="https://formspree.io/f/xoqvwedr" method="post">
                <div>
                    <label for="nombre">Nombre*</label>
                    <input id="nombre" name="nombre" type="text" required>
                </div>
                <div>
                    <label for="email">Correo electronico *</label>
                    <input id="email" name="correo" type="mail" required>
                </div>
                <div>
                    <label for="txtarea">Mensaje</label>
                    <textarea id="txtarea" name="mensaje"></textarea>
                </div>
                <input id="sendMessage" name="submit" type="submit" value="Enviar"/>
                <p id="msg-confirmacion">Se ha enviado correctamente!</p>
            </form>
        </section>
    </main>
    <footer>
        <?php echo $footer ?>
    </footer>
</body>
<script>
    $("#sendMessage").on("click", function() {
        document.getElementById("msg-confirmacion").style.display = "block";
        var nombre = document.getElementById("nombre").value;
        var email = document.getElementById("email").value;
        var txtarea = document.getElementById("txtarea").value;
        document.getElementById("nombre").value = "";
        document.getElementById("email").value = "";
        document.getElementById("txtarea").value = "";
        $.ajax({
            url: "https://formspree.io/f/xoqvwedr", 
            method: "POST",
            data: {
                Nombre: nombre,
                Correo: email,
                Mensaje: txtarea

            },
            dataType: "json"
        });
        return false;
    });
    
</script>
</html>