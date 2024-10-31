<?php
include("./process/koneksi.php");
$nama_karyawan = $_POST['nama_karyawan'];
$tampil = mysqli_query($connect, "SELECT nik, kehadiran_karyawan,jabatan_karyawan FROM karyawan WHERE nama_karyawan='$nama_karyawan'");
$data = mysqli_fetch_array($tampil);

echo json_encode($data);
