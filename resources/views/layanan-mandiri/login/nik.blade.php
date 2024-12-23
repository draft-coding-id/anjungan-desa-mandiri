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
            background: linear-gradient(to top, #ff9472, #f2709c);
        }
        .header {
            color: white;
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
        /* .colors {
            color: #888;
            color: #555;
            color: #4caf50;
            background: #388e3c;
        } */
    </style>
</head>
<body>
    <div class="header"> 
        <h1>Layanan Mandiri</h1>
        <h2>Anjungan Desa Mandiri Desa Rawapanjang</h2>
    </div> 
    <div class="page-content"> 
        <div class="login-container">
            <p>Silakan login terlebih dahulu untuk melanjutkan.</p>

            <form action="{{ url('/login') }}" method="POST">
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="nik">NIK:</label>
                    <input type="text" id="nik" name="nik" placeholder="Masukkan NIK Anda" required>
                </div>
                <div class="button-container"> 
                    <button type="submit" class="button" onclick="window.location.href='/login-pin';">Lanjutkan</button>
                </div> 
            </form>
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
