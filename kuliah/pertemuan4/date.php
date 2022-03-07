<?php
// Date
// Untuk menampilkan tanggal dengan format tertentu
echo date("l, d-M-Y");

// Time
// UNIX Timestamp / EPOCH time
// detik yang sudah berlalu sejak 1 Januari 1970echo time()

echo date("l, d M Y", time()-60*60*24*6952);

// mktime
// membuat sendiri detik
// mktime(0,0,0,0,0,0)
// jam, menit, detik, bulan, tanggal, tahun
echo date("l", mktime(0,0,0,2,23,2003));


// strtotime
echo date("l", strtotime("09 oct 1973"));

?>