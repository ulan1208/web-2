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
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form method="post">
                            <div class="modal-body">
                                <div class="form-group">
                                    <label>Status Aktif</label>
                                    <input type="text" name="status_aktif" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="pegawai_id">Pegawai</label>
                                    <select name="pegawai_id" class="form-control" required>
                                        <option value="">-- Pilih Pegawai --</option>
                                        <?php
                                        require_once("Controllers/Pegawai.php");
                                        $datapegawai = $pegawai->index();
                                        foreach ($datapegawai as $p):
                                        ?>
                                            <option value="<?= $p['id'] ?>"><?= $p['nama'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="kartu_diskon_id">Kartu Diskon</label>
                                    <select name="kartu_diskon_id" class="form-control" required>
                                        <option value="">-- Pilih Kartu Diskon --</option>
                                        <?php
                                        require_once("Controllers/KartuDiskon.php");
                                        $datakartudiskon = $kartudiskon->index();
                                        foreach ($datakartudiskon as $k):
                                        ?>
                                            <option value="<?= $k['id'] ?>"><?= $k['nama'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <input type="hidden" name="type" value="tambah">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
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
                        <th>Status Aktif</th>
                        <th>Pegawai</th>
                        <th>Kartu Diskon</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    require_once("Controllers/Anggota.php");
                    $row = $anggota->index();
                    $nomor = 1;
                    foreach ($row as $item):
                    ?>
                        <tr>
                            <td><?= $nomor++ ?></td>
                            <td><?= $item['status_aktif'] ?></td>
                            <td><?= $item['pegawai_id'] ?></td>
                            <td><?= $item['kartu_diskon_id'] ?></td>
                            <td>
                                <form method="post">
                                    <input type="hidden" name="id" value="<?= $item['id'] ?>">
                                    <input type="hidden" name="type" value="delete">
                                    <input type="submit" value="delete" class="btn btn-danger btn-sm">
                                </form>
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
                                                <label for="status_aktif">Status Aktif</label>
                                                <input type="text" name="status_aktif" class="form-control" value="<?= $item['status_aktif'] ?>" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="pegawai_id">Pegawai Id</label>
                                                <input type="text" name="pegawai_id" class="form-control" value="<?= $item['pegawai_id'] ?>" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="kartu_diskon_id">Kartu Diskon Id</label>
                                                <input type="text" name="kartu_diskon_id" class="form-control" value="<?= $item['kartu_diskon_id'] ?>" required>
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
                            $anggota->delete($_POST['id']);
                            echo '<script>alert("hapus berhasil")</script><meta http-equiv="refresh" content="0; url=?url=anggota">';
                        } elseif ($_POST['type'] == "tambah") {
                            $data = [
                                'status_aktif' => $_POST['status_aktif'],
                                'pegawai_id' => $_POST['pegawai_id'],
                                'kartu_diskon_id' => $_POST['kartu_diskon_id'],
                            ];
                            $anggota->create($data);
                            echo '<script>alert("tambah berhasil")</script><meta http-equiv="refresh" content="0; url=?url=anggota">';
                        } elseif ($_POST['type'] == "update") {
                            $data = [
                                'status_aktif' => $_POST['status_aktif'],
                                'pegawai_id' => $_POST['pegawai_id'],
                                'kartu_diskon_id' => $_POST['kartu_diskon_id'],
                            ];
                            $anggota->update($_POST['id'], $data);
                            echo '<script>alert("update berhasil")</script><meta http-equiv="refresh" content="0; url=?url=anggota">';
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
           
    </div>
</div>