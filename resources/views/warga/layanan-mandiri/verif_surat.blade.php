<!DOCTYPE html>
<html>

<head>
  <title>Preview Surat</title>
  <style>
    body {
      font-family: sans-serif;
      /* color: white; */
      background-image: url('{{ asset('assets/BackgroundMockupAnjungan.png') }}');
      background-size: cover;
      background-repeat: no-repeat;
      background-position: center;
      margin: 30px;
      display: flex;
      flex-direction: column;
      align-items: center;
    }

    .container {
      display: flex;
      flex-direction: column;
      align-items: center;
      width: 80%;
      background-color: rgba(255, 255, 255, 0.8);
      padding: 30px;
      margin-top: 50px;
      border: 3px solid #000000;
      border-radius: 60px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .header {
      padding: 10px;
      text-align: center;
      margin-bottom: 20px;
    }

    .preview-container {
      border: 1px solid #ddd;
      padding: 10px;
      width: 900px;
      height: 500px;
    }

    .form {
      margin-top: 30px;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .form input[type="string"] {
      padding: 10px;
      margin-left: 10px;
      border: 1px solid #000000;
      width: 300px;
      border-radius: 8px;
    }

    .button-container {
      text-align: center;
      margin: 20px;
    }

    .button {
      background-color: orange;
      color: white;
      border: 1px solid #ffffff;
      padding: 10px 20px;
      font-size: 16px;
      border-radius: 5px;
      cursor: pointer;
      margin: 0 10px;
    }

    .button:hover {
      background-color: darkorange;
    }

    .lightbox_container {
      display: none;
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.7);
      justify-content: center;
      align-items: center;
      color: #333;
    }

    .lightbox_container.show {
      display: flex;
    }

    .lightbox_content {
      background: white;
      padding: 20px 40px;
      border-radius: 10px;
      text-align: center;
    }

    .lightbox_content button {
      margin: 20px 10px;
    }
  </style>
</head>

<body>
  <div class="container">
    <div class="header">
      <h2>
        {{ $proses_surat['nama_jenis_surat'] }}
      </h2>
      <h3>Apakah data yang Anda masukkan sudah sesuai?</h3>
    </div>
    <div class="preview-container">
      @if ($proses_surat['jenis_surat'] == 'SKD')
      <iframe src="/skd" width="100%" height="100%"></iframe>
      @elseif ($proses_surat['jenis_surat'] == 'SKP')
      <iframe src="/skp" width="100%" height="100%"></iframe>
      @elseif ($proses_surat['jenis_surat'] == "SKPP")
      <iframe src="/skpp" width="100%" height="100%"></iframe>
      @elseif ($proses_surat['jenis_surat'] == "SPKK")
      <iframe src="/spkk" width="100%" height="100%"></iframe>
      @elseif ($proses_surat['jenis_surat'] == "SKPG")
      <iframe src="/skpg" width="100%" height="100%"></iframe>
      @elseif ($proses_surat['jenis_surat'] == 'SIK')
      <iframe src="/sik" width="100%" height="100%"></iframe>
      @elseif ($proses_surat['jenis_surat'] == 'SKTM')
      <iframe src="/sktm" width="100%" height="100%"></iframe>
      @elseif ($proses_surat['jenis_surat'] == 'SKKTP')
      <iframe src="/skktp" width="100%" height="100%"></iframe>
      @elseif ($proses_surat['jenis_surat'] == 'SKWH')
      <iframe src="/skwh" width="100%" height="100%"></iframe>
      @elseif ($proses_surat['jenis_surat'] == 'SKM')
      <iframe src="/skm" width="100%" height="100%"></iframe>
      @elseif ($proses_surat['jenis_surat'] == 'SPC')
      <iframe src="/spc" width="100%" height="100%"></iframe>
      @elseif ($proses_surat['jenis_surat'] == 'SKW')
      <iframe src="/skw" width="100%" height="100%"></iframe>
      @elseif ($proses_surat['jenis_surat'] == 'SKK')
      <iframe src="/skk" width="100%" height="100%"></iframe>
      @elseif ($proses_surat['jenis_surat'] == "SPMAK")
      <iframe src="/spmak" width="100%" height="100%"></iframe>
      @elseif ($proses_surat['jenis_surat'] == "SPJD")
      <iframe src="/spjd" width="100%" height="100%"></iframe>
      @elseif ($proses_surat['jenis_surat'] == "SPPKK")
      <iframe src="/sppkk" width="100%" height="100%"></iframe>
      @endif
    </div>
    <form action="#" method="POST">
      @csrf
      <p>(Bila surat sudah selesai diproses akan kami hubungi ke nomor yang Anda masukkan)</p>
      <div class="button-container">
        <a href="javascript:history.back()" class="button">Kembali</a>
        <button type="button" class="button" id="openLightbox">Lanjutkan</button>
      </div>
    </form>

    <div class="lightbox_container" id="lightbox">
      <div class="lightbox_content">
        <h2>Ajukan Surat Ini?</h2>
        <p>Surat akan dilanjutkan ke Kepala Desa untuk diberikan persetujuan.</p>
        <button class="button" id="cancelButton">Kembali</button>
        <button class="button" id="confirmButton">Lanjutkan</button>
      </div>
    </div>

  </div>

  <script>
    document.addEventListener("DOMContentLoaded", function() {
      const lightbox = document.getElementById('lightbox');
      const openLightboxButton = document.getElementById('openLightbox');
      const noHp = document.getElementById('no_hp');
      const cancelButton = document.getElementById('cancelButton');
      const confirmButton = document.getElementById('confirmButton');
      // Menampilkan lightbox saat tombol "Lanjutkan" diklik
      openLightboxButton.addEventListener('click', function() {
        lightbox.classList.add('show');
      });

      // Menutup lightbox saat tombol "Kembali" diklik
      cancelButton.addEventListener('click', function() {
        lightbox.classList.remove('show');
      });

      // Menangani aksi saat tombol "Lanjutkan" diklik
      confirmButton.addEventListener('click', function() {
        window.location.href = '/berhasil/';
      });

      // Menutup lightbox saat area luar lightbox-content diklik
      lightbox.addEventListener('click', (event) => {
        if (event.target === lightbox) {
          lightbox.classList.remove('show');
        }
      });
    })
  </script>
</body>

</html>