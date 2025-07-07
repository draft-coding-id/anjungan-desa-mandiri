@extends('layout.warga.preview-surat')

@section('title', 'Surat Keterangan Menikah')

@section('surat-title')
    Surat Keterangan Menikah
@endsection

@section('surat-content')
    <p>Yang bertanda tangan di bawah ini Kepala Desa {{ $proses_surat['desa'] }}, Kecamatan
        {{ $proses_surat['kecamatan'] }}, Kabupaten Bogor, Provinsi Jawa Barat
        menerangkan dengan sebenarnya bahwa:</p>

    <table class="content">
        <!-- DATA PRIBADI -->
        <tr>
            <td>1. Nama Lengkap</td>
            <td>:</td>
            <td>{{ $proses_surat['nama_lengkap'] }}</td>
        </tr>
        <tr>
            <td>2. NIK / No. KTP</td>
            <td>:</td>
            <td>{{ $proses_surat['nik'] }}</td>
        </tr>
        <tr>
            <td>3. Tempat / Tanggal Lahir</td>
            <td>:</td>
            <td>{{ $proses_surat['tempat_lahir'] }},
                {{ \Carbon\Carbon::parse($proses_surat['tanggal_lahir'])->format('d-m-Y') }}</td>
        </tr>
        <tr>
            <td>4. Jenis Kelamin</td>
            <td>:</td>
            <td>{{ $proses_surat['jenis_kelamin'] }}</td>
        </tr>
        <tr>
            <td>5. Agama</td>
            <td>:</td>
            <td>{{ $proses_surat['agama'] }}</td>
        </tr>
        <tr>
            <td>6. Status</td>
            <td>:</td>
            <td>{{ $proses_surat['status_kawin'] }}</td>
        </tr>
        <tr>
            <td>7. Pekerjaan</td>
            <td>:</td>
            <td>{{ $proses_surat['pekerjaan'] }}</td>
        </tr>
        <tr>
            <td>8. Alamat/Tempat Tinggal</td>
            <td>:</td>
            <td>{{ $proses_surat['alamat'] }}, Desa {{ $proses_surat['desa'] }}, Kecamatan
                {{ $proses_surat['kecamatan'] }}, Kabupaten Bogor</td>
        </tr>
    </table>

    <p>Nama tersebut diatas adalah benar warga kami Desa {{ $proses_surat['desa'] }}, Kecamatan
        {{ $proses_surat['kecamatan'] }}, Kabupaten Bogor, dan sepanjang sepengetahuan kami bahwa yang bersangkutan memang
        benar <strong>Telah Menikah</strong> dengan:</p>

    <table class="content">
        <!-- DATA PASANGAN -->
        <tr>
            <td>1. Nama Lengkap</td>
            <td>:</td>
            <td>{{ $proses_surat['nama_lengkap_pasangan'] }}</td>
        </tr>
        <tr>
            <td>2. NIK / No. KTP</td>
            <td>:</td>
            <td>{{ $proses_surat['nik_pasangan'] }}</td>
        </tr>
        <tr>
            <td>3. Tempat / Tanggal Lahir</td>
            <td>:</td>
            <td>{{ $proses_surat['tempat_lahir_pasangan'] }},
                {{ \Carbon\Carbon::parse($proses_surat['tanggal_lahir_pasangan'])->format('d-m-Y') }}</td>
        </tr>
        <tr>
            <td>4. Agama</td>
            <td>:</td>
            <td>{{ $proses_surat['agama_pasangan'] }}</td>
        </tr>
        <tr>
            <td>5. Pekerjaan</td>
            <td>:</td>
            <td>{{ $proses_surat['pekerjaan_pasangan'] }}</td>
        </tr>
        <tr>
            <td>6. Alamat/Tempat Tinggal</td>
            <td>:</td>
            <td>{{ $proses_surat['alamat'] }}</td>
        </tr>
    </table>

    <p>Demikian surat keterangan ini dibuat dengan sebenarnya untuk dapat dipergunakan sebagaimana mestinya.</p>
    <div style="text-align: right;">
        <p>Rawapanjang, {{ Carbon\Carbon::now()->translatedFormat('d F Y') }}</p>
        <p>Pejabat Desa</p>
        <div class="signature">
            <br><br>
            <p>____________________</p>
        </div>
    </div>
@endsection
