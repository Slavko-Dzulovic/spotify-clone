<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registracija</title>
</head>
<body>
<form action="./?action=register">

    <label for="ime">Ime:</label>
    <input type="text" name="ime" placeholder="Unesite ime...">
    <label for="ime">Prezime:</label>
    <input type="text" name="prezime" placeholder="Unesite prezime...">
    <label for="ime">Korisnicko ime:</label>
    <input type="text" name="korisnicko_ime" placeholder="Unesite korisnicko ime...">
    <label for="ime">Mejl adresa:</label>
    <input type="email" name="email" placeholder="Unesite mejl adresu...">
    <label for="ime">Pol:</label>
    <select name="pol" id="">
        <option value="m">Muski</option>
        <option value="z">Zenski</option>
    </select>
    <label for="ime">Datum rodjenja:</label>
    <input type="date" name="datum_rodj">
    <label for="ime">Lozinka:</label>
    <input type="password" name="lozinka" placeholder="Unesite lozinku...">
    <label for="ime">Premijum?:</label>
    <input type="checkbox" name="premijum">


</form>
</body>
</html>
