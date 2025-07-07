@extends('layout.warga.preview-surat')

@section('title', 'Surat Pernyataan janda / Duda')

@section('surat-title')
Surat Pernyataan janda / Duda
@endsection

@section('surat-content')
<p>Yang bertanda tangan di bawah ini:</p>
<table>
    <tr>
        <td>1. Nama Lengkap</td>
        <td>:</td>
        <td>{{ $proses_surat['nama_lengkap'] ?? '[frm_nama]' }}</td>
    </tr>
    <tr>
        <td>2. NIK / No. KTP</td>
        <td>:</td>
        <td>{{ $proses_surat['nik'] ?? '[frm_no_ktp]' }}</td>
    </tr>
    <tr>
        <td>3. Tempat / Tanggal Lahir</td>
        <td>:</td>
        <td>
            {{ $proses_surat['tempat_lahir'] ?? '[ttl]' }}
            @if(isset($proses_surat['tanggal_lahir']))
            , {{ date('d-m-Y', strtotime($proses_surat['tanggal_lahir'])) }}
            @endif
        </td>
    </tr>
    <tr>
        <td>4. Jenis Kelamin</td>
        <td>:</td>
        <td>{{ $proses_surat['jenis_kelamin'] ?? '[frm_sex]' }}</td>
    </tr>
    <tr>
        <td>5. Agama</td>
        <td>:</td>
        <td>{{ $proses_surat['agama'] ?? '[frm_agama]' }}</td>
    </tr>
    <tr>
        <td>6. Status</td>
        <td>:</td>
        <td>{{ $proses_surat['status_kawin'] ?? '[frm_pekerjaan]' }}</td>
    </tr>
    <tr>
        <td>7. Alamat/Tempat Tinggal</td>
        <td>:</td>
        <td>{{ $proses_surat['alamat'] }} RT {{ $proses_surat['rt'] }} RW {{ $proses_surat['rw'] }} Desa {{ $proses_surat['desa'] }}, Kecamatan {{ $proses_surat['kecamatan'] }}, Kabupaten Bogor</td>
    </tr>

    <!-- Paragraf Informasi Tambahan -->
    <tr>
        <td colspan="3">
            <br>
            Menyatakan dengan sesungguhnya bahwa sampai saat ini saya sudah pernah
            menikah / kawin dan berstatus <b>{{ $proses_surat['status_kawin'] }}</b>. Surat pernyataan ini saya buat untuk
            melengkapi persyaratan administrasi pernikahan saya dengan: 
        </td>
    </tr>

    <!-- Hubungan Keluarga -->
    <tr>
        <td colspan="3">
            <br>
            Yang bersangkutan adalah {{ strtolower($proses_surat['hubungan_keluarga'] ?? 'keluarga') }} dari:
        </td>
    </tr>

    <tr>
        <td>1. Nama Lengkap</td>
        <td>:</td>
        <td>{{ $proses_surat['nama_pasangan'] ?? '[nama]' }}</td>
    </tr>
    <tr>
        <td>2. NIK / No. KTP</td>
        <td>:</td>
        <td>{{ $proses_surat['nik_pasangan'] ?? '[nik]' }}</td>
    </tr>
    <tr>
        <td>3. Tempat / Tanggal Lahir</td>
        <td>:</td>
        <td>
            {{ $proses_surat['tempat_lahir_pasangan'] ?? '[ttl]' }}
            @if(isset($proses_surat['tanggal_lahir_pasangan']))
            , {{ date('d-m-Y', strtotime($proses_surat['tanggal_lahir_pasangan'])) }}
            @endif
        </td>
    </tr>
    <tr>
        <td>4. Jenis Kelamin</td>
        <td>:</td>
        <td>{{ $proses_surat['jenis_kelamin_pasangan'] ?? '[sex]' }}</td>
    </tr>
    <tr>
        <td>5. Agama</td>
        <td>:</td>
        <td>{{ $proses_surat['agama_pasangan'] ?? '[agama]' }}</td>
    </tr>
    <tr>
        <td>6. Status</td>
        <td>:</td>
        <td>{{ $proses_surat['status_kawin_pasangan'] ?? '[status]' }}</td>
    </tr>
    <tr>
        <td>7. Alamat/Tempat Tinggal</td>
        <td>:</td>
        <td>{{ $proses_surat['alamat_pasangan'] ?? '[alamat]' }}</td>
    </tr>
</table>

<p> Demikian surat pernyataan ini saya buat dan ditandatangani, apabila pernyataan
    tidak benar saya siap dituntut sesuai hukum yang berlaku tanpa melibatkan pihakpihak lain yang turut bertandatangan dibawah ini sesuai KUHP bab IX tentang
    keterangan palsu pasal 242 ayat 1. </p>
</div>

<div style="width: 100%; margin-top: 50px;">
    <!-- Baris 1: Saksi-Saksi dan Yang Menyatakan -->
    <div style="display: flex; justify-content: space-between;">
        <div style="width: 70%;">
            <p><em>Saksi-Saksi:</em></p>
            <p>1. ............................ <span style="margin-left: 20px;">(....................)</span></p>
            <p>2. ............................ <span style="margin-left: 20px;">(....................)</span></p>
        </div>
        <div style="width: 30%; text-align: right;">
            <div style="text-align: center">
                <p>{{ $proses_surat['desa'] }}, {{ Carbon\Carbon::now()->translatedFormat('d F Y') }}<br>
                Yang Menyatakan</p>
                <p><em>Materai 10.000</em></p>
                <br><br><br>
                <strong>{{ $proses_surat['nama_lengkap'] }}</strong>
            </div>
        </div>
    </div>

    <!-- Baris 2: Mengetahui -->
    <br><br>
    <div style="display: flex; justify-content: space-between;">
        <div style="width: 30%; text-align: center;">
            <p>Ketua RW</p>
            <br><br>
            <p>(....................)</p>
        </div>
        <div style="width: 30%; text-align: center;">
            <p>Petugas P4 Desa {{ $proses_surat['nama_lengkap'] }}</p>
            <br><br>
            <p>(....................)</p>
        </div>
        <div style="width: 30%; text-align: center;">
            <p>Ketua RT ..... / .....</p>
            <br><br>
            <p>(....................)</p>
        </div>
    </div>

    <!-- QR Code -->
    <div style="text-align: center; margin-top: 20px;">
        
    </div>
</div>

@endsection