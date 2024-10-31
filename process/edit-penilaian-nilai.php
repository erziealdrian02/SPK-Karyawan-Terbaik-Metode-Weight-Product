<?php
include('koneksi.php');

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $pera_id = mysqli_real_escape_string($connect, $_POST['pera_id']);
    $nama_pera = mysqli_real_escape_string($connect, $_POST['nama_pera']);
    $kj = mysqli_real_escape_string($connect, $_POST['kj']);
    $kl = mysqli_real_escape_string($connect, $_POST['kl']);
    $kt = mysqli_real_escape_string($connect, $_POST['kt']);
    $in = mysqli_real_escape_string($connect, $_POST['in']);
    $ly = mysqli_real_escape_string($connect, $_POST['ly']);
    $ks = mysqli_real_escape_string($connect, $_POST['ks']);
    $kte = mysqli_real_escape_string($connect, $_POST['kte']);
    $mm = mysqli_real_escape_string($connect, $_POST['mm']);
    $tj = mysqli_real_escape_string($connect, $_POST['tj']);
    $kjin = mysqli_real_escape_string($connect, $_POST['kjin']);

    // Update the database with the new data
    $query = "UPDATE perhitungan_absen SET 
              nama_pera = '$nama_pera', 
              kj = '$kj', 
              kl = '$kl', 
              kt = '$kt', 
              `in` = '$in', 
              ly = '$ly', 
              ks = '$ks', 
              kte = '$kte', 
              mm = '$mm', 
              tj = '$tj', 
              kjin = '$kjin' 
              WHERE pera_id = '$pera_id'";

    $result = mysqli_query($connect, $query);

    if ($result) {
        echo "<script>
                alert('Berhasil mengedit data');
                window.location.href = '../penilaian-data-page.php';
              </script>";
    } else {
        echo "<script>alert('Gagal mengedit data: " . mysqli_error($connect) . "'); window.location.href = '../form_page.php';</script>";
    }
} else {
    echo "<script>alert('Form Tidak disubmit dengan benar'); window.location.href = '../category.php';</script>";
}
