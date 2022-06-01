<?php 
require 'functions.php';

// Mengambil data di URL
$id = $_GET["id"];

// Query data produk berdasarkan id
$row = query("SELECT * FROM produk WHERE id = $id")[0];


// cek apakah tombil submit sudah ditekan atau belum
if( isset($_POST["ubah"]) ) {


    // Cek apakah data berhasil ditambahkan
    if( ubah($_POST) > 0 ) {
        echo "
        <script>
            alert('Data pada daftar produk berhasil diubah!');
            document.location.href = 'admin.php';
        </script>
        ";
    } else {
        echo "
        <script>
            alert('Data gagal diubah, silahkan coba lagi!');
            document.location.href = 'admin.php';
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

    <title>Ubah Data Produk</title>
  </head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-light bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand text-light ms-5">Ubah Data Produk</a>
    <div class="collapse navbar-collapse justify-content-end me-4">
      <div class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link text-light me-3" href="admin.php">Daftar Produk</a>
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
                  <input type="hidden" name="id" value="<?= $row["id"]; ?>">
                  <input type="hidden" name="gambarLama" value="<?= $row["gambar"]; ?>">
                  <div class="mb-3">
                      <label for="gambar" class="form-label">Gambar</label>
                      <img src="img/<?= $row['gambar']; ?>" width="80">
                      <input type="file" class="form-control" id="gambar" name="gambar" required>
                  </div>
                    <div class="mb-3">
                      <label for="nama" class="form-label">Nama</label>
                      <input type="text" class="form-control" id="nama" name="nama" required value="<?= $row["nama"]; ?>">
                  </div>
                  <div class="mb-3">
                      <label for="kode" class="form-label">Kode</label>
                      <input type="kode" class="form-control" id="kode" name="kode" maxlength="6" style="width: 120px" required value="<?= $row["kode"]; ?>">
                  </div>
                  <div class="mb-3">
                      <label for="spesifikasi" class="form-label">Spesifikasi</label>
                      <input type="text" class="form-control" id="spesifikasi" name="spesifikasi" required value="<?= $row["spesifikasi"]; ?>">
                  </div>
                  <div class="mb-3">
                      <label for="harga" class="form-label">Harga</label>
                      <input type="text" class="form-control" id="harga" name="harga" required value="<?= $row["harga"]; ?>">
                  </div>

                  <button type="submit" class="btn btn-warning" name="ubah">Ubah Data</button>
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
