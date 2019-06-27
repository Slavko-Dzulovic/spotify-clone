<?php
    require_once './controllerNumere.php';
    require_once '../albumi/DAOAlbumi.php';
    require_once '../zanrovi/DAOZanrovi.php';

    $action = isset($_REQUEST['action'])? $_REQUEST['action'] : "";

    switch ($_SERVER['REQUEST_METHOD'])
    {
        case 'GET':
            switch ($action)
            {
                case 'dash':
                    $ct = new controllerNumere();
                    $ct->gotoDash();
                    break;

                case 'gotoAuthor':
                    $ct = new controllerNumere();
                    $ct->gotoAuthor();
                    break;

                case 'goAddTrack':
                    $ct = new controllerNumere();
                    $daoAlbumi = new DAOAlbumi();
                    $daoZanrovi = new DAOZanrovi();
                    $podaci_albumi = $daoAlbumi->getAllAlbumiAndAutori();
                    $zanrovi = $daoZanrovi->getAllZanrovi();
                    include '../numere/viewAddNewTrack.php';
                    break;

                case 'listAllTracks':
                    $ct = new controllerNumere();
                    $ct->listAllTracks();
                    break;

                case 'addToFavourite':
                    $ct = new controllerNumere();
                    $ct->addNumeraToUserPlaylist();
                    break;
            }
            break;
        case 'POST':
            switch ($action)
            {
                case 'Sacuvaj numeru':
                    $cn = new controllerNumere();
                    $cn->addNewTrack();
                    break;
            }
            break;
    }
?>