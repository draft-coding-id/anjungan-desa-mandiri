@extends('layout.warga.preview-surat')

@section('title', 'Surat Izin Keramaian')

@section('surat-title')
Surat Izin Keramaian
@endsection

@section('surat-content')
@php
use Carbon\Carbon;
// Pastikan $proses_surat['tanggal_kegiatan'] dalam format YYYY-MM-DD
$tanggalBerlaku = Carbon::parse($proses_surat['tanggal_kegiatan']);
$tanggalSampai = $tanggalBerlaku->copy()->addDays(30);
@endphp

<p>Yang bertanda tangan di bawah ini Kepala Desa {{ $proses_surat['desa'] }}, Kecamatan {{ $proses_surat['kecamatan'] }}, Kabupaten Bogor, Provinsi Jawa Barat menerangkan dengan sebenarnya bahwa:</p>

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
    <td>3. No. KK</td>
    <td>:</td>
    <td>{{ $proses_surat['no_kk'] }}</td>
  </tr>
  <tr>
    <td>4. Kepala Keluarga</td>
    <td>:</td>
    <td>{{ $proses_surat['kepala_keluarga'] }}</td>
  </tr>
  <tr>
    <td>5. Tempat/Tanggal Lahir</td>
    <td>:</td>
    <td>{{ $proses_surat['tempat_lahir'] }}, {{ \Carbon\Carbon::parse($proses_surat['tanggal_lahir'])->translatedFormat('d F Y') }}</td>
  </tr>
  <tr>
    <td>6. Jenis Kelamin</td>
    <td>:</td>
    <td>{{ $proses_surat['jenis_kelamin'] }}</td>
  </tr>
  <tr>
    <td>7. Alamat/Tempat Tinggal</td>
    <td>:</td>
    <td>
      {{ $proses_surat['alamat'] }} RT {{ $proses_surat['rt'] }} RW {{ $proses_surat['rw'] }} Desa {{ $proses_surat['desa'] }}, Kecamatan {{ $proses_surat['kecamatan'] }}, Kabupaten Bogor
    </td>
  </tr>
  <tr>
    <td>8. Agama</td>
    <td>:</td>
    <td>{{ $proses_surat['agama'] }}</td>
  </tr>
  <tr>
    <td>9. Status</td>
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
    <td>12. Kewarganegaraan</td>
    <td>:</td>
    <td>{{ $proses_surat['kewarganegaraan'] }}</td>
  </tr>
  <tr>
    <td>13. Keperluan</td>
    <td>:</td>
    <td>
      Sebagai pengantar untuk mendapatkan Surat Izin Keramaian berupa <strong>{{ $proses_surat['jenis_keramaian'] }}</strong>
      mulai tanggal <strong>{{ $tanggalBerlaku->translatedFormat('d F Y') }}</strong> sampai dengan <strong>{{ $tanggalSampai->translatedFormat('d F Y') }}</strong>
      dengan keperluan <strong>{{ $proses_surat['keperluan'] }}</strong>.
    </td>
  </tr>
</table>

<p>
  Orang tersebut adalah benar-benar warga Desa {{ $proses_surat['desa'] }} dengan data seperti di atas.
</p>

<p>
  Demikian surat keterangan ini dibuat, untuk dipergunakan sebagaimana mestinya.
</p>

<div class="footer">
  <div>
    <p>Pemegang Surat</p>
    <div class="signature">
      <br><br>
    </div>
    <p>{{ $proses_surat['nama_lengkap'] }}</p>
  </div>

  <div>
    <p>{{ $proses_surat['desa'] }}, {{ \Carbon\Carbon::now()->translatedFormat('d F Y') }}</p>
    <p>Pejabat Desa</p>
    <div class="signature">
      <br><br>
      <p>____________________</p>
    </div>
  </div>
</div>
@endsection