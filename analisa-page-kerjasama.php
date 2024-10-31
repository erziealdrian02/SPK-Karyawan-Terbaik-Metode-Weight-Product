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
            <div class="card-header">
               <a href="./process/print-kerjasama.php" target="_blank" class="btn btn-success text-white" role="button" aria-disabled="true">Print</a>
            </div>
            <div class="card-body">
               <?php if (isset($_SESSION['level']) && $_SESSION['level'] == 'Admin') { ?>
                  <div class="table-responsive">
                     <table class="table table-bordered text-center b" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                           <tr>
                              <th style="vertical-align: middle;" rowspan="2">No</th>
                              <th>Nama Karyawan</th>
                              <th><a href="./analisa-page-kejujuran.php" class="text-dark text-decoration-none hover-text-primary">Kejujuran</a></th>
                              <th><a href="./analisa-page-kualitas.php" class="text-dark text-decoration-none hover-text-primary">Kualitas</a></th>
                              <th><a href="./analisa-page-kuantitas.php" class="text-dark text-decoration-none hover-text-primary">Kuantitas</a> </th>
                              <th><a href="./analisa-page-inisiatif.php" class="text-dark text-decoration-none hover-text-primary">Inisiatif</a> </th>
                              <th><a href="./analisa-page-loyalitas.php" class="text-dark text-decoration-none hover-text-primary">Loyalitas</a> </th>
                              <th><a href="./analisa-page-kerjasama.php" class="text-dark text-decoration-none hover-text-primary">Kerja Sama</a> </th>
                              <th><a href="./analisa-page-ketelitian.php" class="text-dark text-decoration-none hover-text-primary">Ketelitian</a> </th>
                              <th style="width: 3%"><a href="./analisa-page-memiliki.php" class="text-dark text-decoration-none hover-text-primary">Merasa Memiliki</a> </th>
                              <th style="width: 3%"><a href="./analisa-page-jawab.php" class="text-dark text-decoration-none hover-text-primary">Tanggung Jawab</a> </th>
                              <th><a href="./analisa-page-kerajinan.php" class="text-dark text-decoration-none hover-text-primary">Kerajinan</a> </th>
                              <th rowspan="2" style="vertical-align: middle;" style="width: 10%"><a href="./analisa-page.php" class="text-dark text-decoration-none hover-text-primary">Total</a></th>
                              <th rowspan="2" style="vertical-align: middle;" style="width: 10%"> <a href="./analisa-page.php" class="text-dark text-decoration-none hover-text-primary">Total Vector</a></th>
                           </tr>
                           <tr>
                              <th>Bobot</th>
                              <?php
                              $select = mysqli_query($connect, "SELECT * FROM  kriteria");
                              if (!$select) {
                                 die('Query Error: ' . mysqli_error($connect));
                              }
                              while ($data = mysqli_fetch_array($select)) {
                              ?>
                                 <td><?php echo $data['kj']; ?></td>
                                 <td><?php echo $data['kl']; ?></td>
                                 <td><?php echo $data['kt']; ?></td>
                                 <td><?php echo $data['in']; ?></td>
                                 <td><?php echo $data['ly']; ?></td>
                                 <td><?php echo $data['ks']; ?></td>
                                 <td><?php echo $data['kte']; ?></td>
                                 <td><?php echo $data['mm']; ?></td>
                                 <td><?php echo $data['tj']; ?></td>
                                 <td><?php echo $data['kjin']; ?></td>
                              <?php
                              }
                              ?>
                           </tr>
                        </thead>
                        <tbody>
                           <?php
                           $no = 1;
                           $sql = mysqli_query($connect, "SELECT * FROM perhitungan_absen ORDER BY ks DESC");
                           if (!$sql) {
                              die('Query Error: ' . mysqli_error($connect));
                           }

                           $vector_sums = []; // Array untuk menyimpan semua nilai Vector S

                           // Loop pertama untuk menghitung Vector S dan menyimpannya
                           while ($data_absen = mysqli_fetch_array($sql)) {
                              $select = mysqli_query($connect, "SELECT * FROM kriteria");
                              if (!$select) {
                                 die('Query Error: ' . mysqli_error($connect));
                              }

                              // Menghitung Bobot dan Vector S untuk setiap baris data
                              while ($data_bobot = mysqli_fetch_array($select)) {
                                 $total_bobot = $data_bobot['kj'] + $data_bobot['kl'] + $data_bobot['kt'] + $data_bobot['in'] + $data_bobot['ly'] + $data_bobot['ks'] + $data_bobot['kte'] + $data_bobot['mm'] + $data_bobot['tj'] + $data_bobot['kjin'];
                                 $bobot_1 = $data_bobot['kj'] / $total_bobot;
                                 $bobot_2 = $data_bobot['kl'] / $total_bobot;
                                 $bobot_3 = $data_bobot['kt'] / $total_bobot;
                                 $bobot_4 = $data_bobot['in'] / $total_bobot;
                                 $bobot_5 = $data_bobot['ly'] / $total_bobot;
                                 $bobot_6 = $data_bobot['ks'] / $total_bobot;
                                 $bobot_7 = $data_bobot['kte'] / $total_bobot;
                                 $bobot_8 = $data_bobot['mm'] / $total_bobot;
                                 $bobot_9 = $data_bobot['tj'] / $total_bobot;
                                 $bobot_10 = $data_bobot['kjin'] / $total_bobot;

                                 // Menghitung Vector S
                                 $vector = pow($data_absen['kj'], $bobot_1) *
                                    pow($data_absen['kl'], $bobot_2) *
                                    pow($data_absen['kt'], $bobot_3) *
                                    pow($data_absen['in'], $bobot_4) *
                                    pow($data_absen['ly'], $bobot_5) *
                                    pow($data_absen['ks'], $bobot_6) *
                                    pow($data_absen['kte'], $bobot_7) *
                                    pow($data_absen['mm'], $bobot_8) *
                                    pow($data_absen['tj'], $bobot_9) *
                                    pow($data_absen['kjin'], $bobot_10);

                                 // Simpan Vector S ke dalam array
                                 $vector_sums[] = $vector;
                              }
                           }

                           // Hitung total semua nilai Vector S
                           $total_vector_s = array_sum($vector_sums);

                           // Reset ulang pointer hasil query
                           mysqli_data_seek($sql, 0);
                           $no = 1;

                           // Loop kedua untuk menghitung dan menampilkan Vector V
                           while ($data_absen = mysqli_fetch_array($sql)) {
                              $select = mysqli_query($connect, "SELECT * FROM kriteria");
                              if (!$select) {
                                 die('Query Error: ' . mysqli_error($connect));
                              }

                              while ($data_bobot = mysqli_fetch_array($select)) {
                                 $total_bobot = $data_bobot['kj'] + $data_bobot['kl'] + $data_bobot['kt'] + $data_bobot['in'] + $data_bobot['ly'] + $data_bobot['ks'] + $data_bobot['kte'] + $data_bobot['mm'] + $data_bobot['tj'] + $data_bobot['kjin'];
                                 $bobot_1 = $data_bobot['kj'] / $total_bobot;
                                 $bobot_2 = $data_bobot['kl'] / $total_bobot;
                                 $bobot_3 = $data_bobot['kt'] / $total_bobot;
                                 $bobot_4 = $data_bobot['in'] / $total_bobot;
                                 $bobot_5 = $data_bobot['ly'] / $total_bobot;
                                 $bobot_6 = $data_bobot['ks'] / $total_bobot;
                                 $bobot_7 = $data_bobot['kte'] / $total_bobot;
                                 $bobot_8 = $data_bobot['mm'] / $total_bobot;
                                 $bobot_9 = $data_bobot['tj'] / $total_bobot;
                                 $bobot_10 = $data_bobot['kjin'] / $total_bobot;

                                 // Menghitung Vector S
                                 $vector = pow($data_absen['kj'], $bobot_1) *
                                    pow($data_absen['kl'], $bobot_2) *
                                    pow($data_absen['kt'], $bobot_3) *
                                    pow($data_absen['in'], $bobot_4) *
                                    pow($data_absen['ly'], $bobot_5) *
                                    pow($data_absen['ks'], $bobot_6) *
                                    pow($data_absen['kte'], $bobot_7) *
                                    pow($data_absen['mm'], $bobot_8) *
                                    pow($data_absen['tj'], $bobot_9) *
                                    pow($data_absen['kjin'], $bobot_10);

                                 // Menghitung Vector V
                                 $vector_v = $vector / $total_vector_s;
                                 $vector = number_format($vector, 2, '.', '');
                                 $vector_v = number_format($vector_v, 2, '.', '');
                              }
                           ?>
                              <tr>
                                 <td><?php echo $no; ?></td>
                                 <td>
                                    <a href="" class="text-dark text-decoration-none hover-text-primary" data-toggle="modal" data-target="#modal-view-analisa<?php echo $data_absen['nama_pera']; ?>">
                                       <?php echo $data_absen['nama_pera']; ?>
                                    </a>
                                    <?php include('./componen/modal-analisa.php') ?>
                                 </td>
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
                                 <td><?php echo $vector; ?></td>
                                 <td><?php echo $vector_v; ?></td> <!-- Tambahkan kolom untuk Vector V -->
                              </tr>
                           <?php
                              $no++;
                           }
                           ?>
                        </tbody>
                     </table>
                  </div>
               <?php } ?>
               <?php if (isset($_SESSION['level']) && $_SESSION['level'] == 'Karyawan') { ?>
                  <div class="table-responsive">
                     <table class="table table-bordered text-center b" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                           <tr>
                              <th>No</th>
                              <th>Nama Karyawan</th>
                              <th>Jabatan</th>
                              <th>Total</th>
                              <th>Total Vector</th>
                           </tr>
                        </thead>
                        <tbody>
                           <?php
                           $no = 1;
                           $sql = mysqli_query($connect, "SELECT * FROM perhitungan_absen");
                           if (!$sql) {
                              die('Query Error: ' . mysqli_error($connect));
                           }

                           $vector_sums = []; // Array untuk menyimpan semua nilai Vector S

                           // Loop pertama untuk menghitung Vector S dan menyimpannya
                           while ($data_absen = mysqli_fetch_array($sql)) {
                              $select = mysqli_query($connect, "SELECT * FROM kriteria");
                              if (!$select) {
                                 die('Query Error: ' . mysqli_error($connect));
                              }

                              // Menghitung Bobot dan Vector S untuk setiap baris data
                              while ($data_bobot = mysqli_fetch_array($select)) {
                                 $total_bobot = $data_bobot['kj'] + $data_bobot['kl'] + $data_bobot['kt'] + $data_bobot['in'] + $data_bobot['ly'] + $data_bobot['ks'] + $data_bobot['kte'] + $data_bobot['mm'] + $data_bobot['tj'] + $data_bobot['kjin'];
                                 $bobot_1 = $data_bobot['kj'] / $total_bobot;
                                 $bobot_2 = $data_bobot['kl'] / $total_bobot;
                                 $bobot_3 = $data_bobot['kt'] / $total_bobot;
                                 $bobot_4 = $data_bobot['in'] / $total_bobot;
                                 $bobot_5 = $data_bobot['ly'] / $total_bobot;
                                 $bobot_6 = $data_bobot['ks'] / $total_bobot;
                                 $bobot_7 = $data_bobot['kte'] / $total_bobot;
                                 $bobot_8 = $data_bobot['mm'] / $total_bobot;
                                 $bobot_9 = $data_bobot['tj'] / $total_bobot;
                                 $bobot_10 = $data_bobot['kjin'] / $total_bobot;

                                 // Menghitung Vector S
                                 $vector = pow($data_absen['kj'], $bobot_1) *
                                    pow($data_absen['kl'], $bobot_2) *
                                    pow($data_absen['kt'], $bobot_3) *
                                    pow($data_absen['in'], $bobot_4) *
                                    pow($data_absen['ly'], $bobot_5) *
                                    pow($data_absen['ks'], $bobot_6) *
                                    pow($data_absen['kte'], $bobot_7) *
                                    pow($data_absen['mm'], $bobot_8) *
                                    pow($data_absen['tj'], $bobot_9) *
                                    pow($data_absen['kjin'], $bobot_10);

                                 // Simpan Vector S ke dalam array
                                 $vector_sums[] = $vector;
                              }
                           }

                           // Hitung total semua nilai Vector S
                           $total_vector_s = array_sum($vector_sums);

                           // Reset ulang pointer hasil query
                           mysqli_data_seek($sql, 0);
                           $no = 1;

                           // Loop kedua untuk menghitung dan menampilkan Vector V
                           while ($data_absen = mysqli_fetch_array($sql)) {
                              $select = mysqli_query($connect, "SELECT * FROM kriteria");
                              if (!$select) {
                                 die('Query Error: ' . mysqli_error($connect));
                              }

                              while ($data_bobot = mysqli_fetch_array($select)) {
                                 $total_bobot = $data_bobot['kj'] + $data_bobot['kl'] + $data_bobot['kt'] + $data_bobot['in'] + $data_bobot['ly'] + $data_bobot['ks'] + $data_bobot['kte'] + $data_bobot['mm'] + $data_bobot['tj'] + $data_bobot['kjin'];
                                 $bobot_1 = $data_bobot['kj'] / $total_bobot;
                                 $bobot_2 = $data_bobot['kl'] / $total_bobot;
                                 $bobot_3 = $data_bobot['kt'] / $total_bobot;
                                 $bobot_4 = $data_bobot['in'] / $total_bobot;
                                 $bobot_5 = $data_bobot['ly'] / $total_bobot;
                                 $bobot_6 = $data_bobot['ks'] / $total_bobot;
                                 $bobot_7 = $data_bobot['kte'] / $total_bobot;
                                 $bobot_8 = $data_bobot['mm'] / $total_bobot;
                                 $bobot_9 = $data_bobot['tj'] / $total_bobot;
                                 $bobot_10 = $data_bobot['kjin'] / $total_bobot;

                                 // Menghitung Vector S
                                 $vector = pow($data_absen['kj'], $bobot_1) *
                                    pow($data_absen['kl'], $bobot_2) *
                                    pow($data_absen['kt'], $bobot_3) *
                                    pow($data_absen['in'], $bobot_4) *
                                    pow($data_absen['ly'], $bobot_5) *
                                    pow($data_absen['ks'], $bobot_6) *
                                    pow($data_absen['kte'], $bobot_7) *
                                    pow($data_absen['mm'], $bobot_8) *
                                    pow($data_absen['tj'], $bobot_9) *
                                    pow($data_absen['kjin'], $bobot_10);

                                 // Menghitung Vector V
                                 $vector_v = $vector / $total_vector_s;
                                 $vector = number_format($vector, 2, '.', '');
                                 $vector_v = number_format($vector_v, 2, '.', '');
                              }
                           ?>
                              <tr>
                                 <td style="vertical-align: middle;"><?php echo $no; ?></td>
                                 <td style="vertical-align: middle;">
                                    <a href="" class="text-dark text-decoration-none hover-text-primary" data-toggle="modal" data-target="#modal-view-analisa<?php echo $data_absen['nama_pera']; ?>">
                                       <?php echo $data_absen['nama_pera']; ?>
                                    </a>
                                    <?php include('./componen/modal-analisa.php') ?>
                                 </td>
                                 <td><?php echo $data_absen['jabatan_pera']; ?></td>
                                 <td><?php echo $vector; ?></td>
                                 <td style="background-color: <?php echo ($vector >= 80) ? 'green' : 'red'; ?>; color: white;">
                                    <?php
                                    if ($vector >= 80) {
                                       echo "<b>Terus di pertahankan</b>";
                                    } else {
                                       echo "<b>Berusaha Lebih Keras</b>";
                                    }
                                    ?>
                                 </td>
                              </tr>
                           <?php
                              $no++;
                           }
                           ?>
                        </tbody>
                     </table>
                  </div>
               <?php } ?>
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