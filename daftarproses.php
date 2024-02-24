<?php

include("koneksi_db.php");

// cek apakah tombol daftar sudah diklik atau blum?
if(isset($_POST['submit'])){

        // ambil data dari formulir
        $nama = $_POST['nama'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        // Nilai tertentu untuk alamat dan no_hp
        $alamat = 'Denpasar';
        $no_hp = '0123456987';

        // buat query
        $sql = "INSERT INTO user (nama, alamat, no_hp, email, password) VALUES ('$nama', '$alamat', '$no_hp', '$email', '$password')";
        $query = mysqli_query($db_config, $sql);


        // apakah query simpan berhasil?
        if ($query) {
            header('Location: login.php?status=sukses');
            //berhasil disimpan
        } else {
            header('Location: daftar.php?status=gagal');
            //tidak berhasil disimpan
        }
    } else {
        die("Akses dilarang...");
    }

?>