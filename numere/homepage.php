<?php
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
    <a href=""><i class="fas fa-home"></i></a>
    <a href=""><i class="fas fa-headphones"></i></a>
    <a href=""><i class="fas fa-compact-disc"></i></a>
    <a href=""><i class="fas fa-user-tie"></i></a>
</div>
<div class="wrapper">
    <div class="naslov">
        <h1> Chill Raccoon</h1>
    </div>

    <hr>

    <div class="glider-contain">
        <h1>Artists</h1>
        <div class="glider">
            <div class="card" style="width:300px">
                <img class="card-img-top" src="https://i.imgur.com/gFaix1W.jpg" alt="Card image"
                     style="width:100%; height: 60%;">
                <div class="card-body">
                    <h4 class="card-title">Autor: Album</h4>


                </div>
            </div>
            <div class="card" style="width:300px">
                <img class="card-img-top"
                     src="https://i1.wp.com/wptag.theviralcash.org/wp-content/uploads/2018/11/maxresdefault_live-1.jpg?resize=825%2C510&ssl=1"
                     alt="Card image" style="width:100%; height: 60%;">
                <div class="card-body">
                    <h4 class="card-title">Autor: Album</h4>


                </div>
            </div>
            <div class="card" style="width:300px">
                <img class="card-img-top" src="https://i.imgur.com/BeoDj8O.jpg" alt="Card image"
                     style="width:100%; height: 60%;">
                <div class="card-body">
                    <h4 class="card-title">Autor: Album</h4>

                </div>
            </div>
            <div class="card" style="width:300px; ">
                <img class="card-img-top" src="https://chillhop.com/wp-content/uploads/2018/11/Screenshot-2018-11-09-15.33.43.png" alt="Card image"
                     style="width:100%; height: 60%;">
                <div class="card-body">
                    <h4 class="card-title">Autor: Album</h4>


                </div>
            </div>
            <div class="card" style="width:300px">
                <img class="card-img-top" src="https://i.ytimg.com/vi/6Stj0jKBh8M/maxresdefault_live.jpg" alt="Card image"
                     style="width:100%; height: 60%;">
                <div class="card-body">
                    <h4 class="card-title">Autor: Album</h4>
                </div>
            </div>
        </div>
        <button class="glider-prev">&laquo;</button>
        <button class="glider-next">&raquo;</button>
        <div id="dots"></div>
    </div>
    <hr>
    <!--Albums gliders-->
    <div class="glider-contain">
        <h1> Albums</h1>
        <div class="glider g1">
            <div class="card" style="width:300px">
                <img class="card-img-top" src="https://i.imgur.com/gFaix1W.jpg" alt="Card image"
                     style="width:100%; height: 90%;">
                <div class="card-body">
                    <h4 class="card-title">Autor: Album</h4>


                </div>
            </div>

            <div class="card" style="width:300px">
                <img class="card-img-top" src="https://i.imgur.com/BeoDj8O.jpg" alt="Card image"
                     style="width:100%; height: 90%;">
                <div class="card-body">
                    <h4 class="card-title">Autor: Album</h4>

                </div>
            </div>
            <div class="card" style="width:300px; ">
                <img class="card-img-top" src="https://chillhop.com/wp-content/uploads/2018/11/Screenshot-2018-11-09-15.33.43.png" alt="Card image"
                     style="width:100%; height: 90%;">
                <div class="card-body">
                    <h4 class="card-title">Autor: Album</h4>


                </div>
            </div>
            <div class="card" style="width:300px">
                <img class="card-img-top" src="https://i.ytimg.com/vi/6Stj0jKBh8M/maxresdefault_live.jpg" alt="Card image"
                     style="width:100%; height: 90%;">
                <div class="card-body">
                    <h4 class="card-title">Autor: Album</h4>
                </div>
            </div>
        </div>
        <button class="glider-prev gp1">&laquo;</button>
        <button class="glider-next gn1">&raquo;</button>
        <div id="dots"></div>
    </div>
    <!--Drugi-->
    <div class="glider-contain">
        <h1>Play lists</h1>
        <div class="glider g2">
            <div class="card" style="width:300px">
                <img class="card-img-top" src="https://i.imgur.com/gFaix1W.jpg" alt="Card image"
                     style="width:100%; height: 60%;">
                <div class="card-body">
                    <h4 class="card-title">playlist name</h4>


                </div>
            </div>
            <div class="card" style="width:300px">
                <img class="card-img-top"
                     src="https://i1.wp.com/wptag.theviralcash.org/wp-content/uploads/2018/11/maxresdefault_live-1.jpg?resize=825%2C510&ssl=1"
                     alt="Card image" style="width:100%; height: 60%;">
                <div class="card-body">
                    <h4 class="card-title">playlist name</h4>


                </div>
            </div>
            <div class="card" style="width:300px">
                <img class="card-img-top" src="https://i.imgur.com/BeoDj8O.jpg" alt="Card image"
                     style="width:100%; height: 60%;">
                <div class="card-body">
                    <h4 class="card-title">playlist name</h4>

                </div>
            </div>
            <div class="card" style="width:300px; ">
                <img class="card-img-top" src="https://chillhop.com/wp-content/uploads/2018/11/Screenshot-2018-11-09-15.33.43.png" alt="Card image"
                     style="width:100%; height: 60%;">
                <div class="card-body">
                    <h4 class="card-title">playlist name</h4>


                </div>
            </div>
            <div class="card" style="width:300px">
                <img class="card-img-top" src="https://i.ytimg.com/vi/6Stj0jKBh8M/maxresdefault_live.jpg" alt="Card image"
                     style="width:100%; height: 60%;">
                <div class="card-body">
                    <h4 class="card-title">playlist name</h4>
                </div>
            </div>
        </div>
        <button class="glider-prev gp2">&laquo;</button>
        <button class="glider-next gn2">&raquo;</button>
        <div id="dots"></div>
    </div>
    <!--Treci-->
    <div class="glider-contain">
        <h1> New songs</h1>
        <div class="glider g3">
            <div class="card" style="width:300px">
                <img class="card-img-top" src="https://i.imgur.com/gFaix1W.jpg" alt="Card image"
                     style="width:100%; height: 60%;">
                <div class="card-body">
                    <h4 class="card-title">Autor: song</h4>


                </div>
            </div>
            <div class="card" style="width:300px">
                <img class="card-img-top"
                     src="https://i1.wp.com/wptag.theviralcash.org/wp-content/uploads/2018/11/maxresdefault_live-1.jpg?resize=825%2C510&ssl=1"
                     alt="Card image" style="width:100%; height: 60%;">
                <div class="card-body">
                    <h4 class="card-title">Autor: song</h4>


                </div>
            </div>
            <div class="card" style="width:300px">
                <img class="card-img-top" src="https://i.imgur.com/BeoDj8O.jpg" alt="Card image"
                     style="width:100%; height: 60%;">
                <div class="card-body">
                    <h4 class="card-title">Autor: song</h4>

                </div>
            </div>
            <div class="card" style="width:300px; ">
                <img class="card-img-top" src="https://chillhop.com/wp-content/uploads/2018/11/Screenshot-2018-11-09-15.33.43.png" alt="Card image"
                     style="width:100%; height: 60%;">
                <div class="card-body">
                    <h4 class="card-title">Autor: song</h4>


                </div>
            </div>
            <div class="card" style="width:300px">
                <img class="card-img-top" src="https://i.ytimg.com/vi/6Stj0jKBh8M/maxresdefault_live.jpg" alt="Card image"
                     style="width:100%; height: 60%;">
                <div class="card-body">
                    <h4 class="card-title">Autor: song</h4>
                </div>
            </div>
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
                <li class="list-item " >
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
    </footer>

