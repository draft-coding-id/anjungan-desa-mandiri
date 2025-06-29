<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Anjungan Desa Mandiri</title>
    <link rel="icon" href="assets/logo.png" type="image/png">

    <style>
        body {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            overflow: hidden;
        }

        main {
            height: 100vh;
            width: 100vw;
            font-family: sans-serif;
            background-image: url('{{asset('assets/BackgroundMockupAnjungan.png')}}');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            gap: 20px;
        }

        .left-col {
            background-color: #D9D9D9BF;
            width: 50vw;
            height: 100%;
            display: flex;
            gap: 10px;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .left-col h1 {
            font-size: 36px;
            text-align: center;
            line-height: 20%;
        }

        .left-col img {
            width: 200px;
            height: 200px;
        }

        .right-col {
            width: 50vw;
            height: 100%;
            display: flex;
            gap: 10px;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
        }

        .right-col p {
            font-size: 24px;
            font-weight: bold;
        }

        input {
            width: 100%;
            padding: 10px;
            border: 1px solid #000000;
            border-radius: 5px;
            margin-top: 10px;
            background-color: transparent;
        }

        .button-container {
            position: absolute;
            left: 45%;
            bottom: 0%;
            padding: 20px;
        }

        .button {
            display: flex;
            margin-top: 10px;
            justify-content: center;
            align-items: center;
            background-color: #ff9900;
            color: white;
            padding: 10px 20px;
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
            transition: background 0.3s;
        }

        .button:hover {
            background-color: #e68a00;
        }

        .hubungi-admin {
            color: blue;
        }

        .hubungi-admin:hover {
            color: rgb(86, 86, 248);
        }
    </style>
</head>

<body>
    <main>
        <div class="container">
            <div class="left-col">
                <img src="{{asset('assets/logo.png')}}" alt="Logo Desa Rawapanjang" />
                <h1>
                    Anjungan Desa Mandiri
                </h1>
                <h1>
                    Desa Rawapanjang
                </h1>
                <h1>
                    Kabupaten Bogor
                </h1>
            </div>
            <div class="right-col" style="text-align: center">
                <div>
                    <h1>Selamat Datang</h1>
                    <h2>Silahkan <a href="{{route('pindai-ktp')}}">pindai</a> E-KTP anda untuk masuk </h2>
                </div>
                <div>
                    <p>atau</p>
                </div>
                <div>
                    <h3>Masukan Nomor KTP Anda</h3>
                    <form action="{{route('login.checkNik')}}" method="POST">
                        @csrf
                        <input type="number" name="nik" />
                        @if(session('error'))
                        <p style="color: red;">{{session('error')}}</p>
                        @endif
                        <span>Belum punya akun? <a target="_blank" href="http://wa.me/+6287788840513" class="hubungi-admin">Hubungi admin</a></span>
                        <div style="display: flex; justify-content: center; align-items: center;">
                            <button type="submit" class="button">Cek</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="button-container">
            <a href="/warga" class="button">Kembali</a>
        </div>
    </main>

</body>

</html>