<?php
require_once './controllerKorisnici.php';
require_once '../numere/controllerNumere.php';

$action = isset($_REQUEST['action']) ? $_REQUEST['action'] : "gotoRegister";
$ck = new controllerKorisnici();
$cn = new controllerNumere();

switch ($_SERVER['REQUEST_METHOD'])
{
    case 'GET':
        switch ($action)
        {
            case 'complete':
                $ck->gotoComplete();
                break;
            case 'dash':
                $cn->gotoDash();
                break;

            case 'gotoRegister':
                $ck->gotoRegister();
                break;

            case 'gotoLogin':
                $ck->gotoRegister();
                break;
        }
        break;
    case 'POST':
        switch ($action)
        {
            case 'Registruj se':
                $ck->registerUser();
                break;

            case 'Uloguj se':
                $ck->loginUser();
                break;
        }
        break;
}
?>