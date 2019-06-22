<?php


class Korisnik
{
    function __construct($ime, $prezime, $korisnicko_ime, $email, $pol, $datum_rodj, $lozinka, $premijum)
    {
        $this->ime = $ime;
        $this->prezime = $prezime;
        $this->korisnicko_ime = $korisnicko_ime;
        $this->email = $email;
        $this->pol = $pol;
        $this->datum_rodj = $datum_rodj;
        $this->lozinka = $lozinka;
        $this->premijum = $premijum;
    }
}

?>