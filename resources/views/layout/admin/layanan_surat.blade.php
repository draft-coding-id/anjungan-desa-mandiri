<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            display: flex;
            background-color: #f4f4f4;
        }

        /* Main Content Styles */
        .main-content {
            flex-grow: 1;
        }
        /* Sidebar */
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
        background: linear-gradient(to right, #ff8a00 50%, #f7e700);
        padding: 30px 20px 10px;
        }
        
        .sidebar-nav {
        padding: 10px;
        }
        
        .nav-link {
        display: block;
        color: #333;
        font-size: 14px;
        text-decoration: none;
        padding: 10px;
        border-radius: 5px;
        transition: 0.5s;
        }
        
        .nav-link:hover {
        border: 1px solid #ffa500;
        /* Mengatur border solid dengan warna oranye */
        background: white;
        color: #ffa500;
        /* Warna teks */
        }
        
        .nav-link.active {
        background: linear-gradient(to right, #ff8a00 50%, #f7e700);
        color: white;
        /* Warna teks */
        font-weight: bold;
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

        .alasan_ditolak {
            margin: 10px 0;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ddd;
            font-size: 16px;
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
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#000000"
            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
            <circle cx="12" cy="7" r="4"></circle>
        </svg>
        <h3>{{auth()->user()->name}}</h3>
        <p>Desa Rawapanjang <br> Kabupaten Bogor</p>
    </div>
        @include('layout.admin.sidebar')
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <div class="header">
            <h3>Desa Rawapanjang, Kabupaten Bogor</h3>
        </div>

        <div class="path">
            <h4>Layanan Surat > Dalam Proses >
                @if ($surat->jenis_surat == 'SKD')
                Surat Keterangan Domisili
                @elseif ($surat->jenis_surat == 'SKP')
                Surat Keterangan Pengantar
                @elseif ($surat->jenis_surat == 'SKTM')
                Surat Keterangan Tidak Mampu
                @elseif ($surat->jenis_surat == "SKWH")
                Surat Keterangan Wali Hakim
                @endif
            </h4>
        </div>

        @include('layout.admin.menu_surat')

        <div class="content">
            <div class="mt-4">
                <h3>
                    @if($surat->jenis_surat == 'SKD')
                    Surat Keterangan Domisili
                    @elseif($surat->jenis_surat == 'SKP')
                    Surat Keterangan Pengantar
                    @elseif($surat->jenis_surat == 'SKTM')
                    Surat Keterangan Tidak Mampu
                    @elseif($surat->jenis_surat == "SKWH")
                    Surat Keterangan Wali Hakim
                    @endif
                </h3>
                <h3>{{$surat->warga->nama_lengkap}}</h3>
                <p>diajukan pada {{ $surat->created_at->translatedFormat('d F Y') }}</p>
            </div>
            <div class="preview-container">
                @if($surat->jenis_surat == 'SKD')
                <iframe src="{{route('get-detail-skd' , $surat->id)}}" width="100%" height="100%"></iframe>
                @elseif($surat->jenis_surat == 'SKP')
                <iframe src="{{route('get-detail-skp' , $surat->id)}}" width="100%" height="100%"></iframe>
                @elseif($surat->jenis_surat == 'SKTM')
                <iframe src="{{route('get-detail-sktm' , $surat->id)}}" width="100%" height="100%"></iframe>
                @elseif($surat->jenis_surat == "SKWH")
                <iframe src="{{route('get-detail-skwh' , $surat->id)}}" width="100%" height="100%"></iframe>
                @endif
            </div>
            @yield('action-container')

        </div>
    </div>
</body>

</html>
