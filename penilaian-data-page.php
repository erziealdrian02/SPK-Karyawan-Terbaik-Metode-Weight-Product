<?php
include('./process/koneksi.php');
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
            <!-- <div class="card-header">
               <a class="btn btn-success text-white" role="button" aria-disabled="true" data-toggle="modal" data-target="#modal-add-karyawan">Tambah Data</a>
            </div> -->
            <div class="card-body">
               <div class="table-responsive">
                  <table class="table table-bordered text-center b" id="dataTable" width="100%" cellspacing="0">
                     <thead>
                        <tr>
                           <th>No</th>
                           <th>Nama Karyawan</th>
                           <th>Kejujuran</th>
                           <th>Kualitas</th>
                           <th>Kuantitas</th>
                           <th>Inisiatif</th>
                           <th>Loyalitas</th>
                           <th>Kerja Sama</th>
                           <th>Ketelitian</th>
                           <th style="width: 3%">Merasa Memiliki</th>
                           <th style="width: 3%">Tanggung Jawab</th>
                           <th>Kerajinan</th>
                           <th style="width: 10%">Aksi</th>
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
                              <td><?php echo $no; ?></td>
                              <td><?php echo $data_absen['nama_pera']; ?></td>
                              <td><?php echo $data_absen['kj']; ?></td>
                              <td><?php echo $data_absen['kl']; ?></td>
                              <td><?php echo $data_absen['kt']; ?></td>
                              <td><?php echo $data_absen['in']; ?></td>
                              <td><?php echo $data_absen['ly']; ?></td>
                              <td><?php echo $data_absen['ks']; ?></td>
                              <td><?php echo $data_absen['kte']; ?></td>
                              <td><?php echo $data_absen['mm']; ?></td>
                              <td><?php echo $data_absen['tj']; ?></td>
                              <td><?php echo $data_absen['kjin']; ?></td>
                              <td>
                                 <a class="btn btn-success text-white mr-1" role="button" aria-disabled="true" data-toggle="modal" data-target="#modal-edit-karyawan-absen<?php echo $data_absen['pera_id']; ?>">
                                    <i class="fa fa-plus"></i>
                                 </a>
                                 <?php include('./componen/modal-penilaian-nilai-edit.php'); ?>
                              </td>
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
      include('./componen/footer.php');
      ?>
      <!-- Scroll to Top Button-->
      <a class="scroll-to-top rounded" href="#page-top">
         <i class="fa fa-angle-up"></i>
      </a>
      <!-- Logout Modal-->
      <?php
      include('./componen/modal.php');
      ?>
   </div>
   <?php
   include('./componen/script.php');
   ?>
</body>

</html>