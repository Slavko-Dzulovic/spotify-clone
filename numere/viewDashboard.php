<?php
require_once '../numere/controllerNumere.php';
require_once '../numere/DAONumere.php';

$numere = isset($numere) ? $numere : "";
$albumi = isset($albumi) ? $albumi : "";
$autori = isset($autori) ? $autori : "";
$plejliste = isset($plejliste) ? $plejliste : "";

$ct = new controllerNumere();
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (isset($_SESSION['loggedIn'])) {
    $favPlejlista = $ct->getPlaylistByKorisnik($_SESSION['loggedIn']['id']);
    if (!empty($numere) && !empty($albumi) && !empty($autori) && !empty($plejliste)) {
        ?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <title> Dashboard </title>
            <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
                  integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf"
                  crossorigin="anonymous">

            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>

            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

            <link href="https://fonts.googleapis.com/css?family=Bitter" rel="stylesheet">
            <link rel="stylesheet" href="../assets/css/loader.css">
            <link rel="stylesheet" href="../assets/css/indexCSS.css">
            <link rel="stylesheet" href="../assets/css/glider.css">
            <script type="text/javascript" src="../assets/js/functions.js"></script>
            <script src="../assets/js/glider.js"></script>


        </head>

        <body>
        <div class="toggle" id="toggle" onclick="toggle()">
            <div id="hamburger" class="hamburger"></div>
        </div>
        <div class="menu" id="menu">
            <a href="../numere/?action=dash"><i class="fas fa-home"></i></a>
            <a href="../numere/?action=gotoPlaylist&playlist_id=<?php echo $favPlejlista['id']; ?>"><i class="fas fa-compact-disc"></i></a>
            <?php if($_SESSION['loggedIn']['admin'] == 1) { ?>
            <a href="../korisnici/?action=dashAdmin"><i class="fas fa-user-tie"></i></a>
            <?php }?>
            <a href="../numere/?action=gotoSearch"><i class="fas fa-search"></i></a>
            <a href="../korisnici/?action=gotoLogout"><i class="fas fa-sign-out-alt"></i></a>
        </div>
        <div class="wrapper">
            <div class="naslov">
                <h1> MNGPFY - Dashboard </h1>
            </div>

            <hr>

            <div class="glider-contain">
                <h1> Umetnici </h1>
                <div class="glider">
                    <?php foreach ($autori as $autor) { ?>
                        <div class="card" style="width:300px">
                            <img class="card-img-top" src="<?php echo $autor['ref_slika']; ?>" alt="Card image"
                                 style="width:100%; height: 60%;">
                            <div class="card-body">
                                <?php
                                if ($autor['bend'] == 0) {
                                    $autor_naziv = $autor['ime'] . " " . $autor['prezime'];
                                } else {
                                    $autor_naziv = $autor['ime'];
                                }
                                ?>
                                <a href="../numere/?action=gotoAuthor&autorId=<?php echo $autor['id']; ?>"><h4
                                            class="card-title"><?php echo $autor_naziv; ?></h4></a>
                            </div>
                        </div>
                    <?php } ?>
                </div>
                <button class="glider-prev">&laquo;</button>
                <button class="glider-next">&raquo;</button>
                <div id="dots"></div>
            </div>
            <hr>
            <!--Albums gliders-->
            <div class="glider-contain">
                <h1> Albumi </h1>
                <div class="glider g1">
                    <?php foreach ($albumi as $album) {
                        $numera_album = $ct->getNumeraByAlbum($album['id']);
                        ?>
                        <div class="card" style="width:300px">
                            <img class="card-img-top" src="<?php echo $numera_album[0]['ref_omot']; ?>" alt="Card image"
                                 style="width:100%; height: 200px;">
                            <div class="card-body">
                                <?php
                                if ($numera_album[0]['bend'] == 0) {
                                    $autor_naziv = $numera_album[0]['ime'] . " " . $numera_album[0]['prezime'];
                                } else {
                                    $autor_naziv = $numera_album[0]['ime'];
                                }
                                ?>
                                <a href="../numere/?action=gotoAuthor&autorId=<?php echo $album['autor_id']; ?>"
                                   class="title-card"><h4 class="card-title"><?php echo $album['naziv']; ?></h4>
                                    <p><?php echo $autor_naziv; ?></p></a>

                            </div>
                        </div>
                    <?php } ?>
                </div>
                <button class="glider-prev gp1">&laquo;</button>
                <button class="glider-next gn1">&raquo;</button>
                <div id="dots"></div>
            </div>
            <hr>
            <!--Drugi-->
            <div class="glider-contain">
                <h1> Plejliste </h1>
                <div class="glider g2">
                    <?php foreach ($plejliste as $plejlista) { ?>
                        <div class="card" style="width:300px">
                            <img class="card-img-top" src="<?php echo $plejlista['ref_slika']; ?>" alt="Card image"
                                 style="width:100%; height: 60%;">
                            <div class="card-body">
                                <a href="../numere/?action=gotoPlaylist&playlist_id=<?php echo $plejlista['playlist_id'];?>" ><h4 class="card-title"><?php echo $plejlista['naziv']; ?></h4></a>
                                <p><?php echo $plejlista['korisnicko_ime']; ?></p>
                            </div>
                        </div>
                    <?php } ?>
                </div>
                <button class="glider-prev gp2">&laquo;</button>
                <button class="glider-next gn2">&raquo;</button>
                <div id="dots"></div>
            </div>
            <hr>
            <!--Treci-->
            <div class="glider-contain">
                <h1> Najnovije numere </h1>
                <div class="glider g3">
                    <?php foreach ($numere as $numera) {?>
                        <div class="card" style="width:300px">
                            <img class="card-img-top" src="<?php echo $numera['ref_omot']; ?>" alt="Card image"
                                 style="width:100%; height: 170px; ">
                            <?php
                            if ($numera['bend'] == 0) {
                                $autor_naziv = $numera['ime'] . " " . $numera['prezime'];
                            } else {
                                $autor_naziv = $numera['ime'];
                            }
                            ?>
                            <div class="card-body "  style="width:100%; height: 140px; ">
                                <a class="title-card" href="../numere/?action=gotoAuthor&autorId=<?php echo $numera['autor_id']; ?>" onclick='addToQueueOneSong(<?php echo json_encode($numera, JSON_PRETTY_PRINT); ?>)'><h4
                                            class="card-title"><?php echo $numera['naziv']; ?></h4>
                                <p><?php echo $autor_naziv; ?></p></a>
                            </div>
                        </div>
                    <?php } ?>
                </div>
                <button class="glider-prev gp3">&laquo;</button>
                <button class="glider-next gn3">&raquo;</button>
                <div id="dots"></div>
            </div>

            <div class="loader-wrapper">
                <span class="loader"><span class="loader-inner"></span></span>
            </div>

            <footer>

                <hr class="hr-footer">
                <div class="social">
                    <ul class="list-social">
                        <li class="list-item ">
                            <a class="btn-floating btn-fb mx-1" href=""
                               target="_blank">
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
            </footer>

        </div>
        <script type="text/javascript" src="../assets/js/dashGlider.js"></script>
        </body>

        </html>
        <?php
    } else {
        echo 'Doslo je do greske!';
    }
} else {
    header("Location: ../korisnici/?action=gotoLogin");
}
?>