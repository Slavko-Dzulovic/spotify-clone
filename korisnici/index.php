<?php
require_once './controllerKorisnici.php';
require_once '../numere/controllerNumere.php';

$action = isset($_REQUEST['action']) ? $_REQUEST['action'] : "gotoRegister";

switch ($_SERVER['REQUEST_METHOD'])
{
    case 'GET':
        switch ($action)
        {
            case 'complete':
                $ct = new controllerKorisnici();
                $ct->gotoComplete();
                break;
            case 'dash':
                $ct = new controllerNumere();
                $ct->gotoDash();
                break;

            case 'gotoRegister':
                $ct = new controllerKorisnici();
                $ct->gotoRegister();
                break;
        }
        break;
    case 'POST':
        switch ($action)
        {
            case 'Registruj se':
                $ct = new controllerKorisnici();
                $ct->registerUser();
                break;
        }
        break;
}
?>