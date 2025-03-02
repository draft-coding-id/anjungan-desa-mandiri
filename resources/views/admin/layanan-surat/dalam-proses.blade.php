<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Layanan Surat - Laman Admin Desa Rawapanjang</title>
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
                border: 1px solid #FFA500; /* Mengatur border solid dengan warna oranye */
                background: white;
                color: #FFA500; /* Warna teks */    
            }

            .nav-link.active {
                background: linear-gradient(to right, #FF8A00 50%, #F7E700);
                color: white; /* Warna teks */
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
                padding: 15px 30px;
            }

            .table {
                width: 100%;
                border-collapse: collapse;
                margin: 20px 0 50px 20px;
            }

            .table th, .table td {
                border: 1px solid #ddd;
                padding: 8px;
                text-align: left;
            }

            .table th {
                text-align: center;
            }

            button {
                border: none;
                padding: 5px 10px;
                border-radius: 5px;
                cursor: pointer;
                background-color: #FFA500;
                color: white;
                font-weight: bold;
                width: 150px;
                height: 40px;
            }

            button:hover {
                background-color: #e68a00;
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
                <!-- <a href=/beranda class="nav-link">Beranda</a>
                <a href=/info-desa class="nav-link">Informasi Desa</a>
                <a href=/data-warga class="nav-link">Data Warga</a>
                <a href=/statistik class="nav-link">Statistik Desa</a> -->
                <a href=/layanan-surat class="nav-link active">Layanan Surat</a>
                <!-- <a href=/pengumuman class="nav-link">Pengumuman</a>
                <a href=/artikel-desa class="nav-link">Artikel Desa</a>
                <a href=/agenda class="nav-link">Agenda Desa</a>
                <a href=/pengaturan-akun class="nav-link">Pengaturan Akun</a> -->
                <a href=/admin class="nav-link">Logout</a>
            </div>
        </div>

        <!-- Main Content -->
        <div class="main-content">
            <div class="header">
                <h3>Desa Rawapanjang, Kabupaten Bogor</h3>
            </div>

            <div class="path">
                <h4>Layanan Surat > Dalam Proses</h4>
            </div>

            <div class="menu-surat">
                <!-- <a href=/kelola-surat>Kelola Surat</a> -->
                <a href=/layanan-surat class="active">Dalam Proses</a>
                <a href=/surat-ditolak>Arsip Surat Ditolak</a>
                <a href=/riwayat-surat>Riwayat</a>

            </div>

            <div class="content">
                <div class="mt-4">
                    <h3>Menunggu Verifikasi Admin</h3>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th width="150px">Aksi</th>
                                <!-- <th>No. Antrean</th> -->
                                <th>NIK</th>
                                <th>Nama Penduduk</th>
                                <th>No. HP Aktif</th>
                                <th>Jenis Surat</th>
                                <th>Tanggal Kirim</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1.</td>
                                <td><button onclick="window.location.href='/verif-admin';">Verifikasi Admin</button></td>
                                <!-- <td>12345</td> -->
                                <td>1234567890</td>
                                <td>Nama Warga</td>
                                <td>08123456789</td>
                                <td>Surat Keterangan</td>
                                <td>01-01-2024</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="mt-4">
                    <h3>Menunggu Tanda Tangan Kades</h3>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th width="150px">Aksi</th>
                                <!-- <th>No. Antrean</th> -->
                                <th>NIK</th>
                                <th>Nama Penduduk</th>
                                <th>No. HP Aktif</th>
                                <th>Jenis Surat</th>
                                <th>Tanggal Kirim</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1.</td>
                                <td><button onclick="window.location.href='/persetujuan-kades';">Menunggu Tanda Tangan Kades</button></td>
                                <!-- <td>12346</td> -->
                                <td>1234567891</td>
                                <td>Nama Warga 2</td>
                                <td>08123456790</td>
                                <td>Surat Keterangan Nikah</td>
                                <td>02-01-2024</td>
                            </tr>
                        </tbody>
                    </table>
                </div><div class="mt-4">
                    <h3>Belum diserahkan ke Warga</h3>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th width="150px">Aksi</th>
                                <!-- <th>No. Antrean</th> -->
                                <th>NIK</th>
                                <th>Nama Penduduk</th>
                                <th>No. HP Aktif</th>
                                <th>Jenis Surat</th>
                                <th>Tanggal Kirim</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1.</td>
                                <td><button onclick="window.location.href='/surat-selesai';">Belum diserahkan ke Warga</button></td>
                                <!-- <td>12347</td> -->
                                <td>1234567892</td>
                                <td>Nama Warga 3</td>
                                <td>08123456791</td>
                                <td>Surat Kuasa</td>
                                <td>03-01-2024</td>
                            </tr>
                        </tbody>
                    </table>
                </div>      
            </div>
        </div>
    </body>
</html>