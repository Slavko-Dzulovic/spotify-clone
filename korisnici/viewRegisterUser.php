<?php
    require_once '../numere/controllerNumere.php';

    $msg = isset($msg) ? $msg : "";
    echo $msg;

    if(session_status() == PHP_SESSION_NONE)
    {
        session_start();
    }

    if(isset($_SESSION['loggedIn']))
    {
        header('Location:./?action=dash');
    }
    else
    {
    ?>
    <!doctype html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Registracija</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="../assets/css/RegisterCSS.css">
        <link rel="stylesheet" href="../assets/css/loader.css">
        <script type="text/javascript" src="../assets/js/functions.js"></script>
    </head>
    <body>
    <div id="wrapper">
        <img src="../assets/img/user.png" id="slika" alt="">
    <form action="../korisnici/" method="post">

        <div class="prvideo">

        <input type="text" name="ime" class=" velika form-control"  placeholder="Unesite ime...">
            <br>
        <input type="text" name="prezime" class=" velika form-control" placeholder="Unesite prezime..." >
            <br>
        <input type="text" name="korisnicko_ime" class=" velika form-control"  placeholder="Unesite korisnicko ime...">

            <br>
        <input type="email" name="email" class="velika form-control"  placeholder="Unesite mejl adresu..."><br>

            <input type="password" name="lozinka" class="pass velika form-control"  placeholder="Unesite lozinku..."><br>

            <input type="password" name="lozinkapotvrda" class="pass velika form-control"  placeholder="Unesite lozinku...">
            <div>
                <br>
        <label for="pol">Pol:</label>
        <select name="pol" id="pol">
            <option value="m">Muski</option>
            <option value="z">Zenski</option>
        </select>
        <label for="datum_rodj">Datum rodjenja:</label>
        <input type="date" name="datum_rodj" class="datum"><br>
                <br>

        <input type="checkbox" name="premijum" >
                <label for="premijum">Premijum? </label>

        <input type="submit" name="action" value="Registruj se" class="button"><br>
            </div>
        </div>
    </form>

    <a href="../korisnici/?action=gotoLogin" id="link">Imas nalog? Prijavi se!</a>
    </div>
    <div class="loader-wrapper">
        <span class="loader"><span class="loader-inner"></span></span>
    </div>
    </body>
    </html>
<?php } ?>