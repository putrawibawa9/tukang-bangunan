<?php include("koneksi_db.php"); 
session_start();

// Memeriksa apakah user sudah login
if(!isset($_SESSION['user_id'])){
    header('Location: login.php');
    exit();
}
?>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['id'])) {
        $id = $_POST['id'];
        $harga = $_POST['harga'];
        $nama = $_POST['nama'];
        $deskripsi = $_POST['deskripsi'];
        $no_hp = $_POST['no_hp'];
        $alamat = $_POST['alamat'];
        $norek = $_POST['norek'];

        $sql = "INSERT INTO favorite(id_tukang, id_user, harga, nama, deskripsi, no_hp, alamat, norek) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $db_config->prepare($sql);
        $stmt->bind_param("iiississ", $id, $_SESSION['user_id'], $harga, $nama, $deskripsi, $no_hp, $alamat, $norek);
        $stmt->execute();

        // Redirect ke halaman cart untuk menampilkan data dalam tabel
        header("Location: favorite.php");
    }
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Tubang.id</title>

    <!-- bootstrap 5.1.3 instalasi -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
      crossorigin="anonymous"
    />
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
      crossorigin="anonymous"
    ></script>
    <!-- bootstrap 5.1.3 selesai -->

    <!-- font google api poppins instalasi -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Inter:wght@200;400;500;600;700&display=swap"
      rel="stylesheet"
    />
    <!-- font google api poppins selesai -->

    <!-- css ekstrnal instalasi -->
    <link rel="stylesheet" href="css/favorite.css" />
    <link rel="icon" href="images/logo-05.png" type="image/x-icon" />
    <!-- css ekstrnal selesai -->
  </head>
  <body>
    <!-- bagian navbar mulai -->
    <nav class="navbar navbar-expand-lg navbar-dark position-fixed w-100" style="z-index: 5;">
      <div class="container">
        <a class="navbar-brand" href="index.php">
          <img
            src="images/logo-putih.png"
            alt=""
            class="d-inline-block align-item-center me-3"
          />
        </a>
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarNav"
          aria-controls="navbarNav"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div
          class="collapse navbar-collapse"
          id="navbarNav"
          style="margin-left: 20vw"
        >
          <form class="input-group me-3" method="GET" action="favorite.php">
            <input
              class="form-control"
              type="search"
              placeholder="Temukan Nama Tukang "
              aria-label="Search"
              name="search"
            />
            <button class="btn btn-success" type="submit">Search</button>
          </form>
          <ul class="navbar-nav">
            <li class="nav-item me-3">
              <a class="nav-link" aria-current="page" href="home.php">Home</a>
            </li>
            <li class="nav-item me-3 active">
              <a class="nav-link" href="favorite.php">Favorite</a>
            </li>
            <li class="nav-item me-3">
              <a class="nav-link" href="cart.php">Cart</a>
            </li>
            <li
              class="nav-item me-3 m-0 p-0"
              style="height: 45px; width: 45px; margin-top: 10px"
            >
              <a href="akun.php" class="ms-1"
                ><img
                  class="mt-1"
                  src="images/icon-org.png"
                  style="height: 35px; width: 35px"
              /></a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- bagian navbar selesai -->

    <!-- bagian konten mulai -->
    <section id="hero">
      <div class="container h-100">
        <div
          class="row mb- atas"
          style="position: fixed; background-color: #6e8c75; z-index: 3; width: 100%;"
        >
          <div class="row">
            <div
              class="col-12 p-0 d-flex"
              style="margin-top: 130px; padding: 20px"
            >
              <div class="col-1 m-2 ms-3 me-4">
                <h3>Favorites</h3>
              </div>
              <div class="col-1 ms-5 mt-2">
                <img src="images/love.png" alt="" />
              </div>
            </div>
          </div>
          <div class="row">
            <p>
              Temukan tukang yang anda favoritkan dan mulai menggunakan jasa
            </p>
          </div>
        </div>
        <div class="row bawah" style="z-index: 2; padding-top: 300px">
        <?php
        $user_id = $_SESSION['user_id'];
        $search = isset($_GET['search']) ? $_GET['search'] : '';
        $sql = "SELECT * FROM favorite WHERE id_user ='$user_id' AND nama LIKE '%$search%'";
        $query = mysqli_query($db_config, $sql);

        // Membuat array asosiatif untuk menyimpan informasi tukang berdasarkan id_tukang
        $tukang_info = array();

        while ($db = mysqli_fetch_array($query)) {
            $id_tukang = $db['Id_tukang'];

            // Jika id_tukang belum ada dalam array, tambahkan informasi tukang ke dalam array
            if (!isset($tukang_info[$id_tukang])) {
                $tukang_info[$id_tukang] = array(
                    'nama' => $db['nama'],
                    'harga' => $db['harga'],
                    'deskripsi' => $db['deskripsi'],
                    'no_hp' => $db['no_hp'],
                    'alamat' => $db['alamat'],
                    'norek' => $db['norek']
                );
            }
        }

        // Menampilkan informasi tukang dari array yang sudah diolah
        foreach ($tukang_info as $id_tukang => $info) {
        ?>
            <div class='col-4 mb-4'>
                <div class='card m-2 h-100 w-100 p-4 pb-2'>
                    <div class='raw d-flex align-items-center'>
                        <img src='images/icon-org.png' />
                        <h3><?= $info['nama'] ?></h3>
                    </div>
                    <div class="raw">
                        <h5>Rp<?= number_format($info['harga'], 0, ',', '.') ?></h5>
                    </div>
                    <div class='raw'>
                        <p>Berdomisili di Denpasar</p>
                        <p><?= $info['deskripsi'] ?></p>
                    </div>
                    <div class='raw d-flex'>
                        <div class='col d-flex'>
                            <form action="favorite.php" method="post">
                                <input type="hidden" name="id" value="<?= $id_tukang ?>">
                                <input type="hidden" name="harga" value="<?= $info['harga'] ?>">
                                <input type="hidden" name="nama" value="<?= $info['nama'] ?>">
                                <input type="hidden" name="deskripsi" value="<?= $info['deskripsi'] ?>">
                                <input type="hidden" name="no_hp" value="<?= $info['no_hp'] ?>">
                                <input type="hidden" name="norek" value="<?= $info['norek'] ?>">
                                <input type="hidden" name="alamat" value="<?= $info['alamat'] ?>">
                                <button type="submit" class="btn me-2" style="height: 35px; width: 35px; background: transparent; ">
                                    <img src='images/love.png' style='height: 35px; width: 35px' />
                                </button>
                            </form>
                            <form action="cart.php" method="post">
                                <input type="hidden" name="id" value="<?= $id_tukang ?>">
                                <input type="hidden" name="harga" value="<?= $info['harga'] ?>">
                                <input type="hidden" name="nama" value="<?= $info['nama'] ?>">
                                <input type="hidden" name="deskripsi" value="<?= $info['deskripsi'] ?>">
                                <input type="hidden" name="no_hp" value="<?= $info['no_hp'] ?>">
                                <input type="hidden" name="norek" value="<?= $info['norek'] ?>">  
                                <input type="hidden" name="durasi" value="1">                              
                                <button type="submit" class="btn " style="height: 35px; width: 35px; background: transparent; ">
                                    <img src="images/keranjang.png" alt="" style='height: 35px; width: 35px'>
                                </button>
                            </form>
                        </div>
                        <div class='col'>
                            <button type="button" class='btn btn-success d-flex m-0' data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="tampilkanNomorHp('<?= $info['no_hp'] ?>')">
                                <h6>Hubungi</h6>
                                <img src='images/telfon.png' style='height: 20px; width: 20px; margin-left: 30px' />
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>

        </div>
      </div>
    </section>

    <section>
      <!-- Modal -->
      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">No Whatsapp</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <h5>Silahkan hubungi tukang pada nomor berikut untuk informasi lebih lanjut</h5>
              <p id="nomorHpTukang"></p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- bagian konten selesai -->

    <script>
        function tampilkanNomorHp(nomorHp) {
            // Mengatur teks pada elemen dengan id "nomorHpTukang"
            document.getElementById('nomorHpTukang').innerText = "Nomor HP: " + nomorHp;
        }
    </script>

  </body>
</html>
