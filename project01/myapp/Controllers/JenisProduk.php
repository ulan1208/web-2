<?php
require_once 'Config/DB.php';

class JenisProduk
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function index() {
        $stmt = $this->pdo->query("SELECT * FROM jenis_produk");
        return $stmt->fetchALL();
    }

    public function show($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM jenis_produk WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    public function create($data) {
        $stmt = $this->pdo->prepare("INSERT INTO jenis_produk (nama, deskripsi) VALUES (?, ?)");
        return $stmt->execute([
            $data['nama'],
            $data['deskripsi'],
        ]);
    }

    public function update($id, $data) {
        $stmt = $this->pdo->prepare("UPDATE jenis_produk SET nama = ?, deskripsi = ? WHERE id = ?");
        return $stmt->execute([
            $data['nama'],
            $data['deskripsi'],
            $id 
        ]);
    }

    public function delete($id) {
        $stmt = $this->pdo->prepare("DELETE FROM jenis_produk WHERE id = ?");
        return $stmt->execute([$id]);
    }
}

$jenisproduk = new JenisProduk($pdo);