<?php 
session_start();
require 'functions.php';

// Cek cookie
if( isset($_COOKIE['id']) && isset($_COOKIE['key']) ) {
  $id = $_COOKIE['id'];
  $key = $_COOKIE['key'];

  // ambil username berdasarkan id
  $result = mysqli_query($conn, "SELECT username FROM user WHERE id = $id");
  $row = mysqli_fetch_assoc($result);

  // cek cookie dan username
  if( $key === hash('sha256', $row['username']) ) {
    $_SESSION['login'] = true;
  }

} 


if( isset($_SESSION["login"]) ) {
  header("Location: index.php");
  exit;
}


if( isset($_POST["login"]) ) {

    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");

    // Cek username 
    if( mysqli_num_rows($result) === 1 ) {

        // Cek password
        $row = mysqli_fetch_assoc($result);
        if ( password_verify($password, $row["password"]) ) {
            // set session
            $_SESSION["login"] = true;

            // Cek remember me
            if( isset($_POST['remember']) ) {
              // buat cookie
              setcookie('id', $row['id'], time()+60);
              setcookie('key', hash('sha256', $row['username']), time() + 60);
            }
        }
    }

    if($row["level"] === 'admin') {
      header("Location: index.php");
      exit;
    } else if($row["level"] === "user") {
      header("Location: user.php");
      exit;
    }

    $error = true;
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

    <title>Halaman Log-In</title>
  </head>
  <body class="bg-dark">

  <?php if( isset($error) ) : ?>
    <p class="fst-italic" style="color: red">Username / Password yang anda masukkan salah, silahkan coba lagi!</p>
  <?php endif; ?>
  
  <form action="" method="post">
  <div class="row mt-3 text-light position-absolute top-50 start-50 translate-middle" style="font-family: garamond;">
      <h1 class="text-center">Log-In</h1>
  <div class="offset-2 col-8">
  <div class="mb-3">
    <label for="exampleInputUsername" class="form-label">Username</label>
    <input type="text" class="form-control border border-warning shadow-lg" name="username" id="username" placeholder="Masukkan username" autocomplete="off" required>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control border border-warning shadow-lg" name="password" id="password" placeholder="Masukkan password" autocomplete="off" required>
  </div>
  <div class="mb-3 form-check">
    <label class="form-check-label" for="remember">Remember me</label>
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
  </div>
  <button type="submit" name="login" class="btn btn-warning">Log-In</button>
  </div>
    <a href="registrasi.php" class="text-center mt-2">Daftar akun!</a>
</form>

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