<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Warga</title>
    <link rel="icon" href="{{asset('assets/logo.png')}}" type="image/png">
    {{--
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}"> --}}
    <style>
        body {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: sans-serif;
            overflow-x: hidden;
            background-image: url('{{asset('assets/BackgroundMockupAnjungan.png') }}');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            height: 100vh;
            /* Mengatur tinggi body agar menutupi seluruh viewport */
        }

        main {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        h1 {
            text-align: center;
            font-size: 24px;
            margin-bottom: 10px;
        }

        h3 {
            text-align: center;
            margin-bottom: 30px;
            line-height: 1.4em;
            font-size: 18px;
            color: #000;
        }

        .button-container {
            display: flex;
            overflow-x: auto;
            justify-content: center;
            /* align-items: center; */
            padding: 20px;
            padding-top: 0px;
            gap: 80px;
            scrollbar-width: none;
        }

        .button {
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #ff9900;
            color: white;
            padding: 20px 30px;
            border-radius: 20px;
            cursor: pointer;
            text-decoration: none;
            font-weight: bold;
            font-size: 16px;
            height: 50px;
            max-width: 120px;
            box-shadow: 8px 8px 12px rgba(255, 255, 255, 0.5);
        }

        .button:hover {
            background-color: #e68a00;
        }
    </style>
</head>

<body>
    <main>
        <img src="{{asset('assets/logo.png')}}" alt="Logo Desa">
        <h1>Anjungan Desa Mandiri <br> Desa Rawapanjang <br>Kabupaten Bogor</h1>
        <div>
            <h3>Selamat Datang {{auth('warga')->user()->nama_lengkap}} <br> Silahkan piilh layanan yang Anda perlukan hari ini </h3>
            <div class="button-container">
                <a href="{{route('layanan-umum')}}" class="button">Surat Digital</a>
                <a href="{{route('halaman_utama')}}" class="button">Profil Desa</a>
            </div>
        </div>

    </main>
</body>

</html>
