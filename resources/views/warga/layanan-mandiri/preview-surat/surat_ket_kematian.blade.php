<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Keterangan Kematian</title>
    <style>
        body {
            background: #ffffff;
            font-family: 'Times New Roman';
            margin: 0;
            padding: 20px;
        }

        h1 {
            font-size: 24px;
            font-weight: normal;
        }

        h2 {
            font-size: 20px;
            font-weight: normal;
            text-decoration: underline;
        }

        p {
            line-height: 1.5;
            margin: 10px 0;
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
            margin-top: 40px;
        }

        .data-table {
            width: 100%;
            margin: 20px 0;
        }

        .data-table td {
            padding: 3px 0;
            vertical-align: top;
        }

        .data-table td:first-child {
            width: 200px;
        }

        .data-table td:nth-child(2) {
            width: 20px;
            text-align: center;
        }

        .section-title {
            font-weight: bold;
            margin: 20px 0 10px 0;
        }

        .indent {
            padding-left: 80px;
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
                    <p style="margin-top:-10px; margin-bottom:0px;">Jl. Talang Kp Kelapa RT.02 RW.15 No.02 Kode Pos 16920</p>
                </td>
            </tr>
            <tr>
                <td colspan='2'>
                    <hr style="border: 2px solid black;">
                </td>
            </tr>
        </table>
    </div>

    <div class="content">
        <div class="header">
            <h2>SURAT KETERANGAN KEMATIAN</h2>
            <p style="margin-top:-10px;">Nomor: [nomor_surat]</p>
            <br>
        </div>

        <div>
            <p>Yang bertanda tangan di bawah ini Kepala Desa Rawapanjang, Kecamatan Bojonggede, Kabupaten Bogor, Provinsi Jawa Barat menerangkan dengan sebenarnya bahwa:</p>
            <table>
                <tr>
                    <td class="section-title">1. Nama Lengkap</td>
                    <td class="indent">: {{ $proses_surat['almarhum_nama'] ?? '[frm_nama]' }}</td>
                </tr>
                <tr>
                    <td class="section-title">2. NIK / No. KTP</td>
                    <td class="indent">: {{ $proses_surat['almarhum_nik'] ?? '[frm_no_ktp]' }}</td>
                </tr>
                <tr>
                    <td class="section-title">3. Tempat / Tanggal Lahir</td>
                    <td class="indent">: {{ $proses_surat['almarhum_tempat_lahir'] ?? '[ttl]' }}@if(isset($proses_surat['almarhum_tanggal_lahir'])), {{ date('d-m-Y', strtotime($proses_surat['almarhum_tanggal_lahir'])) }}@endif</td>
                </tr>
                <tr>
                    <td class="section-title">4. Jenis Kelamin</td>
                    <td class="indent">: {{ $proses_surat['almarhum_jenis_kelamin'] ?? '[frm_sex]' }}</td>
                </tr>
                <tr>
                    <td class="section-title">5. Agama</td>
                    <td class="indent">: {{ $proses_surat['almarhum_agama'] ?? '[frm_agama]' }}</td>
                </tr>
                <tr>
                    <td class="section-title">6. Pekerjaan</td>
                    <td class="indent">: {{ $proses_surat['almarhum_pekerjaan'] ?? '[frm_pekerjaan]' }}</td>
                </tr>
                <tr>
                    <td class="section-title">7. Kewarganegaraan</td>
                    <td class="indent">: {{ $proses_surat['almarhum_kewarganegaraan'] ?? '[warga_negara]' }}</td>
                </tr>
                <tr>
                    <td class="section-title" width="200px">8. Alamat/Tempat Tinggal</td>
                    <td class="indent">: {{ $proses_surat['almarhum_alamat'] ?? '[frm_alamat]' }}</td>
                </tr>
                <tr>
                    <td colspan="2">
                        <br>
                        Yang telah meninggal dunia pada tanggal {{ isset($proses_surat['tanggal_meninggal']) ? date('d-m-Y', strtotime($proses_surat['tanggal_meninggal'])) : '[tgl_meninggal]' }}@if(isset($proses_surat['waktu_meninggal'])) pukul {{ $proses_surat['waktu_meninggal'] }}@endif di {{ $proses_surat['tempat_meninggal'] ?? '[tempat_meninggal]' }}@if(isset($proses_surat['sebab_kematian']) && $proses_surat['sebab_kematian']) dengan sebab kematian: {{ $proses_surat['sebab_kematian'] }}@endif.
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <br>
                        Yang bersangkutan adalah {{ strtolower($proses_surat['hubungan_keluarga'] ?? 'keluarga') }} dari:
                    </td>
                </tr>
                <tr>
                    <td class="section-title">1. Nama Lengkap</td>
                    <td class="indent">: {{ $proses_surat['nama_lengkap'] ?? '[nama]' }}</td>
                </tr>
                <tr>
                    <td class="section-title">2. NIK / No. KTP</td>
                    <td class="indent">: {{ $proses_surat['nik'] ?? '[nik]' }}</td>
                </tr>
                <tr>
                    <td class="section-title">3. Tempat / Tanggal Lahir</td>
                    <td class="indent">: {{ $proses_surat['tempat_lahir'] ?? '[ttl]' }}@if(isset($proses_surat['tempat_lahir'])), {{ date('d-m-Y', strtotime($proses_surat['tanggal_lahir'])) }}@endif</td>
                </tr>
                <tr>
                    <td class="section-title">4. Jenis Kelamin</td>
                    <td class="indent">: {{ $proses_surat['jenis_kelamin'] ?? '[sex]' }}</td>
                </tr>
                <tr>
                    <td class="section-title">5. Agama</td>
                    <td class="indent">: {{ $proses_surat['agama'] ?? '[agama]' }}</td>
                </tr>
                <tr>
                    <td class="section-title">6. Pekerjaan</td>
                    <td class="indent">: {{ $proses_surat['pekerjaan'] ?? '[pekerjaan]' }}</td>
                </tr>
                <tr>
                    <td class="section-title">7. Kewarganegaraan</td>
                    <td class="indent">: {{ $proses_surat['kewarganegaraan'] ?? '[kewarganegaraan]' }}</td>
                </tr>
                <tr>
                    <td class="section-title">8. Alamat/Tempat Tinggal</td>
                    <td class="indent">: {{ $proses_surat['alamat'] ?? '[alamat]' }} </td>
                </tr>
                @if(isset($proses_surat['keperluan']))
                <tr>
                    <td class="section-title">Keperluan</td>
                    <td class="indent">: {{ $proses_surat['keperluan'] }}@if(isset($proses_surat['keterangan_keperluan']) && $proses_surat['keterangan_keperluan']) - {{ $proses_surat['keterangan_keperluan'] }}@endif</td>
                </tr>
                @endif
            </table>
            <p>Demikian surat keterangan ini dibuat dengan sebenarnya, untuk dipergunakan sebagaimana mestinya.</p>
            @if(isset($proses_surat['keperluan']))
            <p><strong>Keperluan:</strong> {{ $proses_surat['keperluan'] }}@if(isset($proses_surat['keterangan_keperluan']) && $proses_surat['keterangan_keperluan']) - {{ $proses_surat['keterangan_keperluan'] }}@endif</p>
            @endif
        </div>

        <div class="footer">
            <p>Rawapanjang, {{ isset($surat->updated_at) ? date('d F Y', strtotime($surat->updated_at)) : date('d F Y') }}</p>
            <p>Kepala Desa Rawapanjang</p>
            <br><br><br>
            <p>____________________</p>
            <p>[Nama Kepala Desa]</p>
        </div>
    </div>
</body>

</html>