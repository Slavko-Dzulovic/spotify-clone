<?php
    require_once "../plejliste/DAOPlejliste.php";

    class controllerPlejliste
    {

        function addNewPlejlista()
        {
            $daoP = new DAOPlejliste();

            $naziv = isset($_POST['naziv']) ? $this->sanitiseInput($_POST['naziv']) : "";
            $datum = isset($_POST['datum_azuriranja']) ? $_POST['datum_azuriranja'] : "";
            $korisnik_id = isset($_POST['korisnik']) ? $_POST['korisnik'] : "";

            if(!empty($naziv) && !empty($datum) && !empty($korisnik_id))
            {
                $daoP->insertPlejlista($naziv, $datum, $korisnik_id);
                $plejliste = $daoP->getAllPlejliste();

                include "../plejliste/viewAllPlaylists.php";
            }
            else
            {
                $msg = "Popunite sva polja!";
                header("Location: ../plejiste/index.php?action=goAddPlaylist&msg=$msg");
            }
        }

        function addTrackToPlaylist()
        {
            $daoP = new DAOPlejliste();
            $numera_id = isset($_POST['numera']) ? $_POST['numera'] : "";
            $plejlista_id = isset($_POST['plejlista']) ? $_POST['plejlista'] : "";

            $plejliste = $daoP->getAllPlejliste();
            $daoP->addTrackToPlaylist($plejlista_id, $numera_id);
            include "../plejliste/viewAllPlaylists.php";
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