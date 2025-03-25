@extends('layout.admin.layanan_surat')
@section('title', 'Verifikasi Admin')
@section('action-container')
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
<!-- Kondisi Surat Ditolak -->
<div class="lightbox_container" id="deniedLightbox">
    <div class="lightbox_content">
        <h2>Tolak Pengajuan Surat?</h2>
        <p>Silahkan tulis detail alasan disini</p>
        <textarea type="text" name="alasan_ditolak" id="alasan_ditolak" class="alasan_ditolak" cols="50"
            rows="10"></textarea>
        <button id="d_cancelButton">Kembali</button>
        <button id="denyButton">Tolak</button>
    </div>
</div>

<div class="lightbox_container" id="doneDenyLightbox">
    <div class="lightbox_content">
        <h2>Pengajuan Surat Ditolak</h2>
        <p>Mohon hubungi warga untuk memberi kabar.</p>
        <!-- Menangani aksi saat tombol "Verifikasi" diklik -->
        <form action="{{route('surat.ditolak' , $surat->id)}}" method="POST" id="form_surat_ditolak">
            @csrf
            <input type="hidden" name="alasan_ditolak" value="">
            <button type="submit">Pergi ke Arsip</button>
        </form>
        {{-- <br><a href=/layanan-surat class="btn">Atau Kembali</a> --}}
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
    const valueAlasanDitolak = document.getElementById('alasan_ditolak');
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
    denyButton.addEventListener('click', (e) => {
    e.preventDefault();
    deniedLightbox.classList.remove('show');
    window.alert(valueAlasanDitolak.value);
    doneDenyLightbox.classList.add('show');
    });

    // document.getElementById('form_surat_ditolak').addEventListener('submit', (event) => {
    // event.preventDefault();
    // const alasanDitolak = document.getElementById('alasan_ditolak').value;
    // document.getElementById('form_surat_ditolak').elements['alasan_ditolak'].value = alasanDitolak;
    // document.getElementById('form_surat_ditolak').submit();
    // });

    // Menutup lightbox saat area luar lightbox-content diklik
    deniedLightbox.addEventListener('click', (event) => {
    if (event.target === deniedLightbox) {
    deniedLightbox.classList.remove('show');
    }
    });
</script>

@endsection
