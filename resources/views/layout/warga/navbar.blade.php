<div class="footer">
    <p>Silahkan pilih menu yang Anda perlukan hari ini.</p>
    <div class="button-container">
        <!-- <button class="button" onclick="window.location.href='/layanan_digital';">Layanan Digital</button> -->
        <a href='/login' class="button">Layanan <br>Mandiri</a>
        <a href='/pengumuman-warga' class="button">Pengumuman</a>
        <a href='/tentang-desa-rawapanjang' class="button">Tentang Desa <br>Rawapanjang</a>
        <a href='/agenda-rawapanjang' class="button">Agenda <br>Rawapanjang</a>
        <a href='/lapak-warga' class="button">Lapak</a>
        <a href='/artikel-terkini' class="button">Artikel <br>Terkini</a>
        @if(session('warga'))
        <a href='/logout' class="button">Logout</a>
        @endif
    </div>
    <div class="credit">
        <p>&copy;</p>
    </div>
</div>
