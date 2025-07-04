<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="assets/logo.png" type="image/png">

    <title>Halaman Berhasil</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0;
            background-image: url('{{ asset('assets/BackgroundMockupAnjungan.png') }}');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            /* color: white; */
            font-family: sans-serif;
            text-align: center;
            height: 100vh;
        }

        .button-container {
            display: flex;
            overflow-x: auto;
            justify-content: center;
            align-items: center;
            padding: 20px;
            padding-top: 0px;
            gap: 20px;
            scrollbar-width: none;
            Sembunyikan scrollbar di Edge,
            Chrome
        }

        .button {
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #ff9900;
            color: white;
            padding: 10px 30px;
            border: 1px solid #ffffff;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            font-weight: bold;
            flex-shrink: 0;
            font-size: 16px;
            line-height: 1.3;
            letter-spacing: 0.5px;
            height: 50px;
            max-width: 120px;
        }

        .button:hover {
            background-color: #e68a00;
        }
    </style>
</head>

<body>
    <div>
        <h1>Surat telah berhasil dibuat</h1>
        <p>Kami akan segera menghubungi Anda begitu surat selesai diproses</p>
        <br><br>
        <div class="button-container">
            <a href="{{route('halaman_utama')}}" class="button">Halaman Utama</a>
        </div>
    </div>
</body>

</html>