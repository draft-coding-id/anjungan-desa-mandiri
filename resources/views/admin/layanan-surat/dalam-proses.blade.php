@extends('layout.admin.app')
@section('title', 'Layanan Surat')

@section('content')
<div class="path">
    <h4>Layanan Surat > Dalam Proses</h4>
</div>

@include('layout.admin.menu_surat')
<h4>Data Layanan Surat</h4>
<div class="content">
    <div class="mt-4">
        <h3>Menunggu Verifikasi Admin</h3>
        <table class="table">
            <thead>
                <tr>
                    <th>No.</th>
                    <th width="150px">Aksi</th>
                    <!-- <th>No. Antrean</th> -->
                    <th>NIK</th>
                    <th>Nama Penduduk</th>
                    <th>No. HP Aktif</th>
                    <th>Jenis Surat</th>
                    <th>Tanggal Kirim</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($belumDiverifikasiAdmin as $surat)
                <tr>
                    <td>{{$increment++}}</td>
                    <td height="50px" width="250px"><a href="{{route('verifikasi.admin' , $surat->id)}}" class="button"
                            ;">{{$surat->status}}</a></td>
                    <!-- <td>12345</td> -->
                    <td>{{$surat->isi_surat['nik']}}</td>
                    <td>{{$surat->isi_surat['nama_lengkap']}}</td>
                    <td>{{$surat->no_hp}}</td>
                    <td>Surat Keterangan Domisili</td>
                    <td>{{date($surat->created_at)}}</td>
                    @empty
                    <td colspan="7" style="text-align: center">Surat Sudah diverifikasi semua oleh admin</td>
                </tr>
                @endforelse
                <tr>
                    <td colspan="7">
                        {{$belumDiverifikasiAdmin->links()}}
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="mt-4">
        <h3>Menunggu Tanda Tangan Kades</h3>
        <table class="table">
            <thead>
                <tr>
                    <th>No.</th>
                    <th width="150px">Aksi</th>
                    <!-- <th>No. Antrean</th> -->
                    <th>NIK</th>
                    <th>Nama Penduduk</th>
                    <th>No. HP Aktif</th>
                    <th>Jenis Surat</th>
                    <th>Tanggal Kirim</th>
                </tr>
            </thead>
            <tbody>
                @forelse ( $belumDiverifikasiKades as $surat)
                <tr>
                    <td>{{$incrementForTableBelumTtdKades++ }}</td>
                    <td width="300px" height="50px"><a href="{{route('persetujuan.kades' , $surat->id)}}" class="button"
                            ;">{{$surat->status}}</a></td>
                    <td>{{$surat->isi_surat['nik']}}</td>
                    <td>{{$surat->isi_surat['nama_lengkap']}}</td>
                    <td>{{$surat->no_hp}}</td>
                    <td>Surat Keterangan Domisili</td>
                    <td>{{date($surat->created_at)}}</td>
                    @empty
                    <td colspan="7" style="text-align: center">Surat Sudah di Tanda tanga semua oleh Kades</td>
                </tr>
                @endforelse
                <tr>
                    <td colspan="7">
                        {{$belumDiverifikasiKades->links()}}
                    </td>
                </tr>
            </tbody>

        </table>
    </div>
    <div class="mt-4">
        <h3>Belum diserahkan ke Warga</h3>
        <table class="table">
            <thead>
                <tr>
                    <th>No.</th>
                    <th width="150px">Aksi</th>
                    <!-- <th>No. Antrean</th> -->
                    <th>NIK</th>
                    <th>Nama Penduduk</th>
                    <th>No. HP Aktif</th>
                    <th>Jenis Surat</th>
                    <th>Tanggal Kirim</th>
                </tr>
            </thead>
            <tbody>
                @forelse ( $belumDikirimKeWarga as $surat)
                <tr>
                    <td>{{$incrementForTableBelumDiserahkan++}}</td>
                    <td width="250px" height="50px"><a href="{{route('surat.selesai' , $surat->id)}}" class="button"
                            ;">{{$surat->status}}</a></td>
                    <td>{{$surat->warga->nik}}</td>
                    <td>{{$surat->warga->nik}}</td>
                    <td>{{$surat->no_hp}}</td>
                    <td>Surat Keterangan Domisili</td>
                    <td>{{date($surat->created_at)}}</td>
                    @empty
                    <td colspan="7" style="text-align: center">Surat Sudah di Tanda tanga semua oleh Kades</td>
                </tr>
                @endforelse
                <tr>
                    <td colspan="7">
                        {{$belumDikirimKeWarga->links()}}
                    </td>
                </tr>
            </tbody>
            {{$belumDikirimKeWarga->links()}}
        </table>
    </div>
</div>
@endsection