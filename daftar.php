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
    <link rel="stylesheet" href="css/daftar.css" />
    <link rel="icon" href="images/logo-05.png" type="image/x-icon" />
    <!-- css ekstrnal selesai -->
  </head>
  <body>
    <div id="hero">
      <div class="container m-0 p-0">
        <div id="mainkonten" class="row">
          <div class="col-6 kiri">
            <div class="row mt-5">
              <div class="col my-auto hero-tagline">
                <a href="index.php">
                  <img src="images/logo-putih.png" alt="" />
                </a>
              </div>
            </div>
            <div class="row" style="margin-top: 130px">
              <div class="col my-auto hero-tagline">
                <h1>Welcome!</h1>
                <h3>Create your account now</h3>
              </div>
            </div>
          </div>
          <div class="col-6 kanan m-0 p-0">
            <div class="row h-100" style="margin-left: 120px">
              <div class="col-12 my-auto form-input">
                <h2>Daftar</h2>
                <form action="daftarproses.php" method="POST">
                  <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label"
                      >Nama</label
                    >
                    <input
                      type="text"
                      name="nama"
                      class="form-control"
                      id="exampleInputEmail1"
                      aria-describedby="emailHelp"
                      placeholder="Input Nama"
                    />
                  </div>
                  <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label"
                      >Email</label
                    >
                    <input
                      type="email"
                      name="email"
                      class="form-control"
                      id="exampleInputEmail1"
                      aria-describedby="emailHelp"
                      placeholder="Input Email"
                    />
                  </div>
                  <div class="mb-5">
                    <label for="exampleInputPassword1" class="form-label"
                      >Password</label
                    >
                    <input
                      type="password"
                      name="password"
                      class="form-control"
                      id="exampleInputPassword1"
                      placeholder="Input Password"
                    />
                  </div>
                  <div class="mb-3">
                    <button type="submit" name="submit" class="btn btn-success">
                      Submit
                    </button>
                  </div>
                  <h4 style="float: inline-end; margin-right: 130px">
                    Sudah punya akun ? <a href="login.php">Login</a>
                  </h4>
                </form>
              </div>
            </div>
            <img
              src="images/b3.png"
              alt="ornamen"
              class="position-absolute end-0 bottom-0 gambar-hero"
            />
            <img
              src="images/a2.png"
              alt="ornamen"
              class="position-absolute end-0 top-0 gambar-hero"
            />
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
