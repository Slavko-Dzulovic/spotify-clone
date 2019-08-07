<?php
$msg = isset($msg) ? $msg : "";
echo $msg;

$numerePlejliste = isset($numerePlejliste) ? $numerePlejliste : "";

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
            <title>Sve numere sa plejliste <?=$numerePlejliste[0]['plej_naziv']?></title>
        </head>
        <body>
        <?=$numerePlejliste[0]['plej_naziv']?>
        <table>
            <tr>
                <td>id</td>
                <td>Naziv</td>
                <td>Autor</td>
            </tr>

            <?php foreach ($numerePlejliste as $n) { ?>
                <tr>
                    <td><?php echo $n['n_id'] ?></td>
                    <td><?php echo $n['n_naziv'] ?></td>
                    <td><?php echo $n['ime']." ".$n['prezime']?></td>
                </tr>
                <?php
            } ?>
        </table>

        <a href="../plejliste/?action=listAllPlaylists">Nazad na plejliste</a><br>
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