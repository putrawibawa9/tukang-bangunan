<!-- akun.php -->
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
$result = $db_config->query("SELECT * FROM user WHERE id = '$user_id' LIMIT 1");

// Memeriksa apakah hasil kueri ditemukan
if($result->num_rows === 1){
    $user_data = $result->fetch_assoc();
} else {
    // Jika data tidak ditemukan, sesuaikan tindakan sesuai kebutuhan Anda
    // Contohnya bisa mengarahkan pengguna ke halaman lain atau menampilkan pesan kesalahan
    echo "Error: Data pengguna tidak ditemukan.";
    exit();
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
    <link rel="stylesheet" href="css/akun.css" />
    <link rel="icon" href="images/logo-05.png" type="image/x-icon" />
    <!-- css ekstrnal selesai -->
  </head>
  <body>
    <!-- bagian navbar mulai -->
    <nav
      class="navbar navbar-expand-lg navbar-dark position-fixed w-100"
      style="top: 0px"
    >
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
          <form class="input-group me-3">
            <input
              class="form-control"
              type="search"
              placeholder="Search"
              aria-label="Search"
            />
            <button class="btn btn-success" type="submit">Search</button>
          </form>
          <ul class="navbar-nav">
            <li class="nav-item me-3">
              <a class="nav-link" aria-current="page" href="home.php">Home</a>
            </li>
            <li class="nav-item me-3">
              <a class="nav-link" href="favorite.php">Favorite</a>
            </li>
            <li class="nav-item me-3">
              <a class="nav-link" href="cart.php">Cart</a>
            </li>
            <li
              class="nav-item me-3 m-0 p-0 active"
              style="height: 45px; width: 45px; margin-top: 10px"
            >
              <a href="akun.htm" class="ms-1"
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
      <div class="row" style="margin-top: 150px; width: 100%; background-color: white;">
        <div class="row atas p-0 m-0">
          <div class="col p-5 pb-0 pt-0 kiri">
            <img src="images/bale.jpg" style="width: 40%" />
            <h1><?php echo $user_data['nama']; ?></h1>
          </div>
          <div
            class="col kanan p-0 m-0"
            style="display: flex; align-items: center;"
          >
            <div class="p-0 m-0">
              <img src="images/dompet.png" alt="" />
              <h2>Metode Pembayaran</h2>
              <h4>Cash</h4>
            </div>
          </div>
        </div>
        <div class="row tengah-1 ps-5 p-0">
          <div class="col">
            <div>
            <h4><?php echo $user_data['alamat']; ?></h4>
            <h4><?php echo $user_data['no_hp']; ?></h4>
            <h4><?php echo $user_data['email']; ?></h4>
            </div>
          </div>
          <div class="col">
            <h4>Memiliki keahlian sebagai tukang ?</h4>
            <button type="button"  class="btn btn-success pb-0 m-0 mt-4" data-bs-toggle="modal" data-bs-target="#daftarTukangModal" style="display: flex">
              <h3 style="margin-right: 20px">Daftar sekarang</h3>
              <img
                src="images/kanan.png"
                style="width: 15%; margin-right: 0px"
              />
            </button>
          </div>
        </div>
        <div class="row tengah-2 ps-5 p-0 pt-5">
          <div class="col">
            <div style="display: flex">
              <button type="button" class="btn btn-success me-3" data-bs-toggle="modal" data-bs-target="#editModal">Edit Profile</button>
              <form action="loginlogoutproses.php" method="get">
                  <button class="btn btn-success me-3" type="submit" name="logout">Logout</button>
              </form>
            </div>
          </div>
          <div class="col">
            <div class="row">
              <div class="col-4 pt-1">
                <h4>Riwayat Transaksi</h4>
              </div>
              <div class="col-1">
                <img src="images//history.png" style="width: 90%" />
              </div>
            </div>
          </div>
        </div>
        <div class="row bawah mt-4 ms-2">
        <?php
          $user_id = $_SESSION['user_id'];
          $sql = "SELECT DISTINCT id_tukang, id_transaksi, id_user, harga, nama, deskripsi, no_hp FROM transaksi WHERE id_user ='$user_id'";
          $query = mysqli_query($db_config, $sql);

          // Membuat array asosiatif untuk menyimpan informasi tukang berdasarkan id_tukang
          $tukang_info = array();

          while ($db = mysqli_fetch_array($query)) {
              $id_tukang = $db['id_tukang'];

              // Jika id_tukang belum ada dalam array, tambahkan informasi tukang ke dalam array
              if (!isset($tukang_info[$id_tukang])) {
                  $tukang_info[$id_tukang] = array(
                      'id_transaksi' => $db['id_transaksi'],
                      'id_user' => $db['id_user'],
                      'harga' => $db['harga'],
                      'nama' => $db['nama'],
                      'deskripsi' => $db['deskripsi'],
                      'no_hp' => $db['no_hp']
                  );
              }
          }

          // Menampilkan informasi tukang dari array yang sudah diolah
          foreach ($tukang_info as $id_tukang => $info) {
          ?>
              <div class="col-4 mb-4">
                  <div class="card m-2 h-100 w-100 p-4 pb-2">
                      <div class="raw d-flex align-items-center">
                          <img src="images/icon-org.png" />
                          <h3><?= $info['nama'] ?></h3>
                      </div>
                      <div class="raw d-flex mt-4">
                          <div class="col">
                              <img src="images/favorite-outline.png" style="height: 35px; width: 35px" />
                              <img src="images/keranjang.png" style="height: 35px; width: 35px" />
                          </div>
                          <div class="col">
                              <button type="button" class='btn btn-success d-flex m-0' data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="tampilkanNomorHp('<?= $info['no_hp'] ?>')">
                                  <h6>Hubungi</h6>
                                  <img src="images/telfon.png" style="height: 20px; width: 20px; margin-left: 30px" />
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

      <!-- Modal -->
      <form action="proses_edit.php" method="post">
        <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Profile</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <!-- Formulir Edit -->              
                    <div class="form-group">
                        <label for="editNama">Nama:</label>
                        <input type="text" class="form-control" id="editNama" name="editNama" value="<?php echo $user_data['nama']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="editAlamat">Alamat:</label>
                        <input type="text" class="form-control" id="editAlamat" name="editAlamat" value="<?php echo $user_data['alamat']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="editNoHP">No. HP:</label>
                        <input type="text" class="form-control" id="editNoHP" name="editNoHP" value="<?php echo $user_data['no_hp']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="editEmail">Email:</label>
                        <input type="email" class="form-control" id="editEmail" name="editEmail" value="<?php echo $user_data['email']; ?>">
                    </div>          
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success">Save changes</button>
              </div>
            </div>
          </div>
        </div>
      </form>
      
      <form action="proses_daftar_tukang.php" method="post">
        <div class="modal fade" id="daftarTukangModal" tabindex="-1" aria-labelledby="daftarTukangModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="daftarTukangModalLabel">Edit Profile</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <!-- Formulir Daftar -->
                  <div class="form-group">
                      <label for="namaTukang">Nama:</label>                      
                      <input type="text" class="form-control" id="namaTukang" name="namaTukang" value="<?php echo $user_data['nama']; ?>" required>
                  </div>
                  <div class="form-group">
                      <label for="alamatTukang">Alamat:</label>
                      <input type="text" class="form-control" id="alamatTukang" name="alamatTukang" value="<?php echo $user_data['alamat']; ?>" required>
                  </div>
                  <div class="form-group">
                      <label for="deskripsiTukang">Deskripsi:</label>
                      <textarea class="form-control" id="deskripsiTukang" name="deskripsiTukang" rows="3" required></textarea>
                  </div>
                  <div class="form-group">
                      <label for="noHPTukang">No. HP:</label>
                      <input type="text" class="form-control" id="noHPTukang" name="noHPTukang" value="<?php echo $user_data['no_hp']; ?>" required>
                  </div>
                  <div class="form-group">
                      <label for="noRekTukang">No. Rek:</label>
                      <input type="text" class="form-control" id="noRekTukang" name="noRekTukang" required>
                  </div>
                  <div class="form-group">
                      <label for="hargaTukang">Harga:</label>
                      <input type="text" class="form-control" id="hargaTukang" name="hargaTukang" required>
                  </div>         
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success">Save changes</button>
              </div>
            </div>
          </div>
        </div>
      </form>
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
