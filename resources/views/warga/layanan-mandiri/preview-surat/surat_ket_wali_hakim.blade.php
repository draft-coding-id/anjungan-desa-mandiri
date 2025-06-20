<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Keterangan Wali Hakim</title>
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
            <h2>Surat Keterangan Wali Hakim</h2>
            <p style="margin-top:-10px;">Nomor: [nomor_surat]</p>
            <br>
        </div>
        <div>
            <p>Yang bertanda tangan di bawah ini Kepala Desa .... , Kecamatan ... Kabupaten Bogor , Provinsi Jawa Barat
                menerangkan dengan sebenarnya bahwa</p>
            <table class="content">
                <tr>
                    <td>1.</td>
                    <td>Nama Lengkap</td>
                    <td style="padding-left: 10px;">: </td>
                    <td>{{ $proses_surat['nama_lengkap'] }}</td>
                </tr>
                <tr>
                    <td>2.</td>
                    <td>NIK / No KTP</td>
                    <td style="padding-left: 10px;">: </td>
                    <td>{{ $proses_surat['nik']}}</td>
                </tr>
                <tr>
                    <td>3.</td>
                    <td>No HP</td>
                    <td style="padding-left: 10px;">: </td>
                    <td>{{ $proses_surat['no_hp']}}</td>
                </tr>
                <tr>
                    <td>4.</td>
                    <td>Tempat/Tanggal Lahir</td>
                    <td style="padding-left: 10px;">: </td>
                    <td>{{ $proses_surat['tempat_lahir'] }}, {{ $proses_surat['tanggal_lahir'] }}</td>
                </tr>
                <tr>
                    <td>5.</td>
                    <td>Tempat Tinggal</td>
                    <td style="padding-left: 10px;">: </td>
                    <td>{{ $proses_surat['alamat'] }}</td>
                </tr>
                <tr>
                    <td>6.</td>
                    <td>Agama</td>
                    <td style="padding-left: 10px;">: </td>
                    <td>{{ $proses_surat['agama'] }}</td>
                </tr>
                <tr>
                    <td>7.</td>
                    <td>Jenis Kelamin</td>
                    <td style="padding-left: 10px;">: </td>
                    <td>{{ $proses_surat['jenis_kelamin'] }}</td>
                </tr>
                <tr>
                    <td>8.</td>
                    <td>Pekerjaan</td>
                    <td style="padding-left: 10px;">: </td>
                    <td>{{ $proses_surat['pekerjaan'] }}</td>
                </tr>
                <tr>
                    <td>9.</td>
                    <td>Warga Negara</td>
                    <td style="padding-left: 10px;">: </td>
                    <td>{{ $proses_surat['kewarganegaraan'] }}</td>
                </tr>
            </table>
            <p>Yang namanya tersebut diatas memang benar warga kami yang akan menikah di KUA .Nama Kecatamana. Kabupaten
                [nama kabupaten]. Berhubung orang tersebut tidak memiliki wali nasab, kami mohon dengan hormat Bapak
                Kepala KUA [nama kecamatan] supaya berkenan menjadi wali </p>
            <p>Demikian surat keterangan ini dibuat dengan sebenarnya untuk dapat dipergunakan sebagaimana mestinya</p>
        </div>

        <div class="footer">
            <br><br>
            <p>[nama_desa], [Tanggal Tandan tangan]</p>
            <p>[Pendangatangan]</p>
            <br><br><br>
            <p>____________________</p>
        </div>
    </div>
</body>

</html>