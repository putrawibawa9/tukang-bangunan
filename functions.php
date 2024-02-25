<?php


$conn =mysqli_connect("localhost","root","","tubang");


function query($query){
    global $conn;
    $result =mysqli_query($conn, $query);
    
    //make an empty array
    $rows = [];
    //loop the $result

    while( $row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }
    return $rows;
}




function tambahTukang($data) {
  global $conn;
  $nama_tukang = $data['nama_tukang'];
  $alamat_tukang = $data['alamat_tukang'];
  $deskripsi_tukang = $data['deskripsi_tukang'];
  $no_hp = $data['no_hp'];
  $no_rek = $data['no_rek'];
  $harga = $data['harga'];
  $status = $data['status'];

  //upload gambar
  $foto_tukang = upload();
  if(!$foto_tukang){
    return false;
  }

//make the insert syntax
$query = "INSERT INTO info_tukang VALUES 
          ('','$nama_tukang','$alamat_tukang','$deskripsi_tukang',' $no_hp','$no_rek',$harga,$status,'$foto_tukang')";

mysqli_query($conn,$query);
return mysqli_affected_rows($conn);
}

function upload(){
  $namaFile = $_FILES['foto_tukang']['name'];
  $ukuranFile =  $_FILES['foto_tukang']['size'];
  $error =  $_FILES['foto_tukang']['error'];  
  $tmp =  $_FILES['foto_tukang']['tmp_name'];  

  //cek apakah user sudah menambah gambar

  if($error ===4){
    echo "<script>
        alert ('pilih gambar dulu');
          </script>";
          return false;
  }

  //cek apakah yang diupload adalah gambar
  $ekstensiGambarValid =['jpg','jpeg', 'png'];
  $ekstensiGambar = explode('.', $namaFile); 
  $ekstensiGambar = strtolower(end($ekstensiGambar)); 
  if(!in_array($ekstensiGambar,$ekstensiGambarValid)){
    echo "<script>
        alert ('format gambar salah!');
          </script>";
          return false;
  }

  //cek jika ukurannya terlalu besar
  if ($ukuranFile > 1000000){
    echo "<script>
        alert ('Ukuran terlalu besar');
          </script>";
  }

  //generate nama file random
  $namaFileBaru = uniqid();
  $namaFileBaru .= '.';
  $namaFileBaru .= $ekstensiGambar;


  //lolos semua hasil cek, lalu dijalankan
  move_uploaded_file($tmp, 'images/'.$namaFileBaru);

  return $namaFileBaru;
}

function hapusTukang($id){
  global $conn;
  mysqli_query($conn,"DELETE FROM info_tukang WHERE id = $id");
  return mysqli_affected_rows($conn);
}


