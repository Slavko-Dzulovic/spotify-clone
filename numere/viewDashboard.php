<?php
    require_once './controllerNumere.php';
    $numera = isset($numera)? $numera : "";
    if(!empty($numera)) {
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

        Autor: <?php echo $numera['ime']. " " .$numera['prezime']; ?><br>

        <audio controls>
            <source src="<?php echo $numera['url']; ?>" type="audio/mpeg">
        </audio>

        </body>
        </html>
        <?php
    } else
        {
        echo 'Nema pesme!';
    }
        ?>