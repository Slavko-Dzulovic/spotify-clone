<?php
require_once '../numere/controllerNumere.php';
require_once '../numere/DAONumere.php';

$numera = isset($numera) ? $numera : "";

if (!empty($numera))
{
    ?>
    <!doctype html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

        <link rel="stylesheet" type="text/css" href="../assets/css/playerStyle.css"/>
        <title>Dashboard - Mngpfy</title>
    </head>
    <body class="container">


    Autor: <?php echo $numera['ime'] . " " . $numera['prezime']; ?><br>
    <?php echo $numera['url']; ?>
    <audio id="music" preload="true">
        <source src="<?php echo $numera['url']; ?>">
    </audio>

    <div id="wrapper">
        <div id="audioplayer" class="row fixed-bottom">
            <div class="col-12 col-md-1">
                <button id="pButton" class="play"></button>
            </div>
            <div class="col-12 col-md-4">
                <div id="timeline">
                    <div id="playhead"></div>
                </div>
            </div>
            <div class="col-12 col-md-7">
                <div class="row">
                    <div class="col-6">
                        <div class="song-info">
                            <p><?php echo $numera['naziv']; ?></p>
                            <p><?php echo $numera['ime'] . " " . $numera['prezime']; ?></p>
                        </div>
                    </div>
                    <div class="col-6">
                        <img src="../assets/img/template.svg" alt="..." class="img-thumbnail cover-img">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <a href="../korisnici/?action=gotoLogout">Odjavi se!</a>
    <script type="text/javascript" src="../assets/js/player.js"></script>
    </body>
    </html>
    <?php
}
else
{
    echo 'Nema pesme!';
?>
   <a href="../korisnici/?action=gotoLogout">Odjavi se!</a>;
<?php
}
?>