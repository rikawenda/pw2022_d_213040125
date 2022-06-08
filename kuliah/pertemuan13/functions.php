<?php 

function koneksi() {
    $conn = mysqli_connect('localhost', 'root', '', 'pw2022_d_213040125') or die('Koneksi ke DB GAGAL!');

return $conn;
}

function query($query) {
    $conn = koneksi();
    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));

    $rows = []; 
    while($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
}

return $rows;
}


function tambah($data) {
    $conn = koneksi();

    // Cek apakah ada gambar yang diupload
    if($_FILES["gambar"]["error"] === 4) {
        // jika user tidak memilih gambar, beri gambar default
        $gambar = 'rk.png';
    } else {
        // jika user memilih gambar, jalankan fungsi upload
        $gambar = upload();
        // Cek apakah upload berhasil
        if(!$gambar) {
            return false;
        }
    }

    $nama = htmlspecialchars ($data["nama"]);
    $npm = htmlspecialchars ($data["npm"]);
    $email = htmlspecialchars ($data["email"]);
    $jurusan = htmlspecialchars ($data["jurusan"]);
    // $gambar = htmlspecialchars ($data["gambar"]);

    $query = "INSERT INTO mahasiswa VALUES(null, '$nama', '$npm', '$email', '$jurusan', '$gambar')";
    mysqli_query($conn, $query) or die(mysqli_error($conn));

    return mysqli_affected_rows($conn);
}


function hapus($id) {
    $conn = koneksi();

    // ambil data mahasiswa
    $mhs = query("SELECT * FROM mahasiswa WHERE id = $id")[0];

    // Hapus data gambar
    if($mhs["gambar"] !== 'rk.png') {
        unlink('img/' . $mhs["gambar"]);
    }

    mysqli_query($conn, "DELETE FROM mahasiswa WHERE id = $id") or die(mysqli_error($conn));

    return mysqli_affected_rows($conn);
}

function ubah($data) {
    $conn = koneksi();

    $id = $data["id"];
    $nama = htmlspecialchars ($data["nama"]);
    $npm = htmlspecialchars ($data["npm"]);
    $email = htmlspecialchars ($data["email"]);
    $jurusan = htmlspecialchars ($data["jurusan"]);
    $gambar = htmlspecialchars ($data["gambar"]);

    $query = "UPDATE mahasiswa SET 
                nama = '$nama',
                npm = '$npm',
                email = '$email',
                jurusan = '$jurusan',
                gambar = '$gambar'
                WHERE id = $id
                ";
    
    mysqli_query($conn, $query) or die(mysqli_error($conn));

    return mysqli_affected_rows($conn);
}

function upload() {
    // Siapkan dta gambar
    $filename = $_FILES["gambar"]["name"];
    $filesize = $_FILES["gambar"]["size"];
    $filetmpname = $_FILES["gambar"]["tmp_name"];
    $filetype = pathinfo($filename, PATHINFO_EXTENSION);
    $allowedtype = ["jpg", "jpeg", "png"];

    // cek apakah file bukan gambar
    if(!in_array($filetype, $allowedtype)) {
        echo "<script>
                alert('Gambar yang anda upload tidak sesuai!');
              </script>";
        return false;
    }
 
    // cek jika ukuran lebih besar dari 1MB
    if($filesize > 10000000) {
        echo "<script>
                alert('Ukuran gambar terlalu besar');
              </script>";
        return false;
    }

    // lolos pengecekkan gambar 
    // buat nama file baru
    $newfilename = uniqid() . $filename;
    // Upload gambar
    move_uploaded_file($filetmpname, 'img/' . $newfilename);

    return $newfilename;


}














?>