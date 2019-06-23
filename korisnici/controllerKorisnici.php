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

    function gotoLogin()
    {
        include "./viewLoginUser.php";
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



    function loginUser()
    {
        $ck = new controllerKorisnici();
        $dao = new DAOKorisnici();

        $loginCredential = isset($_POST['loginCredential']) ? $this->sanitiseInput($_POST['loginCredential']) : "";
        $lozinka = isset($_POST['lozinka']) ? $this->sanitiseInput($_POST['lozinka']) : "";
        $remember_user = isset($_POST['remember_user']) ? $_POST['remember_user'] : "";

        if(!empty($loginCredential) && !empty($lozinka))
        {
            $lozinka = $this->hashPassword($lozinka);
            $postojeciKorisnik = $dao->checkIfKorisnikExistLogin($loginCredential);

            if(($loginCredential == $postojeciKorisnik['korisnicko_ime'] || $loginCredential == $postojeciKorisnik['mejl']) && $lozinka == $postojeciKorisnik['lozinka'])
            {
                session_start();
                if(isset($_SESSION['loggedIn']))
                {
                    unset($_SESSION['loggedIn']);
                    $_SESSION['loggedIn']['loginCredential'] = $loginCredential;
                    $_SESSION['loggedIn']['lozinka'] = $lozinka;
                    $id = $postojeciKorisnik['id'];

                    if($remember_user == "Yes")
                    {
                        $toCookie = array($_SESSION["loggedIn"]['loginCredential']);
                        $json = json_encode($toCookie);
                        setcookie("json_cookie", $json, time() + (3600), "/");
                    }
                    else
                    {
                        setcookie("json_cookie", "", time()-3600, "/");
                    }

                    if($postojeciKorisnik['admin']==1)
                    {
                        header('Location:./?action=dashAdmin');
                    }
                    else
                    {
                        header('Location:./?action=dash');
                    }
                }
                else
                {
                    $_SESSION['loggedIn']['loginCredential'] = $loginCredential;
                    $_SESSION['loggedIn']['lozinka'] = $lozinka;
                    $id = $postojeciKorisnik['id'];

                    if($remember_user == "Yes")
                    {
                        $toCookie = array($_SESSION["loggedIn"]['loginCredential']);
                        $json = json_encode($toCookie);
                        setcookie("json_cookie", $json, time() + (3600), "/");
                    }
                    else
                    {
                        setcookie("json_cookie", "", time()-3600, "/");
                    }

                    if($postojeciKorisnik['admin']==1)
                    {
                        header('Location:./?action=dashAdmin');
                    }
                    else
                    {
                        header('Location:./?action=dash');
                    }
                }
            }
            else
            {
                $msg = "Pogrešno korisničko ime ili lozinka!";
                include './viewLoginUser.php';
            }
        }
        else
        {
            $msg = "Popunite sva polja!";
            include './viewLoginUser.php';
        }
    }


    function logoutUser()
    {
        session_start();
        if(isset($_SESSION['loggedIn']))
        {
            session_destroy();
            unset($_SESSION['loggedIn']);
            include './viewLoginUser.php';
        }
        else
        {
            include './viewLoginUser.php';
        }
    }


    function registerUser()
    {
        $dao = new DAOKorisnici();
        $ck = new ControllerKorisnici();

        $ime = isset($_POST['ime'])? $this->sanitiseInput($_POST['ime']) : "";
        $prezime = isset($_POST['prezime'])? $this->sanitiseInput($_POST['prezime']) : "";
        $korisnicko_ime = isset($_POST['korisnicko_ime'])? $this->sanitiseInput($_POST['korisnicko_ime']) : "";
        $email = isset($_POST['email'])? $this->sanitiseInput($_POST['email']) : "";
        $pol = isset($_POST['pol'])? $this->sanitiseInput($_POST['pol']) : "";
        $datum_rodj = isset($_POST['datum_rodj'])? $this->sanitiseInput($_POST['datum_rodj']) : "";
        $lozinka = isset($_POST['lozinka'])? $this->sanitiseInput($_POST['lozinka']) : "";
        $lozinkapotvrda = isset($_POST['lozinkapotvrda'])? $this->sanitiseInput($_POST['lozinkapotvrda']) : "";
        $premijum = isset($_POST['premijum'])? $_POST['premijum'] : "";

        if($premijum == "on")
        {
            $premijum = 1;
        }
        else $premijum = 0;

        if(!empty($ime) && !empty($prezime) && !empty($korisnicko_ime) && !empty($email) && !empty($pol) && !empty($datum_rodj) && !empty($lozinka))
        {
            $userExist = $ck->checkIfUserExist($korisnicko_ime, $email);
            if($userExist == 0)
            {
                if (strlen($lozinka) > 8)
                {
                    if($lozinka==$lozinkapotvrda)
                    {
                        if(filter_var($email, FILTER_VALIDATE_EMAIL))
                        {
                            $lozinka = $ck->hashPassword($lozinka);

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
                        $msg = "Lozinke se ne poklapaju!";
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