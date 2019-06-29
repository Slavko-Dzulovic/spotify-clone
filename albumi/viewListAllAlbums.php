<?php
$msg = isset($msg) ? $msg : "";
echo $msg;

$albumi = isset($albumi) ? $albumi : "";

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
            <title>Svi albumi</title>
        </head>
        <body>

        <table>
            <tr>
                <td>id</td>
                <td>Naziv</td>
                <td>Datum izdavanja</td>
                <td>Autor</td>
            </tr>

            <?php foreach ($albumi as $a) { ?>
                <tr>
                    <td><?php echo $a['id'] ?></td>
                    <td><?php echo $a['naziv'] ?></td>
                    <td><?php echo $a['datum'] ?></td>
                    <td><?php echo "(".$a['aut_id'].") ".$a['ime']." ".$a['prezime'] ?></td>
                </tr>
                <?php
            } ?>
        </table>

        <a href="../albumi/?action=goAddAlbum">Dodaj album</a><br>
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