<?php
require_once '../numere/controllerNumere.php';
require_once '../numere/DAONumere.php';

$numere = isset($numere) ? $numere : "";

if (!empty($numere)) {
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


        <script type="text/javascript" src="../assets/js/functions.js"></script>

        <link rel="stylesheet" type="text/css" href="../assets/css/playerStyle.css"/>
        <title>Dashboard - Mngpfy</title>
    </head>
    <body class="container">

    <?php foreach ($numere as $numera) { ?>
        <div class="row">
            <div class="col-6">
                <p><?php echo $numera['naziv']; ?></p>
            </div>
            <div class="col-6">
                <button onclick='setNewSong(<?php echo json_encode($numera, JSON_PRETTY_PRINT) ?>)'>Pusti</button>
            </div>
        </div>
    <?php } ?>


    <div id="wrapper">
        <audio id="music" preload="true">
            <source id="song-url" src="<?php echo $numera['ref_fajla']; ?>">
        </audio>
        <div id="audioplayer" class="row fixed-bottom">
            <div class="col-12 col-md-2">
                <div class="row">
                    <div class="col-md-4 text-center">
                        <button id="prevButton" class="prev"></button>
                    </div>
                    <div class="col-md-4 text-center">
                        <button id="pButton" class="play"></button>
                    </div>
                    <div class="col-md-4 text-center">
                        <button id="nextButton" class="next"></button>
                    </div>
                </div>


            </div>
            <div class="col-12 col-md-4">
                <div id="timeline">
                    <div id="playhead"></div>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="row">
                    <div class="col-6">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="song-info">
                                    <p id="song-name"></p>
                                    <p id="song-author"></p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <p id="song-current-time" class="align-middle"></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <img id="song-cover" src="../assets/img/template.svg" alt="..." class="img-thumbnail cover-img"
                             width="200px" height="200px">
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
} else {
    echo 'Nema pesme!';
}
?>