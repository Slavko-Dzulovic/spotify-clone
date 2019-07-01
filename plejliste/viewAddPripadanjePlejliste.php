<?php

$msg = isset($_GET['msg']) ? $_GET['msg'] : "";
echo $msg;

$plejliste = isset($plejliste) ? $plejliste : "";
$numere = isset($numere) ? $numere : "";

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
        <title>Dodaj numeru u plejlistu</title>
    </head>
    <body>

    <form action="../plejliste/" method="post">
        <label for="plejlista">Plejlista</label><br>
        <select name="plejlista" id=""><br>
            <?php
            foreach ($plejliste as $p)
            {?>
                <option value="<?=$p['id']?>"><?php echo $p['id']." - ".$p['naziv']?></option>
                <?php
            }
            ?>
        </select>
        <br>

        <label for="numera">Numera</label><br>
        <select name="numera" id=""><br>
            <?php
            foreach ($numere as $n)
            {?>
                <option value="<?=$n['id']?>"><?php echo $n['id']." - ".$n['naziv']." (".$n['ime_autora']." ".$n['prezime'].")"?></option>
                <?php
            }
            ?>
        </select>
        <br>

        <input type="submit" name="action" value="Dodaj numeru u plejlistu">

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