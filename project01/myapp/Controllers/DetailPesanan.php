<?php
require_once 'Config/DB.php';

class DetailPesanan
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function index() {
        $stmt = $this->pdo->query("SELECT * FROM detail_pesanan");
        return $stmt->fetchAll();
    }

    public function show($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM detail_pesanan WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

   public function create($data) {
    try {
        $stmt = $this->pdo->prepare("INSERT INTO detail_pesanan (pesanan_id, produk_id, jumlah) VALUES (?, ?, ?)");
        return $stmt->execute([
            $data['pesanan_id'],
            $data['produk_id'],
            $data['jumlah'],
        ]);
    } catch (PDOException $e) {
        die("Error create: " . $e->getMessage());
    }

}

public function update($id, $data) {
    $stmt = $this->pdo->prepare("UPDATE detail_pesanan SET pesanan_id = ?, produk_id = ?, jumlah = ? WHERE id=?");
    return $stmt->execute([
        $data['pesanan_id'],
        $data['produk_id'],
        $data['jumlah'],
        $id 
    ]);


    }

    public function delete($id) {
        $stmt = $this->pdo->prepare("DELETE FROM detail_pesanan WHERE id = ?");
        return $stmt->execute([$id]);
    }
}

$detail_pesanan = new DetailPesanan($pdo);