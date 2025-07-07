@extends('layout.admin.preview_surat')

@section('title', 'Surat PERMOHONAN CERAI')

@section('surat-title', 'SURAT PERMOHONAN CERAI')

@section('content')
    @php
        use Carbon\Carbon;
    @endphp
    <p>Dengan ini kami kirimkan dengan hormat permohonan cerai dari pasangan suami istri:</p>

    <div>
        <table class="data-table">

            <!-- DATA SUAMI -->
            <tr>
                <td>A. {{$surat->isi_surat['status']}}</td>
            </tr>
            <tr>
                <td>1. Nama</td>
                <td>:</td>
                <td>{{ $surat->isi_surat['nama_lengkap'] }}</td>
            </tr>
            <tr>
                <td>2. NIK</td>
                <td>:</td>
                <td>{{ $surat->isi_surat['nik'] }}</td>
            </tr>
            <tr>
                <td>3. Tempat / Tanggal Lahir</td>
                <td>:</td>
                <td>{{ $surat->isi_surat['tempat_lahir'] }},
                    {{ \Carbon\Carbon::parse($surat->isi_surat['tanggal_lahir'])->format('d-m-Y') }}</td>
            </tr>
            <tr>
                <td>4. Pekerjaan</td>
                <td>:</td>
                <td>{{ $surat->isi_surat['pekerjaan'] }}</td>
            </tr>
            <tr>
                <td>5. Agama</td>
                <td>:</td>
                <td>{{ $surat->isi_surat['agama'] }}</td>
            </tr>
            <tr>
                <td>6. Alamat/Tempat Tinggal</td>
                <td>:</td>
                <td>{{ $surat->isi_surat['alamat'] }}, Desa {{ $surat->isi_surat['desa'] }}, Kecamatan
                    {{ $surat->isi_surat['kecamatan'] }}, Kabupaten Bogor</td>
            </tr>
        </table>

        <table class="data-table">

            <!-- DATA ISTRI -->
            <tr>
                <td>B. {{$surat->isi_surat['status_pasangan']}}</td>
            </tr>
            <tr>
                <td>7. Nama</td>
                <td>:</td>
                <td>{{ $surat->isi_surat['nama_lengkap_pasangan'] }}</td>
            </tr>
            <tr>
                <td>8. NIK</td>
                <td>:</td>
                <td>{{ $surat->isi_surat['nik_pasangan'] }}</td>
            </tr>
            <tr>
                <td>9. Tempat / Tanggal Lahir</td>
                <td>:</td>
                <td>{{ $surat->isi_surat['tempat_lahir_pasangan'] }},
                    {{ \Carbon\Carbon::parse($surat->isi_surat['tanggal_lahir_pasangan'])->format('d-m-Y') }}</td>
            </tr>
            <tr>
                <td>10. Pekerjaan</td>
                <td>:</td>
                <td>{{ $surat->isi_surat['pekerjaan_pasangan'] }}</td>
            </tr>
            <tr>
                <td>11. Agama</td>
                <td>:</td>
                <td>{{ $surat->isi_surat['agama_pasangan'] }}</td>
            </tr>
            <tr>
                <td>12. Alamat/Tempat Tinggal</td>
                <td>:</td>
                <td>{{ $surat->isi_surat['alamat_pasangan'] }}, Desa {{ $surat->isi_surat['desa_pasangan'] }}, Kecamatan
                    {{ $surat->isi_surat['kecamatan_pasangan'] }}, Kabupaten Bogor</td>
            </tr>
        </table>
        <table class="data-table">
            <tr>
                <td>Adapun sebab-sebab menurut keterangannya sebagai berikut:</td>
            </tr>
            <tr>
                <td>{{ $surat->isi_surat['alasan'] }}</td>
            </tr>
        </table>

        <p>Demikian surat keterangan ini dibuat dengan sebenarnya untuk dapat dipergunakan sebagaimana mestinya.</p>
    </div>
    @endsection

    @section('footer')
        <div class="just-signature-right">
            <p>Rawapanjang, {{ \Carbon\Carbon::parse($surat->updated_at)->translatedFormat('d F Y') }}</p>
            <p>Kepala Desa Rawapanjang</p>
            <br><br><br>
            <p>____________________</p>
        </div>
    @endsection
