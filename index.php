<?php
session_start();
include './process/koneksi.php';

if (isset($_GET['id'])) {
   if ($_GET['id'] == 'false') {
      echo "<script>alert('username / password salah. Gagal masuk.')</script>";
      header("location:login.php");
   } else if ($_GET['id'] == 'out') {
      echo "<script>alert('Anda belum masuk, silahkan maasuk.')</script>";
      header("location:login.php");
   } else {
      echo "<script>alert('Logout berhasil.')</script>";
      header("location:login.php");
   }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8" />
   <meta name="viewport" content="width=device-width, initial-scale=1.0" />
   <title>Sistem Pendukung Keputusan</title>
   <link rel="stylesheet" href="./css/login.css" />
</head>

<body>
   <div class="login-container">
      <center>
         <img src="./images/logo1.png" alt="logo" style="height: 170px;">
      </center>
      <div class="login-box">
         <h1>SISTEM PENDUKUNG KEPUTUSAN</h1>
         <p>
            Pemilihan Karyawan Terbaik Menggunakan Metode Weight Product (WP)
         </p>
         <form method="POST" role="form">
            <div class="input-group">
               <input type="text" id="username" name="username" placeholder="Username" required />
            </div>
            <div class="input-group">
               <input type="password" id="password" name="password" placeholder="Password" required />
            </div>
            <button type="submit" name="submit" value="Masuk">Login</button>
         </form>
         <?php
         if (isset($_POST['submit'])) {
            $username = mysqli_real_escape_string($connect, $_POST['username']);
            $password = mysqli_real_escape_string($connect, $_POST['password']);

            $sqllogin = "SELECT * FROM pengguna WHERE username='$username' AND password='$password'";
            $querylogin = mysqli_query($connect, $sqllogin);

            if (mysqli_num_rows($querylogin) > 0) {
               $row = mysqli_fetch_assoc($querylogin);
               $_SESSION['username'] = $username;
               $_SESSION['nama'] = $row['nama'];
               $_SESSION['level'] = $row['level'];
               $_SESSION['stat'] = 'masuk';
               echo "<script>alert('Berhasil masuk, selamat datang " . $row['nama'] . "')</script>";
               header("location:landing-page.php");
               exit;
            } else {
               echo "<script>alert('Username/password salah')</script>";
            }
         }

         ?>
      </div>
   </div>
</body>

</html>