<?php
require_once '../config/db.php';

class DAONumere
{
    private $db;

    private $GETALLNUMERE = "SELECT *, n.id as track_id FROM numere n JOIN metapodaci m ON n.metapodatak_id = m.id JOIN autori a JOIN pripadanje_autora pa ON n.id = pa.numera_id AND a.id = pa.autor_id;";
    private $GETNUMERABYID = "SELECT * FROM numere n JOIN metapodaci m ON n.metapodatak_id = m.id JOIN autori a JOIN pripadanje_autora pa ON n.id = pa.numera_id AND a.id = pa.autor_id WHERE n.id = ?;";
    private $GETNUMEREBYZANR = "SELECT * FROM numere n JOIN metapodaci m ON n.metapodatak_id = m.id JOIN autori a JOIN pripadanje_autora pa ON n.id = pa.numera_id AND a.id = pa.autor_id WHERE zanr_id = ?;";
    private $GETALLALBUMSANDSONGSBYAUTOR = "SELECT a.id as a_id, a.naziv as album_naziv, au.ref_slika as ref_slika, au.ime, au.prezime, m.ref_omot, au.id as au_id FROM albumi a JOIN autori au on au.id = a.autor_id JOIN numere n JOIN metapodaci m on n.metapodatak_id = m.id AND  a.id = n.album_id  WHERE a.id = ? GROUP BY a.id;";
    private $GETNUMERABYALBUM = "SELECT * FROM numere n JOIN metapodaci m ON n.metapodatak_id = m.id JOIN autori a JOIN pripadanje_autora pa ON n.id = pa.numera_id AND a.id = pa.autor_id WHERE n.album_id = ?;";

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

    public function getNumeraByAlbum($id)
    {
        $statment = $this->db->prepare($this->GETNUMERABYALBUM);
        $statment->bindValue(1, $id);
        $statment->execute();

        $result = $statment->fetchAll();
        return $result;
    }

    public function getAlbumAndNumereByAutorId($id)
    {
        $statment = $this->db->prepare($this->GETALLALBUMSANDSONGSBYAUTOR);
        $statment->bindValue(1, $id);
        $statment->execute();

        $result = $statment->fetchAll();
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