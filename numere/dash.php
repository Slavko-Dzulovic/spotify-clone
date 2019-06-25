<?php
require_once '../numere/controllerNumere.php';
require_once '../numere/DAONumere.php';

/*$numere = isset($numere) ? $numere : "";

if (!empty($numere)) {*/
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title> Chill Raccoon </title>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
    integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

  <link href="https://fonts.googleapis.com/css?family=Bitter" rel="stylesheet">
  <link rel="stylesheet" href="../assets/css/deshCSS.css">
  <link rel="stylesheet" href="../assets/css/loader.css">

  <script type="text/javascript" src="../assets/js/functions.js"></script>
  <script type="text/javascript" src="../assets/js/volumeSlider.js"></script>
  <script type="text/javascript" src="../assets/js/player.js"></script>

  <link rel="stylesheet" type="text/css" href="../assets/css/playerStyle.css" />

  <script>
    var i = 0;
    function toggle() {
      if (i == 0) {
        document.getElementById("menu").style.left = 0;
        i = 1;
        document.getElementById("hamburger").style.background = '#1C1C1E';
      }
      else {
        document.getElementById("menu").style.left = '-100%';
        i = 0;
        document.getElementById("hamburger").style.background = '#9DC70E';
        i = 0;
      }
    }
    $(document).ready(function () {
      $('.toggle').click(function () {
        $('.toggle').toggleClass('active');
      });
    });

    $(document).ready(function () {
      /*$('.fa-peace').click(function () {
          $('.ffa').fadeToggle("slow");
        });*/
      $('[data-toggle="tooltip"]').tooltip();

      $('.album-list').click(function () {
        $(this).parent().find(".album-song-list").fadeToggle("fast");
      });
    });

  </script>

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
      
        <img
          src="https://www.nationalgeographic.rs/files/images/2013/Vincent_van_Gogh___National_Gallery_of_Art_681308748.jpg"
          class="rounded-circle" alt="" width="200px" height="200px">
      
      <h1> Van Gogh </h1>
    </div>
    <hr id="hr-naslov">


    <div class="one">
      <div class="row ">
        <div class="col-12">
          <ul class="list-group " id="lista">
            <div class="album">
              <li class="list-group-item  album-list"><img
                  src="https://www.nationalgeographic.rs/files/images/2013/Vincent_van_Gogh___National_Gallery_of_Art_681308748.jpg"
                  alt="" width="100px" height="100px"> Naziv albuma</li>
              <li class="list-group-item album-song-list">
                <table class="table table-dark ">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th colspan="3">Song name</th>

                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <th scope="row">1</th>
                      <td colspan="2">Larry the Bird</td>
                      <td><i class="fas fa-play"></i>
                        <i class="fas fa-heart"></i>
                        <i class="fas fa-arrow-down"></i>
                      </td>
                    </tr>
                    <tr>
                      <th scope="row">2</th>
                      <td colspan="2">Larry the Bird</td>
                      <td><i class="fas fa-play"></i> <i class="fas fa-heart"></i><i class="fas fa-arrow-down"></i></td>
                    </tr>
                    <tr>
                      <th scope="row">3</th>
                      <td colspan="2">Larry the Bird</td>
                      <td><i class="fas fa-play"></i> <i class="fas fa-heart"></i><i class="fas fa-arrow-down"></i></td>
                    </tr>
                  </tbody>
                </table>
              </li>
            </div>
            <div class="album">
              <li class="list-group-item  album-list "><img
                  src="https://www.nationalgeographic.rs/files/images/2013/Vincent_van_Gogh___National_Gallery_of_Art_681308748.jpg"
                  alt="" width="100px" height="100px"> Naziv albuma</li>
              <li class="list-group-item album-song-list">
                <table class="table table-dark ">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th colspan="3">Song name</th>

                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <th scope="row">1</th>
                      <td colspan="2">Larry the Bird</td>
                      <td><i class="fas fa-play"></i>
                        <i class="fas fa-heart"></i>
                        <i class="fas fa-arrow-down"></i>
                      </td>
                    </tr>
                    <tr>
                      <th scope="row">2</th>
                      <td colspan="2">Larry the Bird</td>
                      <td><i class="fas fa-play"></i> <i class="fas fa-heart"></i><i class="fas fa-arrow-down"></i></td>
                    </tr>
                    <tr>
                      <th scope="row">3</th>
                      <td colspan="2">Larry the Bird</td>
                      <td><i class="fas fa-play"></i> <i class="fas fa-heart"></i><i class="fas fa-arrow-down"></i></td>
                    </tr>
                  </tbody>
                </table>
              </li>
            </div>
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
            <i class="fas fa-peace" data-toggle="tooltip" data-placement="bottom" title="Shere love!"></i>
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
  <footer id="wrapper">
    <audio id="music" preload="true">
      <source id="song-url" src="...">
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
            <img id="song-cover" src="../img/template.svg" alt="..." class="img-thumbnail cover-img" width="200px"
              height="200px">
          </div>
        </div>
      </div>
    </div>
  </footer>



  <script>
    $(window).on("load", function () {
      $(".loader-wrapper").fadeOut("slow");
      $(".album-song-list").fadeOut("fast");
    });
  </script>
</body>

</html>
