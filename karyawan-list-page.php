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
               <h1><i class="fa fa-users" aria-hidden="true"> </i></h1>
               <li class="breadcrumb-item">
                  <h1>Data Karyawan</h1>
               </li>
            </ol>
            <!-- Example DataTables Card-->
            <div class="card mb-3">
               <div class="card-header">
                  <?php if (isset($_SESSION['level']) && $_SESSION['level'] == 'Admin') { ?>
                     <a class="btn btn-success text-white" role="button" aria-disabled="true" data-toggle="modal" data-target="#modal-add-karyawan">Tambah Data</a>
                  <?php
                  } ?>
               </div>
               <div class="card-body">
                  <div class="table-responsive">
                     <table class="table table-bordered text-center b" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                           <tr>
                              <th>No</th>
                              <th>NIK</th>
                              <th>Nama</th>
                              <th>Tanggal Lahir</th>
                              <th>Alamat</th>
                              <th>No. Telp</th>
                              <th>Jabatan</th>
                              <th>Status</th>
                              <?php if (isset($_SESSION['level']) && $_SESSION['level'] == 'Admin') { ?>
                                 <th>Aksi</th>
                              <?php } ?>
                           </tr>
                        </thead>
                        <tbody>
                           <?php
                           $no = 1;
                           $select = mysqli_query($connect, "SELECT * FROM karyawan");
                           while ($data = mysqli_fetch_array($select)) {
                           ?>
                              <tr>
                                 <td><?php echo $no; ?></td>
                                 <td><?php echo $data['nik']; ?></td>
                                 <td><?php echo $data['nama_karyawan']; ?></td>
                                 <td><?php echo date("d/m/Y", strtotime($data['tgl_karyawan'])); ?></td>
                                 <td><?php echo $data['alamat_karyawan']; ?></td>
                                 <td><?php echo $data['tlp_karyawan']; ?></td>
                                 <td><?php echo $data['jabatan_karyawan']; ?></td>
                                 <td><?php echo $data['status_karyawan']; ?></td>
                                 <?php if (isset($_SESSION['level']) && $_SESSION['level'] == 'Admin') { ?>
                                    <td>
                                       <a class="btn btn-warning text-white mr-1" role="button" aria-disabled="true" data-toggle="modal" data-target="#modal-edit-karyawan<?php echo $data['karyawan_id']; ?>">
                                          <i class="fa fa-pencil"></i>
                                       </a>
                                       <a class="btn btn-danger" href="./process/hapus-karyawan.php?karyawan_id=<?php echo $data['karyawan_id']; ?>" role="button">
                                          <i class="fa fa-trash"></i>
                                       </a>
                                       <?php include('./componen/modal-karyawan.php') ?>
                                    </td>
                                 <?php } ?>
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