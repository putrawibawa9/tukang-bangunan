<?php

require_once "functions.php";
$id = $_GET['id'];

if (hapusTukang($id)>0){
    echo "<script>
            alert('data berhasil dihapus');
            document.location.href = 'admin.php';
      </script>";
}else{
  echo "  <script>
            alert('data gagal dihapus');
            document.location.href = 'admin.php';
            </script>";
}


?>