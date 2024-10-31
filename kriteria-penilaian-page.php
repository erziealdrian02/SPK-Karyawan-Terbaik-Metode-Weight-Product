<?php
include('./componen/header.php');
include './process/koneksi.php';
?>

<body>
   <!-- partial:index.partial.html -->

   <body class="fixed-nav sticky-footer bg-dark" id="page-top">
      <!-- Navigation-->
      <?php include('./componen/navbar.php') ?>
      <div class="content-wrapper">
         <div class="container-fluid">
            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
               <h1><i class="fa fa-calculator" aria-hidden="true"> </i></h1>
               <li class="breadcrumb-item">
                  <h1>Kriteria Penilaian</h1>
               </li>
            </ol>
            <!-- Example DataTables Card-->
            <div class="card mb-3">
               <div class="card-header">
                  <!-- <a class="btn btn-success text-white" role="button" aria-disabled="true">Tambah Data</a> -->
               </div>
               <div class="card-body">
                  <div class="table-responsive">
                     <table class="table table-bordered text-center" id="dataTable">
                        <thead>
                           <tr>
                              <th style="width: 0%">No</th>
                              <th>Kerajinan</th>
                              <th>Kejujuran</th>
                              <th>Kualitas</th>
                              <th>Kuantitas</th>
                              <th>Inisiatif</th>
                              <th>Loyalitas</th>
                              <th>Kerja Sama</th>
                              <th>Ketelitian</th>
                              <th>Merasa Memiliki</th>
                              <th>Tanggung Jawab</th>
                              <th style="width: 10%">Aksi</th>
                           </tr>
                        </thead>
                        <tbody>
                           <?php
                           $no = 1;
                           $select = mysqli_query($connect, "SELECT * FROM kriteria");
                           while ($data = mysqli_fetch_array($select)) {
                           ?>
                              <tr>
                                 <td><?php echo $no; ?></td>
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
                                 <td>
                                    <a class="btn btn-warning text-white mr-1" role="button" aria-disabled="true" data-toggle="modal" data-target="#modal-edit-kriteria<?php echo $data['kriteria_id']; ?>">
                                       <i class="fa fa-pencil"></i>
                                    </a>
                                    <?php include('./componen/modal-kriteria-nilai.php'); ?>
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
         <?php include('./componen/footer.php') ?>
         <!-- Scroll to Top Button-->
         <a class="scroll-to-top rounded" href="#page-top">
            <i class="fa fa-angle-up"></i>
         </a>
         <!-- Logout Modal-->
         <?php include('./componen/modal.php') ?>
      </div>
   </body>
   <!-- partial -->
   <?php include('./componen/script.php') ?>
</body>

</html>