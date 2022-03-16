<?php 
// Representasi Data Mahasiswa

$mahasiswa = [
    ["Rika Febriyanti Wenda", "213040125", "rika14322@gmail.com", "Teknik Informatika"],
    ["Vina Nur Fauziah rismayanti", "213040115", "vinaanurfauziah@gmail.com", "Teknik Informatika"],
    ["Fajar Agus Hermanto", "213040122", "fajar123@gmail.com", "Teknik Informatika"]
];

?>
<?php foreach($mahasiswa as $mhs) { ?>
<ul>
    <li> Nama : <?php echo $mhs[0]; ?> </li>
    <li> NPM : <?php echo $mhs[1]; ?></li>
    <li> Email : <?php echo $mhs[2]; ?> </li>
    <li> Jurusan : <?php echo $mhs[3]; ?> </li>
</ul>
<?php } ?>