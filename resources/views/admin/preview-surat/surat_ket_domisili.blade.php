@extends('layout.admin.preview_surat')

@section('title', 'Surat Keterangan Domisili')

@section('surat-title', 'SURAT KETERANGAN DOMISILI')

@section('content')
<div>
    <p>Yang bertanda tangan di bawah ini Kepala Desa Rawapanjang, Kecamatan Bojonggede, Kabupaten Bogor, Provinsi Jawa Barat menerangkan dengan sebenarnya bahwa:</p>

    <table class="data-table">
        <tr>
            <td>NIK / No KTP</td>
            <td>:</td>
            <td>{{ $surat->isi_surat['nik'] ?? '[NIK]' }}</td>
        </tr>
        <tr>
            <td>Nama Lengkap</td>
            <td>:</td>
            <td>{{ $surat->isi_surat['nama_lengkap'] ?? '[Nama Lengkap]' }}</td>
        </tr>
        <tr>
            <td>Tempat/Tanggal Lahir</td>
            <td>:</td>
            <td>{{ $surat->isi_surat['tempat_lahir'] ?? '[Tempat Lahir]' }}, {{ $surat->isi_surat['tanggal_lahir'] ?? '[Tanggal Lahir]' }}</td>
        </tr>
    </table>

    <p>Orang tersebut di atas adalah benar-benar warga kami yang bertempat tinggal di {{ $surat->isi_surat['alamat'] ?? '[Alamat]' }} RT {{ $surat->isi_surat['rt'] ?? '[RT]' }} RW {{ $surat->isi_surat['rw'] ?? '[RW]' }} Desa Rawapanjang, Kecamatan Bojonggede, Kabupaten Bogor.</p>

    <p>Surat Keterangan ini dibuat untuk keperluan: {{ $surat->isi_surat['keperluan'] ?? '[Keperluan]' }}</p>

    <p>Demikian surat keterangan ini dibuat dengan sebenarnya.</p>
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