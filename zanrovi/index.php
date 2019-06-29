<?php

require_once "../zanrovi/controllerZanrovi.php";

$action = isset($_REQUEST['action'])? $_REQUEST['action'] : "";

switch ($_SERVER['REQUEST_METHOD'])
{
    case 'GET':
        switch ($action)
        {
            case 'listAllGenres':
                $cz = new controllerZanrovi();
                $cz->listAllGenres();
                break;
        }
        break;
    case 'POST':
        switch ($action)
        {
            case 'Sacuvaj zanr':
                $cz = new controllerZanrovi();
                $cz->addNewGenre();
                break;
        }
        break;
}
?>