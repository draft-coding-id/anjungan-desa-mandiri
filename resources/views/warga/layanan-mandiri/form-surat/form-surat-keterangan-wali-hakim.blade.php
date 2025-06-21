@extends('layout.warga.form_surat')
@section('title' , 'Surat Keterangan Wali Hakim')
@section('header-content')
Surat Keterangan Wali Hakim
@endsection
@section('form-content')
<form action="{{route('submitForm')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <table>
        <input type="hidden" name="jenis_surat" value="SKWH">
        <input type="hidden" name="warga_id" value="{{$warga->id}}">
        <input type="hidden" name="keperluan" value="Menikah">
        <tr>
            <td width="300px">Nama Lengkap</td>
            <td width="50px">:</td>
            <td width="700px"><input type="text" name="nama_lengkap" autocomplete="name"
                    value="{{$warga->nama_lengkap}}" readonly />
            </td>
        </tr>
        <tr>
            <td width="300px">NIK</td>
            <td width="50px">:</td>
            <td width="700px"><input type="text" name="nik" autocomplete="nik" value="{{$warga->nik}}" readonly /></td>
        </tr>
        <tr>
            <td width="300px">File</td>
            <td width="50px">:</td>
            <td width="700px"><input type="file" name="file" required />
            </td>
        </tr>
        <tr>
            <td width="300px">Tempat Lahir / Tanggal lahir</td>
            <td width="50px">:</td>
            <td width="700px"><input type="text" name="tempat_lahir" autocomplete="tempat-lahir" readonly
                    value="{{$warga->tempat_lahir}}" /></td>
        </tr>
        <tr>
            <td width="300px">Tanggal Lahir</td>
            <td width="50px">:</td>
            <td width="300px"><input type="date" name="tanggal_lahir" autocomplete="tanggal-lahir" readonly
                    value="{{$warga->tanggal_lahir}}" /></td>
        </tr>
        <tr>
            <td width="300px">Jenis Kelamin</td>
            <td width="50px">:</td>
            <td width="700px"><input type="text" name="jenis_kelamin" autocomplete="jenis-kelamin" readonly
                    value="{{$warga->jenis_kelamin}}" /></td>
        </tr>
        <tr>
            <td width="300px">Kecamatan</td>
            <td width="50px">:</td>
            <td width="700px"><input type="text" rows="5" name="kecamatan" autocomplete="Kecamatan" readonly value="{{$warga->kecamatan}}"></input></td>
        </tr>
        <tr>
            <td width="300px">Desa</td>
            <td width="50px">:</td>
            <td width="700px"><input type="text" rows="5" name="desa" autocomplete="desa" readonly value="{{$warga->desa}}"></input></td>
        </tr>
        <tr>
            <td width="300px">RT</td>
            <td width="50px">:</td>
            <td width="700px"><input type="text" rows="5" name="rt" readonly value="{{$warga->rt}}"></input></td>
        </tr>
        <tr>
            <td width="300px">RW</td>
            <td width="50px">:</td>
            <td width="700px"><input type="text" rows="5" name="rw" readonly value="{{$warga->rw}}"></input></td>
        </tr>
        <tr>
            <td width="300px">Alamat</td>
            <td width="50px">:</td>
            <td width="700px"><textarea rows="5" name="alamat" autocomplete="alamat" readonly>{{$warga->alamat}}</textarea></td>
        </tr>
        <tr>
            <td width="300px">Agama</td>
            <td width="50px">:</td>
            <td width="700px"><input type="text" name="agama" autocomplete="agama" value="{{$warga->agama}}" readonly /></td>
        </tr>
        <tr>
            <td width="300px">Pekerjaan</td>
            <td width="50px">:</td>
            <td width="700px"><input type="text" name="pekerjaan" autocomplete="pekerjaan" readonly
                    value="{{$warga->pekerjaan}}" /></td>
        </tr>
        <tr>
            <td width="300px">Kewarganegaraan</td>
            <td width="50px">:</td>
            <td width="700px"><input type="text" name="kewarganegaraan" autocomplete="kewarganegaraan" value="WNI" readonly />
            </td>
        </tr>

        <tr>
            <td width="300px">No HP</td>
            <td width="50px">:</td>
            <td width="700px"><input type="text" name="no_hp" required /></td>
        </tr>
        <tr>
            <td colspan="3" style="text-align: center;">
                <button class="submit-button" onclick="window.history.back();">Kembali</button>
                <button type="submit" class="submit-button">Lanjutkan</button>
            </td>
        </tr>
    </table>

</form>
@endsection