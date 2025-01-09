<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login PIN</title>
</head>
<body>
    <h1>Login - Masukkan PIN</h1>
    <form method="POST" action="/login/pin">
        @csrf
        <label for="pin">PIN:</label>
        <input type="password" id="pin" name="pin" required>
        @error('pin') <p style="color: red;">{{ $message }}</p> @enderror
        <button type="submit">Login</button>
    </form>
</body>
</html>