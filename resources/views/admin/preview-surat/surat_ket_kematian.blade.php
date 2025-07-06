@extends('layout.admin.preview_surat')

@section('title', 'Surat Keterangan Kematian')

@section('surat-title', 'SURAT KETERANGAN KEMATIAN')

@section('content')
<div>
    <p>Yang bertanda tangan di bawah ini Kepala Desa Rawapanjang, Kecamatan Bojonggede, Kabupaten Bogor, Provinsi Jawa Barat menerangkan dengan sebenarnya bahwa:</p>

    <div class="section-title">Data Almarhum/Almarhumah:</div>
    <table class="data-table">
        <tr>
            <td>1. Nama Lengkap</td>
            <td>:</td>
            <td>{{ $surat->isi_surat['almarhum_nama'] ?? '[Nama Almarhum]' }}</td>
        </tr>
        <tr>
            <td>2. NIK / No. KTP</td>
            <td>:</td>
            <td>{{ $surat->isi_surat['almarhum_nik'] ?? '[NIK Almarhum]' }}</td>
        </tr>
        <tr>
            <td>3. Tempat / Tanggal Lahir</td>
            <td>:</td>
            <td>{{ $surat->isi_surat['almarhum_tempat_lahir'] ?? '[Tempat Lahir]' }}@if(isset($surat->isi_surat['almarhum_tanggal_lahir'])), {{ date('d-m-Y', strtotime($surat->isi_surat['almarhum_tanggal_lahir'])) }}@endif</td>
        </tr>
        <tr>
            <td>4. Jenis Kelamin</td>
            <td>:</td>
            <td>{{ $surat->isi_surat['almarhum_jenis_kelamin'] ?? '[Jenis Kelamin]' }}</td>
        </tr>
        <tr>
            <td>5. Agama</td>
            <td>:</td>
            <td>{{ $surat->isi_surat['almarhum_agama'] ?? '[Agama]' }}</td>
        </tr>
        <tr>
            <td>6. Pekerjaan</td>
            <td>:</td>
            <td>{{ $surat->isi_surat['almarhum_pekerjaan'] ?? '[Pekerjaan]' }}</td>
        </tr>
        <tr>
            <td>7. Kewarganegaraan</td>
            <td>:</td>
            <td>{{ $surat->isi_surat['almarhum_kewarganegaraan'] ?? '[Kewarganegaraan]' }}</td>
        </tr>
        <tr>
            <td>8. Alamat/Tempat Tinggal</td>
            <td>:</td>
            <td>{{ $surat->isi_surat['almarhum_alamat'] ?? '[Alamat]' }}</td>
        </tr>
    </table>

    <p>Yang telah meninggal dunia pada tanggal {{ isset($surat->isi_surat['tanggal_meninggal']) ? date('d-m-Y', strtotime($surat->isi_surat['tanggal_meninggal'])) : '[Tanggal Meninggal]' }} di {{ $surat->isi_surat['tempat_meninggal'] ?? '[Tempat Meninggal]' }}@if(isset($surat->isi_surat['sebab_kematian']) && $surat->isi_surat['sebab_kematian']) dengan sebab kematian: {{ $surat->isi_surat['sebab_kematian'] }}@endif.</p>

    <p>Yang bersangkutan adalah {{ strtolower($surat->isi_surat['hubungan_keluarga'] ?? 'keluarga') }} dari:</p>

    <div class="section-title">Data Pemohon:</div>
    <table class="data-table">
        <tr>
            <td>1. Nama Lengkap</td>
            <td>:</td>
            <td>{{ $surat->isi_surat['nama_lengkap'] ?? '[Nama Pemohon]' }}</td>
        </tr>
        <tr>
            <td>2. NIK / No. KTP</td>
            <td>:</td>
            <td>{{ $surat->isi_surat['nik'] ?? '[NIK Pemohon]' }}</td>
        </tr>
        <tr>
            <td>3. Tempat / Tanggal Lahir</td>
            <td>:</td>
            <td>{{ $surat->isi_surat['tempat_lahir'] ?? '[Tempat Lahir]' }}@if(isset($surat->isi_surat['tanggal_lahir'])), {{ date('d-m-Y', strtotime($surat->isi_surat['tanggal_lahir'])) }}@endif</td>
        </tr>
        <tr>
            <td>4. Jenis Kelamin</td>
            <td>:</td>
            <td>{{ $surat->isi_surat['jenis_kelamin'] ?? '[Jenis Kelamin]' }}</td>
        </tr>
        <tr>
            <td>5. Agama</td>
            <td>:</td>
            <td>{{ $surat->isi_surat['agama'] ?? '[Agama]' }}</td>
        </tr>
        <tr>
            <td>6. Pekerjaan</td>
            <td>:</td>
            <td>{{ $surat->isi_surat['pekerjaan'] ?? '[Pekerjaan]' }}</td>
        </tr>
        <tr>
            <td>7. Kewarganegaraan</td>
            <td>:</td>
            <td>{{ $surat->isi_surat['kewarganegaraan'] ?? '[Kewarganegaraan]' }}</td>
        </tr>
        <tr>
            <td>8. Alamat/Tempat Tinggal</td>
            <td>:</td>
            <td>{{ $surat->isi_surat['alamat'] ?? '[Alamat]' }} Desa Rawapanjang, Kecamatan Bojonggede, Kabupaten Bogor</td>
        </tr>
    </table>

    @if(isset($surat->isi_surat['keperluan']))
    <p><strong>Keperluan:</strong> {{ $surat->isi_surat['keperluan'] }}@if(isset($surat->isi_surat['keterangan_keperluan']) && $surat->isi_surat['keterangan_keperluan']) - {{ $surat->isi_surat['keterangan_keperluan'] }}@endif</p>
    @endif

    <p>Demikian surat keterangan ini dibuat dengan sebenarnya, untuk dipergunakan sebagaimana mestinya.</p>
</div>
@endsection

@section('footer')
<div class="just-signature-right">
    <p>Rawapanjang, {{ $surat->updated_at->translatedFormat('d F Y') }}</p>
    <p>Kepala Desa Rawapanjang</p>
    <br><br><br>
    <p>____________________</p>
</div>
@endsection