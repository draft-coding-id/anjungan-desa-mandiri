@extends('layout.admin.app')
@section('title', 'Data Warga')
@section('content')
<h4>Data Warga</h4>
<table>
    <thead>
        <tr>
            <th>No</th>
            <th>NIK</th>
            <th>Nama</th>
            <th>Tempat Lahir</th>
            <th>Tanggal Lahir</th>
            <th>Jenis Kelamin</th>
            <th>Agama</th>
            <th>Pekerjaan</th>
            <th>Alamat</th>
            <th>RT/RW</th>
            <th>Kewarganegaraan</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data_warga as $warga)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $warga->nik }}</td>
            <td>{{ $warga->nama_lengkap }}</td>
            <td>{{ $warga->tempat_lahir }}</td>
            <td>{{ $warga->tanggal_lahir }}</td>
            <td>{{ $warga->jenis_kelamin }}</td>
            <td>{{ $warga->agama }}</td>
            <td>{{ $warga->pekerjaan }}</td>
            <td>{{ $warga->alamat }}</td>
            <td>{{ $warga->rt . "/" . $warga->rw }}</td>
            <td>{{ $warga->kewarganegaraan ?? "WNI" }}</td>
            <td>
                <a href="#">Edit</a>
                <form action="#" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>

</table>

{{ $data_warga->links() }}
@endsection