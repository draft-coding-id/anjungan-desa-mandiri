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

        .footer {
            text-align: right;
        }

        .page-break {
            page-break-after: always;
        }
    </style>
</head>

<body>
    <div class="header">
        <table width="100%">
            <tr>
                <td width="20%">
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
            <h2>SURAT KETERANGAN KEMATIAN</h2>
            <p style="margin-top:-10px;">Nomor: {{$surat->no_surat}}</p>
            <br>
        </div>

        <div>
            <p>Yang bertanda tangan di bawah ini Kepala Desa Rawapanjang, Kecamatan Bojonggede, Kabupaten Bogor,
                Provinsi Jawa Barat menerangkan dengan sebenarnya bahwa :</p>
            <table>
                <tr>
                    <td class="section-title">1. Nama Lengkap</td>
                    <td class="indent">: {{ $surat->isi_surat['almarhum_nama'] ?? '[frm_nama]' }}</td>
                </tr>
                <tr>
                    <td class="section-title">2. NIK / No. KTP</td>
                    <td class="indent">: {{ $surat->isi_surat['almarhum_nik'] ?? '[frm_no_ktp]' }}</td>
                </tr>
                <tr>
                    <td class="section-title">3. Tempat / Tanggal Lahir</td>
                    <td class="indent">: {{ $surat->isi_surat['almarhum_tempat_lahir'] ?? '[ttl]' }}@if(isset($surat->isi_surat['almarhum_tanggal_lahir'])), {{ date('d-m-Y', strtotime($surat->isi_surat['almarhum_tanggal_lahir'])) }}@endif</td>
                </tr>
                <tr>
                    <td class="section-title">4. Jenis Kelamin</td>
                    <td class="indent">: {{ $surat->isi_surat['almarhum_jenis_kelamin'] ?? '[frm_sex]' }}</td>
                </tr>
                <tr>
                    <td class="section-title">5. Agama</td>
                    <td class="indent">: {{ $surat->isi_surat['almarhum_agama'] ?? '[frm_agama]' }}</td>
                </tr>
                <tr>
                    <td class="section-title">6. Pekerjaan</td>
                    <td class="indent">: {{ $surat->isi_surat['almarhum_pekerjaan'] ?? '[frm_pekerjaan]' }}</td>
                </tr>
                <tr>
                    <td class="section-title">7. Kewarganegaraan</td>
                    <td class="indent">: {{ $surat->isi_surat['almarhum_kewarganegaraan'] ?? '[warga_negara]' }}</td>
                </tr>
                <tr>
                    <td class="section-title" width="200px">8. Alamat/Tempat Tinggal</td>
                    <td class="indent">: {{ $surat->isi_surat['almarhum_alamat'] ?? '[frm_alamat]' }}</td>
                </tr>
                <tr>
                    <td colspan="2">
                        <br>
                        Yang telah meninggal dunia pada tanggal {{ isset($surat->isi_surat['tanggal_meninggal']) ? date('d-m-Y', strtotime($surat->isi_surat['tanggal_meninggal'])) : '[tgl_meninggal]' }}@if(isset($surat->isi_surat['waktu_meninggal'])) pukul {{ $surat->isi_surat['waktu_meninggal'] }}@endif di {{ $surat->isi_surat['tempat_meninggal'] ?? '[tempat_meninggal]' }}@if(isset($surat->isi_surat['sebab_kematian']) && $surat->isi_surat['sebab_kematian']) dengan sebab kematian: {{ $surat->isi_surat['sebab_kematian'] }}@endif.
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <br>
                        Yang bersangkutan adalah {{ strtolower($surat->isi_surat['hubungan_keluarga'] ?? 'keluarga') }} dari:
                    </td>
                </tr>
                <tr>
                    <td class="section-title">1. Nama Lengkap</td>
                    <td class="indent">: {{ $surat->isi_surat['nama_lengkap'] ?? '[nama]' }}</td>
                </tr>
                <tr>
                    <td class="section-title">2. NIK / No. KTP</td>
                    <td class="indent">: {{ $surat->isi_surat['nik'] ?? '[nik]' }}</td>
                </tr>
                <tr>
                    <td class="section-title">3. Tempat / Tanggal Lahir</td>
                    <td class="indent">: {{ $surat->isi_surat['tempat_lahir'] ?? '[ttl]' }}@if(isset($surat->isi_surat['tempat_lahir'])), {{ date('d-m-Y', strtotime($surat->isi_surat['tanggal_lahir'])) }}@endif</td>
                </tr>
                <tr>
                    <td class="section-title">4. Jenis Kelamin</td>
                    <td class="indent">: {{ $surat->isi_surat['jenis_kelamin'] ?? '[sex]' }}</td>
                </tr>
                <tr>
                    <td class="section-title">5. Agama</td>
                    <td class="indent">: {{ $surat->isi_surat['agama'] ?? '[agama]' }}</td>
                </tr>
                <tr>
                    <td class="section-title">6. Pekerjaan</td>
                    <td class="indent">: {{ $surat->isi_surat['pekerjaan'] ?? '[pekerjaan]' }}</td>
                </tr>
                <tr>
                    <td class="section-title">7. Kewarganegaraan</td>
                    <td class="indent">: {{ $surat->isi_surat['kewarganegaraan'] ?? '[kewarganegaraan]' }}</td>
                </tr>
                <tr>
                    <td class="section-title">8. Alamat/Tempat Tinggal</td>
                    <td class="indent">: {{ $surat->isi_surat['alamat'] ?? '[alamat]' }} Desa Rawapanjang, Kecamatan Bojonggede, Kabupaten Bogor</td>
                </tr>
                @if(isset($surat->isi_surat['keperluan']))
                <tr>
                    <td class="section-title">Keperluan</td>
                    <td class="indent">: {{ $surat->isi_surat['keperluan'] }}@if(isset($surat->isi_surat['keterangan_keperluan']) && $surat->isi_surat['keterangan_keperluan']) - {{ $surat->isi_surat['keterangan_keperluan'] }}@endif</td>
                </tr>
                @endif
            </table>
            <p>Demikian surat keterangan ini dibuat dengan sebenarnya, untuk dipergunakan sebagaimana mestinya.</p>
            @if(isset($surat->isi_surat['keperluan']))
            <p><strong>Keperluan:</strong> {{ $surat->isi_surat['keperluan'] }}@if(isset($surat->isi_surat['keterangan_keperluan']) && $surat->isi_surat['keterangan_keperluan']) - {{ $surat->isi_surat['keterangan_keperluan'] }}@endif</p>
            @endif
        </div>

        <div class="footer">
            <p>Rawapanjang, {{ isset($surat->updated_at) ? date('d F Y', strtotime($surat->updated_at)) : date('d F Y') }}</p>
            <p>Kepala Desa Rawapanjang</p>
            <img src="data:image/png;base64,{{ base64_encode($qrCode) }}" alt="QR Code height=" 116px" width="116px" alt="TTD Kades"">
            <p style=" align-items: flex-start">Pejabat Desa</p>
        </div>
    </div>
</body>

</html>