@extends('layout.warga.preview-surat')

@section('title', 'Surat Keterangan Pindah Penduduk')

@section('surat-title')
Surat Keterangan Pindah Penduduk
@endsection

@section('surat-content')
@php
use Carbon\Carbon;
@endphp
<p>Yang bertanda tangan di bawah ini Kepala Desa Rawapanjang, Kecamatan Bojonggede, Kabupaten Bogor, Provinsi Jawa Barat menerangkan permohonan pindah penduduk WNI dengan data sebagai berikut:</p>

<table class="content">
  <tr>
    <td>1. Nama Lengkap</td>
    <td>:</td>
    <td>{{ $proses_surat['nama_lengkap'] }}</td>
  </tr>
  <tr>
    <td>2. NIK</td>
    <td>:</td>
    <td>{{ $proses_surat['nik'] }}</td>
  </tr>
  <tr>
    <td>3. No. KK</td>
    <td>:</td>
    <td>{{ $proses_surat['no_kk'] }}</td>
  </tr>
  <tr>
    <td>4. Nama Kepala Keluarga</td>
    <td>:</td>
    <td>{{ $proses_surat['nama_kepala_keluarga'] }}</td>
  </tr>
  <tr>
    <td>5. Tempat/Tanggal Lahir</td>
    <td>:</td>
    <td>{{ $proses_surat['tempat_lahir'] }}, {{ Carbon::parse($proses_surat['tanggal_lahir'])->translatedFormat('d F Y') }}</td>
  </tr>
  <tr>
    <td>6. Jenis Kelamin</td>
    <td>:</td>
    <td>{{ $proses_surat['jenis_kelamin'] }}</td>
  </tr>
  <tr>
    <td>7. Alamat</td>
    <td>:</td>
    <td>{{ $proses_surat['alamat'] }}</td>
  </tr>
  <tr>
    <td>8. Agama</td>
    <td>:</td>
    <td>{{ $proses_surat['agama'] }}</td>
  </tr>
  <tr>
    <td>9. Status Kawin</td>
    <td>:</td>
    <td>{{ $proses_surat['status_kawin'] }}</td>
  </tr>
  <tr>
    <td>10. Pendidikan</td>
    <td>:</td>
    <td>{{ $proses_surat['pendidikan'] }}</td>
  </tr>
  <tr>
    <td>11. Pekerjaan</td>
    <td>:</td>
    <td>{{ $proses_surat['pekerjaan'] }}</td>
  </tr>
  <tr>
    <td>12. Jumlah Keluarga Pindah</td>
    <td>:</td>
    <td>{{ $proses_surat['jumlah_keluarga_pindah'] }} orang</td>
  </tr>
  <tr>
    <td>13. Alasan Kepindahan</td>
    <td>:</td>
    <td>{{ $proses_surat['alasan_pindah'] }}</td>
  </tr>
</table>

@if(isset($proses_surat['jumlah_keluarga_pindah']))
<div style="margin-top: 20px;">
  <p>Daftar Anggota Keluarga yang Pindah:</p>
  <table class="table" border="1" style="width: 100%; border-collapse: collapse;">
    <thead>
      <tr>
        <!-- Mengatur lebar kolom No menjadi lebih kecil -->
        <th style="padding: 8px; text-align: center; width: 50px;">No</th>
        <th style="padding: 8px; text-align: center; width: 250px;">NIK</th>
        <th style="padding: 8px; text-align: center; width: 250px;">NAMA</th>
        <th style="padding: 8px; text-align: center; width: 150px">Jenis Kelamin</th>
        <th style="padding: 8px; text-align: center;">SHDK</th>
      </tr>
    </thead>
    <tbody>
      @for($i = 1; $i <= $proses_surat['jumlah_keluarga_pindah']; $i++)
        <tr>
        <!-- Mengatur lebar kolom No agar tetap kecil -->
        <td style="padding: 8px; text-align: center; width: 50px;">{{ $i }}</td>
        <td style="padding: 8px; text-align: center; width: 250px;"> </td> <!-- Ganti dengan data yang sesuai -->
        <td style="padding: 8px; text-align: center; width: 250px;"> </td> <!-- Ganti dengan data yang sesuai -->
        <td style="padding: 8px; text-align: center; width: 150px"> </td> <!-- Ganti dengan data yang sesuai -->
        <td style="padding: 8px; text-align: center;"> </td> <!-- Ganti dengan data yang sesuai -->
        </tr>
        @endfor
    </tbody>
  </table>
</div>
@endif


<p>Demikian surat keterangan ini dibuat dengan sesungguhnya untuk dipergunakan sebagaimana mestinya.</p>

<div style="text-align: right;">
  <p>Rawapanjang, {{ Carbon::now()->translatedFormat('d F Y') }}</p>
  <p>Pejabat Desa</p>
  <div class="signature">
    <br><br>
    <p>____________________</p>
  </div>
</div>

<style>
  .content {
    width: 100%;
    border-collapse: collapse;
  }

  .content td {
    padding: 5px;
    vertical-align: top;
  }

  .content td:first-child {
    width: 30%;
  }

  .table {
    margin-top: 10px;
    margin-bottom: 20px;
  }

  .signature {
    margin-top: 50px;
  }
</style>
@endsection