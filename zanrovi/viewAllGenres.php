<?php
$msg = isset($msg) ? $msg : "";
echo $msg;

$zanrovi = isset($zanrovi) ? $zanrovi : "";

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (isset($_SESSION['loggedIn'])) {
    if ($_SESSION['loggedIn']['admin'] == 1) { ?>

        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport"
                  content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <title>Svi žanrovi</title>
        </head>
        <body>

        <table>
            <tr>
                <td>id</td>
                <td>Naziv</td>
            </tr>

            <?php foreach ($zanrovi as $z) { ?>
                <tr>
                    <td><?php echo $z['id'] ?></td>
                    <td><?php echo $z['naziv'] ?></td>
                </tr>
                <?php
            } ?>
        </table>

        <a href="../zanrovi/?action=goAddGenre">Dodaj žanr</a><br>
        <a href="../korisnici/?action=dashAdmin">Nazad na admin panel</a><br>
        <a href="../korisnici/?action=gotoLogout">Odjavi se</a><br>


        </body>
        </html>
    <?php } else {
        header("Location:../numere/?action=dash");
    }
} else {
    header("Location:../korisnici/?action=gotoLogin");
} ?>