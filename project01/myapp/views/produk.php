<div class="container">
    <div class="card">
        <div class="card-body">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal-default">
                Tambah Data
            </button>
            <div class="modal fade" id="modal-default">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Form Tambah Data </h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form method="post">
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="kode">Kode</label>
                                    <input type="text" name="kode" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="nama">Nama</label>
                                    <input type="text" name="nama" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="nama_produk">Nama Produk</label>
                                    <input type="text" name="nama_produk" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="deskripsi">Deskripsi</label>
                                    <input type="text" name="deskripsi" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="harga">Harga</label>
                                    <input type="text" name="harga" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="stok">Stok</label>
                                    <input type="text" name="stok" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="jenis_produk_id">Jenis Produk</label>
                                    <select name="jenis_produk_id" class="form-control" required>
                                        <option value="">-- Pilih Jenis Produk --</option>
                                        <?php
                                        require_once("Controllers/JenisProduk.php");
                                        $datajenisproduk = $jenisproduk->index();
                                        foreach ($datajenisproduk as $jk):
                                        ?>
                                            <option value="<?= $jk['id'] ?>"><?= $jk['nama'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <input type="hidden" name="type" value="tambah">
                            </div>
                            <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode</th>
                        <th>Nama</th>
                        <th>Nama Produk</th>
                        <th>Deskripsi</th>
                        <th>Harga</th>
                        <th>Stok</th>
                        <th>Jenis Produk</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    require_once("Controllers/Produk.php");
                    $row = $produk->index();
                    $nomor = 1;
                    foreach ($row as $item):
                    ?>
                        <tr>
                            <td><?= $nomor++ ?></td>
                            <td><?= $item['kode'] ?></td>
                            <td><?= $item['nama'] ?></td>
                            <td><?= $item['nama_produk'] ?></td>
                            <td><?= $item['deskripsi'] ?></td>
                            <td><?= $item['harga'] ?></td>
                            <td><?= $item['stok'] ?></td>
                            <td><?= $item['jenis_produk_id'] ?></td>
                            <td>
                                <form method="post" style="display:inline;">
                                    <input type="hidden" name="id" value="<?= $item['id'] ?>">
                                    <input type="hidden" name="type" value="delete">
                                    <input type="submit" value="delete" class="btn btn-danger btn-sm">
                                </form>
                                <a href="?url=detail&id=<?= $item['id'] ?>" class="btn btn-info btn-sm">Show</a>
                                <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#modal-edit-<?= $item['id'] ?>">Edit</button>
                            </td>
                        </tr>
                        <div class="modal fade" id="modal-edit-<?= $item['id'] ?>">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Form Edit Data </h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form method="post">
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="kode">Kode</label>
                                                <input type="text" name="kode" class="form-control" value="<?= $item['kode'] ?>" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="nama">Nama</label>
                                                <input type="text" name="nama" class="form-control" value="<?= $item['nama'] ?>" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="nama_produk">Nama Produk</label>
                                                <input type="text" name="nama_produk" class="form-control" value="<?= $item['nama_produk'] ?>" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="deskripsi">Deskripsi</label>
                                                <input type="text" name="deskripsi" class="form-control" value="<?= $item['deskripsi'] ?>" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="harga">Harga</label>
                                                <input type="text" name="harga" class="form-control" value="<?= $item['harga'] ?>" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="stok">Stok</label>
                                                <input type="text" name="stok" class="form-control" value="<?= $item['stok'] ?>" required>
                                            </div>
                                            <input type="hidden" name="id" value="<?= $item['id'] ?>">
                                            <input type="hidden" name="type" value="update">
                                        </div>
                                        <div class="modal-footer justify-content-between">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    <?php
                    endforeach;

                    if (isset($_POST['type'])) {
                        if ($_POST['type'] == "delete") {
                            $produk->delete($_POST['id']);
                            echo '<script>alert("hapus berhasil")</script><meta http-equiv="refresh" content="0; url=?url=produk">';
                        } elseif ($_POST['type'] == "tambah") {
                            $data = [
                                'kode' => $_POST['kode'],
                                'nama' => $_POST['nama'],
                                'nama_produk' => $_POST['nama_produk'],
                                'deskripsi' => $_POST['deskripsi'],
                                'harga' => $_POST['harga'],
                                'stok' => $_POST['stok'],
                                'jenis_produk_id' => $_POST['jenis_produk_id']
                            ];
                            $produk->create($data);
                            echo '<script>alert("tambah berhasil")</script><meta http-equiv="refresh" content="0; url=?url=produk">';
                        } elseif ($_POST['type'] == "update") {
                            $data = [
                                'kode' => $_POST['kode'],
                                'nama' => $_POST['nama'],
                                'nama_produk' => $_POST['nama_produk'],
                                'deskripsi' => $_POST['deskripsi'],
                                'harga' => $_POST['harga'],
                                'stok' => $_POST['stok']
                            ];
                            $produk->update($_POST['id'], $data);
                            echo '<script>alert("update berhasil")</script><meta http-equiv="refresh" content="0; url=?url=produk">';
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
