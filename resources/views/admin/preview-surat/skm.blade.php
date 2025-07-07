@extends('layout.admin.preview_surat')

@section('title', 'Surat Keterangan Menikah')

@section('surat-title', 'SURAT KETERANGAN MENIKAH')

@section('content')
    @php
        use Carbon\Carbon;
    @endphp
    <p>Yang bertanda tangan di bawah ini Kepala Desa Rawapanjang, Kecamatan Bojonggede, Kabupaten Bogor, Provinsi Jawa Barat
        menerangkan dengan sebenarnya bahwa:</p>
    <div>
        <table class="data-table">

            <!-- DATA PRIBADI -->
            <tr>
                <td>1. Nama Lengkap</td>
                <td>:</td>
                <td>{{ $surat->isi_surat['nama_lengkap'] }}</td>
            </tr>
            <tr>
                <td>2. NIK / No. KTP</td>
                <td>:</td>
                <td>{{ $surat->isi_surat['nik'] }}</td>
            </tr>
            <tr>
                <td>3. Tempat / Tanggal Lahir</td>
                <td>:</td>
                <td>{{ $surat->isi_surat['tempat_lahir'] }},
                    {{ \Carbon\Carbon::parse($surat->isi_surat['tanggal_lahir'])->format('d-m-Y') }}</td>
            </tr>
            <tr>
                <td>4. Jenis Kelamin</td>
                <td>:</td>
                <td>{{ $surat->isi_surat['jenis_kelamin'] }}</td>
            </tr>
            <tr>
                <td>5. Agama</td>
                <td>:</td>
                <td>{{ $surat->isi_surat['agama'] }}</td>
            </tr>
            <tr>
                <td>6. Status</td>
                <td>:</td>
                <td>{{ $surat->isi_surat['status_kawin'] }}</td>
            </tr>
            <tr>
                <td>7. Pekerjaan</td>
                <td>:</td>
                <td>{{ $surat->isi_surat['pekerjaan'] }}</td>
            </tr>
            <tr>
                <td>8. Alamat/Tempat Tinggal</td>
                <td>:</td>
                <td>{{ $surat->isi_surat['alamat'] }}, Desa {{ $surat->isi_surat['desa'] }}, Kecamatan
                    {{ $surat->isi_surat['kecamatan'] }}, Kabupaten Bogor</td>
            </tr>
        </table>

        <p>Nama tersebut diatas adalah benar warga kami Desa {{ $surat->isi_surat['desa'] }}, Kecamatan
            {{ $surat->isi_surat['kecamatan'] }}, Kabupaten Bogor, dan sepanjang sepengetahuan kami bahwa yang bersangktan
            memang
            benar <strong>Telah Menikah</strong> dengan:</p>

        <table class="data-table">
            <!-- DATA PASANGAN -->
            <tr>
                <td>1. Nama Lengkap</td>
                <td>:</td>
                <td>{{ $surat->isi_surat['nama_lengkap_pasangan'] }}</td>
            </tr>
            <tr>
                <td>2. NIK / No. KTP</td>
                <td>:</td>
                <td>{{ $surat->isi_surat['nik_pasangan'] }}</td>
            </tr>
            <tr>
                <td>3. Tempat / Tanggal Lahir</td>
                <td>:</td>
                <td>{{ $surat->isi_surat['tempat_lahir_pasangan'] }},
                    {{ \Carbon\Carbon::parse($surat->isi_surat['tanggal_lahir_pasangan'])->format('d-m-Y') }}</td>
            </tr>
            <tr>
                <td>4. Agama</td>
                <td>:</td>
                <td>{{ $surat->isi_surat['agama_pasangan'] }}</td>
            </tr>
            <tr>
                <td>5. Pekerjaan</td>
                <td>:</td>
                <td>{{ $surat->isi_surat['pekerjaan_pasangan'] }}</td>
            </tr>
            <tr>
                <td>6. Alamat/Tempat Tinggal</td>
                <td>:</td>
                <td>{{ $surat->isi_surat['alamat_pasangan'] }}</td>
            </tr>
        </table>

        <p>Demikian surat keterangan ini dibuat dengan sebenarnya untuk dapat dipergunakan sebagaimana mestinya.</p>
    @endsection

    @section('footer')
        <div class="just-signature-right">
            <p>Rawapanjang, {{ \Carbon\Carbon::parse($surat->updated_at)->translatedFormat('d F Y') }}</p>
            <p>Kepala Desa Rawapanjang</p>
            <br><br><br>
            <p>____________________</p>
        </div>
    @endsection
