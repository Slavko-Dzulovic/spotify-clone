<?php
require_once '../numere/DAONumere.php';

class controllerNumere
{
    function gotoDash()
    {
        $dao = new DAONumere();
        $numere = $dao->getAllNumere();

        include '../numere/viewDashboard.php';
    }

    function gotoAuthor()
    {
        $autor_id = isset($_GET['autorId']) ? $_GET['autorId'] : "";

        if (!empty($autor_id)) {
            $dao = new DAONumere();
            $albumi = $dao->getAlbumAndNumereByAutorId($autor_id);

            include '../numere/viewAuthor.php';
        }
    }

    function getNumeraByAlbum($album_id)
    {
        $dao = new DAONumere();
        $numere = $dao->getNumeraByAlbum($album_id);
        return $numere;
    }
}

?>