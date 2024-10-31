<?php
include("koneksi.php");

if (isset($_POST['submit'])) {

    $nama_pengguna = $_POST['nama_pengguna'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $level = $_POST['level'];

    $random_number = mt_rand(10, 50); // Generate a random number between 10 and 50
    $pengguna_id  = 'PE' . $random_number;

    $sql = "INSERT INTO pengguna (pengguna_id , nama_pengguna, username, password, level) VALUES ('$pengguna_id', '$nama_pengguna', '$username', '$password', '$level')";

    $query = mysqli_query($connect, $sql);

    if ($query) {
        echo "<script>
                alert('Berhasil Tambah Data');
                window.location.href = '../pengguna-page.php';
              </script>";
    } else {
        echo "Gagal memasukkan data: " . mysqli_error($connect);
    }

    mysqli_close($connect);
} else {
    echo "Form tidak disubmit dengan benar";
}
