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
               <h1><i class="fa fa-user" aria-hidden="true"> </i></h1>
               <li class="breadcrumb-item">
                  <h1>Data Pengguna</h1>
               </li>
            </ol>
            <!-- Example DataTables Card-->
            <div class="card mb-3">
               <div class="card-header">
                  <a class="btn btn-success text-white" role="button" aria-disabled="true" data-toggle="modal" data-target="#modal-add-pengguna">Tambah Data</a>
               </div>
               <div class="card-body">
                  <div class="table-responsive">
                     <table class="table table-bordered text-center" id="dataTable">
                        <thead>
                           <tr>
                              <th style="width: 5%">No</th>
                              <th>Nama Lengkap</th>
                              <th>Username</th>
                              <th>Password</th>
                              <th>Level</th>
                              <th style="width: 10%">Aksi</th>
                           </tr>
                        </thead>
                        <tbody>
                           <?php
                           $no = 1;
                           $select = mysqli_query($connect, "SELECT * FROM pengguna");
                           while ($data = mysqli_fetch_array($select)) {
                           ?>
                              <tr>
                                 <td><?php echo $no; ?></td>
                                 <td><?php echo $data['nama_pengguna']; ?></td>
                                 <td><?php echo $data['username']; ?></td>
                                 <td><?php echo $data['password']; ?></td>
                                 <td><?php echo $data['level']; ?></td>
                                 <td>
                                    <a class="btn btn-warning text-white mr-1" role="button" aria-disabled="true" data-toggle="modal" data-target="#modal-edit-pengguna<?php echo $data['pengguna_id']; ?>">
                                       <i class="fa fa-pencil"></i>
                                    </a>
                                    <a class="btn btn-danger" href="./process/hapus-pengguna.php?pengguna_id=<?php echo $data['pengguna_id']; ?>" role="button">
                                       <i class="fa fa-trash"></i>
                                    </a>
                                    <?php include('./componen/modal-pengguna.php') ?>
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