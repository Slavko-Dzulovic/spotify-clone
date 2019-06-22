<?php
require_once './DAOKorisnici.php';
require_once './controllerKorisnici.php';

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

    function hashPassword($lozinka)
    {
        $lozinka = md5($lozinka);
        return $lozinka;
    }

    function checkIfUserExist($korisnicko_ime, $email)
    {
        $dao = new DAOKorisnici();

        $exist = $dao->checkIfKorisnikExist($korisnicko_ime, $email);

        if($exist > 1)
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
        $ime = isset($_POST['ime'])? $_POST['ime'] : "";
        $prezime = isset($_POST['prezime'])? $_POST['prezime'] : "";
        $korisnicko_ime = isset($_POST['korisnicko_ime'])? $_POST['korisnicko_ime'] : "";
        $email = isset($_POST['email'])? $_POST['email'] : "";
        $pol = isset($_POST['pol'])? $_POST['pol'] : "";
        $datum_rodj = isset($_POST['datum_rodj'])? $_POST['datum_rodj'] : "";
        $lozinka = isset($_POST['lozinka'])? $_POST['lozinka'] : "";
        $premijum = isset($_POST['premijum'])? $_POST['premijum'] : "";

        if(!empty($ime) && !empty($prezime) && !empty($korisnicko_ime) && !empty($email) && !empty($pol) && !empty($datum_rodj) && !empty($lozinka) && !empty($premijum))
        {
            $ct = new controllerKorisnici();
            if($ct->checkIfUserExist($korisnicko_ime, $email) == 0)
            {
                if (count_chars($lozinka) > 8) {
                    $lozinka = $ct->hashPassword($lozinka);

                    $dao = new DAOKorisnici();

                    $dao->insertKorisnik($ime, $prezime, $korisnicko_ime, $email, $pol, $datum_rodj, $lozinka, $premijum);

                    include './viewCompleteRegister.php';
                }
            } else
            {
                $msg = "Korisnik vec postoji!";
                include 'viewRegisterUser.php';
            }
        }

    }
}