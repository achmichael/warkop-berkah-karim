<?php
include '../database/database.php';//diberi tanda .. karena file php di dalam folder untuk mengakses folder diluar php maka diperlukan tanda ..
function test_input($data){
    $data = trim($data);//menghapus leading dan trailing whitespace
    $data = stripslashes($data);//menghapus backshlases
    $data = htmlspecialchars($data);//mengonversi karakter khusus menjadi entitas HTML
    return $data;
}
$register_message = "";
if(isset($_POST['send'])){//melakukan pengecekan apakah ada tindakan dari user dari tombol button yang bernama send
    $nama = test_input($_POST['nama']);
    $email = test_input($_POST['email']);
    $phone = test_input($_POST['phone']);
    if(empty($nama)){//melakukan pengecekan apabila kolom nama tidak diisi
        echo "Tolong isi Nama Terlebih dahulu karena diperlukan";
    }else{
        $name = $_POST['nama'];
        if(!preg_match("/^[a-zA-Z-' ]*$/", $name)){//melakukan pengecekan terhadap value yang diinput harus berupa huruf dan spasi
            echo "Nama Harus Berupa Huruf Dan Spasi";
        } else {
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){//melakukan pengecekan agar penulisan email sesuai dengan formatnya dengan tanda (@)
                $emailErr = "Tolong Tuliskan Email Secara Benar dengan menggunakan tanda @";
                echo $emailErr. "<br>Contoh achmadmichael4@gmail.com";
            }else {
                if(is_numeric($phone) && preg_match("/^62/", $phone)){//melakukan pengecekan terhadap value input harus berupa angka pada kolom nomor telepon
                    $sql = "INSERT INTO users (username, email, phone) VALUES ('$nama','$email','$phone')";

                    if($db->query($sql)){
                       $register_message = "Akun Sudah Terdaftar,Silahkan Login...";
                    }
                } else {
                    $register_message = "Tolong Inputkan Nomor Telepon Berupa Angka, dan gunakan kode negara indonesia (62)";
                }
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
   <?= $register_message ?>
</body>
</html>