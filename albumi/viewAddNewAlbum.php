<?php

$msg = isset($msg) ? $msg : "";
echo $msg;

$autori = isset($autori) ? $autori : "";

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
        <title>Dodaj album</title>
    </head>
    <body>

    <form action="../albumi/" method="post">
        <label for="naziv">Naziv:</label><br>
        <input type="text" name="naziv" placeholder="Unesite naziv..."><br>
        <label for="autor">Autor?:</label><br>
        <select name="autor" id=""><br>
            <?php
            foreach ($autori as $a)
            {?>
                <option value="<?=$a['id']?>"><?php echo $a['id']." - ".$a['ime']." ".$a['prezime']?></option>
                <?php
            }
            ?>
        </select>
        <br>
        <label for="datum_izdavanja">Datum izdavanja</label><br>
        <input type="date" name="datum_izdavanja" ><br>

        <input type="submit" name="action" value="Sacuvaj album">

    </form>

    <a href="../albumi/?action=listAllAlbums">Nazad na albume</a><br>
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