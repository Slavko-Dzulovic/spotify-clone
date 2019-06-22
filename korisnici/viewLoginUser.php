<?php
    $msg = isset($msg) ? $msg : "";
    echo $msg;


?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Login</title>
    </head>
    <body>

    <form action="../korisnici/index.php" method="post">
        <label for="loginCredential">Korisničko ime ili mejl:</label>
        <br>
        <input type="text" name="loginCredential">

        <br>

        <label for="lozinka">Lozinka</label>
        <br>
        <input type="password" name="lozinka">

        <br>
        <input type="checkbox" name="remember_user" value="Yes"> Zapamti me
        <br>
        <input type="submit" name="action" value="Uloguj se">
    </form>

    <a href="../korisnici/index.php?action=gotoRegister"> Napravi nalog! </a>

    </body>
</html>
