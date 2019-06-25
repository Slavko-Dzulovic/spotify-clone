<?php
require_once '../config/db.php';

class DAOAutori
{
	private $db;

	private $INSERTAUTOR = "INSERT INTO autori (ime, prezime, zemlja, bend, datum_pojavljivanja) VALUES (?, ?, ?, ?, ?)";
	private $DELETEAUTOR = "DELETE  FROM autori WHERE id = ?";
	private $SELECTBYID = "SELECT * FROM autori WHERE id = ?";
	private $GETALLAUTHORS = "SELECT * FROM autori";
	
	public function __construct()
	{
		$this->db = DB::createInstance();
	}

	public function insertAutor($ime, $prezime, $zemlja, $bend, $datum_pojavljivanja)
	{
		$statement = $this->db->prepare($this->INSERTAUTOR);
		$statement->bindValue(1, $ime);
		$statement->bindValue(2, $prezime);
		$statement->bindValue(3, $zemlja);
		$statement->bindValue(4, $bend);
		$statement->bindValue(5, $datum_pojavljivanja);
		
		$statement->execute();
	}

	public function deleteAutor($id)
	{
		$statement = $this->db->prepare($this->DELETEAUTOR);
		$statement->bindValue(1, $id);

		$statement->execute();
	}

	public function getAutorById($id)
	{
		$statement = $this->db->prepare($this->SELECTBYID);
		$statement->bindValue(1, $id);

		$statement->execute();

		$result = $statement->fetch();
		return $result;
	}

	public function getAllAuthors()
	{
		$statement = $this->db->prepare($this->GETALLAUTHORS);

		$statement->execute();

		$result = $statement->fetchAll();
		return $result;
	}
}
?>
