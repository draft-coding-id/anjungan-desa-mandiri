<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Warga</title>
</head>
<body>
    <h1>Data Warga</h1>
    <table border="1">
        <thead>
            <tr>
                <th>NIK</th>
                <th>Nama Lengkap</th>
                <th>Tempat Lahir</th>
                <th>Tanggal Lahir</th>
                <th>Alamat</th>
            </tr>
        </thead>
        <tbody>
            @foreach($warga as $data)
            <tr>
                <td>{{ $data->nik }}</td>
                <td>{{ $data->nama_lengkap }}</td>
                <td>{{ $data->tempat_lahir }}</td>
                <td>{{ $data->tanggal_lahir }}</td>
                <td>{{ $data->alamat }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
