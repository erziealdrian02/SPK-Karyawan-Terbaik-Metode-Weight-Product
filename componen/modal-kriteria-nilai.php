<!-- Modal Edit -->
<div id="modal-edit-kriteria<?php echo $data['kriteria_id']; ?>" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="TambahData">
                    Edit Kriteria Nilai
                </h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form-add-pengguna" class="form-floating" action="./process/edit-kriteria-nilai.php" method="POST">
                    <div class="form-group">
                        <label for="kj" class="float-left">Bobot Kejujuran</label>
                        <input type="number" class="form-control" id="kj" name="kj" value="<?php echo $data['kj']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="kl" class="float-left">Bobot Kualitas</label>
                        <input type="number" class="form-control" id="kl" name="kl" value="<?php echo $data['kl']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="kt" class="float-left">Bobot Kuantitas</label>
                        <input type="number" class="form-control" id="kt" name="kt" value="<?php echo $data['kt']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="in" class="float-left">Bobot Inisiatif</label>
                        <input type="number" class="form-control" id="in" name="in" value="<?php echo $data['in']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="ly" class="float-left">Bobot Loyalitas</label>
                        <input type="number" class="form-control" id="ly" name="ly" value="<?php echo $data['ly']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="ks" class="float-left">Bobot Kerja Sama</label>
                        <input type="number" class="form-control" id="ks" name="ks" value="<?php echo $data['ks']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="kte" class="float-left">Bobot Ketelitian</label>
                        <input type="number" class="form-control" id="kte" name="kte" value="<?php echo $data['kte']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="mm" class="float-left">Bobot Merasa Memiliki</label>
                        <input type="number" class="form-control" id="mm" name="mm" value="<?php echo $data['mm']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="tj" class="float-left">Bobot Tanggung Jawab</label>
                        <input type="number" class="form-control" id="tj" name="tj" value="<?php echo $data['tj']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="kjin" class="float-left">Bobot Kerajinan</label>
                        <input type="number" class="form-control" id="kjin" name="kjin" value="<?php echo $data['kjin']; ?>" required>
                    </div>
                    <input type="hidden" name="kriteria_id" value="<?php echo $data['kriteria_id']; ?>" />
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