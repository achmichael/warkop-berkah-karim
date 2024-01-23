//Untuk memunculkan sidebar pada saat mengeklik icon menu
const navbarNav = document.querySelector('.utama');
document.querySelector('#pilihan').onclick = () => {
    navbarNav.classList.toggle('active');//toggle berfungis untuk menampilkan dan menutup sidebar pada saat mengeklik icon menu
};

//Untuk menghilangkan sidebar pada saat mengeklik diluar icon menu
const menu = document.querySelector('#pilihan');
document.addEventListener('click', function(e){
    if(!menu.contains(e.target) && !navbarNav.contains(e.target)){
     navbarNav.classList.remove('active');   
    }
}
);
function lanjutkan() {
    const kotak = document.querySelector('.kotak');
    document.querySelector('.tombol'). onclick = () => {
    kotak.classList.toggle('aktiv');
}
}
function hasil(){
const kopiHitam = document.getElementById('kopi-hitam');
// Harus dilakukan parse agar ketika nanti terjadi penambahan akan menampilkan hasil dari penambahan angka bukan hasil dari penggabungan string
// || 0 berfungsi untuk ketika user tidak menginput nilai pesanan maka nilai dari varible akan disetel ke bilangan default yaitu 0 agar varible total tidak bernilai NaN (Not a Number) 
const kopiHitamValue = parseInt(kopiHitam.value, 10) || 0;
const kopiSusu = document.getElementById('kopi-susu');
const kopiSusuValue = parseInt(kopiSusu.value, 10) || 0;
const tehHangat = document.getElementById('teh-hangat');
const tehHangatValue = parseInt(tehHangat.value, 10) || 0;
const esTeh = document.getElementById('es-teh');
const esTehValue = parseInt(esTeh.value, 10) || 0;
const jerukHangat = document.getElementById('jeruk-hangat');
const jerukHangatValue = parseInt(jerukHangat.value, 10) || 0;
const esJeruk = document.getElementById('es-jeruk');
const esJerukValue = parseInt(esJeruk.value, 10) || 0;
const mieInstan = document.getElementById('mie-instan');
const mieInstanValue = parseInt(mieInstan.value, 10) || 0;
const mieTelur = document.getElementById('mie-telur');
const mieTelurValue = parseInt(mieTelur.value, 10) || 0;
const nasiGoreng = document.getElementById('nasi-goreng');
const nasiGorengValue = parseInt(nasiGoreng.value, 10) || 0;
const nasiAyam = document.getElementById('nasi-ayam');
const nasiAyamValue = parseInt(nasiAyam.value, 10) || 0;
const nasiKuning = document.getElementById('nasi-kuning');
const nasiKuningValue = parseInt(nasiKuning.value, 10) || 0;
const mieKuah = document.getElementById('mie-kuah');
const mieKuahValue = parseInt(mieKuah.value, 10) || 0;
const total = parseInt(kopiHitamValue + kopiSusuValue + tehHangatValue + esTehValue + jerukHangatValue + esJerukValue + mieInstanValue + mieTelurValue + nasiGorengValue + nasiAyamValue + nasiKuningValue + mieKuahValue);
const result = document.getElementById('result');
// statement dibawah melakukan pengecekan jika user belum menginputkan nilai maka variable total bukan berupa angka
// isNaN adalah suatu fungsi yang digunakan untuk memeriksa suatu varible bernilai angka atau bukan, jika variable bernilai angka maka isNaN akan bernilai false, dan jika bukan angka maka isNaN akan bernilai true
if (isNaN(total) ||total === 0){
    result.style.color = 'red';
    result.textContent ="Tentukan pesanan anda terlebih dahulu, dan tolong gunakan angka";
}else{
    result.style.color='black';
    result.textContent = "Pesanan Anda Ada: " + total + " item, klik sekali lagi untuk melanjutkan";
    lanjutkan();
}
}
function selectedOption(option){
    if(option === 'lanjut'){
        Swal.fire({
            title: "Pesanan Sukses Dilanjutkan",
            text: 'Ok Pesanan Anda Dilanjutkan',
            icon:  'success',
            confirmButtonText: 'Ok',
        });
    }else if (option === 'batal'){
        Swal.fire({
            title: 'Apakah anda yakin?',
            text: 'Anda akan melakukan pembatalan pesanan',
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: 'Ok',
            cancelButtonText: 'Batal',
            buttons: true, 
            dangerMode: true,
        })
        .then((result) => {//result adalah properti didalam sweet alert yang berguna menyimpan tindakan yang dilakukan oleh user
            if(result.isConfirmed){ // melakukan pengkondisian jika user memang benar2 ingin membatalkan pesanan
              Swal.fire({
                title: '😢😢😢',
                text: 'Pesanan Anda Berhasil Dibatalkan',
                icon: 'success',
                button: true,
              });
            } 
        })
    }
}
