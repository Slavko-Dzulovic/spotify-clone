<?php
    require_once '../numere/DAONumere.php';
    require_once '../plejliste/DAOPlejliste.php';
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Numere</title>
</head>
<body>
<?php
    $dao = new DAONumere();
    $numere = $dao->getAllNumere();


//    $dao->insertMetapodatak("test", "test123");
//    var_dump($dao->getLastMetapodatakID());
//    var_dump($dao->getLastNumeraID());

    $daoP = new DAOPlejliste();
    $plejliste = $daoP->getAllPlejliste();
//    var_dump($plejliste);
    $numereP = $daoP->viewPlaylistTracks(1);
//    var_dump($numereP);
    echo date("Y-m-d")."<br>";

    $id = $dao->getLastMetapodatakID();
    $idn = $dao->getLastNumeraID();

    echo $id['id'];
    echo $idn['id'];

    foreach ($numere as $numera)
    {
        echo $numera['id'];
        echo $numera['naziv'];
    }

    $n = $dao->getNumeraById(1);
?>
<h1><?php echo $n['id']; ?></h1>
</body>
</html>