<?php 
include("koneksi_db.php");
session_start();

// Memeriksa apakah user sudah login
if(!isset($_SESSION['user_id'])){
    header('Location: login.php');
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Logic untuk memasukkan tukang ke table keranjang yang dikirim dari home atau favorite
    if (isset($_POST['id'])) {
      $id = $_POST['id'];
      $harga = $_POST['harga'];
      $nama = $_POST['nama'];
      $deskripsi = $_POST['deskripsi'];
      $no_hp = $_POST['no_hp'];
      $norek = $_POST['norek'];
      $durasi = $_POST['durasi'];

      // Cek apakah sudah ada data dengan id_tukang dan id_user yang sama
      $check_existing_sql = "SELECT id_cart, durasi FROM keranjang WHERE id_tukang = ? AND id_user = ?";
      $stmt_check_existing = $db_config->prepare($check_existing_sql);
      $stmt_check_existing->bind_param("ii", $id, $_SESSION['user_id']);
      $stmt_check_existing->execute();
      $result_check_existing = $stmt_check_existing->get_result();

      if ($result_check_existing->num_rows > 0) {
          // Jika sudah ada, lakukan update durasi
          $row_existing = $result_check_existing->fetch_assoc();
          $new_durasi = $row_existing['durasi'] + $durasi;

          $update_durasi_sql = "UPDATE keranjang SET durasi = ? WHERE id_cart = ?";
          $stmt_update_durasi = $db_config->prepare($update_durasi_sql);
          $stmt_update_durasi->bind_param("ii", $new_durasi, $row_existing['id_cart']);
          $stmt_update_durasi->execute();
      } else {
          // Jika belum ada, lakukan insert data baru
          $insert_sql = "INSERT INTO keranjang (id_tukang, id_user, harga, nama, deskripsi, no_hp, norek, durasi) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
          $stmt_insert = $db_config->prepare($insert_sql);
          $stmt_insert->bind_param("iiissssi", $id, $_SESSION['user_id'], $harga, $nama, $deskripsi, $no_hp, $norek, $durasi);
          $stmt_insert->execute();
      }

      // Redirect ke halaman cart untuk menampilkan data dalam tabel
      header("Location: cart.php");
    }

  
  // Logic untuk memindahkan data dari keranjang ke transaksi ketika selesai konfirmasi pesanan
    if (isset($_POST['id_user'])) {
      $id_user = $_POST['id_user'];

      // Ambil data dari tabel keranjang
      $select_sql = "SELECT * FROM keranjang WHERE id_user = ?";
      $select_stmt = $db_config->prepare($select_sql);
      $select_stmt->bind_param("i", $id_user);
      $select_stmt->execute();
      $result = $select_stmt->get_result();
      $items = $result->fetch_all(MYSQLI_ASSOC);

      // Masukkan data ke dalam tabel transaksi
      foreach ($items as $item) {
          $insert_sql = "INSERT INTO transaksi (id_tukang, id_user, harga, nama, deskripsi, no_hp, norek, durasi) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
          $insert_stmt = $db_config->prepare($insert_sql);
          $insert_stmt->bind_param("iidssssi", $item['id_tukang'], $id_user, $item['harga'], $item['nama'], $item['deskripsi'], $item['no_hp'], $item['norek'], $item['durasi']);

          // Eksekusi pernyataan SQL dan tangani kesalahan
          if ($insert_stmt->execute()) {
              echo "Transaksi berhasil diinput";
          } else {
              echo "Gagal input transaksi: " . $insert_stmt->error;
          }

          // Tutup pernyataan insert
          $insert_stmt->close();
      }

      // Hapus data dari tabel keranjang
      $delete_sql = "DELETE FROM keranjang WHERE id_user = ?";
      $delete_stmt = $db_config->prepare($delete_sql);
      $delete_stmt->bind_param("i", $id_user);

      // Eksekusi pernyataan SQL dan tangani kesalahan
      if ($delete_stmt->execute()) {
          echo "Data dari tabel keranjang dihapus";
      } else {
          echo "Gagal menghapus data dari tabel keranjang: " . $delete_stmt->error;
      }

      // Tutup pernyataan delete
      $delete_stmt->close();
  }



    // Function to update durasi
    function updateDurasi($id_cart, $action) {
        global $db_config;
    
        // Query untuk mengurangkan atau menambahkan nilai durasi
        $update_durasi_sql = ($action === 'minus') ? "UPDATE keranjang SET durasi = durasi - 1 WHERE id_cart = ? AND durasi > 1" : "UPDATE keranjang SET durasi = durasi + 1 WHERE id_cart = ?";
        $stmt_update_durasi = $db_config->prepare($update_durasi_sql);
        $stmt_update_durasi->bind_param('i', $id_cart);
    
        if ($stmt_update_durasi->execute()) {
            echo "Durasi updated successfully";
        } else {
            echo "Error updating durasi: " . $stmt_update_durasi->error;
        }
    
        $stmt_update_durasi->close();
    }
    
    function deleteCart($id_cart) {
        global $db_config;
    
        // Query untuk menghapus data berdasarkan id_cart
        $delete_cart_sql = "DELETE FROM keranjang WHERE id_cart = ?";
        $stmt_delete_cart = $db_config->prepare($delete_cart_sql);
        $stmt_delete_cart->bind_param("i", $id_cart);
    
        if ($stmt_delete_cart->execute()) {
            echo "Data dihapus.";
        } else {
            echo "Gagal menghapus data: " . $stmt_delete_cart->error;
        }
    
        $stmt_delete_cart->close();
    }
    
    // Handle POST requests
    if (isset($_POST['minus'])) {
        $cart = $_POST['minus'];
        updateDurasi($cart, 'minus');
    }
    
    if (isset($_POST['plus'])) {
        $cart = $_POST['plus'];
        updateDurasi($cart, 'plus');
    }
    
    if (isset($_POST['Hapus'])) {
        $cart = $_POST['Hapus'];
        deleteCart($cart);
    }
    
    // Use JavaScript to redirect after handling POST requests
    echo "<script>window.location.href='cart.php';</script>";
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
              <a class="nav-link" aria-current="page" href="home.php">Home</a>
            </li>
            <li class="nav-item me-3">
              <a class="nav-link" href="favorite.php">Favorite</a>
            </li>
            <li class="nav-item me-3 active">
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
          <div class="col-12 card p-0" style="margin-top: 130px; padding: 20px">          
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Nama</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Durasi (hari)</th>
                            <th scope="col">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    $user_id = $_SESSION['user_id'];
                    $sql = "SELECT id_tukang, id_cart, harga, nama, deskripsi, durasi, harga * durasi AS total FROM keranjang WHERE id_user = ?;";
                    $stmt = $db_config->prepare($sql);
                    $stmt->bind_param("i", $user_id);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    $subtotal=0;

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                          $total = $row["total"];
                          $subtotal += $total; // Menambahkan total ke subtotal
                            ?>
                            <tr>
                                <td><?php echo $row["nama"]; ?></td>
                                <td class='harga'><?php echo $row["harga"]; ?></td>
                                <td style='display: flex;'>
                                    
                                    <form action="cart.php" method="post" class='me-2'>
                                        <input type="hidden" name="minus" value="<?php echo $row["id_cart"]; ?>">
                                        <button type="submit">-</button>
                                    </form>
                                    <span class='durasi'><?php echo $row["durasi"]; ?></span>
                                    <form action="cart.php" method="post" class='ms-2'>
                                        <input type="hidden" name="plus" value="<?php echo $row["id_cart"]; ?>">
                                        <button type="submit">+</button>
                                    </form>
                                </td>
                                <td class='total'><?php echo $row["total"]; ?></td>
                                <td>
                                    <form action="cart.php" method="post" class='ms-2'>
                                        <input type="hidden" name="Hapus" value="<?php echo $row["id_cart"]; ?>">
                                        <button type="submit">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                            <?php
                        }
                        ?>
                        <tr>
                            <td class='fw-bold'>Subtotal :</td>
                            <td class='fw-bold'><?php echo $subtotal; ?></td>
                        </tr>
                        <?php
                    } else {
                        // echo "0 results";
                    }
                    ?>

                    </tbody>
                </table>
                <!-- Tombol Checkout -->
                <div class="col-12 d-flex justify-content-end">
                    <button id="checkout-button" data-bs-toggle="modal" data-bs-target="#checkoutModal">Checkout</button>
                </div> 
          </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="checkoutModal" tabindex="-1" aria-labelledby="checkoutModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="checkoutModalLabel">Checkout</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h5>Silahkan lakukan pembayaran sesuai dengan subtotal pesanan anda ke nomor rekening berikut, dan konfirmasi ke nomor Wa yang tertera :</h5>
                <br>
                <h6>Jenis Pembayaran:</h6>
                <div class='form-check form-check-inline'>
                    <input class='form-check-input' type='radio' name='paymentOption' id='inlineRadio1' value='Cash'>
                    <label class='form-check-label' for='inlineRadio1'>Cash</label>
                </div>
                <div class='form-check form-check-inline'>
                    <input class='form-check-input' type='radio' name='paymentOption' id='inlineRadio2' value='Transfer'>
                    <label class='form-check-label' for='inlineRadio2'>Transfer</label>
                </div>
                <br>
                <br>
                <h6>No. Rek: <span class="fw-bold">55555/BCA</span></h6>
                <h6>Atas Nama: <span class="fw-bold">Admin Tubang</span></h6>              
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <form action="cart.php" method="post">
                    <input type="hidden" name="id_user" value="<?php echo $_SESSION['user_id']; ?>">
                    <input type="hidden" name="total" value="<?php echo $row["total"]; ?>">
                    <button type="submit" class="btn btn-primary" id="confirm-checkout-button">Confirm Checkout</button>
                </form>
            </div>
            </div>
        </div>
        </div>    
    </section>
    <!-- bagian konten selesai -->
    
  </body>
</html>
