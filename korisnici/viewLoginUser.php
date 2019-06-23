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
    </head>
    <body>

    <form action="../korisnici/index.php" method="post">
        <label for="loginCredential">Korisničko ime ili mejl:</label>
        <br>
        <input type="text" name="loginCredential" value="<?php echo $cookie[0]; ?>">

        <br>

        <label for="lozinka">Lozinka</label>
        <br>
        <input type="password" name="lozinka">

        <br>
        <input type="checkbox" name="remember_user" value="Yes" checked> Zapamti me
        <br>
        <input type="submit" name="action" value="Uloguj se">
    </form>

    <a href="../korisnici/index.php?action=gotoRegister"> Napravi nalog! </a>

    </body>
</html>
<?php } ?>