
@extends('layout.admin.layanan_surat')
@section('title', 'Verifikasi Admin')
@section('action-container')
            <div class="button-container">
                <button id="openDeniedLightbox">Tolak</button>
                <button id="openVerifLightbox">Tanda Tangan</button>
            </div>

            <!-- Kondisi Surat Disetujui -->
            <div class="lightbox_container" id="verifLightbox">
                <div class="lightbox_content">
                    <h2>Setujui Pengajuan Surat?</h2>
                    <p>Setelah ditandatangan, surat ini akan dilanjutkan kepada administrator desa untuk diserahkan
                        kepada warga.</p>
                    <button id="v_cancelButton">Kembali</button>
                    <button id="verifButton">Tanda Tangan</button>
                </div>
            </div>

            <div class="lightbox_container" id="doneVerifLightbox">
                <div class="lightbox_content">
                    <h2>Surat Telah Disetujui</h2>
                    <p>Surat akan dilanjutkan ke Administrator Desa untuk diserahkan kepada warga.</p>
                    <!-- Menangani aksi saat tombol "Verifikasi" diklik -->
                    <form action="{{route('disetujui.kades' , $surat->id)}}" method="POST">
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
                    <p>Anda dapat kembali melihat surat ini di menu
                        <br>Layanan Surat > Arsip Surat Ditolak
                    </p>
                    <!-- Menangani aksi saat tombol "Verifikasi" diklik -->
                    <form action="{{route('surat.ditolak' , $surat->id)}}" method="POST">
                        @csrf
                        <input type="hidden" name="status" value="ditolak">
                        <button type="submit">Pergi ke Arsip</button>
                    </form>
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
@endsection
