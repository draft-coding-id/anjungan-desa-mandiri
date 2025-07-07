@extends('layout.warga.preview-surat')

@section('title', 'Surat Keterangan Tidak Mampu')

@section('surat-title')
Surat Keterangan Tidak Mampu
@endsection

@section('surat-content')
<p>Yang bertanda tangan di bawah ini Kepala Desa Rawapanjang, Kecamatan Bojonggede, Kabupaten Bogor, Provinsi Jawa Barat menerangkan dengan sebenarnya bahwa:</p>
<table class="content">
    <tr>
        <td>1. Nama Lengkap</td>
        <td>:</td>
        <td>{{ $proses_surat['nama_lengkap'] }}</td>
    </tr>
    <tr>
        <td>2. NIK / No KTP</td>
        <td>:</td>
        <td>{{ $proses_surat['nik'] }}</td>
    </tr>
    <tr>
        <td>3. Tempat/Tanggal Lahir</td>
        <td>:</td>
        <td>{{ $proses_surat['tempat_lahir'] }}, {{ $proses_surat['tanggal_lahir'] }}</td>
    </tr>
    <tr>
        <td>4. Jenis Kelamin</td>
        <td>:</td>
        <td>{{ $proses_surat['jenis_kelamin'] }}</td>
    </tr>
    <tr>
        <td>5. Kewarganegaraan</td>
        <td>:</td>
        <td>{{ $proses_surat['kewarganegaraan'] }}</td>
    </tr>
    <tr>
        <td>6. Agama</td>
        <td>:</td>
        <td>{{ $proses_surat['agama'] }}</td>
    </tr>
    <tr>
        <td>7. Pekerjaan</td>
        <td>:</td>
        <td>{{ $proses_surat['pekerjaan'] }}</td>
    </tr>

    <tr>
        <td>8. Tempat Tinggal</td>
        <td>:</td>
        <td>{{ $proses_surat['alamat'] }} RT {{ $proses_surat['rt'] }} RW {{ $proses_surat['rw'] }} Desa {{ $proses_surat['desa'] }}, Kecamatan Rawapanjang, Kabupaten Bogor</td>
    </tr>
</table>
<p>
    Bahwa yang tersebut namanya diatas, sepanjang pengetahuan dan penelitian kami hingga saat dikeluarkannya surat keterangan ini memang benar Keluarga yang TIDAK MAMPU dan tidak memiliki penghasilan tetap.
</p>
<p>
    Surat keterangan ini dibuat untuk keperluan {{ $proses_surat['keperluan'] }}
</p>
<p>Demikian surat keterangan ini dibuat dengan sesungguhnya untuk dipergunakan sebagaimana mestinya.</p>
<div style="text-align: right;">
    <p>Rawapanjang, {{ Carbon\Carbon::now()->translatedFormat('d F Y') }}</p>
    <p>Pejabat Desa</p>
    <div class="signature">
        <br><br>
        <p>____________________</p>
    </div>
</div>

@endsection