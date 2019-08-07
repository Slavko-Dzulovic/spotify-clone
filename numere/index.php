<?php
require_once './controllerNumere.php';

$action = isset($_REQUEST['action']) ? $_REQUEST['action'] : "";

switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':
        switch ($action) {
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
            case 'gotoPlaylist':
                $ct = new controllerNumere();
                $ct->gotoPlaylist();
                break;
            case 'deleteFromFavourite':
                $ct = new controllerNumere();
                $ct->deleteNumeraFromUserPlaylist();
                break;
            case 'gotoSearch':
                $cn = new controllerNumere();
                $cn->gotoSearch();
                break;
        }
        break;
    case 'POST':
        switch ($action) {
            case 'Sacuvaj numeru':
                $cn = new controllerNumere();
                $cn->addNewTrack();
                break;

            case 'Pretrazi':
                $cn = new controllerNumere();
                $cn->searchAll();
                break;
        }
        break;
}
?>