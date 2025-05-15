<?php
require_once 'Config/DB.php';

class Anggota
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function index()
    {
        $stmt = $this->pdo->query("SELECT * FROM anggota");
        return $stmt->fetchAll();
    }

    public function show($id)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM anggota WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    public function create($data)
    {
        $stmt = $this->pdo->prepare("INSERT INTO anggota (status_aktif, pegawai_id, kartu_diskon_id) VALUES (?, ?, ?)");
        return $stmt->execute([
            $data['status_aktif'],
            $data['pegawai_id'],
            $data['kartu_diskon_id'],
        ]);
    }


    public function update($id, $data)
    {
        $stmt = $this->pdo->prepare("UPDATE anggota SET status_aktif = ?, pegawai_id = ?, kartu_diskon_id = ? WHERE id = ?");
        return $stmt->execute([
            $data['status_aktif'],
            $data['pegawai_id'],
            $data['kartu_diskon_id'],
            $id
        ]);
    }

    public function delete($id)
    {
        $stmt = $this->pdo->prepare("DELETE FROM anggota WHERE id = ?");
        return $stmt->execute([$id]);
    }
}


$anggota = new Anggota($pdo);
