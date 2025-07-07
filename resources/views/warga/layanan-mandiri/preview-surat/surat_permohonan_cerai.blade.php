@extends('layout.warga.preview-surat')

@section('title', 'Surat Permohonan Cerai')

@section('surat-title')
Surat Permohonan Cerai
@endsection

@section('surat-content')
<p>Dengan ini kami kirimkan dengan hormat permohonan cerai dari pasangan suami istri:</p>

<table class="content">
    <!-- DATA SUAMI -->
    <tr>
        <td>A. {{$proses_surat['status']}}</td>
    </tr>
    <tr>
        <td>1. Nama</td>
        <td>:</td>
        <td>{{ $proses_surat['nama_lengkap'] }}</td>
    </tr>
    <tr>
        <td>2. NIK</td>
        <td>:</td>
        <td>{{ $proses_surat['nik'] }}</td>
    </tr>
    <tr>
        <td>3. Tempat / Tanggal Lahir</td>
        <td>:</td>
        <td>{{ $proses_surat['tempat_lahir'] }},
            {{ \Carbon\Carbon::parse($proses_surat['tanggal_lahir'])->format('d-m-Y') }}
        </td>
    </tr>
    <tr>
        <td>4. Pekerjaan</td>
        <td>:</td>
        <td>{{ $proses_surat['pekerjaan'] }}</td>
    </tr>
    <tr>
        <td>5. Agama</td>
        <td>:</td>
        <td>{{ $proses_surat['agama'] }}</td>
    </tr>
    <tr>
        <td>6. Alamat/Tempat Tinggal</td>
        <td>:</td>
        <td>{{ $proses_surat['alamat'] }}, Desa {{ $proses_surat['desa'] }}, Kecamatan
            {{ $proses_surat['kecamatan'] }}, Kabupaten Bogor
        </td>
    </tr>
</table>

<table class="content">
    <!-- DATA ISTRI -->
    <tr>
        <td>B. {{$proses_surat['status_pasangan']}}</td>
    </tr>
    <tr>
        <td>7. Nama</td>
        <td>:</td>
        <td>{{ $proses_surat['nama_lengkap_pasangan'] }}</td>
    </tr>
    <tr>
        <td>8. NIK</td>
        <td>:</td>
        <td>{{ $proses_surat['nik_pasangan'] }}</td>
    </tr>
    <tr>
        <td>9. Tempat / Tanggal Lahir</td>
        <td>:</td>
        <td>{{ $proses_surat['tempat_lahir_pasangan'] }},
            {{ \Carbon\Carbon::parse($proses_surat['tanggal_lahir_pasangan'])->format('d-m-Y') }}
        </td>
    </tr>
    <tr>
        <td>10. Pekerjaan</td>
        <td>:</td>
        <td>{{ $proses_surat['pekerjaan_pasangan'] }}</td>
    </tr>
    <tr>
        <td>11. Agama</td>
        <td>:</td>
        <td>{{ $proses_surat['agama_pasangan'] }}</td>
    </tr>
    <tr>
        <td>12. Alamat/Tempat Tinggal</td>
        <td>:</td>
        <td>{{ $proses_surat['alamat_pasangan'] }}, Desa {{ $proses_surat['desa_pasangan'] }}, Kecamatan
            {{ $proses_surat['kecamatan_pasangan'] }}, Kabupaten Bogor
        </td>
    </tr>
</table>
<table class="content">
    <tr>
        <td>Adapun sebab-sebab menurut keterangannya sebagai berikut:</td>
    </tr>
    <tr>
        <td>{{ $proses_surat['alasan'] }}</td>
    </tr>
</table>



<p>Demikian surat keterangan ini dibuat dengan sebenarnya untuk dapat dipergunakan sebagaimana mestinya.</p>
<div style="text-align: right;">
    <p>Rawapanjang, {{ Carbon\Carbon::now()->translatedFormat('d F Y') }}</p>
    <p>Pejabat Desa</p>
    <div class="signature">
        <br><br>
        <p>____________________</p>
    </div>
</div>
@endsection