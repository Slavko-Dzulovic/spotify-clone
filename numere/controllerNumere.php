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

    function listAllTracks()
    {
        $dao = new DAONumere();
        $numere = $dao->getAllNumereZanrAlbum();

        include "../numere/viewListAllTracks.php";
    }

    private function sanitiseInput($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    function getNumeraByAlbum($album_id)
    {
        $dao = new DAONumere();
        $numere = $dao->getNumeraByAlbum($album_id);
        return $numere;
    }
}

?>