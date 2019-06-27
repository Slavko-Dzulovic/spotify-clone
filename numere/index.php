<?php
    require_once './controllerNumere.php';

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
                    $ct->gotoInsertNew();
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