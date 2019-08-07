<?php
    require_once 'DAOAutori.php';

    class ControllerAutori
    {
        function listAllAuthors()
        {
            $dao = new DAOAutori();
            $autori = $dao->getAllAuthors();

//            header("Location: ../autori/listAllAuthors.php");
            include "../autori/listAllAuthors.php";
        }

        private function sanitiseInput($data)
        {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        function unesiAutora()
        {
            $dao = new DAOAutori();

            $ime = isset($_POST['ime']) ? $this->sanitiseInput($_POST['ime']) : "";
            $prezime = isset($_POST['prezime']) ? $this->sanitiseInput($_POST['prezime']) : "";
            $zemlja = isset($_POST['zemlja']) ? $this->sanitiseInput($_POST['zemlja']) : "";
            $bend = isset($_POST['bend']) ? $_POST['bend'] : "";
            $datum_pojavljivanja = isset($_POST['datum_pojavljivanja']) ? $_POST['datum_pojavljivanja'] : "";
            $ref_slika = isset($_POST['ref_slika']) ? $this->sanitiseInput($_POST['ref_slika']) : "";

            if(!empty($ime) && !empty($datum_pojavljivanja) && !empty($zemlja) && !empty($ref_slika))
            {
                $dao->insertAutor($ime, $prezime, $zemlja, $bend, $datum_pojavljivanja, $ref_slika);
                $autori = $dao->getAllAuthors();
                include "../autori/listAllAuthors.php";
            }
            else
            {
                $msg = "Popunite polja ime, datum pojavljivanja, zemlja porekla i slika autora!";
                include '../autori/addNewAuthor.php';
            }
        }
    }

?>