<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Keterangan Pengantar</title>
    <style>
        body {
            background: #ffffff;
            font-family: 'Times New Roman';
        }

        h1 {
            font-size: 24px;
            font-weight: normal;
        }

        p {
            line-height: 1.5;
        }

        .header {
            text-align: center;
        }

        .content {
            margin-left: 50px;
            margin-right: 50px;
            text-align: justify;
        }

        .footer {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
    </style>
</head>

<body>
    <div class="header">
        <table width="100%">
            <tr>
                <td width="20%">
                    {{-- <img src="{{asset('assets/logo.png')}}" width="120px" height="120px" alt="Logo Pemkab Bogor">
                    --}}
                    <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('assets/logo.png'))) }}"
                        width="120px" height="120px" alt="Logo Pemkab Bogor" />
                </td>
                <td width="60%" style="text-align: center ;">
                    <h1>PEMERINTAH KABUPATEN BOGOR
                        <br>KECAMATAN BOJONGGEDE
                        <br>DESA RAWAPANJANG
                    </h1>
                    <p style="margin-top:-10px; margin-bottom:0px;">Jl. Talang Kp Kelapa RT.02 RW.15 No.02 Kode Pos
                        16920</p>
                </td>
                <td width="20%">
                </td>
            </tr>
            <tr>
                <td colspan='7'>
                    <hr style="border: 2px solid black;">
                </td>
            </tr>
        </table>
    </div>

    <div class="content">
        <div class="header">
            <h2>Surat Keterangan Pengantar</h2>
            <p style="margin-top:-10px;">Nomor: {{$surat->no_surat}}</p>
            <br>
        </div>
        <div>
            <p>Yang bertanda tangan di bawah ini Kepala Desa Rawapanjang, Kecamatan Bojonggede, Kabupaten Bogor,
                Provinsi Jawa Barat menerangkan dengan sebenarnya bahwa :</p>
            <table class="content">
                <tr>
                    <td>1.</td>
                    <td>NIK / No KTP</td>
                    <td style="padding-left: 10px;">: </td>
                    <td>{{ $surat->isi_surat['nik'] }}</td>
                </tr>
                <tr>
                    <td>2.</td>
                    <td>Nama Lengkap</td>
                    <td style="padding-left: 10px;">: </td>
                    <td>{{ $surat->isi_surat['nama_lengkap'] }}</td>
                </tr>
                <tr>
                    <td>3.</td>
                    <td>Tempat/Tanggal Lahir</td>
                    <td style="padding-left: 10px;">: </td>
                    <td>{{ $surat->isi_surat['tempat_lahir'] }}, {{ $surat->isi_surat['tanggal_lahir'] }}</td>
                </tr>
                <tr>
                    <td>4.</td>
                    <td>Umur</td>
                    <td style="padding-left: 10px;">: </td>
                    <td>{{ $surat->isi_surat['usia'] }}</td>
                </tr>
                <tr>
                    <td>5.</td>
                    <td>Warga Negara</td>
                    <td style="padding-left: 10px;">: </td>
                    <td>{{ $surat->isi_surat['warga_negara'] }}</td>
                </tr>
                <tr>
                    <td>6.</td>
                    <td>Agama</td>
                    <td style="padding-left: 10px;">: </td>
                    <td>{{ $surat->isi_surat['agama'] }}</td>
                </tr>
                <tr>
                    <td>7.</td>
                    <td>Jenis Kelamin</td>
                    <td style="padding-left: 10px;">: </td>
                    <td>{{ $surat->isi_surat['jenis_kelamin'] }}</td>
                </tr>
                <tr>
                    <td>8.</td>
                    <td>Pekerjaan</td>
                    <td style="padding-left: 10px;">: </td>
                    <td>{{ $surat->isi_surat['pekerjaan'] }}</td>
                </tr>
                <tr>
                    <td>9.</td>
                    <td>Tempat Tinggal</td>
                    <td style="padding-left: 10px;">: </td>
                    <td>{{ $surat->isi_surat['alamat'] }} RT {{ $surat->isi_surat['rt'] }} RW {{ $surat->isi_surat['rw']
                        }} Desa
                        {{ $surat->isi_surat['desa'] }}, Kecamatan {{ $surat->isi_surat['kecamatan'] }}, Kabupaten Bogor
                    </td>
                </tr>
                <tr>
                    <td>10.</td>
                    <td>NIK</td>
                    <td style="padding-left: 10px;">: </td>
                    <td>{{ $surat->isi_surat['nik'] }}</td>
                </tr>
                <tr>
                    <td>11.</td>
                    <td>Keperluan</td>
                    <td style="padding-left: 10px;">: </td>
                    <td>{{ $surat->isi_surat['keperluan'] }}</td>
                </tr>
                <tr>
                    <td>12.</td>
                    <td>Berlaku</td>
                    <td style="padding-left: 10px;">: </td>
                    <td>1 Januari 2025 s/d 31 April 2025</td>
                </tr>
                <tr>
                    <td>13.</td>
                    <td>Golongan Darah</td>
                    <td style="padding-left: 10px;">: </td>
                    <td>{{ $surat->isi_surat['gol_darah'] }}</td>
                </tr>
            </table>
            <p>Demikian surat keterangan ini dibuat, untuk dipergunakan sebagaimana mestinya.</p>
        </div>

        <div class="footer">
            <table>
                <tr>
                    <td>
                        <p>Pemegang Surat</p>
                        <br><br><br><br><br><br><br>
                        <span>{{$surat->isi_surat['nama_lengkap']}}</span>
                    </td>
                    <td>
                        <div style="width: 250px"></div>
                    </td>
                    <td>
                        <p>Rawapanjang, {{$surat->updated_at->translatedFormat('d F Y') ?? ""}}</p>
                        <img src="data:image/png;base64,{{ base64_encode($qrCode) }}" alt="QR Code height=" 116px" width="116px" alt="TTD Kades"">
                        <p style=" align-items: flex-start">Pejabat Desa</p>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</body>

</html>