<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Keterangan KTP Dalam Proses</title>
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
                <td width="25%">
                    <img src="{{asset('assets/logo.png')}}" height="116px" width="116px" alt="Logo Desa" />
                </td>
                <td width="100%">
                    <h1>PEMERINTAH KABUPATEN BOGOR
                        <br>KECAMATAN BOJONGGEDE
                        <br>DESA RAWAPANJANG
                    </h1>
                    <p style="margin-top:-10px; margin-bottom:0px;">Jl. Talang Kp Kelapa RT.02 RW.15 No.02 Kode Pos 16920</p>
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
            <h2>Surat Keterangan KTP Dalam Proses</h2>
            <p style="margin-top:-10px;">Nomor: [nomor_surat]</p>
            <br>
        </div>
        <div>
            <p>Yang bertanda tangan di bawah ini Kepala Desa Rawapanjang, Kecamatan Bojonggede, Kabupaten Bogor, Provinsi Jawa Barat menerangkan dengan sebenarnya bahwa :</p>
            <table class="content">
                <tr>
                    <td>Nama Lengkap</td>
                    <td style="padding-left: 10px;">: </td>
                    <td>{{ $proses_surat[0]->nama_lengkap }}</td>
                </tr>
                <tr>
                    <td>Tempat/Tanggal Lahir</td>
                    <td style="padding-left: 10px;">: </td>
                    <td>{{ $proses_surat[0]->tempat_lahir }}, {{ $proses_surat[0]->tanggal_lahir }}</td>
                </tr>
                <tr>
                    <td>Alamat Tempat Tinggal</td>
                    <td style="padding-left: 10px;">: </td>
                    <td>{{ $proses_surat[0]->alamat }} RT {{ $proses_surat[0]->rt }} RW {{ $proses_surat[0]->rw }} Desa Rawapanjang, Kecamatan Bojonggede, Kabupaten Bogor</td>
                </tr>
            </table>
            <p>Orang tersebut adalah benar-benar warga Desa Rawapanjang yang saat ini Kartu Tanda Penduduk sedang dalam proses. </p>
            <p>Demikian surat keterangan ini dibuat dengan sesungguhnya untuk dipergunakan sebagaimana mestinya.</p>
        </div>

        <div class="footer">
            <br><br>
            <p>Rawapanjang, [tanggal]</p>
            <br><br><br>
            <p>____________________</p>
        </div>
    </div>
</body>

</html>