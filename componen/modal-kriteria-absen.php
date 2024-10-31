<!-- Modal Edit -->
<div id="modal-edit-kriteria<?php echo $data['absen_id']; ?>" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="TambahData">
                    Edit Kriteria Absen
                </h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form-add-pengguna" class="form-floating" action="./process/edit-kriteria-absen.php" method="POST">
                    <div class="form-group">
                        <label for="sd" class="float-left">Bobot Surat Dokter</label>
                        <input type="number" class="form-control" id="sd" name="sd" value="<?php echo $data['sd']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="pc" class="float-left">Bobot Pulang Cepat</label>
                        <input type="number" class="form-control" id="pc" name="pc" value="<?php echo $data['pc']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="dt" class="float-left">Bobot Dateng Telat</label>
                        <input type="number" class="form-control" id="dt" name="dt" value="<?php echo $data['dt']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="i" class="float-left">Bobot Izin</label>
                        <input type="number" class="form-control" id="i" name="i" value="<?php echo $data['i']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="s" class="float-left">Bobot Sakit</label>
                        <input type="number" class="form-control" id="s" name="s" value="<?php echo $data['s']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="a" class="float-left">Bobot Alfa</label>
                        <input type="number" class="form-control" id="a" name="a" value="<?php echo $data['a']; ?>" required>
                    </div>
                    <input type="hidden" name="absen_id" value="<?php echo $data['absen_id']; ?>" />
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