@extends('layout.warga.preview-surat')

@section('title', 'Surat Keterangan Tidak Mampu')

@section('surat-title')
SURAT KETERANGAN TIDAK MAMPU
@endsection

@section('surat-content')
<div class="text-center">
  <h3>SURAT KETERANGAN TIDAK MAMPU</h3>
  <p>Nomor : {{ $proses_surat['no_surat'] ?? '[format_nomor_surat]' }}</p>
</div>

<p>Yang bertanda tangan di bawah ini Kepala Desa {{ $proses_surat['desa'] }}, Kecamatan {{ $proses_surat['kecamatan'] }}, Kabupaten Bogor, Provinsi Jawa Barat menerangkan bahwa :</p>

<table class="content">
  <tr>
    <td>1. Nama Lengkap</td>
    <td>:</td>
    <td>{{ $proses_surat['nama_lengkap'] }}</td>
  </tr>
  <tr>
    <td>2. No. KTP</td>
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
    <td>5. Kewarga negaraan</td>
    <td>:</td>
    <td>{{ $proses_surat['warga_negara'] }}</td>
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
    <td>{{ $proses_surat['alamat'] }} RT {{ $proses_surat['rt'] }} RW {{ $proses_surat['rw'] }} Desa {{ $proses_surat['desa'] }}, Kecamatan {{ $proses_surat['kecamatan'] }}, Kabupaten Bogor</td>
  </tr>
</table>

<p>Bahwa yang tersebut namanya di atas, sepanjang pengetahuan dan penelitian kami hingga saat dikeluarkannya surat keterangan ini memang benar Keluarga yang TIDAK MAMPU dan tidak memiliki penghasilan tetap.</p>
<p>Surat Keterangan ini dibuat untuk keperluan : {{$proses_surat['keperluan']}}</p>

<div style="text-align: right; margin-top: 50px;">
  <p>{{ $proses_surat['desa'] }}, {{ Carbon\Carbon::now()->translatedFormat('d F Y') }}</p>
  <p>Pejabat Desa</p>
  <div style="margin-top: 20px;">
    <p>____________________</p>
  </div>
</div>
@endsection