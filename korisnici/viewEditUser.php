<?php
    require_once './DAOKorisnici.php';

    $msg = isset($msg) ? $msg : "NE RADIIIIII";
    echo $msg;

    $korisnicko_ime = isset($_GET['korisnicko_ime']) ? $_GET['korisnicko_ime'] : "";
    $id = isset($_GET['id']) ? $_GET['id'] : "";

    $dao = new DAOKorisnici();

    $korisnikIzmena = $dao->checkIfKorisnikExistLogin($korisnicko_ime);



?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Uredi korisnika <?= $korisnicko_ime?></title>
</head>
<body>
    <form action="../korisnici/" method="post">
        <input type="hidden" name="id" value="<?=$korisnikIzmena['id']?>">
        <label for="ime">Ime:</label><br>
        <input type="text" name="ime" value="<?=$korisnikIzmena['ime']?>"><br>
        <label for="prezime">Prezime:</label><br>
        <input type="text" name="prezime" value="<?=$korisnikIzmena['prezime']?>" ><br>
        <label for="korisnicko_ime">Korisnicko ime:</label><br>
        <input type="text" name="korisnicko_ime" value="<?=$korisnikIzmena['korisnicko_ime']?>"><br>
        <label for="mejl">Mejl adresa:</label><br>
        <input type="email" name="mejl" value="<?=$korisnikIzmena['mejl']?>"><br>

        <input type="submit" name="action" value="Sacuvaj izmene">

    </form>


</body>
</html>
