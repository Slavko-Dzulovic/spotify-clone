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

    function addNewTrack()
    {
        $dao = new DAONumere();

        $naziv = isset($_POST['naziv']) ? $this->sanitiseInput($_POST['naziv']) : "";
        $duzina_trajanja = isset($_POST['duzina_trajanja']) ? $this->sanitiseInput($_POST['duzina_trajanja']) : "";
        $datum_objavljivanja = isset($_POST['datum_objavljivanja']) ? $_POST['datum_objavljivanja'] : "";
        $album_id = isset($_POST['album_naziv']) ? $_POST['album_naziv'] : "";
        $autor_id = isset($_POST['autor_id']) ? $_POST['autor_id'] : "";
        $zanr_id = isset($_POST['zanr']) ? $_POST['zanr'] : "";
        $linkFajl = isset($_POST['ref_fajl']) ? $this->sanitiseInput($_POST['ref_fajl']) : "";
        $linkOmot = isset($_POST['ref_omot']) ? $this->sanitiseInput($_POST['ref_omot']) : "";

        var_dump($naziv);
        var_dump($duzina_trajanja);
        var_dump($datum_objavljivanja);
        var_dump($album_id);
        var_dump($autor_id);
        var_dump($zanr_id);
        var_dump($linkFajl);
        var_dump($linkOmot);


        if(!empty($naziv) && !empty($duzina_trajanja) && !empty($datum_objavljivanja) && !empty($album_id) && !empty($linkFajl) && !empty($linkOmot) && !empty($autor_id) && !empty($zanr_id))
        {
            $dao->insertMetapodatak($linkFajl, $linkOmot);
            $metapodatakID = $dao->getLastMetapodatakID();
            $dao->insertNumera($naziv, $duzina_trajanja, $datum_objavljivanja, $album_id, $metapodatakID, $zanr_id);
            $dao->getAllNumereZanrAlbum();

            include "./viewListAllTracks.php";
        }
        else
        {
            $msg = "Popunite sva polja!";
//            header("Location: ./?action=goAddTrack&msg=$msg");
            include "./viewAddNewTrack.php";
        }


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