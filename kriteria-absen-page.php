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
                        <h1>Kriteria Absen</h1>
                    </li>
                </ol>
                <!-- Example DataTables Card-->
                <div class="card mb-3">
                    <div class="card-header">
                        <!-- <a class="btn btn-success text-white" role="button" aria-disabled="true">Tambah Data</a> -->
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered text-center">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Surat Dokter</th>
                                        <th>Pulang Cepat</th>
                                        <th>Datang Telat</th>
                                        <th>Izin</th>
                                        <th>Sakit</th>
                                        <th>Alfa</th>
                                        <th>Total Bobot</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    $query = mysqli_query($connect, "SELECT * FROM absensi");
                                    while ($data = mysqli_fetch_array($query)) {
                                        // Hitung total bobot
                                        $total_bobot = $data['sd'] + $data['pc'] + $data['dt'] + $data['i'] + $data['s'] + $data['a'];
                                    ?>
                                        <tr>
                                            <td><?php echo $no; ?></td>
                                            <td><?php echo $data['sd']; ?>%</td>
                                            <td><?php echo $data['pc']; ?>%</td>
                                            <td><?php echo $data['dt']; ?>%</td>
                                            <td><?php echo $data['i']; ?>%</td>
                                            <td><?php echo $data['s']; ?>%</td>
                                            <td><?php echo $data['a']; ?>%</td>
                                            <td><b><?php echo $total_bobot; ?>%</b></td>
                                            <td>
                                                <a class="btn btn-warning text-white mr-1" role="button" aria-disabled="true" data-toggle="modal" data-target="#modal-edit-kriteria<?php echo $data['absen_id']; ?>">
                                                    <i class="fa fa-pencil"></i>
                                                </a>
                                                <?php include('./componen/modal-kriteria-absen.php') ?>
                                            </td>
                                        </tr>
                                    <?php
                                        $no++;
                                    }
                                    ?>
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