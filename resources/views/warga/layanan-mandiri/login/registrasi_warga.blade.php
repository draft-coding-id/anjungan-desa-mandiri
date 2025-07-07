<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="assets/logo.png" type="image/png">

  <title>Registrasi Warga</title>
  <style>
    body {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      overflow-x: hidden;
    }

    main {
      min-height: 100vh;
      width: 100vw;
      font-family: sans-serif;
      background-image: url('{{asset("assets/BackgroundMockupAnjungan.png")}}');
      background-size: cover;
      background-repeat: no-repeat;
      background-position: center;
      display: flex;
      justify-content: center;
      align-items: center;
      padding: 20px 0;
    }

    .form-container {
      background: rgba(255, 255, 255, 0.95);
      padding: 40px;
      border-radius: 15px;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
      width: 100%;
      max-width: 800px;
      text-align: center;
      margin: 20px;
    }

    .form-title {
      color: #333;
      font-size: 28px;
      font-weight: bold;
      margin-bottom: 30px;
    }

    .form-row {
      display: flex;
      gap: 20px;
      margin-bottom: 20px;
    }

    .form-group {
      flex: 1;
      text-align: left;
    }

    .form-group.full-width {
      flex: 100%;
    }

    .file-input-wrapper {
      position: relative;
      display: inline-block;
      width: 100%;
    }

    .file-input {
      position: absolute;
      opacity: 0;
      width: 0;
      height: 0;
    }

    .file-label {
      display: inline-block;
      padding: 12px 15px;
      background-color: #007bff;
      color: white;
      border-radius: 8px;
      cursor: pointer;
      transition: background-color 0.3s;
      width: 100%;
      text-align: center;
      box-sizing: border-box;
    }

    .file-label:hover {
      background-color: #0056b3;
    }

    .file-selected {
      display: block;
      margin-top: 8px;
      font-size: 14px;
      color: #666;
      font-style: italic;
    }

    label {
      display: block;
      color: #555;
      font-weight: 500;
      margin-bottom: 8px;
      font-size: 14px;
    }

    input[type="text"],
    input[type="email"],
    input[type="password"],
    input[type="date"],
    input[type="file"],
    select,
    textarea {
      width: 100%;
      padding: 12px 15px;
      border: 2px solid #ddd;
      border-radius: 8px;
      font-size: 16px;
      transition: border-color 0.3s;
      box-sizing: border-box;
    }

    input:focus,
    select:focus,
    textarea:focus {
      outline: none;
      border-color: #007bff;
    }

    textarea {
      resize: vertical;
      min-height: 80px;
    }

    .btn {
      width: 100%;
      padding: 12px;
      background-color: #007bff;
      color: white;
      border: none;
      border-radius: 8px;
      font-size: 16px;
      font-weight: 500;
      cursor: pointer;
      transition: background-color 0.3s;
      margin-top: 20px;
    }

    .btn:hover {
      background-color: #0056b3;
    }

    .btn-secondary {
      width: 100%;
      padding: 12px;
      background-color: #6c757d;
      color: white;
      border: none;
      border-radius: 8px;
      font-size: 16px;
      font-weight: 500;
      cursor: pointer;
      transition: background-color 0.3s;
      margin-top: 10px;
      text-decoration: none;
      display: inline-block;
      text-align: center;
      box-sizing: border-box;
    }

    .btn-secondary:hover {
      background-color: #545b62;
    }

    .alert {
      padding: 12px;
      border-radius: 6px;
      margin-bottom: 20px;
      font-size: 14px;
    }

    .alert-success {
      background-color: #d4edda;
      color: #155724;
      border: 1px solid #c3e6cb;
    }

    .alert-error {
      background-color: #f8d7da;
      color: #721c24;
      border: 1px solid #f5c6cb;
    }

    .error-text {
      color: #dc3545;
      font-size: 12px;
      margin-top: 5px;
    }

    .section-title {
      color: #007bff;
      font-size: 18px;
      font-weight: bold;
      margin: 30px 0 15px 0;
      text-align: left;
      border-bottom: 2px solid #007bff;
      padding-bottom: 5px;
    }

    @media (max-width: 768px) {
      .form-row {
        flex-direction: column;
        gap: 0;
      }

      .form-container {
        padding: 20px;
        margin: 10px;
      }
    }
  </style>
