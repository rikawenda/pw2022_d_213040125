<?php 
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
  </head>
  <body>
    <nav class="navbar navbar-light bg-dark">
        <div class="container-fluid">
            <a href=""  class="navbar-brand text-light ms-5">Daftar Produk</a>
            <form action="" method="post" class="d-flex ms-auto me-3">
                <input class="form-control me-2" type="text" name="keyword" placeholder="Cari produk" aria-label="Cari" size="30" autofocus autocomplete="off">
                <button class="btn btn-outline-warning" type="submit" name="cari">Cari</button>
            </form>
        <div class="navbar-nav">
            <a class="nav-link active btn btn-warning me-3" aria-current="page" href="#">Log-Out</a>
        </div>
        </div>
    </nav>

    <div class="container">
        <a href="tambah.php" class="btn btn-warning m-3">Tambah Data Produk</a>
    <table class="table table-bordered border-warning align-middle">
  <thead>
    <tr>
      <th scope="col">No.</th>
      <th scope="col">Aksi</th>
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
      <td>
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