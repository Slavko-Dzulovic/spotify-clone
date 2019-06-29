<?php

    require_once "../zanrovi/DAOZanrovi.php";

    class controllerZanrovi
    {
        function gotoInsertNew()
        {
            $daoZanrovi = new DAOZanrovi();
            $zanrovi = $daoZanrovi->getAllZanrovi();

            include '../zanrovi/viewAddNewGenre.php';
        }
    }


?>