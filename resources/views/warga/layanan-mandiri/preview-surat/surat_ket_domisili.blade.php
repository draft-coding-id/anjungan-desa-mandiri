@extends('layout.warga.preview-surat')

@section('title', 'Surat Keterangan Domisili')

@section('surat-title')
Surat Keterangan Domisili
@endsection

@section('surat-content')
<p>Yang bertanda tangan di bawah ini:</p>
<table>
  <tr>
    <td>NIK / No KTP</td>
    <td>:</td>
    <td>{{ $proses_surat['nik'] }}</td>
  </tr>
  <tr>
    <td>No HP</td>
    <td>:</td>
    <td>{{ $proses_surat['no_hp'] }}</td>
  </tr>
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
</table>
<p>Orang tersebut di atas adalah benar-benar warga kami yang bertempat tinggal di {{ $proses_surat['alamat'] }} RT
  {{ $proses_surat['rt'] }} RW {{ $proses_surat['rw'] }} Desa Rawapanjang, Kecamatan Bojonggede, Kabupaten Bogor.</p>
<p>Surat Keterangan ini dibuat untuk keperluan: {{ $proses_surat['keperluan'] }}</p>
<p>Demikian surat keterangan ini dibuat dengan sebenarnya.</p>
<div style="text-align: right;">
  <p>Rawapanjang, {{ Carbon\Carbon::now()->translatedFormat('d F Y') }}</p>
  <p>Pejabat Desa</p>
  <div class="signature">
    <br><br>
    <p>____________________</p>
  </div>
</div>

@endsection