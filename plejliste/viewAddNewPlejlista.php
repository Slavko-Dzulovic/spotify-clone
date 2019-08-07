<?php

$msg = isset($_GET['msg']) ? $_GET['msg'] : "";
echo $msg;

$korisnici = isset($korisnici) ? $korisnici : "";

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
        <title>Dodaj plejlistu</title>
    </head>
    <body>

    <form action="../plejliste/" method="post">
        <label for="naziv">Naziv:</label><br>
        <input type="text" name="naziv" placeholder="Unesite naziv..."><br>
        <label for="datum_azuriranja">Datum ažuriranja</label><br>
        <input type="date" name="datum_azuriranja" placeholder="Unesite datum ažuriranja..." ><br>

        <label for="korisnik">Korisnik</label><br>
        <select name="korisnik" id=""><br>
            <?php
            foreach ($korisnici as $k)
            {?>
                <option value="<?=$k['id']?>"><?php echo $k['id']." - ".$k['korisnicko_ime']?></option>
                <?php
            }
            ?>
        </select>
        <br>

        <input type="submit" name="action" value="Sacuvaj plejlistu">

    </form>

    <a href="../plejliste/?action=listAllPlaylists">Nazad na plejliste</a><br>
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