<?php
include("koneksi_db.php");
session_start();

// Jika parameter logout diterima, lakukan proses logout
if(isset($_GET['logout'])){
    // Hapus semua data sesi
    $_SESSION = array();

    // Hapus cookie sesi jika ada
    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000,
            $params["path"], $params["domain"],
            $params["secure"], $params["httponly"]
        );
    }

    // Hancurkan sesi
    session_destroy();

    // Redirect ke halaman login setelah logout
    header('Location: login.php');
    exit();
}

$email = $_POST['email'];
$password = $_POST['password'];

// Informasi login admin yang dihardcode
$adminEmail = 'admin@admin.com';
$adminPassword = 'admin123';

// Periksa apakah pengguna login sebagai admin
if ($email == $adminEmail && $password == $adminPassword) {
    $_SESSION['admin'] = true; // Sesuaikan dengan nama sesi yang sesuai untuk admin
    header('Location: admin.php');
    exit();
}

// Jika bukan admin, periksa login di database
$result = $db_config->query("SELECT * FROM user WHERE email = '$email' AND password = '$password'");

if ($result->num_rows === 1) {
    $user = $result->fetch_assoc();
    $_SESSION['user_id'] = $user['id']; // menyimpan ID user dalam sesi
    $_SESSION['email'] = $email;
    header('Location: home.php');
    exit();
} else {
    header('Location: login.php');
    exit();
}
?>
