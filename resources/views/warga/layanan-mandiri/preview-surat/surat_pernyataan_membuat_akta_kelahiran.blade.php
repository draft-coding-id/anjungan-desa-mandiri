@extends('layout.warga.preview-surat')

@section('title', 'Surat Pernyataan Membuat Akta Kelahiran')

@section('surat-title')
Surat Pernyataan Membuat Akta Kelahiran
@endsection

@section('surat-content')
<p>Yang bertanda tangan di bawah ini:</p>
<table>
    <tr>
        <td>Nama Lengkap</td>
        <td>:</td>
        <td>{{ $proses_surat['nama_lengkap'] }}</td>
    </tr>
    <tr>
        <td>NIK / No KTP</td>
        <td>:</td>
        <td>{{ $proses_surat['nik'] }}</td>
    </tr>
    <tr>
        <td>Tempat/Tanggal Lahir</td>
        <td>:</td>
        <td>{{ $proses_surat['tempat_lahir'] }}, {{ $proses_surat['tanggal_lahir'] }}</td>
    </tr>
    <tr>
        <td>Pekerjaan</td>
        <td>:</td>
        <td>{{ $proses_surat['pekerjaan'] }}</td>
    </tr>
    <tr>
        <td>Agama</td>
        <td>:</td>
        <td>{{ $proses_surat['agama'] }}</td>
    </tr>
    <tr>
        <td>Alamat/Tempat Tinggal</td>
        <td>:</td>
        <td>{{ $proses_surat['alamat'] }}</td>
    </tr>
</table>
<p>Dengan ini menyatakan bahwa saya akan membuat Akta Kelahiran anak saya yang bernama:
    <b>{{ $proses_surat['nama_anak'] }}</b> sebagai ANAK IBU, karena saya tidak mempunyai SURAT NIKAH / AKTA PERKAWINAN
    yang dikeluarkan oleh Kantor Urusan Agama / Catatan Sipil.
</p>
<p>Surat pernyataan ini saya buat untuk melengkapi persyaratan pembuatan AKTA KELAHIRAN.</p>
<p>Demikian surat pernyataan ini saya buat dengan sebenarnya dan apabila ada pernyataan
TIDAK BENAR (PALSU), saya bersedia dituntut sesuai dengan hukum yang berlaku serta
dokumen yang diterbitkan dari permohonan ini menjadi tidak sah.</p>
<div style="text-align: right;">
  <p>Rawapanjang, {{ Carbon\Carbon::now()->translatedFormat('d F Y') }}</p>
  <p>Pejabat Desa</p>
  <div class="signature">
    <br><br>
    <p>____________________</p>
  </div>
</div>

@endsection