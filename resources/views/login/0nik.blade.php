<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Langkah 1</title>
</head>
<body>
    <h2>Masukkan NIK Anda</h2>

    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('login.checkNik') }}" method="POST">
        @csrf
        <label for="nik">NIK:</label>
        <input type="text" id="nik" name="nik" required>
        <button type="submit">Lanjutkan</button>
    </form>
</body>
</html>
