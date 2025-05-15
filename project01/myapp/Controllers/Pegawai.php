<?php
require_once 'Config/DB.php';

class Pegawai
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function index() {
        $stmt = $this->pdo->query("SELECT * FROM pegawai");
        return $stmt->fetchALL();
    }

    public function show($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM pegawai WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    public function create($data) {
        $stmt = $this->pdo->prepare("INSERT INTO pegawai (nip, nama, jenis_kelamin, jabatan) VALUES (?, ?, ?, ?)");
        return $stmt->execute([
            $data['nip'],
            $data['nama'],
            $data['jenis_kelamin'],
            $data['jabatan']
        ]);
    }

    public function update($id, $data) {
        $stmt = $this->pdo->prepare("UPDATE pegawai SET nip = ?, nama = ?, jenis_kelamin = ?, jabatan = ? WHERE id=?");
        return $stmt->execute([
            $data['nip'],
            $data['nama'],
            $data['jenis_kelamin'],
            $data['jabatan'],
            $id 
        ]);
    }

    public function delete($id) {
        $stmt = $this->pdo->prepare("DELETE FROM pegawai WHERE id = ?");
        return $stmt->execute([$id]);
    }
}

$pegawai = new Pegawai($pdo);