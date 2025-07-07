@extends('layout.warga.preview-surat')

@section('title', 'Surat Keterangan Pengantar')

@section('surat-title')
Surat Keterangan Pengantar
@endsection

@section('surat-content')
<p>Yang bertanda tangan di bawah ini Kepala Desa Rawapanjang, Kecamatan Bojonggede, Kabupaten Bogor, Provinsi Jawa Barat menerangkan dengan sebenarnya bahwa:</p>

<table class="content">
    <tr>
        <td>1. NIK / No KTP</td>
        <td>:</td>
        <td>{{ $proses_surat['nik'] }}</td>
    </tr>
    <tr>
        <td>2. Nomor HP</td>
        <td>:</td>
        <td>{{ $proses_surat['no_hp'] }}</td>
    </tr>
    <tr>
        <td>3. Nama Lengkap</td>
        <td>:</td>
        <td>{{ $proses_surat['nama_lengkap'] }}</td>
    </tr>
    <tr>
        <td>4. Tempat/Tanggal Lahir</td>
        <td>:</td>
        <td>{{ $proses_surat['tempat_lahir'] }}, {{ $proses_surat['tanggal_lahir'] }}</td>
    </tr>
    <tr>
        <td>5. Warga Negara</td>
        <td>:</td>
        <td>{{ $proses_surat['kewarganegaraan'] }}</td>
    </tr>
    <tr>
        <td>6. Agama</td>
        <td>:</td>
        <td>{{ $proses_surat['agama'] }}</td>
    </tr>
    <tr>
        <td>7. Jenis Kelamin</td>
        <td>:</td>
        <td>{{ $proses_surat['jenis_kelamin'] }}</td>
    </tr>
    <tr>
        <td>8. Pekerjaan</td>
        <td>:</td>
        <td>{{ $proses_surat['pekerjaan'] }}</td>
    </tr>
    <tr>
        <td>9. Tempat Tinggal</td>
        <td>:</td>
        <td>{{ $proses_surat['alamat'] }} RT {{ $proses_surat['rt'] }} RW {{ $proses_surat['rw'] }} Desa {{ $proses_surat['desa'] }}, Kecamatan {{ $proses_surat['kecamatan'] }}, Kabupaten Bogor</td>
    </tr>
    <tr>
        <td>10. Surat bukti diri KTP</td>
        <td>:</td>
        <td>{{ $proses_surat['nik'] }}</td>
    </tr>
    <tr>
        <td>11. Keperluan</td>
        <td>:</td>
        <td>{{ $proses_surat['keperluan'] }}</td>
    </tr>
</table>

<p>Demikian surat keterangan ini dibuat, untuk dipergunakan sebagaimana mestinya.</p>

<div class="footer">
    <div>
        <p>Pemegang Surat</p>
        <div class="signature">
            <br><br>
            <p>____________________</p>
        </div>
        <p>{{ $proses_surat['nama_lengkap'] }}</p>
    </div>

    <div>
        <p>Rawapanjang, {{ Carbon\Carbon::now()->translatedFormat('d F Y') }}</p>
        <p>Pejabat Desa</p>
        <div class="signature">
            <br><br>
            <p>____________________</p>
        </div>
    </div>
</div>
@endsection