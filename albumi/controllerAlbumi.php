<?php

    require_once '../albumi/DAOAlbumi.php';

    class controllerAlbumi
    {
        function listAllAlbumi()
        {
            $dao = new DAOAlbumi();
            $albumi = $dao->getAllAlbumiAndAutori();

            include "../albumi/viewListAllAlbums.php";
        }

        function insertAlbum()
        {
            $dao = new DAOAlbumi();

            $naziv = isset($_POST['naziv']) ? $this->sanitiseInput($_POST['naziv']) : "";
            $autor_id = isset($_POST['naziv']) ? $_POST['autor'] : "";
            $datum = isset($_POST['naziv']) ? $_POST['datum_izdavanja'] : "";

            if(!empty($naziv) && !empty($autor_id) && !empty($datum))
            {
                $dao->insertAlbum($naziv, $autor_id, $datum);
                $albumi = $dao->getAllAlbumiAndAutori();

                include "../albumi/viewListAllAlbums.php";
            }
            else
            {
                $msg = "Popunite sva polja!";
                include "../albumi/viewAddNewAlbum.php";
            }
        }

        private function sanitiseInput($data)
        {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

    }

?>