</div>
<script>
    new Glider(document.querySelector('.glider'), {
        // Mobile-first defaults
        slidesToShow: 1,
        slidesToScroll: 1,
        scrollLock: true,
        dots: '#resp-dots',
        arrows: {
            prev: '.glider-prev',
            next: '.glider-next'
        },
        responsive: [
            {
                // screens greater than >= 775px
                breakpoint: 775,
                settings: {
                    // Set to `auto` and provide item width to adjust to viewport
                    slidesToShow: 'auto',
                    slidesToScroll: 'auto',
                    itemWidth: 150,
                    duration: 0.25
                }
            }, {
                // screens greater than >= 1024px
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 1,
                    itemWidth: 150,
                    duration: 0.25
                }
            }
        ]
    });
    new Glider(document.querySelector('.g1'), {
        // Mobile-first defaults
        slidesToShow: 1,
        slidesToScroll: 1,
        scrollLock: true,
        dots: '#resp-dots',
        arrows: {
            prev: '.gp1',
            next: '.gn1'
        },
        responsive: [
            {
                // screens greater than >= 775px
                breakpoint: 775,
                settings: {
                    // Set to `auto` and provide item width to adjust to viewport
                    slidesToShow: 'auto',
                    slidesToScroll: 'auto',
                    itemWidth: 150,
                    duration: 0.25
                }
            },{
                // screens greater than >= 1024px
                breakpoint: 1024,
                settings: {
                    slidesToShow: 4,
                    slidesToScroll: 1,
                    itemWidth: 150,
                    duration: 0.25
                }
            }
        ]
    });
    new Glider(document.querySelector('.g2'), {
        // Mobile-first defaults
        slidesToShow: 1,
        slidesToScroll: 1,
        scrollLock: true,
        dots: '#resp-dots',
        arrows: {
            prev: '.gp2',
            next: '.gn2'
        },
        responsive: [
            {
                // screens greater than >= 775px
                breakpoint: 775,
                settings: {
                    // Set to `auto` and provide item width to adjust to viewport
                    slidesToShow: 'auto',
                    slidesToScroll: 'auto',
                    itemWidth: 150,
                    duration: 0.25
                }
            }, {
                // screens greater than >= 1024px
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 1,
                    itemWidth: 150,
                    duration: 0.25
                }
            }
        ]
    });
    new Glider(document.querySelector('.g3'), {
        // Mobile-first defaults
        slidesToShow: 1,
        slidesToScroll: 1,
        scrollLock: true,
        dots: '#resp-dots',
        arrows: {
            prev: '.gp3',
            next: '.gn3'
        },
        responsive: [
            {
                // screens greater than >= 775px
                breakpoint: 775,
                settings: {
                    // Set to `auto` and provide item width to adjust to viewport
                    slidesToShow: 'auto',
                    slidesToScroll: 'auto',
                    itemWidth: 150,
                    duration: 0.25
                }
            }, {
                // screens greater than >= 1024px
                breakpoint: 1024,
                settings: {
                    slidesToShow: 4,
                    slidesToScroll: 1,
                    itemWidth: 150,
                    duration: 0.25
                }
            }
        ]
    });

    
</script>
</body>

</html>
