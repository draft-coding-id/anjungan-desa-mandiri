@extends('layout.warga.preview-surat')

@section('title', 'Surat Keterangan Domisili')

@section('surat-title')
Surat Keterangan Domisili
@endsection

@section('surat-content')
<p>Yang bertanda tangan di bawah ini Kepala Desa Rawapanjang Kecamatan Rawapanjang Kabupaten Bogor Provinsi Jawa Barat menerangkan dengan sebenarnya bahwa : </p>
<table>
    <tr>
        <td>Nama Lengkap</td>
        <td>:</td>
        <td>{{ $proses_surat['nama_lengkap'] }}</td>
    </tr>
    <tr>
        <td>Tempat/Tanggal Lahir</td>
        <td>:</td>
        <td>{{ $proses_surat['tempat_lahir'] }}, {{ $proses_surat['tanggal_lahir'] }}</td>
    </tr>
    <tr>
        <td>Jenis Kelamin</td>
        <td>:</td>
        <td>{{ $proses_surat['jenis_kelamin'] }}</td>
    </tr>
    <tr>
        <td>Alamat</td>
        <td>:</td>
        <td>{{ $proses_surat['alamat'] }}</td>
    </tr>
    <tr>
        <td>Agama</td>
        <td>:</td>
        <td>{{ $proses_surat['agama'] }}</td>
    </tr>
    <tr>
        <td>Status</td>
        <td>:</td>
        <td>{{ $proses_surat['status_kawin'] }}</td>
    </tr>
    <tr>
        <td>Pekerjaan</td>
        <td>:</td>
        <td>{{ $proses_surat['pekerjaan'] }}</td>
    </tr>
    <tr>
        <td>Kewarganegaraan</td>
        <td>:</td>
        <td>{{ $proses_surat['kewarganegaraan'] }}</td>
    </tr>
</table>
<p>
    Orang tersebut di atas adalah benar-benar warga Desa Rawapanjang yang saat ini
    Kartu Tanda Penduduk sedang dalam proses.
    <br>
    Demikian surat keterangan ini dibuat dengan sesungguhnya untuk dipergunakan
    sebagaimana mestinya.
</p>
<div class="footer">
    <div class="photo">
        Pas Foto 3x4
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