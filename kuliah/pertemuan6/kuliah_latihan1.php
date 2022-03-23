<?php 
// Array Associative
// Array yang keynya berasosiasi / berpesangan dengan string

$mahasiswa = [
    [
        "nama" => "Rika Febriyanti", 
        "npm" => "213040125", 
        "email" => "rika14322@gmail.com", 
        "jurusan" => "Teknik Informatika"
    ],
    [
        "nama" => "Fajar Agus", 
        "npm" => "213040122", 
        "email" => "fajaragus@gmail.com", 
        "jurusan" => "Teknik Informatika"
    ],
    [
        "nama" => "Vina Nur Fauziah", 
        "npm" => "213040125", 
        "email" => "vinafauziah@gmail.com", 
        "jurusan" => "Kedokteran"
    ],
    [
        "nama" => "Adam", 
        "npm" => "213040125", 
        "email" => "adam890@gmail.com", 
        "jurusan" => "Teknik Informatika"
        ]
];

// var_dump ($mahasiswa[2]["nama"]);
?>

<?php foreach($mahasiswa as $mhs) { ?>
    <ul>
        <li> Nama : <?php echo $mhs["nama"]; ?> </li>
        <li> NPM : <?php echo $mhs["npm"]; ?></li>
        <li> Email : <?php echo $mhs["email"]; ?> </li>
        <li> Jurusan : <?php echo $mhs["jurusan"]; ?> </li>
    </ul>
<?php } ?>