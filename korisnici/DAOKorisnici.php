<?php
require_once '../config/db.php';


class DAOKorisnici
{
    private $db;

    public function __construct()
    {
        $this->db = DB::createInstance();
    }
}