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
        <input type="hidden" name="warga_id" value="{{ $warga->id }}">

        <!-- Data Pemohon -->
        <div class="section-title">DATA PEMOHON (Yang Mengajukan Surat)</div>
        <table class="form-table">
            <tr>
                <td>Nama Lengkap</td>
                <td>:</td>
                <td><input type="text" name="nama_lengkap" value="{{ $warga->nama_lengkap }}" readonly /></td>
            </tr>
            <tr>
                <td>NIK</td>
                <td>:</td>
                <td><input type="text" name="nik" value="{{ $warga->nik }}" readonly /></td>
            </tr>
            <tr>
                <td>Tempat / Tanggal Lahir</td>
                <td>:</td>
                <td>
                    <div class="inline-inputs">
                        <input type="text" name="tempat_lahir" value="{{ $warga->tempat_lahir }}" readonly />
                        <input type="date" name="tanggal_lahir" value="{{ $warga->tanggal_lahir }}" readonly />
                    </div>
                </td>
            </tr>
            <tr>
                <td>Jenis Kelamin</td>
                <td>:</td>
                <td><input type="text" name="jenis_kelamin" value="{{ $warga->jenis_kelamin }}" readonly /></td>
            </tr>
            <tr>
                <td>Agama</td>
                <td>:</td>
                <td><input type="text" name="agama" value="{{ $warga->agama }}" readonly /></td>
            </tr>
            <tr>
                <td>Pekerjaan</td>
                <td>:</td>
                <td><input type="text" name="pekerjaan" value="{{ $warga->pekerjaan }}" readonly /></td>
            </tr>
            <tr>
                <td>
                    RT
                </td>
                <td>
                    :
                </td>
                <td><input type="text" name="rt" value="{{ $warga->rt }}" readonly /></td>
            </tr>
            <tr>
                <td>
                    RW
                </td>
                <td>
                    :
                </td>
                <td><input type="text" name="rw" value="{{ $warga->rw }}" readonly /></td>
            </tr>
            <tr>
                <td>
                    Desa
                </td>
                <td>
                    :
                </td>
                <td><input type="text" name="desa" value="{{ $warga->desa }}" readonly /></td>
            </tr>
            <tr>
                <td>
                    Kecamatan
                </td>
                <td>
                    :
                </td>
                <td><input type="text" name="kecamatan" value="{{ $warga->kecamatan }}" readonly /></td>
            </tr>
            <tr>
                <td>Alamat/Tempat Tinggal</td>
                <td>:</td>
                <td>
                    <textarea name="alamat" readonly>{{ $warga->alamat }}</textarea>
                </td>
            </tr>
        </table>

        <!-- Section: Data Suami -->
        <div class="section-title">Data Suami</div>
        <table class="form-table">
            <tr>
                <td>Nama Lengkap<span class="required">*</span></td>
                <td>:</td>
                <td><input type="text" name="nama_lengkap_suami" required placeholder="Nama Lengkap Suami" /></td>
            </tr>
            <tr>
                <td>NIK <span class="required">*</span></td>
                <td>:</td>
                <td><input type="text" name="nik_suami" required placeholder="16 digit NIK" maxlength="16" /></td>
            </tr>
            <tr>
                <td>Tempat / Tanggal Lahir <span class="required">*</span></td>
                <td>:</td>
                <td>
                    <div class="inline-inputs">
                        <input type="text" name="tempat_lahir_suami" required placeholder="Tempat Lahir" />
                        <input type="date" name="tanggal_lahir_suami" required />
                    </div>
                </td>
            </tr>
            <tr>
                <td>Pekerjaan <span class="required">*</span></td>
                <td>:</td>
                <td><input type="text" name="pekerjaan_suami" placeholder="Pekerjaan Suami" /></td>
            </tr>
            <tr>
                <td>Agama <span class="required">*</span></td>
                <td>:</td>
                <td>
                    <select name="agama_suami" required>
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
                <td><input type="text" name="rt_suami" placeholder="RT" /></td>
            </tr>
            <tr>
                <td>
                    RW
                </td>
                <td>
                    :
                </td>
                <td><input type="text" name="rw_suami" placeholder="RW" /></td>
            </tr>
            <tr>
                <td>Desa <span class="required">*</span></td>
                <td>:</td>
                <td>
                    <input type="text" name="desa_suami" placeholder="Desa">
                </td>
            </tr>
            <tr>
                <td>Kecamatan <span class="required">*</span></td>
                <td>:</td>
                <td>
                    <input type="text" name="kecamatan_suami" placeholder="Kecamatan">
                </td>
            </tr>
            <tr>
                <td>Alamat/Tempat Tinggal <span class="required">*</span></td>
                <td>:</td>
                <td>
                    <textarea name="alamat_suami" required placeholder="Alamat Lengkap Suami"></textarea>
                </td>
            </tr>
        </table>

        <!-- Section: Data Istri -->
        <div class="section-title">Data Istri</div>
        <table class="form-table">
            <tr>
                <td>Nama Lengkap<span class="required">*</span></td>
                <td>:</td>
                <td><input type="text" name="nama_lengkap_istri" required placeholder="Nama Lengkap Istri" /></td>
            </tr>
            <tr>
                <td>NIK <span class="required">*</span></td>
                <td>:</td>
                <td><input type="text" name="nik_istri" required placeholder="16 digit NIK" maxlength="16" /></td>
            </tr>
            <tr>
                <td>Tempat / Tanggal Lahir <span class="required">*</span></td>
                <td>:</td>
                <td>
                    <div class="inline-inputs">
                        <input type="text" name="tempat_lahir_istri" required placeholder="Tempat Lahir" />
                        <input type="date" name="tanggal_lahir_istri" required />
                    </div>
                </td>
            </tr>
            <tr>
                <td>Pekerjaan <span class="required">*</span></td>
                <td>:</td>
                <td><input type="text" name="pekerjaan_istri" placeholder="Pekerjaan Istri" /></td>
            </tr>
            <tr>
                <td>Agama <span class="required">*</span></td>
                <td>:</td>
                <td>
                    <select name="agama_istri" required>
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
                <td><input type="text" name="rt_istri" placeholder="RT" /></td>
            </tr>
            <tr>
                <td>
                    RW
                </td>
                <td>
                    :
                </td>
                <td><input type="text" name="rw_istri" placeholder="RW" /></td>
            </tr>
            <tr>
                <td>Desa <span class="required">*</span></td>
                <td>:</td>
                <td>
                    <input type="text" name="desa_istri" placeholder="Desa">
                </td>
            </tr>
            <tr>
                <td>Kecamatan <span class="required">*</span></td>
                <td>:</td>
                <td>
                    <input type="text" name="kecamatan_istri" placeholder="Kecamatan">
                </td>
            </tr>
            <tr>
                <td>Alamat/Tempat Tinggal <span class="required">*</span></td>
                <td>:</td>
                <td>
                    <textarea name="alamat_istri" required placeholder="Alamat Lengkap Istri"></textarea>
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
