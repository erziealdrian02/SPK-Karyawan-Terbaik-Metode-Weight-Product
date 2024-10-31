<div id="modal-edit-karyawan-absen<?php echo $data_absen['pera_id']; ?>" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="EditData">
                    Edit Data Karyawan
                </h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form-edit-karyawan" class="form-floating" action="./process/edit-penilaian-nilai.php" method="POST">
                    <div class="form-group">
                        <label for="nama_pera" class="float-left">Nama</label>
                        <input type="text" class="form-control" id="nama_pera" name="nama_pera" value="<?php echo $data_absen['nama_pera']; ?>">
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="pera_id" value="<?php echo $data_absen['pera_id']; ?>" />
                        <label for="kj" class="float-left">Kejujuran</label>
                        <input type="text" class="form-control" id="kj" name="kj" maxlength="16" value="<?php echo $data_absen['kj']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="kl" class="float-left">Kualitas</label>
                        <input type="number" class="form-control" id="kl" name="kl" value="<?php echo $data_absen['kl']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="kt" class="float-left">Kuantitas</label>
                        <input type="number" class="form-control" id="kt" name="kt" value="<?php echo $data_absen['kt']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="in" class="float-left">Inisiatif</label>
                        <input type="number" class="form-control" id="in" name="in" value="<?php echo $data_absen['in']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="ly" class="float-left">Loyalitas</label>
                        <input type="number" class="form-control" id="ly" name="ly" value="<?php echo $data_absen['ly']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="ks" class="float-left">Kerja Sama</label>
                        <input type="number" class="form-control" id="ks" name="ks" value="<?php echo $data_absen['ks']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="kte" class="float-left">Ketelitian</label>
                        <input type="number" class="form-control" id="kte" name="kte" value="<?php echo $data_absen['kte']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="mm" class="float-left">Merasa Memiliki</label>
                        <input type="number" class="form-control" id="mm" name="mm" value="<?php echo $data_absen['mm']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="tj" class="float-left">Tanggung Jawab</label>
                        <input type="number" class="form-control" id="tj" name="tj" value="<?php echo $data_absen['tj']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="kjin" class="float-left">Kerajinan</label>
                        <input type="number" class="form-control" id="kjin" name="kjin" value="<?php echo $point_absen; ?>" readonly>
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