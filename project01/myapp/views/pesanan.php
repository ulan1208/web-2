<div class="container">
    <div class="card">
        <div class="card-body">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default">
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
                                    <label for="pesanan">Kode</label>
                                    <input type="text" name="pesanan" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="nama">Nama</label>
                                    <input type="text" name="nama" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                    <input type="text" name="alamat" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="telpon">Telpon</label>
                                    <input type="text" name="telpon" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="ketua">Ketua</label>
                                    <input type="text" name="ketua" class="form-control" required>
                                </div>
                                <input type="hidden" name="type" value="tambah">
                            </div>
                            <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!-- /.modal -->
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Diskon</th>
                        <th>Status Bayar</th>
                        <th>Anggota</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    require_once("Controllers/Pesanan.php");
                    $row = $pesanan->index();
                    $nomor = 1;
                    foreach ($row as $item):    
                    ?>
                        <tr>
                            <td><?= $nomor++ ?></td>
                            <td><?= $item['pesanan'] ?></td>
                            <td><?= $item['nama'] ?></td>
                            <td><?= $item['alamat'] ?></td>
                            <td><?= $item['telpon'] ?></td>
                            <td><?= $item['ketua'] ?></td>
                            <td>
                                <form method="post">
                                    <input type="hidden" name="id" value="<?= $item['id'] ?>">
                                    <input type="hidden" name="type" value="delete">
                                    <input type="submit" value="delete" class="btn btn-danger btn-sm">
                                </form>
                                <a href="?url=detail&id=<?= $item['id'] ?>" class="btn btn-info btn-sm">Show</a>
                                <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modal-edit-<?= $item['id'] ?>">Edit</button>
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
                                            <label for="pesanan">Kode</label>
                                            <input type="text" name="pesanan" class="form-control" value="<?= $item['pesanan'] ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="nama">Nama</label>
                                            <input type="text" name="nama" class="form-control" value="<?= $item['nama'] ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="alamat">Alamat</label>
                                            <input type="text" name="alamat" class="form-control" value="<?= $item['alamat'] ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="telpon">Telpon</label>
                                            <input type="text" name="telpon" class="form-control" value="<?= $item['telpon'] ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="ketua">Ketua</label>
                                            <input type="text" name="ketua" class="form-control" value="<?= $item['ketua'] ?>" required>
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
                                <!-- /.modal-content -->
                            </div>
                            <!-- /.modal-dialog -->
                        </div>
                    <?php
                    endforeach;
                    if (isset($_POST['type'])) {
                        if ($_POST['type'] == "delete") {
                            $pesanan->delete($_POST['id']);
                            echo '<script>alert("hapus berhasil")</script><meta http-equiv="refresh" content="0; url=?url=prodi">';
                        } elseif ($_POST['type'] == "tambah") {
                            $data = [
                                'pesanan' => $_POST['pesanan'],
                                'nama' => $_POST['nama'],
                                'alamat' => $_POST['alamat'],
                                'telpon' => $_POST['telpon'],
                                'ketua' => $_POST['ketua'],
                            ];
                            $prodi->create($data);
                            echo '<script>alert("tambah berhasil")</script><meta http-equiv="refresh" content="0; url=?url=prodi">';
                        } elseif ($_POST['type'] == "update") {
                            $data = [
                                'pesanan' => $_POST['pesanan'],
                                'nama' => $_POST['nama'],
                                'alamat' => $_POST['alamat'],
                                'telpon' => $_POST['telpon'],
                                'ketua' => $_POST['ketua'],
                            ];
                            $prodi->update($_POST['id'], $data);
                            echo '<script>alert("update berhasil")</script><meta http-equiv="refresh" content="0; url=?url=prodi">';
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>