<?php
require_once '../config/db.php';

class DAOZanrovi
{
	private $db;

	private $INSERTZANR = "INSERT INTO zanrovi (naziv) VALUES (?)";
	private $GETALLZANROVI = "SELECT * FROM zanrovi";
	
	public function __construct()
	{
		$this->db = DB::createInstance();
	}

	public function insertZanr($naziv)
	{
		$statement = $this->db->prepare($this->INSERTZANR);
		$statement->bindValue(1, $naziv);
		$statement->execute();
	}

	public function getAllZanrovi()
	{
		$statement = $this->db->prepare($this->GETALLZANROVI);

		$statement->execute();

		$result = $statement->fetchAll();
		return $result;
	}
}
?>
