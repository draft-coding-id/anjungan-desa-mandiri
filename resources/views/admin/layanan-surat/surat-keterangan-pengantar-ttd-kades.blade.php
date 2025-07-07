@extends('layout.admin.preview_surat')

@section('title', 'Surat Keterangan Pengantar')

@section('surat-title', 'SURAT KETERANGAN PENGANTAR')

@section('content')
<div>
    <p>Yang bertanda tangan di bawah ini Kepala Desa Rawapanjang, Kecamatan Bojonggede, Kabupaten Bogor, Provinsi Jawa Barat menerangkan dengan sebenarnya bahwa:</p>

    <table class="data-table">
        <tr>
            <td>1. NIK / No KTP</td>
            <td>:</td>
            <td>{{ $surat->isi_surat['nik'] ?? '[NIK]' }}</td>
        </tr>
        <tr>
            <td>2. Nama Lengkap</td>
            <td>:</td>
            <td>{{ $surat->isi_surat['nama_lengkap'] ?? '[Nama Lengkap]' }}</td>
        </tr>
        <tr>
            <td>3. Tempat/Tanggal Lahir</td>
            <td>:</td>
            <td>{{ $surat->isi_surat['tempat_lahir'] ?? '[Tempat Lahir]' }}, {{ $surat->isi_surat['tanggal_lahir'] ?? '[Tanggal Lahir]' }}</td>
        </tr>
        <tr>
            <td>4. Umur</td>
            <td>:</td>
            <td>{{ $surat->isi_surat['usia'] ?? '[Usia]' }}</td>
        </tr>
        <tr>
            <td>5. Warga Negara</td>
            <td>:</td>
            <td>{{ $surat->isi_surat['kewarganegaraan'] ?? '[Warga Negara]' }}</td>
        </tr>
        <tr>
            <td>6. Agama</td>
            <td>:</td>
            <td>{{ $surat->isi_surat['agama'] ?? '[Agama]' }}</td>
        </tr>
        <tr>
            <td>7. Jenis Kelamin</td>
            <td>:</td>
            <td>{{ $surat->isi_surat['jenis_kelamin'] ?? '[Jenis Kelamin]' }}</td>
        </tr>
        <tr>
            <td>8. Pekerjaan</td>
            <td>:</td>
            <td>{{ $surat->isi_surat['pekerjaan'] ?? '[Pekerjaan]' }}</td>
        </tr>
        <tr>
            <td>9. Tempat Tinggal</td>
            <td>:</td>
            <td>{{ $surat->isi_surat['alamat'] ?? '[Alamat]' }} RT {{ $surat->isi_surat['rt'] ?? '[RT]' }} RW {{ $surat->isi_surat['rw'] ?? '[RW]' }} Desa {{ $surat->isi_surat['desa'] ?? 'Rawapanjang' }}, Kecamatan {{ $surat->isi_surat['kecamatan'] ?? 'Bojonggede' }}, Kabupaten Bogor</td>
        </tr>
        <tr>
            <td>10. NIK</td>
            <td>:</td>
            <td>{{ $surat->isi_surat['nik'] ?? '[NIK]' }}</td>
        </tr>
        <tr>
            <td>11. Keperluan</td>
            <td>:</td>
            <td>{{ $surat->isi_surat['keperluan'] ?? '[Keperluan]' }}</td>
        </tr>
        <tr>
            <td>12. Berlaku</td>
            <td>:</td>
            <td>1 Januari 2025 s/d 31 April 2025</td>
        </tr>
        <tr>
            <td>13. Golongan Darah</td>
            <td>:</td>
            <td>{{ $surat->isi_surat['gol_darah'] ?? '[Golongan Darah]' }}</td>
        </tr>
    </table>

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
            <img src="data:image/png;base64,{{ base64_encode($qrCode) }}" class="qr-code" alt="QR Code">
        </td>
    </tr>
</table>
@endsection