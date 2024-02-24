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
    <link rel="stylesheet" href="css/index.css" />
    <link rel="icon" href="images/logo-05.png" type="image/x-icon" />
    <!-- css ekstrnal selesai -->
  </head>
  <body>
    <!-- bagian navbar mulai -->
    <nav
      class="navbar navbar-expand-lg navbar-light bg-transparent position-fixed w-100"
    >
      <div class="container">
        <a class="navbar-brand" href="index.php">
          <img
            src="images/logo-05.png"
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
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav" style="margin-left: 40vw">
            <li class="nav-item me-3">
              <a class="nav-link" aria-current="page" href="home.php">Home</a>
            </li>
            <li class="nav-item me-3">
              <a class="nav-link" href="favorite.php">Favorite</a>
            </li>
            <li class="nav-item me-3">
              <a class="nav-link" href="cart.php">Cart</a>
            </li>
            <li class="nav-item me-3">
              <a class="nav-link" href="contact.php">Contact</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- bagian navbar selesai -->

    <!-- bagian hero landing page mulai -->
    <section id="hero">
      <div class="container h-100">
        <div class="row h-100">
          <div class="col-md-10 my-auto hero-tagline">
            <h3>Halo, Selamat Datang</h3>
            <h2>Temukan tukang terbaik untuk mengerjakan bangunan anda !</h2>
            <h4>Buat akun, dan mulai mencari tukang</h4>
            <a href="daftar.php" class="btn-daftar">
              <button class="button-hero">Buat akun</button>
            </a>
            <h4>Sudah punya akun? <a href="login.php">Login</a></h4>
          </div>
        </div>
        <!-- <img
            src="/image/ornamen-hero.png"
            alt="ornamen"
            class="position-absolute start-0 bottom-0 h-100 gambar-hero"
          /> -->
        <img
          src="images/image-login.png"
          alt="rumah"
          class="position-absolute end-0 bottom-0 h-100 gambar-hero"
        />
      </div>
    </section>
    <!-- bagian hero landing page selesai -->
  </body>
</html>
