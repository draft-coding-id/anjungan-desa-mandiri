<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="assets/logo.png" type="image/png">
    <title>Kirim Surat - Laman Admin Desa Rawapanjang</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            display: flex;
            background-color: #f4f4f4;
        }

        /* Sidebar Styles */
        /* Sidebar Styles */
        .sidebar {
            min-width: 250px;
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

        .button {
            background-color: #FFA500;
            color: white;
            border: 1px solid #ffffff;
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
            margin: 0 10px;
            text-decoration: none;
        }

        .button:disabled {
            background-color: #f4f4f4;
            color: #a7a7a7;
            border: 1px solid #a7a7a7;
            cursor: not-allowed;
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

        .template-pesan {
            border: 2px solid #000000;
            border-radius: 20px;
            padding: 8px;
            display: flex;
            width: 100%;
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

        .container-send-pesan {
            display: flex;
            justify-content: start;
            align-items: center;
            margin: 20px;
        }

        .container-send-pesan>span {
            margin-right: 10px;
        }

        .container-button {
            display: flex;
            justify-content: center;
            align-items: center;
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
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
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
            <h4>Layanan Surat > Dalam Proses > Judul Surat</h4>
        </div>

        @include('layout.admin.menu_surat')

        <div class="content">
            <div class="content-1">
                <div class="mt-4">
                    <h3>@if($surat->jenis_surat == 'SKD')
                        Surat Keterangan Domisili
                        @elseif($surat->jenis_surat == 'SKP')
                        Surat Keterangan Pengantar
                        @elseif($surat->jenis_surat == 'SKTM')
                        Surat Keterangan Tidak Mampu
                        @elseif($surat->jenis_surat == "SKWH")
                        Surat Keterangan Wali Hakim
                        @endif</h3>
                    <h3>{{$surat->warga->nama_lengkap}}</h3>
                    <p>diajukan pada {{$surat->created_at->translatedFormat('d F Y')}}</p>
                    <br>
                    <h2>Surat telah disetujui oleh Kepala Desa</h2>
                    <h2>Nomor Surat : {{$surat->no_surat}}</h2>
                    <br>
                    <p>Bagikan info ke warga, <br> Silahkan gunakan template pesan berikut:

                    <div class="container-send-pesan">
                        <form action="{{route('kirimSurat' , $surat->id)}}" method="POST">
                            <textarea rows="5" cols="120" class="template-pesan" name="pesan_wa" readonly>Hai saya dari desa cineam , surat yang anda anjukan sudah selesai di tanda tangan oleh kepala desa. Anda bisa mengprint surat melalui link berikut : {{asset('surat/'. $surat->file_surat . ".pdf")}}
                            </textarea>
                            @csrf
                            <span>Kirim Pesan melalui : </span>
                            <button type="submit" style="background: transparent">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="#000">
                                    <path
                                        d="M24 11.7c0 6.45-5.27 11.68-11.78 11.68-2.07 0-4-.53-5.7-1.45L0 24l2.13-6.27a11.57 11.57 0 0 1-1.7-6.04C.44 5.23 5.72 0 12.23 0 18.72 0 24 5.23 24 11.7M12.22 1.85c-5.46 0-9.9 4.41-9.9 9.83 0 2.15.7 4.14 1.88 5.76L2.96 21.1l3.8-1.2a9.9 9.9 0 0 0 5.46 1.62c5.46 0 9.9-4.4 9.9-9.83a9.88 9.88 0 0 0-9.9-9.83m5.95 12.52c-.08-.12-.27-.19-.56-.33-.28-.14-1.7-.84-1.97-.93-.26-.1-.46-.15-.65.14-.2.29-.75.93-.91 1.12-.17.2-.34.22-.63.08-.29-.15-1.22-.45-2.32-1.43a8.64 8.64 0 0 1-1.6-1.98c-.18-.29-.03-.44.12-.58.13-.13.29-.34.43-.5.15-.17.2-.3.29-.48.1-.2.05-.36-.02-.5-.08-.15-.65-1.56-.9-2.13-.24-.58-.48-.48-.64-.48-.17 0-.37-.03-.56-.03-.2 0-.5.08-.77.36-.26.29-1 .98-1 2.4 0 1.4 1.03 2.76 1.17 2.96.14.19 2 3.17 4.93 4.32 2.94 1.15 2.94.77 3.47.72.53-.05 1.7-.7 1.95-1.36.24-.67.24-1.25.17-1.37" />
                                </svg>
                            </button>
                        </form>
                    </div>
                    <br />
                    @if($surat->is_send_to_warga == 0)
                    <button id="handleShowSendModal">Tandai Sudah Dikirim</button>
                    @else
                    <button class="button" id="handleShowSendModal">Sudah Dikirim</button>
                    @endif
                </div>
            </div>
            <div class="content-2">
                <div class="preview-container">
                    <iframe src="{{asset('surat/' . $surat->file_surat . ".pdf")}}" width="100%"
                        height="100%"></iframe>
                </div>

                <div class="button-container">
                    <a href="{{route('layanan-surat-dalam-proses')}}" class="button">Kembali</a>
                    <a href="{{asset('surat/'. $surat->file_surat . ".pdf")}}" class="button" target="_blank">Cetak
                        Surat</a>
                    @if($surat->is_print == 0)
                    <button id="handleShowPrintModal">Tandai sudah di Cetak</button>
                    @else
                    <button class="button" id="handleShowPrintModal" disabled>Sudah Dicetak</button>
                    @endif
                </div>
            </div>
            <!-- Lightboxes -->
            <div class="lightbox_container" id="sendModal">
                <div class="lightbox_content">
                    <h2>Tandai sudah dikirim?</h2>
                    <div class="container-button">
                        <button id="cancelSend">Kembali</button>
                        <form action="{{route('tandaiSuratDikirim' , $surat->id)}}" method="POST">
                            @csrf
                            <input type="hidden" name="status" value="Selesai">
                            <button type="submit" id="printButton">Lanjutkan</button>
                        </form>
                    </div>

                </div>
            </div>

            <div class="lightbox_container" id="printModal">
                <div class="lightbox_content">
                    <h2>Tandai Sudah Dicetak?</h2>
                    <div class="container-button">
                        <button id="cancelPrint">Kembali</button>
                        <form action="{{route('tandaiSuratDicetak' , $surat->id)}}" method="POST">
                            @csrf
                            <input type="hidden" name="status" value="Selesai">
                            <button type="submit" id="printButton">Lanjutkan</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="lightbox_container" id="giveModal">
                <div class="lightbox_content">
                    <h2>Tandai Sudah Diserahkan kepada Warga?</h2>
                    <div class="container-button">
                        <button id="cancelGive">Kembali</button>
                        <form action="{{route('tandaiSuratDiserahkan' , $surat->id)}}" method="POST">
                            @csrf
                            <input type="hidden" name="status" value="diserahkan">
                            <button id="markSendButton">Lanjutkan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer">
            <div class="footer-content">
                <h3>Belum Diserahkan kepada Warga</h3>
                <button type="button" id="handleShowGiveModal">Tandai Sudah Diserahkan</button>
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
            console.log(handleShowPrintModal)
            handleShowGiveModal.addEventListener('click', () => {
                giveModal.classList.add('show');
            });

            handleShowSendModal.addEventListener('click', () => {
                sendModal.classList.add('show');
            });

            handleShowPrintModal.addEventListener('click', () => {
                printModal.classList.add('show');
            });




            // Menutup lightbox saat tombol "Kembali" diklik
            cancelSend.addEventListener('click', () => {
                sendModal.classList.remove('show');
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