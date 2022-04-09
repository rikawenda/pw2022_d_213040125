<?php 
// Variabel scope / lingkup variabel
// $x = 5;

// function tampilx() {
//     global $x;
//     echo $x;
// }

// tampilx();

// SUPERGLOBALS
// variabel global milik php
// merupakan array Associative

// var_dump($_GET);

// $_GET
$mahasiswa = [
    [
        "nama" => "Rika Febriyanti Wenda",
        "nrp" => "213040125",
        "email" => "rika14322@gmail.com",
        "jurusan" => "Teknik Informatika",
        "gambar" => "hk.png"
    ],
    [
        "nama" => "Fajar Agus",
        "nrp" => "213040122",
        "email" => "fajaragus@gmail.com",
        "jurusan" => "Teknik Informatika",
        "gambar" => "buzz.webp"
    ],
    [
        "nama" => "Vina Nur Fauziah",
        "nrp" => "213040115",
        "email" => "vinafauziah@gmail.com",
        "jurusan" => "Kedokteran",
        "gambar" => "sw.png"
    ],
    [
        "nama" => "Adam",
        "nrp" => "213040126",
        "email" => "adam890@gmail.com",
        "jurusan" => "Teknik Informatika",
        "gambar" => "wddy.webp"
    ]
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GET</title>
</head>
<body>
    <h1>Daftar Mahasiswa</h1>
    <ul>
    <?php foreach( $mahasiswa as $mhs ) : ?>
        <li>
            <a href="latihan2.php?nama=<?= $mhs["nama"]; ?>&nrp=<?= $mhs["nrp"]; ?>&email=<?= $mhs["email"]; ?>&jurusan=<?= $mhs["jurusan"]; ?>&gambar=<?= $mhs["gambar"]; ?>"><?= $mhs ["nama"]; ?></a>
        </li>
    <?php endforeach; ?>
    </ul>
</body>
</html>