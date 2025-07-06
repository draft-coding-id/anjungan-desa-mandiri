@extends('layout.admin.preview_surat')

@section('title', 'Surat Keterangan Wali Hakim')

@section('surat-title', 'SURAT KETERANGAN WALI HAKIM')

@section('content')
<div>
    <p>Yang bertanda tangan di bawah ini Kepala Desa {{ $surat->isi_surat['desa'] ?? 'Rawapanjang' }}, Kecamatan {{ $surat->isi_surat['kecamatan'] ?? 'Bojonggede' }}, Kabupaten Bogor, Provinsi Jawa Barat menerangkan dengan sebenarnya bahwa:</p>

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
            <td>3. No HP</td>
            <td>:</td>
            <td>{{ $surat->isi_surat['no_hp'] ?? '[No HP]' }}</td>
        </tr>
        <tr>
            <td>4. Tempat/Tanggal Lahir</td>
            <td>:</td>
            <td>{{ $surat->isi_surat['tempat_lahir'] ?? '[Tempat Lahir]' }}, {{ $surat->isi_surat['tanggal_lahir'] ?? '[Tanggal Lahir]' }}</td>
        </tr>
        <tr>
            <td>5. Tempat Tinggal</td>
            <td>:</td>
            <td>{{ $surat->isi_surat['alamat'] ?? '[Alamat]' }} RT {{ $surat->isi_surat['rt'] ?? '[RT]' }} RW {{ $surat->isi_surat['rw'] ?? '[RW]' }} Desa {{ $surat->isi_surat['desa'] ?? 'Rawapanjang' }}, Kecamatan {{ $surat->isi_surat['kecamatan'] ?? 'Bojonggede' }}, Kabupaten Bogor</td>
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
            <td>9. Kewarganegaraan</td>
            <td>:</td>
            <td>{{ $surat->isi_surat['kewarganegaraan'] ?? '[Kewarganegaraan]' }}</td>
        </tr>
    </table>

    <p>Yang namanya tersebut diatas memang benar warga kami yang akan menikah di KUA {{ $surat->isi_surat['kecamatan'] ?? 'Bojonggede' }} Kabupaten Bogor. Berhubung orang tersebut tidak memiliki wali nasab, kami mohon dengan hormat Bapak Kepala KUA {{ $surat->isi_surat['kecamatan'] ?? 'Bojonggede' }} supaya berkenan menjadi wali.</p>

    <p>Demikian surat keterangan ini dibuat dengan sebenarnya untuk dapat dipergunakan sebagaimana mestinya.</p>
</div>
@endsection

@section('footer')
<div class="just-signature-right">
    <p>Rawapanjang, {{ $surat->updated_at->translatedFormat('d F Y') }}</p>
    <p>Kepala Desa Rawapanjang</p>
    <img src="data:image/png;base64,{{ base64_encode($qrCode) }}" class="qr-code" alt="QR Code">
</div>
@endsection