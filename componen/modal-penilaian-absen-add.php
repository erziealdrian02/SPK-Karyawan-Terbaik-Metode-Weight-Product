<!-- Modal Add -->
<div id="modal-add-karyawan" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="TambahData">Tambah Data Karyawan</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form-add-karyawan" class="form-floating" action="./process/input-penilaian-absen.php" method="POST">
                    <div class="form-group">
                        <label for="nama_pera" class="float-left">Nama</label>
                        <select class="form-control" name="nama_pera" id="nama_karyawan" required>
                            <option value="">--Pilih Karyawan--</option>
                            <?php
                            $karyawan = mysqli_query($connect, "SELECT * FROM karyawan");
                            if (!$karyawan) {
                                die("Query Error: " . mysqli_error($connect));
                            }
                            while ($k = mysqli_fetch_array($karyawan)) {
                                echo '<option value="' . $k['nama_karyawan'] . '">' . $k['nama_karyawan'] . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="nik" class="float-left">NIK</label>
                        <input type="text" name="nik" class="form-control" id="nik" readonly>
                    </div>
                    <div class="form-group">
                        <label for="jabatan_pera" class="float-left">Jabatan</label>
                        <input type="text" name="jabatan_pera" class="form-control" id="jabatan_karyawan" readonly>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                </form>
            </div>

            <div class="modal-footer"></div>
        </div>
    </div>
</div>