<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Keterangan Kematian</title>
    <style>
        body {
            margin: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-image: linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3)), url('assets/BackgroundMockupAnjungan.png');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .header {
            text-align: center;
            border-bottom: 2px solid #ffffff;
            padding: 20px;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(5px);
        }

        .header h2 {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 28px;
            margin: 0;
            color: #333;
            text-shadow: 2px 2px 0 white, -2px 2px 0 white, 2px -2px 0 white, -2px -2px 0 white;
        }

        .form-container {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: flex-start;
            padding: 20px;
        }

        .form-wrapper {
            width: 90%;
            max-width: 1000px;
            background: rgba(255, 255, 255, 0.95);
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
            border: 3px solid #ff9900;
            max-height: 80vh;
            overflow-y: auto;
        }

        .section-title {
            font-size: 20px;
            font-weight: bold;
            color: #ff9900;
            margin: 30px 0 20px 0;
            padding: 10px;
            background: linear-gradient(135deg, #fff8f0 0%, #ffe8cc 100%);
            border-left: 5px solid #ff9900;
            border-radius: 5px;
        }

        .form-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        .form-table td {
            padding: 12px 8px;
            vertical-align: top;
        }

        .form-table td:first-child {
            width: 300px;
            font-weight: 500;
            color: #333;
        }

        .form-table td:nth-child(2) {
            width: 20px;
            text-align: center;
        }

        .form-table input[type="text"],
        .form-table input[type="date"],
        .form-table input[type="tel"],
        .form-table input[type="file"],
        .form-table select,
        .form-table textarea {
            width: 100%;
            padding: 10px;
            border: 2px solid #ddd;
            border-radius: 8px;
            font-size: 14px;
            transition: border-color 0.3s ease;
            box-sizing: border-box;
        }

        .form-table input[type="text"]:focus,
        .form-table input[type="date"]:focus,
        .form-table input[type="tel"]:focus,
        .form-table select:focus,
        .form-table textarea:focus {
            outline: none;
            border-color: #ff9900;
            box-shadow: 0 0 5px rgba(255, 153, 0, 0.3);
        }

        .form-table input[readonly] {
            background-color: #f8f9fa;
            color: #666;
        }

        .form-table textarea {
            resize: vertical;
            min-height: 80px;
        }

        .inline-inputs {
            display: flex;
            gap: 10px;
        }

        .inline-inputs input {
            flex: 1;
        }

        .submit-button {
            background: linear-gradient(135deg, #ff9900 0%, #e68a00 100%);
            color: white;
            padding: 15px 40px;
            border: none;
            border-radius: 10px;
            font-size: 18px;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(255, 153, 0, 0.3);
        }

        .submit-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(255, 153, 0, 0.4);
        }

        .required {
            color: #dc3545;
        }

        .info-box {
            background: #e8f4fd;
            border: 1px solid #bee5eb;
            border-radius: 8px;
            padding: 15px;
            margin-bottom: 20px;
            color: #0c5460;
        }

        .info-box h4 {
            margin: 0 0 10px 0;
            color: #0c5460;
        }

        @media (max-width: 768px) {
            .form-wrapper {
                width: 95%;
                padding: 20px;
            }

            .form-table td:first-child {
                width: auto;
                display: block;
                padding-bottom: 5px;
            }

            .form-table td:nth-child(2) {
                display: none;
            }

            .form-table td:nth-child(3) {
                display: block;
                width: 100%;
            }

            .inline-inputs {
                flex-direction: column;
            }
        }
    </style>
</head>

<body>
    <div class="header">
        <h2>Surat Keterangan Kematian</h2>
    </div>

    <div class="form-container">
        <div class="form-wrapper">
            @if(session('error'))
            <div
                style="background-color: #f8d7da; color: #721c24; padding: 15px; border-radius: 8px; margin-bottom: 20px; border: 1px solid #f5c6cb;">
                <strong>Error:</strong> {{ session('error') }}
            </div>
            @endif
            <div class="info-box">
                <h4>Informasi Penting:</h4>
                <p>Silakan lengkapi data berikut untuk pembuatan Surat Keterangan Kematian. Data yang sudah terisi akan diambil
                    dari profil Anda. <span class="required">*</span> menandakan field yang wajib diisi.</p>
            </div>

            <form action="{{ route('submitForm') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <input type="hidden" name="jenis_surat" value="SKK">
                <input type="hidden" name="warga_id" value="{{ $warga->id }}">

                <!-- Data Pemohon -->
                <div class="section-title">A. DATA PEMOHON (Yang Mengajukan Surat)</div>
                <table class="form-table">
                    <tr>
                        <td>Nama Lengkap</td>
                        <td>:</td>
                        <td><input type="text" name="nama_lengkap" value="{{$warga->nama_lengkap}}" readonly /></td>
                    </tr>
                    <tr>
                        <td>NIK</td>
                        <td>:</td>
                        <td><input type="text" name="nik" value="{{$warga->nik}}" readonly /></td>
                    </tr>
                    <tr>
                        <td>Tempat / Tanggal Lahir</td>
                        <td>:</td>
                        <td>
                            <div class="inline-inputs">
                                <input type="text" name="tempat_lahir" value="{{$warga->tempat_lahir}}" readonly />
                                <input type="date" name="tanggal_lahir" value="{{$warga->tanggal_lahir}}" readonly />
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Jenis Kelamin</td>
                        <td>:</td>
                        <td><input type="text" name="jenis_kelamin" value="{{$warga->jenis_kelamin}}" readonly /></td>
                    </tr>
                    <tr>
                        <td>Agama</td>
                        <td>:</td>
                        <td><input type="text" name="agama" value="{{$warga->agama}}" readonly /></td>
                    </tr>
                    <tr>
                        <td>Pekerjaan</td>
                        <td>:</td>
                        <td><input type="text" name="pekerjaan" value="{{$warga->pekerjaan}}" readonly /></td>
                    </tr>
                    <tr>
                        <td>Kewarganegaraan <span class="required">*</span></td>
                        <td>:</td>
                        <td>
                            <select name="kewarganegaraan">
                                <option value="WNI" selected>WNI</option>
                                <option value="WNA">WNA</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            RT
                        </td>
                        <td>
                            :
                        </td>
                        <td><input type="text" name="rt" value="{{$warga->rt}}" readonly /></td>
                    </tr>
                    <tr>
                        <td>
                            RW
                        </td>
                        <td>
                            :
                        </td>
                        <td><input type="text" name="rw" value="{{$warga->rw}}" readonly /></td>
                    </tr>
                    <tr>
                        <td>Alamat/Tempat Tinggal</td>
                        <td>:</td>
                        <td><textarea name="alamat" readonly>{{$warga->alamat}}</textarea></td>
                    </tr>
                    <tr>
                        <td>No. HP <span class="required">*</span></td>
                        <td>:</td>
                        <td><input type="tel" name="no_hp" required placeholder="Contoh: 081234567890" /></td>
                    </tr>
                </table>

                <!-- Data Orang yang Meninggal -->
                <div class="section-title">B. DATA ORANG YANG MENINGGAL DUNIA</div>
                <table class="form-table">
                    <tr>
                        <td>Nama Lengkap <span class="required">*</span></td>
                        <td>:</td>
                        <td><input type="text" name="almarhum_nama" required placeholder="Nama lengkap almarhum/almarhumah" /></td>
                    </tr>
                    <tr>
                        <td>NIK <span class="required">*</span></td>
                        <td>:</td>
                        <td><input type="text" name="almarhum_nik" required placeholder="16 digit NIK" maxlength="16" /></td>
                    </tr>
                    <tr>
                        <td>Tempat / Tanggal Lahir <span class="required">*</span></td>
                        <td>:</td>
                        <td>
                            <div class="inline-inputs">
                                <input type="text" name="almarhum_tempat_lahir" required placeholder="Tempat lahir" />
                                <input type="date" name="almarhum_tanggal_lahir" required />
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Jenis Kelamin <span class="required">*</span></td>
                        <td>:</td>
                        <td>
                            <select name="almarhum_jenis_kelamin" required>
                                <option value="">Pilih Jenis Kelamin</option>
                                <option value="Laki-laki">Laki-laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Agama <span class="required">*</span></td>
                        <td>:</td>
                        <td>
                            <select name="almarhum_agama" required>
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
                        <td><input type="text" name="almarhum_pekerjaan" placeholder="Pekerjaan almarhum/almarhumah" /></td>
                    </tr>
                    <tr>
                        <td>Kewarganegaraan</td>
                        <td>:</td>
                        <td>
                            <select name="almarhum_kewarganegaraan">
                                <option value="WNI" selected>WNI</option>
                                <option value="WNA">WNA</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Alamat/Tempat Tinggal <span class="required">*</span></td>
                        <td>:</td>
                        <td><textarea name="almarhum_alamat" required placeholder="Alamat lengkap almarhum/almarhumah"></textarea>
                        </td>
                    </tr>
                </table>

                <!-- Data Kematian -->
                <div class="section-title">C. DATA KEMATIAN</div>
                <table class="form-table">
                    <tr>
                        <td>Tanggal Meninggal <span class="required">*</span></td>
                        <td>:</td>
                        <td><input type="date" name="tanggal_meninggal" required /></td>
                    </tr>
                    <tr>
                        <td>Tempat Meninggal <span class="required">*</span></td>
                        <td>:</td>
                        <td><input type="text" name="tempat_meninggal" required placeholder="Contoh: Rumah Sakit, Rumah, dll" />
                        </td>
                    </tr>
                    <tr>
                        <td>Sebab Kematian</td>
                        <td>:</td>
                        <td><input type="text" name="sebab_kematian" placeholder="Penyebab kematian (opsional)" /></td>
                    </tr>
                </table>

                <!-- Hubungan dengan Almarhum -->
                <div class="section-title">D. HUBUNGAN DENGAN ALMARHUM/ALMARHUMAH</div>
                <table class="form-table">
                    <tr>
                        <td>Hubungan Keluarga <span class="required">*</span></td>
                        <td>:</td>
                        <td>
                            <select name="hubungan_keluarga" required>
                                <option value="">Pilih Hubungan</option>
                                <option value="Ayah">Ayah</option>
                                <option value="Ibu">Ibu</option>
                                <option value="Suami">Suami</option>
                                <option value="Istri">Istri</option>
                                <option value="Anak">Anak</option>
                                <option value="Saudara">Saudara</option>
                                <option value="Keponakan">Keponakan</option>
                                <option value="Lainnya">Lainnya</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Keterangan Hubungan</td>
                        <td>:</td>
                        <td><input type="text" name="keterangan_hubungan" placeholder="Jelaskan hubungan jika memilih 'Lainnya'" />
                        </td>
                    </tr>
                </table>

                <!-- Dokumen Pendukung -->
                <div class="section-title">E. DOKUMEN PENDUKUNG</div>
                <table class="form-table">
                    <tr>
                        <td>Fotokopi/Foto KK <span class="required">*</span></td>
                        <td>:</td>
                        <td><input type="file" name="file" required /></td>
                    </tr>
                </table>

                <!-- Keperluan -->
                <div class="section-title">F. KEPERLUAN SURAT</div>
                <table class="form-table">
                    <tr>
                        <td>Keperluan <span class="required">*</span></td>
                        <td>:</td>
                        <td>
                            <select name="keperluan" required>
                                <option value="">Pilih Keperluan</option>
                                <option value="Administrasi Pemakaman">Administrasi Pemakaman</option>
                                <option value="Klaim Asuransi">Klaim Asuransi</option>
                                <option value="Pengurusan Warisan">Pengurusan Warisan</option>
                                <option value="Administrasi Bank">Administrasi Bank</option>
                                <option value="Lainnya">Lainnya</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Keterangan Keperluan</td>
                        <td>:</td>
                        <td><textarea name="keterangan_keperluan" placeholder="Jelaskan keperluan secara detail"></textarea></td>
                    </tr>
                </table>

                <table class="form-table">
                    <tr>
                        <td colspan="3" style="text-align: center; padding-top: 30px;">
                            <button type="submit" class="submit-button">Submit Permohonan</button>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</body>

</html>