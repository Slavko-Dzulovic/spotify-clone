<?php
    require_once '../numere/DAONumere.php';
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
//    var_dump($dao->getLastMetapodatak());


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