@extends('layout.warga.form-surat')

@section('title', 'Surat Keterangan Menikah')

@section('header-content')
    Surat Keterangan Menikah
@endsection

@section('form-content')
    <x-info-box :message="'Silakan lengkapi data berikut untuk pembuatan Surat Keterangan Menikah.'" />

    <form action="{{ route('submitForm') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="jenis_surat" value="SKM">
        <input type="hidden" name="warga_id" value="{{ $warga->id }}">

        <!-- Section: Data Pribadi -->
        <div class="section-title">Data Pribadi</div>
        <table class="form-table">
            <tr>
                <td>Nama Lengkap <span class="required">*</span></td>
                <td>:</td>
                <td>
                    <input type="text" name="nama_lengkap" value="{{ $warga->nama_lengkap }}" readonly />
                </td>
            </tr>
            <tr>
                <td>NIK <span class="required">*</span></td>
                <td>:</td>
                <td>
                    <input type="text" name="nik" value="{{ $warga->nik }}" readonly />
                </td>
            </tr>
            <tr>
                <td>Tempat Lahir <span class="required">*</span></td>
                <td>:</td>
                <td>
                    <input type="text" name="tempat_lahir" value="{{ $warga->tempat_lahir }}" readonly>
                </td>
            </tr>
            <tr>
                <td>Tanggal Lahir <span class="required">*</span></td>
                <td>:</td>
                <td>
                    <input type="date" name="tanggal_lahir" value="{{ $warga->tanggal_lahir }}" readonly>
                </td>
            </tr>
            <tr>
                <td>Jenis Kelamin <span class="required">*</span></td>
                <td>:</td>
                <td>
                    <input type="text" name="jenis_kelamin" value="{{ $warga->jenis_kelamin }}" readonly />
                </td>
            </tr>
            <tr>
                <td>Agama <span class="required">*</span></td>
                <td>:</td>
                <td>
                    <input type="text" name="agama" value="{{ $warga->agama }}" readonly />
                </td>
            </tr>
            <tr>
                <td>Status <span class="required">*</span></td>
                <td>:</td>
                <td>
                    <input type="text" name="status_kawin" value="{{ $warga->status_kawin }}" readonly />
                </td>
            </tr>
            <tr>
                <td>Pekerjaan <span class="required">*</span></td>
                <td>:</td>
                <td>
                    <input type="text" name="pekerjaan" value="{{ $warga->pekerjaan }}" readonly />
                </td>
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
                <td>Desa</td>
                <td>:</td>
                <td>
                    <input type="text" name="desa" value="{{ $warga->desa ?? '' }}" readonly>
                </td>
            </tr>
            <tr>
                <td>Kecamatan <span class="required">*</span></td>
                <td>:</td>
                <td>
                    <input type="text" name="kecamatan" value="{{ $warga->kecamatan }}" readonly>
                </td>
            </tr>
            <tr>
                <td>Alamat/Tempat Tinggal <span class="required">*</span></td>
                <td>:</td>
                <td>
                    <textarea name="alamat" readonly>{{ $warga->alamat ?? '' }}</textarea>
                </td>
            </tr>
        </table>
        <div class="section-title">DATA PASANGAN</div>
        <table class="form-table">
            <tr>
                <td>Nama Lengkap<span class="required">*</span></td>
                <td>:</td>
                <td><input type="text" name="nama_lengkap_pasangan" required placeholder="Nama Lengkap Pasangan" /></td>
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
                        <input type="text" name="tempat_lahir_pasangan" required placeholder="Tempat lahir" />
                        <input type="date" name="tanggal_lahir_pasangan" required />
                    </div>
                </td>
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
                <td>Pekerjaan</td>
                <td>:</td>
                <td><input type="text" name="pekerjaan_pasangan" placeholder="Pekerjaan pasangan" /></td>
            </tr>
            <tr>
                <td>Alamat/Tempat Tinggal <span class="required">*</span></td>
                <td>:</td>
                <td>
                    <textarea name="alamat_pasangan" required placeholder="Alamat lengkap pasangan"></textarea>
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
        </table>

        <div class="button-container">
            <a href="{{ route('layanan-kependudukan') }}" class="button secondary">Kembali</a>
            <button type="submit" class="button">Lanjutkan</button>
        </div>
    </form>
@endsection
