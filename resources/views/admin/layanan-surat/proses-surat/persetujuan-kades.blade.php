@extends('layout.admin.template')

@section('title', 'Preview Surat - Laman Admin Desa Rawapanjang')

@section('breadcrumb')
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
@endsection

@section('menu-surat')
@include('layout.admin.menu_surat')
@endsection

@section('additional-styles')
<style>
    .preview-container {
        display: flex;
        flex-direction: column;
        align-items: center;
        background: #fff;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        padding: 20px;
        margin: 20px auto;
        max-width: 800px;
        width: 100%;
    }

    .preview-header {
        width: 100%;
        margin-bottom: 20px;
        text-align: center;
    }

    .preview-content {
        width: 100%;
        height: 700px;
        padding: 15px;
        border: 1px solid #eee;
        border-radius: 6px;
    }
</style>
@endsection

@section('content')
<div class="content" style="padding: 0px 30px;">
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
        <h3>Diajukan oleh {{$surat->warga->nama_lengkap}}</h3>
        <h4>Status : {{$surat->status}}</h4>
        <p>diajukan pada {{ $surat->created_at->translatedFormat('d F Y') }}</p>
    </div>

    <div class="preview-container">
        <div class="preview-header">
            <h2>Preview Dokumen</h2>
        </div>

        <div class="preview-content">
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

        <div class="button-container">
            <button id="handleShowVerifyModal">Verifikasi Surat</button>
            <button id="handleShowRejectModal">Tolak Surat</button>
        </div>

        <!-- Lightboxes -->
        <div class="lightbox_container" id="verifyModal">
            <div class="lightbox_content">
                <h2>Verifikasi Surat?</h2>
                <p>Apakah Anda yakin ingin memverifikasi surat ini?</p>
                <div class="container-button">
                    <button id="cancelVerify">Kembali</button>
                    <form action="{{route('verifySurat', $surat->id)}}" method="POST">
                        @csrf
                        <input type="hidden" name="status" value="Terverifikasi">
                        <button type="submit">Verifikasi</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="lightbox_container" id="rejectModal">
            <div class="lightbox_content">
                <h2>Tolak Surat?</h2>
                <p>Berikan alasan penolakan:</p>
                <form action="{{route('rejectSurat', $surat->id)}}" method="POST">
                    @csrf
                    <textarea class="alasan_ditolak" name="alasan_ditolak" placeholder="Masukkan alasan penolakan..." required></textarea>
                    <input type="hidden" name="status" value="Ditolak">
                    <div class="container-button">
                        <button type="button" id="cancelReject">Kembali</button>
                        <button type="submit">Tolak Surat</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    // Modal handlers
    const handleShowVerifyModal = document.getElementById('handleShowVerifyModal');
    const handleShowRejectModal = document.getElementById('handleShowRejectModal');
    const verifyModal = document.getElementById('verifyModal');
    const rejectModal = document.getElementById('rejectModal');
    const cancelVerify = document.getElementById('cancelVerify');
    const cancelReject = document.getElementById('cancelReject');

    // Show modals
    handleShowVerifyModal.addEventListener('click', () => {
        verifyModal.classList.add('show');
    });

    handleShowRejectModal.addEventListener('click', () => {
        rejectModal.classList.add('show');
    });

    // Hide modals
    cancelVerify.addEventListener('click', () => {
        verifyModal.classList.remove('show');
    });

    cancelReject.addEventListener('click', () => {
        rejectModal.classList.remove('show');
    });
</script>
@endsection