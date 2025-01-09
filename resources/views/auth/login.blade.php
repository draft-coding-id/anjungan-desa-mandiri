<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login NIK</title>
</head>
<body>
    <h1>Login - Masukkan NIK</h1>
    <form method="POST" action="/login/nik">
        @csrf
        <label for="nik">NIK:</label>
        <input type="text" id="nik" name="nik" required>
        @error('nik') <p style="color: red;">{{ $message }}</p> @enderror
        <button type="submit">Lanjut</button>
    </form>
</body>
</html>
