@extends('layout.admin.app')
@section('title', 'Data Warga')
@section('content')
<h4>Data Warga</h4>
<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Aksi</th>
            <th>NIK</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>RT</th>
            <th>RW</th>
            <th>Tempat Lahir</th>
            <th>Tanggal Lahir</th>
            <th>Agama</th>
            <th>Jenis Kelamin</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data_warga as $warga)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>
                <button class="aksi">Kelola Data</button>
            </td>
            <td>{{ $warga->nik }}</td>
            <td>{{ $warga->nama_lengkap }}</td>
            <td>{{ $warga->alamat }}</td>
            <td>{{ $warga->rt }}</td>
            <td>{{ $warga->rw }}</td>
            <td>{{ $warga->tempat_lahir }}</td>
            <td>{{ $warga->tanggal_lahir }}</td>
            <td>{{ $warga->agama }}</td>
            <td>{{ $warga->jenis_kelamin }}</td>
        </tr>
        @endforeach
    </tbody>

</table>

{{ $data_warga->links() }}
@endsection