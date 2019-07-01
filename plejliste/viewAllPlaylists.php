<?php
$msg = isset($msg) ? $msg : "";
echo $msg;

$plejliste = isset($plejliste) ? $plejliste : "";

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
            <title>Sve plejliste</title>
        </head>
        <body>

        <table>
            <tr>
                <td>id</td>
                <td>Naziv</td>
                <td>Datum ažuriranja</td>
                <td>Korisnik</td>
            </tr>

            <?php foreach ($plejliste as $p) { ?>
                <tr>
                    <td><?php echo $p['id'] ?></td>
                    <td><a href="../plejliste/?action=viewPlaylistTracks&id=<?=$p['id']?>"><?php echo $p['naziv'] ?></a></td>
                    <td><?php echo $p['datum_azuriranja'] ?></td>
                    <td><?php echo "(".$p['korisnik_id'].") ".$p['korisnicko_ime']?></td>
                </tr>
                <?php
            } ?>
        </table>

        <a href="../plejliste/?action=goAddPlaylist">Dodaj plejlistu</a><br>
        <a href="../plejliste/?action=goAddPripadanjePlejliste">Dodaj numeru u plejlistu</a><br>
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