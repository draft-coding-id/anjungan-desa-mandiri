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
            display: flex;
            padding: 0px;
        }

        .content-1 {
            width: 50%;
            padding: 30px 50px;
        }

        .content-2 {
            flex-grow: 1;
            width: 50%;
            padding: 50px 50px;
        }

        .preview-container {
            margin: auto;
            border: 1px solid #ddd;
            padding: 10px;
            width: 100%;
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
            min-width: 500px;
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

        p {
            line-height: 1.5;
        }

        .template-pesan {
            border: 2px solid #000000;
            border-radius: 20px;
            margin: 20px;
            padding: 0px 20px 30px 20px;
            display: flex;
            justify-content: top;
            width: 80%;
            color: #a7a7a7;
        }

        .footer {
            /* position: fixed; */
            bottom: 0;
            width: 100%;
            color: white;
            text-align: center;
            background-color: #ff9900;
        }

        .footer-content {
            padding: 10px 0px 40px 0px;
        }

        .footer-content button {
            border: 3px solid #ffffff;
            padding: 20px 30px;
            font-size: 18px;
            font-weight: bold;
            background-color: #ffffff;
            color: #ff9900;
        }

        .footer-content button:hover {
            background-color: #e68a00;
            color: #ffffff;
        }

        .credit {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 30px;
            font-size: 12px;
            background-color: #ff9900;
            color: white;
            border: 1px solid #000000;
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
            <div class="content-1">
                <div class="mt-4">
                    <h3>{{$surat->jenis_surat}}</h3>
                    <h3>{{$surat->warga->nama_lengkap}}</h3>
                    <p>diajukan pada {{$surat->created_at->translatedFormat('d F Y')}}</p>
                    <br>
                    <h2>Surat telah disetujui oleh Kepala Desa</h2>
                    <h2>Nomor Surat : {{$surat->no_surat}}</h2>
                    <br>
                    <p>Bagikan info ke warga, <br> Silahkan gunakan template pesan berikut:

                    <div class="template-pesan">
                        <p>Pesan bahwa surat telah selesai diproses, surat dapat diunduh di link gdrive atau dapat
                            diambil di kantor desa.</p>
                    </div>
                    <p>Kirim Pesan:</p>
                    <button id="handleShowSendModal">Tandai Sudah Dikirim</button>
                </div>
            </div>
            <div class="content-2">
                <div class="preview-container">
                    <iframe src="{{route('get-detail-skd' , $surat->id)}}" width="100%" height="100%"></iframe>
                </div>

                <div class="button-container">
                    <button class="button" onclick="window.history.back();">Kembali</button>
                    <button>Cetak Surat</button>
                    <button id="handleShowPrintModal">Tandai Sudah Dicetak</button>
                </div>
            </div>
            <!-- Lightboxes -->
            <div class="lightbox_container" id="sendModal">
                <div class="lightbox_content">
                    <h2>Tandai sudah dikirim?</h2>
                    <button id="cancelSend">Kembali</button>
                    <button id="sendButton">Lanjutkan</button>
                </div>
            </div>

            <div class="lightbox_container" id="printModal">
                <div class="lightbox_content">
                    <h2>Tandai Sudah Dicetak?</h2>
                    <button id="cancelPrint">Kembali</button>
                    <button id="printButton">Lanjutkan</button>
                </div>
            </div>

            <div class="lightbox_container" id="giveModal">
                <div class="lightbox_content">
                    <h2>Tandai Sudah Diserahkan kepada Warga?</h2>
                    <button id="cancelGive">Kembali</button>
                    <button id="markSendButton">Lanjutkan</button>
                </div>
            </div>
        </div>
        <div class="footer">
            <div class="footer-content">
                <h3>Belum Diserahkan kepada Warga</h3>
                <button id="handleShowGiveModal">Tandai Sudah Diserahkan</button>
            </div>
            <div class="credit">
                <p>&copy;</p>
            </div>
        </div>
        <script>
            // Kondisi Surat Diverifikasi
                const handleShowSendModal = document.getElementById('handleShowSendModal');
                const handleShowPrintModal = document.getElementById('handleShowPrintModal');
                const handleShowGiveModal = document.getElementById('handleShowGiveModal');
                const sendModal = document.getElementById('sendModal');
                const printModal = document.getElementById('printModal');
                const giveModal = document.getElementById('giveModal');
                const cancelSend = document.getElementById('cancelSend');
                const cancelPrint = document.getElementById('cancelPrint');
                const cancelGive = document.getElementById('cancelGive');
                // Menampilkan lightbox saat tombol "Verifikasi" diklik
                handleShowSendModal.addEventListener('click', () => {
                    sendModal.classList.add('show');
                });

                handleShowPrintModal.addEventListener('click', () => {
                    printModal.classList.add('show');
                });

                handleShowGiveModal.addEventListener('click', () => {
                    giveModal.classList.add('show');
                });

                // Menutup lightbox saat tombol "Kembali" diklik
                cancelSend.addEventListener('click', () => {
                    // console.log('cancel');
                    sendModal.classList.remove('show');
                    // giveModal.classList.remove('show');
                });
                cancelPrint.addEventListener('click', () => {
                    printModal.classList.remove('show');
                });

                cancelGive.addEventListener('click', () => {
                    giveModal.classList.remove('show');
                });
        </script>
</body>

</html>