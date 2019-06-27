<?php

$msg = isset($_GET['msg']) ? $_GET['msg'] : "";
echo $msg;

$podaci_albumi = isset($podaci_albumi) ? $podaci_albumi : "";
$zanrovi = isset($zanrovi) ? $zanrovi : "";

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
        <title>Dodaj numeru</title>
    </head>
    <body>

    <form action="../numere/" method="post">
        <label for="naziv">Naziv:</label><br>
        <input type="text" name="naziv" placeholder="Unesite naziv..."><br>
        <label for="duzina_trajanja">Dužina trajanja:</label><br>
        <input type="text" name="duzina_trajanja" placeholder="Unesite dužinu trajanja..." ><br>
        <label for="datum_objavljivanja">Datum objavljivanja</label><br>
        <input type="date" name="datum_objavljivanja" placeholder="Unesite datum objavljivanja..." ><br>

        <label for="album_naziv">Album</label><br>
        <select name="album_naziv" id=""><br>
            <?php
            foreach ($podaci_albumi as $pa)
            {?>
                <option value="<?=$pa['id']?>"><?php echo $pa['id']." - ".$pa['naziv']." (".$pa['ime']." ".$pa['prezime'].")"?></option>
                <?php
                $_POST['autor_id'] = $pa['aut_id'];
            }
            ?>
        </select>
        <br>

        <label for="zanr">Žanr</label><br>
        <select name="zanr" id=""><br>
            <?php
            foreach ($zanrovi as $z)
            {?>
                <option value="<?=$z['id']?>"><?php echo $z['id']." - ".$z['naziv']?></option>
                <?php
            }
            ?>
        </select>
        <br>

        <label for="ref_fajl">Link ka fajlu</label><br>
        <input type="text" name="ref_fajl"><br>
        <label for="ref_omot">Link ka slici omota</label><br>
        <input type="text" name="ref_omot"><br>

        <input type="submit" name="action" value="Sacuvaj numeru">

    </form>

    <a href="../numere/?action=listAllTracks">Nazad na numere</a><br>
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