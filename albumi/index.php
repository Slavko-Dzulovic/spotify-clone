<?php

require_once "../albumi/controllerAlbumi.php";
require_once "../autori/DAOAutori.php";

$action = isset($_REQUEST['action'])? $_REQUEST['action'] : "";

switch ($_SERVER['REQUEST_METHOD'])
{
    case 'GET':
        switch ($action)
        {
            case 'listAllAlbums':
                $ca = new controllerAlbumi();
                $ca->listAllAlbumi();
                break;

            case "goAddAlbum":
                $dao = new DAOAutori();
                $autori = $dao->getAllAuthors();
                include "../albumi/viewAddNewAlbum.php";
                break;
        }
        break;
    case 'POST':
        switch ($action)
        {
            case 'Sacuvaj album':
                $ca = new controllerAlbumi();
                $ca->insertAlbum();
                break;
        }
        break;
}
?>