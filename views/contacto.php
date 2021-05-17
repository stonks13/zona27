<?php 
include "../lib/constants.php";
if (isset($_POST["submit"])){
    $nombre = $_POST['nombre'];
	$correoElectronico = $_POST['correo'];
	$mensaje = $_POST['mensaje'];

    if(mail('xprattoro@gmail.com', $nombre, $mensaje)){
		echo "mail enviado";
	}else{
		echo "uyuyuyuyuy";
	}
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

    <!-- footer css -->
    <link rel="stylesheet" href="lib/css/footer.css">
</head>
<body>
    <header>
        <?php //echo $header ?>
    </header>
    <main>
        <section class="informacion">
            <article>
                <h2>Direccion</h2>
                <p>Rambla Nova, 29, 08100, Mollet del Vallès, Barcelona, España</p>
            </article>
            <article>
                <h2>Contacto</h2>
                <p>935 93 77 17</p>
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
        <section class="formulario">
            <form method="post" enctype="text/plain">
                <p>Nombre*</p>
                <input id="nombre" name="nombre" type="text"/>
                <p>Correo electronico *</p>
                <input id="email" name="correo" type="mail"/>
                <textarea id="txtarea" name="mensaje"></textarea>
                <input name="submit" type="submit" value="Enviar"/>
            </form>
        </section>
    </main>
    <footer>
        <?php echo $footer ?>
    </footer>
</body>
</html>