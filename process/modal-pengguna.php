<!-- Modal Add -->
<div id="modal-add-pengguna" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="TambahData">
                    Tambah Data Karyawan
                </h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form-add-pengguna" class="form-floating" action="../process/input-pengguna.php" method="POST">
                    <div class="form-group">
                        <label for="nama_pengguna" class="float-left">Nama Lengkap</label>
                        <input type="text" class="form-control" id="nama_pengguna" name="nama_pengguna" required>
                    </div>
                    <div class="form-group">
                        <label for="username" class="float-left">Username</label>
                        <input type="text" class="form-control" id="username" name="username" required>
                    </div>
                    <div class="form-group">
                        <label for="password" class="float-left">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <div class="form-group">
                        <label for="level" class="float-left">Level</label>
                        <select class="form-control" id="level" name="level" required>
                            <option>--Pilih Status--</option>
                            <option value="Admin">Admin</option>
                            <option value="Pimpinan">Pimpinan</option>
                            <option value="Karyawan">Karyawan</option>
                        </select>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary">
                        Simpan
                    </button>
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">
                        Cancel
                    </button>
                </form>
            </div>
            <div class="modal-footer"></div>
        </div>
    </div>
</div>

<!-- Modal Edit -->
<div id="modal-edit-pengguna<?php echo $data['pengguna_id']; ?>" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="TambahData">
                    Edit Data Pengguna
                </h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form-add-pengguna" class="form-floating" action="../process/edit-pengguna.php" method="POST">
                    <div class="form-group">
                        <label for="nama_pengguna" class="float-left">Nama Lengkap</label>
                        <input type="text" class="form-control" id="nama_pengguna" name="nama_pengguna" value="<?php echo $data['nama_pengguna']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="username" class="float-left">Username</label>
                        <input type="text" class="form-control" id="username" name="username" value="<?php echo $data['username']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="password" class="float-left">Password</label>
                        <input type="password" class="form-control" id="password" name="password" value="<?php echo $data['password']; ?>" required>
                        <input type="hidden" name="pengguna_id" value="<?php echo $data['pengguna_id']; ?>" />
                    </div>
                    <div class="form-group">
                        <label for="level" class="float-left">Level</label>
                        <select class="form-control" id="level" name="level" required>
                            <option>--Pilih Status--</option>
                            <option value="Admin" <?php echo ($data['level'] == 'Admin') ? 'selected' : ''; ?>>Admin</option>
                            <option value="Pimpinan" <?php echo ($data['level'] == 'Pimpinan') ? 'selected' : ''; ?>>Pimpinan</option>
                            <option value="Karyawan" <?php echo ($data['level'] == 'Karyawan') ? 'selected' : ''; ?>>Karyawan</option>
                        </select>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary">
                        Simpan
                    </button>
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">
                        Cancel
                    </button>
                </form>
            </div>
            <div class="modal-footer"></div>
        </div>
    </div>
</div>