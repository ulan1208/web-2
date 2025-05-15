<?php
require_once 'Config/DB.php';

class Pesanan
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function index() {
        $stmt = $this->pdo->query("SELECT * FROM pesanan");
        return $stmt->fetchALL();
    }

    public function show($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM pesanan WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    public function create($data) {
        $stmt = $this->pdo->prepare("INSERT INTO pesanan (tanggal, diskon, status_bayar, anggota_id) VALUES (?, ?, ?, ?)");
        return $stmt->execute([
            $data['tanggal'],
            $data['diskon'],
            $data['status_bayar'],
            $data['anggota_id']
        ]);
    }

    public function update($id, $data) {
        $stmt = $this->pdo->prepare("UPDATE pesanan SET tanggal = ?, diskon = ?, status_bayar = ?, anggota_id = ? WHERE id=?");
        return $stmt->execute([
            $data['tanggal'],
            $data['diskon'],
            $data['status_bayar'],
            $data['anggota_id'],
            $id 
        ]);
    }

    public function delete($id) {
        $stmt = $this->pdo->prepare("DELETE FROM pesanan WHERE id = ?");
        return $stmt->execute([$id]);
    }
}

$pesanan = new Pesanan($pdo);