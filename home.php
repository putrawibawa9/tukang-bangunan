<?php include("koneksi_db.php");
session_start();

// Memeriksa apakah user sudah login
if(!isset($_SESSION['user_id'])){
    header('Location: login.php');
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

    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
    />

    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
    />

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
    <link rel="stylesheet" href="css/home.css" />
    <link rel="icon" href="images/logo-05.png" type="image/x-icon" />
    <!-- css ekstrnal selesai -->
  </head>
  <body>
    <!-- bagian navbar mulai -->
    <nav
      class="navbar navbar-expand-lg navbar-dark bg-transparent position-fixed w-100"
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
          <form class="input-group me-3" method="GET" action="home.php">
            <input
              class="form-control"
              type="search"
              placeholder="Temukan Nama Tukang"
              aria-label="Search"
              name="search"
            />
            <button class="btn btn-success" type="submit">Search</button>
          </form>
          <ul class="navbar-nav">
            <li class="nav-item me-3 active">
              <a class="nav-link" aria-current="page" href="home.php">Home</a>
            </li>
            <li class="nav-item me-3">
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
        <div class="row mb-4 atas">
          <div class="col-12 card p-0" style="margin-top: 130px; padding: 0px;" >
            <div id="carouselExampleControls" class="carousel slide p-0 m-0" data-bs-ride="carousel" style="position: absolute; z-index: 2; padding: 0px; margin-left: 0px">
              <div class="carousel-inner p-0 m-0" style="padding: 0px; margin-left: 0px">
                <div class="carousel-item active">
                  <div class="row">
                    <div class="col-7 pt-5 kiri" style="padding-left: 160px">
                      <h2>Proyek Pembuatan Kolam Renang</h2>
                      <h3>Start From <span>200K / Day</span></h3>
                      <p class="pt-3 pb-3">
                        Kolam renang dapat menambah nilai estetika dari sebuah rumah
                        dan tentunya akan menjadi tempat terindah untuk menikmati hari
                        bersama keluarga
                      </p>
                      <div class="row info m-0 p-0">
                        <div class="col-10 m-0 p-0 ps-4 pt-2">
                          <h3>Beberapa Rekomendasi tukang dari kami</h3>
                        </div>
                      </div>
                    </div>
                    <div class="col-5 card kanan-1"></div>
                  </div>
                </div>
                <div class="carousel-item">
                  <div class="row">
                    <div class="col-7 pt-5 kiri" style="padding-left: 160px">
                      <h2>Proyek Pembuatan Kandang Ayam</h2>
                      <h3>Start From <span>200K / Day</span></h3>
                      <p class="pt-3 pb-3">
                        Kandang Ayam dapat menambah nilai estetika dari sebuah rumah
                        dan tentunya akan menjadi tempat terindah untuk menikmati hari
                        bersama keluarga
                      </p>
                      <div class="row info m-0 p-0">
                        <div class="col-10 m-0 p-0 ps-4 pt-2">
                          <h3>Beberapa Rekomendasi tukang dari kami</h3>
                        </div>
                      </div>
                    </div>
                    <div class="col-5 card kanan-2"></div>
                  </div>
                </div>
                <div class="carousel-item">
                  <div class="row">
                    <div class="col-7 pt-5 kiri" style="padding-left: 160px">
                      <h2>Proyek Pembuatan Kandang Ayam</h2>
                      <h3>Start From <span>200K / Day</span></h3>
                      <p class="pt-3 pb-3">
                        Kandang Ayam dapat menambah nilai estetika dari sebuah rumah
                        dan tentunya akan menjadi tempat terindah untuk menikmati hari
                        bersama keluarga
                      </p>
                      <div class="row info m-0 p-0">
                        <div class="col-10 m-0 p-0 ps-4 pt-2">
                          <h3>Beberapa Rekomendasi tukang dari kami</h3>
                        </div>
                      </div>
                    </div>
                    <div class="col-5 card kanan-3"></div>
                  </div>
                </div>
                <div class="carousel-item">
                  <div class="row">
                    <div class="col-7 pt-5 kiri" style="padding-left: 160px">
                      <h2>Proyek Pembuatan Bangunan Bali</h2>
                      <h3>Start From <span>200K / Day</span></h3>
                      <p class="pt-3 pb-3">
                        Bangunan Bali dapat menambah nilai estetika dari sebuah rumah
                        dan tentunya akan menjadi tempat terindah untuk menikmati hari
                        bersama keluarga
                      </p>
                      <div class="row info m-0 p-0">
                        <div class="col-10 m-0 p-0 ps-4 pt-2">
                          <h3>Beberapa Rekomendasi tukang dari kami</h3>
                        </div>
                      </div>
                    </div>
                    <div class="col-5 card kanan-4"></div>
                  </div>
                </div>
              </div>     
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev" style="position: absolute; z-index: 5;">
              <img src="images/kiri.png">
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next" style="position: absolute; z-index: 5;">
              <img src="images/kanan.png">
            </button>
          </div>
        </div>
        <div class="row bawah">
          <?php

          // Mendapatkan input pencarian dari $_GET atau $_POST
          $search = isset($_GET['search']) ? $_GET['search'] : '';


          $sql = "SELECT * FROM info_tukang WHERE nama LIKE '%$search%' AND statuss = 1 ";
          $query = mysqli_query($db_config, $sql);
              
          while ($db = mysqli_fetch_array($query)):
              
          ?>
          <div class='col-4 mb-4'>
              <div class='card m-2 h-100 w-100 p-4 pb-2'>
                  <div class='raw d-flex align-items-center'>
                      <img src='images/icon-org.png' />
                      <h3><?= $db['nama'] ?></h3>
                  </div>
                  <div class="raw">
                    <h5>Rp<?= number_format($db['harga'], 0, ',', '.') ?></h5>
                  </div>
                  <div class='raw'>
                      <p>Berdomisili di denpasar</p>
                      <p><?= $db['deskripsi'] ?></p>
                  </div>
                  <div class='raw d-flex'>
                      <div class='col d-flex'>
                          <form action="favorite.php" method="post">
                          <input type="hidden" name="id" value="<?= $db['id'] ?>">
                              <input type="hidden" name="harga" value="<?= $db['harga'] ?>">
                              <input type="hidden" name="nama" value="<?= $db['nama'] ?>">
                              <input type="hidden" name="deskripsi" value="<?= $db['deskripsi'] ?>">
                              <input type="hidden" name="no_hp" value="<?= $db['no_hp'] ?>">
                              <input type="hidden" name="norek" value="<?= $db['norek'] ?>">
                              <input type="hidden" name="alamat" value="<?= $db['alamat'] ?>">
                              <button type="submit" class="btn me-2" style="height: 35px; width: 35px; background: transparent; ">
                                <img src='images/love.png' style='height: 35px; width: 35px' />
                              </button>
                          </form>
                              </button>
                          </form>
                          <form action="cart.php" method="post">
                              <input type="hidden" name="id" value="<?= $db['id'] ?>">
                              <input type="hidden" name="harga" value="<?= $db['harga'] ?>">
                              <input type="hidden" name="nama" value="<?= $db['nama'] ?>">
                              <input type="hidden" name="deskripsi" value="<?= $db['deskripsi'] ?>">
                              <input type="hidden" name="no_hp" value="<?= $db['no_hp'] ?>">
                              <input type="hidden" name="norek" value="<?= $db['norek'] ?>">
                              <input type="hidden" name="durasi" value="1">
                              <button type="submit" class="btn " style="height: 35px; width: 35px; background: transparent; ">
                                <img src="images/keranjang.png" alt="" style='height: 35px; width: 35px'>
                              </button>
                          </form>
                      </div>
                      <div class='col'>
                          <button type="button" class='btn btn-success d-flex m-0' data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="tampilkanNomorHp('<?= $db['no_hp'] ?>')">
                              <h6>Hubungi</h6>
                              <img src='images/telfon.png' style='height: 20px; width: 20px; margin-left: 30px' />
                          </button>
                      </div>
                  </div>
              </div>
            </div>
          <?php endwhile; ?>
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
