<?php
    require_once './controllerKorisnici.php';
    require_once './DAOKorisnici.php';

    if(session_status() == PHP_SESSION_NONE)
    {
        session_start();
    }

    if($_SESSION['loggedIn']['admin']==1)
    {
        echo "Admin ".$_SESSION['loggedIn']['ime']."<br>";
?>
        <!doctype html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport"
                  content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <title>Admin <?=$_SESSION['loggedIn']['ime']?> dashboard</title>
        </head>
        <body>

            <a href="../korisnici/?action=listAllUsers">Izlistaj sve korisnike</a><br>
            <a href="../autori/?action=listAllAuthors">Izlistaj sve autore</a><br>
            <a href="../numere/?action=listAllTracks">Izlistaj sve numere</a><br>
            <a href="../albumi/?action=listAllAlbums">Izlistaj sve albume</a><br>

            <a href="../korisnici/?action=gotoLogout">Odjavi se!</a>

        </body>
        </html>
<?php
    }
    else
    {
        header("Location: ./viewLoginUser.php");
    }
?>

