<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Keterangan Domisili</title>
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
            text-align: right;
        }
    </style>
</head>

<body>
    <div class="header">
        <table width="100%">
            <tr>
                <td>
                    <img src="{{asset('assets/logo.png')}}" height="116px" width="116px" alt="Logo Desa" />
                </td>
                <td width="100%">
                    <h1>PEMERINTAH KABUPATEN BOGOR
                        <br>KECAMATAN BOJONGGEDE
                        <br>DESA RAWAPANJANG
                    </h1>
                    <p style="margin-top:-10px; margin-bottom:0px;">Jl. Talang Kp Kelapa RT.02 RW.15 No.02 Kode Pos
                        16920</p>
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
            <h2>Surat Keterangan Domisili</h2>
            <p style="margin-top:-10px;">Nomor: [nomor_surat]</p>
            <br>
        </div>
        <div>
            <p>Yang bertanda tangan di bawah ini:</p>
            <table class="content">
                <tr>
                    <td>NIK / No KTP</td>
                    <td style="padding-left: 10px;">: </td>
                    <td>{{ $proses_surat['nik'] }}</td>
                </tr>
                <tr>
                    <td>No HP</td>
                    <td style="padding-left: 10px;">: </td>
                    <td>{{ $proses_surat['no_hp'] }}</td>
                </tr>
                <tr>
                    <td>Nama Lengkap</td>
                    <td style="padding-left: 10px;">: </td>
                    <td>{{ $proses_surat['nama_lengkap'] }}</td>
                </tr>
                <tr>
                    <td>Tempat/Tanggal Lahir</td>
                    <td style="padding-left: 10px;">: </td>
                    <td>{{ $proses_surat['tempat_lahir'] }}, {{ $proses_surat['tanggal_lahir'] }}</td>
                </tr>
            </table>
            <p>Orang tersebut di atas adalah benar-benar warga kami yang bertempat tinggal di {{
                $proses_surat['alamat'] }} RT {{ $proses_surat['rt'] }} RW {{ $proses_surat['rw'] }} Desa
                Rawapanjang, Kecamatan Bojonggede, Kabupaten Bogor.</p>
            <p>Surat Keterangan ini dibuat untuk keperluan: {{ $proses_surat['keperluan'] }}</p>
            <p>Demikian surat keterangan ini dibuat dengan sebenarnya.</p>
        </div>

        <div class="footer">
            <br><br>
            <p>Rawapanjang, {{$surat->updated_at ?? ""}}</p>
            <br><br><br>
            <p>____________________</p>
        </div>
    </div>
</body>

</html>