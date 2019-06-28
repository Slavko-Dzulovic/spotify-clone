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
        <link rel="stylesheet" href="../assets/css/loader.css">
        <link rel="stylesheet" href="../assets/css/completeRegister.css">
        <script type="text/javascript" src="../assets/js/functions.js"></script>
        <title>Dashboard - Mngpfy</title>
    </head>
    <body>

    <div class="wrapper">
        <div class="header ">
            <div class="header__bg"></div>
            <h1>DOBRODOŠLI!</h1>
            <br>
            <h2>Uzicajte u muzici</h2>
        </div>
        <section>
            <h1 id="korisnik"> <?php echo $ime. ' ' . $prezime; ?></h1>
        </section>

        <a href="./?action=dash">Idi na dash!</a>
    </div>
    </body>

    </html>