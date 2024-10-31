<?php
// Periksa apakah sesi sudah dimulai
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="landing-page.php">
        <i class="fa fa-windows" aria-hidden="true"></i> Sistem Pendukung Keputusan Metode WP
        <?php
        if (isset($_SESSION['nama'])) {
            echo $_SESSION['nama'];
        }
        ?>
    </a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
                <a class="nav-link" href="landing-page.php">
                    <i class="fa fa-fw fa fa-home"></i>
                    <span class="nav-link-text">Dashboard</span>
                </a>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
                <a class="nav-link" href="karyawan-list-page.php">
                    <i class="fa fa-fw fa fa-users"></i>
                    <span class="nav-link-text">Data Karyawan</span>
                </a>
            </li>
            <?php if (isset($_SESSION['level']) && $_SESSION['level'] == 'Admin') { ?>
                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
                    <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#listkriteria" data-parent="#listkriteria">
                        <i class="fa fa-fw fa-calculator"></i>
                        <span class="nav-link-text">Data Kriteria</span>
                    </a>
                    <ul class="sidenav-second-level collapse" id="listkriteria">
                        <li>
                            <a href="kriteria-absen-page.php">Kriteria Absen </a>
                        </li>
                        <li>
                            <a href="kriteria-penilaian-page.php">Kriteria Penilaian</a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
                    <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#listpenilaian" data-parent="#listpenilaian">
                        <i class="fa fa-fw fa-folder"></i>
                        <span class="nav-link-text">Data Penilaian</span>
                    </a>
                    <ul class="sidenav-second-level collapse" id="listpenilaian">
                        <li>
                            <a href="penilaian-absen-page.php">Penilaian Absen </a>
                        </li>
                        <li>
                            <a href="penilaian-data-page.php">Data Penilaian</a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
                    <a class="nav-link" href="analisa-page.php">
                        <i class="fa fa-fw fa-bar-chart"></i>
                        <span class="nav-link-text">Hasil Analisa</span>
                    </a>
                </li>
                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
                    <a class="nav-link" href="pengguna-page.php">
                        <i class="fa fa-fw fa-user"></i>
                        <span class="nav-link-text">Data Pengguna</span>
                    </a>
                </li>
            <?php } ?>
            <?php if (isset($_SESSION['level']) && $_SESSION['level'] == 'Karyawan') { ?>
                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
                    <a class="nav-link" href="analisa-page.php">
                        <i class="fa fa-fw fa-bar-chart"></i>
                        <span class="nav-link-text">Hasil Analisa</span>
                    </a>
                </li>
            <?php
            } ?>
            <li class="nav-item">
                <hr class="border border-3 opacity-75" />
                <a class="nav-link" data-toggle="modal" data-target="#modal-logout">
                    <i class="fa fa-fw fa-sign-out"></i>Logout</a>
            </li>
        </ul>
    </div>
</nav>