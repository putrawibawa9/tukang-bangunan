<?php
// session_start();
// if (!isset($_SESSION['login'])){
//     header("Location: login.php");
//     exit;
// }
require_once "functions.php";




//check whether the button has been click or not
if(isset($_POST['submit'])){

    
    //check the progress
    if (tambahTukang($_POST)>0){
        echo "
            <script>
            alert('data berhasil ditambah');
            document.location.href = 'admin.php';
            </script>
        ";
    }else{
        echo " <script>
        alert('data gagal ditambah');
        document.location.href = 'admin.php';
        </script>
    ";

    }

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Tukang</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: rgba(35, 81, 46, 0.66);
            margin: 0;
            padding: 0;
        }

        h1 {
            color: #333;
            text-align: center;
        }

        form {
            max-width: 400px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        li {
            margin-bottom: 10px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            color: #333;
        }

        input {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            background-color: #007BFF;
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }

        a {
            display: block;
            margin-top: 10px;
            color: #007BFF;
            text-decoration: none;
        }
    </style>
</head>
<body>
    
<h1>Tambah Tukang</h1>

<form action="" method="post" enctype="multipart/form-data">
<ul>
    <li>
        <label for="nama_tukang">Nama Tukang :</label>
        <input type="text" name="nama_tukang" id="nama_tukang" required >
    </li>
    <li>
        <label for="alamat_tukang">Alamat Tukang :</label>
        <input type="text" name="alamat_tukang" id="alamat_tukang" required >
    </li>
    <li>
        <label for="deskripsi_tukang">Deskripsi Tukang :</label>
        <input type="text" name="deskripsi_tukang" id="deskripsi_tukang" required >
    </li>
    <li>
        <label for="no_hp">Kontak Tukang :</label>
        <input type="text" name="no_hp" id="no_hp" required >
    </li>
    <li>
        <label for="no_rek">No Rekening Tukang :</label>
        <input type="text" name="no_rek" id="no_rek" required >
    </li>
    <li>
        <label for="harga">Harga Tukang :</label>
        <input type="text" name="harga" id="harga" required >
    </li>
    <li>
        <label for="status">Status Tukang :</label>
        <input type="text" name="status" id="status" required >
    </li>
    <li>
        <label for="foto_tukang">Foto Tukang :</label>
        <input type="file" name="foto_tukang" id="foto_tukang" required >
    </li>
    <button type="submit" name="submit">Post</button>
</ul>

<a class="btn btn-sm" href="index.php">back</a>
</form>


</body>
</html>