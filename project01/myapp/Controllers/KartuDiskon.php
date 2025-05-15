<?php
require_once 'Config/DB.php';

class KartuDiskon
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function index() {
        $stmt = $this->pdo->query("SELECT * FROM kartu_diskon");
        return $stmt->fetchALL();
    }

    public function show($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM kartu_diskon WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    public function create($data) {
        $stmt = $this->pdo->prepare("INSERT INTO kartu_diskon (nama, deskripsi, persen_diskon) VALUES (?, ?, ?)");
        return $stmt->execute([
            $data['nama'],
            $data['deskripsi'],
            $data['persen_diskon'],
        ]);
    }

    public function update($id, $data) {
        $stmt = $this->pdo->prepare("UPDATE kartu_diskon SET nama = ?, deskripsi = ? , persen_diskon = ? WHERE id=?");
        return $stmt->execute([
            $data['nama'],
            $data['deskripsi'],
            $data['persen_diskon'],
            $id 
        ]);
    }

    public function delete($id) {
        $stmt = $this->pdo->prepare("DELETE FROM kartu_diskon WHERE id = ?");
        return $stmt->execute([$id]);
    }
}

$kartudiskon = new KartuDiskon($pdo);