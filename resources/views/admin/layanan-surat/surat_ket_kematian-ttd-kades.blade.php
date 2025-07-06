@extends('layout.admin.preview_surat')

@section('title', 'Surat Keterangan Kematian')

@section('surat-title', 'SURAT KETERANGAN KEMATIAN')

@section('content')
<div>
    <p>Yang bertanda tangan di bawah ini Kepala Desa Rawapanjang, Kecamatan Bojonggede, Kabupaten Bogor, Provinsi Jawa Barat menerangkan dengan sebenarnya bahwa:</p>

    <table class="data-table kematian-table">
        <tr>
            <td class="section-title">1. Nama Lengkap</td>
            <td>: {{ $surat->isi_surat['almarhum_nama'] ?? '[Nama Almarhum]' }}</td>
        </tr>
        <tr>
            <td class="section-title">2. NIK / No. KTP</td>
            <td>: {{ $surat->isi_surat['almarhum_nik'] ?? '[NIK Almarhum]' }}</td>
        </tr>
        <tr>
            <td class="section-title">3. Tempat / Tanggal Lahir</td>
            <td>: {{ $surat->isi_surat['almarhum_tempat_lahir'] ?? '[Tempat Lahir]' }}@if(isset($surat->isi_surat['almarhum_tanggal_lahir'])), {{ date('d-m-Y', strtotime($surat->isi_surat['almarhum_tanggal_lahir'])) }}@endif</td>
        </tr>
        <tr>
            <td class="section-title">4. Jenis Kelamin</td>
            <td>: {{ $surat->isi_surat['almarhum_jenis_kelamin'] ?? '[Jenis Kelamin]' }}</td>
        </tr>
        <tr>
            <td class="section-title">5. Agama</td>
            <td>: {{ $surat->isi_surat['almarhum_agama'] ?? '[Agama]' }}</td>
        </tr>
        <tr>
            <td class="section-title">6. Pekerjaan</td>
            <td>: {{ $surat->isi_surat['almarhum_pekerjaan'] ?? '[Pekerjaan]' }}</td>
        </tr>
        <tr>
            <td class="section-title">7. Kewarganegaraan</td>
            <td>: {{ $surat->isi_surat['almarhum_kewarganegaraan'] ?? '[Kewarganegaraan]' }}</td>
        </tr>
        <tr>
            <td class="section-title">8. Alamat/Tempat Tinggal</td>
            <td>: {{ $surat->isi_surat['almarhum_alamat'] ?? '[Alamat]' }}</td>
        </tr>
        <tr>
            <td colspan="2">
                <br>
                Yang telah meninggal dunia pada tanggal {{ isset($surat->isi_surat['tanggal_meninggal']) ? date('d-m-Y', strtotime($surat->isi_surat['tanggal_meninggal'])) : '[Tanggal Meninggal]' }} di {{ $surat->isi_surat['tempat_meninggal'] ?? '[Tempat Meninggal]' }}@if(isset($surat->isi_surat['sebab_kematian']) && $surat->isi_surat['sebab_kematian']) dengan sebab kematian: {{ $surat->isi_surat['sebab_kematian'] }}@endif.
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <br>
                Yang bersangkutan adalah {{ strtolower($surat->isi_surat['hubungan_keluarga'] ?? 'keluarga') }} dari:
            </td>
        </tr>
        <tr>
            <td class="section-title">1. Nama Lengkap</td>
            <td>: {{ $surat->isi_surat['nama_lengkap'] ?? '[Nama Pemohon]' }}</td>
        </tr>
        <tr>
            <td class="section-title">2. NIK / No. KTP</td>
            <td>: {{ $surat->isi_surat['nik'] ?? '[NIK Pemohon]' }}</td>
        </tr>
        <tr>
            <td class="section-title">3. Tempat / Tanggal Lahir</td>
            <td>: {{ $surat->isi_surat['tempat_lahir'] ?? '[Tempat Lahir]' }}@if(isset($surat->isi_surat['tanggal_lahir'])), {{ date('d-m-Y', strtotime($surat->isi_surat['tanggal_lahir'])) }}@endif</td>
        </tr>
        <tr>
            <td class="section-title">4. Jenis Kelamin</td>
            <td>: {{ $surat->isi_surat['jenis_kelamin'] ?? '[Jenis Kelamin]' }}</td>
        </tr>
        <tr>
            <td class="section-title">5. Agama</td>
            <td>: {{ $surat->isi_surat['agama'] ?? '[Agama]' }}</td>
        </tr>
        <tr>
            <td class="section-title">6. Pekerjaan</td>
            <td>: {{ $surat->isi_surat['pekerjaan'] ?? '[Pekerjaan]' }}</td>
        </tr>
        <tr>
            <td class="section-title">7. Kewarganegaraan</td>
            <td>: {{ $surat->isi_surat['kewarganegaraan'] ?? '[Kewarganegaraan]' }}</td>
        </tr>
        <tr>
            <td class="section-title">8. Alamat/Tempat Tinggal</td>
            <td>: {{ $surat->isi_surat['alamat'] ?? '[Alamat]' }} Desa Rawapanjang, Kecamatan Bojonggede, Kabupaten Bogor</td>
        </tr>
        @if(isset($surat->isi_surat['keperluan']))
        <tr>
            <td class="section-title">Keperluan</td>
            <td>: {{ $surat->isi_surat['keperluan'] }}@if(isset($surat->isi_surat['keterangan_keperluan']) && $surat->isi_surat['keterangan_keperluan']) - {{ $surat->isi_surat['keterangan_keperluan'] }}@endif</td>
        </tr>
        @endif
    </table>

    <p>Demikian surat keterangan ini dibuat dengan sebenarnya, untuk dipergunakan sebagaimana mestinya.</p>
</div>
@endsection

@section('footer')
<div class="just-signature-right">
    <p>Rawapanjang, {{ $surat->updated_at->translatedFormat('d F Y') }}</p>
    <p>Kepala Desa Rawapanjang</p>
    <img src="data:image/png;base64,{{ base64_encode($qrCode) }}" class="qr-code" alt="QR Code">
</div>
@endsection