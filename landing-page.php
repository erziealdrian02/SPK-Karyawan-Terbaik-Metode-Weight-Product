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
               <h1><i class="fa fa-home" aria-hidden="true"> </i></h1>
               <li class="breadcrumb-item">
                  <h1>Dashboard</h1>
               </li>
            </ol>
            <!-- Icon Cards-->
            <?php if (isset($_SESSION['level']) && $_SESSION['level'] == 'Admin') { ?>
               <div class="row">
                  <div class="col-xl-3 col-sm-6 mb-3">
                     <div class="card text-white bg-primary o-hidden h-100">
                        <div class="card-body">
                           <div class="card-body-icon">
                              <i class="fa fa-fw fa-users"></i>
                           </div>
                           <div class="mr-5">Data Karyawan</div>
                        </div>
                        <a class="card-footer text-white clearfix small z-1" href="karyawan-list-page.php">
                           <span class="float-left">View Details</span>
                           <span class="float-right">
                              <i class="fa fa-angle-right"></i>
                           </span>
                        </a>
                     </div>
                  </div>
                  <div class="col-xl-3 col-sm-6 mb-3">
                     <div class="card text-white bg-warning o-hidden h-100">
                        <div class="card-body">
                           <div class="card-body-icon">
                              <i class="fa fa-fw fa-list"></i>
                           </div>
                           <div class="mr-5">Data Kriteria</div>
                        </div>
                        <a class="card-footer text-white clearfix small z-1" href="kriteria-absen-page.php">
                           <span class="float-left">Kriteria Absen</span>
                           <span class="float-right">
                              <i class="fa fa-angle-right"></i>
                           </span>
                        </a>
                        <a class="card-footer text-white clearfix small z-1" href="kriteria-penilaian-page.php">
                           <span class="float-left">Kriteria Penilaian</span>
                           <span class="float-right">
                              <i class="fa fa-angle-right"></i>
                           </span>
                        </a>
                     </div>
                  </div>
                  <div class="col-xl-3 col-sm-6 mb-3">
                     <div class="card text-white bg-success o-hidden h-100">
                        <div class="card-body">
                           <div class="card-body-icon">
                              <i class="fa fa-fw fa-folder"></i>
                           </div>
                           <div class="mr-5">Data Penilaian</div>
                        </div>
                        <a class="card-footer text-white clearfix small z-1" href="penilaian-absen-page.php">
                           <span class="float-left">Penilaian Absen</span>
                           <span class="float-right">
                              <i class="fa fa-angle-right"></i>
                           </span>
                        </a>
                        <a class="card-footer text-white clearfix small z-1" href="penilaian-data-page.php">
                           <span class="float-left">Data Penilaian</span>
                           <span class="float-right">
                              <i class="fa fa-angle-right"></i>
                           </span>
                        </a>
                     </div>
                  </div>
                  <div class="col-xl-3 col-sm-6 mb-3">
                     <div class="card text-white bg-danger o-hidden h-100">
                        <div class="card-body">
                           <div class="card-body-icon">
                              <i class="fa fa-fw fa-bar-chart"></i>
                           </div>
                           <div class="mr-5">Hasil Analisa</div>
                        </div>
                        <a class="card-footer text-white clearfix small z-1" href="analisa-page.php">
                           <span class="float-left">View Detail</span>
                           <span class="float-right">
                              <i class="fa fa-angle-right"></i>
                           </span>
                        </a>
                     </div>
                  </div>
               </div>
            <?php
            }
            ?>
            <?php if (isset($_SESSION['level']) && $_SESSION['level'] == 'Karyawan') { ?>
               <div class="row">
                  <div class="col-xl-6 col-sm-6 mb-3">
                     <div class="card text-white bg-primary o-hidden h-100">
                        <div class="card-body">
                           <div class="card-body-icon">
                              <i class="fa fa-fw fa-users"></i>
                           </div>
                           <div class="mr-5">Data Karyawan</div>
                        </div>
                        <a class="card-footer text-white clearfix small z-1" href="karyawan-list-page.php">
                           <span class="float-left">View Details</span>
                           <span class="float-right">
                              <i class="fa fa-angle-right"></i>
                           </span>
                        </a>
                     </div>
                  </div>
                  <div class="col-xl-6 col-sm-6 mb-3">
                     <div class="card text-white bg-danger o-hidden h-100">
                        <div class="card-body">
                           <div class="card-body-icon">
                              <i class="fa fa-fw fa-bar-chart"></i>
                           </div>
                           <div class="mr-5">Hasil Analisa</div>
                        </div>
                        <a class="card-footer text-white clearfix small z-1" href="analisa-page.php">
                           <span class="float-left">View Detail</span>
                           <span class="float-right">
                              <i class="fa fa-angle-right"></i>
                           </span>
                        </a>
                     </div>
                  </div>
               </div>
            <?php } ?>

            <ol class="breadcrumb">
               <h1><i class="fa fa-user" aria-hidden="true"> </i></h1>
               <li class="breadcrumb-item">
                  <h1>About</h1>
               </li>
            </ol>
            <!-- Area Chart Example-->
            <div class="card mb-3">
               <div class="card-header">
                  <i class="fa fa-user"></i> About
               </div>
               <div class="card-body">
                  <div class="row">
                     <div class="col-md-3">
                        <img src="./images/about-image.jpg" class="img-fluid rounded-circle" alt="Gambar Profil">
                     </div>
                     <div class="col-md-9">
                        <h1>Nama Creator</h1>
                        <h3>123123123123</h3>
                        <p>
                           Saya Adalah Mahasiswa semester akhir di Universitas Indraprasta PGRI, Fakultas Teknik Informatika...(Lanjutin Aja ada di landing-page.php line 149)
                        </p>
                     </div>
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