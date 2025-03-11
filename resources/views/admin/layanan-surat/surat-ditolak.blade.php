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
            height: 100vh;
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

        button {
            border: none;
            padding: 5px 10px;
            border-radius: 5px;
            cursor: pointer;
            background-color: #FFA500;
            color: white;
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
            <h4>Layanan Surat > Arsip Surat Ditolak</h4>
        </div>

        <div class="menu-surat">
            <a href=/kelola-surat>Kelola Surat</a>
            <a href=/layanan-surat>Dalam Proses</a>
            <a href=/surat-ditolak class="active">Arsip Surat Ditolak</a>
            <a href=/riwayat-surat>Riwayat</a>

        </div>

        <div class="content">
            <div class="mt-4">
                <h3>Arsip Surat Ditolak</h3>
                <table class="table">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Aksi</th>
                            <th>Petugas</th>
                            <th>No. Surat</th>
                            <th>Nama Penduduk</th>
                            <th>No. HP Aktif</th>
                            <th>Jenis Surat</th>
                            <th>Tanggal Kirim</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($surat as $data )
                        <tr>
                            <td>{{$increment}}</td>
                            <td><button>{{$data->status}}</button>
                            </td>
                            <td></td>
                            <td>{{$data->no_surat}}</td>
                            <td>{{$data->isi_surat['nama_lengkap']}}</td>
                            <td>{{$data->no_hp}}</td>
                            <td>{{$data->jenis_surat}}</td>
                            <td>{{$data->created_at}}</td>
                        </tr>
                        @empty
                        <td colspan="8" style="text-align: center">Belum ada surat yang ditolak saat ini</td>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>