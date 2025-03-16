<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - Anjungan Desa Mandiri</title>
    <link rel="icon" href="https://rawapanjang-desa.id/desa/logo/1679693855_logo-pemkab-bogor.png" type="image/png">
    <style>
        body {
            margin: 0;
            font-family: sans-serif;
            background-image: url('{{asset('assets/BackgroundMockupAnjungan.png') }}');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
        }

        .header {
            /* color: white; */
            text-align: center;
            padding: 30px;
        }

        .page-content {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
        }

        .login-container {
            background: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 400px;
            text-align: center;
        }

        .button-container {
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .button {
            display: flex;
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

        .form-group {
            margin: 30px 0;
            text-align: left;
        }

        .form-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .form-group input {
            width: 90%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 14px;
            color: #333;
            text-align: center;
            margin: 10px
        }

        .form-group input:focus {
            border-color: #4caf50;
            outline: none;
        }

        .footer {
            width: 100%;
            color: white;
            text-align: center;
            background-color: rgba(255, 153, 0, 0.5);
            border: 2px solid rgba(0, 0, 0, 0.0);
            margin-top: 30px;
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
    @if(session('error'))
        <h2 style="position: absolute; top: 0; left: 0; right: 0; background-color: red; color: white; text-align: center; padding: 10px;">
            {{ session('error') }}
        </h2>
    @endif
    <div class="header">
        <img src="https://rawapanjang-desa.id/desa/logo/1679693855_logo-pemkab-bogor.png" alt="Logo Desa" />
        <h1>Anjungan Desa Mandiri</h1>
        <h2>Desa Rawapanjang<br>Kabupaten Bogor</h2>
    </div>
    <div class="page-content">
        <div class="login-container">
            <h2>Login Administrator Desa</h2>
            <form action="{{route('cek-credentials')}}" method="POST">
                @csrf
                <div class="form-group">
                    <input type="text" id="username" name="username" placeholder="Nama Pengguna" >
                    <input type="password" id="password" name="password" placeholder="Kata Sandi" >
                </div>
                <div class="button-container" style="padding: 0;">
                    <button type="submit" class="button">Masuk</button>
                </div>
            </form>
        </div>
    </div>
    <div class="footer">
        <div class="credit">
            <p>&copy;</p>
        </div>
    </div>
</body>

</html>
