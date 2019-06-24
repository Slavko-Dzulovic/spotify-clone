<?php

    $msg = isset($msg) ? $msg : "";
    echo $msg;

    $korisnici = isset($korisnici) ? $korisnici : "";

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Svi korisnici</title>
</head>
<body>

    <table>
        <tr>
            <td>id</td>
            <td>Ime</td>
            <td>Prezime</td>
            <td>Korisnicko ime</td>
            <td>Mejl</td>
            <td>Pol</td>
            <td>Datum rodjenja</td>
            <td>Premijum?</td>
            <td>Admin?</td>
            <td>Dodeli premijum</td>
            <td>Dodeli admin</td>
            <td>Obriši</td>
            <td>Izmeni</td>
        </tr>

        <?php

        foreach ($korisnici as $k)
        {?>
        <tr>
            <td><?php echo $k['id'] ?></td>
            <td><?php echo $k['ime'] ?></td>
            <td><?php echo $k['prezime'] ?></td>
            <td><?php echo $k['korisnicko_ime'] ?></td>
            <td><?php echo $k['mejl'] ?></td>
            <td><?php echo $k['pol'] ?></td>
            <td><?php echo $k['datum_rodj'] ?>?</td>
            <td><?php echo $k['premijum'] ?>?</td>
            <td><?php echo $k['admin'] ?>?</td>
            <td><a href="./?action=grantPremijum&id=<?=$k['id'];?>">Dodeli premijum</a></td>
            <td><a href="./?action=grantAdmin&id=<?=$k['id'];?>">Dodeli admin</a></td>
            <td><a href="./?action=deleteUser&id=<?=$k['id'];?>">Obriši korisnika</a></td>
            <td><a href="./?action=goEditUser&korisnicko_ime=<?=$k['korisnicko_ime'];?>&id=<?=$k['id'];?>">Uredi korisnika</a></td>
        </tr>
        <?php
        }?>
    </table>

    <a href="./?action=dashAdmin">Nazad na admin panel</a><br>
    <a href="./?action=gotoLogout">Odjavi se</a><br>


</body>
</html>
