<div id="modal-edit-karyawan-absen<?php echo $data_absen['pera_id']; ?>" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
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
                <form id="form-add-karyawan" class="form-floating" action="./process/edit-penilaian-absen.php" method="POST">
                    <div class="form-group">
                        <label for="nama_pera" class="float-left">Nama</label>
                        <input type="text" class="form-control" id="nama_pera" name="nama_pera" value="<?php echo $data_absen['nama_pera']; ?>">
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="pera_id" value="<?php echo $data_absen['pera_id']; ?>" />
                        <label for="nik" class="float-left">NIK</label>
                        <input type="text" class="form-control" id="nik" name="nik" maxlength="16" value="<?php echo $data_absen['nik']; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="sd" class="float-left">Bobot Surat Dokter</label>
                        <input type="number" class="form-control" id="sd" name="sd" value="<?php echo $data_absen['sd']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="pc" class="float-left">Bobot Pulang Cepat</label>
                        <input type="number" class="form-control" id="pc" name="pc" value="<?php echo $data_absen['pc']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="dt" class="float-left">Bobot Dateng Telat</label>
                        <input type="number" class="form-control" id="dt" name="dt" value="<?php echo $data_absen['dt']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="i" class="float-left">Bobot Izin</label>
                        <input type="number" class="form-control" id="i" name="i" value="<?php echo $data_absen['i']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="s" class="float-left">Bobot Sakit</label>
                        <input type="number" class="form-control" id="s" name="s" value="<?php echo $data_absen['s']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="a" class="float-left">Bobot Alfa</label>
                        <input type="number" class="form-control" id="a" name="a" value="<?php echo $data_absen['a']; ?>" required>
                    </div>
                    <input type="hidden" name="pera_id" value="<?php echo $data_absen['pera_id']; ?>" />
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