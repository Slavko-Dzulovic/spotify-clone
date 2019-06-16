<?php
require_once '../config/db.php';

class DAONumere
{
    private $db;

    private $GETALLNUMERE = "SELECT * FROM numere ORDER BY id ASC;";
    private $GETNUMERABYID = "SELECT * FROM numere WHERE id = ?";

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

}