<?php 
require 'functions.php';

if( isset($_POST["register"]) ) {
    
    if(register($_POST) > 0 ) {
        echo "<script>
                alert('Registrasi berhasil!');
                document.location.href = 'login.php';
              </script>";
    } 
    else {
        echo mysqli_error($conn);
    }
}


?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Custom CSS -->

    <title>Halaman Registrasi</title>
  </head>
  <body class="bg-dark">
  <div class="container d-flex justify-content-center" style="font-family: garamond;">
    <div class="card register-form bg-dark text-light border border-warning position-absolute top-50 start-50 translate-middle">
        <div class="card-body">
            <h1 class="card-title text-center mt-3">REGISTRASI</h1>
        </div>
        <div class="card-text m-3 p-3">
            <form action="" method="post" autocomplete="off">
                <!-- <input type="hidden" name> -->
                  <div class="mb-3">
                      <label for="nama" class="form-label">Nama</label>
                      <input type="text" class="form-control border border-warning" id="nama" name="nama" placeholder="Masukkan nama" required>
                  </div>
                  <div class="mb-3">
                      <label for="username" class="form-label">Username</label>
                      <input type="username" class="form-control border border-warning" id="username" name="username" placeholder="Masukkan username" required>
                  </div>
                  <div class="mb-3">
                      <label for="password" class="form-label">Password</label>
                      <input type="password" class="form-control border border-warning" id="password" name="password" placeholder="Masukkan password" required>
                  </div>
                  <div class="mb-3">
                      <label for="password2" class="form-label">Re-Password</label>
                      <input type="password" class="form-control border border-warning" id="password2" name="password2" placeholder="Konfirmasi password" required>
                  </div>
                      <button type="submit" class="btn btn-warning " name="register">Register</button>
                      <br>
                      <a href="login.php">Login akun!</a>
            </form>
        </div>
    </div>
    </div>


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>