@extends('layout.warga.form_surat')
@section('title' , 'Surat Keterangan Wali Hakim')
@section('header-content')
Surat Keterangan Wali Hakim
@endsection
@section('form-content')
<form action="{{route('submitForm')}}" method="POST">
    @csrf
    <table>
        <input type="hidden" name="jenis_surat" value="SKWH">
        <input type="hidden" name="warga_id" value="{{$warga->id}}">
        <tr>
            <td width="300px">Nama Lengkap</td>
            <td width="50px">:</td>
            <td width="700px"><input type="text" name="nama_lengkap" autocomplete="name"
                    value="{{$warga->nama_lengkap}}" />
            </td>
        </tr>
        <tr>
            <td width="300px">NIK</td>
            <td width="50px">:</td>
            <td width="700px"><input type="text" name="nik" autocomplete="nik" value="{{$warga->nik}}" /></td>
        </tr>
        <tr>
            <td width="300px">Tempat Lahir / Tanggal lahir</td>
            <td width="50px">:</td>
            <td width="700px"><input type="text" name="tempat_lahir" autocomplete="tempat-lahir"
                    value="{{$warga->tempat_lahir}}" /></td>
        </tr>
        <tr>
            <td width="300px">Tanggal Lahir</td>
            <td width="50px">:</td>
            <td width="300px"><input type="date" name="tanggal_lahir" autocomplete="tanggal-lahir"
                    value="{{$warga->tanggal_lahir}}" /></td>
        </tr>
        <tr>
            <td width="300px">Jenis Kelamin</td>
            <td width="50px">:</td>
            <td width="700px"><input type="text" name="jenis_kelamin" autocomplete="jenis-kelamin"
                    value="{{$warga->jenis_kelamin}}" /></td>
        </tr>
        <tr>
            <td width="300px">Alamat</td>
            <td width="50px">:</td>
            <td width="700px"><textarea rows="5" name="alamat" autocomplete="alamat">{{$warga->alamat}}</textarea></td>
        </tr>
        <tr>
            <td width="300px">Agama</td>
            <td width="50px">:</td>
            <td width="700px"><input type="text" name="agama" autocomplete="agama" value="{{$warga->agama}}" /></td>
        </tr>
        <tr>
            <td width="300px">Pekerjaan</td>
            <td width="50px">:</td>
            <td width="700px"><input type="text" name="pekerjaan" autocomplete="pekerjaan"
                    value="{{$warga->pekerjaan}}" /></td>
        </tr>
        <tr>
            <td width="300px">Kewarganegaraan</td>
            <td width="50px">:</td>
            <td width="700px"><input type="text" name="kewarganegaraan" autocomplete="kewarganegaraan" value="WNI" />
            </td>
        </tr>
        <tr>
            <td colspan="3" style="text-align: center;">
                <button type="submit" class="submit-button">Lanjutkan</button>
            </td>
        </tr>
    </table>

</form>
@endsection
