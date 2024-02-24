<?php 
include("koneksi_db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    function updateDurasi($id_cart) {
        global $db_config;

        // Query untuk mengurangkan atau menambahkan nilai durasi
        $update_durasi_sql = "UPDATE info_tukang SET statuss = 1 WHERE statuss = 0 AND id = ?"; 

        // Persiapkan pernyataan SQL
        $stmt_update_durasi = $db_config->prepare($update_durasi_sql);

        // Bind parameter
        $stmt_update_durasi->bind_param("i", $id_cart);
        $stmt_update_durasi->execute();

        // Tutup pernyataan
        $stmt_update_durasi->close();
    }
    
    if (isset($_POST['setujui'])) {
        $cart = $_POST['setujui'];
        updateDurasi($cart);
    }

    function updateStatus($id_transaksi) {
        global $db_config;
    
        // Query untuk mengupdate nilai Status
        $update_Status_sql = "UPDATE transaksi SET statuss = 1 WHERE id_transaksi = ? AND statuss = 0"; 
    
        // Persiapkan pernyataan SQL
        $stmt_update_Status = $db_config->prepare($update_Status_sql);
    
        // Bind parameter
        $stmt_update_Status->bind_param("i", $id_transaksi);
        $stmt_update_Status->execute();
    
        // Tutup pernyataan
        $stmt_update_Status->close();
    }
    
    if (isset($_POST['sudahbayar'])) {
        $transaksi = $_POST['sudahbayar'];
        updateStatus($transaksi);
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

    <!-- font awesome -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
    />

    <!-- font awesome -->
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

    <!-- Jquery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- css ekstrnal instalasi -->
    <link rel="stylesheet" href="css/admin.css" />
    <link rel="icon" href="images/logo-05.png" type="image/x-icon" />
    <!-- css ekstrnal selesai -->
  </head>
  <body>
    <!-- bagian navbar mulai -->
    <nav
      class="navbar navbar-expand-lg navbar-dark position-fixed w-100"
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
          style="margin-left: 45vw"
        >
          <!-- <form class="input-group me-3">
            <input
              class="form-control"
              type="search"
              placeholder="Search"
              aria-label="Search"
            />
            <button class="btn btn-success" type="submit">Search</button>
          </form> -->
          <ul class="navbar-nav d-inline d-flex justify-content-end" >
            <li class="nav-item me-3 ">
              <a class="nav-link disabled" aria-current="page" href="">Home</a>
            </li>
            <li class="nav-item me-3">
              <a class="nav-link disabled" href="">Favorite</a>
            </li>
            <li class="nav-item me-3">
              <a class="nav-link disabled" href="">Cart</a>
            </li>
            <li
              class="nav-item me-3 m-0 p-0 disabled"
              style="height: 45px; width: 45px; margin-top: 10px"
            >
              <a href="" class="ms-1"
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
        <ul class="nav nav-tabs" id="myTab" role="tablist" style="margin-top: 100px;">
            <li class="nav-item" role="presentation">
                <button class="nav-link active fw-bold" id="DaftarTukang-tab" data-bs-toggle="tab" data-bs-target="#DaftarTukang" type="button" role="tab" aria-controls="DaftarTukang" aria-selected="true">Daftar Tukang</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link fw-bold" id="PembayaranTukang-tab" data-bs-toggle="tab" data-bs-target="#PembayaranTukang" type="button" role="tab" aria-controls="PembayaranTukang" aria-selected="false">Pembayaran Tukang</button>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent" style="margin-bottom: 10px;">
            <div class="tab-pane fade show active" id="DaftarTukang" role="tabpanel" aria-labelledby="DaftarTukang-tab">
                <div class="card mt-3">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Nama</th>
                                <th scope="col">Alamat</th>
                                <th scope="col">Deskripsi</th>
                                <th scope="col">No Hp</th>
                                <th scope="col">No Rekening</th>
                                <th scope="col">Harga</th>
                                <th scope="col">Status</th>
                                <th scope="col">Tindakan</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        $sql = "SELECT * FROM info_tukang WHERE statuss = 0; ";
                        $stmt = $db_config->prepare($sql);
                        $stmt->execute();
                        $result = $stmt->get_result();
                        $subtotal=0;

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                ?>
                                <tr>
                                    <td><?php echo $row["nama"]; ?></td>
                                    <td><?php echo $row["alamat"]; ?></td>
                                    <td><?php echo $row["deskripsi"]; ?></td>
                                    <td><?php echo $row["no_hp"]; ?></td>
                                    <td><?php echo $row["norek"]; ?></td>
                                    <td><?php echo $row["harga"]; ?></td>
                                    <td><?php echo $row["statuss"]; ?></td>
                                    <td>
                                        <form action="admin.php" method="post" class='ms-2'>
                                            <input type="hidden" name="setujui" value="<?php echo $row["id"]; ?>">
                                            <button type="submit">Setujui</button>
                                        </form>
                                    </td>
                                </tr>
                                <?php
                            }
                            ?>
                            <?php
                        } else {
                            // echo "0 results";
                        }
                        ?>

                        </tbody>
                    </table>
                </div>
                <div class="card mt-3">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Nama</th>
                                <th scope="col">Alamat</th>
                                <th scope="col">Deskripsi</th>
                                <th scope="col">No Hp</th>
                                <th scope="col">No Rekening</th>
                                <th scope="col">Harga</th>
                                <th scope="col">Status</th>
                                <th scope="col">Foto</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        $sql = "SELECT * FROM info_tukang; ";
                        $stmt = $db_config->prepare($sql);
                        $stmt->execute();
                        $result = $stmt->get_result();
                        $subtotal=0;

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                ?>
                                <tr>
                                    <td><?php echo $row["nama"]; ?></td>
                                    <td><?php echo $row["alamat"]; ?></td>
                                    <td><?php echo $row["deskripsi"]; ?></td>
                                    <td><?php echo $row["no_hp"]; ?></td>
                                    <td><?php echo $row["norek"]; ?></td>
                                    <td>Rp. <?php echo number_format($row["harga"],2, ',', '.') ?></td>
                                    <td><?php echo $row["statuss"]; ?></td>
                                    <td><img src="images/<?php echo $row["foto_tukang"]; ?>" width="100px" height="100px"></td>
                                </tr>
                                <?php
                            }
                            ?>
                            <?php
                        } else {
                            // echo "0 results";
                        }
                        ?>

                        </tbody>
                    </table>
                </div>
            </div>
            <div class="tab-pane fade" id="PembayaranTukang" role="tabpanel" aria-labelledby="PembayaranTukang-tab">
            <div class="card mt-3">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Nama</th>
                                <th scope="col">No Hp</th>
                                <th scope="col">No Rekening</th>
                                <th scope="col">Harga</th>
                                <th scope="col">Durasi</th>
                                <th scope="col">Total Bayar</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        $sql = "SELECT * FROM transaksi WHERE statuss = 0;";
                        $stmt = $db_config->prepare($sql);
                        $stmt->execute();
                        $result = $stmt->get_result();

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                // Menghitung total dengan benar
                                $total = $row["harga"] * $row["durasi"];
                                ?>
                                <tr>
                                    <td><?php echo $row["nama"]; ?></td>
                                    <td><?php echo $row["no_hp"]; ?></td>
                                    <td><?php echo $row["norek"]; ?></td>
                                    <td><?php echo $row["harga"]; ?></td>
                                    <td><?php echo $row["durasi"]; ?></td>
                                    <td><?php echo $total; ?></td>
                                    <td>
                                        <form action="admin.php" method="post" class='ms-2'>
                                            <input type="hidden" name="sudahbayar" value="<?php echo $row["id_transaksi"]; ?>">
                                            <button type="submit">Sudah Bayar</button>
                                        </form>
                                    </td>
                                </tr>
                                <?php
                            }
                        } else {
                            // Output pesan jika tidak ada hasil
                            echo "<tr><td colspan='7'>Tidak ada transaksi yang harus dilakukan</td></tr>";
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <a class="btn btn-lg bg-primary" href="tambahTukang.php">Tambah tukang</a>
    </section>
    <!-- bagian konten selesai -->

    
  </body>
</html>
