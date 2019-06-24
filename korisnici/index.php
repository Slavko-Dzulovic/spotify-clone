<?php
require_once './controllerKorisnici.php';

$action = isset($_REQUEST['action']) ? $_REQUEST['action'] : "gotoRegister";
$ck = new controllerKorisnici();

switch ($_SERVER['REQUEST_METHOD'])
{
    case 'GET':
        switch ($action)
        {
            case 'complete':
                $ck->gotoComplete();
                break;

            case 'dash':
                header("Location:../numere/?action=dash");
                break;

            case 'dashAdmin':
                header("Location: ./adminDashboard.php");
                break;

            case 'listAllUsers':
                $ck->listAllUsers();
                break;

            case 'grantPremijum':
                $ck->grantPremijum();
                break;

            case 'grantAdmin':
                $ck->grantAdmin();
                break;

            case 'goEditUser':
                include "./viewEditUser.php";
                //header("Location: ./viewEditUser.php");
                break;

            //case 'editUser':
            //    $ck->editKorisnik();
            //    break;

            case 'deleteUser':
                $ck->deleteKorisnik();
                break;

            case 'gotoRegister':
                $ck->gotoRegister();
                break;

            case 'gotoLogin':
                $ck->gotoLogin();
                break;

            case 'gotoLogout':
                $ck->logoutUser();
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

            case 'Sacuvaj izmene':
                $ck->editKorisnik();
                break;
        }
        break;
}
?>