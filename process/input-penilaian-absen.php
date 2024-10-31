<?php
include("koneksi.php");

if (isset($_POST['submit'])) {

    $nik = $_POST['nik'];
    $nama_pera = $_POST['nama_pera'];
    // $kehadiran_pera = $_POST['kehadiran_pera'];
    $jabatan_pera = $_POST['jabatan_pera'];

    $random_number = mt_rand(10, 50); // Generate a random number between 10 and 50
    $pera_id = 'PERA' . $random_number;

    // Perbaikan: tambahkan kehadiran_pera di dalam VALUES
    $sql = "INSERT INTO perhitungan_absen (pera_id, nik, nama_pera, kehadiran_pera,jabatan_pera, sd, pc, dt, i, s, a) VALUES ('$pera_id', '$nik', '$nama_pera', 0,'$jabatan_pera', 0, 0, 0, 0, 0, 0)";

    $query = mysqli_query($connect, $sql);

    if ($query) {
        echo "<script>
                alert('Berhasil Tambah Data');
                window.location.href = '../penilaian-absen-page.php';
              </script>";
    } else {
        echo "Gagal memasukkan data: " . mysqli_error($connect);
    }

    mysqli_close($connect);
} else {
    echo "Form tidak disubmit dengan benar";
}
