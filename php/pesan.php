<?php
function done(){
    echo "<script>
    Swal.fire({
        title: 'Success😍😍😍',
        text: 'Pesanan Anda Sukses Dipesan, tunggu penjual menghubungi anda',
        icon: 'success',
        button: true,
    })
    </script>";
}
if(isset($_POST['pesan'])){
    $jumlah_pesanan =intval($_POST['order']);
    if(is_numeric($jumlah_pesanan)){

        $bot_token = "6928534641:AAFuPlHocg2r38BVRk30lmpm-S9N6xXfNHg";
        
        $message = "Pesanan Baru: $jumlah_pesanan";
        
        $pesan_url = "http://t.me/warkopBerkahBot";
        
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $pesan_url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_exec($ch);
        curl_close($ch);
        header("Location: $pesan_url");
        exit();
    }else{
        echo "Tolong inputkan pesanan berupa angka";
    }
}
?>