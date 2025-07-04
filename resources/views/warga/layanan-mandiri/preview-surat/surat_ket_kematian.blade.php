@extends('layout.warga.preview-surat')

@section('title', 'Surat Keterangan Kematian')

@section('surat-title')
Surat Keterangan Kematian
@endsection

@section('surat-content')
<p>Yang bertanda tangan di bawah ini Kepala Desa Rawapanjang, Kecamatan Bojonggede, Kabupaten Bogor, Provinsi Jawa Barat menerangkan dengan sebenarnya bahwa:</p>
<table>
    <tr>
        <td>1. Nama Lengkap</td>
        <td>:</td>
        <td>{{ $proses_surat['almarhum_nama'] ?? '[frm_nama]' }}</td>
    </tr>
    <tr>
        <td>2. NIK / No. KTP</td>
        <td>:</td>
        <td>{{ $proses_surat['almarhum_nik'] ?? '[frm_no_ktp]' }}</td>
    </tr>
    <tr>
        <td>3. Tempat / Tanggal Lahir</td>
        <td>:</td>
        <td>
            {{ $proses_surat['almarhum_tempat_lahir'] ?? '[ttl]' }}
            @if(isset($proses_surat['almarhum_tanggal_lahir']))
            , {{ date('d-m-Y', strtotime($proses_surat['almarhum_tanggal_lahir'])) }}
            @endif
        </td>
    </tr>
    <tr>
        <td>4. Jenis Kelamin</td>
        <td>:</td>
        <td>{{ $proses_surat['almarhum_jenis_kelamin'] ?? '[frm_sex]' }}</td>
    </tr>
    <tr>
        <td>5. Agama</td>
        <td>:</td>
        <td>{{ $proses_surat['almarhum_agama'] ?? '[frm_agama]' }}</td>
    </tr>
    <tr>
        <td>6. Pekerjaan</td>
        <td>:</td>
        <td>{{ $proses_surat['almarhum_pekerjaan'] ?? '[frm_pekerjaan]' }}</td>
    </tr>
    <tr>
        <td>7. Kewarganegaraan</td>
        <td>:</td>
        <td>{{ $proses_surat['almarhum_kewarganegaraan'] ?? '[warga_negara]' }}</td>
    </tr>
    <tr>
        <td>8. Alamat/Tempat Tinggal</td>
        <td>:</td>
        <td>{{ $proses_surat['almarhum_alamat'] ?? '[frm_alamat]' }}</td>
    </tr>

    <!-- Paragraf Informasi Tambahan -->
    <tr>
        <td colspan="3">
            <br>
            Yang telah meninggal dunia pada tanggal
            {{ isset($proses_surat['tanggal_meninggal']) ? date('d-m-Y', strtotime($proses_surat['tanggal_meninggal'])) : '[tgl_meninggal]' }}
            @if(isset($proses_surat['waktu_meninggal'])) pukul {{ $proses_surat['waktu_meninggal'] }}@endif
            di {{ $proses_surat['tempat_meninggal'] ?? '[tempat_meninggal]' }}
            @if(isset($proses_surat['sebab_kematian']) && $proses_surat['sebab_kematian'])
            dengan sebab kematian: {{ $proses_surat['sebab_kematian'] }}
            @endif.
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
        <td>{{ $proses_surat['nama_lengkap'] ?? '[nama]' }}</td>
    </tr>
    <tr>
        <td>2. NIK / No. KTP</td>
        <td>:</td>
        <td>{{ $proses_surat['nik'] ?? '[nik]' }}</td>
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
        <td>{{ $proses_surat['jenis_kelamin'] ?? '[sex]' }}</td>
    </tr>
    <tr>
        <td>5. Agama</td>
        <td>:</td>
        <td>{{ $proses_surat['agama'] ?? '[agama]' }}</td>
    </tr>
    <tr>
        <td>6. Pekerjaan</td>
        <td>:</td>
        <td>{{ $proses_surat['pekerjaan'] ?? '[pekerjaan]' }}</td>
    </tr>
    <tr>
        <td>7. Kewarganegaraan</td>
        <td>:</td>
        <td>{{ $proses_surat['kewarganegaraan'] ?? '[kewarganegaraan]' }}</td>
    </tr>
    <tr>
        <td>8. Alamat/Tempat Tinggal</td>
        <td>:</td>
        <td>{{ $proses_surat['alamat'] ?? '[alamat]' }}</td>
    </tr>

    <!-- Keperluan -->
    @if(isset($proses_surat['keperluan']))
    <tr>
        <td>Keperluan</td>
        <td>:</td>
        <td>
            {{ $proses_surat['keperluan'] }}
            @if(isset($proses_surat['keterangan_keperluan']) && $proses_surat['keterangan_keperluan'])
            - {{ $proses_surat['keterangan_keperluan'] }}
            @endif
        </td>
    </tr>
    @endif
</table>
<p>Demikian surat keterangan ini dibuat dengan sebenarnya, untuk dipergunakan sebagaimana mestinya.</p>
@if(isset($proses_surat['keperluan']))
<p><strong>Keperluan:</strong> {{ $proses_surat['keperluan'] }}@if(isset($proses_surat['keterangan_keperluan']) && $proses_surat['keterangan_keperluan']) - {{ $proses_surat['keterangan_keperluan'] }}@endif</p>
@endif
</div>

<div style="text-align: right;">
    <p>Rawapanjang, {{ Carbon\Carbon::now()->translatedFormat('d F Y') }}</p>
    <p>Pejabat Desa</p>
    <div class="signature">
        <br><br>
        <p>____________________</p>
    </div>
</div>
@endsection