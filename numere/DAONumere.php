<?php
require_once '../config/db.php';

class DAONumere
{
    private $db;

    private $GETALLNUMERE = "SELECT * FROM numere ORDER BY id ASC;";

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
}