<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
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
            padding: 20px;
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
            width: 100%;
            justify-content: center; /* tengah */
            align-items: center;
            /* padding-left: 20px; */
        }

        .header {
            text-align: center;
        }

        .header p {
            font-size: 20px;
            font-weight: bold;
            color: #000;
        }

        /* Tombol pojok kanan atas */
        .header-btn {
            position: absolute;
            right: 5%;
            top: 50%;
            transform: translateY(-50%);
            /* background-color: #007bff; */
            /* color: white; */
            /* padding: 10px 16px; */
            /* border-radius: 8px; */
            text-decoration: none;
            font-weight: bold;
        }



        .button-container-wrapper {
            overflow-x: auto;
            max-width: 100%;
        }


        .button-container {
            display: flex;
            flex-wrap: nowrap;
            gap: 80px;
            padding: 20px;
            padding-top: 0;
            width: max-content;
        }

        .button-container-wrapper {
            scrollbar-width: none; /* Firefox */
        }

        .button-container-wrapper::-webkit-scrollbar {
            display: none; /* Chrome, Safari */
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

        .green {
            padding: 16px 100px;
            background-color: #02BE2B;
            color: white;
            border-radius: 40px;

        }

        .button-green {
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #02BE2B;
            color: white;
            padding: 20px 30px;
            border-radius: 30px;
            cursor: pointer;
            text-decoration: none;
            font-weight: bold;
            font-size: 24px;
            text-align: center;
            line-height: 1.4em;
            padding: 20px;
            height: 100px;
            width: 200px;
            box-shadow: 8px 8px 12px rgba(255, 255, 255, 0.5);
        }

        .button-green:hover {
            background-color: #0ae539;
        }

        .skyblue {
            padding: 16px 100px;
            background-color: #02BEBE;
            color: white;
            border-radius: 40px;

        }

        .button-skyblue {
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #02BEBE;
            color: white;
            padding: 20px 30px;
            border-radius: 30px;
            cursor: pointer;
            text-decoration: none;
            font-weight: bold;
            font-size: 24px;
            text-align: center;
            line-height: 1.4em;
            padding: 20px;
            height: 100px;
            width: 200px;
            box-shadow: 8px 8px 12px rgba(255, 255, 255, 0.5);
        }

        .button-skyblue:hover {
            background-color: #06dede;
        }

        .indigo {
            padding: 16px 100px;
            background-color: #7602BE;
            color: white;
            border-radius: 40px;
        }

        .button-indigo {
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #7602BE;
            color: white;
            padding: 20px 30px;
            border-radius: 30px;
            cursor: pointer;
            text-decoration: none;
            font-weight: bold;
            font-size: 24px;
            text-align: center;
            line-height: 1.4em;
            padding: 20px;
            height: 100px;
            width: 200px;
            box-shadow: 8px 8px 12px rgba(255, 255, 255, 0.5);
        }

        .button-indigo:hover {
            background-color: #8b08dd;
        }

        .coffee {
            padding: 16px 100px;
            background-color: #B2A91C;
            color: white;
            border-radius: 40px;
        }

        .button-coffee {
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #B2A91C;
            color: white;
            padding: 20px 30px;
            border-radius: 30px;
            cursor: pointer;
            text-decoration: none;
            font-weight: bold;
            font-size: 24px;
            text-align: center;
            line-height: 1.4em;
            padding: 20px;
            height: 100px;
            width: 200px;
            box-shadow: 8px 8px 12px rgba(255, 255, 255, 0.5);
        }

        .button-coffee:hover {
            background-color: #c4b71f;
        }

        /* Table Styles */
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 25px 0;
            font-size: 14px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow: hidden;
            background-color: white;
        }

        thead tr {
            background: linear-gradient(to right, #ff8a00 50%, #f7e700);
            color: white;
            text-align: center;
            font-weight: bold;
        }

        th,
        td {
            padding: 12px 15px;
            border-bottom: 1px solid #dddddd;
        }

        tbody tr {
            transition: all 0.3s ease;
            cursor: pointer;
            text-align: center;
        }

        tbody tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tbody tr:hover {
            background-color: #ffefdf;
        }

        /* Table Action Buttons */
        td a,
        td button {
            display: inline-block;
            padding: 6px 12px;
            margin: 0 5px;
            border-radius: 4px;
            text-decoration: none;
            font-size: 13px;
            padding: 10px 20px;
        }

        td .setuju-button {
            background-color: #4caf50;
            color: white;
            border: none;
        }

        td .setuju-button:hover {
            background-color: #45a049;
            color: white;
        }

        td .tolak-button {
            background-color: #f44336;
            color: white;
            border: none;
        }

        td .tolak-button:hover {
            background-color: #e53935;
            color: white;
        }

        td a {
            background-color: #1e88e5;
            color: white;
            border: none;
        }

        td .aksi {
            background-color: #e68a00;
            padding: 10px 20px;
        }

        td button {
            background-color: #e53935;
            color: white;
            border: none;
            cursor: pointer;
        }

        td a:hover,
        td button:hover {
            opacity: 0.8;
        }

        .status-complete {
            color: green;
            font-weight: bold;
        }

        .status-pending {
            color: orange;
            font-weight: bold;
        }

        .status-rejected {
            color: red;
            font-weight: bold;
        }

    </style>
</head>

<body>
    <main>
        <div class="header-wrapper">
            <div class="header">
                <h1 class="green">Histori & Progres Pengajuan Surat</h1>
            </div>
        </div>

        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Jenis Surat</th>
                    <th>Nomor Surat</th>
                    <th>Status</th>
                    <th>Progres</th>
                    <th>Waktu Pengajuan</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($surats as $index => $surat)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $surat->jenis_surat }}</td>
                        <td>{{ $surat->no_surat ?? '-' }}</td>
                        <td>
                            @if (!$surat->is_accepted)
                                <span class="status-rejected">Ditolak</span>
                            @elseif ($surat->is_selesai)
                                <span class="status-complete">Selesai</span>
                            @else
                                <span class="status-pending">Diproses</span>
                            @endif
                        </td>
                        <td>
                            @php
                                $progress = [];
                                if ($surat->is_accepted) $progress[] = "Disetujui";
                                if ($surat->is_approve_admin) $progress[] = "Diproses Admin";
                                if ($surat->is_tanda_tangan_kades) $progress[] = "TTD Kepala Desa";
                                if ($surat->is_send_to_warga) $progress[] = "Dikirim ke Warga";
                                if ($surat->is_print) $progress[] = "Dicetak";
                                if ($surat->is_diserahkan) $progress[] = "Diserahkan";
                                if ($surat->is_selesai) $progress[] = "Selesai";
                                echo implode(" → ", $progress);
                            @endphp
                        </td>
                        <td>{{ $surat->created_at->format('d-m-Y H:i') }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6">Belum ada surat diajukan.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </main>
</body>

</html>
