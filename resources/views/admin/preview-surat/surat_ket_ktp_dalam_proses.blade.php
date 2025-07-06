@extends('layout.admin.preview_surat')

@section('title', 'Surat Keterangan KTP Dalam Proses')

@section('surat-title', 'SURAT KETERANGAN KTP DALAM PROSES')

@section('content')
<div>
  <p>Yang bertanda tangan di bawah ini Kepala Desa Rawapanjang, Kecamatan Bojonggede, Kabupaten Bogor, Provinsi Jawa Barat menerangkan dengan sebenarnya bahwa:</p>

  <table class="data-table">
    <tr>
      <td>1. Nama Lengkap</td>
      <td>:</td>
      <td>{{ $surat->isi_surat['nama_lengkap'] ?? '[Nama Lengkap]' }}</td>
    </tr>
    <tr>
      <td>2. Tempat/Tanggal Lahir</td>
      <td>:</td>
      <td>{{ $surat->isi_surat['tempat_lahir'] ?? '[Tempat Lahir]' }}, {{ $surat->isi_surat['tanggal_lahir'] ?? '[Tanggal Lahir]' }}</td>
    </tr>
    <tr>
      <td>3. Jenis Kelamin</td>
      <td>:</td>
      <td>{{ $surat->isi_surat['jenis_kelamin'] ?? '[Jenis Kelamin]' }}</td>
    </tr>
    <tr>
      <td>4. Tempat Tinggal</td>
      <td>:</td>
      <td>{{ $surat->isi_surat['alamat'] ?? '[Alamat]' }} RT {{ $surat->isi_surat['rt'] ?? '[RT]' }} RW {{ $surat->isi_surat['rw'] ?? '[RW]' }} Desa Rawapanjang, Kecamatan Bojonggede, Kabupaten Bogor</td>
    </tr>
    <tr>
      <td>5. Agama</td>
      <td>:</td>
      <td>{{ $surat->isi_surat['agama'] ?? '[Agama]' }}</td>
    </tr>
    <tr>
      <td>6. Status</td>
      <td>:</td>
      <td>{{ $surat->isi_surat['status_kawin'] ?? '[status_kawin]' }}</td>
    </tr>
    <tr>
      <td>7. Pekerjaan</td>
      <td>:</td>
      <td>{{ $surat->isi_surat['pekerjaan'] ?? '[Pekerjaan]' }}</td>
    </tr>
    <tr>
      <td>8. Warga Negara</td>
      <td>:</td>
      <td>{{ $surat->isi_surat['kewarganegaraan'] ?? '[Kewarganegaraan]' }}</td>
    </tr>
  </table>

  <p>Orang tersebut di atas adalah benar-benar warga Desa Rawapanjang yang saat ini Kartu Tanda Penduduk sedang dalam proses.</p>

  <p>Demikian surat keterangan ini dibuat dengan sesungguhnya untuk dipergunakan sebagaimana mestinya.</p>
</div>
@endsection

@section('footer')
<table class="footer-table">
  <tr>
    <td class="signature-left">
      <div class="foto">
        Foto <br>
        (3x4)
      </div>
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