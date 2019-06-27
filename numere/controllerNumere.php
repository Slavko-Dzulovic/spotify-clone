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

        if (!empty($autor_id))
        {
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

    function addNumeraToUserPlaylist()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $id = isset($_SESSION['loggedIn']['id']) ? $_SESSION['loggedIn']['id'] : "";
        $autor_id = isset($_GET['autor_id']) ? $_GET['autor_id'] : "";
        $numera_id = isset($_GET['numera_id']) ? $_GET['numera_id'] : "";

        $dao = new DAONumere();
        $playlist_id = implode($dao->getPlaylistByUser($id));

        if (!empty($playlist_id) && !empty($autor_id) && !empty($numera_id)) {
            $dao->insertNumeraInUserPlaylist($playlist_id, $numera_id);
        }
        header("Location:../numere/?action=gotoAuthor&autorId=" . $autor_id);
    }
}

?>