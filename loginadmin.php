<?php

session_start();


// if (isset($_SESSION['login'])){
//     header("Location: admin/index.php");
//     exit;
// }

require_once "functions.php";

if(isset($_POST['submit'])){

    $email = $_POST['email'];
    $password = $_POST['password'];

   $result = mysqli_query($conn,"SELECT * FROM admin WHERE email = '$email';");

   //cek username
   if(mysqli_num_rows($result)===1){

    //cek password
    $row = mysqli_fetch_assoc($result);
   if($password == $row['password']){


    // $_SESSION['is_auth'] = true;
    $_SESSION['auth'] = true;
    header("Location: admin.php");
    exit;
   }
   }


   $error = true;
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
    <link rel="stylesheet" href="css/login.css" />
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
                <h1>Hi There!</h1>
                <h3>Welcome back</h3>
              </div>
            </div>
          </div>
          <div class="col-6 kanan m-0 p-0">
            <div class="row h-100" style="margin-left: 120px">
              <div class="col-12 my-auto form-input">
                <h2>Login Admin</h2>
                <?php if(isset($error)): ?>
                <p style="color : red">Username / Password salah</p>
                <?php endif; ?>
                <form action="" method="POST">
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
                    <button type="submit" class="btn btn-success" name="submit">
                      Submit
                    </button>
                  </div>
                  <h4><a href="login.php">Login Sebagai Pengguna</a></h4>
                </form>
              </div>
            </div>
            <img
              src="images/b1.png"
              alt="ornamen"
              class="position-absolute start-1 bottom-0 gambar-hero"
            />
            <img
              src="images/b2.png"
              alt="ornamen"
              class="position-absolute end-0 bottom-0 gambar-hero"
            />
            <img
              src="images/a1.png"
              alt="ornamen"
              class="position-absolute end-0 top-0 gambar-hero"
            />
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
