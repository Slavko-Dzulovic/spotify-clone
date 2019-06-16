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
    foreach ($numere as $numera)
    {
        echo $numera['id'];
        echo $numera['naziv'];
    }
?>
</body>
</html>