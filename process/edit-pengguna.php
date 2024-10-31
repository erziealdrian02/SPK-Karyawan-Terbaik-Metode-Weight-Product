<?php
include('koneksi.php');

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $pengguna_id = $_POST['pengguna_id'];
    $nama_pengguna = mysqli_real_escape_string($connect, $_POST['nama_pengguna']);
    $username = mysqli_real_escape_string($connect, $_POST['username']);
    $password = mysqli_real_escape_string($connect, $_POST['password']);
    $level = mysqli_real_escape_string($connect, $_POST['level']);

    // Update the database with the new data
    $query = "UPDATE pengguna SET nama_pengguna = '$nama_pengguna', username = '$username', password = '$password', level = '$level' WHERE pengguna_id = '$pengguna_id'";
    $result = mysqli_query($connect, $query);

    if ($result) {
        echo "<script>
                alert('Berhasil mengedit data');
                window.location.href = '../pengguna-page.php';
              </script>";
    } else {
        echo "<script>alert('Gagal mengedit data: " . mysqli_error($connect) . "'); window.location.href = '../form_page.php';</script>";
    }
} else {
    echo "<script>alert('Form Tidak disubmit dengan benar'); window.location.href = '../category.php';</script>";
}
