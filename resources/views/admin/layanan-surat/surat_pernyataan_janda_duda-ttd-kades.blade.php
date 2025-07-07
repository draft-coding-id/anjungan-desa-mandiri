@extends('layout.admin.preview_surat')

@section('title', 'Surat Pernyataan janda / Duda')

@section('surat-title')
Surat Pernyataan janda / Duda
@endsection

@section('content')
<p>Yang bertanda tangan di bawah ini:</p>
<table>
    <tr>
        <td>1. Nama Lengkap</td>
        <td>:</td>
        <td>{{ $surat->isi_surat['nama_lengkap'] ?? '[frm_nama]' }}</td>
    </tr>
    <tr>
        <td>2. NIK / No. KTP</td>
        <td>:</td>
        <td>{{ $surat->isi_surat['nik'] ?? '[frm_no_ktp]' }}</td>
    </tr>
    <tr>
        <td>3. Tempat / Tanggal Lahir</td>
        <td>:</td>
        <td>
            {{ $surat->isi_surat['tempat_lahir'] ?? '[ttl]' }}
            @if(isset($surat->isi_surat['tanggal_lahir']))
            , {{ date('d-m-Y', strtotime($surat->isi_surat['tanggal_lahir'])) }}
            @endif
        </td>
    </tr>
    <tr>
        <td>4. Jenis Kelamin</td>
        <td>:</td>
        <td>{{ $surat->isi_surat['jenis_kelamin'] ?? '[frm_sex]' }}</td>
    </tr>
    <tr>
        <td>5. Agama</td>
        <td>:</td>
        <td>{{ $surat->isi_surat['agama'] ?? '[frm_agama]' }}</td>
    </tr>
    <tr>
        <td>6. Status</td>
        <td>:</td>
        <td>{{ $surat->isi_surat['status_kawin'] ?? '[frm_pekerjaan]' }}</td>
    </tr>
    <tr>
        <td>7. Alamat/Tempat Tinggal</td>
        <td>:</td>
        <td>{{ $surat->isi_surat['alamat'] }} RT {{ $surat->isi_surat['rt'] }} RW {{ $surat->isi_surat['rw'] }} Desa {{ $surat->isi_surat['desa'] }}, Kecamatan {{ $surat->isi_surat['kecamatan'] }}, Kabupaten Bogor</td>
    </tr>

    <!-- Paragraf Informasi Tambahan -->
    <tr>
        <td colspan="3">
            <br>
            Menyatakan dengan sesungguhnya bahwa sampai saat ini saya sudah pernah
            menikah / kawin dan berstatus <b>{{ $surat->isi_surat['status_kawin'] }}</b>. Surat pernyataan ini saya buat untuk
            melengkapi persyaratan administrasi pernikahan saya dengan:
        </td>
    </tr>

    <tr>
        <td>1. Nama Lengkap</td>
        <td>:</td>
        <td>{{ $surat->isi_surat['nama_pasangan'] ?? '[nama]' }}</td>
    </tr>
    <tr>
        <td>2. NIK / No. KTP</td>
        <td>:</td>
        <td>{{ $surat->isi_surat['nik_pasangan'] ?? '[nik]' }}</td>
    </tr>
    <tr>
        <td>3. Tempat / Tanggal Lahir</td>
        <td>:</td>
        <td>
            {{ $surat->isi_surat['tempat_lahir_pasangan'] ?? '[ttl]' }}
            @if(isset($surat->isi_surat['tanggal_lahir_pasangan']))
            , {{ date('d-m-Y', strtotime($surat->isi_surat['tanggal_lahir_pasangan'])) }}
            @endif
        </td>
    </tr>
    <tr>
        <td>4. Jenis Kelamin</td>
        <td>:</td>
        <td>{{ $surat->isi_surat['jenis_kelamin_pasangan'] ?? '[sex]' }}</td>
    </tr>
    <tr>
        <td>5. Agama</td>
        <td>:</td>
        <td>{{ $surat->isi_surat['agama_pasangan'] ?? '[agama]' }}</td>
    </tr>
    <tr>
        <td>6. Status</td>
        <td>:</td>
        <td>{{ $surat->isi_surat['status_kawin_pasangan'] ?? '[status]' }}</td>
    </tr>
    <tr>
        <td>7. Alamat/Tempat Tinggal</td>
        <td>:</td>
        <td>{{ $surat->isi_surat['alamat_pasangan'] ?? '[alamat]' }}</td>
    </tr>
</table>

<p> Demikian surat pernyataan ini saya buat dan ditandatangani, apabila pernyataan
    tidak benar saya siap dituntut sesuai hukum yang berlaku tanpa melibatkan pihakpihak lain yang turut bertandatangan dibawah ini sesuai KUHP bab IX tentang
    keterangan palsu pasal 242 ayat 1. </p>
</div>

<table style="width: 100%; margin-top: 50px; border-collapse: collapse;">
    <!-- Baris 1: Saksi-Saksi dan Yang Menyatakan -->
    <tr>
        <td style="width: 70%; vertical-align: top; padding-right: 20px;">
            <p><em>Saksi-Saksi:</em></p>
            <p>1. ............................ <span style="margin-left: 20px;">(....................)</span></p>
            <p>2. ............................ <span style="margin-left: 20px;">(....................)</span></p>
        </td>
        <td style="width: 30%; text-align: center; vertical-align: top;">
            <p>{{ $surat->isi_surat['desa'] }}, {{ Carbon\Carbon::now()->translatedFormat('d F Y') }}<br>
                Yang Menyatakan</p>
            <p><em>Materai 10.000</em></p>
            <br><br><br>
            <p><strong>{{ $surat->isi_surat['nama_lengkap'] }}</strong></p>
        </td>
    </tr>

    <!-- Spacing row -->
    <tr>
        <td colspan="2" style="height: 40px;"></td>
    </tr>

    <!-- Baris 2: Mengetahui -->
    <tr>
        <td colspan="2">
            <table style="width: 100%; border-collapse: collapse;">
                <tr>
                    <td style="width: 33.33%; text-align: center; vertical-align: top;">
                        <p>Ketua RW</p>
                        <br><br>
                        <p>(....................)</p>
                    </td>
                    <td style="width: 33.33%; text-align: center; vertical-align: top;">
                        <p>Petugas P4 Desa {{ $surat->isi_surat['desa'] }}</p>
                        <img src="data:image/png;base64,{{ base64_encode($qrCode) }}" class="qr-code" alt="QR Code">

                    </td>
                    <td style="width: 33.33%; text-align: center; vertical-align: top;">
                        <p>Ketua RT ..... / .....</p>
                        <br><br>
                        <p>(....................)</p>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>

@endsection