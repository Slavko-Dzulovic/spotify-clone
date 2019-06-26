<?php
require_once '../numere/controllerNumere.php';
require_once '../numere/DAONumere.php';

$ct = new controllerNumere();
$albumi = isset($albumi) ? $albumi : "";

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (isset($_SESSION['loggedIn'])) {
    if (!empty($albumi)) {
        ?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <title> <?php echo $albumi[0]['ime'] . " " . $albumi[0]['prezime']; ?> - MNGPFY</title>
            <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
                  integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf"
                  crossorigin="anonymous">

            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
            <script src="https://code.jquery.com/ui/jquery-ui-git.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
            <script type="text/javascript" src="../assets/js/functions.js"></script>
            <script type="text/javascript" src="../assets/js/volumeSlider.js"></script>
            <script type="text/javascript" src="../assets/js/player.js"></script>

            <link rel="stylesheet" type="text/css" href="../assets/css/playerStyle.css"/>
            <link rel="stylesheet" type="text/css">

            <link href="https://fonts.googleapis.com/css?family=Bitter" rel="stylesheet">
            <link rel="stylesheet" href="../assets/css/deshCSS.css">
            <link rel="stylesheet" href="../assets/css/loader.css">
        </head>
        <body>
        <div class="toggle" id="toggle" onclick="toggle()">
            <div id="hamburger" class="hamburger"></div>
        </div>
        <div class="menu" id="menu">
            <a href=""><i class="fas fa-home"></i></a>
            <a href=""><i class="fas fa-headphones"></i></a>
            <a href=""><i class="fas fa-compact-disc"></i></a>
            <a href=""><i class="fas fa-user-tie"></i></a>
        </div>
        <div class="wrapper">
            <div class="naslov">
                <input type="hidden" id="song-id">

                <img
                        src="<?php echo $albumi[0]['ref_slika']; ?>"
                        class="rounded-circle" alt="" width="200px" height="200px">

                <h1> <?php echo $albumi[0]['ime'] . " " . $albumi[0]['prezime']; ?></h1>
            </div>
            <hr id="hr-naslov">

            <div class="one">
                <div class="row ">
                    <div class="col-12">
                        <ul class="list-group " id="lista">
                            <?php foreach ($albumi as $album) {
                                $j = 1;
                                $numere = $ct->getNumeraByAlbum($album['a_id']);
                                ?>
                                <div class="album">
                                    <li class="list-group-item  album-list"><img
                                                src="<?php echo $album['ref_omot']; ?>"
                                                alt="" width="100px" height="100px"><?php echo $album['album_naziv']; ?>
                                    </li>
                                    <li class="list-group-item album-song-list">
                                        <table class="table table-dark ">
                                            <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th colspan="3">Ime numere</th>

                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php foreach ($numere as $numera) {
                                                if ($numera['album_id'] == $album['a_id']) { ?>
                                                    <tr>
                                                        <th scope="row"> <?php echo $j++; ?></th>
                                                        <td colspan="2"><?php echo $numera['naziv']; ?></td>
                                                        <td>
                                                            <button id="play-button"
                                                                    onclick='setNewSong(<?php echo json_encode($numera, JSON_PRETTY_PRINT); ?>); addToQueue(<?php echo json_encode($numere, JSON_PRETTY_PRINT); ?>, true)'>
                                                                <i class="fas fa-play"></i></button>
                                                            <i class="fas fa-heart"></i>
                                                            <a href="<?php echo $numera['ref_fajla']; ?>"
                                                               download="<?php echo $numera['naziv']; ?>"
                                                               target="_blank"><i class="fas fa-arrow-down"></i></a>
                                                        </td>
                                                    </tr>
                                                <?php }
                                            } ?>
                                            </tbody>
                                        </table>
                                    </li>
                                </div>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="loader-wrapper">
                <span class="loader"><span class="loader-inner"></span></span>
            </div>

            <section class="footer">

                <hr class="hr-footer">
                <div class="social">
                    <ul class="list-social">
                        <li class="list-item ">
                            <a class="btn-floating btn-fb mx-1" href="" target="_blank">
                                <i class="fab fa-facebook-f ffa"> </i>
                            </a>
                        </li>
                        <li class="list-item  ">
                            <a class="btn-floating btn-tw mx-1" href="" target="_blank">
                                <i class="fab fa-twitter ffa"> </i>
                            </a>
                        </li>

                        <li class="list-item">
                            <i class="fas fa-peace" data-toggle="tooltip" data-placement="bottom"
                               title="Shere love!"></i>
                        </li>

                        <li class="list-item  ">
                            <a class="btn-floating btn-li mx-1" href="" target="_blank">
                                <i class="fab fab fa-reddit ffa"></i>
                            </a>
                        </li>
                        <li class="list-item  ">
                            <a class="btn-floating btn-li mx-1" href="" target="_blank">
                                <i class="fab fa-youtube ffa"></i>
                            </a>
                        </li>

                    </ul>

                </div>

                <hr class="hr-footer">
                <div class="copyright">
                    <p> Copyright: METRoTEAM 2019© </p>
                </div>
                <div id="fixed-footer"></div>
            </section>
        </div>

        <footer>
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
                                        <div class="song-info text-center">
                                            <p id="song-name"></p>
                                            <p id="song-author"></p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <p id="song-current-time" class="align-middle">--:--/--:--</p>
                                        <div id="player">
                                            <i class="fa fa-volume-down"></i>
                                            <div id="volume"></div>
                                            <i class="fa fa-volume-up"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <img id="song-cover" src="../assets/img/template.svg" alt="..."
                                     class="img-thumbnail cover-img"
                                     width="200px" height="200px">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>


        <script>

        </script>
        </body>

        </html>
    <?php } else {
        header("Location:../numere/?action=dash");
    }
} else {
    header("Location:../korisnici/?action=gotoLogin");
}
?>