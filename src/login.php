<?php 
require_once("../db/functions/login.php");
//include '../db/functions/login.php';

if(isset($_POST["submit"])){
    $login = loginAdmin($_POST["nombre"]);

    if(password_verify($_POST["passw"], $login)){
        session_start();
        $_SESSION['user']=$_POST['nombre'];

        header('Location: /admin');
    } else {
        pantallaLogin();
    }

} else {
    pantallaLogin();
}
function pantallaLogin(){
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="src/admin.css">
</head>
<body>
    <form method="POST">
        <input type="text" name="nombre" placeholder="Nombre de usuario">
        <input type="password" name="passw" placeholder="Contraseña">
        <input name="control" type="hidden" value="login"/>
        <input name="submit" type="submit" value="Entrar"/>
    </form>
</body>
</html>

<?php 
die();
}
?>