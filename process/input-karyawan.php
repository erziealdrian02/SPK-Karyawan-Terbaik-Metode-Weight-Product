<?php
include("koneksi.php");

if (isset($_POST['submit'])) {

    $nik = $_POST['nik'];
    $nama_karyawan = $_POST['nama_karyawan'];
    $tgl_karyawan = $_POST['tgl_karyawan'];  // Tanggal dalam format yyyy-mm-dd
    $alamat_karyawan = $_POST['alamat_karyawan'];
    $tlp_karyawan = $_POST['tlp_karyawan'];
    $jabatan_karyawan = $_POST['jabatan_karyawan'];
    $status_karyawan = $_POST['status_karyawan'];

    // Konversi tanggal dari format yyyy-mm-dd ke format yang sesuai dengan database jika perlu
    // Tidak perlu konversi jika format input dan database sama
    $tgl_karyawan = date("Y-m-d", strtotime($tgl_karyawan));

    $random_number = mt_rand(10, 50); // Generate a random number between 10 and 50
    $karyawan_id = 'KAR' . $random_number;

    $sql = "INSERT INTO karyawan (karyawan_id, nik, nama_karyawan, tgl_karyawan, alamat_karyawan, tlp_karyawan, jabatan_karyawan, status_karyawan) 
            VALUES ('$karyawan_id', '$nik', '$nama_karyawan', '$tgl_karyawan', '$alamat_karyawan', '$tlp_karyawan', '$jabatan_karyawan', '$status_karyawan')";

    $query = mysqli_query($connect, $sql);

    if ($query) {
        echo "<script>
                alert('Berhasil Tambah Data');
                window.location.href = '../karyawan-list-page.php';
              </script>";
    } else {
        echo "Gagal memasukkan data: " . mysqli_error($connect);
    }

    mysqli_close($connect);
} else {
    echo "Form tidak disubmit dengan benar";
}
