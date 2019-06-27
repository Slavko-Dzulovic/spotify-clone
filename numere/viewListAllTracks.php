<?php
$msg = isset($msg) ? $msg : "";
echo $msg;

$numere = isset($numere) ? $numere : "";

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
            <title>Sve numere</title>
        </head>
        <body>

        <table>
            <tr>
                <td>id</td>
                <td>Naziv</td>
                <td>Dužina trajanja</td>
                <td>Datum objavljivanja</td>
                <td>Album</td>
                <td>Žanr</td>
                <td>Autor</td>
            </tr>

            <?php foreach ($numere as $n) { ?>
                <tr>
                    <td><?php echo $n['id'] ?></td>
                    <td><?php echo $n['naziv'] ?></td>
                    <td><?php echo gmdate("H:i:s", $n['duzina_trajanja']); ?></td>
                    <td><?php echo $n['datum_objavljivanja'] ?></td>
                    <td><?php echo $n['album']." (".$n['ime_autora'].")"?></td>
                    <td><?php echo $n['zanr'] ?></td>
                    <td><?php echo $n['ime_autora'] ?></td>
                </tr>
                <?php
            } ?>
        </table>

        <a href="../numere/?action=goAddTrack">Dodaj numeru</a><br>
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