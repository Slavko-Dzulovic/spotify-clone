<?php
require_once '../config/db.php';


class DAOKorisnici
{
    private $db;

    private $INSERTKORISNIK = "INSERT INTO korisnici(ime, prezime, korisnicko_ime, mejl, pol, datum_rodj, lozinka, premijum, admin) VALUES (?,?,?,?,?,?,?,?,0)";
    private $SELECTIFKORISNIKEXIST = "SELECT * FROM korisnici WHERE korisnicko_ime = ? OR mejl = ?";


    public function __construct()
    {
        $this->db = DB::createInstance();
    }

    public function insertKorisnik($ime, $prezime, $korisnicko_ime, $email, $pol, $datum_rodj, $lozinka, $premijum)
    {
        $statement = $this->db->prepare($this->INSERTKORISNIK);
        $statement->bindValue(1, $ime);
        $statement->bindValue(2, $prezime);
        $statement->bindValue(3, $korisnicko_ime);
        $statement->bindValue(4, $email);
        $statement->bindValue(5, $pol);
        $statement->bindValue(6, $datum_rodj);
        $statement->bindValue(7, $lozinka);
        $statement->bindValue(8, $premijum);

        $statement->execute();
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