<?php

    require_once "../plejliste/DAOPlejliste.php";
    require_once "../korisnici/DAOKorisnici.php";
    require_once "../numere/DAONumere.php";
    require_once "../plejliste/controllerPlejliste.php";


$action = isset($_REQUEST['action'])? $_REQUEST['action'] : "";

    switch ($_SERVER['REQUEST_METHOD'])
    {
        case 'GET':
            switch ($action)
            {
                case "listAllPlaylists":
                    $dao = new DAOPlejliste();
                    $plejliste = $dao->getAllPlejliste();
                    include "../plejliste/viewAllPlaylists.php";
                    break;

                case "goAddPripadanjePlejliste":
                    $daoN = new DAONumere();
                    $daoP = new DAOPlejliste();
                    $plejliste = $daoP->getAllPlejliste();
                    $numere = $daoN->getAllNumereZanrAlbum();
                    include "../plejliste/viewAddPripadanjePlejliste.php";
                    break;

                case "goAddPlaylist":
                    $daoK = new DAOKorisnici();
                    $daoP = new DAOPlejliste();
                    $plejliste = $daoP->getAllPlejliste();
                    $korisnici = $daoK->getAllKorisnici();
                    include "../plejliste/viewAddNewPlejlista.php";
                    break;

                case "viewPlaylistTracks":
                    $daoP = new DAOPlejliste();
                    $numerePlejliste = $daoP->viewPlaylistTracks($_GET['id']);
                    include "../plejliste/viewPlaylistTracks.php";
            }
            break;

        case 'POST':
            switch ($action)
            {
                case "Sacuvaj plejlistu":
                    $cp = new controllerPlejliste();
                    $cp->addNewPlejlista();
                    break;

                case "Dodaj numeru u plejlistu":
                    $cp = new controllerPlejliste();
                    $cp->addTrackToPlaylist();
                    break;
            }
            break;
    }
?>