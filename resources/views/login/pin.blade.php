<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Anjungan Desa Mandiri</title>
    <link rel="icon" href="https://rawapanjang-desa.id/desa/logo/1679693855_logo-pemkab-bogor.png" type="image/png">
    <style>
        body { 
            height: 100vh;
            margin: 0;
            font-family: sans-serif;
            background-image: url('{{ asset('assets/Background Mockup Anjungan.png') }}');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
        }
        .header {
            /* color: white; */
            text-align: center;
            padding: 20px;
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
            display: flex;
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
        }
        .form-group input:focus {
            border-color: #4caf50;
            outline: none;
        }
        .footer {
            position: fixed;
            bottom: 0;
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
        .contact-admin {
            margin-top: 20px;
            font-size: 14px;
        }
        .contact-admin a {
            text-decoration: none;
        }
        .contact-admin a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="header"> 
        <h1>Layanan Mandiri</h1>
        <h2>Anjungan Desa Mandiri Desa Rawapanjang</h2>
    </div> 
    <div class="page-content"> 
        <div class="login-container">
            <p>Silahkan masukkan PIN keamanan Anda.</p>

            <form method="POST" action="/login/check-pin">
                @csrf
                <div class="form-group">
                    <label for="pin">PIN:</label>
                    <input type="password" id="pin" name="pin" placeholder="Masukkan PIN Anda" required>
                </div>
                @error('pin') <p style="color: red;">{{ $message }}</p> @enderror
                <div class="button-container" style="margin: -20px;"> 
                    <button type="submit" class="button">Masuk</button>
                </div> 
            </form>
            <p class="contact-admin"><a href="#">Lupa PIN Anda? Hubungi admin desa di sini.</a></p>
        </div>
    </div> 
    <div class="footer">
        <div class="button-container"> 
            <button class="button" onclick="window.history.back();">Kembali</button>
        </div> 
        <div class="credit">
            <p>&copy;</p>
        </div>
    </div>
</body>
</html>
