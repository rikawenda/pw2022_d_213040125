<?php 
// $mahasiswa = [
//     ["Rika Febriyanti Wenda", "213040125", "rika14322@gmail.com", "Teknik Informatika"],
//     ["Fajar Agus", "213040122", "fajaragus@gmail.com", "Teknik Informatika"],
//     ["Vina Nur Fauziah", "213040115", "vinafauziah@gmail.com", "Kedokteran"],
//     ["Adam", "213040126", "adam890@gmail.com", "Teknik Informatika"]
// ];

// Array associative
// definisinya sama seperti array numerik, kecuali key-nya adalah string yang kita buat sendri
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
    <title>Daftar Mahasiswa</title>
</head>
<body>
    <h1>Daftar Mahasiswa</h1>

    <?php foreach( $mahasiswa as $mhs ) : ?>
    <ul>
        <li>
            <img src="img/<?= $mhs["gambar"]; ?>" height="50" class="rounded-circle"/>
        </li>
        <li>Nama : <?= $mhs["nama"]; ?></li>
        <li>NRP : <?= $mhs["nrp"]; ?></li>
        <li>Email : <?= $mhs["email"]; ?></li>
        <li>Jurusan : <?= $mhs["jurusan"]; ?></li>
    </ul>
    <?php endforeach; ?>
</body>
</html>

