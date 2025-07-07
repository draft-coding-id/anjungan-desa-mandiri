<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="assets/logo.png" type="image/png">
    <title>Kirim Surat - Laman Admin Desa Rawapanjang</title>
    <style>
        /* Reset and Base Styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            margin: 0;
            display: flex;
            background-color: #f4f4f4;
        }

        /* Sidebar Styles */
        .sidebar {
            min-width: 250px;
            background-color: #fff;
            min-height: 100vh;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
        }

        .sidebar-header {
            display: flex;
            line-height: 1.5;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            background: linear-gradient(to right, #ff8a00 50%, #f7e700);
            padding: 30px 20px 10px;
        }

        .sidebar-header p {
            line-height: 1.5;
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
            background: white;
            color: #ffa500;
        }

        .nav-link.active {
            background: linear-gradient(to right, #ff8a00 50%, #f7e700);
            color: white;
            font-weight: bold;
        }

        /* Main Content Styles */
        .main-content {
            flex-grow: 1;
        }

        .header {
            background-color: #ffa500;
            background: linear-gradient(to left, #ff8a00 50%, #f7e700);
            padding: 16px 8px;
            display: flex;
            align-items: center;
        }

        .path {
            padding: 0px 30px;
        }

        /* Menu Surat */
        .menu-surat {
            padding: 0 50px;
            display: flex;
            align-items: center;
            border-bottom: 2px solid #333;
            flex-wrap: wrap;
            gap: 5px;
        }

        .menu-surat a {
            border: 1px solid #f4f4f4;
            padding: 8px 15px;
            cursor: pointer;
            color: #333;
            border-radius: 0px;
            background-color: #f4f4f4;
            text-decoration: none;
            font-size: 14px;
            letter-spacing: 0.5px;
            white-space: nowrap;
        }

        .menu-surat a:hover {
            background-color: #f4f4f4;
            border-radius: 10px 10px 0px 0px;
            border: 1px solid #ffa500;
            color: #ffa500;
        }

        .menu-surat a.active {
            background-color: #ff8a00;
            border: 1px solid #ff8a00;
            border-radius: 10px 10px 0px 0px;
            color: white;
            font-weight: bold;
        }

        .content {
            display: flex;
            padding: 0px 10px 30px 10px;
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
            border-radius: 12px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .button-container {
            text-align: center;
            margin: 50px 0;
            display: flex;
            justify-content: center;
            gap: 15px;
            flex-wrap: wrap;
        }

        /* Enhanced Button Styles */
        .btn {
            padding: 12px 25px;
            border: none;
            border-radius: 10px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            text-decoration: none;
            text-align: center;
            white-space: nowrap;
            min-width: 120px;
        }

        .btn-primary {
            background: linear-gradient(to right, #ff8a00 50%, #f7e700);
            color: white;
            box-shadow: 0 4px 15px rgba(255, 138, 0, 0.3);
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(255, 138, 0, 0.4);
        }

        .btn-secondary {
            background: #6c757d;
            color: white;
        }

        .btn-secondary:hover {
            background: #5a6268;
            transform: translateY(-2px);
        }

        .btn-danger {
            background: #dc3545;
            color: white;
        }

        .btn-danger:hover:not(:disabled) {
            background: #c82333;
            transform: translateY(-2px);
        }

        .btn:disabled {
            opacity: 0.6;
            cursor: not-allowed;
            transform: none;
        }

        .button {
            background-color: #FFA500;
            color: white;
            border: 1px solid #ffffff;
            padding: 12px 25px;
            font-size: 16px;
            border-radius: 10px;
            cursor: pointer;
            margin: 0 10px;
            text-decoration: none;
            display: inline-block;
            transition: all 0.3s ease;
            font-weight: 600;
        }

        .button:disabled {
            background-color: #f4f4f4;
            color: #a7a7a7;
            border: 1px solid #a7a7a7;
            cursor: not-allowed;
        }

        .button:hover:not(:disabled) {
            background-color: #e68a00;
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(255, 138, 0, 0.3);
        }

        button {
            background-color: #FFA500;
            color: white;
            border: 1px solid #ffffff;
            padding: 12px 25px;
            font-size: 16px;
            border-radius: 10px;
            cursor: pointer;
            margin: 0 10px;
            transition: all 0.3s ease;
            font-weight: 600;
        }

        button:hover:not(:disabled) {
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(255, 138, 0, 0.3);
        }

        /* Enhanced Modal Styles */
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
            z-index: 1000;
            padding: 15px;
            backdrop-filter: blur(5px);
            animation: fadeIn 0.3s ease;
        }

        .lightbox_container.show {
            display: flex;
        }

        .lightbox_content {
            background: white;
            padding: 30px;
            border-radius: 20px;
            text-align: center;
            min-width: 500px;
            max-width: 90vw;
            position: relative;
            animation: modalSlideIn 0.3s ease-out;
            box-shadow: 0 25px 60px rgba(0, 0, 0, 0.15);
        }

        .lightbox_content button {
            margin: 20px 10px;
        }

        .lightbox_content h2 {
            margin-bottom: 30px;
            font-size: 24px;
            color: #333;
            font-weight: 600;
        }

        .container-button {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 15px;
            flex-wrap: wrap;
        }

        /* Template Pesan Styles */
        .template-pesan {
            border: 2px solid #e1e5e9;
            border-radius: 12px;
            padding: 15px;
            display: flex;
            width: 100%;
            color: #333;
            background: #f8f9fa;
            font-family: inherit;
            font-size: 14px;
            line-height: 1.6;
            resize: vertical;
            transition: border-color 0.3s ease;
        }

        .template-pesan:focus {
            outline: none;
            border-color: #ffa500;
            background: white;
            box-shadow: 0 0 0 3px rgba(255, 165, 0, 0.1);
        }

        .container-send-pesan {
            display: flex;
            justify-content: start;
            align-items: center;
            margin: 20px 0;
            gap: 15px;
            flex-wrap: wrap;
        }

        .container-send-pesan>span {
            margin-right: 10px;
            font-weight: 500;
            color: #333;
        }

        .container-send-pesan form {
            display: flex;
            flex-direction: column;
            gap: 15px;
            width: 100%;
        }

        .whatsapp-send-section {
            display: flex;
            align-items: center;
            gap: 15px;
            flex-wrap: wrap;
        }

        .whatsapp-button {
            background: #25d366;
            color: white;
            border: none;
            padding: 12px 20px;
            border-radius: 10px;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 8px;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .whatsapp-button:hover {
            background: #2e8b57;
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(37, 211, 102, 0.3);
        }

        /* Footer Styles */
        .footer {
            bottom: 0;
            width: 100%;
            color: white;
            text-align: center;
            background-color: #ff9900;
        }

        .footer-content {
            padding: 20px 0px 40px 0px;
        }

        .footer-content button {
            border: 3px solid #ffffff;
            padding: 20px 30px;
            font-size: 18px;
            font-weight: bold;
            background-color: #ffffff;
            color: #ff9900;
            border-radius: 12px;
            transition: all 0.3s ease;
        }

        .footer-content button:hover {
            background-color: #e68a00;
            color: #ffffff;
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(230, 138, 0, 0.4);
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

        /* Heading Styles */
        h4 {
            color: #333;
            margin: 20px 0;
            font-size: 24px;
            font-weight: 500;
            position: relative;
            padding-bottom: 10px;
        }

        h4:after {
            content: "";
            position: absolute;
            left: 0;
            bottom: 0;
            height: 3px;
            width: 60px;
            background: linear-gradient(to right, #ff8a00 50%, #f7e700);
        }

        h3 {
            color: #333;
            font-weight: 600;
            margin-bottom: 15px;
        }

        h2 {
            color: #333;
            font-weight: 600;
            margin: 15px 0;
        }

        /* Status Information Styles */
        .status-info {
            background: #f8f9fa;
            border: 1px solid #e9ecef;
            border-radius: 12px;
            padding: 20px;
            margin: 20px 0;
        }

        .status-badge {
            display: inline-block;
            padding: 8px 16px;
            border-radius: 20px;
            font-size: 14px;
            font-weight: 600;
            margin: 5px 0;
        }

        .status-approved {
            background: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }

        .status-sent {
            background: #cce7ff;
            color: #004085;
            border: 1px solid #b3d7ff;
        }

        .status-printed {
            background: #fff3cd;
            color: #856404;
            border: 1px solid #ffeaa7;
        }

        /* Modal Animations */
        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        @keyframes modalSlideIn {
            from {
                opacity: 0;
                transform: translateY(-30px) scale(0.95);
            }

            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        /* Responsive Design */
        @media (max-width: 1024px) {
            .content {
                flex-direction: column;
            }

            .content-1,
            .content-2 {
                width: 100%;
                padding: 20px 30px;
            }

            .menu-surat {
                padding: 0 20px;
            }

            .path {
                padding: 0px 20px;
            }
        }

        @media (max-width: 768px) {
            .sidebar {
                position: fixed;
                left: -250px;
                z-index: 1000;
                transition: left 0.3s ease;
            }

            .sidebar.active {
                left: 0;
            }

            .main-content {
                width: 100%;
            }

            .content-1,
            .content-2 {
                padding: 15px 20px;
            }

            .menu-surat {
                padding: 0 15px;
                overflow-x: auto;
            }

            .path {
                padding: 0px 15px;
            }

            .lightbox_content {
                min-width: auto;
                width: 95%;
                padding: 20px;
                border-radius: 12px;
            }

            .container-send-pesan {
                flex-direction: column;
                align-items: stretch;
            }

            .whatsapp-send-section {
                justify-content: center;
            }

            .button-container {
                flex-direction: column;
                margin: 30px 0;
            }

            .template-pesan {
                width: 100%;
                min-height: 120px;
            }

            .preview-container {
                height: 400px;
            }
        }

        @media (max-width: 480px) {

            .content-1,
            .content-2 {
                padding: 10px 15px;
            }

            .menu-surat {
                padding: 0 10px;
            }

            .path {
                padding: 0px 10px;
            }

            .lightbox_content {
                padding: 15px;
            }

            .lightbox_content h2 {
                font-size: 20px;
            }

            .btn,
            .button,
            button {
                padding: 10px 15px;
                font-size: 14px;
                min-width: auto;
            }

            .container-button {
                flex-direction: column;
            }

            .footer-content button {
                padding: 15px 20px;
                font-size: 16px;
            }

            .preview-container {
                height: 300px;
            }
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
                        @elseif($surat->jenis_surat == "SPMAK")
                        Surat Pernyataan Membuat Akta Kelahiran
                        @endif</h3>
                    <h3>{{$surat->warga->nama_lengkap}}</h3>
                    <p>diajukan pada {{$surat->created_at->translatedFormat('d F Y')}}</p>

                    <div class="status-info">
                        <h2>
                            <span class="status-badge status-approved">✓ Disetujui Kepala Desa</span>
                        </h2>
                        <h2>Nomor Surat: <strong>{{$surat->no_surat}}</strong></h2>
                    </div>

                    <p><strong>Bagikan info ke warga</strong><br>
                        Silahkan gunakan template pesan berikut:</p>

                    <div class="container-send-pesan">
                        <form action="{{route('kirimSurat' , $surat->id)}}" method="POST">
                            <textarea rows="6" class="template-pesan" name="pesan_wa"
                                readonly>Halo, kami dari Kantor Desa Rawapanjang ingin mengabarkan bahwa surat yang Anda ajukan sudah selesai diproses. Silahkan ambil surat Anda di kantor desa, atau Anda juga dapat melihat surat ini di gawai Anda melalui tautan berikut: {{asset('surat/'. $surat->file_surat . ".pdf")}}</textarea>
                            @csrf
                            <div class="whatsapp-send-section">
                                <span>Kirim Pesan melalui:</span>
                                <button type="submit" class="whatsapp-button">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                                        fill="currentColor">
                                        <path
                                            d="M24 11.7c0 6.45-5.27 11.68-11.78 11.68-2.07 0-4-.53-5.7-1.45L0 24l2.13-6.27a11.57 11.57 0 0 1-1.7-6.04C.44 5.23 5.72 0 12.23 0 18.72 0 24 5.23 24 11.7M12.22 1.85c-5.46 0-9.9 4.41-9.9 9.83 0 2.15.7 4.14 1.88 5.76L2.96 21.1l3.8-1.2a9.9 9.9 0 0 0 5.46 1.62c5.46 0 9.9-4.4 9.9-9.83a9.88 9.88 0 0 0-9.9-9.83m5.95 12.52c-.08-.12-.27-.19-.56-.33-.28-.14-1.7-.84-1.97-.93-.26-.1-.46-.15-.65.14-.2.29-.75.93-.91 1.12-.17.2-.34.22-.63.08-.29-.15-1.22-.45-2.32-1.43a8.64 8.64 0 0 1-1.6-1.98c-.18-.29-.03-.44.12-.58.13-.13.29-.34.43-.5.15-.17.2-.3.29-.48.1-.2.05-.36-.02-.5-.08-.15-.65-1.56-.9-2.13-.24-.58-.48-.48-.64-.48-.17 0-.37-.03-.56-.03-.2 0-.5.08-.77.36-.26.29-1 .98-1 2.4 0 1.4 1.03 2.76 1.17 2.96.14.19 2 3.17 4.93 4.32 2.94 1.15 2.94.77 3.47.72.53-.05 1.7-.7 1.95-1.36.24-.67.24-1.25.17-1.37" />
                                    </svg>
                                    Kirim via WhatsApp
                                </button>
                            </div>
                        </form>
                    </div>

                    @if($surat->is_send_to_warga == 0)
                    <button class="btn btn-primary" id="handleShowSendModal">Tandai Sudah Dikirim</button>
                    @else
                    <button class="btn btn-secondary" disabled>
                        <span class="status-badge status-sent">✓ Sudah Dikirim</span>
                    </button>
                    @endif
                </div>
            </div>

            <div class="content-2">
                <div class="preview-container">
                    <iframe src="{{asset('surat/' . $surat->file_surat . ".pdf")}}" width="100%" height="100%"
                        style="border-radius: 8px;"></iframe>
                </div>

                <div class="button-container">
                    <a href="{{route('layanan-surat-dalam-proses')}}" class="btn btn-secondary">
                        ← Kembali
                    </a>
                    <a href="{{asset('surat/'. $surat->file_surat . ".pdf")}}" class="btn btn-primary" target="_blank">
                        🖨️ Cetak Surat
                    </a>
                    @if($surat->is_print == 0)
                    <button class="btn btn-primary" id="handleShowPrintModal">Tandai sudah di Cetak</button>
                    @else
                    <button class="btn btn-secondary" disabled>
                        <span class="status-badge status-printed">✓ Sudah Dicetak</span>
                    </button>
                    @endif
                </div>
            </div>
        </div>

        <!-- Enhanced Lightboxes -->
        <div class="lightbox_container" id="sendModal">
            <div class="lightbox_content">
                <h2>Konfirmasi Pengiriman</h2>
                <p>Apakah Anda yakin ingin menandai surat ini sudah dikirim ke warga?</p>
                <div class="container-button">
                    <button class="btn btn-secondary" id="cancelSend">Batal</button>
                    <form action="{{route('tandaiSuratDikirim' , $surat->id)}}" method="POST" style="display: inline;">
                        @csrf
                        <input type="hidden" name="status" value="Selesai">
                        <button type="submit" class="btn btn-primary">Ya, Tandai Dikirim</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="lightbox_container" id="printModal">
            <div class="lightbox_content">
                <h2>Konfirmasi Pencetakan</h2>
                <p>Apakah Anda yakin surat ini sudah dicetak?</p>
                <div class="container-button">
                    <button class="btn btn-secondary" id="cancelPrint">Batal</button>
                    <form action="{{route('tandaiSuratDicetak' , $surat->id)}}" method="POST" style="display: inline;">
                        @csrf
                        <input type="hidden" name="status" value="Selesai">
                        <button type="submit" class="btn btn-primary">Ya, Sudah Dicetak</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="lightbox_container" id="giveModal">
            <div class="lightbox_content">
                <h2>Konfirmasi Penyerahan</h2>
                <p>Apakah Anda yakin surat ini sudah diserahkan kepada warga?</p>
                <div class="container-button">
                    <button class="btn btn-secondary" id="cancelGive">Batal</button>
                    <form action="{{route('tandaiSuratDiserahkan' , $surat->id)}}" method="POST" style="display: inline;">
                        @csrf
                        <input type="hidden" name="status" value="diserahkan">
                        <button type="submit" class="btn btn-primary">Ya, Sudah Diserahkan</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="footer">
            <div class="footer-content">
                @if($surat->is_diserahkan == 0)
                <h3>Belum Diserahkan kepada Warga</h3>
                <button type="button" id="handleShowGiveModal" class="btn">📋 Tandai Sudah Diserahkan</button>
                @else
                <h3><span class="status-badge status-approved">✓ Surat Sudah Diserahkan</span></h3>
                @endif
            </div>
            <div class="credit">
                <p>&copy; 2025 Trisna Wahyu Mukti, Raihan Darmawan Pringgodigdo, Fakultas Ilmu Komputer
                    Universitas Pembangunan Nasional "Veteran" Jakarta</p>
            </div>
        </div>

        <script>
            // Enhanced Modal Handling
            const handleShowSendModal = document.getElementById('handleShowSendModal');
            const handleShowPrintModal = document.getElementById('handleShowPrintModal');
            const handleShowGiveModal = document.getElementById('handleShowGiveModal');
            const sendModal = document.getElementById('sendModal');
            const printModal = document.getElementById('printModal');
            const giveModal = document.getElementById('giveModal');
            const cancelSend = document.getElementById('cancelSend');
            const cancelPrint = document.getElementById('cancelPrint');
            const cancelGive = document.getElementById('cancelGive');

            // Show modals with animation
            function showModal(modal) {
                modal.classList.add('show');
                document.body.style.overflow = 'hidden';
            }

            function hideModal(modal) {
                modal.classList.remove('show');
                document.body.style.overflow = 'auto';
            }

            // Event listeners for showing modals
            if (handleShowGiveModal) {
                handleShowGiveModal.addEventListener('click', () => showModal(giveModal));
            }

            if (handleShowSendModal) {
                handleShowSendModal.addEventListener('click', () => showModal(sendModal));
            }

            if (handleShowPrintModal) {
                handleShowPrintModal.addEventListener('click', () => showModal(printModal));
            }

            // Event listeners for hiding modals
            cancelSend.addEventListener('click', () => hideModal(sendModal));
            cancelPrint.addEventListener('click', () => hideModal(printModal));
            cancelGive.addEventListener('click', () => hideModal(giveModal));

            // Close modal when clicking outside
            [sendModal, printModal, giveModal].forEach(modal => {
                modal.addEventListener('click', (e) => {
                    if (e.target === modal) {
                        hideModal(modal);
                    }
                });
            });
        </script>
</body>

</html>