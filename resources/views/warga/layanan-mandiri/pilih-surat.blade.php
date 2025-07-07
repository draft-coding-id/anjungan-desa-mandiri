<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $warga->nama_lengkap }} - Anjungan Desa Mandiri Desa Rawapanjang</title>
    <link rel="icon" href="{{asset('assets/logo.png')}}" type="image/png">
    {{--
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}"> --}}
    <style>
        body {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: sans-serif;
            overflow-x: hidden;
            background-image: url('{{asset('assets/BackgroundMockupAnjungan.png') }}');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            overflow-y: auto;
            height: 100vh;
        }

        main {
            display: flex;
            flex-direction: column;
            justify-content: center;
            gap: 100px;
            align-items: center;
            /* height: 100vh; */
        }

        h1 {
            text-align: center;
            font-size: 24px;
        }

        h3 {
            text-align: center;
            font-size: 18px;
            color: #000;
        }

        .header-wrapper {
            position: relative;
            display: flex;
            width: 90%;
            /* justify-content: right; */
            align-items: center;
            padding-top: 50px;
        }

        .header p {
            font-size: 24px;
            font-weight: bold;
            color: #000;
        }

        /* Tombol pojok kanan atas */
        .header-btn-position {
            width: 200px;
            position: absolute;
            right: 5%;
            top: 65%;
            transform: translateY(-50%);
        }



        .button-container-wrapper {
            overflow-x: auto;
            max-width: 100%;
        }

        .button-container {
            position: fixed;
            bottom: 0;
            margin: 30px 0;
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 80px;
            padding: 20px;
            padding-top: 0;
            width: max-content;
            z-index: 1000;
        }

        .button-container-wrapper {
            scrollbar-width: none; /* Firefox */
        }

        .button {
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #ff9900;
            color: white;
            padding: 8px 30px;
            border-radius: 24px;
            cursor: pointer;
            text-decoration: none;
            font-weight: bold;
            font-size: 20px;
            text-align: center;
            height: 50px;
            max-width: 200px;
            box-shadow: 8px 8px 12px rgba(255, 255, 255, 0.5);
        }

        .button:hover {
            background-color: #e68a00;
        }

        .select-wrapper {
            position: relative;
            display: inline-block;
            width: 60%;
            font-size: 18px;
            font-weight: bold;
        }

        .select-wrapper select {
            width: 100%;
            font-size: 18px;
            margin: 10px 0;
            padding: 10px 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: white;
            /* -webkit-appearance: none; Menghilangkan tampilan default di Chrome/Safari */
            -moz-appearance: none; /* Menghilangkan tampilan default di Firefox */
            /* appearance: none; Menghilangkan tampilan default */
            cursor: pointer;
        }
    </style>
</head>

<body>
    <main>
        <div class="header-wrapper">
            <div class="header">
                <p>Selamat Datang, {{ $warga->nama_lengkap }}</p>
                <p>Silahkan pilih surat yang ingin Anda ajukan</p>
            </div>
            <a href="/histori-progres-surat" class="header-btn-position button">Histori & Progres Surat</a>
            <a href="{{route('ganti-pin')}}">Ganti PIN</a>
        </div>

        <div class="select-wrapper">
            <label for="kategori-surat">Pilih Kategori Surat</label>
            <select id="kategori-surat" name="kategori-surat" required>
                <option value="">Pilih Kategori</option>
                <option value="layanan-umum">Layanan Umum</option>
                <option value="layanan-kependudukan">Layanan Kependudukan</option>
                <option value="layanan-pernikahan">Layanan Pernikahan</option>
                <option value="layanan-catatan-sipil">Layanan Catatan Sipil</option>
            </select>

            <br><br><br><br>
            
            <label for="jenis-surat">Pilih Jenis Surat</label>
            <select id="jenis-surat" name="jenis-surat" required>

                <option value="">Pilih Jenis Surat</option>

                <option value="/surat-keterangan-pengantar" data-kategori="layanan-kependudukan">Surat Keterangan Pengantar</option>
                <option value="/surat-keterangan-domisili" data-kategori="layanan-kependudukan">Surat Keterangan Domisili</option>
                <option value="/surat-keterangan-wali-hakim" data-kategori="layanan-catatan-sipil">Surat Keterangan Wali Hakim</option>
                <option value="/surat-keterangan-kematian" data-kategori="layanan-catatan-sipil">Surat Keterangan Kematian</option>
            </select>
        </div>

        <div class="button-container">
            <a href="{{route('halaman_utama')}}" class="button">Halaman Utama</a>
        </div>
    </main>
</body>
</html>

<script>
    // Ambil elemen dari kedua dropdown
    const kategoriSuratDropdown = document.getElementById('kategori-surat');
    const jenisSuratDropdown = document.getElementById('jenis-surat');

    // Simpan semua opsi dari dropdown kedua
    const semuaOpsiJenisSurat = jenisSuratDropdown.querySelectorAll('option');

    function filterJenisSurat() {
        // Ambil nilai kategori yang dipilih
        const kategoriTerpilih = kategoriSuratDropdown.value;
        
        // Hapus semua opsi yang ada (kecuali yang pertama)
        // Cara ini lebih bersih daripada show/hide
        while (jenisSuratDropdown.options.length > 1) {
            jenisSuratDropdown.remove(1);
        }
        
        // Reset pilihan dropdown kedua
        jenisSuratDropdown.value = "";

        // Jika ada kategori yang dipilih
        if (kategoriTerpilih) {
            // Loop melalui semua opsi yang sudah disimpan
            semuaOpsiJenisSurat.forEach(option => {
                // Jika data-kategori dari opsi cocok dengan kategori yang dipilih
                if (option.dataset.kategori === kategoriTerpilih) {
                    // Tambahkan opsi tersebut kembali ke dropdown kedua
                    jenisSuratDropdown.add(option.cloneNode(true));
                }
            });
        }
    }

    // Jalankan fungsi filterJenisSurat saat dropdown kategori berubah
    kategoriSuratDropdown.addEventListener('change', filterJenisSurat);

    // Panggil fungsi sekali saat halaman dimuat untuk memastikan keadaan awal benar
    document.addEventListener('DOMContentLoaded', filterJenisSurat);

    // Ambil elemen dropdown berdasarkan ID-nya
    const navigasiDropdown = document.getElementById('jenis-surat');

    // Tambahkan event listener yang akan berjalan saat nilainya berubah
    navigasiDropdown.addEventListener('change', function() {
        // Ambil URL dari value opsi yang dipilih
        const urlTujuan = this.value;

        // Cek apakah URL-nya tidak kosong
        if (urlTujuan) {
            // Arahkan browser ke URL tersebut
            window.location.href = urlTujuan;
        }
    });
</script>