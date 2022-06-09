<?php 
session_start();

if( !isset($_SESSION["login"]) ) {
    header("Location: login.php");
    exit;
}

require 'functions.php';

$produk = query("SELECT * FROM produk");

if(isset ($_POST["cari"])) {
    $keyword = $_POST["keyword"];
    $query = "SELECT * FROM produk 
                WHERE 
              nama LIKE '%$keyword%' OR 
              kode LIKE '%$keyword%' OR
              spesifikasi LIKE '%$keyword%' OR
              harga LIKE '%$keyword%'";
    $produk = query($query);
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

    <title>Seputar Teknologi</title>
<link rel="stylesheet" href="style.css"/>
</head>
  <body style="background-color: rgb(250, 249, 236);">
    <nav class="navbar navbar-light bg-dark fixed-top">
        <div class="container-fluid">
            <a href=""  class="navbar-brand text-light ms-5">I'mTech!</a>
        <li class="nav-item d-flex me-auto">
          <a class="nav-link text-white me-auto" href="#dataProduk">Data Produk</a>
        </li>
        <div class="navbar-nav">
            <a class=" nav-link btn btn-warning ms-3" aria-current="page" href="logout.php" id=logout>Log-Out</a>
        </div>
        </div>
    </nav>

    <!-- dashboard -->
    <div class="container-fluid bg">
      <div class="container text-center">
    <div class="video-info position-absolute top-50 start-50 translate-middle text-light">
        <h1 class="display-1 mt-1">Welcome to I'mTech!</h1>
        <h2 class="display-5 mt-4">Start here!</h2>
      </div>
    </div>
    </div>

    <section id="dataProduk">
    <div id="container">
    <div class="container">
        <a href="tambah.php" class="btn btn-warning m-3" id="tambah">Tambah Data Produk</a>

        <form action="" method="post" class="d-flex ms-auto mb-3" id="form-cari">
            <input class="form-control me-2" type="text" name="keyword" placeholder="Cari produk" aria-label="Cari" size="30" autofocus autocomplete="off" id="keyword">
            <button class="btn btn-warning" type="submit" name="cari" id="tombol-cari">Cari</button>
        </form>

    <table class="table table-hover table-bordered border-warning align-middle">
  <thead>
    <tr>
      <th scope="col">No.</th>
      <th scope="col" id="aksi">Aksi</th>
      <th scope="col">Gambar</th>
      <th scope="col">Nama</th>
      <th scope="col">Kode</th>
      <th scope="col">Spesifikasi</th>
      <th scope="col">Harga</th>
    </tr>
  </thead>
  <tbody>
    
  <?php $i = 1; ?>
  <?php foreach( $produk as $row ) : ?>
    <tr>
      <th scope="row"><?= $i; ?></th>
      <td id="aksi">
          <a href="ubah.php?id=<?= $row["id"]; ?>" class="btn badge bg-warning">Ubah</a>
          <a href="hapus.php?id=<?= $row["id"]; ?>" class="btn badge bg-danger" onclick="return confirm('Apakah anda yakin ingin menghapus data ini dari daftar produk?');">Hapus</a>
      </td>
      <td><img src="img/<?= $row["gambar"]; ?>" width="80px"></td>
      <td><?= $row["nama"]; ?></td>
      <td><?= $row["kode"]; ?></td>
      <td><?= $row["spesifikasi"]; ?></td>
      <td><?= $row["harga"]; ?></td>
    </tr>
  <?php $i++;  ?> 
  <?php  endforeach; ?>
  </tbody>
    </table>
    </div>
    </div>
    </section>
    <script src="js/script.js"></script>
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