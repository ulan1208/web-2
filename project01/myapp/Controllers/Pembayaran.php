<?php
require_once 'Config/DB.php';

class Pembayaran
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function index() {
        $stmt = $this->pdo->query("SELECT * FROM pembayaran");
        return $stmt->fetchALL();
    }

    public function show($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM pembayaran WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    public function create($data) {
        $stmt = $this->pdo->prepare("INSERT INTO pembayaran (jumlah_bayar, tanggal, pesanan_id) VALUES (?, ?, ?)");
        return $stmt->execute([
            $data['jumlah_bayar'],
            $data['tanggal'],
            $data['pesanan_id']
        ]);
    }

    public function update($id, $data) {
        $stmt = $this->pdo->prepare("UPDATE pembayaran SET jumlah_bayar = ?, tanggal = ?, pesanan_id = ? WHERE id=?");
        return $stmt->execute([
            $data['jumlah_bayar'],
            $data['tanggal'],
            $data['pesanan_id'],
            $id 
        ]);
    }

    public function delete($id) {
        $stmt = $this->pdo->prepare("DELETE FROM pembayaran WHERE id = ?");
        return $stmt->execute([$id]);
    }
}

$pembayaran = new Pembayaran($pdo);