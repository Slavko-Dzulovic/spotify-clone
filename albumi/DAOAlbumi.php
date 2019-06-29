<?php
require_once '../config/db.php';

class DAOAlbumi
{
    private $db;

    private $GETALLALBUMIANDAUTORI = "SELECT datum_izdavanja AS datum, alb.id AS id, aut.id AS aut_id, alb.naziv AS naziv, aut.ime AS ime, aut.prezime AS prezime FROM albumi alb JOIN autori aut ON aut.id = alb.autor_id";
    private $INSERTALBUM = "INSERT INTO albumi(naziv, autor_id, datum_izdavanja) VALUES(?, ?, ?)";

    public function __construct()
    {
        $this->db = DB::createInstance();
    }

    public function insertAlbum($naziv, $autor_id, $datum_izdavanja)
    {
        $statement = $this->db->prepare($this->INSERTALBUM);
        $statement->bindValue(1, $naziv);
        $statement->bindValue(2, $autor_id);
        $statement->bindValue(3, $datum_izdavanja);

        $statement->execute();
    }


    public function getAllAlbumiAndAutori()
    {
        $statment = $this->db->prepare($this->GETALLALBUMIANDAUTORI);
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
}