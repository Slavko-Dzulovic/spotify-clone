<?php
require_once '../config/db.php';

class DAOPlejliste
{
    private $db;

    private $INSERTPLEJLISTA = "INSERT INTO plejliste(naziv, datum_azuriranja, korisnik_id, ref_slika) VALUES (?,?,?,'../assets/img/fav.jpg')";
    private $SELECTALLPLEJLISTE = "SELECT p.*, k.korisnicko_ime FROM plejliste p JOIN korisnici k ON p.korisnik_id = k.id";
    private $ADDTRACKTOPLAYLIST = "INSERT INTO pripadanje_plejlista(plejlista_id, numera_id) VALUES (?, ?)";
    private $PLAYLISTTRACKS = "SELECT p.id AS plej_id, p.naziv AS plej_naziv, n.id AS n_id, n.naziv AS n_naziv, a.ime AS ime, a.prezime AS prezime FROM plejliste p JOIN pripadanje_plejlista pp ON p.id = pp.plejlista_id JOIN numere n ON pp.numera_id = n.id JOIN pripadanje_autora pa ON n.id = pa.numera_id JOIN autori a ON a.id = pa.autor_id WHERE pp.plejlista_id = ?";

    public function __construct()
    {
        $this->db = DB::createInstance();
    }

    public function insertPlejlista($naziv, $datum_azuriranja, $korisnik_id)
    {
        $statement = $this->db->prepare($this->INSERTPLEJLISTA);
        $statement->bindValue(1, $naziv);
        $statement->bindValue(2, $datum_azuriranja);
        $statement->bindValue(3, $korisnik_id);

        $statement->execute();
    }

    public function getAllPlejliste()
    {
        $statement = $this->db->prepare($this->SELECTALLPLEJLISTE);

        $statement->execute();

        $result = $statement->fetchAll();
        return $result;
    }

    public function addTrackToPlaylist($plejlista_id, $numera_id)
    {
        $statement = $this->db->prepare($this->ADDTRACKTOPLAYLIST);
        $statement->bindValue(1, $plejlista_id);
        $statement->bindValue(2, $numera_id);

        $statement->execute();
    }

    public function viewPlaylistTracks($plejlista_id)
    {
        $statement = $this->db->prepare($this->PLAYLISTTRACKS);
        $statement->bindValue(1, $plejlista_id);

        $statement->execute();

        $result = $statement->fetchAll();
        return $result;
    }

}