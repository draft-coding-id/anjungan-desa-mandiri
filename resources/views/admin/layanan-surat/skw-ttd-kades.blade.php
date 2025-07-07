@extends('layout.admin.preview_surat')

@section('title', 'Surat Keterangan Wali')

@section('surat-title', 'SURAT KETERANGAN WALI')

@section('content')
@php
use Carbon\Carbon;
@endphp
<p>Yang bertanda tangan di bawah ini Kepala Desa Rawapanjang, Kecamatan Bojonggede, Kabupaten Bogor, Provinsi Jawa Barat menerangkan dengan sebenarnya bahwa:</p>
<div>
  <table class="data-table">

    <!-- DATA WALI -->
    <tr>
      <td>1. Nama Lengkap</td>
      <td>:</td>
      <td>{{ $surat->isi_surat['wali_nama'] }}</td>
    </tr>
    <tr>
      <td>2. NIK / No. KTP</td>
      <td>:</td>
      <td>{{ $surat->isi_surat['wali_nik'] }}</td>
    </tr>
    <tr>
      <td>3. Tempat / Tanggal Lahir</td>
      <td>:</td>
      <td>{{ $surat->isi_surat['wali_tempat_lahir'] }}, {{ \Carbon\Carbon::parse($surat->isi_surat['wali_tanggal_lahir'])->format('d-m-Y') }}</td>
    </tr>
    <tr>
      <td>4. Alamat/Tempat Tinggal</td>
      <td>:</td>
      <td>{{ $surat->isi_surat['wali_alamat'] }}</td>
    </tr>
    <tr>
      <td>5. Pekerjaan</td>
      <td>:</td>
      <td>{{ $surat->isi_surat['wali_pekerjaan'] }}</td>
    </tr>
  </table>

  <p>Adalah wali dari seorang perempuan :</p>

  <table class="data-table">

    <!-- DATA PEREMPUAN -->
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
      <td>{{ $surat->isi_surat['tempat_lahir'] }}, {{ \Carbon\Carbon::parse($surat->isi_surat['tanggal_lahir'])->format('d-m-Y') }}</td>
    </tr>
    <tr>
      <td>4. Jenis Kelamin</td>
      <td>:</td>
      <td>{{ $surat->isi_surat['jenis_kelamin'] }}</td>
    </tr>
    <tr>
      <td>5. Alamat/Tempat Tinggal</td>
      <td>:</td>
      <td>{{ $surat->isi_surat['alamat'] }}, Desa {{ $surat->isi_surat['desa'] }}, Kecamatan {{ $surat->isi_surat['kecamatan'] }}, Kabupaten Bogor</td>
    </tr>
  </table>

  <p>Hubungan wali adalah sebagai: {{ $surat->isi_surat['hubungan_keluarga'] }}</p>
  <p>Demikian surat keterangan ini dibuat dengan sebenarnya untuk dapat dipergunakan sebagaimana mestinya.</p>
  @endsection

  @section('footer')
  <div class="just-signature-right">
    <p>Rawapanjang, {{ $surat->updated_at->translatedFormat('d F Y') }}</p>
    <p>Kepala Desa Rawapanjang</p>
    <img src="data:image/png;base64,{{ base64_encode($qrCode) }}" class="qr-code" alt="QR Code">
  </div>
  @endsection