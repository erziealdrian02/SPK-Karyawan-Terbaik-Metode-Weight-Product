<?php
session_start();
include 'koneksi.php';

if (isset($_GET['pera_id'])) {
    $pera_id = $_GET['pera_id'];
    $result = mysqli_query($connect, "DELETE FROM perhitungan_absen WHERE pera_id = '$pera_id'");

    if ($result) {
        echo "<script>
                alert('Berhasil Menghapus Data');
                window.location.href = '../penilaian-absen-page.php';
              </script>";
    } else {
        echo "<script>alert('Gagal Menghapus');</script>";
    }
} else {
    echo "<h1>NGAPAIN WOI</h1>";
}
