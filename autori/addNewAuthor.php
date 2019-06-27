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
        <title>Dodaj autora</title>
    </head>
    <body>

        <form action="../autori/" method="post">
            <label for="ime">Ime:</label><br>
            <input type="text" name="ime" placeholder="Unesite ime..."><br>
            <label for="prezime">Prezime:</label><br>
            <input type="text" name="prezime" placeholder="Unesite prezime..." ><br>
            <label for="zemlja">Zemlja porekla</label><br>
            <input type="text" name="zemlja" placeholder="Unesite zemlju porekla..." ><br>
            <label for="bend">Bend?:</label><br>
            <select name="bend" id=""><br>
                <option value="1">Da</option>
                <option value="0">Ne</option>
            </select>
            <br>
            <label for="datum_pojavljivanja">Datum pojavljivanja</label><br>
            <input type="date" name="datum_pojavljivanja" ><br>
            <label for="ref_slika">Slika autora</label><br>
            <input type="ref_slika" name="ref_slika"><br>

            <input type="submit" name="action" value="Sacuvaj autora">

        </form>

        <a href="../autori/?action=listAllAuthors">Nazad na autore</a><br>
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