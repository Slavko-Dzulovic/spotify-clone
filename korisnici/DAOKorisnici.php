<?php
require_once '../config/db.php';


class DAOKorisnici
{
    private $db;

    private $INSERTKORISNIK = "INSERT INTO korisnici(ime, prezime, korisnicko_ime, mejl, pol, datum_rodj, lozinka, premijum, admin) VALUES (?,?,?,?,?,?,?,?,0)";
    private $SELECTIFKORISNIKEXIST = "SELECT COUNT(*) FROM korisnici WHERE korisnicko_ime = ? OR mejl = ?";


    public function __construct()
    {
        $this->db = DB::createInstance();
    }

    public function insertKorisnik($ime, $prezime, $korisnicko_ime, $email, $pol, $datum_rodj, $lozinka, $premijum)
    {
        $statment = $this->db->prepare($this->INSERTKORISNIK);
        $statment->bindValue(1, $ime);
        $statment->bindValue(2, $prezime);
        $statment->bindValue(3, $korisnicko_ime);
        $statment->bindValue(4, $email);
        $statment->bindValue(5, $pol);
        $statment->bindValue(6, $datum_rodj);
        $statment->bindValue(7, $lozinka);
        $statment->bindValue(8, $premijum);

        $statment->execute();
    }

    public function checkIfKorisnikExist($korisnicko_ime, $mejl)
    {
        $statment = $this->db->prepare($this->SELECTIFKORISNIKEXIST);
        $statment->bindValue(1, $korisnicko_ime);
        $statment->bindValue(2, $mejl);

        $statment->execute();

        $result = $statment->fetch();
        return $result;
    }
}