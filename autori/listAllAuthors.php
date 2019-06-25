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
        <title>Svi autori</title>
    </head>
    <body>

    <table>
        <tr>
            <td>id</td>
            <td>Ime</td>
            <td>Prezime</td>
            <td>Zemlja</td>
            <td>Bend?</td>
            <td>Datum pojavljivanja</td>
<!--            <td>Obriši</td>-->
        </tr>

        <?php

        foreach ($autori as $a)
        {?>
            <tr>
                <td><?php echo $a['id'] ?></td>
                <td><?php echo $a['ime'] ?></td>
                <td><?php echo $a['prezime'] ?></td>
                <td><?php echo $a['zemlja'] ?></td>
                <td><?php echo $a['bend'] ?></td>
                <td><?php echo $a['datum_pojavljivanja'] ?></td>
<!--                <td><a href="./?action=deleteAuthor&id=--><?//=$a['id'];?><!--">Obriši autora</a></td>-->
            </tr>
            <?php
        }?>
    </table>

    <a href="../autori/?action=goAddAuthor">Dodaj autora</a><br>
    <a href="../korisnici/?action=dashAdmin">Nazad na admin panel</a><br>
    <a href="../korisnici/?action=gotoLogout">Odjavi se</a><br>


    </body>
    </html>
    <?php
}
else
{
    header("Location: ../korisnici/viewLoginUser.php");
}
?>