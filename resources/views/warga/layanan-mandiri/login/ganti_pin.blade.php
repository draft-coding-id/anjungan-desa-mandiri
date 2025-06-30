<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="assets/logo.png" type="image/png">

  <title>Ganti PIN</title>
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
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .form-container {
      background: rgba(255, 255, 255, 0.95);
      padding: 40px;
      border-radius: 15px;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
      width: 100%;
      max-width: 400px;
      text-align: center;
    }

    .form-title {
      color: #333;
      font-size: 24px;
      font-weight: bold;
      margin-bottom: 30px;
    }

    .form-group {
      margin-bottom: 20px;
      text-align: left;
    }

    label {
      display: block;
      color: #555;
      font-weight: 500;
      margin-bottom: 8px;
      font-size: 14px;
    }

    input[type="password"] {
      width: 100%;
      padding: 12px 15px;
      border: 2px solid #ddd;
      border-radius: 8px;
      font-size: 16px;
      transition: border-color 0.3s;
      box-sizing: border-box;
    }

    input[type="password"]:focus {
      outline: none;
      border-color: #007bff;
    }

    .btn {
      width: 100%;
      padding: 12px;
      background-color: #007bff;
      color: white;
      border: none;
      border-radius: 8px;
      font-size: 16px;
      font-weight: 500;
      cursor: pointer;
      transition: background-color 0.3s;
      margin-top: 10px;
    }

    .btn:hover {
      background-color: #0056b3;
    }

    .btn-secondary {
      background-color: #6c757d;
      margin-top: 10px;
    }

    .btn-secondary:hover {
      background-color: #545b62;
    }

    .alert {
      padding: 12px;
      border-radius: 6px;
      margin-bottom: 20px;
      font-size: 14px;
    }

    .alert-success {
      background-color: #d4edda;
      color: #155724;
      border: 1px solid #c3e6cb;
    }

    .alert-error {
      background-color: #f8d7da;
      color: #721c24;
      border: 1px solid #f5c6cb;
    }

    .error-text {
      color: #dc3545;
      font-size: 12px;
      margin-top: 5px;
    }
  </style>
</head>

<body>
  <main>
    <div class="form-container">
      <h2 class="form-title">Ganti PIN</h2>

      @if(session('success'))
      <div class="alert alert-success">
        {{ session('success') }}
      </div>
      @endif

      @if(session('error'))
      <div class="alert alert-error">
        {{ session('error') }}
      </div>
      @endif

      <form method="POST" action="{{ route('ganti-pin.update') }}">
        @csrf

        <div class="form-group">
          <label for="pin_lama">PIN Lama</label>
          <input type="password"
            id="pin_lama"
            name="pin_lama"
            maxlength="6"
            pattern="[0-9]{6}"
            title="PIN harus 6 digit angka"
            required>
          @error('pin_lama')
          <div class="error-text">{{ $message }}</div>
          @enderror
        </div>

        <div class="form-group">
          <label for="pin">PIN Baru</label>
          <input type="password"
            id="pin"
            name="pin"
            maxlength="6"
            pattern="[0-9]{6}"
            title="PIN harus 6 digit angka"
            required>
          @error('pin')
          <div class="error-text">{{ $message }}</div>
          @enderror
        </div>

        <div class="form-group">
          <label for="pin_confirmation">Konfirmasi PIN Baru</label>
          <input type="password"
            id="pin_confirmation"
            name="pin_confirmation"
            maxlength="6"
            pattern="[0-9]{6}"
            title="PIN harus 6 digit angka"
            required>
          @error('pin_confirmation')
          <div class="error-text">{{ $message }}</div>
          @enderror
        </div>

        <button type="submit" class="btn">Ganti PIN</button>
        <a href="{{ route('logout-warga') }}" class="btn btn-secondary" style="display: inline-block; text-decoration: none; text-align: center;">Login Ulang</a>
      </form>
    </div>
  </main>

  <script>
    // Auto-focus on first input
    document.getElementById('pin_lama').focus();

    // Only allow numeric input
    document.querySelectorAll('input[type="password"]').forEach(input => {
      input.addEventListener('input', function(e) {
        this.value = this.value.replace(/[^0-9]/g, '');
      });
    });
  </script>
</body>

</html><!DOCTYPE html>
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
            background-image: url('{{asset('assets/BackgroundMockupAnjungan.png') }}');
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
            font-size: 36px;
            padding: 10px;
            width: 50px;
            height: 50px;
            border: 1px solid #000000;
            border-radius: 5px;
            margin-top: 10px;
            background-color: transparent;
        }

        .pin {
            font-size: 36px;
            padding: 10px;
            width: 50px;
            height: 50px;
            border: 1px solid #000000;
            border-radius: 5px;
            margin-top: 10px;
            background-color: transparent;
            text-align: center;
        }

        .button-container {
            position: absolute;
            left: 45%;
            bottom: 0%;
            padding: 20px;
        }

        span {
            margin-top: 20px;
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
                    <h1>Silahkan masukan PIN Keamanan Anda</h1>
                    <form action="{{route('login.checkPin')}}" method="POST">
                        @csrf
                        <input hidden name="nik" value="{{$nik}}" />
                        <input type="password" name="pin1" class="pin" min="0" max="9" maxlength="1" />
                        <input type="password" name="pin2" class="pin" min="0" max="9" maxlength="1" />
                        <input type="password" name="pin3" class="pin" min="0" max="9" maxlength="1" />
                        <input type="password" name="pin4" class="pin" min="0" max="9" maxlength="1" />
                        <input type="password" name="pin5" class="pin" min="0" max="9" maxlength="1" />
                        <input type="password" name="pin6" class="pin" min="0" max="9" maxlength="1" />
                        <input type="hidden" name="pin" id="pin" />
                        @if(session('error'))
                        <p style="color: red;">{{session('error')}}</p>
                        @endif
                        <div style="display: flex; flex-direction: column; justify-content: center; align-items: center;">
                            <span>
                                Lupa pin ?
                            </span>
                            <a target="_blank" href="http://wa.me/+6287788840513" class="hubungi-admin">Hubungi admin</a>
                            <button type="submit" class="button">Masuk</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="button-container">

            <a href="/warga" class="button">Kembali</a>
        </div>
    </main>

    <script>
        const pinInputs = document.querySelectorAll('.pin');

        pinInputs.forEach((input, index) => {
            input.addEventListener('input', (e) => {
                let value = e.target.value;

                // Hanya izinkan angka 0–9
                if (!/^[0-9]$/.test(value)) {
                    e.target.value = '';
                    return;
                }

                // Otomatis fokus ke input berikutnya jika ada
                if (value.length === 1 && index < pinInputs.length - 1) {
                    pinInputs[index + 1].focus();
                }

                // Update hidden input "pin" dengan nilai seluruh PIN
                updatePin();
            });

            // Navigasi dengan tombol panah & backspace
            input.addEventListener('keydown', (e) => {
                if (e.key === 'Backspace' && !input.value && index > 0) {
                    pinInputs[index - 1].focus();
                }
                if (e.key === 'ArrowLeft' && index > 0) {
                    pinInputs[index - 1].focus();
                }
                if (e.key === 'ArrowRight' && index < pinInputs.length - 1) {
                    pinInputs[index + 1].focus();
                }
            });
        });

        function updatePin() {
            const combined = Array.from(pinInputs).map(input => input.value).join('');
            document.getElementById('pin').value = combined;
        }
    </script>

</body>

</html>