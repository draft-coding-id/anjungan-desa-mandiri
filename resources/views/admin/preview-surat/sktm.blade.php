@extends('layout.admin.preview_surat')

@section('title', 'Surat Keterangan Tidak Mampu')

@section('surat-title', 'SURAT KETERANGAN TIDAK MAMPU')

@section('content')
<div>
  @php
  use Carbon\Carbon;
  // Pastikan tanggal_kegiatan dalam format yang bisa diparsing
  $tanggalMulai = isset($surat->isi_surat['tanggal_kegiatan']) ?
  Carbon::parse($surat->isi_surat['tanggal_kegiatan']) :
  Carbon::now();
  $tanggalSelesai = $tanggalMulai->copy()->addDays(30);
  @endphp
  <p>Yang bertanda tangan di bawah ini Kepala Desa Rawapanjang, Kecamatan Bojonggede, Kabupaten Bogor, Provinsi Jawa Barat menerangkan dengan sebenarnya bahwa:</p>

  <table class="data-table">
    <tr>
      <td>1. Nama Lengkap</td>
      <td>:</td>
      <td>{{ $surat->isi_surat['nama_lengkap'] ?? '[Nama Lengkap]' }}</td>
    </tr>
    <tr>
      <td>2. NIK / No KTP</td>
      <td>:</td>
      <td>{{ $surat->isi_surat['nik'] ?? '[NIK]' }}</td>
    </tr>
    <tr>
      <td>3. Tempat/Tanggal Lahir</td>
      <td>:</td>
      <td>
        {{ $surat->isi_surat['tempat_lahir'] ?? '[Tempat Lahir]' }},
        {{ isset($surat->isi_surat['tanggal_lahir']) ? 
                   Carbon::parse($surat->isi_surat['tanggal_lahir'])->translatedFormat('d F Y') : 
                   '[Tanggal Lahir]' }}
      </td>
    </tr>
    <tr>
      <td>4. Jenis Kelamin</td>
      <td>:</td>
      <td>{{ $surat->isi_surat['jenis_kelamin'] ?? '[Jenis Kelamin]' }}</td>
    </tr>
    <tr>
      <td>5. Kewarganegaraan</td>
      <td>:</td>
      <td>{{ $surat->isi_surat['kewarganegaraan'] ?? '[Kewarganegaraan]' }}</td>
    </tr>
    <tr>
      <td>6. Agama</td>
      <td>:</td>
      <td>{{ $surat->isi_surat['agama'] ?? '[Agama]' }}</td>
    </tr>
    <tr>
      <td>7. Pekerjaan</td>
      <td>:</td>
      <td>{{ $surat->isi_surat['pekerjaan'] ?? '[Pekerjaan]' }}</td>
    </tr>
    <tr>
      <td>8. Alamat/Tempat Tinggal</td>
      <td>:</td>
      <td>
        {{ $surat->isi_surat['alamat'] ?? '[Alamat]' }}
        RT {{ $surat->isi_surat['rt'] ?? '[RT]' }}
        RW {{ $surat->isi_surat['rw'] ?? '[RW]' }}
        Desa {{ $surat->isi_surat['desa'] ?? '[Desa]' }},
        Kecamatan {{ $surat->isi_surat['kecamatan'] ?? '[Kecamatan]' }}, Kabupaten Bogor
      </td>
    </tr>
  </table>

  <p>Bahwa yang tersebut namanya diatas, sepanjang pengetahuan dan penelitian kami hingga saat dikeluarkannya surat keterangan ini memang benar Keluarga yang TIDAK MAMPU dan tidak memiliki penghasilan tetap.</p>

  <p>Surat Keterangan ini dibuat untuk keperluan: {{ $surat->isi_surat['keperluan'] ?? '[Keperluan]' }}</p>

  <p>Demikian surat keterangan ini dibuat, untuk dipergunakan sebagaimana mestinya.</p>
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