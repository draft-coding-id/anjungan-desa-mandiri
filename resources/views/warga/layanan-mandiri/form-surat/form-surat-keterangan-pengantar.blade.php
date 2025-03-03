<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Keterangan Pengantar</title>
    <link rel="icon" href="https://rawapanjang-bojonggede.desa.id/assets/files/data/website-desa-rawapanjang-3201132008/images/logo_pemkab_bogor.png" type="image/png">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url('{{ asset('assets/Background Mockup Anjungan.png') }}');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            display: flex;
            justify-content: center;
        }
        .form-container {
            width: 70%;
            background-color: rgba(255, 255, 255, 0.8);
            padding: 30px;
            margin-top: 50px;
            border: 3px solid #000000;
            border-radius: 60px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            font-size: 24px;
            margin-bottom: 10px;
        }
        h3 {
            text-align: center;
            margin-bottom: 30px;
            font-size: 18px;
            color: #555;
        }
        .form-group {
            margin: 20px;
        }
        .form-group label {
            display: inline-block;
            width: 200px;
            font-weight: bold;
            margin-bottom: 10px
        }
        .form-group input {
            width: calc(90%);
            padding: 10px;
            border: 1px solid #333;
            border-radius: 5px;
            font-size: 14px;
            margin-left: 20px;
        }
        .form-group input[type="number"] {
            width: 50px;
            margin-left: -120px;
        }
        .button-container {
            text-align: center;
            margin-top: 20px;
        }
        .button {
            background-color: orange;
            color: white;
            border: 1px solid #ffffff;
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
            margin: 0 10px;
        }
        .button:hover {
            background-color: darkorange;
        }
    </style>
</head>
<body>

<div class="form-container">
    <h1>Surat Keterangan Pengantar</h1>
    <h3>Silahkan isi data yang diperlukan</h3>

    <form action="{{ url('/submitForm') }}" method="POST">
        @csrf
        <div class="form-group">
            <input type="hidden" name="surat" value="Surat Keterangan Pengantar">
        </div>
        <div class="form-group">
            <label>NIK / No. KTP :</label>
            <input type="text" name="nik" value="{{ $warga->nik }}" readonly>
        </div>
        <div class="form-group">
            <label>Nama Lengkap :</label>
            <input type="text" name="nama_lengkap" value="{{ $warga->nama_lengkap }}" readonly>
        </div>
        <div class="form-group">
            <label>Tempat Lahir :</label>
            <input type="text" name="tempat_lahir" value="{{ $warga->tempat_lahir }}" readonly>
        </div>
        <div class="form-group">
            <label>Tanggal Lahir :</label>
            <input type="date" name="tanggal_lahir" value="{{ $warga->tanggal_lahir }}" readonly>
        </div>
        <hr>
        <div class="form-group">
            <label>Alamat / Tempat Tinggal :</label>
            <input type="text" name="alamat" value="{{ $warga->alamat }}" readonly>
        </div>
        <div class="form-group">
            <label>RT :</label>
            <input type="number" name="rt" value="{{ $warga->rt }}" readonly>
        </div>
        <div class="form-group">
            <label>RW :</label>
            <input type="number" name="rw" value="{{ $warga->rw }}" readonly>
        </div>
        <hr>
        <div class="form-group">
            <label>Keperluan :</label>
            <input type="text" name="keperluan" required>
        </div>
        
        <div class="button-container">
            <button class="button" onclick="window.history.back();">Kembali</button>
            <button type="submit" class="button">Lanjutkan</button>
        </div>
    </form>
</div>

</body>
</html>
