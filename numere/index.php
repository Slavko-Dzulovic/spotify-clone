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

                case 'listAllTracks':
                    $ct = new controllerNumere();
                    $ct->listAllTracks();
                    break;
            }
            break;
        case 'POST':
            switch ($action)
            {

            }
            break;
    }
?>