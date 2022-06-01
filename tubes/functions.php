<?php 
//  Koneksi ke Database
$conn = mysqli_connect("localhost", "root", "", "tubes");


function query($query) {
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while( $row = mysqli_fetch_assoc($result) ) {
        $rows[] = $row;
    }
    return $rows;
}

function tambah($data) {
    global $conn;

    $gambar = upload();
    if( !$gambar ) {
        return false;
    }

    $nama = htmlspecialchars($data["nama"]);
    $kode = htmlspecialchars($data["kode"]);
    $spesifikasi = htmlspecialchars($data["spesifikasi"]);
    $harga = htmlspecialchars($data["harga"]);

        $query = "INSERT INTO produk
        VALUES
        ('', '$gambar', '$nama', '$kode', '$spesifikasi', '$harga')
        ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function upload() {

    $namaFile = $_FILES['gambar']['name'];
    $ukuranFile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];

    // Cek apakah tidak ada gambar yang di upload
    if( $error === 4 ) {
        echo "<script>
                alert('Pilih gambar terlebih dahulu!');
              </script>";
        return false;
    }

    // Cek apakah yang diupload adalah gambar
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if( !in_array($ekstensiGambar, $ekstensiGambarValid) ) {
        echo "<script>
                alert('File yang anda upload bukan gambar, silahkan coba lagi!');
              </script>";
        return false;
    }

    // Cek ukuran gambar
    if( $ukuranFile > 1000000 ) {
        echo "<script>
                alert('Ukuran file melebehi batas maximum!');
              </script>";
        return false;
    }

    // upload gambar
    // Generate nama gambar baru
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;

    move_uploaded_file($tmpName, 'img/' . $namaFileBaru);

    return $namaFileBaru;

}

function hapus($id) {
    global $conn;
    mysqli_query($conn, "DELETE FROM produk WHERE id = $id");

    return mysqli_affected_rows($conn);
}

function ubah($data) {
    global $conn;
    $id = $data["id"];
    $gambarLama = htmlspecialchars($data["gambarLama"]);

    // Cek apakah user memilih gambar baru atau tidak
    if( $_FILES['gambar']['error'] === 4 ){
        $gambar = $gambarLama;
    } else {
        $gambar = upload();
    }

    $nama = htmlspecialchars($data["nama"]);
    $kode = htmlspecialchars($data["kode"]);
    $spesifikasi = htmlspecialchars($data["spesifikasi"]);
    $harga = htmlspecialchars($data["harga"]);

        $query = "UPDATE produk SET
                    gambar = '$gambar',
                    nama = '$nama',
                    kode = '$kode',
                    spesifikasi = '$spesifikasi',
                    harga = '$harga'
                  WHERE id = $id
                    ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function register($data) {
    global $conn;

    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);

    // Cek apakah username sudah terdaftar atau belum
    $result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");

    if( mysqli_fetch_assoc($result) ) {
        echo "<script>
                alert('Username sudah terdaftar!');
              </script>";
        return false;
    }

    // Cek informasi password
    if( $password !== $password2 ) {
        echo "<script>
                alert('Konfirmasi password tidak sesuai, silahkan coba lagi!');
              </script>";
        return false;
    }

    // Enskripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    // Menambahkan admin baru ke database
    mysqli_query($conn, "INSERT INTO user VALUES('', '$nama', '$username', '$password')");

    return mysqli_affected_rows($conn);
}





?>