</head>

<body>
  <main>
    <div class="form-container">
      <h1 class="form-title">Registrasi Warga</h1>

      @if(session('success'))
      <div class="alert alert-success">
        {{ session('success') }}
      </div>
      @endif

      @if($errors->any())
      <div class="alert alert-error">
        <ul style="margin: 0; padding-left: 20px;">
          @foreach($errors->all() as $error)
          <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
      @endif

      <form action="{{ route('warga.register') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <!-- Data Identitas -->
        <div class="section-title">Data Identitas</div>

        <div class="form-row">
          <div class="form-group">
            <label for="nik">NIK <span style="color: red;">*</span></label>
            <input type="text" id="nik" name="nik" value="{{ old('nik') }}" maxlength="16" required>
            @error('nik')
            <div class="error-text">{{ $message }}</div>
            @enderror
          </div>
          <div class="form-group">
            <label for="pin">PIN <span style="color: red;">*</span></label>
            <input type="password" id="pin" name="pin" onkeypress='return event.charCode >= 48 && event.charCode <= 57' minlength="6" maxlength="6" required>
            @error('pin')
            <div class="error-text">{{ $message }}</div>
            @enderror
          </div>
        </div>

        <div class="form-row">
          <div class="form-group">
            <label for="no_kk">No. Kartu Keluarga</label>
            <input type="text" id="no_kk" name="no_kk" value="{{ old('no_kk') }}" maxlength="16">
            @error('no_kk')
            <div class="error-text">{{ $message }}</div>
            @enderror
          </div>
          <!-- <div class="form-group">
            <label for="file_kk">File Kartu Keluarga</label>
            <div class="file-input-wrapper">
              <input type="file" id="file_kk" name="file_kk" accept=".pdf" class="file-input">
              <label for="file_kk" class="file-label">
                <span class="file-text">Pilih file dengan tipe PDF</span>
              </label>
              <span class="file-selected" id="file_selected"></span>
            </div>
            @error('file_kk')
            <div class="error-text">{{ $message }}</div>
            @enderror
          </div> -->
        </div>

        <!-- Data Pribadi -->
        <div class="section-title">Data Pribadi</div>

        <div class="form-row">
          <div class="form-group full-width">
            <label for="nama_lengkap">Nama Lengkap <span style="color: red;">*</span></label>
            <input type="text" id="nama_lengkap" name="nama_lengkap" value="{{ old('nama_lengkap') }}" required>
            @error('nama_lengkap')
            <div class="error-text">{{ $message }}</div>
            @enderror
          </div>
        </div>

        <div class="form-row">
          <div class="form-group">
            <label for="jenis_kelamin">Jenis Kelamin <span style="color: red;">*</span></label>
            <select id="jenis_kelamin" name="jenis_kelamin" required>
              <option value="">Pilih Jenis Kelamin</option>
              <option value="Laki-laki" {{ old('jenis_kelamin') == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
              <option value="Perempuan" {{ old('jenis_kelamin') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
            </select>
            @error('jenis_kelamin')
            <div class="error-text">{{ $message }}</div>
            @enderror
          </div>
          <div class="form-group">
            <label for="golongan_darah">Golongan Darah <span style="color: red;">*</span></label>
            <select id="golongan_darah" name="golongan_darah" required>
              <option value="">Pilih Golongan Darah</option>
              <option value="A" {{ old('golongan_darah') == 'A' ? 'selected' : '' }}>A</option>
              <option value="B" {{ old('golongan_darah') == 'B' ? 'selected' : '' }}>B</option>
              <option value="AB" {{ old('golongan_darah') == 'AB' ? 'selected' : '' }}>AB</option>
              <option value="O" {{ old('golongan_darah') == 'O' ? 'selected' : '' }}>O</option>
            </select>
            @error('golongan_darah')
            <div class="error-text">{{ $message }}</div>
            @enderror
          </div>
        </div>

        <div class="form-row">
          <div class="form-group">
            <label for="tempat_lahir">Tempat Lahir <span style="color: red;">*</span></label>
            <input type="text" id="tempat_lahir" name="tempat_lahir" value="{{ old('tempat_lahir') }}" required>
            @error('tempat_lahir')
            <div class="error-text">{{ $message }}</div>
            @enderror
          </div>
          <div class="form-group">
            <label for="tanggal_lahir">Tanggal Lahir <span style="color: red;">*</span></label>
            <input type="date" id="tanggal_lahir" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}" required>
            @error('tanggal_lahir')
            <div class="error-text">{{ $message }}</div>
            @enderror
          </div>
        </div>

        <div class="form-row">
          <div class="form-group">
            <label for="agama">Agama <span style="color: red;">*</span></label>
            <select id="agama" name="agama" required>
              <option value="">Pilih Agama</option>
              <option value="Islam" {{ old('agama') == 'Islam' ? 'selected' : '' }}>Islam</option>
              <option value="Kristen" {{ old('agama') == 'Kristen' ? 'selected' : '' }}>Kristen</option>
              <option value="Katolik" {{ old('agama') == 'Katolik' ? 'selected' : '' }}>Katolik</option>
              <option value="Hindu" {{ old('agama') == 'Hindu' ? 'selected' : '' }}>Hindu</option>
              <option value="Buddha" {{ old('agama') == 'Buddha' ? 'selected' : '' }}>Buddha</option>
              <option value="Konghucu" {{ old('agama') == 'Konghucu' ? 'selected' : '' }}>Konghucu</option>
            </select>
            @error('agama')
            <div class="error-text">{{ $message }}</div>
            @enderror
          </div>
          <div class="form-group">
            <label for="status_kawin">Status Perkawinan <span style="color: red;">*</span></label>
            <select id="status_kawin" name="status_kawin" required>
              <option value="">Pilih Status</option>
              <option value="Belum Kawin" {{ old('status_kawin') == 'Belum Kawin' ? 'selected' : '' }}>Belum Kawin</option>
              <option value="Kawin" {{ old('status_kawin') == 'Kawin' ? 'selected' : '' }}>Kawin</option>
              <option value="Cerai Hidup" {{ old('status_kawin') == 'Cerai Hidup' ? 'selected' : '' }}>Cerai Hidup</option>
              <option value="Cerai Mati" {{ old('status_kawin') == 'Cerai Mati' ? 'selected' : '' }}>Cerai Mati</option>
            </select>
            @error('status_kawin')
            <div class="error-text">{{ $message }}</div>
            @enderror
          </div>
        </div>

        <div class="form-row">
          <div class="form-group">
            <label for="pendidikan">Pendidikan <span style="color: red;">*</span></label>
            <select id="pendidikan" name="pendidikan" required>
              <option value="">Pilih Pendidikan</option>
              <option value="Tidak/Belum Sekolah" {{ old('pendidikan') == 'Tidak/Belum Sekolah' ? 'selected' : '' }}>Tidak/Belum Sekolah</option>
              <option value="Belum Tamat SD/Sederajat" {{ old('pendidikan') == 'Belum Tamat SD/Sederajat' ? 'selected' : '' }}>Belum Tamat SD/Sederajat</option>
              <option value="Tamat SD/Sederajat" {{ old('pendidikan') == 'Tamat SD/Sederajat' ? 'selected' : '' }}>Tamat SD/Sederajat</option>
              <option value="SLTP/Sederajat" {{ old('pendidikan') == 'SLTP/Sederajat' ? 'selected' : '' }}>SLTP/Sederajat</option>
              <option value="SLTA/Sederajat" {{ old('pendidikan') == 'SLTA/Sederajat' ? 'selected' : '' }}>SLTA/Sederajat</option>
              <option value="Diploma I/II" {{ old('pendidikan') == 'Diploma I/II' ? 'selected' : '' }}>Diploma I/II</option>
              <option value="Akademi/Diploma III/S.Muda" {{ old('pendidikan') == 'Akademi/Diploma III/S.Muda' ? 'selected' : '' }}>Akademi/Diploma III/S.Muda</option>
              <option value="Diploma IV/Strata I" {{ old('pendidikan') == 'Diploma IV/Strata I' ? 'selected' : '' }}>Diploma IV/Strata I</option>
              <option value="Strata II" {{ old('pendidikan') == 'Strata II' ? 'selected' : '' }}>Strata II</option>
              <option value="Strata III" {{ old('pendidikan') == 'Strata III' ? 'selected' : '' }}>Strata III</option>
            </select>
            @error('pendidikan')
            <div class="error-text">{{ $message }}</div>
            @enderror
          </div>
          <div class="form-group">
            <label for="pekerjaan">Pekerjaan <span style="color: red;">*</span></label>
            <input type="text" id="pekerjaan" name="pekerjaan" value="{{ old('pekerjaan') }}" required>
            @error('pekerjaan')
            <div class="error-text">{{ $message }}</div>
            @enderror
          </div>
        </div>

        <div class="form-row">
          <div class="form-group full-width">
            <label for="kewarganegaraan">Kewarganegaraan <span style="color: red;">*</span></label>
            <select id="kewarganegaraan" name="kewarganegaraan" required>
              <option value="">Pilih Kewarganegaraan</option>
              <option value="WNI" {{ old('kewarganegaraan') == 'WNI' ? 'selected' : '' }}>WNI (Warga Negara Indonesia)</option>
              <option value="WNA" {{ old('kewarganegaraan') == 'WNA' ? 'selected' : '' }}>WNA (Warga Negara Asing)</option>
            </select>
            @error('kewarganegaraan')
            <div class="error-text">{{ $message }}</div>
            @enderror
          </div>
        </div>

        <!-- Data Alamat -->
        <div class="section-title">Data Alamat</div>

        <div class="form-row">
          <div class="form-group">
            <label for="kecamatan">Kecamatan <span style="color: red;">*</span></label>
            <input type="text" id="kecamatan" name="kecamatan" value="{{ old('kecamatan') }}" required>
            @error('kecamatan')
            <div class="error-text">{{ $message }}</div>
            @enderror
          </div>
          <div class="form-group">
            <label for="desa">Desa/Kelurahan <span style="color: red;">*</span></label>
            <input type="text" id="desa" name="desa" value="{{ old('desa') }}" required>
            @error('desa')
            <div class="error-text">{{ $message }}</div>
            @enderror
          </div>
        </div>

        <div class="form-row">
          <div class="form-group">
            <label for="rt">RT <span style="color: red;">*</span></label>
            <input type="text" id="rt" name="rt" value="{{ old('rt') }}" maxlength="3" required>
            @error('rt')
            <div class="error-text">{{ $message }}</div>
            @enderror
          </div>
          <div class="form-group">
            <label for="rw">RW <span style="color: red;">*</span></label>
            <input type="text" id="rw" name="rw" value="{{ old('rw') }}" maxlength="3" required>
            @error('rw')
            <div class="error-text">{{ $message }}</div>
            @enderror
          </div>
        </div>

        <div class="form-row">
          <div class="form-group full-width">
            <label for="alamat">Alamat Lengkap <span style="color: red;">*</span></label>
            <textarea id="alamat" name="alamat" rows="3" required>{{ old('alamat') }}</textarea>
            @error('alamat')
            <div class="error-text">{{ $message }}</div>
            @enderror
          </div>
        </div>

        <button type="submit" class="btn">Daftar</button>
        <a href="{{ route('login-warga') }}" class="btn btn-secondary">Kembali ke Login</a>
      </form>
    </div>
  </main>
  <script>
    document.getElementById('file_kk').addEventListener('change', function() {
      const fileSelected = document.getElementById('file_selected');
      if (this.files[0]) {
        fileSelected.textContent = 'File dipilih: ' + this.files[0].name;
        document.querySelector('.file-text').textContent = 'Ganti file PDF';
      } else {
        fileSelected.textContent = '';
        document.querySelector('.file-text').textContent = 'Pilih file dengan tipe PDF';
      }
    });
  </script>
</body>

</html>