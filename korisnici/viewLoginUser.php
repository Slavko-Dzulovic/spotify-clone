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
        if($_SESSION['loggedIn']['admin']==0)
            header('Location:./?action=dash');
        else header('Location:./?action=dashAdmin');
    }
    else
    {
        $js = isset($_COOKIE["json_cookie"])? $_COOKIE["json_cookie"] : NULL;
        $cookie = json_decode($js, true);

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Login</title>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
              integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf"
              crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="../assets/css/LoginCSS.css">
        <link rel="stylesheet" href="../assets/css/loader.css">
        <script type="text/javascript" src="../assets/js/functions.js"></script>
    </head>
    <body>
    <div class="wrapper">
        <img src="../assets/img/user.png" id="slika" alt="">
    <form action="../korisnici/index.php" method="post">

        <br>
        <input type="text"  class="dimension class="form-control" name="loginCredential" placeholder="Username or email" value="<?php echo $cookie[0]; ?>">
        <br>

        <input type="password" class="dimension class="form-control" placeholder="Password" name="lozinka">
        <br>

        <input type="submit" class="dimension button " name="action" value="Uloguj se">
        <br>

        <div> <input type="checkbox" name="remember_user" value="Yes" checked> Zapamti me </div>
    </form>

    <a href="../korisnici/index.php?action=gotoRegister" id="link"> Napravi nalog! </a>

        <div class="loader-wrapper">
            <span class="loader"><span class="loader-inner"></span></span>
        </div>
    </body>
</html>
<?php } ?>