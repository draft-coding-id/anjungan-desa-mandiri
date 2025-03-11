<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verifikasi Admin - Laman Admin Desa Rawapanjang</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            display: flex;
            background-color: #f4f4f4;
        }

        /* Sidebar Styles */
        .sidebar {
            width: 250px;
            background-color: #fff;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
        }

        .sidebar-header {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            background: linear-gradient(to right, #FF8A00 50%, #F7E700);
            padding: 30px 20px 10px;
        }

        .sidebar-nav {
            padding: 10px;
        }

        .nav-link {
            display: block;
            color: #333;
            border: 1px solid #FFFFFF;
            font-size: 14px;
            text-decoration: none;
            padding: 10px;
            border-radius: 5px;
            transition: 0.5s;
        }

        .nav-link:hover {
            border: 1px solid #FFA500;
            /* Mengatur border solid dengan warna oranye */
            background: white;
            color: #FFA500;
            /* Warna teks */
        }

        .nav-link.active {
            background: linear-gradient(to right, #FF8A00 50%, #F7E700);
            color: white;
            /* Warna teks */
            font-weight: bold;
        }

        /* Main Content Styles */
        .main-content {
            flex-grow: 1;
        }

        .header {
            background-color: #FFA500;
            background: linear-gradient(to left, #FF8A00 50%, #F7E700);
            padding-left: 20px;
            display: flex;
            align-items: center;
        }

        .path {
            padding: 0px 30px;
        }

        .menu-surat {
            padding: 0 50px;
            display: flex;
            align-items: center;
            border-bottom: 2px solid #333;
        }

        .menu-surat a {
            border: 1px solid #f4f4f4;
            /* border-left: 0.25px solid #D9D9D9;
                border-right: 0.25px solid #D9D9D9; */
            padding: 7px 20px;
            cursor: pointer;
            color: #333;
            border-radius: 0px;
            background-color: #f4f4f4;
            text-decoration: none;
            font-size: 14px;
            letter-spacing: 0.5px;
        }

        .menu-surat a:hover {
            background-color: #f4f4f4;
            border-radius: 10px 10px 0px 0px;
            border: 1px solid #FFA500;
            color: #FFA500;
        }

        .menu-surat a.active {
            background-color: #FF8A00;
            border: 1px solid #FF8A00;
            border-radius: 10px 10px 0px 0px;
            color: white;
            font-weight: bold;
        }

        .content {
            padding: 0px 30px;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .table th,
        .table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        .table th {
            background-color: #f2f2f2;
        }

        .preview-container {
            margin: auto;
            border: 1px solid #ddd;
            padding: 10px;
            width: 900px;
            height: 500px;
        }

        .button-container {
            text-align: center;
            margin: 50px;
        }

        button {
            background-color: #FFA500;
            color: white;
            border: 1px solid #ffffff;
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
            margin: 0 10px;
        }

        button:hover {
            background-color: #e68a00;
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
            width: 500px;
        }

        .lightbox_content button {
            margin: 20px 10px;
        }

        .btn {
            color: #333;
            letter-spacing: 0.3px;
        }

        .lightbox_content h2 {
            margin-bottom: 30px;
        }

        .lightbox_content p {
            line-height: 1.5;
        }
    </style>
</head>

<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="sidebar-header">
            <img src="profile-photo.png" alt="Foto Akun" class="rounded-circle mb-2" width="100">
            <h4>Admin Desa</h4>
            <p>Desa Rawapanjang <br> Kabupaten Bogor</p>
        </div>
        <div class="sidebar-nav">
            <a href=/beranda class="nav-link">Beranda</a>
            <a href=/info-desa class="nav-link">Informasi Desa</a>
            <a href=/data-warga class="nav-link">Data Warga</a>
            <a href=/statistik class="nav-link">Statistik Desa</a>
            <a href=/layanan-surat class="nav-link active">Layanan Surat</a>
            <a href=/pengumuman class="nav-link">Pengumuman</a>
            <a href=/artikel-desa class="nav-link">Artikel Desa</a>
            <a href=/agenda class="nav-link">Agenda Desa</a>
            <a href=/pengaturan-akun class="nav-link">Pengaturan Akun</a>
            <a href=/admin class="nav-link">Logout</a>
        </div>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <div class="header">
            <h3>Desa Rawapanjang, Kabupaten Bogor</h3>
        </div>

        <div class="path">
            <h4>Layanan Surat > Dalam Proses > Judul Surat</h4>
        </div>

        <div class="menu-surat">
            <a href=/kelola-surat>Kelola Surat</a>
            <a href=/layanan-surat>Dalam Proses</a>
            <a href=/surat-ditolak>Arsip Surat Ditolak</a>
            <a href=/riwayat-surat>Riwayat</a>
        </div>

        <div class="content">
            <div class="mt-4">
                <h3>Judul Surat</h3>
                <h3>{{$surat->nama_lengkap}}</h3>
                <p>diajukan pada {{ $surat->created_at->translatedFormat('d F Y') }}</p>
            </div>
            <div class="preview-container">
                <iframe src="{{route('get-detail-skd' , $surat->id)}}" width="100%" height="100%"></iframe>
            </div>

            <div class="button-container">
                <button id="openDeniedLightbox">Tolak</button>
                <button id="openVerifLightbox">Verifikasi</button>
            </div>

            <!-- Kondisi Surat Diverifikasi -->
            <div class="lightbox_container" id="verifLightbox">
                <div class="lightbox_content">
                    <h2>Verifikasi Pengajuan Surat?</h2>
                    <p>Setelah diverifikasi, surat ini akan diserahkan kepada kepala desa untuk diberikan persetujuan.
                    </p>
                    <button id="v_cancelButton">Kembali</button>
                    <button type="button" id="verifButton">Verifikasi</button>
                </div>
            </div>

            <div class="lightbox_container" id="doneVerifLightbox">
                <div class="lightbox_content">
                    <h2>Verifikasi Surat Berhasil</h2>
                    <p>Surat akan dilanjutkan ke Kepala Desa untuk diberikan persetujuan.</p>
                    <!-- Menangani aksi saat tombol "Verifikasi" diklik -->
                    <form action="{{route('diverifikasi.admin' , $surat->id)}}" method="POST">
                        @csrf
                        <input type="hidden" name="status" value="diverifikasi">
                        <input type="hidden" name="warga_id" value="{{$surat->warga_id}}">
                        <button type="submit">Lanjutkan</button>
                    </form>
                </div>
            </div>
            <!--  -->
            <!-- Kondisi Surat Ditolak -->
            <div class="lightbox_container" id="deniedLightbox">
                <div class="lightbox_content">
                    <h2>Tolak Pengajuan Surat?</h2>
                    <p>Silahkan pilih alasan yang paling sesuai.</p>
                    <button id="d_cancelButton">Kembali</button>
                    <button id="denyButton">Tolak</button>
                </div>
            </div>

            <div class="lightbox_container" id="doneDenyLightbox">
                <div class="lightbox_content">
                    <h2>Pengajuan Surat Ditolak</h2>
                    <p>Mohon hubungi warga untuk memberi kabar.</p>
                    <!-- Menangani aksi saat tombol "Verifikasi" diklik -->
                    <form action="{{route('surat.ditolak' , $surat->id)}}" method="POST">
                        @csrf
                        <input type="hidden" name="status" value="ditolak">
                        <button type="submit">Pergi ke Arsip</button>
                    </form>
                    {{-- <br><a href=/layanan-surat class="btn">Atau Kembali</a> --}}
                </div>
            </div>
            <!--  -->
        </div>
    </div>
    <script>
        // Kondisi Surat Diverifikasi
                const openVerifLightboxButton = document.getElementById('openVerifLightbox');
                const verifLightbox = document.getElementById('verifLightbox');
                const doneVerifLightbox = document.getElementById('doneVerifLightbox');
                const v_cancelButton = document.getElementById('v_cancelButton');
                const verifButton = document.getElementById('verifButton');

                // Menampilkan lightbox saat tombol "Verifikasi" diklik
                openVerifLightboxButton.addEventListener('click', () => {
                    verifLightbox.classList.add('show');
                });

                // Menutup lightbox saat tombol "Kembali" diklik
                v_cancelButton.addEventListener('click', () => {
                    verifLightbox.classList.remove('show');
                });

                // Beralih menampilkan lightbox verifikasi berhasil
                verifButton.addEventListener('click', () => {
                    verifLightbox.classList.remove('show');
                    doneVerifLightbox.classList.add('show');
                });

                // Menutup lightbox saat area luar lightbox-content diklik
                verifLightbox.addEventListener('click', (event) => {
                    if (event.target === verifLightbox) {
                        verifLightbox.classList.remove('show');
                    }
                });

            // ---
            // Kondisi Surat Ditolak
                const openDeniedLightboxButton = document.getElementById('openDeniedLightbox');
                const deniedLightbox = document.getElementById('deniedLightbox');
                const doneDenyLightbox = document.getElementById('doneDenyLightbox');
                const d_cancelButton = document.getElementById('d_cancelButton');
                const denyButton = document.getElementById('denyButton');

                // Menampilkan lightbox saat tombol "Tolak" diklik
                openDeniedLightboxButton.addEventListener('click', () => {
                    deniedLightbox.classList.add('show');
                });

                // Menutup lightbox saat tombol "Kembali" diklik
                d_cancelButton.addEventListener('click', () => {
                    deniedLightbox.classList.remove('show');
                });

                // Beralih menampilkan lightbox pengajuan ditolak
                denyButton.addEventListener('click', () => {
                    deniedLightbox.classList.remove('show');
                    doneDenyLightbox.classList.add('show');
                });

                // Menutup lightbox saat area luar lightbox-content diklik
                deniedLightbox.addEventListener('click', (event) => {
                    if (event.target === deniedLightbox) {
                        deniedLightbox.classList.remove('show');
                    }
                });
            // ---
    </script>
</body>

</html>