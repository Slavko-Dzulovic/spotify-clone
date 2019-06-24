<?php
require_once '../config/db.php';


class DAOKorisnici
{
    private $db;

    private $INSERTKORISNIK = "INSERT INTO korisnici(ime, prezime, korisnicko_ime, mejl, pol, datum_rodj, lozinka, premijum, admin) VALUES (?,?,?,?,?,?,?,?,0)";
    private $SELECTIFKORISNIKEXIST = "SELECT * FROM korisnici WHERE korisnicko_ime = ? OR mejl = ?";
    private $SELECTALLKORISNICI = "SELECT * FROM korisnici";
    private $GRANTADMIN = "UPDATE korisnici SET admin = 1 WHERE id = ?";
    private $GRANTPREMIJUM = "UPDATE korisnici SET premijum = 1 WHERE id = ?";
    private $DELETEKORISNIK = "DELETE FROM korisnici WHERE id = ?";
    private $UPDATEKORISNIK = "UPDATE korisnici SET ime = ?, prezime = ?, korisnicko_ime = ?, mejl = ? WHERE ";


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

    public function getAllKorisnici()
    {
        $statement = $this->db->prepare($this->SELECTALLKORISNICI);

        $statement->execute();

        $result = $statement->fetchAll();
        return $result;
    }

    public function checkIfKorisnikExist($korisnicko_ime, $mejl)
    {
        $statement = $this->db->prepare($this->SELECTIFKORISNIKEXIST);
        $statement->bindValue(1, $korisnicko_ime);
        $statement->bindValue(2, $mejl);

        $statement->execute();

        $result = $statement->fetch();
        return $result;
    }

    public function checkIfKorisnikExistLogin($loginCredential)
    {
        $statement = $this->db->prepare($this->SELECTIFKORISNIKEXIST);
        $statement->bindValue(1, $loginCredential);
        $statement->bindValue(2, $loginCredential);

        $statement->execute();

        $result = $statement->fetch();
        return $result;
    }

    public function grantAdmin($id)
    {
        $statement = $this->db->prepare($this->GRANTADMIN);
        $statement->bindValue(1, $id);

        $statement->execute();
    }

    public function grantPremijum($id)
    {
        $statement = $this->db->prepare($this->GRANTPREMIJUM);
        $statement->bindValue(1, $id);

        $statement->execute();
    }

    public function deleteKorisnik($id)
    {
        $statement = $this->db->prepare($this->DELETEKORISNIK);
        $statement->bindValue(1, $id);

        $statement->execute();
    }

    public function updateKorisnik($id)
    {
        $statement = $this->db->prepare($this->DELETEKORISNIK);
        $statement->bindValue(1, $id);

        $statement->execute();
    }



}