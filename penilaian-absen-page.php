<?php
include('./process/koneksi.php');
include('./componen/modal-penilaian-absen-add.php');
include('./componen/header.php')
?>

<!DOCTYPE html>
<html lang="en">

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
   <!-- Navigation-->
   <?php include('./componen/navbar.php') ?>
   <div class="content-wrapper">
      <div class="container-fluid">
         <!-- Breadcrumbs-->
         <ol class="breadcrumb">
            <h1><i class="fa fa-folder" aria-hidden="true"> </i></h1>
            <li class="breadcrumb-item">
               <h1>Data Penilaian Absen Karyawan</h1>
            </li>
         </ol>
         <!-- Example DataTables Card-->
         <div class="card mb-3">
            <div class="card-header">
               <a class="btn btn-success text-white" role="button" aria-disabled="true" data-toggle="modal" data-target="#modal-add-karyawan">Tambah Data</a>
            </div>
            <div class="card-body">
               <div class="table-responsive">
                  <table class="table table-bordered text-center b" id="dataTable" width="100%" cellspacing="0">
                     <thead>
                        <tr>
                           <th rowspan="2" style="vertical-align: middle;">No</th>
                           <th>NIK</th>
                           <th>Nama</th>
                           <th>Keterangan</th>
                           <th>Surat Dokter</th>
                           <th>Pulang Cepat</th>
                           <th>Datang Telat</th>
                           <th>Izin</th>
                           <th>Sakit</th>
                           <th>Alfa</th>
                           <th rowspan="2" style="vertical-align: middle;">Total</th>
                           <th style="width: 5%" rowspan="2" style="vertical-align: middle;">Point Kerajinan</th>
                           <th style="width: 10%" rowspan="2" style="vertical-align: middle;">Aksi</th>
                        </tr>
                        <tr>
                           <th colspan="3">Bobot</th>
                           <?php
                           $select = mysqli_query($connect, "SELECT * FROM absensi");
                           if (!$select) {
                              die('Query Error: ' . mysqli_error($connect));
                           }
                           while ($data = mysqli_fetch_array($select)) {
                           ?>
                              <td><?php echo $data['sd']; ?></td>
                              <td><?php echo $data['pc']; ?></td>
                              <td><?php echo $data['dt']; ?></td>
                              <td><?php echo $data['i']; ?></td>
                              <td><?php echo $data['s']; ?></td>
                              <td><?php echo $data['a']; ?></td>
                           <?php
                           }
                           ?>
                        </tr>
                     </thead>
                     <tbody>
                        <?php
                        $no = 1;
                        $sql = mysqli_query($connect, "SELECT * FROM perhitungan_absen");
                        if (!$sql) {
                           die('Query Error: ' . mysqli_error($connect));
                        }
                        while ($data_absen = mysqli_fetch_array($sql)) {
                           $select = mysqli_query($connect, "SELECT * FROM absensi");
                           if (!$select) {
                              die('Query Error: ' . mysqli_error($connect));
                           }
                           while ($data_bobot = mysqli_fetch_array($select)) {
                              // Menghitung nilai berdasarkan persentase
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
                              } elseif ($pengurangan >= 79 && $pengurangan < 83) {  // Updated range
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
                              <td rowspan="2" style="vertical-align: middle;"><?php echo $no; ?></td>
                              <td rowspan="2" style="vertical-align: middle;"><?php echo $data_absen['nik']; ?></td>
                              <td rowspan="2" style="vertical-align: middle;"><?php echo $data_absen['nama_pera']; ?></td>
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
                              <td rowspan="2" style="vertical-align: middle;">
                                 <a class="btn btn-success text-white mr-1" role="button" aria-disabled="true" data-toggle="modal" data-target="#modal-edit-karyawan-absen<?php echo $data_absen['pera_id']; ?>">
                                    <i class="fa fa-plus"></i>
                                 </a>
                                 <a class="btn btn-danger" href="./process/hapus-penilaian-absen.php?pera_id=<?php echo $data_absen['pera_id']; ?>" role="button">
                                    <i class="fa fa-trash"></i>
                                 </a>
                                 <?php include('./componen/modal-penilaian-absen-edit.php'); ?>
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
                        <?php $no++;
                        } ?>
                     </tbody>
                  </table>
               </div>
            </div>
         </div>
      </div>
      <!-- /.container-fluid-->
      <!-- /.content-wrapper-->
      <?php
      include('./componen/footer.php')
      ?>
      <!-- Scroll to Top Button-->
      <a class="scroll-to-top rounded" href="#page-top">
         <i class="fa fa-angle-up"></i>
      </a>
      <!-- Logout Modal-->
      <?php include('./componen/modal.php'); ?>
   </div>

   <?php include('./componen/script.php'); ?>
</body>

</html>