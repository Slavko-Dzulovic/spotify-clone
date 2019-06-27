<?php
require_once '../config/db.php';

class DAOZanrovi
{
	private $db;

//	private $INSERTZANR = "INSERT INTO autori (ime, prezime, zemlja, bend, datum_pojavljivanja, ref_slika) VALUES (?, ?, ?, ?, ?, ?)";
//	private $DELETEAUTOR = "DELETE  FROM autori WHERE id = ?";
//	private $SELECTBYID = "SELECT * FROM autori WHERE id = ?";
	private $GETALLZANROVI = "SELECT * FROM zanrovi";
	
	public function __construct()
	{
		$this->db = DB::createInstance();
	}
//
//	public function insertAutor($ime, $prezime, $zemlja, $bend, $datum_pojavljivanja, $ref_slika)
//	{
//		$statement = $this->db->prepare($this->INSERTAUTOR);
//		$statement->bindValue(1, $ime);
//		$statement->bindValue(2, $prezime);
//		$statement->bindValue(3, $zemlja);
//		$statement->bindValue(4, $bend);
//		$statement->bindValue(5, $datum_pojavljivanja);
//		$statement->bindValue(6, $ref_slika);
//
//		$statement->execute();
//	}
//
//	public function deleteAutor($id)
//	{
//		$statement = $this->db->prepare($this->DELETEAUTOR);
//		$statement->bindValue(1, $id);
//
//		$statement->execute();
//	}
//
//	public function getAutorById($id)
//	{
//		$statement = $this->db->prepare($this->SELECTBYID);
//		$statement->bindValue(1, $id);
//
//		$statement->execute();
//
//		$result = $statement->fetch();
//		return $result;
//	}

	public function getAllZanrovi()
	{
		$statement = $this->db->prepare($this->GETALLZANROVI);

		$statement->execute();

		$result = $statement->fetchAll();
		return $result;
	}
}
?>
