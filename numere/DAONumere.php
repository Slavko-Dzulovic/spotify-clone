<?php
require_once '../config/db.php';

class DAONumere
{
    private $db;

    private $GETALLNUMERE = "SELECT * FROM numere n JOIN metapodaci m ON n.metapodatak_id = m.id JOIN autori a JOIN pripadanje_autora pa ON n.id = pa.numera_id AND a.id = pa.autor_id ORDER BY id ASC;";
    private $GETNUMERABYID = "SELECT * FROM numere n JOIN metapodaci m ON n.metapodatak_id = m.id JOIN autori a JOIN pripadanje_autora pa ON n.id = pa.numera_id AND a.id = pa.autor_id WHERE n.id = ?;";
    private $GETNUMEREBYZANR = "SELECT * FROM numere n JOIN metapodaci m ON n.metapodatak_id = m.id JOIN autori a JOIN pripadanje_autora pa ON n.id = pa.numera_id AND a.id = pa.autor_id WHERE zanr_id = ?;";

    public function __construct()
    {
        $this->db = DB::createInstance();
    }

    public function getAllNumere()
    {
        $statment = $this->db->prepare($this->GETALLNUMERE);
        $statment->execute();

        $result = $statment->fetchAll();
        return $result;
    }

    public function getNumeraById($id)
    {
        $statment = $this->db->prepare($this->GETNUMERABYID);
        $statment->bindValue(1, $id);
        $statment->execute();

        $result = $statment->fetch();
        return $result;
    }

    public function getNumereByZanr($zanr)
    {
        $statment = $this->db->prepare($this->GETNUMEREBYZANR);
        $statment->bindValue(1, $zanr);
        $statment->execute();

        $result = $statment->fetchAll();
        return $result;
    }

}