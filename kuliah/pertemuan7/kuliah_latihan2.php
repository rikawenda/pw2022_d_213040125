<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coba Get</title>
</head>
<body>
    
<!-- mengirim data menggunakan get -->
<a href="kuliah_latihan3.php?nama=Rikawendaa">Kirim Data Nama</a>

<!-- mengirimkan data menggunakan post -->
<h3>Login Form</h3>
<form action="kuliah_latihan3.php" method="post">
    <label for="Username">Username : </label>
    <input type="text" name="username" id="username">
    <br>
    <label for="Password">Password : </label>
    <input type="Password" name="Password" id="Password">
    <br>
    <button type="submit">Kirim</button>

    </br>
</form>
</body>
</html>