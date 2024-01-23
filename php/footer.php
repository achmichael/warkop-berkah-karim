<?php 
function test_input($data){
    $data = trim($data);//menghapus leading dan trailing whitespace
    $data = stripslashes($data);//menghapus backshlases
    $data = htmlspecialchars($data);//mengonversi karakter khusus menjadi entitas HTML
    return $data;
}
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
                    echo "Nama Anda Adalah:. $nama <br> Emaill Anda adalah:. $email <br> Nomor Anda adalah:. $phone";
                } else {
                    echo "Tolong Inputkan Nomor Telepon Berupa Angka, dan gunakan kode negara indonesia (62)";
                    $whatsapp_url = "../index.php";
                    header("location: $whatsapp_url");
                    exit();
                }
            }
        }
    }
}
?>