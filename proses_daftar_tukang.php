<?php
session_start();

// Memeriksa apakah user sudah login (sebagai tukang)
if(!isset($_SESSION['user_id'])){
    header('Location: login.php');
    exit();
}

// Mengambil koneksi database (koneksi_db.php)
include("koneksi_db.php");

// Ambil data dari formulir
$namaTukang = $_POST['namaTukang'];
$alamatTukang = $_POST['alamatTukang'];
$deskripsiTukang = $_POST['deskripsiTukang'];
$noHPTukang = $_POST['noHPTukang'];
$noRekTukang = $_POST['noRekTukang'];
$hargaTukang = $_POST['hargaTukang'];

// Memeriksa apakah data tukang sudah ada berdasarkan user_id
$user_id = $_SESSION['user_id'];
$result = $db_config->query("SELECT * FROM info_tukang WHERE id = '$user_id'");

// Jika belum terdaftar, lakukan penambahan data ke dalam tabel tukang
$insert_query = "INSERT INTO info_tukang (nama, alamat, deskripsi, no_hp, norek, harga, statuss) 
                VALUES ('$namaTukang', '$alamatTukang', '$deskripsiTukang', '$noHPTukang', '$noRekTukang', '$hargaTukang', '0')";
$insert_result = $db_config->query($insert_query);

if($insert_result){
    // Jika berhasil, arahkan kembali ke halaman akun.php
    header('Location: akun.php');
} else {
    // Jika ada kesalahan, tampilkan pesan kesalahan atau lakukan tindakan sesuai kebutuhan Anda
    echo "Error: Gagal menyimpan data tukang.";
}

?>
