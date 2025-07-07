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
      background-image: url('{{asset("assets/BackgroundMockupAnjungan.png")}}');
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

</html>