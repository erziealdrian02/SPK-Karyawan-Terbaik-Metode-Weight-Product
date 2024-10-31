<?php include('./componen/header.php') ?>

<body>
   <!-- partial:index.partial.html -->

   <body class="fixed-nav sticky-footer bg-dark" id="page-top">
      <!-- Navigation-->
      <?php include('./componen/navbar.php') ?>
      <div class="content-wrapper">
         <div class="container-fluid">
            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
               <h1><i class="fa fa-folder" aria-hidden="true"> </i></h1>
               <li class="breadcrumb-item">
                  <h1>Data Penilaian</h1>
               </li>
            </ol>
            <!-- Example DataTables Card-->
            <div class="card mb-3">
               <div class="card-header">
                  <a class="btn btn-success text-white" role="button" aria-disabled="true">Tambah Data</a>
               </div>
               <div class="card-body">
                  <div class="table-responsive">
                     <table class="table table-bordered text-center b" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                           <tr>
                              <th>No</th>
                              <th>Nama Karyawan</th>
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
                              <th>Aksi</th>
                           </tr>
                        </thead>
                        <tbody>
                           <tr>
                              <td>1</td>
                              <td>Karyawan Satu</td>
                              <td>66</td>
                              <td>90</td>
                              <td>77</td>
                              <td>66</td>
                              <td>90</td>
                              <td>77</td>
                              <td>66</td>
                              <td>90</td>
                              <td>77</td>
                              <td>77</td>
                              <td style="width: 9%">
                                 <a class="btn btn-warning text-white mr-1" href="#" role="button">
                                    <i class="fa fa-pencil"></i>
                                 </a>
                                 <a class="btn btn-danger" href="#" role="button">
                                    <i class="fa fa-trash"></i>
                                 </a>
                              </td>
                           </tr>
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