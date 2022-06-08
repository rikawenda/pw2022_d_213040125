<?php 
session_start();

if( !isset($_SESSION["login"]) ) {
    header("Location: login.php");
    exit;
}

require 'functions.php';
// cek apakah tombil submit sudah ditekan atau belum
if( isset($_POST["tambah"]) ) {


    // Cek apakah data berhasil ditambahkan
    if( tambah($_POST) > 0 ) {
        echo "
        <script>
            alert('Data berhasil ditambahkan ke dalam daftar produk!');
            document.location.href = 'index.php';
        </script>
        ";
    } else {
        echo "
        <script>
            alert('Data gagal ditambahkan, silahkan coba lagi!');
            document.location.href = 'index.php';
        </script>
    ";
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

    <title>Tambah Data Produk</title>
  </head>
  <body style="background-color: rgb(250, 249, 236);">
  <nav class="navbar navbar-expand-lg navbar-light bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand text-light ms-5">Tambah Data Produk</a>
    <div class="collapse navbar-collapse justify-content-end me-4">
      <div class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link text-light me-3" href="index.php">Daftar Produk</a>
        </li>
        <a class="nav-link active btn btn-warning" aria-current="page" href="#">Log-Out</a>
      </div>
    </div>
  </div>
  </nav>  

    <div class="container">
    <div class="row mt-3">
        <div class="offset-3 col-6">
              <form action="" method="post" autocomplete="off" enctype="multipart/form-data">
                  <div class="mb-3">
                      <label for="gambar" class="form-label">Gambar</label>
                      <input type="file" class="form-control" id="gambar" name="gambar" required>
                  </div>
                    <div class="mb-3">
                      <label for="nama" class="form-label">Nama</label>
                      <input type="text" class="form-control" id="nama" name="nama" required>
                  </div>
                  <div class="mb-3">
                      <label for="kode" class="form-label">Kode</label>
                      <input type="kode" class="form-control" id="kode" name="kode" maxlength="6" style="width: 120px" required>
                  </div>
                  <div class="mb-3">
                      <label for="spesifikasi" class="form-label">Spesifikasi</label>
                      <input type="text" class="form-control" id="spesifikasi" name="spesifikasi" required>
                  </div>
                  <div class="mb-3">
                      <label for="harga" class="form-label">Harga</label>
                      <input type="text" class="form-control" id="harga" name="harga" required>
                  </div>

                  <button type="submit" class="btn btn-warning" name="tambah">Tambah Data</button>
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