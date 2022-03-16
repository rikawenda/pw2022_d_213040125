<?php 
$mahasiswa = [
    ["Rika Febriyanti", "213040125", "Teknik Informatika", "rika14322@gmail.com"],
    ["Fajar Agus", "213040122", "Teknik mInformatika", "fajaragus12@gmail.com"],
    ["Vina Nur Fauziah", "213040125", "Teknik Informatika", "vinafauziah@gmail.com"],
    ["Adam", "213040125", "Teknik Informatika", "adam890@gmail.com"]
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

<!-- <ul> -->
<!-- <?php foreach( $mahasiswa as $mhs ) : ?> -->
<!-- <li><?= $mhs; ?></li> -->
<!-- <?php endforeach; ?> -->
<!-- </ul> -->

<?php foreach($mahasiswa as $mhs) : ?>
    <ul>
        <li>Nama : <?= $mhs[0] ?></li>
        <li>NRP : <?= $mhs[1] ?></li>
        <li>Jurusan : <?= $mhs[2] ?></li>
        <li>Email : <?= $mhs[3] ?></li>
    </ul>
<?php endforeach; ?>
</body>
</html>