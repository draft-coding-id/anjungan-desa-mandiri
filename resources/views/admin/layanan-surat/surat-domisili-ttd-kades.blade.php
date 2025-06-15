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

        svg {
            width: 100px !important;
            height: 100px !important;
            display: block;
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

        .page-break {
            page-break-after: always;
        }
    </style>
</head>

<body>
    <div class="heading">
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
            <h2>Surat Keterangan Domisili</h2>
            <p style="margin-top:-10px;">Nomor: {{$surat->no_surat}}</p>
            <br>
        </div>
        <div>
            <p>Yang bertanda tangan di bawah ini:</p>
            <table class="content">
                <tr>
                    <td>NIK / No KTP</td>
                    <td style="padding-left: 10px;">: </td>
                    <td>{{ $surat->isi_surat['nik'] }}</td>
                </tr>
                <tr>
                    <td>Nama Lengkap</td>
                    <td style="padding-left: 10px;">: </td>
                    <td>{{ $surat->isi_surat['nama_lengkap'] }}</td>
                </tr>
                <tr>
                    <td>Tempat/Tanggal Lahir</td>
                    <td style="padding-left: 10px;">: </td>
                    <td>{{ $surat->isi_surat['tempat_lahir'] }}, {{ $surat->isi_surat['tanggal_lahir'] }}</td>
                </tr>

            </table>

            <p>Orang tersebut di atas adalah benar-benar warga kami yang bertempat tinggal di {{
                $surat->isi_surat['alamat'] }} RT {{ $surat->isi_surat['rt'] }} RW {{ $surat->isi_surat['rw'] }} Desa
                Rawapanjang, Kecamatan Bojonggede, Kabupaten Bogor.</p>
            <p>Surat Keterangan ini dibuat untuk keperluan: {{ $surat->isi_surat['keperluan'] }}</p>
            <p>Demikian surat keterangan ini dibuat dengan sebenarnya.</p>
        </div>

        <div class="footer">
            <p>Rawapanjang, {{$surat->updated_at->translatedFormat('d F Y') ?? ""}}</p>
            <img src="data:image/png;base64,{{ base64_encode($qrCode) }}" alt="QR Code height=" 116px" width="116px" alt="TTD Kades"">
            <p style="align-items: flex-start">Pejabat Desa</p>
        </div>
    </div>
    <div class="page-break"></div>
</body>

</html>