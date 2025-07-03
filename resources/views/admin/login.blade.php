<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - Anjungan Desa Mandiri</title>
    <link rel="icon" href="assets/logo.png" type="image/png">
    <style>
        body {
            margin: 0;
            font-family: sans-serif;
            background-image: url('{{asset("assets/BackgroundMockupAnjungan.png") }}');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
        }
        .modal-overlay {
        display: none;
        position: fixed;
        z-index: 9999;
        left: 0; top: 0; right: 0; bottom: 0;
        background: rgba(0,0,0,0.15);
        justify-content: center;
        align-items: center;
        }
        .modal-overlay.active {
        display: flex;
        }
        .custom-modal {
        background: #fff;
        border-radius: 20px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.2);
        padding: 32px 24px 24px 24px;
        max-width: 400px;
        width: 90vw;
        text-align: center;
        border: 1.5px solid #444;
        }
        .custom-modal p {
        font-size: 17px;
        font-weight: 600;
        margin-bottom: 24px;
        margin-top: 0;
        letter-spacing: 1px;
        }
        .custom-modal button {
        padding: 8px 32px;
        border-radius: 7px;
        border: 1.5px solid #444;
        background: #fff;
        font-size: 15px;
        font-weight: 600;
        cursor: pointer;
        transition: background 0.2s;
        }
        .custom-modal button:hover {
        background: #f2f2f2;
        }
        a {
            color: #000;
            font-size: 16px;
        }

        form {
            margin-bottom: 10px;
        }

        .header {
            text-align: center;
            padding: 30px;
        }

        .page-content {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            width: 100vw;
        }

        .login-container {
            background: #fff;
            opacity: 0.85;
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
            padding: 20px 0 0 0;
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
            margin: 30px 0 10px 0;
            text-align: left;
        }

        .form-group input[type="text"],
        .form-group input[type="password"] {
            width: 90%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 14px;
            color: #333;
            text-align: center;
            margin: 10px 0;
        }

        .form-group input:focus {
            border-color: #4caf50;
            outline: none;
        }

        .form-options {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin: 10px 0 0 0;
            font-size: 14px;
        }

        .form-options label {
            display: flex;
            align-items: center;
            gap: 5px;
            cursor: pointer;
        }

        .forgot-link {
            color: #007bff;
            cursor: pointer;
            text-decoration: underline;
            margin-left: 10px;
        }

        .header img {
            width: 150px;
            height: 150px;
            object-fit: contain;
            margin-bottom: 10px;
            border-radius: 8px;
        }
    </style>
</head>

<body>
    @if(session('error'))
    <h2
        style="position: absolute; top: 0; left: 0; right: 0; background-color: red; color: white; text-align: center; padding: 10px;">
        {{ session('error') }}
    </h2>
    @endif
    <div class="page-content">
        <div class="header">
            <img src="assets/logo.png" alt="Logo Desa" />
            <h1>Anjungan Desa Mandiri</h1>
            <h2>Desa Rawapanjang<br>Kabupaten Bogor</h2>
        </div>
        <div class="login-container">
            <h2>Login Administrator Desa</h2>
            <form action="{{route('cek-credentials')}}" method="POST">
                @csrf
                <div class="form-group">
                    <input type="text" id="username" name="username" placeholder="Nama Pengguna" required>
                    <input type="password" id="password" name="password" placeholder="Kata Sandi" required>
                </div>
                <div class="form-options">
                    <label>
                        <input type="checkbox" id="show-password">
                        Tampilkan Kata Sandi
                    </label>
                    <span class="forgot-link" onclick="showForgotPassword()">Lupa kata sandi?</span>
                </div>
                <div class="button-container">
                    <button type="submit" class="button">Masuk</button>
                </div>
            </form>
            <a href="{{route('halaman_utama')}}">Masuk sebagai warga</a>
        </div>
        <div class="modal-overlay" id="forgot-modal">
            <div class="custom-modal">
                <p>Mohon hubungi admin untuk<br>mengubah kata sandi Anda</p>
                <button onclick="closeForgotModal()">Kembali</button>
            </div>
        </div>
    </div>
    <script>
        // Checkbox tampilkan kata sandi
        document.getElementById('show-password').addEventListener('change', function () {
            const pwd = document.getElementById('password');
            pwd.type = this.checked ? 'text' : 'password';
        });

        // Popup lupa kata sandi
        function showForgotPassword() {
            document.getElementById('forgot-modal').classList.add('active');
        }
        function closeForgotModal() {
            document.getElementById('forgot-modal').classList.remove('active');
        }
    </script>
</body>

</html>