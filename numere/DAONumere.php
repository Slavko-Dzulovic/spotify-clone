<?php
require_once '../config/db.php';

class DAONumere
{
    private $db;

    private $GETALLNUMERE = "SELECT *, n.id as track_id FROM numere n JOIN metapodaci m ON n.metapodatak_id = m.id JOIN autori a JOIN pripadanje_autora pa ON n.id = pa.numera_id AND a.id = pa.autor_id;";
    private $GETNUMERABYID = "SELECT * FROM numere n JOIN metapodaci m ON n.metapodatak_id = m.id JOIN autori a JOIN pripadanje_autora pa ON n.id = pa.numera_id AND a.id = pa.autor_id WHERE n.id = ?;";
    private $GETNUMEREBYZANR = "SELECT * FROM numere n JOIN metapodaci m ON n.metapodatak_id = m.id JOIN autori a JOIN pripadanje_autora pa ON n.id = pa.numera_id AND a.id = pa.autor_id WHERE zanr_id = ?;";

    private $GETALLALBUMSANDSONGSBYAUTOR = "SELECT a.id as a_id, a.naziv as album_naziv, au.ref_slika as ref_slika, au.ime, au.prezime, m.ref_omot, au.id as au_id FROM albumi a JOIN autori au on au.id = a.autor_id JOIN numere n JOIN metapodaci m on n.metapodatak_id = m.id AND  a.id = n.album_id  WHERE a.id = ? GROUP BY a.id;";
    private $GETNUMERABYALBUM = "SELECT *, n.id as track_id FROM numere n JOIN metapodaci m ON n.metapodatak_id = m.id JOIN autori a JOIN pripadanje_autora pa ON n.id = pa.numera_id AND a.id = pa.autor_id WHERE n.album_id = ? ORDER BY n.album_id;";

    private $GETALLNUMEREZANRALBUM = "SELECT n.id, n.naziv, n.duzina_trajanja, n.datum_objavljivanja, z.naziv AS 'zanr', a.naziv AS 'album', aut.ime AS 'ime_autora' FROM numere n JOIN zanrovi z ON n.zanr_id = z.id JOIN albumi a ON a.id = n.album_id JOIN pripadanje_autora pa ON pa.numera_id = n.id JOIN autori aut ON aut.id = pa.autor_id";

    private $INSERTINUSERPLAYLIST = "INSERT INTO pripadanje_plejlista(plejlista_id, numera_id) VALUES (?, ?); ";

    private $GETPLAYLISTBYUSER = "SELECT id FROM plejliste WHERE korinsik_id = ?;";

    private $INSERTMETAPODATAK = "INSERT INTO metapodaci(ref_fajla, ref_omot) VALUES(?, ?)";
    private $GETLASTMETAPODATAKID = "SELECT id FROM metapodaci ORDER BY id DESC LIMIT 1";

    private $INSERTNUMERA = "INSERT INTO numere(naziv, duzina_trajanja, datum_objavljivanja, album_id, metapodatak_id, zanr_id)";

    public function __construct()
    {
        $this->db = DB::createInstance();
    }

    public function getLastMetapodatakID()
    {
        $statement = $this->db->prepare($this->GETLASTMETAPODATAKID);
        $statement->execute();

        $result = $statement->fetch();
        return $result;
    }

    public function insertNumera($naziv, $duzina_trajanja, $datum_objavljivanja, $album_id, $metapodatak_id, $zanr_id)
    {
        $statement = $this->db->prepare($this->INSERTNUMERA);
        $statement->bindValue(1, $naziv);
        $statement->bindValue(2, $duzina_trajanja);
        $statement->bindValue(3, $datum_objavljivanja);
        $statement->bindValue(4, $album_id);
        $statement->bindValue(5, $metapodatak_id);
        $statement->bindValue(6, $zanr_id);



        $statement->execute();
    }

    public function insertMetapodatak($ref_fajla, $ref_omot)
    {
        $statement = $this->db->prepare($this->INSERTMETAPODATAK);
        $statement->bindValue(1, $ref_fajla);
        $statement->bindValue(2, $ref_omot);

        $statement->execute();
    }

    public function getAllNumere()
    {
        $statment = $this->db->prepare($this->GETALLNUMERE);
        $statment->execute();

        $result = $statment->fetchAll();
        return $result;
    }

    public function getAllNumereZanrAlbum()
    {
        $statment = $this->db->prepare($this->GETALLNUMEREZANRALBUM);
        $statment->execute();

        $result = $statment->fetchAll();
        return $result;
    }

    public function insertNumeraInUserPlaylist($id, $numera_id)
    {
        $statment = $this->db->prepare($this->INSERTINUSERPLAYLIST);
        $statment->bindValue(1, $id);
        $statment->bindValue(2, $numera_id);
        if($statment->execute())
        {
            return true;
        }
        else {
            echo "Nesto je poslo naopako!";
        }
    }

    public function getPlaylistByUser($id)
    {
        $statment = $this->db->prepare($this->GETPLAYLISTBYUSER);
        $statment->bindValue(1, $id);
        $statment->execute();

        $result = $statment->fetch();
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