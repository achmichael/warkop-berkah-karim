<?php
include 'database/database.php';
$login_message = "";
$register_message = "";
if (isset($_POST['login'])){//eksekusi jika tombol button yang bernama login di klik oleh user
    $username = $_POST['username'];
    $password = $_POST['email'];

   if(!empty($username) && !empty($password)) {//agar ketika user belum input username dan password tidak bisa login
    $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password' ";
    $result = $db->query($sql);
    if ($result->num_rows > 0){ //jika data ada di dalam database
                header("Location: menu.php");
              exit();
            }else{
        $login_message = 'Ooppss, Username dan password anda salah, harap coba sekali lagi...';
    }
   }else{
    $login_message = "Tolong isi username dan password anda terlebih dahulu untuk login...";
   }
}
if(isset($_POST['register'])){//eksekusi ketika tombol button yang bernama register diklik oleh user
    $username = $_POST['username'];
    $password = $_POST['email'];

  if(!empty($username) && !empty($password)){//untuk pengecekan apakah user sudah input username dan password
    try{
        $sql = "INSERT INTO users (username, password) VALUES ('$username' , '$password')";

         if($db->query($sql)){
            $register_message = "Daftar Akun Berhasil, Silahkan Login...";
         }else{
            $register_message = "Daftar Akun Gagal, Silahkan Buat akun lain...";
         }
   }catch(Exception $e){// agar program tidak berhenti jika ada username yang sama antara register dan yang ada di database karena username bertipe unique yanga artinya harus berbeda tidak boleh ada yang sama
        $register_message = "Username Sudah Tersedia, silahkan gunakan username lain...";
   }
  }else{
    $register_message = "Tolong isi username dan password untuk register akun...";
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,300;0,500;0,700;1,700&display=swap" rel="stylesheet">
          <!-- Feather Icon -->
<script src="https://unpkg.com/feather-icons"></script>
          <!-- Feather Icon -->

          <!-- Library Sweet Alert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Warkop Berkah</title>
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
<nav class="kolom">
    <div class="navbar">
        <a href="../index.php"><i data-feather="arrow-left-circle"></i></a>
        <h3>Login <span>Akun</span></h3>
        <a href="#" onclick="tutupHalaman()" id="silang"><i data-feather="menu"></i></a>
    </div>
</nav>
<div class="data">
    <section class="main">
        <main class="content">
            <h3>Warkop Berkah <span>Karim</span></h3>
        </main>
        <div class="text">
        <p>Jika Anda Tidak Mempunyai Akun Silahkan Register Terlebih Dahulu</p>
        </div>
    </section>
    <div class ="user">
    <form action="index.php" method="POST">
        <div class="message">
        <?= $register_message ?>
        <?= $login_message?>
        </div>
        <div class="username">
            <label for = "username">Username </label><br>
            <input type="text" name="username"><br>
        </div>
        <div class="email">
         <label for="email">Password </label><br>
            <input type="text" name="email"><br>
        </div>
    <div class="btn">
        <button id="loginButton" type="submit" name="login">Login Akun</button>
        <button id="registerButton" type="submit" name="register">Daftar Akun</button>
    </div>
</form>
    </div>
</div>
<script>
    feather.replace();
  </script>
   <script src="js/script.js"></script>
</body>
</html>