<?php 
// Pertemuan5 - Array
// Array adalah variabel yang dapat menyimpan


// membuat array
$hari = ["Senin", "Selasa", "Rabu", "Kamis", "Jumat"]; //versi baru
$bulan = array ("Januari", "Februari", "Maret"); 

// mencetak array
// menggunakan index, dimulai dari 0
echo $hari [0];
echo "<br>";
echo $bulan [2];
echo "<br>";

// menggunakan var_dump() atau print_r()
// hanya untuk debugging
var_dump($hari);
echo "<br>";
print_r ($bulan);
echo "<hr>";

// mencetak untuk user
// menggunakan looping
for($i = 0; $i < count($hari); $i++) {
    echo $hari[$i];
    echo "<br>";
}
echo "<hr>";

// menggunakan foreach
// pengulangan khusus array
foreach($bulan as $b) {
    echo $b;
    echo "<br>";
}
echo "<hr>";

// memanipulasi array
// menambah 1 elemen di akhir 
$hari[] = "Jum'at";
$hari[] = "Sabtu";
print_r ($hari);
echo "<br>";
$bulan [] = "April";
$bulan [] = "Mei";
print_r ($bulan);4
?>