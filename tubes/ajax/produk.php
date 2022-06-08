<?php 
require '../functions.php';
$keyword = $_GET["keyword"];
$query = "SELECT * FROM produk 
          WHERE 
            nama LIKE '%$keyword%' OR 
            kode LIKE '%$keyword%' OR
            spesifikasi LIKE '%$keyword%' OR
            harga LIKE '%$keyword%'";
$produk = query($query);

?>
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