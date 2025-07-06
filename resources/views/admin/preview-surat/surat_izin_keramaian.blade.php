@extends('layout.admin.preview_surat')

@section('title', 'Surat Izin Keramaian')

@section('surat-title', 'SURAT IZIN KERAMAIAN')

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

  <p>Yang bertanda tangan di bawah ini Kepala Desa {{ $surat->isi_surat['desa'] ?? '[Desa]' }},
    Kecamatan {{ $surat->isi_surat['kecamatan'] ?? '[Kecamatan]' }}, Kabupaten Bogor,
    Provinsi Jawa Barat menerangkan dengan sebenarnya bahwa:</p>

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
      <td>3. No. KK</td>
      <td>:</td>
      <td>{{ $surat->isi_surat['no_kk'] ?? '[No. KK]' }}</td>
    </tr>
    <tr>
      <td>4. Kepala Keluarga</td>
      <td>:</td>
      <td>{{ $surat->isi_surat['kepala_keluarga'] ?? '[Kepala Keluarga]' }}</td>
    </tr>
    <tr>
      <td>5. Tempat/Tanggal Lahir</td>
      <td>:</td>
      <td>
        {{ $surat->isi_surat['tempat_lahir'] ?? '[Tempat Lahir]' }},
        {{ isset($surat->isi_surat['tanggal_lahir']) ? 
                   Carbon::parse($surat->isi_surat['tanggal_lahir'])->translatedFormat('d F Y') : 
                   '[Tanggal Lahir]' }}
      </td>
    </tr>
    <tr>
      <td>6. Jenis Kelamin</td>
      <td>:</td>
      <td>{{ $surat->isi_surat['jenis_kelamin'] ?? '[Jenis Kelamin]' }}</td>
    </tr>
    <tr>
      <td>7. Alamat/Tempat Tinggal</td>
      <td>:</td>
      <td>
        {{ $surat->isi_surat['alamat'] ?? '[Alamat]' }}
        RT {{ $surat->isi_surat['rt'] ?? '[RT]' }}
        RW {{ $surat->isi_surat['rw'] ?? '[RW]' }}
        Desa {{ $surat->isi_surat['desa'] ?? '[Desa]' }},
        Kecamatan {{ $surat->isi_surat['kecamatan'] ?? '[Kecamatan]' }}, Kabupaten Bogor
      </td>
    </tr>
    <tr>
      <td>8. Agama</td>
      <td>:</td>
      <td>{{ $surat->isi_surat['agama'] ?? '[Agama]' }}</td>
    </tr>
    <tr>
      <td>9. Status</td>
      <td>:</td>
      <td>{{ $surat->isi_surat['status_kawin'] ?? '[Status Kawin]' }}</td>
    </tr>
    <tr>
      <td>10. Pendidikan</td>
      <td>:</td>
      <td>{{ $surat->isi_surat['pendidikan'] ?? '[Pendidikan]' }}</td>
    </tr>
    <tr>
      <td>11. Pekerjaan</td>
      <td>:</td>
      <td>{{ $surat->isi_surat['pekerjaan'] ?? '[Pekerjaan]' }}</td>
    </tr>
    <tr>
      <td>12. Kewarganegaraan</td>
      <td>:</td>
      <td>{{ $surat->isi_surat['kewarganegaraan'] ?? '[Kewarganegaraan]' }}</td>
    </tr>
    <tr>
      <td>13. Keperluan</td>
      <td>:</td>
      <td>
        Sebagai pengantar untuk mendapatkan Surat Izin Keramaian berupa
        <strong>{{ $surat->isi_surat['jenis_keramaian'] ?? '[Jenis Keramaian]' }}</strong>
        mulai tanggal <strong>{{ $tanggalMulai->translatedFormat('d F Y') }}</strong>
        sampai dengan <strong>{{ $tanggalSelesai->translatedFormat('d F Y') }}</strong>
        dengan keperluan <strong>{{ $surat->isi_surat['keperluan'] ?? '[Keperluan]' }}</strong>.
      </td>
    </tr>
  </table>

  <p>Orang tersebut adalah benar-benar warga Desa {{ $surat->isi_surat['desa'] ?? '[Desa]' }} dengan data seperti di atas.</p>

  <p>Demikian surat keterangan ini dibuat, untuk dipergunakan sebagaimana mestinya.</p>
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
@endsection