@extends('layout.admin.app')
@section('title', 'Layanan Surat')

@section('content')
<div class="path">
    <h4>Layanan Surat > Dalam Proses</h4>
</div>

@include('layout.admin.menu_surat')
<div class="content">
    <div class="mt-4">
        <h3>Riwayat Surat</h3>
        <table class="table">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Aksi</th>
                    <th>No. Surat</th>
                    <th>NIK</th>
                    <th>Nama Penduduk</th>
                    <th>No. HP Aktif</th>
                    <th>Jenis Surat</th>
                    <th>Tanggal Kirim</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($surat as $data )
                <tr>
                    <td>{{$increment++}}</td>
                    <td><button>
                            {{$data->status}}
                        </button></td>
                    <td>{{$data->no_surat}}</td>
                    <td>{{$data->isi_surat['nik']}}</td>
                    <td>{{$data->isi_surat['nama_lengkap']}}</td>
                    <td>{{$data->no_hp}}</td>
                    <td>{{$data->jenis_surat}}</td>
                    <td>{{$data->updated_at->translatedFormat('d F Y')}}</td>
                </tr>
                @empty
                <td colspan="8" style="text-align: center">Belum ada surat yang selesai diproses</td>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection