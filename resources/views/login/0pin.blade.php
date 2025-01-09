<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Langkah 2</title>
</head>
<body>
    <h2>Masukkan PIN Anda</h2>

    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('login.checkPin') }}" method="POST">
        @csrf
        <input type="hidden" name="nik" value="{{ $nik }}">
        <label for="pin">PIN:</label>
        <input type="password" id="pin" name="pin" required>
        <button type="submit">Login</button>
    </form>
</body>
</html>
