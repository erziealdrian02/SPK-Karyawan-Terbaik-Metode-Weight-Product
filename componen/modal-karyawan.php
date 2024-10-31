<!-- Modal Add -->
<div id="modal-add-karyawan" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
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
                <form id="form-add-karyawan" class="form-floating" action="./process/input-karyawan.php" method="POST">
                    <div class="form-group">
                        <label for="nik" class="float-left">NIK</label>
                        <input type="text" class="form-control" id="nik" name="nik" maxlength="16" required>
                    </div>
                    <div class="form-group">
                        <label for="nama_karyawan" class="float-left">Nama</label>
                        <input type="text" class="form-control" id="nama_karyawan" name="nama_karyawan" required>
                    </div>
                    <div class="form-group">
                        <label for="tgl_karyawan" class="float-left">Tanggal Lahir</label>
                        <input type="date" class="form-control" id="tgl_karyawan" name="tgl_karyawan" required>
                    </div>
                    <div class="form-group">
                        <label for="alamat_karyawan" class="float-left">Alamat</label>
                        <input type="text" class="form-control" id="alamat_karyawan" name="alamat_karyawan" required>
                    </div>
                    <div class="form-group">
                        <label for="tlp_karyawan" class="float-left">No. Telp</label>
                        <input type="tel" class="form-control" id="tlp_karyawan" name="tlp_karyawan" maxlength="13" required>
                    </div>
                    <div class="form-group">
                        <label for="jabatan_karyawan" class="float-left">Jabatan</label>
                        <input type="text" class="form-control" id="jabatan_karyawan" name="jabatan_karyawan" required>
                    </div>
                    <div class="form-group">
                        <label for="status_karyawan" class="float-left">Status</label>
                        <select class="form-control" id="status_karyawan" name="status_karyawan" required>
                            <option value="">--Pilih Status--</option>
                            <option value="Outsourcing">Outsourcing</option>
                            <option value="Tetap">Tetap</option>
                            <option value="Kontrak">Kontrak</option>
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
<div id="modal-edit-karyawan<?php echo $data['karyawan_id']; ?>" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="TambahData">
                    Edit Data Karyawan
                </h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form-add-karyawan" class="form-floating" action="./process/edit-karyawan.php" method="POST">
                    <div class="form-group">
                        <label for="nik" class="float-left">NIK</label>
                        <input type="text" class="form-control" id="nik" name="nik" maxlength="16" value="<?php echo $data['nik']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="nama_karyawan" class="float-left">Nama</label>
                        <input type="text" class="form-control" id="nama_karyawan" name="nama_karyawan" value="<?php echo $data['nama_karyawan']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="tgl_karyawan" class="float-left">Tanggal Lahir</label>
                        <input type="date" class="form-control" id="tgl_karyawan" name="tgl_karyawan" value="<?php echo $data['tgl_karyawan']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="alamat_karyawan" class="float-left">Alamat</label>
                        <input type="text" class="form-control" id="alamat_karyawan" name="alamat_karyawan" value="<?php echo $data['alamat_karyawan']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="tlp_karyawan" class="float-left">No. Telp</label>
                        <input type="tel" class="form-control" id="tlp_karyawan" name="tlp_karyawan" maxlength="13" value="<?php echo $data['tlp_karyawan']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="jabatan_karyawan" class="float-left">Jabatan</label>
                        <input type="text" class="form-control" id="jabatan_karyawan" name="jabatan_karyawan" value="<?php echo $data['jabatan_karyawan']; ?>" required>
                        <input type="hidden" name="karyawan_id" value="<?php echo $data['karyawan_id']; ?>" />
                    </div>
                    <div class="form-group">
                        <label for="status_karyawan" class="float-left">Status</label>
                        <select class="form-control" id="status_karyawan" name="status_karyawan" required>
                            <option value="">--Pilih Status--</option>
                            <option value="Outsourcing" <?php echo ($data['status_karyawan'] == 'Outsourcing') ? 'selected' : ''; ?>>Outsourcing</option>
                            <option value="Tetap" <?php echo ($data['status_karyawan'] == 'Tetap') ? 'selected' : ''; ?>>Tetap</option>
                            <option value="Kontrak" <?php echo ($data['status_karyawan'] == 'Kontrak') ? 'selected' : ''; ?>>Kontrak</option>
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