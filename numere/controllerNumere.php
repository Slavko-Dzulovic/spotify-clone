<?php
require_once '../numere/DAONumere.php';
require_once '../albumi/DAOAlbumi.php';
require_once '../zanrovi/DAOZanrovi.php';
require_once '../autori/DAOAutori.php';

class controllerNumere
{
    function gotoDash()
    {
        $dao = new DAONumere();
        $numere = $dao->getAllNumere();
        $autori = $dao->getAllAutori();
        $plejliste = $dao->getAllPlejliste();
        $albumi = $dao->getAllAlbumi();

        include '../numere/viewDashboard.php';
    }

    function gotoPlaylist()
    {
        $playlist_id = isset($_GET['playlist_id']) ? $_GET['playlist_id'] : "";
        $dao = new DAONumere();

        $plejlista = $dao->getPlaylistById($playlist_id);
        $numere = $dao->getNumereByPlaylist($playlist_id);

        include '../numere/viewPlaylist.php';
    }

    function gotoInsertNew()
    {
//        $dao = new DAONumere();
        $daoAlbumi = new DAOAlbumi();
        $daoZanrovi = new DAOZanrovi();
        $daoAutori = new DAOAutori();
        $podaci_albumi = $daoAlbumi->getAllAlbumiAndAutori();
        $zanrovi = $daoZanrovi->getAllZanrovi();
        $autori = $daoAutori->getAllAuthors();
//        $numere = $dao->getAllNumere();

        include '../numere/viewAddNewTrack.php';
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

    function addNewTrack()
    {
        $dao = new DAONumere();

        $naziv = isset($_POST['naziv']) ? $this->sanitiseInput($_POST['naziv']) : "";
        $duzina_trajanja = isset($_POST['duzina_trajanja']) ? $this->sanitiseInput($_POST['duzina_trajanja']) : "";
        $datum_objavljivanja = isset($_POST['datum_objavljivanja']) ? $_POST['datum_objavljivanja'] : "";
        $album_id = isset($_POST['album_naziv']) ? $_POST['album_naziv'] : "";
        $autor_id = isset($_POST['autor']) ? $_POST['autor'] : "";
        $uloga = isset($_POST['uloga']) ? $_POST['uloga'] : "";
        $zanr_id = isset($_POST['zanr']) ? $_POST['zanr'] : "";
        $linkFajl = isset($_POST['ref_fajl']) ? $this->sanitiseInput($_POST['ref_fajl']) : "";
        $linkOmot = isset($_POST['ref_omot']) ? $this->sanitiseInput($_POST['ref_omot']) : "";

        if (!empty($naziv) && !empty($duzina_trajanja) && !empty($datum_objavljivanja) && !empty($album_id) && !empty($uloga) && !empty($linkFajl) && !empty($linkOmot) && !empty($autor_id) && !empty($zanr_id)) {
            $dao->insertMetapodatak($linkFajl, $linkOmot);
            $metapodatakID = $dao->getLastMetapodatakID();

            $dao->insertNumera($naziv, $duzina_trajanja, $datum_objavljivanja, $album_id, $metapodatakID['id'], $zanr_id);
            $numeraID = $dao->getLastNumeraID();

            $dao->insertPripadanjeAutora($numeraID['id'], $autor_id, $uloga);

            $numere = $dao->getAllNumereZanrAlbum();

            include "./viewListAllTracks.php";
        } else {
            $msg = "Popunite sva polja!";
            header("Location: ./?action=goAddTrack&msg=$msg");
//            include "./viewAddNewTrack.php";
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

    function getNumeraById($id)
    {
        $dao = new DAONumere();
        return $dao->getNumeraById($id);
    }
}

?>