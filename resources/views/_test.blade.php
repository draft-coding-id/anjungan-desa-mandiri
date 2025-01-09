<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Anjungan Desa Mandiri</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            background: linear-gradient(135deg, #4caf50, #81c784);
            color: #333;
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
        .login-container h1 {
            font-size: 24px;
            margin-bottom: 10px;
            color: #4caf50;
        }
        .login-container p {
            font-size: 14px;
            margin-bottom: 20px;
            color: #555;
        }
        .form-group {
            margin-bottom: 20px;
            text-align: left;
        }
        .form-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }
        .form-group input {
            width: 100%;
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
        .button {
            display: block;
            width: 100%;
            background: #4caf50;
            color: white;
            border: none;
            padding: 10px;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background 0.3s;
        }
        .button:hover {
            background: #388e3c;
        }
        .footer {
            margin-top: 20px;
            font-size: 12px;
            color: #888;
        }
        .footer a {
            color: #4caf50;
            text-decoration: none;
        }
        .footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<div class="login-container">
    <h1>Login</h1>
    <p>Selamat datang di Anjungan Desa Mandiri. Silakan login untuk melanjutkan.</p>

    <form action="{{ url('/login') }}" method="POST">
        {{ csrf_field() }}

        <div class="form-group">
            <label for="nik">NIK:</label>
            <input type="text" id="nik" name="nik" placeholder="Masukkan NIK Anda" required>
        </div>

        <div class="form-group">
            <label for="pin">PIN:</label>
            <input type="password" id="pin" name="pin" placeholder="Masukkan PIN Anda" required>
        </div>

        <button type="submit" class="button">Masuk</button>
    </form>

    <div class="footer">
        <p>Belum punya PIN? Hubungi pengurus desa untuk mendaftar.</p>
        <p><a href="/">Kembali ke Halaman Utama</a></p>
    </div>
</div>

</body>
</html>
