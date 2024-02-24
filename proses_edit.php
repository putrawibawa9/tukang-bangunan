<?php
session_start();

// Memeriksa apakah user sudah login
if(!isset($_SESSION['user_id'])){
    header('Location: login.php');
    exit();
}

// Mengambil koneksi database (koneksi_db.php)
include("koneksi_db.php");

// Mengambil informasi pengguna dari tabel user berdasarkan user_id
$user_id = $_SESSION['user_id'];

// Ambil data yang diedit dari formulir
$editNama = $_POST['editNama'];
$editAlamat = $_POST['editAlamat'];
$editNoHP = $_POST['editNoHP'];
$editEmail = $_POST['editEmail'];

// Update informasi pengguna ke dalam database
$update_query = "UPDATE user SET nama = '$editNama', alamat = '$editAlamat', no_hp = '$editNoHP', email = '$editEmail' WHERE id = '$user_id'";
$update_result = $db_config->query($update_query);

if($update_result){
    // Jika pembaruan berhasil, arahkan kembali ke halaman akun.php
    header('Location: akun.php');
} else {
    // Jika ada kesalahan, tampilkan pesan kesalahan atau lakukan tindakan sesuai kebutuhan Anda
    echo "Error: Gagal menyimpan perubahan.";
}
?>
