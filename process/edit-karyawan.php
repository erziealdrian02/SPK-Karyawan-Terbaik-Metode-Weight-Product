<?php
include('koneksi.php');

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $karyawan_id = $_POST['karyawan_id'];
    $nik = mysqli_real_escape_string($connect, $_POST['nik']);
    $nama_karyawan = mysqli_real_escape_string($connect, $_POST['nama_karyawan']);
    $tgl_karyawan = mysqli_real_escape_string($connect, $_POST['tgl_karyawan']);
    $alamat_karyawan = mysqli_real_escape_string($connect, $_POST['alamat_karyawan']);
    $tlp_karyawan = mysqli_real_escape_string($connect, $_POST['tlp_karyawan']);
    $jabatan_karyawan = mysqli_real_escape_string($connect, $_POST['jabatan_karyawan']);
    $status_karyawan = mysqli_real_escape_string($connect, $_POST['status_karyawan']); // Add this line

    // Update the database with the new data
    $query = "UPDATE karyawan SET nik = '$nik', nama_karyawan = '$nama_karyawan', tgl_karyawan = '$tgl_karyawan', alamat_karyawan = '$alamat_karyawan', tlp_karyawan = '$tlp_karyawan', jabatan_karyawan = '$jabatan_karyawan', status_karyawan = '$status_karyawan' WHERE karyawan_id = '$karyawan_id'"; // Add status_karyawan in the query
    $result = mysqli_query($connect, $query);

    if ($result) {
        echo "<script>
                alert('Berhasil mengedit data');
                window.location.href = '../karyawan-list-page.php';
              </script>";
    } else {
        echo "<script>alert('Gagal mengedit data: " . mysqli_error($connect) . "'); window.location.href = '../form_page.php';</script>";
    }
} else {
    echo "<script>alert('Form Tidak disubmit dengan benar'); window.location.href = '../category.php';</script>";
}
