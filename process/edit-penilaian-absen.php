<?php
include('koneksi.php');

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $pera_id = $_POST['pera_id'];
    $nama_pera = mysqli_real_escape_string($connect, $_POST['nama_pera']);
    $nik = mysqli_real_escape_string($connect, $_POST['nik']);
    $sd = mysqli_real_escape_string($connect, $_POST['sd']);
    $pc = mysqli_real_escape_string($connect, $_POST['pc']);
    $dt = mysqli_real_escape_string($connect, $_POST['dt']);
    $i = mysqli_real_escape_string($connect, $_POST['i']);
    $s = mysqli_real_escape_string($connect, $_POST['s']);
    $a = mysqli_real_escape_string($connect, $_POST['a']);

    // Update the database with the new data
    $query = "UPDATE perhitungan_absen SET nama_pera = '$nama_pera', nik = '$nik', sd = '$sd', pc = '$pc', dt = '$dt', i = '$i', s = '$s', a = '$a' WHERE pera_id = '$pera_id'";
    $result = mysqli_query($connect, $query);

    if ($result) {
        echo "<script>
                alert('Berhasil mengedit data');
                window.location.href = '../penilaian-absen-page.php';
              </script>";
    } else {
        echo "<script>alert('Gagal mengedit data: " . mysqli_error($connect) . "'); window.location.href = '../form_page.php';</script>";
    }
} else {
    echo "<script>alert('Form Tidak disubmit dengan benar'); window.location.href = '../category.php';</script>";
}
