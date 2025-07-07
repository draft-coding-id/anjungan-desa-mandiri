@extends('layout.admin.preview_surat')

@section('title', 'Surat Keterangan Tidak Mampu')

@section('surat-title', 'SURAT KETERANGAN TIDAK MAMPU')

@section('content')
@php
use Carbon\Carbon;
@endphp
<div>
  <table class="data-table">
    <tr>
      <td>1. Nama</td>
      <td>:</td>
      <td>{{ $surat->isi_surat['nama_lengkap'] }}</td>
      <td rowspan="6">
        <div class="poto">
          Foto <br>
          2x3
        </div>
      </td>
    </tr>
    <tr>
      <td>2. Tempat/tanggal lahir</td>
      <td>:</td>
      <td>{{ $surat->isi_surat['tempat_lahir'] }}, {{ Carbon::parse($surat->isi_surat['tanggal_lahir'])->translatedFormat('d F Y') }}</td>
      <td></td>
    </tr>
    <tr>
      <td>3. Warga negara</td>
      <td>:</td>
      <td>{{ $surat->isi_surat['kewarganegaraan'] }}</td>
      <td></td>
    </tr>
    <tr>
      <td>4. Agama</td>
      <td>:</td>
      <td>{{ $surat->isi_surat['agama'] }}</td>
      <td></td>
    </tr>
    <tr>
      <td>5. Jenis Kelamin</td>
      <td>:</td>
      <td>{{ $surat->isi_surat['jenis_kelamin'] }}</td>
      <td></td>
    </tr>
    <tr>
      <td>6. Pekerjaan</td>
      <td>:</td>
      <td>{{ $surat->isi_surat['pekerjaan'] }}</td>
      <td></td>
    </tr>
    <tr>
      <td>7. Tempat tinggal</td>
      <td>:</td>
      <td>{{ $surat->isi_surat['alamat'] }}, Desa {{ $surat->isi_surat['desa'] }}, Kecamatan {{ $surat->isi_surat['kecamatan'] }}, Kabupaten Bogor</td>
    </tr>
    <tr>
      <td>8. Surat bukti diri</td>
      <td></td>
      <td></td>
    </tr>
    <tr>
      <td style="padding-left: 30px;">KTP</td>
      <td>:</td>
      <td>{{ $surat->isi_surat['nik'] }}</td>
    </tr>
    <tr>
      <td style="padding-left: 30px;">KK</td>
      <td>:</td>
      <td>{{ $surat->isi_surat['no_kk'] }}</td>
    </tr>
    <tr>
      <td>9. Keperluan</td>
      <td>:</td>
      <td>Mohon surat yang akan dipergunakan untuk {{ $surat->isi_surat['keperluan'] }}</td>
    </tr>
    <tr>
      <td>10. Berlaku</td>
      <td>:</td>
      <td>{{ Carbon::now()->translatedFormat('d F Y') }} s/d {{ Carbon::now()->addDays(30)->translatedFormat('d F Y') }}</td>
    </tr>
    <tr>
      <td>11. Keterangan lain-lain</td>
      <td>:</td>
      <td>Orang tersebut di atas adalah benar benar penduduk desa kami.</td>
    </tr>
  </table>

  <p>Demikian surat ini dibuat, untuk dipergunakan sebagaimana mestinya.</p>
</div>
@endsection

@section('footer')
<table class="footer-table">
  <tr>
    <td class="signature-left">
      <br>
      <p>Pemegang Surat</p>
      <br>
      <br>
      <br>
      <p>{{$surat->isi_surat['nama_lengkap']}}</p>
    </td>
    <td class="signature-center"></td>
    <td class="signature-right">
      <p>Rawapanjang, {{ $surat->updated_at->translatedFormat('d F Y') }}</p>
      <p>Kepala Desa Rawapanjang</p>
      <br><br><br>
      <p>____________________</p>
    </td>
  </tr>
</table>
<div class="camat">
  <p>Mengetahui,</p>
  <p>Camat - {{ $surat->isi_surat['kecamatan'] }}</p>
  <br><br><br>
  <p>_________________________</p>
</div>
@endsection