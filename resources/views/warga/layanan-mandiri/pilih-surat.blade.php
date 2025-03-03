<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Layanan Mandiri - Anjungan Desa Mandiri Desa Rawapanjang</title>
    <link rel="icon" href="https://rawapanjang-desa.id/desa/logo/1679693855_logo-pemkab-bogor.png" type="image/png">
    <style>
        body {
            margin: 0;
            font-family: sans-serif;
            background-image: url('{{ asset('assets/Background Mockup Anjungan.png') }}');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            /* color: white; */
        }
        .page-content {
            padding: 30px 50px 0 50px;
        }
        .button-container {
            display: flex;
            justify-content: center;
        }
        .button {
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: orange;
            color: white;
            border: 1px solid #ffffff;
            padding: 20px 30px;
            margin: 15px;
            font-size: 18px;
            border-radius: 10px;
            cursor: pointer;
            width: 220px;
            height: 50px;
            line-height: 1.3;
            letter-spacing: 0.5px;
            transition: background 0.3s;
            flex-shrink: 0;
            text-decoration: none;
            font-weight: bold;
            text-align: center;
        }
        .button:hover {
            background-color: darkorange;
        }

        .nav-buttons {
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 20px;
        }

        .nav-buttons .button {
            padding: 0px;
            width: 180px;
            height: 50px;
            font-size: 16px;
        }

        .footer {
            /* position: fixed;
            bottom: 0; */
            width: 100%;
            color: white;
            text-align: center;
        }
        .credit {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 30px;
            font-size: 12px;
            background-color: #ff9900;
            color: white;
        }
    </style>
</head>
<body>
    <div class="page-content"> 
        <h2>Selamat Datang, {{ $warga->nama_lengkap }}</h2>
        <h3>Silahkan pilih surat yang ingin Anda ajukan.</h3>
        <!-- Tombol Pilihan Surat -->
        <div class="button-container">
            <a href='/surat-keterangan-domisili' class="button">Surat Kuasa</a>
            <a href='/surat-keterangan-domisili' class="button">Surat Keterangan Domisili</a>
            <a href='/surat-keterangan-pengantar' class="button">Surat Keterangan Pengantar</a>
        </div>
        <div class="button-container">
            <a href='/surat-keterangan-domisili' class="button">Surat Izin Keramaian</a>
            <a href='/surat-keterangan-domisili' class="button">Surat Keterangan Tidak Mampu</a>
            <a href='/surat-keterangan-domisili' class="button">Surat Keterangan Kematian</a>
        </div>
        <div class="button-container">
            <a href='/surat-keterangan-domisili' class="button">Surat 7</a>
            <a href='/surat-keterangan-domisili' class="button">Surat 8</a>
            <a href='/surat-keterangan-domisili' class="button">Surat 9</a>
            <!-- <a href="#" class="button">Surat Permohonan Perubahan</a>
            <a href="#" class="button">Surat Keterangan Domisili Usaha</a>
            <a href="#" class="button">Surat Keterangan Usaha</a> -->
        </div>
        <div class="button-container">
            <a href='/surat-keterangan-domisili' class="button">Surat 10</a>
            <a href='/surat-keterangan-domisili' class="button">Surat 11</a>
            <!-- <a href="#" class="button">Surat Keterangan Wali Hakim</a> -->
        </div>
    </div> 
    <div class="footer">
        <!-- Tombol Navigasi -->
        <div class="nav-buttons"> 
            <a href='/warga' class="button">Halaman Utama</a> 
        </div> 
        <div class="credit">
            <p>&copy;</p>
        </div>
    </div>
</body>
</html>
