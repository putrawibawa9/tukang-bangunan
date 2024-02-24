<?php

$server = "localhost";
$user = "root";
$password = "";
$nama_database = "tubang";

$db_config = mysqli_connect($server, $user, $password, $nama_database);

if (!$db_config) {
    die("Gagal terhubung dengan database: " . mysqli_connect_error());
} else {
    // echo "Koneksi berhasil";
}

?>
