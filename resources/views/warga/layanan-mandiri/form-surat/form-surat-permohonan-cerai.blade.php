@extends('layout.warga.form-surat')

@section('title', 'Surat Permohonan Cerai')

@section('header-content')
Surat Permohonan Cerai
@endsection

@section('form-content')
<x-info-box :message="'Silakan lengkapi data berikut untuk pembuatan Surat Permohonan Cerai.'" />

<form action="{{ route('submitForm') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="jenis_surat" value="SPC">
    <input type="hidden" name="warga_id" value="{{$warga->id}}">

    <!-- Data Pemohon -->
    <div class="section-title">DATA PRIBADI</div>
    <table class="form-table">
        <tr>
            <td>Nama Lengkap</td>
            <td>:</td>
            <td><input type="text" name="nama_lengkap" required placeholder="Masukan Nama Lengkap Anda" /></td>
        </tr>
        <tr>
            <td>NIK</td>
            <td>:</td>
            <td><input type="text" name="nik" placeholder="16 digit NIK" maxlength="16" required /></td>
        </tr>
        <tr>
            <td>Tempat / Tanggal Lahir</td>
            <td>:</td>
            <td>
                <div class="inline-inputs">
                    <input type="text" name="tempat_lahir" required placeholder="Masukan Tempat Lahir" />
                    <input type="date" name="tanggal_lahir" required />
                </div>
            </td>
        </tr>
        <tr>
            <td>Agama</td>
            <td>:</td>
            <td>
                <select name="agama" required>
                    <option value="">Pilih Agama</option>
                    <option value="Islam">Islam</option>
                    <option value="Kristen">Kristen</option>
                    <option value="Katolik">Katolik</option>
                    <option value="Hindu">Hindu</option>
                    <option value="Buddha">Buddha</option>
                    <option value="Konghucu">Konghucu</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>Pekerjaan</td>
            <td>:</td>
            <td><input type="text" name="pekerjaan" required placeholder="Masukan pekerjaan anda" /></td>
        </tr>
        <tr>
            <td>RT</td>
            <td>:</td>
            <td><input type="text" name="rt" required placeholder="Masukan Nomor RT" /></td>
        </tr>
        <tr>
            <td>RW</td>
            <td>:</td>
            <td><input type="text" name="rw" required placeholder="Masukan Nomor RW" /></td>
        </tr>
        <tr>
            <td>Desa</td>
            <td>:</td>
            <td><input type="text" name="desa" required placeholder="Masukan Nama Desa" /></td>
        </tr>
        <tr>
            <td>Kecamatan</td>
            <td>:</td>
            <td><input type="text" name="kecamatan" required placeholder="Masukan Nama Kecamatan" /></td>
        </tr>
        <tr>
            <td>Alamat/Tempat Tinggal</td>
            <td>:</td>
            <td>
                <textarea name="alamat" required placeholder="Masukan Alamat Lengkap"></textarea>
            </td>
        </tr>
        <tr>
            <td>Saya adalah</td>
            <td>:</td>
            <td>
                <select name="status">
                    <option value="suami">Suami</option>
                    <option value="istri">Istri</option>
                </select>
            </td>
        </tr>
    </table>

    <!-- Section: Data Suami -->
    <div class="section-title">DATA PASANGAN</div>
    <table class="form-table">
        <tr>
            <td>Nama Lengkap<span class="required">*</span></td>
            <td>:</td>
            <td><input type="text" name="nama_lengkap_pasangan" required placeholder="Nama Lengkap pasangan" /></td>
        </tr>
        <tr>
            <td>NIK <span class="required">*</span></td>
            <td>:</td>
            <td><input type="text" name="nik_pasangan" required placeholder="16 digit NIK" maxlength="16" /></td>
        </tr>
        <tr>
            <td>Tempat / Tanggal Lahir <span class="required">*</span></td>
            <td>:</td>
            <td>
                <div class="inline-inputs">
                    <input type="text" name="tempat_lahir_pasangan" required placeholder="Tempat Lahir" />
                    <input type="date" name="tanggal_lahir_pasangan" required />
                </div>
            </td>
        </tr>
        <tr>
            <td>Pekerjaan <span class="required">*</span></td>
            <td>:</td>
            <td><input type="text" name="pekerjaan_pasangan" placeholder="Pekerjaan pasangan" /></td>
        </tr>
        <tr>
            <td>Agama <span class="required">*</span></td>
            <td>:</td>
            <td>
                <select name="agama_pasangan" required>
                    <option value="">Pilih Agama</option>
                    <option value="Islam">Islam</option>
                    <option value="Kristen">Kristen</option>
                    <option value="Katolik">Katolik</option>
                    <option value="Hindu">Hindu</option>
                    <option value="Buddha">Buddha</option>
                    <option value="Konghucu">Konghucu</option>
                </select>
            </td>
        </tr>
        <tr>

        </tr>
        <tr>
            <td>
                RT
            </td>
            <td>
                :
            </td>
            <td><input type="text" name="rt_pasangan" placeholder="RT" /></td>
        </tr>
        <tr>
            <td>
                RW
            </td>
            <td>
                :
            </td>
            <td><input type="text" name="rw_pasangan" placeholder="RW" /></td>
        </tr>
        <tr>
            <td>Desa <span class="required">*</span></td>
            <td>:</td>
            <td>
                <input type="text" name="desa_pasangan" placeholder="Desa">
            </td>
        </tr>
        <tr>
            <td>Kecamatan <span class="required">*</span></td>
            <td>:</td>
            <td>
                <input type="text" name="kecamatan_pasangan" placeholder="Kecamatan">
            </td>
        </tr>
        <tr>
            <td>Alamat/Tempat Tinggal <span class="required">*</span></td>
            <td>:</td>
            <td>
                <textarea name="alamat_pasangan" required placeholder="Alamat Lengkap Pasangan"></textarea>
            </td>
        </tr>
        <tr>
            <td>
                Saya adalah
            </td>
            <td>
                :
            </td>
            <td>
                <select name="status_pasangan">
                    <option value="suami">Suami</option>
                    <option value="istri">Istri</option>
                </select>
            </td>
        </tr>

    </table>

    <!-- Section: Dokumen Pendukung -->
    <div class="section-title">Dokumen Pendukung</div>
    <table class="form-table">
        <tr>
            <td>Upload File <span class="required">*</span></td>
            <td>:</td>
            <td>
                <input type="file" name="file" />
                @if ($warga->file_kk)
                <div>
                    <strong>File Kartu Keluarga yang sudah di-upload:</strong>
                    <a href="{{ asset('storage/' . $warga->file_kk) }}"
                        target="_blank">{{ basename($warga->file_kk) }}</a>
                </div>
                @endif

                <div class="file-info">Mohon upload file dengan format PDF (maksimal 2MB)</div>
            </td>
        </tr>
    </table>

    <!-- Section: Informasi Tambahan -->
    <div class="section-title">Informasi Tambahan</div>
    <table class="form-table">
        <tr>
            <td>No HP <span class="required">*</span></td>
            <td>:</td>
            <td>
                <input type="text" name="no_hp" required required placeholder="Contoh: 081234567890" />
            </td>
        </tr>
        <tr>
            <td>Keperluan <span class="required">*</span></td>
            <td>:</td>
            <td>
                <textarea name="keperluan" required placeholder="Tuliskan keperluan Anda..."></textarea>
            </td>
        </tr>
        <tr>
            <td>Alasan <span class="required">*</span></td>
            <td>:</td>
            <td>
                <textarea name="alasan" required placeholder="Tuliskan Alasan Cerai..."></textarea>
            </td>
        </tr>
    </table>

    <div class="button-container">
        <a href="{{ route('layanan-kependudukan') }}" class="button secondary">Kembali</a>
        <button type="submit" class="button">Lanjutkan</button>
    </div>
</form>
@endsection