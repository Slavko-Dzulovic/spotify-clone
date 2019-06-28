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

    private $GETPLAYLISTBYUSER = "SELECT id FROM plejliste WHERE korisnik_id = ?;";

    private $INSERTMETAPODATAK = "INSERT INTO metapodaci(ref_fajla, ref_omot) VALUES(?, ?)";
    private $GETLASTMETAPODATAKID = "SELECT id FROM metapodaci ORDER BY id DESC LIMIT 1";
    private $GETLASTNUMERAID = "SELECT id FROM numere ORDER BY id DESC LIMIT 1";

    private $INSERTNUMERA = "INSERT INTO numere(naziv, duzina_trajanja, datum_objavljivanja, album_id, metapodatak_id, zanr_id) VALUES (?, ?, ?, ?, ?, ?)";
    private $INSERTPRIPADANJEAUTORA = "INSERT INTO pripadanje_autora(numera_id, autor_id, uloga) VALUES (?, ?, ?)";

    private $GETALLALBUMS = "SELECT * FROM albumi;";
    private $GETALLARTISTS = "SELECT * FROM autori;";
    private $GETALLPLAYLISTS = "SELECT *, p.id as playlist_id FROM plejliste p JOIN korisnici k ON p.korisnik_id = k.id;";

    private $GETALLNUMEREBYPLAYLIST = "SELECT *, n.id as track_id FROM numere n JOIN pripadanje_plejlista pp ON n.id = pp.numera_id  JOIN autori a JOIN pripadanje_autora pa ON n.id = pa.numera_id AND a.id = pa.autor_id JOIN metapodaci m on n.metapodatak_id = m.id WHERE pp.plejlista_id = ?";
    private $GETPLAYLISTBYID = "SELECT *, p.id as plejlista_id FROM plejliste p JOIN korisnici k ON p.korisnik_id = k.id WHERE p.id = ?";

    private $DELETENUMERAFROMPLAYLIST = "DELETE FROM pripadanje_plejlista WHERE plejlista_id = ? AND numera_id = ?";

    private $GETPLAYLISTBYKORISNIK = "SELECT * FROM plejliste WHERE korisnik_id = ?;";

    private $GETNUMEREADDEDTOFAVOURITE = "SELECT pp.numera_id as numera_id FROM pripadanje_plejlista pp JOIN plejliste p on p.id = pp.plejlista_id WHERE p.korisnik_id = ?";

    public function __construct()
    {
        $this->db = DB::createInstance();
    }

    public function deleteNumeraFromPlaylist($playlist_id, $numera_id)
    {
        $statement = $this->db->prepare($this->DELETENUMERAFROMPLAYLIST);
        $statement->bindValue(1, $playlist_id);
        $statement->bindValue(2, $numera_id);

        $statement->execute();
    }

    public function getPlaylistByKorisnik($id)
    {
        $statment = $this->db->prepare($this->GETPLAYLISTBYKORISNIK);
        $statment->bindValue(1, $id);
        $statment->execute();

        $result = $statment->fetch();
        return $result;
    }

    public function getNumereByPlaylist($id)
    {
        $statment = $this->db->prepare($this->GETALLNUMEREBYPLAYLIST);
        $statment->bindValue(1, $id);
        $statment->execute();

        $result = $statment->fetchAll();
        return $result;
    }

    public function getFavouriteNumere($id)
    {
        $statment = $this->db->prepare($this->GETNUMEREADDEDTOFAVOURITE);
        $statment->bindValue(1, $id);
        $statment->execute();

        $result = $statment->fetchAll();
        return $result;
    }

    public function getPlaylistById($id)
    {
        $statment = $this->db->prepare($this->GETPLAYLISTBYID);
        $statment->bindValue(1, $id);
        $statment->execute();

        $result = $statment->fetch();
        return $result;
    }

    public function getAllAlbumi()
    {
        $statment = $this->db->prepare($this->GETALLALBUMS);
        $statment->execute();

        $result = $statment->fetchAll();
        return $result;
    }

    public function getAllAutori()
    {
        $statment = $this->db->prepare($this->GETALLARTISTS);
        $statment->execute();

        $result = $statment->fetchAll();
        return $result;
    }

    public function getAllPlejliste()
    {
        $statment = $this->db->prepare($this->GETALLPLAYLISTS);
        $statment->execute();

        $result = $statment->fetchAll();
        return $result;
    }

    public function getLastMetapodatakID()
    {
        $statement = $this->db->prepare($this->GETLASTMETAPODATAKID);
        $statement->execute();

        $result = $statement->fetch();
        return $result;
    }

    public function getLastNumeraID()
    {
        $statement = $this->db->prepare($this->GETLASTNUMERAID);
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

    public function insertPripadanjeAutora($numera_id, $autor_id, $uloga)
    {
        $statement = $this->db->prepare($this->INSERTPRIPADANJEAUTORA);
        $statement->bindValue(1, $numera_id);
        $statement->bindValue(2, $autor_id);
        $statement->bindValue(3, $uloga);

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
        if ($statment->execute()) {
            return true;
        } else {
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