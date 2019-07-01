<?php

    require_once "../zanrovi/DAOZanrovi.php";

    class controllerZanrovi
    {
        function addNewGenre()
        {
            $dao = new DAOZanrovi();

            $naziv = isset($_POST['naziv']) ? $_POST['naziv'] : "";

            if(!empty($naziv))
            {
                $dao->insertZanr($naziv);
                $zanrovi = $dao->getAllZanrovi();
                include "../zanrovi/viewAllGenres.php";
            }
            else
            {
                $msg = "Popunite sva polja!";
                include "../zanrovi/viewAddNewGenre.php";
            }
        }

        function listAllGenres()
        {
            $dao = new DAOZanrovi();
            $zanrovi = $dao->getAllZanrovi();

            include "../zanrovi/viewAllGenres.php";
        }
    }

?>