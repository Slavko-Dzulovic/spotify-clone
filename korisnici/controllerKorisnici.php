<?php
require_once './DAOKorisnici.php';

class controllerKorisnici
{

    function gotoComplete()
    {
        include './viewCompleteRegister.php';
    }

    function gotoRegister()
    {
        include './viewRegisterUser.php';
    }

    private function hashPassword($lozinka)
    {
        $lozinka = md5($lozinka);
        return $lozinka;
    }

    private function checkIfUserExist($korisnicko_ime, $email)
    {
        $dao = new DAOKorisnici();

        $exist = $dao->checkIfKorisnikExist($korisnicko_ime, $email);

        if($exist >= 1)
        {
            return 1;
        }
        else
        {
            return 0;
        }
    }


    function registerUser()
    {
        $dao = new DAOKorisnici();
        $ct = new controllerKorisnici();

        $ime = isset($_POST['ime'])? $this->sanitiseInput($_POST['ime']) : "";
        $prezime = isset($_POST['prezime'])? $this->sanitiseInput($_POST['prezime']) : "";
        $korisnicko_ime = isset($_POST['korisnicko_ime'])? $this->sanitiseInput($_POST['korisnicko_ime']) : "";
        $email = isset($_POST['email'])? $this->sanitiseInput($_POST['email']) : "";
        $pol = isset($_POST['pol'])? $this->sanitiseInput($_POST['pol']) : "";
        $datum_rodj = isset($_POST['datum_rodj'])? $this->sanitiseInput($_POST['datum_rodj']) : "";
        $lozinka = isset($_POST['lozinka'])? $this->sanitiseInput($_POST['lozinka']) : "";
        $premijum = isset($_POST['premijum'])? $_POST['premijum'] : "";

        if(!empty($ime) && !empty($prezime) && !empty($korisnicko_ime) && !empty($email) && !empty($pol) && !empty($datum_rodj) && !empty($lozinka) && !empty($premijum))
        {
            $userExist = $ct->checkIfUserExist($korisnicko_ime, $email);
            if($userExist == 0)
            {
                if (strlen($lozinka) > 8)
                {
                    if(filter_var($email, FILTER_VALIDATE_EMAIL))
                    {
                        $lozinka = $ct->hashPassword($lozinka);

                        $dao = new DAOKorisnici();
                        $dao->insertKorisnik($ime, $prezime, $korisnicko_ime, $email, $pol, $datum_rodj, $lozinka, $premijum);

                        include './viewCompleteRegister.php';
                    }
                    else
                    {
                        $msg = "Pogresan format mejl adrese!";
                        include './viewRegisterUser.php';
                    }
                }
                else
                {
                    $msg = "Sifra prekratka!";
                    include './viewRegisterUser.php';
                }
            }
            else
            {
                var_dump($this->checkIfUserExist($korisnicko_ime, $email));
                var_dump($dao->checkIfKorisnikExist($korisnicko_ime, $email));
                $msg = "Korisnik vec postoji!";
                include './viewRegisterUser.php';
            }
        }
        else
        {
            $msg = "NISTE POPUNILI SVA POLJA!";
            include './viewRegisterUser.php';
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