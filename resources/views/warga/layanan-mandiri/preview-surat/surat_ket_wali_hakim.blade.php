@extends('layout.warga.preview-surat')

@section('title', 'Surat Keterangan Kematian')

@section('surat-title')
Surat Keterangan Kematian
@endsection

@section('surat-content')
<p>Yang bertanda tangan di bawah ini Kepala Desa Rawapanjang, Kecamatan Bojonggede, Kabupaten Bogor, Provinsi Jawa Barat menerangkan dengan sebenarnya bahwa:</p>

<table class="content">
    <tr>
        <td>1. Nama Lengkap</td>
        <td>: </td>
        <td>{{ $proses_surat['nama_lengkap'] }}</td>
    </tr>
    <tr>
        <td>2. NIK / No KTP</td>
        <td>: </td>
        <td>{{ $proses_surat['nik']}}</td>
    </tr>
    <tr>
        <td>3. No HP</td>
        <td>: </td>
        <td>{{ $proses_surat['no_hp']}}</td>
    </tr>
    <tr>
        <td>4. Tempat/Tanggal Lahir</td>
        <td>: </td>
        <td>{{ $proses_surat['tempat_lahir'] }}, {{ $proses_surat['tanggal_lahir'] }}</td>
    </tr>
    <tr>
        <td>5. Tempat Tinggal</td>
        <td>: </td>
        <td>{{ $proses_surat['alamat'] }}</td>
    </tr>
    <tr>
        <td>6. Agama</td>
        <td>: </td>
        <td>{{ $proses_surat['agama'] }}</td>
    </tr>
    <tr>
        <td>. Jenis Kelamin</td>
        <td>: </td>
        <td>{{ $proses_surat['jenis_kelamin'] }}</td>
    </tr>
    <tr>
        <td>8. Pekerjaan</td>
        <td>: </td>
        <td>{{ $proses_surat['pekerjaan'] }}</td>
    </tr>
    <tr>
        <td>9. Warga Negara</td>
        <td>: </td>
        <td>{{ $proses_surat['kewarganegaraan'] }}</td>
    </tr>
</table>
<p>Yang namanya tersebut diatas memang benar warga kami yang akan menikah di KUA {{ $proses_surat['kecamatan'] }} Kabupaten
    Bogor. Berhubung orang tersebut tidak memiliki wali nasab, kami mohon dengan hormat Bapak
    Kepala KUA {{ $proses_surat['kecamatan'] }} supaya berkenan menjadi wali </p>
<p>Demikian surat keterangan ini dibuat dengan sebenarnya untuk dapat dipergunakan sebagaimana mestinya</p>
<div style="text-align: right;">
    <p>Rawapanjang, {{ Carbon\Carbon::now()->translatedFormat('d F Y') }}</p>
    <p>Pejabat Desa</p>
    <div class="signature">
        <br><br>
        <p>____________________</p>
    </div>
</div>
@endsection