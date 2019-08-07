<?php

$msg = isset($msg) ? $msg : "";
echo $msg;

if(session_status() == PHP_SESSION_NONE)
{
    session_start();
}

if($_SESSION['loggedIn']['admin']==1)
{?>

    <!doctype html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Dodaj žanr</title>
    </head>
    <body>

    <form action="../zanrovi/" method="post">
        <label for="naziv">Naziv:</label><br>
        <input type="text" name="naziv" placeholder="Unesite naziv..."><br>

        <input type="submit" name="action" value="Sacuvaj zanr">
    </form>

    <a href="../zanrovi/?action=listAllGenres">Nazad na zanrove</a><br>
    <a href="../korisnici/?action=dashAdmin">Nazad na admin panel</a><br>

    </body>
    </html>
    <?php
}
else
{
    header("Location: ../korisnici/viewLoginUser.php");
}
?>