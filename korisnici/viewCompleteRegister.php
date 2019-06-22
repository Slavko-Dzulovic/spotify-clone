<?php
    $ime = isset($ime) ? $ime : "";
    $prezime = isset($prezime) ? $prezime : "";
?>
<!doctype html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Dashboard - Mngpfy</title>
    </head>
    <body>

        <h1>USPЕSNO STE SE REGISTROVALI <?php echo $ime. ' ' . $prezime; ?>!</h1>

        <a href="./?action=dash">Idi na dash!</a>

    </body>
    </html>