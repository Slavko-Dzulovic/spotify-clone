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
    </head>
    <body>
    <form action="../korisnici/" method="post">

        <label for="ime">Ime:</label><br>
        <input type="text" name="ime" placeholder="Unesite ime..."><br>
        <label for="prezime">Prezime:</label><br>
        <input type="text" name="prezime" placeholder="Unesite prezime..." ><br>
        <label for="korisnicko_ime">Korisnicko ime:</label><br>
        <input type="text" name="korisnicko_ime" placeholder="Unesite korisnicko ime..."><br>
        <label for="email">Mejl adresa:</label><br>
        <input type="email" name="email" placeholder="Unesite mejl adresu..."><br>
        <label for="pol">Pol:</label><br>
        <select name="pol" id=""><br>
            <option value="m">Muski</option>
            <option value="z">Zenski</option>
        </select>
        <label for="datum_rodj">Datum rodjenja:</label><br>
        <input type="date" name="datum_rodj"><br>
        <label for="lozinka">Lozinka:</label><br>
        <input type="password" name="lozinka" placeholder="Unesite lozinku..."><br>
        <label for="lozinkapotvrda">Potvrdite lozinku:</label><br>
        <input type="password" name="lozinkapotvrda" placeholder="Unesite lozinku..."><br>
        <label for="premijum">Premijum?: </label>
        <input type="checkbox" name="premijum" > <br>
        <input type="submit" name="action" value="Registruj se"><br>

    </form>

    <a href="../korisnici/?action=gotoLogin">Imas nalog? Prijavi se!</a>

    </body>
    </html>
<?php } ?>