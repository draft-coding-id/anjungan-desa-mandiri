<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
</head>
<body>
    <h1>Selamat datang, {{ $warga->nama_lengkap }}</h1>
    <p>NIK: {{ $warga->nik }}</p>
    <p>Alamat: {{ $warga->alamat }}</p>
</body>
</html>
