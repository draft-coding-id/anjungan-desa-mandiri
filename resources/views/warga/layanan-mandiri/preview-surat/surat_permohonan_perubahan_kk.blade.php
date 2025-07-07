@extends('layout.warga.preview-surat')

@section('title', 'Surat Permohonan Perubahan Kartu Keluarga')

@section('surat-title')
Surat Permohonan Perubahan Kartu Keluarga
@endsection

@section('surat-content')
@php
use Carbon\Carbon;
@endphp
<p>Yang bertanda tangan di bawah ini Kepala {{ $proses_surat['desa'] }}, Kecamatan {{ $proses_surat['kecamatan'] }}, Kabupaten Bogor, Provinsi Jawa Barat menerangkan dengan sebenarnya bahwa :</p>

<table class="content">
  <tr>
    <td>1. Nama</td>
    <td>:</td>
    <td>{{ $proses_surat['nama_lengkap'] }}</td>
  </tr>
  <tr>
    <td>2. Tempat/tanggal lahir</td>
    <td>:</td>
    <td>{{ $proses_surat['tempat_lahir'] }}, {{ Carbon::parse($proses_surat['tanggal_lahir'])->translatedFormat('d F Y') }}</td>
  </tr>
  <tr>
    <td>3. Warga negara</td>
    <td>:</td>
    <td>{{ $proses_surat['kewarganegaraan'] }}</td>
  </tr>
  <tr>
    <td>4. Agama</td>
    <td>:</td>
    <td>{{ $proses_surat['agama'] }}</td>
  </tr>
  <tr>
    <td>5. Jenis Kelamin</td>
    <td>:</td>
    <td>{{ $proses_surat['jenis_kelamin'] }}</td>
  </tr>
  <tr>
    <td>6. Pekerjaan</td>
    <td>:</td>
    <td>{{ $proses_surat['pekerjaan'] }}</td>
  </tr>
  <tr>
    <td>7. Tempat tinggal</td>
    <td>:</td>
    <td>{{ $proses_surat['alamat'] }}, Desa {{ $proses_surat['desa'] }}, Kecamatan {{ $proses_surat['kecamatan'] }}, Kabupaten Bogor</td>
  </tr>
  <tr>
    <td>8. Surat bukti diri</td>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <td style="padding-left: 30px;">KTP</td>
    <td>:</td>
    <td>{{ $proses_surat['nik'] }}</td>
  </tr>
  <tr>
    <td style="padding-left: 30px;">KK</td>
    <td>:</td>
    <td>{{ $proses_surat['no_kk'] }}</td>
  </tr>
  <tr>
    <td>9. Keperluan</td>
    <td>:</td>
    <td>Mohon surat yang akan dipergunakan untuk {{ $proses_surat['keperluan'] }}</td>
  </tr>
  <tr>
    <td>10. Keterangan lain-lain</td>
    <td>:</td>
    <td>Orang tersebut di atas adalah benar benar penduduk desa kami.</td>
  </tr>
</table>

<p>Demikian surat ini dibuat, untuk dipergunakan sebagaimana mestinya.</p>

<div class="footer">
  <div>
    <p>Pemegang Surat</p>
    <div class="signature">
      <br><br>
    </div>
    <p>{{ $proses_surat['nama_lengkap'] }}</p>
  </div>

  <div>
    <p>Rawapanjang, {{ Carbon::now()->translatedFormat('d F Y') }}</p>
    <p>Pejabat Desa</p>
    <div class="signature">
      <br><br>
      <p>____________________</p>
    </div>
  </div>
</div>
<div class="camat">
  <p>Mengetahui,</p>
  <p>Camat - {{ $proses_surat['kecamatan'] }}</p>
  <br><br><br>
  <p>_________________________</p>
</div>

@endsection