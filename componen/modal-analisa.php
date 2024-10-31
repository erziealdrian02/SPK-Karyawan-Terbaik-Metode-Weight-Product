<!-- Modal Edit -->
<div id="modal-view-analisa<?php echo $data_absen['nama_pera']; ?>" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="TambahData">
                    Data Karyawan
                </h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <?php
                $select = mysqli_query($connect, "SELECT * FROM karyawan WHERE nama_karyawan='" . $data_absen['nama_pera'] . "'");
                if (!$select) {
                    die('Query Error: ' . mysqli_error($connect));
                }
                while ($data = mysqli_fetch_array($select)) {
                ?>
                    <h1><?php echo htmlspecialchars($data['nama_karyawan']); ?></h1>
                    <br>
                    <div class="row">
                        <div class="col-md-6 text-start">
                            <p class="fs-4"><b>Tanggal Lahir: </b><?php echo date("d/m/Y", strtotime($data['tgl_karyawan'])); ?></p>
                            <p class="fs-4"><b>Alamat: </b><?php echo htmlspecialchars($data['alamat_karyawan']); ?></p>
                            <p class="fs-4"><b>Telephone: </b><?php echo htmlspecialchars($data['tlp_karyawan']); ?></p>
                        </div>
                        <div class="col-md-6 text-end">
                            <p class="fs-4"><b>Jabatan: </b><?php echo htmlspecialchars($data['jabatan_karyawan']); ?></p>
                            <p class="fs-4"><b>Status: </b><?php echo htmlspecialchars($data['status_karyawan']); ?></p>
                        </div>
                    </div>


                <?php } ?>
                <div class="table-responsive">
                    <h3>Penilaian Absen</h3>
                    <table class="table table-bordered text-center" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Keterangan</th>
                                <th>Surat Dokter</th>
                                <th>Pulang Cepat</th>
                                <th>Datang Telat</th>
                                <th>Izin</th>
                                <th>Sakit</th>
                                <th>Alfa</th>
                                <th rowspan="2" style="vertical-align: middle;">Total</th>
                                <th rowspan="2" style="vertical-align: middle;">Point Kerajinan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $select = mysqli_query($connect, "SELECT * FROM absensi");
                            if (!$select) {
                                die('Query Error: ' . mysqli_error($connect));
                            }
                            while ($data_bobot = mysqli_fetch_array($select)) {
                                $sd_value = ($data_absen['sd'] / 100) * $data_bobot['sd'];
                                $pc_value = ($data_absen['pc'] / 100) * $data_bobot['pc'];
                                $dt_value = ($data_absen['dt'] / 100) * $data_bobot['dt'];
                                $i_value = ($data_absen['i'] / 100) * $data_bobot['i'];
                                $s_value = ($data_absen['s'] / 100) * $data_bobot['s'];
                                $a_value = ($data_absen['a'] / 100) * $data_bobot['a'];
                                $total_perhitungan = ($sd_value + $pc_value + $dt_value + $i_value + $s_value + $a_value) * 100;
                                $pengurangan = 100 - $total_perhitungan;

                                if ($pengurangan == 100) {
                                    $point_absen = 100;
                                } elseif ($pengurangan >= 99 && $pengurangan < 100) {
                                    $point_absen = 90;
                                } elseif ($pengurangan >= 95 && $pengurangan < 99) {
                                    $point_absen = 80;
                                } elseif ($pengurangan >= 91 && $pengurangan < 95) {
                                    $point_absen = 70;
                                } elseif ($pengurangan >= 87 && $pengurangan < 91) {
                                    $point_absen = 60;
                                } elseif ($pengurangan >= 83 && $pengurangan < 87) {
                                    $point_absen = 50;
                                } elseif ($pengurangan >= 79 && $pengurangan < 83) {
                                    $point_absen = 40;
                                } elseif ($pengurangan >= 75 && $pengurangan < 79) {
                                    $point_absen = 30;
                                } elseif ($pengurangan >= 71 && $pengurangan < 75) {
                                    $point_absen = 20;
                                } elseif ($pengurangan >= 67 && $pengurangan < 71) {
                                    $point_absen = 10;
                                } elseif ($pengurangan >= 63 && $pengurangan < 67) {
                                    $point_absen = 0;
                                } elseif ($pengurangan >= 59 && $pengurangan < 63) {
                                    $point_absen = -10;
                                } else {
                                    $point_absen = -20;
                                }
                            }
                            ?>
                            <tr>
                                <td><b>Nilai Absensi</b></td>
                                <td><?php echo $data_absen['sd']; ?></td>
                                <td><?php echo $data_absen['pc']; ?></td>
                                <td><?php echo $data_absen['dt']; ?></td>
                                <td><?php echo $data_absen['i']; ?></td>
                                <td><?php echo $data_absen['s']; ?></td>
                                <td><?php echo $data_absen['a']; ?></td>
                                <td rowspan="2" style="vertical-align: middle;">
                                    <?php echo $total_perhitungan; ?>%
                                </td>
                                <td rowspan="2" style="vertical-align: middle;">
                                    <?php echo $point_absen; ?>
                                </td>
                            </tr>
                            <tr>
                                <td><b>Hasil Penilaian</b></td>
                                <td><?php echo $sd_value; ?></td>
                                <td><?php echo $pc_value; ?></td>
                                <td><?php echo $dt_value; ?></td>
                                <td><?php echo $i_value; ?></td>
                                <td><?php echo $s_value; ?></td>
                                <td><?php echo $a_value; ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="table-responsive">
                    <h3>Penilaian Karyawan</h3>
                    <div class="d-flex justify-content-center">
                        <p class="mr-3"><b>Hasil Vectos S:</b> <?php echo $vector; ?></p>
                        <p class="ml-3"><b>Hasil Vectos V:</b> <?php echo $vector_v; ?></p>
                    </div>
                    <table class="table table-bordered text-center" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Kejujuran</th>
                                <th>Kualitas</th>
                                <th>Kuantitas</th>
                                <th>Inisiatif</th>
                                <th>Loyalitas</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><?php echo $data_absen['kj']; ?></td>
                                <td><?php echo $data_absen['kl']; ?></td>
                                <td><?php echo $data_absen['kt']; ?></td>
                                <td><?php echo $data_absen['in']; ?></td>
                                <td><?php echo $data_absen['ly']; ?></td>
                            </tr>
                        </tbody>
                        <thead>
                            <tr>
                                <th>Kerja Sama</th>
                                <th>Ketelitian</th>
                                <th>Merasa Memiliki</th>
                                <th>Tanggung Jawab</th>
                                <th>Kerajinan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><?php echo $data_absen['ks']; ?></td>
                                <td><?php echo $data_absen['kte']; ?></td>
                                <td><?php echo $data_absen['mm']; ?></td>
                                <td><?php echo $data_absen['tj']; ?></td>
                                <td><?php echo $data_absen['kjin']; ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer"></div>
        </div>
    </div>
</div>